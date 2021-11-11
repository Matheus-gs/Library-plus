<!-- Conectando ao banco de dados -->
<?php

// Dados de conexão
$hostname = "localhost";
$database = 'testdb';
$username = 'root';
$password = 'rubik';

// String de conexão PDO
$connection_string = 'mysql:host=' . $hostname . ';dbname=' . $database;

// Estabelecendo a conexão
$pdo = new PDO($connection_string, $username, $password);

// Verificando se a conexão foi feita
if ($pdo) {
  print "<script type='text/javascript'>console.log('Conectado com sucesso!');</script>";
} else {
  print "<script type='text/javascript'>console.log('Erro ao conectar!');</script>";
}

?>