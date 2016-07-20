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
                var chkN = "<label class='col-sx-12 col col-sm-6 '><input type='checkbox' class='form'  value='"+datos[strIndice].idCurso+"' name='checkbox[]'>"+datos[strIndice].nombreCurso+"</label>";
                $("#chkNuevo").append(chkN);
                var chkM = "<label class='col-sx-12 col col-sm-6 '><input type='checkbox' class='form modificar'  value='"+datos[strIndice].idCurso+"' name='checkbox[]'>"+datos[strIndice].nombreCurso+"</label>";
                $("#chkModificar").append(chkM);
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
        var checks = $( "#chkModificar" ).find(".modificar");
        for(var intJ=0;intJ<checks.length;intJ++){
            checks[intJ].checked = false;
        }
        //Petici�n post para rellenar la lista de los teléfonos
        $.post("../inc/CentroService.php",
        {tipo:"cursosAlumno",alumno:$("#lstAlumnosModificar").val()},
        function(datos){
            for(var strIndice in datos)
            {
                for(var intI=0; intI<checks.length;intI++){
                    if(checks[intI].value==datos[strIndice].codigoCurso){
                        checks[intI].checked = true;
                    }
                }
            }
        },"json"); 
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