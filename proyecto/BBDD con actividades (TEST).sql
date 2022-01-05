-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-01-2022 a las 11:34:28
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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
