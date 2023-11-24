-- Crear la base de datos "lubricentro"
drop database if exists lubricentro;
CREATE DATABASE IF NOT EXISTS lubricentro;
USE lubricentro;

-- Estructura de la tabla "categotia"
CREATE TABLE IF NOT EXISTS categoria ( -- Se llamaba categotia y locambie a categoria.
  idCategoria INT AUTO_INCREMENT PRIMARY KEY,
  descripcion VARCHAR(100) NOT NULL
);

-- Estructura de la tabla "marca"
CREATE TABLE IF NOT EXISTS marca (
  idMarca INT AUTO_INCREMENT PRIMARY KEY,
  nombreMarca VARCHAR(75) NOT NULL,
  descripcion VARCHAR(255) NOT NULL
);

-- Estructura de la tabla "producto"
CREATE TABLE IF NOT EXISTS producto (
  idProducto INT AUTO_INCREMENT PRIMARY KEY,
  descripcion VARCHAR(50) NOT NULL,
  idMarca INT,
  Cantidad INT NOT NULL,
  Precio DECIMAL(10, 2) NOT NULL, -- Lo modifique para poder agregar decimales al precio. 
  idCategoria INT NOT NULL,
  imagen VARCHAR(500) NOT NULL,
  informacion VARCHAR(255) NOT NULL,
  activo TINYINT(1) NOT NULL,
  FOREIGN KEY (idCategoria) REFERENCES categoria(idCategoria),
  FOREIGN KEY (idMarca) REFERENCES marca(idMarca)
);

-- Estructura de la tabla "rol"
CREATE TABLE IF NOT EXISTS rol (
  idRol INT AUTO_INCREMENT PRIMARY KEY,
  descripcion VARCHAR(50) NOT NULL
);

-- Estructura de la tabla "usuario"
CREATE TABLE IF NOT EXISTS usuario (
  idUsuario INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  correo VARCHAR(100) NOT NULL,
  contrasenna VARCHAR(100) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  idRol INT NOT NULL,
  FOREIGN KEY (idRol) REFERENCES rol(idRol)
);



-- Insertar datos en la tabla "categoria"
INSERT INTO categoria (descripcion) VALUES
('Aceites'),
('Accesorios'),
('Componentes'),
('Servicios');

-- Insertar datos en la tabla "marca" con marcas inventadas
INSERT INTO marca (nombreMarca, descripcion) VALUES
('AutoMax', 'Marca de accesorios y piezas para automóviles'),
('TechDrive', 'Marca de tecnología y electrónica para vehículos'),
('PowerGrip', 'Marca de neumáticos de alto rendimiento'),
('EcoLube', 'Marca de aceites y lubricantes ecológicos'),
('SpeedRider', 'Marca de motocicletas deportivas'),
('AirFlow', 'Marca de sistemas de aire acondicionado para automóviles'),
('SafeStop', 'Marca de sistemas de frenos avanzados'),
('GlowGear', 'Marca de iluminación LED para automóviles'),
('DriveGuard', 'Marca de sistemas de seguridad para vehículos'),
('MaxTune', 'Marca de herramientas y equipos de mecánica automotriz'),
('ComponentMax', 'Marca de componentes automotrices');



