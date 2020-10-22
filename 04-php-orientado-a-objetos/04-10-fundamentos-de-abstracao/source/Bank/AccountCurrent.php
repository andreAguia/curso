<?php

namespace Source\Bank;

use Source\App\User;
use Source\App\Trigger;

class AccountCurrent extends Account
{
    private $limit;
    
    final public function __construct($branch, $account, \Source\App\User $client, $balance, $limit)
    {
        parent::__construct($branch, $account, $client, $balance);
        $this->limit = $limit;
    }
    
    final public function deposit($value)
    {
        $this->balance += $value;
        Trigger::show("Depósito de {$this->toBrl($value)} realizado com sucesso !!", Trigger::ACCEPT);
    }

    final public function withdrawal($value)
    {
        if ($value <= $this->balance + $this->limit) {
            $this->balance -=abs($value);
            Trigger::show("Saque de {$this->toBrl($value)} realizado com sucesso",Trigger::ERROR);
            
            if($this->balance < 0){
                $tax = abs($this->balance) * 0.006;
                $this->balance -= $tax;
                Trigger::show("Taxa de uso de limite: {$this->toBrl($tax)}", Trigger::WARNING); 
           }
            
        } else {
            Trigger::show("Saldo insuficiente! Você tem somente {$this->toBrl($this->balance)} reais!",Trigger::WARNING);
        }
    }

}
