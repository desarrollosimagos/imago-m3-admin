-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 21, 2017 at 11:29 AM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imago_m3`
--
CREATE DATABASE IF NOT EXISTS `imago_m3` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `imago_m3`;

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `class` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `assigned` int(11) NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `name`, `class`, `route`, `assigned`, `d_create`, `d_update`) VALUES
(1, 'PERFILES', 'CPerfil', 'profile', 1, '2017-05-08 18:28:55', '0000-00-00 00:00:00'),
(2, 'EMPLEADOS', 'CUser', 'users', 1, '2017-05-08 18:29:01', '0000-00-00 00:00:00'),
(3, 'SERVICIOS', 'CServices', 'service', 0, '2017-08-04 14:29:29', '0000-00-00 00:00:00'),
(4, 'FRANQUICIAS', 'CFranchises', 'franchise', 0, '2017-08-04 14:28:12', '0000-00-00 00:00:00'),
(5, 'BITACORA', 'CBitacora', 'logs', 0, '2017-05-08 20:07:19', '0000-00-00 00:00:00'),
(6, 'HOME', 'Home', 'home', 0, '2017-05-04 15:42:52', '0000-00-00 00:00:00'),
(7, 'PRUEBA', 'CPrueba', 'prueba', 1, '2017-05-22 17:45:06', '0000-00-00 00:00:00'),
(8, 'MENUS', 'CMenus', 'menus', 1, '2017-05-08 18:47:10', '0000-00-00 00:00:00'),
(9, 'SUBMENUS', 'CSubMenus', 'submenus', 1, '2017-05-08 18:47:18', '0000-00-00 00:00:00'),
(10, 'ACCIONES', 'CAcciones', 'acciones', 1, '2017-05-08 18:47:23', '0000-00-00 00:00:00'),
(11, 'ASSIGNMENT', 'CAssignment', 'assignment', 0, '2017-05-15 17:39:14', '0000-00-00 00:00:00'),
(12, 'CLIENTES', 'CClient', 'clients', 0, '2017-08-04 14:29:38', '0000-00-00 00:00:00'),
(15, 'PRUEBA2', 'CPrueba2', 'prueba2', 1, '2017-05-23 18:08:11', '0000-00-00 00:00:00'),
(16, 'PRUEBA3', 'CPrueba3', 'prueba3', 0, '2017-05-10 20:09:29', '0000-00-00 00:00:00'),
(17, 'ORDEN DE SERVICIO', 'COrder', 'order', 0, '2017-08-04 14:29:44', '0000-00-00 00:00:00'),
(19, 'PRODUCTOS', 'CProductos', 'productos', 1, '2017-08-14 21:27:13', '0000-00-00 00:00:00'),
(23, 'prueba4', 'CPrueba4', 'prueba4', 0, '2017-05-23 18:19:30', '0000-00-00 00:00:00'),
(24, 'LEnguaje', 'LanguageSwitcher', 'language', 0, '2017-05-30 19:21:53', '0000-00-00 00:00:00'),
(25, 'MATERIALES', 'CMateriales', 'materiales', 0, '2017-08-14 21:27:13', '0000-00-00 00:00:00'),
(26, 'TIENDAS', 'CTiendas', 'tiendas', 1, '2017-08-15 16:19:05', '0000-00-00 00:00:00'),
(27, 'APLICACIONES', 'CAplicaciones', 'aplicaciones', 1, '2017-08-15 20:53:01', '0000-00-00 00:00:00'),
(28, 'ASIGNACIONES', 'CAsignaciones', 'asignaciones', 0, '2017-08-17 14:08:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `aplicacion`
--

CREATE TABLE IF NOT EXISTS `aplicacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ruta` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `aplicacion`
--

INSERT INTO `aplicacion` (`id`, `nombre`, `ruta`, `status`, `d_create`, `d_update`) VALUES
(4, 'Aplicación1', 'ruta1', 1, '2017-08-17 18:17:10', '0000-00-00 00:00:00'),
(5, 'Aplicación2', 'ruta2', 1, '2017-08-17 18:17:23', '0000-00-00 00:00:00'),
(6, 'Aplicación3', 'ruta3', 1, '2017-08-17 18:17:33', '0000-00-00 00:00:00'),
(7, 'Aplicación4', 'ruta4', 1, '2017-08-18 18:54:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `franchises`
--

CREATE TABLE IF NOT EXISTS `franchises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `address` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `status` int(11) NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `franchises`
--

