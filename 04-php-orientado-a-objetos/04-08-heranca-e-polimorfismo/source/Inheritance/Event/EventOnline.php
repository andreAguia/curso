<?php

namespace Source\Inheritance\Event;

class EventOnline extends Event
{

    private $link;

    public function __construct($event, \Datetime $date, $price, $link, $vacancies = null)
    {
        parent::__construct($event, $date, $price, $vacancies);
        $this->link = $link;
    }
    
    # Polimorfismo -> sobreescreve o método register da classe mãe Event
    # com um comportamento diferente

    public function register($fullName, $email)
    {
        $this->vacancies += 1;
        $this->setRegister($fullName, $email);
        echo "<p class='trigger accept'>Show {$fullName}, cadastrado com sucesso !!</p>";
    }

}
