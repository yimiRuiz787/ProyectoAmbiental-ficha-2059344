-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3308
-- Tiempo de generación: 07-12-2020 a las 04:05:04
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `luzdary`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id` int(11) NOT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id`, `id_tipo`, `cantidad`) VALUES
(4, 2, 2000),
(6, 3, 3500),
(7, 1, 1500),
(8, 3, 3600),
(9, 3, 400),
(10, 2, 5000),
(11, 1, 6000),
(12, 2, 8000),
(13, 5, 90000),
(14, 1, 1500),
(15, 1, 5000),
(16, 6, 7000),
(17, 6, 5000);

--
-- Disparadores `datos`
--
DELIMITER $$
CREATE TRIGGER `TRRESTAINVENTARIO` AFTER UPDATE ON `datos` FOR EACH ROW begin 	
	update inventario
	set cantidad = cantidad - new.cantidad
	where id_tipo_material = new.id_tipo;   
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRSUMAINVENTARIO` AFTER UPDATE ON `datos` FOR EACH ROW begin 	
	update inventario
	set cantidad = cantidad + new.cantidad
	where id_tipo_material = new.id_tipo;   
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRSUMAINVENTARIOENTRADA` AFTER UPDATE ON `datos` FOR EACH ROW begin 	
	update inventario
	set cantidad = cantidad + new.cantidad
	where id_tipo_material = new.id_tipo;   
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosentrega`
--

CREATE TABLE `datosentrega` (
  `id` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datosentrega`
--

INSERT INTO `datosentrega` (`id`, `id_tipo`, `cantidad`) VALUES
(2, 3, 2000),
(3, 3, 2000),
(4, 3, 2000),
(5, 3, 1000),
(6, 5, 50000),
(7, 1, 10500);

--
-- Disparadores `datosentrega`
--
DELIMITER $$
CREATE TRIGGER `TRRESTAINVENTARIOENTREGA` AFTER UPDATE ON `datosentrega` FOR EACH ROW begin 	
	update inventario
	set cantidad = cantidad - new.cantidad
	where id_tipo_material = new.id_tipo;   
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_entrada`
--

CREATE TABLE `detalle_entrada` (
  `Id_Detalle_Entrada` int(11) NOT NULL,
  `Id_Entrada` int(11) NOT NULL,
  `Id_Tipo_Material` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_entrada`
--

INSERT INTO `detalle_entrada` (`Id_Detalle_Entrada`, `Id_Entrada`, `Id_Tipo_Material`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 2),
(6, 6, 2),
(7, 9, 2),
(15, 15, 1),
(16, 16, 1),
(17, 17, 1),
(18, 18, 2),
(19, 19, 1),
(20, 20, 2),
(21, 21, 1),
(22, 22, 1),
(23, 23, 1),
(24, 24, 1),
(25, 25, 2),
(26, 26, 1),
(27, 27, 1),
(30, 30, 1),
(31, 39, 2),
(32, 40, 1),
(33, 41, 1),
(34, 42, 1),
(35, 43, 2),
(36, 44, 2),
(37, 45, 1),
(38, 46, 2),
(45, 64, 1),
(46, 65, 2),
(47, 66, 1),
(48, 67, 2),
(49, 68, 2),
(50, 69, 2),
(51, 71, 3),
(52, 72, 1),
(53, 73, 3),
(54, 74, 3),
(55, 75, 2),
(56, 76, 1),
(57, 77, 2),
(58, 78, 5),
(59, 79, 1),
(60, 80, 1),
(61, 81, 6);

--
-- Disparadores `detalle_entrada`
--
DELIMITER $$
CREATE TRIGGER `TRENVIARIDTIPO` AFTER INSERT ON `detalle_entrada` FOR EACH ROW begin 	
	update datos
	set id_tipo = new.id_tipo_material
	where id_tipo is null;   
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_entrega`
--

CREATE TABLE `detalle_entrega` (
  `Id_Detalle_Entrega` int(11) NOT NULL,
  `Id_Tipo_Material` int(11) NOT NULL,
  `Id_Entrega` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_entrega`
--

INSERT INTO `detalle_entrega` (`Id_Detalle_Entrega`, `Id_Tipo_Material`, `Id_Entrega`) VALUES
(1, 1, 1),
(2, 3, 25),
(3, 3, 26),
(4, 3, 27),
(5, 3, 28),
(6, 3, 29),
(7, 5, 30),
(8, 1, 31);

