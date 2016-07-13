<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administración - Profesor</title>

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
    <link href="../css/main-p.css" rel="stylesheet">

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
			<h1>Administración <small>Profesor</small></h1>
		</div>
		<div class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar-content">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="profesor-inicio.html">Inicio</a>
				</div>
				<div class="collapse navbar-collapse" id="mynavbar-content">
					<ul class="nav navbar-nav">
						<li><a href="profesor-tarea.php">Tarea</a></li>
						<li class="active"><a href="profesor-examen.php">Examen</a></li>
						<li><a href="profesor-documento.php">Documento</a></li>
						<li><a href="profesor-calificaciones.php">Calificaciones</a></li>
						<li><a href="profesor-asistencias.php">Asistencias</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Examen</h3>
			</div>
			<div class="panel-body">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#nuevo" data-toggle="tab">Nuevo</a></li>
					<li><a href="#eliminar" data-toggle="tab">Eliminar</a></li>
					<li><a href="#modificar" data-toggle="tab">Modificar</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="nuevo">
						<form class="form-horizontal">
							<div class="form-group">
								<label for="idField" class="col-xs-12 col-sm-2">Id</label>
								<div class="col-xs-12 col-sm-10">
									<input type="text" class="form-control" id="idField" placeholder="Id" required/>
								</div>
							</div>
							<div class="form-group">
								<label for="nameField" class="col-xs-12 col-sm-2">Nombre</label>
								<div class="col-xs-12 col-sm-10">
									<input type="text" class="form-control" id="nameField" placeholder="Nombre" pattern="[A-Za-záÁéÉíÍóÓúÚ]{1,20}" required />
								</div>
							</div>
							<div class="form-group">
								<label for="descField" class="col-xs-12 col-sm-2">Descripcion</label>
								<div class="col-xs-12 col-sm-10">
									<textarea class="form-control" id="descField" placeholder="Descripción" pattern="[A-Za-záÁéÉíÍóÓúÚ]{1,100}" required ></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="dateField" class="col-xs-12 col-sm-2">Fecha</label>
								<div class="col-xs-12 col-sm-10">
									<input type="date" class="form-control" id="dateField" placeholder="Fecha" required />
								</div>
							</div>
							<div class="col-xs-10 col-xs-offset-2">
								<button type="submit" class="btn btn-success" id="btnEnviarExamen">Enviar </button>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="eliminar">
						<form class="form-horizontal">
							<div class="form-group">
								<label for="idField" class="col-xs-12 col-sm-2">Id</label>
								<div class="col-xs-10">
									<select class="col-xs-12 col-sm-4 form-control" id="lstExamenesEliminar">
										<option value="0">&lt;Exámenes&gt;</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="nameField" class="col-xs-12 col-sm-2">Nombre</label>
								<div class="col-xs-12 col-sm-10">
									<input type="text" class="form-control" id="nameField" placeholder="Nombre" pattern="[A-Za-záÁéÉíÍóÓúÚ]{1,20}" required />
								</div>
							</div>
							<div class="form-group">
								<label for="descField" class="col-xs-12 col-sm-2">Descripcion</label>
								<div class="col-xs-12 col-sm-10">
									<textarea class="form-control" id="descField" placeholder="Descripción" pattern="[A-Za-záÁéÉíÍóÓúÚ]{1,100}" required ></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="dateField" class="col-xs-12 col-sm-2">Fecha</label>
								<div class="col-xs-12 col-sm-10">
									<input type="date" class="form-control" id="dateField" placeholder="Fecha" required/>
								</div>
							</div>
							<div class="col-xs-10 col-xs-offset-2">
								<button type="submit" class="btn btn-success" id="btnEliminarExamen">Eliminar </button>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="modificar">
						<form class="form-horizontal">
							<div class="form-group">
								<label for="idField" class="col-xs-12 col-sm-2">Id</label>
								<div class="col-xs-12 col-sm-10">
									<select class="col-xs-12 col-sm-4 form-control" id="lstExamenesModificar">
										<option value="0">&lt;Exámenes&gt;</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="nameField" class="col-xs-12 col-sm-2">Nombre</label>
								<div class="col-xs-12 col-sm-10">
									<input type="text" class="form-control" id="nameField" placeholder="Nombre"  pattern="[A-Za-záÁéÉíÍóÓúÚ]{1,20}" required />
								</div>
							</div>
							<div class="form-group">
								<label for="descField" class="col-xs-12 col-sm-2">Descripcion</label>
								<div class="col-xs-12 col-sm-10">
									<textarea class="form-control" id="descField" placeholder="Descripción"  pattern="[A-Za-záÁéÉíÍóÓúÚ]{1,100}" required ></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="dateField" class="col-xs-12 col-sm-2">Fecha</label>
								<div class="col-xs-12 col-sm-10">
									<input type="date" class="form-control" id="dateField" placeholder="Fecha" required />
								</div>
							</div>
							<div class="col-xs-10 col-xs-offset-2">
								<button type="submit" class="btn btn-success" id="btnModificarExamen">Modificar </button>
							</div>
						</form>
					</div>
				</div>
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
    <script src="../js/po-main.js"></script>

</body>

</html>
