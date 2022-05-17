-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 17-05-2022 a les 14:22:11
-- Versió del servidor: 10.4.22-MariaDB
-- Versió de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `quiz`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Bolcament de dades per a la taula `doctrine_migration_versions`
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
-- Estructura de la taula `messenger_messages`
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
-- Estructura de la taula `partidas`
--

CREATE TABLE `partidas` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `puntuacion` int(11) NOT NULL,
  `usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `partidas`
--

INSERT INTO `partidas` (`id`, `quiz_id`, `puntuacion`, `usuario`) VALUES
(2, 1, 20, 1),
(3, 1, 20, 13),
(6, 1, 50, 8),
(7, 1, 70, 17),
(8, 1, 70, 8),
(9, 1, 80, 11),
(52, 1, 60, 17),
(53, 1, 50, 17),
(56, 1, 60, 17),
(57, 1, 60, 17),
(58, 1, 0, 17),
(59, 1, 0, 19);

-- --------------------------------------------------------

--
-- Estructura de la taula `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `id_quiz_id` int(11) DEFAULT NULL,
  `enunciado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `preguntas`
--

INSERT INTO `preguntas` (`id`, `id_quiz_id`, `enunciado`) VALUES
(1, 1, '¿Quien descubrio America?'),
(2, 1, '¿Quien fue el famoso estratega y general que dirigio al ejercito Cartagines a traves de Hispania y los Alpes para el intento de la conquista de Roma durante la Segunda Guerra Punica? '),
(3, 1, '¿En que año se produjo la muerte de Luis XVI de Francia?'),
(4, 1, '¿Cuantos años duro en pie el Muro de Berlin?'),
(5, 1, '¿En que ciudad Española se produjo la revolucion ciudadana en contra de la invasión Francesa conocida como \"Levantamiento del Dos de Mayo\"?'),
(6, 1, '¿Como se llamaba el primer ser vivo que llego a orbitar la Tierra?'),
(7, 1, '¿En que dia del año 2004 ocurrieron los atentados terroristas perpetrados por Al Qaeda en la Comunidad de Madrid?'),
(8, 1, '¿En que año se firmo la mas reciente Constitución Española? '),
(9, 1, '¿Que provoco la muerte del trigésimo quinto presidente de los Estados Unidos de America John Fitzgerald Kennedy?'),
(10, 1, '¿En que año se disolvio la Union Sovietica?'),
(11, 3, '¿Año en el que el Real Madrid se proclamo por primera vez como campeon de la antes conocida como  \"Copa de Europa\"?'),
(12, 3, '¿Nombre del máximo goleador histórico del club?'),
(13, 3, '¿Nombre del estadio en el que juega como local el conjunto Blanco? '),
(14, 3, 'Número de Ligas que tiene en su haber'),
(15, 3, '¿En que año se fundo el club?'),
(16, 3, '¿Cómo se llama el ex lateral derecho del Real Madrid y actual delegado del club?'),
(17, 3, '¿En qué país nació el ex delantero Ferenc Puskas?'),
(18, 3, '¿Contra qué equipo ganó la final de la cuarta Copa de Europa?'),
(19, 3, '¿En que localidad madrileña nacio Iker Casillas?'),
(20, 3, '¿Como se llama el equipo al que Zidane marca el gol de la \"Novena\"?');

-- --------------------------------------------------------

--
-- Estructura de la taula `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `tema` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `quiz`
--

