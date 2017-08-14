# APP CLADESYS

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
* bower


## instalacion
~~~sh
git clone https://github.com/wilsongthb/cladesysLyA.git
cd cladesysLyA1
composer install
cd public/
bower install
~~~

## Configuracion de la base de datos
~~~sql
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


-- Volcando estructura de base de datos para cladesys_db
CREATE DATABASE IF NOT EXISTS `cladesys_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `cladesys_db`;
~~~


## Ejecutar para crear base de datos
~~~sh
php artisan migrate
php artisan db:seed
~~~

## Si usas apache2 debes de configurar el archivo /public/.htaccess
~~~sh
RewriteBase "/wilson/cladesysLyA/public/" # la ruta de la carpeta en tu servidor
~~~

## Acceso de desarrollo
~~~
email: root@localhost
pass: root
~~~

# NOTA
* tienes que aprender a manejar mejor los promises

# NUEVAS
Voy a usar materialize para ofrecer una vista mas moderna