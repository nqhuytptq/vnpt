<?php

namespace App\Controllers;

use App\Config\Database;
use App\Entity\GiangDay;
use App\Repository\GiangDayRepository;
use Exception;


class GiangDayController
{
    protected $repository;
    protected $pdo;
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->connect();
        $this->repository = new GiangDayRepository($this->pdo);
    }

    public function store($gvId, $lopId, $monId, $namHoc)
    {
        try {
            $giangDay = new GiangDay($gvId, $lopId, $monId, $namHoc);
            $this->repository->insert($giangDay);
            echo "Thêm GV giảng dạy thành công!";
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getAllData()
    {
        return $this->repository->getAll();
    }
    // public function index()
    // {
    //     $giangDays = $this->repository->getAll();

    //     foreach ($giangDays as $giangDay) {
    //         echo "GV: " . $giangDay['ho_ten'] . " dạy môn " . $giangDay['ten_mon'] . " cho lớp " . $giangDay['ten_lop'] . "<br>";
    //     }
    // }
    public function process()
    {
        $giangDays = [];
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (isset($_POST['submitGiangDay'])) {
                $this->store(
                    $_POST['gvId'],
                    $_POST['lopId'],
                    $_POST['monId'],
                    $_POST['namHoc'],
                );
            }
            if (isset($_POST['showListGiangDay'])) {
                $giangDays = $this->getAllData();
            }
        }
        return $giangDays;
    }
    public function __destruct()
    {
        $this->pdo = null;
    }
}