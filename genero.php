<?php
  if(isset($_GET['opc'])) {
    $opc = $_GET['opc'];
    $titulo = "Gênero";
  }else{
    $opc = "B";
    $titulo = "Gênero";
  } 
  include 'template/header.php';
  ?>
    <?php if($opc == "B") : $albuns = funSelect('tb_genero', '*', ''); ?>
    <div class="container pt-5">
    <div class="col-md-12 pt-5">
            <form class="text-center p-3 color_sptf" method="POST" action="genero.php?opc=L">
            <p class="h4 mb-6"><img src="img/logo.png" width="9%"/></p>
            <hr/>
              <label><strong class="title_card">Selecione um Gênero</strong></label>
              <div class="row">
              <?php for($i=0;$i<count($albuns);$i++) : ?>
                <div class="col-lg-3 col-md-6 pt-3">
                  <div class="card">
                    <img class="card-img-top" src="img/genero/<?= $albuns[$i]['IMG_GENERO']; ?>" alt="Card image cap">
                    <div class="card-body color_background_sptf" style="height: 200px !important">
                      <h4 class="card-title title_card"><a><?= $albuns[$i]['GENERO']; ?></a></h4>
                        <div class="mt-3">
                          <button name="genero" class="btn btn_sptf btn-sm" value="<?= $albuns[$i]['GENERO']; ?>">Ver álbuns</button>
                        </div>
                    </div>
                  </div>
                </div>
                <?php endfor ?>
              </div>
        </form>
      </div>
    </div>
  </div>
        <?php elseif($opc == "L") :
        if ($_POST['genero'] != '') {
            $genero = $_POST['genero'];
            $argumentos = "WHERE GENERO LIKE '%$genero%'";
        }
        $albuns = funSelect('vw_albuns_bandas', '*', $argumentos);
        ?>
            <div class="container pt-4">
            <div class=" flex-column col-md-12 pt-5">
                    <form class="text-center p-3 color_sptf" method="POST" action="msc.php">
                    <p class="h4 mb-6"><img src="img/logo.png" width="9%"/></p>
                    <hr/>
                    <label><strong class="title_card"> Selecione um álbum</strong></label>
                    <div class="row">
                    <?php foreach($albuns as $album) : ?>
                        <div class="col-lg-3 col-md-6 pt-3">
                        <div class="card">
                        <?php if($album['IMG_ALBUM'] == 'img/albuns/') : ?>
                          <img class="card-img-top" src="/img/albuns/erro.jpg" alt="Card image cap">
                        <?php else : ?>
                          <img class="card-img-top" src="<?= $album['IMG_ALBUM'] ?>" alt="Card image cap">
                        <?php endif ?>
                            <div class="card-body color_background_sptf" style="height: 200px !important">
                            <h4 class="card-title title_card"><a><?= $album['NOME_BANDA']; ?></a></h4>
                            <p class="card-text pt-2"><strong>Álbum: </strong><?= mb_strimwidth($album['NOME_ALBUM'], 0, 21, "..."); ?></p>
                            <p class="card-text pt-2"><strong>Gênero: </strong> <?= $album['GENERO']; ?></p>
                                <div class="mt-2">
                                <button name="ALBUM_ID" class="btn btn_sptf btn-sm" value="<?= $album['ALBUM_ID']; ?>">Ouvir álbum</button>
                                </div>
                            </div>
                        </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </form>
            </div>
            </div>
        <?php endif ?>
    </div>
</div>
<?php include 'template/footer.php'; ?>
<?php include 'template/script.php'; ?>