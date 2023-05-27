let productos = [];
let bodegas = [];

function getProductos() {
    axios({
        method: 'GET',
        url: './modulos/Productos/Api/Api-Rest.php',
        responseType: 'json'
    }).then(res => {
        productos = res.data;
        console.log(res.data);
    }).catch(error => {
        console.error(error);
    })

}

function getBodegas() {
    axios({
        method: 'GET',
        url: './modulos/Bodegas/Api/Api-Rest.php',
        responseType: 'json'
    }).then(res => {
        bodegas = res.data;
        console.log(res.data);
    }).catch(error => {
        console.error(error);
    })
}

getBodegas();

getProductos();

document.getElementById("Modal_Inventario").addEventListener("show.bs.modal", function () {
    var modal = document.getElementById('Modal_Inventario'); // ID del modal que contiene el select
    var select = modal.querySelector('#nombre_producto_Inventario'); // Selector del select dentro del modal
    var selectBodegas = modal.querySelector('#nombre_bodega_Inventario');

    productos.forEach(producto => {
        var option = document.createElement('option');
        option.value = producto.Id_producto;
        option.text = producto.Nombre_producto;
        select.appendChild(option);
    });

    bodegas.forEach(bodega => {
        var optionBodegas = document.createElement('option');
        optionBodegas.value = bodega.Id_bodega;
        optionBodegas.text = bodega.Nombre;
        selectBodegas.appendChild(optionBodegas);
    });
});



