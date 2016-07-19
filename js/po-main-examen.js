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

    aExamenes=[];  
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
        {tipo:"examen",profesor:$("#idProfesorSmall").text()},
        function(datos){
            for(var strIndice in datos)
            {
                aExamenes[strIndice] = datos[strIndice];
                $('#lstExamenesEliminar').append($('<option>', {
                    id:strIndice,
                    value: datos[strIndice].idExamen,
                    text: datos[strIndice].idExamen
                }));
                var newRowContent = "<tr><td>"+datos[strIndice].idExamen+"</td><td>"+datos[strIndice].nombreExamen+"</td><td>"+datos[strIndice].descripcionExamen+"</td><td>"+datos[strIndice].fechaExamen+"</td><td>"+datos[strIndice].codigoCurso+"</td></tr>";
                $("#tblShow tbody").append(newRowContent);
            }
        },"json"); 
   
   
   //Petici�n post para rellenar la lista de los cursos
    $.post("../inc/CentroService.php",
        {tipo:"examen",profesor:$("#idProfesorSmall").text()},
        function(datos){
            for(var strIndice in datos)
            {
                $('#lstExamenesModificar').append($('<option>', {
                    id:strIndice,
                    value: datos[strIndice].idExamen,
                    text: datos[strIndice].idExamen
                }));
            }
        },"json"); 
    
    //Forzamos el change para que cargen los datos
    $( "#lstCursosNuevo" ).change();
    
    $('#lstExamenesModificar').change(function(){
        if($("#lstExamenesModificar option:selected" ).val()=="-1"){
            $("#nameFieldM").val("");
            $("#descFieldM").val("");
            $("#dateFieldM").val("");
            $("#lstCursosModificar").val("-1");
            $("#btnM").prop('disabled', true);
        }else{
            var id=$("#lstExamenesModificar option:selected" ).attr('id');
            $("#nameFieldM").val( aExamenes[id].nombreExamen );
            $("#descFieldM").val( aExamenes[id].descripcionExamen );
            $("#dateFieldM").val( aExamenes[id].fechaExamen );
            $("#lstCursosModificar").val(aExamenes[id].codigoCurso);
            $("#btnM").prop('disabled', false);
        }
    });
    
    $('#lstExamenesEliminar').change(function(){
        if($("#lstExamenesEliminar option:selected" ).val()=="-1"){
            $("#nameFieldE").val("");
            $("#descFieldE").val("");
            $("#dateFieldE").val("");
            $("#btnE").prop('disabled', true);
        }else{
            var id=$("#lstExamenesEliminar option:selected" ).attr('id');
            $("#nameFieldE").val( aExamenes[id].nombreExamen );
            $("#descFieldE").val( aExamenes[id].descripcionExamen );
            $("#dateFieldE").val( aExamenes[id].fechaExamen );
            $("#btnE").prop('disabled', false);
        }
    });
    
    
    $('#lstExamenesModificar').change();
    $('#lstExamenesEliminar').change();
    

});

//{tipo:3,tipoProducto:$("#lstTiposProducto").val()};