--
-- Disparadores `detalle_entrega`
--
DELIMITER $$
CREATE TRIGGER `TRENVIARIDTIPOENTREGA` AFTER INSERT ON `detalle_entrega` FOR EACH ROW begin 	
	update datosentrega
	set id_tipo = new.id_tipo_material
	where id_tipo = 0;   
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_reciclaje`
--

CREATE TABLE `empresa_reciclaje` (
  `Id_Empresa_Reciclaje` int(11) NOT NULL,
  `Nit_Empresa` int(11) NOT NULL,
  `Nombre_Empresa` varchar(30) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Direccion` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa_reciclaje`
--

INSERT INTO `empresa_reciclaje` (`Id_Empresa_Reciclaje`, `Nit_Empresa`, `Nombre_Empresa`, `Telefono`, `Direccion`) VALUES
(1, 847356, 'EL RETAL', 41219400, 'cra 81f 8a 33'),
(2, 8456522, 'Reciclamos', 123415, 'CRA 202'),
(3, 45448, 'Una gota', 56894712, 'CRA 202 sur a12'),
(4, 595959, 'más reciclaje más vida', 568948, 'CRA 20 sur 45'),
(55, 2147483647, 'WDDDD', 12312312, 'WDSAWD AAAW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `Id_Entrada` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Puntos` int(11) NOT NULL,
  `Peso_Material` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Id_Estado` int(11) NOT NULL,
  `Empleado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`Id_Entrada`, `Fecha`, `Puntos`, `Peso_Material`, `Id_Usuario`, `Id_Estado`, `Empleado`) VALUES
