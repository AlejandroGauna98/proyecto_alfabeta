

<!--INICIO del cont principal-->
<div class="container">
    <h1>Contenido principal</h1>
    
    <div class="container-fluid">
    <label for="opcionesSelect">Seleccionar Opción:</label>
    <select id="selectConsultas" class="form-control">
        <option selected disabled>Seleccione una opcion</option>
        <option value="opcion1">Lista de productos bajo venta de receta archivada</option>
        <option value="opcion2">Lista de productos cuya monodroga sea ibuprofeno bajo venta controlada</option>
        <option value="opcion3">Lista de productos que contengan potasio</option>
        <option value="opcion4">Lista de productos cuya via de administracion sea sublingual</option>
        <option value="opcion5">Lista de 10 productos más caros bajo venta de receta archivada</option>
        <option value="opcion6">Lista de 50 productos cuya forma de administracion sea supositorios </option>
        <option value="opcion7">Lista de 100 productos que PAMI cubre al 70%</option>
        <option value="opcion8">Lista de productos ordenados por mayor precio cuya venta sea libre</option>
        <option value="opcion9">Lista de 25 productos que su unidad de potencia sea UI</option>
        <option value="opcion10">Lista de 50 productos de los laboratorios Ariston, Bayer y Dosa</option>
        <option value="opcion11">Lista de 50 productos de mayor valor de los laboratorios Dicofar, Pharmalab y Natulab</option>
    </select>

    <div class="card m-4">
        <div class="card-body">
            <table class="table table-bordered" id="tablaProductos">
                <thead>
                    <tr>
                        <th class="scope">Nombre</th>
                        <th class="scope">Presentacion</th>
                        <th class="scope">Precio</th>
                        <th class="scope">Descripcion</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
