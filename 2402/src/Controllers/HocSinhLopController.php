<?php

namespace App\Controllers;

use App\Config\Database;
use App\Entity\HocSinhLop;
use App\Repository\HocSinhLopRepository;
use Exception;


class HocSinhLopController
{
    protected $repository;
    protected $pdo;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->connect();
        $this->repository = new HocSinhLopRepository($this->pdo);
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
    public function getAllData()
    {
        return $this->repository->getAll();
    }
    public function getTiLeHocSinhCuaLopTheoHocKy($hocSinhId, $hocKy)
    {
        return $this->repository->getTiLeHocSinhCuaLopTheoHocKy($hocSinhId, $hocKy);
    }
    public function process()
    {
        $data = [
            'hocSinhLops' => [],
            'tiLeHSs' => []
        ];
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (isset($_POST['submitHocSinhLop'])) {
                $this->store(
                    $_POST['hocSinhId'],
                    $_POST['lopId'],
                    $_POST['namHoc'],
                );
            }


            if (isset($_POST['showListHocSinhLop'])) {
                $data['hocSinhLops'] = $this->getAllData();
            }
            if (isset($_POST['tinhTiLeHocSinhCuaLopTheoHocKy'])) {
                $data['tiLeHSs'] = $this->getTiLeHocSinhCuaLopTheoHocKy(
                    $_POST['lopId'],
                    $_POST['hocKy']
                );
            }
        }
        return $data;
    }
    public function __destruct()
    {
        $this->pdo = null;
    }
}