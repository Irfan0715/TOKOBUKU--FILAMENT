<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kasir</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body onload="window.print()">
    <h1>Laporan Kasir</h1>
    <table>
        <thead>
            <tr>
                <th>ID Kasir</th>
                <th>Nama Kasir</th>
                <th>Jumlah Penjualan</th>
                <th>Total Penjualan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kasirs as $kasir)
                <tr>
                    <td>{{ $kasir->id }}</td>
                    <td>{{ $kasir->name }}</td>
                    <td>{{ $kasir->sales_count }}</td>
                    <td>Rp {{ number_format($kasir->sales_sum_total_price, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
