
<body>
</br></br>
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
    <h1>Inscription</h1></br>
  </center>
  <div class="container text-center">
<div class="jumbotron">


    <form action="index.php?action=inscription"enctype="multipart/form-data" method="post">
    <div class="form-horizontal">Nom : </br><input type="text" placeholder="Entrez ici votre nom" name="name" required></div>
    <div class="form-horizontal"> Prenom : </br><input type="text" placeholder="Entrez ici votre prenom" name="surname" required></div>
    <div class="form-horizontal"> Téléphone : </br><input type="text" placeholder="04....." name="phone" required></div>
    <div class="form-horizontal"> Votre email : </br><input type="text" placeholder="exemple@mail.be" name="mail" required></div>
    <div class="form-horizontal"> Votre numero de compte : </br><input type="text" placeholder="BE...." name="bank"required></div>
    <div class="form-horizontal"> Mot de passe : </br><input type="password" placeholder="Entrez ici votre mdp" name="password"required></div>
    <div class="form-horizontal"> Ville : </br><input type="text" placeholder="Ex:Bruxelles" name="city"required></div>
    <div class="form-horizontal"> Code postal : </br><input type="text" placeholder="1000" name="cp"required></div>
    <div class="form-horizontal"> Adresse/No/Boite : </br>
    <input type="text" name="adress" placeholder="rue/avenue de l'exemple"required> <input type="text" name="no" placeholder="99" required> <input type="text" name="boite" placeholder="Boite 4B">
  </div><center>
    <div class="form-horizontal"> Choisir une photo :
      <input class="form-horizontal" type="hidden" name="MAX_FILE_SIZE" value="10000000"class="form-horizontal"/>
    </br>
						<input class="form-horizontal" type="file" name="userfile"/>
</div>
</center>
</br>
  <div class="container">
    <input class="btn btn-primary btn-block" type="submit" name="SOUMETTRE" value="SOUMETTRE">

  </div>
  </form>
</div>
