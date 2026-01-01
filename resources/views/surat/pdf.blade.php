<!DOCTYPE html>
<html>
<head>
    <title>Surat Resmi Desa</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; }
        .header { text-align: center; border-bottom: 2px solid #000; padding-bottom: 10px; }
        .content { margin-top: 30px; }
        .footer { margin-top: 50px; float: right; width: 200px; text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <h2>PEMERINTAH KABUPATEN DESA</h2>
        <h3>KANTOR KEPALA DESA SI-DESA</h3>
        <p>Jl. Utama No. 01, Kode Pos 12345</p>
    </div>

    <div class="content">
        <center>
            <u><h4>{{ strtoupper($surat->jenisSurat->nama_jenis) }}</h4></u>
            <p>Nomor: {{ $surat->nomor_surat }}</p>
        </center>

        <p>Yang bertanda tangan di bawah ini, Kepala Desa Si-Desa menerangkan bahwa:</p>
        <table style="margin-left: 50px;">
            <tr><td>Nama</td><td>: {{ $surat->penduduk->nama }}</td></tr>
            <tr><td>NIK</td><td>: {{ $surat->penduduk->nik }}</td></tr>
            <tr><td>Alamat</td><td>: {{ $surat->penduduk->alamat }}</td></tr>
        </table>

        <p>Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>
    </div>

    <div class="footer">
        <p>Diterbitkan tanggal, {{ date('d F Y') }}</p>
        <p>Petugas Administrator,</p>
        <br><br><br>
        <strong>{{ $surat->user->name }}</strong>
    </div>
</body>
</html>