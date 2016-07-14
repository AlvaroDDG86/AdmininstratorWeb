$(document).ready(function(){
    $('.btn').on('click', function() {
        var $this = $(this);
        $this.button('loading');
        setTimeout(function() {
           $this.button('reset');
        }, 8000);
    });
    aProfesores=[];
    
    //Petici�n post para rellenar la lista de los teléfonos
    $.post("../inc/CentroService.php",
        {tipo:"profesor"},
        function(datos){
            for(var strIndice in datos)
            {
                aProfesores[strIndice]=datos[strIndice];
                $('#lstProfesoresEliminar').append($('<option>', {
                        id:strIndice,
                        value: datos[strIndice].idProfesor,
                        text: datos[strIndice].idProfesor
                }));
                $('#lstProfesoresModificar').append($('<option>', {
                        id:strIndice,
                        value: datos[strIndice].idProfesor,
                        text: datos[strIndice].idProfesor
                }));
            }
        },"json"); 
    
     //Actualizamos los campos cuando haya un cambio en la select
    $('#lstProfesoresEliminar').change(function() {
        if($("#lstProfesoresEliminar option:selected" ).val()=="-1"){
             $("#nombreFieldE").val("");
            $("#apellidosFieldE").val("");
            $("#emailFieldE").val("");
            $("#btnE").prop('disabled', true);
        }else{
             var id=$("#lstProfesoresEliminar option:selected" ).attr('id');
            $("#nombreFieldE").val( aProfesores[id].nombreProfesor );
            $("#apellidosFieldE").val( aProfesores[id].apellidosProfesor );
            $("#emailFieldE").val( aProfesores[id].direccionProfesor );
            $("#btnE").prop('disabled', false);
        }
    });
    
    
     //Actualizamos los campos cuando haya un cambio en la select
    $('#lstProfesoresModificar').change(function() {
        if($("#lstProfesoresModificar option:selected" ).val()=="-1"){
             $("#nombreFieldM").val("");
            $("#apellidosFieldM").val("");
            $("#emailFieldM").val("");
            $("#btnM").prop('disabled', true);
        }else{
            var id=$("#lstProfesoresModificar option:selected" ).attr('id');
            $("#nombreFieldM").val( aProfesores[id].nombreProfesor );
            $("#apellidosFieldM").val( aProfesores[id].apellidosProfesor );
            $("#emailFieldM").val( aProfesores[id].direccionProfesor );
            $("#btnM").prop('disabled', false);
        }
    });    
    
    

;
});