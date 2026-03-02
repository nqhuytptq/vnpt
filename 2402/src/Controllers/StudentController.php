<?php

namespace App\Controllers;


use Exception;
use App\Config\Database;
use App\Entity\Student;
use App\Repository\StudentRepository;


class StudentController
{
    protected $repository;
    protected $pdo;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->connect();

        $this->repository = new StudentRepository($this->pdo);
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

    public function getAllData()
    {
        return $this->repository->getAll();
    }
    // public function index()
    // {
    //     $students = $this->getAllData();
    //     require __DIR__ . '/../Views/quanLyChung.php';
    // }
    public function process()
    {
        $students = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST['submitHS'])) {
                $this->store(
                    $_POST['nameHS'],
                    $_POST['ngaySinh'],
                    $_POST['phai']
                );
            }
            if (isset($_POST['showListStudent'])) {
                $students = $this->getAllData();
            }
        }
        return $students;
    }
    public function __destruct()
    {
        $this->pdo = null;
    }
}
