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
    <h1>Contact</h1></br>
  </center>
  <div class="container text-center">
<div class="jumbotron">


    <form action="?action=0" method="post">
    <div class="form-horizontal">Votre email :</br><input type="text" placeholder="Entrez ici votre email"  name="email"></div>
    <div class="form-horizontal">
  <label for="comment">Votre requete:</label></br>
  <textarea class="form-horizontal" rows="5" cols="50" id="comment" name="message" placeholder="Tapez ici votre message"></textarea>
</div>
</center>
</br>
  <div class="container">
  <a href="index.php">
  <button type="button" class="btn btn-primary btn-block">ENVOYER</button>
  </a>

  </div>
  </form>
</div>
