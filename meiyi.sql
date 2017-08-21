
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS `meiyi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `meiyi`;



DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(8) unsigned zerofill NOT NULL,
  `product_id` int(8) unsigned zerofill NOT NULL,
  `user_id` int(8) NOT NULL,
  `quantity` int(6) NOT NULL,
  `sale_price` decimal(8,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;


INSERT INTO `cart` (`cart_id`, `product_id`, `user_id`, `quantity`, `sale_price`) VALUES
(00000025, 00000105, 12, 1, '12.00');


DROP TABLE IF EXISTS `email`;
CREATE TABLE IF NOT EXISTS `email` (
  `email_id` int(8) unsigned zerofill NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `email_user` varchar(250) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;



INSERT INTO `email` (`email_id`, `name`, `email_user`) VALUES
(00000011, 'admin', 'admin@admin.com'),
(00000012, 'andri', 'railala.andriatsimarivo@gmail.com'),
(00000013, 'andrew', 'andriantsimrail@yahoo.fr'),
(00000014, '', 'r3andrew@gmail.com');



DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `user_id` int(8) unsigned zerofill NOT NULL,
  `name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `city` varchar(64) DEFAULT NULL,
  `phone` char(16) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(128) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;


INSERT INTO `members` (`user_id`, `name`, `address`, `city`, `phone`, `email`, `password`, `admin`) VALUES
(00000012, 'admin', 'admin', 'admin', '123456789', 'admin@admin.com', 'rootroot', 1),
(00000013, 'andri', 'wuhan', 'wuh', '1212', 'railala.andriatsimarivo@gmail.com', 'rootroot', 0),
(00000014, 'andrew', 'sha', 'shaj', '1212121', 'andriantsimrail@yahoo.fr', 'rootroot', 0);


DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(8) unsigned zerofill NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` varchar(4096) DEFAULT NULL,
  `price` decimal(6,2) NOT NULL,
  `old_price` decimal(6,2) DEFAULT NULL,
  `special` varchar(16) DEFAULT NULL,
  `image1` varchar(128) NOT NULL,
  `image2` varchar(128) DEFAULT NULL,
  `category` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;



INSERT INTO `products` (`product_id`, `title`, `description`, `price`, `old_price`, `special`, `image1`, `image2`, `category`) VALUES
(00000105, 'cat', 'jdksjdk', '12.00', '14.00', 'new', 'products/c9d02e7968e3f8460004e1a675e73603.JPG', 'products/8d6cec50ae8da8d371bd308edb583086.JPEG', 'ladies wear');


ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);


ALTER TABLE `email`
  ADD PRIMARY KEY (`email_id`),
  ADD UNIQUE KEY `email` (`email_user`);


ALTER TABLE `members`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `password` (`password`),
  ADD KEY `email2` (`email`);


ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `title` (`title`);


ALTER TABLE `cart`
  MODIFY `cart_id` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;

ALTER TABLE `email`
  MODIFY `email_id` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;

ALTER TABLE `members`
  MODIFY `user_id` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;

ALTER TABLE `products`
  MODIFY `product_id` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;
