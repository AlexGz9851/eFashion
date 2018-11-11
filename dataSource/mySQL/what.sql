-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `what`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `lookID` (IN `id` INT)  NO SQL
SELECT * FROM inventario WHERE inventario.id_prod=id AND inventario.inv>0$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registroUser` (IN `nombre` VARCHAR(30), IN `correo` VARCHAR(30), IN `pass` VARCHAR(20), IN `usuario` VARCHAR(10), IN `Ap` VARCHAR(30), IN `dom` VARCHAR(30), IN `banco` VARCHAR(30), IN `tc` VARCHAR(30), IN `clave` VARCHAR(3), IN `estado` VARCHAR(30), IN `muni` VARCHAR(30), IN `mes` VARCHAR(2), IN `ano` VARCHAR(4))  NO SQL
INSERT INTO persona (Nombre, Apellido, Pass, Usuario, dom, email, tarjetaCredito, Banco, CCV, Estado, Municipio, MesVen, YearVen) VALUES (nombre, Ap, pass, usuario, dom, correo, tc, banco, clave, estado, muni, mes, ano)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `seeAll` (IN `strt` INT, IN `pageSize` INT)  NO SQL
SELECT * FROM inventario
WHERE inventario.inv>0
ORDER BY inventario.sold DESC
LIMIT strt, pageSize$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `seeAll_nl` ()  NO SQL
SELECT * FROM inventario
WHERE inventario.inv>0
ORDER BY inventario.sold DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `seeMost` ()  NO SQL
SELECT * FROM inventario
WHERE inventario.inv>0
ORDER BY inventario.sold DESC
LIMIT 8$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `seeWithTags` (IN `myTag` VARCHAR(20), IN `strt` INT, IN `pageSize` INT)  NO SQL
SELECT * FROM inventario
WHERE inventario.tag = myTag
AND inventario.inv>0
ORDER BY inventario.sold DESC
LIMIT strt, pageSize$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `seeWithTags_nl` (IN `myTag` VARCHAR(20))  NO SQL
SELECT * FROM inventario
WHERE inventario.tag = myTag
AND inventario.inv>0
ORDER BY inventario.sold DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `userData` (IN `usr` VARCHAR(10))  NO SQL
SELECT persona.Nombre as name, persona.admin as val FROM persona where persona.Usuario=usr$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `AddWorkDays` (`WorkingDays` INT, `StartDate` DATETIME) RETURNS DATETIME BEGIN
    DECLARE Count INT;
    DECLARE i INT;
    DECLARE NewDate DATETIME;
    SET Count = 0;
    SET i = 0;

    WHILE (i < WorkingDays) DO
        BEGIN
            SELECT Count + 1 INTO Count;
            SELECT i + 1 INTO i;
            WHILE DAYOFWEEK(DATE_ADD(StartDate,INTERVAL Count DAY)) IN (1,7) DO
                BEGIN
                    SELECT Count + 1 INTO Count;
                END;
            END WHILE;
        END;
    END WHILE;

    SELECT DATE_ADD(StartDate,INTERVAL Count DAY) INTO NewDate;
    RETURN NewDate;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_ticket` int(11) NOT NULL,
  `Id_Persona` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `cant` int(11) NOT NULL,
  `id_com` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_prod` int(10) UNSIGNED NOT NULL,
  `name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `price` float UNSIGNED NOT NULL,
  `descrip` text COLLATE utf8_unicode_ci NOT NULL,
  `sold` int(10) UNSIGNED ZEROFILL NOT NULL,
  `inv` int(10) UNSIGNED ZEROFILL NOT NULL,
  `tag` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Pass` varchar(20) NOT NULL,
  `Usuario` varchar(10) NOT NULL,
  `dom` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tarjetaCredito` varchar(30) NOT NULL,
  `Banco` varchar(16) NOT NULL,
  `CCV` varchar(3) NOT NULL,
  `Admin` tinyint(1) DEFAULT NULL,
  `Id_Persona` int(11) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `Municipio` varchar(30) NOT NULL,
  `MesVen` varchar(2) NOT NULL,
  `YearVen` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`Nombre`, `Apellido`, `Pass`, `Usuario`, `dom`, `email`, `tarjetaCredito`, `Banco`, `CCV`, `Admin`, `Id_Persona`, `Estado`, `Municipio`, `MesVen`, `YearVen`) VALUES
('Luis', 'Martinez', 'lima_MALI98', 'perez', 'Santa Gertrudis', 'francisco.mtzc@hotmail.com', '1029384567654321', 'Santander', '345', 0, 8, 'Jalisco', 'Tlaquepaque', '11', '2017'),
('Nancy', 'Hernandez', 'Nancy_21', 'nanay', 'Colima', 'nancy21@hotmail.com', '1234567654367897', '2', '412', 0, 9, 'Sonora', 'La paz', '11', '2017'),
('Hugo', 'Camacho', 'LUisY_97', 'luYsI', 'La Llave', 'franciscc@hotmail.com', '1234567654367897', '2', '334', 0, 10, 'DF', 'Benito Juarez', '11', '2017'),
('Jose', 'Quinones', 'Asdf-123', 'lima175666', 'Juan Alvarez', 'larevistaa@gmail.com', '4152313182795480', '2', '123', 0, 11, 'jal', 'gdl', '5', '2017'),
('Jose', 'Momo', '13300226-Lima', 'lima1756', 'JuanAlvarez', 'luisivanmorett@hotmail.com', '4152313182795514', '2', '854', 0, 12, 'Jalisco', 'Guadalajara', '12', '2021'),
('Lima', 'Martinez', '13300226-LIMa', 'lima1757', 'Juan Álvarez 1282', 'luisivanmorett@gmail.com', '4152313182795412', '2', '587', 1, 13, 'Jalisco', 'Gdl', '4', '2021'),
('Jose Frank', 'Mtz', 'Yo-210798', 'Josfran', 'Santa Gertrudis 2133', 'ceti@gmail.com', '4152313182795412', '2', '123', 1, 14, 'Sinaloa', 'Ahome', '11', '2017'),
('Karl', 'Sanchez', 'Yo-13300195', 'Josfran2', 'La llave 23', 'yo@gmail.com', '4152313182795412', '2', '194', NULL, 15, 'Queretaro', 'Queretaro', '08', '2017');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `precio_final` float UNSIGNED NOT NULL,
  `precio_int` float UNSIGNED NOT NULL,
  `fecha_ent` date NOT NULL,
  `Id_Persona` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ticket`
--

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_com`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`Id_Persona`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_prod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `Id_Persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
