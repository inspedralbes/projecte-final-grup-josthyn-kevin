-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 04-05-2022 a les 13:18:23
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
('DoctrineMigrations\\Version20220504082712', '2022-05-04 10:27:16', 141);

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
  `quiz_id` int(11) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `partidas`
--

INSERT INTO `partidas` (`id`, `quiz_id`, `puntuacion`, `nombre`) VALUES
(1, 1, 1, 'Pepe'),
(2, 1, 20, 'Paco'),
(3, 1, 20, 'Smirnoff');

-- --------------------------------------------------------

--
-- Estructura de la taula `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `id_quiz_id` int(11) NOT NULL,
  `enunciado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `preguntas`
--

INSERT INTO `preguntas` (`id`, `id_quiz_id`, `enunciado`, `r1`, `r2`, `r3`, `r4`, `r5`) VALUES
(1, 1, '¿Quien descubrio America?', 'Cristobal Colon', 'Fernando de Magallanes', 'Vasco de Gama', 'Bartolomé Díaz', 'Américo Vespucio'),
(2, 1, '¿Quien fue el famoso estratega y general que dirigio al ejercito Cartagines a traves de Hispania y los Alpes para el intento de la conquista de Roma durante la Segunda Guerra Punica? ', 'Aníbal', 'Escipión el Africano', 'Julio Cesar', 'Asdrúbal el Bello', 'Amílcar Barca'),
(3, 1, '¿En que año se produjo la muerte de Luis XVI de Francia?', '1793', '1803', '1754', '1774', '1792'),
(4, 1, '¿Cuantos años duro en pie el Muro de Berlin?', '28', '32', '30', '23', '15'),
(5, 1, '¿En que ciudad Española se produjo la revolucion ciudadana en contra de la invasión Francesa conocida como \"Levantamiento del Dos de Mayo\"?', 'Madrid', 'Segovia', 'Barcelona', 'Salamanca', 'Vigo'),
(6, 1, '¿Como se llamaba el primer ser vivo que llego a orbitar la Tierra?', 'Laika', 'Sputnik', 'Pluto', 'Husky', 'Bolt'),
(7, 1, '¿En que dia del año 2004 ocurrieron los atentados terroristas perpetrados por Al Qaeda en la Comunidad de Madrid?', '11 de Marzo', '13 de Septiembre', '11 de Septiembre', '12 de Marzo', '17 de Agosto'),
(8, 1, '¿En que año se firmo la mas reciente Constitución Española? ', '1978', '1812', '1932', '1956', '1975'),
(9, 1, '¿Que provoco la muerte del trigésimo quinto presidente de los Estados Unidos de America John Fitzgerald Kennedy?', 'Herida por arma de fuego', 'Herida por arma de blanca', 'Infarto de Miocardio', 'Suicidio', 'Ahogamiento en el Lago Míchigan'),
(10, 1, '¿En que año se disolvio la Union Sovietica?', '1991', '1989', '1994', '1978', '1987');

-- --------------------------------------------------------

--
-- Estructura de la taula `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `quiz`
--

INSERT INTO `quiz` (`id`, `titulo`) VALUES
(1, 'Historia');

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
  ADD KEY `IDX_12114278853CD175` (`quiz_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la taula `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la taula `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `partidas`
--
ALTER TABLE `partidas`
  ADD CONSTRAINT `FK_12114278853CD175` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`);

--
-- Restriccions per a la taula `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `FK_387948555BA17805` FOREIGN KEY (`id_quiz_id`) REFERENCES `quiz` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
