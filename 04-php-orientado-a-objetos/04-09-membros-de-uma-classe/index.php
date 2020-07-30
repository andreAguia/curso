<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.09 - Membros de uma classe");

require __DIR__ . "/source/autoload.php";

/*
 * [ constantes ] http://php.net/manual/pt_BR/language.oop5.constants.php
 */
fullStackPHPClassSession("constantes", __LINE__);

use Source\Members\Config;

$config = new Config();

# Dá erro usar com chaves
#echo "<p>{$config::COMPANY}</p>";
#
# Tem que usar concatenando
echo "<p>" . $config::COMPANY . "</p>";

# O var dump não exibe as constantes, pois são elementos da classe Config
# e não do objeto $config
var_dump($config);

# Para exibir deve-se da seguinte forma
var_dump(
        $config::COMPANY,
//      $config::DOMAIN,    // protected
//      $config::SECTOR     // privete
);

# O var_dump não informa os valores das constantes de uma class
# O php tem uma classe nativa que fornece TODAS as informações de uma classe
# de seus valores: ReflectionClass()
# Com relação ao objeto: $objectReflection = new ReflectionClass($config);
# ou com relação a classe: $classReflection = new ReflectionClass(Config::class);
$reflection = new ReflectionClass(Config::class);
# ou $reflection = new ReflectionClass('Source\Members\Config');

var_dump($reflection);

# Para ver todos os métodos da classe ReflectionClass
#var_dump(get_class_methods($reflection));

# Dessa forma, para termos as constantes:
var_dump($reflection->getConstants());

/*
 * [ propriedades ] http://php.net/manual/pt_BR/language.oop5.static.php
 */
fullStackPHPClassSession("propriedades", __LINE__);

# Agora em propriedades, podemos fazer o mesmo comportamento das constantes
# Ou seja. Fazermos que elas sejam propriedades da Classe e não do objeto.
# Faz-se isso definindo com static
# Para manipular essas propriedades
Config::$company = "UpInside";
Config::$domain = "www.upinside.com.br";
Config::$sector = "Educação";

# Observa-se que definindo as propriedades como static
# Novamente não teremos nenhum dado com o var_dump comum
var_dump($config, $reflection->getProperty('company'));

# Para ter acesso as propriedades static
# usa-ese novamente a classe ReclectionClass
var_dump($reflection->getProperties());

# Se tiver um objeto instanciado, podemos usar ele também
$config::$sector = "jujuba";

# Como nós refenciamos Config:: e não $config::
# Só podemos ver com a ReflectionCalss novamente
var_dump($reflection->getDefaultProperties());

/*
 * [ métodos ] http://php.net/manual/pt_BR/language.oop5.static.php
 */
fullStackPHPClassSession("métodos", __LINE__);

# Posso usar o método setConfig de 2 maneiras: usando a classe ou o objeto
$config::setConfig("Jujuba", "jujuba.com.br", "doces");
Config::setConfig("Mariola", "mariola.com.br", "doces");

var_dump($config, $reflection->getMethods(), $reflection->getDefaultProperties());


/*
 * [ exemplo ] Uma classe trigger
 */
fullStackPHPClassSession("exemplo", __LINE__);

use Source\Members\Trigger;

$trigger = new Trigger();
$trigger::show("Olá Mundo");

Trigger::show("Essa é uma mensagem pra o usuário!");
Trigger::show("Essa é uma mensagem pra o usuário!", Trigger::ACCEPT);
Trigger::show("Essa é uma mensagem pra o usuário!", Trigger::WARNING);
Trigger::show("Essa é uma mensagem pra o usuário!", Trigger::ERROR);

echo Trigger::push("Esse é um retorno pra o usuário!");
echo Trigger::push("Esse é um retorno pra o usuário!", Trigger::ACCEPT);
echo Trigger::push("Esse é um retorno pra o usuário!", Trigger::WARNING);
echo Trigger::push("Esse é um retorno pra o usuário!", Trigger::ERROR);

