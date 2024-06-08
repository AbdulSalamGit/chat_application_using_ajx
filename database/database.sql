/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.32-MariaDB : Database - chat_application
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`chat_application` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `chat_application`;

/*Table structure for table `chat` */

DROP TABLE IF EXISTS `chat`;

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL AUTO_INCREMENT,
  `chat_message` longtext NOT NULL,
  `sent_by` int(11) NOT NULL,
  `sent_on` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`chat_id`),
  KEY `sent_by` (`sent_by`),
  CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`sent_by`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `chat` */

insert  into `chat`(`chat_id`,`chat_message`,`sent_by`,`sent_on`) values 
(1,'Hi',3,'1713507960'),
(2,'Hello',3,'1713512919'),
(3,'I am Fine',2,'1713513026'),
(4,'Hi All',3,'1713513279'),
(5,'Today is Friday',2,'1713513310'),
(6,'I am Donald',3,'1713513621');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_online` tinyint(1) NOT NULL DEFAULT 0,
  `last_login` varchar(300) DEFAULT NULL,
  `profile_image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`user_id`,`first_name`,`last_name`,`email`,`password`,`is_online`,`last_login`,`profile_image`) values 
(1,'John','Ramey','john_ramey@gmail.com','538cd87356c73fcec3f20a5916b0b00ef61a7f6b',0,'1713512848','john_ramey.png'),
(2,'Petter','Wilson','petter_wilson@gmail.com','538cd87356c73fcec3f20a5916b0b00ef61a7f6b',1,'1713510073','petter_wilson.png'),
(3,'Donald','Jacob','donald_jacob@gmail.com','538cd87356c73fcec3f20a5916b0b00ef61a7f6b',1,'1713510073','donald_jacob.jpg'),
(4,'Sherry','Santos','sherry_santos@gmail.com','538cd87356c73fcec3f20a5916b0b00ef61a7f6b',0,'1713510299','sherry_santos.png');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
