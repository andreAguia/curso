<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.04 - Consultas com query e exec");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

/*
 * [ insert ] Cadastrar dados.
 * https://mariadb.com/kb/en/library/insert/
 *
 * [ PDO exec ] http://php.net/manual/pt_BR/pdo.exec.php
 * [ PDO query ]http://php.net/manual/pt_BR/pdo.query.php
 */
fullStackPHPClassSession("insert", __LINE__);

$insert = "
    INSERT INTO users(first_name, last_name, email,document)
    VALUES('André','Águia','aguia@gmail.com','1321321321');
    ";

try {
    /*
     * Inserindo dados com o exec
     * Com o exec vc sempre tem 2 tipos de retorno: 1 ou 0. 
     * Indicando se a ação foi bem sucedida ou não.
     */
    $exec = Connect::getInstance()->exec($insert);
    var_dump(Connect::getInstance()->lastInsertId());
    var_dump($exec);

    /*
     * Inserindo dados com o query
     * Com o query vc tem uma série de metodos encadeados
     * que te dá uma série de informações adicionais.
     */
//    $query = Connect::getInstance()->query($insert);
//    var_dump(Connect::getInstance()->lastInsertId());
//    var_dump(
//            $query,
//            $query->errorInfo()
//    );
} catch (PDOException $exception) {
    var_dump($exception);
}

/*
 * [ select ] Ler/Consultar dados.
 * https://mariadb.com/kb/en/library/select/
 */
fullStackPHPClassSession("select", __LINE__);

try {
    /*
     * No select não é interessante fazer pelo exec, pois ele não te retorna
     * os registros que vc deseja, já que somente retorna 0 ou 1.
     * Dessa forma somente o query atende o desejado
     */

    $select = "
        SELECT * FROM users LIMIT 5;
        ";

    $query = Connect::getInstance()->query($select);
    var_dump(
            $query,
            $query->rowCount(),
            $query->fetchAll()
    );
} catch (PDOException $exception) {
    var_dump($exception);
}

/*
 * [ update ] Atualizar dados.
 * https://mariadb.com/kb/en/library/update/
 */
fullStackPHPClassSession("update", __LINE__);

try {
    /*
     * No update o exec retorna a quantidade de registros alterados.
     * Ou seja, quando o que va ser alterado é igual ao que está no banco,
     * nada é alterad e o retorno é 0.
     */
    $update = "
        UPDATE users SET first_name = 'Astrogildo', last_name = 'Nepomuceno' 
        WHERE id = '53';
        ";

    $exec = Connect::getInstance()->exec($update);
    var_dump($exec);
} catch (PDOException $exception) {
    var_dump($exception);
}

/*
 * [ delete ] Deletar dados.
 * https://mariadb.com/kb/en/library/delete/
 */
fullStackPHPClassSession("delete", __LINE__);

try {
    /*
     * No delete o exec também retornao número de
     *  registros afetados pelo comando.
     */

    $delete = "
        DELETE FROM users WHERE id > 50;
        ";

    $exec = Connect::getInstance()->exec($delete);
    var_dump(
            $exec
    );
} catch (PDOException $exception) {
    var_dump($exception);
}
