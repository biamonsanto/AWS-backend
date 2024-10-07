# Projeto de Aplicação Web com Integração a Banco de Dados

## Descrição do Projeto

Este repositório contém o código de uma aplicação web simples que permite a criação e a listagem de registros de personagens em uma tabela de banco de dados. O projeto foi desenvolvido como parte do autoestudo para demonstrar habilidades em PHP, MySQL e integração com a AWS para deploy.

A aplicação consiste em uma página web que permite adicionar novos personagens de Harry Potter e visualizar os já cadastrados em uma tabela chamada `Personagens`. Além disso, foi criada uma segunda tabela com quatro campos e três tipos de dados diferentes, conforme solicitado.

## Funcionalidades

- **Cadastro de Personagens:** O usuário pode inserir o nome, a casa e a data de admissão de um personagem através de um formulário na página web.
- **Listagem de Personagens:** A página exibe uma lista dos personagens cadastrados na tabela `Personagens`.

## Descrição dos Campos da Tabela `Personagens`

A tabela `Personagens` contém os seguintes campos, cada um com seu respectivo tipo de dado:

- **`id` (INT, PRIMARY KEY):** 
  - Este campo é um número inteiro (`INT`) que atua como chave primária da tabela, identificando de forma única cada registro na tabela. Ele é auto-incrementado para garantir que cada personagem tenha um identificador exclusivo.

- **`nome` (VARCHAR(100)):**
  - Este campo armazena o nome do personagem. O tipo de dado é uma string de caracteres variável (`VARCHAR`) com um comprimento máximo de 100 caracteres.

- **`casa` (VARCHAR(50)):**
  - Este campo armazena a casa a que o personagem pertence. O tipo de dado é uma string de caracteres variável (`VARCHAR`) com um comprimento máximo de 50 caracteres.

- **`data_admissao` (DATE):**
  - Este campo armazena a data de admissão do personagem. O tipo de dado é `DATE`, que registra uma data no formato `AAAA-MM-DD`.


## Estrutura de Arquivos 

- `SamplePage.php`: Página principal que contém o formulário para cadastro de personagens e a listagem dos personagens já cadastrados. Arquivo com funções PHP para adicionar registros, verificar e criar tabelas. Página web para criação e listagem de registros da segunda tabela criada.
- `dbinfo.inc`: Arquivo incluído que contém as informações de conexão ao banco de dados (não incluído por motivos de segurança).
- `README.md`: Arquivo de documentação do projeto.
- `/poderada-semana-3.mp4`: Vídeo demonstrativo da aplicação em execução na AWS e explicação sobre o deploy.

## Tecnologias Utilizadas

- **Linguagem :** PHP
- **Banco de Dados:** MySQL
- **Cloud :** AWS (Amazon Web Services)
- **Servidor Web:** Apache 
- **Controle de Versão:** Git e GitHub

## Deploy na AWS

O deploy da aplicação foi realizado na AWS, utilizando EC2 para hospedar o servidor web e RDS para gerenciar o banco de dados MySQL. O vídeo demonstrativo disponível no repositório (ou a URL fornecida) mostra o passo a passo do deploy e a configuração dos serviços na AWS.

### Passos para o Deploy:

1. **Configuração do EC2:** Criação de uma instância EC2 com Apache e PHP instalados.
2. **Configuração do RDS:** Criação de uma instância RDS para o banco de dados MySQL e configuração das permissões de acesso.
3. **Deploy do Código:** O código foi enviado para a instância EC2 através de SSH e configurado para rodar no servidor Apache.
4. **Testes e Validação:** Foram realizados testes para garantir que a aplicação está funcionando corretamente, tanto para o cadastro quanto para a listagem dos personagens.

## URL do Vídeo Demonstrativo

[Link para o vídeo demonstrativo]: navegar até o arquivo  `poderada-semana-3.mp4` 

## Licença

Inteli License

Copyright (c) [2024] [Beatriz Amorim Monsanto]
