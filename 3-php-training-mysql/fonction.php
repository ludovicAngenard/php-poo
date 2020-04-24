<?php
 include "inc/DBConnection.php";
 include "inc/Boardgame.php";
 include '../2-refactoring-de-classe/Classe/Form.php';
$Instance= DBConnection::getInstance();
$results=$Instance->getConnection()->query("SELECT * FROM boardgames ",)->fetchAll(PDO::FETCH_CLASS, Boardgame::class);

function findOneById($id){
    global $results;
    foreach($results as $result){
        if ($result->getId()==$id){
            return $result;
        }
          
    }
    return false;
}
?>