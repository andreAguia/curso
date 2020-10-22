<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.12 - Comportamentos com traits");

require __DIR__ . "/source/autoload.php";

/*
 * [ trait ] São traços de código que podem ser reutilizados por mais de uma classe. 
 * Um trait é como um compoetamento do objeto (BEHAVES LIKE). http://php.net/manual/pt_BR/language.oop5.traits.php
 */
fullStackPHPClassSession("trait", __LINE__);

/*
 * Um trait é quando eu perceb que uma parte de uma classe pode ser usada
 * em outra parte do programa, em outra classe e eu posso copiar essa parte
 * e esse comportamento utilizando o trait
 */

$user = new Source\Traits\User("Andre", "Aguia", "alat@uenf.br");
$address = new Source\Traits\Address("Rua A", 123, "Casa 10");

$register = new Source\Traits\Register($user, $address);

var_dump(
        $register,
        $register->getUser(),
        $register->getAddress(),
        $register->getUser()->getFirstName(),
        $register->getAddress()->getStreet()
);

$cart = new \Source\Traits\Cart();
$cart->add(1,"GTD",1,30);
$cart->add(2,"David Coperfielld",2,60);
$cart->add(3,"Fundação",2,200);
$cart->remove(2, 1);
$cart->remove(3, 2);

$cart->checkout($user, $address);

var_dump($cart);