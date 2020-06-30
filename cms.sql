-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2020 at 07:26 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `slug` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Sin Categoría', 'Esta es la categoría predeterminada para todas las publicaciones', 'sin-categoria', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Humanidades', 'HUmanidades en su conjunto', 'humanidades', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL COMMENT 'Identificador único de cada comentario',
  `cuerpo` longtext NOT NULL COMMENT 'Texto que contiene cada comentario',
  `created_at` datetime NOT NULL COMMENT 'fecha de creación del comentario',
  `updated_at` datetime NOT NULL COMMENT 'Fecha y hora de actualización del comentario',
  `articulo` int(11) NOT NULL COMMENT 'Llave foránea que determina a que artículo pertenece el comentario',
  `usuario` int(11) NOT NULL COMMENT 'Llave foranea al usuario que creo el articulo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contenidos`
--

CREATE TABLE `contenidos` (
  `id` int(11) NOT NULL COMMENT 'Identificador de contenido',
  `titulo` varchar(255) NOT NULL COMMENT 'Titulo de la página',
  `encabezado` varchar(255) NOT NULL COMMENT 'Encabezado e la página',
  `cuerpo` longtext NOT NULL COMMENT 'Cuerpo de la página',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha y hora de creacion del articulo',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha y hora de actualización del articulo',
  `categoria` int(11) NOT NULL,
  `usuario_creador` int(11) NOT NULL COMMENT 'Llave foranea que apunta al creador del articulo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla que almacena todos los articulos publicados.';

-- --------------------------------------------------------

--
-- Table structure for table `paginas`
--

CREATE TABLE `paginas` (
  `id` int(11) NOT NULL COMMENT 'Identificador de las páginas',
  `titulo` varchar(255) NOT NULL,
  `encabezado` varchar(255) NOT NULL,
  `cuerpo` longtext NOT NULL,
  `created_at` datetime NOT NULL COMMENT 'Informacion de hora de creacion',
  `updated_at` datetime NOT NULL COMMENT 'Informacion de hora de actualización'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paginas`
--

INSERT INTO `paginas` (`id`, `titulo`, `encabezado`, `cuerpo`, `created_at`, `updated_at`) VALUES
(1, 'Pagina', 'numero1', '<p>labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;<img alt=\"\" src=\"http://localhost:8080/ProyectoFinal/public/images/1592786047_c4afc8f9ee705d1f3f12.png\" style=\"float:left; height:204px; width:200px\" /></p>\r\n\n   ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Saber más', 'Quienes somos ', '<p>Este es un proyecto que nos esta tomando m&aacute;s de una semana y media, pero esta teniendo buenos frutos en todos los participantes ya que estan aprendiendo a codificar de la mejor manera y con buenas practica, los quiero amigos &lt;3<a href=\"https://static1.abc.es/media/economia/2019/11/11/amor-kdG--620x349@abc.jpg\"><img alt=\"Amistad &lt;3\" src=\"https://static1.abc.es/media/economia/2019/11/11/amor-kdG--620x349@abc.jpg\" style=\"border-style:solid; border-width:3px; height:279px; width:500px\" /></a></p>\r\n\n   ', '2020-06-22 14:02:59', '2020-06-22 14:02:59');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'identificador de usuario',
  `nombre_usuario` varchar(50) NOT NULL COMMENT 'username',
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `perfil` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Hora de creación',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Hora de actualización'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nombre_usuario`, `nombre`, `apellido`, `correo`, `contrasena`, `perfil`, `created_at`, `updated_at`) VALUES
(74, 'usuariopromedio', 'sadsad', 'wqewqeqw', 'usuariopromedio@usuario.com', '$2y$10$qB8tUxrnFCnXwkA7HVUEAel15LhIOBbHpJXpozYHQZqtagZgtDa5y', 'administrador', '2020-06-27 11:20:30', '2020-06-27 11:20:30'),
(75, 'Administrador', 'admin', 'admin', 'admin@admin.com', '$2y$10$CxPJbh0WqCekvAB11a0GaOMHp/DkteE9vNCkMbPiWTpHy4kCQIMva', 'administrador', '2020-06-27 11:25:52', '2020-06-27 11:25:52'),
(76, 'suscriptor', 'sus', 'criptor', 'suscriptor@suscriptor.com', '$2y$10$iweoXTCX9H2mdZsHISEKkuH0n7LnNlMH/i9R8imPBk5KMskzJAc9y', 'suscriptor', '2020-06-27 14:55:18', '2020-06-27 14:55:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articulo_comentario` (`articulo`),
  ADD KEY `comentario_user` (`usuario`);

--
-- Indexes for table `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_category` (`categoria`),
  ADD KEY `usuario_articulo` (`usuario_creador`);

--
-- Indexes for table `paginas`
--
ALTER TABLE `paginas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único de cada comentario', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de contenido', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `paginas`
--
ALTER TABLE `paginas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de las páginas', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de usuario', AUTO_INCREMENT=77;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `articulo_comentario` FOREIGN KEY (`articulo`) REFERENCES `contenidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comentario_user` FOREIGN KEY (`usuario`) REFERENCES `user` (`id`);

--
-- Constraints for table `contenidos`
--
ALTER TABLE `contenidos`
  ADD CONSTRAINT `foreign_category` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_articulo` FOREIGN KEY (`usuario_creador`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
