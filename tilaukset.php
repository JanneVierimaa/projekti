<?php include "menu.php"; ?>
<?php include 'connection.php'; ?>
<?php
//session_start();
if(isset($_SESSION['logged_in'])){
$username=$_SESSION['username'];


$sql1="SELECT * FROM Tilaukset WHERE tilausData LIKE '%käyttäjänimi: Janne%'";
$tilaus=$db->query($sql1);
foreach ($tilaus as $row) {
echo $row['tilausData'];
}
}

else{
echo 'Kirjaudu sisään, jotta voit nähdä tilauksesi';
}
?>
