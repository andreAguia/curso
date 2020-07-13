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
    "name" => "Andre",
    "company" => "Uenf",
];

$arguments1 = http_build_query($data);
echo "<p><a href='index.php?{$arguments1}'>Args by Array</a></p>";

var_dump($_GET);

$data2 = [
    "name" => "Arthur",
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

# Cria-se um array
$dataFilter = [
    "name" => "André",
    "company" => "Uenf",
    "mail" => "jujuba@gmail.com",
    "site" => "http://www.jujuba.com.br",
    "script" => "<script>alert('Isso é JavaScript')</script>",
];

# Faz-se uma pré validação entes de enviar
$dataPreFilter = [
    "name" => FILTER_SANITIZE_STRING,
    "company" => FILTER_SANITIZE_STRING,
    "mail" => FILTER_VALIDATE_EMAIL,
    "site" => FILTER_VALIDATE_URL,
    "script" => FILTER_SANITIZE_STRING
];

# Passa Cada item pelo filtro definido no array
# Trata o erro antes de enviar 
$filtrado = filter_var_array($dataFilter, $dataPreFilter);

# Se tudo estiver certo passa o array para o formato de envio por $_GET
$pronto = http_build_query($filtrado);

# Passa para o link
echo "<p><a href='index.php?{$pronto}'>Data Filter</a></p>";

# Pós validação passando o filtro FILTER_SANITIZE_STRIPPED em todos os $_get recebidos
$dateUrl = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRIPPED);

if ($dateUrl) {
    if (in_array("", $dateUrl)) { // Verifica todos os dados (em branco)
        echo "<p class='trigger warning'>Faltam Dados</p>";
    } elseif (empty($dateUrl["mail"])) { // verifica um campo específico (vazio)
        echo "<p class='trigger warning'>Falta o e-mail</p>";
    } elseif (!filter_var($dateUrl["mail"], FILTER_VALIDATE_EMAIL)) {
        echo "<p class='trigger warning'>E-mail Inválido</p>";
     } elseif (!filter_var($dateUrl["site"], FILTER_VALIDATE_URL)) {
        echo "<p class='trigger warning'>URL Inválida</p>";    
    } else {
        echo "<p class='trigger accept'>Tudo Certo !!</p>";
    }
}else{
    var_dump($dateUrl);
}

