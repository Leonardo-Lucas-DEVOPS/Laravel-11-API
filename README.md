---
### Descrição do Repositório para Estudo de API CRUD em Laravel 11

#### Objetivo:
Este repositório foi criado com o objetivo de explorar e praticar o desenvolvimento de APIs CRUD utilizando Laravel 11. Ele abrange desde a configuração inicial do ambiente até a implementação de funcionalidades básicas de manipulação de recursos através de endpoints RESTful.

#### Tecnologias Utilizadas:
- **Laravel 11**: Utilizado como framework PHP principal, oferecendo uma estrutura moderna e poderosa para desenvolvimento web.
- **PHP 8+**: Linguagem de programação utilizada para implementar a lógica da aplicação.
- **Composer**: Gerenciador de dependências para PHP, utilizado para instalar e gerenciar bibliotecas e pacotes do Laravel.
- **MySQL**: Banco de dados relacional utilizado para persistir os dados da aplicação.

#### Funcionalidades Implementadas:
1. **Endpoints da API**: Implementação de endpoints RESTful para operações CRUD (Create, Read, Update, Delete) utilizando os métodos HTTP apropriados (GET, POST, PUT, DELETE).

2. **Modelos Eloquent**: Uso dos modelos Eloquent do Laravel para mapear os dados do banco de dados em objetos PHP, facilitando a interação e manipulação dos dados.

3. **Camada de Repositório**: Utilização do padrão de projeto Repository para abstrair e encapsular as operações de acesso a dados, promovendo uma melhor organização e separação de responsabilidades.

4. **Validação de Dados**: Implementação de validações de dados para garantir a integridade e consistência das informações recebidas pela API antes de serem armazenadas no banco de dados.

5. **Tratamento de Erros**: Gerenciamento adequado de exceções e erros HTTP para fornecer respostas claras e adequadas em caso de falhas nas operações CRUD.

#### Como Utilizar:
Para explorar e utilizar este repositório:

1. **Clone o Repositório**: Clone o repositório para sua máquina local utilizando o Git.

   ```
   git clone https://github.com/Leonardo-Lucas-DEVOPS/Laravel-11-API.git
   ```

2. **Instale as Dependências**: Utilize o Composer para instalar todas as dependências do projeto Laravel.

   ```
   composer install
   ```

3. **Configure o Ambiente**: Configure o arquivo `.env` com as configurações do seu ambiente de desenvolvimento, incluindo conexão com o banco de dados.

4. **Execute as Migrações**: Execute as migrações do Laravel para criar as tabelas necessárias no banco de dados.

   ```
   php artisan migrate
   ```

5. **Inicie o Servidor**: Inicie o servidor de desenvolvimento do Laravel para testar e acessar a API.

   ```
   php artisan serve
   ```

#### Contribuições e Melhorias:
Contribuições são bem-vindas! Sinta-se à vontade para sugerir melhorias, correções ou novas funcionalidades através de pull requests. Este repositório é um ambiente de aprendizado e prática para explorar as capacidades do Laravel 11 no contexto de desenvolvimento de APIs.

---
