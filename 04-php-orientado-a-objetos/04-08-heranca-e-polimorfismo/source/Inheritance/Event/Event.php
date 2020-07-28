<?php

namespace Source\Inheritance\Event;

class Event
{

    private $event;
    private $date;
    private $price;
    private $resgister;
    # Protected -> só pode ser usado pela classe e pelas classes filhas
    protected $vacancies;

    function __construct($event, \Datetime $date, $price, $vacancies)
    {
        $this->event = $event;
        $this->date = $date;
        $this->price = $price;
        $this->vacancies = $vacancies;
    }

    public function register($fullName, $email)
    {
        if ($this->vacancies >= 1) {
            $this->vacancies -= 1;
            $this->setRegister($fullName, $email);
            echo "<p class='trigger accept'>Parabéns {$fullName}, vaga garantida !!</p>";
        } else {
            echo "<p class='trigger error'>Desculpe {$fullName}, vagas esgotadas !!</p>";
        }
    }

    # Protected -> só pode ser usado pela classe e pelas classes filhas
    
    protected function setRegister($fullName, $email)
    {
        $this->resgister = [
            "name" => $fullName,
            "email" => $email
        ];
    }

    function getEvent()
    {
        return $this->event;
    }

    function getDate(): \DateTime
    {
        return $this->date->format("d/m/Y H:i");
    }

    function getPrice()
    {
        return number_format($this->price,2,".",",");
    }

    function getResgister()
    {
        return $this->resgister;
    }

    function getVacancies()
    {
        return $this->vacancies;
    }

}
