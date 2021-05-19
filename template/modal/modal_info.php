<div class="modal fade" id="Info" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content modal_sptf">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="text-center p-5" >
            <form method="POST" action="msc.php?opc=F">
              <p class="h4 mb-4 title_card">Entre ou se inscreva já para favoritar, é de graça ;)</p>
              <?php include 'modal_login.php';?>
              <?php include 'modal_register.php';?>
                  <button class="btn_sptf" data-toggle="modal" data-target="#Login" data-dismiss="modal">Entrar</button>
                  <p class="title_card pt-2">ou</p>
                  <button class="btn_sptf" data-toggle="modal" data-target="#Register" data-dismiss="modal">Inscrever-se</button>
            </form>
      </div>
        </div>
      </div>
    </div>
  </div>