<?php include "menu.php"; ?>
<div class="logout">

<?php
  //session_start();
  session_destroy();
  header("Refresh:2;url=index.php");
?>
<p>
  Olet kirjautunut ulos.
</p>
</div>
