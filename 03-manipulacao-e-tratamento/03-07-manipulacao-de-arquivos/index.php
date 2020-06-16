<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.07 - Manipulação de arquivos");

/*
 * [ verificação de arquivos ] file_exists | is_file | is_dir
 */
fullStackPHPClassSession("verificação", __LINE__);

# Verifica se arquivo existe e se do tipo .txt
$file = __DIR__ . "/file.txt";
if (file_exists($file) && is_file($file)) {
    echo "Existe!";
} else {
    echo "Não Existe!";
}

/*
 * [ leitura e gravação ] fopen | fwrite | fclose | file
 */
fullStackPHPClassSession("leitura e gravação", __LINE__);

# Se o arquivo não existe ou não é do tipo .txt então cria-se
if (!file_exists($file) || !is_file($file)) {
    $fileOpen = fopen($file, "w"); // Abre o arquivo no modo write que cria quando não existe
    fwrite($fileOpen, "Linha 01" . PHP_EOL); // escreve no arquivo
    fwrite($fileOpen, "Linha 02" . PHP_EOL);
    fwrite($fileOpen, "Linha 03" . PHP_EOL);
    fwrite($fileOpen, "Linha Final" . PHP_EOL);
    fclose($fileOpen); // Fecha o arquivo
} else {
    var_dump(
        file($file),
        pathinfo($file),
    );
}

# Pega dados do arquivo
echo file($file)[3];

# Percorrendo todo arquivo
$open = fopen($file,"r");   // Abre o arquivo no modo read
while (!feof($open)) {
    echo "<p>" . fgets($open) . "</p>";
}

/*
 * [ get, put content ] file_get_contents | file_put_contents
 */
fullStackPHPClassSession("get, put content", __LINE__);
