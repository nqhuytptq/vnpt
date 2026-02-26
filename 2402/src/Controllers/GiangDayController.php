<?php

namespace App\Controllers;

use App\Config\Database;
use App\Entity\GiangDay;
use App\Repository\GiangDayRepository;
use Exception;


class GiangDayController
{
    protected $repository;

    public function __construct()
    {
        $db = new Database();
        $this->repository = new GiangDayRepository($db->connect());
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
    public function getAll()
    {
        return $this->repository->getAll();
    }
    public function index()
    {
        $giangDays = $this->repository->getAll();

        foreach ($giangDays as $giangDay) {
            echo "GV: " . $giangDay['ho_ten'] . " dạy môn " . $giangDay['ten_mon'] . " cho lớp " . $giangDay['ten_lop'] . "<br>";
        }
    }
    public function submitRequest()
    {
        // $giangDayController = new GiangDayController();

        if (isset($_POST['submitGiangDay'])) {
            $this->store(
                $_POST['gvId'],
                $_POST['lopId'],
                $_POST['monId'],
                $_POST['namHoc'],
            );
        }


        if (isset($_POST['showListGiangDay'])) {
            $this->index();
        }
    }
}
