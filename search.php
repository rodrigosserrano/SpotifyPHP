<?php 
include_once 'lib/config.php';
if(isset($_GET['opc'])) {
  $opc = $_GET['opc'];
}else{
  $opc = "H";
  $argumentos = " WHERE 1 = 1 ";
  if($_POST['procurar_musica'] != '' ) {
      $procura = $_POST['procurar_musica'];
      $titulo = $procura;
      $argumentos = $argumentos . " AND NOME_MUSICA LIKE '%$procura%' OR NOME_BANDA LIKE '%$procura%' OR NOME_ALBUM LIKE '%$procura%'";
  }
  $argumentos = $argumentos . " ORDER BY NOME_MUSICA";
  $tabela = funSelect('vw_musicas', '*', $argumentos);
}
include 'template/header.php';
if ($opc == "H") : ?>
    <div class="container pt-5">
        <div class="pt-5 flex-column col-md-12">
        <div class="text-center p-3 color_sptf">
        <p class="h4 mb-6"><img src="img/logo.png" width="9%"/></p>
        <hr/>
        <label><strong class="title_card">Resuldado da busca de <?= $procura ?></strong></label>
            <div class="table-wrapper-scroll-y my-custom-scrollbarsptf mt-3">
                <table class="table table_sptf table-striped mb-0 ">
                    <thead>
                    <tr>
                        <th scope="col">Player</th>
                        <th scope="col">Banda</th>
                        <th scope="col">Nome da música</th>
                        <th scope="col">Álbum</th>
                        <?php if(isset($_SESSION['id'])) : ?>
                        <th scope="col">Favoritar ou Remover</th>
                        <?php else : ?>
                        <th colspan="2" scope="col">Entre ou Inscreva-se</th>
                        <?php endif ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($tabela as $musica) :?>
                    <tr>
                        <th scope="row"><iframe width="6%" height="20" scrolling="no" frameborder="no" src="<?= $musica['PLAYER_MUSICA'] ?>"></iframe></th>
                        <td><?= $musica['NOME_BANDA'] ?></td>
                        <td><?= $musica['NOME_MUSICA'] ?></td>
                        <td><?= $musica['NOME_ALBUM'] ?></td>
                        <?php if(isset($_SESSION['id'])) : ?>
                        <?php $id_m = $musica['ID']; 
                        $id_usuario = $_SESSION['id']; ?>
                        <?php if(funSelect('tb_fav', '*', "WHERE id_musica = '$id_m' AND id_usuario = '$id_usuario'")): ?>
                        <form method="POST" action="msc.php?opc=D">
                            <td><button class="btn_sptf" name="musica_id" value="<?= $musica['ID'] ?>" type="submit"><i class="fas fa-heart-broken"></i></button></td>
                        </form> 
                        <?php else : ?>
                        <form method="POST" action="msc.php?opc=F">
                            <td><button class="btn_sptf" name="musica_id" value="<?= $musica['ID'] ?>" type="submit"><i class="fas fa-heart"></i></button></td>
                        </form> 
                        <?php endif ?>
                        <?php else : include 'template/modal/modal_info.php';?>
                        <td><button class="btn_sptf" data-toggle="modal" data-target="#Info"><i class="fas fa-heart"></i></button></td>
                        <?php endif ?>
                        </tr>
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