<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.07 - Relacionamento entre objetos");

require __DIR__ . "/source/autoload.php";

/*
 * [ associacão ] É a associação mais comum entre objetos onde o objeto terá um atributo
 * apontando e dando acesso ao outro objeto
 */
fullStackPHPClassSession("associacão", __LINE__);
# Quando uma propriedade de uma classe é outro objeto

# Passando o endereço como string... mas nao é correto
# Pois um endereço é um dado composto
$company = new \Source\Related\Company();
$company->bootCompany(
        "UpInside",
        "Rua xxx"
);

var_dump($company);

# O ideal é colocar o endereço com um novo objeto e fazer a associação
# Podemos fazer assim
$company->boot(
        "UpInside",
        new Source\Related\Address("Rua Jujuba", 234, "Bloco a apto 201")
);

var_dump($company);

# Ou assim
$address = new Source\Related\Address("Rua Jujuba", 234, "Bloco a apto 204");
$company->boot(
        "UpInside",
        $address
);

var_dump($company);

echo "<p>A {$company->getCompany()} tem sede na {$company->getAddress()->getStreet()} {$company->getAddress()->getNumber()} {$company->getAddress()->getComplement()}</p>";

/*
 * [ agregação ] Em agregação tornamos um objeto externo parte do objeto base, contudo não
 * o referenciamos em uma propriedade como na associação.
 */
fullStackPHPClassSession("agregação", __LINE__);

$fsphp = new \Source\Related\Product("Full Stack PHP",1997);
$laradev = new \Source\Related\Product("LaravelDeveloper",997);

var_dump($fsphp,$laradev);

$company->addProduct($fsphp);
$company->addProduct($laradev);
$company->addProduct(
        new \Source\Related\Product("Work Control Dev",2997)
        );


var_dump($company);

/*
 * @var \Source\Related\Product $product
 */

foreach ($company->getProducts() as $product) {
    echo "<p>{$product->getName()} por R$ {$product->getPrice()}</p>";
}

/*
 * [ composição ] Em composição temos um objeto base que é responsável por instanciar o
 * objeto parte, que só existe enquanto o base existir.
 */
fullStackPHPClassSession("composição", __LINE__);

$company->addTeamMember("Administrador", "André", "Águia");
$company->addTeamMember("Economista", "Gustavo", "Barros");

var_dump($company);

/*
 * @var \Source\Related\User $member
 */

foreach ($company->getTeam() as $member) {
    echo "<p>{$member->getJob()}: {$member->getFirstName()} {$member->getLastName()}</p>";
}






