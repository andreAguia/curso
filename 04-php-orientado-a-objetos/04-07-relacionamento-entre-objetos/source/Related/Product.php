<?php

namespace Source\Related;

class Product
{

    private $name;
    private $price;
    
    function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
    
    function getName()
    {
        return $this->name;
    }

    function getPrice()
    {
        return number_format($this->price,2,",",".");
    }

    function setName($name): void
    {
        $this->name = $name;
    }

    function setPrice($price): void
    {
        $this->price = $price;
    }

}
