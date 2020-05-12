
    <h1 class='title'>Liste des jeux de société</h1>
    <?php
    include "inc/DBConnection.php";
    include "inc/Boardgame.php";
    include 'autoload.php';

   

    
    $Instance= DBConnection::getInstance();
    $results=$Instance->getConnection()->query("SELECT * FROM boardgames ",)->fetchAll(PDO::FETCH_CLASS, Boardgame::class);
  

    $presentation=new Presentation('style.css','Liste de jeux de sociétés');
    $presentation->div('number text','Identifiant' )
                ->div('name text','Nom du jeu' )
                ->div('picture text','Page de présentation')
                ->div('number text','Joueurs minimum')
                ->div('number text','Joueurs maximum')
                ->div('number text','Age minimum')
                ->div('number text','Age maximum')
                ->div('clear','')
                ->br()
                ->br();        
    $id=0;
    foreach ($results as $key => $result) 
    {
      $id+=1;
     
      $presentation ->link('button','Supprimer',"delete.php?id=$id")
                ->div('number',$result->getId())
                ->div('name', new LinkHtml('',$result->getName(),"update.php?id=$id"))
                ->div('picture',new PictureHtml($result->getPicture()))
                ->div('number',$result->getPlayerMin())
                ->div('number',$result->getPlayerMax())
                ->div('number ',$result->getAgeMin())
                ->div('number',$result->getAgeMax())
                ->div('clear','')
                ->br();
    }

 echo $presentation->div("",new LinkHtml('',new InputHtml("button","Ajouter"),"create.php"))
                   ->build();

   
?>
