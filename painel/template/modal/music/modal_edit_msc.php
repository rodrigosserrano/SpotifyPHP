<?php
$n_banda = $musica['NOME_BANDA'];
$albuns = funSelect('vw_albuns_bandas', '*', "WHERE NOME_BANDA = '$n_banda'");
$generos = funSelect('tb_genero', '*', "");
?>
<div class="modal fade" id="Edit_<?= $musica['ID'] ?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content modal_sptf">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <p class="h4 title_card text-center">Editar música <?= $musica['NOME_MUSICA'] ?></p>
          <form class="text-center p-3 row" method="POST" action="../lib/music/msc.php?opc=update">
            <div class="col-md-12">
              <div class="form-group">
              <p class="color_sptf_painel">Albuns de <?= $musica['NOME_BANDA'] ?></p>
              <input type="hidden" value="<?= $musica['ID'] ?>" name="id_musica">
              <select class="form-control placeholder_sptf" name="album_id" id="exampleFormControlSelect1" required>
                <?php foreach ($albuns as $album) : ?>
                  <option value="<?= $album['ALBUM_ID'] ?>"><?= $album['NOME_ALBUM'] ?></option>
                  <?php endforeach ?>
                  <option value="<?= $album['ALBUM_ID'] ?>">Atual: <?= $musica['NOME_ALBUM'] ?></option>
                </select>
                <input type="hidden" value="<?= $album['BANDA_ID'] ?>" name="banda_id">
                <p class="color_sptf_painel">Nome da música:</p>
                <input type="text" id="defaultRegisterFormFirstName" name="nome_musica" class="form-control mb-4 placeholder_sptf" value="<?= $musica['NOME_MUSICA']?>" required>
                <p class="color_sptf_painel">Link SoundCloud:</p>
                <input type="text" id="defaultRegisterFormFirstName" name="link_musica" class="form-control mb-4 placeholder_sptf" value="<?= $musica['PLAYER_MUSICA']?>" required>
                <p class="color_sptf_painel">Genero:</p>
                <select class="form-control placeholder_sptf" name="genero_id" id="exampleFormControlSelect1" required>
                  <option value="" selected disable>Selecione: </option>  
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