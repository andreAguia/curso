<?php

namespace Source\Traits;

trait UserTrait {

    private $user;
    
    function getUser(): User {
        return $this->user;
    }

    function setUser(User $user): void {
        $this->user = $user;
    }



}