(1, '2020-05-04', 23, 1000, 1, 2, ''),
(2, '2020-09-23', 100, 10, 1, 1, ''),
(3, '2020-09-23', 100, 10, 1, 1, ''),
(4, '2020-09-23', 100, 10, 1, 1, 'Luz'),
(5, '2020-09-23', 200, 2000, 1, 2, 'Luz'),
(6, '2020-09-23', 120, 10, 6, 1, 'Luz'),
(7, '2020-10-04', 100, 10, 6, 1, 'Luz'),
(8, '2020-10-04', 100, 10, 6, 1, ''),
(9, '2020-10-04', 100, 20, 1, 1, ''),
(10, '2020-10-04', 11, 11, 1, 1, 'Luz'),
(11, '2020-10-04', 33, 77, 1, 2, 'Luz'),
(12, '2020-10-04', 44, 44, 1, 1, 'Luz'),
(13, '2020-10-04', 30, 30, 1, 1, 'Luz'),
(14, '2020-10-04', 31, 31, 1, 2, 'Luz'),
(15, '2020-10-06', 101, 101, 1, 1, 'Luz'),
(16, '2020-10-06', 101, 101, 1, 1, 'Luz'),
(17, '2020-10-06', 101, 101, 1, 1, 'Luz'),
(18, '2020-10-06', 3, 3, 6, 1, 'Luz'),
(19, '2020-10-06', 0, 950, 6, 1, 'Luz'),
(20, '2020-10-06', 0, 5500, 6, 1, 'Luz'),
(21, '2020-10-06', 91, 9100, 6, 1, 'Luz'),
(22, '2020-10-06', 89, 8900, 6, 1, 'Luz'),
(23, '2020-10-06', 89, 8900, 6, 1, 'Luz'),
(24, '2020-10-06', 89, 8900, 6, 1, 'Luz'),
(25, '2020-10-06', 89, 8900, 6, 1, 'Luz'),
(26, '2020-10-06', 15, 1500, 1, 1, 'Luz'),
(27, '2020-10-06', 56, 5600, 1, 1, 'Luz'),
(28, '2020-10-08', 60, 6000, 1, 1, 'Luz'),
(29, '2020-10-14', 20, 2000, 1, 1, 'Luz'),
(30, '2020-10-14', 0, 10, 1, 1, 'Luz'),
(39, '2020-10-15', 60, 5952, 1, 1, 'Luz'),
(40, '2020-10-16', 100, 10000, 1, 1, 'Luz'),
(41, '2020-10-16', 0, 10, 1, 1, 'Luz'),
(42, '2020-10-16', 10, 1000, 1, 1, 'Luz'),
(43, '2020-10-16', 15, 1500, 1, 1, 'Luz'),
(44, '2020-10-16', 15, 1500, 1, 1, 'Luz'),
(45, '2020-10-17', 100, 10000, 6, 1, 'Luz'),
(46, '2020-10-20', 55, 5500, 6, 1, 'Luz'),
(47, '2020-10-20', 70, 7000, 1, 1, 'Luz'),
(48, '2020-10-20', 30, 3000, 6, 1, 'Luz'),
(49, '2020-10-21', 15, 1500, 6, 1, 'Luz'),
(50, '2020-10-21', 50, 5000, 1, 1, 'Luz'),
(51, '2020-10-21', 40, 4000, 1, 1, 'Luz'),
(52, '2020-10-21', 20, 2000, 1, 1, 'Luz'),
(53, '2020-10-21', 25, 2500, 1, 1, 'Luz'),
(54, '2020-10-21', 40, 4000, 1, 1, 'Luz'),
(55, '2020-10-21', 50, 5000, 1, 1, 'Luz'),
(56, '2020-10-21', 30, 3000, 1, 1, 'Luz'),
(57, '2020-10-21', 25, 2500, 1, 1, 'Luz'),
(58, '2020-10-21', 20, 2000, 6, 1, 'Luz'),
(59, '2020-10-21', 20, 2000, 6, 1, 'Luz'),
(60, '2020-10-21', 40, 4000, 6, 1, 'Luz'),
(61, '2020-10-21', 40, 4000, 6, 1, 'Luz'),
(62, '2020-10-21', 35, 3500, 1, 1, 'Luz'),
(63, '2020-10-21', 35, 3500, 6, 1, 'Luz'),
(64, '2020-10-21', 35, 3500, 6, 1, 'Luz'),
(65, '2020-10-21', 20, 2000, 6, 1, 'Luz'),
(66, '2020-10-21', 0, 20, 1, 1, 'Luz'),
(67, '2020-10-21', 20, 2000, 1, 1, 'Luz'),
(68, '2020-10-21', 20, 2000, 1, 1, 'Luz'),
(69, '2020-10-21', 20, 2000, 6, 1, 'Luz'),
(71, '2020-10-21', 35, 3500, 1, 1, 'Luz'),
(72, '2020-10-21', 15, 1500, 1, 1, 'Luz'),
(73, '2020-10-21', 36, 3600, 1, 1, 'Luz'),
(74, '2020-10-21', 4, 400, 6, 1, 'Luz'),
(75, '2020-10-22', 50, 5000, 1, 1, 'Luz'),
(76, '2020-10-22', 60, 6000, 1, 1, 'Luz'),
(77, '2020-10-22', 80, 8000, 1, 1, 'Luz'),
(78, '2020-10-22', 900, 90000, 6, 1, 'Luz'),
(79, '2020-10-28', 15, 1500, 1, 1, 'ALEjandro'),
(80, '2020-10-29', 50, 5000, 6, 1, 'Luz'),
(81, '2020-10-29', 70, 7000, 1, 1, 'Luz');

