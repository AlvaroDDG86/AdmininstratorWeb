$(document).ready(function(){
	
    aCursos=[];  
    //Petici�n post para rellenar la lista de los cursos
    $.post("../inc/CentroService.php",
        {tipo:"curso"},
        function(datos){
            for(var strIndice in datos)
            {
                aCursos[strIndice]=datos[strIndice];
                $('#lstCursosEliminar').append($('<option>', {
                        id:strIndice,
                        value: datos[strIndice].idCurso,
                        text: datos[strIndice].idCurso
                }));
                $('#lstCursosModificar').append($('<option>', {
                        id:strIndice,
                        value: datos[strIndice].idCurso,
                        text: datos[strIndice].idCurso
                }));
            }
        },"json"); 
        
    $.post("../inc/CentroService.php",
        {tipo:"profesor"},
        function(datos){
            for(var strIndice in datos)
            {
                $('#lstProfesorNuevo').append($('<option>', {
                        value: datos[strIndice].idProfesor,
                        text: datos[strIndice].nombreProfesor
                }));
                $('#lstProfesorModificar').append($('<option>', {
                        id:strIndice,
                        value: datos[strIndice].idProfesor,
                        text: datos[strIndice].nombreProfesor
                }));
            }
        },"json");     
    
        
    //Actualizamos los campos cuando haya un cambio en la select
    $('#lstCursosEliminar').change(function() {
        if($("#lstCursosEliminar option:selected" ).val()=="-1"){
            $("#nameFieldE").val("");
            $("#descFieldE").val("");
            $("#horasFieldE").val("");
        }else{
            var id=$("#lstCursosEliminar option:selected" ).attr('id');
            $("#nameFieldE").val( aCursos[id].nombreCurso );
            $("#descFieldE").val( aCursos[id].descripcionCurso );
            $("#horasFieldE").val( aCursos[id].horasCurso );
        }
    });
    
    
     //Actualizamos los campos cuando haya un cambio en la select
    $('#lstCursosModificar').change(function() {
        if($("#lstCursosModificar option:selected" ).val()=="-1"){
            $("#nameFieldM").val("");
            $("#descFieldM").val("");
            $("#horasFieldM").val("");
            $("#lstProfesorModificar").val("-1");
        }else{
            var id=$("#lstCursosModificar option:selected" ).attr('id');
            $("#nameFieldM").val( aCursos[id].nombreCurso );
            $("#descFieldM").val( aCursos[id].descripcionCurso );
            $("#horasFieldM").val( aCursos[id].horasCurso );
            $("#lstProfesorModificar").val(aCursos[id].codigoProfesor);
        }
    });
    
    
    //Forzamos el change para que cargen los datos
    $( "#lstNoticiasEliminar" ).change();
    //Forzamos el change para que cargen los datos
    $( "#lstNoticiasModificar" ).change();

});