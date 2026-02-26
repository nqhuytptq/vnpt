<?php

namespace App\Entity;

require_once 'Person.php';
class Student extends Person

{
    protected $ngaySinh;
    protected $phai;
    function __construct($name, $ngaySinh, $phai)
    {
        parent::__construct($name);
        $this->ngaySinh = $ngaySinh;
        $this->phai = $phai;
    }

    function getNgaySinh()
    {
        return $this->ngaySinh;
    }
    function getPhai()
    {
        return $this->phai;
    }
}
