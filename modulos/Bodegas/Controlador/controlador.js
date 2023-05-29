var bodegas = [];
const url = 'modulos/Bodegas/Api/Api-Rest.php';

const llenarTabla = () => {
    document.querySelector('#tablaBodegas tbody').innerHTML = '';
    bodegas.forEach(bodega => {
        document.querySelector('#tablaBodegas tbody').innerHTML +=
            `<tr>
            <td class='align-middle'>${bodega['Nombre']}</td>
            <td> 
            <div class='text-center'>
            <div class='btn-group'>
                <button data-bs-toggle='modal' data-bs-target='#Modal_Bodegas_editar' class='btn btn-primary btnEditar' data-bs-id='${bodega['Id_bodega']}'>Editar</button>
                <button data-bs-toggle='modal' data-bs-target='#Modal_Bodegas_eliminar' class='btn btn-danger btnEditar' data-bs-id='${bodega['Id_bodega']}'>Eliminar</button>
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
        this.bodegas = res.data;
        llenarTabla();
    }).catch(error => {
        console.error(error);
    })
}

const GetId = (id) => {
    axios({
        method: 'GET',
        url: url + `?Id_bodega=${id}`,
        responseType: 'json'
    }).then(res => {
        this.bodegas = res.data;
    }).catch(error => {
        console.error(error);
    })
}

GetAll();

const eliminar = (id) => {
    axios({
        method: 'DELETE',
        url: url + `?Id_bodega=${id}`,
        responseType: 'json'
    }).then(res => {
        GetAll();
    }).catch(error => {
        console.error(error);
    })
}

const actualizar = (bodega) => {
    axios({
        method: 'PUT',
        url: url + `?Id_bodega=${bodega['id']}`,
        responseType: 'json',
        data: bodega
    }).then(res => {
        GetAll();
    }).catch(error => {
        console.error(error);
    })
}

const guardar = (bodega) => {
    axios({
        method: 'POST',
        url: url,
        responseType: 'json',
        data: bodega
    }).then(res => {
        GetAll();
    }).catch(error => {
        console.error(error);
    })
}