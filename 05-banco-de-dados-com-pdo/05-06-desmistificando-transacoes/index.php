<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.06 - Desmistificando transações");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

/*
 * [ transaction ] https://pt.wikipedia.org/wiki/Transa%C3%A7%C3%A3o_em_base_de_dados
 *
 * [ Atomicidade ] Resumo: Todas as ações que compõem a unidade de trabalho da transação
 * devem ser concluídas com sucesso, para que seja efetivada.
 *
 * [ Consistência ] Resumo: Todas as regras e restrições definidas no banco de dados devem
 * ser obedecidas. (relacionamentos, tipos, restrições, etc.)
 *
 * [ Isolamento ] Resumo: Cada transação funciona completamente à parte de outras estações e
 * todas as operações são parte de uma transação única.
 *
 * [ Durabilidade ] Resumo: Os efeitos de uma transação em caso de sucesso (commit) devem
 * persistir no banco de dados (Uma transação só tem sentido se houver gravação)
 */
fullStackPHPClassSession("transaction", __LINE__);


try {

    // Faz a conexão
    $pdo = Connect::getInstance();

    /*
     * Inicia uma transation
     * 
     * Quando se faz uma query, um insert, delete, etc o pdo faz o commit imediatamente
     * no momento em que o comand é executado. Mas quando se coloca o begintransation
     * vc informa para não executar o commit agora, antes tem que verificar se tudo está certo
     */
    $pdo->beginTransaction();

    $pdo->query("
        INSERT INTO users(first_name, last_name, email,document)
        VALUES('André','Águia','aguia@gmail.com','1321321321');
    ");

    $userId = $pdo->lastInsertId();

    $pdo->query("
        INSERT INTO users_address(user_id, street, number, complement)
        VALUES('{$userId}','Rua Geraldo Franco','123','Bairro Lapa');
    ");

    /*
     * Observe que se executar o código até aqui nada será inserido no banco!!
     * Com o begin transation o PHP está aguardando para efetivamente executar
     * todas as tarefas com segurança.
     */

    /*
     * Agora o commit é executado e faz as transações
     */
    $pdo->commit();    
    echo "<p class='trigger accept'>cadastro com sucesso!</p>";
    
} catch (Exception $exception) {
    
    /*
     * Caso dê erro devemos garantir que o php volte a situação antiga
     * e não fique aguardando com a transação em aberto. Isso se faz com o rolback
     */
    $pdo->rollBack();
    var_dump($exception);
}

/*
 * Cabe observar que esse recurso deve ser usado SOMENTE para atividades
 * extraordinárias como backup do banco, instalação da aplicação,etc
 * Atividades onde o banco não está sendo muito exigido.
 * Pois o $pdo->beginTransaction() exige muito do SGBD e não é inteligente
 * usá-lo para atividades corriqueiras de insert, update, delete, etc
 * 
 * Esse código serve apenas como exemplo, mas usar o $pdo->beginTransaction()
 * para atividades comuns não é recomendado.
 */