<?php

namespace App\Repository;

use App\Config\Database;
use App\Entity\MonHoc;


class MonHocRepository
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insert(MonHoc $monHoc)
    {
        $sql = "INSERT INTO mon_hoc (ten_mon)
                VALUES (?)";
        $name = $monHoc->getName();
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $name);
        $stmt->execute();
    }

    public function getAll()
    {
        $stmt = $this->conn->query("SELECT * FROM mon_hoc");
        return $stmt->fetchAll();
    }
}
