<?php
$n_album = $album['NOME_BANDA'];
$albuns = funSelect('vw_albuns_bandas', '*', "WHERE NOME_BANDA = '$n_album'");
//DELETE FROM tb_musicas WHERE tb_albuns INNER JOIN tb_musicas ON TABELA1.CAMPO = TABELA2.CAMPO
 ?>
<div class="modal fade" id="DelA_<?= $album['ALBUM_ID'] ?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content modal_sptf">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <p class="h5 title_card text-center">Ao deletar o álbum, todas músicas do mesmo serão apagadas.</p>
      <p class="h4 title_card text-center pt-2">Remover álbum <?= $album['NOME_ALBUM'] ?> de <?= $album['NOME_BANDA'] ?></p>
          <form class="text-center p-3 row" method="POST" action="../lib/music/alb.php?opc=delete">
            <div class="col-md-12">
              <div class="form-group">
                <input type="hidden" value="<?= $album['ALBUM_ID'] ?>" name="id_album">
              </div>
            </div>
            <div class="col-md-12">
              <button class="btn btn-sm btn_sptf btn_sptf_default" type="submit">Remover</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>