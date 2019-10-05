  <?php include "menu.php"; ?>
  <?php include 'connection.php'; ?>
  <div class="tuote">
  <?php
  //session_start();
  $sql="SELECT * FROM Tuote";
  $tuote=$db->query($sql);
  ?>
  	<h2>Tuotteet</h2>
  	<p>
  		<ul>
  			<?php
  			foreach ($tuote as $row) {
  				echo '<li>';
  				echo $row['tuoteNimi'].'<br>';
  				echo '<img src="images/'.$row['kuva'].'" alt="product image"> <br>';
  				if(isset($_SESSION['logged_in'])){
  					//echo '<a href="basket.php?id_products='.$row['id_products'].'">To basket</a>';
  					echo '<form action="basket2.php" method="post">';
  					echo '<label>Amount:</label>';
  					echo '<input type="number" name="amount"><br>';
  					echo '<input type="hidden" name="idTuote" value="'.$row['idTuote'].'"';
  					echo '<br><input type="submit" value="Add to basket">';
  					echo '</form>';
  				}
  				echo '</li>';
  				echo '<hr>';
  			}
  			?>
  		</ul>
  	</p>
  </div>
