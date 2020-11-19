<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.08 - Regra de negócio e modelo");

require __DIR__ . "/../source/autoload.php";

/*
 * [ layer ] Uma classe base que implementa os métodos de persitência e serve a todos os modelos.
 * essa é uma layer supertype.
 */
fullStackPHPClassSession("layer", __LINE__);

/*
 * Nesta aula aprenderemos a usar o pattern layer supertype
 * 
 * Nesse momento alteramos o banco de dados e passamos a ter 2 tabelas:
 * user e address
 * 
 * É criada uma classe Model que será abstract pois não será implementada diretamente
 * É criada uma classe UserModel que herdará de Model e será a implementação de Model
 * Sendo Model as regras gerais e UserModel as regras específicas para a tebela user
 */

/*
 * Usaremos o ReflctionClass para obter informações da classe 
 * pois é uma classe abstrata e não podemos referenciá-la diretamente
 */

$layer = new ReflectionClass(\Source\Models\Model::class);

var_dump(
        $layer->getDefaultProperties(),
        $layer->getMethods()
);


/*
 * [ model ] Cada rotina em um sistema tem uma regra de negócio. Um model serve para abstrair
 * essas rotinas se reponsabilizando pelas regras.
 */
fullStackPHPClassSession("model", __LINE__);

$model = new Source\Models\UserModel();

var_dump(
        $model,
        get_class_methods($model)
);
