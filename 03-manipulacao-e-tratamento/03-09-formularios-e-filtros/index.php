<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.09 - Formuários e filtros");

/*
 * [ request ] $_REQUEST
 * https://php.net/manual/pt_BR/book.filter.php
 */
fullStackPHPClassSession("request", __LINE__);

$form       = new StdClass();
$form->name = "";
$form->mail = "";

# A variável $_REQUEST pega tanto get quanto post
echo '<p>Dados capturados através do $_REQUEST</p>';
var_dump($_REQUEST);

$form->method = "post";
#$form->method = "get";

include __DIR__ . "/form.php";


/*
 * [ post ] $_POST | INPUT_POST | filter_input | filter_var
 */
fullStackPHPClassSession("post", __LINE__);

# A Variável $_POST Somente pega quando for post
echo '<p>Dados capturados através do $_POST</p>';
var_dump($_POST);

# Faz a filtragem para cada input
$post = filter_input(INPUT_POST, "name", FILTER_DEFAULT);

# Faz a filtragem para todos os campos usando array
$postArray = filter_input_array(INPUT_POST, FILTER_DEFAULT);

var_dump([
    $post,
    $postArray,
]);

# Verifica usando o array (RECOMEMDADO)
if ($postArray) {     // Se o array retornou true (é que tem valor nele)
    // Ve se tem valores em branco
    if (in_array("", $postArray)) {
        echo "<p class='trigger warning'>Preencha todos os campos!</p>";
    } elseif (!filter_var($postArray['mail'], FILTER_VALIDATE_EMAIL)) {
        echo "<p class='trigger warning'>E-mail informado não é válido !!</p>";
    } else {
        // Retira os caracteres maliciosos
        $save = array_map("strip_tags", $postArray); // Executa a função strip_tags em todos os valores do array
        // Retira todos os espaços antes e depois
        $save = array_map("trim", $save);   // O mesmo com a função trim

        var_dump($save);

        echo "<p class='trigger accept'>Cadastrado com sucesso !!</p>";
    }
}

/*
 * [ get ] $_GET | INPUT_GET | filter_input | filter_var
 */
fullStackPHPClassSession("get", __LINE__);

var_dump($_GET);

$form->method = "get";
include __DIR__ . "/form.php";

# Faz a filtragem para cada input
$get = filter_input(INPUT_GET, "mail", FILTER_VALIDATE_EMAIL);

# Faz a filtragem para todos os campos usando array
$getArray = filter_input_array(INPUT_GET, FILTER_DEFAULT);

var_dump(
        $get,
        $getArray,
);

# Para fazer o tratamento é identico ao efetuado com o post

/*
 * [ filters ] list | id | var[_array] | input[_array]
 * http://php.net/manual/pt_BR/filter.constants.php
 */
fullStackPHPClassSession("filters", __LINE__);

# Os filtros nativos do php
var_dump(
        filter_list(),
        [
            filter_id("validate_email"), // Exibe o id do filtro
            FILTER_VALIDATE_EMAIL, // Caso queira substiruir 
            filter_id("string"), // a constante (não recomendado
            FILTER_SANITIZE_STRING
        ]
);

# Validando de um forma prática vários campos pelo nome
$filterForm = [
    "name" => FILTER_SANITIZE_STRING,
    "mail" => FILTER_VALIDATE_EMAIL,
];

$getForm = filter_input_array(INPUT_GET, $filterForm);

var_dump($getForm);

// Obs: Quando eu estou recebendo os valores eu uso o:
// filter_input
// Ele recebe e já faz o filtro
// $post = filter_input(INPUT_POST, "name", FILTER_DEFAULT);
// Quando eu já recebi os valores eu uso o :
// filter_vars
// Ele Filtra de uma variável
// $postArray = filter_input_array(INPUT_POST, FILTER_DEFAULT);
// filter_var($postArray['mail'], FILTER_VALIDATE_EMAIL)

$email = "email@dominio.com";

var_dump(
        filter_var($email, FILTER_VALIDATE_EMAIL),
        filter_var_array($getForm, $filterForm),
);
