<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.08 - Herança e polimorfismo");

require __DIR__ . "/source/autoload.php";

/*
 * [ classe pai ] Uma classe que define o modelo base da estrutura da herança
 * http://php.net/manual/pt_BR/language.oop5.inheritance.php
 */
fullStackPHPClassSession("classe pai", __LINE__);

$event = new \Source\Inheritance\Event\Event(
        "WorkShop PHP",
        new DateTime("2019-05-20 16:00"),
        2500,
        4
);

var_dump($event);

$event->register("André Luis", "alataguia@gmail.com");
$event->register("Arthur Águia", "arthuraguia@gmail.com");
$event->register("Matheus André", "mathdantastav@gmail.com");
$event->register("Kátia Simone", "ksgpdt@gmail.com");
$event->register("Sunny Babusca", "sunny@gmail.com");


var_dump($event);

/*
 * [ classe filha ] Uma classe que herda a classe pai e especializa seuas rotinas
 */
fullStackPHPClassSession("classe filha", __LINE__);

fullStackPHPClassSession("classe pai", __LINE__);

$address = new Source\Inheritance\Address("Rua dos Eventos",111);
$event = new \Source\Inheritance\Event\EventLive(
        "WorkShop PHP",
        new DateTime("2019-05-20 16:00"),
        2500,
        4,
        $address
);

var_dump($event); 

$event->register("André Luis", "alataguia@gmail.com");
$event->register("Arthur Águia", "arthuraguia@gmail.com");
$event->register("Matheus André", "mathdantastav@gmail.com");
$event->register("Kátia Simone", "ksgpdt@gmail.com");
$event->register("Sunny Babusca", "sunny@gmail.com");

var_dump($event);

/*
 * [ polimorfismo ] Uma classe filha que tem métodos iguais (mesmo nome e argumentos) a class
 * pai, mas altera o comportamento desses métodos para se especializar
 */
fullStackPHPClassSession("polimorfismo", __LINE__);

$event = new \Source\Inheritance\Event\EventOnline(
        "WorkShop PHP",
        new DateTime("2019-05-20 16:00"),
        2500,
        "http://upinside.com.br/aovivo"
);

var_dump($event); 

$event->register("André Luis", "alataguia@gmail.com");
$event->register("Arthur Águia", "arthuraguia@gmail.com");
$event->register("Matheus André", "mathdantastav@gmail.com");
$event->register("Kátia Simone", "ksgpdt@gmail.com");
$event->register("Sunny Babusca", "sunny@gmail.com");

var_dump($event); 
