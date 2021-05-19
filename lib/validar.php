<?php
include "config.php";
// $_SESSION = array();
$email = $_POST['email'];
$senha = md5($_POST['senha']);

$res = verifica($email, $senha);

if(mysqli_num_rows($res) == 1){  
    $usuario = mysqli_fetch_assoc($res);
    $_SESSION['id'] = $usuario['id'];
    $_SESSION['nome'] = $usuario['nome'];
	$_SESSION['email'] = $usuario['email'];
    $_SESSION['permissao'] = $usuario['permissao'];
    $_SESSION['usuario_logado'] = true;
    echo "<script>window.location='javascript:history.back()'</script>";
}else{
        echo '<script language="JavaScript"> 
            alert("Não registrado ou usuário e senha incorretos.");
            window.location="javascript:history.back()"; 
        </script>'; 
        }

?>