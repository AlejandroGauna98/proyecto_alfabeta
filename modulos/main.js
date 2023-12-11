$(document).ready(function() {
    var opcion = "";
    var tablaProductos = $('#tablaProductos');
    function extraerDatos(){
        var data = {back: "extraerProductos" ,accion: opcion};
        $.ajax({
            data: data,
            url: "core/alfabeta_backend.php",
            type: "POST",
            dataType: "json",
            success: function(response){
                cargarTabla(response);
            }
        })
    }

    function cargarTabla(datos){
        tablaProductos.DataTable({
            destroy: true,
            data: datos,
            columns:[
                {data:"nombre"},
                {data:"presenta"},
                {data:"precio"},  
                {data:"descr"}             
            ],
            responsive: true,
            info: false,
            ordering: false,
            paging: true,
            languaje:{
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
            }
        })
    }

    
    $("#selectConsultas").on("change", function(){
        opcion = $(this).val();
        extraerDatos();
    })
}
)