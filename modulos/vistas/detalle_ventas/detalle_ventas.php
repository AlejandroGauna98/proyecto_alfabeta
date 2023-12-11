<div class="container-fluid">
<h3>Detalles de Ventas</h3>
    <div class="card m-4">
            <div class="card-body">
                <table class="table"  id="tabla_ventas">
                    <thead>
                        <tr>
                            <th class="scope">id</th>
                            <th class="scope">Usuario</th>
                            <th class="scope">Fecha</th>
                            <th class="scope" style="text-align: center !important;">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="modalDetalle" style="overflow-y: scroll;">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detalle de venta</h5>
      </div>
      <div class="modal-body">
        <div class="row gx-5 d-block">
          <form class="row d-flex">
              <div class="mb-3 col-4">
                <label class="form-label">Usuario</label>
                <input type="text" class="form-control" disabled id="inputUsuario">
              </div>
              <div class="mb-3 col-4">
                <label class="form-label">Fecha de venta</label>
                <input type="text" class="form-control" disabled id="inputFecha">
              </div>
          </form>
        </div>
        <div class="card m-4">
            <div class="card-body">
                <table class="table"  id="tabla_detalle">
                    <thead>
                        <tr>
                            <th class="scope">Id</th>
                            <th class="scope">Nombre</th>
                            <th class="scope">Presenta</th>
                            <th class="scope">Precio</th>
                            <th class="scope">Descuento Pami</th>
                            <th class="scope">Via</th>
                            <th class="scope">Accion</th>
                            <th class="scope">Cantidad</th>
                            <th class="scope">Total</th>
                          </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
              </div>
        </div>
        <div>
        <form>
            <div class="mb-3 col-3">
                <label class="form-label">Total a pagar</label>
                <input type="text" class="form-control" disabled id="inputTotal">
            </div>
        </form>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnCerrar" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" id="modalAlta">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Formulario alta</h5>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnCerrarAlta" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



