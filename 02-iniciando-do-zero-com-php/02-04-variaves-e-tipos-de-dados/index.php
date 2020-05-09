<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.04 - Variáveis e tipos de dados");

/**
 * [tipos de dados] https://php.net/manual/pt_BR/language.types.php
 * [ variáveis ] https://php.net/manual/pt_BR/language.variables.php
 */
fullStackPHPClassSession("variáveis", __LINE__);

# Recomendações
# usar o camelCase
# usar as variáveis em inglês

# CamelCase
$userFirstName = "Robson";
$userLastName = "Leite";
echo "<h3>{$userFirstName} {$userLastName}</h3>";

# Outro formato existente é o underscore
$user_first_name = "Robson";
$user_last_name = "Leite";
echo "<h3>{$user_first_name} {$user_last_name}</h3>";

# Ambos estão corretos, mas se um for escolhido use-o em todo o sistema somente um tipo

$userAge = 32;
echo "<p>{$userFirstName} {$userLastName} <span class='tag'>tem {$userAge}</span></p>";

# Oredem de sequencia da criação e exibição de variável
# Deve-se criar uma variável antes de usá-la de fato
echo $userEmail;
$userEmail = "cursos@upinside.com.br";

# Variável variável
$company = "Upinside";
$$company = "Treinamentos";
echo "<h3>{$company} {$Upinside}</h3>";

# Referencia
$calcA = 10;
$calcB = 20;

var_dump([
    "a" => $calcA,
    "b" => $calcB
]);

# As variávei tem o mesmo valor mas são armazenadas
#  em endereço de memória diferente
$calcB = $calcA;

var_dump([
    "a" => $calcA,
    "b" => $calcB
]);

# As variávei tem o mesmo valor e se referenciam ao mesmo endereço de memória
#  em endereço de memória diferente
$calcB = &$calcA;

$calcA = 50; // Quando muda um as duas variáveis são alteradas

var_dump([
    "a" => $calcA,
    "b" => $calcB
]);

/**
 * [ tipo boleano ] true | false
 */
fullStackPHPClassSession("tipo boleano", __LINE__);

# Os tipos boleanos servem para validar condições
# Devem ser escritas SEMPRE em minusculas. Seguindo as PSR.
$true = true;
$false = false;

var_dump($true, $false);

$bestAge = ($userAge > 50);
var_dump($bestAge);

# Cuidado pois o PHP interpreta alguns valores como sendo boleano
$a = 0;
$b = 0.0;
$c = "";
$d = [];  // array vazio
$e = null;

var_dump($a ,$b, $c, $d, $e);

echo "<p>Verifica se tem algum true</p>";
if($a || $b || $c || $d || $e){
    var_dump(true);
}else{
    var_dump(false);
}

/**
 * [ tipo callback ] call | closure
 */
fullStackPHPClassSession("tipo callback", __LINE__);

# Callback funções com nome
$code = "<article><h1>Um Call User function</h1></article>";
$codeClear = call_user_func("strip_tags",$code);
var_dump($code, $codeClear);

$codeClear2 = strip_tags($code);
var_dump($code, $codeClear2);

# Callback funções anônimas (closures)
$codeMore = function($code){
    var_dump($code);
};

$codeMore("#BoraProgramar");

/**
 * [ outros tipos ] string | array | objeto | numérico | null
 */
fullStackPHPClassSession("outros tipos", __LINE__);

# Vários tipos de variáveis
$string = "Olá Mundo";
$array = [$string];
$object = new StdClass();
$object->hello = $string;
$null = null;
$int = 12132;
$float = 1.23213;

var_dump(
        $string,
        $array,
        $object,
        $null,
        $int,
        $float
);
