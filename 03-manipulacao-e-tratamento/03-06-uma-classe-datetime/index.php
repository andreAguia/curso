<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.06 - Uma classe DateTime");

/*
 * [ DateTime ] http://php.net/manual/en/class.datetime.php
 */
fullStackPHPClassSession("A classe DateTime", __LINE__);

# Cria uma constante com o formato brasileiro
define("DATE_BR", "d/m/Y H:i:s");

$dateNow = new DateTime();
$dateBirth = new DateTime("1970-06-26");
$dateStatic1 = DateTime::createFromFormat(DATE_BR, "20/03/2020 12:00:00");
$dateStatic2 = DateTime::createFromFormat("d/m/Y", "20/03/2020");

var_dump(
    $dateNow,
    $dateNow->format(DATE_BR),
    $dateNow->format("d"),
    get_class_methods($dateNow),
    $dateBirth,
    $dateStatic1,
    $dateStatic2,
);

echo "<p>Hoje é dia ", $dateNow->format("d"), " de ", $dateNow->format("M"), " do ", $dateNow->format("Y"), "</p>";

echo "<p>Alterando o timezone</p>";
$newTimeZone = new DateTimeZone("Pacific/Apia");
$newDateTime = new dateTime("now", $newTimeZone);

var_dump(
    $newTimeZone,
    $newDateTime,
    $dateNow,
);

echo "<p>Usando o Método diff</p>";

$birth = new DateTime("2020-06-26");
$dateNow = new DateTime("now");
$diff = $dateNow->diff($birth);

var_dump(
    $birth,
    $diff,
);

# Analisando
if ($diff->invert) {
    echo "<p>Seu  aniversário foi a {$diff->days} dias</p>";
} else {
    echo "<p>Seu  aniversário será daqui a {$diff->days} dias</p>";
}

/*
 * [ DateInterval ] http://php.net/manual/en/class.dateinterval.php
 * [ interval_spec ] http://php.net/manual/en/dateinterval.construct.php
 */
fullStackPHPClassSession("A classe DateInterval", __LINE__);

$dateInterval = new DateInterval("P10Y2MT10M");

var_dump(
    $dateInterval,
);

echo "<p>Adicionando 10 anos e 2 meses a data atual</p>";

$dateTime = new DateTime("now");
$dateTime->add($dateInterval);

var_dump(
    $dateTime,
);

echo "<p>Subtraindo 10 anos e 2 meses a data resultante</p>";

$dateTime->sub($dateInterval);

var_dump(
    $dateTime,
);

echo "<p>usando o DateInterval stático</p>";

$outraData = new DateTime("now");
var_dump([
    $outraData->format(DATE_BR),
    $outraData->sub(DateInterval::createFromDateString("10days"))->format(DATE_BR),
    $outraData->add(DateInterval::createFromDateString("10days"))->format(DATE_BR),
]);

/**
 * [ DatePeriod ] http://php.net/manual/pt_BR/class.dateperiod.php
 */
fullStackPHPClassSession("A classe DatePeriod", __LINE__);

echo "<p>Cria uma sequencia de datas com data de início, intervalo e data de fim definidos</p>";

$start = new DateTime("now");
$interval = new DateInterval("P1M");
$end = new DateTime("2022-01-01");

$period = new DatePeriod($start, $interval,$end);

var_dump([
    $start->format(DATE_BR),
    $interval,
    $end->format(DATE_BR)
],  $period,
    get_class_methods($period),
);

echo "<h1>Sua Assinatura</h1>";
foreach($period as $recur){
    echo "<p>Próximo Vencimento {$recur->format(DATE_BR)}</p>";
}