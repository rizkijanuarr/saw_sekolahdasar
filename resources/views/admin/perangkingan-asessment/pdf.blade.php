<!DOCTYPE html>
<html>

<head>
    <title>Skor Akhir!</title>
    <style>
        @page {
            size: 3.15in;
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0.2in;
            width: auto;
            line-height: 1.2;
            font-size: 7pt;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
        }

        table {
            width: 100%;
            table-layout: fixed;
        }

        th,
        td {
            padding: 2px 0;
            text-align: left
        }

        .title {
            font-size: 7pt;
            font-weight: bold;
            text-align: center;
            margin-bottom: -5px;
        }

        .subtitle {
            font-size: 5pt;
            text-align: center;
            color: #71717a;
        }
    </style>
</head>

<body>
    <div>
        <h1 class="title">Sekolah Dasar Swasta Terbaik di Situbondo dengan Metode SAW</h1>
        <p class="subtitle">{{ now()->format('d F Y H:i') }}</p>
        <table>
            <thead>
                <tr>
                    <th style="width: 6%; font-size: 5pt;">#</th>
                    <th style="width: 60%; text-align: left; font-size: 5pt;">Nama Sekolah</th>
                    <th style="text-align: right;width: 40%; font-size: 5pt;">Skor Akhir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skorAkhirSekolah as $data)
                    <tr>
                        <th style="width: 6%; font-family: monospace">{{ $loop->iteration }}</th>
                        <td style="width: 60%; text-align: left; letter-spacing: -1.5px; font-family: 'monospace'">
                            {{ $data['sekolah'] }}</td>
                        <td style="width: 60%; text-align: right; letter-spacing: -1.5px; font-family: 'monospace'">
                            {{ number_format($data['skor'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <p style="width: 60%; text-align: left; letter-spacing: -1.5px; font-family: 'monospace'">Menampilkan {{ ($currentPage - 1) * $perPage + 1 }} hingga {{ min($currentPage * $perPage, $totalSekolah) }} dari
            {{ $totalSekolah }} hasil</p> --}}
        <p class="subtitle">Total sekolah: {{ $totalSekolah }}</p>
    </div>
</body>

</html>
