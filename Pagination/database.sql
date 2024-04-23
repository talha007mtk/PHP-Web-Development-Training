/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.25-MariaDB : Database - assign
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`assign` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `assign`;

/*Table structure for table `departments` */

DROP TABLE IF EXISTS `departments`;

CREATE TABLE `departments` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `departments` */

insert  into `departments`(`dept_id`,`dept_name`) values 
(1,'IT'),
(2,'HR'),
(3,'Admin');

/*Table structure for table `employees` */

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `city` varchar(30) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `dept_id` int(11) NOT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `fk_department` (`dept_id`),
  CONSTRAINT `fk_department` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `employees` */

insert  into `employees`(`emp_id`,`emp_name`,`position`,`salary`,`city`,`phone_number`,`dept_id`) values 
(1,'Talha','Manager',60000.00,'hyd','0315-0827517',1),
(2,'Qasim','Employee',40000.00,'hyd','0320-0827517',1),
(3,'Khaleeque','Manager',50000.00,'digri','0310-0827909',2),
(4,'Ahsan','Employee',30000.00,'jamshoro','0333-0827588',2),
(5,'Moiz','Employee',40000.00,'karachi','0320-0827590',1),
(6,'Mubashir','Manager',70000.00,'karachi','0305-0827599',3),
(7,'Hassan','Employee',40000.00,'hyd','0315-0827599',3),
(8,'Zain','Employee',40000.00,'jamshor','0335-0827909',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
