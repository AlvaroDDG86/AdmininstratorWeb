$(document).ready(function(){
	
    aNoticias=[];  
    //Petici�n post para rellenar la lista de las noticias
    $.post("../inc/CentroService.php",
        {tipo:"noticia"},
        function(datos){
            for(var strIndice in datos)
            {
                aNoticias[strIndice]=datos[strIndice];
                $('#lstNoticiasEliminar').append($('<option>', {
                        id:strIndice,
                        value: datos[strIndice].idNoticia,
                        text: datos[strIndice].idNoticia
                }));
                $('#lstNoticiasModificar').append($('<option>', {
                        id:strIndice,
                        value: datos[strIndice].idNoticia,
                        text: datos[strIndice].idNoticia
                }));
            }
        },"json"); 
    //Actualizamos los campos cuando haya un cambio en la select
    $('#lstNoticiasEliminar').change(function() {
        var id=$("#lstNoticiasEliminar option:selected" ).attr('id');
            $("#nameFieldE").val( aNoticias[id].nombreNoticia );
            $("#descFieldE").val( aNoticias[id].descripcionNoticia );
            $("#dateFieldE").val( aNoticias[id].fechaNoticia );
    });
    
    
     //Actualizamos los campos cuando haya un cambio en la select
    $('#lstNoticiasModificar').change(function() {
        var id=$("#lstNoticiasModificar option:selected" ).attr('id');
            $("#nameFieldM").val( aNoticias[id].nombreNoticia );
            $("#descFieldM").val( aNoticias[id].descripcionNoticia );
            $("#dateFieldM").val( aNoticias[id].fechaNoticia );
    });
    
    
    //Forzamos el change para que cargen los datos
    $( "#lstNoticiasEliminar" ).change();
    //Forzamos el change para que cargen los datos
    $( "#lstNoticiasModificar" ).change();

});