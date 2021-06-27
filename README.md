# CepValidator

Api para cadastro e validação de cep.
Regras:
1. O CEP é um número maior que 100.000 e menor que 999999.
2. O CEP não pode conter nenhum dígito repetitivo alternado em pares.
• 121426 # Aqui, 1 é um dígito repetitivo alternado em par.
• 523563 # Aqui nenhum digito é alternado.
• 552523 # Aqui os números 2 e 5 são dígitos alternados repetitivos em par.

Foi utilizado PHP para criação da API.
Para executar:
1. Instale um serve php, por exemplo o xampp com o apache e mysql
2. Baixe o projeto e coloque no diretório correto
3.-Execute o arquivos src\database\CreateDatabase.php e src\database\CreateTableCidade.php respectivamente.
4.-Abra o postman e import as requisições : CepValidator.postman_collection.json
5.-Insira e valide os bloqueios
