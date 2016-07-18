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

    aTareas=[];  
    //Petici�n post para rellenar la lista de los cursos
    $.post("../inc/CentroService.php",
        {tipo:"cursos",profesor:$("#idProfesorSmall").text()},
        function(datos){
            for(var strIndice in datos)
            {
                $('#lstCursosNuevo').append($('<option>', {
                    id:strIndice,
                    value: datos[strIndice].idCurso,
                    text: datos[strIndice].nombreCurso
                }));
                 $('#lstCursosModificar').append($('<option>', {
                    id:strIndice,
                    value: datos[strIndice].idCurso,
                    text: datos[strIndice].nombreCurso
                }));
            }
        },"json"); 
        
    //Petici�n post para rellenar la lista de los cursos
    $.post("../inc/CentroService.php",
        {tipo:"tarea",profesor:$("#idProfesorSmall").text()},
        function(datos){
            for(var strIndice in datos)
            {
                aTareas[strIndice] = datos[strIndice];
                $('#lstTareasEliminar').append($('<option>', {
                    id:strIndice,
                    value: datos[strIndice].idTarea,
                    text: datos[strIndice].idTarea
                }));
            }
        },"json"); 
   
   
   //Petici�n post para rellenar la lista de los cursos
    $.post("../inc/CentroService.php",
        {tipo:"tarea",profesor:$("#idProfesorSmall").text()},
        function(datos){
            for(var strIndice in datos)
            {
                $('#lstTareasModificar').append($('<option>', {
                    id:strIndice,
                    value: datos[strIndice].idTarea,
                    text: datos[strIndice].idTarea
                }));
            }
        },"json"); 
    
    //Forzamos el change para que cargen los datos
    $( "#lstCursosNuevo" ).change();
    $('#lstTareasModificar').change();
    $('#lstTareasEliminar').change();
    
    $('#lstTareasModificar').change(function(){
        if($("#lstTareasModificar option:selected" ).val()=="-1"){
            $("#nameFieldM").val("");
            $("#descFieldM").val("");
            $("#dateFieldM").val("");
            $("#lstCursosModificar").val("-1");
            $("#btnM").prop('disabled', true);
        }else{
            var id=$("#lstTareasModificar option:selected" ).attr('id');
            $("#nameFieldM").val( aTareas[id].nombreTarea );
            $("#descFieldM").val( aTareas[id].descripcionTarea );
            $("#dateFieldM").val( aTareas[id].fechaTarea );
            $("#lstCursosModificar").val(aTareas[id].codigoCurso);
            $("#btnM").prop('disabled', false);
        }
    });
    
    $('#lstTareasEliminar').change(function(){
        if($("#lstTareasEliminar option:selected" ).val()=="-1"){
            $("#nameFieldE").val("");
            $("#descFieldE").val("");
            $("#dateFieldE").val("");
            $("#btnE").prop('disabled', true);
        }else{
            var id=$("#lstTareasEliminar option:selected" ).attr('id');
            $("#nameFieldE").val( aTareas[id].nombreTarea );
            $("#descFieldE").val( aTareas[id].descripcionTarea );
            $("#dateFieldE").val( aTareas[id].fechaTarea );
            $("#btnE").prop('disabled', false);
        }
    });
    
    
    

});

//{tipo:3,tipoProducto:$("#lstTiposProducto").val()};