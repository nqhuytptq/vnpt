<?php

namespace App\Controllers;

use App\Config\Database;
use App\Entity\Khoi;
use App\Repository\KhoiRepository;
use Exception;


class KhoiController
{
    protected $repository;

    public function __construct()
    {
        $db = new Database();
        $this->repository = new KhoiRepository($db->connect());
    }

    public function store($name)
    {
        try {
            $khoi = new Khoi($name);
            $this->repository->insert($khoi);
            echo "Thêm Khối thành công!";
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
        $khois = $this->repository->getAll();

        foreach ($khois as $khoi) {
            echo "Khối: " . $khoi['ten_khoi'] . "<br>";
        }
    }
    public function submitRequest()
    {
        // $khoiController = new KhoiController();

        if (isset($_POST['submitKhoi'])) {
            $this->store(
                $_POST['nameKhoi']
            );
        }


        if (isset($_POST['showListKhoi'])) {
            $this->index();
        }
    }
}
