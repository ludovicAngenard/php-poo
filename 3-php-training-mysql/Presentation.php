<?php
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
        public function div( string $class,   $content)
        {
          $this->classHtml(new DivHtml($class,$content));
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
        public function build()
        {
          $html = "<!DOCTYPE html>
          <html>
            <head>
              <meta charset='utf-8'>
              <title>'$this->title'</title>
              <link rel='stylesheet' href='$this->stylesheet' />
            </head>
            <body>
            <div class='content'>";
          foreach($this->boards as $board)
          {
  
              $html.= $board;
          }
          $html .= '</div></body> </html>';
          return $html;
        }
      }
    ?>