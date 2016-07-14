$(document).ready(function(){
    $('.btn').on('click', function() {
        var $this = $(this);
        $this.button('loading');
        setTimeout(function() {
           $this.button('reset');
        }, 8000);
    });
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
        if($("#lstTelefonosEliminar option:selected" ).val()=="-1"){
            $("#phoneFieldE").val("");
            $("#btnE").prop('disabled', true);
        }else{
            var id=$("#lstTelefonosEliminar option:selected" ).attr('id');
            $("#phoneFieldE").val( aTelefonos[id].telefono );
            $("#btnE").prop('disabled', false);
        }
    });
    
    
     //Actualizamos los campos cuando haya un cambio en la select
    $('#lstTelefonosModificar').change(function() {
        if($("#lstTelefonosModificar option:selected" ).val()=="-1"){
            $("#phoneFieldM").val("");
            $("#btnM").prop('disabled', true);
        }else{
            var id=$("#lstTelefonosModificar option:selected" ).attr('id');
            $("#phoneFieldM").val( aTelefonos[id].telefono );
            $("#btnM").prop('disabled', false);
        }
    });    
    
    //Forzamos el change para que cargen los datos
    $( "#lstTelefonosEliminar" ).change();
    //Forzamos el change para que cargen los datos
    $( "#lstTelefonosModificar" ).change();

;
});