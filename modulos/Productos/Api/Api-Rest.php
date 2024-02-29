<?php

header('Content-Type: application/json');
include_once("class-producto.php");

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $data = json_decode(file_get_contents('php://input'),true);
        //nota revisar si es necesario enviar las varibles a ambos(constructor y funcion)
        $producto = new Producto($data['nombre'],$data['descripcion']);
        $idProducto = $producto->agregarProducto($data['nombre'], $data['descripcion']);
        if($idProducto > 0){
            http_response_code(201);
            echo json_encode(['id_producto' => $idProducto, 'mensaje' => 'El producto se agregó correctamente.']);
            exit;
        }
        
        break;
    case 'GET':
        if(isset($_GET['Id_producto'])){
            $producto = Producto::obtenerProductoId($_GET['Id_producto']);
            echo json_encode($producto);
            exit;
        }
        else{
            $productos = Producto::obtenerProductos();
            echo json_encode($productos);
            exit;
        }
        break;
    case 'PUT':
        $_PUT = json_decode(file_get_contents('php://input'),true);
        $producto = new Producto($_PUT['nombre'],$_PUT['descripcion']);
        if($producto->actualizarProducto($_PUT['id'],$_PUT['nombre'],$_PUT['descripcion'])){
            http_response_code(201);
            echo json_encode(['mensaje' => 'El producto se actualizo correctamente.']);
            exit;
        }
        break;
    case 'DELETE':
        //$_GET = json_decode(file_get_contents('php://input'),true);
        if(isset($_GET['Id_producto'])){
            $producto = Producto::eliminarProducto($_GET['Id_producto']);
            echo json_encode($producto);
            exit;
        }
        else{
            echo json_encode(['mensaje' => 'no se pudo eliminar.']);
        }
        break;
}