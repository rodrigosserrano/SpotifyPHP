  <!-- LOGIN -->
  <div class="modal fade" id="Login" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content modal_sptf">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form class="text-center p-5" method="POST" action="lib/validar.php">
              <p class="h4 mb-4 title_card">Login</p>
              <input type="email" id="defaultLoginFormEmail" name="email" class="form-control mb-4 placeholder_sptf" placeholder="Email" required>
              <input type="password" id="defaultLoginFormPassword" name="senha" class="form-control mb-4 placeholder_sptf" placeholder="Senha" required>
              <button class="btn btn-sm btn_sptf" type="submit">Entrar</button>
      </form>
        </div>
      </div>
    </div>
  </div>