INSERT INTO `franchises` (`id`, `name`, `address`, `status`, `d_create`, `d_update`) VALUES
(1, 'FRANQUICIA1', 'Urbanización Base Aragua, Residencias Choroní I, Piso 6.', 1, '2017-05-03 23:24:31', '0000-00-00 00:00:00'),
(2, 'FRANQUICIA2', 'NO APLICA', 1, '2017-05-15 19:08:23', '0000-00-00 00:00:00'),
(3, 'FRANQUICIA3', 'Urbanización Base Aragua, Residencias Choroní II, Piso 4.', 1, '2017-05-15 19:58:34', '0000-00-00 00:00:00'),
(4, 'FRANQUICIA4', 'Urbanización Base Aragua, Residencias Choroní III, Piso 2.', 1, '2017-05-15 20:27:20', '0000-00-00 00:00:00'),
(5, 'FRANQUICIA5', 'grdfasfgdfgdfshsdf', 1, '2017-05-18 21:41:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE IF NOT EXISTS `icons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=598 ;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `class`, `name`, `category`, `d_create`, `d_update`) VALUES
(1, 'fa fa-address-book', 'address-book', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(2, 'fa fa-address-book-o', 'address-book-o', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(3, 'fa fa-address-card', 'address-card', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(4, 'fa fa-address-card-o', 'address-card-o', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(5, 'fa fa-bandcamp', 'bandcamp', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(6, 'fa fa-bath', 'bath', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(7, 'fa fa-bathtub', 'bathtub (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(8, 'fa fa-drivers-license', 'drivers-license (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(9, 'fa fa-drivers-license-o', 'drivers-license-o (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(10, 'fa fa-eercast', 'eercast', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(11, 'fa fa-envelope-open', 'envelope-open', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(12, 'fa fa-envelope-open-o', 'envelope-open-o', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(13, 'fa fa-etsy', 'etsy', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(14, 'fa fa-free-code-camp', 'free-code-camp', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(15, 'fa fa-grav', 'grav', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(16, 'fa fa-handshake-o', 'handshake-o', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(17, 'fa fa-id-badge', 'id-badge', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(18, 'fa fa-id-card', 'id-card', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(19, 'fa fa-id-card-o', 'id-card-o', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(20, 'fa fa-imdb', 'imdb', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(21, 'fa fa-linode', 'linode', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(22, 'fa fa-meetup', 'meetup', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(23, 'fa fa-microchip', 'microchip', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(24, 'fa fa-podcast', 'podcast', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(25, 'fa fa-quora', 'quora', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(26, 'fa fa-ravelry', 'ravelry', 'New Icons in 4.7.0', '2017-05-19 14:12:07', '0000-00-00 00:00:00'),
(27, 'fa fa-s15', 's15 (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(28, 'fa fa-shower', 'shower', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(29, 'fa fa-snowflake-o', 'snowflake-o', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(30, 'fa fa-superpowers', 'superpowers', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(31, 'fa fa-telegram', 'telegram', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(32, 'fa fa-thermometer', 'thermometer (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(33, 'fa fa-thermometer-0', 'thermometer-0 (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(34, 'fa fa-thermometer-1', 'thermometer-1 (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(35, 'fa fa-thermometer-2', 'thermometer-2 (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(36, 'fa fa-thermometer-3', 'thermometer-3 (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(37, 'fa fa-thermometer-4', 'thermometer-4 (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(38, 'fa fa-thermometer-empty', 'thermometer-empty', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(39, 'fa fa-thermometer-full', 'thermometer-full', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(40, 'fa fa-thermometer-half', 'thermometer-half', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(41, 'fa fa-thermometer-quarter', 'thermometer-quarter', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(42, 'fa fa-thermometer-three-quarters', 'thermometer-three-quarters', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(43, 'fa fa-times-rectangle', 'times-rectangle (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(44, 'fa fa-times-rectangle-o', 'times-rectangle-o (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(45, 'fa fa-user-circle', 'user-circle', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(46, 'fa fa-user-circle-o', 'user-circle-o', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(47, 'fa fa-user-o', 'user-o', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(48, 'fa fa-vcard', 'vcard (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(49, 'fa fa-vcard-o', 'vcard-o (alias)', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(50, 'fa fa-window-close', 'window-close', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(51, 'fa fa-window-close-o', 'window-close-o', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(52, 'fa fa-window-maximize', 'window-maximize', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(53, 'fa fa-window-minimize', 'window-minimize', 'New Icons in 4.7.0', '2017-05-19 14:12:08', '0000-00-00 00:00:00'),
(54, 'fa fa-window-restore', 'window-restore', 'New Icons in 4.7.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(55, 'fa fa-wpexplorer', 'wpexplorer', 'New Icons in 4.7.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(56, 'fa fa-angellist', 'fa-angellist', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(57, 'fa fa-area-chart', 'fa-area-chart', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(58, 'fa fa-at', 'fa-at', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(59, 'fa fa-bell-slash', 'fa-bell-slash', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(60, 'fa fa-bell-slash-o', 'fa-bell-slash-o', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(61, 'fa fa-bicycle', 'fa-bicycle', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(62, 'fa fa-binoculars', 'fa-binoculars', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(63, 'fa fa-birthday-cake', 'fa-birthday-cake', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(64, 'fa fa-bus', 'fa-bus', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(65, 'fa fa-calculator', 'fa-calculator', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(66, 'fa fa-cc', 'fa-cc', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(67, 'fa fa-cc-amex', 'fa-cc-amex', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(68, 'fa fa-cc-discover', 'fa-cc-discover', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(69, 'fa fa-cc-mastercard', 'fa-cc-mastercard', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(70, 'fa fa-cc-paypal', 'fa-cc-paypal', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(71, 'fa fa-cc-stripe', 'fa-cc-stripe', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(72, 'fa fa-cc-visa', 'fa-cc-visa', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(73, 'fa fa-copyright', 'fa-copyright', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(74, 'fa fa-eyedropper', 'fa-eyedropper', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(75, 'fa fa-futbol-o', 'fa-futbol-o', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(76, 'fa fa-google-wallet', 'fa-google-wallet', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(77, 'fa fa-ils', 'fa-ils', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(78, 'fa fa-ioxhost', 'fa-ioxhost', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(79, 'fa fa-lastfm', 'fa-lastfm', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(80, 'fa fa-lastfm-square', 'fa-lastfm-square', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(81, 'fa fa-line-chart', 'fa-line-chart', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(82, 'fa fa-meanpath', 'fa-meanpath', 'New Icons in 4.3.0', '2017-05-19 14:12:09', '0000-00-00 00:00:00'),
(83, 'fa fa-newspaper-o', 'fa-newspaper-o', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(84, 'fa fa-paint-brush', 'fa-paint-brush', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(85, 'fa fa-paypal', 'fa-paypal', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(86, 'fa fa-pie-chart', 'fa-pie-chart', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(87, 'fa fa-plug', 'fa-plug', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(88, 'fa fa-shekel', 'fa-shekel (alias)', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(89, 'fa fa-sheqel', 'fa-sheqel (alias)', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(90, 'fa fa-slideshare', 'fa-slideshare', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(91, 'fa fa-soccer-ball-o', 'fa-soccer-ball-o (alias)', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(92, 'fa fa-toggle-off', 'fa-toggle-off', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(93, 'fa fa-toggle-on', 'fa-toggle-on', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(94, 'fa fa-trash', 'fa-trash', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(95, 'fa fa-tty', 'fa-tty', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(96, 'fa fa-twitch', 'fa-twitch', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(97, 'fa fa-wifi', 'fa-wifi', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(98, 'fa fa-yelp', 'fa-yelp', 'New Icons in 4.3.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(99, 'fa fa-rub', 'fa-rub', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(100, 'fa fa-ruble', 'fa-ruble (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(101, 'fa fa-rouble', 'fa-rouble (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(102, 'fa fa-pagelines', 'fa-pagelines', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(103, 'fa fa-stack-exchange', 'fa-stack-exchange', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(104, 'fa fa-arrow-circle-o-right', 'fa-arrow-circle-o-right', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(105, 'fa fa-arrow-circle-o-left', 'fa-arrow-circle-o-left', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(106, 'fa fa-caret-square-o-left', 'fa-caret-square-o-left', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(107, 'fa fa-toggle-left', 'fa-toggle-left (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(108, 'fa fa-dot-circle-o', 'fa-dot-circle-o', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(109, 'fa fa-wheelchair', 'fa-wheelchair', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(110, 'fa fa-vimeo-square', 'fa-vimeo-square', 'New Icons in 4.1.0', '2017-05-19 14:12:10', '0000-00-00 00:00:00'),
(111, 'fa fa-try', 'fa-try', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(112, 'fa fa-turkish-lira', 'fa-turkish-lira (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(113, 'fa fa-plus-square-o', 'fa-plus-square-o', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(114, 'fa fa-automobile', 'fa-automobile (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(115, 'fa fa-bank', 'fa-bank (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(116, 'fa fa-behance', 'fa-behance', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(117, 'fa fa-behance-square', 'fa-behance-square', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(118, 'fa fa-bomb', 'fa-bomb', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(119, 'fa fa-building', 'fa-building', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(120, 'fa fa-cab', 'fa-cab (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(121, 'fa fa-car', 'fa-car', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(122, 'fa fa-child', 'fa-child', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(123, 'fa fa-circle-o-notch', 'fa-circle-o-notch', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(124, 'fa fa-circle-thin', 'fa-circle-thin', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(125, 'fa fa-codepen', 'fa-codepen', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(126, 'fa fa-cube', 'fa-cube', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(127, 'fa fa-cubes', 'fa-cubes', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(128, 'fa fa-database', 'fa-database', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(129, 'fa fa-delicious', 'fa-delicious', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(130, 'fa fa-deviantart', 'fa-deviantart', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(131, 'fa fa-digg', 'fa-digg', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(132, 'fa fa-drupal', 'fa-drupal', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(133, 'fa fa-empire', 'fa-empire', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(134, 'fa fa-envelope-square', 'fa-envelope-square', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(135, 'fa fa-fax', 'fa-fax', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(136, 'fa fa-file-archive-o', 'fa-file-archive-o', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(137, 'fa fa-file-audio-o', 'fa-file-audio-o', 'New Icons in 4.1.0', '2017-05-19 14:12:11', '0000-00-00 00:00:00'),
(138, 'fa fa-file-code-o', 'fa-file-code-o', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(139, 'fa fa-file-excel-o', 'fa-file-excel-o', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(140, 'fa fa-file-image-o', 'fa-file-image-o', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(141, 'fa fa-file-movie-o', 'fa-file-movie-o (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(142, 'fa fa-file-pdf-o', 'fa-file-pdf-o', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(143, 'fa fa-file-photo-o', 'fa-file-photo-o (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(144, 'fa fa-file-picture-o', 'fa-file-picture-o (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(145, 'fa fa-file-powerpoint-o', 'fa-file-powerpoint-o', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(146, 'fa fa-file-sound-o', 'fa-file-sound-o (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(147, 'fa fa-file-video-o', 'fa-file-video-o', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(148, 'fa fa-file-word-o', 'fa-file-word-o', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(149, 'fa fa-file-zip-o', 'fa-file-zip-o (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(150, 'fa fa-ge', 'fa-ge (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(151, 'fa fa-git', 'fa-git', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(152, 'fa fa-git-square', 'fa-git-square', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(153, 'fa fa-google', 'fa-google', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(154, 'fa fa-graduation-cap', 'fa-graduation-cap', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(155, 'fa fa-hacker-news', 'fa-hacker-news', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(156, 'fa fa-header', 'fa-header', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(157, 'fa fa-history', 'fa-history', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(158, 'fa fa-institution', 'fa-institution (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(159, 'fa fa-joomla', 'fa-joomla', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(160, 'fa fa-jsfiddle', 'fa-jsfiddle', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(161, 'fa fa-language', 'fa-language', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(162, 'fa fa-life-bouy', 'fa-life-bouy (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(163, 'fa fa-life-ring', 'fa-life-ring', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(164, 'fa fa-life-saver', 'fa-life-saver (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(165, 'fa fa-mortar-board', 'fa-mortar-board (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:12', '0000-00-00 00:00:00'),
(166, 'fa fa-openid', 'fa-openid', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(167, 'fa fa-paper-plane', 'fa-paper-plane', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(168, 'fa fa-paper-plane-o', 'fa-paper-plane-o', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(169, 'fa fa-paragraph', 'fa-paragraph', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(170, 'fa fa-paw', 'fa-paw', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(171, 'fa fa-pied-piper', 'fa-pied-piper', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(172, 'fa fa-pied-piper-alt', 'fa-pied-piper-alt', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(173, 'fa fa-pied-piper-square', 'fa-pied-piper-square (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(174, 'fa fa-qq', 'fa-qq', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(175, 'fa fa-ra', 'fa-ra (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(176, 'fa fa-rebel', 'fa-rebel', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(177, 'fa fa-recycle', 'fa-recycle', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(178, 'fa fa-reddit', 'fa-reddit', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(179, 'fa fa-reddit-square', 'fa-reddit-square', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(180, 'fa fa-send', 'fa-send (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(181, 'fa fa-send-o', 'fa-send-o (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(182, 'fa fa-share-alt', 'fa-share-alt', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(183, 'fa fa-share-alt-square', 'fa-share-alt-square', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(184, 'fa fa-slack', 'fa-slack', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(185, 'fa fa-sliders', 'fa-sliders', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(186, 'fa fa-soundcloud', 'fa-soundcloud', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(187, 'fa fa-space-shuttle', 'fa-space-shuttle', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(188, 'fa fa-spoon', 'fa-spoon', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(189, 'fa fa-spotify', 'fa-spotify', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(190, 'fa fa-steam', 'fa-steam', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(191, 'fa fa-steam-square', 'fa-steam-square', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(192, 'fa fa-stumbleupon', 'fa-stumbleupon', 'New Icons in 4.1.0', '2017-05-19 14:12:13', '0000-00-00 00:00:00'),
(193, 'fa fa-stumbleupon-circle', 'fa-stumbleupon-circle', 'New Icons in 4.1.0', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(194, 'fa fa-support', 'fa-support (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(195, 'fa fa-taxi', 'fa-taxi', 'New Icons in 4.1.0', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(196, 'fa fa-tencent-weibo', 'fa-tencent-weibo', 'New Icons in 4.1.0', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(197, 'fa fa-tree', 'fa-tree', 'New Icons in 4.1.0', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(198, 'fa fa-university', 'fa-university', 'New Icons in 4.1.0', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(199, 'fa fa-vine', 'fa-vine', 'New Icons in 4.1.0', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(200, 'fa fa-wechat', 'fa-wechat (alias)', 'New Icons in 4.1.0', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(201, 'fa fa-weixin', 'fa-weixin', 'New Icons in 4.1.0', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(202, 'fa fa-wordpress', 'fa-wordpress', 'New Icons in 4.1.0', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(203, 'fa fa-yahoo', 'fa-yahoo', 'New Icons in 4.1.0', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(204, 'fa fa-adjust', 'fa-adjust', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(205, 'fa fa-anchor', 'fa-anchor', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(206, 'fa fa-archive', 'fa-archive', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(207, 'fa fa-arrows', 'fa-arrows', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(208, 'fa fa-arrows-h', 'fa-arrows-h', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(209, 'fa fa-arrows-v', 'fa-arrows-v', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(210, 'fa fa-asterisk', 'fa-asterisk', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(211, 'fa fa-ban', 'fa-ban', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(212, 'fa fa-bar-chart-o', 'fa-bar-chart-o', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(213, 'fa fa-barcode', 'fa-barcode', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(214, 'fa fa-bars', 'fa-bars', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(215, 'fa fa-beer', 'fa-beer', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(216, 'fa fa-bell', 'fa-bell', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(217, 'fa fa-bell-o', 'fa-bell-o', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(218, 'fa fa-bolt', 'fa-bolt', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(219, 'fa fa-book', 'fa-book', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(220, 'fa fa-bookmark', 'fa-bookmark', 'Web Application Icons', '2017-05-19 14:12:14', '0000-00-00 00:00:00'),
(221, 'fa fa-bookmark-o', 'fa-bookmark-o', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(222, 'fa fa-briefcase', 'fa-briefcase', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(223, 'fa fa-bug', 'fa-bug', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(224, 'fa fa-building-o', 'fa-building-o', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(225, 'fa fa-bullhorn', 'fa-bullhorn', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(226, 'fa fa-bullseye', 'fa-bullseye', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(227, 'fa fa-calendar', 'fa-calendar', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(228, 'fa fa-calendar-o', 'fa-calendar-o', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(229, 'fa fa-camera', 'fa-camera', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(230, 'fa fa-camera-retro', 'fa-camera-retro', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(231, 'fa fa-caret-square-o-down', 'fa-caret-square-o-down', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(232, 'fa fa-caret-square-o-right', 'fa-caret-square-o-right', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(233, 'fa fa-caret-square-o-up', 'fa-caret-square-o-up', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(234, 'fa fa-certificate', 'fa-certificate', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(235, 'fa fa-check', 'fa-check', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(236, 'fa fa-check-circle', 'fa-check-circle', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(237, 'fa fa-check-circle-o', 'fa-check-circle-o', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(238, 'fa fa-check-square', 'fa-check-square', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(239, 'fa fa-check-square-o', 'fa-check-square-o', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(240, 'fa fa-circle', 'fa-circle', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(241, 'fa fa-circle-o', 'fa-circle-o', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(242, 'fa fa-clock-o', 'fa-clock-o', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(243, 'fa fa-cloud', 'fa-cloud', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(244, 'fa fa-cloud-download', 'fa-cloud-download', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(245, 'fa fa-cloud-upload', 'fa-cloud-upload', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(246, 'fa fa-code', 'fa-code', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(247, 'fa fa-code-fork', 'fa-code-fork', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(248, 'fa fa-coffee', 'fa-coffee', 'Web Application Icons', '2017-05-19 14:12:15', '0000-00-00 00:00:00'),
(249, 'fa fa-cog', 'fa-cog', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(250, 'fa fa-cogs', 'fa-cogs', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(251, 'fa fa-comment', 'fa-comment', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(252, 'fa fa-comment-o', 'fa-comment-o', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(253, 'fa fa-comments', 'fa-comments', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(254, 'fa fa-comments-o', 'fa-comments-o', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(255, 'fa fa-compass', 'fa-compass', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(256, 'fa fa-credit-card', 'fa-credit-card', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(257, 'fa fa-crop', 'fa-crop', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(258, 'fa fa-crosshairs', 'fa-crosshairs', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(259, 'fa fa-cutlery', 'fa-cutlery', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(260, 'fa fa-dashboard', 'fa-dashboard (alias)', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(261, 'fa fa-desktop', 'fa-desktop', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(262, 'fa fa-download', 'fa-download', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(263, 'fa fa-edit', 'fa-edit (alias)', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(264, 'fa fa-ellipsis-h', 'fa-ellipsis-h', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(265, 'fa fa-ellipsis-v', 'fa-ellipsis-v', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(266, 'fa fa-envelope', 'fa-envelope', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(267, 'fa fa-envelope-o', 'fa-envelope-o', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(268, 'fa fa-eraser', 'fa-eraser', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(269, 'fa fa-exchange', 'fa-exchange', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(270, 'fa fa-exclamation', 'fa-exclamation', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(271, 'fa fa-exclamation-circle', 'fa-exclamation-circle', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(272, 'fa fa-exclamation-triangle', 'fa-exclamation-triangle', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(273, 'fa fa-external-link', 'fa-external-link', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(274, 'fa fa-external-link-square', 'fa-external-link-square', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(275, 'fa fa-eye', 'fa-eye', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(276, 'fa fa-eye-slash', 'fa-eye-slash', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(277, 'fa fa-female', 'fa-female', 'Web Application Icons', '2017-05-19 14:12:16', '0000-00-00 00:00:00'),
(278, 'fa fa-fighter-jet', 'fa-fighter-jet', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(279, 'fa fa-film', 'fa-film', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(280, 'fa fa-filter', 'fa-filter', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(281, 'fa fa-fire', 'fa-fire', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(282, 'fa fa-fire-extinguisher', 'fa-fire-extinguisher', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(283, 'fa fa-flag', 'fa-flag', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(284, 'fa fa-flag-checkered', 'fa-flag-checkered', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(285, 'fa fa-flag-o', 'fa-flag-o', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(286, 'fa fa-flash', 'fa-flash (alias)', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(287, 'fa fa-flask', 'fa-flask', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(288, 'fa fa-folder', 'fa-folder', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(289, 'fa fa-folder-o', 'fa-folder-o', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(290, 'fa fa-folder-open', 'fa-folder-open', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(291, 'fa fa-folder-open-o', 'fa-folder-open-o', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(292, 'fa fa-frown-o', 'fa-frown-o', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(293, 'fa fa-gamepad', 'fa-gamepad', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(294, 'fa fa-gavel', 'fa-gavel', 'Web Application Icons', '2017-05-19 14:12:17', '0000-00-00 00:00:00'),
(295, 'fa fa-gear', 'fa-gear (alias)', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(296, 'fa fa-gears', 'fa-gears (alias)', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(297, 'fa fa-gift', 'fa-gift', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(298, 'fa fa-glass', 'fa-glass', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(299, 'fa fa-globe', 'fa-globe', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(300, 'fa fa-group', 'fa-group (alias)', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(301, 'fa fa-hdd-o', 'fa-hdd-o', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(302, 'fa fa-headphones', 'fa-headphones', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(303, 'fa fa-heart', 'fa-heart', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(304, 'fa fa-heart-o', 'fa-heart-o', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(305, 'fa fa-home', 'fa-home', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(306, 'fa fa-inbox', 'fa-inbox', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(307, 'fa fa-info', 'fa-info', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(308, 'fa fa-info-circle', 'fa-info-circle', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(309, 'fa fa-key', 'fa-key', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(310, 'fa fa-keyboard-o', 'fa-keyboard-o', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(311, 'fa fa-laptop', 'fa-laptop', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(312, 'fa fa-leaf', 'fa-leaf', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(313, 'fa fa-legal', 'fa-legal (alias)', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(314, 'fa fa-lemon-o', 'fa-lemon-o', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(315, 'fa fa-level-down', 'fa-level-down', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(316, 'fa fa-level-up', 'fa-level-up', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(317, 'fa fa-lightbulb-o', 'fa-lightbulb-o', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(318, 'fa fa-location-arrow', 'fa-location-arrow', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(319, 'fa fa-lock', 'fa-lock', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(320, 'fa fa-magic', 'fa-magic', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(321, 'fa fa-magnet', 'fa-magnet', 'Web Application Icons', '2017-05-19 14:12:18', '0000-00-00 00:00:00'),
(322, 'fa fa-mail-forward', 'fa-mail-forward (alias)', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(323, 'fa fa-mail-reply', 'fa-mail-reply (alias)', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(324, 'fa fa-mail-reply-all', 'fa-mail-reply-all', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(325, 'fa fa-male', 'fa-male', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(326, 'fa fa-map-marker', 'fa-map-marker', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(327, 'fa fa-meh-o', 'fa-meh-o', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(328, 'fa fa-microphone', 'fa-microphone', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(329, 'fa fa-microphone-slash', 'fa-microphone-slash', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(330, 'fa fa-minus', 'fa-minus', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(331, 'fa fa-minus-circle', 'fa-minus-circle', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(332, 'fa fa-minus-square', 'fa-minus-square', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(333, 'fa fa-minus-square-o', 'fa-minus-square-o', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(334, 'fa fa-mobile', 'fa-mobile', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(335, 'fa fa-mobile-phone', 'fa-mobile-phone (alias)', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(336, 'fa fa-money', 'fa-money', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(337, 'fa fa-moon-o', 'fa-moon-o', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(338, 'fa fa-music', 'fa-music', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(339, 'fa fa-pencil', 'fa-pencil', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(340, 'fa fa-pencil-square', 'fa-pencil-square', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(341, 'fa fa-pencil-square-o', 'fa-pencil-square-o', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(342, 'fa fa-phone', 'fa-phone', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(343, 'fa fa-phone-square', 'fa-phone-square', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(344, 'fa fa-picture-o', 'fa-picture-o', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(345, 'fa fa-plane', 'fa-plane', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(346, 'fa fa-plus', 'fa-plus', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(347, 'fa fa-plus-circle', 'fa-plus-circle', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(348, 'fa fa-plus-square', 'fa-plus-square', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(349, 'fa fa-power-off', 'fa-power-off', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(350, 'fa fa-print', 'fa-print', 'Web Application Icons', '2017-05-19 14:12:19', '0000-00-00 00:00:00'),
(351, 'fa fa-puzzle-piece', 'fa-puzzle-piece', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(352, 'fa fa-qrcode', 'fa-qrcode', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(353, 'fa fa-question', 'fa-question', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(354, 'fa fa-question-circle', 'fa-question-circle', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(355, 'fa fa-quote-left', 'fa-quote-left', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(356, 'fa fa-quote-right', 'fa-quote-right', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(357, 'fa fa-random', 'fa-random', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(358, 'fa fa-refresh', 'fa-refresh', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(359, 'fa fa-reply', 'fa-reply', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(360, 'fa fa-reply-all', 'fa-reply-all', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(361, 'fa fa-retweet', 'fa-retweet', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(362, 'fa fa-road', 'fa-road', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(363, 'fa fa-rocket', 'fa-rocket', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(364, 'fa fa-rss', 'fa-rss', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(365, 'fa fa-rss-square', 'fa-rss-square', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(366, 'fa fa-search', 'fa-search', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(367, 'fa fa-search-minus', 'fa-search-minus', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(368, 'fa fa-search-plus', 'fa-search-plus', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(369, 'fa fa-share', 'fa-share', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(370, 'fa fa-share-square', 'fa-share-square', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(371, 'fa fa-share-square-o', 'fa-share-square-o', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(372, 'fa fa-shield', 'fa-shield', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(373, 'fa fa-shopping-cart', 'fa-shopping-cart', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(374, 'fa fa-sign-in', 'fa-sign-in', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(375, 'fa fa-sign-out', 'fa-sign-out', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(376, 'fa fa-signal', 'fa-signal', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(377, 'fa fa-sitemap', 'fa-sitemap', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(378, 'fa fa-smile-o', 'fa-smile-o', 'Web Application Icons', '2017-05-19 14:12:20', '0000-00-00 00:00:00'),
(379, 'fa fa-sort', 'fa-sort', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(380, 'fa fa-sort-alpha-asc', 'fa-sort-alpha-asc', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(381, 'fa fa-sort-alpha-desc', 'fa-sort-alpha-desc', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(382, 'fa fa-sort-amount-asc', 'fa-sort-amount-asc', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(383, 'fa fa-sort-amount-desc', 'fa-sort-amount-desc', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(384, 'fa fa-sort-asc', 'fa-sort-asc', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(385, 'fa fa-sort-desc', 'fa-sort-desc', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(386, 'fa fa-sort-down', 'fa-sort-down (alias)', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(387, 'fa fa-sort-numeric-asc', 'fa-sort-numeric-asc', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(388, 'fa fa-sort-numeric-desc', 'fa-sort-numeric-desc', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(389, 'fa fa-sort-up', 'fa-sort-up (alias)', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(390, 'fa fa-spinner', 'fa-spinner', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(391, 'fa fa-square', 'fa-square', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(392, 'fa fa-square-o', 'fa-square-o', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(393, 'fa fa-star', 'fa-star', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(394, 'fa fa-star-half', 'fa-star-half', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(395, 'fa fa-star-half-empty', 'fa-star-half-empty (alias)', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(396, 'fa fa-star-half-full', 'fa-star-half-full (alias)', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(397, 'fa fa-star-half-o', 'fa-star-half-o', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(398, 'fa fa-star-o', 'fa-star-o', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(399, 'fa fa-subscript', 'fa-subscript', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(400, 'fa fa-suitcase', 'fa-suitcase', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(401, 'fa fa-sun-o', 'fa-sun-o', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(402, 'fa fa-superscript', 'fa-superscript', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(403, 'fa fa-tablet', 'fa-tablet', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(404, 'fa fa-tachometer', 'fa-tachometer', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(405, 'fa fa-tag', 'fa-tag', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(406, 'fa fa-tags', 'fa-tags', 'Web Application Icons', '2017-05-19 14:12:21', '0000-00-00 00:00:00'),
(407, 'fa fa-tasks', 'fa-tasks', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(408, 'fa fa-terminal', 'fa-terminal', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(409, 'fa fa-thumb-tack', 'fa-thumb-tack', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(410, 'fa fa-thumbs-down', 'fa-thumbs-down', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(411, 'fa fa-thumbs-o-down', 'fa-thumbs-o-down', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(412, 'fa fa-thumbs-o-up', 'fa-thumbs-o-up', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(413, 'fa fa-thumbs-up', 'fa-thumbs-up', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(414, 'fa fa-ticket', 'fa-ticket', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(415, 'fa fa-times', 'fa-times', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(416, 'fa fa-times-circle', 'fa-times-circle', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(417, 'fa fa-times-circle-o', 'fa-times-circle-o', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(418, 'fa fa-tint', 'fa-tint', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(419, 'fa fa-toggle-down', 'fa-toggle-down (alias)', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(420, 'fa fa-toggle-right', 'fa-toggle-right (alias)', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(421, 'fa fa-toggle-up', 'fa-toggle-up (alias)', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(422, 'fa fa-trash-o', 'fa-trash-o', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(423, 'fa fa-trophy', 'fa-trophy', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(424, 'fa fa-truck', 'fa-truck', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(425, 'fa fa-umbrella', 'fa-umbrella', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(426, 'fa fa-unlock', 'fa-unlock', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(427, 'fa fa-unlock-alt', 'fa-unlock-alt', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(428, 'fa fa-unsorted', 'fa-unsorted (alias)', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(429, 'fa fa-upload', 'fa-upload', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(430, 'fa fa-user', 'fa-user', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(431, 'fa fa-users', 'fa-users', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(432, 'fa fa-video-camera', 'fa-video-camera', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(433, 'fa fa-volume-down', 'fa-volume-down', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(434, 'fa fa-volume-off', 'fa-volume-off', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(435, 'fa fa-volume-up', 'fa-volume-up', 'Web Application Icons', '2017-05-19 14:12:22', '0000-00-00 00:00:00'),
(436, 'fa fa-warning', 'fa-warning (alias)', 'Web Application Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(437, 'fa fa-wrench', 'fa-wrench', 'Web Application Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(438, 'fa fa-bitcoin', 'fa-bitcoin (alias)', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(439, 'fa fa-btc', 'fa-btc', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(440, 'fa fa-cny', 'fa-cny (alias)', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(441, 'fa fa-dollar', 'fa-dollar (alias)', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(442, 'fa fa-eur', 'fa-eur', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(443, 'fa fa-euro', 'fa-euro (alias)', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(444, 'fa fa-gbp', 'fa-gbp', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(445, 'fa fa-inr', 'fa-inr', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(446, 'fa fa-jpy', 'fa-jpy', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(447, 'fa fa-krw', 'fa-krw', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(448, 'fa fa-rmb', 'fa-rmb (alias)', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(449, 'fa fa-rupee', 'fa-rupee (alias)', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(450, 'fa fa-usd', 'fa-usd', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(451, 'fa fa-won', 'fa-won (alias)', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(452, 'fa fa-yen', 'fa-yen (alias)', 'Currency Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(453, 'fa fa-align-center', 'fa-align-center', 'Text Editor Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(454, 'fa fa-align-justify', 'fa-align-justify', 'Text Editor Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(455, 'fa fa-align-left', 'fa-align-left', 'Text Editor Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(456, 'fa fa-align-right', 'fa-align-right', 'Text Editor Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00');
INSERT INTO `icons` (`id`, `class`, `name`, `category`, `d_create`, `d_update`) VALUES
(457, 'fa fa-bold', 'fa-bold', 'Text Editor Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(458, 'fa fa-chain', 'fa-chain (alias)', 'Text Editor Icons', '2017-05-19 14:12:23', '0000-00-00 00:00:00'),
(459, 'fa fa-chain-broken', 'fa-chain-broken', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(460, 'fa fa-clipboard', 'fa-clipboard', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(461, 'fa fa-columns', 'fa-columns', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(462, 'fa fa-copy', 'fa-copy (alias)', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(463, 'fa fa-cut', 'fa-cut (alias)', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(464, 'fa fa-dedent', 'fa-dedent (alias)', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(465, 'fa fa-file', 'fa-file', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(466, 'fa fa-file-o', 'fa-file-o', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(467, 'fa fa-file-text', 'fa-file-text', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(468, 'fa fa-file-text-o', 'fa-file-text-o', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(469, 'fa fa-files-o', 'fa-files-o', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(470, 'fa fa-floppy-o', 'fa-floppy-o', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(471, 'fa fa-font', 'fa-font', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(472, 'fa fa-indent', 'fa-indent', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(473, 'fa fa-italic', 'fa-italic', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(474, 'fa fa-link', 'fa-link', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(475, 'fa fa-list', 'fa-list', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(476, 'fa fa-list-alt', 'fa-list-alt', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(477, 'fa fa-list-ol', 'fa-list-ol', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(478, 'fa fa-list-ul', 'fa-list-ul', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(479, 'fa fa-outdent', 'fa-outdent', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(480, 'fa fa-paperclip', 'fa-paperclip', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(481, 'fa fa-paste', 'fa-paste (alias)', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(482, 'fa fa-repeat', 'fa-repeat', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(483, 'fa fa-rotate-left', 'fa-rotate-left (alias)', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(484, 'fa fa-rotate-right', 'fa-rotate-right (alias)', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(485, 'fa fa-save', 'fa-save (alias)', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(486, 'fa fa-scissors', 'fa-scissors', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(487, 'fa fa-strikethrough', 'fa-strikethrough', 'Text Editor Icons', '2017-05-19 14:12:24', '0000-00-00 00:00:00'),
(488, 'fa fa-table', 'fa-table', 'Text Editor Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(489, 'fa fa-text-height', 'fa-text-height', 'Text Editor Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(490, 'fa fa-text-width', 'fa-text-width', 'Text Editor Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(491, 'fa fa-th', 'fa-th', 'Text Editor Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(492, 'fa fa-th-large', 'fa-th-large', 'Text Editor Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(493, 'fa fa-th-list', 'fa-th-list', 'Text Editor Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(494, 'fa fa-underline', 'fa-underline', 'Text Editor Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(495, 'fa fa-undo', 'fa-undo', 'Text Editor Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(496, 'fa fa-unlink', 'fa-unlink (alias)', 'Text Editor Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(497, 'fa fa-angle-double-down', 'fa-angle-double-down', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(498, 'fa fa-angle-double-left', 'fa-angle-double-left', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(499, 'fa fa-angle-double-right', 'fa-angle-double-right', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(500, 'fa fa-angle-double-up', 'fa-angle-double-up', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(501, 'fa fa-angle-down', 'fa-angle-down', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(502, 'fa fa-angle-left', 'fa-angle-left', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(503, 'fa fa-angle-right', 'fa-angle-right', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(504, 'fa fa-angle-up', 'fa-angle-up', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(505, 'fa fa-arrow-circle-down', 'fa-arrow-circle-down', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(506, 'fa fa-arrow-circle-left', 'fa-arrow-circle-left', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(507, 'fa fa-arrow-circle-o-down', 'fa-arrow-circle-o-down', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(508, 'fa fa-arrow-circle-o-up', 'fa-arrow-circle-o-up', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(509, 'fa fa-arrow-circle-right', 'fa-arrow-circle-right', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(510, 'fa fa-arrow-circle-up', 'fa-arrow-circle-up', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(511, 'fa fa-arrow-down', 'fa-arrow-down', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(512, 'fa fa-arrow-left', 'fa-arrow-left', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(513, 'fa fa-arrow-right', 'fa-arrow-right', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(514, 'fa fa-arrow-up', 'fa-arrow-up', 'Directional Icons', '2017-05-19 14:12:25', '0000-00-00 00:00:00'),
(515, 'fa fa-arrows-alt', 'fa-arrows-alt', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(516, 'fa fa-caret-down', 'fa-caret-down', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(517, 'fa fa-caret-left', 'fa-caret-left', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(518, 'fa fa-caret-right', 'fa-caret-right', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(519, 'fa fa-caret-up', 'fa-caret-up', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(520, 'fa fa-chevron-circle-down', 'fa-chevron-circle-down', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(521, 'fa fa-chevron-circle-left', 'fa-chevron-circle-left', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(522, 'fa fa-chevron-circle-right', 'fa-chevron-circle-right', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(523, 'fa fa-chevron-circle-up', 'fa-chevron-circle-up', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(524, 'fa fa-chevron-down', 'fa-chevron-down', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(525, 'fa fa-chevron-left', 'fa-chevron-left', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(526, 'fa fa-chevron-right', 'fa-chevron-right', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(527, 'fa fa-chevron-up', 'fa-chevron-up', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(528, 'fa fa-hand-o-down', 'fa-hand-o-down', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(529, 'fa fa-hand-o-left', 'fa-hand-o-left', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(530, 'fa fa-hand-o-right', 'fa-hand-o-right', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(531, 'fa fa-hand-o-up', 'fa-hand-o-up', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(532, 'fa fa-long-arrow-down', 'fa-long-arrow-down', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(533, 'fa fa-long-arrow-left', 'fa-long-arrow-left', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(534, 'fa fa-long-arrow-right', 'fa-long-arrow-right', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(535, 'fa fa-long-arrow-up', 'fa-long-arrow-up', 'Directional Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(536, 'fa fa-backward', 'fa-backward', 'Video Player Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(537, 'fa fa-compress', 'fa-compress', 'Video Player Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(538, 'fa fa-eject', 'fa-eject', 'Video Player Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(539, 'fa fa-expand', 'fa-expand', 'Video Player Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(540, 'fa fa-fast-backward', 'fa-fast-backward', 'Video Player Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(541, 'fa fa-fast-forward', 'fa-fast-forward', 'Video Player Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(542, 'fa fa-forward', 'fa-forward', 'Video Player Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(543, 'fa fa-pause', 'fa-pause', 'Video Player Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(544, 'fa fa-play', 'fa-play', 'Video Player Icons', '2017-05-19 14:12:26', '0000-00-00 00:00:00'),
(545, 'fa fa-play-circle', 'fa-play-circle', 'Video Player Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(546, 'fa fa-play-circle-o', 'fa-play-circle-o', 'Video Player Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(547, 'fa fa-step-backward', 'fa-step-backward', 'Video Player Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(548, 'fa fa-step-forward', 'fa-step-forward', 'Video Player Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(549, 'fa fa-stop', 'fa-stop', 'Video Player Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(550, 'fa fa-youtube-play', 'fa-youtube-play', 'Video Player Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(551, 'fa fa-adn', 'fa-adn', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(552, 'fa fa-android', 'fa-android', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(553, 'fa fa-apple', 'fa-apple', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(554, 'fa fa-bitbucket', 'fa-bitbucket', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(555, 'fa fa-bitbucket-square', 'fa-bitbucket-square', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(556, 'fa fa-css3', 'fa-css3', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(557, 'fa fa-dribbble', 'fa-dribbble', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(558, 'fa fa-dropbox', 'fa-dropbox', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(559, 'fa fa-facebook', 'fa-facebook', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(560, 'fa fa-facebook-square', 'fa-facebook-square', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(561, 'fa fa-flickr', 'fa-flickr', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(562, 'fa fa-foursquare', 'fa-foursquare', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(563, 'fa fa-github', 'fa-github', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(564, 'fa fa-github-alt', 'fa-github-alt', 'Brand Icons', '2017-05-19 14:12:27', '0000-00-00 00:00:00'),
(565, 'fa fa-github-square', 'fa-github-square', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(566, 'fa fa-gittip', 'fa-gittip', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(567, 'fa fa-google-plus', 'fa-google-plus', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(568, 'fa fa-google-plus-square', 'fa-google-plus-square', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(569, 'fa fa-html5', 'fa-html5', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(570, 'fa fa-instagram', 'fa-instagram', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(571, 'fa fa-linkedin', 'fa-linkedin', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(572, 'fa fa-linkedin-square', 'fa-linkedin-square', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(573, 'fa fa-linux', 'fa-linux', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(574, 'fa fa-maxcdn', 'fa-maxcdn', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(575, 'fa fa-pinterest', 'fa-pinterest', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(576, 'fa fa-pinterest-square', 'fa-pinterest-square', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(577, 'fa fa-renren', 'fa-renren', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(578, 'fa fa-skype', 'fa-skype', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(579, 'fa fa-stack-overflow', 'fa-stack-overflow', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(580, 'fa fa-trello', 'fa-trello', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(581, 'fa fa-tumblr', 'fa-tumblr', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(582, 'fa fa-tumblr-square', 'fa-tumblr-square', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(583, 'fa fa-twitter', 'fa-twitter', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(584, 'fa fa-twitter-square', 'fa-twitter-square', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(585, 'fa fa-vk', 'fa-vk', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(586, 'fa fa-weibo', 'fa-weibo', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(587, 'fa fa-windows', 'fa-windows', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(588, 'fa fa-xing', 'fa-xing', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(589, 'fa fa-xing-square', 'fa-xing-square', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(590, 'fa fa-youtube', 'fa-youtube', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(591, 'fa fa-youtube-square', 'fa-youtube-square', 'Brand Icons', '2017-05-19 14:12:28', '0000-00-00 00:00:00'),
(592, 'fa fa-ambulance', 'fa-ambulance', 'Medical Icons', '2017-05-19 14:12:29', '0000-00-00 00:00:00'),
(593, 'fa fa-h-square', 'fa-h-square', 'Medical Icons', '2017-05-19 14:12:29', '0000-00-00 00:00:00'),
(594, 'fa fa-hospital-o', 'fa-hospital-o', 'Medical Icons', '2017-05-19 14:12:29', '0000-00-00 00:00:00'),
(595, 'fa fa-medkit', 'fa-medkit', 'Medical Icons', '2017-05-19 14:12:29', '0000-00-00 00:00:00'),
(596, 'fa fa-stethoscope', 'fa-stethoscope', 'Medical Icons', '2017-05-19 14:12:29', '0000-00-00 00:00:00'),
(597, 'fa fa-user-md', 'fa-user-md', 'Medical Icons', '2017-05-19 14:12:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `detail` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` int(11) NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `materiales`
--

CREATE TABLE IF NOT EXISTS `materiales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `referencia` varchar(150) NOT NULL,
  `costo_dolar` double NOT NULL,
  `costo_bolivar` double NOT NULL,
  `unidad_medida` int(11) NOT NULL,
  `modificado` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `unidad_medida` (`unidad_medida`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `materiales`
--

INSERT INTO `materiales` (`id`, `nombre`, `referencia`, `costo_dolar`, `costo_bolivar`, `unidad_medida`, `modificado`) VALUES
(9, 'material1', 'referencia1', 10, 130770.1, 9, '2017-08-08'),
(10, 'material2', 'referencia2', 11, 143847.11, 11, '2017-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `measurement_units`
--

CREATE TABLE IF NOT EXISTS `measurement_units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `symbol` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `measurement_units`
--

INSERT INTO `measurement_units` (`id`, `name`, `description`, `symbol`, `status`, `d_create`, `d_update`) VALUES
(8, 'Metro', 'Unidad de medida de longitud', 'm', 1, '2017-08-08 18:16:50', '0000-00-00 00:00:00'),
(9, 'Kilogramo', 'Unidad de medida de masa', 'kg', 1, '2017-08-08 18:16:50', '0000-00-00 00:00:00'),
(10, 'Litro', 'Unidad de medida de volumen', 'l', 1, '2017-08-08 18:24:28', '0000-00-00 00:00:00'),
(11, 'Pulgada', 'Unidad de medida de longitud', 'in', 1, '2017-08-08 18:24:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `action_id` int(11) NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `action_id` (`action_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `description`, `logo`, `route`, `action_id`, `d_create`, `d_update`) VALUES
(1, 'Usuarios', '<a ><i class="fa fa-user-o"></i> <span class="nav-label">Usuarios</span><span class="fa arrow"></span></a>', 'fa fa-user-o', '', 0, '2017-05-09 14:04:30', '0000-00-00 00:00:00'),
(7, 'Menús', '<a ><i class="fa fa-user-o"></i> <span class="nav-label">Menús</span><span class="fa arrow"></span></a>', 'fa fa-bars', '', 0, '2017-05-09 14:03:45', '0000-00-00 00:00:00'),
(10, 'Productos', '', 'fa fa-shopping-cart', 'productos', 19, '2017-08-14 21:27:13', '0000-00-00 00:00:00'),
(11, 'Tiendas', '', 'fa fa-shopping-cart', 'tiendas', 26, '2017-08-15 16:19:05', '0000-00-00 00:00:00'),
(12, 'Aplicaciones', '', 'fa fa-mobile', 'aplicaciones', 27, '2017-08-15 20:53:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `parameter_permit` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `action_id` (`action_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=102 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `user_id`, `action_id`, `parameter_permit`, `d_create`, `d_update`) VALUES
(1, 10, 5, '777', '2017-05-03 18:04:33', '0000-00-00 00:00:00'),
(10, 28, 3, '707', '2017-05-26 13:48:44', '0000-00-00 00:00:00'),
(11, 28, 5, '777', '2017-05-25 20:41:15', '0000-00-00 00:00:00'),
(12, 28, 7, '777', '2017-05-25 20:41:15', '0000-00-00 00:00:00'),
(13, 28, 15, '777', '2017-05-25 20:41:15', '0000-00-00 00:00:00'),
(14, 28, 16, '070', '2017-05-26 13:48:13', '0000-00-00 00:00:00'),
(15, 29, 1, '777', '2017-05-30 14:38:12', '0000-00-00 00:00:00'),
(16, 29, 2, '777', '2017-05-30 14:38:12', '0000-00-00 00:00:00'),
(17, 29, 3, '777', '2017-05-30 14:38:12', '0000-00-00 00:00:00'),
(18, 29, 4, '777', '2017-05-30 14:38:13', '0000-00-00 00:00:00'),
(19, 29, 5, '777', '2017-05-30 14:38:13', '0000-00-00 00:00:00'),
(20, 29, 7, '777', '2017-05-30 14:38:13', '0000-00-00 00:00:00'),
(21, 29, 8, '777', '2017-05-30 14:38:13', '0000-00-00 00:00:00'),
(22, 29, 9, '777', '2017-05-30 14:38:13', '0000-00-00 00:00:00'),
(23, 29, 10, '777', '2017-05-30 14:38:13', '0000-00-00 00:00:00'),
(24, 29, 11, '777', '2017-05-30 14:38:13', '0000-00-00 00:00:00'),
(25, 29, 12, '777', '2017-05-30 14:38:13', '0000-00-00 00:00:00'),
(26, 29, 15, '777', '2017-05-30 14:38:13', '0000-00-00 00:00:00'),
(27, 29, 16, '777', '2017-05-30 14:38:13', '0000-00-00 00:00:00'),
(28, 29, 17, '777', '2017-05-30 14:38:13', '0000-00-00 00:00:00'),
(29, 29, 19, '777', '2017-05-30 14:38:13', '0000-00-00 00:00:00'),
(30, 29, 23, '777', '2017-05-30 14:38:13', '0000-00-00 00:00:00'),
(31, 10, 1, '777', '2017-05-30 17:37:50', '0000-00-00 00:00:00'),
(32, 10, 2, '777', '2017-05-30 17:37:50', '0000-00-00 00:00:00'),
(33, 10, 3, '777', '2017-05-30 17:37:50', '0000-00-00 00:00:00'),
(34, 10, 4, '777', '2017-05-30 17:37:50', '0000-00-00 00:00:00'),
(35, 10, 7, '777', '2017-05-30 17:37:50', '0000-00-00 00:00:00'),
(36, 10, 8, '777', '2017-05-30 17:37:50', '0000-00-00 00:00:00'),
(37, 10, 9, '777', '2017-05-30 17:37:50', '0000-00-00 00:00:00'),
(38, 10, 10, '777', '2017-05-30 17:37:50', '0000-00-00 00:00:00'),
(39, 10, 11, '777', '2017-05-30 17:37:50', '0000-00-00 00:00:00'),
(40, 10, 12, '777', '2017-05-30 17:37:50', '0000-00-00 00:00:00'),
(41, 10, 15, '777', '2017-05-30 17:37:50', '0000-00-00 00:00:00'),
(42, 10, 16, '777', '2017-05-30 17:37:50', '0000-00-00 00:00:00'),
(43, 10, 17, '777', '2017-05-30 17:37:50', '0000-00-00 00:00:00'),
(44, 10, 19, '777', '2017-05-30 17:37:50', '0000-00-00 00:00:00'),
(45, 10, 23, '777', '2017-05-30 17:37:50', '0000-00-00 00:00:00'),
(46, 30, 1, '777', '2017-05-30 17:55:27', '0000-00-00 00:00:00'),
(47, 30, 2, '777', '2017-05-30 17:55:27', '0000-00-00 00:00:00'),
(48, 30, 3, '777', '2017-05-30 17:55:27', '0000-00-00 00:00:00'),
(49, 30, 4, '777', '2017-05-30 17:55:27', '0000-00-00 00:00:00'),
(50, 30, 5, '777', '2017-05-30 17:55:27', '0000-00-00 00:00:00'),
(51, 30, 7, '777', '2017-05-30 17:55:27', '0000-00-00 00:00:00'),
(52, 30, 8, '777', '2017-05-30 17:55:27', '0000-00-00 00:00:00'),
(53, 30, 9, '777', '2017-05-30 17:55:27', '0000-00-00 00:00:00'),
(54, 30, 10, '777', '2017-05-30 17:55:27', '0000-00-00 00:00:00'),
(55, 30, 11, '777', '2017-05-30 17:55:27', '0000-00-00 00:00:00'),
(56, 30, 12, '777', '2017-05-30 17:55:27', '0000-00-00 00:00:00'),
(57, 30, 15, '777', '2017-05-30 17:55:27', '0000-00-00 00:00:00'),
(58, 30, 16, '777', '2017-05-30 17:55:27', '0000-00-00 00:00:00'),
(59, 30, 17, '777', '2017-05-30 17:55:27', '0000-00-00 00:00:00'),
(60, 30, 19, '777', '2017-05-30 17:55:28', '0000-00-00 00:00:00'),
(61, 30, 23, '777', '2017-05-30 17:55:28', '0000-00-00 00:00:00'),
(62, 10, 24, '777', '2017-05-30 19:24:30', '0000-00-00 00:00:00'),
(63, 31, 1, '777', '2017-06-01 14:24:55', '0000-00-00 00:00:00'),
(64, 31, 2, '777', '2017-06-01 14:24:55', '0000-00-00 00:00:00'),
(65, 31, 3, '777', '2017-06-01 14:24:55', '0000-00-00 00:00:00'),
(66, 31, 4, '777', '2017-06-01 14:24:55', '0000-00-00 00:00:00'),
(67, 31, 5, '777', '2017-06-01 14:24:55', '0000-00-00 00:00:00'),
(68, 31, 7, '777', '2017-06-01 14:24:55', '0000-00-00 00:00:00'),
(69, 31, 8, '777', '2017-06-01 14:24:55', '0000-00-00 00:00:00'),
(70, 31, 9, '777', '2017-06-01 14:24:55', '0000-00-00 00:00:00'),
(71, 31, 10, '777', '2017-06-01 14:24:55', '0000-00-00 00:00:00'),
(72, 31, 11, '777', '2017-06-01 14:24:55', '0000-00-00 00:00:00'),
(73, 31, 12, '777', '2017-06-01 14:24:55', '0000-00-00 00:00:00'),
(74, 31, 15, '777', '2017-06-01 14:24:55', '0000-00-00 00:00:00'),
(75, 31, 16, '777', '2017-06-01 14:24:55', '0000-00-00 00:00:00'),
(76, 31, 17, '777', '2017-06-01 14:24:55', '0000-00-00 00:00:00'),
(77, 31, 19, '777', '2017-06-01 14:24:55', '0000-00-00 00:00:00'),
(78, 31, 23, '777', '2017-06-01 14:24:55', '0000-00-00 00:00:00'),
(79, 31, 24, '777', '2017-06-01 14:24:55', '0000-00-00 00:00:00'),
(80, 30, 24, '777', '2017-06-01 14:29:58', '0000-00-00 00:00:00'),
(81, 29, 24, '777', '2017-06-01 14:30:15', '0000-00-00 00:00:00'),
(82, 32, 1, '777', '2017-06-01 14:41:36', '0000-00-00 00:00:00'),
(83, 32, 2, '777', '2017-06-01 14:41:36', '0000-00-00 00:00:00'),
(84, 32, 3, '777', '2017-06-01 14:41:36', '0000-00-00 00:00:00'),
(85, 32, 4, '777', '2017-06-01 14:41:36', '0000-00-00 00:00:00'),
(86, 32, 5, '777', '2017-06-01 14:41:36', '0000-00-00 00:00:00'),
(87, 32, 7, '777', '2017-06-01 14:41:36', '0000-00-00 00:00:00'),
(88, 32, 8, '777', '2017-06-01 14:41:36', '0000-00-00 00:00:00'),
(89, 32, 9, '777', '2017-06-01 14:41:36', '0000-00-00 00:00:00'),
(90, 32, 10, '777', '2017-06-01 14:41:36', '0000-00-00 00:00:00'),
(91, 32, 11, '777', '2017-06-01 14:41:36', '0000-00-00 00:00:00'),
(92, 32, 12, '777', '2017-06-01 14:41:36', '0000-00-00 00:00:00'),
(93, 32, 15, '777', '2017-06-01 14:41:36', '0000-00-00 00:00:00'),
(94, 32, 16, '777', '2017-06-01 14:41:36', '0000-00-00 00:00:00'),
(95, 32, 17, '777', '2017-06-01 14:41:36', '0000-00-00 00:00:00'),
(96, 32, 19, '777', '2017-06-01 14:41:36', '0000-00-00 00:00:00'),
(97, 32, 23, '777', '2017-06-01 14:41:36', '0000-00-00 00:00:00'),
(98, 32, 24, '777', '2017-06-01 14:41:36', '0000-00-00 00:00:00'),
(99, 10, 25, '777', '2017-08-04 18:36:53', '0000-00-00 00:00:00'),
(100, 10, 26, '777', '2017-08-15 16:20:32', '0000-00-00 00:00:00'),
(101, 10, 27, '777', '2017-08-15 20:53:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `referencia` varchar(150) NOT NULL,
  `costo_dolar` double NOT NULL,
  `costo_bolivar` double NOT NULL,
  `unidad_medida` int(11) NOT NULL,
  `c_compra` int(11) DEFAULT NULL,
  `c_vende` int(11) DEFAULT NULL,
  `c_fabrica` int(11) DEFAULT NULL,
  `modificado` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `unidad_medida` (`unidad_medida`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `referencia`, `costo_dolar`, `costo_bolivar`, `unidad_medida`, `c_compra`, `c_vende`, `c_fabrica`, `modificado`) VALUES
(4, 'producto1', 'producto1', 10, 162800.5, 8, 1, 1, 1, '2017-08-21'),
(5, 'producto2', 'producto2', 10, 162800.5, 9, 1, 1, 0, '2017-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `productos_tienda`
--

CREATE TABLE IF NOT EXISTS `productos_tienda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) NOT NULL,
  `tienda_id` int(11) NOT NULL,
  `referencia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `precio` double NOT NULL,
  `cantidad` int(11) NOT NULL,
  `d_create` datetime NOT NULL,
  `d_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `productos_tienda`
--

INSERT INTO `productos_tienda` (`id`, `producto_id`, `tienda_id`, `referencia`, `precio`, `cantidad`, `d_create`, `d_update`) VALUES
(15, 5, 2, 'fsdfsf', 162800.5, 1, '2017-08-21 11:17:05', '2017-08-21 15:17:05'),
(16, 5, 4, 'fsdfsf', 162800.5, 1, '2017-08-21 11:17:05', '2017-08-21 15:17:05'),
(17, 4, 2, '3r3wr3r3', 162800.5, 1, '2017-08-21 11:18:57', '2017-08-21 15:18:57'),
(18, 4, 3, '2r2wr2r2', 162800.5, 1, '2017-08-21 11:18:57', '2017-08-21 15:18:57'),
(19, 4, 4, 'rerty45734', 162800.5, 3, '2017-08-21 11:18:57', '2017-08-21 15:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `name`, `d_create`, `d_update`) VALUES
(1, 'ADMINISTRADOR', '2017-05-03 20:38:17', '0000-00-00 00:00:00'),
(2, 'FRANQUICIA', '2017-05-03 19:03:27', '0000-00-00 00:00:00'),
(3, 'CLIENTES', '2017-05-04 15:11:07', '0000-00-00 00:00:00'),
(20, 'PRUEBA', '2017-05-12 18:27:42', '0000-00-00 00:00:00'),
(21, 'PRUEBA2', '2017-05-12 16:09:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `profile_actions`
--

CREATE TABLE IF NOT EXISTS `profile_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `parameter_permit` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `action_id` (`action_id`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=68 ;

--
-- Dumping data for table `profile_actions`
--

INSERT INTO `profile_actions` (`id`, `profile_id`, `action_id`, `parameter_permit`, `d_create`, `d_update`) VALUES
(5, 1, 6, '777', '2017-05-04 15:44:22', '0000-00-00 00:00:00'),
(6, 2, 7, '777', '2017-05-04 22:09:38', '0000-00-00 00:00:00'),
(8, 2, 6, '777', '2017-05-05 18:05:07', '0000-00-00 00:00:00'),
(15, 2, 3, '777', '2017-05-09 21:04:12', '0000-00-00 00:00:00'),
(48, 20, 6, '777', '2017-05-12 15:55:17', '0000-00-00 00:00:00'),
(49, 20, 1, '777', '2017-05-12 15:55:17', '0000-00-00 00:00:00'),
(50, 20, 2, '777', '2017-05-12 15:55:18', '0000-00-00 00:00:00'),
(51, 20, 3, '777', '2017-05-12 15:55:18', '0000-00-00 00:00:00'),
(52, 20, 4, '777', '2017-05-12 15:55:18', '0000-00-00 00:00:00'),
(53, 21, 6, '777', '2017-05-12 16:09:10', '0000-00-00 00:00:00'),
(56, 21, 11, '000', '2017-05-26 13:22:23', '0000-00-00 00:00:00'),
(60, 20, 5, '777', '2017-05-12 18:27:42', '0000-00-00 00:00:00'),
(64, 2, 17, '777', '2017-05-23 14:00:18', '0000-00-00 00:00:00'),
(65, 21, 17, '777', '2017-05-31 14:23:50', '0000-00-00 00:00:00'),
(66, 21, 12, '777', '2017-05-25 20:48:29', '0000-00-00 00:00:00'),
(67, 21, 19, '707', '2017-05-25 20:48:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `icon` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `price` double NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `icon`, `status`, `price`, `d_create`, `d_update`) VALUES
(1, 'Cambio de Aceite', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit, leo vitae interdum...', '45510958_l-02.png', 1, 11, '2017-06-07 21:49:08', '0000-00-00 00:00:00'),
(2, 'Lavado Ecológico', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit, leo vitae interdum...', '45510958_l-07.png', 1, 20, '2017-06-07 21:49:20', '0000-00-00 00:00:00'),
(3, 'Cambio de Filtro de Combustible', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit, leo vitae interdum...', '45510958_l-01.png', 1, 50, '2017-06-07 21:49:32', '0000-00-00 00:00:00'),
(4, 'Limpieza de Tapicería', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit, leo vitae interdum...', '45510958_l-08.png', 1, 0, '2017-06-07 21:49:44', '0000-00-00 00:00:00'),
(5, 'Cambio de Filtro de Aire Encerado', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit, leo vitae interdum...', '45510958_l-03.png', 1, 0, '2017-06-07 21:49:52', '0000-00-00 00:00:00'),
(6, 'Pulido de Carroceria', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur hendrerit, leo vitae interdum...', '45510958_l-06.png', 1, 0, '2017-06-07 21:50:02', '0000-00-00 00:00:00'),
(7, 'Servicio de Prueba', 'Servicio de Prueba', 'permisologia.png', 1, 20, '2017-06-08 00:29:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `parameter_permit` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `labels` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `parameter_permit`, `labels`, `d_create`, `d_update`) VALUES
(1, 'ABIERTO', '', 'label', '2017-05-23 19:43:05', '0000-00-00 00:00:00'),
(2, 'PRESUPUESTADO', '', 'label label-info', '2017-05-23 19:43:43', '0000-00-00 00:00:00'),
(3, 'APROBADO', '', 'label label-primary', '2017-05-23 19:46:51', '0000-00-00 00:00:00'),
(4, 'EN CURSO', '', 'label label-warning', '2017-05-23 19:45:02', '0000-00-00 00:00:00'),
(5, 'FINALIZADO', '', 'label label-danger', '2017-05-23 19:46:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `submenus`
--

CREATE TABLE IF NOT EXISTS `submenus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`),
  KEY `action_id` (`action_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `submenus`
--

INSERT INTO `submenus` (`id`, `name`, `description`, `logo`, `route`, `menu_id`, `action_id`, `d_create`, `d_update`) VALUES
(1, 'Perfiles', '<li><a href="profile">Perfiles</a></li>', '', 'profile', 1, 1, '2017-05-05 20:59:47', '0000-00-00 00:00:00'),
(2, 'Usuarios', '<li><a href="users">Usuarios</a></li>', '', 'users', 1, 2, '2017-05-05 20:59:55', '0000-00-00 00:00:00'),
(5, 'Menús', ' <li><a href="menus">Menús</a></li>', '', 'menus', 7, 8, '2017-05-05 21:00:18', '0000-00-00 00:00:00'),
(6, 'Submenús', ' <li><a href="submenus">Submenús</a></li>', '', 'submenus', 7, 9, '2017-05-18 17:19:53', '0000-00-00 00:00:00'),
(7, 'Acciones', ' <li><a href="acciones">Acciones</a></li>', '', 'acciones', 7, 10, '2017-05-23 18:01:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tienda`
--

CREATE TABLE IF NOT EXISTS `tienda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `url` varchar(150) NOT NULL,
  `tokens` varchar(200) NOT NULL,
  `token_cliente` varchar(200) NOT NULL,
  `secret_api` varchar(200) NOT NULL,
  `url_callback` varchar(200) NOT NULL,
  `cliente_api_id` varchar(200) NOT NULL,
  `app_id` varchar(200) NOT NULL,
  `aplicacion_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `aplicacion_id` (`aplicacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tienda`
--

INSERT INTO `tienda` (`id`, `nombre`, `descripcion`, `url`, `tokens`, `token_cliente`, `secret_api`, `url_callback`, `cliente_api_id`, `app_id`, `aplicacion_id`, `status`, `d_create`, `d_update`) VALUES
(2, 'tienda1', 'tienda de prueba 1', 'https://www.tienda1.com', 'vdfhfjfgft', 'hgeftre', 'htrgetu45er', 'http://www.tienda1.com', 'jrhtrwywer6y455gyeryw', 'gfesrfwafsgqewetrwet', 4, 1, '2017-08-17 18:18:03', '0000-00-00 00:00:00'),
(3, 'tienda2', 'tienda de prueba 2', 'https://www.tienda2.com', 'vdfhfjfgft', 'hgeftre', 'htrgetu45er', 'http://www.tienda2.com', 'jrhtrwywer6y455gyerywx', 'vrehyeufghefrthe', 5, 1, '2017-08-17 18:18:40', '0000-00-00 00:00:00'),
(4, 'tienda3', 'tienda de prueba 3', 'https://www.tienda3.com', 'vdfhfjfgft', 'hgeftre', 'htrgetu45er', 'http://www.tienda3.com', 'jrhtrwywer6y455gyerywx', 'vrehyeufghefrthe', 6, 1, '2017-08-17 18:19:15', '0000-00-00 00:00:00'),
(5, 'tienda4', 'tienda de prueba 4', 'https://www.tienda4.com', 'vdfhfjfgft', 'gfsdgdf', 'htrgetu45er', 'http://www.tienda4.com', 'jrhtrwywer6y455gyerywx', 'vrehyeufghefrthe', 4, 1, '2017-08-21 14:18:12', '2017-08-21 14:18:12'),
(6, 'tienda5', 'tienda de prueba 4', 'https://www.tienda5.com', 'bdfh we', 'hgeftre', 'ghgfdh', 'http://www.tienda5.com', 'jrhtrwywer6y455gyerywx', 'gfesrfwafsgqewetrwet', 6, 1, '2017-08-21 14:17:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `profile_id` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `lastname`, `profile_id`, `admin`, `status`, `d_create`, `d_update`) VALUES
(10, 'admin@gmail.com', 'pbkdf2_sha256$12000$a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin', 'admin', 1, 1, 1, '2017-08-15 20:53:57', '2017-08-15 20:53:57'),
(11, 'jsolorzano', 'pbkdf2_sha256$12000$a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'José', 'Solorzano', 2, 0, 1, '2017-05-19 18:02:20', '2017-05-18 17:36:16'),
(12, 'fmedina', 'pbkdf2_sha256$12000$a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Francis', 'Medina', 2, 0, 1, '2017-05-09 20:43:23', '2017-05-04 16:49:11'),
(13, 'oorozco', 'pbkdf2_sha256$12000$8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'omar', 'orozco', 1, 0, 1, '2017-05-05 18:58:08', '2017-05-05 18:58:08'),
(14, 'luis@gmail.com', 'pbkdf2_sha256$12000$a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Luis', 'Ovalles', 1, 0, 1, '2017-05-15 18:18:20', '2017-05-15 18:18:20'),
(25, 'prueba@gmail.com', 'pbkdf2_sha256$12000$a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'prueba', 'prueba', 20, 0, 1, '2017-05-16 18:24:56', '2017-05-16 18:24:56'),
(28, 'prueba2@gmail.com', 'pbkdf2_sha256$12000$a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'prueba2', 'prueba2', 21, 0, 1, '2017-05-26 13:48:44', '2017-05-26 13:48:44'),
(29, 'admin2@gmail.com', 'pbkdf2_sha256$12000$a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin2', 'admin2', 1, 1, 1, '2017-06-01 14:30:15', '2017-06-01 14:30:15'),
(30, 'admin3@gmail.com', 'pbkdf2_sha256$12000$a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin3', 'admin3', 1, 1, 1, '2017-06-01 14:29:58', '2017-06-01 14:29:58'),
(31, 'admin4@gmail.com', 'pbkdf2_sha256$12000$a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin4', 'admin4', 1, 1, 1, '2017-06-01 14:29:15', '2017-06-01 14:29:15'),
(32, 'admin5@gmail.com', 'pbkdf2_sha256$12000$a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'admin5', 'admin5', 1, 1, 1, '2017-06-01 14:41:35', '2017-06-01 14:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `users_franchises`
--

CREATE TABLE IF NOT EXISTS `users_franchises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `franchise_id` int(11) NOT NULL,
  `d_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `franchise_id` (`franchise_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `users_franchises`
--

INSERT INTO `users_franchises` (`id`, `user_id`, `franchise_id`, `d_create`, `d_update`) VALUES
(1, 11, 1, '2017-05-03 23:24:55', '0000-00-00 00:00:00'),
(3, 12, 2, '2017-05-10 01:02:45', '0000-00-00 00:00:00'),
(7, 25, 1, '2017-05-16 21:47:22', '0000-00-00 00:00:00'),
(9, 25, 3, '2017-05-16 22:23:06', '0000-00-00 00:00:00'),
(18, 28, 1, '2017-05-16 23:01:34', '0000-00-00 00:00:00'),
(19, 28, 2, '2017-05-16 23:01:34', '0000-00-00 00:00:00'),
(20, 29, 1, '2017-05-30 18:38:12', '0000-00-00 00:00:00'),
(21, 30, 1, '2017-05-30 21:55:27', '0000-00-00 00:00:00'),
(22, 31, 1, '2017-06-01 18:24:55', '0000-00-00 00:00:00'),
(23, 32, 1, '2017-06-01 18:41:35', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `materiales`
--
ALTER TABLE `materiales`
  ADD CONSTRAINT `materiales_ibfk_1` FOREIGN KEY (`unidad_medida`) REFERENCES `measurement_units` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `permissions_ibfk_2` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profile_actions`
--
ALTER TABLE `profile_actions`
  ADD CONSTRAINT `profile_actions_ibfk_1` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `profile_actions_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `submenus`
--
ALTER TABLE `submenus`
  ADD CONSTRAINT `submenus_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `submenus_ibfk_2` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tienda`
--
ALTER TABLE `tienda`
  ADD CONSTRAINT `tienda_ibfk_1` FOREIGN KEY (`aplicacion_id`) REFERENCES `aplicacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
