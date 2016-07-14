<?php //Archivo de apoyo, que se incluirá en todas las páginas que queramos restringir el acceso
//Creamos la sesion
session_name("conexion");
session_start();
//Evaluamos si viene en session el campo usuario, si no viene, enviamos a login.php y salimos
if(! isset($_SESSION["usuario"]))
{
    header("location:../index.php");
    exit;
}

