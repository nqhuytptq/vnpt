<?php

namespace App\Controllers;

use App\Config\Database;
use App\Entity\KhoiMon;
use App\Repository\KhoiMonRepository;
use Exception;


class KhoiMonController
{
    protected $repository;

    public function __construct()
    {
        $db = new Database();
        $this->repository = new KhoiMonRepository($db->connect());
    }

    public function store($khoiId, $monId)
    {
        try {
            $khoiMon = new KhoiMon($khoiId, $monId);
            $this->repository->insert($khoiMon);
            echo "Thêm môn học của khối thành công!";
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
        $khoiMons = $this->repository->getAll();

        foreach ($khoiMons as $khoiMon) {
            echo "Lớp " . $khoiMon['ten_khoi'] . " học môn " . $khoiMon['ten_mon'] . "<br>";
        }
    }
    public function submitRequest()
    {

        // $khoiMonController = new KhoiMonController();

        if (isset($_POST['submitKhoiMon'])) {
            $this->store(
                $_POST['khoiId'],
                $_POST['monId'],


            );
        }

        if (isset($_POST['showListKhoiMon'])) {
            $this->index();
        }
    }
}
