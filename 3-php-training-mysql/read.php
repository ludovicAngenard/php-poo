<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Jeux de société</title>
  </head>
  <body>
    <h1>Liste des jeux de société</h1>
    <?php
    include "inc/DBConnection.php";
    include "inc/Boardgame.php";
    
    $Instance= DBConnection::getInstance();
    //cette partie ne fonctionne pas.
    $stage=$Instance->getConnection()->query("SELECT * FROM boardgames ",);
    $result = $stage->fetchAll(PDO::FETCH_CLASS, "Boardgame");
    
  
    ?>


    <!-- Afficher la liste des jeux -->
  </body>
</html>