--
-- Disparadores `entrada`
--
DELIMITER $$
CREATE TRIGGER `TRENVIARPESO` AFTER INSERT ON `entrada` FOR EACH ROW begin 
	insert into datos (cantidad)values(new.peso_material);
	   
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRMASPUNTOS` AFTER INSERT ON `entrada` FOR EACH ROW begin 
	update usuario
	set puntos_acumulados = puntos_acumulados + new.puntos
	where id_usuario = new.id_usuario;   
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRUPDATEENTRADA` AFTER UPDATE ON `entrada` FOR EACH ROW begin 
	update usuario
	set puntos_acumulados = puntos_acumulados - old.puntos + new.puntos
	where id_usuario = new.id_usuario;   
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE `entrega` (
  `Id_Entrega` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Total_Material` int(11) NOT NULL,
  `Descripcion_Material` varchar(200) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Id_Estado` int(11) NOT NULL,
  `Empleado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrega`
--

INSERT INTO `entrega` (`Id_Entrega`, `Fecha`, `Total_Material`, `Descripcion_Material`, `Id_Usuario`, `Id_Estado`, `Empleado`) VALUES
(1, '2020-08-12', 4000, 'descripcion', 1, 1, 'Luz'),
(5, '2020-09-16', 3, '3 kilos de papel', 3, 2, 'Luz'),
(15, '2020-09-23', 3, 'sdhgvcahjgvjha', 3, 1, 'Luz'),
(25, '2020-10-21', 2000, 'Una Descripción', 3, 1, 'Luz'),
(26, '2020-10-21', 2000, 'Una Descripción', 3, 1, 'Luz'),
(27, '2020-10-21', 2000, 'Una Descripción', 3, 1, 'Luz'),
(28, '2020-10-21', 2000, 'Una Descripción', 3, 1, 'Luz'),
(29, '2020-10-22', 1000, 'Una Descripción', 3, 1, 'Luz'),
(30, '2020-10-29', 50000, 'Una Descripción', 3, 1, 'Luz'),
(31, '2020-12-04', 10500, '3 KG de carton, 2 kg de papel', 3, 1, 'Luz');

--
-- Disparadores `entrega`
--
DELIMITER $$
CREATE TRIGGER `TRENVIARCANTIDADENTREGA` AFTER INSERT ON `entrega` FOR EACH ROW begin 
	insert into datosentrega (cantidad)values(new.total_material);
	   
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `Id_Estado` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`Id_Estado`, `Nombre`) VALUES
(1, 'Activo'),
(2, 'Inactivo'),
(3, 'En preceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `Id_Inventario` int(11) NOT NULL,
  `Id_Tipo_Material` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`Id_Inventario`, `Id_Tipo_Material`, `Cantidad`) VALUES
(1, 1, 4000),
(2, 2, 8000),
(3, 3, 1000),
(4, 5, 40000),
(5, 6, 12000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `Id_Material` int(11) NOT NULL,
  `Nombre_Material` varchar(30) NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`Id_Material`, `Nombre_Material`, `Descripcion`) VALUES
