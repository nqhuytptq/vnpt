<?php

namespace App\Repository;

use App\Config\Database;
use App\Entity\Student;
use PDO;

class StudentRepository
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insert(Student $student)
    {
        $sql = "INSERT INTO hoc_sinh (ho_ten, ngay_sinh, phai)
                VALUES ( ?, ?, ?)";
        $name = $student->getName();
        $ngaySinh = $student->getNgaySinh();
        $phai = $student->getPhai();
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $ngaySinh);
        $stmt->bindParam(3, $phai);
        $stmt->execute();
    }

    public function getAll()
    {
        $stmt = $this->conn->query("SELECT * FROM hoc_sinh");
        return $stmt->fetchAll();
    }
}
