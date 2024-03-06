let bodegas = [];
const url = 'modulos/Bodegas/Api/Api-Rest.php';
const tabla = document.querySelector('#tablaBodegas tbody')

const llenarTabla = (bodegas) => {
    bodegas.forEach(bodega => {
        createNodo({ nombreBodega: bodega.Nombre, idBodega: bodega.Id_bodega })
    });
}

const createNodo = ({ nombreBodega, idBodega }) => {

    //Se crea la fila
    const row = document.createElement('tr')
    row.dataset.bodegaId = idBodega

    //Se crea la primera columna, nombre del producto

    const n_Bodega = document.createElement('td')
    n_Bodega.className = 'align-middle'
    n_Bodega.textContent = nombreBodega

    //Columna de las acciones

    const celdaAcciones = document.createElement('td')
    const divbtn = document.createElement('div')
    divbtn.className = 'text-center'

    //Div contenedor de acciones

    const divAcciones = document.createElement('div')
    divAcciones.className = 'btn-group'

    //Boton de editar

    const editButton = document.createElement('button')
    editButton.dataset.bsToggle = 'modal'
    editButton.dataset.bsTarget = '#Modal_Bodegas_editar'
    editButton.className = 'btn btn-primary btnEditar'
    editButton.dataset.bsId = idBodega
    editButton.textContent = 'Editar'

    //Boton eliminar

    const deleteButton = document.createElement('button')
    deleteButton.dataset.bsToggle = 'modal'
    deleteButton.dataset.bsTarget = '#Modal_Bodegas_eliminar'
    deleteButton.className = 'btn btn-danger btnEditar'
    deleteButton.dataset.bsId = idBodega
    deleteButton.textContent = 'Eliminar'


    //eliminar fila


    //se agregan los botones al div contenedor

    divAcciones.appendChild(editButton)
    divAcciones.appendChild(deleteButton)

    //Se agrega el div dentro del otro div y dentro de la celda td

    divbtn.appendChild(divAcciones)
    celdaAcciones.appendChild(divbtn)

    // A la fila td,que es el padre de los elementos, se le agregan sus 3 elemntos hijos

    row.appendChild(n_Bodega)
    row.appendChild(celdaAcciones)

    //Se agrega la fila a la tabla

    tabla.appendChild(row)

}

const GetAll = () => {
    axios({
        method: 'GET',
        url: url,
        responseType: 'json'
    }).then(res => {
        bodegas = res.data
        console.log(bodegas)
        llenarTabla(bodegas)
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
        bodegas = res.data;
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