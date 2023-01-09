<?php
include_once __DIR__ . '/../../model/Motor.php';
$idMotor = $_REQUEST['id'];
$motor = Motor::getByPrimaryKey($idMotor);

if ($motor === null) {
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
        <p>Plat No : <?= $motor->platNo ?></p>
        <p>Merek : <?= $motor->merek ?></p>
        <p>Tipe : <?= $motor->tipe ?></p>
        <p>Pemilik : <?= $motor->mahasiswaNim ?></p>
        <a class="btn btn-primary" href="index.php?page=list-motor">batal</a>
        <a class="btn btn-danger" href="view/motor/prosesHapus.php?id=<?= $motor->id ?>">Hapus</a>
    </div>
</div>