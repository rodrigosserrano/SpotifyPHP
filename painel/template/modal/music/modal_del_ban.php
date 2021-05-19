<?php

//DELETE FROM tb_musicas WHERE tb_albuns INNER JOIN tb_musicas ON TABELA1.CAMPO = TABELA2.CAMPO
 ?>
<div class="modal fade" id="DelB_<?= $banda['BANDA_ID'] ?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content modal_sptf">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <p class="h5 title_card text-center">Ao deletar a banda, todos os álbuns e músicas do mesmo serão apagados.</p>
      <p class="h4 title_card text-center pt-2">Deseja realmente remover <?= $banda['NOME_BANDA'] ?> ?</p>
          <form class="text-center p-3 row" method="POST" action="../lib/music/ban.php?opc=delete">
            <div class="col-md-12">
              <div class="form-group">
              <input type="hidden" value="<?= $banda['BANDA_ID'] ?>" name="banda_id">
              <input type="hidden" value="<?= $banda['ALBUM_ID'] ?>" name="album_id">
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