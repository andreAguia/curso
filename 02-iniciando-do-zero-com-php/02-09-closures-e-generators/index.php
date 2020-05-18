<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.09 - Closures e generators");

/*
 * [ closures ] https://php.net/manual/pt_BR/functions.anonymous.php
 */
fullStackPHPClassSession("closures", __LINE__);

# Funções anônimas - Quando vc quer evitar a repetição de uma rotina,
# mas não é tão usada para virar uma função de verdade


$myage = function ($year) {
    $age = date("Y") - $year;
    return "<p>Você tem {$age} anos!</p>";    
};

echo $myage(1986);

## outro exemplo

$real = function ($preco){
    return "R$ ".number_format($preco, 2, ",", ".");
};

echo "<p>O projeto custa {$real(3600)}";

## outro exemplo

$myCard = [];
$myCard["totalPrice"] = 0;

$cardAdd = function ($item, $qtd, $price) use (&$myCard) {
    $myCard[$item] = $qtd * $price;
    $myCard["totalPrice"] += $myCard[$item];
};

$cardAdd("Html5",1,497);
$cardAdd("jQuery",1,497);

var_dump($myCard,$cardAdd);


/*
 * [ generators ] https://php.net/manual/pt_BR/language.generators.overview.php
 */
fullStackPHPClassSession("generators", __LINE__);

# Generator é um recurso que usa uma função que não ocupa memoria
# ideal para processar grande quantidade de dados

# Excemplo SEM generator

$iterator = 100;

function showDates($days){
    $saveDate = [];
    for($day = 1; $day < $days; $day++) {
        $saveDate[] = date("d/m/Y", strtotime("+{$day}days"));
    }
    return $saveDate;
}

echo "<div Style='textalign: center'>";
foreach(showDates($iterator) as $date){
    echo "<small class='tag'>{$date}</small>". PHP_EOL; 
}
echo "</div>";

echo "<br/><hr><br/>";
# Excemplo COM generator

function generatorDates($days){
    for($day = 1; $day < $days; $day++) {
        yield date("d/m/Y", strtotime("+{$day}days"));  // yield é similar ao return
    } 
}

echo "<div Style='textalign: center'>";
foreach(generatorDates($iterator) as $date){
    echo "<small class='tag'>{$date}</small>". PHP_EOL; 
}
echo "</div>";