(1, 'carton', 'descripcion'),
(2, 'Plastico', 'descripcion'),
(3, 'Papel', 'descripcion más amplia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retiro`
--

CREATE TABLE `retiro` (
  `Id_Retiro` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Cantidad_Puntos_de_Retiro` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `retiro`
--

INSERT INTO `retiro` (`Id_Retiro`, `Fecha`, `Cantidad_Puntos_de_Retiro`, `Id_Usuario`) VALUES
(1, '2015-02-15', 2300, 1),
(2, '2020-09-23', 50, 1),
(3, '2020-10-13', 100, 6),
(4, '2020-10-20', 60, 1),
(5, '2020-10-20', 100, 6),
(6, '2020-10-29', 1000, 6),
(7, '2020-12-04', 100, 1);

--
-- Disparadores `retiro`
--
DELIMITER $$
CREATE TRIGGER `TRMENOSPUNTOS` AFTER INSERT ON `retiro` FOR EACH ROW begin 
	update usuario
	set puntos_acumulados = puntos_acumulados - new.cantidad_puntos_de_retiro
	where id_usuario = new.id_usuario;   
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRUPDATERETIRO` AFTER UPDATE ON `retiro` FOR EACH ROW begin 
	update usuario
	set puntos_acumulados = puntos_acumulados + old.cantidad_puntos_de_retiro - new.cantidad_puntos_de_retiro
	where id_usuario = new.id_usuario;   
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `Id_Rol` int(11) NOT NULL,
  `Nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`Id_Rol`, `Nombre`) VALUES
(1, 'Cliente'),
(2, 'Representante'),
(3, 'Gerente'),
(4, 'Cajero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_material`
--

CREATE TABLE `tipo_material` (
  `Id_Tipo` int(11) NOT NULL,
  `Nombre_Tipo_Material` varchar(30) NOT NULL,
  `Puntos` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Id_Material` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_material`
--

INSERT INTO `tipo_material` (`Id_Tipo`, `Nombre_Tipo_Material`, `Puntos`, `Cantidad`, `Id_Material`) VALUES
(1, 'carton', 12, 87, 1),
(2, 'Botella', 100, 1000, 2),
(3, 'Papel periodico', 12, 1000, 3),
(5, 'Empaques', 12, 1400, 2),
(6, 'Cuardenos', 10, 1000, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_Usuario` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Cedula` bigint(20) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Telefono` bigint(11) NOT NULL,
  `Direccion` varchar(40) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `foto_url` varchar(300) DEFAULT NULL,
  `Clave` varchar(30) NOT NULL,
  `Id_Rol` int(11) NOT NULL,
  `Id_Estado` int(11) NOT NULL,
  `Id_Empresa_Reciclaje` int(11) DEFAULT NULL,
  `Puntos_Acumulados` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `Nombre`, `Apellido`, `Cedula`, `Correo`, `Telefono`, `Direccion`, `foto`, `foto_url`, `Clave`, `Id_Rol`, `Id_Estado`, `Id_Empresa_Reciclaje`, `Puntos_Acumulados`) VALUES
(1, 'cristiano', 'ronaldo', 234234, 'cristiano@gmail.com', 34334, 'cra 45', 'imagen2.jpg', 'views/user/Images/imagen2.jpg', '123', 1, 1, NULL, 1855),
(2, 'Luz', 'Florez', 1020258511, 'florezluz@gmail.com', 3045984781, 'Cra 45 #85-6', 'member-02.jpg', 'views/user/Images/member-02.jpg', '123456789', 3, 1, NULL, NULL),
(3, 'Carlos', 'Cuadrado', 1020258511, 'Soycarlos@gmail.com', 3045984781, 'Cra 45 #85-6', 'imagen1.jpg', 'views/user/Images/imagen1.jpg', 'hola123', 2, 1, 2, NULL),
(4, 'jaime', 'angulo', 1020258511, 'lurPe@gmail.com', 4987465, 'CRA 20', 'imagen3.jpg', 'views/user/Images/imagen3.jpg', '13415464', 4, 1, NULL, NULL),
(6, 'Sandra', 'Ramirez', 1020258511, 'sandraR@gmail.com', 4987455, 'CRA 15', 'imagen4.jpg', 'views/user/Images/imagen4.jpg', '123456789', 1, 1, NULL, 1042),
(33, 'juan', 'ortega', 132456789, 'lsdjf97987@gmail.com', 4354354, 'cra 87', 'DSC02024.JPG', 'views/user/Images/DSC02024.JPG', 'asdpdji', 1, 1, NULL, NULL),
(37, 'pedro', 'sanchez', 100213545, 'pedro@gmail.com', 3124899264, 'cra 89 - trans', 'pedro.jpg', 'views/user/Images/pedro.jpg', 'auggjuj', 2, 1, 3, NULL),
(38, 'angel', 'dimaria', 98099795, 'dimaria@gmail.com', 3115775768, 'tranvs 67 - 7a', 'user-1.png', 'views/user/Images/user-1.png', 'tfytcuq', 2, 1, 1, NULL),
(39, 'juan', 'velasquez', 1001345665, 'juan456@gmail.com', 311577598, 'Cra 78 - a5#56', 'member-03.jpg', 'views/user/Images/member-03.jpg', 'nxkwkla', 2, 1, 4, NULL),
(40, 'daniela', 'figueroa', 98798798, 'figueroa@gmail.com', 3124899622, 'cra  8 bis 98', 'member-01.jpg', 'views/user/Images/member-01.jpg', 'rthxvtj', 2, 1, 3, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datosentrega`
--
ALTER TABLE `datosentrega`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_entrada`
--
ALTER TABLE `detalle_entrada`
  ADD PRIMARY KEY (`Id_Detalle_Entrada`),
  ADD KEY `entrada_detalleEntrada_fk` (`Id_Entrada`),
  ADD KEY `tipoMaterial_detalleEntrada_fk` (`Id_Tipo_Material`);

--
-- Indices de la tabla `detalle_entrega`
--
ALTER TABLE `detalle_entrega`
  ADD PRIMARY KEY (`Id_Detalle_Entrega`),
  ADD KEY `DetalleEntrega_TipoMaterial_fk` (`Id_Tipo_Material`),
  ADD KEY `DetalleEntrega_entrega_fk` (`Id_Entrega`);

--
-- Indices de la tabla `empresa_reciclaje`
--
ALTER TABLE `empresa_reciclaje`
  ADD PRIMARY KEY (`Id_Empresa_Reciclaje`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`Id_Entrada`),
  ADD KEY `entrada_usuario_fk` (`Id_Usuario`),
  ADD KEY `entrada_estado_fk` (`Id_Estado`);

--
-- Indices de la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`Id_Entrega`),
  ADD KEY `usuario_entrega_fk` (`Id_Usuario`),
  ADD KEY `estado_entrega_fk` (`Id_Estado`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`Id_Estado`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`Id_Inventario`),
  ADD KEY `Id_Tipo_Material` (`Id_Tipo_Material`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`Id_Material`);

--
-- Indices de la tabla `retiro`
--
ALTER TABLE `retiro`
  ADD PRIMARY KEY (`Id_Retiro`),
  ADD KEY `retiro_usuario_fk` (`Id_Usuario`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`Id_Rol`);

--
-- Indices de la tabla `tipo_material`
--
ALTER TABLE `tipo_material`
  ADD PRIMARY KEY (`Id_Tipo`),
  ADD KEY `tipoMaterial_Material_fk` (`Id_Material`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_Usuario`),
  ADD KEY `usuario_rol_fk` (`Id_Rol`),
  ADD KEY `estado_usuario_fk` (`Id_Estado`),
  ADD KEY `usuario_empresa_fk` (`Id_Empresa_Reciclaje`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `datosentrega`
--
ALTER TABLE `datosentrega`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detalle_entrada`
--
ALTER TABLE `detalle_entrada`
  MODIFY `Id_Detalle_Entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `detalle_entrega`
--
ALTER TABLE `detalle_entrega`
  MODIFY `Id_Detalle_Entrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `empresa_reciclaje`
--
ALTER TABLE `empresa_reciclaje`
  MODIFY `Id_Empresa_Reciclaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `Id_Entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `entrega`
--
ALTER TABLE `entrega`
  MODIFY `Id_Entrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `Id_Estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `Id_Inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `Id_Material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `retiro`
--
ALTER TABLE `retiro`
  MODIFY `Id_Retiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `Id_Rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_material`
--
ALTER TABLE `tipo_material`
  MODIFY `Id_Tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_entrada`
--
ALTER TABLE `detalle_entrada`
  ADD CONSTRAINT `entrada_detalleEntrada_fk` FOREIGN KEY (`Id_Entrada`) REFERENCES `entrada` (`Id_Entrada`),
  ADD CONSTRAINT `tipoMaterial_detalleEntrada_fk` FOREIGN KEY (`Id_Tipo_Material`) REFERENCES `tipo_material` (`Id_Tipo`);

--
-- Filtros para la tabla `detalle_entrega`
--
ALTER TABLE `detalle_entrega`
  ADD CONSTRAINT `DetalleEntrega_TipoMaterial_fk` FOREIGN KEY (`Id_Tipo_Material`) REFERENCES `tipo_material` (`Id_Tipo`),
  ADD CONSTRAINT `DetalleEntrega_entrega_fk` FOREIGN KEY (`Id_Entrega`) REFERENCES `entrega` (`Id_Entrega`);

--
-- Filtros para la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `entrada_estado_fk` FOREIGN KEY (`Id_Estado`) REFERENCES `estado` (`Id_Estado`),
  ADD CONSTRAINT `entrada_usuario_fk` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`);

--
-- Filtros para la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD CONSTRAINT `estado_entrega_fk` FOREIGN KEY (`Id_Estado`) REFERENCES `estado` (`Id_Estado`),
  ADD CONSTRAINT `usuario_entrega_fk` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`Id_Tipo_Material`) REFERENCES `tipo_material` (`Id_Tipo`);

--
-- Filtros para la tabla `retiro`
--
ALTER TABLE `retiro`
  ADD CONSTRAINT `retiro_usuario_fk` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`);

--
-- Filtros para la tabla `tipo_material`
--
ALTER TABLE `tipo_material`
  ADD CONSTRAINT `tipoMaterial_Material_fk` FOREIGN KEY (`Id_Material`) REFERENCES `material` (`Id_Material`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `estado_usuario_fk` FOREIGN KEY (`Id_Estado`) REFERENCES `estado` (`Id_Estado`),
  ADD CONSTRAINT `usuario_empresa_fk` FOREIGN KEY (`Id_Empresa_Reciclaje`) REFERENCES `empresa_reciclaje` (`Id_Empresa_Reciclaje`),
  ADD CONSTRAINT `usuario_rol_fk` FOREIGN KEY (`Id_Rol`) REFERENCES `rol` (`Id_Rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
