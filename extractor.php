<?php
// Caminho do arquivo PHP que você deseja analisar
$file = 'analysis.php';

// Lê o conteúdo do arquivo PHP
$content = file_get_contents($file);

// Expressão regular para encontrar todas as variáveis PHP (começam com $ seguido de letras, números ou _)
preg_match_all('/\$\w+/', $content, $matches);

// Remove duplicatas, caso haja várias referências à mesma variável
$variables = array_unique($matches[0]);

// Caminho do arquivo de saída .txt
$outputFile = 'extractedVariables.txt';

// Abre o arquivo de saída para escrita
$fileHandle = fopen($outputFile, 'w');

// Escreve cada variável no arquivo de texto
foreach ($variables as $variable) {
    fwrite($fileHandle, $variable . PHP_EOL);
}

// Fecha o arquivo de saída
fclose($fileHandle);

echo "Variáveis extraídas e salvas em variaveis.txt";
?>
