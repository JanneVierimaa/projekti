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

    <form name="kategoria" method="post" action="tuote.php" target="">
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
  					echo '<input type="number" min=1 name="maara"><br>';
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
