<!--php/db.php = desenvolvido para se conectar todo o sistema ao banco de dados do DBeaver-->

<?php
$host = 'localhost';
$db = 'escola';
$user = 'Arthur Beck';
$pass = '97010000';
$port = '3306';

$connection = new mysqli($host, $user, $pass, $db, $port);  //Cria conexão//
?>

<!--DICA: ficam fora da pasta 'php/' apenas os arquivos que apresentarão alguma mudança visual->
