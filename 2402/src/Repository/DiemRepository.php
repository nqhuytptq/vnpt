<?php

namespace App\Repository;

use App\Config\Database;
use App\Entity\Diem;


class DiemRepository
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insert(Diem $diem)
    {
        $sql = "INSERT INTO diem ( hoc_ky,hoc_sinh_id, lop_id,mon_id, loai_kt_id, nam_hoc,diem)
                VALUES (?,?,?,?,?,?,?)";
        $hocKy = $diem->getHocKy();
        $hocSinhId = $diem->getHocSinhId();
        $lopId = $diem->getLopId();
        $monId = $diem->getMonId();
        $loaiKiemTraId = $diem->getLoaiKiemTraId();
        $namHoc = $diem->getNamHoc();
        $diem = $diem->getDiem();

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $hocKy);
        $stmt->bindParam(2, $hocSinhId);
        $stmt->bindParam(3, $lopId);
        $stmt->bindParam(4, $monId);
        $stmt->bindParam(5, $loaiKiemTraId);
        $stmt->bindParam(6, $namHoc);
        $stmt->bindParam(7, $diem);

        $stmt->execute();
    }

    public function getAll()
    {
        $stmt = $this->conn->query(
            "SELECT diem.diem_id,
                    diem.hoc_ky,
                    diem.hoc_sinh_id, hoc_sinh.ho_ten,
                    diem.lop_id, lop.ten_lop,
                    diem.mon_id, mon_hoc.ten_mon,
                    diem.loai_kt_id, loai_kiem_tra.ten_loai,
                    diem.nam_hoc, diem.diem
            FROM diem
            JOIN hoc_sinh ON diem.hoc_sinh_id= hoc_sinh.hoc_sinh_id
            JOIN lop ON diem.lop_id= lop.lop_id
            JOIN mon_hoc ON diem.mon_id=mon_hoc.mon_id
            JOIN loai_kiem_tra ON diem.loai_kt_id=loai_kiem_tra.loai_kt_id"
        );
        return $stmt->fetchAll();
    }
    public function getTrungBinhHocSinhTungMonTheoHocKy($hocSinhId, $hocKy)
    {
        $sql = "SELECT 
    hoc_sinh.hoc_sinh_id as MaHS,
    hoc_sinh.ho_ten as TenHS,
    mon_hoc.ten_mon as TenMon,
    diem.hoc_ky as HocKy,
    AVG(diem.diem) as TBMon
    FROM diem
    JOIN hoc_sinh ON diem.hoc_sinh_id = hoc_sinh.hoc_sinh_id
    JOIN mon_hoc ON diem.mon_id = mon_hoc.mon_id
    WHERE hoc_sinh.hoc_sinh_id = ?
     AND diem.hoc_ky = ?
    GROUP BY mon_hoc.mon_id, mon_hoc.ten_mon";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $hocSinhId);
        $stmt->bindParam(2, $hocKy);

        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getTrungBinhHocSinhCacMonTheoHocKy($hocSinhId, $hocKy)
    {
        $sql = "SELECT MaHS, TenHS, HocKy, AVG(TBMon) as TBCaNam
FROM (SELECT 
    hoc_sinh.hoc_sinh_id as MaHS,
    hoc_sinh.ho_ten as TenHS,
    mon_hoc.ten_mon as TenMon,
    diem.hoc_ky as HocKy,
    AVG(diem.diem) as TBMon
    FROM diem
    JOIN hoc_sinh ON diem.hoc_sinh_id = hoc_sinh.hoc_sinh_id
    JOIN mon_hoc ON diem.mon_id = mon_hoc.mon_id
    WHERE hoc_sinh.hoc_sinh_id = ?
  AND diem.hoc_ky = ?
  GROUP BY mon_hoc.mon_id, mon_hoc.ten_mon) as TBCaNam
  GROUP BY MaHS, TenHS, HocKy";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $hocSinhId);
        $stmt->bindParam(2, $hocKy);

        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getDieuKienTNHS($hocSinhId, $hocKy)
    {
        $sql = "SELECT MaHS, TenHS, HocKy, AVG(TBMon) as TBCaNam, 
    CASE
        WHEN AVG(TBMon) >= 5.0 THEN 'Đủ điều kiện tốt nghiệp'
        WHEN AVG(TBMon) < 5.0 THEN 'Không đủ điều kiện tốt nghiệp'
    END AS HocLuc
FROM (SELECT 
    hoc_sinh.hoc_sinh_id as MaHS,
    hoc_sinh.ho_ten as TenHS,
    mon_hoc.ten_mon as TenMon,
    diem.hoc_ky as HocKy,
    AVG(diem.diem) as TBMon
FROM diem
JOIN hoc_sinh ON diem.hoc_sinh_id = hoc_sinh.hoc_sinh_id
JOIN mon_hoc ON diem.mon_id = mon_hoc.mon_id
WHERE hoc_sinh.hoc_sinh_id = ?
  AND diem.hoc_ky = ?
  GROUP BY mon_hoc.mon_id, mon_hoc.ten_mon) as TBCaNam
  GROUP BY MaHS, TenHS, HocKy";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $hocSinhId);
        $stmt->bindParam(2, $hocKy);

        $stmt->execute();
        return $stmt->fetchAll();
    }
}