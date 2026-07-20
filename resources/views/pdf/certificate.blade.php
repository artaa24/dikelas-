<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sertifikat - {{ $certificate->certificate_number }}</title>
    <style>
        @page {
            margin: 0;
            padding: 0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            width: 100%;
            height: 100%;
        }

        .certificate-container {
            width: 100%;
            min-height: 100vh;
            padding: 40px;
            background: #fff;
            position: relative;
        }

        .certificate-inner {
            border: 3px solid #0A4B7D;
            padding: 50px 60px;
            height: calc(100vh - 80px);
            position: relative;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .certificate-inner::before {
            content: '';
            position: absolute;
            top: 8px;
            left: 8px;
            right: 8px;
            bottom: 8px;
            border: 1px solid #9AE6F1;
        }

        .logo-text {
            font-size: 16px;
            font-weight: bold;
            color: #0A4B7D;
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .certificate-title {
            font-size: 42px;
            font-weight: bold;
            color: #0A4B7D;
            margin-bottom: 8px;
            letter-spacing: 2px;
        }

        .certificate-subtitle {
            font-size: 14px;
            color: #666;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }

        .type-badge {
            display: inline-block;
            padding: 6px 20px;
            background-color: #E8F8FB;
            color: #0A4B7D;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 25px;
        }

        .awarded-to {
            font-size: 13px;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 8px;
        }

        .student-name {
            font-size: 36px;
            font-weight: bold;
            color: #1a1a1a;
            margin-bottom: 20px;
            border-bottom: 2px solid #9AE6F1;
            padding-bottom: 10px;
            display: inline-block;
        }

        .certificate-description {
            font-size: 13px;
            color: #555;
            line-height: 1.8;
            max-width: 600px;
            margin: 0 auto 20px;
        }

        .score-box {
            display: inline-block;
            padding: 8px 30px;
            background: linear-gradient(135deg, #0A4B7D, #007cc3);
            color: white;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .score-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 2px;
            opacity: 0.8;
        }

        .score-value {
            font-size: 28px;
            font-weight: bold;
        }

        .info-row {
            width: 100%;
            display: table;
            margin-top: 30px;
        }

        .info-cell {
            display: table-cell;
            width: 33.33%;
            text-align: center;
            padding: 0 20px;
        }

        .info-label {
            font-size: 10px;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }

        .info-value {
            font-size: 12px;
            font-weight: bold;
            color: #333;
        }

        .divider-line {
            width: 60px;
            height: 2px;
            background-color: #0A4B7D;
            margin: 8px auto;
        }

        .cert-number {
            position: absolute;
            bottom: 20px;
            right: 25px;
            font-size: 9px;
            color: #aaa;
            letter-spacing: 1px;
        }

        .corner-decoration {
            position: absolute;
            width: 40px;
            height: 40px;
            border-color: #9AE6F1;
        }

        .corner-tl { top: 20px; left: 20px; border-top: 3px solid; border-left: 3px solid; }
        .corner-tr { top: 20px; right: 20px; border-top: 3px solid; border-right: 3px solid; }
        .corner-bl { bottom: 20px; left: 20px; border-bottom: 3px solid; border-left: 3px solid; }
        .corner-br { bottom: 20px; right: 20px; border-bottom: 3px solid; border-right: 3px solid; }
    </style>
</head>
<body>
    <div class="certificate-container">
        <div class="certificate-inner">
            <div class="corner-decoration corner-tl"></div>
            <div class="corner-decoration corner-tr"></div>
            <div class="corner-decoration corner-bl"></div>
            <div class="corner-decoration corner-br"></div>

            <div class="logo-text">DIKELAS</div>
            <div class="certificate-title">SERTIFIKAT</div>
            <div class="certificate-subtitle">Learning Management System</div>

            <div class="type-badge">
                @if($certificate->type === 'completion')
                    Sertifikat Kelulusan
                @elseif($certificate->type === 'achievement')
                    Sertifikat Prestasi
                @else
                    Sertifikat Partisipasi
                @endif
            </div>

            <div class="awarded-to">Diberikan Kepada</div>
            <div class="student-name">{{ $certificate->student->name }}</div>

            <div class="certificate-description">
                {{ $certificate->description ?? 'Atas partisipasinya dalam kegiatan pembelajaran di kelas ' . $certificate->classroom->name . ' dan telah menyelesaikan seluruh rangkaian materi dan evaluasi dengan baik.' }}
            </div>

            @if($certificate->final_score)
            <div class="score-box">
                <div class="score-label">Nilai Akhir</div>
                <div class="score-value">{{ number_format($certificate->final_score, 1) }}</div>
            </div>
            @endif

            <div class="info-row">
                <div class="info-cell">
                    <div class="info-label">Kelas</div>
                    <div class="divider-line"></div>
                    <div class="info-value">{{ $certificate->classroom->name }}</div>
                </div>
                <div class="info-cell">
                    <div class="info-label">Diterbitkan Oleh</div>
                    <div class="divider-line"></div>
                    <div class="info-value">{{ $certificate->issuer->name }}</div>
                </div>
                <div class="info-cell">
                    <div class="info-label">Tanggal</div>
                    <div class="divider-line"></div>
                    <div class="info-value">{{ $certificate->issued_at->format('d F Y') }}</div>
                </div>
            </div>

            <div class="cert-number">No: {{ $certificate->certificate_number }}</div>
        </div>
    </div>
</body>
</html>
