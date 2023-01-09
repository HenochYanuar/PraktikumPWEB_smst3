<?php
include_once __DIR__.'/../../model/mahasiswa.php';
$nim = $_REQUEST['nim'];
$mhs = Mahasiswa::getByPrimaryKey($nim);

if($mhs === null) {
    echo "<h2>Data Mahasiswa Tidak Di Temukan</h2>";
    echo "<a href='index.php'>Klik Link Ini Untuk Kembali</a>";
    die();
} else {
    #function untuk proses hapus
    $mhs->delete();
    #redirect ke halaman index
    header('Location: ../../index.php?page=list-mhs');
}