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
    //Petici�n post para rellenar la lista de los teléfonos
    $.post("../inc/CentroService.php",
        {tipo:"centro"},
        function(datos){
            $("#nameField").val(datos.nombreCentro);
            $("#descField").val(datos.descripcionCentro);
            $("#resumenField").val(datos.resumenCentro);
            $("#dirField").val(datos.direccionCentro);
        },"json"); 
    
});