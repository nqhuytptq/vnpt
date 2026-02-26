<?php

namespace App\Controllers;


use App\Config\Database;
use App\Entity\Teacher;
use App\Repository\TeacherRepository;
use Exception;


class TeacherController
{
    protected $repository;

    public function __construct()
    {
        $db = new Database();
        $this->repository = new TeacherRepository($db->connect());
    }

    public function store($name, $diaChi)
    {
        try {
            $teacher = new Teacher($name, $diaChi);
            $this->repository->insert($teacher);
            echo "Thêm GV thành công!";
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
        $teachers = $this->repository->getAll();

        foreach ($teachers as $teacher) {
            echo "Tên: " . $teacher['ho_ten'] . ". Địa chỉ: " . $teacher['dia_chi'] . "<br>";
        }
    }
    public function submitRequest()
    {
        // $teacherController = new TeacherController();

        if (isset($_POST['submitGV'])) {
            $this->store(
                $_POST['nameGV'],
                $_POST['address']
            );
        }

        if (isset($_POST['showListTeacher'])) {
            $this->index();
        }
    }
}
