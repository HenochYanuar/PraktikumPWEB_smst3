<?php
include_once __DIR__ . '/../../model/Mahasiswa.php';
$listMahasiswa = mahasiswa::getAll();
?>
<div class="card">
    <div class="card-header">
        <h3>List Data Mahasiswa</h3>
    </div>
    <div class="card-body">
        <table id="table-mhs" class="table table-stripped table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Jumlah Motor
                    <th>
                        Action
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                foreach ($listMahasiswa as $mhs) {
                ?>
                    <tr>
                        <td><?= $nomor++ ?></td>
                        <td><?= $mhs->nim ?></td>
                        <td><?= $mhs->nama ?></td>
                        <td><?= $mhs->tgl_lahir ?></td>
                        <td><?= $mhs->jenis_kelamin ?></td>
                        <td><?= $mhs->alamat ?></td>
                        <td>
                            Memiliki <?= count($mhs->motors) ?> <br> Sepeda Motor : <br>
                            <?php
                            foreach ($mhs->motors as $motor) {
                                echo "$motor->merek $motor->tipe ($motor->platNo) <br>";
                            }
                            ?>
                        </td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="index.php?page=update-mhs&nim=<?= $mhs->nim ?>">Edit</a>
                            <a class="btn btn-danger btn-sm" href="index.php?page=delete-mhs&nim=<?= $mhs->nim ?>">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(function(){
        $('#table-mhs').DataTable();
    });
</script>
