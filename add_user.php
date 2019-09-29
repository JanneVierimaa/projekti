<?php include "menu.php"; ?>
<div class="adduser">


  <?php
  //print_r($_POST);
  include 'connection.php';
  $encrypted_pass = password_hash($_POST['password'],PASSWORD_DEFAULT);
  $stmt=$db->prepare("INSERT INTO user (username,password) VALUES (:username, :password)");
  $stmt->bindParam(':username',$_POST['username']);
  $stmt->bindParam(':password',$encrypted_pass);
  if($stmt->execute()){
  echo 'Rekisteröityminen onnistui, siirrytään kirjautumiseen';
  header("Refresh:2;url=login_form.php");
}
else{
  echo 'Rekisteröityminen epäonnistui';
}
?>
</div>
