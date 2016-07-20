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

    aNoticias=[];  
    //Petici�n post para rellenar la lista de los cursos
    $.post("../inc/CentroService.php",
        {tipo:"cursos",profesor:$("#idProfesorSmall").text()},
        function(datos){
            for(var strIndice in datos)
            {
                $('#lstCursos').append($('<option>', {
                    id:strIndice,
                    value: datos[strIndice].idCurso,
                    text: datos[strIndice].nombreCurso
                }));
            }
        },"json"); 
        
    //Actualizamos los campos cuando haya un cambio en la select
    $('#lstCursos').change(function() {
        $('#lstAlumnos')
            .find('option')
            .remove()
            .end()
            .append('<option selected="selected" value="-1">Alumno</option>')
        ;
        //Petición post para rellenar la lista de las noticias
        $.post("../inc/CentroService.php",
        {tipo:"alumnos",curso:$("#lstCursos").val()},
        function(datos){
            for(var strIndice in datos)
            {
                $('#lstAlumnos').append($('<option>', {
                    id:strIndice,
                    value: datos[strIndice].idAlumno,
                    text: datos[strIndice].nombreAlumno +", "+ datos[strIndice].apellidosAlumno
                }));
            }
        },"json"); 
    });
    
     $( "#lstCursos" ).change(function(){
        if($("#lstCursos option:selected" ).val()=="-1" || ("#lstAlumnos$ option:selected" ).val()=="-1"){
            $("#btnE").prop('disabled', true);
        }else{
            $("#btnE").prop('disabled', false);
        }
    });
        
      $( "#lstAlumnos" ).change(function(){
        if($("#lstAlumnos option:selected" ).val()=="-1"){
            $("#btnE").prop('disabled', true);
        }else{
            $("#btnE").prop('disabled', false);
        }
   });
    
    //Forzamos el change para que cargen los datos
    $( "#lstCursos" ).change();

});

