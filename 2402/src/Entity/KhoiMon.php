<?php

namespace App\Entity;

class KhoiMon
{
    protected $khoiId;
    protected $monId;
    function __construct($khoiId, $monId)
    {
        $this->khoiId = $khoiId;
        $this->monId = $monId;
    }
    function getKhoiId()
    {
        return $this->khoiId;
    }
    function getMonId()
    {
        return $this->monId;
    }
}
