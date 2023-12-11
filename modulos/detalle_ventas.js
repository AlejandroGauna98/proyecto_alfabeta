$(document).ready(function () {

    function extraerCabecera(){
        var data = {back: "extraerCabecera"}
        $.ajax({
            data: data,
            url: "core/ventas_backend.php",
            type: "POST",
            dataType: "json",
            success: function(response){
                cargar_tabla(response);
            }
        })
    }
    extraerCabecera();

    function cargar_tabla(users){
        $('#tabla_ventas').DataTable({
            destroy: true,
            data: users,
            columns:[
                {data: "id"},
                {data: "usuario_id"},
                {data: "fecha_venta"},
                {defaultContent:                    
                                 `<div class="d-flex justify-content-center gap-2">
                                    <button id="btnVer" class="btn bg-gradient waves-effect waves-danger btn-danger py-1 px-2" type="button">Ver</button>
                                </div>`         
                }           
            ],
            responsive: true,
            info: false,
            ordering: false,
            paging: false
        })
    }

    $("#tabla_ventas tbody").on("click", "button", function () {   
        var usuario = $('#tabla_ventas').DataTable().row($(this).parents("tr")).data();
        var opt = $(this).attr("id");
        switch (opt) {
            case "btnVer":
                abrirModal(usuario);
                break;
        }
    })

    function abrirModal(usuario){
        cargarCabecera(usuario);
        extraerDetalle(usuario['id']);
        
        $("#modalDetalle").show();
    }


  

    $('#btnCerrar').on("click", function(){
        $("#modalDetalle").hide();
    })

    function cargarCabecera(user){
        $('#inputUsuario').val(user['usuario_id']);
        $('#inputFecha').val(user['fecha_venta']);
    }
       
    function extraerDetalle(id){
        var data = {back: "extraerDetalle", id:id}
        $.ajax({
            data: data,
            url: "core/ventas_backend.php",
            type: "POST",
            dataType: "json",
            success: function(response){
                cargar_tabla_detalle(response);
            }
        })
    }

    function cargar_tabla_detalle(datos){
        var tabla = $('#tabla_detalle').DataTable({
            destroy: true,
            data: datos,
            columns:[
                {data: "id"},
                {data: "nombre"},
                {data: "presenta"},
                {data: "precio", render: function(precio){return `$${precio}`}},
                {data: "pami"},
                {data: "via"},
                {data: "accion"},
                {data: "cantidad"},
                {
                    targets: 0,
                    data: function (row) {
                      // Acceder a los valores originales antes del renderizado, caso contrario tira error el metodo de suma
                      return row.precio * row.cantidad;
                    },
                    render: function(data){
                        var total = data.toFixed(2);
                        return `$${total}`;
                    }
                }
            ],
            responsive: true,
            info: false,
            ordering: false,
            paging: false,
            searching: false
        })
        var tabla = $('#tabla_detalle').DataTable();
        var suma = tabla.column(8).data().reduce(function (a, b) {
            return parseFloat(a) + parseFloat(b);
        }, 0);
        
        $("#inputTotal").val(suma.toFixed(2));

    

    }  
})
