<?php

namespace App\Controllers;

use Exception;
use App\Config\Database;
use App\Entity\Diem;
use App\Repository\DiemRepository;


class DiemController
{
    protected $repository;
    protected $pdo;
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->connect();
        $this->repository = new DiemRepository($this->pdo);
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
    public function getAllData()
    {
        return $this->repository->getAll();
    }
    public function getDieuKienTNHS($hocSinhId, $hocKy)
    {
        return $this->repository->getDieuKienTNHS($hocSinhId, $hocKy);
    }
    public function getTrungBinhTungMonHocKy($hocSinhId, $hocKy)
    {
        return $this->repository->getTrungBinhHocSinhTungMonTheoHocKy($hocSinhId, $hocKy);
    }
    public function getTrungBinhCacMonHocKy($hocSinhId, $hocKy)
    {
        return $this->repository->getTrungBinhHocSinhCacMonTheoHocKy($hocSinhId, $hocKy);
    }
    public function process()
    {
        $dieuKienTNHSs = [];
        $tbTungMons = [];
        $tbCacMons = [];
        $dieuKienTNHSs = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
                $diems = $this->getAllData();
            }

            if (isset($_POST['kiemTraDieuKienTNHS'])) {
                $dieuKienTNHSs = $this->getDieuKienTNHS(
                    $_POST['hocSinhId'],
                    $_POST['hocKy']
                );
            }
            if (isset($_POST['tinhTrungBinhTungMonHocKy'])) {
                $tbTungMons = $this->getTrungBinhTungMonHocKy(
                    $_POST['hocSinhId'],
                    $_POST['hocKy']
                );
            }

            if (isset($_POST['tinhTrungBinhCacMonHocKy'])) {
                $tbCacMons = $this->getTrungBinhCacMonHocKy(
                    $_POST['hocSinhId'],
                    $_POST['hocKy']
                );
            }

            if (isset($_POST['kiemTraDieuKienTNHS'])) {
                $dieuKienTNHSs = $this->getDieuKienTNHS(
                    $_POST['hocSinhId'],
                    $_POST['hocKy']
                );
            }
        }
    }
    public function __destruct()
    {
        $this->pdo = null;
    }
}
