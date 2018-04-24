
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
    <h1>Les membres</h1></br>
  </center>
  <form  action="index.php?action=memberManagement" method="post">


  <div class="table-responsive">
  <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Email</th>
          <th>Statut</th>
          <th>Changer le statut</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $key => $value) {?>
          <tr>
            <td><?php echo $value->getName() ?> <?php echo $value->getSurname() ?></td>
            <td><?php echo $value->getMail()?></td>
            <td><?php echo $value->getType() ?> </td>
            <td>
  <select  name="statut">
    <option selected value="waiting">Waiting</option>
    <option value="membre">Membre</option>
    <option value="special">Special</option>
    <option value="coach">coach</option>
  </select>
  Valider pour :
<input class="btn btn-success"name="change" type="submit"value="<?php echo $value->getMail() ?>"></td>
          </tr>
        <?php }?>
      </tbody>
    </table>
  </div>
</form>
