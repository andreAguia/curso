<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Source\Qualifield;

/**
 * Description of User
 *
 * @author alat
 */
class User {

    private $firstName;
    private $lastName;
    private $email;
    private $error;

    public function setUser($firstName, $lastName, $email) {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);

        if (!$this->setEmail($email)) {
            $this->error = "O Email {$email} não é válido";
            return false;
        }
        return true;
    }
    
    public function getError() {
        return $this->error;
    }
    

    public function getFirstName() {
        return $this->firstName;
    }

    private function setFirstName($firstName) {
        $this->firstName = filter_var($firstName, FILTER_SANITIZE_STRING);
    }

    public function getLastName() {
        return $this->lastName;
    }

    private function setLastName($lastName) {
        $this->lastName = filter_var($lastName, FILTER_SANITIZE_STRING);
    }

    public function getEmail() {
        return $this->email;
    }

    private function setEmail($email) {
        $this->email = $email;
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

}
