<?php

namespace App\Controllers;

use App\Config\Database;
use App\Entity\KhoiMon;
use App\Repository\KhoiMonRepository;
use Exception;


class KhoiMonController
{
    protected $repository;
    protected $pdo;
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->connect();
        $this->repository = new KhoiMonRepository($this->pdo);
    }

    public function store($khoiId, $monId)
    {
        try {
            $khoiMon = new KhoiMon($khoiId, $monId);
            $this->repository->insert($khoiMon);
            echo "Thêm môn học của khối thành công!";
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

        $khoiMons = [];
        if ($_SERVER['REQUEST_METHOD'] === "POST") {


            if (isset($_POST['submitKhoiMon'])) {
                $this->store(
                    $_POST['khoiId'],
                    $_POST['monId'],


                );
            }

            if (isset($_POST['showListKhoiMon'])) {
                $khoiMons = $this->getAllData();
            }
        }
        return $khoiMons;
    }
    public function __destruct()
    {
        $this->pdo = null;
    }
}