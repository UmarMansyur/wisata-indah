<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, p {
            color: #333;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            color: #888;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Pemberitahuan Pengunjung yang Akan Berwisata</h1>
    <p>Dear Tim,</p>
    <p>Kami menerima permintaan dari seseorang yang berminat untuk melakukan kunjungan ke {{ $data['destination'] }}. Berikut adalah detailnya:</p>
    <h2>Detail Pengunjung:</h2>
    <ul>
        <li><strong>Nama Pengunjung:</strong> {{ $data['name'] }}</li>
        <li><strong>Tanggal Rencana Kunjungan:</strong> {{ $data['date'] }}</li>
        @if($data['child'])
        <li><strong>Jumlah Pengunjung Anak-anak:</strong> {{ $data['child'] }}</li>
        @endif
        @if($data['adult'])
        <li><strong>Jumlah Pengunjung:</strong> {{ $data['adult'] }}</li>
        @endif
        <li><strong>Alamat Email:</strong> {{ $data['email'] }}</li>
        <li><strong>Nomor Telepon:</strong> {{ $data['phone'] }}</li>
        <li><strong>Jenis Kelamin:</strong> {{ $data['gender'] }}</li>
    </ul>
</div>

</body>
</html>
