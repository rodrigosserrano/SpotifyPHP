<?php
$albuns = funSelect('vw_albuns_bandas', '*', "GROUP BY NOME_BANDA");
$generos = funSelect('tb_genero', '*', "");
 ?>
<div class="modal fade" id="AddA" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content modal_sptf">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <p class="h4 title_card text-center">Adicionar álbum </p>
          <form class="text-center p-3 row" method="POST" action="../lib/music/alb.php?opc=insert">
            <div class="col-md-12">
              <div class="form-group">
              <input type="hidden" value="<?= $album['ALBUM_ID'] ?>" name="album_id">
              <p class="color_sptf_painel">Banda:</p>
              <select class="form-control placeholder_sptf" name="banda_id" id="exampleFormControlSelect1" required>
                  <option value="" selected disable>Selecione: </option>
                  <?php foreach ($albuns as $albuns) : ?>
                  <option value="<?= $albuns['BANDA_ID'] ?>"><?= $albuns['NOME_BANDA'] ?></option>
                  <?php endforeach ?>
                </select>
                <p class="color_sptf_painel">Nome do álbum:</p>
                <input type="text" id="defaultRegisterFormFirstName" name="nome_album" class="form-control mb-4 placeholder_sptf" placeholder="Nome do álbum" required>
                <p class="color_sptf_painel">Link da capa do álbum:</p>
                <input type="text" id="defaultRegisterFormFirstName" name="img_album" class="form-control mb-4 placeholder_sptf" value="img/albuns/" placeholder="Link da capa do álbum" required>
                <p class="color_sptf_painel">Gênero:</p>
                <select class="form-control placeholder_sptf" name="genero_id" id="exampleFormControlSelect1" required>
                  <option value="" selected disable>Selecione: </option>
                  <?php foreach ($generos as $genero) : ?>
                  <option value="<?= $genero['ID'] ?>"><?= $genero['GENERO'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <button class="btn btn-sm btn_sptf btn_sptf_default" type="submit">Adicionar</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>