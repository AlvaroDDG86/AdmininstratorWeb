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
    if(isset($_POST["curso"]) && isset($_POST["documento"])){
        if($oCentro->setDocumento($_POST["curso"],$_POST["documento"])){
            $result='<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Documento enviado</div>';
        }else{
            $result='<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Error al enviar documento</div>';
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

    <title>Profesor</title>

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
         <!-- Modal -->
        <div class="modal" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <img src="../img/loading.gif" width="400" height="400" alt="loading" class="modal-body"/>
                </div>
            </div>
        </div>
	<div class="container">
                
		<div class="page-header">
			<h1>Administración <small><?php echo $_SESSION["usuario"]?></small></h1>
		</div>
		<div class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar-content">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="profesor-inicio.php">Inicio</a>
				</div>
				<div class="collapse navbar-collapse" id="mynavbar-content">
					<ul class="nav navbar-nav">
						<li><a href="profesor-tarea.php">Tarea</a></li>
						<li><a href="profesor-examen.php">Examen</a></li>
						<li class="active"><a href="profesor-documento.php">Documento</a></li>
						<li><a href="profesor-calificaciones.php">Calificaciones</a></li>
						<li><a href="profesor-asistencias.php">Asistencias</a></li>
					</ul>
                                        <ul class="nav navbar-nav navbar-right">
                                            <li><a href="../desconectar.php"><span class="glyphicon glyphicon-log-out"></span> Desconectar</a></li>
                                        </ul>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Documento</h3>
			</div>
			<div class="panel-body">
                            <!-- Tab panes -->
                            <form class="form-horizontal" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                    <div class="form-group">
                                        <label for="lstCursos" class="col-xs-12 col-sm-2">Curso</label>
                                        <div class="col-xs-12 col-sm-10">
                                            <select id="lstCursos" class="col-xs-12 col-sm-4 form-control" name="curso">
                                                    <option value="-1">Curso</option>	
                                            </select>
                                            <span class="help-block">Selecciona el curso que recibirá el documento</span>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="imagenFieldM" class="col-xs-12 col-sm-2">Documento</label>
                                        <div class="col-xs-12 col-sm-10">
                                            <input type="file" class="btn btn-primary btn-xs" name="documento" accept="image/*" id="imagenFieldM">
                                            <span class="help-block">Selecciona el documento que deseas compartir</span>
                                        </div>
                                    </div>
                                    <div class="col-xs-offset-2">
                                            <button type="submit" id="btnS" class="btn btn-primary" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Cargando...">Subir </button>
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

</body>

</html>
