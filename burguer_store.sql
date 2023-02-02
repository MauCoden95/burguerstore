-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 01-02-2023 a las 20:24:08
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `burguer_store`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `burguers`
--

DROP TABLE IF EXISTS `burguers`;
CREATE TABLE IF NOT EXISTS `burguers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `burguers`
--

INSERT INTO `burguers` (`id`, `name`, `image`, `price`) VALUES
(2, 'Simple Burguer', 'product-6.png', 1000),
(3, 'Fantasy Burguer', 'product-1.png', 1600),
(4, 'Fantasy Burguer XL', 'burger-baner.png', 1800),
(5, 'Vegan Burguer', 'product-3.png', 1400),
(6, 'Chicken Burguer', 'product-5.png', 1200),
(7, 'Big Burguer', 'about-img.png', 2500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `dni` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `dni` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `dni`, `address`, `password`) VALUES
(1, 'mariano@email.com', 34009053, 'Av. Varela 980', '$2y$05$he98cpZ7ACgvr3kr23jEW.2tu2YGzz92tgVrKymQvIjId1mPJJPe.'),
(3, 'federico@email.com', 21144555, 'Uspallata 560', '$2y$05$VRVzYC6AwmZFcayVJotJseTlwUKHLqBJyxkt04Y0St9QlwhjfTnHS'),
(5, 'maximiliano@email.com', 29009111, 'Carlos Calvo 1980', '$2y$05$2NCYLTGjKbDsvdZo2bsuPew7vwlCBt7fDVI75Jbol8G5EMboIuwMO'),
(6, 'lucia@email.com', 11223666, 'Luna 9', '$2y$05$oq4flTBU1JIc6F39eCJ9W./kBZwsrvIU0yPoSalcffhkmnMPiz07S'),
(7, 'ernesto@email.com', 44222157, 'Mansilla 890', '$2y$05$U.vPiDubJb0M.sYebyd9q.OvaldnWhDe.OudcnZS/qxXrJsVJ6jbS'),
(8, 'emilio@email.com', 11222333, 'Av. Cepeda 900', '$2y$05$FCstQqNIBG4/Bvt49RHmhewqVk/.yzOxPR.eQTXA6ycU6chm.daEm'),
(9, 'facundo@email.com', 34009911, 'Av. Saenx 4500', '$2y$05$kDakQxkgbFLD.L2wajvHVuoZ4yjb02zt4kWcOOrUlqfIh4x2VhqrW');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;





CREATE TABLE carts(
id              int(255) auto_increment not null,
user_id      int(255) not null,
burguer_id    int(255) not null,
quantity    int(255) not null,
PRIMARY KEY(id),
FOREIGN KEY(user_id) REFERENCES users(id),
FOREIGN KEY(burguer_id) REFERENCES burguers(id) 
)ENGINE=InnoDB;

