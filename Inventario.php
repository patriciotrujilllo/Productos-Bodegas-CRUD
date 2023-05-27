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
        include 'modal/modal.php'; 
        include('modulos/conexion.php');
    ?>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
    <script src="./script/obtenerProductosBodegas.js"></script>
    <script src="modulos/Inventario/Controlador/controlador.js"></script>                               
    <script src="./script/inventario.js"></script>
    
</body>
</html>