<?php 
include '../lib/usuario_logado.php';
if (!isset($_SESSION['email']) || $_SESSION['permissao'] == 0) {
  session_destroy();
  header("Location: ../index.php"); exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta name="author" content="Rodrigo Serrano"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/mdb.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="../img/logo.png" />
  <title>Spotify - <?= $titulo ?></title>
  </head>
  <?php include 'nav.php'; ?>