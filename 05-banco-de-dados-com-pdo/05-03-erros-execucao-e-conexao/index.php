<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.03 - Errors, conexão e execução");

/*
 * [ controle de erros ] http://php.net/manual/pt_BR/language.exceptions.php
 */
fullStackPHPClassSession("controle de erros", __LINE__);

/*
 * A Classe Exception é uma classe que guarda o erro que acontece dentro de um 
 * bloco try e guarda no objeto. Dai temos várias formas de identificar o erro
 */
try {
    // Forçando manualmente um erro para aparecer a mensagem
    throw new Exception("Erro Geral !"); 
} catch (Exception $ex) {
    // Exibe o erro 
    echo "<p class='trigger error'>{$ex->getMessage()}</p>";
}

/*
 * quando se fala em acesso a banco de dados, o php tem uma classe de erros
 * exclusiva para banco de dados que herda a Exception. Essa classe exclusiva
 * para o tratamento de erros no acesso ao banco de dados é o PDOException 
 */
try {
    // Forçando manualmente um erro para aparecer a mensagem
    throw new PDOException("Erro no banco de dados !!"); 
} catch (PDOException $ex) {
    // Exibe o erro 
    echo "<p class='trigger error'>{$ex->getMessage()}</p>";
}

/*
 * Observe que  o PDOExceptio somente trata erros de banco de dados.
 * Error gerais não são alcançados. Dessa forma temos a estrtutura abaixo 
 * para tratar de todos os casos
 */
try {
    // Forçando manualmente um erro para aparecer a mensagem
    throw new Exception("Erro Geral Primeiro !!"); 
    throw new PDOException("Erro no banco de dados Depois!!"); 
} catch (PDOException $ex) {
    // Exibe o erro 
    echo "<p class='trigger error'>{$ex->getMessage()}</p>";
} catch (Exception $ex) {
    // Exibe o erro 
    echo "<p class='trigger error'>{$ex->getMessage()}</p>";
}

/*
 * Perceba que somente apareceu o primeiro erro, pois ao acontecer o erro 
 * o fluxo do programa é alterado para a rotina do cach
 */

/*
 * Podemos melhorar a estrutura acima utilizando a forma abaixo
 */

try {
    // Forçando manualmente um erro para aparecer a mensagem
    throw new Exception("Erro Geral Primeiro !!"); 
    throw new PDOException("Erro no banco de dados Depois!!"); 
} catch (PDOException | Exception $ex) {
    // Exibe o erro 
    echo "<p class='trigger error'>{$ex->getMessage()}</p>";
} 

/*
 * Vamos analisar o PDOExeptio com o var dump
 */

try {
    // Forçando manualmente um erro para aparecer a mensagem
    throw new PDOException("Erro no banco de dados !!"); 
} catch (PDOException $ex) {
    // Exibe o erro 
    var_dump($ex);
}

/*
 * Finalmente quando não tem erros o bloco finally é executado
 */
try {
    // Forçando manualmente um erro para aparecer a mensagem
    #throw new Exception("Erro Geral Primeiro !!"); 
    #throw new PDOException("Erro no banco de dados Depois!!"); 
} catch (PDOException | Exception $ex) {
    // Exibe o erro 
    echo "<p class='trigger error'>{$ex->getMessage()}</p>";
} finally {
    echo "<p>terminado</p>";
}
/*
 * [ php data object ] Uma classe PDO para manipulação de banco de dados.
 * http://php.net/manual/pt_BR/class.pdo.php
 */
fullStackPHPClassSession("php data object", __LINE__);

/*
 * Agora que somos craque em tratamebnto de erros no php podemos fazer a conexão
 */
try{
    $pdo = new PDO(
            "mysql:host=localhost;dbname=fullstackphp",
            "root",
            "chewbacca",
            [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ]
            );
    $stmt = $pdo->query("SELECT * FROM users LIMIT 5");
    while($user = $stmt->fetch()){
        var_dump($user);
    }
    
} catch (Exception $ex) {
    var_dump($ex);
}

/*
 * Observe que o método fetch() retorna por padrão um array associativo 
 * e por índice, mas pode-se informar ao PDO que tipo vc prefere para o fetch
 */
try{
    $pdo = new PDO(
            "mysql:host=localhost;dbname=fullstackphp",
            "root",
            "chewbacca",
            [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ]
            );
    $stmt = $pdo->query("SELECT * FROM users LIMIT 5");
    while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
        var_dump($user);
    }
    
} catch (Exception $ex) {
    var_dump($ex);
}


/*
 * [ conexão com singleton ] Conextar e obter um objeto PDO garantindo instância única.
 * http://br.phptherightway.com/pages/Design-Patterns.html
 */
fullStackPHPClassSession("conexão com singleton", __LINE__);

require __DIR__."/../source/autoload.php";

use Source\Database\Connect;

$pdo1 = Connect::getInstance();
$pdo2 = Connect::getInstance();

var_dump($pdo1,$pdo2);
