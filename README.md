# Orientações para rodar o projeto

# Acesso ao projeto

- Crie um diretório para baixar o código
- Abra um termianl/prompt e acesse o diretório criado para o projeto
```
cd /path/to/project 
```
- Execute o comando abaixo para baixar o código do projeto
```
git clone -b JoseLucasAquino git@github.com:Curso-Beta/teste-php-laravel.git
```

- Caso já utilize containers, tenha certeza que a porta 8190 esteja livre
ou altere o atributo ports no arquivo doccker-compose.yml
```
ports:
    -8190:80
```

- Para rodar o projeto, execute o comando
```
docker compose up -d
```

- Após terminar, acesse o container para gerar a chave de app, que o Laravel utiliza para encriptações (Essa chave é obrigatória)
```
docker-exec -it teste /bin/sh
php artisan key:generate
```

- Para conectar a aplicação ao seu banco de dados, acesse o arquivo .env, que também é gerado pelo comando anterior, e forneça os dados de acesso do banco de dados
```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=teste
DB_USERNAME=teste
DB_PASSWORD=password
```

- Por fim, execute as mirgrations, que vão construir a estrutura inicial do banco de dados.
```
php artisan migrate
```

# Acesso a api
- Acesse a url, conforme a porta escolhida no arquivo docker-compose.yml, no caso default a prota 8190
```
http//localhost:8190/api/
```

- Assim você já poderá acessar a documentação da api, para saber mais sobre a utilização do projeto.
```
http//localhost:8190/api/documentation

