-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2021 a las 01:09:08
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sanfranc_matriz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `email`, `password`, `estado`, `perfil`, `fecha`) VALUES
(1, 'Elsa Martinez', 'emartinez@sfd.com.mx', '$2a$07$asxx54ahjppf45sd87a5auKDio1hHSj00ZPCP7SzPVvh4IM9anuUy', 1, 'Administrador', '2021-05-27 19:08:12'),
(2, 'Miguel Gutierrez', 'mgutierrez@sfd.com.mx', '$2a$07$asxx54ahjppf45sd87a5au1u/tTNL865rQzHPO6IutGdzlQCXD/Qa', 1, 'Administrador', '2021-05-27 19:08:21'),
(3, 'Roberto Gutierrez', 'rgutierrez@sfd.com.mx', '$2a$07$asxx54ahjppf45sd87a5au6AyDyEPyXux2BaTKROLibPsCl8aP.8i', 1, 'Administrador', '2021-05-27 19:08:26'),
(4, 'Marco Lopez', 'mlopez@sfd.com.mx', '$2a$07$asxx54ahjppf45sd87a5aueDfkNTK7dgdxkWJ2K5auP79BYNE.00K', 1, 'Administrador', '2021-05-27 19:08:27'),
(5, 'Jonathan Gonzalez', 'jgonzalez@sfd.com.mx', '$2a$07$asxx54ahjppf45sd87a5auCwtoOFPeq0mDVgtHi9xpyYA5L8ngReK', 1, 'Administrador', '2021-05-27 19:08:29'),
(6, 'Ivan Herrera Perez', 'iherrera@sfd.com.mx', '$2a$07$asxx54ahjppf45sd87a5au1t7Qzd6UaVPBWiVkwUSQrBvKaHFwLvq', 1, 'Administrador', '2021-05-27 19:08:31'),
(7, 'Sucursal San Manuel', 'sanmanuel@sfd.com.mx', '$2a$07$asxx54ahjppf45sd87a5auFt0aWUHvsi1hKEUhq6.Olijwj2XpXaC', 1, 'Sucursal', '2021-05-27 19:08:40'),
(8, 'Sucursal Santiago', 'santiago@sfd.com.mx', '$2a$07$asxx54ahjppf45sd87a5auV9JGp36.YjD0UICtpHynzaNCvBcskAq', 1, 'Sucursal', '2021-05-27 19:08:42'),
(9, 'Sucursal Las Torres', 'lastorres@sfd.com.mx', '$2a$07$asxx54ahjppf45sd87a5auRgyfLFU/WWcl9eupcswIhF1AewyAzVS', 1, 'Sucursal', '2021-05-27 19:08:44'),
(10, 'Sucursal Reforma', 'reforma@sfd.com.mx', '$2a$07$asxx54ahjppf45sd87a5au48utYXteRI7vLWLzUiaouqwnssA6Kk2', 1, 'Sucursal', '2021-05-27 19:08:46'),
(11, 'Sucursal Capu', 'capu@sfd.com.mx', '$2a$07$asxx54ahjppf45sd87a5auu4x4ZBwXyqjAAG1BayQNoyUW1CHiU.u', 1, 'Sucursal', '2021-05-27 19:08:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriasmarca`
--

CREATE TABLE `categoriasmarca` (
  `idMarca` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish2_ci NOT NULL,
  `rutaFoto` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categoriasmarca`
--

INSERT INTO `categoriasmarca` (`idMarca`, `nombre`, `rutaFoto`) VALUES
(1, 'SHERWIN', 'img/sherwin-azul.png'),
(2, '3M', 'img/3m.png'),
(3, 'GONI', 'img/goni.jpg'),
(4, 'FANDELI', 'img/fandeli.jpg'),
(5, 'COMPLEMENTOS', 'img/logo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosfacturacion`
--

CREATE TABLE `datosfacturacion` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `rfc` text COLLATE utf8_spanish_ci NOT NULL,
  `razonSocial` text COLLATE utf8_spanish_ci NOT NULL,
  `direccionFiscal` text COLLATE utf8_spanish_ci NOT NULL,
  `codigoPostal` text COLLATE utf8_spanish_ci NOT NULL,
  `correo` text COLLATE utf8_spanish_ci NOT NULL,
  `usoCfdi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `datosfacturacion`
--

INSERT INTO `datosfacturacion` (`id`, `idCliente`, `rfc`, `razonSocial`, `direccionFiscal`, `codigoPostal`, `correo`, `usoCfdi`) VALUES
(1, 2, 'PCP970822467', 'PINTURAS Y COMPLEMENTOS DE PUEBLA, S.A. DE C.V.', 'CALLE LIBERTAD 5973 SAN BALTAZAR CAMPECHE PUEBLA, PUE.', '72550', 'mlopez@sfd.com.mx', 3),
(2, 10, 'PCP970822467', 'PINTURAS Y COMPLEMENTOS DE PUEBLA, S.A. DE C.V.', 'CALLE LIBERTAD 5973 SAN BALTAZAR CAMPECHE PUEBLA, PUE.', '72550', 'aflores@sfd.com.mx', 3),
(3, 24, 'RAEG7106244F6', 'GINA GRISELDA RAMIREZ ESCALONA', 'PROLONGACIÓN PINO No.40 Int. F', '16030', 'compumaqbenja@prodigy.net.mx', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `codigoProducto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precioProducto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `unidadElegida` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`id`, `idProducto`, `idCliente`, `codigoProducto`, `precioProducto`, `unidadElegida`) VALUES
(1, 4, 1, '00543', '51.0000', 'PZ'),
(2, 3, 1, '00539', '36.0000', 'PZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ganadores`
--

CREATE TABLE `ganadores` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `premio` text COLLATE utf8_spanish_ci NOT NULL,
  `idSolicitud` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `masvendido`
--

CREATE TABLE `masvendido` (
  `idMvendido` int(11) NOT NULL,
  `codigoProducto` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `precio` text COLLATE utf8_spanish_ci NOT NULL,
  `descuento` double NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `unidadMedida` text COLLATE utf8_spanish_ci NOT NULL,
  `valorMedida` text COLLATE utf8_spanish_ci NOT NULL,
  `marca` text COLLATE utf8_spanish_ci NOT NULL,
  `favorito` int(11) NOT NULL,
  `buscado` int(11) NOT NULL,
  `habilitado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `masvendido`
--

INSERT INTO `masvendido` (`idMvendido`, `codigoProducto`, `descripcion`, `precio`, `descuento`, `foto`, `unidadMedida`, `valorMedida`, `marca`, `favorito`, `buscado`, `habilitado`) VALUES
(1, '00512', 'DISCO 3M VERDE P80 6pul', '39', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 6, 1),
(2, '00516', 'DISCO 3M VERDE P36 6pul', '51', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 1, 1),
(3, '00539', 'TIRA 3M VERDE P80', '41', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 1, 1),
(4, '00543', 'TIRA 3M VERDE P36', '57', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 1, 1),
(5, '00971', 'DISCO 3M GOLD P600 6pul', '15', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(6, '00973', 'DISCO 3M GOLD P400 6pul', '15', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(7, '00975', 'DISCO 3M GOLD P320 6pul', '15', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(8, '00977', 'DISCO 3M GOLD P240 6pul', '15', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(9, '00978', 'DISCO 3M GOLD P220 6pul', '15', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(10, '00979', 'DISCO 3M GOLD P180 6pul', '15', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(11, '00981', 'DISCO 3M GOLD P120 6pul', '15', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(12, '00983', 'DISCO 3M GOLD P80 6pul', '15', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(13, '01811', 'DISCO 3M MORADO P400 6pul', '23.0000000000001', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(14, '01998', 'LIJA DE AGUA 3M P3000 MEDIA HOJA', '20', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 1, 1),
(15, '02020', 'LIJA DE AGUA 3M P2000 ', '36', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(16, '02021', 'LIJA DE AGUA 3M P1000 MEDIA HOJA', '20', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(17, '02032', 'LIJA DE AGUA 3M P1500', '36', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(18, '02033', 'LIJA DE AGUA 3M P1200', '36', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(19, '02034', 'LIJA DE AGUA 3M P1000', '36', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 1, 1),
(20, '02035', 'LIJA DE AGUA 3M P800 ', '14', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 1, 1),
(21, '02036', 'LIJA DE AGUA 3M P600', '14', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(22, '02038', 'LIJA DE AGUA 3M P400', '14', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(23, '02040', 'LIJA DE AGUA 3M P320', '14', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(24, '02043', 'LIJA DE AGUA 3M P220', '14', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(25, '02045', 'LIJA DE AGUA 3M P2500 MEDIA HOJA', '20', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(26, '02085', 'DISCO 3M TRIZACT P3000 6pul', '121.999999999999', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 1, 1),
(27, '04229/12', '3M CINTA DOBLE CARA 1/2pul', '1405', 0, 'img/logo.png', '66', '66 MT', '3M', 0, 0, 1),
(28, '05703', 'BORLA DE LANA 3M DOBLE CARA 9pul', '824', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(29, '05707', 'ESPONJA P/ ABRILLANTAR 3M GRIS 2 CARAS 9pul (CONEXIÓN RAPIDA)', '1009', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(30, '05708', 'ESPONJA P/ ABRILLANTAR 3M AZUL 2 CARAS 9pul (CONEXIÓN RAPIDA)', '904.999999999999', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(31, '05752', 'ADAPTADOR PARA BORLAS DOBLE CARA 5/8pul (CONEXIÓN RAPIDA)', '986', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(32, '05753', 'BORLA DE LANA 3M DOBLE CARA 9pul (CONEXIÓN RAPIDA)', '1085', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(33, '05971P', '3M COMPUESTO PULIDOR ECONOPACK 225 ML', '162', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 2, 1),
(34, '05973.41', '3M COMPUESTO PULIDOR LT', '821', 0, 'img/logo.png', 'M94', '946 ML', '3M', 0, 2, 1),
(35, '05974.51', '3M COMPUESTO PULIDOR GL', '1578', 0, 'img/logo.png', 'L37', '3.785 LT', '3M', 0, 0, 1),
(36, '05983.51', '3M COMPUESTO PULIDOR EN PASTA GL', '1596.99999999999', 0, 'img/logo.png', 'L37', '3.785 LT', '3M', 0, 1, 1),
(37, '05994P', '3M ABRILLANTADOR ECONOPACK 225 ML', '246', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 2, 1),
(38, '06005.41', '3M CERA LIQUIDA PREMIUM', '382.999999999999', 0, 'img/logo.png', 'M94', '946 ML', '3M', 0, 1, 1),
(39, '06700', '3M PELÍCULA PLÁSTICA AMARILLA 3.65 MT', '754', 0, 'img/logo.png', '121', '121.9 MT', '3M', 0, 2, 1),
(40, '07521', '3M FIBRA MARRON FINA PZ', '1964.000002', 0, 'img/logo.png', 'R60', 'ROLLO 60 PZ', '3M', 0, 0, 1),
(41, '07522', '3M FIBRA GRIS MUY FINA PZ', '1964.000002', 0, 'img/logo.png', 'R60', 'ROLLO 60 PZ', '3M', 0, 0, 1),
(42, '1000.41', 'PLASTE GRIS CLARO LT', '249', 0, 'img/logo.png', 'L1', '1 LT', 'FLEX', 0, 0, 1),
(43, '1000.51', 'PLASTE GRIS CLARO GL', '832', 0, 'img/logo.png', 'L4', '4 LT', 'FLEX', 0, 0, 1),
(44, '1002.41', 'PLASTE VERDE NILO LT', '258', 0, 'img/logo.png', 'L1', '1 LT', 'FLEX', 0, 0, 1),
(45, '1002.51', 'PLASTE VERDE NILO GL', '857', 0, 'img/logo.png', 'L4', '4 LT', 'FLEX', 0, 0, 1),
(46, '110.51', 'AUTOMAGIC PULIMENTO MEDIANO 110', '1601', 0, 'img/logo.png', 'L37', '3.785 LT', 'AUTOMAGIC', 0, 5, 1),
(47, '203/12', '3M MASKING TAPE USO GENERAL 1/2pul', '25', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 5, 1),
(48, '203/18', '3M MASKING TAPE USO GENERAL 3/4pul', '38', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(49, '203/24', '3M MASKING TAPE USO GENERAL 1pul', '50', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(50, '203/48', '3M MASKING TAPE USO GENERAL 2pul', '101', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(51, '2308/3', '3M MASKING TAPE 1/8pul', '23.0000000000001', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(52, '26330', '3M MASKING VERDE 1/4pul', '49', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(53, '26332', '3M MASKING VERDE 1/2pul', '51', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(54, '26333', '3M MASKING VERDE 5/8pul', '52.0000000000001', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(55, '26334', '3M MASKING VERDE 3/4pul', '77', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(56, '30289', 'TIRA 3M TRIZACT P5000', '65', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(57, '30290', 'TIRA 3M TRIZACT P3000', '65', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(58, '306020.41', 'PRIMER PIROXILINA AUTO GRIS CLARO LT', '307', 0, 'img/logo.png', 'L1', '1 LT', 'SW AM', 0, 5, 1),
(59, '30662', 'DISCO 3M TRIZACT P5000', '121.999999999999', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(60, '30703', 'TIRA 3M MORADA P400 ', '30', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(61, '307040.41', 'ETCHING PRIMER LT', '403', 0, 'img/logo.png', 'M94', '946 ML', 'SW AM', 0, 4, 1),
(62, '307040.51', 'ETCHING PRIMER GL', '1515', 0, 'img/logo.png', 'L37', '3.785 LT', 'SW AM', 0, 0, 1),
(63, '307045.41', 'ACTIVADOR PARA ETCHING PRIMER LT', '169', 0, 'img/logo.png', 'L1', '1 LT', 'SW AM', 0, 0, 1),
(64, '307045.51', 'ACTIVADOR PARA ETCHING PRIMER GL', '542.0000008', 0, 'img/logo.png', 'L4', '4 LT', 'SW AM', 0, 0, 1),
(65, '30705', 'TIRA 3M MORADA P320 ', '31', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(66, '307106.41', 'XCLO PRIMER UNIVERSAL ROJO BERMELLÓN LT', '224', 0, 'img/logo.png', 'M94', '946 ML', 'SW AM', 0, 0, 1),
(67, '307107.51', 'XCLO PRIMER UNIVERSAL BLANCO GL', '772', 0, 'img/logo.png', 'L37', '3.785 LT', 'SW AM', 0, 1, 1),
(68, '307107.61', 'XCLO PRIMER UNIVERSAL BLANCO', '3514', 0, 'img/logo.png', 'L89', '18.925 LT', 'SW AM', 0, 0, 1),
(69, '307108.51', 'XCLO PRIMER UNIVERSAL NEGRO GL', '768', 0, 'img/logo.png', 'L37', '3.785 LT', 'SW AM', 0, 0, 1),
(70, '307109.41', 'XCLO PRIMER UNIVERSAL GRIS LT', '224', 0, 'img/logo.png', 'M94', '946 ML', 'SW AM', 0, 0, 1),
(71, '307109.51', 'XCLO PRIMER UNIVERSAL GRIS GL', '768', 0, 'img/logo.png', 'L37', '3.785 LT', 'SW AM', 0, 0, 1),
(72, '307109.61', 'XCLO PRIMER UNIVERSAL GRIS', '3497', 0, 'img/logo.png', 'L89', '18.925 LT', 'SW AM', 0, 0, 1),
(73, '307117.41', 'FX PRIMER UNIVERSAL ROJO BERMELLON LT', '220', 0, 'img/logo.png', 'M94', '946 ML', 'FLEX', 0, 0, 1),
(74, '307118.41', 'FX PRIMER UNIVERSAL BLANCO LT', '220', 0, 'img/logo.png', 'M94', '946 ML', 'FLEX', 0, 0, 1),
(75, '307118.51', 'FX PRIMER UNIVERSAL BLANCO GL', '754', 0, 'img/logo.png', 'L37', '3.785 LT', 'FLEX', 0, 0, 1),
(76, '307119.41', 'FX PRIMER UNIVERSAL NEGRO LT', '220', 0, 'img/logo.png', 'M94', '946 ML', 'FLEX', 0, 0, 1),
(77, '307119.51', 'FX PRIMER UNIVERSAL NEGRO GL', '754', 0, 'img/logo.png', 'L37', '3.785 LT', 'FLEX', 0, 0, 1),
(78, '307120.41', 'FX PRIMER UNIVERSAL GRIS LT', '220', 0, 'img/logo.png', 'M94', '946 ML', 'FLEX', 0, 0, 1),
(79, '307120.51', 'FX PRIMER UNIVERSAL GRIS GL', '754', 0, 'img/logo.png', 'L37', '3.785 LT', 'FLEX', 0, 1, 1),
(80, '307435.51', 'FLEXBASE PRIMER MD GL', '1791', 0, 'img/logo.png', 'L37', '3.785 LT', 'FLEX', 0, 1, 1),
(81, '309080.41', 'ANTICORROSIVO CROMATO DE ZINC LT', '529', 0, 'img/logo.png', 'L1', '1 LT', 'SW AM', 0, 1, 1),
(82, '311020.41', 'PLASTER PIROXILINA AUTO GRIS CLARO LT', '269', 0, 'img/logo.png', 'L1', '1 LT', 'SW AM', 0, 0, 1),
(83, '311020.51', 'PLASTER PIROXILINA AUTO GRIS CLARO GL', '931', 0, 'img/logo.png', 'L4', '4 LT', 'SW AM', 0, 0, 1),
(84, '311020.61', 'PLASTER PIROXILINA AUTO GRIS CLARO', '4138.00000000001', 0, 'img/logo.png', 'L9', '19 LT', 'SW AM', 0, 0, 1),
(85, '311070.41', 'PLASTER PIROXILINA AUTO VERDE LT', '303', 0, 'img/logo.png', 'L1', '1 LT', 'SW AM', 0, 0, 1),
(86, '311070.51', 'PLASTER PIROXILINA AUTO VERDE GL', '1033', 0, 'img/logo.png', 'L4', '4 LT', 'SW AM', 0, 0, 1),
(87, '311070.61', 'PLASTER PIROXILINA AUTO VERDE', '4626', 0, 'img/logo.png', 'L9', '19 LT', 'SW AM', 0, 0, 1),
(88, '31131.51', 'PASTA DE RELLENO 3M PLATINUM SELECT GL', '940', 0, 'img/logo.png', 'L3', '3 LT', '3M', 0, 0, 1),
(89, '31371', 'DISCO 3M MORADO G80 6pul', '26', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(90, '31372', 'DISCO 3M MORADO G120 6pul', '26', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(91, '31374', 'DISCO 3M MORADO G180 6pul', '26', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(92, '31481', 'DISCO 3M MORADO G220 6pul', '26', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(93, '31483', 'DISCO 3M MORADO G320 6pul', '26', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(94, '317', 'SEPARADOR DE ACEITE Y AGUA GONI', '130', 0, 'img/logo.png', 'PZ', 'PZ', 'GONI', 0, 0, 1),
(95, '320349.41', 'SHERPRIMER 2K GRIS CLARO LT', '378', 0, 'img/logo.png', 'M94', '946 ML', 'SW AM', 0, 1, 1),
(96, '320349.51', 'SHERPRIMER 2K GRIS CLARO GL', '1342', 0, 'img/logo.png', 'L37', '3.785 LT', 'SW AM', 0, 0, 1),
(97, '320354.51', 'PRIMER FILL 1 GRIS CLARO GL', '1453', 0, 'img/logo.png', 'L37', '3.785 LT', 'SW AM', 0, 0, 1),
(98, '320947.41', 'FLEX PRIMER DE RELLENO 2K LT', '370', 0, 'img/logo.png', 'M94', '946 ML', 'FLEX', 0, 0, 1),
(99, '320947.51', 'FLEX PRIMER DE RELLENO 2K GL', '1313', 0, 'img/logo.png', 'L37', '3.785 LT', 'FLEX', 0, 0, 1),
(100, '322150.41', 'TRANSPARENTE UAD LT', '362.9999948', 0, 'img/logo.png', 'M94', '946 ML', 'SW AM', 0, 0, 1),
(101, '322150.51', 'TRANSPARENTE UAD GL', '1306.99999999999', 0, 'img/logo.png', 'L37', '3.785 LT', 'SW AM', 0, 0, 1),
(102, '322311.51', 'BP CLEAR TRANSPARENTE GL', '1807.00000000001', 0, 'img/logo.png', 'L37', '3.785 LT', 'SW AM', 0, 0, 1),
(103, '322418', 'KIT LPA TRANSPARENTE UNIFLEX', '364', 0, 'img/logo.png', 'PZ', 'PZ', 'FLEX', 0, 1, 1),
(104, '322423', 'KIT RTS TRANSPARENTE UAD', '371.000000000001', 0, 'img/logo.png', 'PZ', 'PZ', 'SW AM', 0, 0, 1),
(105, '322425', 'KIT RTS TRANSPARENTE RS6010', '519', 0, 'img/logo.png', 'PZ', 'PZ', 'SW AM', 0, 0, 1),
(106, '322428', 'KIT RTS TRANSPARENTE ECO-SW', '179.9999956', 0, 'img/logo.png', 'PZ', 'PZ', 'SW AM', 0, 0, 1),
(107, '322429', 'KIT TRANSPARENTE LPA ECO-FLEX', '179.9999956', 0, 'img/logo.png', 'PZ', 'PZ', 'FLEX', 0, 0, 1),
(108, '322432.61', 'TRANSPARENTE RTS ECO-SW *CATALICE Y APLIQUE', '2743', 0, 'img/logo.png', 'L89', '18.925 LT', 'SW AM', 0, 0, 1),
(109, '329013.41', 'PROMOTOR DE ADHERENCIA PLUS LT', '583', 0, 'img/logo.png', 'L1', '1 LT', 'SW AM', 0, 0, 1),
(110, '331741.51', 'ENDURECEDOR P/TRANSPARENTE ECO SW GL', '788', 0, 'img/logo.png', 'L37', '3.785 LT', 'SW AM', 0, 0, 1),
(111, '331769.21', 'ENDURECEDOR P/SHERPRIMER 237 ML', '146', 0, 'img/logo.png', 'PZ', 'PZ', 'SW AM', 0, 1, 1),
(112, '331769.41', 'ENDURECEDOR P/SHERPRIMER LT', '456', 0, 'img/logo.png', 'M94', '946 ML', 'SW AM', 0, 0, 1),
(113, '331780.21', 'ENDURECEDOR P/FLEXPRIMER PLUS 237 ML', '144', 0, 'img/logo.png', 'PZ', 'PZ', 'FLEX', 0, 0, 1),
(114, '331780.41', 'ENDURECEDOR P/FLEXPRIMER PLUS LT', '447', 0, 'img/logo.png', 'M94', '946 ML', 'FLEX', 0, 0, 1),
(115, '331788.21', 'ENDURECEDOR UNIVERSAL FLEX 237 ML', '193', 0, 'img/logo.png', 'PZ', 'PZ', 'FLEX', 0, 0, 1),
(116, '331788.41', 'ENDURECEDOR UNIVERSAL FLEX LT', '640.000000000001', 0, 'img/logo.png', 'M94', '946 ML', 'FLEX', 0, 0, 1),
(117, '331791.20', 'ENDURECEDOR UNIVERSAL 237 ML', '196', 0, 'img/logo.png', 'PZ', 'PZ', 'SW AM', 0, 0, 1),
(118, '331791.41', 'ENDURECEDOR UNIVERSAL LT', '656', 0, 'img/logo.png', 'L1', '1 LT', 'SW AM', 0, 0, 1),
(119, '331801.41', 'ENDURECEDOR P/TRANSPARENTE BP LT', '705.999999999999', 0, 'img/logo.png', 'M94', '946 ML', 'SW AM', 0, 0, 1),
(120, '33181.51', 'PASTA DE RELLENO 3M QUICK GRIP GL', '725', 0, 'img/logo.png', 'L3', '3 LT', '3M', 0, 0, 1),
(121, '332015.51', 'FX SOLVENTE UNIVERSAL', '443', 0, 'img/logo.png', 'L37', '3.785 LT', 'FLEX', 0, 0, 1),
(122, '332036.51', 'REDUCTOR ACRÍLICO END NORMAL GL', '483', 0, 'img/logo.png', 'L4', '4 LT', 'SW AM', 0, 0, 1),
(123, '332036.61', 'REDUCTOR ACRÍLICO END NORMAL', '2165', 0, 'img/logo.png', 'L9', '19 LT', 'SW AM', 0, 0, 1),
(124, '332080.51', 'THINNER ACRÍLICO GL', '522', 0, 'img/logo.png', 'L4', '4 LT', 'SW AM', 0, 0, 1),
(125, '332083.51', 'THINNER ACRÍLICO ALTO BRILLO GL', '645.999998', 0, 'img/logo.png', 'L4', '4 LT', 'SW AM', 0, 0, 1),
(126, '332115.51', 'REDUCTOR UNIVERSAL TUX 2 GL', '739', 0, 'img/logo.png', 'L37', '3.785 LT', 'SW AM', 0, 0, 1),
(127, '332200.71', 'THINNER AMERICANO LT', '7163', 0, 'img/logo.png', 'TB', '200 LT', 'SW AM', 0, 0, 1),
(128, '332300.51', 'SOLVENTE LIMPIADOR GL', '419', 0, 'img/logo.png', 'L4', '4 LT', 'SW AM', 0, 0, 1),
(129, '332300.61', 'SOLVENTE LIMPIADOR', '1892', 0, 'img/logo.png', 'L9', '19 LT', 'SW AM', 0, 0, 1),
(130, '334010.51', 'CLEANOL (REMOVEDOR DE OXIDO) GL', '498', 0, 'img/logo.png', 'L37', '3.785 LT', 'SW AM', 0, 0, 1),
(131, '334055.41', 'SWA-REMOVEDOR DE PINTURA LT', '156', 0, 'img/logo.png', 'M94', '946 ML', 'SW AM', 0, 0, 1),
(132, '334055.51', 'SWA-REMOVEDOR DE PINTURA GL', '475', 0, 'img/logo.png', 'L37', '3.785 LT', 'SW AM', 0, 0, 1),
(133, '334055.61', 'SWA-REMOVEDOR AMARILLO', '1882', 0, 'img/logo.png', 'L89', '18.925 LT', 'SW AM', 0, 0, 1),
(134, '339700.51', 'PASTA DE RELLENO SW LITE PRO', '348', 0, 'img/logo.png', 'L3', '3 LT', 'SW AM', 0, 1, 1),
(135, '339900.41', 'PASTA DE RELLENO SW BODY FILLER LT', '100.000004', 0, 'img/logo.png', 'M94', '946 ML', 'SW AM', 0, 0, 1),
(136, '339900.51', 'PASTA DE RELLENO SW BODY FILLER GL', '330.0000016', 0, 'img/logo.png', 'L37', '3.785 LT', 'SW AM', 0, 3, 1),
(137, '339905.41', 'PASTA DE RELLENO FX LT', '100.000004', 0, 'img/logo.png', 'M94', '946 ML', 'FLEX', 0, 0, 1),
(138, '339905.51', 'PASTA DE RELLENO FX GL', '330.0000016', 0, 'img/logo.png', 'L37', '3.785 LT', 'FLEX', 0, 0, 1),
(139, '343050', 'COLADOR DE PAPEL', '2.0000024', 0, 'img/logo.png', 'PZ', 'PZ', 'SW PROMOCIONALES', 0, 0, 1),
(140, '343062', 'PALA METÁLICA 4 LT', '26', 0, 'img/logo.png', 'PZ', 'PZ', 'SW PROMOCIONALES', 0, 0, 1),
(141, '343063', 'PALA METÁLICA 19 LT', '116', 0, 'img/logo.png', 'PZ', 'PZ', 'SW PROMOCIONALES', 0, 0, 1),
(142, '343064', 'PALA METÁLICA 1 LT', '22', 0, 'img/logo.png', 'PZ', 'PZ', 'SW PROMOCIONALES', 0, 0, 1),
(143, '34440', 'TIRA 3M MORADA P40', '1124', 0, 'img/logo.png', 'R19', 'ROLLO 19 PZ', '3M', 0, 0, 1),
(144, '34442', 'TIRA 3M MORADA P80', '1124', 0, 'img/logo.png', 'R29', 'ROLLO 29 PZ', '3M', 0, 0, 1),
(145, '34444', 'TIRA 3M MORADA P120', '950', 0, 'img/logo.png', 'R29', 'ROLLO 29 PZ', '3M', 0, 0, 1),
(146, '34446', 'TIRA 3M MORADA P180', '950', 0, 'img/logo.png', 'R29', 'ROLLO 29 PZ', '3M', 0, 0, 1),
(147, '34447', 'TIRA 3M MORADA P220', '950', 0, 'img/logo.png', 'R29', 'ROLLO 29 PZ', '3M', 0, 0, 1),
(148, '356002', 'KIT RTS TRANSPARENTE CC645', '533.0000016', 0, 'img/logo.png', 'PZ', 'PZ', 'SW AM', 0, 1, 1),
(149, '36064.41', 'PERFECT IT 1', '848.00', 0, 'img/logo.png', 'L1', '1 LT', '3M', 0, 0, 1),
(150, '371000', 'MASILLA SW 04 3.4 KG', '753', 0, 'img/logo.png', 'PZ', 'PZ', 'SW AM', 0, 0, 1),
(151, '371001', 'MASILLA SW 04 1.5 KG', '425', 0, 'img/logo.png', 'PZ', 'PZ', 'SW AM', 0, 0, 1),
(152, '38070', 'ARCILLA LIMPIADORA 3M', '853', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(153, '50.51', 'AUTOMAGIC ABRILLANTADOR 50', '1881', 0, 'img/logo.png', 'L37', '3.785 LT', 'AUTOMAGIC', 0, 0, 1),
(154, '5060.41', 'PROMOTOR ADHERENCIA P/PLÁSTICAS', '536', 0, 'img/logo.png', 'L1', '#N/D', 'FLEX', 0, 0, 1),
(155, '51.51', 'AUTOMAGIC LIMPIADOR DE VESTIDURAS 51', '603', 0, 'img/logo.png', 'L37', '3.785 LT', 'AUTOMAGIC', 0, 0, 1),
(156, '73.51', 'AUTOMAGIC CERA BANANA MAGIC 73', '1932', 0, 'img/logo.png', 'L37', '3.785 LT', 'AUTOMAGIC', 0, 0, 1),
(157, '7410.51', 'SOLVENTE ESFUMADOR', '588', 0, 'img/logo.png', 'L4', '4 LT', 'FLEX', 0, 0, 1),
(158, '7490.51', 'DESENGRASANTE KLEEN FLEX', '496', 0, 'img/logo.png', 'L4', '4 LT', 'FLEX', 0, 0, 1),
(159, '75130', 'ROLLO DE LIMPIEZA AZUL', '60.0000024', 0, 'img/logo.png', 'PZ', 'PZ', 'JARCIERIA', 0, 0, 1),
(160, '87.51', 'AUTOMAGIC PULIMENTO EXTRA FUERTE 87', '2892', 0, 'img/logo.png', 'L37', '3.785 LT', 'AUTOMAGIC', 0, 0, 1),
(161, 'AC0003', 'TECPRO SEAL 943 ML', '86', 0, 'img/logo.png', 'M94', '946 ML', 'MEGUIARS', 0, 0, 1),
(162, 'B823', 'TRAPO BARNIZ 3M AZUL', '31', 0, 'img/logo.png', 'PZ', 'PZ', '3M', 0, 0, 1),
(163, 'BS1000N', 'BODY SEAL LT', '130', 0, 'img/logo.png', 'M94', '946 ML', 'MEGUIARS', 0, 0, 1),
(164, 'COVER', 'COVERCRYL ANTICORROSIVO BASE AGUA LT', '255.000000000001', 0, 'img/logo.png', 'L1', '1 LT', '3M', 0, 0, 1),
(165, 'CUACD1013', 'CUÑA DE ACERO DOBLE 10X13', '5', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(166, 'CUACG1007', 'CUÑA DE ACERO GRANDE 7X10', '3', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(167, 'CUACM0510', 'CUÑA DE ACERO MEDIANA 5X10', '3', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(168, 'CUACM1013', 'CUÑA DE ACERO DOBLE CON MANGO 10X13', '8', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(169, 'CUHUVDE', 'CUÑA DE HULE', '5', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(170, 'FAA0080', 'LIJA DE AGUA FANDELI G80', '13', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(171, 'FAA0100', 'LIJA DE AGUA FANDELI G100', '12', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(172, 'FAA0120', 'LIJA DE AGUA FANDELI G120', '11.0000016', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(173, 'FAA0150', 'LIJA DE AGUA FANDELI G150', '9.99999999999999', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(174, 'FAA0180', 'LIJA DE AGUA FANDELI G180', '9.99999999999999', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(175, 'FAA0220', 'LIJA DE AGUA FANDELI G220', '10.0000004', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(176, 'FAA0240', 'LIJA DE AGUA FANDELI G240', '9.99999999999999', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(177, 'FAA0280', 'LIJA DE AGUA FANDELI G280', '9.99999999999999', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(178, 'FAA0320', 'LIJA DE AGUA FANDELI G320', '10.0000004', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(179, 'FAA0360', 'LIJA DE AGUA FANDELI G360', '9.99999999999999', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(180, 'FAA0400', 'LIJA DE AGUA FANDELI G400', '10.0000004', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(181, 'FAA0600', 'LIJA DE AGUA FANDELI G600', '9.99999999999999', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(182, 'FAA1000', 'LIJA DE AGUA FANDELI G1000', '19', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(183, 'FAA1500', 'LIJA DE AGUA FANDELI G1500', '19', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(184, 'FAE1', 'LIJA ESMERIL FANDELI FINO G120', '14', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(185, 'FAOX036', 'LIJA PARA PASTA FANDELI G36', '26.9999976', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(186, 'FAOX050', 'LIJA PARA PASTA FANDELI G50', '23.0000044', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(187, 'FAOX060', 'LIJA PARA PASTA FANDELI G60', '22', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(188, 'FAOX080', 'LIJA PARA PASTA FANDELI G80', '20.0000008', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(189, 'FAOX100', 'LIJA PARA PASTA FANDELI G100', '17.9999999999999', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(190, 'FAOX120', 'LIJA PARA PASTA FANDELI G120', '17.9999999999999', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(191, 'FAOX180', 'LIJA PARA PASTA FANDELI G180', '17.9999999999999', 0, 'img/logo.png', 'PZ', 'PZ', 'FERREBASTONES', 0, 0, 1),
(192, 'FIBVIDR1000', 'FIBRA DE VIDRIO 1 KG', '114', 0, 'img/logo.png', 'PZ', 'PZ', 'JARCIERIA', 0, 0, 1),
(193, 'G7014', 'CERA EN PASTA GOLD CLASS', '836', 0, 'img/logo.png', 'PZ', 'PZ', 'MEGUIARS', 0, 0, 1),
(194, 'K-2000', 'CATALIZADOR PARA FIBRA DE VIDRIO', '19', 0, 'img/logo.png', 'PZ', 'PZ', 'JARCIERIA', 0, 0, 1),
(195, 'KIT-DKG1', 'TRANSPARENTE DEKKERGLOSS 1LT', '256.9999952', 0, 'img/logo.png', 'PZ', 'PZ', 'PAQUETES', 0, 0, 1),
(196, 'KIT-DKG4', 'TRANSPARENTE DEKKERGLOSS 4LT', '856.999996', 0, 'img/logo.png', 'PZ', 'PZ', 'PAQUETES', 0, 0, 1),
(197, 'KITPULDK1000', 'PULIDEKKER (PULIMENTO MEDIANO) 1 LT', '340.9999916', 0, 'img/logo.png', 'PZ', 'PZ', 'PAQUETES', 0, 0, 1),
(198, 'KITPULDK250', 'PULIDEKKER (PULIMENTO MEDIANO) 1/4 LT', '107.9999904', 0, 'img/logo.png', 'PZ', 'PZ', 'PAQUETES', 0, 0, 1),
(199, 'KITPULDK500', 'PULIDEKKER (PULIMENTO MEDIANO) 1/2 LT', '184.99999', 0, 'img/logo.png', 'PZ', 'PZ', 'PAQUETES', 0, 0, 1),
(200, 'ORIENTE 2', 'ESTOPA BOLSA', '19', 0, 'img/logo.png', 'PZ', 'PZ', 'COMPLEMENTOS', 0, 0, 1),
(201, 'RES003K', 'RESINA PARA FIBRA DE VIDRIO', '152', 0, 'img/logo.png', 'PZ', 'PZ', 'JARCIERIA', 0, 0, 1),
(202, 'SOLVSAR30.71', 'THINNER ESTANDAR LT', '4000.00000000001', 0, 'img/logo.png', 'TB', '200 LT', 'COMPLEMENTOS', 0, 0, 1),
(203, '977KIT', 'Kit de compresor 977, pistola 33010 y manguera 175', '4907.00', 0, 'img/logo.png', 'PZ', 'PZ', 'GONI', 0, 1, 0),
(204, '33010', 'Pistola de gravedad MULTIPROYECTOS con vaso de 600ml y boquilla de 1.5mm', '370', 0, 'img/logo.png', 'PZ', 'PZ', 'GONI', 0, 1, 1),
(205, '33012', 'Pistola de grav hibrida p/altos solidos', '484', 0, 'img/logo.png', 'PZ', 'PZ', 'GONI', 0, 0, 1),
(206, '10020X', 'COMPRESOR SILENCIOSO 2HP 10 GAL L/A VERT', '8362.00', 0, 'img/logo.png', 'PZ', 'PZ', 'GONI', 0, 0, 0),
(207, '15020X', 'COMPRESOR SILENCIOSO 2HP 15 GAL L/A', '7704.00', 0, 'img/logo.png', 'PZ', 'PZ', 'GONI', 0, 0, 0),
(208, '81009', 'BOMBA JET HIERRO FUNDIDO .5HP', '1004.00', 0, 'img/logo.png', 'PZ', 'PZ', 'GONI', 0, 0, 0),
(209, '91001', 'COMPRESOR DE 2.5 H.P. CON TANQUE GEMELO TANQUE 16LTS', '3099.00', 0, 'img/logo.png', 'PZ', 'PZ', 'GONI', 0, 0, 0),
(210, 'COS1914', 'COSMO 700 ROJO', '1772', 0, 'img/logo.png', 'L9', '19 LT', 'ZAAK', 0, 1, 1),
(211, 'COS1909', 'COSMO 700 TURQUESA', '1546.00000000001', 0, 'img/logo.png', 'L9', '19 LT', 'ZAAK', 0, 0, 1),
(212, 'COS1918', 'COSMO 700 VIOLETA', '1772', 0, 'img/logo.png', 'L9', '19 LT', 'ZAAK', 0, 0, 1),
(213, 'COS1900', 'COSMO 700 BLANCO', '1546.00000000001', 0, 'img/logo.png', 'L9', '19 LT', 'ZAAK', 0, 0, 1),
(214, 'COS1925', 'COSMO 700 NEGRO', '1546.00000000001', 0, 'img/logo.png', 'L9', '19 LT', 'ZAAK', 0, 0, 1),
(215, 'COS1917', 'COSMO 700 OXIDO', '1772', 0, 'img/logo.png', 'L9', '19 LT', 'ZAAK', 0, 0, 1),
(216, 'APE1921', 'APEX 1000 AZUL REY', '2903', 0, 'img/logo.png', 'L9', '19 LT', 'ZAAK', 0, 0, 1),
(217, 'APE1900', 'APEX 1000 BLANCO', '2737', 0, 'img/logo.png', 'L9', '19 LT', 'ZAAK', 0, 0, 1),
(218, 'IMP19300F', 'ZAAK IMPER 3+1 FIBRA BCO', '1194', 0, 'img/logo.png', 'L9', '19 LT', 'ZAAK', 0, 0, 1),
(219, 'IMP19300FR', 'ZAAK IMPER 3+1 FIBRA OXIDO', '1194', 0, 'img/logo.png', 'L9', '19 LT', 'ZAAK', 0, 1, 1),
(220, 'IMP19500', 'ZAAK IMPER 5 BLANCO', '1442', 0, 'img/logo.png', 'L9', '19 LT', 'ZAAK', 0, 0, 1),
(221, 'IMP19500R', 'ZAAK IMPER 5 OXIDO', '1442', 0, 'img/logo.png', 'L9', '19 LT', 'ZAAK', 0, 0, 1),
(222, 'IMP19600FR', 'ZAAK IMPER 6 FIBRA ROJO', '1560', 0, 'img/logo.png', 'L9', '19 LT', 'ZAAK', 0, 0, 1),
(223, 'IMP19700G', 'ZAAK IMPER GREEN 7 BCO', '2047', 0, 'img/logo.png', 'L9', '19 LT', 'ZAAK', 0, 0, 1),
(224, 'IMP19700RG', 'ZAAK IMPER GREEN 7 OXIDO', '2047', 0, 'img/logo.png', 'L9', '19 LT', 'ZAAK', 0, 0, 1),
(225, 'IMP19800FR', 'ZAAK IMPER 8 ROJO OXIDO FIBRATADO', '2125', 0, 'img/logo.png', 'L9', '19 LT', 'ZAAK', 0, 0, 1),
(226, 'IMP19S', 'ZAAK IMPER SELLO', '961', 0, 'img/logo.png', 'L9', '19 LT', 'ZAAK', 0, 0, 1),
(227, 'COSP1900', 'COSMO PLUS BLANCO', '2106', 0, 'img/logo.png', 'L9', '19 LT', 'ZAAK', 0, 0, 1),
(228, 'COSP1922', 'COSMO PLUS NARANJA', '2106', 0, 'img/logo.png', 'L9', '19 LT', 'ZAAK', 0, 0, 1),
(229, 'COSP1914', 'COSMO PLUS ROJO', '2106', 0, 'img/logo.png', 'L9', '19 LT', 'ZAAK', 0, 0, 1),
(230, 'COSP1900S', 'COSMO PLUS SATíN BLANCO', '2106', 0, 'img/logo.png', 'L9', '19 LT', 'ZAAK', 0, 0, 1),
(231, '322311.51', 'BP CLEAR TRANSPARENTE', '1807.00000000001', 0, 'img/logo.png', 'L37', '3.785 LT', 'SW AM', 0, 0, 1),
(232, 'KIT UAD.51', 'KIT TRANSPARENTE UAD GL', '1820.0000032', 0, 'img/logo.png', 'PZ', 'PZ', 'SW AM', 0, 0, 1),
(233, 'KIT UAD.41', 'KIT TRANSPARENTE UAD LT', '524.0000024', 0, 'img/logo.png', 'PZ', 'PZ', 'SW AM', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacionesapp`
--

CREATE TABLE `notificacionesapp` (
  `id` int(11) NOT NULL,
  `sanManuel` int(11) NOT NULL,
  `capu` int(11) NOT NULL,
  `reforma` int(11) NOT NULL,
  `santiago` int(11) NOT NULL,
  `lasTorres` int(11) NOT NULL,
  `concluidas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `notificacionesapp`
--

INSERT INTO `notificacionesapp` (`id`, `sanManuel`, `capu`, `reforma`, `santiago`, `lasTorres`, `concluidas`) VALUES
(1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoscatalogo`
--

CREATE TABLE `productoscatalogo` (
  `id` int(11) NOT NULL,
  `codigo` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cubeta` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `galon` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `litro` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `medio` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cuart` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `octav` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `unidadMedida` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `valorMedida` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `gramaje` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `idSubcategoriaDesglose` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productoscatalogo`
--

INSERT INTO `productoscatalogo` (`id`, `codigo`, `descripcion`, `cubeta`, `galon`, `litro`, `medio`, `cuart`, `octav`, `unidadMedida`, `valorMedida`, `gramaje`, `nombre`, `idSubcategoriaDesglose`) VALUES
(1, '321000', 'ALUMINIO ARMADORA EXTRA GRUESO', '5593.83\r\n', '1173\r\n', '340.9\r\n', '187.49\r\n', '112.5\r\n', '101.25\r\n', 'L37', '3.785', 'LT', '3.785 LT', 1),
(2, '321020', 'ALUMINIO FINO', '4659.14', '977.00', '283.94', '156.17', '93.7', '84.33', 'L37', '3.785', 'LT', '3.785 LT', 1),
(3, '321021', 'ALUMINIO FINO BRILLANTE', '5126.49', '1075.00', '312.42', '171.83', '103.1', '92.79', 'L37', '3.785', 'LT', '3.785 LT', 1),
(4, '321030', 'ALUMINIO GRUESO', '5126.49', '1075.00', '312.42', '171.83', '103.1', '92.79', 'L37', '3.785', 'LT', '3.785 LT', 1),
(5, '321032', 'ALUMINIO GRUESO DESTELLANTE', '7124.62', '1494.00', '434.19', '238.8', '143.28', '128.95', 'L37', '3.785', 'LT', '3.785 LT', 1),
(6, '321040', 'ALUMINIO MEDIANO', '4202.00', '921.00', '267.66', '147.21', '88.33', '79.5', 'L37', '3.785', 'LT', '3.785 LT', 1),
(7, '321041', 'ALUMINIO MEDIANO BRILLANTE', '6061.18', '1271.00', '369.38', '203.16', '121.9', '109.71', 'L37', '3.785', 'LT', '3.785 LT', 1),
(8, '321042', 'ALUMINIO MEDIANO DESTELLANTE', '7391.68', '1550.00', '450.46', '247.75', '148.65', '133.79', 'L37', '3.785', 'LT', '3.785 LT', 1),
(9, '321050', 'AMARILLO CROMO', '6027.79', '1264.00', '367.34', '202.04', '121.22', '109.1', 'L37', '3.785', 'LT', '3.785 LT', 1),
(10, '321060', 'AMARILLO LIMÓN', '5962.00', '1334.00', '387.69', '213.23', '127.94', '115.14', 'L37', '3.785', 'LT', '3.785 LT', 1),
(11, '321070', 'AMARILLO ORGÁNICO', '6309.15', '1323.00', '384.49', '211.47', '126.88', '114.19', 'L37', '3.785', 'LT', '3.785 LT', 1),
(12, '321080', 'AMARILLO OXIDO', '3610.00', '806.00', '234.24', '128.83', '77.3', '69.57', 'L37', '3.785', 'LT', '3.785 LT', 1),
(13, '321111', 'AZUL MONASTRAL', '6437.91', '1350.00', '392.34', '215.79', '129.47', '116.52', 'L37', '3.785', 'LT', '3.785 LT', 1),
(14, '321090', 'AZUL NO BRONCE', '5074.03', '1064.00', '309.22', '170.07', '102.04', '91.84', 'L37', '3.785', 'LT', '3.785 LT', 1),
(15, '321100', 'AZUL ORGÁNICO ROJIZO', '5722.59', '1200.00', '348.75', '191.81', '115.09', '103.58', 'L37', '3.785', 'LT', '3.785 LT', 1),
(16, '321110', 'AZUL ORGÁNICO VERDOSO', '5684.44', '1192.00', '346.42', '190.53', '114.32', '102.89', 'L37', '3.785', 'LT', '3.785 LT', 1),
(17, '321101', 'AZUL ULTRA', '5684.44', '1192.00', '346.42', '190.53', '114.32', '102.89', 'L37', '3.785', 'LT', '3.785 LT', 1),
(18, '321120', 'BLANCO ACABADOS', '4882.00', '1067.00', '310.09', '170.55', '102.33', '92.1', 'L37', '3.785', 'LT', '3.785 LT', 1),
(19, '321130', 'BLANCO MEZCLAS', '4882.00', '1067.00', '310.09', '170.55', '102.33', '92.1', 'L37', '3.785', 'LT', '3.785 LT', 1),
(20, '321320', 'BLANCO TORNASOL', '22784.79', '5049.26', '1257.00', '691.35', '414.81', '373.33', 'M94', '946', 'ML', '946 ML', 1),
(21, '321140', 'CAFÉ ORGÁNICO AMARILLENTO', '5560.45', '1166.00', '338.86', '186.38', '111.83', '100.64', 'L37', '3.785', 'LT', '3.785 LT', 1),
(22, '321150', 'CAFÉ ORGÁNICO ROJIZO', '5784.58', '1213.00', '352.52', '193.89', '116.33', '104.7', 'L37', '3.785', 'LT', '3.785 LT', 1),
(23, '325310', 'FLATTEN G', '9498.19', '2104.86', '524.00', '288.2', '172.92', '155.63', 'M94', '946', 'ML', '946 ML', 1),
(24, '321160', 'MARRÓN ALIZARINE', '7692.11', '1613.00', '468.77', '257.82', '154.69', '139.23', 'L37', '3.785', 'LT', '3.785 LT', 1),
(25, '321290', 'MARRÓN CLARO', '6294.85', '1320.00', '383.62', '210.99', '126.59', '113.94', 'L37', '3.785', 'LT', '3.785 LT', 1),
(26, '321161', 'MARRÓN MAGENTA', '7262.92', '1523.00', '442.62', '243.44', '146.06', '131.46', 'L37', '3.785', 'LT', '3.785 LT', 1),
(27, '321170', 'MARRÓN ROYAL', '11087.52', '2325.00', '675.69', '371.63', '222.98', '200.68', 'L37', '3.785', 'LT', '3.785 LT', 1),
(28, '321171', 'MARRÓN ROYAL MORADO', '11087.52', '2325.00', '675.69', '371.63', '222.98', '200.68', 'L37', '3.785', 'LT', '3.785 LT', 1),
(29, '321190', 'NARANJA ROJIZO', '6757.42', '1417.00', '411.81', '226.5', '135.9', '122.31', 'L37', '3.785', 'LT', '3.785 LT', 1),
(30, '321200', 'NEGRO INTENSO', '4867.00', '1064.00', '309.22', '170.07', '102.04', '91.84', 'L37', '3.785', 'LT', '3.785 LT', 1),
(31, '325200', 'PALIO ORO', '10875.79', '2410.15', '600.00', '330.00', '198.00', '178.2', 'M94', '946', 'ML', '946 ML', 1),
(32, '321212', 'ROJO BRILLANTE', '10553.41', '2213.00', '643.14', '353.73', '212.24', '191.01', 'L37', '3.785', 'LT', '3.785 LT', 1),
(33, '321211', 'ROJO CANDENTE', '10224.36', '2144.00', '623.09', '342.7', '205.62', '185.06', 'L37', '3.785', 'LT', '3.785 LT', 1),
(34, '321210', 'ROJO CLARO', '6213.00', '1332.00', '387.11', '212.91', '127.75', '114.97', 'L37', '3.785', 'LT', '3.785 LT', 1),
(35, '321220', 'ROJO MEZCLAS', '8121.31', '1703.00', '494.93', '272.21', '163.33', '146.99', 'L37', '3.785', 'LT', '3.785 LT', 1),
(36, '321230', 'ROJO OXIDO', '4797.44', '1006.00', '292.36', '160.8', '96.48', '86.83', 'L37', '3.785', 'LT', '3.785 LT', 1),
(37, '321213', 'ROJO TRANSPARENTE', '9289.67', '1948.00', '566.13', '311.37', '186.82', '168.14', 'L37', '3.785', 'LT', '3.785 LT', 1),
(38, '321240', 'TRANSPARENTE', '3909.00', '852.00', '247.61', '136.18', '81.71', '73.54', 'L37', '3.785', 'LT', '3.785 LT', 1),
(39, '321251', 'VERDE AMARILLENTO', '6590.52', '1382.00', '401.64', '220.9', '132.54', '119.29', 'L37', '3.785', 'LT', '3.785 LT', 1),
(40, '321260', 'VERDE ORGÁNICO', '6328.23', '1327.00', '385.65', '212.11', '127.27', '114.54', 'L37', '3.785', 'LT', '3.785 LT', 1),
(41, '321270', 'VIOLETA', '7391.68', '1550.00', '450.46', '247.75', '148.65', '133.79', 'L37', '3.785', 'LT', '3.785 LT', 1),
(42, '340400', 'ALUMINIO ARMADORA EXTRA GRUESO', '4401.62', '923.00', '268.24', '147.53', '88.52', '79.67', 'L37', '3.785', 'LT', '3.785 LT', 2),
(43, '340401', 'ALUMINIO FINO', '4401.62', '923.00', '268.24', '147.53', '88.52', '79.67', 'L37', '3.785', 'LT', '3.785 LT', 2),
(44, '340402', 'ALUMINIO GRUESO', '4401.62', '923.00', '268.24', '147.53', '88.52', '79.67', 'L37', '3.785', 'LT', '3.785 LT', 2),
(45, '340403', 'ALUMINIO MEDIANO', '4007.00', '923.00', '268.24', '147.53', '88.52', '79.67', 'L37', '3.785', 'LT', '3.785 LT', 2),
(46, '340404', 'AMARILLO CROMO', '4291.94', '900.00', '261.56', '143.86', '86.31', '77.68', 'L37', '3.785', 'LT', '3.785 LT', 2),
(47, '340405', 'AMARILLO LIMÓN', '4291.94', '900.00', '261.56', '143.86', '86.31', '77.68', 'L37', '3.785', 'LT', '3.785 LT', 2),
(48, '340406', 'AMARILLO OXIDO', '3838.9', '805.00', '233.95', '128.67', '77.2', '69.48', 'L37', '3.785', 'LT', '3.785 LT', 2),
(49, '340407', 'AZUL MONASTRAL', '4384.00', '923.00', '268.24', '147.53', '88.52', '79.67', 'L37', '3.785', 'LT', '3.785 LT', 2),
(50, '340408', 'AZUL NO BRONCE', '4401.62', '923.00', '268.24', '147.53', '88.52', '79.67', 'L37', '3.785', 'LT', '3.785 LT', 2),
(51, '340410', 'AZUL ULTRA', '4495.33', '996.19', '248.00', '136.4', '81.84', '73.66', 'M94', '946', 'ML', '946 ML', 2),
(52, '340409', 'AZUL VERDOSO', '4401.62', '923.00', '268.24', '147.53', '88.52', '79.67', 'L37', '3.785', 'LT', '3.785 LT', 2),
(53, '340411', 'BLANCO', '4007.00', '923.00', '268.24', '147.53', '88.52', '79.67', 'L37', '3.785', 'LT', '3.785 LT', 2),
(54, '340413', 'CAFÉ DORADO ROJIZO', '4291.94', '900.00', '261.56', '143.86', '86.31', '77.68', 'L37', '3.785', 'LT', '3.785 LT', 2),
(55, '340412', 'CAFÉ ORGÁNICO AMARILLENTO', '4291.94', '900.00', '261.56', '143.86', '86.31', '77.68', 'L37', '3.785', 'LT', '3.785 LT', 2),
(56, '340414', 'MARRÓN ALIZARINE', '4334.86', '909.00', '264.17', '145.3', '87.18', '78.46', 'L37', '3.785', 'LT', '3.785 LT', 2),
(57, '340415', 'MARRÓN MAGENTA', '4334.86', '909.00', '264.17', '145.3', '87.18', '78.46', 'L37', '3.785', 'LT', '3.785 LT', 2),
(58, '340416', 'MARRÓN ROYAL', '4501.77', '944.00', '274.35', '150.89', '90.53', '81.48', 'L37', '3.785', 'LT', '3.785 LT', 2),
(59, '340417', 'NARANJA', '4334.86', '909.00', '264.17', '145.3', '87.18', '78.46', 'L37', '3.785', 'LT', '3.785 LT', 2),
(60, '340418', 'NEGRO INTENSO', '4007.00', '923.00', '268.24', '147.53', '88.52', '79.67', 'L37', '3.785', 'LT', '3.785 LT', 2),
(61, '340419', 'ROJO CLARO', '4325.32', '907.00', '263.59', '144.98', '86.99', '78.29', 'L37', '3.785', 'LT', '3.785 LT', 2),
(62, '340420', 'ROJO OSCURO', '4325.32', '907.00', '263.59', '144.98', '86.99', '78.29', 'L37', '3.785', 'LT', '3.785 LT', 2),
(63, '340421', 'ROJO OXIDO', '4325.32', '907.00', '263.59', '144.98', '86.99', '78.29', 'L37', '3.785', 'LT', '3.785 LT', 2),
(64, '340422', 'TRANSPARENTE MEZCLAS', '3916.00', '900.00', '261.56', '143.86', '86.31', '77.68', 'L37', '3.785', 'LT', '3.785 LT', 2),
(65, '340423', 'VERDE ORGÁNICO', '4401.62', '923.00', '268.24', '147.53', '88.52', '79.67', 'L37', '3.785', 'LT', '3.785 LT', 2),
(66, '340424', 'VIOLETA', '4314.06', '956.03', '238.00', '130.9', '78.54', '70.69', 'M94', '946', 'ML', '946 ML', 2),
(67, '330002', 'ALUMINIO FINO', '4268.1', '895.00', '260.11', '143.06', '85.83', '77.25', 'L37', '3.785', 'LT', '3.785 LT', 3),
(68, '330005', 'ALUMINIO GRUESO', '4740.21', '994.00', '288.88', '158.88', '95.33', '85.8', 'L37', '3.785', 'LT', '3.785 LT', 3),
(69, '330010', 'ALUMINIO MEDIANO', '3538.00', '796.00', '231.33', '127.23', '76.34', '68.71', 'L37', '3.785', 'LT', '3.785 LT', 3),
(70, '330020', 'AMARILLO CROMO', '4962.00', '1082.00', '314.45', '172.95', '103.77', '93.39', 'L37', '3.785', 'LT', '3.785 LT', 3),
(71, '330030', 'AMARILLO LIMÓN', '5899.04', '1237.00', '359.5', '197.72', '118.63', '106.77', 'L37', '3.785', 'LT', '3.785 LT', 3),
(72, '330040', 'AMARILLO OXIDO', '4082.11', '856.00', '248.77', '136.82', '82.09', '73.89', 'L37', '3.785', 'LT', '3.785 LT', 3),
(73, '330050', 'AZUL NO BRONCE', '4878.51', '1023.00', '297.31', '163.52', '98.11', '88.3', 'L37', '3.785', 'LT', '3.785 LT', 3),
(74, '330060', 'BLANCO', '3803.00', '846.00', '245.87', '135.23', '81.14', '73.02', 'L37', '3.785', 'LT', '3.785 LT', 3),
(75, '330063', 'CAFÉ ORGÁNICO ROJIZO', '5121.72', '1074.00', '312.13', '171.67', '103.00', '92.7', 'L37', '3.785', 'LT', '3.785 LT', 3),
(76, '330180', 'GRIS MARTILLADO', '3788.00', '845.00', '245.57', '135.07', '81.04', '72.94', 'L37', '3.785', 'LT', '3.785 LT', 3),
(77, '330065', 'MARRÓN ALIZARINE', '7620.58', '1598.00', '464.41', '255.43', '153.26', '137.93', 'L37', '3.785', 'LT', '3.785 LT', 3),
(78, '330066', 'MARRÓN MAGENTA', '7110.32', '1491.00', '433.32', '238.32', '142.99', '128.69', 'L37', '3.785', 'LT', '3.785 LT', 3),
(79, '330070', 'NARANJA', '4138.00', '925.00', '268.82', '147.85', '88.71', '79.84', 'L37', '3.785', 'LT', '3.785 LT', 3),
(80, '330450', 'NEGRO BRILLANTE', '3764.00', '848.00', '246.45', '135.55', '81.33', '73.19', 'L37', '3.785', 'LT', '3.785 LT', 3),
(81, '330080', 'ROJO CLARO', '4555.00', '1031.00', '299.63', '164.8', '98.88', '88.99', 'L37', '3.785', 'LT', '3.785 LT', 3),
(82, '330090', 'ROJO OXIDO', '3710.15', '778.00', '226.1', '124.36', '74.61', '67.15', 'L37', '3.785', 'LT', '3.785 LT', 3),
(83, '330200', 'TRANSPARENTE', '3088.00', '688.00', '199.95', '109.97', '65.98', '59.38', 'L37', '3.785', 'LT', '3.785 LT', 3),
(84, '330095', 'VERDE ORGÁNICO', '5412.62', '1135.00', '329.85', '181.42', '108.85', '97.97', 'L37', '3.785', 'LT', '3.785 LT', 3),
(85, '346000', 'ALUMINIO ARMADORA EXTRA GRUESO', '10200.52', '2139.00', '621.64', '341.9', '205.14', '184.63', 'L37', '3.785', 'LT', '3.785 LT', 4),
(86, '346020', 'ALUMINIO FINO', '8292.99', '1739.00', '505.39', '277.96', '166.78', '150.1', 'L37', '3.785', 'LT', '3.785 LT', 4),
(87, '346041', 'ALUMINIO MEDIANO BRILLANTE', '7930.00', '1725.00', '501.32', '275.73', '165.44', '148.89', 'L37', '3.785', 'LT', '3.785 LT', 4),
(88, '346050', 'AMARILLO CROMO', '8574.35', '1798.00', '522.54', '287.39', '172.44', '155.19', 'L37', '3.785', 'LT', '3.785 LT', 4),
(89, '346060', 'AMARILLO LIMÓN', '9809.47', '2057.00', '597.81', '328.79', '197.28', '177.55', 'L37', '3.785', 'LT', '3.785 LT', 4),
(90, '346080', 'AMARILLO OXIDO', '7849.48', '1646.00', '478.36', '263.1', '157.86', '142.07', 'L37', '3.785', 'LT', '3.785 LT', 4),
(91, '346100', 'AZUL ORGÁNICO ROJIZO', '9261.06', '1942.00', '564.39', '310.41', '186.25', '167.62', 'L37', '3.785', 'LT', '3.785 LT', 4),
(92, '346110', 'AZUL ORGÁNICO VERDOSO', '8769.87', '1839.00', '534.45', '293.95', '176.37', '158.73', 'L37', '3.785', 'LT', '3.785 LT', 4),
(93, '346130', 'BLANCO', '8200.00', '1787.00', '519.34', '285.64', '171.38', '154.24', 'L37', '3.785', 'LT', '3.785 LT', 4),
(94, '346140', 'CAFÉ ORGÁNICO AMARILLENTO', '9938.23', '2084.00', '605.65', '333.11', '199.87', '179.88', 'L37', '3.785', 'LT', '3.785 LT', 4),
(95, '346150', 'CAFÉ ORGÁNICO ROJIZO', '8917.7', '1870.00', '543.46', '298.9', '179.34', '161.41', 'L37', '3.785', 'LT', '3.785 LT', 4),
(96, '346160', 'MARRÓN ALIZARINE', '11535.79', '2419.00', '703.01', '386.66', '231.99', '208.79', 'L37', '3.785', 'LT', '3.785 LT', 4),
(97, '346170', 'MARRÓN ROYAL', '16056.63', '3367.00', '978.52', '538.19', '322.91', '290.62', 'L37', '3.785', 'LT', '3.785 LT', 4),
(98, '346190', 'NARANJA ROJIZO', '10720.32', '2248.00', '653.32', '359.32', '215.59', '194.03', 'L37', '3.785', 'LT', '3.785 LT', 4),
(99, '346200', 'NEGRO INTENSO', '8117.00', '1767.00', '513.53', '282.44', '169.46', '152.52', 'L37', '3.785', 'LT', '3.785 LT', 4),
(100, '346211', 'ROJO CANDENTE', '14401.85', '3020.00', '877.68', '482.72', '289.63', '260.67', 'L37', '3.785', 'LT', '3.785 LT', 4),
(101, '346210', 'ROJO CLARO', '11473.79', '2406.00', '699.23', '384.58', '230.75', '207.67', 'L37', '3.785', 'LT', '3.785 LT', 4),
(102, '346280', 'ROJO OBSCURO', '6480.83', '1359.00', '394.95', '217.22', '130.33', '117.3', 'L37', '3.785', 'LT', '3.785 LT', 4),
(103, '346230', 'ROJO OXIDO', '7439.37', '1560.00', '453.37', '249.35', '149.61', '134.65', 'L37', '3.785', 'LT', '3.785 LT', 4),
(104, '346240', 'TRANSPARENTE MEZCLAS', '5903.8', '1238.00', '359.79', '197.88', '118.73', '106.86', 'L37', '3.785', 'LT', '3.785 LT', 4),
(105, '346260', 'VERDE ORGÁNICO', '9365.97', '1964.00', '570.78', '313.93', '188.36', '169.52', 'L37', '3.785', 'LT', '3.785 LT', 4),
(106, '346270', 'VIOLETA', '13800.98', '2894.00', '841.06', '462.58', '277.55', '249.79', 'L37', '3.785', 'LT', '3.785 LT', 4),
(107, '330300', 'ALUMINIO FINO', '2864.00', '603.00', '175.24', '96.38', '57.83', '52.05', 'L37', '3.785', 'LT', '3.785 LT', 5),
(108, '330301', 'ALUMINIO GRUESO', '3216.00', '677.00', '196.75', '108.21', '64.93', '58.43', 'L37', '3.785', 'LT', '3.785 LT', 5),
(109, '330302', 'ALUMINIO MEDIANO', '2794.00', '591.00', '177.00', '97.35', '58.41', '52.57', 'M94', '946', 'ML', '946 ML', 5),
(110, '330304', 'AMARILLO CROMO', '2871.00', '648.00', '188.32', '103.58', '62.15', '55.93', 'L37', '3.785', 'LT', '3.785 LT', 5),
(111, '330305', 'AMARILLO LIMÓN', '3085.00', '696.00', '202.27', '111.25', '66.75', '60.07', 'L37', '3.785', 'LT', '3.785 LT', 5),
(112, '330306', 'AMARILLO OXIDO', '2908.98', '610.00', '177.28', '97.5', '58.5', '52.65', 'L37', '3.785', 'LT', '3.785 LT', 5),
(113, '330308', 'AZUL MONASTRAL', '3223.00', '706.00', '205.18', '112.85', '67.71', '60.94', 'L37', '3.785', 'LT', '3.785 LT', 5),
(114, '330309', 'AZUL ULTRA', '3178.00', '669.00', '194.43', '106.93', '64.16', '57.74', 'L37', '3.785', 'LT', '3.785 LT', 5),
(115, '330310', 'BLANCO', '2885.00', '616.00', '187.00', '102.85', '61.71', '55.54', 'M94', '946', 'ML', '946 ML', 5),
(116, '330311', 'CAFÉ ORGÁNICO AMARILLENTO', '2689.62', '564.00', '163.91', '90.15', '54.09', '48.68', 'L37', '3.785', 'LT', '3.785 LT', 5),
(117, '330312', 'CAFÉ ORGÁNICO ROJIZO', '2860.00', '602.00', '174.95', '96.22', '57.73', '51.96', 'L37', '3.785', 'LT', '3.785 LT', 5),
(118, '330329', 'CHOCOLATE', '3167.00', '689.00', '203.00', '111.65', '66.99', '60.29', 'M94', '946', 'ML', '946 ML', 5),
(119, '330336', 'CHOCOLATE MATE', '3577.00', '767.00', '225.00', '123.75', '74.25', '66.83', 'M94', '946', 'ML', '946 ML', 5),
(120, '330313', 'MARRÓN ALIZARINE', '3795.00', '799.00', '232.21', '127.71', '76.63', '68.97', 'L37', '3.785', 'LT', '3.785 LT', 5),
(121, '330315', 'MARRÓN ROYAL', '3996.27', '838.00', '243.54', '133.95', '80.37', '72.33', 'L37', '3.785', 'LT', '3.785 LT', 5),
(122, '330316', 'NARANJA', '3004.36', '630.00', '183.09', '100.7', '60.42', '54.38', 'L37', '3.785', 'LT', '3.785 LT', 5),
(123, '330317', 'NEGRO BRILLANTE', '2699.00', '607.00', '178.00', '97.9', '58.74', '52.87', 'M94', '946', 'ML', '946 ML', 5),
(124, '330337', 'NEGRO MATE', '3116.00', '669.00', '198.00', '108.9', '65.34', '58.81', 'M94', '946', 'ML', '946 ML', 5),
(125, '330318', 'ROJO CLARO', '2864.00', '644.00', '187.16', '102.94', '61.76', '55.59', 'L37', '3.785', 'LT', '3.785 LT', 5),
(126, '330321', 'ROJO OXIDO', '2799.3', '587.00', '170.59', '93.83', '56.3', '50.67', 'L37', '3.785', 'LT', '3.785 LT', 5),
(127, '330322', 'TRANSPARENTE', '2438.00', '519.00', '150.83', '82.96', '49.77', '44.8', 'L37', '3.785', 'LT', '3.785 LT', 5),
(128, '330323', 'VERDE ORGÁNICO', '3401.00', '716.00', '208.08', '114.45', '68.67', '61.8', 'L37', '3.785', 'LT', '3.785 LT', 5),
(129, '330325', 'VIOLETA', '3729.22', '782.00', '227.27', '125.00', '75.00', '67.5', 'L37', '3.785', 'LT', '3.785 LT', 5),
(130, '313500', 'ALUMINIO FINO', '1940.91', '407.00', '116.00', '63.8', '38.28', '34.45', 'L37', '3785', 'LT', '3.785 LT', 6),
(131, '313501', 'AMARILLO CATERPILLAR', '1940.91', '407.00', '116.00', '63.8', '38.28', '34.45', 'L37', '3785', 'LT', '3.785 LT', 6),
(132, '313502', 'AMARILLO CROMO', '2236.58', '469.00', '134.00', '73.7', '44.22', '39.8', 'L37', '3785', 'LT', '3.785 LT', 6),
(133, '313503', 'AMARILLO LIMÓN', '2145.97', '450.00', '128.00', '70.4', '42.24', '38.02', 'L37', '3785', 'LT', '3.785 LT', 6),
(134, '313504', 'AMARILLO OXIDO', '1940.91', '407.00', '116.00', '63.8', '38.28', '34.45', 'L37', '3785', 'LT', '3.785 LT', 6),
(135, '313506', 'AZUL ELÉCTRICO', '1940.91', '407.00', '116.00', '63.8', '38.28', '34.45', 'L37', '3785', 'LT', '3.785 LT', 6),
(136, '313505', 'AZUL FINO', '1940.91', '407.00', '116.00', '63.8', '38.28', '34.45', 'L37', '3785', 'LT', '3.785 LT', 6),
(137, '313507', 'AZUL MODELO', '1940.91', '407.00', '116.00', '63.8', '38.28', '34.45', 'L37', '3785', 'LT', '3.785 LT', 6),
(138, '313508', 'AZUL REY', '1940.91', '407.00', '116.00', '63.8', '38.28', '34.45', 'L37', '3785', 'LT', '3.785 LT', 6),
(139, '313509', 'BLANCO BRILLANTE', '1788.00', '407.00', '116.00', '63.8', '38.28', '34.45', 'L89', '18925', 'LT', '18.925 LT', 6),
(140, '313510', 'BLANCO MATE', '2102.65', '465.96', '116.00', '63.8', '38.28', '34.45', 'M94', '946', 'ML', '946 ML', 6),
(141, '313511', 'BLANCO OSTIÓN', '1940.91', '407.00', '116.00', '63.8', '38.28', '34.45', 'L37', '3785', 'LT', '3.785 LT', 6),
(142, '313512', 'CAFÉ', '1940.91', '407.00', '116.00', '63.8', '38.28', '34.45', 'L37', '3785', 'LT', '3.785 LT', 6),
(143, '313513', 'CAFÉ CLARO', '1940.91', '407.00', '116.00', '63.8', '38.28', '34.45', 'L37', '3785', 'LT', '3.785 LT', 6),
(144, '313514', 'CREMA', '1940.91', '407.00', '116.00', '63.8', '38.28', '34.45', 'M94', '946', 'ML', '946 ML', 6),
(145, '313515', 'GRIS CLARO', '1940.91', '407.00', '116.00', '63.8', '38.28', '34.45', 'M94', '946', 'ML', '946 ML', 6),
(146, '313516', 'GRIS OSCURO', '1940.91', '407.00', '116.00', '63.8', '38.28', '34.45', 'L37', '3785', 'LT', '3.785 LT', 6),
(147, '313517', 'MARFIL', '2102.65', '465.96', '116.00', '63.8', '38.28', '34.45', 'M94', '946', 'ML', '946 ML', 6),
(148, '313518', 'MARRÓN', '3094.97', '649.00', '185.00', '101.75', '61.05', '54.95', 'L37', '3785', 'LT', '3.785 LT', 6),
(149, '313519', 'NARANJA', '2398.72', '503.00', '144.00', '79.2', '47.52', '42.77', 'L37', '3785', 'LT', '3.785 LT', 6),
(150, '313520', 'NEGRO', '1788.00', '407.00', '116.00', '63.8', '38.28', '34.45', 'L89', '18925', 'LT', '18.925 LT', 6),
(151, '313521', 'NEGRO MATE', '1940.91', '407.00', '116.00', '63.8', '38.28', '34.45', 'L37', '3785', 'LT', '3.785 LT', 6),
(152, '313522', 'ORO', '2665.77', '559.00', '159.00', '87.45', '52.47', '47.22', 'L37', '3785', 'LT', '3.785 LT', 6),
(153, '313523', 'ROJO FUEGO', '1788.00', '407.00', '116.00', '63.8', '38.28', '34.45', 'L37', '3785', 'LT', '3.785 LT', 6),
(154, '313524', 'ROJO OXIDO', '1940.91', '407.00', '116.00', '63.8', '38.28', '34.45', 'L37', '3785', 'LT', '3.785 LT', 6),
(155, '313525', 'ROSA MEXICANO', '1940.91', '407.00', '116.00', '63.8', '38.28', '34.45', 'L37', '3785', 'LT', '3.785 LT', 6),
(156, '313526', 'VERDE ESMERALDA', '1940.91', '407.00', '116.00', '63.8', '38.28', '34.45', 'L37', '3785', 'LT', '3.785 LT', 6),
(157, '313528', 'VERDE JOHN DEERE', '1940.91', '407.00', '116.00', '63.8', '38.28', '34.45', 'L37', '3785', 'LT', '3.785 LT', 6),
(158, '313527', 'VERDE TURQUESA', '1940.91', '407.00', '116.00', '63.8', '38.28', '34.45', 'L37', '3785', 'LT', '3.785 LT', 6),
(159, '313529', 'VIOLETA', '2665.77', '559.00', '159.00', '87.45', '52.47', '47.22', 'M94', '946', 'ML', '946 ML', 6),
(160, '343260', 'MUESTRARIO DE COLORES EZ-COLOR ESMALTE ALQUIDAL', '20.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 6),
(161, '320315', 'ALUMINIO FINO', '8374.36', '1855.81', '462.00', '254.1', '152.46', '137.21', 'M94', '946', 'ML', '946 ML', 7),
(162, '320311', 'ALUMINIO FINO BRILLANTE', '10132.61', '2245.45', '559.00', '307.45', '184.47', '166.02', 'M94', '946', 'ML', '946 ML', 7),
(163, '320306', 'ALUMINIO GRUESO', '9425.69', '2088.79', '520.00', '286.00', '171.6', '154.44', 'M94', '946', 'ML', '946 ML', 7),
(164, '320312', 'ALUMINIO GRUESO DESTELLANTE', '10132.61', '2245.45', '559.00', '307.45', '184.47', '166.02', 'M94', '946', 'ML', '946 ML', 7),
(165, '320302', 'ALUMINIO MEDIANO', '10548.64', '2212.00', '642.85', '353.57', '212.14', '190.93', 'L37', '3.785', 'LT', '3.785 LT', 7),
(166, '320305', 'ALUMINIO MEDIANO DESTELLANTE', '8718.76', '1932.14', '481.00', '264.55', '158.73', '142.86', 'M94', '946', 'ML', '946 ML', 7),
(167, '320320', 'AMARILLO BRILLANTE', '34603.15', '7668.29', '1909.00', '1049.95', '629.97', '566.97', 'M94', '946', 'ML', '946 ML', 7),
(168, '320339', 'AMARILLO ORGÁNICO PLUS', '11328.95', '2510.57', '625.00', '343.75', '206.25', '185.63', 'M94', '946', 'ML', '946 ML', 7),
(169, '320344', 'AMARILLO OXIDO BC', '9933.22', '2201.27', '548.00', '301.4', '180.84', '162.76', 'M94', '946', 'ML', '946 ML', 7),
(170, '320340', 'AMARILLO OXIDO PLUS', '8265.6', '1831.71', '456.00', '250.8', '150.48', '135.43', 'M94', '946', 'ML', '946 ML', 7),
(171, '320342', 'AMARILLO PLUS', '10531.39', '2333.83', '581.00', '319.55', '191.73', '172.56', 'M94', '946', 'ML', '946 ML', 7),
(172, '320341', 'AZUL B.C.', '11238.32', '2490.49', '620.00', '341.00', '204.6', '184.14', 'M94', '946', 'ML', '946 ML', 7),
(173, '320317', 'AZUL INDO PLUS', '12670.3', '2807.82', '699.00', '384.45', '230.67', '207.6', 'M94', '946', 'ML', '946 ML', 7),
(174, '320307', 'AZUL MONASTRAL', '10132.61', '2245.45', '559.00', '307.45', '184.47', '166.02', 'M94', '946', 'ML', '946 ML', 7),
(175, '320334', 'AZUL NEUTRO PLUS', '10186.99', '2257.51', '562.00', '309.1', '185.46', '166.91', 'M94', '946', 'ML', '946 ML', 7),
(176, '320328', 'AZUL ULTRA', '13830.38', '3064.9', '763.00', '419.65', '251.79', '226.61', 'M94', '946', 'ML', '946 ML', 7),
(177, '320330', 'AZUL VERDOSO', '11256.45', '2494.5', '621.00', '341.55', '204.93', '184.44', 'M94', '946', 'ML', '946 ML', 7),
(178, '320300', 'BLANCO BRILLANTE', '8402.67', '1762.00', '512.07', '281.64', '168.98', '152.09', 'L37', '3.785', 'LT', '3.785 LT', 7),
(179, '320316', 'BLANCO TORNASOL PLUS', '13649.12', '3024.74', '753.00', '414.15', '248.49', '223.64', 'M94', '946', 'ML', '946 ML', 7),
(180, '320323', 'CAFÉ AMARILLENTO', '14301.67', '3169.34', '789.00', '433.95', '260.37', '234.33', 'M94', '946', 'ML', '946 ML', 7),
(181, '320308', 'FLATTEN G', '10912.05', '2418.18', '602.00', '331.1', '198.66', '178.79', 'M94', '946', 'ML', '946 ML', 7),
(182, '320325', 'GOLD TONER PLUS', '8718.76', '1932.14', '481.00', '264.55', '158.73', '142.86', 'M94', '946', 'ML', '946 ML', 7),
(183, '320310', 'MAGENTA', '14102.28', '3125.16', '778.00', '427.9', '256.74', '231.07', 'M94', '946', 'ML', '946 ML', 7),
(184, '320327', 'MAGENTA AZUL PLUS', '15643.02', '3466.6', '863.00', '474.65', '284.79', '256.31', 'M94', '946', 'ML', '946 ML', 7),
(185, '320324', 'MAGENTA MORADO', '12688.42', '2811.84', '700.00', '385.00', '231.00', '207.9', 'M94', '946', 'ML', '946 ML', 7),
(186, '320345', 'MAGENTA MORADO B.C.', '9480.07', '2100.85', '523.00', '287.65', '172.59', '155.33', 'M94', '946', 'ML', '946 ML', 7),
(187, '320309', 'MARRÓN', '18615.73', '4125.37', '1027.00', '564.85', '338.91', '305.02', 'M94', '946', 'ML', '946 ML', 7),
(188, '320332', 'MARRÓN TONO MORADO', '15842.4', '3510.78', '874.00', '480.7', '288.42', '259.58', 'M94', '946', 'ML', '946 ML', 7),
(189, '320333', 'NARANJA', '13558.49', '3004.65', '748.00', '411.4', '246.84', '222.16', 'M94', '946', 'ML', '946 ML', 7),
(190, '320314', 'NEGRO', '9860.72', '2185.2', '544.00', '299.2', '179.52', '161.57', 'M94', '946', 'ML', '946 ML', 7),
(191, '320338', 'NEGRO GRAFITO', '14102.28', '3125.16', '778.00', '427.9', '256.74', '231.07', 'M94', '946', 'ML', '946 ML', 7),
(192, '320301', 'NEGRO INTENSO', '9137.07', '1916.00', '556.83', '306.26', '183.75', '165.38', 'L37', '3.785', 'LT', '3.785 LT', 7),
(193, '320329', 'PALIO NARANJA', '13304.72', '2948.41', '734.00', '403.7', '242.22', '218.00', 'M94', '946', 'ML', '946 ML', 7),
(194, '320326', 'PALIO ORO', '12742.8', '2823.89', '703.00', '386.65', '231.99', '208.79', 'M94', '946', 'ML', '946 ML', 7),
(195, '320331', 'ROJO AMARILLENTO', '19485.8', '4318.18', '1075.00', '591.25', '354.75', '319.28', 'M94', '946', 'ML', '946 ML', 7),
(196, '320304', 'ROJO BRILLANTE', '18053.82', '4000.85', '996.00', '547.8', '328.68', '295.81', 'M94', '946', 'ML', '946 ML', 7),
(197, '320318', 'ROJO ESCARLATA', '14356.05', '3181.4', '792.00', '435.6', '261.36', '235.22', 'M94', '946', 'ML', '946 ML', 7),
(198, '320335', 'ROJO MONASTRAL', '17256.26', '3824.1', '952.00', '523.6', '314.16', '282.74', 'M94', '946', 'ML', '946 ML', 7),
(199, '320346', 'ROJO OXIDO BC', '9969.48', '2209.3', '550.00', '302.5', '181.5', '163.35', 'M94', '946', 'ML', '946 ML', 7),
(200, '320343', 'ROJO OXIDO PLUS', '8084.34', '1791.54', '446.00', '245.3', '147.18', '132.46', 'M94', '946', 'ML', '946 ML', 7),
(201, '320313', 'ROJO TRANSPARENTE PLUS', '14954.22', '3313.95', '825.00', '453.75', '272.25', '245.03', 'M94', '946', 'ML', '946 ML', 7),
(202, '320303', 'TRANSPARENTE MEZCLAS', '7859.02', '1648.00', '478.94', '263.42', '158.05', '142.25', 'L37', '3.785', 'LT', '3.785 LT', 7),
(203, '320337', 'VERDE AMARILLENTO', '10803.29', '2394.08', '596.00', '327.8', '196.68', '177.01', 'M94', '946', 'ML', '946 ML', 7),
(204, '320322', 'VERDE AZULOSO', '14011.65', '3105.07', '773.00', '425.15', '255.09', '229.58', 'M94', '946', 'ML', '946 ML', 7),
(205, '320336', 'VERDE DORADO', '11220.19', '2486.47', '619.00', '340.45', '204.27', '183.84', 'M94', '946', 'ML', '946 ML', 7),
(206, '320321', 'VIOLETA PLUS', '9371.31', '2076.74', '517.00', '284.35', '170.61', '153.55', 'M94', '946', 'ML', '946 ML', 7),
(207, '322175', 'CONVERTIDOR MONO CAPA SHERBASE ING', '5903.8', '1238.00', '359.79', '197.88', '118.73', '106.86', 'L37', '3.785', 'LT', '3.785 LT', 7),
(208, '301000', 'ALUMINIO ARMADORA EXTRA GRUESO', '6957.71', '1459.00', '424.02', '233.21', '139.93', '125.93', 'L37', '3.785', 'LT', '3.785 LT', 8),
(209, '301020', 'ALUMINIO FINO', '5460.3', '1145.00', '332.76', '183.02', '109.81', '98.83', 'L37', '3.785', 'LT', '3.785 LT', 8),
(210, '301021', 'ALUMINIO FINO BRILLANTE', '6590.52', '1382.00', '401.64', '220.9', '132.54', '119.29', 'L37', '3.785', 'LT', '3.785 LT', 8),
(211, '301030', 'ALUMINIO GRUESO', '6528.52', '1369.00', '397.86', '218.82', '131.29', '118.16', 'L37', '3.785', 'LT', '3.785 LT', 8),
(212, '301032', 'ALUMINIO GRUESO DESTELLANTE', '7611.04', '1596.00', '463.83', '255.11', '153.06', '137.76', 'L37', '3.785', 'LT', '3.785 LT', 8),
(213, '301033', 'ALUMINIO GRUESO RADIANTE', '7024.48', '1473.00', '428.08', '235.45', '141.27', '127.14', 'L37', '3.785', 'LT', '3.785 LT', 8),
(214, '301040', 'ALUMINIO MEDIANO', '5767.00', '1248.00', '362.69', '199.48', '119.69', '107.72', 'L37', '3.785', 'LT', '3.785 LT', 8),
(215, '301041', 'ALUMINIO MEDIANO BRILLANTE', '7034.02', '1475.00', '428.67', '235.77', '141.46', '127.31', 'L37', '3.785', 'LT', '3.785 LT', 8),
(216, '301042', 'ALUMINIO MEDIANO DESTELLANTE', '8412.21', '1764.00', '512.66', '281.96', '169.18', '152.26', 'L37', '3.785', 'LT', '3.785 LT', 8),
(217, '301050', 'AMARILLO CROMO RESISTENTE', '7014.94', '1471.00', '427.5', '235.13', '141.08', '126.97', 'L37', '3.785', 'LT', '3.785 LT', 8),
(218, '301060', 'AMARILLO LIMÓN RESISTENTE', '7234.31', '1517.00', '440.87', '242.48', '145.49', '130.94', 'L37', '3.785', 'LT', '3.785 LT', 8),
(219, '301070', 'AMARILLO ORGÁNICO', '8817.56', '1849.00', '537.36', '295.55', '177.33', '159.6', 'L37', '3.785', 'LT', '3.785 LT', 8),
(220, '301080', 'AMARILLO OXIDO', '4792.67', '1005.00', '292.07', '160.64', '96.38', '86.75', 'L37', '3.785', 'LT', '3.785 LT', 8),
(221, '301121', 'AZUL MONASTRAL', '7763.65', '1628.00', '473.13', '260.22', '156.13', '140.52', 'L37', '3.785', 'LT', '3.785 LT', 8),
(222, '301100', 'AZUL NO BRONCE', '6666.82', '1398.00', '406.29', '223.46', '134.08', '120.67', 'L37', '3.785', 'LT', '3.785 LT', 8),
(223, '301110', 'AZUL ORGÁNICO ROJIZO', '7553.82', '1584.00', '460.34', '253.19', '151.91', '136.72', 'L37', '3.785', 'LT', '3.785 LT', 8),
(224, '301120', 'AZUL ORGÁNICO VERDOSO', '7558.59', '1585.00', '460.63', '253.35', '152.01', '136.81', 'L37', '3.785', 'LT', '3.785 LT', 8),
(225, '301111', 'AZUL ULTRA', '7558.59', '1585.00', '460.63', '253.35', '152.01', '136.81', 'L37', '3.785', 'LT', '3.785 LT', 8),
(226, '301130', 'BLANCO', '6196.00', '1309.00', '380.42', '209.23', '125.54', '112.99', 'L37', '3.785', 'LT', '3.785 LT', 8),
(227, '301320', 'BLANCO TORNASOL', '27860.16', '6174.00', '1537.00', '845.35', '507.21', '456.49', 'M94', '946', 'ML', '946 ML', 8),
(228, '301140', 'CAFÉ ORGÁNICO AMARILLENTO', '7453.67', '1563.00', '454.24', '249.83', '149.9', '134.91', 'L37', '3.785', 'LT', '3.785 LT', 8),
(229, '301150', 'CAFÉ ORGÁNICO TONO ROJIZO', '7110.32', '1491.00', '410.00', '225.5', '135.3', '121.77', 'M94', '946', 'ML', '946 ML', 8),
(230, '305310', 'FLATTENG G', '9733.83', '2157.08', '537.00', '295.35', '177.21', '159.49', 'M94', '946', 'ML', '946 ML', 8),
(231, '301270', 'MARRÓN ALIZARINE', '8030.7', '1684.00', '489.41', '269.17', '161.5', '145.35', 'L37', '3.785', 'LT', '3.785 LT', 8),
(232, '301160', 'MARRÓN CLARO', '7029.25', '1474.00', '428.38', '235.61', '141.36', '127.23', 'L37', '3.785', 'LT', '3.785 LT', 8),
(233, '301271', 'MARRÓN MAGENTA', '7334.45', '1538.00', '446.97', '245.84', '147.5', '132.75', 'L37', '3.785', 'LT', '3.785 LT', 8),
(234, '301170', 'MARRÓN ROYAL', '9771.32', '2049.00', '595.48', '327.52', '196.51', '176.86', 'L37', '3.785', 'LT', '3.785 LT', 8),
(235, '301171', 'MARRÓN ROYAL MORADO', '9594.87', '2012.00', '584.73', '321.6', '192.96', '173.66', 'L37', '3.785', 'LT', '3.785 LT', 8),
(236, '301180', 'NARANJA PERMANENTE', '7711.19', '1617.00', '469.93', '258.46', '155.08', '139.57', 'L37', '3.785', 'LT', '3.785 LT', 8),
(237, '305300', 'NEGRO GRAFITO', '4187.18', '927.91', '231.00', '127.05', '76.23', '68.61', 'M94', '946', 'ML', '946 ML', 8),
(238, '301190', 'NEGRO INTENSO', '6532.00', '1450.00', '421.4', '231.77', '139.06', '125.16', 'L37', '3.785', 'LT', '3.785 LT', 8),
(239, '301191', 'NEGRO SÚPER INTENSO', '8251.00', '1737.00', '504.81', '277.64', '166.59', '149.93', 'L37', '3.785', 'LT', '3.785 LT', 8),
(240, '305200', 'PALIO ORO', '17111.25', '3791.97', '944.00', '519.2', '311.52', '280.37', 'M94', '946', 'ML', '946 ML', 8),
(241, '305210', 'PALIO ORO NARANJA', '17528.15', '3884.36', '967.00', '531.85', '319.11', '287.2', 'M94', '946', 'ML', '946 ML', 8),
(242, '301202', 'ROJO BRILLANTE', '10262.51', '2152.00', '625.42', '343.98', '206.39', '185.75', 'L37', '3.785', 'LT', '3.785 LT', 8),
(243, '301201', 'ROJO CANDENTE', '9866.7', '2069.00', '601.29', '330.71', '198.43', '178.58', 'L37', '3.785', 'LT', '3.785 LT', 8),
(244, '301200', 'ROJO CLARO', '7201.00', '1516.00', '440.58', '242.32', '145.39', '130.85', 'L37', '3.785', 'LT', '3.785 LT', 8),
(245, '301280', 'ROJO OSCURO', '7167.54', '1503.00', '436.8', '240.24', '144.15', '129.73', 'L37', '3.785', 'LT', '3.785 LT', 8),
(246, '301220', 'ROJO OXIDO', '6027.79', '1264.00', '367.34', '202.04', '121.22', '109.1', 'L37', '3.785', 'LT', '3.785 LT', 8),
(247, '301203', 'ROJO TRANSPARENTE', '10591.56', '2221.00', '645.47', '355.01', '213.00', '191.7', 'L37', '3.785', 'LT', '3.785 LT', 8),
(248, '301230', 'TRANSPARENTE DICAPA', '5871.00', '1320.00', '363.00', '199.65', '119.79', '107.81', 'M94', '946', 'ML', '946 ML', 8),
(249, '301231', 'TRANSPARENTE MEZCLAS', '5571.00', '1191.00', '346.13', '190.37', '114.22', '102.80', 'L37', '3.785', 'LT', '3.785 LT', 8),
(250, '301251', 'VERDE AMARILLENTO', '8254.83', '1731.00', '503.06', '276.69', '166.01', '149.41', 'L37', '3.785', 'LT', '3.785 LT', 8),
(251, '301240', 'VERDE DORADO', '8040.24', '1686.00', '489.99', '269.49', '161.7', '145.53', 'L37', '3.785', 'LT', '3.785 LT', 8),
(252, '301250', 'VERDE ORGÁNICO', '7606.27', '1595.00', '463.54', '254.95', '152.97', '137.67', 'L37', '3.785', 'LT', '3.785 LT', 8),
(253, '301260', 'VIOLETA', '8641.11', '1812.00', '526.61', '289.63', '173.78', '156.4', 'L37', '3.785', 'LT', '3.785 LT', 8),
(254, '340500', 'LACA ACRÍLICA ALUMINIO GRANO EXT GRUESO', '5660.59', '1187.00', '344.97', '189.73', '113.84', '102.46', 'L37', '3.785', 'LT', '3.785 LT', 9),
(255, '340501', 'LACA ACRÍLICA ALUMINIO GRANO FINO', '5693.98', '1194.00', '347.00', '190.85', '114.51', '103.06', 'L37', '3.785', 'LT', '3.785 LT', 9),
(256, '340502', 'LACA ACRÍLICA ALUMINIO GRANO GRUESO', '5293.39', '1110.00', '322.59', '177.42', '106.45', '95.81', 'L37', '3.785', 'LT', '3.785 LT', 9),
(257, '340503', 'LACA ACRÍLICA ALUMINIO GRANO MEDIANO', '4559.00', '956.00', '277.83', '152.81', '91.69', '82.52', 'L37', '3.785', 'LT', '3.785 LT', 9),
(258, '340505', 'LACA ACRÍLICA AMARILLO CANARIO', '4659.14', '977.00', '283.94', '156.17', '93.7', '84.33', 'L37', '3.785', 'LT', '3.785 LT', 9),
(259, '340504', 'LACA ACRÍLICA AMARILLO ROJIZO', '4659.14', '977.00', '283.94', '156.17', '93.7', '84.33', 'L37', '3.785', 'LT', '3.785 LT', 9),
(260, '340506', 'LACA ACRÍLICA AZUL DE PRUSIA', '4764.06', '999.00', '290.33', '159.68', '95.81', '86.23', 'L37', '3.785', 'LT', '3.785 LT', 9),
(261, '340507', 'LACA ACRÍLICA AZUL ROJIZO', '5660.59', '1187.00', '344.97', '189.73', '113.84', '102.46', 'L37', '3.785', 'LT', '3.785 LT', 9),
(262, '340508', 'LACA ACRÍLICA AZUL VERDOSO', '5527.07', '1159.00', '336.83', '185.26', '111.15', '100.04', 'L37', '3.785', 'LT', '3.785 LT', 9),
(263, '340526', 'LACA ACRÍLICA BARNIZ DE MEZCLAS', '4334.86', '909.00', '264.17', '145.3', '87.18', '78.46', 'L37', '3.785', 'LT', '3.785 LT', 9),
(264, '340509', 'LACA ACRÍLICA BLANCO', '4482.00', '991.00', '288.01', '158.4', '95.04', '85.54', 'L37', '3.785', 'LT', '3.785 LT', 9),
(265, '340512', 'LACA ACRÍLICA CAFÉ COBRIZO', '4730.67', '992.00', '288.3', '158.56', '95.14', '85.62', 'L37', '3.785', 'LT', '3.785 LT', 9),
(266, '340511', 'LACA ACRÍLICA CAFÉ DORADO', '4792.67', '1005.00', '292.07', '160.64', '96.38', '86.75', 'L37', '3.785', 'LT', '3.785 LT', 9),
(267, '340514', 'LACA ACRÍLICA MARRÓN', '5193.25', '1089.00', '316.49', '174.07', '104.44', '94.00', 'L37', '3.785', 'LT', '3.785 LT', 9),
(268, '340516', 'LACA ACRÍLICA MARRÓN DORADO', '6156.55', '1291.00', '375.19', '206.36', '123.81', '111.43', 'L37', '3.785', 'LT', '3.785 LT', 9),
(269, '340515', 'LACA ACRÍLICA MARRÓN ULTRA', '5193.25', '1089.00', '316.49', '174.07', '104.44', '94.00', 'L37', '3.785', 'LT', '3.785 LT', 9),
(270, '340513', 'LACA ACRÍLICA MARRÓN VIOLETA', '5097.87', '1069.00', '310.67', '170.87', '102.52', '92.27', 'L37', '3.785', 'LT', '3.785 LT', 9),
(271, '340517', 'LACA ACRÍLICA NARANJA', '5360.16', '1124.00', '326.66', '179.66', '107.8', '97.02', 'L37', '3.785', 'LT', '3.785 LT', 9),
(272, '340518', 'LACA ACRÍLICA NEGRO', '5260.01', '1103.00', '320.55', '176.31', '105.78', '95.2', 'L37', '3.785', 'LT', '3.785 LT', 9),
(273, '340520', 'LACA ACRÍLICA ROJO PURPURA', '6557.13', '1375.00', '399.6', '219.78', '131.87', '118.68', 'L37', '3.785', 'LT', '3.785 LT', 9),
(274, '340521', 'LACA ACRÍLICA ROJO SOLIDO', '5064.49', '1062.00', '308.64', '169.75', '101.85', '91.67', 'L37', '3.785', 'LT', '3.785 LT', 9),
(275, '340524', 'LACA ACRÍLICA VERDE AZULOSO', '5765.51', '1209.00', '351.36', '193.25', '115.95', '104.35', 'L37', '3.785', 'LT', '3.785 LT', 9),
(276, '340525', 'LACA ACRÍLICA VIOLETA', '5593.83', '1173.00', '340.9', '187.49', '112.5', '101.25', 'L37', '3.785', 'LT', '3.785 LT', 9),
(277, '00083', 'P80', '7.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 10),
(278, '00080', 'P150', '7.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 10),
(279, '00079', 'P180', '7.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 10),
(280, '02043', 'P220', '13.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 11),
(281, '02040', 'P320', '13.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 11),
(282, '02038', 'P400', '13.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 11),
(283, '02036', 'P600', '13.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 11),
(284, '02035', 'P800', '13.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 11),
(285, '02034', 'P1000', '33.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 11),
(286, '02033', 'P1200', '33.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 11),
(287, '02032', 'P1500', '33.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 11),
(288, '02020', 'P2000', '33.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 11),
(289, '02021', 'P1000', '18.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 12),
(290, '02022', ' P1200', '18.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 12),
(291, '02023', ' P1500', '18.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 12),
(292, '02044', ' P2000', '18.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 12),
(293, '02045', ' P2500', '18.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 12),
(294, '01998', 'P3000 1/2 HOJA', '18.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 13),
(295, '00516', 'P36 HOJALATERO', '46.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 14),
(296, '00512', 'P80 HOJALATERO', '36.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 14),
(297, '00983', 'P80', '13.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 15),
(298, '00981', 'P120', '13.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 15),
(299, '00979', 'P180', '13.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 15),
(300, '00978', 'P220', '13.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 15),
(301, '00977', 'P240', '13.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 15),
(302, '00976', 'P280', '13.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 15),
(303, '00975', 'P320', '13.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 15),
(304, '00973', 'P400', '13.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 15),
(305, '00971', 'P600', '13.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 16),
(306, '00970', 'P800', '17.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 16),
(307, '00969', 'P1000', '17.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 16),
(308, '00968', 'P1200', '17.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 16),
(309, '36170', ' G40 6pul', '28.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 17),
(310, '36172', ' G80 6pul', '16.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 17),
(311, '36174', ' G120 6pul', '16.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 17),
(312, '36176', ' G180 6pul', '16.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 17),
(313, '36177', ' G220 6pul', '16.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 17),
(314, '36180', ' G320 6pul', '16.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 17),
(315, '34403', 'GRANO 400', '60.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 18),
(316, '34405', 'GRANO 600', '60.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 18),
(317, '34407', 'GRANO 1000', '60.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 18),
(318, '34408', 'GRANO 1200', '60.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 18),
(319, '34409', 'GRANO 1500', '60.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 18),
(320, '02090', 'PARA MATIZADO 6pul P1000', '111.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 19),
(321, '02088', 'CLEAR COAT 6pul P1500', '46.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 19),
(322, '02085', '6pul P3000', '110.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 19),
(323, '30662', 'P5000 6pul', '110.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 19),
(324, '30290', 'P3000 70 X 140 MM', '58.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 20),
(325, '30289', 'P5000 70 X 140 MM', '58.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 20),
(326, '30711', 'P120', '23.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 21),
(327, '30709', 'P180', '23.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 21),
(328, '34440', 'CUBITRÓN II GRANO P40E', '1101.00', '0.00000', '58.00', '0.00000', '0.00000', '0.00000', 'R19', '19', 'PZ', 'ROLLO 19 PZ', 21),
(329, '34442', 'CUBITRÓN II GRANO P80E', '1009.00', '0.00000', '35.00', '0.00000', '0.00000', '0.00000', 'R29', '29', 'PZ', 'ROLLO 29 PZ', 21),
(330, '34444', 'CUBITRÓN II GRANO P120', '852.00', '0.00000', '29.00', '0.00000', '0.00000', '0.00000', 'R29', '29', 'PZ', 'ROLLO 29 PZ', 21),
(331, '34446', 'CUBITRÓN II GRANO P180', '852.00', '0.00000', '29.00', '0.00000', '0.00000', '0.00000', 'R29', '29', 'PZ', 'ROLLO 29 PZ', 21),
(332, '34447', 'CUBITRÓN II GRANO P220', '852.00', '0.00000', '29.00', '0.00000', '0.00000', '0.00000', 'R29', '29', 'PZ', 'ROLLO 29 PZ', 21),
(333, '31483', 'CUBITRON II 6pul P320+', '23.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 21),
(334, '31370', '6pul G-40', '35.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 22),
(335, '31371', '282 PERFORACIONES G80+', '23.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 22),
(336, '31372', '282 PERFORACIONES G120+', '23.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 22),
(337, '31373', '282 PERFORACIONES G150+', '23.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 22),
(338, '31374', '282 PERFORACIONES G180+', '23.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 22),
(339, '31481', '282 PERFORACIONES G220+', '23.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 22),
(340, '30283', '91 PERFORACIONES 3pul P80', '12.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 23),
(341, '01819', '282 PERFORACIONES P100', '23.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 23),
(342, '01817', '282 PERFORACIONES P150', '23.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 23),
(343, '01812', '282 PERFORACIONES P320', '22.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 23),
(344, '01811', '282 PERFORACIONES P400', '23.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 23),
(345, '01810', '282 PERFORACIONES P500', '23.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 23),
(346, '30771', 'PERFORACIONES P600', '23.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 24),
(347, '30770', 'PERFORACIONES P800', '24.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 24),
(348, '30769', 'PERFORACIONES P1000', '24.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 24),
(349, '30768', 'PERFORACIONES P1200', '24.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 24),
(350, '30767', 'PERFORACIONES P1500', '24.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 24),
(351, '339700', 'LITE PRO', '1985.5', '330.00', '115.00', '63.25', '37.95', '34.16', 'L3', '3', 'LT', '3 LT', 25),
(352, '339900', 'FILLER', '1382.96', '290.00', '95.00', '52.25', '31.35', '28.22', 'M94', '946', 'ML', '946 ML', 26),
(353, '371001', 'SW04 1500', '412.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 28),
(354, '371000', 'SW04 3400', '725.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 28),
(355, '371025', 'SW21', '836.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 29),
(356, '371015', 'SW76', '580.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 30),
(357, '371040', 'SW50', '420.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 31),
(358, '371030', 'SW20', '703.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 32),
(359, '371020', 'SW15', '886.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 33),
(360, '371010', 'SW27', '399.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 34),
(361, '340450', 'ALUMINIO ARMADORA', '4296.71', '901.00', '261.85', '144.02', '86.41', '77.77', 'L37', '3.785', 'LT', '3.785 LT', 35),
(362, '340451', 'ALUMINIO FINO', '4296.71', '901.00', '261.85', '144.02', '86.41', '77.77', 'L37', '3.785', 'LT', '3.785 LT', 35),
(363, '340452', 'ALUMINIO GRUESO', '4296.71', '901.00', '261.85', '144.02', '86.41', '77.77', 'L37', '3.785', 'LT', '3.785 LT', 35),
(364, '340453', 'ALUMINIO MEDIANO', '3906.00', '901.00', '261.85', '144.02', '86.41', '77.77', 'L37', '3.785', 'LT', '3.785 LT', 35),
(365, '340454', 'AMARILLO CROMO', '4187.03', '878.00', '255.17', '140.34', '84.2', '75.78', 'L37', '3.785', 'LT', '3.785 LT', 35),
(366, '340455', 'AMARILLO LIMÓN', '4187.03', '878.00', '255.17', '140.34', '84.2', '75.78', 'L37', '3.785', 'LT', '3.785 LT', 35),
(367, '340456', 'AZUL MONASTRAL', '4296.71', '901.00', '261.85', '144.02', '86.41', '77.77', 'L37', '3.785', 'LT', '3.785 LT', 35),
(368, '340458', 'AZUL ORGÁNICO VERDOSO', '4296.71', '901.00', '261.85', '144.02', '86.41', '77.77', 'L37', '3.785', 'LT', '3.785 LT', 35),
(369, '340457', 'AZUL PRUSIA', '4296.71', '901.00', '261.85', '144.02', '86.41', '77.77', 'L37', '3.785', 'LT', '3.785 LT', 35),
(370, '340459', 'AZUL ULTRA', '4422.82', '980.13', '244.00', '134.2', '80.52', '72.47', 'M94', '946', 'ML', '946 ML', 35),
(371, '340460', 'BLANCO', '3906.00', '901.00', '261.85', '144.02', '86.41', '77.77', 'L37', '3.785', 'LT', '3.785 LT', 35),
(372, '340461', 'MARRÓN MAGENTA', '4239.48', '889.00', '258.36', '142.1', '85.26', '76.73', 'L37', '3.785', 'LT', '3.785 LT', 35),
(373, '340462', 'MARRÓN ROYAL', '4396.86', '922.00', '267.95', '147.37', '88.42', '79.58', 'L37', '3.785', 'LT', '3.785 LT', 35),
(374, '340463', 'MARRÓN VIOLETA OBSCURO', '4239.48', '889.00', '258.36', '142.1', '85.26', '76.73', 'L37', '3.785', 'LT', '3.785 LT', 35),
(375, '340464', 'NARANJA T. ROJIZO', '4239.48', '889.00', '258.36', '142.1', '85.26', '76.73', 'L37', '3.785', 'LT', '3.785 LT', 35),
(376, '340465', 'NEGRO', '3906.00', '901.00', '261.85', '144.02', '86.41', '77.77', 'L37', '3.785', 'LT', '3.785 LT', 35),
(377, '340466', 'OCRE', '4187.03', '878.00', '255.17', '140.34', '84.2', '75.78', 'L37', '3.785', 'LT', '3.785 LT', 35),
(378, '340467', 'ORO AMARILLENTO', '4187.03', '878.00', '255.17', '140.34', '84.2', '75.78', 'L37', '3.785', 'LT', '3.785 LT', 35),
(379, '340468', 'ORO ROJIZO', '4187.03', '878.00', '255.17', '140.34', '84.2', '75.78', 'L37', '3.785', 'LT', '3.785 LT', 35),
(380, '340469', 'ROJO CLARO', '4225.18', '886.00', '257.49', '141.62', '84.97', '76.47', 'L37', '3.785', 'LT', '3.785 LT', 35),
(381, '340470', 'ROJO OSCURO', '4225.18', '886.00', '257.49', '141.62', '84.97', '76.47', 'L37', '3.785', 'LT', '3.785 LT', 35),
(382, '340471', 'ROJO OXIDO', '4225.18', '886.00', '257.49', '141.62', '84.97', '76.47', 'L37', '3.785', 'LT', '3.785 LT', 35),
(383, '340472', 'TRANSPARENTE', '3818.00', '878.00', '255.17', '140.34', '84.2', '75.78', 'L37', '3.785', 'LT', '3.785 LT', 35),
(384, '340473', 'VERDE ORGÁNICO', '4296.71', '901.00', '261.85', '144.02', '86.41', '77.77', 'L37', '3.785', 'LT', '3.785 LT', 35),
(385, '340474', 'VIOLETA', '4205.31', '931.92', '232.00', '127.6', '76.56', '68.9', 'M94', '946', 'ML', '946 ML', 35),
(386, '330750', 'ESMALTE SD ALUMINIO FINO', '2807.00', '590.00', '171.47', '94.31', '56.58', '50.93', 'L37', '3.785', 'LT', '3.785 LT', 36),
(387, '330751', 'ESMALTE SD ALUMINIO GRUESO', '2895.00', '661.00', '192.1', '105.66', '63.39', '57.05', 'M94', '946', 'ML', '946 ML', 36);
INSERT INTO `productoscatalogo` (`id`, `codigo`, `descripcion`, `cubeta`, `galon`, `litro`, `medio`, `cuart`, `octav`, `unidadMedida`, `valorMedida`, `gramaje`, `nombre`, `idSubcategoriaDesglose`) VALUES
(388, '330752', 'ESMALTE SD ALUMINIO MEDIANO', '2724.00', '575.00', '167.11', '91.91', '55.15', '49.63', 'L37', '3.785', 'LT', '3.785 LT', 36),
(389, '330753', 'ESMALTE SD AMARILLO CROMO', '2799.00', '632.00', '183.67', '101.02', '60.61', '54.55', 'L37', '3.785', 'LT', '3.785 LT', 36),
(390, '330754', 'ESMALTE SD AMARILLO LIMÓN', '3007.00', '681.00', '197.91', '108.85', '65.31', '58.78', 'L37', '3.785', 'LT', '3.785 LT', 36),
(391, '330757', 'ESMALTE SD AMARILLO OCRE', '2842.22', '596.00', '173.21', '95.27', '57.16', '51.44', 'L37', '3.785', 'LT', '3.785 LT', 36),
(392, '330755', 'ESMALTE SD AZUL ORGÁNICO TONO VERDOSO', '3140.00', '690.00', '200.53', '110.29', '66.17', '59.56', 'L37', '3.785', 'LT', '3.785 LT', 36),
(393, '330758', 'ESMALTE SD BLANCO', '2813.00', '602.00', '174.95', '96.22', '57.73', '51.96', 'M94', '946', 'ML', '946 ML', 36),
(394, '330761', 'ESMALTE SD CHOCOLATE', '3209.42', '673.00', '195.59', '107.57', '64.54', '58.09', 'M94', '946', 'ML', '946 ML', 36),
(395, '330772', 'ESMALTE SD CHOCOLATE MATE', '3571.85', '749.00', '217.68', '119.72', '71.83', '64.65', 'M94', '946', 'ML', '946 ML', 36),
(396, '330763', 'ESMALTE SD MARRÓN ALIZARINE', '3710.15', '778.00', '226.1', '124.36', '74.61', '67.15', 'L37', '3.785', 'LT', '3.785 LT', 36),
(397, '330762', 'ESMALTE SD MARRÓN ROYAL', '3905.67', '819.00', '238.02', '130.91', '78.55', '70.69', 'L37', '3.785', 'LT', '3.785 LT', 36),
(398, '330764', 'ESMALTE SD NARANJA', '2937.6', '616.00', '179.02', '98.46', '59.08', '53.17', 'L37', '3.785', 'LT', '3.785 LT', 36),
(399, '330765', 'ESMALTE SD NEGRO BRILLANTE', '2632.00', '594.00', '172.63', '94.95', '56.97', '51.27', 'M94', '946', 'ML', '946 ML', 36),
(400, '330773', 'ESMALTE SD NEGRO MATE', '3114.04', '653.00', '189.78', '104.38', '62.63', '56.36', 'M94', '946', 'ML', '946 ML', 36),
(401, '330759', 'ESMALTE SD ORO AMARILLENTO', '2627.62', '551.00', '160.13', '88.07', '52.84', '47.56', 'L37', '3.785', 'LT', '3.785 LT', 36),
(402, '330760', 'ESMALTE SD ORO ROJIZO', '2804.07', '588.00', '170.89', '93.99', '56.39', '50.75', 'L37', '3.785', 'LT', '3.785 LT', 36),
(403, '330766', 'ESMALTE SD ROJO CLARO', '2792.00', '629.00', '182.8', '100.54', '60.32', '54.29', 'L37', '3.785', 'LT', '3.785 LT', 36),
(404, '330767', 'ESMALTE SD ROJO OXIDO', '2732.54', '573.00', '166.53', '91.59', '54.95', '49.46', 'L37', '3.785', 'LT', '3.785 LT', 36),
(405, '330768', 'ESMALTE SD TRANSPARENTE', '2377.00', '507.00', '147.34', '81.04', '48.62', '43.76', 'L37', '3.785', 'LT', '3.785 LT', 36),
(406, '330769', 'ESMALTE SD VERDE ORGÁNICO', '3088.00', '698.00', '202.85', '111.57', '66.94', '60.25', 'L37', '3.785', 'LT', '3.785 LT', 36),
(407, '330770', 'ESMALTE SD VIOLETA', '3643.38', '764.00', '222.03', '122.12', '73.27', '65.94', 'L37', '3.785', 'LT', '3.785 LT', 36),
(408, '346516', 'ESMALTE POLIURETANO ROJO CLARO', '11192.43', '2347.00', '682.09', '375.15', '225.09', '202.58', 'L37', '3.785', 'LT', '3.785 LT', 37),
(409, '340550', 'ALUMINIO ARMADORA', '5527.07', '1159.00', '336.83', '185.26', '111.15', '100.04', 'L37', '3.785', 'LT', '3.785 LT', 38),
(410, '340551', 'ALUMINIO FINO BRILLANTE', '5560.45', '1166.00', '338.86', '186.38', '111.83', '100.64', 'L37', '3.785', 'LT', '3.785 LT', 38),
(411, '340553', 'ALUMINIO MEDIANO', '4436.00', '934.00', '271.44', '149.29', '89.58', '80.62', 'L37', '3.785', 'LT', '3.785 LT', 38),
(412, '340554', 'AMARILLO CROMO', '4554.23', '955.00', '277.54', '152.65', '91.59', '82.43', 'L37', '3.785', 'LT', '3.785 LT', 38),
(413, '340555', 'AMARILLO LIMÓN', '4554.23', '955.00', '277.54', '152.65', '91.59', '82.43', 'L37', '3.785', 'LT', '3.785 LT', 38),
(414, '340558', 'AZUL MONASTRAL', '5393.54', '1131.00', '328.69', '180.78', '108.47', '97.62', 'L37', '3.785', 'LT', '3.785 LT', 38),
(415, '340556', 'AZUL PRUSIA', '4654.37', '976.00', '283.65', '156.01', '93.6', '84.24', 'L37', '3.785', 'LT', '3.785 LT', 38),
(416, '340557', 'AZUL ULTRA', '5527.07', '1159.00', '336.83', '185.26', '111.15', '100.04', 'L37', '3.785', 'LT', '3.785 LT', 38),
(417, '340559', 'BLANCO', '4370.00', '967.00', '281.03', '154.57', '92.74', '83.47', 'L37', '3.785', 'LT', '3.785 LT', 38),
(418, '340560', 'BLANCO TITANIO', '7363.06', '1544.00', '448.72', '246.8', '148.08', '133.27', 'L37', '3.785', 'LT', '3.785 LT', 38),
(419, '340564', 'MARRÓN CLARO', '4740.21', '994.00', '288.88', '158.88', '95.33', '85.8', 'L37', '3.785', 'LT', '3.785 LT', 38),
(420, '340565', 'MARRÓN MAGENTA', '4945.27', '1037.00', '301.37', '165.76', '99.45', '89.51', 'L37', '3.785', 'LT', '3.785 LT', 38),
(421, '340566', 'MARRÓN ROYAL', '5865.65', '1230.00', '357.46', '196.61', '117.96', '106.17', 'L37', '3.785', 'LT', '3.785 LT', 38),
(422, '340563', 'MARRÓN VIOLETA OBSCURO', '4973.88', '1043.00', '303.12', '166.71', '100.03', '90.03', 'L37', '3.785', 'LT', '3.785 LT', 38),
(423, '340568', 'NEGRO', '4704.00', '1076.00', '312.71', '171.99', '103.19', '92.87', 'L37', '3.785', 'LT', '3.785 LT', 38),
(424, '340569', 'NEGRO INTENSO', '5460.3', '1145.00', '332.76', '183.02', '109.81', '98.83', 'L37', '3.785', 'LT', '3.785 LT', 38),
(425, '340561', 'ORO AMARILLENTO', '4673.45', '980.00', '284.81', '156.64', '93.99', '84.59', 'L37', '3.785', 'LT', '3.785 LT', 38),
(426, '340562', 'ORO ROJIZO', '4620.99', '969.00', '281.61', '154.89', '92.93', '83.64', 'L37', '3.785', 'LT', '3.785 LT', 38),
(427, '340570', 'ROJO BRILLANTE', '6394.99', '1341.00', '389.72', '214.35', '128.61', '115.75', 'L37', '3.785', 'LT', '3.785 LT', 38),
(428, '340571', 'ROJO CLARO', '4945.27', '1037.00', '301.37', '165.76', '99.45', '89.51', 'L37', '3.785', 'LT', '3.785 LT', 38),
(429, '340573', 'ROJO OBSCURO', '5345.85', '1121.00', '325.79', '179.18', '107.51', '96.76', 'L37', '3.785', 'LT', '3.785 LT', 38),
(430, '340572', 'ROJO RADIANTE', '7262.92', '1523.00', '442.62', '243.44', '146.06', '131.46', 'L37', '3.785', 'LT', '3.785 LT', 38),
(431, '340576', 'TRANSPARENTE', '4239.48', '889.00', '258.36', '142.1', '85.26', '76.73', 'L37', '3.785', 'LT', '3.785 LT', 38),
(432, '340574', 'VERDE ORGÁNICO', '5622.44', '1179.00', '342.64', '188.45', '113.07', '101.76', 'L37', '3.785', 'LT', '3.785 LT', 38),
(433, '340575', 'VIOLETA', '5460.3', '1145.00', '332.76', '183.02', '109.81', '98.83', 'L37', '3.785', 'LT', '3.785 LT', 38),
(434, '324050', 'ALUMINIO ARM. EXT. GSO.', '7178.02', '1590.7', '396.00', '217.8', '130.68', '117.61', 'M94', '946', 'ML', '946 ML', 39),
(435, '324054', 'AMARILLO CROMO', '7178.02', '1590.7', '396.00', '217.8', '130.68', '117.61', 'M94', '946', 'ML', '946 ML', 39),
(436, '324055', 'AMARILLO LIMÓN', '7178.02', '1590.7', '396.00', '217.8', '130.68', '117.61', 'M94', '946', 'ML', '946 ML', 39),
(437, '324056', 'AMARILLO ORGÁNICO', '7178.02', '1590.7', '396.00', '217.8', '130.68', '117.61', 'M94', '946', 'ML', '946 ML', 39),
(438, '324057', 'AZUL MONASTRAL', '5846.58', '1226.00', '338.00', '185.9', '111.54', '100.39', 'M94', '946', 'ML', '946 ML', 39),
(439, '324080', 'AZUL ORGÁNICO TONO VERDOSO', '7178.02', '1590.7', '396.00', '217.8', '130.68', '117.61', 'M94', '946', 'ML', '946 ML', 39),
(440, '324059', 'AZUL ULTRA', '7178.02', '1590.7', '396.00', '217.8', '130.68', '117.61', 'M94', '946', 'ML', '946 ML', 39),
(441, '324060', 'BLANCO', '5846.58', '1226.00', '356.3', '195.97', '117.58', '105.82', 'L37', '3.785', 'LT', '3.785 LT', 39),
(442, '324061', 'BLANCO TORNASOL', '7468.04', '1654.97', '412.00', '226.6', '135.96', '122.36', 'M94', '946', 'ML', '946 ML', 39),
(443, '324081', 'CAFÉ ORGÁNICO TONO AMARILLENTO', '7178.02', '1590.7', '396.00', '217.8', '130.68', '117.61', 'M94', '946', 'ML', '946 ML', 39),
(444, '324062', 'CAFÉ ORGÁNICO TONO ROJIZO', '7178.02', '1590.7', '396.00', '217.8', '130.68', '117.61', 'M94', '946', 'ML', '946 ML', 39),
(445, '324063', 'FLATTEN G', '7178.02', '1590.7', '396.00', '217.8', '130.68', '117.61', 'M94', '946', 'ML', '946 ML', 39),
(446, '324065', 'MARRÓN MAGENTA', '5846.58', '1226.00', '338.00', '185.9', '111.54', '100.39', 'M94', '946', 'ML', '946 ML', 39),
(447, '324067', 'NARANJA', '7178.02', '1590.7', '396.00', '217.8', '130.68', '117.61', 'M94', '946', 'ML', '946 ML', 39),
(448, '324068', 'NEGRO', '5846.58', '1226.00', '356.3', '195.97', '117.58', '105.82', 'L37', '3.785', 'LT', '3.785 LT', 39),
(449, '324077', 'NEGRO SÚPER INTENSO', '5846.58', '1226.00', '356.3', '195.97', '117.58', '105.82', 'L37', '3.785', 'LT', '3.785 LT', 39),
(450, '324069', 'ROJO BRILLANTE', '5846.58', '1226.00', '356.3', '195.97', '117.58', '105.82', 'L37', '3.785', 'LT', '3.785 LT', 39),
(451, '324072', 'TRANSPARENTE MEZCLAS', '5846.58', '1226.00', '356.3', '195.97', '117.58', '105.82', 'L37', '3.785', 'LT', '3.785 LT', 39),
(452, '324073', 'VERDE ORGÁNICO', '7178.02', '1590.7', '396.00', '217.8', '130.68', '117.61', 'M94', '946', 'ML', '946 ML', 39),
(453, '324074', 'VIOLETA', '7178.02', '1590.7', '396.00', '217.8', '130.68', '117.61', 'M94', '946', 'ML', '946 ML', 39),
(454, '26', 'Baja Presión.  con vaso reforzado', '328.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(455, '29', 'Doble abanico', '327.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(456, '29 PLUS', 'Doble abanico con juego de refacciones. Incluye boquilla de punto y de 45°', '381.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(457, '51', 'Para tanque 306. 365. 366  y  367', '501.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(458, '70', 'De Gravedad.  un  regulador  y  flujo  contínuo', '400.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(459, '112', 'De baja presión con tres boquillas', '374.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(460, '301', 'De retoque GONI de aluminio y latón', '434.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(461, '302', 'De Gravedad vaso Aluminio 400cc', '1677.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(462, '303', 'Para recubrimiento de auto (body)', '202.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(463, '304', 'Para sopletear. y limpiar superficies de polvo', '63.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(464, '314', 'De gravedad  mini de retoque', '255.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(465, '321', 'De Dravedad (1.4mm).vaso plastico 600cc', '1849.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(466, '322', 'De gravedad HVLP (1.4 mm)', '2220.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(467, '324', 'H.V.L.P. Tornado c/ regulador  y  manometrro y tobera', '3065.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(468, '351', 'De Gravedad vaso plástico  600 cc. Con tres reguladores', '714.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(469, '352', 'De Gravedad vaso aluminio de 400cc', '465.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(470, '353', 'Mini de gravedad HVLP vaso de 250cc', '547.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(471, '357', 'Para sandblast', '392.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(472, '363', 'Para sopletear de 5pul  reistente p/ uso rudo', '86.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(473, '384', 'De gravedad  HVLP', '871.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(474, '527', 'SPRAYIT de baja presión con vaso de 1l mezcla interna', '370.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(475, '528', 'SPRAYIT de baja presión con vaso de 1l mezcla externa', '428.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(476, '620', 'De Gravedad  vaso de Aluminio 1000cc  B 1.4', '1325.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(477, '621', 'De Gravedad  vaso de Aluminio 1000cc  B 1.7', '1301.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(478, '2704', 'De calor con control de temperatura y accesorios', '734.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(479, '3331', 'De gravedad LVMP con vaso de 600 ml y boquilla de 1.4 mm', '1508.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(480, '3350', 'De baja presión de alta eficiencia con vaso de 1 lt', '478.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(481, '3702', 'Eléctrica de presión', '1332.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(482, '33000', 'LVLP', '1217.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(483, '33000H2O', 'De gravedad LVLP para pintura base agua con vaso de 600ml y boquilla de 1.3mm', '1206.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(484, '33000MINI', 'Mini gravedad LVLP con vaso de 120ml y boquilla de 0.8 mm', '816.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(485, '33000VI', 'De gravedad LVLP para pintura vinílica con vaso de 600ml y boquilla de 2.0 mm', '1234.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(486, '33005', 'Ecológica HVLP', '757.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(487, '37000', 'De Aire de Chorro Concentrado', '723.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 40),
(488, '161', 'Estándar P/Pistolas:  26.  527.  y  528', '66.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 41),
(489, '166', 'Reforzado P/Pistolas:  26.  29.  527.  y  528', '89.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 41),
(490, '331', 'Gravedad de 400cc', '148.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 41),
(491, '334', 'Gravedad de 1000cc', '512.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 41),
(492, '341', '600 cc. Hembra P / Pistolas.', '375.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 41),
(493, '383', '200cc', '111.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 41),
(494, '330', 'De gravedad 600 cc. P/pistolas 321 y 324', '305.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 42),
(495, '377', 'Capacidad  600 cc p/Pistolas:', '117.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 42),
(496, '412', 'Capacidad máxima de 150cc  p/ modelo 353', '115.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 42),
(497, '3901', 'Para aerógrafo de cambio rápido de color con tapa', '33.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 43),
(498, '3902', 'Para aerógrafo de cambio rápido de color con tapa y conector para aerógrafo', '45.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 43),
(499, '01473', 'BCO. SIN MINERAL 0.152m X 0.229m', '20.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 44),
(500, '01459', 'GRSS ULTRA FINO 0.152m X 0.229m', '19.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 44),
(501, '13124', 'SIC 400P 0.140m X 0.115m X 0.005m', '35.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 45),
(502, '13125', 'SIC 600P 0.140m X 0.115m X 0.005m', '35.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 45),
(503, '22664', 'CON GANCHILLO 0.067m X 0.125m PLÁSTICO/ESPUMA', '319.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 46),
(504, '22666', 'CON GANCHILLO 0.067m X 0.390m PLÁSTICO/ESPUMA', '583.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 46),
(505, '71750', '1000 FANPLUS 0.230m X 0.280m PAPEL', '19.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 47),
(506, '71752', '1500 FANPLUS 0.230m X 0.280m PAPEL', '19.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 47),
(507, '71753', '2000 FANPLUS 0.230m X 0.280m PAPEL', '19.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 47),
(508, '71530', '2500 FANPLUS 0.230m X 0.280m PAPEL', '19.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 47),
(509, '72597', '080P 0.230 m X 0.280 m TELA SINTETI', '14.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 48),
(510, '72598', '120P 0.230 m X 0.280 m TELA SINTETI', '12.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 48),
(511, '72719', '36 mm X 50m  (1 1/2pul)', '56.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 49),
(512, '72720', '48 mm X 50 m  (2pul)', '75.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 49),
(513, '72160', 'FANDELI 12mm X 50m  (1/2pul)', '19.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 49),
(514, '72161', 'FANDELI 18mm X 50m  (3/4pul)', '28.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 49),
(515, '72162', 'FANDELI 24mm X 50m  (1pul)', '37.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 49),
(516, '72832', '12 mm X 50 m (1/2pul)', '40.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 50),
(517, '72833', '18 mm X 50 m (3/4pul)', '58.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 50),
(518, '18805', 'B080 080P FANDELI 0.070m X 0.419m PAPEL VELCRO', '15.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 51),
(519, '23787', 'B080 100P FANDELI 0.070m X 0.419m PAPEL VELCRO', '15.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 51),
(520, '18806', 'B080 120P FANDELI 0.070m X 0.419m PAPEL VELCRO', '15.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 51),
(521, '23788', 'B080 150P FANDELI 0.070m X 0.419m PAPEL VELCRO', '15.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 51),
(522, '18807', 'B080 180P FANDELI 0.070m X 0.419m PAPEL VELCRO', '15.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 51),
(523, '18808', 'B080 220P FANDELI 0.070m X 0.419m PAPEL VELCRO', '15.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 51),
(524, '23789', 'B080 240P FANDELI 0.070m X 0.419m PAPEL VELCRO', '15.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 51),
(525, '18809', 'B080 320P FANDELI 0.070m X 0.419m PAPEL VELCRO', '15.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 51),
(526, '18810', 'B080 400P FANDELI 0.070m X 0.419m PAPEL VELCRO', '15.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 51),
(527, 'A-015-I', '1 LT IMPRESO C/TAPA', '6.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 52),
(528, 'A-016-AI', '1/2 LT IMPRESO C/TAPA', '5.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 52),
(529, 'A-017-I', '1/4 LT IMPRESO C/TAPA', '3.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 52),
(530, 'MTT042', '2pul', '30.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 53),
(531, 'MTT043', '3pul', '37.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 53),
(532, 'MTT044', '4pul', '44.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 53),
(533, 'VM01000', '1000 ML', '194.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 54),
(534, 'VM0250', '250 ML', '112.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 54),
(535, 'VM0500', '500 ML', '154.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 54),
(536, 'VM0600', '600 ML', '154.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 54),
(537, 'REDMIX28', '28 KG', '397.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 55),
(538, 'REDMIX6', '6 KG', '93.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 55),
(539, 'RM', 'POLYFORM', '57.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'M5', '500', 'ML', '500 ML', 56),
(540, '19A0763301', 'POLYFORM COLOR PINO', '45.00', '0.00000', '0.00000', '0.00000', '0.00000', '0.00000', 'PZ', '1', 'PZ', 'PZ', 56);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productossolicitudes`
--

CREATE TABLE `productossolicitudes` (
  `id` int(11) NOT NULL,
  `idSolicitud` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `precioVenta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `id` int(11) NOT NULL,
  `codigo` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `activa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`id`, `codigo`, `descripcion`, `imagen`, `activa`) VALUES
(1, '1', 'Revista Pagina 1', 'vistas/img/promocionesApp/708.jpg', 1),
(2, '2', 'Revista Pagina 2', 'vistas/img/promocionesApp/400.jpg', 1),
(3, '2', 'Revista Pagina 3', 'vistas/img/promocionesApp/205.jpg', 1),
(4, '2', 'Revista Pagina 4', 'vistas/img/promocionesApp/492.jpg', 1),
(5, '2', 'Revista Pagina 5', 'vistas/img/promocionesApp/476.jpg', 1),
(6, '2', 'Revista Pagina 6', 'vistas/img/promocionesApp/700.jpg', 1),
(7, '2', 'Revista Pagina 7', 'vistas/img/promocionesApp/279.jpg', 1),
(8, '2', 'Revista Pagina 8', 'vistas/img/promocionesApp/386.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` int(11) NOT NULL,
  `tipoSolicitud` int(11) NOT NULL,
  `estatus` int(11) NOT NULL,
  `cliente` text COLLATE utf8_spanish_ci NOT NULL,
  `idCliente` int(11) NOT NULL,
  `sucursal` text COLLATE utf8_spanish_ci NOT NULL,
  `horaSolicitud` timestamp NOT NULL DEFAULT current_timestamp(),
  `solicitudEnviada` int(11) NOT NULL,
  `motoEnCamino` int(11) NOT NULL DEFAULT 0,
  `enCaminoFecha` timestamp NULL DEFAULT NULL,
  `enProceso` int(11) NOT NULL DEFAULT 0,
  `enProcesoFecha` timestamp NULL DEFAULT NULL,
  `motoEnCaminoRegreso` int(11) NOT NULL DEFAULT 0,
  `regresoFecha` timestamp NULL DEFAULT NULL,
  `concluido` int(11) NOT NULL DEFAULT 0,
  `horaConcluido` timestamp NULL DEFAULT NULL,
  `tiempoProceso` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL,
  `listaProductos` text COLLATE utf8_spanish_ci NOT NULL,
  `observacionesProductos` text COLLATE utf8_spanish_ci NOT NULL,
  `requiereFactura` int(11) NOT NULL DEFAULT 0,
  `formaPago` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `descargada` int(11) NOT NULL DEFAULT 0,
  `visto` int(11) NOT NULL DEFAULT 0,
  `horaVisto` timestamp NULL DEFAULT NULL,
  `ganadorRifa` int(11) NOT NULL DEFAULT 0,
  `rutaSolicitud` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoriadesglose`
--

CREATE TABLE `subcategoriadesglose` (
  `id` int(11) NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `idSubcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `subcategoriadesglose`
--

INSERT INTO `subcategoriadesglose` (`id`, `descripcion`, `idSubcategoria`) VALUES
(1, 'ESMALTE ACRÍLICO', 1),
(2, 'ESMALTE SECADO RÁPIDO', 1),
(3, 'ESMALTE POLIURETANO ACRÍLICO', 1),
(4, 'EZ COLOR', 1),
(5, 'BASE COLOR', 2),
(6, 'LACA ACRILICA', 3),
(8, '1 PLIEGO', 4),
(9, '1/2 PLIEGO', 4),
(10, 'HOOKIT', 5),
(11, 'ABRASIVOS', 5),
(12, 'HOOKIT CLEAN', 6),
(13, 'BODY FILLER', 7),
(14, 'XCLO BODY ', 7),
(15, 'ULTRA', 8),
(16, 'FLEX-CRYL', 1),
(17, 'ESMALTE SD', 1),
(18, 'POLIURETANO', 1),
(19, 'PISTOLAS', 9),
(20, 'VASOS', 10),
(21, 'ALMOHADILLA', 11),
(22, 'COJÍN ABRASIVO', 12),
(23, 'GARLOPA', 13),
(24, 'HOJA', 14),
(25, 'MASKING TAPE', 15),
(26, 'TIRA BONDO', 16),
(27, 'ENVASE', 17),
(28, 'ESPÁTULA', 18),
(29, 'VASO MEDIDOR', 19),
(30, 'REDIMIX', 20),
(31, 'RESANADOR PARA MADERA', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoriamarca`
--

CREATE TABLE `subcategoriamarca` (
  `idSubcategoria` int(11) NOT NULL,
  `nombreSubcategoria` text COLLATE utf8_spanish_ci NOT NULL,
  `rutaFotoSubcategoria` text COLLATE utf8_spanish_ci NOT NULL,
  `idMarca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `subcategoriamarca`
--

INSERT INTO `subcategoriamarca` (`idSubcategoria`, `nombreSubcategoria`, `rutaFotoSubcategoria`, `idMarca`) VALUES
(1, 'ESMALTES', 'img/sinFoto.png', 1),
(2, 'BASE COLOR', 'vistas/img/productos/sinFoto.jpg', 1),
(3, 'LACAS', 'vistas/img/productos/sinFoto.jpg', 1),
(4, 'LIJAS', 'vistas/img/productos/sinFoto.jpg', 2),
(5, 'DISCOS', 'vistas/img/productos/sinFoto.jpg', 2),
(6, 'TIRA', 'vistas/img/productos/sinFoto.jpg', 2),
(7, 'RELLENADORES', 'vistas/img/productos/sinFoto.jpg', 1),
(8, 'MASILLA', 'vistas/img/productos/sinFoto.jpg', 1),
(9, 'PISTOLAS', 'vistas/img/productos/sinFoto.jpg', 3),
(10, 'VASOS', 'vistas/img/productos/sinFoto.jpg', 3),
(11, 'ALMOHADILLA', 'vistas/img/productos/sinFoto.jpg', 4),
(12, 'COJÍN', 'vistas/img/productos/sinFoto.jpg', 4),
(13, 'GARLOPA', 'vistas/img/productos/sinFoto.jpg', 4),
(14, 'HOJA', 'vistas/img/productos/sinFoto.jpg', 4),
(15, 'MASKING', 'vistas/img/productos/sinFoto.jpg', 4),
(16, 'TIRA BONDO', 'vistas/img/productos/sinFoto.jpg', 4),
(17, 'ENVASE', 'vistas/img/productos/sinFoto.jpg', 5),
(18, 'ESPÁTULA', 'vistas/img/productos/sinFoto.jpg', 5),
(19, 'VASO', 'vistas/img/productos/sinFoto.jpg', 5),
(20, 'REDIMIX', 'vistas/img/productos/sinFoto.jpg', 5),
(21, 'RESANADOR', 'vistas/img/productos/sinFoto.jpg', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoriasubdesglose`
--

CREATE TABLE `subcategoriasubdesglose` (
  `id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `idDesglose` int(11) NOT NULL,
  `marca` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `subcategoriasubdesglose`
--

INSERT INTO `subcategoriasubdesglose` (`id`, `descripcion`, `idDesglose`, `marca`) VALUES
(1, 'EXCELCRYL', 1, 'SHERWIN'),
(2, 'XCLO-ACRYL', 1, 'SHERWIN'),
(3, 'ESMALTE SR', 2, 'SHERWIN'),
(4, 'SHERTRUCK PLUS', 3, 'SHERWIN'),
(5, 'ESMALTE UR', 2, 'SHERWIN'),
(6, 'ESMALTE ALQUIDAL', 4, 'SHERWIN'),
(7, 'SHERBASE NG', 5, 'SHERWIN'),
(8, 'EXCELAC', 6, 'SHERWIN'),
(9, 'AUTOMAX', 6, 'SHERWIN'),
(10, 'WETORDRY 313Q', 8, '3M'),
(11, 'IMPERIAL WETORDRY 9 X 11pul', 8, '3M'),
(12, 'IMPERIAL WETORDRY 5.5 X 9pul', 9, '3M'),
(13, 'IMPERIAL WETORDRY P3000', 9, '3M'),
(14, 'REGAL', 10, '3M'),
(15, 'GOLD 6Pul', 10, '3M'),
(16, 'FILM 6Pul', 10, '3M'),
(17, 'BLUE', 10, '3M'),
(18, 'FLEXIBLE', 11, '3M'),
(19, 'TRIZACT', 10, '3M'),
(20, 'TRIZACT', 12, '3M'),
(21, 'CLEAN SANDING', 12, '3M'),
(22, 'CUBITRON II', 10, '3M'),
(23, 'CLEAN SANDING', 10, '3M'),
(24, 'LIBRE POLVO 7', 10, '3M'),
(25, 'BODY FILLER', 13, 'EXCELO'),
(26, 'XCLO BODY ', 14, 'EXCELO'),
(28, 'BODY', 15, 'EXCELO'),
(29, 'ESTAÑO', 15, 'EXCELO'),
(30, 'FINISH', 15, 'EXCELO'),
(31, 'GLASS', 15, 'EXCELO'),
(32, 'LUMIN', 15, 'EXCELO'),
(33, 'PLASTIC', 15, 'EXCELO'),
(34, 'SOFT', 15, 'EXCELO'),
(35, 'FLEX-CRYL', 16, 'FLEX'),
(36, 'ESMALTE SD', 17, 'FLEX'),
(37, 'POLIURETANO', 18, 'FLEX'),
(38, 'LACA ACRÍLICA FX', 6, 'FLEX'),
(39, 'FX BASE COLOR', 5, 'FLEX'),
(40, 'PISTOLAS', 19, 'GONI'),
(41, 'VASO DE ALUMINIO', 20, 'GONI'),
(42, 'VASO DE PLÁSTICO', 20, 'GONI'),
(43, 'VASO DE VIDRIO', 20, 'GONI'),
(44, 'ALMOHADILLA', 21, 'FANDELI'),
(45, 'COJÍN ABRASIVO', 22, 'FANDELI'),
(46, 'GARLOPA', 23, 'FANDELI'),
(47, 'B-99', 24, 'FANDELI'),
(48, 'NT76', 24, 'FANDELI'),
(49, 'MULTIUSOS', 25, 'FANDELI'),
(50, 'PROFESIONAL', 25, 'FANDELI'),
(51, 'TIRA BONDO', 26, 'FANDELI'),
(52, 'ENVASE', 27, 'COMPLEMENTOS'),
(53, 'ESPÁTULA', 28, 'COMPLEMENTOS'),
(54, 'VASO MEDIDOR', 29, 'COMPLEMENTOS'),
(55, 'REDIMIX', 30, 'COMPLEMENTOS'),
(56, 'RESANADOR PARA MADERA', 31, 'COMPLEMENTOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id` int(11) NOT NULL,
  `sucursal` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `latitud` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `longitud` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id`, `sucursal`, `direccion`, `latitud`, `longitud`) VALUES
(1, 'San Manuel', 'AV SAN FRANCISCO 1023, JARDINES DE SAN MANUEL, HEROICA PUEBLA DE ZARAGOZA, PUE.', '19.012376', '-98.202960'),
(2, 'Reforma', 'AVENIDA DE LA REFORMA 4712, AQUILES SERDÁN, HEROICA PUEBLA DE ZARAGOZA, PUE.', '19.062728', '-98.230896'),
(3, 'Las Torres', 'CALLE 87 B OTE. 1402, GRANJAS DE SAN ISIDRO, HEROICA PUEBLA DE ZARAGOZA, PUE.', '18.992656', '-98.213256'),
(4, 'Santiago', 'AV. 11 SUR #1707, BARRIO DE SANTIAGO, HEROICA PUEBLA DE ZARAGOZA, PUE.', '19.041616', '-98.210266'),
(5, 'Capu', 'BOULEVARD CARMEN SERDÁN 2719A, CLEOTILDE TORRES, HEROICA PUEBLA DE ZARAGOZA, PUE.', '19.072135', '-98.201966');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fechaRegistro` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombreCompleto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `taller` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `celular` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `latitud` text COLLATE utf8_spanish_ci NOT NULL,
  `longitud` text COLLATE utf8_spanish_ci NOT NULL,
  `solicitudes` int(11) NOT NULL,
  `compras` int(11) NOT NULL,
  `acumulado` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `fechaRegistro`, `nombreCompleto`, `email`, `password`, `taller`, `telefono`, `celular`, `direccion`, `latitud`, `longitud`, `solicitudes`, `compras`, `acumulado`) VALUES
(1, '27-03-20 05:52:33', 'Roberto Gutiérrez', 'roberto.gutierrez.angeles@gmail.com', 'ZEz1G64YXVp5PkcT+hee2Q==', 'San Francisco', '', '2224393044', 'Calle Libertad,5973,San Baltazar Linda Vista,Puebla,Heroica Puebla de Zaragoza,72550', '19.0116738', '-98.20573069999999', 0, 0, 0),
(2, '29-03-20 10:04:03', 'Marc', 'marclpz353092@gmail.com', 'n0J3wpZ6Ufjq5B8ht/26Tg==', 'Sfdk', '', '2761011654', 'Avenida las Margaritas,1576,Bugambilias 3ra Sección,Puebla,Heroica Puebla de Zaragoza,72580', '19.0090788', '-98.2079138', 0, 0, 0),
(3, '30-03-20 09:06:03', 'Elsa', 'elmaor.emn@gmail.com', '4M7hLN8nZqql32XYV6NIbA==', 'Sin taller', '2221570291', '2221570291', 'Avenida 29 Oriente,3005C,Seis de Enero,Puebla,Heroica Puebla de Zaragoza,72510', '19.0242458', '-98.1872915', 0, 0, 0),
(4, '30-03-20 11:43:18', 'Diego', 'dlopez@sfd.com.mx', 'Hh8KSf89dBc8Z9twHkkz2A==', 'The King', '', '2647261', 'Calle Libertad,5973,San Baltazar Linda Vista,Puebla,Heroica Puebla de Zaragoza,72550', '19.0116738', '-98.20573069999999', 0, 0, 0),
(5, '30-03-20 07:48:52', 'Héctor Gutiérrez Ángeles', 'hgutierrez.ang@gmail.com', '+H6rO2lXjEyBJ4MaNhWG4g==', 'San Francisco', '', '2224716708', 'Calle Libertad,5973,San Baltazar Linda Vista,Puebla,Heroica Puebla de Zaragoza,72550', '19.0116738', '-98.20573069999999', 0, 0, 0),
(6, '01-04-20 09:19:16', 'Iván Herrera', 'iherrera@sfd.com.mx', 'MHOeA34RiSc1fYzCNXlZuA==', 'San Francisco', '2646428', '2227369643', 'Avenida San Francisco,1023,Jardines de San Manuel,Puebla,Heroica Puebla de Zaragoza,72570', '19.0122221', '-98.2029939', 0, 0, 0),
(7, '02-04-20 12:50:05', 'Ana Laura Sanchez', 'lastorres@sfd.com.mx', 'zZIUrE5U5Jbf+cE/DL9SMQ==', 'San Francisco', '', '2211949932', 'Calle 87 B Oriente,calle 87b,Granjas de San Isidro,Puebla,Heroica Puebla de Zaragoza,72587', '18.9919404', '-98.2108311', 0, 0, 0),
(8, '03-04-20 02:25:14', 'Rodolfo Romero Carpinteyro', 'ro-di-007@hotmail.com', '5iNA8XqSCCzbdlxBXxg/bQ==', 'San Francisco Reforma', '', '2224353793', 'Prolongación Reforma,4712,Libertad,Puebla,Heroica Puebla de Zaragoza,72130', '19.0678899', '-98.2396014', 0, 0, 0),
(9, '03-04-20 03:16:45', 'Paula Zepeda', 'zepedapaula86.pz@gmail.com', 'VE90sAsEH6amvsZ4YuE9+g==', 'San Francisco', '2221178156', '2221178156', 'Avenida 50 Poniente,2719,Cleotilde torres,Puebla,Heroica Puebla de Zaragoza,72010', '19.0721615', '-98.2015524', 0, 0, 0),
(10, '05-04-20 08:44:24', 'Marco Antonio López Pérez', 'mm_marco_mar@hotmail.com', 'n0J3wpZ6Ufjq5B8ht/26Tg==', 'SFDK', '', '2761011645', 'Avenida San Ignacio,826,Jardines de San Manuel,Puebla,Heroica Puebla de Zaragoza,72550', '19.0108857', '-98.205432', 0, 0, 0),
(11, '10-04-20 12:56:47', 'Sebania Garrido carrera', 'sebaniagarridocarrera3@gmail.com', 'fvlZ2BT04YxomXKnlMw9mg==', 'Servicio Ortiz', '223279140', '5570820126', 'Articulo 5 Manzana 68, Lt 14,Constitución Mexicana,Puebla,Heroica Puebla de Zaragoza,72499', '18.961081', '-98.233711', 0, 0, 0),
(12, '11-04-20 09:28:19', 'Miguel', 'migueyuli0107@gmail.com', 'eqyiaTTSDNrDusqalFzn1g==', 'Mik', '2229105549', '2229105549', 'Flor de Margarita,16,San Juan Flor del Bosque,Puebla,Heroica Puebla de Zaragoza,72360', '19.0321202', '-98.1322371', 0, 0, 0),
(13, '14-04-20 12:43:46', 'Erick Emilio cartas cortes', 'erickcartasemilio@gmail.com', 'eWCkMUNsu2jX/lJlngKeeQ==', 'Livertad', '', '2227599284', 'Prolongación Reforma,4712,Libertad,Puebla,Heroica Puebla de Zaragoza,72130', '19.0678899', '-98.2396014', 0, 0, 0),
(14, '14-04-20 01:21:09', 'Carlos', 'carlos_alvarez2922@hotmail.com', 'SpokG4GhWhliTF1Mo3xTUg==', 'Hojalatería y pintura charli', '8826614', '2224862531', 'Calle Durazno,1,Bosques de Manzanilla,Puebla,Heroica Puebla de Zaragoza,72307', '19.0628027', '-98.1488775', 0, 0, 0),
(15, '17-04-20 11:27:33', 'Francisco de los santos', 'franciscoirubiel4@gmail.com', '2QSTmBgus9ZkrgDZ4lLCWg==', 'Frank', '', '2227362657', 'V. Guerrero,216,16 de Septiembre Sur,Puebla,Heroica Puebla de Zaragoza,72474', '18.99486959999999', '-98.2202586', 0, 0, 0),
(16, '20-04-20 12:06:14', 'Moises isai ramos González', 'croka23@gmail.com', 'rJOoFF0XAS/9Tgqqn9+WwA==', 'Ra-go', '2473853', '2211737341', 'Calle 11 Poniente #702,Entre 7 y 9 sur,Santa María xixitla,Puebla,San Pedro Cholula,72760', '15.6850038', '-92.0262307', 0, 0, 0),
(17, '20-04-20 01:04:46', 'Jose manuel', 'jmhernandez11092@gmail.com', 'PjCz5EDIIl1Jp3SIl0Wtdg==', 'San Francisco', '2225993895', '2225993895', 'Calle 21 Norte,76 poniente,La Loma,Puebla,Heroica Puebla de Zaragoza,72014', '19.0764567', '-98.19485540000001', 0, 0, 0),
(18, '20-04-20 08:15:29', 'Víctor Javier ledo romero', 'victorjavierledo@gmail.com', 'ymu7zOVXeEcPFYJ3Hk4vuA==', 'La luz mundo', '', '2228712537', '302,Las torres,Plazas Amalucan,Puebla,Heroica Puebla de Zaragoza,72310', '19.0445776', '-98.14409750000002', 0, 0, 0),
(19, '21-04-20 06:05:00', 'Eduardo Ramírez Bello', 'lalito70ramirez@gmail.com', 'CL8wCeTGJIEfYvLLG0+HAA==', 'Detallado automotriz Ramírez', '2222542127', '2211741614', 'Villa Cardel,6603,Villa Guadalupe,Puebla,Heroica Puebla de Zaragoza,72229', '19.0710205', '-98.11892610000001', 0, 0, 0),
(20, '22-04-20 10:06:31', 'Elí Pérez', 'elipm58@gmail.com', 'aXiS2m3Ohf32y63316ohKQ==', '1', '2223521452', '2228462088', 'Calle Fray Juan de Herrera 2804,FrayJuan,Tres cruces,Puebla,Puebla,72000', '39.1652664', '-5.047574199999999', 0, 0, 0),
(21, '24-04-20 09:23:00', 'Ricardo Medina', 'jrichiemed@hotmail.com', 'oiKwHyJ9m/9PCbBdyrET8Q==', 'Independiente', '', '2226076959', 'Calle 30 Sur,1502,2 de abril,Puebla,Heroica Puebla de Zaragoza,72380', '19.0297372', '-98.1830598', 0, 0, 0),
(22, '29-04-20 12:14:31', 'Milton salas', 'miltoncarlos2328@gmail.com', 'bvPIYNFtWELcuhYAgtr/yw==', 'Aplicom', '', '2221437366', 'Avenida 17 Poniente,1921,Rivera de Santiago,Puebla,Heroica Puebla de Zaragoza,72410', '19.0458535', '-98.2168986', 0, 0, 0),
(23, '09-05-20 09:01:38', 'Erick Ignacio Ulibarri Acevedo', 'erick.ignacio.ulibarri@gmail.com', 'fuNCkW03/p+TOLKIRFlLlQ==', 'Ingobernable', '5514730328', '5514730328', 'Playa Guitarrón,333,Reforma Iztaccihuatl norte,Ciudad de México,Ciudad de México,08810', '19.3775396', '-99.1319965', 0, 0, 0),
(24, '15-05-20 01:37:00', 'Benjamín Sánchez López', 'compumaqbenja@gmail.com', 'XdAQc5XEqnJcfzmIsjEI6A==', 'Collision Service', '', '5512282981', 'Avenida Xilotzingo,Agapanto,San José Xilotzingo,Puebla,Heroica Puebla de Zaragoza,72590', '18.9855038', '-98.2018416', 0, 0, 0),
(25, '23-05-20 02:32:52', 'Julián Vázquez Torres', 'julian.jvt51@gmail.com', 'Gua6oYdXw0y8xRiHafKyyg==', 'Casa', '8825511', '2225426228', 'Avenida 13 Poniente,5105,La Paz,Puebla,Heroica Puebla de Zaragoza,72160', '19.0510976', '-98.22370459999999', 0, 0, 0),
(26, '02-06-20 09:28:56', 'Gabriel García', 'gabointer@gmail.com', 'gTm/owYXHh3LSHcLGLKHAw==', 'Carrocerias Ecko', '7776550050', '2225984090', 'Juventino Sánchez Ita,Juventino Sanchez ita,Santa Catarina,Puebla,Puebla,72960', '18.975613', '-98.1665216', 0, 0, 0),
(27, '26-09-20 11:25:55', 'Miguel Avila Ríos', 'punkkustoms@live.com', 'r7Cs8QGFN6doow7bF7/g0Q==', 'Punk Kustoms', '', '2226811901', 'Calle Azteca Norte #4434 ,Camino Real ,Bello Horizonte,Puebla,Heroica Puebla de Zaragoza,72160', '19.050861', '-98.27005009999999', 0, 0, 0),
(28, '07-11-20 11:24:15', 'María Cedeño', 'jhmude@gmail.com', 'ODixyM1KxNVtbT5/M4jaEA==', 'Reforma', '2222222222', '2222222222', 'Avenida Paseo de la Reforma,Reforma,La paz,Puebla,Puebla,72100', '19.42971', '-99.16286099999999', 0, 0, 0),
(29, '08-01-21 03:00:10', 'Ernesto Uriel Carrillo Enriquez', 'arlux@msn.com', 'sSPVv3vyVO/w7Kuq90BI9g==', 'CIMA', '', '2228067112', 'Calle del Alamo,Alamo,Jesús González Ortega,Puebla,Heroica Puebla de Zaragoza,72040', '19.0789761', '-98.2150656', 0, 0, 0),
(30, '15-01-21 04:01:09', 'Hugo Velázquez González', 'dahianeydemian@gmail.com', '+bCN/bCz1/GbQtqt0vEWWQ==', 'DAHDEM', '', '2222564436', '42,José María la fragua ,San Cristóbal Tulcingo,Puebla,Heroica Puebla de Zaragoza,72100', '19.1159357', '-98.2144627', 0, 0, 0),
(31, '16-01-21 09:55:19', 'Fernando González', 'fergon1186@gmail.com', 'MBuC87USIdk8gyHwM+AudA==', 'NA', '2224682631', '2224682631', 'Moctezuma Sur,31,Los Angeles,Puebla,Puebla,72100', '21.4248342', '-102.5713499', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usocfdi`
--

CREATE TABLE `usocfdi` (
  `id` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usocfdi`
--

INSERT INTO `usocfdi` (`id`, `codigo`, `descripcion`) VALUES
(1, 'G01', 'Adquisición de mercancias'),
(2, 'G02', 'Devoluciones, descuentos o bonificaciones'),
(3, 'G03', 'Gastos en general'),
(4, 'I01', 'Construcciones'),
(5, 'I02', 'Mobilario y equipo de oficina por inversiones'),
(6, 'I03', 'Equipo de transporte'),
(7, 'I04', 'Equipo de computo y accesorios'),
(8, 'I05', 'Dados, troqueles, moldes, matrices y herramental'),
(9, 'I06', 'Comunicaciones telefónicas'),
(10, 'I07', 'Comunicaciones satelitales'),
(11, 'I08', 'Otra maquinaria y equipo'),
(12, 'D01', 'Honorarios médicos, dentales y gastos hospitalarios.'),
(13, 'D02', 'Gastos médicos por incapacidad o discapacidad'),
(14, 'D03', 'Gastos funerales.'),
(15, 'D04', 'Donativos.'),
(16, 'D05', 'Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación).'),
(17, 'D06', 'Aportaciones voluntarias al SAR.'),
(18, 'D07', 'Primas por seguros de gastos médicos.'),
(19, 'D08', 'Gastos de transportación escolar obligatoria.'),
(20, 'D09', 'Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones.'),
(21, 'D10', 'Pagos por servicios educativos (colegiaturas)'),
(22, 'P01', 'Por definir');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoriasmarca`
--
ALTER TABLE `categoriasmarca`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indices de la tabla `datosfacturacion`
--
ALTER TABLE `datosfacturacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ganadores`
--
ALTER TABLE `ganadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `masvendido`
--
ALTER TABLE `masvendido`
  ADD PRIMARY KEY (`idMvendido`);

--
-- Indices de la tabla `notificacionesapp`
--
ALTER TABLE `notificacionesapp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productoscatalogo`
--
ALTER TABLE `productoscatalogo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productossolicitudes`
--
ALTER TABLE `productossolicitudes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategoriadesglose`
--
ALTER TABLE `subcategoriadesglose`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategoriamarca`
--
ALTER TABLE `subcategoriamarca`
  ADD PRIMARY KEY (`idSubcategoria`);

--
-- Indices de la tabla `subcategoriasubdesglose`
--
ALTER TABLE `subcategoriasubdesglose`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usocfdi`
--
ALTER TABLE `usocfdi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `categoriasmarca`
--
ALTER TABLE `categoriasmarca`
  MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `datosfacturacion`
--
ALTER TABLE `datosfacturacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ganadores`
--
ALTER TABLE `ganadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `masvendido`
--
ALTER TABLE `masvendido`
  MODIFY `idMvendido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT de la tabla `notificacionesapp`
--
ALTER TABLE `notificacionesapp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productoscatalogo`
--
ALTER TABLE `productoscatalogo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=541;

--
-- AUTO_INCREMENT de la tabla `productossolicitudes`
--
ALTER TABLE `productossolicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `subcategoriadesglose`
--
ALTER TABLE `subcategoriadesglose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `subcategoriamarca`
--
ALTER TABLE `subcategoriamarca`
  MODIFY `idSubcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `subcategoriasubdesglose`
--
ALTER TABLE `subcategoriasubdesglose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `usocfdi`
--
ALTER TABLE `usocfdi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
