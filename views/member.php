<body>
  </br>
  </br>
  <?php var_dump($_SESSION['id'])?>
  <?php var_dump($_SESSION['type'])?>
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
<?php var_dump($user)?>
<div class="container-fluid bg-3">
  <div class="jumbotron">
    <div class="row">
      <div class="col-sm-4">
        <p>Bienvenue <?php foreach ($user as $key => $value) {
          echo ($value->getName()." ".$value->getSurname());
        }?>.</p>
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
        <th>Prix</th>
        <th>Nom</th>
        <th>Location</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      <?php for($i=0; $i< count($plan); $i ++){ ?>
        <tr>
        <td><?php echo $plan[$i]['date']?></td>
        <td><?php echo $plan[$i]['price']?></td>
        <td><?php echo $plan[$i]['name']?></td>
        <td><?php echo $plan[$i]['location']?></td>
        <td><?php echo $plan[$i]['description']?></td>
      </tr>
    <?php }?>
    </tbody>
  </table>
</div>
</div>
</div>
<br>
<br>
<?php var_dump($participations)?>
<div class="container">
  <div class="jumbotron" style="background-color:#337AB7">
    <center>  <h3>Vos évènements :</h3></center>
    <div class="table-responsive">
        <table class="table table-bordered">
        <thead>
          <tr>
            <th>Date</th>
            <th>Prix(€)</th>
            <th>Nom</th>
            <th>Location</th>
            <th>Description</th>
            <th>Payé ?</th>
            <th>Participation ?</th>
            <th>Se désinscrire de l'évènement (uniquement pour les évènements interessé)</th>
          </tr>
        </thead>
        <tbody>
          <?php for($i=0; $i < count($participations); $i ++){ ?>
            <tr>
              <td><?php echo $participations[$i]->getDate()?></td>
              <td><?php echo $participations[$i]->getPrice()?></td>
              <td><?php echo $participations[$i]->getName()?></td>
              <td><?php echo $participations[$i]->getLocation()?></td>
              <td><?php echo $participations[$i]->getDescription()?></td>
              <form action="index.php?action=pay" method="post">
                <td>
                <?php if($participations[$i]->getPaid() == 0){
                  echo "<input type=\"submit\" name = \"payEvent\" value=\"Payer\" ";
                }
                else{
                  echo "Vous avez déjà payé";
                } ?>
                </td>
              </form>
              <td><?php if($participations[$i]->getTakePart() == 1){
                  echo "Vous participez déjà à l'évènement";
                }
              else{
                  echo "Vous êtes seulement interéssé, vous devez d'abord payer avant de participer !";
              } ?></td>
              <form action="index.php?action=member" method="post">
              <td><input type="submit" name="unsubscribe" value="<?php echo $participations[$i]->getNumEvent()?>"><br>(Numéro de l'évènement)</td>
            </form>
            </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>
 </div>
