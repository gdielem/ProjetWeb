</br>
</br>
</br>
</br>
</br>
</br>
</br>
<body>
</br></br>
  <center>
    <h1>Informations du compte</h1></br>
  </center>
  <div class="container text-center">
<div class="jumbotron">
<br>
<?php var_dump($user)?>
<br>
<form action="index.php?action=account" method="post">
  <center>
  <label>Modifiez içi vos données</label>
  <br>
  <br>
<div class="form-horizontal">Nom: <input type="text" name="name" value="<?php echo $user->getName()?>" size="20"></div>
</br>
<div class="form-horizontal">Prenom: <input type="text" name="surname" value=<?php echo $user->getSurname()?> size="20"></div>
<br>
<div class="form-horizontal">Mot de passe <input type="text" name="password" placeholder="Ecrivez ici votre nouveau mdp" size="26"></div>
<br>
<div class="form-horizontal">Mail: <input type="text" name="mail" value=<?php echo $user->getMail()?> size="30"></div>
<br>
<div class="form-horizontal">Numéro de téléphone: <input type="text" name="phone" value=<?php echo $user->getPhone()?> size="20"></div>
<br>
<div class="form-horizontal">Adresse: <input type="text" name="address" value=<?php echo $user->getAddress()?> size="20"></div>
<br>
<div class="form-horizontal">Numéro de compte banquaire: <input type="text" name="bank" value=<?php echo $user->getBank()?> size="25"></div>
<br>
<div class="form-horizontal">Votre photo: <img src="<?php echo WAY_VIEWS?>pictures/memberpictures/<?php echo $user->getPhoto()?>"></div>
<br>
<div class="form-horizontal"><form enctype="multipart/form-data" action="index.php?action=account" method="post" class="form-horizontal">
<input class="form-horizontal" type="hidden" name="MAX_SIZE_FILE" value="10000000"class="form-horizontal"/>
<input class="form-horizontal" type="file" name="photo" value="Modifiez votre photo"/>
Attention il faut penser à la suppression des photos lors de la modification
<br>
</center>
</br>
  <div class="container">
  <input type="submit" name="buttonUpdate" value="Modifier">
  </div>
  </form>
</div>
