<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.03 - Comandos de saída");

/**
 * [ echo ] https://php.net/manual/pt_BR/function.echo.php
 */
fullStackPHPClassSession("echo", __LINE__);

echo "<h3>Olá Mundo!</h3>";                                                     // echo da forma comum
echo "<p>Olá Mundo!", " ","<span class='tag'>#BoraProgramar</span>", "</p>";    // echo com vírgulas

$hello = "Olá Mundo!";                              // Variáveis 
$code = "<span class='tag'>#BoraProgramar</span>";

echo "<p>$hello</p>";   // echo com aspas duplas e variável
echo '<p>$hello</p>';   // echo com aspas simples e variável (não é interpretado)

$day = "dia";
echo "<p>Falta 1 $day para o evento!</p>";      // exemplo que funciiona
echo "<p>Faltam 2 $days para o evento!</p>";    // exemplo que NÂO funciiona GERA UM ERRO !
echo "<p>Faltam 2 {$day}s para o evento!</p>";  // exemplo que protege a variável e funciona

# O recomendado é SEMPRE usar aspas duplas e variável protegida
echo "<h3>{$hello}</h3>";
echo "<h4>{$hello} {$code}</h4>";

# Posso também concaenar
echo "<h4>" . $hello . " " . $code ."</h4>";

# Fora do escopo do PHP
?>

Aqui somente HTML

<!-- Dentro do escopo do HTML não funciona variável -->
<h4>$hello</h4>

<!-- Para funcionar podemos fazer assim -->
<h4><?php echo $hello ?></h4>

<!-- Ou ainda podemos usar o ?= que é um atalho para ?php echo  -->
<h4><?= $hello ?> <?= $code ?></h4>
<?php

/**
 * [ print ] https://php.net/manual/pt_BR/function.print.php
 */
fullStackPHPClassSession("print", __LINE__);

# print usa somente um por linha, não aceita a vírgula
print $hello;
print $code;

print "<h3>{$hello} {$code}</h3>";

/**
 * [ print_r ] https://php.net/manual/pt_BR/function.print-r.php
 */
fullStackPHPClassSession("print_r", __LINE__);

# Usado para exibir arrays
$array = [
    "company" => "Upside",
    "course" => "FSPHP",
    "class" => "Comandos de saída"
];

# Se usar o echo para exibir um array dá ERRO !!
echo $array;

# Se usar o print para exibir um array dá ERRO tembém!!
print $array;

echo "<br/>";
echo "<br/>";

# Se usar o print_r para exibir um array... FUNCIONA !!!
print_r($array);

# A exibição fica confusa... para melhorar usamoe o echo e o pre
echo "<pre>", print_r($array), "</pre>";

# Repare que é exibido o número 1 depois do array. 
# É um true que o print_r retorna para informar que consegui exibir o print_r. 
# (ESSA PARTE NÃO ENTENDI)
# Para tirar esse true informo um segundo parâmetro no print_r
echo "<pre>", print_r($array, true), "</pre>";

/**
 * [ printf ] https://php.net/manual/pt_BR/function.printf.php
 */
fullStackPHPClassSession("printf", __LINE__);

# Dá saída para uma variável formatada

# Vamos imaginar um artigo
$article = "<article><h1>%s</h1><p>%s</p></article>";
$title = "{$hello} {$code}";
$subtitle = "The standard chunk of Lorem Ipsum used since the 1500s is"
        . " reproduced below for those interested. Sections 1.10.32 and"
        . " 1.10.33 from 'de Finibus Bonorum et Malorum' by Cicero are"
        . " also reproduced in their exact original form, accompanied by"
        . " English versions from the 1914 translation by H. Rackham.";

printf($article, $title, $subtitle);

# Posso inibir a exibição do printf chamando o sprintf
# dessa forma não aparece nada
sprintf($article, $title, $subtitle);

# Isso serve para armqzenar esse conteúdo em uma outra variável.
# Daí para exibir é só colocar um echo
echo sprintf($article, $title, $subtitle);

# Veja em https://www.php.net/manual/pt_BR/function.sprintf.php
# o diversos tipos de parametros para o printf.
# Por exemplo: o %s é para string.

/**
 * [ vprintf ] https://php.net/manual/pt_BR/function.vprintf.php
 */
fullStackPHPClassSession("vprintf", __LINE__);

# o vprintf funciona de maneira idêntica somente tirando os valores de um array
$company = "<article><h1>Escola %s</h1><p>Curso <b>%s</b>, aula <b>%s</b></p></article>";
vprintf($company, $array);

# Também tem o comando inibindo a saída 
vsprintf($company, $array);

# Somente com o echo 
echo vsprintf($company, $array);

/**
 * [ var_dump ] https://php.net/manual/pt_BR/function.var-dump.php
 */
fullStackPHPClassSession("var_dump", __LINE__);

# è usado para um debug maior das váriáveis a serem exibidas.
# Algo semelhante ao echo "<pre>", print_r($array, true), "</pre>";
# Só que mais completo

var_dump($array);

# Repare a diferença
echo "<pre>", print_r($array, true), "</pre>";

# Vc pode debugar várias variávei de uma só vez
var_dump(
        $array,
        $company,
        $code,
        $company
);
