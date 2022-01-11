-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-01-2022 a las 15:26:45
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `daw2_actividades`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id` int(12) UNSIGNED NOT NULL,
  `titulo` text NOT NULL COMMENT 'Titulo corto o slogan para la actividad.',
  `descripcion` text DEFAULT NULL COMMENT 'Descripción breve de la actividad o NULL si no es necesaria.',
  `fecha_celebracion` datetime DEFAULT NULL COMMENT 'Fecha y Hora de celebración de la actividad o NULL si no se conoce (mostrar próximamente).',
  `duracion_estimada` int(6) NOT NULL DEFAULT 0 COMMENT 'Tiempo en Minutos de duración estimada de la actividad, si es CERO no se conoce o no es relevante.',
  `detalles_celebracion` text DEFAULT NULL COMMENT 'Detalles de celebración de la actividad si es necesario o NULL si no hay.',
  `direccion` text DEFAULT NULL COMMENT 'Dirección concreta del lugar de celebración de la actividad o NULL si no se conoce, aunque no debería estar vacío este dato.',
  `como_llegar` text DEFAULT NULL COMMENT 'Notas sobre cómo llegar a la dirección indicada o NULL si no hay indicaciones de como llegar.',
  `notas_lugar` text DEFAULT NULL COMMENT 'Notas adicionales sobre el lugar de celebración de la actividad que no forman parte de la dirección o de las indicaciones, o NULL si no hay.',
  `area_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Area/Zona de celebración de la actividad o CERO si no existe o aún no está indicado (como si fuera NULL).',
  `notas` text DEFAULT NULL COMMENT 'Notas adicionales sobre la actividad que no forman parte de las posibles notas anteriores o NULL si no hay.',
  `url` text DEFAULT NULL COMMENT 'Dirección web externa (opcional) que enlaza con la página "oficial" de la actividad o NULL si no hay.',
  `imagen_id` varchar(25) DEFAULT NULL COMMENT 'Nombre identificativo (fichero interno) con la imagen principal o "de presentación" de la actividad, o NULL si no hay.',
  `edad_id` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Edad recomendada por Rango de Edades: 0=Todas las edades, 1=Bebé (0 a 3 años), 2=Infantil (4 a 9), 3=Alevín (10 a 14), 3=Juvenil (15 a 17), 4=Adulto Joven (18-25), 5=Adulto Medio (26-35), 6=Adulto Mayor (36-65), 7=Tercera Edad (>66).',
  `publica` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de actividad para todos los usuarios o solo para los registrados: 0=Privada, 1=Publica.',
  `visible` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de actividad visible a los usuarios o invisible (se está manteniendo): 0=Invisible, 1=Visible.',
  `terminada` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de actividad terminada: 0=No, 1=Realizada, 2=Suspendida, 3=Cancelada por Inadecuada, ...',
  `fecha_terminacion` datetime DEFAULT NULL COMMENT 'Fecha y Hora de terminación de la actividad. Debería estar a NULL si no está terminada.',
  `notas_terminacion` text DEFAULT NULL COMMENT 'Notas visibles sobre el motivo de la terminación de la actividad.',
  `num_denuncias` int(9) NOT NULL DEFAULT 0 COMMENT 'Contador de denuncias de la actividad o CERO si no ha tenido.',
  `fecha_denuncia1` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la primera denuncia. Debería estar a NULL si no tiene denuncias (contador a cero), o si el contador se reinicia.',
  `bloqueada` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de actividad bloqueada: 0=No, 1=Si(bloqueada por denuncias), 2=Si(bloqueada por administrador), ...',
  `fecha_bloqueo` datetime DEFAULT NULL COMMENT 'Fecha y Hora del bloqueo de la actividad. Debería estar a NULL si no está bloqueada o si se desbloquea.',
  `notas_bloqueo` text DEFAULT NULL COMMENT 'Notas visibles sobre el motivo del bloqueo de la actividad o NULL si no hay -se muestra por defecto según indique "bloqueada"-.',
  `max_participantes` int(9) NOT NULL DEFAULT 0 COMMENT 'Indica si está abierta la participación y el número máximo de participantes que pueden apuntarse en la actividad, 0:No se admiten participantes, >0:Ese valor límite, -1:No hay límite máximo.',
  `min_participantes` int(9) NOT NULL DEFAULT 0 COMMENT 'Indica el número de participantes apuntados para que la actividad se lleve a cabo, >=0:Ese valor mínimo, -1:No hay mínimo.',
  `reserva_participantes` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Valor lógico para indicar si se admiten o no participantes en reserva en caso de que esté abierta la participación de la actividad con el "participantes_maxima".',
  `formulario_participacion` text DEFAULT NULL COMMENT 'Bloque de información con la configuración de los campos de datos requeridos para el formulario de registro de participación en la actividad. Será NULL si no necesita configuración de datos adicionales.',
  `votosOK` int(9) NOT NULL DEFAULT 0 COMMENT 'Contador de votos a favor para la actividad.',
  `votosKO` int(9) NOT NULL DEFAULT 0 COMMENT 'Contador de votos encontra para la actividad.',
  `crea_usuario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Usuario que ha creado la actividad o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `crea_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de creación de la actividad o NULL si no se conoce por algún motivo.',
  `modi_usuario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Usuario que ha modificado la actividad por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `modi_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la última modificación de la actividad o NULL si no se conoce por algún motivo.',
  `notas_admin` text DEFAULT NULL COMMENT 'Notas adicionales para los administradores sobre la actividad o NULL si no hay.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `titulo`, `descripcion`, `fecha_celebracion`, `duracion_estimada`, `detalles_celebracion`, `direccion`, `como_llegar`, `notas_lugar`, `area_id`, `notas`, `url`, `imagen_id`, `edad_id`, `publica`, `visible`, `terminada`, `fecha_terminacion`, `notas_terminacion`, `num_denuncias`, `fecha_denuncia1`, `bloqueada`, `fecha_bloqueo`, `notas_bloqueo`, `max_participantes`, `min_participantes`, `reserva_participantes`, `formulario_participacion`, `votosOK`, `votosKO`, `crea_usuario_id`, `crea_fecha`, `modi_usuario_id`, `modi_fecha`, `notas_admin`) VALUES
