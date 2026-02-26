<?php

namespace App\Controllers;

use App\Config\Database;
use App\Entity\HocSinhLop;
use App\Repository\HocSinhLopRepository;
use Exception;


class HocSinhLopController
{
    protected $repository;

    public function __construct()
    {
        $db = new Database();
        $this->repository = new HocSinhLopRepository($db->connect());
    }

    public function store($hocSinhId, $lopId, $namHoc)
    {
        try {
            $hocSinhLop = new HocSinhLop($hocSinhId, $lopId, $namHoc);
            $this->repository->insert($hocSinhLop);
            echo "Thêm HS vào lớp thành công!";
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
        $hocSinhLops = $this->repository->getAll();

        foreach ($hocSinhLops as $hocSinhLop) {
            echo "HS: " . $hocSinhLop['ho_ten'] . " học lớp " . $hocSinhLop['ten_lop'] . " <br>";
        }
    }
    public function submitRequest()
    {
        // $hocSinhLopController = new HocSinhLopController();

        if (isset($_POST['submitHocSinhLop'])) {
            $this->store(
                $_POST['hocSinhId'],
                $_POST['lopId'],
                $_POST['namHoc'],
            );
        }


        if (isset($_POST['showListHocSinhLop'])) {
            $this->index();
        }
    }

    public function getTiLeHocSinhCuaLopTheoHocKy($hocSinhId, $hocKy)
    {
        return $this->repository->getTiLeHocSinhCuaLopTheoHocKy($hocSinhId, $hocKy);
    }
}
