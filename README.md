
<p align="center"><a href="https://inicie.digital/" target="_blank"><img src="https://inicie.digital/wp-content/uploads/2022/03/inicie_logo-03-2048x830.png" width="180"></a></p>

<h2 align="center">Projeto teste - seleção de candidatos</h2>
<p align="center">Escrito em PHP com  Laravel Framework v7.30.6 (PHP v7.4.1) </p>
<p align="center">Módulo para integração com a API inicie</p>

<p align="center">
<a href="#install">Instalação</a> •
<a href="#docs">Documentação</a> • 

## Instalação
<div id="install">
<p>Para instalação é necessário que o docker e docker-compose estejam devidamente instalados em sua máquina</p>
<p>O sistema está configurado para iniciar no localhost (127.0.0.1) porta 8000, e o mysql iniciará na porta 3306, certifique-se que estas portas estejam livres antes de iniciar a instalação.</p>
<p>1. Entre na pasta do projeto: </p>

```
cd inicie_app
```
<p>2. Iremos subir os containeres utilizando o docker-compose (Certifique-se de as portas 8000 e 3306 estejam livres): </p>   

```
docker-compose up -d
```
<p>3. Agora iremos executar 2 comandos no terminal do container da aplicação, o primeiro para atribuir permissões aos logs do laravel e o segundo para executar as migrações : </p>

```
docker exec laravel_app chmod 777 -R storage bootstrap/cache  
```

```
docker exec laravel_app php artisan migrate:fresh
```
</div>

## Documentação
<div id="docs">
<p>Após iniciar os containeres corretamente e o sistema estiver funcionando, a página inicial do sistema (127.0.0.1:80) disponibiliza uma descrição detalhada sobre as requisições e respostas</p>
<p>No diretório  /docs estará disponibilizado um diagrama EER do banco de dados</p>
<p>Também no diretório /docs foi disponibilizado uma collection e um enviroment para acesso via postman</p>
<p>Para visualização da collection é necessário que o postman esteja devidamente instalado na em máquina</p>
<p>1. Com o programa aberto importe a collection "php_inicie_app.postman_collection" clicando no botão "import" no canto superior esquerdo.</p>
<p>2. Agora importe o envirnoment "php_inicie_app.postman_environment.json" e selecione o environment importado no canto superior esquerdo</p>
</div>


As seguintes estão sendo foram usadas na construção do projeto:

- [Laravel](https://laravel.com/)
- [Docker](https://www.docker.com/)
- [Mysql](https://www.mysql.com/)
