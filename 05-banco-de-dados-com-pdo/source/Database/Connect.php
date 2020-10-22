<?php

namespace Source\Database;

use \PDO;
use \PDOException;

class Connect
{

    private const HOST = "localhost";
    private const USER = "root";
    private const DBNAME = "fullstackphp";
    private const PASSWD = "chewbacca";
    private const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // Define o banco em utf8
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Garante que todo o erro que ocorrer gerará uma EXception
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // Define que ao inves de um array por indice, ou array associativo o resultado de um detch será sempre um objeto anônimo 
        PDO::ATTR_CASE => PDO::CASE_NATURAL                 // Define que o padrão do banco de dados para o nome das tabela é o natural do banco. Poderia configurar para upper ou lower
    ];

    private static $instance;

    public static function getInstance(): PDO
    {
        # Verifica se não tem conexão antes de criar uma nova
        if (empty(self::$instance)) {
            try {
                self::$instance = new PDO(
                "mysql:host=".self::HOST.";dbname=".self::DBNAME,
                self::USER,
                self::PASSWD,
                self::OPTIONS
                );
            } catch (Exception $ex) {
                die("<h1>Erro ao conectar!</h1>");
            }
        }
        return self::$instance;
    }

    # o final garante que esses métodos não serão herdados
    # o private garante que o método não poderá ser acessado de fora da classe
    # Tudo isso é para garantir que somente uma conexão será aberta por cliente

    final private function __construct()
    {
        
    }

    final private function __clone()
    {
        
    }

}
