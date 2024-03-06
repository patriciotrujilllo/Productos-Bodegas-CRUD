<?php
include_once("../../conexion.php");
    class Bodega{
        private $nombre;
        
        public function __construct($nombre){
            $this->nombre = $nombre;
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        

        //CRUD

        public static function obtenerBodegas(){
                global $conexion;
                $stmt = $conexion->prepare('SELECT * FROM bodegas');//Las siglas "stmt" son una abreviatura comúnmente utilizada en PHP para referirse a los objetos de tipo PDOStatement, este tipo de objeto es el que devuelve al hacer la consulta SQL.
                $stmt->execute();
                //Aca uso fetchAll que me devuelve todos los datos, pero que a diferencia de fetch(que retorna un solo valor) fetchAll carga todos los valores en memoria, en una gran cantidad de regitros puede ser un problema, en es caso conviene utilizar fetch con un ciclo
                $bodegas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $bodegas;
        }


        public static function obtenerBodegaId($id){
                global $conexion;
                $stmt = $conexion->prepare('SELECT * FROM bodegas WHERE Id_bodega = :id');//Las siglas "stmt" son una abreviatura comúnmente utilizada en PHP para referirse a los objetos de tipo PDOStatement, este tipo de objeto es el que devuelve al hacer la consulta SQL.
                $stmt -> bindValue(':id',$id,PDO::PARAM_INT);
                $stmt->execute();
                //Aca uso fetchAll que me devuelve todos los datos, pero que a diferencia de fetch(que retorna un solo valor) fetchAll carga todos los valores en memoria, en una gran cantidad de regitros puede ser un problema, en es caso conviene utilizar fetch con un ciclo
                $bodega = $stmt->fetch(PDO::FETCH_ASSOC);
                return $bodega;
        }


        public function agregarBodega($nombre){
                global $conexion;        
        try{

                $stmt = $conexion->prepare('SELECT * from bodegas where Nombre= :nombre');
                $stmt -> bindValue(':nombre',$nombre, PDO::PARAM_STR);
                $stmt -> execute();
            
                if($stmt->rowCount() > 0){
                    echo "<div class='alert alert-danger' role='alert'>
                   bodega ya existente!
                   </div>";
                }else{
                    $stmt = $conexion->prepare('INSERT into bodegas(Nombre) values(:nombre)');
                    $stmt -> bindValue(':nombre',$nombre, PDO::PARAM_STR);
            
                    if($stmt->execute()){
                        //header('Location: ../../Index.php'); 
                    }
                }
            
            
            
               }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
               }
        }       
        public function actualizarBodega($id,$nombre){
                try{

                        global $conexion; 
                        $stmt = $conexion->prepare('UPDATE bodegas set Nombre = :nombre WHERE Id_bodega = :id');
                        $stmt -> bindValue(':id',$id,PDO::PARAM_INT);
                        $stmt -> bindValue(':nombre',$nombre,PDO::PARAM_STR);
                        $stmt->execute();
                     
                     } catch(PDOException $e){
                        echo "Error: ".$e->getMessage();
                     }
        }
                
        public static function eliminarBodega($id){
                global $conexion;
                try {
                //:id es un marcador de posicion en el cual se le asignara un variable con el metodo bindValue()
                $stmt = $conexion->prepare('DELETE FROM bodegas WHERE Id_bodega = :id');
                //No esta la variable $sql por que se agrego directamente la peticion a &stmt
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->rowCount() > 0;
                //header('Location: ../../Index.php'); 
                } catch (PDOException $e) {
                echo "Error: catch de eliminar" . $e->getMessage();
                return false;
                }


                
        }
    }

?>