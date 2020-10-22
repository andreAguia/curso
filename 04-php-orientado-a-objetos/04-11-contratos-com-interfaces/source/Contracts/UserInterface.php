<?php

namespace Source\Contracts;

interface UserInterface
{
    public function __construct($firstName, $lastName, $email);
    
    public function setEmail($email);
    
    public function getFirstName();
    
    public function getLastName();
    
    public function getEmail();
    
    /*
     * As interfaces não tem implementação de código
     * As classes interface existem para criar um tipo de contrato:
     * todas as classes que implementarem uma interface terão que conter
     * o que ela determina. 
     * 
     * É como se fosse um tipo de contrato celebrado entre a interface e a 
     * classe se comprometendo a implementar tudo o que está na interface
     * 
     * Observe que uma interface é uma classe abstrata. 
     * Não é necessário colocar a palavra abstract nas funções, pois como
     * é uma interface isso fica subentendido
     * 
     * Observe também que em uma interface TODAS as funções são públicas
     * Pois a classe é que vai implemantá-las
     */
}
