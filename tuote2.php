<?php include "menu.php"; ?>
<?php include 'connection.php'; ?>
<div class="tuote">

<?php
if (!empty($_POST['Tuotteet'])) {
  $selected = $_POST['Tuotteet'];
} else {
  $selected = "";
}
?>

  <form name="kategoria" method="post" action="tuote2.php" target="">
      Näytä:     <select name="Tuotteet">
                      <option disabled value selected> -- Kategoria -- </option>
                      <option value <?php if ($selected=="") echo 'selected="selected"'; ?>>Kaikki tuotteet</option>
                      <option value="Televisiot"<?php if ($selected=="Televisiot") echo 'selected="selected"'; ?>>Televisiot</option>
                      <option value="Puhelimet"<?php if ($selected=="Puhelimet") echo 'selected="selected"'; ?>>Puhelimet</option>
                      <option value="Tietokoneet"<?php if ($selected=="Tietokoneet") echo 'selected="selected"'; ?>>Tietokoneet</option>
              </select>
 <input type="submit" value="näytä"/>
  </form>
<?php
//session_start();
if(isset($_POST['Tuotteet'])) {
  $selected = $_POST['Tuotteet'];
   if($selected==""){
     $sql="SELECT * FROM Tuote";
   }
   else{
   $sql="SELECT * FROM Tuote JOIN Kategoria ON Tuote.idKategoria=Kategoria.idKategoria WHERE Kategoria.katNimi='$selected'";
   }
}
else {
$sql="SELECT * FROM Tuote";
   }
$tuote=$db->query($sql);
?>
  <h2>Tuotteet</h2>
  <p>
    <ul>
      <?php

      $i = 0;

echo '    <table border=1 cellpadding=20>
            <tr>';
foreach($tuote as $item){
    $i++;
    echo '<td style="padding-left:20px">'.$item['tuoteNimi'].'<br><br>';
    echo $item['tuotekuvaus'].'<br><br>';
    echo '<img src="images/'.$item['kuva'].'"<br><br>';
    echo $item['hinta'].' €<br><br><br>';
    if(isset($_SESSION['logged_in'])){
      //echo '<a href="basket.php?id_products='.$row['id_products'].'">To basket</a>';
      echo '<form action="add_ostoskori.php" method="post">';
      echo '<label>Määrä:</label>';
      echo '<input type="number" min=1 name="maara"><br>';
      echo '<input type="hidden" name="idTuote" value="'.$item['idTuote'].'"';
      echo '<br><input type="submit" value="Lisää ostoskoriin">';
      echo '</form></td>';
    }


    if($i == 4) { // three items in a row. Edit this to get more or less items on a row
        echo '</tr><tr>';
        $i = 0;
    }
}
echo '    </tr>
        </table>';

      foreach ($tuote as $row) {
        echo '<li>';
        echo $row['tuoteNimi'].'<br>';
        echo '<img src="images/'.$row['kuva'].'" alt="product image"> <br><br>';
        echo $row['tuotekuvaus'].'<br><br>';
        echo $row['hinta'].' €<br><br>';
        if(isset($_SESSION['logged_in'])){
          //echo '<a href="basket.php?id_products='.$row['id_products'].'">To basket</a>';
          echo '<form action="add_ostoskori.php" method="post">';
          echo '<label>Määrä:</label>';
          echo '<input type="number" name="maara"><br>';
          echo '<input type="hidden" name="idTuote" value="'.$row['idTuote'].'"';
          echo '<br><input type="submit" value="Lisää ostoskoriin">';
          echo '</form>';
        }
        echo '</li>';
        echo '<hr>';
      }
      ?>
    </ul>
  </p>
</div>
