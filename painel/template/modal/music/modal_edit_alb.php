<?php
$id = $album['ALBUM_ID'];
  $albuns = funSelect('vw_albuns_bandas', '*', "WHERE ALBUM_ID = '$id'");
$generos = funSelect('tb_genero', '*', "");
 ?>
<div class="modal fade" id="EditA_<?= $album['ALBUM_ID'] ?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content modal_sptf">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <p class="h4 title_card text-center">Editar álbum de <?= $album['NOME_BANDA'] ?></p>
          <form class="text-center p-3 row" method="POST" action="../lib/music/alb.php?opc=update">
            <div class="col-md-12">
              <div class="form-group">
              <input type="hidden" value="<?= $album['BANDA_ID'] ?>" name="banda_id">
              <input type="hidden" value="<?= $album['ALBUM_ID'] ?>" name="id_album">
                <p class="color_sptf_painel">Novo nome do álbum:</p>
                <input type="text" id="defaultRegisterFormFirstName" name="nome_album" class="form-control mb-4 placeholder_sptf" value="<?= $album['NOME_ALBUM'] ?>" placeholder="Novo nome do álbum" required>
                <p class="color_sptf_painel">Novo link da capa do álbum:</p>
                <input type="text" id="defaultRegisterFormFirstName" name="img_album" class="form-control mb-4 placeholder_sptf" value="<?= $album['IMG_ALBUM'] ?>" placeholder="Novo link da capa do álbum" required>
                <p class="color_sptf_painel">Gênero:</p>
                <select class="form-control placeholder_sptf" name="genero_id" id="exampleFormControlSelect1" required>
                <?php foreach ($generos as $genero) : ?>
                  <option value="<?= $genero['ID'] ?>"><?= $genero['GENERO'] ?></option>
                <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <button class="btn btn-sm btn_sptf btn_sptf_default" type="submit">Editar</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>