<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.05 - Manipulação de datas");

/*
 * [ a função date ] setup | output
 * [ date ] https://php.net/manual/pt_BR/function.date.php
 * [ timezones ] https://php.net/manual/pt_BR/timezones.php
 */
fullStackPHPClassSession("a função date", __LINE__);

echo "<p>Função date</p>";

var_dump([
    date_default_timezone_get(),
    date(DATE_W3C),
    date("d/m/Y"),
]);

echo "<p>Hoje é dia ",date('d')," de ",date('F')," de ",date('Y'),"</p>";

define("DATE_BR","d/m/Y");

var_dump(
    date(DATE_BR)
);

echo "<p>Função getdate</p>";

var_dump(getdate());

echo "<p>Hoje é dia ",getdate()['mday']," de ",getdate()['month']," de ",getdate()['year'],"</p>";
/**
 * [ string to date ] strtotime | strftime
 */
fullStackPHPClassSession("string to date", __LINE__);

echo "<p>Função strtotime</p>";

var_dump([
    "strtotime now" => strtotime("now"),
    "usando o date" => date(DATE_BR,strtotime("now")),
    "+10 dias" => date(DATE_BR,strtotime("+10days")),
    "-10 dias" => date(DATE_BR,strtotime("-10days")),

    "+30 dias" => date(DATE_BR,strtotime("+30days")),
    "+1 mes" => date(DATE_BR,strtotime("+1month")),

    "+60 dias" => date(DATE_BR,strtotime("+60days")),    
    "+2 mes" => date(DATE_BR,strtotime("+2month")),

    "+5 meses" => date(DATE_BR,strtotime("+5months")),
    "-5 meses" => date(DATE_BR,strtotime("-5months")),
    "+10 anos" => date(DATE_BR,strtotime("+10years")),
    "-10 anos" => date(DATE_BR,strtotime("-10years")),
]);

echo "<p>Função strftime</p>";

$format = "%d/%m/%Y %H:%M minutos";
echo "<p>A data hoje é ",strftime($format),"</p>";
echo "<p>Hoje é dia ",strftime("%d")," de ",strftime("%B")," de ",strftime("%Y"),"</p>";