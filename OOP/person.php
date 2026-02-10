<?php
class Person
{
    public static $total;
    protected $name;
    protected $age;
    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
    function suaTen(&$newName)
    {

        $newName = strtoupper($newName);
        $this->name =  $newName;
    }
    function getName()
    {
        return $this->name;
    }
    function getAge()
    {
        return $this->age;
    }
    public static function getTotal()
    {
        return self::$total;
    }
    public static function delete()
    {
        self::$total = 0;
    }
}
