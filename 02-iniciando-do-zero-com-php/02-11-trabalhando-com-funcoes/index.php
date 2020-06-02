<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.11 - Trabalhando com funções");

/*
 * [ functions ] https://php.net/manual/pt_BR/language.functions.php
 */
fullStackPHPClassSession("functions", __LINE__);

require __DIR__ . "/functions.php";

# Argumentos obrigatórios
var_dump(functionName("AnaVitoria", "Nina Fernandes", "Tiago Iorc"));

# Argumentos opcionais
var_dump(optionArgs("AnaVitoria"));
var_dump(optionArgs("AnaVitoria", "Tais Alvarenga"));
var_dump(optionArgs("AnaVitoria", "Tais Alvarenga", "Kell Smith"));

/*
 * [ global access ] global $var
 */
fullStackPHPClassSession("global access", __LINE__);

$weight = 86;
$height = 1.83;
echo calcImc();

/*
 * [ static arguments ] static $var
 */
fullStackPHPClassSession("static arguments", __LINE__);

$pay = paytotal(200);

echo $pay;

$pay = paytotal(300);

echo $pay;

$pay = paytotal(50);

echo $pay;

/*
 * [ dinamic arguments ] get_args | num_args
 */
fullStackPHPClassSession("dinamic arguments", __LINE__);

var_dump(myTeam("André", "Matheus", "Arthur"));
