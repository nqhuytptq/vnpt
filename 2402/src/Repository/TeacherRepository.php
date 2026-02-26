<?php

namespace App\Repository;

use App\Config\Database;
use App\Entity\Teacher;


class TeacherRepository
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insert(Teacher $teacher)
    {
        $sql = "INSERT INTO giao_vien (ho_ten, dia_chi)
                VALUES ( ?, ?)";
        $name = $teacher->getName();
        $diaChi = $teacher->getAddress();
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $diaChi);
        $stmt->execute();
    }

    public function getAll()
    {
        $stmt = $this->conn->query("SELECT * FROM giao_vien");
        return $stmt->fetchAll();
    }
}
