<?php

namespace App\Repository;

use App\Config\Database;
use App\Entity\Khoi;


class KhoiRepository
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insert(Khoi $khoi)
    {
        $sql = "INSERT INTO khoi (ten_khoi)
                VALUES (?)";
        $name = $khoi->getName();
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $name);
        $stmt->execute();
    }

    public function getAll()
    {
        $stmt = $this->conn->query("SELECT * FROM khoi");
        return $stmt->fetchAll();
    }
}
