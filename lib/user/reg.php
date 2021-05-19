<?php 
    include "../config.php";

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $senha2 = md5($_POST['senha2']);
    
    if($_SESSION['con'] && $senha == $senha2){
        $campos = "nome, email, senha";
		$valores = "'$nome', '$email', '$senha'";
		//funInsert($tabela, $campos, $valores)
            if(funInsert("tb_usuarios", $campos, $valores)) {
                header('index.php');
                echo '<script language="JavaScript"> 
                alert("Usuário cadastrado com sucesso !");
                window.location="javascript:history.back()";
                </script>'; 
            }
            $sql = mysqli_query($_SESSION['con'], "SELECT * FROM tb_usuarios WHERE email = '$email'");
            if(mysqli_num_rows($sql)>0) {
                header('index.php');
                echo '<script language="JavaScript"> 
                window.location="javascript:history.back()";
                </script>';
                //alert("Email já cadastrado !"); 
            }else{
                header('index.php');
                echo '<script language="JavaScript"> 
                alert("Erro ao cadastrar usuário.");
                window.location="javascript:history.back()";
                </script>'; 
            }
    }else{
        echo '<script language="JavaScript"> 
                alert("Senhas não conferem !");
                window.location="javascript:history.back()";
            </script>'; 
    }