<?php

namespace App\Entity;

class Person
{
    protected $id;
    protected $name;
    function __construct($name)
    {
        $this->name = $name;
    }
    function getName()
    {
        return $this->name;
    }
    function getId()
    {
        return $this->id;
    }
    function get_person()
    {
        return "Thông tin cá nhân. Mã: " . $this->id . ". Tên: " . $this->name;
    }
}
