-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: test1
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

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
-- Table structure for table `wp_posts`
--

DROP TABLE IF EXISTS `wp_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`(191)),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_posts`
--

LOCK TABLES `wp_posts` WRITE;
/*!40000 ALTER TABLE `wp_posts` DISABLE KEYS */;
INSERT INTO `wp_posts` VALUES (1,1,'2018-02-20 14:38:24','2018-02-20 14:38:24','Welcome to WordPress. This is your first post. Edit or delete it, then start writing!','Hello world!','','publish','open','open','','hello-world','','','2018-02-20 14:38:24','2018-02-20 14:38:24','',0,'http://test1.local/?p=1',0,'post','',1),(2,1,'2018-02-20 14:38:24','2018-02-20 14:38:24','This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\n\n<blockquote>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin\' caught in the rain.)</blockquote>\n\n...or something like this:\n\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\n\nAs a new WordPress user, you should go to <a href=\"http://test1.local/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!','Sample Page','','publish','closed','open','','sample-page','','','2018-02-20 14:38:24','2018-02-20 14:38:24','',0,'http://test1.local/?page_id=2',0,'page','',0),(3,1,'2018-02-20 14:38:58','0000-00-00 00:00:00','','Auto Draft','','auto-draft','open','open','','','','','2018-02-20 14:38:58','0000-00-00 00:00:00','',0,'http://test1.local/?p=3',0,'post','',0),(5,1,'2018-02-20 22:21:46','2018-02-20 22:21:46','<h2>Home page content</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto aut autem consequuntur dignissimos ea est id ipsam ipsum laudantium nemo possimus provident quasi quod rem rerum, saepe, suscipit totam vitae.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto aut autem consequuntur dignissimos ea est id ipsam ipsum laudantium nemo possimus provident quasi quod rem rerum, saepe, suscipit totam vitae.</p>\r\n','Home-page','','publish','closed','closed','','home-page','','','2018-02-21 11:50:43','2018-02-21 11:50:43','',0,'http://test1.local/?page_id=5',0,'page','',0),(6,1,'2018-02-20 22:21:46','2018-02-20 22:21:46','Номе','Home-page','','inherit','closed','closed','','5-revision-v1','','','2018-02-20 22:21:46','2018-02-20 22:21:46','',5,'http://test1.local/index.php/2018/02/20/5-revision-v1/',0,'revision','',0),(7,1,'2018-02-20 22:23:06','2018-02-20 22:23:06','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequuntur cumque dolores excepturi fuga hic incidunt libero magni maiores nesciunt odit officiis omnis perspiciatis quaerat, quasi quis rem, sequi unde!</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequuntur cumque dolores excepturi fuga hic incidunt libero magni maiores nesciunt odit officiis omnis perspiciatis quaerat, quasi quis rem, sequi unde!</p>','News 1','','publish','open','open','','posts','','','2018-02-21 10:34:42','2018-02-21 10:34:42','',0,'http://test1.local/?p=7',0,'post','',0),(8,1,'2018-02-20 22:23:06','2018-02-20 22:23:06','Posts','Posts','','inherit','closed','closed','','7-revision-v1','','','2018-02-20 22:23:06','2018-02-20 22:23:06','',7,'http://test1.local/index.php/2018/02/20/7-revision-v1/',0,'revision','',0),(9,1,'2018-02-20 22:23:34','2018-02-20 22:23:34','','Posts','','publish','closed','closed','','posts','','','2018-02-20 22:23:34','2018-02-20 22:23:34','',0,'http://test1.local/?page_id=9',0,'page','',0),(10,1,'2018-02-20 22:23:34','2018-02-20 22:23:34','','Posts','','inherit','closed','closed','','9-revision-v1','','','2018-02-20 22:23:34','2018-02-20 22:23:34','',9,'http://test1.local/index.php/2018/02/20/9-revision-v1/',0,'revision','',0),(14,1,'2018-02-20 23:02:01','2018-02-20 23:02:01','http://test1.local/wp-content/uploads/2018/02/cropped-book_2.jpg','cropped-book_2.jpg','','inherit','open','closed','','cropped-book_2-jpg','','','2018-02-20 23:02:01','2018-02-20 23:02:01','',0,'http://test1.local/wp-content/uploads/2018/02/cropped-book_2.jpg',0,'attachment','image/jpeg',0),(15,1,'2018-02-20 23:07:54','2018-02-20 23:07:54','{\n    \"test1::custom_logo\": {\n        \"value\": 14,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2018-02-20 23:02:11\"\n    }\n}','','','trash','closed','closed','','b352de9f-695c-4466-8433-a8dd0935e1a4','','','2018-02-20 23:07:54','2018-02-20 23:07:54','',0,'http://test1.local/?p=15',0,'customize_changeset','',0),(17,1,'2018-02-21 00:01:00','2018-02-21 00:01:00','http://test1.local/wp-content/uploads/2018/02/cropped-editing-pen.png','cropped-editing-pen.png','','inherit','open','closed','','cropped-editing-pen-png','','','2018-02-21 00:01:00','2018-02-21 00:01:00','',0,'http://test1.local/wp-content/uploads/2018/02/cropped-editing-pen.png',0,'attachment','image/png',0),(18,1,'2018-02-21 00:01:04','2018-02-21 00:01:04','{\n    \"test1::custom_logo\": {\n        \"value\": 17,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2018-02-21 00:01:04\"\n    }\n}','','','trash','closed','closed','','e93761ec-075c-459d-97a1-b999fd42794b','','','2018-02-21 00:01:04','2018-02-21 00:01:04','',0,'http://test1.local/e93761ec-075c-459d-97a1-b999fd42794b/',0,'customize_changeset','',0),(20,1,'2018-02-21 00:26:57','2018-02-21 00:26:57','http://test1.local/wp-content/uploads/2018/02/cropped-drawn-pen-logo-png-14.png','cropped-drawn-pen-logo-png-14.png','','inherit','open','closed','','cropped-drawn-pen-logo-png-14-png','','','2018-02-21 00:26:57','2018-02-21 00:26:57','',0,'http://test1.local/wp-content/uploads/2018/02/cropped-drawn-pen-logo-png-14.png',0,'attachment','image/png',0),(21,1,'2018-02-21 00:27:00','2018-02-21 00:27:00','{\n    \"test1::custom_logo\": {\n        \"value\": 20,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2018-02-21 00:27:00\"\n    }\n}','','','trash','closed','closed','','c78361db-3cf8-4d1e-b1b8-10ce2b0e7d2a','','','2018-02-21 00:27:00','2018-02-21 00:27:00','',0,'http://test1.local/c78361db-3cf8-4d1e-b1b8-10ce2b0e7d2a/',0,'customize_changeset','',0),(23,1,'2018-02-21 00:28:49','2018-02-21 00:28:49','http://test1.local/wp-content/uploads/2018/02/cropped-logo.png','cropped-logo.png','','inherit','open','closed','','cropped-logo-png','','','2018-02-21 00:28:49','2018-02-21 00:28:49','',0,'http://test1.local/wp-content/uploads/2018/02/cropped-logo.png',0,'attachment','image/png',0),(24,1,'2018-02-21 00:28:59','2018-02-21 00:28:59','{\n    \"test1::custom_logo\": {\n        \"value\": 23,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2018-02-21 00:28:59\"\n    }\n}','','','trash','closed','closed','','050f545d-e752-4a61-996e-6e66a8386489','','','2018-02-21 00:28:59','2018-02-21 00:28:59','',0,'http://test1.local/050f545d-e752-4a61-996e-6e66a8386489/',0,'customize_changeset','',0),(25,1,'2018-02-21 01:01:08','2018-02-21 01:01:08','','activity','','inherit','open','closed','','activity','','','2018-02-21 01:01:08','2018-02-21 01:01:08','',0,'http://test1.local/wp-content/uploads/2018/02/activity.png',0,'attachment','image/png',0),(26,1,'2018-02-21 01:01:18','2018-02-21 01:01:18','http://test1.local/wp-content/uploads/2018/02/cropped-activity.png','cropped-activity.png','','inherit','open','closed','','cropped-activity-png','','','2018-02-21 01:01:18','2018-02-21 01:01:18','',0,'http://test1.local/wp-content/uploads/2018/02/cropped-activity.png',0,'attachment','image/png',0),(27,1,'2018-02-21 01:01:22','2018-02-21 01:01:22','{\n    \"test1::custom_logo\": {\n        \"value\": 26,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2018-02-21 01:01:22\"\n    }\n}','','','trash','closed','closed','','46570ae1-5ea6-4d60-aeed-68d948143589','','','2018-02-21 01:01:22','2018-02-21 01:01:22','',0,'http://test1.local/46570ae1-5ea6-4d60-aeed-68d948143589/',0,'customize_changeset','',0),(28,1,'2018-02-21 01:11:40','2018-02-21 01:11:40','<pre>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto aut autem consequuntur dignissimos ea est id ipsam ipsum laudantium nemo possimus provident quasi quod rem rerum, saepe, suscipit totam vitae.</pre>\r\n<pre>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto aut autem consequuntur dignissimos ea est id ipsam ipsum laudantium nemo possimus provident quasi quod rem rerum, saepe, suscipit totam vitae.</pre>\r\n<pre></pre>','Home-page','','inherit','closed','closed','','5-revision-v1','','','2018-02-21 01:11:40','2018-02-21 01:11:40','',5,'http://test1.local/5-revision-v1/',0,'revision','',0),(29,1,'2018-02-21 01:12:10','2018-02-21 01:12:10','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto aut autem consequuntur dignissimos ea est id ipsam ipsum laudantium nemo possimus provident quasi quod rem rerum, saepe, suscipit totam vitae.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto aut autem consequuntur dignissimos ea est id ipsam ipsum laudantium nemo possimus provident quasi quod rem rerum, saepe, suscipit totam vitae.\r\n','Home-page','','inherit','closed','closed','','5-revision-v1','','','2018-02-21 01:12:10','2018-02-21 01:12:10','',5,'http://test1.local/5-revision-v1/',0,'revision','',0),(30,1,'2018-02-21 09:35:19','2018-02-21 09:35:19','Address\r\n\r\n9863 - 9867 Mill Road, \r\nCambridge, MG09 99HT.\r\n\r\nFreephone: +1 800 559 6580\r\nTelephone: +1 800 603 6035\r\nFAX: +1 800 889 9898\r\nE-mail: mail@demolink.org \r\nSkype: @skypename','Contacts','','publish','closed','closed','','contacts','','','2018-02-21 09:35:19','2018-02-21 09:35:19','',0,'http://test1.local/?page_id=30',0,'page','',0),(31,1,'2018-02-21 09:35:19','2018-02-21 09:35:19','Address\r\n\r\n9863 - 9867 Mill Road, \r\nCambridge, MG09 99HT.\r\n\r\nFreephone: +1 800 559 6580\r\nTelephone: +1 800 603 6035\r\nFAX: +1 800 889 9898\r\nE-mail: mail@demolink.org \r\nSkype: @skypename','Contacts','','inherit','closed','closed','','30-revision-v1','','','2018-02-21 09:35:19','2018-02-21 09:35:19','',30,'http://test1.local/30-revision-v1/',0,'revision','',0),(32,1,'2018-02-21 09:36:40','2018-02-21 09:36:40','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis debitis, ducimus excepturi fugiat hic illo, laboriosam laborum mollitia obcaecati placeat praesentium quis reiciendis repellat repellendus reprehenderit similique suscipit totam vel?','About us','','publish','closed','closed','','about-us','','','2018-02-21 09:36:40','2018-02-21 09:36:40','',0,'http://test1.local/?page_id=32',0,'page','',0),(33,1,'2018-02-21 09:36:40','2018-02-21 09:36:40','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis debitis, ducimus excepturi fugiat hic illo, laboriosam laborum mollitia obcaecati placeat praesentium quis reiciendis repellat repellendus reprehenderit similique suscipit totam vel?','About us','','inherit','closed','closed','','32-revision-v1','','','2018-02-21 09:36:40','2018-02-21 09:36:40','',32,'http://test1.local/32-revision-v1/',0,'revision','',0),(39,1,'2018-02-21 09:53:48','2018-02-21 09:53:48','','News','','publish','closed','closed','','39','','','2018-02-21 11:49:36','2018-02-21 11:49:36','',0,'http://test1.local/?p=39',2,'nav_menu_item','',0),(40,1,'2018-02-21 09:53:48','2018-02-21 09:53:48','','Home','','publish','closed','closed','','40','','','2018-02-21 11:49:36','2018-02-21 11:49:36','',0,'http://test1.local/?p=40',1,'nav_menu_item','',0),(41,1,'2018-02-21 09:53:48','2018-02-21 09:53:48',' ','','','publish','closed','closed','','41','','','2018-02-21 11:49:36','2018-02-21 11:49:36','',0,'http://test1.local/?p=41',3,'nav_menu_item','',0),(42,1,'2018-02-21 09:54:42','0000-00-00 00:00:00',' ','','','draft','closed','closed','','','','','2018-02-21 09:54:42','0000-00-00 00:00:00','',0,'http://test1.local/?p=42',1,'nav_menu_item','',0),(43,1,'2018-02-21 09:54:43','0000-00-00 00:00:00',' ','','','draft','closed','closed','','','','','2018-02-21 09:54:43','0000-00-00 00:00:00','',0,'http://test1.local/?p=43',1,'nav_menu_item','',0),(44,1,'2018-02-21 09:54:56','2018-02-21 09:54:56',' ','','','publish','closed','closed','','44','','','2018-02-21 09:54:56','2018-02-21 09:54:56','',0,'http://test1.local/?p=44',1,'nav_menu_item','',0),(45,1,'2018-02-21 09:54:56','2018-02-21 09:54:56',' ','','','publish','closed','closed','','45','','','2018-02-21 09:54:56','2018-02-21 09:54:56','',0,'http://test1.local/?p=45',2,'nav_menu_item','',0),(46,1,'2018-02-21 10:34:42','2018-02-21 10:34:42','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequuntur cumque dolores excepturi fuga hic incidunt libero magni maiores nesciunt odit officiis omnis perspiciatis quaerat, quasi quis rem, sequi unde!</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequuntur cumque dolores excepturi fuga hic incidunt libero magni maiores nesciunt odit officiis omnis perspiciatis quaerat, quasi quis rem, sequi unde!</p>','News 1','','inherit','closed','closed','','7-revision-v1','','','2018-02-21 10:34:42','2018-02-21 10:34:42','',7,'http://test1.local/7-revision-v1/',0,'revision','',0),(47,1,'2018-02-21 10:34:55','2018-02-21 10:34:55','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequuntur cumque dolores excepturi fuga hic incidunt libero magni maiores nesciunt odit officiis omnis perspiciatis quaerat, quasi quis rem, sequi unde!</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequuntur cumque dolores excepturi fuga hic incidunt libero magni maiores nesciunt odit officiis omnis perspiciatis quaerat, quasi quis rem, sequi unde!</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequuntur cumque dolores excepturi fuga hic incidunt libero magni maiores nesciunt odit officiis omnis perspiciatis quaerat, quasi quis rem, sequi unde!</p>','News 2','','publish','open','open','','news-2','','','2018-02-21 10:34:55','2018-02-21 10:34:55','',0,'http://test1.local/?p=47',0,'post','',0),(48,1,'2018-02-21 10:34:55','2018-02-21 10:34:55','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequuntur cumque dolores excepturi fuga hic incidunt libero magni maiores nesciunt odit officiis omnis perspiciatis quaerat, quasi quis rem, sequi unde!</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequuntur cumque dolores excepturi fuga hic incidunt libero magni maiores nesciunt odit officiis omnis perspiciatis quaerat, quasi quis rem, sequi unde!</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequuntur cumque dolores excepturi fuga hic incidunt libero magni maiores nesciunt odit officiis omnis perspiciatis quaerat, quasi quis rem, sequi unde!</p>','News 2','','inherit','closed','closed','','47-revision-v1','','','2018-02-21 10:34:55','2018-02-21 10:34:55','',47,'http://test1.local/47-revision-v1/',0,'revision','',0),(49,1,'2018-02-21 10:35:07','2018-02-21 10:35:07','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequuntur cumque dolores excepturi fuga hic incidunt libero magni maiores nesciunt odit officiis omnis perspiciatis quaerat, quasi quis rem, sequi unde!</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequuntur cumque dolores excepturi fuga hic incidunt libero magni maiores nesciunt odit officiis omnis perspiciatis quaerat, quasi quis rem, sequi unde!</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequuntur cumque dolores excepturi fuga hic incidunt libero magni maiores nesciunt odit officiis omnis perspiciatis quaerat, quasi quis rem, sequi unde!</p>','News 3','','publish','open','open','','news-3','','','2018-02-21 10:35:07','2018-02-21 10:35:07','',0,'http://test1.local/?p=49',0,'post','',0),(50,1,'2018-02-21 10:35:07','2018-02-21 10:35:07','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequuntur cumque dolores excepturi fuga hic incidunt libero magni maiores nesciunt odit officiis omnis perspiciatis quaerat, quasi quis rem, sequi unde!</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequuntur cumque dolores excepturi fuga hic incidunt libero magni maiores nesciunt odit officiis omnis perspiciatis quaerat, quasi quis rem, sequi unde!</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequuntur cumque dolores excepturi fuga hic incidunt libero magni maiores nesciunt odit officiis omnis perspiciatis quaerat, quasi quis rem, sequi unde!</p>','News 3','','inherit','closed','closed','','49-revision-v1','','','2018-02-21 10:35:07','2018-02-21 10:35:07','',49,'http://test1.local/49-revision-v1/',0,'revision','',0),(51,1,'2018-02-21 10:56:24','2018-02-21 10:56:24','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequuntur cumque dolores excepturi fuga hic incidunt libero magni maiores nesciunt odit officiis omnis perspiciatis quaerat, quasi quis rem, sequi unde!</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequuntur cumque dolores excepturi fuga hic incidunt libero magni maiores nesciunt odit officiis omnis perspiciatis quaerat, quasi quis rem, sequi unde!</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequuntur cumque dolores excepturi fuga hic incidunt libero magni maiores nesciunt odit officiis omnis perspiciatis quaerat, quasi quis rem, sequi unde!</p>','Book 1','','publish','open','closed','','book-1','','','2018-02-21 10:56:24','2018-02-21 10:56:24','',0,'http://test1.local/?post_type=functions&#038;p=51',0,'functions','',0),(52,1,'2018-02-21 11:10:17','0000-00-00 00:00:00','','Auto Draft','','auto-draft','open','closed','','','','','2018-02-21 11:10:17','0000-00-00 00:00:00','',0,'http://test1.local/?post_type=functions&p=52',0,'functions','',0),(53,1,'2018-02-21 11:13:05','0000-00-00 00:00:00','','Auto Draft','','auto-draft','open','closed','','','','','2018-02-21 11:13:05','0000-00-00 00:00:00','',0,'http://test1.local/?post_type=functions&p=53',0,'functions','',0),(54,1,'2018-02-21 11:33:22','0000-00-00 00:00:00','','Auto Draft','','auto-draft','open','closed','','','','','2018-02-21 11:33:22','0000-00-00 00:00:00','',0,'http://test1.local/?post_type=books&p=54',0,'books','',0),(55,1,'2018-02-21 11:34:12','2018-02-21 11:34:12','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias amet corporis deserunt optio ratione sequi tempora tenetur voluptatibus? Blanditiis fuga fugit maxime qui quibusdam quo, quos voluptate! Mollitia, repellat.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias amet corporis deserunt optio ratione sequi tempora tenetur voluptatibus? Blanditiis fuga fugit maxime qui quibusdam quo, quos voluptate! Mollitia, repellat.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias amet corporis deserunt optio ratione sequi tempora tenetur voluptatibus? Blanditiis fuga fugit maxime qui quibusdam quo, quos voluptate! Mollitia, repellat.</p>','Book 1','','publish','open','closed','','book-1','','','2018-02-21 11:34:12','2018-02-21 11:34:12','',0,'http://test1.local/?post_type=books&#038;p=55',0,'books','',0),(56,1,'2018-02-21 11:45:42','2018-02-21 11:45:42','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias amet corporis deserunt optio ratione sequi tempora tenetur voluptatibus? Blanditiis fuga fugit maxime qui quibusdam quo, quos voluptate! Mollitia, repellat.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias amet corporis deserunt optio ratione sequi tempora tenetur voluptatibus? Blanditiis fuga fugit maxime qui quibusdam quo, quos voluptate! Mollitia, repellat.</p>','Book 2','','publish','open','closed','','book-2','','','2018-02-21 11:45:42','2018-02-21 11:45:42','',0,'http://test1.local/?post_type=books&#038;p=56',0,'books','',0),(57,1,'2018-02-21 11:50:43','2018-02-21 11:50:43','<h2>Home page content</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto aut autem consequuntur dignissimos ea est id ipsam ipsum laudantium nemo possimus provident quasi quod rem rerum, saepe, suscipit totam vitae.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto aut autem consequuntur dignissimos ea est id ipsam ipsum laudantium nemo possimus provident quasi quod rem rerum, saepe, suscipit totam vitae.</p>\r\n','Home-page','','inherit','closed','closed','','5-revision-v1','','','2018-02-21 11:50:43','2018-02-21 11:50:43','',5,'http://test1.local/5-revision-v1/',0,'revision','',0),(58,1,'2018-02-21 11:53:39','0000-00-00 00:00:00','','Auto Draft','','auto-draft','closed','closed','','','','','2018-02-21 11:53:39','0000-00-00 00:00:00','',0,'http://test1.local/?page_id=58',0,'page','',0),(59,1,'2018-02-21 11:55:10','2018-02-21 11:55:10','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur corporis culpa doloremque doloribus ducimus est inventore ipsum iste maiores, obcaecati perferendis perspiciatis possimus quas quo rem sed tempora totam voluptatem?</p>','Book 3','','publish','open','closed','','book-3','','','2018-02-21 11:55:10','2018-02-21 11:55:10','',0,'http://test1.local/?post_type=books&#038;p=59',0,'books','',0),(60,1,'2018-02-21 12:09:20','2018-02-21 12:09:20','drgdrgf','dfgrdfg','','trash','open','closed','','dfgrdfg__trashed','','','2018-02-21 12:23:29','2018-02-21 12:23:29','',0,'http://test1.local/?post_type=books&#038;p=60',0,'books','',0),(61,1,'2018-02-21 12:18:37','0000-00-00 00:00:00','','Auto Draft','','auto-draft','open','closed','','','','','2018-02-21 12:18:37','0000-00-00 00:00:00','',0,'http://test1.local/?post_type=books&p=61',0,'books','',0),(62,1,'2018-02-21 12:19:24','0000-00-00 00:00:00','','Auto Draft','','auto-draft','open','closed','','','','','2018-02-21 12:19:24','0000-00-00 00:00:00','',0,'http://test1.local/?post_type=books&p=62',0,'books','',0),(63,1,'2018-02-21 12:19:38','0000-00-00 00:00:00','','Auto Draft','','auto-draft','open','closed','','','','','2018-02-21 12:19:38','0000-00-00 00:00:00','',0,'http://test1.local/?post_type=books&p=63',0,'books','',0),(64,1,'2018-02-21 12:19:53','0000-00-00 00:00:00','','Auto Draft','','auto-draft','open','closed','','','','','2018-02-21 12:19:53','0000-00-00 00:00:00','',0,'http://test1.local/?post_type=books&p=64',0,'books','',0),(65,1,'2018-02-21 12:20:01','0000-00-00 00:00:00','','Auto Draft','','auto-draft','open','closed','','','','','2018-02-21 12:20:01','0000-00-00 00:00:00','',0,'http://test1.local/?post_type=books&p=65',0,'books','',0),(66,1,'2018-02-21 12:23:11','0000-00-00 00:00:00','','Auto Draft','','auto-draft','open','closed','','','','','2018-02-21 12:23:11','0000-00-00 00:00:00','',0,'http://test1.local/?post_type=books&p=66',0,'books','',0);
/*!40000 ALTER TABLE `wp_posts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-21 14:26:09