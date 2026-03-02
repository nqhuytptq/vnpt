<?php

namespace App\Controllers;

use App\Config\Database;
use App\Entity\Khoi;
use App\Repository\KhoiRepository;
use Exception;


class KhoiController
{
    protected $repository;
    protected $pdo;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->connect();
        $this->repository = new KhoiRepository($this->pdo);
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
    public function getAllData()
    {
        return $this->repository->getAll();
    }
    // public function index()
    // {
    //     $khois = $this->repository->getAll();

    //     foreach ($khois as $khoi) {
    //         echo "Khối: " . $khoi['ten_khoi'] . "<br>";
    //     }
    // }
    public function process()
    {
        $khois = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['submitKhoi'])) {
                $this->store(
                    $_POST['nameKhoi']
                );
            }
            if (isset($_POST['showListKhoi'])) {
                $khois = $this->getAllData();
            }
            return $khois;
        }
    }
    public function __destruct()
    {
        $this->pdo = null;
    }
}
