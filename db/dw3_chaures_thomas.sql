-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2024 a las 02:17:45
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dw3_chaures_thomas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `usuarios_fk` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_carrito`, `usuarios_fk`) VALUES
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categorias_id` int(11) NOT NULL,
  `categoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compras` int(11) NOT NULL,
  `precio_total` int(11) NOT NULL,
  `productos_totales` int(11) NOT NULL,
  `carrito_fk` int(11) NOT NULL,
  `usuarios_fk` int(10) UNSIGNED NOT NULL,
  `fecha` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compras`, `precio_total`, `productos_totales`, `carrito_fk`, `usuarios_fk`, `fecha`) VALUES
(1, 90500, 7, 2, 3, '2024-03-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mp`
--

CREATE TABLE `mp` (
  `id_mp` int(10) UNSIGNED NOT NULL,
  `tarjeta_credito` varchar(16) NOT NULL,
  `nombre_propietario` varchar(45) NOT NULL,
  `cpp` varchar(4) NOT NULL,
  `vencimiento` date NOT NULL,
  `usuarios_fk` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `productos_id` int(10) UNSIGNED NOT NULL,
  `nombre_producto` varchar(45) NOT NULL,
  `descripcion_producto` varchar(255) NOT NULL,
  `img_producto` varchar(45) NOT NULL,
  `alt_img_producto` varchar(45) NOT NULL,
  `detalles_producto` varchar(120) NOT NULL,
  `precio_producto` int(10) UNSIGNED NOT NULL,
  `usuarios_fk` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`productos_id`, `nombre_producto`, `descripcion_producto`, `img_producto`, `alt_img_producto`, `detalles_producto`, `precio_producto`, `usuarios_fk`) VALUES
(1, 'Brownie', 'Deléitate con nuestro delicioso brownie, una explosión de chocolate que te hará sentir en el paraíso. Perfecto para satisfacer tus antojos dulces.', '20240306013220_brownie.jpg', 'Imagen de un brownie', 'Diámetro: 10x10', 10000, 3),
(2, 'Torta de cumpleaños', 'Celebra momentos especiales con nuestra increíble torta de cumpleaños. Decorada con amor y alegría, esta torta es perfecta para festejar tus ocasiones más importantes.', '20240306012135_20231121211202_tortaCumple.jpg', 'Imagen de torta de cumpleaños', 'Peso: 1.8 kg', 15000, 3),
(4, 'Cheesecake', 'Nuestro cheesecake es un auténtico placer para los amantes del queso. Su textura cremosa y su sabor inigualable te conquistarán desde el primer bocado.', '20240306012522_20231121211341_cheseecake.jpg', 'Imagen de un cheesecake', 'Imagen de un cheesecake', 8000, 3),
(5, 'Torta Brownie', 'La combinación perfecta entre el suave sabor de una torta y la intensidad del brownie. Una experiencia de sabor única que no querrás perderte.', '20240306012708_tortaBrownie.jpg', 'Imagen de torta brownie', 'Peso: 1.8 kg', 16000, 3),
(6, 'Torta Nube', 'Sumérgete en un mundo de dulzura con nuestra impresionante torta nube. Sus colores y sabores te transportarán a un lugar de ensueño.', '20240306013403_tortanube.jpg', 'Imagen de torta nube', 'Peso: 1.8 kg', 18000, 3),
(7, 'Cupcakes', 'Los cupcakes son pequeñas delicias que alegran tu día. Disfruta de nuestros cupcakes en una variedad de sabores que te harán sonreír.', '20240306013757_20231121211554_cupcakes.jpg', 'Imagen de los cupcakes', 'Diámetro: 7x7', 6000, 3),
(8, 'Magnolia', 'Nuestra torta Magnolia es una obra maestra de la repostería. Su elegante presentación y su sabor exquisito la convierten en la elección perfecta para ocasiones especiales.', '20240306013848_20231121211819_magnolia.jpg', 'Imagen de la torta magnolia', 'Peso: 1.8 kg', 15000, 3),
(9, 'Alfajor de maicena', 'Los alfajores de maicena son un clásico irresistible. Delicadas capas de maicena rellenas de dulce de leche, cubiertas con coco rallado.', '20240306014311_20231121211924_alfajor.jpg', 'Imagen de alfajores de maicena', 'Diámetro: 5x5', 2000, 3),
(10, 'Brownie con merengue', 'Una variación celestial del brownie clásico. El merengue dorado y crujiente complementa a la perfección la riqueza del brownie.', '20240306015150_brownieconmerengue.jpg', 'Imagen de un brownie con merengue ', 'Peso: 1.8 kg', 16000, 3),
(11, 'Torta Aguila', 'La torta Águila es una maravilla para los amantes del chocolate. Una explosión de sabor y suavidad que te conquistará desde el primer bocado.', '20240306015330_tortaaguila.jpg', 'Imagen de torta aguila', 'Peso: 1.8 kg', 16500, 3),
(12, 'Macarons Cake', 'Nuestro Macarons Cake es una obra de arte comestible. Una combinación de sabores y colores que deleitará tanto a tus papilas gustativas como a tus ojos.', '20240306015800_macaronscake.jpg', 'Imagen de macarons cake', 'Peso: 1.8 kg', 19000, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_carritos`
--

CREATE TABLE `productos_carritos` (
  `id_productos_carritos` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `productos_fk` int(10) UNSIGNED NOT NULL,
  `carrito_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_has_categorias`
--

CREATE TABLE `productos_has_categorias` (
  `Productos_productos_id` int(10) UNSIGNED NOT NULL,
  `Categorias_categorias_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `roles_id` int(10) UNSIGNED NOT NULL,
  `roles` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`roles_id`, `roles`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuarios_id` int(10) UNSIGNED NOT NULL,
  `nombre_usuario` varchar(60) NOT NULL,
  `apellido_usuario` varchar(60) NOT NULL,
  `mail_usuario` varchar(120) NOT NULL,
  `pssword_usuario` varchar(120) NOT NULL,
  `feche_nacimiento_usuario` date NOT NULL,
  `roles_fk` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuarios_id`, `nombre_usuario`, `apellido_usuario`, `mail_usuario`, `pssword_usuario`, `feche_nacimiento_usuario`, `roles_fk`) VALUES
