<body>
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
  <center>
  </br>
    <h1>EVENEMENTS</h1></br>
  </center>
    <div class="container text-center">
  <div class="jumbotron">
    <h2>Ajouter un événements :</h2>
    <form action="index.php/events" method="post">
      <div class="form-horizontal">
Entrez le nom de l'événement : <input type="text" name="name_of_event" placeholder="Entrez le nom de l'événement"required>
</div></br>
        <div class="form-horizontal">
           Entrez la date :<input type="date" name="date"required >
         </div></br>
           <div class="form-horizontal">
Description de l'événements : </br><textarea name="description" placeholder="Entrez un descriptif"></textarea>
</div></br>
  <div class="form-horizontal">
 Prix : <input type="text" name="price" placeholder="9.00" required>€
</div></br>
</form>
      </div>
  </div>
</div>
  <div class="table-responsive">
  <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prix</th>
          <th>Participation</th>
          <th>Localisation</th>
          <th>Inscription</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($events as $key => $value) {?>
          <tr>
            <td><?php echo $value->getName() ?></td>
            <td><?php echo $value->getPrice()?></td>
            <td><a href="index.php?action=events?event=<?php echo $value->getId() ?>"><button class="btn btn-success">Ca m'intéresse</button></a> </td>
            <td></td>
            <td><a href="index.php?action=payement?event=<?php echo $value->getId() ?>"><button class="btn btn-success">Je m'inscris</button></a></td>
          </tr>
        <?php }?>
      </tbody>
    </table>
  </div>
