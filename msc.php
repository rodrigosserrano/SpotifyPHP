
<?php 
include_once 'lib/config.php';
if(isset($_GET['opc'])) {
  $opc = $_GET['opc'];
}else{
  $opc = "H";
  $musicas = $_POST['ALBUM_ID'];
  $albuns = funSelect("vw_albuns_bandas", "*", "WHERE ALBUM_ID = '$musicas'");
  foreach ($albuns as $album) {
    if($musicas == $album['ALBUM_ID']){
      $titulo = $album['NOME_BANDA'].", ".$album['NOME_ALBUM'];
    }
  }
}
include 'template/header.php';
if ($opc == "H") : ?>
<div class="container pt-5">
  <div class="pt-5 flex-column col-md-12">
        <div class="text-center p-3 color_sptf">
        <p class="h4 mb-6"><img src="img/logo.png" width="9%"/></p>
        <hr/>
          <label><strong class="title_card">Músicas do álbum <?= $album['NOME_ALBUM'] ?></strong></label>
          <div class="row">
          <?php foreach ($albuns as $album) : ?>
            <?php if($musicas == $album['ALBUM_ID']) : ?>
            <div class="col-lg-3 col-md-1 pt-3">
              <div class="card">
                <?php if($album['IMG_ALBUM'] == 'img/albuns/') : ?>
                  <img class="card-img-top" src="/img/albuns/erro.jpg" alt="Card image cap">
                <?php else : ?>
                  <img class="card-img-top" src="<?= $album['IMG_ALBUM'] ?>" alt="Card image cap">
                <?php endif ?>
                <div class="card-body color_background_sptf" style="height: 200px !important">
                  <h4 class="card-title title_card"><a><?= $album['NOME_BANDA']; ?></a></h4>
                  <p class="card-text pt-2"><strong>Álbum: </strong><?= $album['NOME_ALBUM']; ?></p>
                  <p class="card-text pt-2"><strong>Gênero: </strong> <?= $album['GENERO']; ?></p>
                    <div class="mt-2">
                    </div>
                </div>
              </div>
            </div>
            <?php endif ?>
            <?php endforeach ?>
              <div class="table-wrapper-scroll-y my-custom-scrollbar-list mt-3">
                <table class="table table_sptf table-striped mb-0 ">
                    <thead>
                    <tr>
                        <th scope="col">Player</th>
                        <th scope="col">Nome da música</th>
                        <?php if(isset($_SESSION['id_usuario'])) : ?>
                        <th scope="col">Favoritar ou Remover</th>
                        <?php else : ?>
                        <th colspan="2" scope="col">Entre ou Inscreva-se</th>
                        <?php endif ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $musica = funSelect("tb_musicas", "*", "WHERE ALBUM_ID = '$musicas'");
                    for($i=0;$i<count($musica);$i++) :?>
                    <tr>
                        <td><iframe width="10%" height="20" scrolling="no" frameborder="no" src="<?= $musica[$i]['PLAYER_MUSICA'] ?>"></iframe></td>
                        <td><?= $musica[$i]['NOME_MUSICA'] ?></td>
                        <?php if(isset($_SESSION['id'])) : ?>
                        <?php $id_m = $musica[$i]['ID']; 
                        $id_usuario = $_SESSION['id']; ?>
                        <?php if(funSelect('tb_fav', '*', "WHERE id_musica = '$id_m' AND id_usuario = '$id_usuario'")): ?>
                        <form method="POST" action="msc.php?opc=D">
                        <td><button class="btn_sptf" name="musica_id" value="<?= $musica[$i]['ID'] ?>" type="submit"><i class="fas fa-heart-broken"></i></button></td>
                        </form> 
                        <?php else : ?>
                        <form method="POST" action="msc.php?opc=F">
                          <td><button class="btn_sptf" name="musica_id" value="<?= $musica[$i]['ID'] ?>" type="submit"><i class="fas fa-heart"></i></button></td>
                        </form> 
                        <?php endif ?>
                        <?php else : include 'template/modal/modal_info.php';?>
                        <td><button class="btn_sptf" data-toggle="modal" data-target="#Info"><i class="fas fa-heart"></i></button></td>
                        <?php endif ?>
                      </tr>
                      <?php endfor ?>
                    </tbody>
                </table>
              </div>
          </div>
        </div>
  </div>
  <?php endif ?>
  <?php
    if($opc == "F"){
      $id_usuario = $_SESSION['id'];  
      $id_musica = $_POST['musica_id'];
      $campos = "id_usuario, id_musica";
      $valores = "'$id_usuario', '$id_musica'";
      funInsert('tb_fav', $campos, $valores);
        echo '<script language="JavaScript"> 
        alert("Musica favoritada !");
        window.location="fav.php"; 
        </script>';
    }
    if($opc == "D"){
      $id_usuario = $_SESSION['id'];  
      $id_musica = $_POST['musica_id'];
      funDelete('tb_fav', "WHERE id_musica = '$id_musica' AND id_usuario = '$id_usuario'");
        echo '<script language="JavaScript"> 
        alert("Musica Removida dos Favoritos.");
        window.location="fav.php"; 
        </script>';
      }
    ?>
</div>
<?php include 'template/footer.php'; ?>
<?php include 'template/script.php'; ?>
