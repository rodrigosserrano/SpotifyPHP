<?php
  include_once 'lib/config.php';
  if(isset($_GET['opc'])) {
    $opc = $_GET['opc'];
    $titulo = "Bandas";
  }else{
    $opc = "H";
    $titulo = "Bandas";
    $bandas = funSelect('vw_albuns_bandas', '*', 'GROUP BY NOME_BANDA');
  } 
  include 'template/header.php';
    if($opc == "H") : ?>
    <div class="container pt-5">
    <div class="pt-5 flex-column col-md-12">
            <form class="text-center p-3 color_sptf" method="POST" action="bandas.php?opc=L">
            <p class="h4 mb-6"><img src="img/logo.png" width="9%"/></p>
            <hr/>
              <label><strong class="title_card"> Selecione uma Banda</strong></label>
              <div class="table-wrapper-scroll-y my-custom-scrollbarsptf mt-3">
                <table class="table table_sptf table-striped mb-0 ">
                    <thead>
                    <tr>
                        <th scope="col">Banda</th>
                        <th scope="col">Gênero</th>
                        <th scope="col">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($bandas as $banda) :?>
                    <tr>
                        <td><?= $banda['NOME_BANDA'] ?></td>
                        <td><?= $banda['GENERO'] ?></td>
                        <td><button name="banda" class="btn btn_sptf btn-sm" value="<?= $banda['NOME_BANDA']; ?>">Ver álbuns</button></td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </form>
      </div>
    </div>
    <?php elseif($opc == "L") :
      $banda = $_POST['banda'];
      $argumentos = "WHERE NOME_BANDA = '$banda'";
      $albuns = funSelect('vw_albuns_bandas', '*', $argumentos);
    ?>
  <div class="container pt-5">
    <div class="pt-5 flex-column col-md-12">
            <form class="text-center p-3 color_sptf" method="POST" action="msc.php">
            <p class="h4 mb-6"><img src="img/logo.png" width="9%"/></p>
            <hr/>
              <label><strong class="title_card"> Selecione um álbum</strong></label>
              <div class="row">
              <?php foreach ($albuns as $albuns) : ?>
                <div class="col-lg-3 col-md-6 pt-3">
                  <div class="card">
                  <?php if($albuns['IMG_ALBUM'] == 'img/albuns/') : ?>
                      <img class="card-img-top" src="/img/albuns/erro.jpg" alt="Card image cap">
                    <?php else : ?>
                      <img class="card-img-top" src="<?= $albuns['IMG_ALBUM'] ?>" alt="Card image cap">
                    <?php endif ?>
                    <div class="card-body color_background_sptf" style="height: 200px !important">
                      <h4 class="card-title title_card"><a><?= $albuns['NOME_BANDA']; ?></a></h4>
                      <p class="card-text pt-2"><strong>Álbum: </strong><?= mb_strimwidth($albuns['NOME_ALBUM'], 0, 21, "..."); ?></p>
                      <p class="card-text pt-2"><strong>Gênero: </strong> <?= $albuns['GENERO']; ?></p>
                        <div class="mt-2">
                          <button name="ALBUM_ID" class="btn btn_sptf btn-sm" value="<?= $albuns['ALBUM_ID']; ?>">Ouvir álbum</button>
                        </div>
                    </div>
                  </div>
                </div>
                <?php endforeach ?>
              </div>
        </form>
      </div>
    </div>
<?php endif ?>
  <?php include 'template/footer.php'; ?>
  <?php include 'template/script.php'; ?>