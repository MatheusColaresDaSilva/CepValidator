# CepValidator

Tecnologias usadas: PHP e React

Api para cadastro e validação de cep.
Regras:
1. O CEP é um número maior que 100.000 e menor que 999999.
2. O CEP não pode conter nenhum dígito repetitivo alternado em pares.
*  121426 - Aqui, 1 é um dígito repetitivo alternado em par.
*  523563 - Aqui nenhum digito é alternado.
*  552523 - Aqui os números 2 e 5 são dígitos alternados repetitivos em par.

Foi utilizado PHP para criação da API.
Para executar back-end:
1. Instale um serve php, por exemplo o xampp com o apache e mysql, (obs: Sugiro instalar uma versão do php 7.3);
2. Baixe o projeto e coloque no diretório correto, no caso do xampp é o "htdocs";
3. Suba os serviços do apache e mysql;
4. Execute o arquivos src\database\CreateDatabase.php e src\database\CreateTableCidade.php respectivamente;
5. Abra o postman e import as requisições : CepValidator.postman_collection.json;
6. Insira e valide os bloqueios;
7. Exemplo de request:
{
    "nome":"Londrina",
    "cep": 552633
}

Para executrar os TESTES é necessário ter o PhpUnit instalado (https://phpunit.de/getting-started/phpunit-9.html), sugiro instalar via compose:
1. ./vendor/bin/phpunit --testdox --color tests

Para o front-end é necessário ter o nod.js instalado(https://nodejs.org/en/), entra na pasta "validadorCep\src\view\validadorcepui":
1. Dentro dessa pasta execute "npm start", uma página do navegador irá abrir com a página do projeto.


