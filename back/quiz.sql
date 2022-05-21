-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2022 a las 15:05:18
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `quiz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220502101329', '2022-05-02 12:13:37', 66),
('DoctrineMigrations\\Version20220502101711', '2022-05-02 12:17:17', 81),
('DoctrineMigrations\\Version20220503065007', '2022-05-03 08:50:13', 87),
('DoctrineMigrations\\Version20220504082712', '2022-05-04 10:27:16', 141),
('DoctrineMigrations\\Version20220509110358', '2022-05-09 13:04:31', 91),
('DoctrineMigrations\\Version20220510094834', '2022-05-10 11:48:44', 527);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidas`
--

CREATE TABLE `partidas` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `puntuacion` int(11) NOT NULL,
  `usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `partidas`
--

INSERT INTO `partidas` (`id`, `quiz_id`, `puntuacion`, `usuario`) VALUES
(60, 13, 70, 1),
(61, 13, 70, 1),
(62, 13, 70, 1),
(63, 13, 70, 1),
(64, 13, 70, 1),
(65, 13, 70, 1),
(66, 13, 70, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `id_quiz_id` int(11) DEFAULT NULL,
  `enunciado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `id_quiz_id`, `enunciado`) VALUES
(71, 13, '¿Quien descubrio America?'),
(72, 13, '¿Quien fue el famoso estratega y general que dirigio al ejercito Cartagines a traves de Hispania y los Alpes para el intento de la conquista de Roma durante la Segunda Guerra Punica?'),
(73, 13, '¿En que año se produjo la muerte de Luis XVI de Francia?'),
(74, 13, '¿Cuantos años duro en pie el Muro de Berlin?'),
(75, 13, '¿En que ciudad Española se produjo la revolucion ciudadana en contra de la invasión Francesa conocida como \"Levantamiento del Dos de Mayo\"?'),
(76, 13, '¿Como se llamaba el primer ser vivo que llego a orbitar la Tierra?'),
(77, 13, '¿En que dia del año 2004 ocurrieron los atentados terroristas perpetrados por Al Qaeda en la Comunidad de Madrid?'),
(78, 13, '¿En que año se firmo la mas reciente Constitución Española?'),
(79, 13, '¿Que provoco la muerte del trigésimo quinto presidente de los Estados Unidos de America John Fitzgerald Kennedy?'),
(80, 13, '¿En que año se disolvio la Union Sovietica?'),
(121, 18, '¿Año en el que el Real Madrid se proclamo por primera vez como campeon de la antes conocida como  \"Copa de Europa\"?'),
(122, 18, '¿Nom del máximo goleador histórico del club?'),
(123, 18, '¿Nombre del estadio en el que juega como local el conjunto Blanco? '),
(124, 18, 'Número de Ligas que tiene en su haber'),
(125, 18, '¿En que año se fundo el club?'),
(126, 18, '¿Cómo se llama el ex lateral derecho del Real Madrid y actual delegado del club?'),
(127, 18, '¿En qué país nació el ex delantero Ferenc Puskas?'),
(128, 18, '¿Contra qué equipo ganó la final de la cuarta Copa de Europa?'),
(129, 18, '¿En que localidad madrileña nacio Iker Casillas?'),
(130, 18, '¿Como se llama el equipo al que Zidane marca el gol de la \"Novena\"?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `tema` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `quiz`
--

INSERT INTO `quiz` (`id`, `titulo`, `usuario_id`, `tema`) VALUES
(4, 'Ciencias Sociales', 1, 1),
(6, 'Morsas', 1, 2),
(7, 'Mundos', 1, 1),
(13, 'Eventos Historicos', 1, 1),
(18, 'Real Madrid', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `pregunta` int(11) DEFAULT NULL,
  `respuesta` varchar(500) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `pregunta`, `respuesta`, `estado`) VALUES
(352, 71, 'Fernando de Magallanes', 0),
(353, 71, 'Vasco de Gama', 0),
(354, 71, 'Bartolomé Díaz', 0),
(355, 71, 'Cristobal Colon', 1),
(356, 71, 'Américo Vespucio', 0),
(357, 72, 'Escipión el Africano', 0),
(358, 72, 'Aníbal', 1),
(359, 72, 'Julio Cesar', 0),
(360, 72, 'Asdrúbal el Bello', 0),
(361, 72, 'Amílcar Barça', 0),
(362, 73, '1793', 1),
(363, 73, '1803', 0),
(364, 73, '1774', 0),
(365, 73, '1754', 0),
(366, 73, '1792', 0),
(367, 74, '32', 0),
(368, 74, '28', 1),
(369, 74, '30', 0),
(370, 74, '40', 0),
(371, 74, '15', 0),
(372, 75, 'Barcelona', 0),
(373, 75, 'Segovia', 0),
(374, 75, 'Salamanca', 0),
(375, 75, 'Vigo', 0),
(376, 75, 'Madrid', 1),
(377, 76, 'Laika', 1),
(378, 76, 'Pluto', 0),
(379, 76, 'Husky', 0),
(380, 76, 'Sputnik', 0),
(381, 76, 'Bolt', 0),
(382, 77, '13 de Noviembre', 0),
(383, 77, '11 de Septiembre', 0),
(384, 77, '11 de Marzo', 1),
(385, 77, '17 de Agosto', 0),
(386, 77, '12 de Marzo', 0),
(387, 78, '1931', 0),
(388, 78, '1975', 0),
(389, 78, '1978', 1),
(390, 78, '1956', 0),
(391, 78, '1812', 0),
(392, 79, 'Herida por arma de blanca', 0),
(393, 79, 'Herida por arma de fuego', 1),
(394, 79, 'Infarto de Miocardio', 0),
(395, 79, 'Suicidio', 0),
(396, 79, 'Ahogamiento en el Lago Míchigan', 0),
(397, 80, '1989', 0),
(398, 80, '1994', 0),
(399, 80, '1987', 0),
(400, 80, '1978', 0),
(401, 80, '1991', 1),
(602, 121, '1955', 1),
(603, 121, '1966', 0),
(604, 121, '1958', 0),
(605, 121, '1954', 0),
(606, 121, '1970', 0),
(607, 122, 'Raul Gonzalez Blanco', 0),
(608, 122, 'Alfred Di Stefano', 0),
(609, 122, 'Alvar Arbeloa', 0),
(610, 122, 'Cristiano Ronaldo', 1),
(611, 122, 'Lionel Messi', 0),
(612, 123, 'Wanda Metropilitano', 0),
(613, 123, 'Santiago Bernabeu', 1),
(614, 123, 'La Cartuja', 0),
(615, 123, 'Camp nou', 0),
(616, 123, 'San Mames', 0),
(617, 124, '32', 0),
(618, 124, '40', 0),
(619, 124, '35', 1),
(620, 124, '27', 0),
(621, 124, '13', 0),
(622, 125, '1903', 0),
(623, 125, '1913', 0),
(624, 125, '1920', 0),
(625, 125, '1907', 0),
(626, 125, '1902', 1),
(627, 126, 'Miguel Porlán \"Chendo\"', 1),
(628, 126, 'Roberto Carlos', 0),
(629, 126, 'Dani Carvajal', 0),
(630, 126, 'Nacho Fernadez', 0),
(631, 126, 'Álvaro Arbeloa', 0),
(632, 127, 'Unión Sovietica', 0),
(633, 127, 'Hungria', 1),
(634, 127, 'Eslovenia', 0),
(635, 127, 'Marruecos', 0),
(636, 127, 'Islandia', 0),
(637, 128, 'Atletico de Madrid', 0),
(638, 128, 'AC Milan', 0),
(639, 128, 'AC Fiorentina', 0),
(640, 128, 'Stade de Reims', 1),
(641, 128, 'Eintract de Frankfurt', 0),
(642, 129, 'Getafe', 0),
(643, 129, 'Mostoles', 1),
(644, 129, 'Pinto', 0),
(645, 129, 'Valdemoro', 0),
(646, 129, 'Alcalá de Henares', 0),
(647, 130, 'Valencia CF', 0),
(648, 130, 'Monaco FC', 0),
(649, 130, 'Bayer Leverkusen', 1),
(650, 130, 'Deportivo de la Coruña', 0),
(651, 130, 'PSG', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestaspartida`
--

CREATE TABLE `respuestaspartida` (
  `id` int(11) NOT NULL,
  `idPartida` int(11) DEFAULT NULL,
  `idPregunta` int(11) DEFAULT NULL,
  `idRespuesta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respuestaspartida`
--

INSERT INTO `respuestaspartida` (`id`, `idPartida`, `idPregunta`, `idRespuesta`) VALUES
(71, 63, 71, 355),
(72, 63, 72, 358),
(73, 63, 73, 363),
(74, 63, 74, 368),
(75, 63, 75, 376),
(76, 63, 76, 377),
(77, 63, 77, 383),
(78, 63, 78, 389),
(79, 63, 79, 394),
(80, 63, 80, 401),
(81, 66, 71, 355),
(82, 66, 72, 358),
(83, 66, 73, 363),
(84, 66, 74, 368),
(85, 66, 75, 376),
(86, 66, 76, 377),
(87, 66, 77, 383),
(88, 66, 78, 389),
(89, 66, 79, 394),
(90, 66, 80, 401);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE `tema` (
  `id` int(11) NOT NULL,
  `nombre` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`id`, `nombre`) VALUES
(1, 'Historia'),
(2, 'Deporte'),
(3, 'Ciencia'),
(4, 'Música');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `correo`, `contrasena`, `admin`) VALUES
(1, 'Kevin', 'Hoyos', 'a18kevhoylor@inspedralbes.cat', '$2y$10$dem9.c7DTbwr9HbhTYlCVOUQ1dZCg5UXLWMqZPEds1gf/cA/h4Ldi', 1),
(7, 'Kevin', 'Hoyos', 'a19kevhoylor@inspedralbes.cat', '$2y$10$3n5ai/.IY0I.jAyquGWmb.LVVgNn.my/ev73vHyrlg9bL5bgqQrRq', 0),
(8, 'Kevin', 'Hoyos', 'a20kevhoylor@inspedralbes.cat', '$2y$10$EWQzQD.mlmBTo2P0vYMy5OPMkuVEH11KHxAAHKZ1Ux47iRa66RyoK', 0),
(9, 'aswd', 'asd', 'as', '$2y$10$5BWF2i7sESr5ULKFey/vf.c000jtGhbCFZTILu2EELzupCO4d2bLa', 0),
(10, 'desf', 'dsf', 'dsf', '$2y$10$GUiFA30saLV17QbvGDfGPebyx5Ld3ZZmVdwnrUkpUcU.93WfzJLti', 0),
(11, 'Kevin', 'Hoyos', 'a23kevhoylor@inspedralbes.cat', '$2y$10$RGhQ6mliAhmMgUgycWfDteolopca8HH94N9PgRIbqu8cabHI6Hn6e', 0),
(12, 'gf', 'gfh', 'gfgf', '$2y$10$90NKb5fQwERqRIGvuNmd7./uFftrefo4XbFuU0/ZHQybdq.KIlT/a', 0),
(13, 'josthym', 'loma', '1@g.com', '$2y$10$AHdG1HqLGnstbmfhGYzfNO/7uzVvEe8PJhBizYC.Y4gHaqQawpOIu', 0),
(14, 'WE', 'WE', 'WE', '$2y$10$lcdGiEXnOLemmhWqO/.ZkeoU9NGO2Fa1of2Dy33HQT4uQqL5lwD62', 0),
(15, 'qw', 'qw', 'qw', '$2y$10$ItF2YMwRG96J7EsLIjRoF.XNLF4xCY5Qt6OQHHIiX7dpDtjvMZRQq', 0),
(16, 'undefined', '', '', '$2y$10$BVVlSgiuTLi6HVb5j6dE3eseJQv8ngwIM1Q.lwgWYr427F3gTiD2C', 0),
(17, 'jost243', 'jost243', 'jost@gmail.com', '$2y$10$n.SHRmkSsS2c5NImYa5xdeykRXRWW1a2OUcHa1q.OF1rbvcQChD5e', 0),
(18, 'sss', 'sss', 'jo@gmail.com', '$2y$10$GnnX7gRaPFPVkAPJ9tIr5uFOWD/Fp2.X51JUlGA9AfPyC/AfFbsmi', 0),
(19, 'aa', 'aa', 'a', '$2y$10$eOxpx5dfb5K3VqGZrwu.AO/BJA8IsZjId61pAUtSGoRc5Os8FZoeu', 0),
(20, 'undefined', 'ds', 'ds', '$2y$10$pbfFhgENViufIonhjXcFv.Tmzmp5VWGVqxXwuPSrklQuzy2Hl3TIG', 0),
(21, 'undefined', 'asa', 'asa', '$2y$10$7Su2f.Ubwa4xniffijZqCeXdp.93obBuKjFSxYJf34p1GU2myTnWe', 0),
(22, 'a', 'a', 'aw', '$2y$10$qyZkAgmE45CCPjCp3D4WzetSXxMv4Y55n8xI.flV9e0yYjN3Rk2..', 0),
(23, 'a', 'a', 'al', '$2y$10$gtKBWL1GjfzkrV.tltAALucLh1Q1oPScdI0WOm52tkgMWtHj0lxHG', 0),
(24, 'ee', 'ee', 'ee', '$2y$10$CPox4Fk0XDYqklgxoSTWBetK.s8O3v9eKQ9g0QmW8Rbr5hnltiGGy', 0),
(25, 'a', 'a', 'aaa', '$2y$10$rIOCuA7lv.ytQaUYGKYeTe0IjX5O526.DFPb627BEOamrgUH/etk.', 0),
(26, 'a', 'a', 'af', '$2y$10$BZuwR9GCH2zOkpz3CXBQWOS86JE8vZX4FAQlvfOK/wz6OWzE3uYQe', 0),
(28, 'Kevin', 'Hoyos', 'a18kevhoylor@gmail.cat', '$2y$10$YB4LJT8BM2Cj3KlDLuQBcOyLjPI1HcUTDnkJDxMC1UeYIMQJfW1HO', 0),
(29, 'gh', 'gh', 'gh', '$2y$10$MYB2vmhd6iC7H/xDiba9COH6fMZ0wt4kPHcqVO.dWDlhcFlSbMAWm', 0),
(30, 'df', 'df', 'df', '$2y$10$Lw29q9S323r9QW2MMtaaKeOlPMdhH/RLSWZE1CDkIgRT5ZdeJ8agm', 0),
(31, 'Alfonso', 'Perez', 'a18kevhoylor@gmail.com', '$2y$10$f/UYGBsf0eEADi2Yd2tljehMB26.Rd7We9VXm34.foYEgxQ7pV5Xi', 0),
(32, 'josthyn', 'loma', 'j243@gmail.com', '$2y$10$pBO0zkwKMBTgYHDhi3eV6uo5h8S1nRE4x3c7ZmudjW9SQClL4/YZS', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indices de la tabla `partidas`
--
ALTER TABLE `partidas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_12114278853CD175` (`quiz_id`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_387948555BA17805` (`id_quiz_id`);

--
-- Indices de la tabla `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `tema` (`tema`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pregunta` (`pregunta`);

--
-- Indices de la tabla `respuestaspartida`
--
ALTER TABLE `respuestaspartida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPartida` (`idPartida`),
  ADD KEY `idPregunta` (`idPregunta`),
  ADD KEY `idRespuesta` (`idRespuesta`);

--
-- Indices de la tabla `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `partidas`
--
ALTER TABLE `partidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT de la tabla `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=652;

--
-- AUTO_INCREMENT de la tabla `respuestaspartida`
--
ALTER TABLE `respuestaspartida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `tema`
--
ALTER TABLE `tema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `partidas`
--
ALTER TABLE `partidas`
  ADD CONSTRAINT `partidas_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `partidas_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`id_quiz_id`) REFERENCES `quiz` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `quiz_ibfk_2` FOREIGN KEY (`tema`) REFERENCES `tema` (`id`);

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`pregunta`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `respuestas_ibfk_2` FOREIGN KEY (`pregunta`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `respuestaspartida`
--
ALTER TABLE `respuestaspartida`
  ADD CONSTRAINT `respuestaspartida_ibfk_2` FOREIGN KEY (`idPregunta`) REFERENCES `preguntas` (`id`),
  ADD CONSTRAINT `respuestaspartida_ibfk_3` FOREIGN KEY (`idRespuesta`) REFERENCES `respuestas` (`id`),
  ADD CONSTRAINT `respuestaspartida_ibfk_4` FOREIGN KEY (`idPartida`) REFERENCES `partidas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
