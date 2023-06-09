document.addEventListener("DOMContentLoaded", function () {
    let editaModal = document.querySelector('#Modal_inventario_editar')
    let eliminaModal = document.querySelector('#Modal_inventario_eliminar')
    let agregarModal = document.querySelector('#Modal_Inventario')

    editaModal.addEventListener('shown.bs.modal', event => {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')

        let inputID = editaModal.querySelector('.modal-body #id')
        let inputStock = editaModal.querySelector('.modal-body #stock')

        axios({
            method: 'GET',
            url: url + `?id=${id}`,
            responseType: 'json'
        }).then(res => {
            inventario = res.data;
            inputID.value = inventario.id
            inputStock.value = inventario.Stock
        }).catch(error => {
            console.error(error);
        })
    })

    eliminaModal.addEventListener('shown.bs.modal', event => {
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')
        eliminaModal.querySelector('.modal-footer #id').value = id
    })

    document.getElementById("eliminarInventario").addEventListener("click", function () {
        let variable = document.querySelector('.modal-footer #id');
        let valor = variable.value;
        eliminar(valor);
    });

    document.getElementById("actualizarInventario").addEventListener("click", function () {
        let actualizarInventario = {
            id: inventario.id,
            Stock: document.querySelector('.modal-body #stock').value
        };
        actualizar(actualizarInventario);
    });

    const botonGuardar = document.getElementById('guardarInventario');
    const selectElementProducto = document.getElementById('nombre_producto_Inventario');
    const selectElementBodega = document.getElementById('nombre_bodega_Inventario');


    agregarModal.addEventListener('hidden.bs.modal', function () {
        selectElementProducto.innerHTML = '';
        selectElementBodega.innerHTML = '';
    });


    botonGuardar.addEventListener("click", function () {
        let newInventario = {
            //el value del los nombres contienen la id
            Id_producto: document.querySelector('.modal-body #nombre_producto_Inventario').value,
            Id_bodega: document.querySelector('.modal-body #nombre_bodega_Inventario').value,
            Stock: document.querySelector('.modal-body #stock_Inventario').value

        };
        //console.log(newInventario);
        guardar(newInventario);
    });


});