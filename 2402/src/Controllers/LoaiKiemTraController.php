<?php

namespace App\Controllers;

use App\Config\Database;
use App\Entity\LoaiKiemTra;
use App\Repository\LoaiKiemTraRepository;
use Exception;


class LoaiKiemTraController
{
    protected $repository;

    public function __construct()
    {
        $db = new Database();
        $this->repository = new LoaiKiemTraRepository($db->connect());
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
    public function getAll()
    {
        return $this->repository->getAll();
    }
    public function index()
    {
        $loaiKiemTras = $this->repository->getAll();

        foreach ($loaiKiemTras as $loaiKiemTra) {
            echo "Loại Kiểm Tra: " . $loaiKiemTra['ten_loai'] . " - Hệ Số: " . $loaiKiemTra['he_so'] . "<br>";
        }
    }
    public function submitRequest()
    {


        // $loaiKiemTraController = new LoaiKiemTraController();

        if (isset($_POST['submitLoaiKiemTra'])) {
            $this->store(
                $_POST['nameLoaiKiemTra'],
                $_POST['heSoLoaiKiemTra']
            );
        }


        if (isset($_POST['showListLoaiKiemTra'])) {
            $this->index();
        }
    }
}
