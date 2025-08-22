# PHP Variable Extractor

## Visão Geral

O **PHP Variable Extractor** é uma ferramenta de linha de comando desenvolvida em PHP para analisar arquivos de código-fonte e extrair de forma automatizada todos os nomes de variáveis únicas. Este projeto foi criado para otimizar processos de documentação, refatoração e análise de código, demonstrando a aplicação de manipulação de arquivos e expressões regulares em um contexto prático.

## O Problema que Resolvemos

Em projetos de software, especialmente em grandes codebases, a necessidade de listar todas as variáveis utilizadas pode surgir por diversas razões:

* **Análise de Código:** Para entender o escopo e a utilização de variáveis.
* **Refatoração:** Ao renomear ou consolidar variáveis para melhorar a legibilidade.
* **Documentação:** Para gerar documentação técnica de forma automática.

Realizar essa tarefa manualmente é tedioso, demorado e sujeito a erros. O PHP Variable Extractor automatiza esse processo, fornecendo uma lista limpa e sem duplicatas de todas as variáveis encontradas em um arquivo PHP.

## Principais Funcionalidades

* **Leitura de Arquivos:** O script lê o conteúdo de um arquivo PHP especificado.
* **Extração com Regex:** Utiliza uma expressão regular (`/\$\w+/`) para identificar e capturar todas as ocorrências de nomes de variáveis.
* **Remoção de Duplicatas:** Processa a lista de variáveis capturadas para garantir que cada nome de variável apareça apenas uma vez.
* **Geração de Arquivo de Saída:** Salva a lista final de variáveis em um arquivo de texto (`.txt`) para fácil acesso e utilização.

## Tecnologias e Boas Práticas

* **Linguagem:** PHP 8.x
* **Técnicas:**
    * Manipulação de arquivos (`file_get_contents`, `fopen`, `fwrite`, `fclose`).
    * Uso de Expressões Regulares (`preg_match_all`) para parsing de código.
    * Manipulação de arrays (`array_unique`) para processamento de dados.
* **Boas Práticas:**
    * Código claro e comentado.
    * Estrutura de arquivos modular (`extractor.php` como motor, `analysis.php` como alvo).
    * Saída de console informativa para o usuário.

## Estrutura do Projeto
```
/
|-- extractor.php         # Script principal que executa a lógica de extração.
|-- analysis.php          # Arquivo PHP de exemplo a ser analisado.
|-- extractedVariables.txt  # Arquivo gerado com a lista de variáveis (após execução).
|-- README.md             # Este arquivo.
```

## Como Usar

### Pré-requisitos

* PHP 8.0 ou superior instalado.
* Acesso a um terminal ou linha de comando.

### Instalação

1.  Clone este repositório:
    ```bash
    git clone [https://github.com/seu-usuario/php_variableextractor.git](https://github.com/seu-usuario/php_variableextractor.git)
    ```
2.  Navegue até o diretório do projeto:
    ```bash
    cd php_variableextractor
    ```

### Execução

1.  **Prepare o arquivo de análise:**
    Abra o arquivo `analysis.php` e adicione o código PHP que você deseja analisar. Por exemplo:

    ```php
    // analysis.php
    <?php
    
    $nome = "João";
    $idade = 30;
    $email = "joao@example.com";
    
    function saudacao($nome) {
        $mensagem = "Olá, " . $nome . "!";
        echo $mensagem;
    }
    
    if ($idade >= 18) {
        $status = "Maior de idade";
    }
    
    // Variável duplicada para teste
    $nome = "Maria";
    
    ?>
    ```

2.  **Execute o script de extração:**
    No seu terminal, execute o seguinte comando:
    ```bash
    php extractor.php
    ```

3.  **Verifique o resultado:**
    Após a execução, uma mensagem de sucesso será exibida no console:
    ```
    Variáveis extraídas e salvas em extractedVariables.txt
    ```
    Um novo arquivo chamado `extractedVariables.txt` será criado, contendo a lista de variáveis únicas:
    ```txt
    $nome
    $idade
    $email
    $mensagem
    $status
    ```

## Possíveis Melhorias Futuras

Este projeto possui uma base sólida e pode ser expandido com novas funcionalidades, tais como:

* **Argumentos de Linha de Comando:** Permitir que o usuário especifique os arquivos de entrada e saída via argumentos (ex: `php extractor.php --entrada=meu_arquivo.php --saida=vars.txt`).
* **Suporte a Múltiplos Arquivos:** Adaptar o script para analisar múltiplos arquivos ou diretórios inteiros de uma vez.
* **Formatos de Saída:** Adicionar opções para exportar a lista de variáveis em outros formatos, como JSON ou CSV.
* **Interface Web:** Desenvolver uma interface gráfica simples onde o usuário possa colar o código ou fazer upload de um arquivo para análise.
* **Regex Aprimorado:** Melhorar a expressão regular para ignorar variáveis dentro de comentários ou strings.
