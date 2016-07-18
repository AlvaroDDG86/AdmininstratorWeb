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
        if($('#lstCursos').val()=="-1"){
            $("#lstAlumnos").empty().append('<option selected="selected" value="-1">Alumno</option>');
        }else{
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
        }
    });
    
    //Forzamos el change para que cargen los datos
    $( "#lstCursos" ).change();

});

//{tipo:3,tipoProducto:$("#lstTiposProducto").val()};