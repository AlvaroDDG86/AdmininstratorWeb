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
        if($("#lstNoticiasEliminar option:selected" ).val()=="-1"){
            $("#nameFieldE").val("");
            $("#descFieldE").val("");
            $("#dateFieldE").val("");
            $("#btnE").prop('disabled', true);
        }else{
            var id=$("#lstNoticiasEliminar option:selected" ).attr('id');
            $("#nameFieldE").val( aNoticias[id].nombreNoticia );
            $("#descFieldE").val( aNoticias[id].descripcionNoticia );
            $("#dateFieldE").val( aNoticias[id].fechaNoticia );
            $("#btnE").prop('disabled', false);
        }
    });
    
    
     //Actualizamos los campos cuando haya un cambio en la select
    $('#lstNoticiasModificar').change(function() {
        if($("#lstNoticiasModificar option:selected" ).val()=="-1"){
            $("#nameFieldM").val("");
            $("#descFieldM").val("");
            $("#dateFieldM").val("");
            $("#btnM").prop('disabled', true);
        }else{
            var id=$("#lstNoticiasModificar option:selected" ).attr('id');
            $("#nameFieldM").val( aNoticias[id].nombreNoticia );
            $("#descFieldM").val( aNoticias[id].descripcionNoticia );
            $("#dateFieldM").val( aNoticias[id].fechaNoticia );
            $("#btnM").prop('disabled', false);
        }
    });
    
    
    //Forzamos el change para que cargen los datos
    $( "#lstNoticiasEliminar" ).change();
    //Forzamos el change para que cargen los datos
    $( "#lstNoticiasModificar" ).change();

});