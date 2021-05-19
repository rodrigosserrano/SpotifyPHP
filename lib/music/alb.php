<?php
include "../config.php";
if(isset($_GET['opc'])) {
    $opc = $_GET['opc'];
}
if($opc == "insert"){
    $banda_id = $_POST['banda_id'];
    $genero_id = $_POST['genero_id'];
    $nome_album = $_POST['nome_album'];
    $img_album = $_POST['img_album'];

    $campos = "BANDA_ID, GENERO_ID, NOME_ALBUM, IMG_ALBUM";
    $valores = "'$banda_id', '$genero_id', '$nome_album', '$img_album'";
    //funInsert("tb_musicas", $campos, $valores);
    //funInsert($tabela, $campos, $valores)
    if($_SESSION['permissao'] == 1){
        if(funInsert("tb_albuns", $campos, $valores)) {
            header('index.php');
            echo '<script language="JavaScript"> 
            alert("Álbum inserido com sucesso !");
            window.location="javascript:history.back()";
            </script>'; 
        }else{
            header('index.php');
            echo '<script language="JavaScript"> 
            alert("Erro ao cadastrar música.");
            window.location="javascript:history.back()";
            </script>'; 
        }
    }else{
        session_destroy();
        header("Location: ../index.php"); exit;
    }
    
}elseif($opc == "delete"){
    $id_album = $_POST['id_album'];
    if($_SESSION['permissao'] == 1){
        if(funDelete('tb_musicas', "WHERE ALBUM_ID = '$id_album'")){
            if(funDelete('tb_albuns', "WHERE ID = '$id_album'")){
                echo '<script language="JavaScript"> 
                alert("Álbum removido.");
                window.location="javascript:history.back()"
                </script>';
            }else{
                echo '<script language="JavaScript"> 
                alert("Erro ao remover álbum.");
                window.location="javascript:history.back()"
                </script>';
            }
        }else{
            echo '<script language="JavaScript"> 
            alert("Erro ao remover músicas do álbum.");
            window.location="javascript:history.back()"
            </script>';
        }
    }else{
        session_destroy();
        header("Location: ../index.php"); exit;
    }

}elseif($opc == "update"){
    $id_album = $_POST['id_album'];
    $banda_id = $_POST['banda_id'];
    $nome_album = $_POST['nome_album'];
    $img_album = $_POST['img_album'];
    $genero_id = $_POST['genero_id'];

    $alteracoes = "BANDA_ID = '$banda_id', GENERO_ID = '$genero_id', NOME_ALBUM = '$nome_album', IMG_ALBUM = '$img_album'";
    $argumentos = "WHERE ID = '$id_album'";
    if($_SESSION['permissao'] == 1){
        if(funUpdate('tb_albuns', $alteracoes, $argumentos)){
            echo '<script language="JavaScript"> 
            alert("Álbum atualizado com sucesso !");
            window.location="javascript:history.back()"
            </script>';
        }else{
            echo '<script language="JavaScript"> 
            alert("Erro ao atualizar álbum!");
            window.location="javascript:history.back()"
            </script>';
        }
    }else{
        session_destroy();
        header("Location: ../../index.php"); exit;
    }
}

?>