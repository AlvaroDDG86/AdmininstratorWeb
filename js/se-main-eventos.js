$(document).ready(function(){
	
    aEventos=[];  
    //Petici�n post para rellenar la lista de las noticias
    $.post("../inc/CentroService.php",
        {tipo:"evento"},
        function(datos){
            for(var strIndice in datos)
            {
                aEventos[strIndice]=datos[strIndice];
                $('#lstEventosEliminar').append($('<option>', {
                        id:strIndice,
                        value: datos[strIndice].idEvento,
                        text: datos[strIndice].idEvento
                }));
                $('#lstEventosModificar').append($('<option>', {
                        id:strIndice,
                        value: datos[strIndice].idEvento,
                        text: datos[strIndice].idEvento
                }));
            }
        },"json"); 
    //Actualizamos los campos cuando haya un cambio en la select
    $('#lstEventosEliminar').change(function() {
        if($("#lstEventosEliminar option:selected" ).val()=="-1"){
            $("#nameFieldE").val("");
            $("#descFieldE").val("");
            $("#dateFieldE").val("");
        }else{
            var id=$("#lstEventosEliminar option:selected" ).attr('id');
            $("#nameFieldE").val( aEventos[id].nombreEvento );
            $("#descFieldE").val( aEventos[id].descripcionEvento );
            $("#dateFieldE").val( aEventos[id].fechaEvento );
        }
    });
    
    
     //Actualizamos los campos cuando haya un cambio en la select
    $('#lstEventosModificar').change(function() {
        if($("#lstEventosModificar option:selected" ).val()=="-1"){
            $("#nameFieldM").val("");
            $("#descFieldM").val("");
            $("#dateFieldM").val("");
        }else{
            var id=$("#lstEventosModificar option:selected" ).attr('id');
            $("#nameFieldM").val( aEventos[id].nombreEvento );
            $("#descFieldM").val( aEventos[id].descripcionEvento );
            $("#dateFieldM").val( aEventos[id].fechaEvento );
        }
    });
    
    
    //Forzamos el change para que cargen los datos
    $( "#lstEventosEliminar" ).change();
    //Forzamos el change para que cargen los datos
    $( "#lstEventosModificar" ).change();

});