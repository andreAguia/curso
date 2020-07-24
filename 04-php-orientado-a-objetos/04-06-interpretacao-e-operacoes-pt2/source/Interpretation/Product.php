<?php

namespace Source\Interpretation;

class Product
{    
    public $name;
    private $price;
    private $data;

    public function __set($name, $value)
    {
        $this->notFound(__FUNCTION__, $name);
        $this->data[$name] = $value;
    }

    public function handler($name, $price)
    {
        $this->name = $name;
        $this->price = number_format($price, "2", ".", ",");
    }

    public function notFound($method, $name)
    {
        echo "<p class='trigger error'>{$method} A propriedade {$name} não existe em" . __CLASS__ . "!</p>";
    }
}
