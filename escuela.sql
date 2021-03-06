-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2015 a las 00:34:24
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('4c3d102ec50eb2743be9bd8ece679162', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0', 1449358156, 'a:1:{s:9:"user_data";s:0:"";}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE IF NOT EXISTS `equipo` (
  `idequipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_equipo` int(11) NOT NULL,
  `nombre_eq` varchar(45) NOT NULL,
  `descripcion` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idequipo`),
  KEY `fk_equipo_tipo_equipo1_idx` (`tipo_equipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`idequipo`, `tipo_equipo`, `nombre_eq`, `descripcion`) VALUES
(1, 2, 'Benjamín A', 'Descripción Benjamín A'),
(2, 2, 'Benjamín B', 'Descripción Benjamín A'),
(3, 1, 'Pre Benjamín A', 'Primer equipo de pre-benjamines.'),
(4, 3, 'Alevín A', 'Primer equipo de alevines.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `idevento` int(11) NOT NULL AUTO_INCREMENT,
  `idequipo` int(11) NOT NULL,
  `tipo_evento` int(11) NOT NULL,
  `descripcion_evento` varchar(200) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`idevento`),
  KEY `fk_evento_equipo1_idx` (`idequipo`),
  KEY `fk_evento_tipo_evento1_idx` (`tipo_evento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`idevento`, `idequipo`, `tipo_evento`, `descripcion_evento`, `fecha`, `hora`) VALUES
(2, 2, 1, 'Abierto el plazo de matriculación', '2015-11-04', '14:00:00'),
(3, 1, 1, 'evento añadido', '2015-11-14', '12:00:00'),
(4, 2, 1, 'wdsddsd', '2015-11-26', '12:30:00'),
(5, 1, 1, 'dsffdf', '2015-11-25', '12:45:00'),
(6, 1, 2, 'Partido de la primera jornada de la copa de benjamines. Lugar Polideportivo de Corrales.', '2015-11-21', '11:15:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_jugadores`
--

CREATE TABLE IF NOT EXISTS `historial_jugadores` (
  `idjugador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_jugador` varchar(50) NOT NULL,
  `apellidos_jugador` varchar(60) NOT NULL,
  `dni` varchar(9) NOT NULL,
  PRIMARY KEY (`idjugador`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `historial_jugadores`
--

INSERT INTO `historial_jugadores` (`idjugador`, `nombre_jugador`, `apellidos_jugador`, `dni`) VALUES
(1, 'jugador1', 'apellidos1', '44202799L');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE IF NOT EXISTS `jugador` (
  `idjugador` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `nombre_jugador` varchar(30) NOT NULL,
  `apellidos_jugador` varchar(50) NOT NULL,
  `sexo` char(1) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `tutor` varchar(60) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `idequipo` int(11) NOT NULL,
  `fecha_crea` date NOT NULL,
  PRIMARY KEY (`idjugador`),
  KEY `fk_jugador_equipo_idx` (`idequipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`idjugador`, `usuario`, `clave`, `dni`, `nombre_jugador`, `apellidos_jugador`, `sexo`, `fecha_nac`, `tutor`, `telefono`, `email`, `idequipo`, `fecha_crea`) VALUES
(5, 'jugador', 'jugador', '44202799L', 'jugador1', 'apellidos1', 'h', '2014-06-03', 'Andrés Pérez Castillo', '122323232', 's@gmail.com', 1, '2015-11-15'),
(6, 'dsdsd', 'sMexiyZb', '44202799L', 'Nuñez', 'dfdfd fggfg', 'm', NULL, NULL, NULL, 'shaggyweb8@gmail.com', 2, '2015-11-15'),
(7, 'nom4420gwG', 'ymuzSWKa', '44202799L', 'nom', 'ape', 'h', '2015-11-18', 'tut', '959231955', 'correo@gmail.com', 2, '2015-11-30'),
(8, 'nom4420C1R', 'I9qiriqV', '44202799L', 'nombre', 'apellidos', 'h', '2015-11-18', 'tutor', '959231955', 'shaggyweb87@gmail.com', 2, '2015-11-30'),
(9, 'nuev4420Sv3', '0UvcETez', '44202799L', 'nuevo jugador', 'apellidos nuevos', 'h', '2002-12-02', 'nuevo tutor', '959366987', 'shaggyweb@gmail.com', 4, '2015-12-03');

--
-- Disparadores `jugador`
--
DROP TRIGGER IF EXISTS `fecha_crea`;
DELIMITER //
CREATE TRIGGER `fecha_crea` BEFORE INSERT ON `jugador`
 FOR EACH ROW BEGIN 
SET NEW.fecha_crea = CURDATE();
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `historial`;
DELIMITER //
CREATE TRIGGER `historial` AFTER DELETE ON `jugador`
 FOR EACH ROW BEGIN 
INSERT INTO historial_jugadores (`nombre_jugador`, `apellidos_jugador`,`dni`) VALUES (OLD.nombre_jugador,OLD.apellidos,OLD.dni);
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitor`
--

CREATE TABLE IF NOT EXISTS `monitor` (
  `idmonitor` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `nombre_monitor` varchar(30) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `dni` varchar(9) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `rol` char(1) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_creacion` date NOT NULL,
  PRIMARY KEY (`idmonitor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `monitor`
--

INSERT INTO `monitor` (`idmonitor`, `usuario`, `clave`, `nombre_monitor`, `apellidos`, `dni`, `telefono`, `email`, `rol`, `foto`, `activo`, `fecha_creacion`) VALUES
(1, 'monitor', 'monitor', 'Mario', 'Vilches Nieves', '44202799L', '959231955', 'shaggyweb@gmail.com', 'm', 'foto01.jpg', 1, '2015-11-19'),
(2, 'admin', 'admin', 'administrador', 'ad bbbb', '44202799L', '959636363', 'shaggy@gmail.com', 'a', 'foto_admin.jpg', 1, '2015-11-19'),
(3, 'Manu4123', '0jSu9', 'Manuel', 'García Alcudia', '41234567Y', '985232323', 'shaggywe@gmail.com', 'm', 'foto_hommer.jpg', 1, '2015-11-19'),
(4, 'Pedr4420', 'J04h2U', 'Pedro', 'Pérez Pérez', '44202799L', '926366369', 'shaggyw@gmail.com', 'a', 'flanders.png', 1, '2015-11-19');

--
-- Disparadores `monitor`
--
DROP TRIGGER IF EXISTS `fecha_creacion`;
DELIMITER //
CREATE TRIGGER `fecha_creacion` BEFORE INSERT ON `monitor`
 FOR EACH ROW BEGIN 
SET NEW.fecha_creacion = CURDATE();
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion_monitor`
--

CREATE TABLE IF NOT EXISTS `notificacion_monitor` (
  `idnotificacion` int(11) NOT NULL AUTO_INCREMENT,
  `idmonitor` int(11) NOT NULL,
  `idjugador` int(11) NOT NULL,
  `nombre_notificacion` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`idnotificacion`),
  KEY `fk_notificacion_monitor_monitor1_idx` (`idmonitor`),
  KEY `fk_notificacion_monitor_jugador1_idx` (`idjugador`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `notificacion_monitor`
--

INSERT INTO `notificacion_monitor` (`idnotificacion`, `idmonitor`, `idjugador`, `nombre_notificacion`, `descripcion`, `fecha`, `estado`) VALUES
(1, 1, 5, 'Primera Notificacion', 'Esta es la primera notificacion para el jugad', '2015-12-02', 'N'),
(2, 1, 6, 'axxx', 'xzxzxzx scscsxc dcdsfdf.', '2015-12-02', 'N'),
(3, 1, 7, 'ssss', 'asdfghjkkl', '2015-12-02', 'N'),
(4, 1, 7, 'cscsccscsc', 'ccdddfdfdfd fdfd gfggdg\r\nbbvbvb', '2015-12-03', 'N'),
(5, 2, 5, 'sdsdsdsdsad', 'xsxxszxsc ccdcdcdsc', '2015-12-01', 'L'),
(6, 4, 5, 'xsxs sxsaxs', 'aaaa xxxx', '2015-12-02', 'L'),
(7, 3, 5, 'zzzz', 'zxaqwe', '2015-12-03', 'L');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_equipo`
--

CREATE TABLE IF NOT EXISTS `tipo_equipo` (
  `idtipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(45) NOT NULL,
  `descripcion_cat` varchar(80) NOT NULL,
  PRIMARY KEY (`idtipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tipo_equipo`
--

INSERT INTO `tipo_equipo` (`idtipo`, `nombre_categoria`, `descripcion_cat`) VALUES
(1, 'Pre Benjamín', 'Categoría de equipo formado por alumnos de 7-8 años de edad.'),
(2, 'Benjamín', 'Categoría de equipo formado por alumnos de 9-10 años de edad.'),
(3, 'Alevín', 'Categoría de equipo formado por alumnos de 11-12 años de edad.'),
(4, 'Infantil', 'Categoría de equipo formado por alumnos de 13-14 años de edad.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_evento`
--

CREATE TABLE IF NOT EXISTS `tipo_evento` (
  `idtipo_evento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idtipo_evento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_evento`
--

INSERT INTO `tipo_evento` (`idtipo_evento`, `nombre`) VALUES
(1, 'noticia'),
(2, 'partido');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `fk_equipo_tipo_equipo1` FOREIGN KEY (`tipo_equipo`) REFERENCES `tipo_equipo` (`idtipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_evento_equipo1` FOREIGN KEY (`idequipo`) REFERENCES `equipo` (`idequipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evento_tipo_evento1` FOREIGN KEY (`tipo_evento`) REFERENCES `tipo_evento` (`idtipo_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD CONSTRAINT `fk_jugador_equipo` FOREIGN KEY (`idequipo`) REFERENCES `equipo` (`idequipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `notificacion_monitor`
--
ALTER TABLE `notificacion_monitor`
  ADD CONSTRAINT `fk_notificacion_monitor_jugador1` FOREIGN KEY (`idjugador`) REFERENCES `jugador` (`idjugador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notificacion_monitor_monitor1` FOREIGN KEY (`idmonitor`) REFERENCES `monitor` (`idmonitor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
