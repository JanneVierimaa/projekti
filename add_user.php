<?php include "menu.php"; ?>
<div class="adduser">


  <?php
  //print_r($_POST);
  include 'connection.php';
  $encrypted_pass = password_hash($_POST['password'],PASSWORD_DEFAULT);
  $stmt=$db->prepare("INSERT INTO Asiakas (etunimi,sukunimi,osoite,username,password) VALUES (:etunimi, :sukunimi,:osoite, :username, :password)");
  $stmt->bindParam(':etunimi',$_POST['etunimi']);
  $stmt->bindParam(':sukunimi',$_POST['sukunimi']);
  $stmt->bindParam(':osoite',$_POST['osoite']);
  $stmt->bindParam(':username',$_POST['username']);
  $stmt->bindParam(':password',$encrypted_pass);
  if($stmt->execute()){
  echo 'Rekisteröityminen onnistui, siirrytään kirjautumiseen';
  header("Refresh:2;url=login_form.php");
}
else{
  echo 'Rekisteröityminen epäonnistui. Antamasi käyttäjänimi on jo varattu';
  header("Refresh:2;url=create_user.php");
}
?>
</div>
