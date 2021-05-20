<?php ob_start(); ?>


<div class="row">
    <div class="col-md-4 offset-md-8">
        <form method="get">
            <div class="form-group has-btn">
                <input type="search" id="search" name="title" value="<?= $search; ?>" class="form-control"
                       placeholder="Rechercher un film ou une série">

                <button type="submit" class="btn btn-block bg-red">Valider</button>
            </div>
        </form>
    </div>
</div>

<!--affichage d'un media-->
<?php if(isset($_GET['film'])) : ?>
    <div class="media-list">

<div style="background-color: whitesmoke;" class="card mb-3" style="max-width: 400px;">
  <div class="row g-0">
    <div class="col-md-3">
            <iframe style="padding: 7% 0 0 7%;" src="<?= $getFilm['trailer_url']; ?>" frameborder="0"></iframe>
    </div>
    <div class="col-md-8">
        <div style="margin-left:3em" class="card-body">
                <h5  class="card-title"><?= $getFilm['title_media']; ?></h5>
                <p  class="card-text"><?= $getFilm['summary']; ?></p>
                <p  class="card-text"><small class="text-muted"><?= $getFilm['release_date']; ?></small></p>
        </div>
        </div>
  </div>
</div>
</div>
<?php elseif(isset($_GET['series'])) : ?>
    <div class="media-list">
       <div class="video">
           <!-- test 2  -->
<h2 style="margin-top:-1em"><?= $getserie['title_media']; ?></h2>
<div class="row">
<?php foreach($getSaison as $saison) : ?>
  <div class="col-sm-6">
    <div style="max-height: 30em;" class="card">
      <div class="card-body">
        <div style='margin: 0em auto 2em auto '>
               <iframe width="470"
    height="200" frameborder="0"
                     src="<?= $getserie['trailer_url']; ?>" ></iframe>
        </div>
        <h5 style='text-align:center' class="card-title">Saison <?= $saison['numero_saison']; ?></h5>
        <p style='text-align: justify; overflow: scroll; max-height: 7.5em' class="card-text"><?= $saison['description_saison']; ?></p>
        <a href="index.php?action=media&series=6&saison=<?= $saison['id']; ?>" class="btn btn-primary">Épisodes saison <?= $saison['numero_saison']; ?></a>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>

<!-- fin test 2 -->
    </div>



<!--affichage de tous les media-->
<?php else: ?>
<h3 class="titre_film">Films</h3>
    <div class="media-list-film">
        <?php foreach($medias as $media ): ?>
            <a class="item" href="index.php?action=media&<?= $media['type']; ?>=<?= $media['id']; ?>">
                <div class="video">
                    <div>
                        <iframe allowfullscreen="" frameborder="0"
                                src="<?= $media['trailer_url']; ?>" ></iframe>
                    </div>
                </div>
                <div class="title"><?= $media['title_media']; ?></div>
            </a>
        <?php endforeach; ?>
    </div>

<h3 class="titre_series">Séries</h3>
    <div class="media-list-series">
        <?php foreach( $series as $serie ): ?>
            <a class="item" href="index.php?action=media&<?= $serie['type']; ?>=<?= $serie['id']; ?>">
                <div class="video">
                    <div>
                        <iframe allowfullscreen="" frameborder="0"
                                src="<?= $serie['trailer_url']; ?>" ></iframe>
                    </div>
                </div>
                <div class="title"><?= $serie['title_media']; ?></div>
            </a>
        <?php endforeach; ?>
    </div>
<?php endif ?>



<?php $content = ob_get_clean(); ?>
<?php include_once('dashboard.php'); ?>



