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
        
   $( "#lstCursos" ).change(function(){
        if($("#lstCursos option:selected" ).val()=="-1"){
            $("#btnS").prop('disabled', true);
        }else{
            $("#btnS").prop('disabled', false);
        }
   });
   
   //Forzamos el change para que cargen los datos
    $( "#lstCursos" ).change();

});

//{tipo:3,tipoProducto:$("#lstTiposProducto").val()};