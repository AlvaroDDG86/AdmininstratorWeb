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
    aAlumnos=[];
    
    //Petici�n post para rellenar la lista de los teléfonos
    $.post("../inc/CentroService.php",
        {tipo:"alumno",profesor:$("#idProfesorSmall").text()},
        function(datos){
            for(var strIndice in datos)
            {
                aAlumnos[strIndice]=datos[strIndice];
                $('#lstAlumnosEliminar').append($('<option>', {
                        id:strIndice,
                        value: datos[strIndice].idAlumno,
                        text: datos[strIndice].idAlumno
                }));
                $('#lstAlumnosModificar').append($('<option>', {
                        id:strIndice,
                        value: datos[strIndice].idAlumno,
                        text: datos[strIndice].idAlumno
                }));
                var newRowContent = "<tr><td>"+datos[strIndice].idAlumno+"</td><td>"+datos[strIndice].nombreAlumno+"</td><td>"+datos[strIndice].apellidosAlumno+"</td><td>"+datos[strIndice].direccionAlumno+"</td><td>"+datos[strIndice].emailAlumno+"</td></tr>";
                $("#tblShow tbody").append(newRowContent);
            }
        },"json"); 
    
    //Petici�n post para rellenar la lista de los teléfonos
    $.post("../inc/CentroService.php",
        {tipo:"cursos",profesor:$("#idProfesorSmall").text()},
        function(datos){
            for(var strIndice in datos)
            {
                var chk = "<label><input type='checkbox' class='form'  value='"+datos[strIndice].idCurso+"' name='checkbox[]'>"+datos[strIndice].nombreCurso+"</label>";
                $("#chkNuevo").append(chk);
                $("#chkModificar").append(chk);
            }
        },"json"); 
    
    
     //Actualizamos los campos cuando haya un cambio en la select
    $('#lstAlumnosEliminar').change(function() {
        if($("#lstAlumnosEliminar option:selected" ).val()=="-1"){
            $("#nombreFieldE").val("");
            $("#apellidosFieldE").val("");
            $("#dirFieldE").val("");
            $("#emailFieldE").val("");
            $("#btnE").prop('disabled', true);
        }else{
            var id=$("#lstAlumnosEliminar option:selected" ).attr('id');
            $("#nombreFieldE").val( aAlumnos[id].nombreAlumno );
            $("#apellidosFieldE").val( aAlumnos[id].apellidosAlumno );
            $("#dirFieldE").val( aAlumnos[id].direccionAlumno );
            $("#emailFieldE").val( aAlumnos[id].emailAlumno );
            $("#btnE").prop('disabled', false);
        }
    });
    
    
     //Actualizamos los campos cuando haya un cambio en la select
    $('#lstAlumnosModificar').change(function() {
        if($("#lstAlumnosModificar option:selected" ).val()=="-1"){
             $("#nombreFieldM").val("");
            $("#apellidosFieldM").val("");
            $("#dirFieldM").val("");
            $("#emailFieldM").val("");
            $("#btnM").prop('disabled', true);
        }else{
            var id=$("#lstAlumnosModificar option:selected" ).attr('id');
            $("#nombreFieldM").val( aAlumnos[id].nombreAlumno );
            $("#apellidosFieldM").val( aAlumnos[id].apellidosAlumno );
            $("#dirFieldM").val( aAlumnos[id].direccionAlumno );
            $("#emailFieldM").val( aAlumnos[id].emailAlumno );
            $("#btnM").prop('disabled', false);
        }
    });    
    
    $('#lstAlumnosEliminar').change();
    $('#lstAlumnosModificar').change();
});