-- Insertar productos en la categoría "Aceites"
INSERT INTO producto (descripcion, idMarca, Cantidad, Precio, idCategoria, imagen, informacion, activo) VALUES
('Aceite Sintético 5W-30', 1, 100, 4000, 1, 'http://localhost/AmbienteWeb_Cliente-Servidor/SC_502%20Proyecto%20Final/SC_502%20Proyecto%20Final/img/aceite3.jpeg', 'Aceite de motor sintético de alto rendimiento', 1),
('Aceite Mineral 10W-40', 2, 80, 4200, 1, 'https://www.puntollantas.com/wp-content/uploads/2023/01/Aceite-Liqui-Moly-4T-10W-40-Min-Scooter.png', 'Aceite de motor mineral para vehículos', 1),
('Aceite para Transmisión Automática', 3, 50, 4800, 1, 'https://cyrex.com.mx/wp-content/uploads/2021/05/ATF-Pennzoil.jpg', 'Aceite de transmisión ATF para automóviles', 1),
('Aceite Sintético 0W-20', 4, 120, 4100, 1, 'https://dlosas.com/wp-content/uploads/2020/10/0w20.png', 'Aceite de motor sintético premium', 1),
('Aceite Mineral 15W-40', 5, 60, 4300, 1, 'https://euroliquidos.com/wp-content/uploads/2018/12/15w40-x-1-Litro-Pagina-web-PNG.png', 'Aceite de motor convencional para camiones', 1),
('Aditivo Mejorador de Aceite', 6, 150, 5100, 1, 'https://euroliquidos.com/wp-content/uploads/2018/12/29449-ATF-Caja-de-6-y-7-Velocidades-Aceite-transmision-automatica-Rojo-PNG-Pagina-Web.png', 'Aditivo para mejorar el rendimiento del aceite', 1),
('Aceite para Dirección Hidráulica', 7, 30, 3800, 1, 'https://refaccionariamario.info/126548/6917.jpg', 'Aceite para sistemas de dirección hidráulica', 1),
('Aceite Sintético 5W-20', 8, 70, 4400, 1, 'https://homolog.ar.moovelub.com/storage/uploads/00000000312.png', 'Aceite de motor sintético de alto rendimiento', 1),
('Aceite de Motor para Camiones', 9, 40, 3100, 1, 'https://ar.moovelub.com/assets/category/trucks/00000000120.png', 'Aceite de motor para camiones pesados', 1),
('Aceite para Motores Diesel', 10, 90, 3200, 1, 'https://repuestos.montacargasderco.com.co/wp-content/uploads/2022/08/photo_5076098371583847344_y.jpg', 'Aceite especial para motores diesel', 1);


-- Insertar productos en la categoría "Accesorios"
INSERT INTO producto (descripcion, idMarca, Cantidad, Precio, idCategoria, imagen, informacion, activo) VALUES
('Llantas Deportivas 17"', 1, 50, 159.99, 2, 'https://http2.mlstatic.com/D_NQ_NP_659211-MCO69565703681_052023-O.webp', 'Llantas de aleación para vehículos deportivos', 1),
('Kit de Luces LED para Automóvil', 2, 100, 30000, 2, 'https://m.media-amazon.com/images/I/71f1PvSiAWL._AC_UF894,1000_QL80_.jpg', 'Kit completo de luces LED para automóviles', 1),
('Barras Portaequipajes Universales', 3, 30, 12000, 2, 'https://http2.mlstatic.com/D_NQ_NP_825056-MCO52145283687_102022-O.webp', 'Barras para transportar equipaje en el techo', 1),
('Funda de Asiento de Cuero Sintético', 4, 80, 13000, 2, 'https://http2.mlstatic.com/D_NQ_NP_826652-MCO46265818594_062021-O.webp', 'Funda de asiento de cuero sintético', 1),
('Alfombrillas de Goma para Automóvil', 5, 70, 14000, 2, 'https://http2.mlstatic.com/D_NQ_NP_620770-MCO54101879863_032023-O.webp', 'Alfombrillas de goma para automóviles', 1),
('Espejos Retrovisores Deportivos', 6, 20, 18000, 2, 'https://http2.mlstatic.com/D_NQ_NP_790157-MCO70909153161_082023-O.webp', 'Espejos retrovisores para vehículos deportivos', 1),
('Cubierta para Volante de Cuero', 7, 40, 11000, 2, 'https://http2.mlstatic.com/D_NQ_NP_609333-MCO27476404333_062018-O.webp', 'Cubierta de volante de cuero', 1),
('Cargador de Teléfono para Coche', 8, 90, 9000, 2, 'https://down-co.img.susercontent.com/file/11f4595bae347c75c5b28467fe38b514_tn', 'Cargador de teléfono USB para automóviles', 1),
('Kit de Herramientas de Emergencia', 9, 10, 13500, 2, 'https://alkilautos.com/blog/wp-content/uploads/2018/04/18.04.24-Kit-de-carretera.jpg', 'Kit de herramientas de emergencia para automóviles', 1),
('Soporte para Teléfono', 10, 60, 7000, 2, 'https://m.media-amazon.com/images/I/71MWr4SFy8L.jpg', 'Soporte ajustable para teléfono en el salpicadero', 1);


