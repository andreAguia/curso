<?php

namespace Source\Models;

abstract class Model {
    /*
     * Classe responsável pelas rotinas de acesso ao bd
     * pois são comuns para todas as tabelas
     */

    /** @var object|null */
    protected $data;        // Os dados manipulados da classe

    /** @var \PDOException|null */
    protected $fail;        // Armazena todos os erros

    /** @var string|null */
    protected $message;     // Armazena as mensagens para o usuário

    function data(): ?object {
        return $this->data;
    }

    function fail(): ?\PDOException {
        return $this->fail;
    }

    function message(): ?string {
        return $this->message;
    }

    protected function create() {
        
    }

    protected function read() {
        
    }

    protected function update() {
        
    }

    protected function delete() {
        
    }

    protected function safe(): ?array {
        /*
         * Protege os campos que não devem ser salvos, pois o sgdb
         * faz isso automaticamente (id, created_at e updated_at)
         */
    }
    
    protected function filter(){
        /*
         * Responsável por filtrar os dados de entrada para não deixar entrar
         * dados indesejáveis. Utiliza as diversas ferramentas que vimos nas
         * aulas anteriores
         */
    }

}
