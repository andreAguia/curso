<?php

namespace Source\Related;

class Address
{
    private $street;
    private $number;
    private $complement;
    
    function __construct($street, $number, $complement)
    {
        $this->street = $street;
        $this->number = $number;
        $this->complement = $complement;
    }
    
    function getStreet()
    {
        return $this->street;
    }

    function getNumber()
    {
        return $this->number;
    }

    function getComplement()
    {
        return $this->complement;
    }



}
