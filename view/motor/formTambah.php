<?php
include_once __DIR__ . '/../../model/Mahasiswa.php';
$listMahasiswa = Mahasiswa::getAll();
?>
<div class="card">
    <div class="card-header">
        <h3>Tambah Motor Mahasiswa</h3>
    </div>
    <div class="card-body">
        <form action="view/motor/prosesTambah.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Pilih Mahasiswa</label>
                <select name="mahasiswaNim" id="">
                    <option value="" disabled selected>Pilih Mahasiswa</option>
                    <?php
                    foreach ($listMahasiswa as $mhs) {
                        echo "<option value='$mhs->nim'>$mhs->nim / $mhs->nama</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Plat NO</label>
                <input class="form-control" type="text" name="platNo" required />
            </div>
            <div class="form-group">
                <label for="">Merek</label>
                <input class="form-control" type="text" name="merek" required />
            </div>
            <div class="form-group">
                <label for="">Tipe</label>
                <input class="form-control" type="text" name="tipe" required />
            </div>
            <div class="form-group">
                <label for="">Gambar</label>
                <input class="form-control" type="file" name="gambar" />
            </div>

            <button class="btn btn-primary" type="submit">Simpan</button>
        </form>
    </div>
</div>


</body>

</html>