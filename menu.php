<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Internet ohjelmoinnin harjoitustyö</title>
    <link rel="stylesheet" href="css/mystyle.css">
  </head>
  <body>
    <div id="header">
      <a href="index.php">VERKKOKAUPPA</a>
      <?php
        session_start();
        if(isset($_SESSION['logged_in'])) {
          echo '<li style="float:right"; ><a href="logout.php">kirjaudu ulos</a></li>';
        }
        else {

          echo '<li style="float:right"><a href="login_form.php">kirjaudu sisään</a></li>';
        }
      ?>

    </div>
   <div id="menu">
      <ul>
    		<li><a href="index.php">etusivu</a></li>
    		<li><a href="tuote.php">tuotteet</a></li>
    		<li><a href="add_user.php">rekisteröidy</a></li>
        <input type="text" id="etsi" placeholder="Etsi">
        <li style="float:right"><a href="ostoskori.php">ostoskori</a></li>

      </ul>
   </div>
   <div id="puskuri">

   </div>
