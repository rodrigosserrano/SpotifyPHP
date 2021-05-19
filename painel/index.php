<?php
include_once '../lib/config.php';
if(isset($_GET['opc'])) {
  $opc = $_GET['opc'];
}else{
  $opc = "H";
  $titulo = "Inicio";
  $usuarios = funSelect('tb_usuarios', '*', 'ORDER BY permissao = 0');
}
include 'template/header.php';

if($opc == "H") : ?>
<div class="pt-5 col-md-12">
  <h1 class="sptf"><strong>Painel administrativo</strong></h1>
</div>
<div class="container pt-5">
  <div class="pt-5 flex-column col-md-12">
    <div class="text-center p-3 color_sptf">
    <p class="h4 mb-6"><img src="../img/logo.png" width="9%"/></p>
      <hr/>
      <label><strong class="title_card">Tabela de usuários registrados</strong></label>
        <div class="table-wrapper-scroll-y my-custom-scrollbarsptf mt-3">
            <table class="table table_sptf table-striped mb-0 ">
                <thead>
                <tr>
                    <!-- <th scope="col">ID</th> -->
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Permissão</th>
                    <th colspan="2"scope="col">Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($usuarios as $usuario) :?>
                <tr>
                    <!-- <th scope="row"><?php //$usuario['id'] ?></th> -->
                    <th><?= $usuario['nome'] ?></th>
                    <td><?= $usuario['email'] ?></td>
                    <?php if($usuario['permissao'] == 0) : ?>
                    <td>Usuário comum</td>
                    <?php else : ?>
                    <td>Administrador</td>
                    <?php endif ?>
                    <?php include 'template/modal/user/modal_edit.php'; ?>
                    <td><button class="btn_sptf" data-toggle="modal" data-target="#Edit_<?= $usuario['id'] ?>" data-id="<?= $usuario['id'] ?>" name="id" ><i class="far fa-edit"></i></button></td>
                    <form method="POST" action="index.php?opc=D">
                      <td><button class="btn_sptf" name="id" value="<?= $usuario['id'] ?>" type="submit"><i class="far fa-trash-alt"></i></button></td>
                    </form> 
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>
<?php endif ?>
<?php
    if($opc == "D"){
      $id = $_POST['id'];
      funDelete('tb_usuarios', "WHERE id = '$id'");
        echo '<script language="JavaScript"> 
        alert("Usuário removido.");
        window.location="javascript:history.back()"
        </script>';
      }
    ?>
<?php include 'template/footer.php'; ?>
<?php include 'template/script.php'; ?>
