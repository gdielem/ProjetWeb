
<body>
  </br>
  </br>
  <div class="container">
    <?php if($typeNotification=='red'){ ?>
      <div class="alert alert-danger">
      <strong>Attention! </strong><?php echo $notification ?>
      </div>
    <?php }if($typeNotification=='green'){ ?>
  <div class="alert alert-success">
    <strong>Bravo! </strong><?php echo $notification ?>
  </div>
  <?php } ?>
  </div>
</div>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Le site des courreurs</h1>
    <p>de la ville de XXX</p>
  </div>
</div>

<div class="container-fluid bg-3">
  <h2>Bienvenue</h2><h3>
sur le site officiel des coureurs  XX de la ville YY.

Ce site Web est uniquement réserve aux membres du club.

Il permet une meilleur gestion des événements , des payements des cotisations mensuel et du planning des entraînements.
</h3><br>
<div class="jumbotron">
  <div class="row">
    <div class="col-sm-6">
      <p>Connectez vous !</p>
      <form action="index.php" method="post">
<div class="form-group">
  <label for="usr">Email:</label>
  <input type="text" class="form-control" id="usr" placeholder="Entrez votre email" name="email">
</div>
<div class="form-group">
  <label for="pwd">Mot de passe:</label>
  <input type="password" class="form-control" id="pwd" placeholder="******" name="password">
</div>
<input class="btn btn-success" type="submit"value="Se connecter"/>
  </form>
    </div>
    <div class="col-sm-6">
      <p>Inscrivez-vous !</p><a href="index.php?action=inscription">
      <button type="button" class="btn btn-success">S'inscrire</button>
    </a>
    </div>
  </div>
</div>
  <div class="row">
    <div class="col-sm-12">
      <div class="container-fluid">
        <center>
      <h1>Une question <span class="glyphicon glyphicon-question-sign"></span></h1>
    </center>
    </div>
        <center>
      <img src="https://placehold.it/150x80?text=PhotoDeLEquipe" class="img-rounded" style="width:83%" alt="Image">
      <div class="container">
      <a href="index.php?action=contact" class="btn btn-primary btn-block">
      <h3> Contactez-nous</h3><span class="glyphicon glyphicon-envelope"></span></a>
      </div>
  </center>



    </div>
  </div>
</div>
</div><br>


</div><br><br>
