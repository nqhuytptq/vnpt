<?php

namespace App\Entity;

class Diem
{
    protected $diemId;
    protected $hocKy;
    protected $hocSinhId;
    protected $lopId;
    protected $monId;
    protected $loaiKiemTraId;
    protected $namHoc;
    protected $diem;


    function __construct($hocKy, $hocSinhId, $lopId, $monId, $loaiKiemTraId, $namHoc, $diem)
    {
        $this->hocKy = $hocKy;
        $this->hocSinhId = $hocSinhId;
        $this->lopId = $lopId;
        $this->monId = $monId;
        $this->loaiKiemTraId = $loaiKiemTraId;
        $this->namHoc = $namHoc;
        $this->diem = $diem;
    }
    function getDiemId()
    {
        return $this->diemId;
    }
    function getHocKy()
    {
        return $this->hocKy;
    }
    function getHocSinhId()
    {
        return $this->hocSinhId;
    }
    function getLopId()
    {
        return $this->lopId;
    }
    function getMonId()
    {
        return $this->monId;
    }
    function getLoaiKiemTraId()
    {
        return $this->loaiKiemTraId;
    }
    function getNamHoc()
    {
        return $this->namHoc;
    }
    function getDiem()
    {
        return $this->diem;
    }
}