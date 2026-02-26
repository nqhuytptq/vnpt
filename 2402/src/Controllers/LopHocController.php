<?php

namespace App\Controllers;

use App\Config\Database;
use App\Entity\LopHoc;
use App\Repository\LopHocRepository;
use Exception;


class LopHocController
{
    protected $repository;

    public function __construct()
    {
        $db = new Database();
        $this->repository = new LopHocRepository($db->connect());
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
    public function getAll()
    {
        return $this->repository->getAll();
    }
    public function index()
    {
        $lopHocs = $this->repository->getAll();

        foreach ($lopHocs as $lopHoc) {
            echo "Lớp " . $lopHoc['ten_lop'] . " khối " . $lopHoc['ten_khoi'] . " do " . $lopHoc['ho_ten'] . " chủ nhiệm <br>";
        }
    }
    public function submitRequest()
    {
        // $lopHocController = new LopHocController();

        if (isset($_POST['submitLopHoc'])) {
            $this->store(
                $_POST['khoiId'],
                $_POST['gvId'],
                $_POST['tenLop'],
                $_POST['namHoc']
            );
        }


        if (isset($_POST['showListLopHoc'])) {
            $this->index();
        }
    }
    public function getPhieuDiem($hocSinhId)
    {
        return $this->repository->getPhieuDiemHS($hocSinhId);
    }
}
