<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author alat
 */
class User {

    public $fisrtName;
    public $lastName;
    public $email;

    public function getFisrtName() {
        return $this->fisrtName;
    }

    public function setFisrtName($fisrtName) {
        $this->fisrtName = filter_var($fisrtName, FILTER_SANITIZE_STRING);
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = filter_var($lastName, FILTER_SANITIZE_STRING);
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

}
