<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Nilai - {{ $selectedAssignment->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #007cc3;
            padding-bottom: 10px;
        }
        .header h1 {
            color: #007cc3;
            margin: 0 0 5px 0;
            font-size: 24px;
        }
        .header p {
            margin: 0;
            color: #555;
            font-size: 14px;
        }
        .info {
            margin-bottom: 20px;
        }
        .info table {
            width: 100%;
        }
        .info td {
            padding: 3px 0;
        }
        .info td.label {
            font-weight: bold;
            width: 120px;
        }
        table.data {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table.data th, table.data td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table.data th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #333;
        }
        .status-badge {
            display: inline-block;
            padding: 3px 6px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: bold;
        }
        .status-submitted { background-color: #d1fae5; color: #065f46; }
        .status-late { background-color: #fef3c7; color: #92400e; }
        .status-graded { background-color: #dbeafe; color: #1e40af; }
        .status-missing { background-color: #fee2e2; color: #991b1b; }
        .score {
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Laporan Nilai Tugas</h1>
        <p>DIKELAS - Learning Management System</p>
    </div>

    <div class="info">
        <table>
            <tr>
                <td class="label">Tugas</td>
                <td>: {{ $selectedAssignment->title }}</td>
            </tr>
            <tr>
                <td class="label">Kelas</td>
                <td>: {{ $selectedAssignment->classroom->name ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Batas Waktu</td>
                <td>: {{ \Carbon\Carbon::parse($selectedAssignment->deadline_at)->format('d M Y, H:i') }}</td>
            </tr>
            <tr>
                <td class="label">Tanggal Cetak</td>
                <td>: {{ now()->format('d M Y, H:i') }}</td>
            </tr>
        </table>
    </div>

    <table class="data">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="35%">Nama Siswa</th>
                <th width="20%">Status</th>
                <th width="25%">Waktu Pengumpulan</th>
                <th width="15%" style="text-align: center;">Nilai</th>
            </tr>
        </thead>
        <tbody>
            @forelse($submissions as $index => $item)
                @php
                    $isLate = false;
                    $statusClass = 'status-missing';
                    $statusText = 'Belum Kumpul';
                    
                    if ($item->submission) {
                        if ($item->submission->score !== null) {
                            $statusClass = 'status-graded';
                            $statusText = 'Sudah Dinilai';
                        } else {
                            $statusClass = 'status-submitted';
                            $statusText = 'Menunggu Nilai';
                        }
                        
                        $isLate = \Carbon\Carbon::parse($item->submission->submitted_at)->gt(\Carbon\Carbon::parse($selectedAssignment->deadline_at));
                        if ($isLate && $statusText === 'Menunggu Nilai') {
                            $statusClass = 'status-late';
                            $statusText = 'Terlambat';
                        }
                    }
                @endphp
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->student->name }}</td>
                <td>
                    <span class="status-badge {{ $statusClass }}">
                        {{ $statusText }}
                        @if($isLate && $statusText === 'Sudah Dinilai')
                            (Terlambat)
                        @endif
                    </span>
                </td>
                <td>
                    @if($item->submission)
                        {{ \Carbon\Carbon::parse($item->submission->submitted_at)->format('d M Y H:i') }}
                    @else
                        -
                    @endif
                </td>
                <td class="score">
                    @if($item->submission && $item->submission->score !== null)
                        {{ $item->submission->score }}
                    @else
                        -
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center;">Tidak ada data siswa.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
