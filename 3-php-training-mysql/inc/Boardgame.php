<?php
class Boardgame {
    
    private $name;
    private $players_min;
    private $players_max;
    private $min_age;
    private $max_age;
    private $picture;
    private $instance;			
	private $query	;
	private $prepare;
    private $execute;
    private $err;
    


    public function __construct($datas=[])
    {
        // TODO : Hydrate the object
        if ($this->isValid($datas))
        {
            foreach ($datas as $index=>$data)
            {
                $method='set'.str_replace('_', '', ucwords($index, '_'));;
                if (method_exists($this, $method ))
                {
                    $this->$method($data);
                }
            }
        }
       
        
        }
    public function isValid(array $datas)
    {
        if (!empty($datas))
        {      
        if ( $datas['Name'] == "" || $datas['PlayerMin'] == "" || $datas['PlayerMax'] == "" || $datas['AgeMin'] == "" || $datas['AgeMax'] == "" || $datas['Picture'] == "")
			{
                var_dump($datas);
                throw new Exception("C'est vide ");	
            }
            
        elseif (!is_string($datas['Name']) || !is_string($datas['Picture']) )
            {
                throw new Exception("C'est pas bon");
            }
        elseif(!is_numeric($datas['PlayerMin']) || !is_numeric($datas['PlayerMax']) || !is_numeric($datas['AgeMin']) || !is_numeric($datas['AgeMax']))
        {
            throw new Exception("C'est pas bon");
        }
        elseif ( $datas['PlayerMin']<=0 || $datas['AgeMin']<=0  || $datas['PlayerMax']<$datas['PlayerMin'] || $datas['AgeMax']<$datas['AgeMin'])
            {  
                throw new Exception("C'est pas bon");
            }
        else
        {
            foreach($datas as $data)
            {
                if ( substr($data, 0,1)=="'" || substr($data, 0,1)=='"')
                {
                    throw new Exception("C'est pas bon");
                }
                else
                {
                    return true;
                }
            }
      
        }
       
    }
}
    public function create()
    {
        $this->instance= DBConnection::getInstance();		
        $this->err = $this->instance->getConnection()->prepare("INSERT INTO boardgames (name,players_min,players_max,age_min,age_max,picture) VALUES (:name, :playerMin, :playerMax, :ageMin,:ageMax,:picture)");
        $this->err->execute(array ('name'=>$this->name, 'playerMin'=>$this->players_min, 'playerMax'=>$this->players_max, 'ageMin'=>$this->min_age,'ageMax'=>$this->max_age,'picture'=>$this->picture));
        echo $this->err->errorCode();		
	
    }

    public function getId() {
        return $this->id;
    }
    public function setId(int $id) {
        $this->id = $id;
        return $this;
    }

    public function getName() {
        return $this->name;
    }
    public function setName(string $name) {
        $this->name = $name;
        return $this;
    }
    public function getPlayerMin() {
        return $this->players_min;
    }
    public function setPlayerMin(int $players_min) {
        $this->players_min = $players_min;
        return $this;
    }
    public function getPlayerMax() {
        return $this->players_max;
    }
    public function setPlayerMax(int $players_max) {
        $this->players_max = $players_max;
        return $this;
    }
    public function getAgeMin() {
        return $this->age_min;
    }
    public function setAgeMin(int $age_min) {
        $this->age_min = $age_min;
        return $this;
    }
    public function getAgeMax() {
        return $this->age_max;
    }
    public function setAgeMax(int $age_max) {
        $this->age_max = $age_max;
        return $this;
    }
    
    public function getPicture() {
        return $this->picture;
    }
    public function setPicture(string $picture) {
        $this->picture = $picture;
        return $this;
    }
}