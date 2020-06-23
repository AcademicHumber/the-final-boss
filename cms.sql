-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2020 at 06:58 PM
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
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id`, `cuerpo`, `created_at`, `updated_at`, `articulo`, `usuario`) VALUES
(18, 'ahora si funciona', '2020-06-22 21:30:03', '2020-06-22 21:30:03', 21, 1);

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
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla que almacena todos los articulos publicados.';

--
-- Dumping data for table `contenidos`
--

INSERT INTO `contenidos` (`id`, `titulo`, `encabezado`, `cuerpo`, `created_at`, `updated_at`, `categoria`) VALUES
(21, 'La historia', 'El encabezado ', '<p>The other way to set the validation message to fields by functions,</p>\r\n\r\n<p><code>setValidationMessage</code>(<em>$field</em>,&nbsp;<em>$fieldMessages</em>)</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>Parameters:</th>\r\n			<td>\r\n			<ul>\r\n				<li><strong>$field</strong>&nbsp;(<em>string</em>) &ndash;</li>\r\n				<li><strong>$fieldMessages</strong>&nbsp;(<em>array</em>) &ndash;</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>This function will set the field wise error messages.</p>\r\n\r\n<p>Usage example:</p>\r\n\r\n<pre>\r\n$fieldName = &#39;name&#39;;\r\n$fieldValidationMessage = [\r\n    &#39;required&#39; =&gt; &#39;Your name is required here&#39;,\r\n];\r\n$model-&gt;setValidationMessage($fieldName, $fieldValidationMessage);\r\n</pre>\r\n\r\n<p><code>setValidationMessages</code>(<em>$fieldMessages</em>)</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>Parameters:</th>\r\n			<td>\r\n			<ul>\r\n				<li><strong>$fieldMessages</strong>&nbsp;(<em>array</em>) &ndash;</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>This function will set the field messages.</p>\r\n\r\n<p>Usage example:</p>\r\n\r\n<pre>\r\n$fieldValidationMessage = [\r\n    &#39;name&#39; =&gt; [\r\n        &#39;required&#39;   =&gt; &#39;Your baby name is missing.&#39;,\r\n        &#39;min_length&#39; =&gt; &#39;Too short, man!&#39;,\r\n    ],\r\n];\r\n$model-&gt;setValidationMessages($fieldValidationMessage);\r\n</pre>\r\n\r\n<p>Now, whenever you call the&nbsp;<code>insert()</code>,&nbsp;<code>update()</code>, or&nbsp;<code>save()</code>&nbsp;methods, the data will be validated. If it fails, the model will return boolean&nbsp;<strong>false</strong>. You can use the&nbsp;<code>errors()</code>&nbsp;method to retrieve the validation errors:</p>\r\n\r\n<pre>\r\nif ($model-&gt;save($data) === false)\r\n{\r\n    return view(&#39;updateUser&#39;, [&#39;errors&#39; =&gt; $model-&gt;errors()];\r\n}\r\n</pre>\r\n\r\n<p>This returns an array with the field names and their associated errors that can be used to either show all of the errors at the top of the form, or to display them individually:</p>\r\n\r\n<pre>\r\n&lt;?php if (! empty($errors)) : ?&gt;\r\n    &lt;div class=&quot;alert alert-danger&quot;&gt;\r\n    &lt;?php foreach ($errors as $field =&gt; $error) : ?&gt;\r\n        &lt;p&gt;&lt;?= $error ?&gt;&lt;/p&gt;\r\n    &lt;?php endforeach ?&gt;\r\n    &lt;/div&gt;\r\n&lt;?php endif ?&gt;\r\n</pre>\r\n\r\n<p>If you&rsquo;d rather organize your rules and error messages within the Validation configuration file, you can do that and simply set&nbsp;<code>$validationRules</code>&nbsp;to the name of the validation rule group you created:</p>\r\n\n   ', '2020-06-22 17:11:01', '2020-06-22 17:11:01', 3);

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
  `id` int(10) UNSIGNED NOT NULL COMMENT 'identificador de usuario',
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
(64, 'Jeniffer', 'Jeniffer Alexi', 'Balcazar', 'jeniffer@gmail.com', '$2y$10$xfW0e1FWOmfS6dfL1Y4Ph.rGmQ.ylKpJyCi/NQsLmQrgYC6rmCzXu', 'editor', '2020-06-22 19:15:05', '2020-06-22 19:15:32'),
(65, 'Dariana', 'Dariana', 'Martinez', 'dariana@gmail.com', '$2y$10$8RBWkF13XzSsF0Hd9W11he9v4J8vLyFosv97stbzhkrvV2KP.gWqm', 'administrador', '2020-06-22 19:15:20', '2020-06-22 19:15:20'),
(66, 'Brisaa', 'Brisaa', 'Gutierrez', 'briza@gmail.com', '$2y$10$6fgYu0jorF9yNXqysyRAR.My3P1a4IrhPPMRR6v1FfudpR31LNhIO', 'suscriptor', '2020-06-22 19:17:30', '2020-06-22 19:17:30'),
(67, 'Adrian', 'Adrian', 'Fernandez', 'adrian@gmail.com', '$2y$10$c9gIKdCq.vIvHzu7hd8KzetSmVJ.QuHlkNrvmHQem.y9Qaej5smru', 'suscriptor', '2020-06-22 19:19:49', '2020-06-22 19:19:49'),
(68, 'admin', 'Adrian', 'carlisto', 'ahft_2000@hotmail.com', '$2y$10$LtMzHX85MVY1s.kpunL61epPbtdE0B5GgE6qQJtjIQ.qufZZ5.gDa', 'suscriptor', '2020-06-23 11:33:49', '2020-06-23 11:33:49');

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
  ADD KEY `articulo_comentario` (`articulo`);

--
-- Indexes for table `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_category` (`categoria`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único de cada comentario', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de contenido', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `paginas`
--
ALTER TABLE `paginas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de las páginas', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'identificador de usuario', AUTO_INCREMENT=69;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `articulo_comentario` FOREIGN KEY (`articulo`) REFERENCES `contenidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `contenidos`
--
ALTER TABLE `contenidos`
  ADD CONSTRAINT `foreign_category` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
