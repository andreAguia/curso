<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.12 - Cookies e sessões");

/*
 * [ cookies ] http://php.net/manual/pt_BR/features.cookies.php
 */
fullStackPHPClassSession("cookies", __LINE__);

# Exibe todos os cookies vinculados a essa url (localhost/curso)
//var_dump($_COOKIE);
# Define um cookie com nome, valor e tempo de existência
setcookie("fsphp", "Esse é meu cookie", time() + 10);

# Apaga um cookie
//setcookie("fsphp", null, time() - 10);
# podemos filtrar os cookies
$cookie = filter_input_array(INPUT_COOKIE, FILTER_SANITIZE_STRIPPED);
var_dump(
        $_COOKIE,
        $cookie,
);

# Entendendo o time (hora atual) 
# O valor que é acrescentado é em segundos
$time = time() + 60;          // + 1 minuto
$time = time() + 60 * 60;       // + 1 hora
$time = time() + 60 * 60 * 24;    // + 1 dia
$time = time() + 60 * 60 * 24 * 7;  // + 1 semana
# Exemplo de guardar login de usuário no cookie
$user = [
    "user" => "root",
    "passwd" => "12345",
    "expire" => $time,
];

# Define o cookie incluindo todos os argumentos
setcookie(
        "fslogin", // Nome da variável
        http_build_query($user), // valor (no caso o array transformado)
        $time, // O tempo de existência
        "/", // A pasta onde o cookie será aceito se / em todas as pastas
        "localhost", // O domínio onde será aceito
        false, // Se true somente https será aceito
        false                       // se true somente no protocolo https e não por linguagens script
);

# Filtra retirando tags
$login = filter_input(INPUT_COOKIE, "fslogin", FILTER_SANITIZE_STRIPPED);

# Caso não tenha problema exibe o resultado
if ($login) {
    var_dump($login);
    parse_str($login, $user);
    var_dump($user);
} else {
    echo "ainda não!";
}
/*
 * [ sessões ] http://php.net/manual/pt_BR/ref.session.php
 */
fullStackPHPClassSession("sessões", __LINE__);

# A sessão deve ser inicializada entes de qualquer instrução php

session_start([
    'cookie_lifetime' => 60 * 60 * 8,   // Vida do cookie que armazena a sessao
    'save_path' => __DIR__."/ses",      // Onde a sessão será armazenada
]);

# Antes de tudo devemos entender que a sessão é um arquivo 
# que fica em um arquivo temporário e a pasta é definda no php.ini
# Mas podemos informar onde queremos guardar as sessions com session_save_path

var_dump($_SESSION,
        [
            "id" => session_id(),
            "name" => session_name(),
            "status" => session_status(),
            "save_path" => session_save_path(),
            "cookie" => session_get_cookie_params()
                    
        ]
        );
