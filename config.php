
<?php


/* CRIANDO CONEXÃO COM O BANCO DE DADOS  */


$db_name = 'minipi'; /* AQUE O BANCO DE DADOS DIGITANDO O NOME */
$db_host = 'localhost:3306'; /*O ENDEREÇO DO SERVIDOR DO BANCO E TAMBÉM A PORTA */
$db_user = 'root';/* O NOME DE USUARIO PARA CONECTAR AO BANCO */
$db_password = ''; /* AQUE SENHA PARA O USUARIO DO BANCO DE DADOS*/

$pdo = new PDO("mysql:dbname=".$db_name.";host=" .$db_host, $db_user, $db_password);

/* INSTÂNCIA DA CLASSE PDO PARA CONECTAR AO BANCO DE DADOS 
MySQL USANDO OS DADOS FORNECIDOS.

orientação a objetos
*/



?>