-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-08-2015 a las 15:11:15
-- Versión del servidor: 5.6.25-0ubuntu0.15.04.1
-- Versión de PHP: 5.6.4-4ubuntu6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `feria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alternativas`
--

CREATE TABLE IF NOT EXISTS `alternativas` (
`id_alternativa` int(10) unsigned NOT NULL,
  `alternativa` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_question` int(10) unsigned NOT NULL,
  `correcta` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alternativas`
--

INSERT INTO `alternativas` (`id_alternativa`, `alternativa`, `id_question`, `correcta`) VALUES
(1, 'Whatsapp ', 1, 1),
(2, 'Foursquare', 1, 0),
(3, 'Google docs', 1, 0),
(4, 'Lo que identifica un producto/servicio en un mercado competitivo', 2, 0),
(5, 'Una propuesta de valores y conceptos tangibles e intangibles que son simbolizados por un nombre y un logotipo', 2, 1),
(6, 'Un logotipo bonito', 2, 0),
(7, 'Optimización de Motores de Búsquedas', 3, 1),
(8, 'Un motor de búsqueda', 3, 0),
(9, 'Chief Executive Officer (Jefe Ejecutivo Oficial)', 3, 0),
(10, 'Android', 4, 1),
(11, 'Facebook Home', 4, 0),
(12, 'iOS', 4, 0),
(13, 'Facebook, gmap, youtube', 5, 0),
(14, 'Blogger, pinterest, e-mail', 5, 0),
(15, 'Youtube, twitter, facebook', 5, 1),
(16, 'La dirección de mi casa', 6, 0),
(17, 'La IP de mi computadora', 6, 0),
(18, 'La dirección de mi website', 6, 1),
(19, 'Construcción de Marcas', 7, 1),
(20, 'Alguna marca de pan', 7, 0),
(21, 'Creación de logotipos', 7, 0),
(22, 'No era una pastilla?', 8, 0),
(23, 'Es la ciencia que estudia las transmisiones neuronales', 8, 1),
(24, 'Es sinónimo de Neuromarketing', 8, 0),
(25, 'Tarjeta de una reconocida tienda', 9, 0),
(26, 'Mensaje de Texto', 9, 0),
(27, 'Sistema de gestión de contenidos', 9, 1),
(28, 'Memoria de trabajo, memoria largo plazo y corto plazo', 10, 1),
(29, 'Memoria largo plazo, Memoria mediano plazo, Emociones', 10, 0),
(30, 'Memoria de trabajo, CI, emociones', 10, 0),
(31, 'Dopamina', 11, 0),
(32, 'Oxitocina', 11, 1),
(33, 'Serotonina', 11, 0),
(34, 'Oxitocina', 12, 0),
(35, 'Cortisol', 12, 0),
(36, 'Serotonina', 12, 1),
(37, 'Oxitocina', 13, 0),
(38, 'Cortisol', 13, 0),
(39, 'Dopamina', 13, 1),
(40, 'Producto, Precio, Punto de venta, Promoción', 14, 1),
(41, 'Producto, Publicidad, Promoción, Punto de Venta', 14, 0),
(42, 'Producto, Pasión, Precio, Promoción', 14, 0),
(43, 'Diseño integral y Gráfico', 15, 0),
(44, 'Campañas Creativas y Estrategias Digitales', 15, 1),
(45, 'Campañas Publicitaria y Estrategias de medios', 15, 0),
(46, 'Creando Rentabilidad', 16, 0),
(47, 'Fijando recuerdos', 16, 0),
(48, 'Analizando niveles de emoción, atención y memoria', 16, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`id_customer` int(10) unsigned NOT NULL,
  `name` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(120) NOT NULL,
  `telefono` int(12) NOT NULL,
  `empresa` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codigo` varchar(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id_customer`, `name`, `email`, `telefono`, `empresa`, `codigo`) VALUES
(1, 'Lincoln Livias Ostos', 'livia0912@yahoo.es', 941818240, 'HSE RAN CONSULTORES SAC', 'Li94'),
(2, 'Lisset Pianto', 'administracion@ekospaperu.com', 3695362, 'Eko Spa', 'Li36'),
(3, 'jessica Chalco', 'jchalco2@marzala.com', 3621297, 'Inversiones Marzala', 'je36'),
(5, 'gaby sanz galvan', 'anacristina134@hotmail.com', 967696820, 'tsv corporacion', 'ga96'),
(10, 'Martha Valient', 'mvaliente2987@gmail.com', 993309272, 'fashion retailers', 'Ma99'),
(11, 'barbarita martinez', 'bmartinez@adondevivir.com', 942664521, 'adondevivir', 'ba94'),
(12, 'oscar hernando maldonado torres', 'mtoscarhernando@hotmail.com', 944207607, 'amura', 'os94'),
(13, 'Victor Montesinossystylos.com', 'contacto@partesystylos.com', 7962491, 'Partes y Stylos', 'Vi79'),
(14, 'Roberto Coronado', 'marketing@laluzdeunangel.org.pe', 993460330, 'La Luz de un Angel', 'Ro99'),
(21, 'oscar trinidad susanibar', 'otsusa_7@hotmail.com', 0, '', 'os'),
(22, 'Susan Manrique', 'admin@relajateysiente.com', 0, '', 'Su'),
(23, 'Luis albergó loaiza', 'lloaiza@respira.pe', 0, '', 'Lu'),
(24, 'penguin random house', 'fiorella.elias@penguinrandomhouse.com', 0, '', 'pe'),
(25, 'Manuel tome ramos', 'manuel_1991_1@hotmail.com', 0, '', 'Ma'),
(26, 'Carolina Valcarcel', 'cvalcarcel@subwayperu.com', 0, '', 'Ca'),
(27, 'Ronald barros', 'info@ronaldbarros.com', 0, '', 'Ro'),
(28, 'Ricardo rejas', 'ricardorejas@live.com', 0, '', 'Ri'),
(29, 'Sarita casas', 'sarita_xna@hotmail.com', 0, '', 'Sa'),
(30, 'Diego hidalgo', 'dhidalgo@babyclubchic.com', 0, '', 'Di'),
(31, 'Luis casanova', 'lcasanova@supemsa.com.pe', 0, '', 'Lu'),
(32, 'vania', 'vsanchez@supemsa.com', 0, '', 'va'),
(33, 'Supemsa', 'pdelgado@supemsa.com', 0, '', 'Su'),
(34, 'Alexandre may', 'alexdanmay@gmail.com', 0, '', 'Al'),
(35, 'Rafael molina', 'rafaelmolinah@gmail.com', 0, '', 'Ra'),
(36, 'Jamil', 'jamilcm21@gmail.com', 0, '', 'Ja'),
(37, 'Jorge Fernández camargo', 'jfernandezcamargo@gmail.com', 0, '', 'Jo'),
(38, 'Eddy Salomón', 'cumbe6028@gmail.com', 0, '', 'Ed'),
(39, 'Pablo ', 'pablourdiain@gmail.com', 0, '', 'Pa'),
(40, 'Promoregalos', 'promoregalosperu@gmail.com', 0, '', 'Pr'),
(41, 'veronica rojas paredes', 'guianina_84@hotmail.com', 0, '', 've'),
(42, 'ADN grande studio de publicidad y marketing s.a.c', 'diseno@adnbrands.pe', 0, '', 'AD'),
(43, 'Julio Illescas', 'jaillescas@yahoo.com', 944338698, 'Illescs Marketing', 'ju94'),
(44, 'Jesús Paz', 'jesus_paz1980@hotmail.com', 966412361, 'Clínica Veterinaria Animal World', 'je96'),
(45, 'Zusal Cano Pretel', 'melizume@gmail.com', 951559193, 'Agroindustria I & F', 'zu95'),
(52, 'Comercial San Miguel', 'jolupeza27@yahoo.es', 0, '', 'Come');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer_premio`
--

CREATE TABLE IF NOT EXISTS `customer_premio` (
`id_customer_premio` int(10) unsigned NOT NULL,
  `id_customer` int(10) unsigned NOT NULL,
  `id_premio` int(10) unsigned NOT NULL,
  `codigo` varchar(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `customer_premio`
--

INSERT INTO `customer_premio` (`id_customer_premio`, `id_customer`, `id_premio`, `codigo`) VALUES
(1, 1, 5, 'Li94RED3'),
(2, 2, 13, 'Li36ICMS'),
(3, 5, 10, 'ga96LPMV'),
(4, 3, 2, 'je36CO50'),
(5, 10, 6, 'Ma99WE50'),
(6, 11, 7, 'ba94WEBF'),
(7, 12, 10, 'os94LPMV'),
(8, 13, 13, 'Vi79ICMS'),
(9, 14, 13, 'Ro99ICMS'),
(15, 21, 5, 'osRED3'),
(17, 22, 2, 'SuCO50'),
(18, 23, 15, 'LuLCRI'),
(19, 24, 15, 'peLCRI'),
(20, 25, 14, 'MaLCRI'),
(21, 26, 15, 'CaLCRI'),
(22, 27, 15, 'RoLCRI'),
(23, 28, 15, 'RiLCRI'),
(25, 29, 14, 'SaLCRI'),
(26, 30, 15, 'DiLCRI'),
(27, 31, 15, 'LuLCRI'),
(28, 32, 15, 'vaLCRI'),
(29, 33, 15, 'SuLCRI'),
(30, 34, 14, 'AlLCRI'),
(31, 35, 14, 'RaLCRI'),
(32, 36, 14, 'JaLCRI'),
(33, 37, 14, 'JoLCRI'),
(34, 38, 14, 'EdLCRI'),
(35, 39, 6, 'PaWE50'),
(36, 40, 10, 'PrLPMV'),
(39, 41, 6, 'veWE50'),
(45, 42, 1, 'ADRED6'),
(46, 43, 1, 'ju94RED6'),
(47, 44, 5, 'je96RED3'),
(48, 45, 1, 'zu95RED6'),
(53, 52, 4, 'ComeWEBB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premios`
--

CREATE TABLE IF NOT EXISTS `premios` (
`id_premio` int(10) unsigned NOT NULL,
  `premio` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nivel` int(11) NOT NULL,
  `codigo` varchar(6) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `premios`
--

INSERT INTO `premios` (`id_premio`, `premio`, `nivel`, `codigo`, `active`) VALUES
(1, 'Descuento 20% en Paquete Redes 6MESES', 2, 'RED6', 1),
(2, '50% Consultoría y Estrategia de Marca Completa', 2, 'CO50', 1),
(3, 'Creación de Fan Page Gratis', 1, 'FPAG', 1),
(4, 'Descuento 20% en Creación de Sitio Web Básico', 1, 'WEBB', 1),
(5, 'Descuento 25% en Paquete Redes 3 MESES', 1, 'RED3', 1),
(6, '50% Sitio Web (Básico, 4 secciones)', 1, 'WE50', 1),
(7, 'Descuento 15% en Creación de Sitio Web FULL', 2, 'WEBF', 1),
(8, 'Landing page para facebook', 1, 'LPFB', 1),
(9, 'Landing page para facebook', 2, 'LPFB', 1),
(10, 'Landing page para móvil', 1, 'LPMV', 1),
(11, 'Landing page para móvil', 2, 'LPMV', 1),
(12, '25% de descuento en adaptación a Responsive Design', 2, 'RD25', 1),
(13, '25% de descuento instalación de CMS', 2, 'ICMS', 1),
(14, '20% descuento en Libros de Librería Crisol', 1, 'LCRI', 0),
(15, '20% descuento en Libros de Librería Crisol', 2, 'LCRI', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
`id_question` int(10) unsigned NOT NULL,
  `question` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `questions`
--

INSERT INTO `questions` (`id_question`, `question`) VALUES
(1, '¿Cuál fue la adquisición más reciente de Facebook?'),
(2, '¿Qué es una marca?'),
(3, '¿Qué es SEO?'),
(4, '¿Cuál es el sistema operativo de google para móviles?'),
(5, '¿Cuál de los siguientes grupos son redes sociales?'),
(6, '¿Qué es un dominio?'),
(7, '¿Qué es el Branding?'),
(8, '¿Qué es la Neurociencia?'),
(9, '¿Que es un CMS?'),
(10, '¿Cuál de los siguiente grupos son tipos de memorias?'),
(11, '¿Cuál es la sustancia conocida como la “Hormona del amor”?'),
(12, '¿Cuál es la sustancia que regula el “Humor”?'),
(13, '¿Cuál es la sustancia que regula “las emociones”?'),
(14, '¿Las “4 P” del Marketing ?'),
(15, '¿Qué es lo que hace Agencia Watson?'),
(16, 'Áreas de la neurociencia aplicadas al Marketing');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alternativas`
--
ALTER TABLE `alternativas`
 ADD PRIMARY KEY (`id_alternativa`), ADD KEY `id_question` (`id_question`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id_customer`);

--
-- Indices de la tabla `customer_premio`
--
ALTER TABLE `customer_premio`
 ADD PRIMARY KEY (`id_customer_premio`), ADD KEY `id_customer` (`id_customer`,`id_premio`);

--
-- Indices de la tabla `premios`
--
ALTER TABLE `premios`
 ADD PRIMARY KEY (`id_premio`);

--
-- Indices de la tabla `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`id_question`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alternativas`
--
ALTER TABLE `alternativas`
MODIFY `id_alternativa` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
MODIFY `id_customer` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `customer_premio`
--
ALTER TABLE `customer_premio`
MODIFY `id_customer_premio` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT de la tabla `premios`
--
ALTER TABLE `premios`
MODIFY `id_premio` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `questions`
--
ALTER TABLE `questions`
MODIFY `id_question` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alternativas`
--
ALTER TABLE `alternativas`
ADD CONSTRAINT `alternativas_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
