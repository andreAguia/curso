<?php

namespace Source\Contracts;

class Login
{
    private $logged;
    
    public function loginUser(User $user) : User
    {
        /*
         * Usa de associação com a classe User para receber 
         * um objeto como parâmetro e armazenar na variável logged
         */
        $this->logged = $user;
        return $this->logged;
    }
    
    public function loginAdmin(UserAdmin $user) : UserAdmin
    {
        /*
         * Usa de associação com a classe UserAdmin para receber
         * um objeto como parâmetro e armazenar na variável logged
         * 
         * Observe também que nesse caso somente objetos UserAdmin 
         * podem ser logados como administrador, 
         * mas o UeerAdmin pode ser logado como usuário pois UserAdmin 
         * herda de User, mas nbão o contrário.
         */
        $this->logged = $user;
        return $this->logged;
    }
    
    public function login(UserInterface $user) : UserInterface
    {
        /*
         * Implementação que tanto o UserAdmin quanto o User podem 
         * ser logados, pois a exigência é de classes que tenham 
         * implementados a UserInterface
         */
        $this->logged = $user;
        return $this->logged;
    }
}
