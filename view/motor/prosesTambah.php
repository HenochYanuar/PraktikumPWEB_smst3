<?php
include_once __DIR__ . '/../../model/Motor.php';
include_once __DIR__ . '/../../model/Upload.php';

$platNo = $_REQUEST['platNo'];
if (!empty(Motor::getByPlatNo($platNo))) {
    echo "<h2>Plat sudah ada</h2>";
    echo "<a href='../../index.php?page=list-motor'>Klik Link Ini Untuk Kembali</a>";
    die();
}

#1.Ambil semua parameter form
$platNo = $_REQUEST['platNo'];
$merek = $_REQUEST['merek'];
$tipe = $_REQUEST['tipe'];
$mahasiswaNim = $_REQUEST['mahasiswaNim'];

#2. Buat Objek dari Motor
$motor = new Motor();
$motor->platNo = $platNo;
$motor->merek = $merek;
$motor->tipe = $tipe;
$motor->mahasiswaNim = $mahasiswaNim;

#2.1 Proses upload gambar
$fileName = Upload::image();
if($fileName == false) {
    echo "Terjadi Kesalahan Ketika Upload <br>";
    echo "<a href='../../index.php?page=list-motor'>Klil link ini untuk kembali</a>";
    die();
}
$motor->gambar = $fileName;

#3. Panggil function insert via objek
$motor->insert();

#4. Redirect ke halaman list motor
header('Location: ../../index.php?page=list-motor');
