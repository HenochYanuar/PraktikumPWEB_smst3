<?php
include_once __DIR__ . '/../../model/mahasiswa.php';
$nim = $_REQUEST['nim'];
$mhs = Mahasiswa::getByPrimaryKey($nim);

if ($mhs === null) {
    echo "<h2>Data Mahasiswa Tidak Di Temukan</h2>";
    echo "<a href='index.php'>Klik Link Ini Untuk Kembali</a>";
    die();
}
?>
<div class="card">
    <div class="card-header">
        <h2>Anda Yakin Ingin Menghapus Data Ini ?</h2>
    </div>
    <div class="card-body">
        <p>Nim : <?= $mhs->nim ?></p>
        <p>Nama : <?= $mhs->nama ?></p>
        <p>Tamggal Lahir : <?= $mhs->tgl_lahir ?></p>
        <p>Jenis Kelamin : <?= $mhs->jenis_kelamin ?></p>
        <p>Alamat : <?= $mhs->alamat ?></p>
        <a class="btn btn-primary" href="index.php?page=list-mhs">batal</a>
        <a class="btn btn-danger" href="view/mahasiswa/prosesHapus.php?nim=<?= $mhs->nim ?>">Hapus</a>
    </div>
    
</div>