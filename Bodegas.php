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
    <script>
        let editaModal = document.querySelector('#Modal_Bodegas_editar')
        let eliminaModal = document.querySelector('#Modal_Bodegas_eliminar')

        editaModal.addEventListener('shown.bs.modal',event => {
            let button = event.relatedTarget 
            let id = button.getAttribute('data-bs-id')

            let inputID = editaModal.querySelector('.modal-body #id2')
            let inputNombre = editaModal.querySelector('.modal-body #actualizar_nombre_bodega')

            axios({
            method: 'GET',
            url: url + `?Id_bodega=${id}`,
            responseType: 'json'
            }).then(res => {
            console.log(res.data);
            this.bodega = res.data;
                inputID.value = bodega.Id_bodega
                inputNombre.value = bodega.Nombre
            }).catch(error => {
            console.error(error);
            })
            
        })

        eliminaModal.addEventListener('shown.bs.modal',event => {
            let button = event.relatedTarget 
            let id = button.getAttribute('data-bs-id')
            eliminaModal.querySelector('.modal-footer #id_delete_2').value = id
        })
    </script>
    <script>

        document.getElementById("guardarBodega").addEventListener("click", function() {
                let newBodega  = {
                nombre: document.querySelector('.modal-body #nombre_bodega').value
                };
                guardar(newBodega);
                });


        document.getElementById("actualizarBodega").addEventListener("click", function() {
                let actualizarBodega  = {
                id: bodega.Id_bodega,
                nombre: document.querySelector('.modal-body #actualizar_nombre_bodega').value
                };
                actualizar(actualizarBodega);
                });

        document.getElementById("eliminarBodega").addEventListener("click", function() {
                let variable = document.querySelector('.modal-footer #id_delete_2');
                let valor = variable.value;
                eliminar(valor);
        });
    </script>
    
</body>
</html>