<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.06 - Interpretação e operações pt2");

require __DIR__ . "/source/autoload.php";

/*
 * [ set ] Executado altomaticamente quando se tenta criar uma propriedade inacessível
 * http://php.net/manual/pt_BR/language.oop5.overloading.php#object.set
 *
 * inacessível = propridade é privada ou não existe
 */
fullStackPHPClassSession("__set", __LINE__);
# O __set é disparado sempre quando tentamos acessar um método
# que não existe ou que não e público

$fsphp = new \Source\Interpretation\Product();
$fsphp->handler("Full Stack PHP", 1997);

$fsphp->name = "FSPHP";     // propriedades públicas OK
$fsphp->title = "FSPHP";    // propriedades públicas OK
$fsphp->value = 1997;       // propriedade que não existe !!
$fsphp->price = 1997;       // propriedade privada !!

var_dump($fsphp);

$fsphp->title = "Full Stack PHP Developer";
$fsphp->company = "UpInside";

/*
 * [ get ] Executado automaticamente quando se tenta obter uma propriedade inacessível
 * http://php.net/manual/pt_BR/language.oop5.overloading.php#object.get
 *
 */
fullStackPHPClassSession("__get", __LINE__);
# O __get é disparado sempre quando tentamos obter o valor de um método
# que não existe ou que não e público

echo "<p>O curso {$fsphp->title} da {$fsphp->company} é o melhor curso de PHP do mercado!</p>";

/*
 * [ isset ] Executada automaticamente quando um teste ISSET ou EMPTY é executado em uma propriedade inacessível
 * http://php.net/manual/pt_BR/language.oop5.overloading.php#object.isset
 */
fullStackPHPClassSession("__isset", __LINE__);
# Toda vez em que é feito um isset() ou um empty()
# com uma propriedade da classe dispara esse método

isset($fsphp->phone);   // Não existe essa propriedade
isset($fsphp->name);    // Existe
empty($fsphp->address); // Não existe essa propriedade

var_dump($fsphp);


/*
 * [ call ] Executada automaticamente quando se tenta usar um método inacessível
 * http://php.net/manual/pt_BR/language.oop5.overloading.php#object.call
 *
 */
fullStackPHPClassSession("__call", __LINE__);
# Quando vc chama um método que não é acessível
# igual ao __set só para métodos e não propriedades
# Acessando um método privado 
$fsphp->notFound("oops", "teste");

# Acessando metodo que não existe
$fsphp->setPrice(1997, 10);

/*
 * [ toString ] Executada automaticamente quando se tenta exibir uma classe com echo
 * http://php.net/manual/pt_BR/language.oop5.overloading.php#object.unset
 */
fullStackPHPClassSession("__toString", __LINE__);

echo $fsphp;

/*
 * [ unset ] Executada automaticamente quando se tenta usar unset em uma propriedade inacessível
 * http://php.net/manual/pt_BR/language.oop5.overloading.php#object.unset
 */
fullStackPHPClassSession("__unset", __LINE__);
# Usado para disparar uma ação toda a vez que um unset for usado 
# Para alguma propriedade da classe inacessivel
# Obs unset apaga o valor dessa propriedade

unset(
        $fsphp->name,
        $fsphp->price,
        $fsphp->data,
);

var_dump($fsphp);
