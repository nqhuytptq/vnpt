<?php

namespace App\Entity;

class HocSinhLop
{
    protected $hocSinhId;
    protected $lopId;
    protected $namHoc;
    function __construct($hocSinhId, $lopId, $namHoc)
    {
        $this->hocSinhId = $hocSinhId;
        $this->lopId = $lopId;
        $this->namHoc = $namHoc;
    }
    function getHocSinhId()
    {
        return $this->hocSinhId;
    }
    function getLopId()
    {
        return $this->lopId;
    }
    function getNamHoc()
    {
        return $this->namHoc;
    }
}
