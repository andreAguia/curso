<?php

namespace Source\Traits;

trait AddressTrait {
    private $address;
    
    function getAddress(): Address {
        return $this->address;
    }

    function setAddress(Address $address): void {
        $this->address = $address;
    }


}
