<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>


</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <button id="btnNuevo" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Modal_Bodegas">Nueva bodega</button>
            </div>
        </div>

    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tablaBodegas" class="table table-striped table-bordered table-condensed w-70 mt-2">
                        <thead class="text-center">
                            <tr>
                                <th>Nombre</th>
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

    <?php include 'modal/modal.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script> 
    <script src="modulos/Bodegas/Controlador/controlador.js"></script>                              
    <script src="./script/bodegas.js"></script>
    
</body>
</html>