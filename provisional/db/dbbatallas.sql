-- phpMyAdmin SQL Dump-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-02-2023 a las 19:56:59
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
-- Base de datos: `dbbatallas`
--

CREATE DATABASE IF NOT EXISTS `dbbatallas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbbatallas`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `batalla_elemento`
--

CREATE TABLE `batalla_elemento` (
  `id_batalla` int(11) NOT NULL,
  `id_elemento1` int(11) NOT NULL,
  `id_elemento2` int(11) NOT NULL,
  `votos_elemento1` int(11) NOT NULL,
  `votos_elemento2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `batalla_elemento`
--

INSERT INTO `batalla_elemento` (`id_batalla`, `id_elemento1`, `id_elemento2`, `votos_elemento1`, `votos_elemento2`) VALUES
(1, 1, 2, 0, 0),
(2, 3, 4, 1, 0),
(3, 5, 6, 0, 0),
(4, 7, 8, 0, 0),
(5, 9, 10, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credencial`
--

CREATE TABLE `credencial` (
  `nombreusuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `credencial`
--

INSERT INTO `credencial` (`nombreusuario`, `password`) VALUES
('admin', 'Admin1'),
('Claramente', 'Lanena1'),
('MigueLombarda', 'CafeCum1'),
('sete7', 'SeteSiete1'),
('TimeLeaper', 'LeaperTime1'),
('Twitter_Enjoyer', 'MgTwitter1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elemento`
--

CREATE TABLE `elemento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `bloqueado` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `elemento`
--

INSERT INTO `elemento` (`id`, `nombre`, `foto`, `bloqueado`) VALUES
(1, 'fuego', 'fuego.jpg', 0),
(2, 'agua', 'agua.jpg', 0),
(3, 'naruto', 'narutoElemento.jpg', 0),
(4, 'sasuke', 'sasukeElemento.jpg', 0),
(5, 'audi', 'audiElemento.jpg', 0),
(6, 'mercedes', 'mercedesElemento.jpg', 0),
(7, 'youtube', 'youtubeElemento.jpg', 0),
(8, 'twitch', 'twitchElemento.jpg', 0),
(9, 'mario', 'marioElemento.jpg', 0),
(10, 'sonic', 'sonicElemento.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `fechanacimiento` date NOT NULL,
  `foto` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `modovis` enum('light','dark') NOT NULL DEFAULT 'light',
  `idioma` enum('es','en') NOT NULL DEFAULT 'es',
  `rol` enum('usuario','admin') NOT NULL DEFAULT 'usuario',
  `num_elementos_creados` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `num_batallas_creadas` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `num_batallas_votadas` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `num_batallas_ignoradas` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `num_batallas_denunciadas` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `puntos_troll` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `fechanacimiento`, `foto`, `email`, `modovis`, `idioma`, `rol`, `num_elementos_creados`, `num_batallas_creadas`, `num_batallas_votadas`, `num_batallas_ignoradas`, `num_batallas_denunciadas`, `puntos_troll`) VALUES
(1, '1999-05-12', 'ferrari.jpg', 'luis@gmail.com', 'light', 'es', 'usuario', 2, 1, 0, 0, 1, 0),
(2, '2001-06-25', 'fotoNaruto.jpg', 'brandon@gmail.com', 'dark', 'en', 'usuario', 2, 1, 2, 0, 1, 0),
(3, '1995-08-14', 'twitter.jpg', 'elonmusk@gmail.com', 'dark', 'en', 'usuario', 2, 1, 0, 0, 0, 0),
(4, '1990-11-29', 'fotoCoche.jpg', 'miguel@gmail.com', 'light', 'es', 'usuario', 2, 1, 0, 1, 0, 0),
(5, '1996-08-18', 'porch.jpg', 'clara@gmail.com', 'light', 'es', 'usuario', 2, 1, 0, 0, 0, 0),
(6, '1999-01-01', '', 'admin@gmail.com', 'dark', 'es', 'admin', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_batalla`
--

CREATE TABLE `usuario_batalla` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_batalla` int(11) NOT NULL,
  `accion` enum('crear','eliminar','ignorar','denunciar') NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_batalla`
--

INSERT INTO `usuario_batalla` (`id`, `id_usuario`, `id_batalla`, `accion`, `fecha`) VALUES
(4, 1, 2, 'crear', '2022-11-30 00:00:00'),
(5, 2, 1, 'crear', '2022-11-30 00:00:00'),
(6, 4, 3, 'crear', '2022-11-30 00:00:00'),
(7, 3, 4, 'crear', '2022-11-30 00:00:00'),
(8, 5, 5, 'crear', '2022-11-30 00:00:00'),
(9, 1, 5, 'denunciar', '2022-11-30 00:00:00'),
(10, 2, 5, 'denunciar', '2022-11-30 00:00:00'),
(11, 4, 4, 'ignorar', '2022-11-30 00:00:00'),
(12, 6, 4, 'eliminar', '2022-11-30 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_credencial`
--

CREATE TABLE `usuario_credencial` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombreusuario` varchar(50) NOT NULL,
  `accion` enum('registrar','loguear') NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_credencial`
--

INSERT INTO `usuario_credencial` (`id`, `id_usuario`, `nombreusuario`, `accion`, `fecha`) VALUES
(8, 1, 'sete7', 'registrar', '2022-11-29 00:00:00'),
(9, 2, 'TimeLeaper', 'registrar', '2022-11-29 00:00:00'),
(10, 3, 'Twitter_Enjoyer', 'registrar', '2022-11-29 00:00:00'),
(11, 4, 'MigueLombarda', 'registrar', '2022-11-29 00:00:00'),
(12, 5, 'Claramente', 'registrar', '2022-11-29 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_elemento`
--

CREATE TABLE `usuario_elemento` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_elemento` int(11) NOT NULL,
  `accion` enum('crear','editar','eliminar') NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_elemento`
--

INSERT INTO `usuario_elemento` (`id`, `id_usuario`, `id_elemento`, `accion`, `fecha`) VALUES
(1, 1, 3, 'crear', '2022-11-30 00:00:00'),
(2, 1, 4, 'crear', '2022-11-30 00:00:00'),
(3, 2, 1, 'crear', '2022-11-30 00:00:00'),
(4, 2, 2, 'crear', '2022-11-30 00:00:00'),
(5, 4, 5, 'crear', '2022-11-30 00:00:00'),
(6, 4, 6, 'crear', '2022-11-30 00:00:00'),
(7, 3, 7, 'crear', '2022-11-30 00:00:00'),
(8, 3, 8, 'crear', '2022-11-30 00:00:00'),
(9, 5, 9, 'crear', '2022-11-30 00:00:00'),
(10, 5, 10, 'crear', '2022-11-30 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voto`
--

CREATE TABLE `voto` (
  `id_usuario` int(11) NOT NULL,
  `id_batalla` int(11) NOT NULL,
  `id_elemento` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `voto`
--

INSERT INTO `voto` (`id_usuario`, `id_batalla`, `id_elemento`, `fecha`) VALUES
(2, 2, 3, '2023-02-01 19:34:20'),
(2, 5, 9, '2023-02-01 19:34:20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `batalla_elemento`
--
ALTER TABLE `batalla_elemento`
  ADD PRIMARY KEY (`id_batalla`,`id_elemento1`,`id_elemento2`),
  ADD KEY `id_elemento1_idx` (`id_elemento1`),
  ADD KEY `id_elemento2_idx` (`id_elemento2`);

--
-- Indices de la tabla `credencial`
--
ALTER TABLE `credencial`
  ADD PRIMARY KEY (`nombreusuario`);

--
-- Indices de la tabla `elemento`
--
ALTER TABLE `elemento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_batalla`
--
ALTER TABLE `usuario_batalla`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_batalla_ub` (`id_batalla`),
  ADD KEY `id_usuario_ub` (`id_usuario`);

--
-- Indices de la tabla `usuario_credencial`
--
ALTER TABLE `usuario_credencial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombreusuario_idx` (`nombreusuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario_elemento`
--
ALTER TABLE `usuario_elemento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_elemento_idx` (`id_elemento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `voto`
--
ALTER TABLE `voto`
  ADD PRIMARY KEY (`id_usuario`,`id_batalla`,`id_elemento`),
  ADD KEY `id_batalla_idx` (`id_batalla`),
  ADD KEY `id_elemento_idx` (`id_elemento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `batalla_elemento`
--
ALTER TABLE `batalla_elemento`
  MODIFY `id_batalla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `elemento`
--
ALTER TABLE `elemento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario_batalla`
--
ALTER TABLE `usuario_batalla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario_credencial`
--
ALTER TABLE `usuario_credencial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
 `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuario_batalla`
--
ALTER TABLE `usuario_batalla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario_credencial`
--
ALTER TABLE `usuario_credencial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario_elemento`
--
ALTER TABLE `usuario_elemento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `batalla_elemento`
--
ALTER TABLE `batalla_elemento`
  ADD CONSTRAINT `id_elemento1_be` FOREIGN KEY (`id_elemento1`) REFERENCES `elemento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_elemento2_be` FOREIGN KEY (`id_elemento2`) REFERENCES `elemento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_batalla`
--
ALTER TABLE `usuario_batalla`
  ADD CONSTRAINT `id_batalla_ub` FOREIGN KEY (`id_batalla`) REFERENCES `batalla_elemento` (`id_batalla`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_usuario_ub` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_credencial`
--
ALTER TABLE `usuario_credencial`
  ADD CONSTRAINT `id_usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nombreusuario_fk` FOREIGN KEY (`nombreusuario`) REFERENCES `credencial` (`nombreusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_elemento`
--
ALTER TABLE `usuario_elemento`
  ADD CONSTRAINT `id_elemento_ue` FOREIGN KEY (`id_elemento`) REFERENCES `elemento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_usuario_ue` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `voto`
--
ALTER TABLE `voto`
  ADD CONSTRAINT `id_batalla_v` FOREIGN KEY (`id_batalla`) REFERENCES `batalla_elemento` (`id_batalla`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_elemento_v` FOREIGN KEY (`id_elemento`) REFERENCES `elemento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_usuario_v` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
