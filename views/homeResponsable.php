
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
</br>
<div class="container-fluid bg-3">
  <div class="jumbotron">
    <div class="row">
      <div class="col-sm-4">
        <p>Bienvenue <?php
        echo $_SESSION['surname'];
        ?>
        <?
        echo $_SESSION['name'];
        ?>
          </p>
        <a href="index.php?action=contact" class="btn btn-primary btn-block">
        <h3> Contactez-nous</h3><span class="glyphicon glyphicon-envelope"></span></a>
    </div>
    <div class="col-sm-4"><center>
        <img src="https://placehold.it/150x150?text=PhotoDeProfilDeUtilisateur" style="width:48%" alt="Image">
        </br>
        <a href="index.php?action=logout">Se deconnecter</a>
      </center>
    </div>
    <div class="col-sm-4"><center>
      <p>Aidez votre club </p>
    </center>
      <a href="index.php?action=pay" class="btn btn-success btn-block">
      <h3> Faites un don</h3><span class="glyphicon glyphicon-heart-empty"></span></a>
    </div>
  </div>
</div>
</div>

<div class="container">
  <div class="jumbotron" style="background-color:#337AB7">
  <center>  <h3>Votre Agenda :</h3></center>
<div class="table-responsive">
<table class="table table-bordered">
    <thead>
      <tr>
        <th>Date</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>30/04</td>
        <td>Course à pied 2X 1 heure</td>
      </tr>
      <tr>
        <td>02/05</td>
        <td>Echauffement + 1H d'endurence</td>
      </tr>
    </tbody>
  </table>
</div>
</div>
</div>
