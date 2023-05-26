<?php
include_once("../../conexion.php");
    class Inventario{

        //CRUD

        public static function obtenerInventario(){
                global $conexion;
                $stmt = $conexion->prepare('SELECT p.Nombre_producto, b.Nombre, i.Stock, i.id FROM productos p INNER JOIN inventario i ON p.Id_producto = i.Id_producto INNER JOIN bodegas b ON b.Id_bodega = i.Id_bodega');
                $stmt->execute();
                $Inventario = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $Inventario;
        }

        public static function obtenerInventarioId($id){
            global $conexion;
            try {
                $stmt = $conexion->prepare('SELECT p.Nombre_producto , p.Id_producto, b.Nombre, b.Id_bodega , i.Stock, i.id FROM productos p INNER JOIN inventario i ON p.Id_producto = i.Id_producto INNER JOIN bodegas b ON b.Id_bodega = i.Id_bodega WHERE i.Id = :id');
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $inventario = $stmt->fetch(PDO::FETCH_ASSOC);
                return $inventario;  
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }


        public function agregarInventario($Id_producto,$Id_bodega,$Stock){
            global $conexion;        

            try{

                $stmt = $conexion->prepare('SELECT * FROM inventario WHERE Id_producto = :id_producto and Id_bodega = :id_bodega');
                $stmt -> bindValue(':id_producto',$Id_producto,PDO::PARAM_INT);
                $stmt -> bindValue(':id_bodega',$Id_bodega,PDO::PARAM_INT);
                $stmt ->execute();
                if($stmt->rowCount() > 0){
                    echo "<div class='alert alert-danger' role='alert'>
                Ocurrio un problema al ingresar los datos!
                </div>";
                }else{
                    $stmt = $conexion->prepare('INSERT into inventario(Id_producto,Id_bodega,Stock) VALUES(:id_producto,:id_bodega,:stock)');
                    $stmt -> bindValue(':id_producto',$Id_producto,PDO::PARAM_INT);
                    $stmt -> bindValue(':id_bodega',$Id_bodega,PDO::PARAM_INT); 
                    $stmt -> bindValue(':stock',$Stock,PDO::PARAM_INT); 
                    if($stmt->execute()){
                    }
                }

            }catch(PDOExeption $e){
                echo "Error: ".$e->getMessage();
            }
        }       
        public function actualizarInventario($id,$Stock){
            global $conexion;  
                try{
                        $stmt = $conexion->prepare('UPDATE inventario set Stock = :stock WHERE id=:id');
                        $stmt -> bindValue(':id',$id,PDO::PARAM_INT);
                        $stmt -> bindValue(':stock',$Stock,PDO::PARAM_INT);
                        $stmt->execute();
                     
                     } catch(PDOException $e){
                        echo "Error: ".$e->getMessage();
                     }
        }
                
        public static function eliminarInventario($id){
                global $conexion;
                try{

                        $stmt = $conexion->prepare('DELETE FROM inventario WHERE id = :id');
                        $stmt -> bindValue(':id',$id,PDO::PARAM_INT);
                        $stmt -> execute();
                  
                     }catch(PDOExeption $e){
                        echo "Error: ".$e->getMessage();
                    }


                
        }
    }

?>