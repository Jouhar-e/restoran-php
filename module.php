<?php

class DB
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $database = "dbresto";
    private $koneksi;

    public function __construct()
    {
        $this->koneksi =  $this->koneksiDB();
    }

    public function koneksiDB()
    {
        $koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->database);
        return $koneksi;
    }


    // untuk menampilkan seluruh data
    public function getData($sql)
    {
        $result = mysqli_query($this->koneksi, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        if (!empty($data)) {
            return $data;
        }
    }

    // untuk menampilkan satu data
    public function getValue($sql){
        $result = mysqli_query($this->koneksi,$sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public function runQuery($sql){
        $result = mysqli_query($this->koneksi,$sql);
    }

}
