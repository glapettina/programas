-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-03-2023 a las 02:23:48
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `programas`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `filtrar_materia` (IN `xcurso` VARCHAR(20), IN `xdivision` VARCHAR(20), IN `xturno` VARCHAR(20), IN `xanio` VARCHAR(20))  BEGIN

IF xcurso = '' THEN
SET xcurso = NULL;
END IF;

IF xdivision = '' THEN
SET xdivision = NULL;
END IF;

IF xturno = '' THEN
SET xturno = NULL;
END IF;

IF xanio = '' THEN
SET xanio = NULL;
END IF;

SELECT * FROM materias WHERE estado = 1 
			AND ciclo = 'BASICO'
            AND curso = IFNULL(xcurso, curso)
            AND division = IFNULL(xdivision, division)
            AND turno = IFNULL(xturno, turno)
            AND anio = IFNULL(xanio, anio);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `filtrar_materia_alimentacion` (IN `xcurso` VARCHAR(20), IN `xdivision` VARCHAR(20), IN `xturno` VARCHAR(20), IN `xanio` VARCHAR(20))  BEGIN
IF xcurso = '' THEN
SET xcurso = NULL;
END IF;

IF xdivision = '' THEN
SET xdivision = NULL;
END IF;

IF xturno = '' THEN
SET xturno = NULL;
END IF;

IF xanio = '' THEN
SET xanio = NULL;
END IF;

SELECT * FROM materias WHERE estado = 1 
			AND ciclo = 'SUPERIOR ALIMENTACION'
            AND curso = IFNULL(xcurso, curso)
            AND division = IFNULL(xdivision, division)
            AND turno = IFNULL(xturno, turno)
            AND anio = IFNULL(xanio, anio);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `filtrar_materia_electro` (IN `xcurso` VARCHAR(20), IN `xdivision` VARCHAR(20), IN `xturno` VARCHAR(20), IN `xanio` VARCHAR(20))  BEGIN
IF xcurso = '' THEN
SET xcurso = NULL;
END IF;

IF xdivision = '' THEN
SET xdivision = NULL;
END IF;

IF xturno = '' THEN
SET xturno = NULL;
END IF;

IF xanio = '' THEN
SET xanio = NULL;
END IF;

SELECT * FROM materias WHERE estado = 1 
			AND ciclo = 'SUPERIOR ELECTRO'
            AND curso = IFNULL(xcurso, curso)
            AND division = IFNULL(xdivision, division)
            AND turno = IFNULL(xturno, turno)
            AND anio = IFNULL(xanio, anio);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `filtrar_materia_taller` (IN `xcurso` VARCHAR(20), IN `xanio` VARCHAR(20))  BEGIN

IF xcurso = '' THEN
SET xcurso = NULL;
END IF;

IF xanio = '' THEN
SET xanio = NULL;
END IF;

SELECT * FROM materias_taller WHERE estado = 1 
			AND ciclo = 'BASICO'
            AND curso = IFNULL(xcurso, curso)
            AND anio = IFNULL(xanio, anio);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `filtrar_materia_taller_alimentacion` (IN `xcurso` VARCHAR(20), IN `xanio` VARCHAR(20))  BEGIN

IF xcurso = '' THEN
SET xcurso = NULL;
END IF;

IF xanio = '' THEN
SET xanio = NULL;
END IF;

SELECT * FROM materias_taller WHERE estado = 1 
			AND ciclo = 'SUPERIOR ALIMENTACION'
            AND curso = IFNULL(xcurso, curso)
            AND anio = IFNULL(xanio, anio);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `filtrar_materia_taller_electro` (IN `xcurso` VARCHAR(20), IN `xanio` VARCHAR(20))  BEGIN

IF xcurso = '' THEN
SET xcurso = NULL;
END IF;

IF xanio = '' THEN
SET xanio = NULL;
END IF;

SELECT * FROM materias_taller WHERE estado = 1 
			AND ciclo = 'SUPERIOR ELECTRO'
            AND curso = IFNULL(xcurso, curso)
            AND anio = IFNULL(xanio, anio);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_i_ticketdetalle_01` (IN `xtick_id` INT, IN `xusu_id` INT)  BEGIN
INSERT INTO td_ticketdetalle (tickd_id, tick_id, usu_id, tickd_descrip, fech_crea, est) 
VALUES 
(NULL, xtick_id, xusu_id, 'Ticket Cerrado', now(), '1');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_l_usuario_01` ()  BEGIN
	SELECT * FROM tm_usuario WHERE estado = '1';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_l_usuario_02` (IN `xusu_id` INT)  BEGIN
	SELECT * FROM tm_usuario WHERE usu_id = xusu_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `materia_id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ciclo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `curso` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `division` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `turno` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `anio` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `profesor` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`materia_id`, `nombre`, `ciclo`, `curso`, `division`, `turno`, `anio`, `profesor`, `observaciones`, `estado`) VALUES
