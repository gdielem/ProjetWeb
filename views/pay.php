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
    <h1>Page de paiement</h1></br>
  </center>
    <h3>Vous devez payer <?php echo $_GLOBALS["price_event"]?> pour participer à <?php echo $_SESSION['name_event']?></h3>


  <center>
    <form action="index.php?action=pay" method="post">
    <label>Faites un don !</label>
    <p>Les dons se font uniquement via paypal</p>
    Montant de votre don: <input type="text" name="gift" pattern="[0-9]{}" placeholder="Un tout grand merci !">
    <br>
    <input type="submit" name="giftButton" value="Faire un don !">
  </form>
  <?php
    $email_paypal= 'paypaldelequipe@gmail.com';
    $item_numero = 'Don';
    $item_prix   = $valueGift;
    $item_nom    = 'Don à l\'équipe';
    echo '
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_xclick"/>
    <input type="hidden" name="business" value="'.$email_paypal.'"/>
    <input type="hidden" name="item_name" value="'.$item_nom.'"/>
    <input type="hidden" name="item_number" value="'.$item_numero.'"/>
    <input type="hidden" name="amount" value="'.$item_prix.'"/>
    <input type="hidden" name="currency_code" value="EUR"/>
    <input type="hidden" name="no_note" value="1"/>
    <input type="hidden" name="no_shipping" value="0"/>
    <input type="hidden" name="lc" value="FR"/>
    <input  align="right" valign="center" type="image" alt="Paiement par Paypal" src=" https://www.paypal.com/fr_FR/i/bnr/horizontal_solution_PP.gif" border="0" name="submit" alt="Paiement sécurisé par paypal"/>
    </form> ';
  ?>
</center>
</br>
