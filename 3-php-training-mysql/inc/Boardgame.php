<?php
class Boardgame {
    
    private $name;
    private $players_min;
    private $players_max;
    private $min_age;
    private $max_age;
    private $picture;


    public function __construct($datas=[]){
        // TODO : Hydrate the object
        if (!empty($datas)){
            foreach ($datas as $index=>$data)
            $method='set'.str_replace('_', '', ucwords($index, '_'));;
                if (!method_exists ($this, $method ))
                {
                throw new Exception($method.'ohlala quelle erreur mais QUELLE ERREUR dans le tableau !');
                }
                else{
                    $this->$method($data);
                }
            
        }
       
        
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