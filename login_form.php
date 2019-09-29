<?php include "menu.php"; ?>
<div class="login_form">
  <?php
    //session_start();
    if(isset($_SESSION['logged_in'])) {
      echo '<p>Olet jo kirjautunut sisään käyttäjänimellä: '.$_SESSION['username'].'</p>';
    }
    else {
      echo '<h3>Kirjaudu sisään</h3><br>';
      echo '<form class="" action="login.php" method="post">
    <input type="text" name="username" value="" placeholder="käyttäjänimi"> <br> <br>
    <input type="text" name="password" value="" placeholder="salasana"> <br> <br>
    <input type="submit" name="" value="Kirjaudu">
    </form>';
    }
  ?>
</div>
