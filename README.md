## Desafio Back-end Developer

<b>Desenvolvedor:</b> Carlos Botelho Neto<br>
<br>

# Preparação do ambiente
<br>
1. Criação do banco de dados (MySQL)<br>
mysql -u root -p -e "DROP DATABASE IF EXISTS carlosbotelhoneto;CREATE DATABASE carlosbotelhoneto"<br>
<br>
2. Configuração do acesso ao banco<br>
- Abrir o arquivo .env na pasta raiz do projeto<br>
- Informar a senha de acesso ao banco na linha 16<br>
    - DB_PASSWORD=senha<br>
<br>
3. Executar as migrações para criação das tabelas no banco de dados<br>
- php artisan migrate<br>

# Documentação da API (Swagger)
URL: http://localhost:8000/docs<br>
<br>
Listar todas as postagens:<br>
- Método: GET<br>
- URL: /api/posts/<br>
<br>
Cadastrar postagem
- Método: POST<br>
- URL: api/post/<br>
- Headers:<br>
    - Key: Content-Type<br>
    - Value: application/json<br>
- Body:<br>
    - Type: raw<br>
    - Content: conteudo da postagem em formado JSON<br>
<br>    
Filtrar postagem utilizando a busca pela ID (não solicitada)<br>
- Método: GET<br>
- URL: /api/post/{id}<br>
<br>
Filtrar postagem utilizando a busca pela TAG<br>
- Método: GET<br>
- URL: /api/post/tag/{tag}<br>
<br>
Alterar postagem da ID informada:<br>
- Método: PUT<br>
- URL: api/post/{id}<br>
- Headers:<br>
    - Key: Content-Type<br>
    - Value: application/json<br>
- Body:<br>
    - Type: raw<br>
<br>
Excluir postagem da ID informada<br>
- Método: PUT<br>
- URL: api/post/{id}<br>