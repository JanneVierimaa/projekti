<?php include "menu.php"; ?>
<div class="etusivu">

<p>
<br><br>
<?php
  //session_start();
  if(isset($_SESSION['logged_in'])) {
    echo '<h3>Tervetuloa '.$_SESSION['username'].'</h3>';
    echo 'Voit nyt lisätä tuotteita ostoskoriin ja tilata niitä. Klikkaa tuotelistausta ja aloita shoppailu!'
  }
  else {
    echo '<p><h3>Tervetuloa Vieras!</h3><br><br><br>Rekisteröitymällä ja Kirjautumalla sisään pääset tekemään ostoksia<br><br>
    <br><a href="create_user.php">Rekisteröidy tästä</a><br><br><br>Jos sinulla on jo tunnukset, voit kirjautua sisään tästä:</p>';
    echo '<form class="" action="login.php" method="post">
  <input type="text" name="username" value="" placeholder="käyttäjänimi"> <br> <br>
  <input type="password" name="password" value="" placeholder="salasana" required> <br> <br>
  <input type="submit" name="" value="Kirjaudu">
  </form>';
  }
?>


</p>
</div>
