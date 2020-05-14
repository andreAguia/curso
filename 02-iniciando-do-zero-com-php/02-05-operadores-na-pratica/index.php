<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
echo fullStackPHPClassName("02.05 - Operadores na prática");

/**
 * [ operadores ] https://php.net/manual/pt_BR/language.operators.php
 * [ atribuição ] https://php.net/manual/pt_BR/language.operators.assignment.php
 */
fullStackPHPClassSession("atribuição", __LINE__);

# Operadores de atribuição
$operadorA = 5;     // operador mais usado

$operators = [  
    "a += 5" => ($operadorA += 5),  // Adiciona 5
    "a -= 5" => ($operadorA -= 5),  // Diminui 5
    "a *= 5" => ($operadorA *= 5),  // multiplica 5
    "a /= 5" => ($operadorA /= 5),  // divide por 5
];

var_dump($operators);

$incrementA = 5;
$incrementB = 5;

$increment = [
    "pós-incremento" => $incrementA++,  // Exibe e depois incrementa
    "res-incremento" => $incrementA,    // Exibe o novo valor
    "pré-incremento" => ++$incrementA,  // Incrementa e deṕois exibe
    "pós-decremento" => $incrementB--,  // Exibe e depois decrementa
    "res-decremento" => $incrementB,    // Exibe o novo valor
    "pré-decremento" => --$incrementB,  // Decrementa e deṕois exibe
];

var_dump($increment);

/**
 * [ comparação ] https://php.net/manual/pt_BR/language.operators.comparison.php
 */
fullStackPHPClassSession("comparação", __LINE__);

$relatedA = 5;
$relatedB = "5";
$relatedC = 10;

$related = [
    "a == b" => ($relatedA == $relatedB),   // Verifica se o valor é igual
    "a === b" => ($relatedA === $relatedB), // Verifica se o valor e o tipo é igual
    "a != b" => ($relatedA != $relatedB),   // Verifica se o valor é diferente
    "a !== b" => ($relatedA !== $relatedB), // Verifica se o valor e o tipo é difetrente
    "a > c" => ($relatedA > $relatedC),     // Verifica se o valor é maior
    "a < c" => ($relatedA < $relatedC),     // Verifica se o valor é menor
    "a >= b" => ($relatedA >= $relatedB),     // Verifica se o valor é maior ou igual
    "a >= c" => ($relatedA >= $relatedC),     // Verifica se o valor é maior ou igual
    "a <= b" => ($relatedA <= $relatedC),     // Verifica se o valor é menor ou igual
];

var_dump($related);

/**
 * [ lógicos ] https://php.net/manual/pt_BR/language.operators.logical.php
 */
fullStackPHPClassSession("lógicos", __LINE__);

$logicA = true;
$logicB = false;

$logic = [
    "a && b" => ($logicA && $logicB),
    "a AND b" => ($logicA AND $logicB),
    "a || b" => ($logicA || $logicB),
    "a OR b" => ($logicA OR $logicB),
    "a" => ($logicA),
    "b" => ($logicB),
    "!a" => (!$logicA),
    "!b" => (!$logicB),
];

var_dump($logic);

/**
 * [ aritiméticos ] https://php.net/manual/pt_BR/language.operators.arithmetic.php
 */
fullStackPHPClassSession("aritiméticos", __LINE__);

$calcA = 10;
$calcB = 5;

$calc = [
    "a + b" => ($calcA + $calcB),
    "a - b" => ($calcA - $calcB),
    "a * b" => ($calcA * $calcB),
    "a / b" => ($calcA / $calcB),
    "a % b" => ($calcA % $calcB),   // resto
];

var_dump($calc);