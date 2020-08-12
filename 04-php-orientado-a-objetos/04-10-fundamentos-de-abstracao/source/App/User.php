<?php

namespace Source\App;

class User
{

    private $fisrtName;
    private $lastName;

    function __construct($fisrtName, $lastName)
    {
        $this->fisrtName = $fisrtName;
        $this->lastName = $lastName;
    }

    function getFisrtName()
    {
        return $this->fisrtName;
    }

    function getLastName()
    {
        return $this->lastName;
    }

}
