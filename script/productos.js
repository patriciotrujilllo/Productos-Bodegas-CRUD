document.addEventListener("DOMContentLoaded", function () {
    let editaModal = document.querySelector('#Modal_Productos_editar')
    // let eliminaModal = document.querySelector('#Modal_Productos_eliminar')

    editaModal.addEventListener('shown.bs.modal', event => {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')

        let inputID = editaModal.querySelector('.modal-body #id')
        let inputNombre = editaModal.querySelector('.modal-body #actualizar_nombre_producto')
        let inputDescripcion = editaModal.querySelector('.modal-body #actualizar_descripcion_producto')
        //El siguiente codigo comentado seria aciendo la peticion con fetch
        //let url = "modulos/Productos/Cargar_datos_modal.php"
        //let formData = new FormData()
        //formData.append('id', id)

        /*   fetch(url,{
                method: "POST",
                body: formData
            }).then(response => response.json())
            .then(data =>{
                inputID.value = data.Id_producto
                inputNombre.value = data.Nombre_producto
                inputDescripcion.value = data.Descripcion
            }).catch(err => console.log(err))*/
        axios({
            method: 'GET',
            url: url + `?Id_producto=${id}`,
            responseType: 'json'
        }).then(res => {
            console.log(res.data);
            productos = res.data;
            inputID.value = productos.Id_producto
            inputNombre.value = productos.Nombre_producto
            inputDescripcion.value = productos.Descripcion
        }).catch(error => {
            console.error(error);
        })



    })

    document.getElementById("btnGuardar").addEventListener("click", function () {
        let newProducto = {
            nombre: document.querySelector('.modal-body #nombre_producto').value,
            descripcion: document.querySelector('.modal-body #descripcion_producto').value
        };
        guardar(newProducto);
    });

    document.getElementById("ActualizarProductos").addEventListener("click", function () {
        let actualizarProducto = {
            id: productos.Id_producto,
            nombre: document.querySelector('.modal-body #actualizar_nombre_producto').value,
            descripcion: document.querySelector('.modal-body #actualizar_descripcion_producto').value
        };
        actualizar(actualizarProducto);
    });
});