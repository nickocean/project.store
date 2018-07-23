-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: osmachko_db
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` longtext CHARACTER SET latin1 NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  KEY `comment_product_id_idx` (`product_id`),
  CONSTRAINT `comment_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `comment_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'Awesome cat!','2018-07-17 12:21:42',NULL,1,3),(2,'I fell in love with this guy)))','2018-07-17 12:22:52',NULL,6,1),(3,'Is it save to buy it if I have a dog?','2018-07-17 12:27:30',NULL,4,2),(4,'I don\'t understand why people love those cats...','2018-07-17 12:27:30',NULL,2,6),(5,'Why is it so expensive???','2018-07-17 12:27:30',NULL,3,4),(6,'My son dreams about japanese cat, i\'ll buy one soon','2018-07-17 12:27:31',NULL,5,5);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `order_user_id_idx` (`user_id`),
  CONSTRAINT `order_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (6,1,10,'2018-07-20 14:05:47',NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` mediumtext CHARACTER SET latin1 NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Barsik','Siamese cats crave attention and affection from their humans and like to stay close by particularly one family member. They are intelligent and inquisitive cats that have such striking voices and body movements that they are referred to as the most talkative cat breed.\n\nGreat with children and other pets, Siamese cats can be demanding and leery of strangers. Many people have said that their Siamese cats greet strangers at the door and perform a sort of approval process before the visitors enter the home.\n\nThis is an active cat who needs stimulation or lots of toys to keep occupied. Siamese cats are people-oriented and do not like being left alone for extended periods of time. If you work long hours, consider getting 2 Siamese cats so they can entertain each other when you’re gone. Rest assured they will fill you in on the day’s events when you arrive home.',500,'2018-07-17 12:02:47','2018-07-17 16:20:38','/images/A-Siamese-cat.jpg'),(2,'Oscar',' The Cheshire Cat was undoubtedly a British Shorthair. These smiling cats enjoy attention, are normally quiet, but occasionally have bursts of crazed activity before changing back into your affectionate, dignified friend. They get along with children and cat-friendly dogs.\n\nBritish Shorthairs are calm and undemanding. Males are big, easy lugs with a happy-go-lucky nature but a natural air of command. Females are more serious. Both want only to be with their people, not necessarily in a lap or being carried around, but next to them or in the same room with them. When you’re not home, they are satisfied to entertain themselves until you return. ',700,'2018-07-17 12:06:27','2018-07-17 16:23:36','/images/IMG_4551-600x400.jpg'),(3,'Darwin','The dignified and docile Persian is known for being quiet and sweet. She is an ornament to any home where she can enjoy sitting in a lap—surely her rightful place—being petted by those who are discerning enough to recognize her superior qualities, and playing house with kind children who will gently comb her hair, wheel her around in a baby buggy, then serve her tea at their parties. Persians are affectionate but discriminating. They reserve their attention for family members and those few guests whom they feel they can trust',300,'2018-07-17 12:10:14','2018-07-17 16:23:36','/images/SUP1_092-600x400.jpg'),(4,'Matthew','Sphynx cats allow us to appreciate fascinating feline morphology without all that fur getting in the way. I knew I liked the unique appearance of the Sphynx before getting one, but I didn’t know I’d be so completely captivated by my cats’ big bat ears, runway model cheekbones and delightful skin folds. I love how Fly’s legs look like she’s wearing sagging pantyhose, and how when Skinny Mini quivers her tail it sends a ripple of wrinkles up her back. I can’t get enough of stroking their soft, warm skin and kissing their adorable pot bellies. Sphynxes often don’t have whiskers or eyelashes, which draws even more attention to their expressive, almond-shaped eyes and chubby whisker pads.',1000,'2018-07-17 12:13:39','2018-07-17 16:23:36','/images/Indigosfinx-009-600x400.jpg'),(5,'Lily',' The Japanese Bobtail is active and intelligent. It’s not unusual to find him splashing his paw in water, carrying toys around, or playing fetch. He is highly curious and loves to explore.\n\nJapanese Bobtails are talkative, communicating with a wide range of chirps and meows. Their voices are described as almost songlike. These are outgoing cats who get along well with children and other pets, including dogs, and adjust to travel with ease. They love people and are often seen riding on a shoulder so they can supervise everything going on.\n\nThe Japanese Bobtail is highly intelligent. Challenge his brain by teaching him tricks and providing him with puzzle toys that will reward him with kibble or treats when he learns to manipulate them.\n\nAlways choose a kitten from a breeder who raises litters in her home and handles them from an early age. Meet at least one and ideally both of the parents to ensure that they have nice temperaments. ',400,'2018-07-17 12:16:29','2018-07-17 16:23:36','/images/unnamed.jpg'),(6,'Monica','The Exotic has a sweet, gentle nature and blends easily into most households as they become comfortable in their new home. They are creatures of habit and prefer a calm atmosphere and gentle handling. They are happy to be combed and petted by children but are unlikely to join in boisterous games with them. They have quiet, musical voices but communicate mainly with their large expressive eyes. They like the security of the ground and are unlikely to be found leaping to the top of bookcases to explore the high ground. They eagerly play with a toy or a teaser but are equally happy to lie in a favorite spot. The Exotic cat will not demand your undivided attention but will relish it when you are ready to lavish some time on it. These are gentle cats that are comfortable in their own homes whether you are there or not but are happy to see you when you return.',1500,'2018-07-17 12:19:39','2018-07-17 16:23:36','/images/201.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_orders`
--

DROP TABLE IF EXISTS `products_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `product_count` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id_idx` (`product_id`),
  KEY `order_id_idx` (`order_id`),
  CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_orders`
--

LOCK TABLES `products_orders` WRITE;
/*!40000 ALTER TABLE `products_orders` DISABLE KEYS */;
INSERT INTO `products_orders` VALUES (11,'2018-07-20 14:05:47',NULL,2,1,6),(12,'2018-07-20 14:05:47',NULL,3,6,6),(13,'2018-07-20 14:05:47',NULL,1,4,6);
/*!40000 ALTER TABLE `products_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'nickocean','nickocean@gmail.com','1234','2018-07-17 11:45:11',NULL),(2,'vasya','vasiliy@mail.ru','1234','2018-07-17 11:45:11',NULL),(3,'lyoha','aleksey@myspace.com','1234','2018-07-17 11:45:11',NULL),(4,'fiona','girl@gmail.com','1234','2018-07-17 11:46:30',NULL),(5,'king','king@gmail.com','1234','2018-07-17 11:46:30',NULL),(6,'queen','queen@gmail.com','1234','2018-07-17 11:46:30',NULL),(7,'Eugene','eugene@gmail.com','1234','2018-07-17 11:46:30',NULL),(8,'fontain','fontain@gmail.com','1234','2018-07-17 11:47:22',NULL),(9,'khalib','khalib@gmail.com','1234','2018-07-17 11:47:22',NULL),(10,'tanya yakimchuk','tanya@gmail.com','1234','2018-07-19 11:17:24','2018-07-19 11:19:51');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-20 17:03:28
