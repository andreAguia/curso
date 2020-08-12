<?php

namespace Source\Bank;

use Source\App\User;

use Source\App\Trigger;

/*
 * Classe abstrata.
 * Toda classe tem como padrão ser uma classe concreta.
 * Classes abstratas servem somente de modelo apra as classes filhas
 * Tipo um tempĺate de classe
 */

abstract class Account
{

    protected $branch;
    protected $account;
    protected $client;
    protected $balance;

    /*
     * Método protegido somente pode ser acessado pela própria classe ou pelas filhas
     */    
    protected function __construct($branch, $account, User $client, $balance)
    {
        $this->branch = $branch;
        $this->account = $account;
        $this->client = $client;
        $this->balance = $balance;
    }

    public function extract($param)
    {
        $extract = ($this->balance >= 1 ? Trigger::ACCEPT : Trigger::ERROR);
        Trigger::show("EXTRATO: Saldo atual: {$this->toBrl($this->balance)}", $extract);
    }

    protected function toBrl($value)
    {
        return "R$ " . number_format($value, 2, ",", ".");
    }

    /* 
     * Métodos abstratos gera uma obrigatoriedade
     * das classes filhas implementarem
     */
    abstract function deposit($value);
    
    abstract function withdrawal($value);
}
