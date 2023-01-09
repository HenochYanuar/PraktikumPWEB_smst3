<?php
include_once __DIR__ . '/../../Model/Motor.php';
$listMotor = Motor::getAll();
?>
<div class="card">
    <div class="card-header">
        <h3>Data Motor Mahasiswa</h3>
    </div>
    <div class="card-body">
        <table id="table-motor" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Plat Nomer</th>
                    <th>Merek</th>
                    <th>Tipe</th>
                    <th>Pemilik</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($listMotor as $motor) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td>
                            <img src="/db-kelas1.1/images/<?= $motor->gambar ?>" height="50px" alt="">
                        </td>
                        <td><?= $motor->platNo ?></td>
                        <td><?= $motor->merek ?></td>
                        <td><?= $motor->tipe ?></td>
                        <td>
                            <?= $motor->mahasiswa->nama ?> /
                            <?= $motor->mahasiswa->nim ?>
                        </td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="index.php?page=update-motor&id=<?= $motor->id ?>">Edit</a> |
                            <a class="btn btn-danger btn-sm" href="index.php?page=delete-motor&id=<?= $motor->id ?>">Delete</a>
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
        $('#table-motor').DataTable();
    });
</script>
