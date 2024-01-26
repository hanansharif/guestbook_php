# ************************************************************
# Sequel Ace SQL dump
# Version 20062
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: localhost (MySQL 8.3.0)
# Database: bzu
# Generation Time: 2024-01-26 4:01:35 PM +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cmnts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cmnts`;

CREATE TABLE `cmnts` (
  `cmnt_id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `cmnt_body` varchar(1000) DEFAULT NULL,
  `cmnt_date` date DEFAULT NULL,
  PRIMARY KEY (`cmnt_id`),
  KEY `user_email` (`user_email`),
  CONSTRAINT `cmnts_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `cmnts` WRITE;
/*!40000 ALTER TABLE `cmnts` DISABLE KEYS */;

INSERT INTO `cmnts` (`cmnt_id`, `user_email`, `user_name`, `cmnt_body`, `cmnt_date`)
VALUES
	(1,'hanan@user.com','hanan','updated','2024-01-13'),
	(6,'hanan@user.com','hanan','no more a new comment','0234-07-08'),
	(7,'test@admin.com','hn','hanan','8989-09-09');

/*!40000 ALTER TABLE `cmnts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_email` varchar(255) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_email`, `user_name`, `user_password`)
VALUES
	('hanan@user.com','hanan','hanan'),
	('test@admin.com','hn','test');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
