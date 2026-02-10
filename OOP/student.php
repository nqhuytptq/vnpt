<?php
require_once 'person.php';
class Student extends Person

{
    protected $id;
    function __construct($id, $name, $age)
    {
        parent::__construct($name, $age);
        $this->id = $id;
    }

    function getId()
    {
        return $this->id;
    }
    function get_student()
    {
        echo "Thông tin sinh viên. Mã SV: " . $this->id . ". Tên: " . $this->name .  ". Tuổi: " . $this->age;
    }
}