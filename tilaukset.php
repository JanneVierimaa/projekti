<?php include "menu.php"; ?>
<?php include 'connection.php'; ?>
<?php
//session_start();
if(isset($_SESSION['logged_in'])){
$username=$_SESSION['username'];

echo '<h2>Tähän mennessä tilaamasi tuotteet, '$username:'</h2>';
$sql1="SELECT * FROM Tilaukset WHERE username='$username'";
$tilaus=$db->query($sql1);
foreach ($tilaus as $row) {
echo $row['tilausPVM'].'   ';
echo $row['tilausDATA'].'<br><br>';

}
}

else{
echo 'Kirjaudu sisään, jotta voit nähdä tilauksesi';
}
?>
