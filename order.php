<?php include "menu.php"; ?>
<?php include 'connection.php'; ?>
<?php
//session_start();
if(isset($_SESSION['logged_in'])){
$username=$_SESSION['username'];


$sql1="DELETE FROM Ostoskori
WHERE username='$username'";
$ostoskori=$db->query($sql1);
echo 'Tilaus rekisteröity käyttäjänimellä: '.$username;
header("Refresh:2;url=ostoskori.php");
}
?>
