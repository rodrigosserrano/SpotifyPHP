<?php 
include_once '../config.php';

$id = $_POST['id'];
$nome = $_POST['nome'];  
$email = $_POST['email'];
$permissao = $_POST['permissao'];	

$alteracoes = " nome = '$nome', email = '$email', permissao = '$permissao'";
$argumentos = "WHERE ID = '$id'";
if($_SESSION['permissao'] == 1){
    if(funUpdate('tb_usuarios', $alteracoes, $argumentos)){
        echo '<script language="JavaScript"> 
        alert("Usuário atualizado com sucesso !");
        window.location="../../painel/index.php";
        </script>';
    }else{
        echo '<script language="JavaScript"> 
        alert("Erro ao atualizar usuário !");
        window.location="../../painel/index.php";
        </script>';
    }
}else{
    session_destroy();
    header("Location: ../../index.php"); exit;
}

?>