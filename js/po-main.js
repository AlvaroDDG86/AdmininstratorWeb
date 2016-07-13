$(document).ready(function(){
	
	//Examen----------------------
	
//Petici�n post para rellenar la lista de ex�menes
    $.post("inc/CentroService.php",
        {tipo:"examen"},
        function(datos){
            for(var strIndice in datos)
            {
                $('#lstExamenesEliminar').append($('<option>', {
                        value: datos[strIndice].IdExamen,
                        text: datos[strIndice].NombreExamen
                }));
                $('#lstExamenesModificar').append($('<option>', {
                        value: datos[strIndice].IdExamen,
                        text: datos[strIndice].NombreExamen
                }));
            }
        },"json"); 
	
	//Tarea----------------------
	
//Petici�n post para rellenar la lista de tareas
    $.post("inc/CentroService.php",
        {tipo:"tarea"},
        function(datos){
            for(var strIndice in datos)
            {
                $('#lstTareasEliminar').append($('<option>', {
                        value: datos[strIndice].IdExamen,
                        text: datos[strIndice].NombreExamen
                }));
                $('#lstTareasModificar').append($('<option>', {
                        value: datos[strIndice].IdExamen,
                        text: datos[strIndice].NombreExamen
                }));
            }
        },"json"); 
        
        
    //Petici�n post para rellenar la lista de cursos
    $.post("inc/CentroService.php",
        {tipo:"curso"},
        function(datos){
            for(var strIndice in datos)
            {
                $('#lstCursos').append($('<option>', {
                        value: datos[strIndice].IdCurso,
                        text: datos[strIndice].NombreCurso
                }));
            }
        },"json"); 
        
        
    //Petici�n post para rellenar la lista de cursos
    $.post("inc/CentroService.php",
        {tipo:"alumno"},
        function(datos){
            for(var strIndice in datos)
            {
                $('#lstAlumnos').append($('<option>', {
                        value: datos[strIndice].IdAlumno,
                        text: datos[strIndice].NombreAlumno
                }));
            }
        },"json"); 
        
    
		
		
	/*$("#btnEnviarTarea").click(function(){
		id = $("#idField").val();
        name = $("#nameField").val();
		desc = $("#descField").val();
		date = $("#dateField").val();
    });
	$("#btnEliminarTarea").click(function(){
        name = $("#nameField").val();
		desc = $("#descField").val();
		date = $("#dateField").val();
    });
	$("#btnModificarTarea").click(function(){
        name = $("#nameField").val();
		desc = $("#descField").val();
		date = $("#dateField").val();
    });*/
});