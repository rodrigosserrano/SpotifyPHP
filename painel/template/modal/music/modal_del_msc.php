<div class="modal fade" id="DelM_<?= $musica['ID'] ?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content modal_sptf">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <p class="h4 title_card text-center pt-2">Deseja realmente remover a música <?= $musica['NOME_MUSICA'] ?> ?</p>
          <form class="text-center p-3 row" method="POST" action="../lib/music/msc.php?opc=delete">
            <div class="col-md-12">
              <div class="form-group">
              <input type="hidden" value="<?= $musica['ID'] ?>" name="ID">
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