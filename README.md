# Gerenciador de Clientes

Sistema para gerenciamento de clientes. Possível cadastrar clientes manualmente ou em lote utilizando um arquivo XML. 

## Configuração

No terminal, na raiz do projeto rodar o comando 

```bash
composer install
```
No diretório 

```bash
/Models/DB.php
```
Modificar as variáveis privadas $host, $user, $dbname e $password para os valores de configuração do seu banco local. 

O arquivo ***DatabaseGenerator.sql*** é um DUMP do banco de dados sem dados. Pode ser utilizados para gerar a tabela ___clients___.

## Extras

Foram utilizados o bootstrap para estilização das páginas e o DataTables para a criação e exibição da tabela com os dados dos clientes. 

Completamente construído utilizando PHP puro e conceitos de POO. Uso da classe PDO para interação com o banco de dados. 