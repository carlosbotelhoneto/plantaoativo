## Desafio Back-end Developer

<b>Desenvolvedor:</b> Carlos Botelho Neto<br>
<br>
1. Criação do projeto<br>
laravel new carlosbotelhoneto<br>
<br>
2. Criação do banco de dados (MySQL)<br>
mysql -u root -p -e "DROP DATABASE IF EXISTS carlosbotelhoneto;CREATE DATABASE carlosbotelhoneto"<br>
<br>
3. Configuração do acesso ao banco<br>
- Abrir o arquivo .env na pasta raiz do projeto<br>
- Informar a senha de acesso ao banco na linha 16<br>
    - DB_PASSWORD=senha<br>
<br>
4. Executar a migrações<br>
- php artisan migrate<br>

