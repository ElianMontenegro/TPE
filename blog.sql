-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2021 a las 01:16:38
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `id` int(200) NOT NULL,
  `idCategory` int(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `slug` varchar(200) NOT NULL,
  `cover` tinyint(1) NOT NULL,
  `public` tinyint(1) NOT NULL,
  `image` blob NOT NULL,
  `resume` varchar(250) NOT NULL,
  `time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id`, `idCategory`, `title`, `content`, `slug`, `cover`, `public`, `image`, `resume`, `time`) VALUES
(11, 8, 'Como hacer el Handstand en 3 simples pasos!', 'La parada de manos ha sido y es uno de los elementos más clásicos de la calistenia, siendo un ejercicio que en un principio se basa principalmente en el equilibrio y que luego se puede transformar en un pilar para los más avanzados entrenamientos de empuje en calistenia.\n\nY si, quien no vio esos gimnastas o grandes calisténicos moverse como si flotaran en el HS, la verdad no cuesta admitir lo hermoso que es este elemento, y en este artículo les enseñaré cómo tienen que guiarse desde un comienzo para dominarlo en el menor tiempo y con la máxima seguridad de su físico, sin más vamos a ello.', 'como-hacer-el-handstand-en-3-simples-pasos!35381693', 1, 1, 0x31313735316f6e652061726d2068616e647374616e642e6a7067, 'En este post vamos a aprender  como podemos empezar a hacer el hanstands en poco tiempo!', '2021-10-14'),
(12, 4, 'Gana masa muscular en tan solo 7 min al dia con esta rutina!', 'Para los principiantes que quieren perder peso o los que quieren volver a ponerse en forma después de un tiempo de inactividad, esta rutina de ejercicios de siete minutos puede ser el primer paso. No requiere equipos, usa el peso corporal.\r\nTyler Wheeler, doctor en medicina del deporte en Atlanta, recomienda hacer cada ejercicio por 30 segundos, con descansos de 10 segundos entre uno y otro. Empiece con una sesión y avance hasta repetir la rutina completa tres veces. El orden de los ejercicios sí importa, porque está alternando grupos de músculos y también movimientos que aceleran el ritmo cardiaco con aquellos que lo normalizan.', 'gana-masa-muscular-en-tan-solo-7-min-al-dia-con-esta-rutina!56491675', 0, 1, 0x3930373430727574696e61372e6a7067, 'Te mostraremos como poder llegar al verano con tan solo 7 minutos de entrenamiento diario', '2021-10-14'),
(15, 9, 'Nutrición y comida saludable', 'Incluya una variedad de alimentos de los cuatro grupos principales: frutas, verduras, cereales enteros, productos lácteos bajos en grasa y proteína magra, incluyendo frijoles y otras legumbres, nueces y semillas, y grasas saludables\r\nProporcione guías sobre cuánta comida elegir de cada grupo\r\nIncluya alimentos que puedes encontrar en tu tienda local — y que no sean artículos de tiendas de especialidades o productos gourmet\r\nSe adecue a tus gustos, estilo de vida, y presupuesto\r\nTambién habla con el médico sobre tus riesgos de salud. Por ejemplo, tu doctor quizás recomiende que reduzcas la sal en tu dieta si tienes presión alta.', 'nutrición-y-comida-saludable4552388', 0, 1, 0x3536353231506f72746164612d64696574612d6865616c7468792e6a7067, 'Quieres adoptar una dieta saludable pero no estás seguro de cómo empezar? Al considerar el montón de dietas saludables en revistas y libros de cocina, asegúrate de buscar una que:', '2021-10-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(4, 'routines'),
(8, 'exercise'),
(9, 'healthy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(12, 'elian', '$2y$10$G5LcVHIz6Rrny/8PaptGdOtUIT5icbTxQiLBW8KkuviLi1nm9Zzk2', 'admin'),
(13, 'lucio', '$2y$10$T17Z6BWl1/ho2PlBwk78SuK0sbpQ6vpcJQ69r5MMZBf1Gt2SYafvC', 'admin'),
(14, 'admin', 'admin', 'admin'),
(15, 'elian1', '$2y$10$u5mVpP/CToXXPcgx23F/2uQ8LBzf/f7p5jjQu0CYtdIcMkth1.Hci', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
