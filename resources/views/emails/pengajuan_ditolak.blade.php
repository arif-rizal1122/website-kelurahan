<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Surat Ditolak</title>
    <style>
        /* Gaya dasar email */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .header {
            background-color: #f8f8f8;
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        .content {
            padding: 20px 0;
        }
        .greeting {
            margin-bottom: 15px;
        }
        .info {
            margin-bottom: 10px;
        }
        .regards {
            margin-top: 20px;
            text-align: right;
        }
        .important {
            font-weight: bold;
            color: #2c3e50;
        }
        .reason { /* Gaya untuk keterangan penolakan */
            margin-top: 15px;
            padding: 10px;
            background-color: #ffe0e0;
            border: 1px solid #ffb3b3;
            border-radius: 5px;
            color: #8b0000;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 class="important">Pemberitahuan Pengajuan Surat Ditolak</h2>
        </div>
        <div class="content">
            <p class="greeting">Yth. Bapak/Ibu {{ $nama_warga }},</p>
            <p>
                Kami informasikan bahwa pengajuan surat Anda dengan detail sebagai berikut telah ditolak:
            </p>
            <ul style="list-style: none; padding-left: 0;">
                <li class="info"><span class="important">Jenis Surat:</span> {{ $jenis_surat }}</li>
                <li class="info"><span class="important">Nomor Pengajuan:</span> {{ $nomor_pengajuan }}</li>
                <li class="info"><span class="important">Tanggal Pengajuan:</span> {{ $tanggal_pengajuan }}</li>
            </ul>
            <p class="reason">
                Alasan Penolakan: {{ $keterangan_penolakan }}
            </p>
            <p>
                Anda dapat mengajukan surat kembali dengan memperbaiki kekurangan yang ada.
            </p>
            <div class="regards">
                Hormat kami,<br>
                Tim Administrasi
            </div>
        </div>
    </div>
</body>
</html>