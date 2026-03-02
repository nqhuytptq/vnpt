<?php

namespace App\Controllers;


use App\Config\Database;
use App\Entity\Teacher;
use App\Repository\TeacherRepository;
use Exception;


class TeacherController
{
    protected $repository;
    protected $pdo;
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->connect();
        $this->repository = new TeacherRepository($this->pdo);
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
    public function getAllData()
    {
        return $this->repository->getAll();
    }

    public function process()
    {
        $teachers = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['submitGV'])) {
                $this->store(
                    $_POST['nameGV'],
                    $_POST['address']
                );
            }

            if (isset($_POST['showListTeacher'])) {
                $teachers = $this->getAllData();
            }
        }
        return $teachers;
    }
    public function __destruct()
    {
        $this->pdo = null;
    }
}
