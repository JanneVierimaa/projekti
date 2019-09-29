<?php include "menu.php"; ?>
<div class="login">


<?php
//session_start();
  $annettu_salasana=$_POST['password'];
  $annettu_tunnus=$_POST['username'];

    $_SESSION['logged_in']=true;
    $_SESSION['username']=$annettu_tunnus;
    header("Refresh:2;url=index.php");
    echo '<p>Olet kirjautunut sisään</p>';

?>
</div>
