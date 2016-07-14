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
    if(isset($_POST["idNuevo"]) && isset($_POST["telefonoN"])){
        try
        {
            if($oCentro->newTelefono($_POST["idNuevo"],$_POST["telefonoN"])){
                $result='<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Nuevo teléfono agregado correctamente</div>';
            }else{
                $result='<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Error al crear teléfono</div>';
            }
        }
        catch (Exception $x)
        {
            exit;
        }
    }
    if(isset($_POST["idNuevo"]) && isset($_POST["telefonoN"])){
        try
        {
            if($oCentro->newTelefono($_POST["idNuevo"],$_POST["telefonoN"])){
                $result='<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Nuevo teléfono agregado correctamente</div>';
            }else{
                $result='<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Error al crear teléfono</div>';
            }
        }
        catch (Exception $x)
        {
            exit;
        }
    }
    if(isset($_POST["idEliminar"]) && isset($_POST["telefonoE"])){
        try
        {
            if($oCentro->deleteTelefono($_POST["idEliminar"],$_POST["telefonoE"])){
                $result='<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Teléfono eliminado correctamente</div>';
            }else{
                $result='<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Error al eliminar teléfono</div>';
            }
        }
        catch (Exception $x)
        {
            exit;
        }
    }
    if(isset($_POST["idModificar"]) && isset($_POST["telefonoM"])){
        try
        {
            if($oCentro->editTelefono($_POST["idModificar"],$_POST["telefonoM"])){
                $result='<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Teléfono editado correctamente</div>';
            }else{
                $result='<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Error al editar teléfono</div>';
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

	<div class="container">
		<div class="page-header">
			<h1>Administración <small><?php echo $_SESSION["usuario"]; ?></small></h1>
                        <a href="../desconectar.php">desconectar</a>
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
						<li class="active"><a href="secretario-telefonos.php">Teléfonos</a></li>
						<li><a href="secretario-centro.php">Centro</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Teléfonos</h3>
			</div>
			<div class="panel-body">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#nuevo" data-toggle="tab">Nuevo</a></li>
					<li><a href="#eliminar" data-toggle="tab">Eliminar</a></li>
					<li><a href="#modificar" data-toggle="tab">Modificar</a></li>
				</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="nuevo">
							<form class="form-horizontal"  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
								<div class="form-group">
									<label for="desField" class="col-xs-12 col-sm-2">Descripción</label>
									<div class="col-xs-12 col-sm-10">
                                                                            <input type="text" class="form-control" id="desField" placeholder="Descripción" name="idNuevo"required/>
									</div>
								</div>
								<div class="form-group">
									<label for="phoneField" class="col-xs-12 col-sm-2">Teléfono</label>
									<div class="col-xs-12 col-sm-10">
                                                                            <input type="phone" class="form-control" id="phoneField" name="telefonoN" placeholder="Teléfono" required/>
									</div>
								</div>
								<div class="col-xs-10 col-xs-offset-2">
									<button type="submit" class="btn btn-primary" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Cargando...">Enviar </button>
								</div>
							</form>
						</div>
						<div class="tab-pane" id="eliminar">
							<form class="form-horizontal" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
								<div class="form-group">
									<label for="desField" class="col-xs-12 col-sm-2">Descripción</label>
									<div class="col-xs-12 col-sm-10">
                                                                            <select class="col-xs-12 col-sm-4 form-control" id="lstTelefonosEliminar" name="idEliminar">
											<option value="-1">Teléfonos</option>	
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="phoneField" class="col-xs-12 col-sm-2">Teléfono</label>
									<div class="col-xs-12 col-sm-10">
										<input type="phone" class="form-control" id="phoneFieldE" name="telefonoE" placeholder="Teléfono" />
									</div>
								</div>
								<div class="col-xs-10 col-xs-offset-2">
									<button type="submit"  id="btnE" class="btn btn-primary" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Cargando...">Eliminar </button>
								</div>
							</form>
						</div>
						<div class="tab-pane" id="modificar">
							<form class="form-horizontal" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
								<div class="form-group">
									<label for="desField" class="col-xs-12 col-sm-2">Descripción</label>
									<div class="col-xs-12 col-sm-10">
										<select class="col-xs-12 col-sm-4 form-control" id="lstTelefonosModificar" name="idModificar">
											<option value="-1">Teléfonos</option>	
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="phoneField" class="col-xs-12 col-sm-2">Teléfono</label>
									<div class="col-xs-12 col-sm-10">
                                                                            <input type="phone" class="form-control" id="phoneFieldM" name="telefonoM" placeholder="Teléfono" required/>
									</div>
								</div>
								<div class="col-xs-10 col-xs-offset-2">
									<button type="submit" id="btnM" class="btn btn-primary" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Cargando...">Modificar </button>
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
    <script src="../js/se-main-telefonos.js"></script>

</body>

</html>
