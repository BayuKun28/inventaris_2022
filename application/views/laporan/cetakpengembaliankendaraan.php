<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cetak</title>
</head>

<body>
    <div style="width:auto; margin: auto;">
        <center>
            <h3>Laporan Data Pengembalian Kendaraan </h3>
            <h4> <?= $tanggalawal; ?> s/d <?= $tanggalakhir; ?></h4>
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peminjam</th>
                        <th>Nama Unit</th>
                        <th>Tanggal Pinjam</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kembali as $b) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $b['nama']; ?></td>
                            <td><?= $b['nama_unit']; ?></td>
                            <td><?= $b['tgl_pinjam']; ?></td>
                            <td><?= $b['keterangan']; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </center>
    </div>
</body>

</html>