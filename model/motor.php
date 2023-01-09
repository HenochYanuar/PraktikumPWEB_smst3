<?php
include_once __DIR__ . '/../config/Koneksi.php';
include_once __DIR__ . '/Mahasiswa.php';

class motor
{
    public $id;
    public $platNo;
    public $merek;
    public $tipe;
    public $gambar;
    public $mahasiswaNim;
    public $mahasiswa;

    public static function getAll(): array
    {
        $query = "select * from motor";
        $conn = new Koneksi();
        $motorResult = mysqli_query($conn->koneksi, $query);
        $result = [];
        while ($motorDB = mysqli_fetch_object($motorResult)) {
            $motorObj = self::setFields($motorDB);
            $result[] = $motorObj;
        }
        return $result;
    }

    public static function getByNimMahasiswa($nim): array
    {
        $query = "select * from motor where mahasiswa_nim='$nim'";
        $conn = new Koneksi();
        $motorResult =  mysqli_query($conn->koneksi, $query);
        $result = [];
        while ($motorDB = mysqli_fetch_object($motorResult)) {
            $motorObj = self::setFields($motorDB);
            $result[] = $motorObj;
        }
        return $result;
    }

    public static function getByNimMahasiswaTanpaDataMahasiswa($nim): array
    {
        $query = "select * from motor where mahasiswa_nim='$nim'";
        $conn = new Koneksi();
        $motorResult =  mysqli_query($conn->koneksi, $query);
        $result = [];
        while ($motorDB = mysqli_fetch_object($motorResult)) {
            $motorObj = self::setFieldsTanpaDataMahasiswa($motorDB);
            $result[] = $motorObj;
        }
        return $result;
    }


    public static function getByPrimaryKey($primaryKey): ?Motor
    {
        $query = "select * from motor where id='$primaryKey'";
        $conn = new Koneksi();
        $motorResult =  mysqli_query($conn->koneksi, $query);
        $result = null;
        while ($motorDB = mysqli_fetch_object($motorResult)) {
            $motorObj = self::setFields($motorDB);
            $result = $motorObj;
        }
        return $result;
    }

    public static function getByPlatNo($platNo): ?Motor
    {
        $query = "select * from motor where plat_no='$platNo'";
        $conn = new Koneksi();
        $motorResult =  mysqli_query($conn->koneksi, $query);
        $result = null;
        while ($motorDB = mysqli_fetch_object($motorResult)) {
            $motorObj = self::setFields($motorDB);
            $result = $motorObj;
        }
        return $result;
    }

    private static function setFields($motorDB): Motor
    {
        $motorObj = new Motor();
        $motorObj->id = $motorDB->id;
        $motorObj->platNo = $motorDB->plat_no;
        $motorObj->merek = $motorDB->merek;
        $motorObj->tipe = $motorDB->tipe;
        $motorObj->gambar = $motorDB->gambar;
        $motorObj->mahasiswaNim = $motorDB->mahasiswa_nim;
        $motorObj->mahasiswa = Mahasiswa::getByPrimaryKey($motorDB->mahasiswa_nim);
        return $motorObj;
    }

    private static function setFieldsTanpaDataMahasiswa($motorDB): Motor
    {
        $motorObj = new Motor();
        $motorObj->id = $motorDB->id;
        $motorObj->platNo = $motorDB->plat_no;
        $motorObj->merek = $motorDB->merek;
        $motorObj->tipe = $motorDB->tipe;
        $motorObj->gambar = $motorDB->gambar;
        $motorObj->mahasiswaNim = $motorDB->mahasiswa_nim;
        return $motorObj;
    }

    public function insert(): void
    {
        $query = "insert into motor(plat_no,merek,tipe,mahasiswa_nim, gambar) values "
            . "("
            . "'$this->platNo', "
            . "'$this->merek', "
            . "'$this->tipe', "
            . "'$this->mahasiswaNim', "
            . "'$this->gambar' "
            . ")";
        $conn = new Koneksi();
        mysqli_query($conn->koneksi, $query);
    }

    public function delete()
    {
        $query = "delete from motor where id = '$this->id'";
        $conn = new Koneksi();
        return mysqli_query($conn->koneksi, $query);
    }

    public function update()
    {
        $query = "update motor set "
            . "plat_no = '$this->platNo',"
            . "merek = '$this->merek',"
            . "tipe = '$this->tipe',"
            . "mahasiswa_nim = '$this->mahasiswaNim' "
            . "where id = '$this->id'";
        $conn = new Koneksi();
        return mysqli_query($conn->koneksi, $query);
    }
}
