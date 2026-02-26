<?php

namespace App\Entity;

class MonHoc
{
    protected $id;
    protected $name;
    function __construct($name)
    {
        $this->name = $name;
    }
    function getId()
    {
        return $this->id;
    }
    function getName()
    {
        return $this->name;
    }
}
