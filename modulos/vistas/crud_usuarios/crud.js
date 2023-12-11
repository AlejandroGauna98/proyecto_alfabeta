$(document).ready(function () {
    var idRol= "";
    function extraerUsers(){
        var data = {back: "extraerDatos"}
        $.ajax({
            data: data,
            url: "core/alfabeta_backend.php",
            type: "POST",
            dataType: "json",
            success: function(response){
                cargar_tabla(response);
            }
        })
    }
    extraerUsers();

    // var datatable_usuarios = $('#tabla_Home');
    function cargar_tabla(users){
        $('#tabla_Home').DataTable({
            destroy: true,
            data: users,
            columns:[
                {data: "username"},
                {data: "nom_usuario"},
                {data: "rol"},
                {data: "activo",
                    render: function(activo){
                        if(activo != 0){
                            return `<div class="d-flex justify-content-center column-gap-2">
                                        <button id="btnModificar" class="btn bg-gradient waves-effect waves-success btn-success py-1 px-2 mr-2" type="button">Modificar</button>
                                        <button id="btnDesactivar" class="btn bg-gradient waves-effect waves-danger btn-danger py-1 px-2 ml-2"type="button">Desactivar</button>
                                    </div>`
                        }else{
                            return `<div class="d-flex justify-content-center">
                                        <button id="btnActivar" class="btn bg-gradient waves-effect waves-primary btn-primary py-1 px-2" type="button">Activar</button>
                                    </div>`
                        }
                    }}               
            ],
            responsive: true,
            info: false,
            ordering: false,
            paging: false
        })
    }
   

    //--INICIO SECCION AGREGAR USUARIO

    $('#botonAbrirModal').on("click", function(){
        var data = {back: 'extraerRol'};
        $.ajax({
            data: data,
            url: 'core/alfabeta_backend.php',
            type: "POST",
            dataType: "json",
            success: function(response){
                extraerRol(response);
            }
        })
        $('#modalAgregar').show();
    })

    function extraerRol(roles){
        $("#rolInput").empty();
        roles.forEach(function(rol) {
            $("#rolInput").append($("<option>",{
                value: rol.id,
                text: rol.descripcion
            }));
        });
    }

    $('#botonCerrar').on("click", function(){
        var nombre = $('#usernameInput').val("");
        var password = $('#passwordInput').val("");
        var nom_usuario = $('#nombreUsuarioInput').val("");
        var rol = $('#rolInput').val();
        $('#modalAgregar').hide();
    })

    $('#botonAceptar').on("click", function(){
        var username = $('#usernameInput').val();
        var password = $('#passwordInput').val();
        var nomUsuario = $('#nombreUsuarioInput').val();
        var rol = $('#rolInput').val();
        var data = {back: 'agregarUsuario', username: username, password: password, nomUsuario: nomUsuario, rol: rol};
        console.log(data);
        $.ajax({
            data: data,
            url: 'core/alfabeta_backend.php',
            type: "POST",
            dataType: "json",
            success: function(response){
                extraerUsers();
                $('#modalAgregar').hide();
            }
        })
    })
    //--FIN SECCION AGREGAR USUARIO

    $("#tabla_Home tbody").on("click", "button", function () {   
        var usuario = $('#tabla_Home').DataTable().row($(this).parents("tr")).data();
        var opt = $(this).prop("id");
        switch (opt) {
            case "btnDesactivar":
                cambiarEstado(usuario);
                break;

            case "btnModificar":
                abrirModalModificar(usuario);
                break;

            case "btnActivar":               
                cambiarEstado(usuario);
                break;
        }

    });

    //--INICIO SECCION MODIFICAR USUARIO

    function abrirModalModificar(usuario){
        idRol = usuario['rol'];
        console.log(idRol)
        $('#usernameInputMod').val(usuario['username']);
        $('#nomUsuarioInputMod').val(usuario['nom_usuario']);
        $('#rolInputMod').val(usuario['descripcion']);
        var data = {back: 'extraerRol'};
        $.ajax({
            data: data,
            url: 'core/alfabeta_backend.php',
            type: "POST",
            dataType: "json",
            success: function(response){
                extraerRolMod(response);
            }
        })
        $('#modalModificar').show();
    }

    function extraerRolMod(roles){
        $("#selectRolMod").empty();
        $('#selectRolMod').append($("<option disabled selected>-- Seleccione el tipo de usuario --</option>"));
        roles.forEach(function(rol) {
            $("#selectRolMod").append($("<option>",{
                value: rol.id,
                text: rol.descripcion
            }));
        });
        $('#selectRolMod').change(obtenerDato);
        function obtenerDato(){
            $('#rolInputMod').val($('#selectRolMod').val());
        }
    }

    $('#btnCerrarModificar').on("click",function(){
        $('#usernameInputMod').val("");
        $('#nomUsuarioInputMod').val("");
        $('#rolInputMod').val("");
        $('#modalModificar').hide();
    })

    $('#btnAceptarModificar').on("click", function(){
        var user = $('#usernameInputMod').val();
        var nomUsuario = $('#nomUsuarioInputMod').val();
        var rol = $('#rolInputMod').val();
        var data = {back: 'modificarUsuario', username: user, nomUsuario: nomUsuario, rol: rol}
        $.ajax({
            data: data,
            url: 'core/alfabeta_backend.php',
            type: "POST",
            dataType: "json",
            success: function(response){
                extraerUsers();
                $('#modalModificar').hide();
            }
        })
    })

    //---FIN MODIFICAR  USUARIO

    //---INICIO DESACTIVAR USUARIO
    function cambiarEstado(usuario){
        var username = usuario['username'];
        var data = {back: 'cambiarEstado', username: username};
        $.ajax({
            data: data,
            url: 'core/alfabeta_backend.php',
            type: "POST",
            dataType: "json",
            success: function(response){
                extraerUsers();
            }
        })
    }
});