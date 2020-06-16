<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.04 - Manipulação de objetos");

/*
 * [ manipulação ] http://php.net/manual/pt_BR/language.types.object.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

echo "<p>Exibe o array</p>";

$arrProfile = [
    "nome"     => "André",
    "telefone" => "2233-2345",
    "endereco" => "Rua x 123"
];

var_dump($arrProfile);

echo "<p>Transforma em objeto</p>";

$objProfile = (object) $arrProfile;

var_dump($objProfile);

echo "<p>O telefone do {$arrProfile["nome"]} é {$arrProfile["telefone"]}";
echo "<p>O telefone do {$objProfile->nome} é {$objProfile->telefone}";

echo "<p>Apagando um atributo de um objeto</p>";
$ceo = $objProfile;
unset($ceo->endereco);

var_dump($ceo);

echo "<p>Objeto com vários níveis como se fosse um array associativo multidimensional</p>";

$company                    = new stdClass();
$company->company           = "upinside";
$company->ceo               = $ceo;
$company->manager           = new stdClass();
$company->manager->nome     = "Kaue";
$company->manager->telefone = "3214-6547";

var_dump($company);

/**
 * [ análise ] class | objetcs | instances
 */
fullStackPHPClassSession("análise", __LINE__);

var_dump([
    "class"   => get_class($company),
    "methods" => get_class_methods($company),
    "vars" => get_object_vars($company),
    "parent" => get_parent_class($company),
]);
