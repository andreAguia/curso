<?php

namespace Source\Related;

class Company
{

    private $company;
    /*
     * var Address
     */
    private $address;
    private $team;
    private $products;

    # Exemplo sem objeto, usando string
    
    function bootCompany($company, $address)
    {
        $this->company = $company;
        $this->address = $address;
    }

    # Associação -> propriedade $address é referenciada com objeto
    # e o método acompanha 
    # Me parece que é usado quando é um para um. Um endereço para uma companhia

    function boot($company, Address $address)
    {
        # A classe é a propriedade da classe
        $this->company = $company;
        $this->address = $address;
    }

    # Agregação -> propriedade $product NÃO é referenciada com objeto
    # Mas o método sim e joga para a propriedade usando array.
    # Me parece que é usado quando é um para muitos. Vários produtos de uma companhia

    function addProduct(Product $product)
    {   
        # A classe é um argumento do método
        $this->products[] = $product;
    }

    # Composição -> propriedade $product NÃO é referenciada com objeto
    # e nem o método. Mas o objeto é criado e vinculado a um array.
    # Me parece que é usado quando é um para muitos. Vários usuários em um time

    function addTeamMember($job, $firstName, $lastName)
    {
        # A classe é instanciada dentro do método
        $this->team[] = new User($job, $firstName, $lastName);
    }

    function getCompany()
    {
        return $this->company;
    }

    /*
     * @return Address
     */

    function getAddress(): Address
    {
        # Refenciei : Address para informar que o retorno é um objeto
        return $this->address;
    }

    /*
     * @return array
     */

    function getProducts()
    {
        # Não posso refeenciar, pois a pripriedade não foi referenciada como
        # objeto, pois no funco é um array
        return $this->products;
    }

    function getTeam()
    {
        return $this->team;
    }

}