INSERT INTO `quiz` (`id`, `titulo`, `usuario_id`, `tema`) VALUES
(1, 'Historia', 1, 1),
(3, 'Real Madrid', 1, 2),
(4, 'Ciencias Sociales', 1, 1),
(6, 'Morsas', 1, 2),
(7, 'Mundos', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `pregunta` int(11) DEFAULT NULL,
  `respuesta` varchar(500) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `respuestas`
--

INSERT INTO `respuestas` (`id`, `pregunta`, `respuesta`, `estado`) VALUES
(1, 1, 'Fernando de Magallanes', 0),
(2, 1, 'Vasco de Gama', 0),
(3, 1, 'Bartolomé Díaz', 0),
(4, 1, 'Cristobal Colon', 1),
(5, 1, 'Américo Vespucio', 0),
(6, 2, 'Escipión el Africano', 0),
(7, 2, 'Aníbal', 1),
(8, 2, 'Julio Cesar', 0),
(9, 2, 'Asdrúbal el Bello', 0),
(11, 2, 'Amílcar Barça', 0),
(12, 3, '1793', 1),
(13, 3, '1803', 0),
(14, 3, '1774', 0),
(15, 3, '1754', 0),
(16, 3, '1792', 0),
(17, 4, '32', 0),
(18, 4, '28', 1),
(19, 4, '30', 0),
(20, 4, '40', 0),
(21, 4, '15', 0),
(22, 5, 'Barcelona', 0),
(23, 5, 'Segovia', 0),
(24, 5, 'Salamanca', 0),
(25, 5, 'Vigo', 0),
(26, 5, 'Madrid', 1),
(27, 6, 'Laika', 1),
(28, 6, 'Pluto', 0),
(29, 6, 'Husky', 0),
(30, 6, 'Sputnik', 0),
(31, 6, 'Bolt', 0),
(32, 7, '13 de Noviembre', 0),
(33, 7, '11 de Septiembre', 0),
(34, 7, '11 de Marzo', 1),
(35, 7, '17 de Agosto', 0),
(36, 7, '12 de Marzo', 0),
(37, 8, '1931', 0),
(38, 8, '1975', 0),
(39, 8, '1812', 0),
(40, 8, '1978', 1),
(41, 8, '1956', 0),
(42, 9, 'Herida por arma de blanca', 0),
(43, 9, 'Herida por arma de fuego', 1),
(44, 9, 'Infarto de Miocardio', 0),
(45, 9, 'Suicidio', 0),
(46, 9, 'Ahogamiento en el Lago Míchigan', 0),
(47, 10, '1989', 0),
(48, 10, '1994', 0),
(49, 10, '1987', 0),
(50, 10, '1978', 0),
(51, 10, '1991', 1),
(52, 11, '1956', 1),
(53, 11, '1966', 0),
(54, 11, '1958', 0),
(55, 11, '1954', 0),
(56, 11, '1970', 0),
(57, 12, 'Raul Gonzalez Blanco', 0),
(58, 12, 'Alfredo Di Stefano', 0),
(59, 12, 'Alvaro Arbeloa', 0),
(60, 12, 'Cristiano Ronaldo', 1),
(61, 12, 'Lionel Messi', 0),
(62, 13, 'Wanda Metropilitano', 0),
(63, 13, 'Santiago Bernabeu', 1),
(64, 13, 'La Cartuja', 0),
(65, 13, 'Camp nou', 0),
(66, 13, 'San Mames', 0),
(67, 14, '32', 0),
(68, 14, '40', 0),
(69, 14, '35', 1),
(70, 14, '27', 0),
(71, 14, '13', 0),
(72, 15, '1903', 0),
(73, 15, '1913', 0),
(74, 15, '1920', 0),
(75, 15, '1907', 0),
(76, 15, '1902', 1),
(77, 16, 'Miguel Porlán \"Chendo\"', 1),
(78, 16, 'Roberto Carlos', 0),
(79, 16, 'Dani Carvajal', 0),
(80, 16, 'Nacho Fernadez', 0),
(81, 16, 'Álvaro Arbeloa', 0),
(82, 17, 'Unión Sovietica', 0),
(83, 17, 'Hungria', 1),
(84, 17, 'Eslovenia', 0),
(85, 17, 'Marruecos', 0),
(86, 17, 'Islandia', 0),
(87, 18, 'Atletico de Madrid', 0),
(88, 18, 'AC Milan', 0),
(89, 18, 'AC Fiorentina', 0),
(90, 18, 'Stade de Reims', 1),
(91, 18, 'Eintract de Frankfurt', 0),
(92, 19, 'Getafe', 0),
(93, 19, 'Mostoles', 1),
(94, 19, 'Pinto', 0),
(95, 19, 'Valdemoro', 0),
(96, 19, 'Alcalá de Henares', 0),
(97, 20, 'Valencia CF', 0),
(98, 20, 'Monaco FC', 0),
(99, 20, 'Bayer Leverkusen', 1),
(100, 20, 'Deportivo de la Coruña', 0),
(101, 20, 'PSG', 0);

-- --------------------------------------------------------

--
-- Estructura de la taula `respuestaspartida`
--

CREATE TABLE `respuestaspartida` (
  `id` int(11) NOT NULL,
  `idPartida` int(11) DEFAULT NULL,
  `idPregunta` int(11) DEFAULT NULL,
  `idRespuesta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `respuestaspartida`
--

INSERT INTO `respuestaspartida` (`id`, `idPartida`, `idPregunta`, `idRespuesta`) VALUES
(11, 52, 1, 1),
(12, 52, 2, 7),
(13, 52, 3, 13),
(14, 52, 4, 18),
(15, 52, 5, 23),
(16, 52, 6, 27),
(17, 52, 7, 34),
(18, 52, 8, 41),
(19, 52, 9, 45),
(20, 52, 10, 51),
(31, 56, 1, 1),
(32, 56, 2, 7),
(33, 56, 3, 13),
(34, 56, 4, 18),
(35, 56, 5, 23),
(36, 56, 6, 27),
(37, 56, 7, 34),
(38, 56, 9, 43),
(39, 56, 9, 45),
(40, 56, 10, 51);

-- --------------------------------------------------------

--
-- Estructura de la taula `tema`
--

CREATE TABLE `tema` (
  `id` int(11) NOT NULL,
  `nombre` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `tema`
--

INSERT INTO `tema` (`id`, `nombre`) VALUES
(1, 'Historia'),
(2, 'Deporte');

-- --------------------------------------------------------

--
-- Estructura de la taula `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `correo`, `contrasena`) VALUES
(1, 'Kevin', 'Hoyos', 'a18kevhoylor@inspedralbes.cat', '$2y$10$dem9.c7DTbwr9HbhTYlCVOUQ1dZCg5UXLWMqZPEds1gf/cA/h4Ldi'),
(7, 'Kevin', 'Hoyos', 'a19kevhoylor@inspedralbes.cat', '$2y$10$3n5ai/.IY0I.jAyquGWmb.LVVgNn.my/ev73vHyrlg9bL5bgqQrRq'),
(8, 'Kevin', 'Hoyos', 'a20kevhoylor@inspedralbes.cat', '$2y$10$EWQzQD.mlmBTo2P0vYMy5OPMkuVEH11KHxAAHKZ1Ux47iRa66RyoK'),
(9, 'aswd', 'asd', 'as', '$2y$10$5BWF2i7sESr5ULKFey/vf.c000jtGhbCFZTILu2EELzupCO4d2bLa'),
(10, 'desf', 'dsf', 'dsf', '$2y$10$GUiFA30saLV17QbvGDfGPebyx5Ld3ZZmVdwnrUkpUcU.93WfzJLti'),
(11, 'Kevin', 'Hoyos', 'a23kevhoylor@inspedralbes.cat', '$2y$10$RGhQ6mliAhmMgUgycWfDteolopca8HH94N9PgRIbqu8cabHI6Hn6e'),
(12, 'gf', 'gfh', 'gfgf', '$2y$10$90NKb5fQwERqRIGvuNmd7./uFftrefo4XbFuU0/ZHQybdq.KIlT/a'),
(13, 'josthym', 'loma', '1@g.com', '$2y$10$AHdG1HqLGnstbmfhGYzfNO/7uzVvEe8PJhBizYC.Y4gHaqQawpOIu'),
(14, 'WE', 'WE', 'WE', '$2y$10$lcdGiEXnOLemmhWqO/.ZkeoU9NGO2Fa1of2Dy33HQT4uQqL5lwD62'),
(15, 'qw', 'qw', 'qw', '$2y$10$ItF2YMwRG96J7EsLIjRoF.XNLF4xCY5Qt6OQHHIiX7dpDtjvMZRQq'),
(16, 'undefined', '', '', '$2y$10$BVVlSgiuTLi6HVb5j6dE3eseJQv8ngwIM1Q.lwgWYr427F3gTiD2C'),
(17, 'jost243', 'jost243', 'jost@gmail.com', '$2y$10$n.SHRmkSsS2c5NImYa5xdeykRXRWW1a2OUcHa1q.OF1rbvcQChD5e'),
(18, 'sss', 'sss', 'jo@gmail.com', '$2y$10$GnnX7gRaPFPVkAPJ9tIr5uFOWD/Fp2.X51JUlGA9AfPyC/AfFbsmi'),
(19, 'aa', 'aa', 'a', '$2y$10$eOxpx5dfb5K3VqGZrwu.AO/BJA8IsZjId61pAUtSGoRc5Os8FZoeu'),
(20, 'undefined', 'ds', 'ds', '$2y$10$pbfFhgENViufIonhjXcFv.Tmzmp5VWGVqxXwuPSrklQuzy2Hl3TIG'),
(21, 'undefined', 'asa', 'asa', '$2y$10$7Su2f.Ubwa4xniffijZqCeXdp.93obBuKjFSxYJf34p1GU2myTnWe'),
(22, 'a', 'a', 'aw', '$2y$10$qyZkAgmE45CCPjCp3D4WzetSXxMv4Y55n8xI.flV9e0yYjN3Rk2..'),
(23, 'a', 'a', 'al', '$2y$10$gtKBWL1GjfzkrV.tltAALucLh1Q1oPScdI0WOm52tkgMWtHj0lxHG'),
(24, 'ee', 'ee', 'ee', '$2y$10$CPox4Fk0XDYqklgxoSTWBetK.s8O3v9eKQ9g0QmW8Rbr5hnltiGGy'),
(25, 'a', 'a', 'aaa', '$2y$10$rIOCuA7lv.ytQaUYGKYeTe0IjX5O526.DFPb627BEOamrgUH/etk.'),
(26, 'a', 'a', 'af', '$2y$10$BZuwR9GCH2zOkpz3CXBQWOS86JE8vZX4FAQlvfOK/wz6OWzE3uYQe'),
(28, 'Kevin', 'Hoyos', 'a18kevhoylor@gmail.cat', '$2y$10$YB4LJT8BM2Cj3KlDLuQBcOyLjPI1HcUTDnkJDxMC1UeYIMQJfW1HO'),
(29, 'gh', 'gh', 'gh', '$2y$10$MYB2vmhd6iC7H/xDiba9COH6fMZ0wt4kPHcqVO.dWDlhcFlSbMAWm'),
(30, 'df', 'df', 'df', '$2y$10$Lw29q9S323r9QW2MMtaaKeOlPMdhH/RLSWZE1CDkIgRT5ZdeJ8agm'),
(31, 'Alfonso', 'Perez', 'a18kevhoylor@gmail.com', '$2y$10$f/UYGBsf0eEADi2Yd2tljehMB26.Rd7We9VXm34.foYEgxQ7pV5Xi'),
(32, 'josthyn', 'loma', 'j243@gmail.com', '$2y$10$pBO0zkwKMBTgYHDhi3eV6uo5h8S1nRE4x3c7ZmudjW9SQClL4/YZS');

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Índexs per a la taula `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Índexs per a la taula `partidas`
--
ALTER TABLE `partidas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_12114278853CD175` (`quiz_id`),
  ADD KEY `usuario` (`usuario`);

--
-- Índexs per a la taula `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_387948555BA17805` (`id_quiz_id`);

--
-- Índexs per a la taula `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `tema` (`tema`);

--
-- Índexs per a la taula `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pregunta` (`pregunta`);

--
-- Índexs per a la taula `respuestaspartida`
--
ALTER TABLE `respuestaspartida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPartida` (`idPartida`),
  ADD KEY `idPregunta` (`idPregunta`),
  ADD KEY `idRespuesta` (`idRespuesta`);

--
-- Índexs per a la taula `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `partidas`
--
ALTER TABLE `partidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT per la taula `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT per la taula `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la taula `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT per la taula `respuestaspartida`
--
ALTER TABLE `respuestaspartida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT per la taula `tema`
--
ALTER TABLE `tema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la taula `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `partidas`
--
ALTER TABLE `partidas`
  ADD CONSTRAINT `FK_12114278853CD175` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`),
  ADD CONSTRAINT `partidas_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`);

--
-- Restriccions per a la taula `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `FK_387948555BA17805` FOREIGN KEY (`id_quiz_id`) REFERENCES `quiz` (`id`);

--
-- Restriccions per a la taula `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `quiz_ibfk_2` FOREIGN KEY (`tema`) REFERENCES `tema` (`id`);

--
-- Restriccions per a la taula `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`pregunta`) REFERENCES `preguntas` (`id`);

--
-- Restriccions per a la taula `respuestaspartida`
--
ALTER TABLE `respuestaspartida`
  ADD CONSTRAINT `respuestaspartida_ibfk_1` FOREIGN KEY (`idPartida`) REFERENCES `partidas` (`id`),
  ADD CONSTRAINT `respuestaspartida_ibfk_2` FOREIGN KEY (`idPregunta`) REFERENCES `preguntas` (`id`),
  ADD CONSTRAINT `respuestaspartida_ibfk_3` FOREIGN KEY (`idRespuesta`) REFERENCES `respuestas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
