# Painel Informativo sobre o Coronavírus

![Logo](https://www.skyhub.bio/wp-content/uploads/2021/09/kidopi.png)
=======

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
![Screenshot](./assets/telaInicio.png)

## :dvd: Demo
Ainda não há uma versão online disponível para demonstração.

## :blue_book: Documentation
A documentação completa do sistema será disponibilizada em breve.

## :heavy_exclamation_mark: Requirements
* [PHP 8.0+](https://www.php.net/)
* [MySQL 8.0+](https://dev.mysql.com/downloads/)
* [Apache](https://httpd.apache.org/download.cgi) 

## Installation and usage
```bash
# Clone o repositório
$ git clone https://github.com/TabsMacedo/projeto-kidopi.git

# Configure o banco de dados
# Crie a tabela utilizando o seguinte script:

CREATE TABLE acessos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  pais VARCHAR(50) NOT NULL,
  data_hora DATETIME DEFAULT CURRENT_TIMESTAMP
);

# Configure o arquivo .env para conectar ao banco de dados
DB_HOST=localhost
DB_NAME=acessos_db
DB_USER=root
DB_PASS=senha

# Inicie o servidor local
$ php -S localhost:8000
```

## Tests
Ainda não há testes automatizados disponíveis para este projeto.

## Dependencies and libs
- [PHP dotenv](https://github.com/vlucas/phpdotenv) para gerenciamento de variáveis de ambiente

## Folder Structure
```
.
├── src            # Código-fonte do sistema
├── public         # Arquivos públicos (index.php)
├── .env           # Configurações do banco de dados
├── .gitignore     
├── LICENSE        
└── README.md      # Documentação do projeto
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
- [Tábata Macedo](https://github.com/tabatamacedo)

## :memo: License
The [MIT License](LICENSE) (MIT)
