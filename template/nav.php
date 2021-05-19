<?php 
include 'lib/usuario_logado.php';
?>
<body class="background_sptf">
    <nav class="navbar fixed-top navbar-expand-md navbar-dark color_nav scrolling-navbar">
    <ul class="navbar-nav mr-auto">  
      <a class="navbar-brand" href="index.php">
          <img src="img/logo.png" height="30" alt="mdb logo"> <strong>Spotify</strong>
        </a>
        <li class="nav-item">
          <a class="nav-link" href="bandas.php">Bandas</a>
      </li>
      <li class="nav-item disabled">
          <a class="nav-link" href="#">|</a>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="genero.php">Gênero</a>
      </li>
      <?php if($logado) : ?>
      <li class="nav-item disabled">
          <a class="nav-link" href="#">|</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="fav.php">Músicas favoritadas</a>
      </li>
      <?php endif ?>
      </ul>
      <form class="form-inline" action="search.php" method="POST">
      <div class="form-group my-0 ">
        <input type="text" class="form-control search_sptf" id="procurar_musica" name="procurar_musica" placeholder="Música, álbum ou banda">
      </div>
    </form>
      <ul class="navbar-nav ml-auto nav-flex-icons">
      <?php if($permissao == 1) : ?>
        <li class="nav-item">
            <a class="nav-link" href="painel/">Painel</a>
        </li>
        <?php endif ?>
      <?php if($logado) : ?>
        <ul class="navbar-nav ml-auto nav-flex-icons">
          <li class="nav-item">
              <a class="nav-link" href="lib/logout.php">Sair</a>
          </li>
        </ul>
        <?php else : ?>
          <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#Register" href="#">Inscrever-se</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#Login" href="#">Entrar</a>
          </li>
        </ul>
      <?php endif ?>
      </nav>
      <?php include 'modal/modal_login.php'; ?>
      <?php include 'modal/modal_register.php'; ?>
<?php include 'template/script.php'; ?>