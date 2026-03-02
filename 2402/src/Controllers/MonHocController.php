<?php

namespace App\Controllers;

use App\Config\Database;
use App\Entity\MonHoc;
use App\Repository\MonHocRepository;
use Exception;


class MonHocController
{
    protected $repository;
    protected $pdo;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->connect();

        $this->repository = new MonHocRepository($this->pdo);
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
    public function getAllData()
    {
        return $this->repository->getAll();
    }
    // public function index()
    // {
    //     $monHocs = $this->repository->getAll();

    //     foreach ($monHocs as $monHoc) {
    //         echo "Môn học: " . $monHoc['ten_mon'] . "<br>";
    //     }
    // }
    public function process()
    {
        $monHocs = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['submitMonHoc'])) {
                $this->store(
                    $_POST['nameMonHoc']
                );
            }


            if (isset($_POST['showListMonHoc'])) {
                $monHocs = $this->getAllData();
            }
            return $monHocs;
        }
    }
    public function __destruct()
    {
        $this->pdo = null;
    }
}
