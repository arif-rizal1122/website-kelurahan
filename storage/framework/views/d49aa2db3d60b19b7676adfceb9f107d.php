Berikut adalah contoh isi dari file resources/views/emails/pengajuan_selesai.blade.php:<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Surat Selesai</title>
    <style>
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
            color: #2c3e50; /* Darker color for emphasis */
        }
        .signature {
            margin-top: 25px;
            text-align: right;
            font-style: italic;
            color: #555;
        }
        .disclaimer {
            margin-top: 30px;
            padding: 10px;
            border-top: 1px solid #eee;
            font-size: 0.9em;
            color: #777;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 class="important">Pemberitahuan Pengajuan Surat Selesai</h2>
        </div>
        <div class="content">
            <p class="greeting">Yth. Bapak/Ibu <?php echo e($nama_warga); ?>,</p>
            <p>
                Kami informasikan dengan hormat bahwa pengajuan surat Anda dengan detail sebagai berikut telah selesai diproses:
            </p>
            <ul style="list-style: none; padding-left: 0;">
                <li class="info"><span class="important">Jenis Surat:</span> <?php echo e($jenis_surat); ?></li>
                <li class="info"><span class="important">Nomor Pengajuan:</span> <?php echo e($nomor_pengajuan); ?></li>
                 <li class="info">Tanggal Pengajuan: <?php echo e($tanggal_pengajuan); ?></li> 
            </ul>
            <p>
                Anda dapat mengambil surat yang telah selesai di kantor kami pada jam kerja.  Mohon membawa bukti pengajuan atau identitas diri.
            </p>
             <p>
                Terima kasih atas perhatian dan kerjasamanya.
            </p>

            <div class="signature">
                Hormat kami,<br>
                Tim Administrasi Kelurahan/Desa
            </div>

            <div class="disclaimer">
                <p>
                    Ini adalah email pemberitahuan otomatis.  Mohon tidak membalas email ini.  Jika Anda memiliki pertanyaan, silakan hubungi kantor kami langsung.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH /home/arifrizal/Desktop/bckup/laravel-modern-template/resources/views/emails/pengajuan_selesai.blade.php ENDPATH**/ ?>