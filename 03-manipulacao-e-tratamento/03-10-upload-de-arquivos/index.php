<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.10 - Upload de arquivos");

/*
 * [ upload ] sizes | move uploaded | url validation
 * [ upload errors ] http://php.net/manual/pt_BR/features.file-upload.errors.php
 */
fullStackPHPClassSession("upload", __LINE__);

$folder = __DIR__ . "/upload";

if (!file_exists($folder) || !is_dir($folder)) {
    mkdir($folder, 0755);
}

# Verifica as configurações do servidor PHP
# upload_max_filesize -> tamanho máximo de um arquivo para fazer o upload
# post_max_size -> max de dados aceitos em um post. Somando todos os inputs,
# textareas e arquivos para upload
var_dump([
    "filesize" => ini_get("upload_max_filesize"),
    "postsize" => ini_get("post_max_size"),
]);

var_dump([
    filetype(__DIR__ . "/index.php"),
    mime_content_type(__DIR__ . "/index.php"),
]);

# Retorna true se existir um get de nome post e for boleano
$getPost = filter_input(INPUT_GET, "post", FILTER_VALIDATE_BOOLEAN);
var_dump($_FILES);

# Se existe uma $_FILES e o nome do arquivo não estiver vazio
if ($_FILES && !empty($_FILES['file']['name'])) {

    $fileUpload = $_FILES["file"];
    var_dump($fileUpload);

    # Define no array os nameTypes permitidos
    $allowedTypes = [
        "image/jpg",
        "image/jpeg",
        "image/png",
        "application/pdf",
    ];
    
    # Define o novo nome do arquivo
    $newFileName = time() . mb_strstr($fileUpload['name'],"."); 
    
    # Percorre o array de tipos permitidos. Se o arquivo uploadeado for igual a um deles...
    if (in_array($fileUpload['type'], $allowedTypes)) {
        if(move_uploaded_file($fileUpload['tmp_name'], $folder."/".$newFileName)){
            echo "<p class='trigger accept'>Arquivo Enviado com Sucesso</p>";
        }else{
            echo "<p class='trigger error'>Erro Inesperado</p>";
        }
    }else{
        echo "<p class='trigger error'>Tipo de arquivo não permitido</p>";
    }
} elseif ($_FILES) {
    echo "<p class='trigger warning'>Selecione um arquivo antes de enviar</p>";
} elseif ($getPost) {
    echo "<p class='trigger warning'>Ops parece que o arquivo é muito grande</p>";
}

include __DIR__ . "/form.php";

var_dump(
        scandir(__DIR__ . "/upload"),
);
