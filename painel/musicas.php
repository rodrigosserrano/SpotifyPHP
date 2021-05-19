<?php
include_once '../lib/config.php';
if(isset($_GET['opc'])) {
  $opc = $_GET['opc'];
}else{
  $opc = "H";
  $titulo = "Bandas";
  $bandas = funSelect('vw_albuns_bandas', '*', 'GROUP BY NOME_BANDA');
}
if($opc == "alb"){
  $titulo = "Álbuns";
}
if($opc == "msc"){
  $titulo = "Musicas";
}

include 'template/header.php';

if($opc == "H") : ?>
<div class="container pt-5">
  <div class="pt-5 flex-column col-md-12">
    <div class="text-center p-3 color_sptf">
    <p class="h4 mb-6"><img src="../img/logo.png" width="9%"/></p>
      <hr/>
      <label><strong class="title_card">Opções para banda</strong></label>
      <div class="table-wrapper-scroll-y my-custom-scrollbarsptf mt-3">
        <button class="btn_sptf" style="width: 100px;" data-toggle="modal" data-target="#AddB" data-id="" name=""><i class="fas fa-plus-circle"></i> Banda</button> 
        <table class="table table_sptf table-striped mb-0 ">
            <thead>
            <tr>
                <th scope="col">Banda</th>
                <th scope="col">Gênero</th>
                <th colspan="2" scope="col">Ação</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($bandas as $banda) :?>
            <tr>
                <th><?= $banda['NOME_BANDA'] ?></th>
                <td><?= $banda['GENERO'] ?></td>
                <?php include 'template/modal/music/modal_add_ban.php'; ?>
                <?php include 'template/modal/music/modal_del_ban.php'; ?>
                <?php include 'template/modal/music/modal_edit_ban.php'; ?>
                <td><button class="btn_sptf" data-toggle="modal" data-target="#EditB_<?= $banda['BANDA_ID'] ?>" data-id="<?= $banda['BANDA_ID'] ?>" name="id" ><i class="far fa-edit"></i></button></td>
                <td><button class="btn_sptf" data-toggle="modal" data-target="#DelB_<?= $banda['BANDA_ID'] ?>" data-id="<?= $banda['BANDA_ID'] ?>" name="id"><i class="far fa-trash-alt"></i></button></td>
            </tr>
            <?php endforeach ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php elseif($opc == "alb") : $albuns = funSelect('vw_albuns_bandas', '*', 'ORDER BY NOME_BANDA'); ?>
<div class="container pt-5">
  <div class="pt-5 flex-column col-md-12">
    <div class="text-center p-3 color_sptf">
    <p class="h4 mb-6"><img src="../img/logo.png" width="9%"/></p>
      <hr/>
      <label><strong class="title_card">Músicas registradas</strong></label>
      <div class="table-wrapper-scroll-y my-custom-scrollbarsptf mt-3">
      
        <button class="btn_sptf" style="width: 100px;" data-toggle="modal" data-target="#AddA" data-id="" name=""><i class="fas fa-plus-circle"></i> Álbum</button> 
        <table class="table table_sptf table-striped mb-0 ">
            <thead>
            <tr>
                <th scope="col">Banda</th>
                <th scope="col">Álbum</th>
                <th colspan="3" scope="col">Ação</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($albuns as $album) :?>
            <tr>
                <th><?= $album['NOME_BANDA'] ?></th>
                <td><?= $album['NOME_ALBUM'] ?></td>
                <?php include 'template/modal/music/modal_add_alb.php'; ?>
                <?php include 'template/modal/music/modal_add_msc.php'; ?>
                <?php include 'template/modal/music/modal_edit_alb.php'; ?>
                <?php include 'template/modal/music/modal_del_alb.php'; ?>
                <td><button class="btn_sptf" style="width: 100px;" data-toggle="modal" data-target="#AddM_<?= $album['ALBUM_ID'] ?>" data-id="" name=""><i class="fas fa-plus-circle"></i> Música</button></td>
                <td><button class="btn_sptf" data-toggle="modal" data-target="#EditA_<?= $album['ALBUM_ID'] ?>" data-id="<?= $album['ALBUM_ID'] ?>" name="id" ><i class="far fa-edit"></i></button></td>
                <td><button class="btn_sptf" data-toggle="modal" data-target="#DelA_<?= $album['ALBUM_ID'] ?>" data-id="<?= $album['ALBUM_ID'] ?>"><i class="far fa-trash-alt"></i></button></td>
            </tr>
            <?php endforeach ?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php elseif($opc == "msc") : $musicas = funSelect('vw_musicas', '*', 'ORDER BY NOME_MUSICA'); ?>
<div class="container pt-5">
  <div class="pt-5 flex-column col-md-12">
    <div class="text-center p-3 color_sptf">
    <p class="h4 mb-6"><img src="../img/logo.png" width="9%"/></p>
      <hr/>
      <label><strong class="title_card">Músicas registradas</strong></label>
      <div class="table-wrapper-scroll-y my-custom-scrollbarsptf mt-3">
        <table class="table table_sptf table-striped mb-0 ">
            <thead>
            <tr>
                <th scope="col">Banda</th>
                <th scope="col">Álbum</th>
                <th scope="col">Música</th>
                <th colspan="2" scope="col">Ação</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($musicas as $musica) :?>
            <tr>
                <th><?= $musica['NOME_BANDA'] ?></th>
                <td><?= $musica['NOME_ALBUM'] ?></td>
                <td><?= $musica['NOME_MUSICA'] ?></td>
                <?php include 'template/modal/music/modal_edit_msc.php'; ?>
                <?php include 'template/modal/music/modal_del_msc.php'; ?>
                <td><button class="btn_sptf" data-toggle="modal" data-target="#Edit_<?= $musica['ID'] ?>" data-id="<?= $musica['ID'] ?>" name="id" ><i class="far fa-edit"></i></button></td>
                <td><button class="btn_sptf" data-toggle="modal" data-target="#DelM_<?= $musica['ID'] ?>" data-id="<?= $musica['ID'] ?>"><i class="far fa-trash-alt"></i></button></td>
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
