-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2023 a las 05:35:50
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

CREATE DATABASE `lubricentro`;
use `lubricentro`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lubricentro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `descripcion`) VALUES
(1, 'Aceites'),
(2, 'Accesorios'),
(3, 'Componentes'),
(4, 'Servicios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idMarca` int(11) NOT NULL,
  `nombreMarca` varchar(75) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idMarca`, `nombreMarca`, `descripcion`) VALUES
(1, 'AutoMax', 'Marca de accesorios y piezas para automóviles'),
(2, 'TechDrive', 'Marca de tecnología y electrónica para vehículos'),
(3, 'PowerGrip', 'Marca de neumáticos de alto rendimiento'),
(4, 'EcoLube', 'Marca de aceites y lubricantes ecológicos'),
(5, 'SpeedRider', 'Marca de motocicletas deportivas'),
(6, 'AirFlow', 'Marca de sistemas de aire acondicionado para automóviles'),
(7, 'SafeStop', 'Marca de sistemas de frenos avanzados'),
(8, 'GlowGear', 'Marca de iluminación LED para automóviles'),
(9, 'DriveGuard', 'Marca de sistemas de seguridad para vehículos'),
(10, 'MaxTune', 'Marca de herramientas y equipos de mecánica automotriz'),
(11, 'ComponentMax', 'Marca de componentes automotrices');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `idMarca` int(11) DEFAULT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `imagen` varchar(500) NOT NULL,
  `informacion` varchar(255) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `descripcion`, `idMarca`, `Cantidad`, `Precio`, `idCategoria`, `imagen`, `informacion`, `activo`) VALUES
(1, 'Aceite Sintético 5W-30', 1, 100, 4000.00, 1, 'https://m.media-amazon.com/images/I/71KiRsx6OxL._AC_UF894,1000_QL80_.jpg', 'Aceite de motor sintético de alto rendimiento', 1),
(2, 'Aceite Mineral 10W-40', 2, 80, 4200.00, 1, 'https://www.puntollantas.com/wp-content/uploads/2023/01/Aceite-Liqui-Moly-4T-10W-40-Min-Scooter.png', 'Aceite de motor mineral para vehículos', 1),
(3, 'Aceite para Transmisión Automática', 3, 50, 4800.00, 1, 'https://cyrex.com.mx/wp-content/uploads/2021/05/ATF-Pennzoil.jpg', 'Aceite de transmisión ATF para automóviles', 1),
(4, 'Aceite Sintético 0W-20', 4, 120, 4100.00, 1, 'https://dlosas.com/wp-content/uploads/2020/10/0w20.png', 'Aceite de motor sintético premium', 1),
(5, 'Aceite Mineral 15W-40', 5, 60, 4300.00, 1, 'https://euroliquidos.com/wp-content/uploads/2018/12/15w40-x-1-Litro-Pagina-web-PNG.png', 'Aceite de motor convencional para camiones', 1),
(6, 'Aditivo Mejorador de Aceite', 6, 150, 5100.00, 1, 'https://euroliquidos.com/wp-content/uploads/2018/12/29449-ATF-Caja-de-6-y-7-Velocidades-Aceite-transmision-automatica-Rojo-PNG-Pagina-Web.png', 'Aditivo para mejorar el rendimiento del aceite', 1),
(7, 'Aceite para Dirección Hidráulica', 7, 30, 3800.00, 1, 'https://refaccionariamario.info/126548/6917.jpg', 'Aceite para sistemas de dirección hidráulica', 1),
(8, 'Aceite Sintético 5W-20', 8, 70, 4400.00, 1, 'https://sv.epaenlinea.com/media/catalog/product/cache/e28d833c75ef32af78ed2f15967ef6e0/2/d/2d200c65-27b4-4c0d-8a10-0adb17851c20.jpg', 'Aceite de motor sintético de alto rendimiento', 1),
(9, 'Aceite de Motor para Camiones', 9, 40, 3100.00, 1, 'https://ar.moovelub.com/assets/category/trucks/00000000120.png', 'Aceite de motor para camiones pesados', 1),
(10, 'Aceite para Motores Diesel', 10, 90, 3200.00, 1, 'https://repuestos.montacargasderco.com.co/wp-content/uploads/2022/08/photo_5076098371583847344_y.jpg', 'Aceite especial para motores diesel', 1),
(11, 'Llantas Deportivas 17\"', 1, 50, 159.99, 2, 'https://http2.mlstatic.com/D_NQ_NP_659211-MCO69565703681_052023-O.webp', 'Llantas de aleación para vehículos deportivos', 1),
(12, 'Kit de Luces LED para Automóvil', 2, 100, 30000.00, 2, 'https://m.media-amazon.com/images/I/71f1PvSiAWL._AC_UF894,1000_QL80_.jpg', 'Kit completo de luces LED para automóviles', 1),
(13, 'Barras Portaequipajes Universales', 3, 30, 12000.00, 2, 'https://http2.mlstatic.com/D_NQ_NP_825056-MCO52145283687_102022-O.webp', 'Barras para transportar equipaje en el techo', 1),
(14, 'Funda de Asiento de Cuero Sintético', 4, 80, 13000.00, 2, 'https://http2.mlstatic.com/D_NQ_NP_826652-MCO46265818594_062021-O.webp', 'Funda de asiento de cuero sintético', 1),
(15, 'Alfombrillas de Goma para Automóvil', 5, 70, 14000.00, 2, 'https://http2.mlstatic.com/D_NQ_NP_620770-MCO54101879863_032023-O.webp', 'Alfombrillas de goma para automóviles', 1),
(16, 'Espejos Retrovisores Deportivos', 6, 20, 18000.00, 2, 'https://http2.mlstatic.com/D_NQ_NP_790157-MCO70909153161_082023-O.webp', 'Espejos retrovisores para vehículos deportivos', 1),
(17, 'Cubierta para Volante de Cuero', 7, 40, 11000.00, 2, 'https://http2.mlstatic.com/D_NQ_NP_609333-MCO27476404333_062018-O.webp', 'Cubierta de volante de cuero', 1),
(18, 'Cargador de Teléfono para Coche', 8, 90, 9000.00, 2, 'https://down-co.img.susercontent.com/file/11f4595bae347c75c5b28467fe38b514_tn', 'Cargador de teléfono USB para automóviles', 1),
(19, 'Kit de Herramientas de Emergencia', 9, 10, 13500.00, 2, 'https://alkilautos.com/blog/wp-content/uploads/2018/04/18.04.24-Kit-de-carretera.jpg', 'Kit de herramientas de emergencia para automóviles', 1),
(20, 'Soporte para Teléfono', 10, 60, 7000.00, 2, 'https://m.media-amazon.com/images/I/71MWr4SFy8L.jpg', 'Soporte ajustable para teléfono en el salpicadero', 1),
(21, 'Batería de Arranque 12V', 11, 40, 43000.00, 3, 'https://walmartcr.vtexassets.com/arquivos/ids/380916/Bateria-LTH-48-91-615-Amp-12V-1-84053.jpg', 'Batería de arranque de alto rendimiento', 1),
(22, 'Filtro de Aire de Alto Flujo', 11, 60, 13800.00, 3, 'https://m.media-amazon.com/images/I/71jrHm5Gp8L._AC_UF894,1000_QL80_.jpg', 'Filtro de aire de alto flujo para rendimiento máximo', 1),
(23, 'Pastillas de Freno Premium', 11, 100, 17400.00, 3, 'https://s.alicdn.com/@sc04/kf/H88104a7ed3b64f5c96abbb6e193fb855F.jpg_720x720q50.jpg', 'Pastillas de freno de calidad premium', 1),
(24, 'Amortiguadores Deportivos', 11, 30, 56000.00, 3, 'https://previews.123rf.com/images/sergiipogotskyi/sergiipogotskyi1508/sergiipogotskyi150800102/43858274-grupo-de-los-deportes-automovil%C3%ADsticos-amortiguadores-con-resortes-rojos-aislados-en-fondo-blanco.jpg', 'Amortiguadores deportivos de alta calidad', 1),
(25, 'Kit de Embrague Reforzado', 11, 20, 87500.00, 3, 'https://montalbanmedia.com/wp-content/uploads/2021/01/ekf1019.jpg', 'Kit de embrague reforzado para vehículos deportivos', 1),
(26, 'Sistema de Escape Deportivo', 11, 15, 98500.00, 3, 'https://m.media-amazon.com/images/I/71kUPu+P5YL._AC_UF894,1000_QL80_.jpg', 'Sistema de escape deportivo de acero inoxidable', 1),
(27, 'Radiador de Alto Rendimiento', 11, 25, 71500.00, 3, 'https://m.media-amazon.com/images/I/61Wfo-ONiGS._AC_UF894,1000_QL80_.jpg', 'Radiador de alto rendimiento para refrigeración', 1),
(28, 'Bombilla LED para Faros', 11, 70, 9000.00, 3, 'https://m.media-amazon.com/images/I/5162vsV5pJL.jpg', 'Bombilla LED de alta potencia para faros', 1),
(29, 'Sistema de Suspensión Ajustable', 11, 10, 185000.00, 3, 'https://m.media-amazon.com/images/I/61eTFsEj+5L.jpg', 'Sistema de suspensión ajustable para tuning', 1),
(30, 'Kit de Correa de Distribución', 11, 35, 31000.00, 3, 'https://noticias.coches.com/wp-content/uploads/2019/03/Correa-de-Distribuci%C3%B3n-2.jpg', 'Kit de correa de distribución de calidad', 1),
(31, 'Cambio de Aceite y Filtro', NULL, 0, 34000.00, 4, 'https://www.fuso.com.pe/blog/wp-content/uploads/2019/11/fuso-cambiar-aceite-motor-a-tiempo.jpg', 'Cambio de aceite y filtro de aceite', 1),
(32, 'Revisión de Frenos', NULL, 0, 13400.00, 4, 'https://autosurcsa.com/15-large_default/revision-de-frenos.jpg', 'Revisión y ajuste de sistema de frenos', 1),
(33, 'Alineación y Balanceo de Ruedas', NULL, 0, 22000.00, 4, 'https://assets-global.website-files.com/60aea4e5ac6df63edce0b8b4/62041034ca15761bd5570028_Mantenimiento%20automotriz%20Alineacion%20y%20Balanceo%20de%20Llantas%20de%20auto%20v001.jpg', 'Alineación y balanceo de ruedas', 1),
(34, 'Cambio de Batería', NULL, 0, 19300.00, 4, 'https://static.retail.autofact.cl/blog/c_url_original.76iu8l2uwi1lv.jpg', 'Cambio de batería de arranque', 1),
(35, 'Diagnóstico de Motor', NULL, 0, 10800.00, 4, 'https://www.centrodeserviciosford.com/wp-content/uploads/2017/12/servicios-motor2.jpg', 'Diagnóstico de problemas del motor', 1),
(36, 'Lavado y Detallado de Automóvil', NULL, 0, 43000.00, 4, 'https://dercocenter-api.s3.us-east-1.amazonaws.com/images/contents/2021-08-25-car-detailing.jpg', 'Lavado y detallado completo del automóvil', 1),
(37, 'Inspección de Emisiones', NULL, 0, 24900.00, 4, 'https://www.applusautomotive.com/dam/jcr:92621bc8-e987-44e5-a8ab-1bcc7091fee3/1340264492667-Automotive_Emission_Car_ES_desktop.jpg', 'Inspección de emisiones de escape', 1),
(38, 'Reparación de Sistema de Escape', NULL, 0, 33500.00, 4, 'https://www.autoscout24.es/cms-content-assets/79CnDXu0vxYV8Zx9lcA8FG-45d628feae633e64c0455461c4aaecbf-All_broken_exhaust_pipe_-_and_now-1100.jpg', 'Reparación y reemplazo de componentes del escape', 1),
(39, 'Servicio de Cambio de Aceite Rápido', NULL, 0, 22500.00, 4, 'https://srruedas.com/wp-content/uploads/2020/04/Cambio-de-aceite-1-1024x682.png', 'Cambio de aceite rápido sin cita previa', 1),
(40, 'Recarga de Aire Acondicionado', NULL, 0, 34500.00, 4, 'https://seviclima.com/wp-content/uploads/2020/07/bomba-vaciado-aire-acondicionado.jpg', 'Recarga y mantenimiento del sistema de aire acondicionado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `rol` (`idRol`, `descripcion`) VALUES
(1, 'usuario'),
(2, 'admin');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasenna` varchar(100) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `idMarca` (`idMarca`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idRol` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`idMarca`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