(1, 'NombreEjemplo', 'ApellidoEjemplo', 'prueba@gmail.com', '1234', '2000-01-01', 1),
(2, 'usuario', 'prueba', 'usuario@gmai.com', '$2y$10$v.a2H15OeMYyx82FvVMy8etw00LFMUTudlKkTjMTcyoBsu8cRuMmS', '2000-10-10', 2),
(3, 'admin', 'prueba', 'admin@gmai.com', '$2y$10$.WoBebtW5cpIUMQ1YTqx.esIGDzwKb8.Ql/Xj6o0/wI9teoCZ.1fa', '2000-10-10', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `fk_carrito_Usuarios1_idx` (`usuarios_fk`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categorias_id`),
  ADD UNIQUE KEY `categoria_UNIQUE` (`categoria`),
  ADD UNIQUE KEY `categorias_id_UNIQUE` (`categorias_id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compras`),
  ADD KEY `fk_compras_carrito1_idx` (`carrito_fk`),
  ADD KEY `fk_compras_Usuarios1_idx` (`usuarios_fk`);

--
-- Indices de la tabla `mp`
--
ALTER TABLE `mp`
  ADD PRIMARY KEY (`id_mp`),
  ADD KEY `fk_mp_Usuarios1_idx` (`usuarios_fk`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`productos_id`),
  ADD UNIQUE KEY `nombre_producto_UNIQUE` (`nombre_producto`),
  ADD UNIQUE KEY `img_producto_UNIQUE` (`img_producto`),
  ADD UNIQUE KEY `alto_img_producto_UNIQUE` (`alt_img_producto`),
  ADD KEY `fk_Productos_Usuarios_idx` (`usuarios_fk`);

--
-- Indices de la tabla `productos_carritos`
--
ALTER TABLE `productos_carritos`
  ADD PRIMARY KEY (`id_productos_carritos`),
  ADD KEY `fk_productos_carritos_Productos1_idx` (`productos_fk`),
  ADD KEY `fk_productos_carritos_carrito1_idx` (`carrito_fk`);

--
-- Indices de la tabla `productos_has_categorias`
--
ALTER TABLE `productos_has_categorias`
  ADD PRIMARY KEY (`Productos_productos_id`,`Categorias_categorias_id`),
  ADD KEY `fk_Productos_has_Categorias_Categorias1_idx` (`Categorias_categorias_id`),
  ADD KEY `fk_Productos_has_Categorias_Productos1_idx` (`Productos_productos_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roles_id`),
  ADD UNIQUE KEY `roles_id_UNIQUE` (`roles_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuarios_id`),
  ADD UNIQUE KEY `mail_usuario_UNIQUE` (`mail_usuario`),
  ADD KEY `fk_Usuarios_Roles1_idx` (`roles_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categorias_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mp`
--
ALTER TABLE `mp`
  MODIFY `id_mp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `productos_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `productos_carritos`
--
ALTER TABLE `productos_carritos`
  MODIFY `id_productos_carritos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `roles_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuarios_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `fk_carrito_Usuarios1` FOREIGN KEY (`usuarios_fk`) REFERENCES `usuarios` (`usuarios_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_compras_Usuarios1` FOREIGN KEY (`usuarios_fk`) REFERENCES `usuarios` (`usuarios_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compras_carrito1` FOREIGN KEY (`carrito_fk`) REFERENCES `carrito` (`id_carrito`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mp`
--
ALTER TABLE `mp`
  ADD CONSTRAINT `fk_mp_Usuarios1` FOREIGN KEY (`usuarios_fk`) REFERENCES `usuarios` (`usuarios_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_Productos_Usuarios` FOREIGN KEY (`usuarios_fk`) REFERENCES `usuarios` (`usuarios_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos_carritos`
--
ALTER TABLE `productos_carritos`
  ADD CONSTRAINT `fk_productos_carritos_Productos1` FOREIGN KEY (`productos_fk`) REFERENCES `productos` (`productos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_carritos_carrito1` FOREIGN KEY (`carrito_fk`) REFERENCES `carrito` (`id_carrito`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos_has_categorias`
--
ALTER TABLE `productos_has_categorias`
  ADD CONSTRAINT `fk_Productos_has_Categorias_Categorias1` FOREIGN KEY (`Categorias_categorias_id`) REFERENCES `categorias` (`categorias_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Productos_has_Categorias_Productos1` FOREIGN KEY (`Productos_productos_id`) REFERENCES `productos` (`productos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_Usuarios_Roles1` FOREIGN KEY (`roles_fk`) REFERENCES `roles` (`roles_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
