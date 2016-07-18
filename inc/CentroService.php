<?php

//Incluimos el archivo de la validación
/*include_once 'validacion.inc.php';*/

//Incluir el archivo de la clase, evaluando primero si existe
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


switch($_POST["tipo"]){
    case "examen":
        $aDatos=$oCentro->getExamenes($_POST["profesor"]);
        echo json_encode($aDatos); 
        break;
    case "tarea":
        $aDatos=$oCentro->getTareas($_POST["profesor"]);
        echo json_encode($aDatos); 
        break;
    case "curso":
        $aDatos=$oCentro->getCursos();
        echo json_encode($aDatos); 
        break;
    case "cursos":
        $aDatos=$oCentro->getCursosProfesor($_POST["profesor"]);
        echo json_encode($aDatos); 
        break;
    case "alumnos":
        $aDatos=$oCentro->getAlumnosCurso($_POST["curso"]);
        echo json_encode($aDatos); 
        break;
    case "faltas":
        $aDatos=$oCentro->getFaltas($_POST["curso"]);
        echo json_encode($aDatos); 
        break;
    case "alumno":
        
        break;
    case "noticia":
        $aDatos=$oCentro->getNoticias();
        echo json_encode($aDatos); 
        break;
    case "telefono":
        $aDatos=$oCentro->getTelefonos();
        echo json_encode($aDatos); 
        break;
    case "evento":
        $aDatos=$oCentro->getEventos();
        echo json_encode($aDatos); 
        break;
    case "centro":
        $aDatos=$oCentro->getCentro();
        echo json_encode($aDatos); 
        break;
    case "profesor":
        $aDatos=$oCentro->getProfesores();
        echo json_encode($aDatos); 
        break;
    default:
        echo "-1";
        exit;
}



?>
