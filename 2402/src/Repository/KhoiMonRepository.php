<?php

namespace App\Repository;

use App\Config\Database;
use App\Entity\KhoiMon;


class KhoiMonRepository
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insert(KhoiMon $khoiMon)
    {
        $sql = "INSERT INTO khoi_mon (khoi_id,mon_id)
                VALUES (?,?)";
        $khoiId = $khoiMon->getKhoiId();
        $monId = $khoiMon->getMonId();

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $khoiId);
        $stmt->bindParam(2, $monId);

        $stmt->execute();
    }

    public function getAll()
    {
        $stmt = $this->conn->query(
            "SELECT khoi_mon.khoi_id, khoi.ten_khoi,
                    khoi_mon.mon_id,mon_hoc.ten_mon
            FROM khoi_mon
            JOIN khoi ON khoi_mon.khoi_id = khoi.khoi_id
            JOIN mon_hoc ON khoi_mon.mon_id= mon_hoc.mon_id"
        );
        return $stmt->fetchAll();
    }
}
