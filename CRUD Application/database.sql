/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.25-MariaDB : Database - blog_management_system
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`blog_management_system` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `blog_management_system`;

/*Table structure for table `post` */

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `description` longtext DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`post_id`),
  KEY `added_by` (`added_by`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

/*Data for the table `post` */

insert  into `post`(`post_id`,`title`,`description`,`added_by`,`added_on`) values 
(11,'Hello','HII',1,'2024-04-16 06:31:00'),
(12,'Blog Managment System ','Admin Panel Updated Only',1,'2024-04-16 06:32:30'),
(14,'myyy','okkkkkkkkkkkkkkkkkkkk',1,'2024-04-18 23:45:39'),
(15,'My name','my name is Talha',1,'2024-04-18 23:46:54'),
(16,'title99','thisssssssssssssssssssssssssssssmmmmmmmmmmmmmmmiiii',1,'2024-04-19 08:08:13');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role_type_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_role_type_id` (`user_role_type_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_role_type_id`) REFERENCES `user_role_type` (`user_role_type_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`user_id`,`user_role_type_id`,`first_name`,`middle_name`,`last_name`,`email`,`password`,`phone_number`) values 
(1,1,'John',NULL,'Ramey','john_ramey@gmail.com','538cd87356c73fcec3f20a5916b0b00ef61a7f6b','0300-1234567'),
(2,2,'Petter',NULL,'Wilson','petter_wilson@gmail.com','538cd87356c73fcec3f20a5916b0b00ef61a7f6b','0300-1234568'),
(3,3,'Donald',NULL,'Jacob','donald_jacob@gmail.com','538cd87356c73fcec3f20a5916b0b00ef61a7f6b','0300-1234569');

/*Table structure for table `user_role_type` */

DROP TABLE IF EXISTS `user_role_type`;

CREATE TABLE `user_role_type` (
  `user_role_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role_type` varchar(200) NOT NULL,
  PRIMARY KEY (`user_role_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_role_type` */

insert  into `user_role_type`(`user_role_type_id`,`user_role_type`) values 
(1,'Admin'),
(2,'Editor'),
(3,'User');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
