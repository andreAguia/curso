<?php

namespace Source\Bank;

class AccountSaving extends Account
{
    private $interest;
    
    protected function __construct($branch, $account, \Source\App\User $client, $balance)
    {
        parent::__construct($branch, $account, $client, $balance);
        $this->interest = 0.006;
    }
    
    public function deposit($value)
    {
        
    }

    public function withdrawal($value)
    {
        
    }

}
