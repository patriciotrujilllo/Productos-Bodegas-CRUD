<!-- Modal para agregar productos-->


<div class="modal fade" id="Modal_Productos" tabindex="-1" aria-labelledby="Modal_ProductosLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="Modal_ProductosLabel">Agregar producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
            <div class="mb-3">
                <label for="nombre_producto" class="form-label">Nombre producto:</label>
                <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descripcion_producto" class="form-label">Descripción producto:</label>
                <textarea type="text" name="descripcion_producto" id="descripcion_producto" class="form-control" required></textarea>
            </div>

            <div class="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="btnGuardar">Guardar</button>

            </div>

        
      </div>
    </div>
  </div>
</div>


<!-- Modal para actualizar productos-->

<div class="modal fade" id="Modal_Productos_editar" tabindex="-1" aria-labelledby="Modal_Productos_editarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="Modal_Productos_editar">Actualizar producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        

          <input type="hidden" id="id" name="id">
            <div class="mb-3">
                <label for="actualizar_nombre_producto" class="form-label">Nombre producto:</label>
                <input type="text" name="actualizar_nombre_producto" id="actualizar_nombre_producto" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="actualizar_descripcion_producto" class="form-label">Descripción producto:</label>
                <textarea type="text" name="actualizar_descripcion_producto" id="actualizar_descripcion_producto" class="form-control" required></textarea>
            </div>

            <div class="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="ActualizarProductos">Actualizar</button>

            </div>

        
      </div>
    </div>
  </div>
</div>

<!-- Modal para confirmacion de eliminacion de productos-->

<div class="modal fade" id="Modal_Productos_eliminar" tabindex="-1" aria-labelledby="Modal_Productos_eliminarLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="Modal_Productos_eliminarLabel">Aviso</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Desea eliminar el producto?
      </div>

      <div class="modal-footer">
        
                  <input type="hidden" name="id" id="id_delete">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btnEjecutar">eliminar</button>
        
              

          
      </div>
    </div>
  </div>
</div>


<!-- Modal para agregar Bodegas-->

<div class="modal fade" id="Modal_Bodegas" tabindex="-1" aria-labelledby="Modal_BodegasLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="Modal_BodegasLabel">Agregar bodega</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" id="formAgregarBodega">
            <div class="mb-3">
                <label for="nombre_bodega" class="form-label">Nombre bodega:</label>
                <input type="text" name="nombre_bodega" id="nombre_bodega" class="form-control" required>
            </div>

            <div class="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="guardarBodega">Guardar</button>

            </div>
        </form>
        
      </div>
    </div>
  </div>
</div>

<!-- Modal para actualizar bodegas-->

<div class="modal fade" id="Modal_Bodegas_editar" tabindex="-1" aria-labelledby="Modal_Bodegas_editarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="Modal_Bodegas_editarLabel">Actualizar bodega</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        

          <input type="hidden" id="id2" name="id2">
            <div class="mb-3">
                <label for="nombre_bodega" class="form-label">Nombre bodega:</label>
                <input type="text" name="nombre_bodega" id="actualizar_nombre_bodega" class="form-control" required>
            </div>

            <div class="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="actualizarBodega">Actualizar</button>

            </div>

      </div>
    </div>
  </div>
</div>

<!-- Modal para confirmacion de eliminacion de bodegas-->

<div class="modal fade" id="Modal_Bodegas_eliminar" tabindex="-1" aria-labelledby="Modal_Bodegas_eliminarLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="Modal_Bodegas_eliminarLabel">Aviso</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Desea eliminar el bodega?
      </div>

      <div class="modal-footer">
        
                  <input type="hidden" name="id" id="id_delete_2">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" id="eliminarBodega">eliminar</button>

              

          
      </div>
    </div>
  </div>
</div>

<!-- Modal para actualizar Inventario-->

<div class="modal fade" id="Modal_inventario_editar" tabindex="-1" aria-labelledby="Modal_inventario_editarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="Modal_inventario_editarLabel">Actualizar inventario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <input type="hidden" name="id" id="id"> 
        

            <div class="mb-3">
                <label for="stock" class="form-label">Stock:</label>
                <input type="text" name="stock" id="stock" class="form-control" required>
            </div>

            <div class="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="actualizarInventario">Guardar</button>

            </div>

        
      </div>
     
    </div>
  </div>
</div>



<!-- Modal para confirmacion de eliminacion de inventario-->

<div class="modal fade" id="Modal_inventario_eliminar" tabindex="-1" aria-labelledby="Modal_inventario_eliminarLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="Modal_inventario_eliminarLabel">Aviso</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Desea eliminar del inventario2?
      </div>

      <div class="modal-footer">
        
                  <input type="hidden" name="id" id="id">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" id="eliminarInventario">eliminar</button>
    
      </div>
    </div>
  </div>
</div>

<!-- Modal para agregar Inventario-->

<div class="modal fade" id="Modal_Inventario" tabindex="-1" aria-labelledby="Modal_InventarioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="Modal_InventarioLabel">Agregar a inventario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
            <div class="mb-3">
                <label for="nombre_producto" class="form-label">Producto:</label>

                <select name="nombre_producto_Inventario" id="nombre_producto_Inventario" class="form-select" required>
                  <option value="">Seleccione...</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="nombre_bodega_Inventario" class="form-label">Bodega:</label>

                <select name="nombre_bodega_Inventario" id="nombre_bodega_Inventario" class="form-select" required>
                  <option value="">Selecionar...</option>
                </select>
              </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock:</label>
                <input type="text" name="stock_Inventario" id="stock_Inventario" class="form-control" required>
            </div>

            <div class="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="guardarInventario">Guardar</button>

            </div>

        
      </div>
    </div>
  </div>
</div>