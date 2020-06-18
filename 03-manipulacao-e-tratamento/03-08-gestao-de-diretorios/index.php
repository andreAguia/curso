<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.08 - Gestão de diretórios");

/*
 * [ verificar, criar e abrir ] file_exists | is_dir | mkdir  | scandir
 */
fullStackPHPClassSession("verificar, criar e abrir", __LINE__);

# Define o diretório
$folder = __DIR__ . "/upload";

# Verifica se existe algum arquivo com esse nome e se é um diretório
if (!file_exists($folder) || !is_dir($folder)) {
    mkdir($folder, 0755);       // Se não existir cria o diretório
} else {
    var_dump(scandir($folder)); // exibe o que tem dentro do diretorio
}

/*
 * [ copiar e renomear ] copy | rename
 */
fullStackPHPClassSession("copiar e renomear", __LINE__);

# Define o diretório
$file = __DIR__ . "/file.txt";

# Verifica se a pasta já existe, se não cria
if (!file_exists($folder) || !is_dir($folder)) {
    mkdir($folder, 0755);
}

var_dump(
    pathinfo($file),    // Exibe os dados do nome arquivo: dirname, basename, extension e filename
    scandir($folder),   // Exibe o que está no diretório $folder
    scandir(__DIR__),   // Exibe o que está no diretório raiz
);

# Exibindo os arquivos de um diretório retirando os atalhos . e ..
$dirFiles = array_diff(scandir($folder),[".",".."]);    // retira do scandir os atalhos . e ..
$dirCount = count($dirFiles);                           // conta os arquivos

var_dump(
    $dirFiles,
    $dirCount,
);

if (!file_exists($file) || !is_file($file)) {
    fopen($file, "w");
} else {
    //copy($file, $folder . "/" . basename($file));
    //var_dump(
    //    filemtime($file),     // informa o timestanp da última alteração
    //    filemtime(__DIR__."/upload/file.txt"),
    //);
    //rename(__DIR__."/upload/file.txt",__DIR__."/upload/".time().".".pathinfo($file)["extension"]);
    rename($file,__DIR__."/upload/".time().".".pathinfo($file)["extension"]);
}

/*
 * [ remover e deletar ] unlink | rmdir
 */
fullStackPHPClassSession("remover e deletar", __LINE__);

$folder = __DIR__ . "/remove";

if (!file_exists($folder) || !is_dir($folder)) {
    mkdir($folder, 0755);
}else{
    rmdir(__DIR__."/remove");
}

