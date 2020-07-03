-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 07:19 PM
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
(3, 'Humanidades', 'Humanidades en su conjunto', 'humanidades', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  `img_principal` varchar(255) NOT NULL COMMENT 'Ruta a la imagen principal',
  `cuerpo` longtext NOT NULL COMMENT 'Cuerpo de la página',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha y hora de creacion del articulo',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Fecha y hora de actualización del articulo',
  `categoria` int(11) NOT NULL,
  `usuario_creador` int(11) NOT NULL COMMENT 'Llave foranea que apunta al creador del articulo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla que almacena todos los articulos publicados.';

--
-- Dumping data for table `contenidos`
--

INSERT INTO `contenidos` (`id`, `titulo`, `encabezado`, `img_principal`, `cuerpo`, `created_at`, `updated_at`, `categoria`, `usuario_creador`) VALUES
(33, 'La historia', 'Esta historia es soprendente, no te la pierdas', 'http://localhost/the-final-boss/public/topimgs/La%20historia_img.jpg', '<p>In this syntax, you specify the one or more columns which you want to sort after the&nbsp;<code>ORDER BY</code>&nbsp;clause.</p>\r\n\r\n<p>The&nbsp;<code>ASC</code>&nbsp;stands for ascending and the&nbsp;<code>DESC</code>&nbsp;stands for descending. You use&nbsp;<code>ASC</code>&nbsp;to sort the result set in ascending order and&nbsp;<code>DESC</code>&nbsp;to sort the result set in descending order.</p>\r\n\r\n<p>This&nbsp;<code>ORDER BY</code>&nbsp;clause sorts the result set in ascending order:</p>\r\n\n   ', '2020-07-03 11:17:56', '2020-07-03 11:42:33', 1, 75),
(34, 'El arcoiris mata', 'asdsadasvsdvfdtwefqw', 'http://localhost/the-final-boss/public/topimgs/El%20arcoiris%20mata_img.png', '<p>asdasfnodivnisdnvoisdnoireqoiepowqieopqwiepoqweoqwipdasdas$destination_dir.&quot;/&quot;.$newname$destination_dir.&quot;/&quot;.$newname$destination_dir.&quot;/&quot;.$newname$destination_dir.&quot;/&quot;.$newname$destination_dir.&quot;/&quot;.$newname$destination_dir.&quot;/&quot;.$newname$destination_dir.&quot;/&quot;.$newname$destination_dir.&quot;/&quot;.$newname$destination_dir.&quot;/&quot;.$newname$destination_dir.&quot;/&quot;.$newname$destination_dir.&quot;/&quot;.$newname$destination_dir.&quot;/&quot;.$newname$destination_dir.&quot;/&quot;.$newname$destination_dir.&quot;/&quot;.$newname$destination_dir.&quot;/&quot;.$newname$destination_dir.&quot;/&quot;.$newname$destination_dir.&quot;/&quot;.$newname</p>\r\n\n   ', '2020-07-03 11:44:09', '2020-07-03 11:44:09', 3, 75),
(35, 'Titulito', 'En un mundo sorprendente con historias soreprendentes aparece una persona sorprendente que revoluciono todo', 'http://localhost/the-final-boss/public/topimgs/Titulito_img.png', '<p>La&nbsp;<strong>historia</strong>&nbsp;es la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Ciencia\">ciencia</a>&nbsp;que tiene como objetivo el estudio de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Acontecimiento\">sucesos del pasado</a>, tradicionalmente de la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Homo_sapiens\">humanidad</a><a href=\"https://es.wikipedia.org/wiki/Historia#cite_note-1\">1</a>​, y como&nbsp;<a href=\"https://es.wikipedia.org/wiki/Metodolog%C3%ADa\">m&eacute;todo</a>, el propio de las&nbsp;<a href=\"https://es.wikipedia.org/wiki/Ciencias_sociales\">ciencias sociales/humanas</a>, as&iacute; como el de las&nbsp;<a href=\"https://es.wikipedia.org/wiki/Ciencias_naturales\">ciencias naturales</a>&nbsp;en un marco de interdisciplinariedad.<a href=\"https://es.wikipedia.org/wiki/Historia#cite_note-2\">2</a>​ Se trata de la disciplina que estudia y narra cronol&oacute;gicamente los acontecimientos pasados. Se denomina tambi&eacute;n &laquo;historia&raquo; al periodo que transcurre desde la aparici&oacute;n de la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Escritura\">escritura</a>&nbsp;hasta la actualidad, aunque es un convencionalismo ampliamente superado, y se considera a la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Prehistoria\">prehistoria</a>&nbsp;tambi&eacute;n como parte intr&iacute;nseca de la historia.</p>\r\n\r\n<p>M&aacute;s all&aacute; de las acepciones propias de la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Ciencias_hist%C3%B3ricas\"><em>ciencia hist&oacute;rica</em>,&nbsp;<em>ciencia de la historia</em>,&nbsp;<em>ciencias hist&oacute;ricas</em>&nbsp;o&nbsp;<em>ciencias de la historia</em></a>, &laquo;historia&raquo;, en el lenguaje usual, es la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Narraci%C3%B3n\">narraci&oacute;n</a>&nbsp;de cualquier&nbsp;<a href=\"https://es.wikipedia.org/wiki/Acontecimiento\">suceso</a>, incluso de sucesos&nbsp;<a href=\"https://es.wikipedia.org/wiki/Imaginaci%C3%B3n\">imaginarios</a>&nbsp;y de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Mentira\">mentiras</a>;<a href=\"https://es.wikipedia.org/wiki/Historia#cite_note-3\">3</a>​<a href=\"https://es.wikipedia.org/wiki/Historia#cite_note-4\">4</a>​ sea su prop&oacute;sito el&nbsp;<a href=\"https://es.wikipedia.org/wiki/Estratagema\">enga&ntilde;o</a>, el&nbsp;<a href=\"https://es.wikipedia.org/wiki/Placer_est%C3%A9tico\">placer est&eacute;tico</a>&nbsp;o cualquier otro (<a href=\"https://es.wikipedia.org/wiki/Ficci%C3%B3n_hist%C3%B3rica\">ficci&oacute;n hist&oacute;rica</a>). Por el contrario, el prop&oacute;sito de la ciencia hist&oacute;rica es averiguar los&nbsp;<a href=\"https://es.wikipedia.org/wiki/Acontecimiento\">hechos</a>&nbsp;y&nbsp;<a href=\"https://es.wikipedia.org/wiki/Proceso_hist%C3%B3rico\">procesos</a>&nbsp;que ocurrieron y se desarrollaron en el pasado e&nbsp;<a href=\"https://es.wikipedia.org/wiki/Interpretaci%C3%B3n\">interpretarlos</a>&nbsp;ateni&eacute;ndose a criterios de la mayor&nbsp;<a href=\"https://es.wikipedia.org/wiki/Objetividad\">objetividad</a>&nbsp;posible; aunque la posibilidad de cumplimiento de tales prop&oacute;sitos y el grado en que sean posibles son en s&iacute; mismos objetos de estudio de la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Historiolog%C3%ADa\">historiolog&iacute;a o teor&iacute;a de la historia</a>, como&nbsp;<a href=\"https://es.wikipedia.org/wiki/Epistemolog%C3%ADa\">epistemolog&iacute;a</a>&nbsp;o conocimiento cient&iacute;fico de la historia.[<em><a href=\"https://es.wikipedia.org/wiki/Wikipedia:Verificabilidad\">cita&nbsp;requerida</a></em>]</p>\r\n\r\n<p>A su vez, se llama &laquo;historia&raquo; al&nbsp;<a href=\"https://es.wikipedia.org/wiki/Pasado\">pasado</a>&nbsp;mismo, e incluso puede hablarse de una &laquo;<a href=\"https://es.wikipedia.org/wiki/Historia_natural\">historia natural</a>&raquo; en que la humanidad no estaba presente (t&eacute;rmino cl&aacute;sico ya en desuso, que se utilizaba en oposici&oacute;n a la historia social, para referirse no solo a la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Geolog%C3%ADa\">geolog&iacute;a</a>&nbsp;y la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Paleontolog%C3%ADa\">paleontolog&iacute;a</a>, sino tambi&eacute;n a muchas otras&nbsp;<a href=\"https://es.wikipedia.org/wiki/Ciencias_naturales\">ciencias naturales</a>&nbsp;&mdash;las fronteras entre el campo al que se refiere tradicionalmente este t&eacute;rmino y el de la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Prehistoria\">prehistoria</a>&nbsp;y la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Arqueolog%C3%ADa\">arqueolog&iacute;a</a>&nbsp;son imprecisas, a trav&eacute;s de la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Paleoantropolog%C3%ADa\">paleoantropolog&iacute;a</a>&mdash;, y que se pretende complementar con la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Historia_ambiental\">historia ambiental o ecohistoria</a><a href=\"https://es.wikipedia.org/wiki/Historia#cite_note-5\">5</a>​, y actualizarse con la denominada &laquo;<a href=\"https://es.wikipedia.org/wiki/Gran_Historia\">Gran Historia</a>&raquo;: campo acad&eacute;mico interdisciplinar que se define como &quot;el intento de comprender de manera unificada, la historia del&nbsp;<a href=\"https://es.wikipedia.org/wiki/Cosmos\">Cosmos</a>&nbsp;o&nbsp;<a href=\"https://es.wikipedia.org/wiki/Universo\">Universo</a>,&nbsp;<a href=\"https://es.wikipedia.org/wiki/La_Tierra\">la Tierra</a>, la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Vida\">vida</a>&nbsp;y la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Humanidad\">humanidad</a>&quot;, cubriendo los acontecimientos ocurridos desde el&nbsp;<a href=\"https://es.wikipedia.org/wiki/Big_Bang\">Big Bang</a>&nbsp;hasta la&nbsp;<a href=\"https://es.wikipedia.org/wiki/Historia_del_mundo_actual\">historia del mundo actual</a><a href=\"https://es.wikipedia.org/wiki/Historia#cite_note-6\">6</a>​<a href=\"https://es.wikipedia.org/wiki/Historia#cite_note-7\">7</a>​<a href=\"https://es.wikipedia.org/wiki/Historia#cite_note-8\">8</a>​).</p>\r\n\r\n<p>Ese uso del t&eacute;rmino &laquo;historia&raquo; lo hace equivalente a &laquo;cambio en el&nbsp;<a href=\"https://es.wikipedia.org/wiki/Tiempo\">tiempo</a>&raquo;.<a href=\"https://es.wikipedia.org/wiki/Historia#cite_note-9\">9</a>​ En ese sentido, se contrapone al concepto de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Filosof%C3%ADa\">filos&oacute;fico</a>&nbsp;equivalente a&nbsp;<a href=\"https://es.wikipedia.org/wiki/Esencia\">esencia</a>&nbsp;o permanencia (lo que permite hablar de una&nbsp;<a href=\"https://es.wikipedia.org/wiki/Filosof%C3%ADa_natural\">filosof&iacute;a natural</a>&nbsp;en textos cl&aacute;sicos y en la actualidad, sobre todo en medios acad&eacute;micos&nbsp;<a href=\"https://es.wikipedia.org/wiki/Anglosajones\">anglosajones</a>, como equivalente a la&nbsp;<a href=\"https://es.wikipedia.org/wiki/F%C3%ADsica\">f&iacute;sica</a>). Para cualquier campo del conocimiento, se puede tener una perspectiva hist&oacute;rica &mdash;el cambio&mdash; o bien filos&oacute;fica &mdash;su esencia&mdash;. De hecho, puede hacerse eso para la historia misma (v&eacute;ase&nbsp;<a href=\"https://es.wikipedia.org/wiki/Tiempo_hist%C3%B3rico\">tiempo hist&oacute;rico</a><a href=\"https://es.wikipedia.org/wiki/Historia#cite_note-10\">10</a>​) y para el tiempo mismo (v&eacute;ase&nbsp;<em><a href=\"https://es.wikipedia.org/wiki/Historia_del_tiempo\">Historia del tiempo</a></em>, de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Stephen_Hawking\">Stephen Hawking</a>, libro de divulgaci&oacute;n sobre&nbsp;<a href=\"https://es.wikipedia.org/wiki/Cosmolog%C3%ADa\">cosmolog&iacute;a</a>). En este sentido, todo&nbsp;<a href=\"https://es.wikipedia.org/wiki/Pasado\">pasado</a>&nbsp;en relaci&oacute;n con el&nbsp;<a href=\"https://es.wikipedia.org/wiki/Presente\">presente</a>&nbsp;hace alusi&oacute;n al&nbsp;<a href=\"https://es.wikipedia.org/wiki/Tiempo\">tiempo</a>&nbsp;y a su&nbsp;<a href=\"https://es.wikipedia.org/wiki/Cronolog%C3%ADa\">cronolog&iacute;a</a>, y por lo tanto tener historia.[<em><a href=\"https://es.wikipedia.org/wiki/Wikipedia:Verificabilidad\">cita&nbsp;requerida</a></em>]</p>\r\n\r\n<p>En las&nbsp;<a href=\"https://es.wikipedia.org/wiki/Ciencias_de_la_salud\">ciencias de la salud</a>, se utiliza el concepto de&nbsp;<a href=\"https://es.wikipedia.org/wiki/Historia_cl%C3%ADnica\">historia cl&iacute;nica</a>&nbsp;para el registro de datos sanitarios significativos de un paciente, que se remontan hasta su nacimiento o incluso hacer lo propio con respecto a su&nbsp;<a href=\"https://es.wikipedia.org/wiki/Herencia_gen%C3%A9tica\">herencia gen&eacute;tica</a>.[<em><a href=\"https://es.wikipedia.org/wiki/Wikipedia:Verificabilidad\">cita&nbsp;requerida</a></em>]</p>\r\n\r\n<p>Se denomina&nbsp;<strong><a href=\"https://es.wikipedia.org/wiki/Historiador\">historiador o historiadora</a></strong>&nbsp;a la persona encargada del estudio de la historia. Al historiador profesional se le concibe como el especialista en la disciplina acad&eacute;mica de la historia, y al historiador no profesional se le suele denominar&nbsp;<a href=\"https://es.wikipedia.org/wiki/Cronista\">cronista</a>.<a href=\"https://es.wikipedia.org/wiki/Historia#cite_note-11\">11</a>​</p>\r\n\n   ', '2020-07-03 12:04:42', '2020-07-03 12:04:42', 3, 75);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único de cada comentario', AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de contenido', AUTO_INCREMENT=36;

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
  ADD CONSTRAINT `comentario_user` FOREIGN KEY (`usuario`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
