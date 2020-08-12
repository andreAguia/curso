<?php

namespace Source\Related;

class User
{
    private $job;
    private $firstName;
    private $lastName;
    
    function __construct($job, $firstName, $lastName)
    {
        $this->job = $job;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
    
    function getJob()
    {
        return $this->job;
    }

    function getFirstName()
    {
        return $this->firstName;
    }

    function getLastName()
    {
        return $this->lastName;
    }

}
