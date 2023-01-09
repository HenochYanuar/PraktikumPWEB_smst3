<?php
include_once __DIR__ . '/../Config/Koneksi.php';
include_once __DIR__ . '/Motor.php';
class Mahasiswa
{
    public $nim;
    public $nama;
    public $tgl_lahir;
    public $alamat;
    public $jenis_kelamin;
    public $motors;

    public static function getAll(): array
    {
        $query = "select * from mahasiswa";
        $conn = new Koneksi();
        $mq = mysqli_query($conn->koneksi, $query);
        $result = [];
        while ($mhsDB = mysqli_fetch_object($mq)) {
            $mhs = new Mahasiswa();
            $mhs->nim = $mhsDB->nim;
            $mhs->nama = $mhsDB->nama;
            $mhs->tgl_lahir = $mhsDB->tgl_lahir;
            $mhs->alamat = $mhsDB->alamat;
            $mhs->jenis_kelamin = $mhsDB->jenis_kelamin;
            $mhs->motors = Motor::getByNimMahasiswaTanpaDataMahasiswa($mhsDB->nim);
            $result[] = $mhs;
        }
        return $result;
    }

    public static function getByPrimaryKey($nim): ?object
    {
        $query = "select * from mahasiswa where nim = '$nim'";
        $conn = new Koneksi();
        $mq = mysqli_query($conn->koneksi, $query);
        $result = null;
        while ($mhsDB = mysqli_fetch_object($mq)) {
            $mhs = new Mahasiswa();
            $mhs->nim = $mhsDB->nim;
            $mhs->nama = $mhsDB->nama;
            $mhs->tgl_lahir = $mhsDB->tgl_lahir;
            $mhs->alamat = $mhsDB->alamat;
            $mhs->jenis_kelamin = $mhsDB->jenis_kelamin;
            $result = $mhs;
        }
        return $result;
    }

    public function insert()
    {
        $query = "insert into mahasiswa values ("
            . "'$this->nim',"
            . "'$this->nama',"
            . "'$this->tgl_lahir',"
            . "'$this->alamat',"
            . "'$this->jenis_kelamin'"
            . ")";
        $conn = new Koneksi();
        return mysqli_query($conn->koneksi, $query);
    }

    public function delete()
    {
        $query = "DELETE from mahasiswa where nim='$this->nim'";
        $conn = new Koneksi();
        return mysqli_query($conn->koneksi, $query);
    }

    public function update()
    {
        $query = "update mahasiswa set "
            . "nama = '$this->nama',"
            . "tgl_lahir = '$this->tgl_lahir',"
            . "alamat = '$this->alamat',"
            . "jenis_kelamin = '$this->jenis_kelamin' "
            . "where nim = '$this->nim'";
            //var_dump($query);
            //exit;
        $conn = new Koneksi();
        return mysqli_query($conn->koneksi, $query);
    }

}
