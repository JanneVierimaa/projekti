<?php include "menu.php"; ?>
<?php include 'connection.php'; ?>
<p>
<?php
$id_products=$_POST['idTuote'];
$amount=$_POST['maara'];
$username=$_SESSION['username'];
//echo 'Ostoskoriin lisättiin '.$amount.' kpl tuotetta nro:'.$id_products .'<br>';
//echo 'Käyttäjänimellä: '.$username;
$stmt=$db->prepare("INSERT INTO Ostoskori(idTuote,username,maara) VALUES (:idTuote,:username,:maara)");
$stmt->bindParam(':idTuote',$id_products);
$stmt->bindParam(':username',$username);
$stmt->bindParam(':maara',$amount);
if($stmt->execute()){
echo 'Tuotteiden lisääminen ostoskoriin onnistui';
}
else{
echo 'Tuotteiden lisääminen ostoskoriin epäonnistui';
}
header("Refresh:1;url=tuote.php");
?>
</p>
