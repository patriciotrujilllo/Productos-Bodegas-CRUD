<?php
include_once("../../conexion.php");
class Producto
{
        private $nombre;
        private $descripcion;


        public function __construct($nombre, $descripcion)
        {
                $this->nombre = $nombre;
                $this->descripcion = $descripcion;
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

        /**
         * Get the value of descripcion
         */
        public function getDescripcion()
        {
                return $this->descripcion;
        }

        /**
         * Set the value of descripcion
         *
         * @return  self
         */
        public function setDescripcion($descripcion)
        {
                $this->descripcion = $descripcion;

                return $this;
        }

        //CRUD

        public static function obtenerProductos()
        {
                global $conexion;
                try {
                        $stmt = $conexion->prepare('SELECT * FROM productos'); //Las siglas "stmt" son una abreviatura comúnmente utilizada en PHP para referirse a los objetos de tipo PDOStatement, este tipo de objeto es el que devuelve al hacer la consulta SQL.
                        $stmt->execute();
                        //Aca uso fetchAll que me devuelve todos los datos, pero que a diferencia de fetch(que retorna un solo valor) fetchAll carga todos los valores en memoria, en una gran cantidad de regitros puede ser un problema, en es caso conviene utilizar fetch con un ciclo
                        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        return $productos;
                } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                }
        }


        public static function obtenerProductoId($id)
        {
                global $conexion;
                $stmt = $conexion->prepare('SELECT * FROM productos WHERE Id_producto = :id'); //Las siglas "stmt" son una abreviatura comúnmente utilizada en PHP para referirse a los objetos de tipo PDOStatement, este tipo de objeto es el que devuelve al hacer la consulta SQL.
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                //Aca uso fetchAll que me devuelve todos los datos, pero que a diferencia de fetch(que retorna un solo valor) fetchAll carga todos los valores en memoria, en una gran cantidad de regitros puede ser un problema, en es caso conviene utilizar fetch con un ciclo
                $producto = $stmt->fetch(PDO::FETCH_ASSOC);
                return $producto;
        }


        public function agregarProducto($nombre, $descripcion)
        {
                global $conexion;
                try {

                        $stmt = $conexion->prepare('SELECT * from productos where Nombre_producto= :nombre');
                        $stmt->bindValue(':nombre', $nombre, PDO::PARAM_STR);
                        $stmt->execute();

                        if ($stmt->rowCount() > 0) {
                                echo "<div class='alert alert-danger' role='alert'>
                   producto ya existente!
                   </div>";
                        } else {
                                $stmt = $conexion->prepare('INSERT into productos(Nombre_producto,Descripcion) values(:nombre, :descripcion)');
                                $stmt->bindValue(':nombre', $nombre, PDO::PARAM_STR);
                                $stmt->bindValue(':descripcion', $descripcion, PDO::PARAM_STR);

                                if ($stmt->execute()) {
                                        //header('Location: ../../Index.php'); 
                                }
                        }
                } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                }
        }
        public function actualizarProducto($id, $nombre, $descripcion)
        {
                try {

                        // $id=$_POST['id'];
                        // $Nombre_producto=$_POST['nombre_producto'];
                        // $Descripcion=$_POST['descripcion_producto'];
                        global $conexion;
                        $stmt = $conexion->prepare('UPDATE productos set Nombre_producto = :nombre, Descripcion = :descripcion WHERE Id_producto = :id');
                        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                        $stmt->bindValue(':nombre', $nombre, PDO::PARAM_STR);
                        $stmt->bindValue(':descripcion', $descripcion, PDO::PARAM_STR);
                        $stmt->execute();
                        //  header('Location: ../../Index.php'); 

                } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                }
        }

        public static function eliminarProducto($id)
        {
                global $conexion;
                try {
                        //:id es un marcador de posicion en el cual se le asignara un variable con el metodo bindValue()
                        $stmt = $conexion->prepare('DELETE FROM productos WHERE Id_producto = :id');
                        //No esta la variable $sql por que se agrego directamente la peticion a &stmt
                        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                        $stmt->execute();
                        //header('Location: ../../Index.php'); 
                } catch (PDOException $e) {
                        echo "Error: catch de eliminar" . $e->getMessage();
                }
        }
}
