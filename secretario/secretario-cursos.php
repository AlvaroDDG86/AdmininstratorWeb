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
    if(isset($_POST["idNuevo"]) && isset($_POST["nombreNuevo"]) && isset($_POST["descripcionNuevo"]) && isset($_POST["horasNuevo"]) && isset($_POST["idProfesorNuevo"])){
        try
        {
            $id=$_POST["idNuevo"];
            $nombre=$_POST["nombreNuevo"];
            $descripcion=$_POST["descripcionNuevo"];
            $horas=$_POST["horasNuevo"];
            $profesor=$_POST["idProfesorNuevo"];
            if($oCentro->newCurso($id, $nombre, $descripcion, $horas, $profesor)){
                $result='<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Nuevo curso agregado correctamente</div>';
            }else{
                $result='<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Error al crear curso</div>';
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
            if($oCentro->deleteCurso($_POST["idEliminar"])){
                $result='<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Curso eliminado</div>';
            }else{
                $result='<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Error al eliminar curso - Revisa que no haya Alumnos en este curso</div>';
            }
         }
        catch (Exception $x)
        {
            exit;
        }
    }
     if(isset($_POST["idModificar"]) && isset($_POST["nombreModificar"]) && isset($_POST["descripcionModificar"]) && isset($_POST["horasModificar"]) && isset($_POST["idProfesorModificar"])){
        try
        {
            $id=$_POST["idModificar"];
            $nombre=$_POST["nombreModificar"];
            $descripcion=$_POST["descripcionModificar"];
            $horas=$_POST["horasModificar"];
            $profesor=$_POST["idProfesorModificar"];
            if($oCentro->editCurso($id, $nombre, $descripcion, $horas, $profesor)){
                $result='<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Curso actualizado</div>';
            }else{
                $result='<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Error al actualizar curso</div>';
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
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>

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
			<h1>Administración <small id="idProfesorSmall"><?php echo $_SESSION["usuario"]; ?></small></h1>
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
						<li><a href="secretario-eventos.php" class="white">Eventos</a></li>
						<li><a href="secretario-profesores.php">Profesores</a></li>
                                                <li class="active"><a href="secretario-cursos.php">Cursos</a></li>
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
                            <h3> <span class="glyphicon glyphicon-list-alt"></span>  Cursos</h3> 
			</div>
			<div class="panel-body">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#mostrar" data-toggle="tab">Mostrar</a></li>
					<li><a href="#nuevo" data-toggle="tab">Nuevo</a></li>
					<li><a href="#eliminar" data-toggle="tab">Eliminar</a></li>
					<li><a href="#modificar" data-toggle="tab">Modificar</a></li>
				</ul>
					<div class="tab-content">
                                                <div class="tab-pane active" id="mostrar">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-striped" id="tblShow">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Nombre</th>
                                                                    <th>Descripción</th>
                                                                    <th>Horas</th>
                                                                    <th>Profesor</th>
                                                                 </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                            </tbody>
                                                        </table>
                                                      </div>
						</div>
						<div class="tab-pane" id="nuevo">
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
									<label for="dateField" class="col-xs-12 col-sm-2">Horas</label>
									<div class="col-xs-12 col-sm-10">
                                                                            <input type="number" class="form-control" id="dateField" name="horasNuevo" placeholder="Horas" pattern="[0-9]{1,3}" required/>
									</div>
								</div>
                                                                <div class="form-group">
									<label for="idField" class="col-xs-12 col-sm-2">Profesor</label>
									<div class="col-xs-10">
                                                                            <select id="lstProfesorNuevo" class="col-xs-12 col-sm-4 form-control" name="idProfesorNuevo" required>
											<option value="-1">Profesor</option>	
										</select>
									</div>
								</div>
								<div class="col-xs-offset-2">
									<button type="submit" class="btn btn-primary" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Cargando...">Enviar </button>
								</div>
							</form>
						</div>
						<div class="tab-pane" id="eliminar">
							<form class="form-horizontal" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
								<div class="form-group">
									<label for="idField" class="col-xs-12 col-sm-2">Id</label>
									<div class="col-xs-10">
										<select id="lstCursosEliminar" class="col-xs-12 col-sm-4 form-control" name="idEliminar">
											<option value="-1">Cursos</option>	
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="nameField" class="col-xs-12 col-sm-2">Nombre</label>
									<div class="col-xs-12 col-sm-10">
										<input type="text" class="form-control" id="nameFieldE" placeholder="Nombre" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label for="descField" class="col-xs-12 col-sm-2">Descripcion</label>
									<div class="col-xs-12 col-sm-10">
										<textarea class="form-control" id="descFieldE" placeholder="Descripción" readonly></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="dateField" class="col-xs-12 col-sm-2">Horas</label>
									<div class="col-xs-12 col-sm-10">
										<input type="number" class="form-control" id="horasFieldE" placeholder="Horas" readonly/>
									</div>
								</div>
								<div class="col-xs-offset-2">
									<button type="submit" id="btnE" class="btn btn-primary" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Cargando...">Eliminar </button>
								</div>
							</form>
						</div>
						<div class="tab-pane" id="modificar">
							<form class="form-horizontal" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
								<div class="form-group">
									<label for="idField" class="col-xs-12 col-sm-2">Id</label>
									<div class="col-xs-12 col-sm-10">
                                                                                <select id="lstCursosModificar" class="col-xs-12 col-sm-4 form-control" name="idModificar">
											<option value="-1">Cursos</option>	
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
									<label for="dateField" class="col-xs-12 col-sm-2">Horas</label>
									<div class="col-xs-12 col-sm-10">
                                                                            <input type="number" class="form-control datepicker" id="horasFieldM" name="horasModificar" placeholder="Horas" pattern="[0-9]{1,3}" required/>
									</div>
								</div>
                                                                 <div class="form-group">
									<label for="idField" class="col-xs-12 col-sm-2">Profesor</label>
									<div class="col-xs-10">
										<select id="lstProfesorModificar" class="col-xs-12 col-sm-4 form-control" name="idProfesorModificar">
											<option value="-1">Profesor</option>	
										</select>
									</div>
								</div>
								<div class="col-xs-offset-2">
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
    <script src="../js/se-main-cursos.js"></script>

</body>

</html>
