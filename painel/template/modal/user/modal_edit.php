<div class="modal fade" id="Edit_<?= $usuario['id'] ?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content modal_sptf">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <p class="h4 title_card text-center">Editar usuário <?= $usuario['nome'] ?></p>
          <form class="text-center p-3 row" method="POST" action="../lib/user/update.php">
            <div class="col-md-12">
              <div class="form-group">
                <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                <p class="color_sptf_painel">Nome:</p>
                <input type="text" id="defaultRegisterFormFirstName" name="nome" class="form-control mb-4 placeholder_sptf" value="<?= $usuario['nome'] ?>" required>
                <p class="color_sptf_painel">Email:</p>
                <input type="email" id="defaultLoginFormEmail" name="email" class="form-control mb-4 placeholder_sptf" value="<?= $usuario['email'] ?>" required>
                <p class="color_sptf_painel">Permissão</p>
                <select class="form-control placeholder_sptf" name="permissao" id="exampleFormControlSelect1" required>
                  <option value="" selected disable>Selecione: </option>
                  <option value="0">Usuário comum</option>
                  <option value="1">Administrador</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <button class="btn btn-sm btn_sptf btn_sptf_default" type="submit">Alterar</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>