$(document).ready(function(){
    $("#myModal").modal("hide");
    
    $(".form-horizontal").submit(function(){
        $("#myModal").modal("show");
    });
    
    $('.btn').on('click', function() {
        var $this = $(this);
        $this.button('loading');
        setTimeout(function() {
           $this.button('reset');
        }, 2000);
    });
    
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
                var newRowContent = "<tr><td>"+datos[strIndice].idCurso+"</td><td>"+datos[strIndice].nombreCurso+"</td><td>"+datos[strIndice].descripcionCurso+"</td><td>"+datos[strIndice].horasCurso+"</td><td>"+datos[strIndice].codigoProfesor+"</td></tr>";
                $("#tblShow tbody").append(newRowContent);
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
            $("#btnE").prop('disabled', true);
        }else{
            var id=$("#lstCursosEliminar option:selected" ).attr('id');
            $("#nameFieldE").val( aCursos[id].nombreCurso );
            $("#descFieldE").val( aCursos[id].descripcionCurso );
            $("#horasFieldE").val( aCursos[id].horasCurso );
            $("#btnE").prop('disabled', false);
        }
    });
    
    
     //Actualizamos los campos cuando haya un cambio en la select
    $('#lstCursosModificar').change(function() {
        if($("#lstCursosModificar option:selected" ).val()=="-1"){
            $("#nameFieldM").val("");
            $("#descFieldM").val("");
            $("#horasFieldM").val("");
            $("#lstProfesorModificar").val("-1");
            $("#btnM").prop('disabled', true);
        }else{
            var id=$("#lstCursosModificar option:selected" ).attr('id');
            $("#nameFieldM").val( aCursos[id].nombreCurso );
            $("#descFieldM").val( aCursos[id].descripcionCurso );
            $("#horasFieldM").val( aCursos[id].horasCurso );
            $("#lstProfesorModificar").val(aCursos[id].codigoProfesor);
            $("#btnM").prop('disabled', false);
        }
    });
    
    
    //Forzamos el change para que cargen los datos
    $( "#lstCursosEliminar" ).change();
    //Forzamos el change para que cargen los datos
    $( "#lstCursosModificar" ).change();

});