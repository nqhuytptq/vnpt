<?php

namespace App\Entity;

use App\Entity\Person;

class Teacher extends Person
{

    protected $address;
    function __construct($name, $address)
    {
        parent::__construct($name);
        $this->address = $address;
    }
    function getAddress()
    {
        return $this->address;
    }
}
