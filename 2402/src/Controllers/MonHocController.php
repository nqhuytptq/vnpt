<?php

namespace App\Controllers;

use App\Config\Database;
use App\Entity\MonHoc;
use App\Repository\MonHocRepository;
use Exception;


class MonHocController
{
    protected $repository;

    public function __construct()
    {
        $db = new Database();
        $this->repository = new MonHocRepository($db->connect());
    }

    public function store($name)
    {
        try {
            $monHoc = new MonHoc($name);
            $this->repository->insert($monHoc);
            echo "Thêm Môn Học thành công!";
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
        $monHocs = $this->repository->getAll();

        foreach ($monHocs as $monHoc) {
            echo "Môn học: " . $monHoc['ten_mon'] . "<br>";
        }
    }
    public function submitRequest()
    {
        // $monHocController = new MonHocController();

        if (isset($_POST['submitMonHoc'])) {
            $this->store(
                $_POST['nameMonHoc']
            );
        }


        if (isset($_POST['showListMonHoc'])) {
            $this->index();
        }
    }
}
