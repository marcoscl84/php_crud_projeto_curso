<?php
// Sessão
session_start();

// Conexão
require_once 'db_connect.php';

// função para limpar 
function clear($input){
    global $connect;
    // sql injection 
    $var = mysqli_escape_string($connect, $input);
    // cross side script (xss) - (ataque por inserção de scripts)
    $var = htmlspecialchars($var);
    return $var;
}

////// mysqli_scape_string é uma função de proteção caso seja inserido nos 
////// inputs algum comando sql malicioso

if(isset($_POST['btn-cadastrar'])):
    
    $nome = clear($_POST['nome']);
    $sobrenome = clear($_POST['sobrenome']);
    $email = clear($_POST['email']);
    $idade = clear($_POST['idade']);
    

    $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";

    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Cadastrado com Sucesso!";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar.";
        header('Location: ../index.php');
    endif;
endif;