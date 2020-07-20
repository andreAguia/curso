<?php

namespace Source\Interpretation;

class User
{

    private $firstName;
    private $lastName;
    private $email;

    public function __construct($firstName, $lastName = null, $email = null)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    function setEmail($email): void
    {
        $this->email = $email;
    }

    function getFirstName()
    {
        return $this->firstName;
    }

    function getLastName()
    {
        return $this->lastName;
    }

    function getEmail()
    {
        return $this->email;
    }

    function __clone()
    {
        $this->firstName = null;
        $this->lastName = null;
        echo"<p class='trigger'>CLonou!</p>";
    }

    function __destruct()
    {
        var_dump($this);
        echo"<p class='trigger accept'>O Objet foi destruído!</p>";
    }

}
