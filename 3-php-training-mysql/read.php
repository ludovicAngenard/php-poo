
    <h1 class='title'>Liste des jeux de société</h1>
    <?php
    include "inc/DBConnection.php";
    include "inc/Boardgame.php";
    include "link.php";
    include "title.php";
    include "input.php";
    include "div.php";
    include 'picture.php';

    
    $Instance= DBConnection::getInstance();
    $results=$Instance->getConnection()->query("SELECT * FROM boardgames ",)->fetchAll(PDO::FETCH_CLASS, Boardgame::class);
    
    class Presentation{
      private $title;
      private $stylesheet;
      private $boards=[];

      public function __construct(string $stylesheet,string $title)
      {
        $this->stylesheet=$stylesheet;
        $this->title=$title;
      }
      public function classHtml($board){
        $this->boards[]=$board;
        return $this;
      }
      public function title(string $class, string $content)
      {
        $this->classHtml(new TitleHtml($class,$content));
        return $this;
      }
      public function picture(string $content)
      {
        $this->classHtml(new PictureHtml($content));
        return $this;
      }
      public function div( string $class, string  $content)
      {
        $this->classHtml(new divHtml($class,$content));
        return $this;
      }
      public function link(string $class, string $content, string $href)
      {
        $this->classHtml(new LinkHtml($class,$content,$href));
        return $this;
      }
      public function br()
      {
        $this->classHtml("</br>");
        return $this;
      }
      public function input(string $type, string $value)
      {
        $this->classHtml(new InputHtml($type,$value));
        return $this;
      }
      public function build(){
        $html = "<!DOCTYPE html>
        <html>
          <head>
            <meta charset='utf-8'>
            <title>$this->title</title>
            <link rel='stylesheet' href=$this->stylesheet />
          </head>
          <body>
          <div class='content'";
        foreach($this->boards as $board)
        {

            $html.= $board;
        }
        $html .= '</div></body> </html>';
        return $html;
      }
    }

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
      echo $presentation->build();        
    $id=0;
    foreach ($results as $key => $result) 
    {
      $id+=1;
      var_dump($presentation->link('',$result->getName(),"update.php?id=$id"));
      $presentation ->link('button','Supprimer',"delete.php?id=$id")
                ->div('number',$result->getId())
                ->div('name', $presentation->link('',$result->getName(),"update.php?id=$id"))
                ->div('picture',$presentation->picture($result->getPicture()))
                ->div('number',$result->getPlayerMin())
                ->div('number',$result->getPlayerMax())
                ->div('number ',$result->getAgeMin())
                ->div('number',$result->getAgeMax())
                ->div('clear','')
                ->br();
    }
 echo "<a href='create.php'> <input type='button' value='Ajouter'> </a>";
 echo $presentation->build();

   
    ?>


    <!-- Afficher la liste des jeux -->
  </body>
</html>
