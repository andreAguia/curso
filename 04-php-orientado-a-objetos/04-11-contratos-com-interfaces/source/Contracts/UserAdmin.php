<?php

namespace Source\Contracts;

class UserAdmin extends User implements UserInterface, UserErrorInterface
{
    /*
     * É possível implementar diversas interfaces em cadeia
     * Dessa forma podemos fazer diversas interfaces pequenas
     * e usá-las em cadeia de acordo com o necessário
     */
    
    private $level;
    private $error;

    public function construct($firstName, $lastName, $email)
    {
        /*
         * Não temos as variáveis declaradas pois vamos utilizar aqui
         * a herança com a classe User
         * 
         * Criamos uma nova variável level que não fere o contrato pois está
         * na implementação do código.
         */
        parent::__construct($firstName, $lastName, $email);
        $this->level = 10;  //Não entendi porque essa instrução não funciona 
    }

    public function setError($error): void
    {
        $this->error = $error;
    }

    public function getError()
    {
        return $this->error;
    }

}
