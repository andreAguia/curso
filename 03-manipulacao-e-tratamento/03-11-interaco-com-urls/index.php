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

$arguments1 = http_build_query($data);
echo "<p><a href='index.php?{$arguments1}'>Args by Array</a></p>";

var_dump($_GET);

$data2 = [
    "name"    => "Arthur",
    "company" => "Casa",
];

$object = (object) $data2;

$arguments2 = http_build_query($object);
echo "<p><a href='index.php?{$arguments2}'>Args by Object</a></p>";

var_dump(
        $arguments1,
        $arguments2,
        $object,
        http_build_query($object),
        $_GET,
);

/*
 * [ segurança ] get | strip | filters | validation
 * [ filter list ] https://php.net/manual/en/filter.filters.php
 */
fullStackPHPClassSession("segurança", __LINE__);

$dataFilter = http_build_query([
   "name"=>"André",
    "company"=>"Uenf",
    "mail"=>"jujuba@gmail.com",
    "site"=>"www.jujuba.com.br",
    "script"=>"<script>alert('Isso é JavaScript')</script>",
]);

echo "<p><a href='index.php?{$dataFilter}'>DAta Filter</a></p>";

$dateUrl = filter_input_array(INPUT_GET,FILTER_SANITIZE_STRIPPED);

if($dateUrl){
    if(in_array("", $dateUrl)){
        echo "<p class='trigger warning'> Faltam Dados</p>";
    }elseif(empty($dateUrl["mail"])){
        echo "<p class='trigger warning'> Falta o e-mail</p>";
    }elseif(!filter_var($dateUrl["mail"],FILTER_VALIDATE_EMAIL)){
        echo "<p class='trigger warning'>E-mail Inválido</p>";
    }else{
        echo "<p class='trigger accept'>Tudo Certo !!</p>";
    }
}else{
    var_dump(false);
}
var_dump($dateUrl);