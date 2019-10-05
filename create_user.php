<?php  include "menu.php";?>
<div class="createuser">

<?php
  if(isset($_SESSION['logged_in'])) {
    echo '<h3>Olet jo kirjautunut sisään käyttäjänimellä '.$_SESSION['username'].'</h3>';
  }
  else {
  echo '<h3>Rekisteröidy</h3><br>
<form class="" action="add_user.php" method="post">
  <input type="text" name="etunimi" value="" placeholder="Etunimi" required> <br> <br>
  <input type="text" name="sukunimi" value="" placeholder="Sukunimi" required> <br> <br>
  <input type="text" name="osoite" value="" placeholder="Osoite"required> <br> <br>
  <input type="text" name="username" value="" placeholder="käyttäjänimi"required> <br> <br>
  <input type="password" name="password" value="" placeholder="salasana"required> <br> <br>
  <input type="submit" name="" value="Rekisteröidy">
  </form>';
  }
?>
</div>
