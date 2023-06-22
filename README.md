# Tarefa Prática - Configuração do Docker para Execução do Projeto

Nesta tarefa prática, seu objetivo é configurar um ambiente Docker com **Dockerfile** e **docker-compose.** para executar o projeto de teste de conexão com banco de dados.

1.  Crie um diretório para o seu projeto.
2.  Dentro do diretório do projeto, crie os seguintes arquivos:
    -   **`index.php`**: Este arquivo contém o código HTML necessário para a interface do projeto.
    -   **`conexao.php`**: Este arquivo contém o código PHP necessário para estabelecer a conexão com o banco de dados.
    -   **`.env`**: Crie um arquivo chamado **`.env`** e defina as seguintes variáveis de ambiente:
        -   **`DB_HOST`**: Esta variável deve conter o endereço do host do banco de dados.
        -   **`DB_PORT`**: Esta variável deve conter a porta do banco de dados.
        -   **`DB_NAME`**: Esta variável deve conter o nome do banco de dados.
        -   **`DB_USER`**: Esta variável deve conter o usuário do banco de dados.
        -   **`DB_PASSWORD`**: Esta variável deve conter a senha do banco de dados.

**Observação**: Certifique-se de substituir os valores das variáveis de ambiente acima pelas informações corretas do seu ambiente.

Além disso, para visualizar o projeto no navegador, será necessário realizar as seguintes configurações:

-   Criar uma imagem personalizada: Será necessário criar um Dockerfile que especifique as dependências necessárias para o projeto, como o PHP e o Apache. Essa imagem personalizada atenderá as necessidades de comunicação do projeto.
-   Expor uma porta: Para visualizar o projeto no navegador, você precisará expor a porta do contêiner Docker para uma porta disponível em sua máquina host.
-   Criar um volume: Para garantir que o banco de dados e os arquivos necessários do servidor web sejam preservados, será necessário criar um volume que mapeie os diretórios relevantes do contêiner para o sistema de arquivos do host.

A partir dessas informações, você estará apto a configurar o ambiente Docker necessário para executar o projeto de teste de conexão com banco de dados.

O arquivo **`.env`** é um arquivo de configuração usado para definir variáveis de ambiente em um projeto. Ele segue a sintaxe chave=valor, onde cada linha contém uma variável e seu respectivo valor.

No contexto do seu projeto, o arquivo **`.env`** é utilizado para armazenar as informações sensíveis de conexão com o banco de dados, como o host, a porta, o nome do banco de dados, o usuário e a senha. Essas informações são definidas como variáveis de ambiente para serem acessadas pelo código PHP.






# Resolução
A tarefa consiste em configurar um ambiente Docker para executar o projeto de teste de conexão com banco de dados. Todos os arquivos usados estão no repositorio.

A solução proposta envolve os seguintes passos:

1.  Criação da imagem Docker personalizada:
    
    -   Utilize o arquivo Dockerfile fornecido neste repositório.
    -   A imagem base utilizada é `php:apache`, que já inclui um servidor web Apache e o PHP.
    -   Realize a instalação do driver `pdo_mysql` necessário para a conexão com o banco de dados, utilizando o comando `docker-php-ext-install pdo_mysql`.
    -   Para criar a imagem, execute o seguinte comando no diretório onde se encontra o arquivo Dockerfile:
```
docker build -t php-pdo-mysql .
```
2. Criação do arquivo `.env`:

-   Crie um arquivo chamado `.env` no diretório do seu projeto.
-   Defina as seguintes variáveis de ambiente no arquivo `.env`

3. Configuração do arquivo `docker-compose.yml`:

-   Crie um arquivo chamado `docker-compose.yml` no diretório do seu projeto.
-   Utilize o seguinte conteúdo como base para o arquivo `docker-compose.yml`

-   No arquivo do repositorio, o serviço `web` é criado a partir da imagem `php-pdo-mysql` que foi gerada no passo anterior.
-   A variavel `${WEB_PORT}`(Ex: 80) faz referencia a porta do host que é mapeada para a porta `80` do contêiner, permitindo acessar o aplicativo através de `localhost:80` no navegador.
-   Os arquivos `index.php` e `conexao.php` são mapeados como volumes dentro do contêiner, permitindo que as alterações feitas nesses arquivos sejam refletidas imediatamente no aplicativo em execução.
-   As variáveis de ambiente definidas no arquivo `.env` são passadas para o contêiner através da seção `environment` do `docker-compose.yml`.

4. Inicialização dos contêineres:

-   Com a imagem Docker criada e o arquivo `docker-compose.yml` configurado, execute o seguinte comando para iniciar os contêineres:
```
docker-compose up -d
```
Após executar o comando acima, os contêineres serão iniciados e o aplicativo estará disponível em `localhost:80` no navegador. Certifique-se de substituir os valores `host_bd`, `porta_bd`, `nome_bd`, `usuario_bd` e `senha_bd` pelas informações corretas do seu banco de dados.