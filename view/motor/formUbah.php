<?php
include_once __DIR__ . '/../../model/Motor.php';
include_once __DIR__ . '/../../model/Mahasiswa.php';
$idMotor = $_REQUEST['id'];
$motor = Motor::getByPrimaryKey($idMotor);
if ($motor === NULL) {
    echo "<h2>Data Motor tidak ditemukan</h2>";
    echo "<a href='index.php'>Klik Link Ini untuk kembali</a>";
    die();
}
#kondisi motor tidak null
$listMahasiswa = Mahasiswa::getAll();
?>
<div class="card">
    <div class="card-header">
        <h3>Update Data Motor Mahasiswa</h3>
    </div>
    <div class="card-body">
        <form action="view/motor/prosesUbah.php" method="POST">
            <div class="form-group">
                <label for="">Pilih Mahasiswa</label>
                <select name="mahasiswaNim" id="">
                    <option value="" disabled selected>Pilih Mahasiswa</option>
                    <?php
                    foreach ($listMahasiswa as $mhs) {
                        $selected = "";
                        if ($mhs->nim === $motor->mahasiswaNim) {
                            $selected = "selected";
                        }
                        echo "<option $selected value='$mhs->nim'>$mhs->nim / $mhs->nama</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="">Plat NO</label>
                <input class="form-control" value="<?= $motor->platNo ?>" type="text" name="platNo" required />
            </div>
            <div>
                <label for="">Merek</label>
                <input class="form-control" value="<?= $motor->merek ?>" type="text" name="merek" required />
            </div>
            <div>
                <label for="">Tipe</label>
                <input class="form-control" value="<?= $motor->tipe ?>" type="text" name="tipe" required />
            </div>
                    <br>
            <button class="btn btn-primary" type="submit">Simpan</button>
    </div>
</div>