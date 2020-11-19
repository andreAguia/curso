<?php

namespace Source\Models;

class UserModel extends \Source\Models\Model {
    /*
     * Classe responsável pelas regras de negócio da tabela user
     */

    /** @var array $safe no update or create */
    protected static $safe = ["id", "created_at", "updated_at"];

    /** @var string $entity database table */
    protected static $entity = "users";
    
    public function bootstrap(){
        /*
         * Ajuda a construir os dados necessários para se 
         * cadastrar um usuário
         */
    }
    
    public function load($id){
        /*
         * Busca o usuário pelo id
         */
    }
    
    public function find($email){
        /*
         * Faz uma busca por email
         */
    }
    
    public function all($limit = 30, $offset = 0){
        /*
         * Retorna todos os resultados
         */
    }
    
    public function save(){
        /*
         * responsável por cadastrar ou salvar o usuário na base
         */
    }
    
    public function destroy(){
        /*
         * responsável por deletar um usuário da base
         */
    }
    
    public function required(){
        /*
         * informa os campos requeridos
         */
    }

}
