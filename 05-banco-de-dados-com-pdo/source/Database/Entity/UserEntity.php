<?php

namespace Source\Database\Entity;

class UserEntity
{
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $document;
    
    function getFirst_name()
    {
        return $this->first_name;
    }


}
