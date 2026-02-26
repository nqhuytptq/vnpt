<?php

namespace App\Repository;

use App\Config\Database;
use App\Entity\GiangDay;

class GiangDayRepository
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insert(GiangDay $giangDay)
    {
        $sql = "INSERT INTO giang_day (gv_id, lop_id,mon_id,nam_hoc)
                VALUES (?,?,?,?)";
        $gvId = $giangDay->getGvId();
        $lopId = $giangDay->getLopId();
        $monId = $giangDay->getMonId();
        $namHoc = $giangDay->getNamHoc();

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $gvId);
        $stmt->bindParam(2, $lopId);
        $stmt->bindParam(3, $monId);
        $stmt->bindParam(4, $namHoc);

        $stmt->execute();
    }

    public function getAll()
    {
        $stmt = $this->conn->query(
            "SELECT giang_day.gv_id, giao_vien.ho_ten,
                   giang_day.mon_id, mon_hoc.ten_mon,
                   giang_day.lop_id, lop.ten_lop,
                   giang_day.nam_hoc
            FROM giang_day
            JOIN giao_vien ON giang_day.gv_id = giao_vien.gv_id
            JOIN mon_hoc ON giang_day.mon_id = mon_hoc.mon_id
            JOIN lop ON giang_day.lop_id = lop.lop_id"
        );
        return $stmt->fetchAll();
    }
}
