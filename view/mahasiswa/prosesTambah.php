<?php
include_once __DIR__ . '/../../model/Mahasiswa.php';

$nim = $_REQUEST['nim'];
$nama = $_REQUEST['nama'];
$alamat = $_REQUEST['alamat'];
$tgl_lahir = $_REQUEST['tgl_lahir'];
$jenis_kelamin = $_REQUEST['jenis_kelamin'];

#1. Buat objek dari mahasiswa
$mhs = new Mahasiswa();

#2. set semua fieldnya
$mhs->nim = $nim;
$mhs->nama = $nama;
$mhs->alamat = $alamat;
$mhs->tgl_lahir = $tgl_lahir;
$mhs->jenis_kelamin = $jenis_kelamin;

#3. Panggil fungsi insert
$mhs->insert();

header('Location: ../../index.php?page=list-mhs');

die();