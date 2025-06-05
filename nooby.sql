-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-05-2025 a las 00:29:47
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nooby`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas_1`
--

CREATE TABLE `estadisticas_1` (
  `stat_id` bigint(20) UNSIGNED NOT NULL,
  `tipo` tinyint(2) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `id` tinyint(2) UNSIGNED NOT NULL,
  `ip` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas_user`
--

CREATE TABLE `estadisticas_user` (
  `stat_id` bigint(20) UNSIGNED NOT NULL,
  `tipo` tinyint(2) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `id` tinyint(2) UNSIGNED NOT NULL,
  `userid` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items_modu_panel`
--

CREATE TABLE `items_modu_panel` (
  `id` char(30) NOT NULL,
  `titulo` char(50) NOT NULL,
  `archivo` char(35) NOT NULL,
  `head` text,
  `moduloid` tinyint(4) NOT NULL,
  `imagen` char(20) DEFAULT NULL,
  `descripcion` char(255) NOT NULL,
  `meta_variable` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `items_modu_panel`
--

INSERT INTO `items_modu_panel` (`id`, `titulo`, `archivo`, `head`, `moduloid`, `imagen`, `descripcion`, `meta_variable`) VALUES
('admin', 'Modulos', 'admin.php', '', 4, '', '', b'0'),
('estadisticas', 'Estadisticas2', 'estadisticas.php', '123', 29, NULL, '', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_estados`
--

CREATE TABLE `lista_estados` (
  `id` int(5) UNSIGNED NOT NULL,
  `nombre` char(30) NOT NULL,
  `paisid` int(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lista_estados`
--

INSERT INTO `lista_estados` (`id`, `nombre`, `paisid`) VALUES
(1, 'Buenos Aires', 1),
(2, 'Capital Federal', 1),
(3, 'Catamarca', 1),
(4, 'Chaco', 1),
(5, 'Chubut', 1),
(6, 'Cordoba', 1),
(7, 'Corrientes', 1),
(8, 'Entre Rios', 1),
(9, 'Formosa', 1),
(10, 'Jujuy', 1),
(11, 'La Pampa', 1),
(12, 'La Rioja', 1),
(13, 'Mendoza', 1),
(14, 'Misiones', 1),
(15, 'Neuquen', 1),
(16, 'Rio Negro', 1),
(17, 'Salta', 1),
(18, 'San Juan', 1),
(19, 'San Luis', 1),
(20, 'Santa Cruz', 1),
(21, 'Santa Fe', 1),
(22, 'Santiago del Estero', 1),
(23, 'Tierra del Fuego', 1),
(24, 'Tucuman', 1),
(25, 'Chuquisaca', 2),
(26, 'Cochabamba', 2),
(27, 'Beni', 2),
(28, 'La Paz', 2),
(29, 'Oruro', 2),
(30, 'Pando', 2),
(31, 'Potosi', 2),
(32, 'Santa Cruz', 2),
(33, 'Tarija', 2),
(34, 'Acre', 3),
(35, 'Alagoas', 3),
(36, 'Amapa', 3),
(37, 'Amazonas', 3),
(38, 'Bahia', 3),
(39, 'Ceara', 3),
(40, 'Distrito Federal', 3),
(41, 'Espirito Santo', 3),
(42, 'Goias', 3),
(43, 'Maranhao', 3),
(44, 'Mato Grosso', 3),
(45, 'Mato Grosso do Sul', 3),
(46, 'Minas Gerais', 3),
(47, 'Para', 3),
(48, 'Paraiba', 3),
(49, 'Parana', 3),
(50, 'Pernambuco', 3),
(51, 'Piaui', 3),
(52, 'Rio de Janeiro', 3),
(53, 'Rio Grande do Norte', 3),
(54, 'Rio Grande do Sul', 3),
(55, 'Rondonia', 3),
(56, 'Roraima', 3),
(57, 'Santa Catarina', 3),
(58, 'Sao Paulo', 3),
(59, 'Sergipe', 3),
(60, 'Tocantins', 3),
(61, 'Alberta', 4),
(62, 'British Columbia', 4),
(63, 'Manitoba', 4),
(64, 'New Brunswick', 4),
(65, 'Newfoundland and Labrador', 4),
(66, 'Northwest Territories', 4),
(67, 'Nova Scotia', 4),
(68, 'Nunavut', 4),
(69, 'Ontario', 4),
(70, 'Prince Edward Island', 4),
(71, 'Quebec', 4),
(72, 'Saskatchewan', 4),
(73, 'Yukon Territory', 4),
(74, 'Antofagasta', 5),
(75, 'Araucania', 5),
(76, 'Atacama', 5),
(77, 'Bio-Bio', 5),
(78, 'Coquimbo', 5),
(79, 'Libertador General B.', 5),
(80, 'Los Lagos', 5),
(81, 'Magallanes', 5),
(82, 'Maule', 5),
(83, 'Santiago', 5),
(84, 'Tarapaca', 5),
(85, 'Valparaiso', 5),
(86, 'Amazonas', 6),
(87, 'Antioquia', 6),
(88, 'Arauca', 6),
(89, 'Atlantico', 6),
(90, 'Distrito Capital de Bogota', 6),
(91, 'Bolivar', 6),
(92, 'Boyaca', 6),
(93, 'Caldas', 6),
(94, 'Caqueta', 6),
(95, 'Casanare', 6),
(96, 'Cauca', 6),
(97, 'Cesar', 6),
(98, 'Choco', 6),
(99, 'Cordoba', 6),
(100, 'Cundinamarca', 6),
(101, 'Guainia', 6),
(102, 'Guaviare', 6),
(103, 'Huila', 6),
(104, 'La Guajira', 6),
(105, 'Magdalena', 6),
(106, 'Meta', 6),
(107, 'Narino', 6),
(108, 'Norte de Santander', 6),
(109, 'Putumayo', 6),
(110, 'Quindio', 6),
(111, 'Risaralda', 6),
(112, 'San Andres y Providencia', 6),
(113, 'Santander', 6),
(114, 'Sucre', 6),
(115, 'Tolima', 6),
(116, 'Valle del Cauca', 6),
(117, 'Vaupes', 6),
(118, 'Vichada', 6),
(119, 'Alibori', 7),
(120, 'Atakora', 7),
(121, 'Atlantique', 7),
(122, 'Borgou', 7),
(123, 'Collines', 7),
(124, 'Kouffo', 7),
(125, 'Donga', 7),
(126, 'Littoral', 7),
(127, 'Mono', 7),
(128, 'Oueme', 7),
(129, 'Plateau', 7),
(130, 'Zou', 7),
(131, 'Camaguey', 8),
(132, 'Ciego de Avila', 8),
(133, 'Cienfuegos', 8),
(134, 'Ciudad de La Habana', 8),
(135, 'Granma', 8),
(136, 'Guantanamo', 8),
(137, 'Holguin', 8),
(138, 'Isla de la Juventud', 8),
(139, 'La Habana', 8),
(140, 'Las Tunas', 8),
(141, 'Matanzas', 8),
(142, 'Pinar del Rio', 8),
(143, 'Sancti Spiritus', 8),
(144, 'Santiago de Cuba', 8),
(145, 'Villa Clara', 8),
(146, 'Azuay', 9),
(147, 'Bolivar', 9),
(148, 'Canar', 9),
(149, 'Carchi', 9),
(150, 'Chimborazo', 9),
(151, 'Cotopaxi', 9),
(152, 'El Oro', 9),
(153, 'Esmeraldas', 9),
(154, 'Galapagos', 9),
(155, 'Guayas', 9),
(156, 'Imbabura', 9),
(157, 'Loja', 9),
(158, 'Los Rios', 9),
(159, 'Manabi', 9),
(160, 'Morona-Santiago', 9),
(161, 'Napo', 9),
(162, 'Orellana', 9),
(163, 'Pastaza', 9),
(164, 'Pichincha', 9),
(165, 'Sucumbios', 9),
(166, 'Tungurahua', 9),
(167, 'Zamora-Chinchipe', 9),
(168, 'Ahuachapan', 10),
(169, 'Cabanas', 10),
(170, 'Chalatenango', 10),
(171, 'Cuscatlan', 10),
(172, 'La Libertad', 10),
(173, 'La Paz', 10),
(174, 'La Union', 10),
(175, 'Morazan', 10),
(176, 'San Miguel', 10),
(177, 'San Salvador', 10),
(178, 'Santa Ana', 10),
(179, 'San Vicente', 10),
(180, 'Sonsonate', 10),
(181, 'Usulutan', 10),
(182, 'Andalucia', 11),
(183, 'Aragon', 11),
(184, 'Asturias', 11),
(185, 'Baleares', 11),
(186, 'Ceuta', 11),
(187, 'Canarias', 11),
(188, 'Cantabria', 11),
(189, 'Castilla-La Mancha', 11),
(190, 'Castilla y Leon', 11),
(191, 'Cataluña', 11),
(192, 'Comunidad Valenciana', 11),
(193, 'Extremadura', 11),
(194, 'Galicia', 11),
(195, 'La Rioja', 11),
(196, 'Madrid', 11),
(197, 'Melilla', 11),
(198, 'Murcia', 11),
(199, 'Navarra', 11),
(200, 'Pais Vasco', 11),
(201, 'Alabama', 12),
(202, 'Alaska', 12),
(203, 'Arizona', 12),
(204, 'Arkansas', 12),
(205, 'California', 12),
(206, 'Colorado', 12),
(207, 'Connecticut', 12),
(208, 'Delaware', 12),
(209, 'District of Columbia', 12),
(210, 'Florida', 12),
(211, 'Georgia', 12),
(212, 'Hawaii', 12),
(213, 'Idaho', 12),
(214, 'Illinois', 12),
(215, 'Indiana', 12),
(216, 'Iowa', 12),
(217, 'Kansas', 12),
(218, 'Kentucky', 12),
(219, 'Louisiana', 12),
(220, 'Maine', 12),
(221, 'Maryland', 12),
(222, 'Massachusetts', 12),
(223, 'Michigan', 12),
(224, 'Minnesota', 12),
(225, 'Mississippi', 12),
(226, 'Missouri', 12),
(227, 'Montana', 12),
(228, 'Nebraska', 12),
(229, 'Nevada', 12),
(230, 'New Hampshire', 12),
(231, 'New Jersey', 12),
(232, 'New Mexico', 12),
(233, 'New York', 12),
(234, 'North Carolina', 12),
(235, 'North Dakota', 12),
(236, 'Ohio', 12),
(237, 'Oklahoma', 12),
(238, 'Oregon', 12),
(239, 'Pennsylvania', 12),
(240, 'Rhode Island', 12),
(241, 'South Carolina', 12),
(242, 'South Dakota', 12),
(243, 'Tennessee', 12),
(244, 'Texas', 12),
(245, 'Utah', 12),
(246, 'Vermont', 12),
(247, 'Virginia', 12),
(248, 'Washington', 12),
(249, 'West Virginia', 12),
(250, 'Wisconsin', 12),
(251, 'Wyoming', 12),
(252, 'Alta Verapaz', 13),
(253, 'Baja Verapaz', 13),
(254, 'Chimaltenango', 13),
(255, 'Chiquimula', 13),
(256, 'El Progreso', 13),
(257, 'Escuintla', 13),
(258, 'Guatemala', 13),
(259, 'Huehuetenango', 13),
(260, 'Izabal, Jalapa', 13),
(261, 'Jutiapa', 13),
(262, 'Peten', 13),
(263, 'Quetzaltenango', 13),
(264, 'Quiche', 13),
(265, 'Retalhuleu', 13),
(266, 'Sacatepequez', 13),
(267, 'San Marcos', 13),
(268, 'Santa Rosa', 13),
(269, 'Solola', 13),
(270, 'Suchitepequez', 13),
(271, 'Totonicapan', 13),
(272, 'Zacapa', 13),
(273, 'Atlantida', 14),
(274, 'Choluteca', 14),
(275, 'Colon', 14),
(276, 'Comayagua', 14),
(277, 'Copan', 14),
(278, 'Cortes', 14),
(279, 'El Paraiso', 14),
(280, 'Francisco Morazan', 14),
(281, 'Gracias a Dios', 14),
(282, 'Intibuca', 14),
(283, 'Islas de la Bahia', 14),
(284, 'La Paz', 14),
(285, 'Lempira', 14),
(286, 'Ocotepeque', 14),
(287, 'Olancho', 14),
(288, 'Santa Barbara', 14),
(289, 'Valle', 14),
(290, 'Yoro', 14),
(291, 'Aguascalientes', 15),
(292, 'Baja California', 15),
(293, 'Baja California Sur', 15),
(294, 'Campeche', 15),
(295, 'Chiapas', 15),
(296, 'Chihuahua', 15),
(297, 'Coahuila de Zaragoza', 15),
(298, 'Colima', 15),
(299, 'Distrito Federal', 15),
(300, 'Durango', 15),
(301, 'Guanajuato', 15),
(302, 'Guerrero', 15),
(303, 'Hidalgo', 15),
(304, 'Jalisco', 15),
(305, 'Mexico', 15),
(306, 'Michoacan de Ocampo', 15),
(307, 'Morelos', 15),
(308, 'Nayarit', 15),
(309, 'Nuevo Leon', 15),
(310, 'Oaxaca', 15),
(311, 'Puebla', 15),
(312, 'Queretaro de Arteaga', 15),
(313, 'Quintana Roo', 15),
(314, 'San Luis Potosi', 15),
(315, 'Sinaloa', 15),
(316, 'Sonora', 15),
(317, 'Tabasco', 15),
(318, 'Tamaulipas', 15),
(319, 'Tlaxcala', 15),
(320, 'Veracruz-Llave', 15),
(321, 'Yucatan', 15),
(322, 'Zacatecas', 15),
(323, 'Atlantico Norte', 16),
(324, 'Atlantico Sur', 16),
(325, 'Boaco', 16),
(326, 'Carazo', 16),
(327, 'Chinandega', 16),
(328, 'Chontales', 16),
(329, 'Esteli', 16),
(330, 'Granada', 16),
(331, 'Jinotega', 16),
(332, 'Leon', 16),
(333, 'Madriz', 16),
(334, 'Managua', 16),
(335, 'Masaya', 16),
(336, 'Matagalpa', 16),
(337, 'Nueva Segovia', 16),
(338, 'Rio San Juan', 16),
(339, 'Rivas', 16),
(340, 'Bocas del Toro', 17),
(341, 'Chiriqui', 17),
(342, 'Cocle', 17),
(343, 'Colon', 17),
(344, 'Darien', 17),
(345, 'Herrera', 17),
(346, 'Los Santos', 17),
(347, 'Panama', 17),
(348, 'San Blas', 17),
(349, 'Kuna Yala', 17),
(350, 'Veraguas', 17),
(351, 'Alto Paraguay', 18),
(352, 'Alto Parana', 18),
(353, 'Amambay', 18),
(354, 'Asuncion', 18),
(355, 'Boqueron', 18),
(356, 'Caaguazu', 18),
(357, 'Caazapa', 18),
(358, 'Canindeyu', 18),
(359, 'Central', 18),
(360, 'Concepcion', 18),
(361, 'Cordillera', 18),
(362, 'Guaira', 18),
(363, 'Itapua', 18),
(364, 'Misiones', 18),
(365, 'Neembucu', 18),
(366, 'Paraguari', 18),
(367, 'Presidente Hayes', 18),
(368, 'San Pedro', 18),
(369, 'Amazonas', 19),
(370, 'Ancash', 19),
(371, 'Apurimac', 19),
(372, 'Arequipa', 19),
(373, 'Ayacucho', 19),
(374, 'Cajamarca', 19),
(375, 'Callao', 19),
(376, 'Cusco', 19),
(377, 'Huancavelica', 19),
(378, 'Huanuco', 19),
(379, 'Ica', 19),
(380, 'Junin', 19),
(381, 'La Libertad', 19),
(382, 'Lambayeque', 19),
(383, 'Lima', 19),
(384, 'Madre de Dios', 19),
(385, 'Moquegua', 19),
(386, 'Pasco', 19),
(387, 'Piura', 19),
(388, 'Puno', 19),
(389, 'San Martin', 19),
(390, 'Tacna', 19),
(391, 'Tumbes', 19),
(392, 'Ucayali', 19),
(393, 'Adjuntas', 20),
(394, 'Aguada', 20),
(395, 'Aguadilla', 20),
(396, 'Aguas Buenas', 20),
(397, 'Aibonito', 20),
(398, 'Anasco', 20),
(399, 'Arecibo', 20),
(400, 'Arroyo', 20),
(401, 'Barceloneta', 20),
(402, 'Barranquitas', 20),
(403, 'Bayamon', 20),
(404, 'Cabo Rojo', 20),
(405, 'Caguas', 20),
(406, 'Camuy', 20),
(407, 'Canovanas', 20),
(408, 'Carolina', 20),
(409, 'Catano', 20),
(410, 'Cayey', 20),
(411, 'Ceiba', 20),
(412, 'Ciales', 20),
(413, 'Cidra', 20),
(414, 'Coamo', 20),
(415, 'Comerio', 20),
(416, 'Corozal', 20),
(417, 'Culebra', 20),
(418, 'Dorado', 20),
(419, 'Fajardo', 20),
(420, 'Florida', 20),
(421, 'Guanica', 20),
(422, 'Guayama', 20),
(423, 'Guayanilla', 20),
(424, 'Guaynabo', 20),
(425, 'Gurabo', 20),
(426, 'Hatillo', 20),
(427, 'Hormigueros', 20),
(428, 'Humacao', 20),
(429, 'Isabela', 20),
(430, 'Jayuya', 20),
(431, 'Juana Diaz', 20),
(432, 'Juncos', 20),
(433, 'Lajas', 20),
(434, 'Lares', 20),
(435, 'Las Marias', 20),
(436, 'Las Piedras', 20),
(437, 'Loiza', 20),
(438, 'Luquillo', 20),
(439, 'Manati', 20),
(440, 'Maricao', 20),
(441, 'Maunabo', 20),
(442, 'Mayaguez', 20),
(443, 'Moca', 20),
(444, 'Morovis', 20),
(445, 'Naguabo', 20),
(446, 'Naranjito', 20),
(447, 'Orocovis', 20),
(448, 'Patillas', 20),
(449, 'Penuelas', 20),
(450, 'Ponce', 20),
(451, 'Quebradillas', 20),
(452, 'Rincon', 20),
(453, 'Rio Grande', 20),
(454, 'Sabana Grande', 20),
(455, 'Salinas', 20),
(456, 'San German', 20),
(457, 'San Juan', 20),
(458, 'San Lorenzo', 20),
(459, 'San Sebastian', 20),
(460, 'Santa Isabel', 20),
(461, 'Toa Alta', 20),
(462, 'Toa Baja', 20),
(463, 'Trujillo Alto', 20),
(464, 'Utuado', 20),
(465, 'Vega Alta', 20),
(466, 'Vega Baja', 20),
(467, 'Vieques', 20),
(468, 'Villalba', 20),
(469, 'Yabucoa', 20),
(470, 'Yauco', 20),
(471, 'Artigas', 21),
(472, 'Canelones', 21),
(473, 'Cerro Largo', 21),
(474, 'Colonia', 21),
(475, 'Durazno', 21),
(476, 'Flores', 21),
(477, 'Florida', 21),
(478, 'Lavalleja', 21),
(479, 'Maldonado', 21),
(480, 'Montevideo', 21),
(481, 'Paysandu', 21),
(482, 'Rio Negro', 21),
(483, 'Rivera', 21),
(484, 'Rocha', 21),
(485, 'Salto', 21),
(486, 'San Jose', 21),
(487, 'Soriano', 21),
(488, 'Tacuarembo', 21),
(489, 'Treinta y Tres', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_paises`
--

CREATE TABLE `lista_paises` (
  `paisid` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `nombre` char(23) NOT NULL,
  `divisa` char(10) NOT NULL,
  `simb_div` char(5) NOT NULL,
  `abre_div` char(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lista_paises`
--

INSERT INTO `lista_paises` (`paisid`, `nombre`, `divisa`, `simb_div`, `abre_div`) VALUES
(6, 'Colombia', 'Peso', '&#36;', 'COP'),
(9, 'Ecuador', 'Dólar', '&#36;', 'USD'),
(19, 'Peru', 'Nuevo sol', 'S/.', 'PER'),
(12, 'EEUU', 'Dolar', '&#36;', 'USD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logeos_errados`
--

CREATE TABLE `logeos_errados` (
  `usuario` char(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `logeos_bad` smallint(2) NOT NULL DEFAULT '0',
  `ultimo_logeo_bad` int(10) NOT NULL,
  `ip` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `moduloid` tinyint(3) UNSIGNED NOT NULL,
  `nombre` char(15) NOT NULL,
  `menuid` tinyint(1) NOT NULL,
  `permiso_plan` tinyint(1) NOT NULL,
  `version` tinyint(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`moduloid`, `nombre`, `menuid`, `permiso_plan`, `version`) VALUES
(4, 'Modulos', 1, 1, 1),
(26, 'usuarios', 0, 0, 0),
(29, 'estadisticas', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina_datos`
--

CREATE TABLE `pagina_datos` (
  `id_page` smallint(1) UNSIGNED NOT NULL,
  `titulo` char(90) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `icono` char(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen_redes` char(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` char(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` char(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pie_pagina` char(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `default_item` char(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pagina_datos`
--

INSERT INTO `pagina_datos` (`id_page`, `titulo`, `icono`, `imagen_redes`, `descripcion`, `nombre`, `pie_pagina`, `default_item`) VALUES
(1, 'G4mers.club - Tumbes', '', '', '', '', '', 'tienda'),
(2, 'Tienda virtual gratuita - Ventas.tienda', 'este es el icon', 'imagen en redes', 'Esta es una descripción', '', '', 'ventas_tienda'),
(3, 'Musica', '', '', '', '', '', 'musica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preregistro`
--

CREATE TABLE `preregistro` (
  `preid` int(10) UNSIGNED NOT NULL,
  `email` char(90) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `paisid` tinyint(3) UNSIGNED NOT NULL,
  `nombres` char(19) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` char(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ciudadid` smallint(6) NOT NULL,
  `fecha` datetime NOT NULL,
  `creado` bit(1) NOT NULL DEFAULT b'0',
  `veces_enviado` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `userid` int(11) NOT NULL,
  `user` char(30) NOT NULL,
  `email` char(50) NOT NULL,
  `nombres` char(26) NOT NULL,
  `apellidos` char(40) NOT NULL,
  `paisid` smallint(3) DEFAULT NULL,
  `ciudadid` int(7) DEFAULT NULL,
  `localidad` char(20) DEFAULT NULL,
  `telefono1` char(20) DEFAULT NULL,
  `telefono2` char(20) DEFAULT NULL,
  `password` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ult_login` date NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `foto` char(20) NOT NULL,
  `face_id` char(20) DEFAULT NULL,
  `sexo` binary(1) NOT NULL,
  `nacimiento` date DEFAULT NULL,
  `fecha_reg` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`userid`, `user`, `email`, `nombres`, `apellidos`, `paisid`, `ciudadid`, `localidad`, `telefono1`, `telefono2`, `password`, `ult_login`, `tipo`, `foto`, `face_id`, `sexo`, `nacimiento`, `fecha_reg`) VALUES
(1, 'eder', 'eder.hidalgo.sandoval@hotmail.com', 'Eder', 'Hidalgo Sandoval', NULL, NULL, NULL, NULL, NULL, '$2y$10$NB.3zLXB/fmnVF6gf9BOpu6UVIr0Yl3FJpGubhkCzDn3Z8dlJwuOa', '2024-02-15', 3, '0', NULL, 0x31, NULL, '2012-07-08'),
(29, 'Evelyn', 'evelyn14_89@hotmail.com', 'Evelyn Villacriz Diaz', 'Evelyn Villacriz Diaz', NULL, NULL, NULL, NULL, NULL, 'ad463d', '2012-09-04', 0, '0', NULL, 0x31, NULL, '2012-09-04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estadisticas_1`
--
ALTER TABLE `estadisticas_1`
  ADD PRIMARY KEY (`stat_id`);

--
-- Indices de la tabla `estadisticas_user`
--
ALTER TABLE `estadisticas_user`
  ADD PRIMARY KEY (`stat_id`),
  ADD KEY `userid` (`userid`);

--
-- Indices de la tabla `items_modu_panel`
--
ALTER TABLE `items_modu_panel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lista_estados`
--
ALTER TABLE `lista_estados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigo_pais` (`paisid`);

--
-- Indices de la tabla `lista_paises`
--
ALTER TABLE `lista_paises`
  ADD PRIMARY KEY (`paisid`);

--
-- Indices de la tabla `logeos_errados`
--
ALTER TABLE `logeos_errados`
  ADD PRIMARY KEY (`usuario`,`ip`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`moduloid`);

--
-- Indices de la tabla `pagina_datos`
--
ALTER TABLE `pagina_datos`
  ADD PRIMARY KEY (`id_page`);

--
-- Indices de la tabla `preregistro`
--
ALTER TABLE `preregistro`
  ADD PRIMARY KEY (`preid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `usuario` (`user`),
  ADD KEY `userid` (`userid`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estadisticas_1`
--
ALTER TABLE `estadisticas_1`
  MODIFY `stat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estadisticas_user`
--
ALTER TABLE `estadisticas_user`
  MODIFY `stat_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lista_estados`
--
ALTER TABLE `lista_estados`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=490;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `moduloid` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `pagina_datos`
--
ALTER TABLE `pagina_datos`
  MODIFY `id_page` smallint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `preregistro`
--
ALTER TABLE `preregistro`
  MODIFY `preid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=513;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
