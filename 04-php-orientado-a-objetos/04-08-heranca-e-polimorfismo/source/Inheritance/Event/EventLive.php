<?php

namespace Source\Inheritance\Event;

use Source\Inheritance\Address;

# Herança -> Herda as propriedades e métodos da classe mãe Event

class EventLive extends Event
{
    /*
     * @var Address
     */

    private $address;

    public function __construct($event, \Datetime $date, $price, $vacancies, Address $address)
    {
        parent::__construct($event, $date, $price, $vacancies);
        $this->address = $address;
    }
    
    function getAddress(): Address
    {
        return $this->address;
    }



}
