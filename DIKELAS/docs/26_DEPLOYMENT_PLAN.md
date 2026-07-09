# 26 — Deployment Plan

> **Dokumen Terkait:** [20_TECH_STACK.md](./20_TECH_STACK.md) · [27_TESTING_PLAN.md](./27_TESTING_PLAN.md) · [30_RELEASE_PLAN.md](./30_RELEASE_PLAN.md)

---

## 1. Ringkasan

Dokumen ini mendefinisikan **rencana deployment** DIKELAS — strategi, environment, prosedur, dan checklist untuk men-deploy aplikasi ke server production.

---

## 2. Tujuan

| Tujuan | Deskripsi |
|---|---|
| **Reliability** | Deployment yang konsisten dan repeatable |
| **Safety** | Rollback plan jika terjadi masalah |
| **Documentation** | Panduan langkah demi langkah untuk DevOps |

---

## 3. Deployment Strategy

### 3.1 Environments

| Environment | Tujuan | URL |
|---|---|---|
| **Local** | Development | `http://localhost:8000` |
| **Staging** | Testing & QA | `https://staging.dikelas.sch.id` |
| **Production** | Live | `https://dikelas.sch.id` |

### 3.2 Server Stack

```
┌──────────────────────────────────┐
│          Ubuntu 24.04            │
│  ┌────────────────────────────┐  │
│  │  Nginx 1.24+               │  │
│  │  ├── SSL (Let's Encrypt)   │  │
│  │  └── Reverse Proxy         │  │
│  ├────────────────────────────┤  │
│  │  PHP 8.4-FPM               │  │
│  │  └── Laravel Application   │  │
│  ├────────────────────────────┤  │
│  │  MySQL 8.0                 │  │
│  │  └── dikelas database      │  │
│  ├────────────────────────────┤  │
│  │  Supervisor                │  │
│  │  └── Queue Worker          │  │
│  ├────────────────────────────┤  │
│  │  Cron                      │  │
│  │  └── Laravel Scheduler     │  │
│  └────────────────────────────┘  │
└──────────────────────────────────┘
```

---

## 4. Server Requirements

| Requirement | Minimum | Recommended |
|---|---|---|
| **OS** | Ubuntu 22.04 | Ubuntu 24.04 LTS |
| **RAM** | 2 GB | 4 GB |
| **CPU** | 1 Core | 2 Core |
| **Storage** | 20 GB SSD | 100 GB SSD |
| **Bandwidth** | 1 TB/bulan | Unlimited |
| **PHP** | 8.4 | 8.4+ |
| **MySQL** | 8.0 | 8.0+ |
| **Nginx** | 1.18 | 1.24+ |

---

## 5. Deployment Procedure

### 5.1 First-time Setup

```bash
# 1. Server preparation
sudo apt update && sudo apt upgrade -y
sudo apt install nginx mysql-server php8.4-fpm php8.4-mysql \
    php8.4-mbstring php8.4-xml php8.4-curl php8.4-zip \
    php8.4-gd php8.4-bcmath php8.4-intl php8.4-fileinfo \
    composer nodejs npm supervisor -y

# 2. Clone repository
cd /var/www
git clone <repo-url> dikelas
cd dikelas

# 3. Install dependencies
composer install --no-dev --optimize-autoloader
npm install && npm run build

# 4. Environment config
cp .env.example .env
# Edit .env dengan production values
php artisan key:generate

# 5. Database
mysql -u root -p -e "CREATE DATABASE dikelas CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
php artisan migrate --force
php artisan db:seed --force

# 6. Permissions
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache

# 7. Optimization
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# 8. SSL
sudo certbot --nginx -d dikelas.sch.id

# 9. Supervisor (Queue Worker)
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start dikelas-worker:*

# 10. Cron (Scheduler)
# Tambahkan ke crontab:
# * * * * * cd /var/www/dikelas && php artisan schedule:run >> /dev/null 2>&1
```

### 5.2 Update Deployment

```bash
cd /var/www/dikelas

# 1. Maintenance mode
php artisan down

# 2. Pull latest code
git pull origin main

# 3. Update dependencies
composer install --no-dev --optimize-autoloader
npm install && npm run build

# 4. Migrate database
php artisan migrate --force

# 5. Clear & rebuild cache
php artisan optimize:clear
php artisan optimize

# 6. Restart services
sudo supervisorctl restart dikelas-worker:*
sudo systemctl restart php8.4-fpm

# 7. Exit maintenance mode
php artisan up
```

---

## 6. Nginx Configuration

```nginx
server {
    listen 80;
    server_name dikelas.sch.id;
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    server_name dikelas.sch.id;
    root /var/www/dikelas/public;

    ssl_certificate /etc/letsencrypt/live/dikelas.sch.id/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/dikelas.sch.id/privkey.pem;

    index index.php;
    charset utf-8;
    client_max_body_size 50M;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.4-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

---

## 7. Backup Strategy

| Tipe | Frekuensi | Retensi | Metode |
|---|---|---|---|
| Database | Harian (00:00) | 30 hari | `mysqldump` + gzip |
| File Storage | Mingguan | 4 minggu | `tar` + gzip |
| Full Backup | Bulanan | 3 bulan | Database + Files + Config |

---

## 8. Monitoring

| Aspek | Tool | Metode |
|---|---|---|
| **Uptime** | UptimeRobot (free) | HTTP check setiap 5 menit |
| **Health Check** | `/health` endpoint | Return 200 OK |
| **Logs** | Laravel Log | `storage/logs/laravel.log` |
| **Disk** | Cron script | Alert jika > 80% |

---

## 9. Rollback Plan

```
Jika deployment gagal:
1. php artisan down
2. git checkout <previous-commit>
3. composer install --no-dev
4. php artisan migrate:rollback (jika perlu)
5. php artisan optimize
6. php artisan up
```

---

## 10. Checklist

- [x] Server requirements terdefinisi
- [x] Deployment procedure step-by-step
- [x] Nginx configuration tersedia
- [x] SSL/HTTPS dikonfigurasi
- [x] Queue worker setup (Supervisor)
- [x] Scheduler setup (Cron)
- [x] Backup strategy terdefinisi
- [x] Monitoring plan terdefinisi
- [x] Rollback plan terdefinisi

---

## 11. Acceptance Criteria

| ID | Kriteria | Status |
|---|---|---|
| AC-DP-001 | Deployment procedure reproducible | ✅ |
| AC-DP-002 | HTTPS aktif di production | ✅ |
| AC-DP-003 | Backup otomatis berjalan harian | ✅ |
| AC-DP-004 | Health check endpoint aktif | ✅ |
| AC-DP-005 | Rollback dapat dilakukan dalam 15 menit | ✅ |

---

*Dokumen ini terakhir diperbarui: Juli 2026*
*Status: ✅ Approved*
*Selanjutnya: [27_TESTING_PLAN.md](./27_TESTING_PLAN.md)*
