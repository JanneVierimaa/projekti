<?php include "menu.php"; ?>
<?php include 'connection.php'; ?>
<div class="ostoskori">
<?php
//session_start();
if(isset($_SESSION['logged_in'])){
$username=$_SESSION['username'];
$total=0;

$sql="SELECT Ostoskori.idTuote, tuoteNimi, SUM(maara), hinta from Ostoskori JOIN
Tuote ON Ostoskori.idTuote=Tuote.idTuote
WHERE username='$username'
GROUP BY idTuote";
$ostoskori=$db->query($sql);
?>
  <h2>Ostoskorisi sisältö</h2>
  <p>
    <ul>
      <?php
      foreach ($ostoskori as $row) {
        echo '<li>';
        echo "tuotenumeroa: " .$row['idTuote'].'<br>';
        echo $row['tuoteNimi'].'<br>';
        echo $row['SUM(maara)']." kpl".'<br>';
        echo $row['hinta']. "€ / kpl".'<br><br>';
        $total=$total+($row['hinta']*$row['SUM(maara)']);
        echo "Kokonaishinta: " .$row['hinta']*$row['SUM(maara)']. " €".'<br><br>';

        }
        echo '</li>';
        echo '<hr>';
        echo '</ul>';
        echo "<h3> KAIKKI YHTEENSÄ: " .$total. " €</h3>";

        echo' <form class="" action="order.php" method="post">
             <input type="submit" name="" value="Tilaa">
             </form>';

        echo' <form style="float:right" class="" action="clear_ostoskori.php" method="post">
              <input type="submit" name="" value="Tyhjennä ostoskori">
              </form><br>';

        echo' <form class="" action="tuote.php" method="post">
              <input type="submit" name="" value="Jatka shoppailua">
              </form>';

      }
      else{
        echo 'Ostoskorin sisältöä ei voida näyttää, koska et ole kirjautunut sisään.';
        header("Refresh:2;url=index.php");
      }
      ?>

  </p>
</div>
