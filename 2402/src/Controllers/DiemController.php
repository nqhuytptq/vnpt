<?php

namespace App\Controllers;

use Exception;
use App\Config\Database;
use App\Entity\Diem;
use App\Repository\DiemRepository;


class DiemController
{
    protected $repository;

    public function __construct()
    {
        $db = new Database();
        $this->repository = new DiemRepository($db->connect());
    }

    public function store($hocKy, $hocSinhId, $lopId, $monId, $loaiKiemTraId, $namHoc, $diem)
    {
        try {
            $diem = new Diem($hocKy, $hocSinhId, $lopId, $monId, $loaiKiemTraId, $namHoc, $diem);
            $this->repository->insert($diem);
            echo "Thêm điểm thành công!";
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getAll()
    {
        return $this->repository->getAll();
    }
    public function index()
    {
        $diems = $this->repository->getAll();

        foreach ($diems as $diem) {
            echo "Học kỳ " . $diem['hoc_ky'] . " học sinh " . $diem['ho_ten'] . " học lớp " . $diem['ten_lop'] .
                " đạt " . $diem['diem'] . " bài kiểm tra " . $diem['ten_loai'] . " môn " . $diem['ten_mon'] . " năm học " . $diem['nam_hoc'] . "<br>";
        }
    }
    public function submitRequest()
    { // $diemController = new DiemController();

        if (isset($_POST['submitDiem'])) {
            $this->store(
                $_POST['hocKy'],
                $_POST['hocSinhId'],
                $_POST['lopId'],
                $_POST['monId'],
                $_POST['loaiKiemTraId'],
                $_POST['namHoc'],
                $_POST['diem'],
            );
        }

        if (isset($_POST['showListDiem'])) {
            $this->index();
        }
    }
    public function getTrungBinhTungMonHocKy($hocSinhId, $hocKy)
    {
        return $this->repository->getTrungBinhHocSinhTungMonTheoHocKy($hocSinhId, $hocKy);
    }
    public function getTrungBinhCacMonHocKy($hocSinhId, $hocKy)
    {
        return $this->repository->getTrungBinhHocSinhCacMonTheoHocKy($hocSinhId, $hocKy);
    }
    public function getDieuKienTNHS($hocSinhId, $hocKy)
    {
        return $this->repository->getDieuKienTNHS($hocSinhId, $hocKy);
    }
}
