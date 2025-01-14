# Painel Informativo sobre o Coronavírus

![Logo](https://www.skyhub.bio/wp-content/uploads/2021/09/kidopi.png)

[![PHP Version](https://img.shields.io/badge/PHP-8.0%2B-blue)](https://www.php.net/) [![MySQL Version](https://img.shields.io/badge/MySQL-8.0-orange)](https://dev.mysql.com/downloads/)

## :bookmark_tabs: Menu
* [Overview](#scroll-overview)
* [Screenshot](#rice_scene-screenshot)
* [Demo](#dvd-demo)
* [Documentation](#blue_book-documentation)
* [Requirements](#heavy_exclamation_mark-requirements)
* [Installation and usage](#installation-and-usage)
* [Tests](#tests)
* [Dependencies and libs](#dependencies-and-libs)
* [Folder Structure](#folder-structure)
* [Release History](#release-history)
* [Tasks](#bell-tasks)
* [Authors](#smiley_cat-authors)
* [License](#memo-license)

## :scroll: Overview
O Painel Informativo sobre o Coronavírus é um sistema desenvolvido para registrar os acessos de usuários ao painel informativo, capturando o país de origem e o horário do acesso. Ele foi criado com o objetivo de fornecer informações detalhadas sobre o impacto do coronavírus em diferentes locais, permitindo que as organizações possam analisar dados de acesso e, possivelmente, integrar com outros sistemas.

## Funcionalidades principais:
 - Registro de acessos, com a captura do país de origem e data/hora.
 - Armazenamento seguro de dados utilizando um banco de dados MySQL.
 - Desenvolvido com PHP e MySQL, usando a arquitetura básica cliente-servidor.

Este painel foi feito para ser simples e eficiente, com a intenção de fornecer um ponto inicial para a análise de dados sobre o coronavírus.

## :rice_scene: Screenshot
[screen-capture (1).webm](https://github.com/user-attachments/assets/75b9424d-af0b-40c5-8c45-ff18ab69bf04)

## :dvd: Demo
Ainda não há uma versão online disponível para demonstração.

## :blue_book: Documentation
A documentação completa do sistema será disponibilizada em breve.

## :heavy_exclamation_mark: Requirements
* [PHP 8.0+](https://www.php.net/)
* [MySQL 8.0+](https://dev.mysql.com/downloads/)
* [Apache](https://httpd.apache.org/download.cgi)
* [PDO DRIVER](https://www.php.net/manual/en/ref.pdo-mysql.php) - PDO habilitado no arquivo php.ini
* [cURL](https://www.php.net/manual/pt_BR/book.curl.php) - Função curl habilitada no arquivo php.ini


## Installation and usage

Clone o repositório
```bash
git clone https://github.com/TabsMacedo/projeto-kidopi.git
```
### Configure o banco de dados
Crie a tabela utilizando o seguinte script:
```sql
CREATE DATABASE covid19;
USE DATABASE covid19;

CREATE TABLE acessos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  pais VARCHAR(50) NOT NULL,
  data_hora DATETIME DEFAULT CURRENT_TIMESTAMP
);
```
Para instalar as dependências use:
```bash
composer update
```

Configure o arquivo .env para conectar ao banco de dados
```bash
DB_HOST=localhost
DB_NAME=covid19
DB_USER=root
DB_PASS=senha
```
Inicie o servidor local
```bash
php -S localhost:8000
```

## Tests
Ainda não há testes automatizados disponíveis para este projeto.

## Dependencies and libs
- [PHP dotenv](https://github.com/vlucas/phpdotenv) para gerenciamento de variáveis de ambiente
- [PDO](https://www.php.net/manual/pt_BR/book.pdo.php) para conexão e manipulação segura de banco de dados MySQL


## Folder Structure
```
.
├── app/            # Código-fonte do sistema
│   ├── controllers # Controladores do sistema
│   ├── models      # Modelo para interagir com o banco de dados
│   ├── views       # Arquivos de visualização (HTML, PHP)
├── public/         # Arquivos públicos (index.php)
│   ├── css         # Arquivos CSS
│   ├── js          # Arquivos JS
│   └── img         # Imagens
├── .env            # Configurações do banco de dados
├── .gitignore      # Arquivos a serem ignorados pelo Git
├── LICENSE         # Licença do projeto
└── README.md       # Documentação do projeto

```

## Release History
- 0.1.0
  - Init: Primeiro release do sistema de acessos

## :bell: Tasks
- [x] Criar estrutura inicial do projeto
- [x] Configurar banco de dados
- [x] Implementar interface de administração
- [ ] Adicionar testes automatizados

## :smiley_cat: Authors
- [Tábata Macedo](https://github.com/tabsmacedo)

## :memo: License
Este projeto está licenciado sob a [MIT License](./LICENSE). Veja o arquivo [LICENSE](./LICENSE) para mais detalhes.
