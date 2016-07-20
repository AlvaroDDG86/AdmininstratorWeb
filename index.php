<?php
session_name("conexion");
session_start();
//Si viene una coockie con nombre conexion, volvemos a la página formulario
if(isset($_SESSION["profesor"])){
    header("location:profesor/profesor-inicio.php");
    exit;
}
if(isset($_SESSION["secretario"])){
    header("location:secretario/secretario-inicio.php");
    exit;
}
if(isset($_POST["usuario"]) && isset($_POST["password"])) //Evaluamos si viene usuario y contraseña en la peticion post
{
    try
    {
        include_once 'inc/CentroConstants.php';
        include_once 'inc/CentroClass.php';
    }
    catch(Exception $e)
    {
        echo "no existen los ficheros de configuración";
    }
    try
    {
        $oCentro=new CentroClass(DBHOST,DBUSER,DBPASS,DBNAME);//Creamos un objeto de nuestra clase, con los valores por defecto del constructor
    }
    catch(Exception $e)
    {
        echo "no se ha podido conectar con la base de datos";
    }
    try
    {
        if($oCentro->isValidUser($_POST["usuario"], $_POST["password"])) //Ejecutamos el método que nos dice si el usuario existe y es profesor
        {
            $_SESSION["usuario"]=$_POST["usuario"]; //Ponemos una nueva variable, con el nombre del usuario conectado
            if($_POST["usuario"] == "999999"){
                header("location:secretario/secretario-inicio.php"); //Definimos donde a donde enviar
            }else{
                header("location:profesor/profesor-inicio.php"); //Definimos donde a donde enviar
            }
            session_name("conexion"); //Le damos un nombre a la sesión
            session_start(); //La inicializamos
           
            exit; //Salimos
        }
    }
    catch (Exception $x)
    {
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Web de administración</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>

     <!-- Theme CSS -->
    <link href="css/main.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="index">

	<div class="container">
		<div class="page-header">
			<h1>Web de administración</h1>
		</div>
		<div class="panel panel-default col-sm-offset-3 col-sm-6 col-xs-12" id="panelLogin">
			<div class="panel-heading">
				<h3>Acceso:</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal"  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="form-group">
						<label for="nameField" class="col-xs-12">Nombre</label>
						<div class="col-xs-12">
                                                    <input type="text" class="form-control" id="nameField" name="usuario" placeholder="Nombre" required />
						</div>
					</div>
					<div class="form-group">
						<label for="passField" class="col-xs-12">Password</label>
						<div class="col-xs-12">
                                                    <input type="password" class="form-control" id="passField" name="password" placeholder="Password" required/>
						</div>
					</div>
					<button type="submit" class="btn btn-primary col-xs-12">Entrar</button>
				</form>
			</div>
                        <div class="panel-footer">
                            <a href="mailto:alvarodediosgarcia1986@gmail.com"><span class="glyphicon glyphicon-send"></span> Contacto</a>
			</div>
		</div>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>

</body>

</html>
