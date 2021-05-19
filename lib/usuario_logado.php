<?php 
include_once 'config.php';

if(isset($_SESSION['id'])){
   $logado = $_SESSION['usuario_logado'];
   $permissao = $_SESSION['permissao'];
   $nome = $_SESSION['nome'];
}else{
  $logado = 0;
  $permissao = 0;
  $nome = "";
}
?>