(1, 'Partido de Futbol Benefico contra el Cancer', 'Reliazacion de un partido de futbol benefico entre 2 equipos de 11 jugadores , para recaudar fondos para la asociacion Niños contra el Cancer ', '2022-02-10 18:00:00', 120, 'Sera obligatorio que los participantes acudan en el horario estipulado con una aportacion economica de 5 euros por jugador', 'C. del Mediodía, 12-36, 49026 Zamora', '', '', 0, '', '', '', 3, 1, 1, 0, '2022-02-10 20:30:00', 'Se debera dejar recogido y en condiciones optimas las pistas de futbol tras la realización de la actividad', 0, NULL, 0, NULL, '', 22, 11, 0, '', 0, 0, 0, NULL, 0, NULL, ''),
(2, 'Carrera San Silvestre\r\n', 'Realización de una carrera benefica por una circuito a lo largo de la ciudad\r\n', '2022-12-31 12:00:00', 60, 'Será necesario un equipamiento adecuado de calzado para la realización de la prueba, el donativo se hará antes de comenzar el evento\r\n', 'Plaza mayor de Zamora\r\n', '', '', 0, '', '', '', 0, 1, 0, 0, '2022-12-31 13:00:00', 'Se deberá recoger el diploma acreditador al final del recorrido\r\n', 0, NULL, 0, NULL, '', 10000, 10, 1, '', 0, 0, 0, NULL, 0, NULL, ''),
(3, 'Actividad de tiro con arco\r\n', 'Realización de una sesión de tiro con arco para iniciarse en el mundillo.\r\n', '2022-01-20 17:00:00', 90, 'Sera necesario vestir una ropa comoda, no es necesario tener ningun tipo de equipamiento relacionado con la actividad.\r\n', 'Ciudad deportiva de Zamora\r\n', '', '', 0, '', '', '', 2, 0, 0, 1, '2022-01-20 18:30:00', 'Al finalizar se realizará una encuesta y los interesados podrán apuntarse a las clases de tiro con arco', 0, NULL, 0, NULL, '', 30, 10, 1, '', 0, 0, 0, NULL, 0, NULL, ''),
(4, 'Cursos de programacion para jovenes orientados ', 'Realizacion de cursos para introducir a jovenes en la programacion ', '2022-01-30 18:00:00', 100, 'Se  dispondra de todo lo necesario para impatición de este curso en la universidad politecnica de Zamora', 'Universidad politecnica de Zamora, edificio Administrativo , Aula 2', '', '', 0, '', '', '', 4, 1, 0, 0, '2022-01-30 20:00:00', '', 0, NULL, 0, NULL, '', 20, 2, 0, '', 0, 0, 0, NULL, 0, NULL, ''),
(5, 'Curso de cocina para mayores\r\n', 'Realización de curso de cocina a nivel principiante\r\n', '2022-02-27 19:00:00', 120, 'Curso de cocina para inciarse en el mundo de la reposteria, no es necesaria experiencia previa.\r\n', 'Hotel AC Zamora\r\n', '', '', 0, '', '', '', 6, 1, 0, 0, '2022-02-27 21:00:00', 'Al finalizar el evento se procederá a la degustacion de los platos cocinados por parte de los participantes\r\n', 0, NULL, 0, NULL, '', 20, 4, 1, '', 0, 0, 0, NULL, 0, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_comentarios`
--

CREATE TABLE `actividad_comentarios` (
  `id` int(12) UNSIGNED NOT NULL,
  `actividad_id` int(12) UNSIGNED NOT NULL COMMENT 'Actividad relacionada',
  `crea_usuario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Usuario que ha creado el comentario o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `crea_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de creación del comentario o NULL si no se conoce por algún motivo.',
  `modi_usuario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Usuario que ha modificado el comentario por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `modi_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la última modificación del comentario o NULL si no se conoce por algún motivo.',
  `texto` text NOT NULL COMMENT 'El texto del comentario.',
  `comentario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Comentario relacionado, si se permiten encadenar respuestas. Nodo padre de la jerarquia de comentarios, CERO si es nodo raiz.',
  `cerrado` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de cierre de los comentarios: 0=No, 1=Si(No se puede responder al comentario)',
  `num_denuncias` int(9) NOT NULL DEFAULT 0 COMMENT 'Contador de denuncias del comentario o CERO si no ha tenido.',
  `fecha_denuncia1` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la primera denuncia. Debería estar a NULL si no tiene denuncias (contador a cero), o si el contador se reinicia.',
  `bloqueado` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de comentario bloqueado: 0=No, 1=Si(bloqueado por denuncias), 2=Si(bloqueado por administrador), ...',
  `fecha_bloqueo` datetime DEFAULT NULL COMMENT 'Fecha y Hora del bloqueo del comentario. Debería estar a NULL si no está bloqueado o si se desbloquea.',
  `notas_bloqueo` text DEFAULT NULL COMMENT 'Notas visibles sobre el motivo del bloqueo del comentario o NULL si no hay -se muestra por defecto según indique "bloqueado"-.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_etiquetas`
--

CREATE TABLE `actividad_etiquetas` (
  `id` int(12) UNSIGNED NOT NULL,
  `actividad_id` int(12) UNSIGNED NOT NULL COMMENT 'Actividad relacionada',
  `etiqueta_id` int(12) UNSIGNED NOT NULL COMMENT 'Etiqueta relacionada.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_imagenes`
--

CREATE TABLE `actividad_imagenes` (
  `id` int(12) UNSIGNED NOT NULL,
  `actividad_id` int(12) UNSIGNED NOT NULL COMMENT 'Actividad relacionada',
  `orden` int(3) NOT NULL DEFAULT 0 COMMENT 'Orden de aparición de la imagen dentro del grupo de imagenes de la actividad. Opcional.',
  `imagen_id` varchar(25) NOT NULL COMMENT 'Nombre identificativo (fichero interno) con la imagen para la actividad, aqui no puede ser NULL si no hay.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_participantes`
--

CREATE TABLE `actividad_participantes` (
  `id` int(12) UNSIGNED NOT NULL,
  `fecha_registro` datetime NOT NULL COMMENT 'Fecha y Hora de registro de participación en la actividad por parte del usuario.',
  `actividad_id` int(12) UNSIGNED NOT NULL COMMENT 'Actividad relacionada',
  `usuario_id` int(12) UNSIGNED NOT NULL COMMENT 'Usuario relacionado, que participara en la actividad.',
  `datos_participacion` text DEFAULT NULL COMMENT 'Datos adicionales del participante en su registro de participación. Será NULL mientras no haya un formulario de participación.',
  `fecha_cancelacion` datetime DEFAULT NULL COMMENT 'Fecha y Hora de cancelación de la participación por parte del usuario.',
  `notas_cancelacion` text DEFAULT NULL COMMENT 'Notas sobre el motivo de la cancelación de la participación del usuario o NULL si no lo indica o no hay.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividad_participantes`
--

INSERT INTO `actividad_participantes` (`id`, `fecha_registro`, `actividad_id`, `usuario_id`, `datos_participacion`, `fecha_cancelacion`, `notas_cancelacion`) VALUES
(1, '2022-01-03 00:00:00', 1, 2, '', '2022-10-05 00:00:00', ''),
(2, '2022-01-25 00:00:00', 3, 3, '', '2022-10-25 00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_patrocinios`
--

CREATE TABLE `actividad_patrocinios` (
  `id` int(12) UNSIGNED NOT NULL,
  `actividad_id` int(12) UNSIGNED NOT NULL COMMENT 'Actividad relacionada con un anuncio de patrocinio. Es la actividad que se patrocina por medio del/los anuncios.',
  `anuncio_id` int(12) UNSIGNED NOT NULL COMMENT 'Anuncio relacionado con la actividad.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_seguimientos`
--

CREATE TABLE `actividad_seguimientos` (
  `id` int(12) UNSIGNED NOT NULL,
  `actividad_id` int(12) UNSIGNED NOT NULL COMMENT 'Actividad relacionada',
  `usuario_id` int(12) UNSIGNED NOT NULL COMMENT 'Usuario relacionado, seguidor de la actividad.',
  `fecha_seguimiento` datetime NOT NULL COMMENT 'Fecha y Hora de activación del seguimiento de la actividad por parte del usuario.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE `anuncios` (
  `id` int(12) UNSIGNED NOT NULL,
  `titulo` text NOT NULL COMMENT 'Titulo corto o slogan para el anuncio.',
  `texto` text DEFAULT NULL COMMENT 'Texto o descripción del anuncio o NULL si no es necesario.',
  `imagen_id` varchar(25) DEFAULT NULL COMMENT 'Nombre identificativo (fichero interno) con la imagen principal o "de presentación" del anuncio o NULL si no hay (que sería raro).',
  `crea_usuario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Usuario que ha creado el anuncio o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `crea_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de creación del anuncio o NULL si no se conoce por algún motivo.',
  `modi_usuario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Usuario que ha modificado el anuncio por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `modi_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la última modificación del anuncio o NULL si no se conoce por algún motivo.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios_etiquetas`
--

CREATE TABLE `anuncios_etiquetas` (
  `id` int(12) UNSIGNED NOT NULL,
  `anuncio_id` int(12) UNSIGNED NOT NULL COMMENT 'Actividad relacionada',
  `etiqueta_id` int(12) UNSIGNED NOT NULL COMMENT 'Etiqueta relacionada.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` int(12) UNSIGNED NOT NULL,
  `clase_area_id` char(1) NOT NULL COMMENT 'Código de clase de area: 0=Planeta, 1=Continente, 2=Pais, 3=Estado, 4=Region, 5=Provincia, 6=Poblacion, 7=Barrio, 8=Zona, ...',
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre del area que lo identifica.',
  `area_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Area relacionada. Nodo padre de la jerarquia o CERO si es nodo raiz.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificaciones`
--

CREATE TABLE `clasificaciones` (
  `id` int(12) UNSIGNED NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `descripcion` text DEFAULT NULL COMMENT 'Texto adicional que describe la categoria o clasificación para las etiquetas que engloba.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion_etiquetas`
--

CREATE TABLE `clasificacion_etiquetas` (
  `id` int(12) UNSIGNED NOT NULL,
  `clasificacion_id` int(12) UNSIGNED NOT NULL COMMENT 'Clasificacion relacionada, para saber a que grupo pertenece.',
  `etiqueta_id` int(12) UNSIGNED NOT NULL COMMENT 'Etiqueta relacionada.',
  `clasificacion_etiqueta_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Clasificacion_Etiqueta relacionada. Nodo padre de la jerarquia o CERO si es nodo raiz.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones`
--

CREATE TABLE `configuraciones` (
  `variable` varchar(50) NOT NULL,
  `valor` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `configuraciones`
--

INSERT INTO `configuraciones` (`variable`, `valor`) VALUES
('LineasPagina', '10'),
('LineasPagina.Avisos', '50'),
('LineasPagina.Portada', '15'),
('numero_actividades_portada', '10'),
('numero_denuncias_actividad', '5'),
('numero_denuncias_comentario', '10'),
('numero_intentos_usuario', '3'),
('numero_lineas_pagina', '20'),
('tiempo_agrupar_avisos', '8'),
('tiempo_borrar_avisos_leidos', '7'),
('tiempo_eliminar_avisos_borrados', '7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id` int(12) UNSIGNED NOT NULL,
  `nombre` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(12) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL COMMENT 'Fecha y Hora del mensaje de LOG.',
  `clase_log_id` char(1) NOT NULL COMMENT 'código de clase de log: E=Error, A=Aviso, S=Seguimiento, I=Información, D=Depuración, ...',
  `modulo` text DEFAULT 'app' COMMENT 'Modulo o Sección de la aplicación que ha generado el mensaje de LOG.',
  `texto` text DEFAULT NULL COMMENT 'Texto con el mensaje de LOG.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(12) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL COMMENT 'Correo Electronico y "login" del usuario.',
  `password` varchar(60) NOT NULL,
  `nick` varchar(25) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL COMMENT 'Fecha de nacimiento del usuario o NULL si no lo quiere informar.',
  `direccion` text DEFAULT NULL COMMENT 'Direccion del usuario o NULL si no quiere informar.',
  `area_id` int(12) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Area/Zona de localización del usuario o CERO si no lo quiere informar (como si fuera NULL), aunque es recomendable.',
  `rol` char(1) NOT NULL COMMENT 'Código de la Clase / Tipo de Perfil: N=Normal, M=Moderador, P=Patrocinador, A=Administrador',
  `avisos_por_correo` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Indicador de si el usuario desea recibir correos con los avisos que se generan en el sistema para él o no.',
  `avisos_agrupados` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de si los avisos se envian directamente al generarlos, se agrupan en un solo correo, o lo que sea.',
  `avisos_marcar_leidos` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de marcar los correos leidos como borrados después de un tiempo  0:No marcar, >0:tiempo en días.',
  `avisos_eliminar_borrados` int(3) NOT NULL DEFAULT 0 COMMENT 'Indicador para eliminar los correos borrados tras el tiempo indicado: >=1 día y <=1 año, o como se considere oportuno.',
  `fecha_registro` datetime DEFAULT NULL COMMENT 'Fecha y Hora de registro del usuario o NULL si no se conoce por algún motivo (que no debería ser).',
  `confirmado` tinyint(1) NOT NULL COMMENT 'Indicador de usuario ha confirmado su registro o no.',
  `fecha_acceso` datetime DEFAULT NULL COMMENT 'Fecha y Hora del ultimo acceso del usuario. Debería estar a NULL si no ha accedido nunca.',
  `num_accesos` int(9) NOT NULL DEFAULT 0 COMMENT 'Contador de accesos fallidos del usuario o CERO si no ha tenido o se ha reiniciado por un acceso valido o por un administrador.',
  `bloqueado` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Indicador de usuario bloqueado: 0=No, 1=Si(bloqueada por accesos), 2=Si(bloqueada por administrador), ...',
  `fecha_bloqueo` datetime DEFAULT NULL COMMENT 'Fecha y Hora del bloqueo del usuario. Debería estar a NULL si no está bloqueado o si se desbloquea.',
  `notas_bloqueo` text DEFAULT NULL COMMENT 'Notas visibles sobre el motivo del bloqueo del usuario o NULL si no hay -se muestra por defecto según indique "bloqueado"-.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `nick`, `nombre`, `apellidos`, `fecha_nacimiento`, `direccion`, `area_id`, `rol`, `avisos_por_correo`, `avisos_agrupados`, `avisos_marcar_leidos`, `avisos_eliminar_borrados`, `fecha_registro`, `confirmado`, `fecha_acceso`, `num_accesos`, `bloqueado`, `fecha_bloqueo`, `notas_bloqueo`) VALUES
(1, 'marcos.sdafsaf@gmail.com', 'admin', 'admin', 'Pepe', 'Garcia ', '1996-03-03', 'Calle jose', 49564, 'A', 0, 0, 0, 0, '2022-01-07 11:32:57', 1, '2022-01-07 11:32:57', 0, 0, NULL, ''),
(2, 'pedro@pedro.es', 'pedro', 'pedro', 'Pedro', 'Rodriguez', '1998-03-12', 'Avenida de Portugal, 25, Salamanca', 37005, 'N', 0, 0, 0, 0, '2022-01-11 10:34:08', 1, '2022-01-11 10:34:08', 0, 0, NULL, ''),
(3, 'jeb@usal.es', 'juaniko', 'juanito33', 'Juan', 'Rodriguez Mulas', '1999-12-12', 'Calle Príncipe, 23 , Salamanca', 37006, 'N', 0, 0, 0, 0, '2022-01-11 10:35:39', 0, '2022-01-11 10:35:39', 0, 0, NULL, ''),
(4, 'google@gmail.com', 'pedrito99', 'jjMMJJ', 'Maria Jose', 'Lopez Obrador', '1983-12-04', 'Madrid', 28006, 'N', 0, 0, 0, 0, '2022-01-11 10:37:15', 0, '2022-01-11 10:37:15', 0, 0, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_area_moderacion`
--

CREATE TABLE `usuarios_area_moderacion` (
  `id` int(12) UNSIGNED NOT NULL,
  `usuario_id` int(12) UNSIGNED NOT NULL COMMENT 'Usuario relacionado con un Area para su moderación.',
  `area_id` int(12) UNSIGNED NOT NULL COMMENT 'Area relacionada con el Usuario que puede moderarla.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_avisos`
--

CREATE TABLE `usuario_avisos` (
  `id` int(12) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL COMMENT 'Fecha y Hora de creación del aviso.',
  `clase_aviso_id` char(1) NOT NULL DEFAULT 'M' COMMENT 'código de clase de aviso: A=Aviso, N=Notificación, D=Denuncia, C=Consulta, M=Mensaje Genérico,...',
  `texto` text DEFAULT NULL COMMENT 'Texto con el mensaje de aviso.',
  `destino_usuario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Usuario relacionado, destinatario del aviso, o NULL si no es para administración y no está gestionado.',
  `origen_usuario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Usuario relacionado, origen del aviso, o NULL si es del sistema.',
  `actividad_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Actividad relacionada o NULL si no tiene que ver con una actividad.',
  `comentario_id` int(12) UNSIGNED DEFAULT 0 COMMENT 'Comentario relacionado o NULL si no tiene que ver con un comentario.',
  `fecha_lectura` datetime DEFAULT NULL COMMENT 'Fecha y Hora de lectura del aviso o NULL si no se ha leido o se ha desmarcado como tal.',
  `fecha_borrado` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la marca de borrado del aviso o NULL si no se ha marcado como borrado.',
  `fecha_aceptado` datetime DEFAULT NULL COMMENT 'Fecha y Hora de aceptación del aviso o NULL si no se ha aceptado para su gestión por un moderador o administrador. No se usa en otros usuarios.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `actividad_comentarios`
--
ALTER TABLE `actividad_comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `actividad_etiquetas`
--
ALTER TABLE `actividad_etiquetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `actividad_imagenes`
--
ALTER TABLE `actividad_imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `actividad_participantes`
--
ALTER TABLE `actividad_participantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `actividad_patrocinios`
--
ALTER TABLE `actividad_patrocinios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `actividad_seguimientos`
--
ALTER TABLE `actividad_seguimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `anuncios_etiquetas`
--
ALTER TABLE `anuncios_etiquetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clasificaciones`
--
ALTER TABLE `clasificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clasificacion_etiquetas`
--
ALTER TABLE `clasificacion_etiquetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuraciones`
--
ALTER TABLE `configuraciones`
  ADD PRIMARY KEY (`variable`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `nick_UNIQUE` (`nick`);

--
-- Indices de la tabla `usuarios_area_moderacion`
--
ALTER TABLE `usuarios_area_moderacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_avisos`
--
ALTER TABLE `usuario_avisos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `actividad_comentarios`
--
ALTER TABLE `actividad_comentarios`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `actividad_etiquetas`
--
ALTER TABLE `actividad_etiquetas`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `actividad_imagenes`
--
ALTER TABLE `actividad_imagenes`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `actividad_participantes`
--
ALTER TABLE `actividad_participantes`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `actividad_patrocinios`
--
ALTER TABLE `actividad_patrocinios`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `actividad_seguimientos`
--
ALTER TABLE `actividad_seguimientos`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `anuncios_etiquetas`
--
ALTER TABLE `anuncios_etiquetas`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clasificaciones`
--
ALTER TABLE `clasificaciones`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clasificacion_etiquetas`
--
ALTER TABLE `clasificacion_etiquetas`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios_area_moderacion`
--
ALTER TABLE `usuarios_area_moderacion`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_avisos`
--
ALTER TABLE `usuario_avisos`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
