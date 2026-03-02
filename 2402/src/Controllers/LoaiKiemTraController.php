<?php

namespace App\Controllers;

use App\Config\Database;
use App\Entity\LoaiKiemTra;
use App\Repository\LoaiKiemTraRepository;
use Exception;


class LoaiKiemTraController
{
    protected $repository;
    protected $pdo;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->connect();
        $this->repository = new LoaiKiemTraRepository($this->pdo);
    }

    public function store($name, $heSo)
    {
        try {
            $loaiKiemTras = new LoaiKiemTra($name, $heSo);
            $this->repository->insert($loaiKiemTras);
            echo "Thêm Loại Kiểm Tra thành công!";
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
    //     $loaiKiemTras = $this->repository->getAll();

    //     foreach ($loaiKiemTras as $loaiKiemTra) {
    //         echo "Loại Kiểm Tra: " . $loaiKiemTra['ten_loai'] . " - Hệ Số: " . $loaiKiemTra['he_so'] . "<br>";
    //     }
    // }
    public function process()
    {
        $loaiKiemTras = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['submitLoaiKiemTra'])) {
                $this->store(
                    $_POST['nameLoaiKiemTra'],
                    $_POST['heSoLoaiKiemTra']
                );
            }


            if (isset($_POST['showListLoaiKiemTra'])) {
                $loaiKiemTras = $this->getAllData();
            }

            return $loaiKiemTras;
        }
    }
    public function __destruct()
    {
        $this->pdo = null;
    }
}
