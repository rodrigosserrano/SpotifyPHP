  <?php
  $titulo = "Inicio";
  include 'template/header.php';
  ?>
      <div class="pt-5 col-md-12">
        <h1 class="sptf"><strong>Música para todos.</strong></h1>
        <p class="sptf_p">Milhões de músicas à sua escolha.</p>
        <?php if(isset($_SESSION['nome'])) : ?>
          <p class="sptf_p">Bem vindo, <?= $_SESSION['nome'] ?></p>
        <?php endif ?>
      </div>
      <?php if($albuns = funSelect('vw_albuns_bandas', '*', 'ORDER BY NOME_ALBUM')) : ?>
    <div class="container pt-1">
    <div class=" flex-column col-md-12">
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
                      <h4 class="card-title title_card"><a><?= mb_strimwidth($album['NOME_ALBUM'], 0, 16, "...") ?></a></h4>
                      <p class="card-text pt-2"><strong>Banda: </strong><?= $album['NOME_BANDA'] ?></p>
                      <p class="card-text pt-2"><strong>Gênero: </strong> <?= $album['GENERO'] ?></p>
                        <div class="mt-2">
                          <button name="ALBUM_ID" class="btn btn_sptf btn-sm" value="<?= $album['ALBUM_ID'] ?>">Ouvir álbum</button>
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