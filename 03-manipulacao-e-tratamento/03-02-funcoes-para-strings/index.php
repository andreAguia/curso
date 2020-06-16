<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.02 - Funções para strings");

/*
 * [ strings e multibyte ] https://php.net/manual/en/ref.mbstring.php
 */
fullStackPHPClassSession("strings e multibyte", __LINE__);

$string = "o último show do Queen foi incrível! foi fantástico !";

var_dump([
    "string"        => $string,
    "strlen"        => strlen($string),
    "mb_strlen"     => mb_strlen($string),
    "substr"        => substr($string, 5),
    "mb_substr"     => mb_substr($string, 5),
    "strtoupper"    => strtoupper($string),
    "mb_strtoupper" => mb_strtoupper($string),
]);


/**
 * [ conversão de caixa ] https://php.net/manual/en/function.mb-convert-case.php
 */
fullStackPHPClassSession("conversão de caixa", __LINE__);

var_dump([
    "mb_strtoupper"         => mb_strtoupper($string),
    "mb_strtolower"         => mb_strtolower($string),
    "mb_convert_case UPPER" => mb_convert_case($string, MB_CASE_UPPER),
    "mb_convert_case LOWER" => mb_convert_case($string, MB_CASE_LOWER),
    "mb_convert_case TITLE" => mb_convert_case($string, MB_CASE_FOLD),
]);

/**
 * [ substituição ] multibyte and replace
 */
fullStackPHPClassSession("substituição", __LINE__);

var_dump([
    "mb_strlen"        => mb_strlen($string),
    "mb_strpos"        => mb_strpos($string, "Queen"),
    "mb_strrpos"       => mb_strrpos($string, "foi"),
    "mb_substr"        => mb_substr($string, 20, 12),
    "mb_strstr false"  => mb_strstr($string, "foi"),
    "mb_strstr true"   => mb_strstr($string, "foi", true),
    "mb_strrchr true"  => mb_strrchr($string, "foi", true),
    "mb_strrchr false" => mb_strrchr($string, "foi"),
]);

echo "<p>", $string, "<p>";
echo "<p>", str_replace("Queen", "AC/DC", $string), "<p>";
echo "<p>", str_replace(["último", "show", "Queen"], ["primeiro", "vídeo", "AC/DC"], $string), "<p>";

$article = <<<ROCK
    <article>
        <h3>event</h3>
        <p>desc</p>
    </article>
ROCK;

$articleData = [
    "event" => "Rock in Rio",
    "desc"  => $string,
];

echo str_replace(array_keys($articleData), array_values($articleData), $article);

/**
 * [ parse string ] parse_str | mb_parse_str
 */
fullStackPHPClassSession("parse string", __LINE__);

$endPoint = "name=André Luis&email=alataguia@gmail.com";

mb_parse_str($endPoint, $parseEndPoint);

var_dump([
    $endPoint,
    $parseEndPoint,
    (object) $parseEndPoint
]);
