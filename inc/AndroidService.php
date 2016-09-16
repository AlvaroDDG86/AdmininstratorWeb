<?php


if(file_exists('CentroClass.php'))
    include_once 'CentroClass.php';
    include_once 'CentroConstants.php';
//Se crea un objeto de la clase
    try{
        $oCentro=new CentroClass(DBHOST,DBUSER,DBPASS,DBNAME);
    }catch(Exception $e){
        echo "-1";
        exit;
    }
    
    
    
if(isset($_POST["id"])){ 
    $aDatos=$oCentro->getCursosProfesor($_POST["id"]);
        echo json_encode($aDatos); 
        
}   else{
    $aDatos=$oCentro->getNoticias();
        echo json_encode($aDatos); 
} 


