<?php

header('Content-Type: application/json');
include_once("class-bodega.php");

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $data = json_decode(file_get_contents('php://input'),true);
        //nota revisar si es necesario enviar las varibles a ambos(constructor y funcion)
        $bodega = new Bodega($data['nombre']);
        if($bodega -> agregarBodega($data['nombre'])){
            http_response_code(201);
            echo json_encode(['mensaje' => 'El bodega se agrego correctamente.']);
            exit;
        }
        
        break;
    case 'GET':
        if(isset($_GET['Id_bodega'])){
            $bodega = Bodega::obtenerBodegaId($_GET['Id_bodega']);
            echo json_encode($bodega);
            exit;
        }
        else{
            $bodegas = Bodega::obtenerBodegas();
            echo json_encode($bodegas);
            exit;
        }
        break;
    case 'PUT':
        $_PUT = json_decode(file_get_contents('php://input'),true);
        $bodega = new Bodega($_PUT['nombre']);
        if($bodega->actualizarBodega($_PUT['id'],$_PUT['nombre'])){
            http_response_code(201);
            echo json_encode(['mensaje' => 'El bodega se actualizo correctamente.']);
            exit;
        }
        break;
    case 'DELETE':
        //$_GET = json_decode(file_get_contents('php://input'),true);
        if(isset($_GET['Id_bodega'])){
            $bodega = Bodega::eliminarBodega($_GET['Id_bodega']);
            echo json_encode($bodega);
            exit;
        }
        else{
            echo json_encode(['mensaje' => 'no se pudo eliminar.']);
        }
        break;
}