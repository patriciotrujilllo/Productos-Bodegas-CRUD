<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>


</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <button id="btnNuevo" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Modal_Inventario">Agregar</button>
            </div>
        </div>

    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tablaInventario" class="table table-striped table-bordered table-condensed w-70 mt-2">
                        <thead class="text-center">
                            <tr>
                                <th>Producto</th>
                                <th>Bodega</th>
                                <th>Cantidad de productos</th>
                                <th>Acciones</th>
                            </tr>



                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
                
        </div>

    </div>
    
    <?php

        include('modulos/conexion.php');

        $stmt = $conexion->prepare('SELECT * from productos');
        $stmt->execute();
        $productosFetch = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt2 = $conexion->prepare('SELECT * from bodegas');
        $stmt2->execute();
        $bodegasFetch = $stmt2->fetchAll(PDO::FETCH_ASSOC);
       
    ?> 
    
    <?php include 'modal/modal.php'; ?>   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script> 
    <script src="modulos/Inventario/Controlador/controlador.js"></script>                          
        
    <script>
        let editaModal = document.querySelector('#Modal_inventario_editar')
        let eliminaModal = document.querySelector('#Modal_inventario_eliminar')

        editaModal.addEventListener('shown.bs.modal',event => {
            let button = event.relatedTarget 
            let id = button.getAttribute('data-bs-id')

            let inputID = editaModal.querySelector('.modal-body #id')
            let inputStock = editaModal.querySelector('.modal-body #stock')

            axios({
            method: 'GET',
            url: url + `?id=${id}`,
            responseType: 'json'
            }).then(res => {
            this.inventario = res.data;
                inputID.value = inventario.id
                inputStock.value = inventario.Stock
            }).catch(error => {
            console.error(error);
            })
        })

        eliminaModal.addEventListener('shown.bs.modal',event => {
            let button = event.relatedTarget 
            let id = button.getAttribute('data-bs-id')
            eliminaModal.querySelector('.modal-footer #id').value = id
        })
    </script>
    <script>

        document.getElementById("eliminarInventario").addEventListener("click", function() {
                let variable = document.querySelector('.modal-footer #id');
                let valor = variable.value;
                eliminar(valor);
                });

        document.getElementById("actualizarInventario").addEventListener("click", function() {
                let actualizarInventario  = {
                    id: inventario.id,
                    Stock: document.querySelector('.modal-body #stock').value
                };
                actualizar(actualizarInventario);
                });        

        document.getElementById("guardarInventario").addEventListener("click", function() {
                let newInventario  = {
                    //el value del los nombres contienen la id
                    Id_producto: document.querySelector('.modal-body #nombre_producto_Inventario').value,
                    Id_bodega: document.querySelector('.modal-body #nombre_bodega_Inventario').value,
                    Stock: document.querySelector('.modal-body #stock_Inventario').value

                };
                console.log(newInventario);
                guardar(newInventario);
                });        
    </script>
    
</body>
</html>