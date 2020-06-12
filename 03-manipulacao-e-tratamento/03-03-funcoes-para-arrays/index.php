<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.03 - Funções para arrays");

/*
 * [ criação ] https://php.net/manual/pt_BR/ref.array.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

echo "<p>No início do array</p>";

$index = [
    "AC/DC",
    "Nirvana",
    "Dire Straits"
];

$assoc = [
    "band_1" => "AC/DC",
    "band_2" => "Nirvana",
    "band_3" => "Dire Straits"
];

# incluindo item no começo de um array
# index
array_unshift($index, "Kid Abelha");
array_unshift($index, "Queen", "Legião Urbana");

$index = ["Ana Vitória", "Ana Carolina"] + $index;

# assoc
array_unshift($assoc, "Kid Abelha"); // Não se pode passar a key
$assoc = ["band_0" => "Paralamas do Sucesso"] + $assoc;  // Resolve isso

var_dump(
    $index,
    $assoc
);

echo "<p>No final do array</p>";

$index = [
    "AC/DC",
    "Nirvana",
    "Dire Straits"
];

$assoc = [
    "band_1" => "AC/DC",
    "band_2" => "Nirvana",
    "band_3" => "Dire Straits"
];

# incluindo item no final de um array
#index
array_push($index, "Kell Smith");
array_push($index, "Nina Fernandes", "Mar Aberto");

$index   = $index + ["Djavan", "Seu Jorge"];
$index[] = "Zeca Baleiro";

# assoc
array_push($assoc, "Kid Abelha"); // Não se pode passar a key
// Resolve isso

var_dump(
    $index,
    $assoc
);

echo "<p>Removendo o primeiro item do array</p>";

$index = [
    "AC/DC",
    "Nirvana",
    "Dire Straits"
];

$assoc = [
    "band_1" => "AC/DC",
    "band_2" => "Nirvana",
    "band_3" => "Dire Straits"
];

# Removendo o primeiro item do array
array_shift($index);
array_shift($assoc);

var_dump(
    $index,
    $assoc
);

echo "<p>Removendo o último item do array</p>";

$index = [
    "AC/DC",
    "Nirvana",
    "Dire Straits"
];

$assoc = [
    "band_1" => "AC/DC",
    "band_2" => "Nirvana",
    "band_3" => "Dire Straits"
];


# Removendo o último item do array
array_pop($index);
array_pop($assoc);

var_dump(
    $index,
    $assoc
);

echo "<p>Limpando valores vazios</p>";

$index = [
    "AC/DC",
    "Nirvana",
    "",
    "Dire Straits",
    ""
];

$assoc = [
    "band_1" => "AC/DC",
    "band_2" => "Nirvana",
    "band_3" => "Dire Straits",
    ""
];

$index = array_filter($index);
$assoc = array_filter($assoc);

var_dump(
    $index,
    $assoc
);

/*
 * [ ordenação ] reverse | asort | ksort | sort
 */
fullStackPHPClassSession("ordenação", __LINE__);

echo "<p>Invertendo a ordem do array</p>";

$index = array_reverse($index);
$assoc = array_reverse($assoc);

var_dump(
    $index,
    $assoc
);

echo "<p>Ordenando pelo valor mantendo a associação do índice</p>";

asort($index);
asort($assoc);

var_dump(
    $index,
    $assoc
);

echo "<p>Ordenando pelo índice</p>";

ksort($index);
ksort($assoc);

var_dump(
    $index,
    $assoc
);

echo "<p>Ordenando Reverse pelo índice</p>";

krsort($index);
krsort($assoc);

var_dump(
    $index,
    $assoc
);

echo "<p>Ordenando pelo valor reindexando</p>";

sort($index);
sort($assoc);

var_dump(
    $index,
    $assoc
);

echo "<p>Ordenando inversamente pelo valor reindexando</p>";

rsort($index);
rsort($assoc);

var_dump(
    $index,
    $assoc
);

/*
 * [ verificação ]  keys | values | in | explode
 */
fullStackPHPClassSession("verificação", __LINE__);

echo "<p>Separando os valores das chaves (índices)</p>";

var_dump([
    array_keys($assoc),
    array_values($assoc)
]);

echo "<p>Pesquisando em um array</p>";

if (in_array("AC/DC", $assoc)) {
    echo "<p>TEM</p>";
}

echo "<p>transformando um array em string</p>";

$arrToString = implode(", ", $assoc);
echo "<p>{$arrToString}</p>";

echo "<p>transformando uma string em um array</p>";
var_dump(explode(", ", $arrToString));

/**
 * [ exemplo prático ] um template view | implode
 */
fullStackPHPClassSession("exemplo prático", __LINE__);

$profile = [
    "nome"     => "André",
    "telefone" => "2233-2345",
    "endereco" => "Rua x 123"
];

$template = "
    <article>
        <h1>nome</h1>
        <p>telefone</p>
        <p>endereco</p>
    </article>";

echo $template;

echo str_replace(array_keys($profile), array_values($profile), $template);
