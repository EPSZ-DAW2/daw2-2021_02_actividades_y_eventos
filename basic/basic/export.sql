-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: daw2_actividades
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `actividad_comentarios`
--

DROP TABLE IF EXISTS `actividad_comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actividad_comentarios` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `actividad_id` int unsigned NOT NULL COMMENT 'Actividad relacionada',
  `crea_usuario_id` int unsigned DEFAULT '0' COMMENT 'Usuario que ha creado el comentario o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `crea_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de creación del comentario o NULL si no se conoce por algún motivo.',
  `modi_usuario_id` int unsigned DEFAULT '0' COMMENT 'Usuario que ha modificado el comentario por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `modi_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la última modificación del comentario o NULL si no se conoce por algún motivo.',
  `texto` text NOT NULL COMMENT 'El texto del comentario.',
  `comentario_id` int unsigned DEFAULT '0' COMMENT 'Comentario relacionado, si se permiten encadenar respuestas. Nodo padre de la jerarquia de comentarios, CERO si es nodo raiz.',
  `cerrado` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de cierre de los comentarios: 0=No, 1=Si(No se puede responder al comentario)',
  `num_denuncias` int NOT NULL DEFAULT '0' COMMENT 'Contador de denuncias del comentario o CERO si no ha tenido.',
  `fecha_denuncia1` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la primera denuncia. Debería estar a NULL si no tiene denuncias (contador a cero), o si el contador se reinicia.',
  `bloqueado` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de comentario bloqueado: 0=No, 1=Si(bloqueado por denuncias), 2=Si(bloqueado por administrador), ...',
  `fecha_bloqueo` datetime DEFAULT NULL COMMENT 'Fecha y Hora del bloqueo del comentario. Debería estar a NULL si no está bloqueado o si se desbloquea.',
  `notas_bloqueo` text COMMENT 'Notas visibles sobre el motivo del bloqueo del comentario o NULL si no hay -se muestra por defecto según indique "bloqueado"-.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividad_comentarios`
--

