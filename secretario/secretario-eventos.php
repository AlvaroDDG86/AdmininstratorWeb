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
    if(isset($_POST["idNuevo"]) && isset($_POST["nombreNuevo"]) && isset($_POST["descripcionNuevo"]) && isset($_POST["fechaNuevo"])){
        try
        {
            $id=$_POST["idNuevo"];
            $nombre=$_POST["nombreNuevo"];
            $descripcion=$_POST["descripcionNuevo"];
            $fecha=$_POST["fechaNuevo"];
            if($oCentro->newEvento($id, $nombre, $descripcion, $fecha)){
                $result='<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Nuevo evento agregado correctamente</div>';
            }else{
                $result='<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Error al crear evento</div>';
            }
        }
        catch (Exception $x)
        {
            exit;
        }
    }
    if(isset($_POST["idEliminar"])){
        try
        {
            if($oCentro->deleteEvento($_POST["idEliminar"])){
                $result='<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Evento eliminado</div>';
            }else{
                $result='<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Error al eliminar evento</div>';
            }
         }
        catch (Exception $x)
        {
            exit;
        }
    }
     if(isset($_POST["idModificar"]) && isset($_POST["nombreModificar"]) && isset($_POST["descripcionModificar"]) && isset($_POST["fechaModificar"])){
        try
        {
            $id=$_POST["idModificar"];
            $nombre=$_POST["nombreModificar"];
            $descripcion=$_POST["descripcionModificar"];
            $fecha=$_POST["fechaModificar"];
            if($oCentro->editEvento($id, $nombre, $descripcion, $fecha)){
                $result='<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Evento actualizado</div>';
            }else{
                $result='<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Error al actualizar evento</div>';
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
						<li class="active"><a href="secretario-eventos.php">Eventos</a></li>
						<li><a href="secretario-profesores.php">Profesores</a></li>
                                                <li><a href="secretario-cursos.php">Cursos</a></li>
						<li><a href="secretario-telefonos.php">Teléfonos</a></li>
						<li><a href="secretario-centro.php">Centro</a></li>
					</ul>
                                        <ul class="nav navbar-nav navbar-right">
                                            <li><a href="../desconectar.php"><span class="glyphicon glyphicon-log-out"></span> Desconectar</a></li>
                                        </ul>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Eventos</h3>
			</div>
			<div class="panel-body">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#nuevo" data-toggle="tab">Nuevo</a></li>
					<li><a href="#eliminar" data-toggle="tab">Eliminar</a></li>
					<li><a href="#modificar" data-toggle="tab">Modificar</a></li>
				</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="nuevo">
							<form class="form-horizontal" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
								<div class="form-group">
									<label for="idField" class="col-xs-12 col-sm-2">Id</label>
									<div class="col-xs-12 col-sm-10">
                                                                            <input type="text" class="form-control" id="idField" name="idNuevo" placeholder="Id"  pattern="[0-9]{1,6}" title="Solo números enteros" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="nameField" class="col-xs-12 col-sm-2">Nombre</label>
									<div class="col-xs-12 col-sm-10">
                                                                            <input type="text" class="form-control" id="nameField" name="nombreNuevo" placeholder="Nombre" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="descField" class="col-xs-12 col-sm-2">Descripcion</label>
									<div class="col-xs-12 col-sm-10">
                                                                            <textarea class="form-control" id="descField" name="descripcionNuevo" placeholder="Descripción" required></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="dateField" class="col-xs-12 col-sm-2">Fecha</label>
									<div class="col-xs-12 col-sm-10">
                                                                            <input type="date" class="form-control" id="dateField" name="fechaNuevo" placeholder="DD/MM/YYYY" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}" title="Formado de fecha DD/MM/YYYY" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="dateField" class="col-xs-12 col-sm-2">Imagen</label>
									<button type="submit" class="btn btn-primary">Examinar </button>
								</div>
								<div class="col-xs-10 col-xs-offset-2">
									<button type="submit" class="btn btn-primary" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Cargando...">Enviar </button>
								</div>
							</form>
						</div>
						<div class="tab-pane" id="eliminar">
							<form class="form-horizontal" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
								<div class="form-group">
									<label for="idField" class="col-xs-12 col-sm-2">Id</label>
									<div class="col-xs-10">
                                                                            <select class="col-xs-12 col-sm-4 form-control" name="idEliminar" id="lstEventosEliminar">
                                                                                <option value="-1">Eventos</option>	
                                                                            </select>
									</div>
								</div>
								<div class="form-group">
									<label for="nameField" class="col-xs-12 col-sm-2">Nombre</label>
									<div class="col-xs-12 col-sm-10">
                                                                            <input type="text" class="form-control" id="nameFieldE" name="nombreEliminar" placeholder="Nombre" />
									</div>
								</div>
								<div class="form-group">
									<label for="descField" class="col-xs-12 col-sm-2">Descripcion</label>
									<div class="col-xs-12 col-sm-10">
                                                                            <textarea class="form-control" id="descFieldE" name="descripcionEliminar" placeholder="Descripción"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="dateField" class="col-xs-12 col-sm-2">Fecha</label>
									<div class="col-xs-12 col-sm-10">
										<input type="date" class="form-control" id="dateFieldE" name="fechaEliminar" placeholder="DD/MM/YYYY" />
									</div>
								</div>
								<div class="col-xs-10 col-xs-offset-2">
                                                                    <button id="btnE" type="submit" class="btn btn-primary" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Cargando...">Eliminar </button>
								</div>
							</form>
						</div>
						<div class="tab-pane" id="modificar">
							<form class="form-horizontal" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
								<div class="form-group">
									<label for="idField" class="col-xs-12 col-sm-2">Id</label>
									<div class="col-xs-12 col-sm-10">
                                                                            <select class="col-xs-12 col-sm-4 form-control" name="idModificar" id="lstEventosModificar">
											<option value="-1">Eventos</option>	
                                                                            </select>
									</div>
								</div>
								<div class="form-group">
									<label for="nameField" class="col-xs-12 col-sm-2">Nombre</label>
									<div class="col-xs-12 col-sm-10">
                                                                            <input type="text" class="form-control" id="nameFieldM" name="nombreModificar" placeholder="Nombre" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="descField" class="col-xs-12 col-sm-2">Descripcion</label>
									<div class="col-xs-12 col-sm-10">
                                                                            <textarea class="form-control" id="descFieldM" name="descripcionModificar" placeholder="Descripción" required></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="dateField" class="col-xs-12 col-sm-2">Fecha</label>
									<div class="col-xs-12 col-sm-10">
                                                                            <input type="date" class="form-control" id="dateFieldM" name="fechaModificar" placeholder="DD/MM/YYYY"  pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}" title="Formado de fecha DD/MM/YYYY"  required/>
									</div>
								</div>
								<div class="col-xs-10 col-xs-offset-2">
									<button id="btnM" type="submit" class="btn btn-primary" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Cargando...">Modificar</button>
								</div>
							</form>
						</div>
					</div>
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
    <script src="../js/se-main-eventos.js"></script>

</body>

</html>
