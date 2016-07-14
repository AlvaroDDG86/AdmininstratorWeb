<?php
    session_name("conexion");//Se crea una sesion
    session_start(); //se inica la sesión
    session_unset(); //Se elininan los datos
    session_destroy();//Se detruye la sesión
    header("location:index.php"); //Definimos a donde enviar
    exit; //Salimos
?>
