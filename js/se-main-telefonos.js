$(document).ready(function(){
	
    aTelefonos=[];
    
    //Petici�n post para rellenar la lista de los teléfonos
    $.post("../inc/CentroService.php",
        {tipo:"telefono"},
        function(datos){
            for(var strIndice in datos)
            {
                aTelefonos[strIndice]=datos[strIndice];
                $('#lstTelefonosEliminar').append($('<option>', {
                        id:strIndice,
                        value: datos[strIndice].idTelefono,
                        text: datos[strIndice].idTelefono
                }));
                $('#lstTelefonosModificar').append($('<option>', {
                        id:strIndice,
                        value: datos[strIndice].idTelefono,
                        text: datos[strIndice].idTelefono
                }));
            }
        },"json"); 
    
     //Actualizamos los campos cuando haya un cambio en la select
    $('#lstTelefonosEliminar').change(function() {
        var id=$("#lstTelefonosEliminar option:selected" ).attr('id');
            $("#phoneFieldE").val( aTelefonos[id].telefono );
    });
    
    
     //Actualizamos los campos cuando haya un cambio en la select
    $('#lstTelefonosModificar').change(function() {
        var id=$("#lstTelefonosModificar option:selected" ).attr('id');
            $("#phoneFieldM").val( aTelefonos[id].telefono );
    });    
    
    //Forzamos el change para que cargen los datos
    $( "#lstTelefonosEliminar" ).change();
    //Forzamos el change para que cargen los datos
    $( "#lstTelefonosModificar" ).change();

;
});