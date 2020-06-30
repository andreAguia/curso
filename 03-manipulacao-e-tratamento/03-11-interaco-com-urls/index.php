<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.11 - Interação com URLs");

/*
 * [ argumentos ] ?[&[&][&]]
 */
fullStackPHPClassSession("argumentos", __LINE__);

echo "<h1><a href='index.php'>Clear</a></h1>";
echo "<p><a href='index.php?arg1= true&arg2=true'>Argumentos</a></p>";

$data = [
    "name"    => "André",
    "company" => "Uenf",
];

$arguments = http_build_query($data);
echo "<p><a href='index.php?{$arguments}'>Args by Array</a></p>";

var_dump($_GET);

$object = (object) $data;

var_dump(
        $arguments,
        $object,
        http_build_query($object),
);

/*
 * [ segurança ] get | strip | filters | validation
 * [ filter list ] https://php.net/manual/en/filter.filters.php
 */
fullStackPHPClassSession("segurança", __LINE__);
