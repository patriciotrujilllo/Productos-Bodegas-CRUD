<?php

header('Content-Type: application/json');
include_once("class-inventario.php");

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $data = json_decode(file_get_contents('php://input'),true);
        //nota revisar si es necesario enviar las varibles a ambos(constructor y funcion)
        $inventario = new Inventario();
        if($inventario -> agregarInventario($data['Id_producto'],$data['Id_bodega'],$data['Stock'])){
            http_response_code(201);
            echo json_encode(['mensaje' => 'El inventario se agrego correctamente.']);
            exit;
        }
        
        break;
    case 'GET':

        if(isset($_GET['id'])){
            $inventario = Inventario::obtenerInventarioId($_GET['id']);
            echo json_encode($inventario);
            exit;
        }
        else{
            $inventario = Inventario::obtenerInventario();
            echo json_encode($inventario);
            exit;
        }
        break;

    case 'PUT':
        $_PUT = json_decode(file_get_contents('php://input'),true);
        $inventario = new Inventario();
        if($inventario->actualizarInventario($_PUT['id'],$_PUT['Stock'])){
            http_response_code(201);
            echo json_encode(['mensaje' => 'El inventario se actualizo correctamente.']);
            exit;
        }
        break;
    case 'DELETE':
        //$_GET = json_decode(file_get_contents('php://input'),true);
        if(isset($_GET['id'])){
            $inventario = Inventario::eliminarInventario($_GET['id']);
            echo json_encode($inventario);
            exit;
        }
        else{
            echo json_encode(['mensaje' => 'no se pudo eliminar.']);
        }
        break;
}