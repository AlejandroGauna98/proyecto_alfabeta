<h1>BIENVENIDO</h1>
<button class="btn btn-primary" id="botonAbrirModal">Agregar Usuarios</button>
<div class="container-fluid">
    <div class="card m-4">
            <div class="card-body">
                <table class="table"  id="tabla_Home">
                    <thead>
                        <tr>
                            <th class="scope">username</th>
                            <th class="scope">nom_usuario</th>
                            <th class="scope">rol</th>
                            <th class="scope" style="text-align: center !important;">acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="modalAgregar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar Usuario</h5>
      </div>
      <div class="modal-body">
        <form>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" id="usernameInput" >
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="passwordInput">
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" id="nombreUsuarioInput" >
            </div>
            <select id="rolInput">
                <option disabled selected>Seleccione un rol</option>
            </select>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="botonCerrar">Cerrar</button>
        <button type="button" class="btn btn-primary" id="botonAceptar">Agregar Usuario</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" id="modalModificar">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modificar Usuario</h5>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="usernameInputMod" disabled >
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" id="nomUsuarioInputMod" >
            </div>
            <div class="mb-3">
                <label class="form-label">Rol actual</label>
                <input type="text" class="form-control" id="rolInputMod" disabled>
            </div>
            <select id="selectRolMod">
                <option disabled selected>Seleccione un rol</option>
            </select>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnCerrarModificar">Cerrar</button>
          <button type="button" class="btn btn-primary" id="btnAceptarModificar">Modificar Usuario</button>
        </div>
      </div>
    </div>
</div>