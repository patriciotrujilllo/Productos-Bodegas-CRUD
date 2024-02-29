var productos = [];
const url = 'modulos/Productos/Api/Api-Rest.php';

const tabla = document.querySelector('#tablaProductos tbody')
const createNodo = ({ Nombre_producto, Descripcion, Id_producto }) => {
    // const containerTable = document.querySelector('#tablaProductos tbody')

    //Se crea la fila
    const row = document.createElement('tr')
    row.dataset.productId = Id_producto

    //Se crea la primera columna, nombre del producto

    const nombreProducto = document.createElement('td')
    nombreProducto.className = 'align-middle'
    nombreProducto.textContent = Nombre_producto

    //Se crea columna, descriptcio del producto

    const descripcionProducto = document.createElement('td')
    descripcionProducto.className = 'align-middle'
    descripcionProducto.textContent = Descripcion

    //Columna de las acciones

    const accionesCelda = document.createElement('td')
    const accionesDiv = document.createElement('td')
    accionesDiv.className = 'text-center'

    //Div contenedor de acciones

    const btnGroupDiv = document.createElement('div')
    btnGroupDiv.className = 'btn-group'

    //Boton de editar

    const editarButton = document.createElement('button')
    editarButton.className = 'btn btn-primary btnEditar'
    editarButton.dataset.bsToggle = 'modal'
    editarButton.dataset.bsTarget = '#Modal_Productos_editar'
    editarButton.dataset.bsId = Id_producto
    editarButton.textContent = 'Editar'

    //Boton eliminar

    const eliminarButton = document.createElement('button')
    eliminarButton.className = 'btn btn-danger btnEditar'
    eliminarButton.dataset.bsToggle = 'modal'
    eliminarButton.dataset.bsTarget = '#Modal_Productos_eliminar'
    eliminarButton.dataset.bsId = Id_producto
    eliminarButton.textContent = 'Eliminar'

    //eliminar fila
    eliminarButton.addEventListener('click', function () {
        const idProducto = this.dataset.bsId;
        // Configura el modal de eliminación para confirmar antes de eliminar
        document.getElementById('btnEjecutar').addEventListener('click', function () {
            // const row = document.querySelector(`tr[data-product-id="${idProducto}"]`)
            const row = document.querySelector(`#tablaProductos tbody tr[data-product-id="${idProducto}"]`);

            eliminar({ id: idProducto, row })
            // Desvincula el evento para evitar múltiples llamadas si se presiona el botón de eliminar varias veces
            // document.querySelector('btnEjecutar').removeEventListener('click', arguments.callee)
        }, { once: true })
    })

    //Se agregan los hijos a los elementos padres

    //se agregan los botones al div contenedor

    btnGroupDiv.appendChild(editarButton)
    btnGroupDiv.appendChild(eliminarButton)

    //Se agrega el div dentro del otro div y dentro de la celda td

    accionesDiv.appendChild(btnGroupDiv)
    accionesCelda.appendChild(accionesDiv)

    // A la fila td,que es el padre de los elementos, se le agregan sus 3 elemntos hijos

    row.appendChild(nombreProducto)
    row.appendChild(descripcionProducto)
    row.appendChild(accionesCelda)

    //Se agrega la fila a la tabla

    tabla.appendChild(row)


}

const actualizarNodo = ({ Id_producto, Nombre_producto, Descripcion }) => {
    const fila = document.querySelector(`#tablaProductos tbody tr[data-product-id="${Id_producto}"]`)

    const nombreColumna = fila.querySelector('td:nth-child(1)')
    const descripcionColumna = fila.querySelector('td:nth-child(2)')

    nombreColumna.textContent = Nombre_producto
    descripcionColumna.textContent = Descripcion
}

const llenarTabla = () => {
    // document.querySelector('#tablaProductos tbody').innerHTML = '';
    productos.forEach(producto => {
        createNodo(producto)
        // document.querySelector('#tablaProductos tbody').innerHTML +=
        //     `<tr>
        //     <td class='align-middle'>${Nombre_producto}</td>
        //     <td class='align-middle'>${Descripcion}</td>
        //     <td> 
        //     <div class='text-center'>
        //     <div class='btn-group'>
        //         <button data-bs-toggle='modal' data-bs-target='#Modal_Productos_editar' class='btn btn-primary btnEditar' data-bs-id='${Id_producto}'>Editar</button>
        //         <button data-bs-toggle='modal' data-bs-target='#Modal_Productos_eliminar' class='btn btn-danger btnEditar' data-bs-id='${Id_producto}'>Eliminar</button>
        //     </div>
        //     </div>

        //     </td>
        // </tr>`
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

const eliminar = ({ id, row }) => {
    axios({
        method: 'DELETE',
        url: url + `?Id_producto=${id}`,
        responseType: 'json'
    }).then(res => {
        // Elimina la fila de la tabla después de eliminar el producto en la base de datos
        tabla.removeChild(row)
    }).catch(error => {
        console.error(error)
    })
}

const actualizar = (producto) => {
    axios({
        method: 'PUT',
        url: url + `?Id_producto=${producto['id']}`,
        responseType: 'json',
        data: producto
    }).then(res => {
        actualizarNodo({ Id_producto: producto['id'], Nombre_producto: producto.nombre, Descripcion: producto.descripcion })
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
        createNodo({ Nombre_producto: producto.nombre, Descripcion: producto.descripcion, Id_producto: res.data.id_producto })
    }).catch(error => {
        console.error(error);
    })
}