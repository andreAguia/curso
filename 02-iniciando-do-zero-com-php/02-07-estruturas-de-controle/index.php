<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.07 - Estruturas de controle");

/*
 * [ if ] https://php.net/manual/pt_BR/control-structures.if.php
 * [ elseif ] https://php.net/manual/pt_BR/control-structures.elseif.php
 * [ else ] https://php.net/manual/pt_BR/control-structures.else.php
 */
fullStackPHPClassSession("if, elseif, else", __LINE__);

$test = false;

if($test){
    var_dump(true);
}else{
    var_dump(false);
}

$age = 32;

if($age < 20){
    var_dump("Bandas Coloridas");
}elseif($age >20 && $age < 50){
    var_dump("Ótimas Bandas");
}else{
    var_dump("Rock And Roll Raiz");
}

# É recomendável (sempre que possível) determinar um bloco else para que o 
# php saiba o que fazer caso não atenda os requesitos da estrutura de controle

/*
 * [ isset ] https://php.net/manual/pt_BR/function.isset.php
 * [ empty] https://php.net/manual/pt_BR/function.empty.php
 */
fullStackPHPClassSession("isset, empty, !", __LINE__);

$rock = "";

if(isset($rock)){
    var_dump("Rock and Roll!!");
}

if(!isset($rock)){
    var_dump("Sad");
}

$rockRolls = "";

if(empty($rockRolls)){
    var_dump("Não existe ou não está tocando");
}else{
    var_dump("Rock existe e toca {$rockRolls}");
}

$rockRolls = null;

if(empty($rockRolls)){
    var_dump("Não existe ou não está tocando");
}else{
    var_dump("Rock existe e toca {$rockRolls}");
}

$rockRolls = "Legião Urbana";

if(empty($rockRolls)){
    var_dump("Não existe ou não está tocando");
}else{
    var_dump("Rock existe e toca {$rockRolls}");
}


/*
 * [ switch ] https://secure.php.net/manual/pt_BR/control-structures.switch.php
 */
fullStackPHPClassSession("switch", __LINE__);

$payment = "canceled";
switch ($payment){
    case "billet_printed":
        var_dump("Boleto Impresso");
        break;
    case "canceled":
        var_dump("Pagamento Cancelado");
        break;
    case "past_due":
    case "pending":
        var_dump("Aguardando Pagamento");
        break;
    case "approved":
    case "completed":
        var_dump("Pagamento Aprovado");
        break;
    default:
        var_dump("Erro ao Processar o Pagamento");
        break;
}


