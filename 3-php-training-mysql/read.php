<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Jeux de société</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <h1 class='title'>Liste des jeux de société</h1>
    <?php
    include "inc/DBConnection.php";
    include "inc/Boardgame.php";
    
    $Instance= DBConnection::getInstance();
    $results=$Instance->getConnection()->query("SELECT * FROM boardgames ",)->fetchAll(PDO::FETCH_CLASS, Boardgame::class);
    
    echo "<div class='content'>";
    echo "<div class='number text'> Identifiant</div>";
    echo "<div class='name text'>Nom du jeu</div>";
    echo "<div class='picture text'> Page de présentation </div>";
    echo "<div class='number text'>Joueurs minimum</div>";
    echo "<div class='number text'>Joueurs Maximum</div>";
    echo "<div class='number text'>Age minimum </div>";
    echo "<div class='number text'>Age maximum</div> <div class='clear'></div> </br></br>" ;
    $id=0;
    foreach ($results as $key => $result) {
      $id+=1;
      echo "<a class='button ' href='delete.php?id=$id'>Supprimer</a>";
      echo "<div class='number '>".$result->getId()."</div>";
      echo "<div class='name '><a href=update.php?id=$id>".$result->getName()."</a></div>";
      echo "<div class='picture '> <img src=".$result->getPicture()."></image> </div>";
      echo "<div class='number '>".$result->getPlayerMin()."</div>";
      echo "<div class='number '>".$result->getPlayerMax()."</div>";
      echo "<div class='number '>".$result->getAgeMin()."</div>";
      echo "<div class='number '>".$result->getAgeMax()."</div> <div class='clear'></div> </br>" ;
      
    }
    echo "</div>";
    ?>


    <!-- Afficher la liste des jeux -->
  </body>
</html>
