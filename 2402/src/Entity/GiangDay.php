<?php

namespace App\Entity;

class GiangDay
{
    protected $gvId;
    protected $lopId;
    protected $monId;
    protected $namHoc;
    function __construct($gvId, $lopId, $monId, $namHoc)
    {
        $this->gvId = $gvId;
        $this->lopId = $lopId;
        $this->monId = $monId;
        $this->namHoc = $namHoc;
    }
    function getGvId()
    {
        return $this->gvId;
    }
    function getLopId()
    {
        return $this->lopId;
    }
    function getMonId()
    {
        return $this->monId;
    }
    function getNamHoc()
    {
        return $this->namHoc;
    }
}
