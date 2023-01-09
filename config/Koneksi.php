<?php
class Koneksi
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $port = "3306";
    private $dbName = "pweb_2022_kelas_1";
    public $koneksi;

    public function __construct()
    {
        $this->koneksi = mysqli_connect(
            $this->host,
            $this->username,
            $this->password,
            $this->dbName,
            $this->port
        );
    }
}