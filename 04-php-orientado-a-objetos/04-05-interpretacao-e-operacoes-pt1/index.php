<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.05 - Interpretação e operações pt1");

require __DIR__ . "/source/autoload.php";

/*
 * [ construct ] Executado automaticamente por meio do operador new
 * http://php.net/manual/pt_BR/language.oop5.decon.php
 */
fullStackPHPClassSession("__construct", __LINE__);

# A rotina __construct é executada toda vez
# que é feito um operador new para um objeto
$user = new Source\Interpretation\User(
        "André",
        "Luis",
//        "jujuba@gmail.com"
);

var_dump($user);

/*
 * [ clone ] Executado automaticamente quando um novo objeto é criado a partir do operador clone.
 * http://php.net/manual/pt_BR/language.oop5.cloning.php
 */
fullStackPHPClassSession("__clone", __LINE__);

# Copiando o objeto
$andre = $user;

# Quando se modifica $kaue, 
# se modifica $andre também pois é valor por referência
# é como se fosse $var = &$outroVar;
$kaue = $andre;
$kaue->setFirstName("Kaue");
$kaue->setLastName("Cardoso");

# PAra resolver esse problema temos a palavra
# reservada clone
$matheus = clone $andre;
$matheus->setFirstName("Matheus");
$matheus->setLastName("André");

$gustavo = clone $kaue;

var_dump(
        $andre,
        $kaue,
        $matheus,
        $gustavo
);

/*
 * [ destruct ] Executado automaticamente quando o objeto é finalizado
 * http://php.net/manual/pt_BR/language.oop5.decon.php
 */
fullStackPHPClassSession("__destruct", __LINE__);

# Os objetos SEMPRES são destruídos ao final da aplicação
# Dessa forma podemos colocar rotinas que serão executadas
# Nesse momento com a função __destruct

# A destruição dos objetos pode ser feita manualmente com o comando
$andre = null;