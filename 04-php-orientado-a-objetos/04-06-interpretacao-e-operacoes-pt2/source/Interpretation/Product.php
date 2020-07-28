<?php

namespace Source\Interpretation;

class Product
{

    public $name;
    private $price;
    private $data;

    # O __set é disparado sempre quando tentamos acessar um método
    # que não existe ou que não e público    

    public function __set($name, $value)
    {
        # Se for atribuido valor a alguma propriedade não disponível
        # Exibe a mensagem de erro da função notFpund
        $this->notFound(__FUNCTION__, $name);

        # guarda essas propriedades em um array
        $this->data[$name] = $value;
    }

    # O __get é disparado sempre quando tentamos obter o valor de um método
    # que não existe ou que não e público

    public function __get($name)
    {
        # Verifica se, mesmo não existindo houve algum set
        # e se houve vai estar no array data
        # e se tiver exibe o valor
        if (!empty($this->data[$name])) {
            return $this->data[$name];
        } else {
            $this->notFound(__FUNCTION__, $name);
        }
    }

    public function __isset($name)
    # Toda vez em que é feito um isset() ou um empty()
    # com uma propriedade da classe dispara esse método
    {
        $this->notFound(__FUNCTION__, $name);
    }

    public function __call($name, $arguments)
    # Quando vc chama um método que não é acessível
    # igual ao __set só para métodos e não propriedades
    {
        $this->notFound(__FUNCTION__, $name);
        var_dump($arguments);
    }

    public function __toString()
    # Quando vc tenta usar o echo diretamente em uma classe
    {
        return "<p class='trigger error'>Este é um objeto da class " . __CLASS__ . "!</p>";
    }
    
    public function __unset($name)
    {
        trigger_error(__FUNCTION__.": Acesso negado a propriedade {$name}",E_USER_ERROR);
    }

    public function handler($name, $price)
    {
        $this->name = $name;
        $this->price = number_format($price, "2", ".", ",");
    }

    public function notFound($method, $name)
    {
        echo "<p class='trigger error'>{$method} A propriedade {$name} não existe em " . __CLASS__ . "!</p>";
    }

}
