-- --------------------------------------------------------------------------
-- Esquema de la Base de Datos para una tienda virtual
-- (c) DAW2 - EPSZ - Universidad Salamanca
-- --------------------------------------------------------------------------

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
SET AUTOCOMMIT=0;
START TRANSACTION;
-- --------------------------------------------------------
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------
-- Base de datos: `daw_tienda`
-- --------------------------------------------------------
DROP DATABASE IF EXISTS `daw_tienda`;
CREATE DATABASE IF NOT EXISTS `daw_tienda`
  CHARACTER SET 'utf8'
  COLLATE 'utf8_general_ci';
  
USE `daw_tienda`;

-- --------------------------------------------------------
-- Tabla: 'articulos'
-- --------------------------------------------------------
DROP TABLE IF EXISTS `articulos`;
CREATE TABLE IF NOT EXISTS `articulos` (
  `referencia` varchar(10) NOT NULL COMMENT 'Referencia unica del articulo, creada por el usuarioa su conveniencia',
  `texto` varchar(250) NOT NULL COMMENT 'Texto descriptivo del articulo',
  `precio` float NOT NULL COMMENT 'Precio del articulo con 2 decimales',
  `iva` float NOT NULL COMMENT 'Tipo de IVA del articulo en porcentaje',
  `notas` text COMMENT 'Notas internas para el Articulo',  
  PRIMARY KEY (`referencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------
-- Tabla: 'clientes'
-- --------------------------------------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `referencia` varchar(10) NOT NULL COMMENT 'Referencia unica del cliente, creada por el usuarioa su conveniencia',
  `cifnif` varchar(10) NOT NULL,
  `nombre` varchar(250) NOT NULL COMMENT 'Nombre del cliente o Nombre Comercial de la empresa',
  `apellidos` varchar(250) NOT NULL COMMENT 'Apellidos del cliente o Razón Social de la empresa',
  `domFiscal` varchar(250) NOT NULL COMMENT 'Domicilio Fiscal para Facturas',
  `domEnvio` varchar(250) COMMENT 'Domicilio para los envíos de correo al cliente, si no se indica se usa el Fiscal',
  `notas` text COMMENT 'Notas internas para el Cliente',
  
  `email` varchar(100) NOT NULL COMMENT 'Correo electronico del cliente y a la vez login de acceso al sistema',
  `password` varchar(32) NOT NULL COMMENT 'Clave de acceso al sistema con espacio para un md5',
  PRIMARY KEY (`referencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------
-- Tabla: 'pedidos'
-- --------------------------------------------------------
DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `serie` varchar(4) NOT NULL COMMENT 'Serie del Pedido como un texto o el año en curso',
  `numero` int(6) NOT NULL COMMENT 'Numero del pedido que debe ser unico dentro de la serie',
  `fecha` date NOT NULL COMMENT 'Fecha del pedido en formato sql "AAAA-MM-DD"',
  `refCli` varchar(10) NOT NULL COMMENT 'Cliente asociado al pedido',
  `domEnvio` varchar(250) NOT NULL COMMENT 'Domicilio de envio del pedido, se propone el que tiene el cliente pero se puede modificar',
  `estado` int(1) NOT NULL DEFAULT '0' COMMENT 'Estado del Pedido: 0=Abierto/Pendiente, 1=Bloqueado/Preparacion, 2=Bloqueado/Enviado, 3=Cerrado/Recibido, 4=Cerrado/Anulado',
  `notas` text COMMENT 'Notas internas para el Pedido',
  PRIMARY KEY (`serie`,`numero`),
  KEY `refCli` (`refCli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------
-- Tabla: 'pedidoslin'
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedidoslin` (
  `idLinea` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la linea del pedido para facilitar los accesos',
  `serie` varchar(4) NOT NULL COMMENT 'Serie del pedido al que pertenece la linea',
  `numero` int(6) NOT NULL COMMENT 'Numero del pedido al que pertenece la linea',
  `orden` int(5) NOT NULL COMMENT 'Orden de la linea dentro del pedido, se deberia poder cambiar una linea de posicion en el orden',
  `refArt` varchar(10) COMMENT 'Articulo asociado a la linea o "NULO" si es linea de texto libre',
  `texto` text NOT NULL COMMENT 'Texto copiado del articulo o el texto libre que se haya introducido',
  `cantidad` int(5) NOT NULL COMMENT 'Cantidad de unidades, puede ser negativo para devoluciones',
  `precio` float NOT NULL COMMENT 'Precio del articulo con 2 decimales, copiado inicialmente del articulo pero modificable, no deberia ser negativo',
  `iva` float NOT NULL COMMENT 'Tipo de IVA del articulo en porcentaje, copiado inicialmente del articulo',
  `importeBase` float NOT NULL COMMENT 'Importe precalculado de la Cantidad * Precio, para facilitar su tratamiento',
  `cuotaIva` float NOT NULL COMMENT 'Importe precalculado del importeBase * iva / 100, para facilitar su tratamiento',
  PRIMARY KEY (`idLinea`),
  KEY `refArt` (`refArt`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;




-- --------------------------------------------------------
-- Volcado de datos para la tabla `articulos`
-- --------------------------------------------------------

-- --------------------------------------------------------
-- Volcado de datos para la tabla `cliente`
-- --------------------------------------------------------

-- --------------------------------------------------------
-- Volcado de datos para la tabla `pedidos`
-- --------------------------------------------------------

-- --------------------------------------------------------
-- Volcado de datos para la tabla `pedidoslin`
-- --------------------------------------------------------


-- --------------------------------------------------------
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

SET FOREIGN_KEY_CHECKS=1;

COMMIT;
