$(document).ready(function(){
    
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