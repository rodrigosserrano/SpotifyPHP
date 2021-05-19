<?php
include "../config.php";
if(isset($_GET['opc'])) {
    $opc = $_GET['opc'];
}
if($opc == "insert"){
    $id_album = $_POST['id_album'];
    $genero = $_POST['genero'];
    $nome_musica = $_POST['nome_musica'];
    $link_musica = $_POST['link_musica'];

    $campos = "ALBUM_ID, GENERO_ID, NOME_MUSICA, PLAYER_MUSICA";
    $valores = "'$id_album', '$genero', '$nome_musica', '$link_musica'";
    //funInsert("tb_musicas", $campos, $valores);
    //funInsert($tabela, $campos, $valores)
    if($_SESSION['permissao'] == 1){
        if(funInsert("tb_musicas", $campos, $valores)) {
            header('index.php');
            echo '<script language="JavaScript"> 
            alert("Música inserida com sucesso !");
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
    $id = $_POST['ID'];
    if($_SESSION['permissao'] == 1){
        funDelete('tb_musicas', "WHERE id = '$id'");
            echo '<script language="JavaScript"> 
            alert("Música removida.");
            window.location="javascript:history.back()"
            </script>';
    }else{
        session_destroy();
        header("Location: ../index.php"); exit;
    }

}elseif($opc == "update"){
    $id = $_POST['id_musica'];
    $album = $_POST['album_id'];
    $genero = $_POST['genero_id'];
    $musica = $_POST['nome_musica'];  
    $player = $_POST['link_musica'];

    $alteracoes = " ALBUM_ID = '$album', GENERO_ID = '$genero', NOME_MUSICA = '$musica', PLAYER_MUSICA = '$player'";
    $argumentos = "WHERE ID = '$id'";
    if($_SESSION['permissao'] == 1){
        if(funUpdate('tb_musicas', $alteracoes, $argumentos)){
            echo '<script language="JavaScript"> 
            alert("Música atualizada com sucesso !");
            window.location="javascript:history.back()"
            </script>';
        }else{
            echo '<script language="JavaScript"> 
            alert("Erro ao atualizar música !");
            window.location="javascript:history.back()"
            </script>';
        }
    }else{
        session_destroy();
        header("Location: ../../index.php"); exit;
    }
}

?>