(1, 'Dibujo Técnico', 'BASICO', 'PRIMERO', 'PRIMERA', 'MAÑANA', '2020', 'Omar Cricco', '', 1),
(2, 'Geografía', 'BASICO', 'PRIMERO', 'TERCERA', 'TARDE', '2021', 'Natalia Pedranti', '', 1),
(3, 'Matemática', 'BASICO', 'SEGUNDO', 'SEGUNDA', 'MAÑANA', '2022', 'Mónica Barrionuevo', '', 1),
(4, 'Geografía', 'BASICO', 'SEGUNDO', 'PRIMERA', 'MAÑANA', '2021', 'Mónica Barrionuevo', '', 1),
(5, 'Geografía', 'BASICO', 'SEGUNDO', 'SEGUNDA', 'MAÑANA', '2022', 'Omar Cricco', '', 1),
(6, 'Física', 'SUPERIOR ELECTRO', 'PRIMERO', 'PRIMERA', 'MAÑANA', '2020', 'Mónica Barrionuevo', '', 1),
(7, 'Física Aplicada', 'BASICO', 'PRIMERO', 'SEGUNDA', 'TARDE', '2020', 'Nadia Yunes', '', 1),
(8, 'Fisicoquímica', 'BASICO', 'PRIMERO', 'SEGUNDA', 'TARDE', '2020', 'Nadia Yunes', '', 1),
(9, 'Geografía', 'SUPERIOR ALIMENTACION', 'TERCERO', 'PRIMERA', 'VESPERTINO', '2022', 'Esteban Flores', '', 1),
(10, 'Dibujo Técnico', 'BASICO', 'PRIMERO', 'PRIMERA', 'MAÑANA', '2021', 'Esteban Flores', '', 1),
(11, 'Geografía', 'BASICO', 'PRIMERO', 'PRIMERA', 'MAÑANA', '2022', 'Natalia Pedranti', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_taller`
--

CREATE TABLE `materias_taller` (
  `materia_id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ciclo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `curso` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `anio` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `profesor` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materias_taller`
--

INSERT INTO `materias_taller` (`materia_id`, `nombre`, `ciclo`, `curso`, `anio`, `profesor`, `observaciones`, `estado`) VALUES
(1, 'Electricidad', 'BASICO', 'PRIMERO', '2022', 'Esteban Flores', '', 1),
(2, 'Nutrición', 'SUPERIOR ALIMENTACION', 'CUARTO', '2022', 'Natalia Pedranti', '', 1),
(3, 'Automatización', 'SUPERIOR ELECTRO', 'CUARTO', '2022', 'Mónica Barrionuevo', '', 1),
(4, 'Carpintería', 'BASICO', 'SEGUNDO', '2020', 'Natalia Pedranti', '', 0),
(5, 'Operaciones Unitarias', 'SUPERIOR ALIMENTACION', 'PRIMERO', '2022', 'Maite Fernández', '', 0),
(6, 'Oficina Técnica', 'SUPERIOR ELECTRO', 'TERCERO', '2020', 'Claudia Meili', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_documento`
--

CREATE TABLE `td_documento` (
  `doc_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `doc_nom` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `fech_crea` datetime NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `td_documento`
--

INSERT INTO `td_documento` (`doc_id`, `materia_id`, `doc_nom`, `fech_crea`, `est`) VALUES
(1, 11, 'NO-2023-16661319-APN-DRN#ENACOM.pdf', '2023-03-09 19:37:26', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_documento_detalle`
--

CREATE TABLE `td_documento_detalle` (
  `det_id` int(11) NOT NULL,
  `tickd_id` int(11) NOT NULL,
  `det_nom` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_documento_taller`
--

CREATE TABLE `td_documento_taller` (
  `doc_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `doc_nom` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `fech_crea` datetime NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `td_documento_taller`
--

INSERT INTO `td_documento_taller` (`doc_id`, `materia_id`, `doc_nom`, `fech_crea`, `est`) VALUES
(1, 1, 'Asamblea DocenteCargos.pdf', '2023-03-09 20:48:49', 1),
(2, 2, 'WhatsApp Image 2022-12-15 at 08.27.06.jpeg', '2023-03-09 21:05:57', 1),
(3, 3, 'WhatsApp-Image-2021-09-07-at-09.57.04.jpeg', '2023-03-09 21:16:17', 1),
(4, 4, 'NO-2023-16209849-APN-DRN#ENACOM.pdf', '2023-03-09 21:20:24', 1),
(5, 5, 'LAPETTINA GUILLERMO RAUL credito1.pdf', '2023-03-09 21:23:12', 1),
(6, 6, 'Ingles  4º 1º A CS TV ZUTHER Solange.pdf', '2023-03-09 21:25:21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_ticketdetalle`
--

CREATE TABLE `td_ticketdetalle` (
  `tickd_id` int(11) NOT NULL,
  `tick_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `tickd_descrip` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `fech_crea` datetime NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `td_ticketdetalle`
--

INSERT INTO `td_ticketdetalle` (`tickd_id`, `tick_id`, `usu_id`, `tickd_descrip`, `fech_crea`, `est`) VALUES
(1, 4, 1, 'Ticket Cerrado', '2022-11-25 15:48:40', 1),
(2, 4, 2, 'Ticket Re-Abierto', '2022-11-25 18:41:46', 1),
(3, 4, 1, 'Ticket Cerrado', '2022-11-25 18:42:38', 1),
(4, 4, 1, 'Ticket Re-Abierto', '2022-11-25 18:42:45', 1),
(5, 4, 1, 'Ticket Cerrado', '2022-11-25 19:03:11', 1),
(6, 3, 2, '<p>ssssssssss</p>', '2022-11-25 21:21:37', 1),
(7, 2, 1, '<p>Test23</p>', '2022-11-27 22:54:26', 1),
(8, 2, 1, '<p>Test24</p>', '2022-11-27 22:55:01', 1),
(9, 2, 1, '<p>aaaaaaaaaaaa</p>', '2022-11-27 23:19:17', 1),
(10, 7, 2, '<p>fwffsffsdf</p>', '2022-11-28 14:00:22', 1),
(11, 7, 2, 'Ticket Cerrado', '2022-11-28 14:06:11', 1),
(12, 1, 2, '<div><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADWCAYAAAAnzOVvAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAACTXSURBVHhe7Z0NVFTXuff/jWSK3BkWjcTiVC3DjaJ5nVRSJ2lFXA4rH2AjJN7gjRZ8e6eWKs1Cb1ZKbxO160ZrbmhWKqwUU5rO6o1UcsWXK5AwpOkSVxDTOCZjhVdALMOrBOdaSGY51JLJqO+zzzkDMzDDhwKH6PNb6zB79tmzz9f+7+fZH5z9pesEGIZRjTuUT4ZhVIJFyDAqwyJkGJVhETKMyrAIGUZlWIQMozIsQoZRGRYhw6gMi5BhVIZFyDAqwyJkGJVhETKMyrAIGUZlWIQMozJj+1emq170XmiD/eQxOHsB7xUvNFEaIEqP+5aZYFqoh2aGkjYMnr/Y0dojQrFY9KABOil2ErnSjbYP7bCf6YZHiZLO13gfFt1rwCw6/SnlqgfO43WoOyPdBMTGpyLZnAj9VJ8HM+0YWYRXe2E/sBf73qhDk1uJC0VUItI2bcW2DSbMCiPGpmITLPtFKBtW+1YYpdhJwNOGqpKXUHSoaVB8w9DBuNqCLT/Khmm2EjWZ9DaicPM2VHQq3/1EpaGwchfMs5TvzG1JWBF6/1KB7ZsLUR8ovhgDEhMTYTLq8dm5Rpw+40TbJa+yE9AszMTul7fDPEeJCGBKRHixHrvzC1DlL+xRs5D49VjlC9EbfL6i8sjcUYjtD+mViMnAg/rtaSh4h44bZYTluS1YFkOncrYa1Z9mYG++CT1H96GqjZLOWoHsJ42T7yUw0wshwqF85ii5/t2Vy64vWya25de/+/z+6ye6P1P2BvNZ9+nrB3d/9/pyKS1tK7deP9yt7AzgdJE/v73XTytxE4qv4/rBf/Efw3z9xxWt1y/7lH2BfNpx/dhvtlw3D5zvj6/bepR9k8H/HL6+VTpWxvW99tD3cODe5B++PpmnwkxPhnfMXKxCwVYr2q6ILwZkvVKNst3kts0J3XjRzDEi6/ky1Fm3wBhFEdQWazrdjQB7MzU0VWNvkxw0PvtbFD6ZCF0o15isefKmEhwhNzAz3oDsot1Im0x3sLsTjVIgFcuTuAHIDCdYhFedqHh+NxoVAWbv+y0KUsZWQnVGC157bS9K3j6I7Y/qMdXFzdlmV4RvQuZKgxQakXlp2P7mQWxdOrln2nvBqYSAyFE6r5jbk6A2ofeDQpifrpAKs35DCSr+1TRhYprsNmHTr5NheV2cuQnbq0uQGaJdeqN4OhtR9991qHc4cVmKiYYhyYy0J9KQHB+qBeeB84NWiH7Q3uNF2HFANPjM2PpqFhKl/ZH42v+ahd7/+zH66Vvb4TwU/ZECi7Ox60fLIVd7ci8yOu1o/Z/B72Hbi24n7G10xKiv4RvUZg/33LwXm/Dn8+Ko0UhIShzeSyzyaWhE/Xt1OC0dl/jqfUhbmY7UR43he3P9xxfXlqSk85JX9M4R2Cgv/cYyZId66Fd70fbHI6g7Xg+7U7674niZD2Ui9SE6v9ug4goQoQd1P03FDlEYqMDsercQaTHSjglhskXYW7sNaT+THT9DjhVl+cabr0A8TSj76VYUfTBCP+uDtP/FbBiD1NGEIpMFZcq34SRj+3+aUf+/yetQYoaj3KcWKzI37kO3+M3be5EZpje37XeZyP5VN4WysLexAMlhLr6pmCqr/VRZPbQLR15MGxQ1iaHxVz/Gjv0j9CpHJSL7xSJsXR7COzpVBNMPxBXL57niHKX7aZnSrKGr+Y2dvA457Kf3pBU7froP9nA97zEmbHlxFyzLbu3u40ERehtRmLwNFSL8aCGO7DZPaC/dpPeOuuuxI7MAdcpD1z24BS/9hNqy825QikE9rfKQxrrV30CiXou+7jb8ufYgrLVKgY2na/pPuibRJpboRv2vq9BKIU9bHSoahDiMSNtkgtwPG4sVGYvQWn1MspbdH1hRJ9qzc5KR9R1qy0ppFiHzh2bor5KgU0nQdF3m3UdQ+Giop9IGa0Y29l2Uv2UVNaJgeYjrDsgreWcd9q5RCre3CdZ/2Yx9Z0mcUbOQ/E9bkPWwCffN0cHr7iTLeBBlr9cN9BNs+f1BWBZKvxxkQIQmZP9IT4KugpPyMq5Kh4nM4qLVW2CeJycVdNcWIPtn9XT/NEh8dAu2bErHfTHyOXsuNuLI78uw75028sqoWfSbshGbDZV19UpoYlmbZlZCk8ugCM9SjftdUePSbXy+CiWPT2y3/VQMUXTXbEPWC43BnUIxBpgfykDyqmSkLiN3bizuzdVuVP04C7sbRKFMRoG1EFn/OLwQeJqs2Pr0PjRR4dSk7EL1K2mKKzlIL51TGp3TSNc9cG+Wb0ddUeawPAasV7jK0f/s5uihv9iN7if3ovEnycM9gbBW1UvHyMbmzixY/51c5lA6v1iFbU/J/QWafy5B/bNDmioDIhSQsDYUovBHyaHdVzrfdXS+TkqXvLOCKoPQZa37MD3Pn9PzFOOpVbtgDuOZfdFFONgxc8UjCVAQPztgbO0LhH7NXlTv2wJT4MOitkr9oSLsfnodUr+VCsvP9qHqVDe8V5X9IfCeLEOhECAVkqwXQwtQIDqjinakSYXR27ALv/0gSP4ThnHlOrnAU/vqZAhfse14lfTs0shyS23hQ42whziVtg/kdFhuxoogt1YD46bfou4XYQQomJOJrXlyi9b7XhMJKBwkrOcrUPavYQRIZ1DxH0KAlPJJEmoYAQr0j+/C7kcpkytktQ+JdvWtSci5o18WU9JCIto6JphG3YoopTrMWmZBSV0jqn6zHdmrhnZkeNBUa8XuH2QiOS0P1pO9SnwgHjTWyJ1TMG5Ddii3LgCd2YIti0XIi4qj/h7aCebe5ciUXN062JuGHsGJ00eEtMxIXpaM5AxRqCvQeDJcOrqsFNMwa4so3aheQnSUUjlf9IxwnSaYl4/gRZ2tQ5lUOBKx7Z9DWOsgdDB/9/uSC9+9vw5NYSpOYbEmY5sqQorQ2R2qcH6BmKGBfinV3L84iCN/akRdRQm2b0qDcXbAI3fbsW9LBrbV+O2/n06cfkcOmTKoNpeD4ZlhgClVSVV7mlpnk4DmG0heLQerjv85WACdJ1HVQp8PpSKZPIDE5EzpnCsahlQI/nTkEKc/GOaqPE40ktew4+lsZG8UWwEK91eh6WJ4yY2X3rbTsjUmN39RvBQ1Mv+YSM4zcaUNHZekmFuOQRF+NZ7qMBnnJXmS8XDikfFqCUrCbFsfUpJNJ0iQs+JNyPzhLljfbkRjdQm2POi3j140vlCIqsCHe6ljwNVKjB9VghKxs5VxSSooH09K/aWBKSVLCnlrjqMtwCI4ycWUBkCozStd1cLkkC5p90mbXEEsTseygA4SP56T+5D92Dpse6kMdR+0oa1FbPWoKN4NS4YZ2b9sRPcILvxY6Xb6+4Or8JIk9FG2TUVk/wV2dPqHTG4xBkU4OwGJSu9e93tKbTUMHQwPkrsZZvvGBI7NTRaaOSZYXq2DNcc/oN+IivrwLZyxMMsvQuKzCSioodCQqynJ8ApZ9wFf34mTbwtpkRuapFQsMxJhekhY/ECXtBf2BvlHid9ZhmFTGTorsHWLPEtKs5Tc+UoSsN0+sDVW7kXqX3Zg8y/tyg8mgCu9itBH25zhh0xuEQZFSA9v+RrFXWui2lByXW5VNDBu3ioXaqKtqXPwQc+MHmhH9vSM7fH3XvSL2AD9ZA1pae6D6VER8OLIKcXp9buYQzpa/B05Ay4pud6Nx0UgEZliAkAQXtgP7ZXb8HOysbdoy7BhHc08qriKqrD38ZvvsNNEK97F4gIcDBD6WLah44x+RO/oZGxTRUCbkFyejO8rtWQ39r1WNSHux7RFE40vK0Fc+Wyw/aTTw6BY9CNnhv7vUSi8aD2juFiL9YidtBkeOixblSaFuslSCRn6XdHkh1YEd7QYU7FOeDWKS+o52QipSM1JxX3D2mFONL0nX71+bRpMA2OdQ5ihQ8I9w2zouNHPvU8OtNjRNtK/x91GBHfMLMzGjzcoNdXx3dj2q6bBwjkG+tUU7cUq7NheN/aK40Ir/qwENYlfCyjEiUoPI8nr/9iUebQj4D6CqkNyUJ9633BXbwLRPZgKSYYXj+B056Aran5wiPmdYUTqPwlrVoVGRy9OHpVbVfq1ycq0uUC88CiD/IZZkz80pSO3Wu53rMfBd26uGXCrECxCYQ1/uBvZSm3p3G9B9gtjKNhXPWg7VICfHFC+hx3imCSUied17+xA1uZ9sI/WiyYG43+puGDQ4/srg4fQEzMsSo9cBQp/bYcn3PWLfF7YJVuZqDRse3x4EZ9QdMvI6olAG6p+vU92RY3JIf8xOfHBTHqaXlTV7oVN6u3Vkysa6vz0SEyRQ41nWsdV6d4QManIyZEruaaSIlQpFUBY6B47R0kTanhhIrapYogIiSgjtlpLYFkoC8lZswOZaXkoqrHDGfgPsYTX042mmiJsy0hD9ktiChIhzTD5/ggzYj7Gnz8gH3+0rWk8/w71ZejiZRvkPWVF3nfEoHwZGjt74QnMxOtB96kqFG3NlmfDEJpHtyFLGucLYHYmCnbKY1jdB/Lw/Z+T2zfUdXKTEH6+TclHg+Rnt4Sd0TEa2q8q4qC2Xqvf8l7xhBC/DqblUvWAtj/WS66ocXXoYRRNklkaW/TW1imuaCaSh041k5gFk1nOE4eKsC/UbADBhSq8VBx+puvYERMDlIr+SiN2P2XBvg9Cdyl7zlZh98YsrMsvkmYl3ap8aWDa2lCoBqr7jwLsOizm740Nab7mv1tgCtE5MThtbYyEmcIVFrLGTQd+gq3FZLmUqNHQpBSgbHcWDCHbQV60/W4zLAEuuS4+EfqZFPh7N9o6/UehQvUjK177XqIk2qGMZdqamPKV/IMy+Tji7QVzNOj5f06kFtaj4MEhuV6qwrbv+Cd+G1FQaUVWiCEHcf72l83I+y+lssmxojE/TNUYOE2PrkLM5cxekyjfe283Tv6xChVHvVj2TXIiG4T0Q1zLkAnc4SaaD9DbiKJ8uv9iviqhmU0u9EMm6MWzcDvR+B61e5VK37BmF/Y+nwb9LfofFcMtoZ8ZeqSJf9at2Iutq0d65YIGs5amYeurdTjyamgBTgkzdDDmlODI21ZszzHDMIJV0sxORvZuurZfhBOggArj96yo3rcVacq/SHg6lW5zRYA6Yxa2/74O1jACHDNLt+C1TUoeVADFMXqvfBkeT4jqZPYKmJcr4TBjfjIafGN55kB43RCXOwh61pm/qEbJD030nKnyeUcM2OchT2zPFKLKswIvVZThJ+YJbDPOSsbWN+iY+Wkw0rPyXmpC3QErrK/TdoisPAlQZ5TL1cGdt64ABeEt4VCuUgO+92N0Onuk/4ETRH41AfH6WdDdVAmcPLxuD3outuJj5d/UpPOdpYPuBk7Y6+nFx3/pQM9n9OXLsUhYaMCssAK+MbziHTjn6P6K/NV4I5xAuOx/Ue5Z9New6Ot66Cb4OocxtGyN87iTNZwwVe3CsYuQYaYpX3QRhndHGYaZEtgSMozKsCVkGJVhETKMyrAIGUZlWIQMozIsQoZRGRYhw6gMi5BhVIZFyDAqwyJkGJVhETKMyrAIGUZlWIQMozIsQoZRGRYhw6gMi5BhVIZFyDAqwyJkGJVhETKMyrAIGUZlWIQMozIsQoZRGRYhw6gMi5BhVIZFyDAqwyJkGJVhETKMyrAIGUZlWIQMozJfajzTwQvCMIyK8KpMDKMy7I4yjMqwCBlGZViEDKMyLEKGURkWIcOoDIuQYVSGRcgwKsMiZBiVYREyjMqwCBlGZViEDKMyLEKGURkWIcOoDIuQYVSGRcgwKsMiZBiVYREyjMqwCBlGZViEDKMyLEKGUZlRX/T0Ye0pZHYpX3TRcKxPwN3oRnHpJRQq0elLvo7fLP8K0NqGue/9XYmdgVefMOLxu5WvDMOEZBRL2I1GvwAFnssob6XPVs+AAAW25kv4kD4/7PALUHAVb7d/qoQZhgnHNHRH3XC8VY7yNxvgVGLGgutP+1FSUomWfiViRFx4v6wEJYdbMKbkDDOJTEMR9sPV0Y72s50kx7HiRsspJ3p6WtHcoUSNhLsFjo4e9LQ2j0voDDMZjCJCPZLnKkGJmUheRB+LdCiQI2Tm6vBN+vhmwkz5u4LxLmonTgkxMFtysX5jHrLuVaJGIsaM3Nz1yNmchcVKFMOoxTR8A7cLtuJS2N0GrNmZgySK6TlaCutJwJSRgv7jNji6+uCLiIVhZQZylsu1xECajbkwzxYxPrhOVKP6+Dn09JHTqYnFvGUP44nUBdCiB/WvW2GHCZZNZsRKOfjTt8J12YeISJHejDWrFiOG+5CZSWTUjpni0lOYO7A14fBfKVr0ggbGl3dARIue1MD4HxyfmI4ZX38/+q+40HDwv9F+bQ4M8bGI9PXA+cdq1PcEpqHNJ3/vqitBaV0zXD4t5t2zAPOi++A8Vo4Dx/tEajktbUrywfTXSNwLFyAuyk3pK1B6wAHxC4aZLMZZx1/F+V4lGIjnc5xXgpNHJJY8WYB8y3qsz86DZbmwXz3oCnVgdz2qT1CLMoYs3TN5yHlKuJ4FyMvNQ+5yrZIoAHcDak8q6bflSuktT+cjPT4C/R022M4o6RhmEvgCOVqRmBkdoYSB2BidEgpBRxfJk5qq5E7ODbjC2DjZ8RxGRydZwKHptTCtMNJRfbh43qXEMczE8wUS4fi5UxOphMbGsPSaCAzKnmEmh1FEqEd+7lJ0BWz5Uu9oYlBcV26i3Du6OjBuqTyLRg3uiiE7Blw4Yw9uz5G1CwlZyBj6uNDqCBo3dDW3S7/Xxoi9DDM53JqWMN4McwI5kp02lL5ZD8eZFjiOlOOVPcWo6QgxPK9PQYpI31Ejpz/lQMNbpXhDaSc+8sD4LCrDjIdRRDi0d/QUiqVpa0N6R0vb5Glrk9Q7On60SNpgwcMJWvSdbUDNoQrUHGtHf6wBi2aHEpRIvwEp87Vwi/TVNaj/yAVfzBKstaQHtSsZZqIZZZwweKK2oGAluaQInKgtmIkqckkRONmbGJjYrSbePriviHE/clHHYtDGm55hbpJbv47XaBFDbboxC2q86RnmJhmnCGdg/iwlGIjuTsxXggzDjI9pOG2NYW4vuMuBYVSGRcgwKsMiZBiVYREyjMqwCBlGZViEDKMyLEKGURkWIcOoDIuQYVSGRcgwKsMiZBiVYREyjMqwCBlGZViEDKMyLEKGURkWIcOoDIuQYVSGRcgwKsMiZBiVYREyjMqwCBlGZUZ925p4q/bAC3110XCsT8DdQ14KPPCSX/Fm7oGXAs/Aq08Y8fjdyleGYUIyiiXsRmPAG7XhuYxy6TX4nqC3ctuaL8mvwe8IfCv3VbzdrtZr8Bnmi8M0dEfdcLxVjvI3G+BUYgJxn6qhfeVo6FQiVMT1p/0oKalES4g1ZhhmrExDEfbD1dGO9rOdJMfh9LuctK8dnZ8oEarhRsspJ3p6WtHcoUQxzA0wigj1SJ6rBCVmIllan1CHAjlCZq5OXp8wYab8XcF4l8qLwUwqMTBbcrF+Yx6y7lWiGOYGmIavwXfBVlwKu9uANTtzkKTE+nHVFaP0hBuGx3Yi536KuNYD++FKNJx1oc8Xgci75sGUugbmRWJhzx7Uv26FHSZYNpnhXyy7ubIQtR33YPWza7FERFwjq3bUhobTF9DTR76lJhbzlpmxZtVixEjVVDMqX67FuYTVsMxvwsGjHizekAvj2VJYTwKmjbkwzxbpfHCdqEb18Va4LouVnYbmQ/S1o/7wu7Cf7yGbHwlt7D1IyciAKY7XBL5dGcUSDl2fsAmH/0rRQ9cnLO+AiFZjfcKWSitszW5ol5iR/si3cU/EX9FwuAYOqZ3mQ/+VfmnzSallPpfi/obPle+uP7yBiuNO9EfPg+GeBYiL7IHzWAWstf5W6ef4m/jNmUqU1Dnl1X9JM75+Oe9+JfOuuhKU1jXDdS0WhoWUT5Rbyqf0gENZMZgqhTLRnu3HvG+lI32lEXd7W2E7+C5VPcztyjjbhFdxvlcJBuL5HOeV4NTiQmc3qS16MR5enQLTA2aszX0G+ZufQNI4ljaLW7kWObnPId+yHuufWg/L02uxWENGq/McySaA6CTkFDyHgmf9li8AdwNqlZV9LdtykSPlk4/0+Aj0d9hgOyMSXUDXJfqYm4KsVBNMK9KRQ2nyN6YjTuxmbkvGKcLpRhwW3aMFLjuwf88evFK6X1qRF1FixfpxcO3v6PxDCQpfLkTh3lJUnvwckVEi3hdkQXHXXBhInCHp6CQLSPoi93NwZV8tCc1ITqcPF88LW7cYi+Lp47wNe/YUosRaCdspNyKjpcTMbco0FqEH7hDdo5/2yY6dH8PqfORmmLBEHwPfJ05pbfrivfvhCE42AoEu4hPY+JQZ8y7Z0RKqa3YM3KkZYoI1EcJzVYiEKTsfOalJMMRGoM/VDHu1FYUlNnSRgJnbk1FEqEd+7lJ0BWz5Uu9oYlBcV26i3Du6OjBu6Q0ulR2HeL0otj1oOh44U4Dos+PkOWGbYjE3QY7CtQjELU3HWkseCv5tJ/LTDIjod+J94RqGwRdU4BUXcX4K1q+gdlzcApgey4BR9OuMh7hYiJ9caHUgcNjQ1dwutQe1Mf4MY2BYsYbc32dQ8NxzyLmf4j9x4H0xCYK5LZmWlnDxqm8jls7MfZKsxGvkYh6xo/4tK1k4G5xesif3mmGWyjRZsdI9KC6zwXHeTZbThYuuTyUXUhctEpAVElfobkLtHxxoOeNA/ZvFsAUN9McgRnivrlbYFd36OpvgvCKHx4w+BSkJ5Hh21KD0zXo4TjnQ8FYp3lDaiY88QBbyWgsqXiE3tLIB7S75fLt6hGS1JFI5G+b2Y5QhiuA5ooKClWQNEThHVDATVWQNETjPlBiYU3oD+Fx2VBx6F+2fBLTK7tBSm4us3iP+Ln8fnMfKUXPUCXeAdYtZshaWtUuoaJPx/KgcJbXt6Ff2axMehvHau3i/c3AIpO9sDd446ECPkiZSvxhz+lrgvMOE3HzRaUJtzhdq4ExYg53Zg4Mm8nAJYNqUj3Q9RVzrQv0bB9FwftAXjrhrCTK+txZLxMlcc6O59gDdpp6B88EdkYhbsQG5q4IGZJnbiGkrwgG8fXBfISFSYY2JDt/l2X/ZTQU7ApHRWkQOte9KHhFRMdCG61i51o++y2SVIinNOHpWQ+I/Xti8fOhz99HfCLKA2oA2I3M7Mi3d0SA0WsRQe2okAQoiyf2MoQI9TIACJY+wAhSQyEW77aYFKPAfL2xeQnzy+bIAmXGKcAbmz1KCgejuxHwlyDDM+JiG09YY5vZi+rujDHOLwyJkGJVhETKMyrAIGUZlWIQMozIsQoZRGRYhw6gMi5BhVIZFyDAqwyJkGJVhETKMyrAIGUZlWIQMozIsQoZRGRYhw6gMi5BhVIZFyDAqwyJkGJVhETKMyrAIGUZlWIQMozKjvm1NrDk48EJfXTQc6xNw95CXAg+85FesWzjwUuAZePUJIx6/W/nKMExIRrGE3WgMXJPFcxnlYuGSVk/QW7ltzZfwIX1+2BH4Vu6reLt98hcJZZgvOtP6Nfg+lwPvHrWjpcstLfISET0Pix8w4+GlcdPwzdVONLz5J3Tpv4X1Kw1K3OTgPlUDW+sIa79pFyH9sST0/2k/Kj/6B5gta7F41DeLu+F4y4ZWyL/l9WmmjmnaJvTBWVeCPaU1sEtr0ctxfa522KtL8UqZf/np6YQbnWfb0X5+cEk2sTZ+4cuVaFa+TxT9LifaxbHCbR0u9NP5tJxyoqenFc0dyg9HpB+uDv9vb4JL9Sh9uRClR4PWOGZGYBQR6pEctFjQTCRL6xPqUCBHyMzVyesTJsyUvysY77oxK9hztBT7T9BDjJxLtXgBdv5bAQqefQ4787OQFEvFpbMefzgTsFrTNGXo2vgTRVxaPnbu3Clvj8lWN+aB3ME4aSWpGLp3uVi/MQ9Z90pJpgafso6/fyF/ZlSm32vwrzWjorASLd4YmCz5SB+6Yli/m+r4GMQMuFc+uE5Uo/p4K1yXxUpIsZi3zIw1q/zLp/Wg/nUr7DDhiRX9aKhzoEukizXAnJGDb/vz72tH/eF3YT/fQ5YgEtrYe5CSkQFTnHB8m1H5ci3OJaxGwdolcvqAfC2bzIgNWj7tTil9a3+/tCBpRFQkYpdZkLsqVlryzVZLLvYlOo4vAtrZiwKOI1dA1pOAaa0Z/e/VoEn7CAqe9B8zBB/txwtvOSUR5qcFr3w/kNdG/xr7/nt1Dj19ZO804l49jCdSF0ALF2zFpdL1yMvBEX0OlL/+Li5E3IPV/uXdLtlRebgBrZf64IvQIm5hCjIeMyFOoxyPKk9JgBGRiNTQ756l34m8mLCM2jFTXHoKcwe2Jhz+K0WLXtDA+PIOiGjRkxoY/4PjN9Ax0+mUFgLFXBPMoZbsiwwUINBFbmtpXTNc12JhWLgAcVFuOI9VoPSA32X1yTWzqwHlle1kRgwwzI6Er8eJd6vrSUqCwCWz05G+0oi7va2wHXyXiqbgc/xNsmqBNk3Jl7Yx1/leUahtcLgjMCd+ARbEx8B3qRm219/A+4oP6CPh9l9xoeFAORyXKOebaDDIedGmnODAvfJpMe+eBZgX3Set73jgeAjnngS4v6QG7X2RMD6uCLDLRuXBhubLkVi0PB0pS2LQf8aGUorj5b5vnHE+4qs436sEA/F8jvNK8KZxu6U2SWRsHNmjUXA3oFZZCdeyLRc5T62H5WmynvER6O+wwXZGSSeIXIKsZ/NhoTQ5my1IIbcWPV24IO1Ulsyem4KsVBNMK9KRQ/nkb1QswrhZgrXPFtB5iLAB6RQWVhCaJKRn5+CZZ+RzXZ+dB8tyir/WRe1J6YcKETA8ko/nCsgNH7C8N4m7HtUnlHv1TJ50/JzNBcjLzUPucqGwAOh8bL8jqy68ke/5vRE3eRF2uCPoejbnYS3dJ/NjFuRvSIL2Ezv+cKIfsatyUZAtd+rE3L+RmhBsBcfCTdSzk0SE7JaJRT9HpaOTLCBph9zPuQNXoiURGUnAPlw8L9sxCc1MfGVgfcJYxEQrQYnFWCQEc96GPXsKUWKthO2UG5FBaSaIHgcO7BUdNnScsnr8NUInRfuCzKkWsXMnuH+yo0uy+sH3iu5EnKiNArhGXsFr5GZ/QhVBmiWgOeBEZzd9RHhw7q1ylL+pbCcuSnu7Os9Jn8z4mX4iXBgP6bl3nUPzGF2cOzVDbKYmYpxDGJEwZecjJzUJhtgI9LmaYa+2orBkgt2sMxWw1jbDrV2Mh9flIuN+4NRHTmXn1DDsXg3lshPtko9Oldi5zuE9pXcMvbM6zKFmwAL9PyjfmfEyigj1yM9diq6ALV/qHU0MiuvKTZR7R1cHxi29sTHCyCQ8sJAKircFtQfI/RkiAtGueeW1StiF+0i1uLAXF1odQYXF1dwutQfFarhjJwaGFWuQk/sMCp57Djn3028/ceB9MTkhJGS6xilQ1/mLdJ5aGNPWIGl+DObea570McUB7oqR1vC/cMYePLwz9BrukDvE1iREov9sLSo+8qemtrjIwPsVGNeRKy3c6cBtqq7jFmT6WUKySkvWbYDpLnJJqV1X/EoJ9r9VD/uRGux/rVDqfeu7/DdERFFSfQpSqLD4OmpQ+mY9HKccaHirFG8o7cRHHhi1VSlzrQUVr5B7WNmAdpebmqUudPUIWWtJyCLBnYgQd6qzARXHWtBypgE1rx+A/bLYNxqf4twJB5o73NLy2CAJtJ92yp0519xoPie6tKaAeDPM4l512uR7daYFjiPleGVPMWo6Aqqw6AVIIlc4aUMWkrT9cNZaYZMmYBhgXmVApKgcrTVwnBf3qQstlEfx794fNm7b190Ex4kWpWOLGYlRRDi0d/QUiqVpa0N6R0vb5GlrE9E7KrhjLtLz8pC+JA7a/h44P2qA7ZgDzktkR+abkJWbQwVEJNRSYdmAlPlauM+SMKprUP+RC76YJVhrSQ9q+4zMHCxepEXfmXqUlxajuNiKeip4cSvXIl0v9i9ByrdEB4qbCl0FKkisF+K+jSWjGNoF91KhFYPmdTWoPNIC3wMZeDieYk7ux54XXsALe97AWck+TQXiXlnwcAJdp7hXhypQc6wd/bEGLJodorK6w4A160xk/9ywH6hAs5dyuD8HltULEOlyoOZ38n2qOH4BEbE6aShGIs6IBVSB+rreRw1d93FuKo7KtJ625kd00vTTQ46IIpdqoHNlCN4+uK+IcUJKM0YDOBwf+tx99DeCLKB2eLuyn45BRiMyWovIsQpc+U1gfr4+N/rEGGGoY0wFN32vRrlPyn4xnHTjz+L2YRq6o8OJjKb2CLXvwgpQoNHKaW7qoYtCJY4VRhyR4hjjEKBA+U1gfhHk44Y9xlRw0/dqlPuk7GcBjo1xinAG5s9SgoHo7sR8JcgwzPiYftPWGOY24wvhjjLMrQyLkGFUhkXIMCrDImQYlWERMozKsAgZRmVYhAyjMixChlEZFiHDqAyLkGFUhkXIMCrDImQYlWERMozKsAgZRmVYhAyjMixChlEZFiHDqAyLkGFUhkXIMCrDImQYlWERMozKsAgZRmVYhAyjMixChlEZFiHDqAyLkGFUhkXIMCrDImQYlWERMozKsAgZRlWA/w8AP+ON4GSEqgAAAABJRU5ErkJggg==\" alt=\"\"><br></div>', '2022-11-28 14:09:29', 1),
(13, 1, 2, 'Ticket Cerrado', '2022-11-28 14:09:58', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_categoria`
--

CREATE TABLE `tm_categoria` (
  `cat_id` int(11) NOT NULL,
  `cat_nom` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_categoria`
--

INSERT INTO `tm_categoria` (`cat_id`, `cat_nom`, `est`) VALUES
(1, 'Hardware', 1),
(2, 'Software', 1),
(3, 'Incidencia', 1),
(4, 'Petición de Servicio', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_prioridad`
--

CREATE TABLE `tm_prioridad` (
  `prio_id` int(11) NOT NULL,
  `prio_nom` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_prioridad`
--

INSERT INTO `tm_prioridad` (`prio_id`, `prio_nom`, `est`) VALUES
(1, 'Bajo', 1),
(2, 'Medio', 1),
(3, 'Alto', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_ticket`
--

CREATE TABLE `tm_ticket` (
  `tick_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `tick_titulo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `tick_descrip` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `tick_estado` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fech_crea` datetime DEFAULT NULL,
  `usu_asig` int(11) DEFAULT NULL,
  `fech_asig` datetime DEFAULT NULL,
  `fech_cierre` datetime DEFAULT NULL,
  `prio_id` int(11) DEFAULT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_ticket`
--

INSERT INTO `tm_ticket` (`tick_id`, `usu_id`, `cat_id`, `tick_titulo`, `tick_descrip`, `tick_estado`, `fech_crea`, `usu_asig`, `fech_asig`, `fech_cierre`, `prio_id`, `est`) VALUES
(1, 1, 1, 'Test Email', '<p>Envío Email</p>', 'Cerrado', '2022-11-25 15:22:53', NULL, NULL, '2022-11-28 14:09:58', 3, 1),
(2, 1, 1, 'Test 2 Email', '<p>Email 2</p>', 'Abierto', '2022-11-25 15:24:40', NULL, NULL, NULL, 2, 1),
(3, 1, 2, 'Instalación Chrome', '<p>Instalación Google Chrome.</p>', 'Abierto', '2022-11-25 15:36:28', 6, '2022-11-25 15:58:31', NULL, 1, 1),
(4, 1, 1, 'Pedido Toner', '<p>Solicitamos toner para la impresora HP p1102w.</p>', 'Cerrado', '2022-11-25 15:37:27', NULL, NULL, '2022-11-25 19:03:11', 1, 1),
(5, 1, 1, 'Test', '<p>aaaaaaaaaaaaaaaaaaaaaa</p>', 'Abierto', '2022-11-25 19:22:35', NULL, NULL, NULL, 2, 1),
(6, 1, 2, 'Test 3', '<p>ddddddddddddddddd</p>', 'Abierto', '2022-11-25 20:16:29', NULL, NULL, NULL, 2, 1),
(7, 1, 2, 'Instalación Chrome', '<p>wfwdsdasdasdasd</p>', 'Cerrado', '2022-11-28 13:57:12', 6, '2022-11-28 14:01:01', '2022-11-28 14:06:11', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_usuario`
--

CREATE TABLE `tm_usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_nom` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_ape` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_correo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `usu_pass` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `fech_crea` datetime DEFAULT NULL,
  `fech_modi` datetime DEFAULT NULL,
  `fech_elim` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla Mantenedor de Usuarios';

--
-- Volcado de datos para la tabla `tm_usuario`
--

INSERT INTO `tm_usuario` (`usu_id`, `usu_nom`, `usu_ape`, `usu_correo`, `usu_pass`, `rol_id`, `fech_crea`, `fech_modi`, `fech_elim`, `estado`) VALUES
(1, 'Guillermo', 'Lapettina', 'glapettina@gmail.com', '76881226643500654b9358eb96ecee2e', 2, NULL, NULL, NULL, 1),
(12, 'Alumno', 'Alumno', 'alumno@correo.com', 'c6865cf98b133f1f3de596a4a2894630', 1, '2022-12-02 15:54:55', NULL, NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`materia_id`);

--
-- Indices de la tabla `materias_taller`
--
ALTER TABLE `materias_taller`
  ADD PRIMARY KEY (`materia_id`);

--
-- Indices de la tabla `td_documento`
--
ALTER TABLE `td_documento`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indices de la tabla `td_documento_detalle`
--
ALTER TABLE `td_documento_detalle`
  ADD PRIMARY KEY (`det_id`);

--
-- Indices de la tabla `td_documento_taller`
--
ALTER TABLE `td_documento_taller`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indices de la tabla `td_ticketdetalle`
--
ALTER TABLE `td_ticketdetalle`
  ADD PRIMARY KEY (`tickd_id`);

--
-- Indices de la tabla `tm_categoria`
--
ALTER TABLE `tm_categoria`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `tm_prioridad`
--
ALTER TABLE `tm_prioridad`
  ADD PRIMARY KEY (`prio_id`);

--
-- Indices de la tabla `tm_ticket`
--
ALTER TABLE `tm_ticket`
  ADD PRIMARY KEY (`tick_id`);

--
-- Indices de la tabla `tm_usuario`
--
ALTER TABLE `tm_usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `materia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `materias_taller`
--
ALTER TABLE `materias_taller`
  MODIFY `materia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `td_documento`
--
ALTER TABLE `td_documento`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `td_documento_detalle`
--
ALTER TABLE `td_documento_detalle`
  MODIFY `det_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `td_documento_taller`
--
ALTER TABLE `td_documento_taller`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `td_ticketdetalle`
--
ALTER TABLE `td_ticketdetalle`
  MODIFY `tickd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tm_categoria`
--
ALTER TABLE `tm_categoria`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tm_prioridad`
--
ALTER TABLE `tm_prioridad`
  MODIFY `prio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tm_ticket`
--
ALTER TABLE `tm_ticket`
  MODIFY `tick_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tm_usuario`
--
ALTER TABLE `tm_usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
