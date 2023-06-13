CREATE DATABASE IF NOT EXISTS bbddKyaalena;

SHOW DATABASES;

USE bbddKyaalena;

CREATE TABLE IF NOT EXISTS roles (
    id_rol INT UNSIGNED AUTO_INCREMENT,
    nombre VARCHAR(20) UNIQUE NOT NULL,
    descripcion VARCHAR(120),
    PRIMARY KEY (id_rol)
);

CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT UNSIGNED AUTO_INCREMENT,
    nombre VARCHAR(60) NOT NULL,
    apellidos VARCHAR(60) NOT NULL,
    correo VARCHAR(50) UNIQUE NOT NULL,
    telefono INT UNIQUE NOT NULL,  
    direccion VARCHAR(120) NOT NULL,
    numero_calle INT NOT NULL,
    piso VARCHAR(50) NOT NULL,
    codigo_postal INT NOT NULL,
    provincia ENUM("Alava","Albacete","Alicante","Almeria","Asturias","Avila","Badajoz","Barcelona","Burgos","Caceres","Cadiz","Cantabria","Castellon","Ciudad Real","Cordoba","Cuenca","Girona","Granada","Guadalajara","Gipuzkoa","Huelva","Huesca","Islas Baleares","Jaen","La Coruña","La Rioja","Las Palmas"," Leon","Lleida","Lugo","Madrid","Malaga","Murcia","Navarra","Ourense","Palencia","Pontevedra","Salamanca","Santa Cruz de Tenerife","Segovia","Sevilla","Soria","Tarragona","Teruel","Toledo","Valencia","Valladolid","Vizcaya","Zamora","Zaragoza"),
    prefijo ENUM("+34", "+351", "+33", "+39", "+49", "+44", "+58", "+57"),
    emailmarketing Boolean,
    contrasena VARCHAR(20) NOT NULL,
    id_rol INT UNSIGNED NOT NULL, 
    PRIMARY KEY (id_usuario),
    FOREIGN KEY (id_rol) REFERENCES roles (id_rol) ON DELETE NO ACTION  
);

CREATE TABLE IF NOT EXISTS productos (
    id_producto INT UNSIGNED AUTO_INCREMENT,
    nombre varchar(60) NOT NULL,
    precio decimal(5,2) DEFAULT NULL,
    tipo_iva enum('21%','10%','4%') DEFAULT NULL,
    imagen varchar(255) DEFAULT NULL,
    descripcion text DEFAULT NULL,
    talla enum('XS','S','M','L','XL') DEFAULT NULL,
    tipo enum('sueter','camisetas','stocker','botellas') NOT NULL
    PRIMARY KEY (id_producto)
);

CREATE TABLE IF NOT EXISTS testimonios (
    id_testimonio INT UNSIGNED AUTO_INCREMENT,
    likes INT DEFAULT 0,
    comentario VARCHAR(2000) NOT NULL,
    id_usuario INT UNSIGNED NOT NULL, 
    id_producto INT UNSIGNED NOT NULL, 
    PRIMARY KEY (id_testimonio),
    FOREIGN KEY (id_usuario) REFERENCES usuarios (id_usuario) ON DELETE NO ACTION,  
    FOREIGN KEY (id_producto) REFERENCES productos (id_producto) ON DELETE NO ACTION  
);

CREATE TABLE IF NOT EXISTS pedidos (
    id_pedido INT UNSIGNED AUTO_INCREMENT,
    fecha DATE NOT NULL,
    id_usuario INT UNSIGNED NOT NULL, 
    PRIMARY KEY (id_pedido),
    FOREIGN KEY (id_usuario) REFERENCES usuarios (id_usuario) ON DELETE NO ACTION  
);

CREATE TABLE IF NOT EXISTS productos_pedidos (
    id_productos_pedidos INT UNSIGNED AUTO_INCREMENT,
    cantidad INT NOT NULL,
    id_producto INT UNSIGNED NOT NULL, 
    id_pedido INT UNSIGNED NOT NULL, 
    talla enum('XS','S','M','L','XL') DEFAULT NULL,
    PRIMARY KEY (id_productos_pedidos),
    FOREIGN KEY (id_producto) REFERENCES productos (id_producto) ON DELETE NO ACTION,  
    FOREIGN KEY (id_pedido) REFERENCES pedidos (id_pedido) ON DELETE NO ACTION  
);

CREATE TABLE IF NOT EXISTS pagos (
    id_pago INT UNSIGNED AUTO_INCREMENT,
    clave_transaccion varchar(250) NOT NULL,
    PayPal_datos text NOT NULL,
    correo varchar(5000) NOT NULL,
    fecha datetime NOT NULL,
    total decimal(60,0) NOT NULL,
    status varchar(200) NOT NULL,
    PRIMARY KEY (id_pago), 
);

CREATE TABLE IF NOT EXISTS facturas (
    id_factura INT UNSIGNED AUTO_INCREMENT,
    total_factura DECIMAL(5,2),
    IVA_factura DECIMAL(4,2),
    id_pedido INT UNSIGNED NOT NULL, 
    PRIMARY KEY (id_factura),
    FOREIGN KEY (id_pedido) REFERENCES pedidos (id_pedido) ON DELETE NO ACTION  
);

CREATE TABLE IF NOT EXISTS whatsletter (
    id_whatsletter INT UNSIGNED AUTO_INCREMENT,
    nombre_apellido VARCHAR(100) NOT NULL,
    telefono INT UNIQUE NOT NULL,  
    correo VARCHAR(50) NOT NULL,
    motivo VARCHAR(255) NOT NULL,   
    prefijo ENUM("+34", "+351", "+33", "+39", "+49", "+44", "+58", "+57"),
    PRIMARY KEY (id_whatsletter)
);
