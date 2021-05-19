<?php
$n_album = $album['NOME_ALBUM'];
$albuns = funSelect('vw_albuns_bandas', '*', "WHERE NOME_ALBUM = '$n_album'");
$generos = funSelect('tb_genero', '*', "");
 ?>
<div class="modal fade" id="AddM_<?= $album['ALBUM_ID'] ?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content modal_sptf">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <p class="h4 title_card text-center">Adicionar musica no álbum <?= $album['NOME_ALBUM'] ?>, de <?= $album['NOME_BANDA'] ?></p>
          <form class="text-center p-3 row" method="POST" action="../lib/music/msc.php?opc=insert">
            <div class="col-md-12">
              <div class="form-group">
              <input  type="hidden" name="id_album" value="<?= $album['ALBUM_ID'] ?>">
                <p class="color_sptf_painel">Nome da música:</p>
                <input type="text" id="defaultRegisterFormFirstName" name="nome_musica" class="form-control mb-4 placeholder_sptf" placeholder="Nome da música" required>
                <p class="color_sptf_painel">Link SoundCloud:</p>
                <input type="text" id="defaultRegisterFormFirstName" name="link_musica" class="form-control mb-4 placeholder_sptf" placeholder="Link SoundCloud" required>
                <p class="color_sptf_painel">Gênero:</p>
                <select class="form-control placeholder_sptf" name="genero" id="exampleFormControlSelect1" required>
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