<?php

namespace App\Controllers;


use Exception;
use App\Config\Database;
use App\Entity\Student;
use App\Repository\StudentRepository;


class StudentController
{
    protected $repository;

    public function __construct()
    {
        $db = new Database();
        $this->repository = new StudentRepository($db->connect());
    }

    public function store($name, $ngaySinh, $phai)
    {
        try {
            $student = new Student($name, $ngaySinh, $phai);
            $this->repository->insert($student);
            echo "Thêm HS thành công!";
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
        $students = $this->repository->getAll();

        foreach ($students as $student) {
            echo "Tên: " . $student['ho_ten'] . ". Ngày sinh: " . $student['ngay_sinh'] . "<br>";
        }
    }
    public function submitRequest()
    { // $studentController = new StudentController();

        if (isset($_POST['submitHS'])) {
            $this->store(
                $_POST['nameHS'],
                $_POST['ngaySinh'],
                $_POST['phai']
            );
        }

        if (isset($_POST['showListStudent'])) {
            $this->index();
        }
    }
}
