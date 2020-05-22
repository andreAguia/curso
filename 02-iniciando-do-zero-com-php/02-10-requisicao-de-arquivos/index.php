<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.10 - Requisição de arquivos");

/*
 * [ include ] https://php.net/manual/pt_BR/function.include.php
 * [ include_once ] https://php.net/manual/pt_BR/function.include-once.php
 */
fullStackPHPClassSession("include, include_once", __LINE__);

# include inclui arquivo mas não trava o programa caso o arquivo não exista
#include "file.php";

# Funciona pois ele procura no diretório desse código
include "header.php";

# Mas o ideal é usar a constande mágica ___DIR___
include __DIR__."/header.php";

$profile = new StdClass();
$profile->nome = "André";
$profile->cargo = "Administrador";

include './profile.php';

$profile = new StdClass();
$profile->nome = "Kátia";
$profile->cargo = "Apoio Acadêmico";

include './profile.php';

$profile = new StdClass();
$profile->nome = "Matheus";
$profile->cargo = "Analista de Sistemas";

include_once './profile.php';   // O arquivo não é incluído pois ele jká foi incluído.
# o include_once garante que o arquivo é incluído uma vez. Como ele já foi incluído antes
# o php não faz nada.

# Quando vc quer garantir que o arquivo será incluído somente uma vez. Tipo arquivo de configuração. 
# Senão as constantes configuradas em seu arquivo serão reconfiguradas gerando um erro

/*
 * [ require ] https://php.net/manual/pt_BR/function.require.php
 * [ require_once ] https://php.net/manual/pt_BR/function.require-once.php
 */
fullStackPHPClassSession("require, require_once", __LINE__);

# require trava o programa caso o arquivo não exista
#require "file.php";

require './profile.php';