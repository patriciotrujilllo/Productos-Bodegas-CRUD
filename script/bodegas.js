document.addEventListener("DOMContentLoaded", function () {
    let editaModal = document.querySelector('#Modal_Bodegas_editar')
    let eliminaModal = document.querySelector('#Modal_Bodegas_eliminar')

    editaModal.addEventListener('shown.bs.modal', event => {
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
            bodega = res.data;
            inputID.value = bodega.Id_bodega
            inputNombre.value = bodega.Nombre
        }).catch(error => {
            console.error(error);
        })

    })

    eliminaModal.addEventListener('shown.bs.modal', event => {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')
        eliminaModal.querySelector('.modal-footer #id_delete_2').value = id
    })

    document.getElementById("guardarBodega").addEventListener("click", function () {
        let newBodega = {
            nombre: document.querySelector('.modal-body #nombre_bodega').value
        };
        guardar(newBodega);
    });


    document.getElementById("actualizarBodega").addEventListener("click", function () {
        let actualizarBodega = {
            id: bodega.Id_bodega,
            nombre: document.querySelector('.modal-body #actualizar_nombre_bodega').value
        };
        actualizar(actualizarBodega);
    });

    document.getElementById("eliminarBodega").addEventListener("click", function () {
        let variable = document.querySelector('.modal-footer #id_delete_2');
        let valor = variable.value;
        eliminar(valor);
    });
});