<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.12 - Constantes e constantes mágicas");

/*
 * [ constantes ] https://php.net/manual/pt_BR/language.constants.php
 */
fullStackPHPClassSession("constantes", __LINE__);

define("COURSE", "Full Stack PHP");
const AUTHOR = "Robson";

$formation = true;
if ($formation) {
    define("COURSE_TYPE", "Formação");
}
else {
    define("COURSE_TYPE", "Curso");
}

# Exibindo o valor de uma constante
echo "<p>COURSE_TYPE COURSE AUTHOR</p>";
echo "<p>{COURSE_TYPE} {COURSE} {AUTHOR}</p>";

# Nada disso funciona Exitem 2 formas de fazer:
echo "<p>", COURSE_TYPE, " ", COURSE, " ", AUTHOR, "</p>";
echo "<p>" . COURSE_TYPE . " " . COURSE . " " . AUTHOR . "</p>";

/*
 * [ constantes mágicas ] https://php.net/manual/pt_BR/language.constants.predefined.php
 */
fullStackPHPClassSession("constantes mágicas", __LINE__);

var_dump([
    __LINE__,
    __FILE__,
    __DIR__
]);
function fullStackPHP()
{
    return __FUNCTION__;
}

var_dump(fullStackPHP());
