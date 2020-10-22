<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.05 - Explorando estilos de busca");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

/*
 * [ fetch ] http://php.net/manual/pt_BR/pdostatement.fetch.php
 */
fullStackPHPClassSession("fetch", __LINE__);

$connect = Connect::getInstance();
$read = $connect->query("SELECT * FROM users LIMIT 3");

if (!$read->rowCount()) {
    echo "<p class = 'trigger warning'>Não há registros</p>";
} else {
    /*
     * O fetch informa um registro por vez
     * e coloca o ponteiro no próximo registro
     * 
     * Para pegar todos os registros devemos fazer 3 fetch
     * para pegar todos os registros, pois temos no select
     * o limit 3
     */
    var_dump($read->fetch());
    var_dump($read->fetch());
    var_dump($read->fetch());

    /*
     * a melhor forma de fazer isso é com um laço while
     * que irá executar até encontro o fim dos registros
     * 
     * Os comendos não vão exibir nada pois o ponteiro 
     * já chegou ao fim com os comendos acima
     */
    while ($user = $read->fetch()) {
        var_dump($user);
    }

    /*
     * Se eu execvutar um fetch depois que o ponteiro chega ao 
     * termino dos registro ele informa um false.
     * 
     * O false não aconteceu com o while porque o while impediu que 
     * o fetch fosse executado, pois percebeu o fim de arquivo
     */

    var_dump($read->fetch());
}


/*
 * [ fetch all ] http://php.net/manual/pt_BR/pdostatement.fetchall.php
 */
fullStackPHPClassSession("fetch all", __LINE__);

/*
 * O fetchall fornece todos os registro de uma só vez
 * 
 * Perceba que nesse caso do fetchAll os registros vem em um array
 * de objetos. (objeto devido a configuração da conexão)
 */

$read = $connect->query("SELECT * FROM users LIMIT 3");
var_dump($read->fetchAll());

/*
 * Para se ter os objetos separados novamente temos que usar 
 * o foreach para separaro array
 */

// recarrega o array pois o ponteiro estava no fim
$read = $connect->query("SELECT * FROM users LIMIT 3");

foreach ($read->fetchAll() as $user) {
    var_dump($user);
}


/*
 * [ fetch save ] Realziar um fetch diretamente em um PDOStatement resulta em um clear no buffer da consulta. Você
 * pode armazenar esse resultado em uma variável para manipilar e exibir posteriormente.
 */
fullStackPHPClassSession("fetch save", __LINE__);

/*
 * O fetch save é quando se usa uma variável para armazenar o 
 * resultado de um fetch.
 */

$read = $connect->query("SELECT * FROM users LIMIT 3");
$result = $read->fetchAll();

/*
 * Perceba abaixo que o resultaado do fetchAll está vazio.
 * Isto porque como esse resultado foi descarregado em uma 
 * variável, o ponteiro foi para o fim do arquivo.
 * 
 * Dessa forma para poder ver o resultado é necessário ver a variável
 * 
 * A vantagem é que estando em uma variável o resultado
 * pode ser repetido quantas vezes for necessário para exibir 
 * os registros sem ter o incoveniente de estar com o 
 * ponteiro no fim do registro
 */

var_dump(
        $read->fetchAll(),
        $result,
        $result
);

/*
 * [ fetch modes ] http://php.net/manual/pt_BR/pdostatement.fetch.php
 */
fullStackPHPClassSession("fetch styles", __LINE__);

/*
 * Configuramos na classe Connect para retornar os registros
 * na forma de objetos por padrão.
 * Mas aqui vamos demonstrar como alterar esse padrão para um feth específico
 */

/*
 * Como array numérico
 * Não é recomendado pois não é intuitivo para se obter os valores
 */
$read = $connect->query("SELECT * FROM users LIMIT 1");
foreach ($read->fetchAll(PDO::FETCH_NUM) as $user) {
    var_dump($user, $user[1]);
}

/*
 * Como array associativo
 * O mais rápido em tempo de resposta, pois o PHP trabalha nativamente 
 * com arrays associativos, mas não tem a qualidade de um código orientado
 * a objetos
 */
$read = $connect->query("SELECT * FROM users LIMIT 1");
foreach ($read->fetchAll(PDO::FETCH_ASSOC) as $user) {
    var_dump($user, $user['first_name']);
}

/*
 * Como objeto (padrão)
 * O recomendado. A qualidade so código é muito maior ao se trabalhar com objetos
 * e apesar da perda de desempenho perante o array associativo essa perda é muito
 * pequena e tende a acabar, pois o php está se tornando cada vez
 * mais uma liguagem orientada a objetos
 */
$read = $connect->query("SELECT * FROM users LIMIT 1");
foreach ($read->fetchAll() as $user) {
    var_dump($user, $user->first_name);
}

/*
 * Agora vamos mudar o tipo de objeto de retorno dos registros.
 * Os registros quando estão configurados a retornar como objeto,
 * vem sempre como standard object
 * 
 * A ideia é criar uma classe que vai representar a tabela
 * e colocar os campos em variáveis privadas e criar métodos 
 * de acesso mais seguros e fazer com que esse retorno dos registros
 * também passe por essa nova classe
 * 
 * Para isso usamos a opção fetch_class com o parâmetro da classe
 * que utilizaremos para substituir a standard class
 */

$read = $connect->query("SELECT * FROM users LIMIT 1");
foreach ($read->fetchAll(PDO::FETCH_CLASS, \Source\Database\Entity\UserEntity::class) as $user) {
    /** @var \Source\Database\Entity\UserEntity $user */
    var_dump($user, $user->getFirst_name());
}
