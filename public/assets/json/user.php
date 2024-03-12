<?php


require_once "../../models/ModelEmploye.php";

$action = isset($_GET['action']) ? $_GET['action'] : "";
if($action!=""){
    
    if($action=="findUser"){
     $login= $_GET['login'];
     $user = findUserByLog($login);
     if($user)
        echo json_encode($user);
        
    }else{
        echo json_encode("0");
    }
}
















?>