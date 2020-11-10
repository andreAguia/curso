<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.07 - PDOStatement e bind modes");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

/**
 * [ prepare ] http://php.net/manual/pt_BR/pdo.prepare.php
 */
fullStackPHPClassSession("prepared statement", __LINE__);

/*
 * Veremos nessa aula as ferramentas que o PHP no oferece para impedir ataques
 * do tipo SQL injection.
 */

$stmt = Connect::getInstance()->prepare("SELECT * FROM users WHERE id = 50");

var_dump(
        $stmt,
        $stmt->rowCount(),
        $stmt->columnCount(),
        $stmt->fetchAll()
);

# Perceba que na situação acima nenhum registro será devolvido, pois 
# o comando utilizado é o prepare que prepara, mas não executa
# Para executar é necessário:

$stmt->execute();

var_dump(
        $stmt,
        $stmt->rowCount(),
        $stmt->columnCount(),
        $stmt->fetchAll()
);

/*
 * A Rotina acima ainda não possui nenhuma proteção
 * contra SQL injection
 */


/*
 * [ bind value ] http://php.net/manual/pt_BR/pdostatement.bindvalue.php
 *
 */
fullStackPHPClassSession("stmt bind value", __LINE__);


$stmt = Connect::getInstance()->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindValue(":id", 50, PDO::PARAM_INT);
$stmt->execute();

var_dump($stmt->fetch());

/*
 * No exemplo acima é utilizado o bindValue que substituio parâmetro
 * pelo valor tratado definindo por ->bindValue. 
 * O parâmetro: PDO::PARAM_INT informa que o valor inserido deverá ser um número inteiro
 */


/*
 * Veja abaixo outra forma de usar o bindvalue * 
 */

$stmt = Connect::getInstance()->prepare("
    INSERT INTO users (first_name,last_name)
    VALUE(?,?)
");

$stmt->bindValue(1, "Gustavo", PDO::PARAM_STR);
$stmt->bindValue(2, "Web", PDO::PARAM_STR);
$stmt->execute();

var_dump($stmt->rowCount(), Connect::getInstance()->lastInsertId());

/*
 * Observe que agora é um insert e que a resposta tradicional é
 * o número de registros afetados para ter certeza que foi gravado com sucesso.
 * E também há uma mudança, ao invés de colocar os parametros identificados por :nome
 * Foi utilizado um número informando que o primeiro item é esse e o segundo é aquele.
 * Também podemos observar que podemos tratar quantos parâmetros forem necessários, 
 * bastando colocar um bindValue embaixo do outro.
 */

/*
 * Atente que essa segunda forma não é recomendada, pois é necessário
 * que se saiba a ordem em que se coloca os bindValue para não inserir o valor no campo errado
 * e caso seja necessário aacrecentar um novo campo deverá alterar várias linhas para não dar errado
 * 
 * Deve-se SEMPRE usar a versão com nomes para não ter esse problema
 * Veja abaixo como seria o correto
 */

$stmt = Connect::getInstance()->prepare("
    INSERT INTO users (first_name,last_name)
    VALUE(:first_name,:last_name)
");

$stmt->bindValue(":first_name", "Gustavo", PDO::PARAM_STR);
$stmt->bindValue(":last_name", "Web", PDO::PARAM_STR);
$stmt->execute();

var_dump($stmt->rowCount(), Connect::getInstance()->lastInsertId());


/*
 * [ bind param ] http://php.net/manual/pt_BR/pdostatement.bindparam.php
 */
fullStackPHPClassSession("stmt bind param", __LINE__);

/*
 * O bindParam é igual ao bindValue, mas somente podemos trabalhar com ele
 * somente com variáveis e não com valor diretamente.
 */

$stmt = Connect::getInstance()->prepare("
    INSERT INTO users (first_name,last_name)
    VALUE(:first_name,:last_name)
");

$fn = "André";
$ln = "Águia";

$stmt->bindParam(":first_name", $fn, PDO::PARAM_STR);
$stmt->bindParam(":last_name", $ln, PDO::PARAM_STR);
$stmt->execute();

var_dump($stmt->rowCount(), Connect::getInstance()->lastInsertId());

/* Çembrando que o bindValue aceita variáveis e valores, mas o bindParam somente variáveis

  /*
 * [ execute ] http://php.net/manual/pt_BR/pdostatement.execute.php
 */
fullStackPHPClassSession("stmt execute array", __LINE__);

/*
 * Agora valor inserir um array diretamente no execute.
 */

$stmt = Connect::getInstance()->prepare("
    INSERT INTO users (first_name,last_name)
    VALUE(:first_name,:last_name)
");

$user = [
    "first_name" => "Matheus",
    "last_name" => "André"
];

$stmt->execute($user);
var_dump($stmt->rowCount(), Connect::getInstance()->lastInsertId());

/*
 * [ bind column ] http://php.net/manual/en/pdostatement.bindcolumn.php
 */
fullStackPHPClassSession("bind column", __LINE__);

/*
 * Associa a saida de um select com uma variável.
 * Veja a utilidade disso:
 */

$stmt = Connect::getInstance()->prepare("SELECT * FROM users LIMIT 3");
$stmt->execute();

$stmt->bindColumn("first_name", $name);
$stmt->bindColumn("email", $email);

foreach ($stmt->fetchAll() as $user){
    var_dump($user);
    echo "O email de {$name} é {$email}";
}

/*
 * Não se deve usar o foreach, pois como usamos o fetchall
 * ele carrega todos os registros e a vbariável é a última sempre
 * Nesse caso o melhor é usar o while e o feth simples
 */

$stmt = Connect::getInstance()->prepare("SELECT * FROM users LIMIT 2");
$stmt->execute();

$stmt->bindColumn("first_name", $name);
$stmt->bindColumn("email", $email);

while ($user = $stmt->fetch()){
    var_dump($user);
    echo "O email de {$name} é {$email}";
}

/*
 * Agora sim.
 */

