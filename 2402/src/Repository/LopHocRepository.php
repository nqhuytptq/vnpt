<?php

namespace App\Repository;

use App\Config\Database;
use App\Entity\LopHoc;


class LopHocRepository
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insert(LopHoc $lopHoc)
    {
        $sql = "INSERT INTO lop (khoi_id, gvcn_id,  ten_lop, nam_hoc)
                VALUES (?,?,?,?)";
        $khoiId = $lopHoc->getKhoiId();
        $gvId = $lopHoc->getGvcnId();
        $tenLop = $lopHoc->getTenLop();
        $namHoc = $lopHoc->getNamHoc();
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $khoiId);
        $stmt->bindParam(2, $gvId);
        $stmt->bindParam(3, $tenLop);
        $stmt->bindParam(4, $namHoc);
        $stmt->execute();
    }

    public function getAll()
    {
        $stmt = $this->conn->query(
            "SELECT lop.lop_id, lop.ten_lop,
                    lop.khoi_id, khoi.ten_khoi,
                    lop.gvcn_id, giao_vien.ho_ten,
                    lop.nam_hoc
            FROM lop
            JOIN khoi ON lop.khoi_id= khoi.khoi_id
            join giao_vien ON lop.gvcn_id= giao_vien.gv_id "
        );
        return $stmt->fetchAll();
    }
    public function getPhieuDiemHS($hocSinhId)
    {
        $sql = "SELECT
    hoc_sinh.hoc_sinh_id AS MaHS,
    hoc_sinh.ho_ten AS TenHS,
    hoc_sinh.ngay_sinh AS NgaySinh,
    lop.ten_lop AS TenLop,
    lop.nam_hoc AS NamHoc,
    giao_vien.ho_ten AS TenGVCN,
    mon_hoc.ten_mon AS TenMon,
    diem.hoc_ky AS HocKy,
    SUM(diem.diem * loai_kiem_tra.he_so) / SUM(loai_kiem_tra.he_so) AS TBMon
    FROM diem
    JOIN hoc_sinh ON diem.hoc_sinh_id = hoc_sinh.hoc_sinh_id
    JOIN mon_hoc ON diem.mon_id = mon_hoc.mon_id
    JOIN lop ON diem.lop_id = lop.lop_id
    JOIN giao_vien ON lop.gvcn_id = giao_vien.gv_id
    JOIN loai_kiem_tra ON diem.loai_kt_id = loai_kiem_tra.loai_kt_id
    WHERE hoc_sinh.hoc_sinh_id = ?
    GROUP BY hoc_sinh.hoc_sinh_id, hoc_sinh.ho_ten, hoc_sinh.ngay_sinh, lop.ten_lop, lop.nam_hoc, giao_vien.ho_ten, mon_hoc.mon_id, mon_hoc.ten_mon, diem.hoc_ky
    ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $hocSinhId);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
