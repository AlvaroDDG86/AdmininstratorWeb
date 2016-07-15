<?php
    include '../inc/validacion.php'; //INclusión del archivo, para restringir el acceso
    $result="";
    try
    {
        include_once '../inc/CentroConstants.php';
        include_once '../inc/CentroClass.php';
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
    if(isset($_POST["nombre"]) && isset($_POST["direccion"]) && isset($_POST["descripcion"]) && isset($_POST["resumen"])){
        $nombre=$_POST["nombre"];
        $direccion=$_POST["direccion"];
        $descripcion=$_POST["descripcion"];
        $resumen=$_POST["resumen"];
        if($oCentro->editCentro($nombre, $descripcion, $resumen, $direccion)){
            $result='<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Centro actualizado</div>';
        }else{
            $result='<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Error al actualizar centro</div>';
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

    <title>Administración - Secretario</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="../css/main.css" rel="stylesheet">

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
			<h1>Administración <small><?php echo $_SESSION["usuario"]; ?></small></h1>
		</div>
		<div class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar-content">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="secretario-inicio.php">Inicio</a>
				</div>
				<div class="collapse navbar-collapse" id="mynavbar-content">
					<ul class="nav navbar-nav">
						<li><a href="secretario-noticias.php">Noticias</a></li>
						<li><a href="secretario-eventos.php">Eventos</a></li>
						<li><a href="secretario-profesores.php">Profesores</a></li>
                                                <li><a href="secretario-cursos.php">Cursos</a></li>
						<li><a href="secretario-telefonos.php">Teléfonos</a></li>
						<li class="active"><a href="secretario-centro.php">Centro</a></li>
					</ul>
                                        <ul class="nav navbar-nav navbar-right">
                                            <li><a href="../desconectar.php"><span class="glyphicon glyphicon-log-out"></span> Desconectar</a></li>
                                        </ul>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
                            <h3>Centro</h3>
			</div>
			<div class="panel-body">
				<!-- Tab panes -->
                            <form class="form-horizontal"  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                    <div class="form-group">
                                            <label for="nameField" class="col-xs-12 col-sm-2">Nombre</label>
                                            <div class="col-xs-12 col-sm-10">
                                                <input type="text" class="form-control" id="nameField" name="nombre" placeholder="Nombre" required />
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="descField" class="col-xs-12 col-sm-2">Descripcion</label>
                                            <div class="col-xs-12 col-sm-10">
                                                <textarea class="form-control" id="descField" name="descripcion" placeholder="Descripción" required></textarea>
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="resumenField" class="col-xs-12 col-sm-2">Resumen</label>
                                            <div class="col-xs-12 col-sm-10">
                                                <input type="text" class="form-control" id="resumenField" name="resumen" placeholder="Resumen" required />
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="dirField" class="col-xs-12 col-sm-2">Dirección</label>
                                            <div class="col-xs-12 col-sm-10">
                                                <input type="text" class="form-control" id="dirField" name="direccion" placeholder="Dirección" required/>
                                            </div>
                                    </div>
                                    <div class="col-xs-offset-2">
                                            <button id="btnM" type="submit" class="btn btn-primary" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Cargando...">Actualizar</button>
                                    </div>
                            </form>
			</div>
                        <div class="panel-footer">
                            <?php echo $result; ?>
                        </div>
		</div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="../js/agency.min.js"></script>
    
    <!-- Theme JavaScript -->
    <script src="../js/se-main-centro.js"></script>

</body>

</html>
