<?php
include "../config.php";
if(isset($_GET['opc'])) {
    $opc = $_GET['opc'];
}
if($opc == "insert"){
    $nome_banda = $_POST['nome_banda'];

    $campos = "NOME_BANDA";
    $valores = "'$nome_banda'";
    //funInsert("tb_musicas", $campos, $valores);
    //funInsert($tabela, $campos, $valores)
    if($_SESSION['permissao'] == 1){
        if(funInsert("tb_bandas", $campos, $valores)) {
            header('index.php');
            echo '<script language="JavaScript"> 
            alert("Banda inserida com sucesso !");
            window.location="javascript:history.back()";
            </script>'; 
        }else{
            header('index.php');
            echo '<script language="JavaScript"> 
            alert("Erro ao cadastrar banda.");
            window.location="javascript:history.back()";
            </script>'; 
        }
    }else{
        session_destroy();
        header("Location: ../index.php"); exit;
    }
    
}elseif($opc == "delete"){
    $banda_id = $_POST['banda_id'];
    $album_id = $_POST['album_id'];
    if($_SESSION['permissao'] == 1){
        if(funDelete('tb_musicas', "WHERE ALBUM_ID = '$album_id'")){
            if(funDelete('tb_albuns', "WHERE ID = '$album_id'")){
                if(funDelete('tb_bandas', "WHERE ID = '$banda_id'")){
                    echo '<script language="JavaScript"> 
                    alert("Banda removida.");
                    window.location="javascript:history.back()"
                    </script>';
                }else{
                    echo '<script language="JavaScript"> 
                    alert("Erro ao remover banda.");
                    window.location="javascript:history.back()"
                    </script>';
                }
            }else{
                echo '<script language="JavaScript"> 
                alert("Erro ao remover álbum.");
                window.location="javascript:history.back()"
                </script>';
            }
        }else{
            echo '<script language="JavaScript"> 
            alert("Erro ao remover o música do álbum.");
            window.location="javascript:history.back()"
            </script>';
        }
    }else{
        session_destroy();
        header("Location: ../index.php"); exit;
    }

}elseif($opc == "update"){
    $banda_id = $_POST['banda_id'];
    $nome_banda = $_POST['nome_banda'];

    $alteracoes = "NOME_BANDA = '$nome_banda'";
    $argumentos = "WHERE ID = '$banda_id'";
    if($_SESSION['permissao'] == 1){
        if(funUpdate('tb_bandas', $alteracoes, $argumentos)){
            echo '<script language="JavaScript"> 
            alert("Banda atualizada com sucesso !");
            window.location="javascript:history.back()"
            </script>';
        }else{
            echo '<script language="JavaScript"> 
            alert("Erro ao atualizar banda!");
            window.location="javascript:history.back()"
            </script>';
        }
    }else{
        session_destroy();
        header("Location: ../../index.php"); exit;
    }
}

?>