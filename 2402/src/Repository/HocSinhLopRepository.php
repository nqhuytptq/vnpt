<?php

namespace App\Repository;

use App\Config\Database;
use App\Entity\HocSinhLop;


class HocSinhLopRepository
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insert(HocSinhLop $hocSinhLop)
    {
        $sql = "INSERT INTO hoc_sinh_lop (hoc_sinh_id, lop_id,nam_hoc)
                VALUES (?,?,?)";
        $hocSinhId = $hocSinhLop->getHocSinhId();
        $lopId = $hocSinhLop->getLopId();
        $namHoc = $hocSinhLop->getNamHoc();

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $hocSinhId);
        $stmt->bindParam(2, $lopId);
        $stmt->bindParam(3, $namHoc);

        $stmt->execute();
    }

    public function getAll()
    {
        $stmt = $this->conn->query(
            "SELECT hoc_sinh_lop.hoc_sinh_id, hoc_sinh.ho_ten,
            hoc_sinh_lop.lop_id, lop.ten_lop,
            hoc_sinh_lop.nam_hoc, hoc_sinh.phai, hoc_sinh.ngay_sinh 
            FROM hoc_sinh_lop
            JOIN hoc_sinh ON hoc_sinh_lop.hoc_sinh_id= hoc_sinh.hoc_sinh_id
            JOIN lop ON hoc_sinh_lop.lop_id= lop.lop_id"
        );
        return $stmt->fetchAll();
    }
    public function getTiLeHocSinhCuaLopTheoHocKy($lopId, $hocKy)
    {
        $sql = "SELECT 
        TenLop,
        ROUND(COUNT(CASE WHEN TBCaNam >= 8.0 THEN 1 END)*100/COUNT(*),2) AS PhanTramHocSinhGioi, 
        ROUND(COUNT(CASE WHEN TBCaNam >= 6.5 AND TBCaNam < 8.0 THEN 1 END)*100/COUNT(*),2) AS PhanTramHocSinhKha,
        ROUND(COUNT(CASE WHEN TBCaNam >= 5.0 AND TBCaNam < 6.5 THEN 1 END)*100/COUNT(*),2) AS PhanTramHocSinhTB
        FROM (SELECT 
        hoc_sinh.hoc_sinh_id AS MaHS,
        lop.lop_id AS MaLop,
        lop.ten_lop AS TenLop,
        AVG(diem.diem) AS TBCaNam
        FROM diem
        JOIN hoc_sinh ON diem.hoc_sinh_id = hoc_sinh.hoc_sinh_id
        JOIN lop ON diem.lop_id = lop.lop_id
        WHERE lop.lop_id = ? AND diem.hoc_ky = ?
        GROUP BY hoc_sinh.hoc_sinh_id, lop.lop_id) AS DiemTBLop
        GROUP BY TenLop";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $lopId);
        $stmt->bindParam(2, $hocKy);

        $stmt->execute();
        return $stmt->fetchAll();
    }
}
