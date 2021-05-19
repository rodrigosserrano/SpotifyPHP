<div class="modal fade" id="AddB" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content modal_sptf">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <p class="h4 title_card text-center">Adicionar banda</p>
          <form class="text-center p-3 row" method="POST" action="../lib/music/ban.php?opc=insert">
            <div class="col-md-12">
              <div class="form-group">
                <p class="color_sptf_painel">Nome da banda:</p>
                    <input type="text" id="defaultRegisterFormFirstName" name="nome_banda" class="form-control mb-4 placeholder_sptf" placeholder="Nome da banda" required>
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