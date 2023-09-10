<?php 
include_once 'lib/config.php';
if (!isset($_SESSION['id'])) {
  session_destroy();
  header("Location: index.php"); exit;
}
if(!empty($_GET['opc'])) {
  $opc = $_GET['opc'];
}else{
  $opc = "H";
  $titulo = "Favoritos de ".$_SESSION['nome'];
  $id = $_SESSION['id'];
  $musica = funSelect("vw_musicas", "*", "ORDER BY NOME_MUSICA");
}
include 'template/header.php';

if ($opc == "H") : ?>
    <div class="container pt-5">
        <div class="pt-5 flex-column col-md-12">
        <div class="text-center p-3 color_sptf">
        <p class="h4 mb-6"><img src="img/logo.png" width="9%"/></p>
        <hr/>
        <label><strong class="title_card">Favoritos de <?= $_SESSION['nome'] ?></strong></label>
            <div class="table-wrapper-scroll-y my-custom-scrollbarsptf mt-3">
                <table class="table table_sptf table-striped mb-0 ">
                    <thead>
                    <tr>
                        <th scope="col">Player</th>
                        <th scope="col">Banda</th>
                        <th scope="col">Nome da música</th>
                        <th scope="col">Álbum</th>
                        <th scope="col">Remover dos favoritos</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($musica as $favorito) :
                    $id_m = $favorito['ID']; 
                    $id_usuario = $_SESSION['id']; 
                    if(funSelect('tb_fav', '*', "WHERE id_musica = '$id_m' AND id_usuario = '$id_usuario'")): ?>
                    <tr>
                        <th scope="row"><iframe width="6%" height="20" scrolling="no" frameborder="no" src="<?= $favorito['PLAYER_MUSICA'] ?>"></iframe></th>
                        <td><?= $favorito['NOME_BANDA'] ?></td>
                        <td><?= $favorito['NOME_MUSICA'] ?></td>
                        <td><?= $favorito['NOME_ALBUM'] ?></td>
                        <form method="POST" action="msc.php?opc=D">
                            <td><button class="btn_sptf" name="musica_id" value="<?= $favorito['ID'] ?>" type="submit"><i class="fas fa-heart-broken"></i></button></td>
                        </form>
                    </tr>
                    <?php endif ?>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
<?php endif ?>
<?php include 'template/footer.php'; ?>
<?php include 'template/script.php'; ?>