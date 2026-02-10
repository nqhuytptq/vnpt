<?php
require_once 'person.php';
class Teacher extends Person
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
    function get_teacher()
    {
        echo "Thông tin giáo viên. Mã GV: " . $this->id . ". Tên: " . $this->name .  ". Tuổi: " . $this->age;
    }
}
