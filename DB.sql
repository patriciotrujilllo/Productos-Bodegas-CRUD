CREATE DATABASE crud_bodegas_productos;

USE crud_bodegas_productos;

CREATE TABLE
    productos (
        Id_producto INT PRIMARY KEY AUTO_INCREMENT,
        Nombre_producto VARCHAR(255),
        Descripcion VARCHAR(255)
    );

CREATE TABLE
    bodegas (
        Id_bodega INT PRIMARY KEY AUTO_INCREMENT,
        Nombre VARCHAR(255)
    );

CREATE TABLE
    inventario (
        id INT PRIMARY KEY AUTO_INCREMENT,
        Id_producto INT,
        Id_bodega INT,
        Stock INT,
        FOREIGN KEY (Id_producto) REFERENCES productos(Id_producto),
        FOREIGN KEY (Id_bodega) REFERENCES bodegas(Id_bodega)
    );

INSERT INTO
    productos(Nombre_producto, Descripcion)
VALUES('laptop', 'nitro 5')