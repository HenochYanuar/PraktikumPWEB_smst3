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
        <h3>Ubah Mahasiswa</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="view/mahasiswa/prosesUbah.php">

            <div class="form-group">
                <label for="">NIM</label>
                <input required class="form-control" readonly value="<?= $mhs->nim ?>" type="text" name="nim">
            </div>
            <div class="form-group">
                <label for="">Nama</label>
                <input required class="form-control" value="<?= $mhs->nama ?>" type="text" name="nama">
            </div>
            <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input required class="form-control" value="<?= $mhs->tgl_lahir ?>" type="date" name="tgl_lahir">
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <input required class="form-control" value="<?= $mhs->alamat ?>" type="text" name="alamat">
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label> <br>
                <input required <?= "$mhs->jenis_kelamin == 'L'?'checked':" ?> type="radio" name="jenis_kelamin" value="L">Laki Laki
                <input required <?= "$mhs->jenis_kelamin == 'P'?'checked':" ?> type="radio" name="jenis_kelamin" value="P">Perempuan
            </div>
            <button class="btn btn-primary" type="submit">Simpan</button>
        </form>
    </div>
</div>