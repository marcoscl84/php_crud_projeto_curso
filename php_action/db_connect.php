<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "crud";

// mysqli tem suporte para programação procedural
$connect = mysqli_connect($servername, $username, $password, $db_name);
mysqli_set_charset($connect, "utf-8");

if(mysqli_connect_error()):
    echo "Erro na conexão: ".mysqli_connect_error();
endif;