<?php
include_once __DIR__.'/../../model/Motor.php';
$idMotor = $_REQUEST['id'];
$motor = Motor::getByPrimaryKey($idMotor);

if($motor === null) {
    echo "<h2>Data Mahasiswa Tidak Di Temukan</h2>";
    echo "<a href='index.php'>Klik Link Ini Untuk Kembali</a>";
    die();
} else {
    #function untuk proses hapus
    $motor->delete();
    #redirect ke halaman index
    header('Location: ../../index.php?page=list-motor');
}