<br>
<br>
<br>
<br>
<br>
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
    <?php var_dump($events)?>
    <?php var_dump($_SESSION['id'])?>
  </center>
  <div class="table-responsive">
    <form action="index.php?action=eventsMember" method="post">
  <table class="table table-bordered">
      <thead>
        <tr>
          <th>Numéro de l'évènement</th>
          <th>Date</th>
          <th>Prix (en €)</th>
          <th>Nom</th>
          <th>Localisation</th>
          <th>Description</th>
          <th><input type="submit" name="interested" value="Ca m'intéresse !"></th>
          <th><input type="submit" name="takePart" value="J'y participe !"></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php for($i=0; $i< count($events); $i ++){ ?>
          <tr>
            <td><?php echo $events[$i]->getNum()?></td>
            <td><?php echo $events[$i]->getDate()?></td>
            <td><?php echo $events[$i]->getPrice()?></td>
            <td><?php echo $events[$i]->getName()?></td>
            <td><a><?php echo $events[$i]->getLocation()?></a></td>
            <td><?php echo $events[$i]->getDescription()?></td>
            <td><input type="radio" name = "interested[]" value="<?= $events[$i]->getNum()?>"></td>
            <td><input type="radio" name = "takePart[]" value="<?= $events[$i]->getNum()?>"></td>
          </tr>
        <?php }?>
      </tbody>
    </table>
  </form>
  </div>
