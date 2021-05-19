   <!-- INSCREVER-SE -->
   <div class="modal fade" id="Register" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content modal_sptf">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <p class="h4 mb-4 title_card text-center">Inscreva-se</p>
            <form class="text-center p-5 row" method="POST" action="lib/user/reg.php">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" id="defaultRegisterFormFirstName" name="nome" class="form-control mb-4 placeholder_sptf" placeholder="Nome" required>
                  <input type="password" id="defaultLoginFormPassword" name="senha" class="form-control mb-4 placeholder_sptf" placeholder="Senha" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <input type="email" id="defaultLoginFormEmail" name="email" class="form-control mb-4 placeholder_sptf" placeholder="Email" required>
                <input type="password" id="defaultLoginFormPassword" name="senha2" class="form-control mb-4 placeholder_sptf" placeholder="Repita a senha" required>
                </div>
              </div>
              <div class="col-md-12">
                <button class="btn btn-sm btn_sptf" type="submit">Inscrever-se</button>
              </div>
      </form>
        </div>
      </div>
    </div>
  </div>