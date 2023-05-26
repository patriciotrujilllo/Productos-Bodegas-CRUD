var inventario = [];
const url = 'modulos/Inventario/Api/Api-Rest.php';

function GetAll() {
    axios({
        method: 'GET',
        url: url,
        responseType: 'json'
    }).then(res => {
        this.inventario = res.data;
        llenarTabla();
    }).catch(error => {
        console.error(error);
    })
}

function GetId(id) {
    axios({
        method: 'GET',
        url: url + `?id=${id}`,
        responseType: 'json'
    }).then(res => {
        this.inventario = res.data;
    }).catch(error => {
        console.error(error);
    })
}

GetAll();

function llenarTabla() {
    document.querySelector('#tablaInventario tbody').innerHTML = '';
    inventario.forEach(inventory => {
        document.querySelector('#tablaInventario tbody').innerHTML +=
            `<tr>
            <td class='align-middle'>${inventory['Nombre_producto']}</td>
            <td class='align-middle'>${inventory['Nombre']}</td>
            <td class='align-middle'>${inventory['Stock']}</td>
            <td> 
            <div class='text-center'>
            <div class='btn-group'>
                <button data-bs-toggle='modal' data-bs-target='#Modal_inventario_editar' class='btn btn-primary btnEditar' data-bs-id='${inventory['id']}'>Editar</button>
                <button data-bs-toggle='modal' data-bs-target='#Modal_inventario_eliminar' class='btn btn-danger btnEditar' data-bs-id='${inventory['id']}'>Eliminar</button>
            </div>
            </div>

            </td>
        </tr>`
    });
}

function eliminar(id) {
    axios({
        method: 'DELETE',
        url: url + `?id=${id}`,
        responseType: 'json'
    }).then(res => {
        GetAll();
    }).catch(error => {
        console.error(error);
    })
}

function actualizar(inventario) {
    axios({
        method: 'PUT',
        url: url + `?id=${inventario['id']}`,
        responseType: 'json',
        data: inventario
    }).then(res => {
        GetAll();
    }).catch(error => {
        console.error(error);
    })
}

function guardar(inventario) {
    axios({
        method: 'POST',
        url: url,
        responseType: 'json',
        data: inventario
    }).then(res => {
        GetAll();
    }).catch(error => {
        console.error(error);
    })
}