<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.10 - Fundamentos da abstração");

require __DIR__ . "/source/autoload.php";

/*
 * [ superclass ] É uma classe criada como modelo e regra para ser herdada por outras classes,
 * mas nunca para ser instanciada por um objeto.
 */
fullStackPHPClassSession("superclass", __LINE__);

$client = new Source\App\User(
        "André",
        "Águia"
);

//$account = new \Source\Bank\Account(
//        "123",
//        "1456",
//        $client,
//        1000
//);

var_dump(
        $client,
//        $account
);

/*
 * [ especialização ] É uma classe filha que implementa a superclasse e se especializa
 * com suas prórpias rotinas
 */
fullStackPHPClassSession("especialização.a", __LINE__);

$saving = new Source\Bank\AccountSaving(
        "123",
        "1456",
        $client,
        0
);

var_dump(
        $saving
);

# Depositando
$saving->deposit(1000);

# retirando
$saving->withdrawal(1500);
$saving->withdrawal(1000);
$saving->withdrawal(6);

# Vendo o saldo
$saving->extract();

/*
 * [ especialização ] É uma classe filha que implementa a superclass e se especializa
 * com suas prórpias rotinas
 */
fullStackPHPClassSession("especialização.b", __LINE__);

$current = new Source\Bank\AccountCurrent(
        "123",
        "1456",
        $client,
        0,
        1000
);

var_dump(
        $current
);

# Depositando
$current->deposit(1000);

# retirando
$current->withdrawal(1500);
$current->withdrawal(1000);

# Vendo o saldo
$current->extract();