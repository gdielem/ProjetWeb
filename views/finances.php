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
    <h1>FINANCES</h1></br>
  </center>
  <div class="table-responsive">
    <form action="index.php?action=finances" method="post">
  <table class="table table-bordered">
      <thead>
        <tr>
          <th>Date</th>
          <th>Utilisateur</th>
          <th>Prix (en €)</th>
          <th>En ordre</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($subscriptions as $key => $value) {?>
        <tr>
            <td><?php echo $value->getDate()?></td>
            <td><?php $user=$this->_db->select_users_id($value->getUserID());
            echo $user[0]->getName() .' '. $user[0]->getSurname();
            echo'('. $user[0]->getId() .')';
            ?></td>

            <td><?php echo $value->getAmount()?></td>
            <td><?php if($value->getPaid()==0){
              echo "non";}
              else {
                echo "oui";
              }
            ?>
          </td>

        </tr>
        <?php }?>
      </tbody>
    </table>
  </form>
</div>s
