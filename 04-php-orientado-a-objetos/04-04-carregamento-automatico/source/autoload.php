<?php

/*
 * Rotina de autoload
 */

spl_autoload_register(function($class) {
    
    # Define o fornecedor que será retirado de $class
    $prefix = "Source\\";
    
    # Verifica o tamanho do prefix para retirar de $class
    $len = strlen($prefix);
    
    # Usa a função strncmp para saber se $prefix está em #class
    if (strncmp($prefix, $class, $len) <> 0) {
        return;
    }
    
    # Pega o diretório atual com o source (fornecedor) em minúsculas
    $baseDir = __DIR__ . "/";
    
    # cria uma nova variável com o conteúde de $class começando a partir
    # da posição $len
    $relativeClass = substr($class, $len);

    # Monta o arquivo da classe a partir das variáveis tratadas
    # substitui as barras invertidas por comuns
    $file = $baseDir . str_replace("\\", "/", $relativeClass) . ".php";
    
    # Se o arquivo existe, inclui ele no código
    if(file_exists($file)){
        require $file;
    }
});
