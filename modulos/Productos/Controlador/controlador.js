var productos = [];
const url = 'modulos/Productos/Api/Api-Rest.php';

const llenarTabla = () => {
    document.querySelector('#tablaProductos tbody').innerHTML = '';
    productos.forEach(producto => {
        document.querySelector('#tablaProductos tbody').innerHTML +=
            `<tr>
            <td class='align-middle'>${producto['Nombre_producto']}</td>
            <td class='align-middle'>${producto['Descripcion']}</td>
            <td> 
            <div class='text-center'>
            <div class='btn-group'>
                <button data-bs-toggle='modal' data-bs-target='#Modal_Productos_editar' class='btn btn-primary btnEditar' data-bs-id='${producto['Id_producto']}'>Editar</button>
                <button data-bs-toggle='modal' data-bs-target='#Modal_Productos_eliminar' class='btn btn-danger btnEditar' data-bs-id='${producto['Id_producto']}'>Eliminar</button>
            </div>
            </div>

            </td>
        </tr>`
    });
}

const GetAll = () => {
    axios({
        method: 'GET',
        url: url,
        responseType: 'json'
    }).then(res => {
        this.productos = res.data;
        llenarTabla();
    }).catch(error => {
        console.error(error);
    })
}

const GetId = (id) => {
    axios({
        method: 'GET',
        url: url + `?Id_producto=${id}`,
        responseType: 'json'
    }).then(res => {
        this.productos = res.data;
    }).catch(error => {
        console.error(error);
    })
}

GetAll();

const eliminar = (id) => {
    axios({
        method: 'DELETE',
        url: url + `?Id_producto=${id}`,
        responseType: 'json'
    }).then(res => {
        GetAll();
    }).catch(error => {
        console.error(error);
    })
}

const actualizar = (producto) => {
    axios({
        method: 'PUT',
        url: url + `?Id_producto=${producto['id']}`,
        responseType: 'json',
        data: producto
    }).then(res => {
        GetAll();
    }).catch(error => {
        console.error(error);
    })
}

const guardar = (producto) => {
    axios({
        method: 'POST',
        url: url,
        responseType: 'json',
        data: producto
    }).then(res => {
        GetAll();
    }).catch(error => {
        console.error(error);
    })
}