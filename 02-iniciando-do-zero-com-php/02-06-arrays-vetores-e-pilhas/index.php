<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.06 - Arrays, vetores e pilhas");

/**
 * [ arrays ] https://php.net/manual/pt_BR/language.types.array.php
 */
fullStackPHPClassSession("index array", __LINE__);

# Array mais simples por índice
$arrA = array(1,2,3);
var_dump($arrA);

# Tome cuidado pois o índice do array sempre começa do zero
$arrA = [0,1,2,3];
var_dump($arrA);

# Acrescentar itens ao array
$arrayIndex = [
    "Kátia",
    "Matheus"
];

$arrayIndex[] = "André";
$arrayIndex[] = "Arthur";

var_dump($arrayIndex);

/**
 * [ associative array ] "key" => "value"
 */
fullStackPHPClassSession("associative array", __LINE__);

$arrayAssoc = [
    "vocal" => "Brian",
    "solo_guitar" => "Angus",
    "base_guitar" => "Malcolm",
    "bass_guitar" => "Cliff"
];

$arrayAssoc["drums"] = "Phil";
$arrayAssoc["rock_band"] = "AC/DC";

var_dump($arrayAssoc);

/**
 * [ multidimensional array ] "key" => ["key" => "value"]
 */
fullStackPHPClassSession("multidimensional array", __LINE__);

# Coloca diversos tipos de arrays juntos
$brian = ["Brian","Mic"];       // index array
$angus = [                      // associative array
    "name" => "Angus",
    "instrument" => "Guitar"
    ];

$instrument = [
    $brian,
    $angus
];

var_dump($instrument);

# Criar um array multi com a primeira camada associativo

var_dump([
    "brian" => $brian,
    "angus" => $angus 
    
]);

# O ideal é mantermos somente um tipo de array juntos.
# O exemplo acima é somente didático

/**
 * [ array access ] foreach(array as item) || foreach(array as key => value)
 */
fullStackPHPClassSession("array access", __LINE__);

$acdc = [
    "band" => "AC/DC",
    "vocal" => "Brian",
    "solo_guitar" => "Angus",
    "base_guitar" => "Malcolm",
    "bass_guitar" => "Cliff",
    "drums" => "Phil"
];

echo "<p>O vocal da banda AC/DC é {$acdc["vocal"]}, junto com {$acdc["base_guitar"]} fazem um ótimo som!</p>";

$pearl = [
    "band" => "Prearl Jam",
    "vocal" => "Eddie",
    "solo_guitar" => "Mike",
    "base_guitar" => "Stone",
    "bass_guitar" => "Jeff",
    "drums" => "Jack"
];

$rockBands = [
    "acdc" => $acdc,
    "pearl_jam" => $pearl
];

var_dump($rockBands);

# Se eu fizer assim vai dar erro pois não informei a primeira camada do array multi
echo "<p>{$rockBands['vocal']}</p>";

# Se eu informar a primeira camada vai dar certo
echo "<p>{$rockBands['pearl_jam']['vocal']}</p>";

# Percorrendo p array
foreach($acdc as $item){
    echo "<p>{$item}</p>";
}

echo "<br/>";

# Outra forma
foreach($acdc as $key => $value){
    echo "<p>{$value} is a {$key} of band!</p>";
}

# Outra forma
foreach($rockBands as $rockBand){
    var_dump($rockBand);
}

# Outra forma
foreach($rockBands as $rockBand){
    $art = "<article>"
            . "<h1>%s</h1>"
            . "<p>%s</p>"
            . "<p>%s</p>"
            . "<p>%s</p>"
            . "<p>%s</p>"
            . "<p>%s</p>"
            . "</article>";
    
    vprintf($art,$rockBand);
}