-- Insertar productos en la categoría "Componentes"
INSERT INTO producto (descripcion, idMarca, Cantidad, Precio, idCategoria, imagen, informacion, activo) VALUES
('Batería de Arranque 12V', 11, 40, 43000, 3, 'link.jpg', 'Batería de arranque de alto rendimiento', 1),
('Filtro de Aire de Alto Flujo', 11, 60, 13800, 3, 'link.jpg', 'Filtro de aire de alto flujo para rendimiento máximo', 1),
('Pastillas de Freno Premium', 11, 100, 17400, 3, 'link.jpg', 'Pastillas de freno de calidad premium', 1),
('Amortiguadores Deportivos', 11, 30, 56000, 3, 'link.jpg', 'Amortiguadores deportivos de alta calidad', 1),
('Kit de Embrague Reforzado', 11, 20, 87500, 3, 'link.jpg', 'Kit de embrague reforzado para vehículos deportivos', 1),
('Sistema de Escape Deportivo', 11, 15, 98500, 3, 'link.jpg', 'Sistema de escape deportivo de acero inoxidable', 1),
('Radiador de Alto Rendimiento', 11, 25, 71500, 3, 'link.jpg', 'Radiador de alto rendimiento para refrigeración', 1),
('Bombilla LED para Faros', 11, 70, 9000, 3, 'link.jpg', 'Bombilla LED de alta potencia para faros', 1),
('Sistema de Suspensión Ajustable', 11, 10, 185000, 3, 'link.jpg', 'Sistema de suspensión ajustable para tuning', 1),
('Kit de Correa de Distribución', 11, 35, 31000, 3, 'link.jpg', 'Kit de correa de distribución de calidad', 1);



-- Insertar productos en la categoría "Servicios" con idMarca nulo
INSERT INTO producto (descripcion, Cantidad, Precio, idCategoria, imagen, informacion, activo) VALUES
('Cambio de Aceite y Filtro', 0, 34000, 4, 'https://www.fuso.com.pe/blog/wp-content/uploads/2019/11/fuso-cambiar-aceite-motor-a-tiempo.jpg', 'Cambio de aceite y filtro de aceite', 1),
('Revisión de Frenos', 0, 13400, 4, 'https://autosurcsa.com/15-large_default/revision-de-frenos.jpg', 'Revisión y ajuste de sistema de frenos', 1),
('Alineación y Balanceo de Ruedas', 0, 22000, 4, 'https://assets-global.website-files.com/60aea4e5ac6df63edce0b8b4/62041034ca15761bd5570028_Mantenimiento%20automotriz%20Alineacion%20y%20Balanceo%20de%20Llantas%20de%20auto%20v001.jpg', 'Alineación y balanceo de ruedas', 1),
('Cambio de Batería', 0, 19300, 4, 'https://static.retail.autofact.cl/blog/c_url_original.76iu8l2uwi1lv.jpg', 'Cambio de batería de arranque', 1),
('Diagnóstico de Motor', 0, 10800, 4, 'https://www.centrodeserviciosford.com/wp-content/uploads/2017/12/servicios-motor2.jpg', 'Diagnóstico de problemas del motor', 1),
('Lavado y Detallado de Automóvil', 0, 43000, 4, 'https://dercocenter-api.s3.us-east-1.amazonaws.com/images/contents/2021-08-25-car-detailing.jpg', 'Lavado y detallado completo del automóvil', 1),
('Inspección de Emisiones', 0, 24900, 4, 'https://www.applusautomotive.com/dam/jcr:92621bc8-e987-44e5-a8ab-1bcc7091fee3/1340264492667-Automotive_Emission_Car_ES_desktop.jpg', 'Inspección de emisiones de escape', 1),
('Reparación de Sistema de Escape', 0, 33500, 4, 'https://www.autoscout24.es/cms-content-assets/79CnDXu0vxYV8Zx9lcA8FG-45d628feae633e64c0455461c4aaecbf-All_broken_exhaust_pipe_-_and_now-1100.jpg', 'Reparación y reemplazo de componentes del escape', 1),
('Servicio de Cambio de Aceite Rápido', 0, 22500, 4, 'https://srruedas.com/wp-content/uploads/2020/04/Cambio-de-aceite-1-1024x682.png', 'Cambio de aceite rápido sin cita previa', 1),
('Recarga de Aire Acondicionado', 0, 34500, 4, 'https://seviclima.com/wp-content/uploads/2020/07/bomba-vaciado-aire-acondicionado.jpg', 'Recarga y mantenimiento del sistema de aire acondicionado', 1);

SELECT
  p.idProducto,
  p.descripcion AS producto_descripcion,
  m.nombreMarca AS marca_nombre,
  p.Cantidad,
  p.Precio,
  c.descripcion AS categoria_descripcion,
  p.imagen,
  p.informacion,
  p.activo
FROM producto p
JOIN marca m ON p.idMarca = m.idMarca
JOIN categoria c ON p.idCategoria = c.idCategoria;