LOCK TABLES `actividad_comentarios` WRITE;
/*!40000 ALTER TABLE `actividad_comentarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `actividad_comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actividad_etiquetas`
--

DROP TABLE IF EXISTS `actividad_etiquetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actividad_etiquetas` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `actividad_id` int unsigned NOT NULL COMMENT 'Actividad relacionada',
  `etiqueta_id` int unsigned NOT NULL COMMENT 'Etiqueta relacionada.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividad_etiquetas`
--

LOCK TABLES `actividad_etiquetas` WRITE;
/*!40000 ALTER TABLE `actividad_etiquetas` DISABLE KEYS */;
INSERT INTO `actividad_etiquetas` VALUES (1,0,1),(2,3,2),(3,0,1),(4,0,3),(5,3,2),(6,1,1),(7,1,3),(8,3,2),(9,2,3);
/*!40000 ALTER TABLE `actividad_etiquetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actividad_imagenes`
--

DROP TABLE IF EXISTS `actividad_imagenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actividad_imagenes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `actividad_id` int unsigned NOT NULL COMMENT 'Actividad relacionada',
  `orden` int NOT NULL DEFAULT '0' COMMENT 'Orden de aparición de la imagen dentro del grupo de imagenes de la actividad. Opcional.',
  `imagen_id` varchar(25) NOT NULL COMMENT 'Nombre identificativo (fichero interno) con la imagen para la actividad, aqui no puede ser NULL si no hay.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividad_imagenes`
--

LOCK TABLES `actividad_imagenes` WRITE;
/*!40000 ALTER TABLE `actividad_imagenes` DISABLE KEYS */;
/*!40000 ALTER TABLE `actividad_imagenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actividad_participantes`
--

DROP TABLE IF EXISTS `actividad_participantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actividad_participantes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `fecha_registro` datetime NOT NULL COMMENT 'Fecha y Hora de registro de participación en la actividad por parte del usuario.',
  `actividad_id` int unsigned NOT NULL COMMENT 'Actividad relacionada',
  `usuario_id` int unsigned NOT NULL COMMENT 'Usuario relacionado, que participara en la actividad.',
  `datos_participacion` text COMMENT 'Datos adicionales del participante en su registro de participación. Será NULL mientras no haya un formulario de participación.',
  `fecha_cancelacion` datetime DEFAULT NULL COMMENT 'Fecha y Hora de cancelación de la participación por parte del usuario.',
  `notas_cancelacion` text COMMENT 'Notas sobre el motivo de la cancelación de la participación del usuario o NULL si no lo indica o no hay.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividad_participantes`
--

LOCK TABLES `actividad_participantes` WRITE;
/*!40000 ALTER TABLE `actividad_participantes` DISABLE KEYS */;
INSERT INTO `actividad_participantes` VALUES (3,'2022-12-12 00:00:00',0,1,'Dato del participante','2022-12-13 00:00:00','cancelacion nota'),(4,'2022-12-12 00:00:00',0,1,'Dato del participante','2022-12-13 00:00:00','cancelacion nota'),(5,'2022-12-12 00:00:00',0,1,'Dato del participante','2022-12-13 00:00:00','cancelacion nota'),(6,'2022-12-12 00:00:00',0,1,'Dato del participante','2022-12-13 00:00:00','cancelacion nota'),(7,'2022-12-12 00:00:00',0,1,'Dato del participante','2022-12-13 00:00:00','cancelacion nota'),(8,'2022-12-12 00:00:00',1,1,'Dato del participante','2022-12-13 00:00:00','cancelacion nota');
/*!40000 ALTER TABLE `actividad_participantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actividad_patrocinios`
--

DROP TABLE IF EXISTS `actividad_patrocinios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actividad_patrocinios` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `actividad_id` int unsigned NOT NULL COMMENT 'Actividad relacionada con un anuncio de patrocinio. Es la actividad que se patrocina por medio del/los anuncios.',
  `anuncio_id` int unsigned NOT NULL COMMENT 'Anuncio relacionado con la actividad.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividad_patrocinios`
--

LOCK TABLES `actividad_patrocinios` WRITE;
/*!40000 ALTER TABLE `actividad_patrocinios` DISABLE KEYS */;
/*!40000 ALTER TABLE `actividad_patrocinios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actividad_seguimientos`
--

DROP TABLE IF EXISTS `actividad_seguimientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actividad_seguimientos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `actividad_id` int unsigned NOT NULL COMMENT 'Actividad relacionada',
  `usuario_id` int unsigned NOT NULL COMMENT 'Usuario relacionado, seguidor de la actividad.',
  `fecha_seguimiento` datetime NOT NULL COMMENT 'Fecha y Hora de activación del seguimiento de la actividad por parte del usuario.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividad_seguimientos`
--

LOCK TABLES `actividad_seguimientos` WRITE;
/*!40000 ALTER TABLE `actividad_seguimientos` DISABLE KEYS */;
/*!40000 ALTER TABLE `actividad_seguimientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actividades`
--

DROP TABLE IF EXISTS `actividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actividades` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL COMMENT 'Titulo corto o slogan para la actividad.',
  `descripcion` text COMMENT 'Descripción breve de la actividad o NULL si no es necesaria.',
  `fecha_celebracion` datetime DEFAULT NULL COMMENT 'Fecha y Hora de celebración de la actividad o NULL si no se conoce (mostrar próximamente).',
  `duracion_estimada` int NOT NULL DEFAULT '0' COMMENT 'Tiempo en Minutos de duración estimada de la actividad, si es CERO no se conoce o no es relevante.',
  `detalles_celebracion` text COMMENT 'Detalles de celebración de la actividad si es necesario o NULL si no hay.',
  `direccion` text COMMENT 'Dirección concreta del lugar de celebración de la actividad o NULL si no se conoce, aunque no debería estar vacío este dato.',
  `como_llegar` text COMMENT 'Notas sobre cómo llegar a la dirección indicada o NULL si no hay indicaciones de como llegar.',
  `notas_lugar` text COMMENT 'Notas adicionales sobre el lugar de celebración de la actividad que no forman parte de la dirección o de las indicaciones, o NULL si no hay.',
  `area_id` int unsigned DEFAULT '0' COMMENT 'Area/Zona de celebración de la actividad o CERO si no existe o aún no está indicado (como si fuera NULL).',
  `notas` text COMMENT 'Notas adicionales sobre la actividad que no forman parte de las posibles notas anteriores o NULL si no hay.',
  `url` text COMMENT 'Dirección web externa (opcional) que enlaza con la página "oficial" de la actividad o NULL si no hay.',
  `imagen_id` varchar(25) DEFAULT NULL COMMENT 'Nombre identificativo (fichero interno) con la imagen principal o "de presentación" de la actividad, o NULL si no hay.',
  `edad_id` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Edad recomendada por Rango de Edades: 0=Todas las edades, 1=Bebé (0 a 3 años), 2=Infantil (4 a 9), 3=Alevín (10 a 14), 3=Juvenil (15 a 17), 4=Adulto Joven (18-25), 5=Adulto Medio (26-35), 6=Adulto Mayor (36-65), 7=Tercera Edad (>66).',
  `publica` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de actividad para todos los usuarios o solo para los registrados: 0=Privada, 1=Publica.',
  `visible` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de actividad visible a los usuarios o invisible (se está manteniendo): 0=Invisible, 1=Visible.',
  `terminada` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de actividad terminada: 0=No, 1=Realizada, 2=Suspendida, 3=Cancelada por Inadecuada, ...',
  `fecha_terminacion` datetime DEFAULT NULL COMMENT 'Fecha y Hora de terminación de la actividad. Debería estar a NULL si no está terminada.',
  `notas_terminacion` text COMMENT 'Notas visibles sobre el motivo de la terminación de la actividad.',
  `num_denuncias` int NOT NULL DEFAULT '0' COMMENT 'Contador de denuncias de la actividad o CERO si no ha tenido.',
  `fecha_denuncia1` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la primera denuncia. Debería estar a NULL si no tiene denuncias (contador a cero), o si el contador se reinicia.',
  `bloqueada` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de actividad bloqueada: 0=No, 1=Si(bloqueada por denuncias), 2=Si(bloqueada por administrador), ...',
  `fecha_bloqueo` datetime DEFAULT NULL COMMENT 'Fecha y Hora del bloqueo de la actividad. Debería estar a NULL si no está bloqueada o si se desbloquea.',
  `notas_bloqueo` text COMMENT 'Notas visibles sobre el motivo del bloqueo de la actividad o NULL si no hay -se muestra por defecto según indique "bloqueada"-.',
  `max_participantes` int NOT NULL DEFAULT '0' COMMENT 'Indica si está abierta la participación y el número máximo de participantes que pueden apuntarse en la actividad, 0:No se admiten participantes, >0:Ese valor límite, -1:No hay límite máximo.',
  `min_participantes` int NOT NULL DEFAULT '0' COMMENT 'Indica el número de participantes apuntados para que la actividad se lleve a cabo, >=0:Ese valor mínimo, -1:No hay mínimo.',
  `reserva_participantes` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Valor lógico para indicar si se admiten o no participantes en reserva en caso de que esté abierta la participación de la actividad con el "participantes_maxima".',
  `formulario_participacion` text COMMENT 'Bloque de información con la configuración de los campos de datos requeridos para el formulario de registro de participación en la actividad. Será NULL si no necesita configuración de datos adicionales.',
  `votosOK` int NOT NULL DEFAULT '0' COMMENT 'Contador de votos a favor para la actividad.',
  `votosKO` int NOT NULL DEFAULT '0' COMMENT 'Contador de votos encontra para la actividad.',
  `crea_usuario_id` int unsigned DEFAULT '0' COMMENT 'Usuario que ha creado la actividad o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `crea_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de creación de la actividad o NULL si no se conoce por algún motivo.',
  `modi_usuario_id` int unsigned DEFAULT '0' COMMENT 'Usuario que ha modificado la actividad por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `modi_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la última modificación de la actividad o NULL si no se conoce por algún motivo.',
  `notas_admin` text COMMENT 'Notas adicionales para los administradores sobre la actividad o NULL si no hay.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividades`
--

LOCK TABLES `actividades` WRITE;
/*!40000 ALTER TABLE `actividades` DISABLE KEYS */;
INSERT INTO `actividades` VALUES (1,'Partido de Futbol Benefico contra el Cancer','Reliazacion de un partido de futbol benefico entre 2 equipos de 11 jugadores , para recaudar fondos para la asociacion Niños contra el Cancer ','2022-02-10 18:00:00',120,'Sera obligatorio que los participantes acudan en el horario estipulado con una aportacion economica de 5 euros por jugador','C. del Mediodía, 12-36, 49026 Zamora','','',0,'','','',3,1,1,0,'2022-02-10 20:30:00','Se debera dejar recogido y en condiciones optimas las pistas de futbol tras la realización de la actividad',0,NULL,0,NULL,'',22,11,0,'',0,0,0,NULL,0,NULL,''),(2,'Carrera San Silvestre\r\n','Realización de una carrera benefica por una circuito a lo largo de la ciudad\r\n','2022-12-31 12:00:00',60,'Será necesario un equipamiento adecuado de calzado para la realización de la prueba, el donativo se hará antes de comenzar el evento\r\n','Plaza mayor de Zamora\r\n','','',0,'','','',0,1,0,0,'2022-12-31 13:00:00','Se deberá recoger el diploma acreditador al final del recorrido\r\n',0,NULL,0,NULL,'',10000,10,1,'',0,0,0,NULL,0,NULL,''),(3,'Actividad de tiro con arco\r\n','Realización de una sesión de tiro con arco para iniciarse en el mundillo.\r\n','2022-01-20 17:00:00',90,'Sera necesario vestir una ropa comoda, no es necesario tener ningun tipo de equipamiento relacionado con la actividad.\r\n','Ciudad deportiva de Zamora\r\n','','',0,'','','',2,0,0,1,'2022-01-20 18:30:00','Al finalizar se realizará una encuesta y los interesados podrán apuntarse a las clases de tiro con arco',0,NULL,0,NULL,'',30,10,1,'',0,0,0,NULL,0,NULL,''),(4,'Cursos de programacion para jovenes orientados ','Realizacion de cursos para introducir a jovenes en la programacion ','2022-01-30 18:00:00',100,'Se  dispondra de todo lo necesario para impatición de este curso en la universidad politecnica de Zamora','Universidad politecnica de Zamora, edificio Administrativo , Aula 2','','',0,'','','',4,1,0,0,'2022-01-30 20:00:00','',0,NULL,0,NULL,'',20,2,0,'',0,0,0,NULL,0,NULL,''),(5,'Curso de cocina para mayores\r\n','Realización de curso de cocina a nivel principiante\r\n','2022-02-27 19:00:00',120,'Curso de cocina para inciarse en el mundo de la reposteria, no es necesaria experiencia previa.\r\n','Hotel AC Zamora\r\n','','',0,'','','',6,1,0,0,'2022-02-27 21:00:00','Al finalizar el evento se procederá a la degustacion de los platos cocinados por parte de los participantes\r\n',0,NULL,0,NULL,'',20,4,1,'',0,0,0,NULL,0,NULL,'');
/*!40000 ALTER TABLE `actividades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anuncios`
--

DROP TABLE IF EXISTS `anuncios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anuncios` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL COMMENT 'Titulo corto o slogan para el anuncio.',
  `texto` text COMMENT 'Texto o descripción del anuncio o NULL si no es necesario.',
  `imagen_id` varchar(25) DEFAULT NULL COMMENT 'Nombre identificativo (fichero interno) con la imagen principal o "de presentación" del anuncio o NULL si no hay (que sería raro).',
  `crea_usuario_id` int unsigned DEFAULT '0' COMMENT 'Usuario que ha creado el anuncio o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `crea_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de creación del anuncio o NULL si no se conoce por algún motivo.',
  `modi_usuario_id` int unsigned DEFAULT '0' COMMENT 'Usuario que ha modificado el anuncio por última vez o CERO (como si fuera NULL) si no existe o se hizo por un administrador de sistema.',
  `modi_fecha` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la última modificación del anuncio o NULL si no se conoce por algún motivo.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anuncios`
--

LOCK TABLES `anuncios` WRITE;
/*!40000 ALTER TABLE `anuncios` DISABLE KEYS */;
/*!40000 ALTER TABLE `anuncios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `anuncios_etiquetas`
--

DROP TABLE IF EXISTS `anuncios_etiquetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anuncios_etiquetas` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `anuncio_id` int unsigned NOT NULL COMMENT 'Actividad relacionada',
  `etiqueta_id` int unsigned NOT NULL COMMENT 'Etiqueta relacionada.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anuncios_etiquetas`
--

LOCK TABLES `anuncios_etiquetas` WRITE;
/*!40000 ALTER TABLE `anuncios_etiquetas` DISABLE KEYS */;
/*!40000 ALTER TABLE `anuncios_etiquetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `areas` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `clase_area_id` char(1) NOT NULL COMMENT 'Código de clase de area: 0=Planeta, 1=Continente, 2=Pais, 3=Estado, 4=Region, 5=Provincia, 6=Poblacion, 7=Barrio, 8=Zona, ...',
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre del area que lo identifica.',
  `area_id` int unsigned DEFAULT '0' COMMENT 'Area relacionada. Nodo padre de la jerarquia o CERO si es nodo raiz.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49565 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (3,'1','natacion',0);
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clasificacion_etiquetas`
--

DROP TABLE IF EXISTS `clasificacion_etiquetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clasificacion_etiquetas` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `clasificacion_id` int unsigned NOT NULL COMMENT 'Clasificacion relacionada, para saber a que grupo pertenece.',
  `etiqueta_id` int unsigned NOT NULL COMMENT 'Etiqueta relacionada.',
  `clasificacion_etiqueta_id` int unsigned DEFAULT '0' COMMENT 'Clasificacion_Etiqueta relacionada. Nodo padre de la jerarquia o CERO si es nodo raiz.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clasificacion_etiquetas`
--

LOCK TABLES `clasificacion_etiquetas` WRITE;
/*!40000 ALTER TABLE `clasificacion_etiquetas` DISABLE KEYS */;
/*!40000 ALTER TABLE `clasificacion_etiquetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clasificaciones`
--

DROP TABLE IF EXISTS `clasificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clasificaciones` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  `descripcion` text COMMENT 'Texto adicional que describe la categoria o clasificación para las etiquetas que engloba.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clasificaciones`
--

LOCK TABLES `clasificaciones` WRITE;
/*!40000 ALTER TABLE `clasificaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `clasificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuraciones`
--

DROP TABLE IF EXISTS `configuraciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `configuraciones` (
  `variable` varchar(50) NOT NULL,
  `valor` text,
  PRIMARY KEY (`variable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuraciones`
--

LOCK TABLES `configuraciones` WRITE;
/*!40000 ALTER TABLE `configuraciones` DISABLE KEYS */;
INSERT INTO `configuraciones` VALUES ('LineasPagina','10'),('LineasPagina.Avisos','50'),('LineasPagina.Portada','15'),('numero_actividades_portada','10'),('numero_denuncias_actividad','5'),('numero_denuncias_comentario','10'),('numero_intentos_usuario','3'),('numero_lineas_pagina','20'),('tiempo_agrupar_avisos','8'),('tiempo_borrar_avisos_leidos','7'),('tiempo_eliminar_avisos_borrados','7');
/*!40000 ALTER TABLE `configuraciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etiquetas`
--

DROP TABLE IF EXISTS `etiquetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `etiquetas` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etiquetas`
--

LOCK TABLES `etiquetas` WRITE;
/*!40000 ALTER TABLE `etiquetas` DISABLE KEYS */;
INSERT INTO `etiquetas` VALUES (1,'ludica'),(2,'cultural'),(3,'audio-visuales'),(4,'lectura'),(5,'deportivas'),(10,'asdad');
/*!40000 ALTER TABLE `etiquetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL COMMENT 'Fecha y Hora del mensaje de LOG.',
  `clase_log_id` char(1) NOT NULL COMMENT 'código de clase de log: E=Error, A=Aviso, S=Seguimiento, I=Información, D=Depuración, ...',
  `modulo` text COMMENT 'Modulo o Sección de la aplicación que ha generado el mensaje de LOG.',
  `texto` text COMMENT 'Texto con el mensaje de LOG.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_avisos`
--

DROP TABLE IF EXISTS `usuario_avisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario_avisos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL COMMENT 'Fecha y Hora de creación del aviso.',
  `clase_aviso_id` char(1) NOT NULL DEFAULT 'M' COMMENT 'código de clase de aviso: A=Aviso, N=Notificación, D=Denuncia, C=Consulta, M=Mensaje Genérico,...',
  `texto` text COMMENT 'Texto con el mensaje de aviso.',
  `destino_usuario_id` int unsigned DEFAULT '0' COMMENT 'Usuario relacionado, destinatario del aviso, o NULL si no es para administración y no está gestionado.',
  `origen_usuario_id` int unsigned DEFAULT '0' COMMENT 'Usuario relacionado, origen del aviso, o NULL si es del sistema.',
  `actividad_id` int unsigned DEFAULT '0' COMMENT 'Actividad relacionada o NULL si no tiene que ver con una actividad.',
  `comentario_id` int unsigned DEFAULT '0' COMMENT 'Comentario relacionado o NULL si no tiene que ver con un comentario.',
  `fecha_lectura` datetime DEFAULT NULL COMMENT 'Fecha y Hora de lectura del aviso o NULL si no se ha leido o se ha desmarcado como tal.',
  `fecha_borrado` datetime DEFAULT NULL COMMENT 'Fecha y Hora de la marca de borrado del aviso o NULL si no se ha marcado como borrado.',
  `fecha_aceptado` datetime DEFAULT NULL COMMENT 'Fecha y Hora de aceptación del aviso o NULL si no se ha aceptado para su gestión por un moderador o administrador. No se usa en otros usuarios.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_avisos`
--

LOCK TABLES `usuario_avisos` WRITE;
/*!40000 ALTER TABLE `usuario_avisos` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_avisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL COMMENT 'Correo Electronico y "login" del usuario.',
  `password` varchar(60) NOT NULL,
  `nick` varchar(25) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL COMMENT 'Fecha de nacimiento del usuario o NULL si no lo quiere informar.',
  `direccion` text COMMENT 'Direccion del usuario o NULL si no quiere informar.',
  `area_id` int unsigned NOT NULL DEFAULT '0' COMMENT 'Area/Zona de localización del usuario o CERO si no lo quiere informar (como si fuera NULL), aunque es recomendable.',
  `rol` char(1) NOT NULL COMMENT 'Código de la Clase / Tipo de Perfil: N=Normal, M=Moderador, P=Patrocinador, A=Administrador',
  `avisos_por_correo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Indicador de si el usuario desea recibir correos con los avisos que se generan en el sistema para él o no.',
  `avisos_agrupados` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de si los avisos se envian directamente al generarlos, se agrupan en un solo correo, o lo que sea.',
  `avisos_marcar_leidos` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de marcar los correos leidos como borrados después de un tiempo  0:No marcar, >0:tiempo en días.',
  `avisos_eliminar_borrados` int NOT NULL DEFAULT '0' COMMENT 'Indicador para eliminar los correos borrados tras el tiempo indicado: >=1 día y <=1 año, o como se considere oportuno.',
  `fecha_registro` datetime DEFAULT NULL COMMENT 'Fecha y Hora de registro del usuario o NULL si no se conoce por algún motivo (que no debería ser).',
  `confirmado` tinyint(1) NOT NULL COMMENT 'Indicador de usuario ha confirmado su registro o no.',
  `fecha_acceso` datetime DEFAULT NULL COMMENT 'Fecha y Hora del ultimo acceso del usuario. Debería estar a NULL si no ha accedido nunca.',
  `num_accesos` int NOT NULL DEFAULT '0' COMMENT 'Contador de accesos fallidos del usuario o CERO si no ha tenido o se ha reiniciado por un acceso valido o por un administrador.',
  `bloqueado` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de usuario bloqueado: 0=No, 1=Si(bloqueada por accesos), 2=Si(bloqueada por administrador), ...',
  `fecha_bloqueo` datetime DEFAULT NULL COMMENT 'Fecha y Hora del bloqueo del usuario. Debería estar a NULL si no está bloqueado o si se desbloquea.',
  `notas_bloqueo` text COMMENT 'Notas visibles sobre el motivo del bloqueo del usuario o NULL si no hay -se muestra por defecto según indique "bloqueado"-.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `nick_UNIQUE` (`nick`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'marcos.sdafsaf@gmail.com','admin','admin','Pepe','Garcia ','1996-03-03','Calle jose',49564,'A',0,0,0,0,'2022-01-07 11:32:57',1,'2022-01-07 11:32:57',0,0,NULL,''),(2,'pedro@pedro.es','pedro','pedro','Pedro','Rodriguez','1998-03-12','Avenida de Portugal, 25, Salamanca',37005,'N',0,0,0,0,'2022-01-11 10:34:08',1,'2022-01-11 10:34:08',0,0,NULL,''),(3,'jeb@usal.es','juaniko','juanito33','Juan','Rodriguez Mulas','1999-12-12','Calle Príncipe, 23 , Salamanca',37006,'N',0,0,0,0,'2022-01-11 10:35:39',0,'2022-01-11 10:35:39',0,0,NULL,''),(4,'google@gmail.com','pedrito99','jjMMJJ','Maria Jose','Lopez Obrador','1983-12-04','Madrid',28006,'N',0,0,0,0,'2022-01-11 10:37:15',0,'2022-01-11 10:37:15',0,0,NULL,'');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_area_moderacion`
--

DROP TABLE IF EXISTS `usuarios_area_moderacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios_area_moderacion` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` int unsigned NOT NULL COMMENT 'Usuario relacionado con un Area para su moderación.',
  `area_id` int unsigned NOT NULL COMMENT 'Area relacionada con el Usuario que puede moderarla.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_area_moderacion`
--

LOCK TABLES `usuarios_area_moderacion` WRITE;
/*!40000 ALTER TABLE `usuarios_area_moderacion` DISABLE KEYS */;
INSERT INTO `usuarios_area_moderacion` VALUES (1,1,3),(2,1,3),(3,1,3),(4,1,3),(7,1,3),(8,3,3);
/*!40000 ALTER TABLE `usuarios_area_moderacion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-28  0:48:08
