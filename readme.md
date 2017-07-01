# App CLADESYS

## Participantes
* https://github.com/juankito
* https://github.com/wilsongthb

## Frameworks
* Laravel 5.4
* Angular 1.6.4

## Recomendamos
* XAMPP
* php 7.14
* MySQL 5.7.18
* node 8.*


## instalacion
~~~
git clone https://github.com/wilsongthb/cladesysLyA.git
cd cladesysLyA1
composer install
cd public/
bower install
~~~

## Configuracion de la base de datos
~~~
-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.18-0ubuntu0.16.04.1 - (Ubuntu)
-- SO del servidor:              Linux
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para homestead
CREATE DATABASE IF NOT EXISTS `homestead` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `homestead`;
~~~


## Ejecutar para crear base de datos
~~~
php artisan migrate
~~~