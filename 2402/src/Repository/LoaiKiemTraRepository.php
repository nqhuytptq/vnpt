<?php

namespace App\Repository;

use App\Config\Database;
use App\Entity\LoaiKiemTra;



class LoaiKiemTraRepository
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insert(LoaiKiemTra $loaiKiemTra)
    {
        $sql = "INSERT INTO loai_kiem_tra (ten_loai, he_so)
                VALUES (?, ?)";
        $name = $loaiKiemTra->getName();
        $heSo = $loaiKiemTra->getHeSo();
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $heSo);
        $stmt->execute();
    }

    public function getAll()
    {
        $stmt = $this->conn->query("SELECT * FROM loai_kiem_tra");
        return $stmt->fetchAll();
    }
}
