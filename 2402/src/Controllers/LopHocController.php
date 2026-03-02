<?php

namespace App\Controllers;

use App\Config\Database;
use App\Entity\LopHoc;
use App\Repository\LopHocRepository;
use Exception;


class LopHocController
{
    protected $repository;
    protected $pdo;
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->connect();
        $this->repository = new LopHocRepository($this->pdo);
    }

    public function store($khoiId, $gvcnId, $tenLop, $namHoc)
    {
        try {
            $lopHocs = new LopHoc($khoiId, $gvcnId, $tenLop, $namHoc);
            $this->repository->insert($lopHocs);
            echo "Thêm lớp học thành công!";
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getAllData()
    {
        return $this->repository->getAll();
    }
    public function getPhieuDiem($hocSinhId)
    {
        return $this->repository->getPhieuDiemHS($hocSinhId);
    }
    public function process()
    {
        $lopHocs = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['submitLopHoc'])) {
                $this->store(
                    $_POST['khoiId'],
                    $_POST['gvId'],
                    $_POST['tenLop'],
                    $_POST['namHoc']
                );
            }
            if (isset($_POST['showListLopHoc'])) {
                $lopHocs = $this->getAllData();
            }
            return $lopHocs;
        }
    }


    public function __destruct()
    {
        $this->pdo = null;
    }
}
