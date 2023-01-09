<?php 
include_once __DIR__. '/../../model/Motor.php';
include_once __DIR__. '/../../model/Mahasiswa.php';
$idMotor = $_REQUEST['platNo'];
$motor = Motor::getByPlatNo($idMotor);
if ($motor === NULL) {
    echo "<h2>Data Motor Tidka Ditemeukan</h2>";
    echo "<a href='../../index.php?page=list-motor'>Klik Link Ini Untuk Kembali</a>";
    die();
}else{
    $platNo = $_REQUEST['platNo'];
    $merek = $_REQUEST['merek'];
    $tipe = $_REQUEST['tipe'];
    $mahasiswaNim = $_REQUEST['mahasiswaNim'];

    $motor->platNo = $platNo;
    $motor->merek = $merek;
    $motor->tipe = $tipe;
    $motor->mahasiswaNim = $mahasiswaNim;

    $motor->update();

    header('Location: ../../index.php?page=list-motor');
}