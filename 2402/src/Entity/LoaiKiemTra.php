<?php

namespace App\Entity;

class LoaiKiemTra
{
    protected $id;
    protected $name;
    protected $heSo;
    function __construct($name, $heSo)
    {
        $this->name = $name;
        $this->heSo = $heSo;
    }
    function getId()
    {
        return $this->id;
    }
    function getName()
    {
        return $this->name;
    }
    function getHeSo()
    {
        return $this->heSo;
    }
}
