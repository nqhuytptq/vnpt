<?php

namespace App\Entity;

class LopHoc
{
    protected $lopId;
    protected $khoiId;
    protected $gvcnId;
    protected $tenLop;
    protected $namHoc;

    public function __construct($khoiId, $gvcnId, $tenLop, $namHoc)
    {
        $this->khoiId = $khoiId;
        $this->gvcnId = $gvcnId;
        $this->tenLop = $tenLop;
        $this->namHoc = $namHoc;
    }

    public function getId()
    {
        return $this->lopId;
    }

    public function getKhoiId()
    {
        return $this->khoiId;
    }

    public function getGvcnId()
    {
        return $this->gvcnId;
    }

    public function getTenLop()
    {
        return $this->tenLop;
    }

    public function getNamHoc()
    {
        return $this->namHoc;
    }
    public function setTenLop($tenLop)
    {
        $this->tenLop = $tenLop;
    }

    public function setNamHoc($namHoc)
    {
        $this->namHoc = $namHoc;
    }
}
