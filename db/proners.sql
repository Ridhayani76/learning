# ************************************************************
# Sequel Ace SQL dump
# Version 3016
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: localhost (MySQL 8.0.22)
# Database: versity
# Generation Time: 2021-01-23 02:09:55 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table agencies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `agencies`;

CREATE TABLE `agencies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `agencies` WRITE;
/*!40000 ALTER TABLE `agencies` DISABLE KEYS */;

INSERT INTO `agencies` (`id`, `name`, `address`, `phone`, `created_at`, `updated_at`)
VALUES
	(1,'Google Indonesia','Subang','8928','2021-01-15 10:07:55','2021-01-15 10:07:55'),
	(2,'Apple California','California','021872847','2021-01-21 08:46:10','2021-01-21 08:46:10'),
	(3,'PT Jerbee Indonesia','Buah Batu, Bandung','0223928','2021-01-22 09:34:14','2021-01-22 09:34:14'),
	(4,'PT Sigi Systems','Central Jakarta','0219283288','2021-01-22 09:35:24','2021-01-22 09:35:24');

/*!40000 ALTER TABLE `agencies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table assessments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `assessments`;

CREATE TABLE `assessments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `task_upload_id` bigint unsigned NOT NULL,
  `score` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assessments_task_upload_id_foreign` (`task_upload_id`),
  CONSTRAINT `assessments_task_upload_id_foreign` FOREIGN KEY (`task_upload_id`) REFERENCES `task_uploads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table classrooms
# ------------------------------------------------------------

DROP TABLE IF EXISTS `classrooms`;

CREATE TABLE `classrooms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `classrooms` WRITE;
/*!40000 ALTER TABLE `classrooms` DISABLE KEYS */;

INSERT INTO `classrooms` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'A1','2021-01-15 02:52:43','2021-01-15 02:52:43'),
	(2,'A2','2021-01-15 02:52:45','2021-01-15 02:52:45'),
	(3,'A3','2021-01-15 02:52:46','2021-01-15 02:52:46'),
	(4,'A4','2021-01-15 02:52:48','2021-01-15 02:52:48'),
	(5,'A5','2021-01-15 02:52:50','2021-01-15 02:52:50'),
	(6,'B1','2021-01-15 02:52:51','2021-01-15 02:52:51'),
	(7,'B2','2021-01-15 02:52:53','2021-01-15 02:52:53'),
	(8,'B3','2021-01-15 02:52:55','2021-01-15 02:52:55'),
	(9,'B4','2021-01-15 02:52:56','2021-01-15 02:52:56'),
	(10,'B5','2021-01-15 02:52:58','2021-01-15 02:52:58'),
	(11,'C1','2021-01-15 02:53:00','2021-01-15 02:53:00'),
	(12,'C2','2021-01-15 02:53:01','2021-01-15 02:53:01'),
	(13,'C3','2021-01-15 02:53:04','2021-01-15 02:53:04'),
	(14,'C4','2021-01-15 02:53:05','2021-01-15 02:53:05'),
	(15,'C5','2021-01-15 02:53:08','2021-01-15 02:53:08'),
	(16,'D1','2021-01-22 09:14:13','2021-01-22 09:14:13');

/*!40000 ALTER TABLE `classrooms` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table courses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courses_teacher_id_foreign` (`teacher_id`),
  CONSTRAINT `courses_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;

INSERT INTO `courses` (`id`, `name`, `teacher_id`, `created_at`, `updated_at`)
VALUES
	(1,'Web Programming',1,'2021-01-15 02:52:43','2021-01-15 02:52:43'),
	(2,'Object Oriented Programming',1,'2021-01-15 02:52:43','2021-01-15 02:52:43'),
	(3,'Web Design',7,'2021-01-22 09:30:09','2021-01-22 09:30:09'),
	(4,'Web Development',7,'2021-01-22 09:30:15','2021-01-22 09:30:15');

/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2019_08_19_000000_create_failed_jobs_table',1),
	(4,'2021_01_09_142610_create_classrooms_table',1),
	(5,'2021_01_09_142611_create_teachers_table',1),
	(6,'2021_01_09_142616_create_students_table',1),
	(7,'2021_01_09_142620_create_courses_table',1),
	(8,'2021_01_09_142628_create_tasks_table',1),
	(9,'2021_01_09_142637_create_task_uploads_table',1),
	(10,'2021_01_09_142656_create_assessments_table',1),
	(11,'2021_01_09_142709_create_skills_table',1),
	(12,'2021_01_09_142733_create_agencies_table',1),
	(13,'2021_01_09_142754_create_practices_table',1),
	(14,'2021_01_09_142800_create_practice_members_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table practice_members
# ------------------------------------------------------------

DROP TABLE IF EXISTS `practice_members`;

CREATE TABLE `practice_members` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `practice_id` bigint unsigned NOT NULL,
  `student_id` bigint unsigned NOT NULL,
  `semester` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `practice_members_practice_id_foreign` (`practice_id`),
  KEY `practice_members_student_id_foreign` (`student_id`),
  CONSTRAINT `practice_members_practice_id_foreign` FOREIGN KEY (`practice_id`) REFERENCES `practices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `practice_members_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `practice_members` WRITE;
/*!40000 ALTER TABLE `practice_members` DISABLE KEYS */;

INSERT INTO `practice_members` (`id`, `practice_id`, `student_id`, `semester`, `created_at`, `updated_at`)
VALUES
	(1,1,1,'3','2021-01-15 12:21:12','2021-01-15 12:21:12'),
	(2,1,2,'1','2021-01-15 12:25:30','2021-01-15 12:25:30'),
	(3,2,3,'1','2021-01-21 08:46:46','2021-01-21 08:46:46'),
	(4,2,5,'1','2021-01-21 08:54:34','2021-01-21 08:54:34');

/*!40000 ALTER TABLE `practice_members` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table practices
# ------------------------------------------------------------

DROP TABLE IF EXISTS `practices`;

CREATE TABLE `practices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `skill_id` bigint unsigned NOT NULL,
  `agency_id` bigint unsigned NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `practices_skill_id_foreign` (`skill_id`),
  KEY `practices_agency_id_foreign` (`agency_id`),
  CONSTRAINT `practices_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `practices_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `practices` WRITE;
/*!40000 ALTER TABLE `practices` DISABLE KEYS */;

INSERT INTO `practices` (`id`, `skill_id`, `agency_id`, `start`, `end`, `created_at`, `updated_at`)
VALUES
	(1,1,1,'2021-01-16','2021-01-31','2021-01-15 12:06:05','2021-01-15 12:06:05'),
	(2,1,2,'2021-02-02','2021-04-02','2021-01-21 08:46:28','2021-01-21 08:46:28');

/*!40000 ALTER TABLE `practices` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table skills
# ------------------------------------------------------------

DROP TABLE IF EXISTS `skills`;

CREATE TABLE `skills` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;

INSERT INTO `skills` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Keperawatan','2021-01-15 10:15:47','2021-01-15 10:15:47'),
	(2,'Pemrograman','2021-01-21 12:35:42','2021-01-21 12:35:42'),
	(3,'Software Engineer','2021-01-22 09:38:04','2021-01-22 09:38:04'),
	(4,'Data Analyze','2021-01-22 09:38:33','2021-01-22 09:38:33');

/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table students
# ------------------------------------------------------------

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `classroom_id` bigint unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `students_user_id_foreign` (`user_id`),
  KEY `students_classroom_id_foreign` (`classroom_id`),
  CONSTRAINT `students_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=304 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;

INSERT INTO `students` (`id`, `user_id`, `classroom_id`, `name`, `nim`, `status_id`, `created_at`, `updated_at`)
VALUES
	(1,3,1,'Catur Vega Adriansyah','8693583365',NULL,'2021-01-15 02:52:43','2021-01-21 08:23:31'),
	(2,4,1,'Kanda Jail Tamba S.T.','8109746919',NULL,'2021-01-15 02:52:43','2021-01-21 08:23:31'),
	(3,5,1,'Ira Suryatmi','1059983115',NULL,'2021-01-15 02:52:43','2021-01-21 08:23:31'),
	(4,6,1,'Lukita Mangunsong','6700291153',NULL,'2021-01-15 02:52:44','2021-01-21 08:23:31'),
	(5,7,1,'Unggul Daniswara Thamrin','3474955534',NULL,'2021-01-15 02:52:44','2021-01-21 08:23:31'),
	(6,8,1,'Nadia Widiastuti S.IP','6443455759',NULL,'2021-01-15 02:52:44','2021-01-21 08:23:31'),
	(7,9,1,'Titin Hasanah','4478190734',NULL,'2021-01-15 02:52:44','2021-01-21 08:23:31'),
	(8,10,1,'Candrakanta Saefullah M.M.','5302042579',NULL,'2021-01-15 02:52:44','2021-01-21 08:23:31'),
	(9,11,1,'Carla Yuniar S.T.','0746602933',NULL,'2021-01-15 02:52:44','2021-01-21 08:23:31'),
	(10,12,1,'Marsudi Nababan M.M.','3931036808',NULL,'2021-01-15 02:52:44','2021-01-21 08:23:31'),
	(11,13,1,'Endah Eli Purnawati M.TI.','4456717054',NULL,'2021-01-15 02:52:44','2021-01-21 08:23:31'),
	(12,14,1,'Raden Simbolon','1119524579',NULL,'2021-01-15 02:52:44','2021-01-21 08:23:31'),
	(13,15,1,'Nasab Hidayanto M.TI.','8098940072',NULL,'2021-01-15 02:52:44','2021-01-21 08:23:31'),
	(14,16,1,'Cakrajiya Damanik','3761069234',NULL,'2021-01-15 02:52:44','2021-01-21 08:23:31'),
	(15,17,1,'Ismail Dadi Simanjuntak','0272318716',NULL,'2021-01-15 02:52:44','2021-01-21 08:23:31'),
	(16,18,1,'Darimin Endra Manullang S.Kom','2544247642',NULL,'2021-01-15 02:52:45','2021-01-21 08:23:31'),
	(17,19,1,'Maimunah Rahayu','2092965847',NULL,'2021-01-15 02:52:45','2021-01-21 08:23:31'),
	(18,20,1,'Lalita Hamima Hartati S.T.','4410880074',NULL,'2021-01-15 02:52:45','2021-01-21 08:23:31'),
	(19,21,1,'Ulva Hassanah S.IP','6185603851',NULL,'2021-01-15 02:52:45','2021-01-21 08:23:31'),
	(20,22,1,'Daruna Jatmiko Mandala','0671605251',NULL,'2021-01-15 02:52:45','2021-01-21 08:23:31'),
	(21,23,2,'Prakosa Maheswara S.E.I','3343930418',NULL,'2021-01-15 02:52:45','2021-01-21 08:23:31'),
	(22,24,2,'Bakiman Lazuardi','7457442361',NULL,'2021-01-15 02:52:45','2021-01-21 08:23:31'),
	(23,25,2,'Kairav Kuswoyo','4020302811',NULL,'2021-01-15 02:52:45','2021-01-21 08:23:31'),
	(24,26,2,'Eka Cici Kusmawati','6226906639',NULL,'2021-01-15 02:52:45','2021-01-21 08:23:31'),
	(25,27,2,'Baktiono Budiyanto S.H.','4205126381',NULL,'2021-01-15 02:52:45','2021-01-21 08:23:31'),
	(26,28,2,'Ina Rahayu S.Psi','9502986904',NULL,'2021-01-15 02:52:45','2021-01-21 08:23:31'),
	(27,29,2,'Hasna Palastri','8381000510',NULL,'2021-01-15 02:52:45','2021-01-21 08:23:31'),
	(28,30,2,'Sakura Keisha Yuniar S.Kom','6186099766',NULL,'2021-01-15 02:52:45','2021-01-21 08:23:31'),
	(29,31,2,'Jaswadi Lukita Winarno S.Ked','3088613300',NULL,'2021-01-15 02:52:46','2021-01-21 08:23:31'),
	(30,32,2,'Edi Iswahyudi','4796579745',NULL,'2021-01-15 02:52:46','2021-01-21 08:23:31'),
	(31,33,2,'Caraka Edi Pradana','8590109345',NULL,'2021-01-15 02:52:46','2021-01-21 08:23:31'),
	(32,34,2,'Darimin Irfan Suryono M.Kom.','4446986241',NULL,'2021-01-15 02:52:46','2021-01-21 08:23:31'),
	(33,35,2,'Cahyanto Budiman','6932810244',NULL,'2021-01-15 02:52:46','2021-01-21 08:23:31'),
	(34,36,2,'Ajiono Pranowo S.Ked','3004204673',NULL,'2021-01-15 02:52:46','2021-01-21 08:23:31'),
	(35,37,2,'Rendy Tamba','8139376884',NULL,'2021-01-15 02:52:46','2021-01-21 08:23:31'),
	(36,38,2,'Yulia Handayani','4351318197',NULL,'2021-01-15 02:52:46','2021-01-21 08:23:31'),
	(37,39,2,'Halima Yuliarti S.T.','2344443262',NULL,'2021-01-15 02:52:46','2021-01-21 08:23:31'),
	(38,40,2,'Ilyas Prayitna Prakasa S.Kom','4136667174',NULL,'2021-01-15 02:52:46','2021-01-21 08:23:31'),
	(39,41,2,'Victoria Uyainah','4365657316',NULL,'2021-01-15 02:52:46','2021-01-21 08:23:31'),
	(40,42,2,'Karsa Widodo','0448877481',NULL,'2021-01-15 02:52:46','2021-01-21 08:23:31'),
	(41,43,3,'Hamima Hassanah M.Pd','8879471215',NULL,'2021-01-15 02:52:47','2021-01-21 08:23:31'),
	(42,44,3,'Yunita Vicky Usada','2818554711',NULL,'2021-01-15 02:52:47','2021-01-21 08:23:31'),
	(43,45,3,'Lalita Jelita Hassanah M.Pd','0980688648',NULL,'2021-01-15 02:52:47','2021-01-21 08:23:31'),
	(44,46,3,'Chelsea Susanti','9290538606',NULL,'2021-01-15 02:52:47','2021-01-21 08:23:31'),
	(45,47,3,'Hasim Hardi Prasetya','4720564315',NULL,'2021-01-15 02:52:47','2021-01-21 08:23:31'),
	(46,48,3,'Daruna Maryadi','7306961727',NULL,'2021-01-15 02:52:47','2021-01-21 08:23:31'),
	(47,49,3,'Wisnu Dongoran','7136743840',NULL,'2021-01-15 02:52:47','2021-01-21 08:23:31'),
	(48,50,3,'Ozy Nashiruddin','5169671443',NULL,'2021-01-15 02:52:47','2021-01-21 08:23:31'),
	(49,51,3,'Karta Elon Siregar','2905613538',NULL,'2021-01-15 02:52:47','2021-01-21 08:23:31'),
	(50,52,3,'Galak Sihotang','6793109996',NULL,'2021-01-15 02:52:47','2021-01-21 08:23:31'),
	(51,53,3,'Wasis Halim','2130062836',NULL,'2021-01-15 02:52:47','2021-01-21 08:23:31'),
	(52,54,3,'Darsirah Sitorus','5771610711',NULL,'2021-01-15 02:52:47','2021-01-21 08:23:31'),
	(53,55,3,'Wulan Namaga','8691634789',NULL,'2021-01-15 02:52:48','2021-01-21 08:23:31'),
	(54,56,3,'Estiawan Samsul Wibowo','0243037419',NULL,'2021-01-15 02:52:48','2021-01-21 08:23:31'),
	(55,57,3,'Aisyah Padmasari','3677648002',NULL,'2021-01-15 02:52:48','2021-01-21 08:23:31'),
	(56,58,3,'Clara Rahayu','5241271242',NULL,'2021-01-15 02:52:48','2021-01-21 08:23:31'),
	(57,59,3,'Kamal Marpaung','8554758829',NULL,'2021-01-15 02:52:48','2021-01-21 08:23:31'),
	(58,60,3,'Vinsen Bakidin Anggriawan M.Pd','2817663788',NULL,'2021-01-15 02:52:48','2021-01-21 08:23:31'),
	(59,61,3,'Ganep Maulana M.TI.','8992314077',NULL,'2021-01-15 02:52:48','2021-01-21 08:23:31'),
	(60,62,3,'Eko Ajiman Suwarno','1397108217',NULL,'2021-01-15 02:52:48','2021-01-21 08:23:31'),
	(61,63,4,'Pardi Rusman Santoso','7168196759',NULL,'2021-01-15 02:52:48','2021-01-21 08:23:31'),
	(62,64,4,'Gantar Zulkarnain','5009641404',NULL,'2021-01-15 02:52:48','2021-01-21 08:23:31'),
	(63,65,4,'Lantar Haryanto','4169098796',NULL,'2021-01-15 02:52:48','2021-01-21 08:23:31'),
	(64,66,4,'Puti Hariyah','3820890105',NULL,'2021-01-15 02:52:48','2021-01-21 08:23:31'),
	(65,67,4,'Caket Tasnim Waluyo M.Farm','1425721657',NULL,'2021-01-15 02:52:48','2021-01-21 08:23:31'),
	(66,68,4,'Michelle Pertiwi','5016865682',NULL,'2021-01-15 02:52:49','2021-01-21 08:23:31'),
	(67,69,4,'Cinta Astuti','7936952433',NULL,'2021-01-15 02:52:49','2021-01-21 08:23:31'),
	(68,70,4,'Taufan Murti Narpati','6051495360',NULL,'2021-01-15 02:52:49','2021-01-21 08:23:31'),
	(69,71,4,'Gamani Marwata Prakasa M.Pd','3061580638',NULL,'2021-01-15 02:52:49','2021-01-21 08:23:31'),
	(70,72,4,'Kani Kusmawati','0046450699',NULL,'2021-01-15 02:52:49','2021-01-21 08:23:31'),
	(71,73,4,'Pangestu Panji Sitompul S.E.I','3782989498',NULL,'2021-01-15 02:52:49','2021-01-21 08:23:31'),
	(72,74,4,'Restu Pertiwi','1883918345',NULL,'2021-01-15 02:52:49','2021-01-21 08:23:31'),
	(73,75,4,'Lukman Kusumo','6407597960',NULL,'2021-01-15 02:52:49','2021-01-21 08:23:31'),
	(74,76,4,'Jumari Simanjuntak','3114077647',NULL,'2021-01-15 02:52:49','2021-01-21 08:23:31'),
	(75,77,4,'Kambali Samosir','5884111986',NULL,'2021-01-15 02:52:49','2021-01-21 08:23:31'),
	(76,78,4,'Soleh Catur Setiawan','8481089621',NULL,'2021-01-15 02:52:49','2021-01-21 08:23:31'),
	(77,79,4,'Wirda Yolanda','7955947765',NULL,'2021-01-15 02:52:49','2021-01-21 08:23:31'),
	(78,80,4,'Nardi Haryanto','4763243140',NULL,'2021-01-15 02:52:50','2021-01-21 08:23:31'),
	(79,81,4,'Puji Pratiwi','5647524875',NULL,'2021-01-15 02:52:50','2021-01-21 08:23:31'),
	(80,82,4,'Rangga Dadi Situmorang','0471458586',NULL,'2021-01-15 02:52:50','2021-01-21 08:23:31'),
	(81,83,5,'Belinda Siska Lestari','1068373026',NULL,'2021-01-15 02:52:50','2021-01-21 08:23:31'),
	(82,84,5,'Sarah Rahayu','5489121569',NULL,'2021-01-15 02:52:50','2021-01-21 08:23:31'),
	(83,85,5,'Lukman Rajasa','4265858040',NULL,'2021-01-15 02:52:50','2021-01-21 08:23:31'),
	(84,86,5,'Taufan Firmansyah','7638199475',NULL,'2021-01-15 02:52:50','2021-01-21 08:23:31'),
	(85,87,5,'Sabri Kurniawan S.Gz','3795043983',NULL,'2021-01-15 02:52:50','2021-01-21 08:23:31'),
	(86,88,5,'Laila Puspita','4509822056',NULL,'2021-01-15 02:52:50','2021-01-21 08:23:31'),
	(87,89,5,'Hardana Widodo S.Pt','1733004470',NULL,'2021-01-15 02:52:50','2021-01-21 08:23:31'),
	(88,90,5,'Jaiman Manullang','9531751756',NULL,'2021-01-15 02:52:50','2021-01-21 08:23:31'),
	(89,91,5,'Mahdi Thamrin','6911339321',NULL,'2021-01-15 02:52:50','2021-01-21 08:23:31'),
	(90,92,5,'Bagus Maryadi','9497244481',NULL,'2021-01-15 02:52:51','2021-01-21 08:23:31'),
	(91,93,5,'Zulaikha Malika Yulianti','1591212130',NULL,'2021-01-15 02:52:51','2021-01-21 08:23:31'),
	(92,94,5,'Puspa Kuswandari','2124142692',NULL,'2021-01-15 02:52:51','2021-01-21 08:23:31'),
	(93,95,5,'Hairyanto Kusumo S.Sos','5609483679',NULL,'2021-01-15 02:52:51','2021-01-21 08:23:31'),
	(94,96,5,'Galuh Irwan Wijaya M.Ak','0248054663',NULL,'2021-01-15 02:52:51','2021-01-21 08:23:31'),
	(95,97,5,'Edison Dirja Gunawan','9591986409',NULL,'2021-01-15 02:52:51','2021-01-21 08:23:31'),
	(96,98,5,'Oliva Ciaobella Utami M.Pd','7197017762',NULL,'2021-01-15 02:52:51','2021-01-21 08:23:31'),
	(97,99,5,'Usyi Zahra Pertiwi','0479900328',NULL,'2021-01-15 02:52:51','2021-01-21 08:23:31'),
	(98,100,5,'Dadi Mandala','3796371872',NULL,'2021-01-15 02:52:51','2021-01-21 08:23:31'),
	(99,101,5,'Soleh Winarno','4099251173',NULL,'2021-01-15 02:52:51','2021-01-21 08:23:31'),
	(100,102,5,'Vega Mariadi Suwarno','0967371469',NULL,'2021-01-15 02:52:51','2021-01-21 08:23:31'),
	(101,103,6,'Erik Bahuraksa Saptono S.Sos','4674315032',NULL,'2021-01-15 02:52:51','2021-01-21 08:23:31'),
	(102,104,6,'Niyaga Latupono','8441825387',NULL,'2021-01-15 02:52:52','2021-01-21 08:23:31'),
	(103,105,6,'Maimunah Hartati','8867395114',NULL,'2021-01-15 02:52:52','2021-01-21 08:23:31'),
	(104,106,6,'Hesti Puspita','2296889987',NULL,'2021-01-15 02:52:52','2021-01-21 08:23:31'),
	(105,107,6,'Putu Wakiman Kusumo S.E.I','5498910813',NULL,'2021-01-15 02:52:52','2021-01-21 08:23:31'),
	(106,108,6,'Vero Nababan','4849671424',NULL,'2021-01-15 02:52:52','2021-01-21 08:23:31'),
	(107,109,6,'Dewi Puspasari','1667408765',NULL,'2021-01-15 02:52:52','2021-01-21 08:23:31'),
	(108,110,6,'Dwi Eka Saptono S.Gz','1267901437',NULL,'2021-01-15 02:52:52','2021-01-21 08:23:31'),
	(109,111,6,'Fathonah Pudjiastuti','2686820374',NULL,'2021-01-15 02:52:52','2021-01-21 08:23:31'),
	(110,112,6,'Laksana Malik Hidayanto','9641407505',NULL,'2021-01-15 02:52:52','2021-01-21 08:23:31'),
	(111,113,6,'Cornelia Handayani','1378880711',NULL,'2021-01-15 02:52:52','2021-01-21 08:23:31'),
	(112,114,6,'Jessica Usamah S.Psi','2594680846',NULL,'2021-01-15 02:52:52','2021-01-21 08:23:31'),
	(113,115,6,'Eli Michelle Kuswandari','2740024988',NULL,'2021-01-15 02:52:52','2021-01-21 08:23:31'),
	(114,116,6,'Fathonah Yuliarti','4978146302',NULL,'2021-01-15 02:52:52','2021-01-21 08:23:31'),
	(115,117,6,'Baktiadi Habibi','7542191537',NULL,'2021-01-15 02:52:53','2021-01-21 08:23:31'),
	(116,118,6,'Oliva Suryatmi S.Pt','2443459423',NULL,'2021-01-15 02:52:53','2021-01-21 08:23:31'),
	(117,119,6,'Hasta Mansur','5382954394',NULL,'2021-01-15 02:52:53','2021-01-21 08:23:31'),
	(118,120,6,'Kasusra Hakim','0513265574',NULL,'2021-01-15 02:52:53','2021-01-21 08:23:31'),
	(119,121,6,'Elisa Ira Maryati S.Farm','7640085563',NULL,'2021-01-15 02:52:53','2021-01-21 08:23:31'),
	(120,122,6,'Maya Titin Utami','5863128887',NULL,'2021-01-15 02:52:53','2021-01-21 08:23:31'),
	(121,123,7,'Vera Handayani','0122364688',NULL,'2021-01-15 02:52:53','2021-01-21 08:23:31'),
	(122,124,7,'Zulaikha Nasyidah','8282924276',NULL,'2021-01-15 02:52:53','2021-01-21 08:23:31'),
	(123,125,7,'Gadang Gunawan','3534773416',NULL,'2021-01-15 02:52:53','2021-01-21 08:23:31'),
	(124,126,7,'Oliva Palastri','7310804371',NULL,'2021-01-15 02:52:53','2021-01-21 08:23:31'),
	(125,127,7,'Hilda Mayasari','1030250802',NULL,'2021-01-15 02:52:53','2021-01-21 08:23:31'),
	(126,128,7,'Galiono Sinaga','3777914479',NULL,'2021-01-15 02:52:53','2021-01-21 08:23:31'),
	(127,129,7,'Agnes Salsabila Yuniar','6581517961',NULL,'2021-01-15 02:52:54','2021-01-21 08:23:31'),
	(128,130,7,'Nilam Laksita M.TI.','9237230591',NULL,'2021-01-15 02:52:54','2021-01-21 08:23:31'),
	(129,131,7,'Pangeran Slamet Nashiruddin M.TI.','2384116313',NULL,'2021-01-15 02:52:54','2021-01-21 08:23:31'),
	(130,132,7,'Timbul Damanik','1284534131',NULL,'2021-01-15 02:52:54','2021-01-21 08:23:31'),
	(131,133,7,'Anggabaya Rajasa S.E.I','1199183159',NULL,'2021-01-15 02:52:54','2021-01-21 08:23:31'),
	(132,134,7,'Titin Lintang Puspita','0075367274',NULL,'2021-01-15 02:52:54','2021-01-21 08:23:31'),
	(133,135,7,'Maya Padmi Suartini','6422473117',NULL,'2021-01-15 02:52:54','2021-01-21 08:23:31'),
	(134,136,7,'Ghaliyati Lili Melani','7029884031',NULL,'2021-01-15 02:52:54','2021-01-21 08:23:31'),
	(135,137,7,'Kurnia Wahyudin','3637189152',NULL,'2021-01-15 02:52:54','2021-01-21 08:23:32'),
	(136,138,7,'Asmianto Sitompul','8410733641',NULL,'2021-01-15 02:52:54','2021-01-21 08:23:32'),
	(137,139,7,'Ira Utami','0200256673',NULL,'2021-01-15 02:52:54','2021-01-21 08:23:32'),
	(138,140,7,'Cager Kusumo','7119171871',NULL,'2021-01-15 02:52:54','2021-01-21 08:23:32'),
	(139,141,7,'Patricia Tania Pudjiastuti S.Kom','5688402847',NULL,'2021-01-15 02:52:55','2021-01-21 08:23:32'),
	(140,142,7,'Bella Intan Namaga S.Ked','4605004369',NULL,'2021-01-15 02:52:55','2021-01-21 08:23:32'),
	(141,143,8,'Hesti Suryatmi','0372107951',NULL,'2021-01-15 02:52:55','2021-01-21 08:23:32'),
	(142,144,8,'Kania Dinda Zulaika','0910754227',NULL,'2021-01-15 02:52:55','2021-01-21 08:23:32'),
	(143,145,8,'Arta Hairyanto Wibowo','7329898369',NULL,'2021-01-15 02:52:55','2021-01-21 08:23:32'),
	(144,146,8,'Kenari Widodo','2616261817',NULL,'2021-01-15 02:52:55','2021-01-21 08:23:32'),
	(145,147,8,'Cinta Agustina','5062778079',NULL,'2021-01-15 02:52:55','2021-01-21 08:23:32'),
	(146,148,8,'Cinta Rahmawati','6734732586',NULL,'2021-01-15 02:52:55','2021-01-21 08:23:32'),
	(147,149,8,'Danuja Kusuma Iswahyudi S.IP','2022646394',NULL,'2021-01-15 02:52:55','2021-01-21 08:23:32'),
	(148,150,8,'Asirwada Tamba','4965124988',NULL,'2021-01-15 02:52:55','2021-01-21 08:23:32'),
	(149,151,8,'Puput Mayasari S.Ked','0076154236',NULL,'2021-01-15 02:52:55','2021-01-21 08:23:32'),
	(150,152,8,'Jati Najmudin S.E.','0293024957',NULL,'2021-01-15 02:52:55','2021-01-21 08:23:32'),
	(151,153,8,'Sadina Purwanti','6672990464',NULL,'2021-01-15 02:52:55','2021-01-21 08:23:32'),
	(152,154,8,'Luwar Siregar S.Kom','1782214383',NULL,'2021-01-15 02:52:56','2021-01-21 08:23:32'),
	(153,155,8,'Bahuwirya Sitompul','1487339815',NULL,'2021-01-15 02:52:56','2021-01-21 08:23:32'),
	(154,156,8,'Novi Yolanda S.T.','8764291223',NULL,'2021-01-15 02:52:56','2021-01-21 08:23:32'),
	(155,157,8,'Ira Nasyiah S.Farm','4950703361',NULL,'2021-01-15 02:52:56','2021-01-21 08:23:32'),
	(156,158,8,'Endra Labuh Lazuardi','8177804181',NULL,'2021-01-15 02:52:56','2021-01-21 08:23:32'),
	(157,159,8,'Cagak Marpaung','3628535283',NULL,'2021-01-15 02:52:56','2021-01-21 08:23:32'),
	(158,160,8,'Kani Safitri S.H.','4731144283',NULL,'2021-01-15 02:52:56','2021-01-21 08:23:32'),
	(159,161,8,'Melinda Prastuti','6987819857',NULL,'2021-01-15 02:52:56','2021-01-21 08:23:32'),
	(160,162,8,'Limar Tasnim Budiyanto','5975545476',NULL,'2021-01-15 02:52:56','2021-01-21 08:23:32'),
	(161,163,9,'Harjasa Budi Megantara','2000782773',NULL,'2021-01-15 02:52:56','2021-01-21 08:23:32'),
	(162,164,9,'Hadi Cawuk Mansur M.Kom.','8065610213',NULL,'2021-01-15 02:52:56','2021-01-21 08:23:32'),
	(163,165,9,'Wulan Safitri','9578123220',NULL,'2021-01-15 02:52:56','2021-01-21 08:23:32'),
	(164,166,9,'Fitriani Suryatmi S.T.','6925570253',NULL,'2021-01-15 02:52:57','2021-01-21 08:23:32'),
	(165,167,9,'Cornelia Mandasari M.Ak','9386697482',NULL,'2021-01-15 02:52:57','2021-01-21 08:23:32'),
	(166,168,9,'Gara Dongoran','8005938623',NULL,'2021-01-15 02:52:57','2021-01-21 08:23:32'),
	(167,169,9,'Yusuf Timbul Saragih S.Pt','1485674707',NULL,'2021-01-15 02:52:57','2021-01-21 08:23:32'),
	(168,170,9,'Drajat Firgantoro','5032787781',NULL,'2021-01-15 02:52:57','2021-01-21 08:23:32'),
	(169,171,9,'Najib Mustofa','8566427975',NULL,'2021-01-15 02:52:57','2021-01-21 08:23:32'),
	(170,172,9,'Johan Thamrin S.I.Kom','3801617361',NULL,'2021-01-15 02:52:57','2021-01-21 08:23:32'),
	(171,173,9,'Hafshah Utami M.Pd','9939847992',NULL,'2021-01-15 02:52:57','2021-01-21 08:23:32'),
	(172,174,9,'Novi Utami','3568246865',NULL,'2021-01-15 02:52:57','2021-01-21 08:23:32'),
	(173,175,9,'Gina Dina Hassanah','8627241579',NULL,'2021-01-15 02:52:57','2021-01-21 08:23:32'),
	(174,176,9,'Ayu Mandasari','0669255375',NULL,'2021-01-15 02:52:57','2021-01-21 08:23:32'),
	(175,177,9,'Maimunah Nasyiah','9148140983',NULL,'2021-01-15 02:52:57','2021-01-21 08:23:32'),
	(176,178,9,'Zizi Suryatmi M.Kom.','8403209271',NULL,'2021-01-15 02:52:58','2021-01-21 08:23:32'),
	(177,179,9,'Rudi Sinaga','2281404111',NULL,'2021-01-15 02:52:58','2021-01-21 08:23:32'),
	(178,180,9,'Wisnu Ajimat Ardianto','7088918595',NULL,'2021-01-15 02:52:58','2021-01-21 08:23:32'),
	(179,181,9,'Bakidin Natsir','4145061308',NULL,'2021-01-15 02:52:58','2021-01-21 08:23:32'),
	(180,182,9,'Ciaobella Vanesa Lestari','6217364971',NULL,'2021-01-15 02:52:58','2021-01-21 08:23:32'),
	(181,183,10,'Opung Pradana','3029745068',NULL,'2021-01-15 02:52:58','2021-01-21 08:23:32'),
	(182,184,10,'Ozy Banara Marpaung','4000583748',NULL,'2021-01-15 02:52:58','2021-01-21 08:23:32'),
	(183,185,10,'Yessi Rahmawati','4491922595',NULL,'2021-01-15 02:52:58','2021-01-21 08:23:32'),
	(184,186,10,'Karimah Padmi Riyanti S.IP','5753309204',NULL,'2021-01-15 02:52:58','2021-01-21 08:23:32'),
	(185,187,10,'Padma Hassanah','3466611445',NULL,'2021-01-15 02:52:58','2021-01-21 08:23:32'),
	(186,188,10,'Nardi Halim','0523094008',NULL,'2021-01-15 02:52:58','2021-01-21 08:23:32'),
	(187,189,10,'Hamzah Waluyo','2424603986',NULL,'2021-01-15 02:52:58','2021-01-21 08:23:32'),
	(188,190,10,'Karman Suwarno','3866003921',NULL,'2021-01-15 02:52:59','2021-01-21 08:23:32'),
	(189,191,10,'Zulfa Prastuti','5330136614',NULL,'2021-01-15 02:52:59','2021-01-21 08:23:32'),
	(190,192,10,'Rendy Mansur S.E.I','8854847894',NULL,'2021-01-15 02:52:59','2021-01-21 08:23:32'),
	(191,193,10,'Hartaka Wahyudin','9049460963',NULL,'2021-01-15 02:52:59','2021-01-21 08:23:32'),
	(192,194,10,'Umaya Hartaka Firmansyah','7624173275',NULL,'2021-01-15 02:52:59','2021-01-21 08:23:32'),
	(193,195,10,'Zamira Namaga','8282773548',NULL,'2021-01-15 02:52:59','2021-01-21 08:23:32'),
	(194,196,10,'Lukita Budiman','4546856491',NULL,'2021-01-15 02:52:59','2021-01-21 08:23:32'),
	(195,197,10,'Talia Gawati Yolanda','8057051303',NULL,'2021-01-15 02:52:59','2021-01-21 08:23:32'),
	(196,198,10,'Wardi Karta Jailani','8065444205',NULL,'2021-01-15 02:52:59','2021-01-21 08:23:32'),
	(197,199,10,'Talia Nasyiah','2762655368',NULL,'2021-01-15 02:52:59','2021-01-21 08:23:32'),
	(198,200,10,'Rusman Cahya Hidayat S.Pt','2979507271',NULL,'2021-01-15 02:52:59','2021-01-21 08:23:32'),
	(199,201,10,'Among Waskita','2868196455',NULL,'2021-01-15 02:52:59','2021-01-21 08:23:32'),
	(200,202,10,'Suci Paulin Suryatmi S.Sos','5370032069',NULL,'2021-01-15 02:53:00','2021-01-21 08:23:32'),
	(201,203,11,'Wulan Hastuti S.Gz','9368628832',NULL,'2021-01-15 02:53:00','2021-01-21 08:23:32'),
	(202,204,11,'Bala Dabukke','0524033675',NULL,'2021-01-15 02:53:00','2021-01-21 08:23:32'),
	(203,205,11,'Laksana Latupono','5188399425',NULL,'2021-01-15 02:53:00','2021-01-21 08:23:32'),
	(204,206,11,'Pangeran Sihombing','9289998084',NULL,'2021-01-15 02:53:00','2021-01-21 08:23:32'),
	(205,207,11,'Hamima Mayasari S.IP','9251403375',NULL,'2021-01-15 02:53:00','2021-01-21 08:23:32'),
	(206,208,11,'Bancar Mitra Lazuardi M.Ak','5321914773',NULL,'2021-01-15 02:53:00','2021-01-21 08:23:32'),
	(207,209,11,'Maria Wijayanti','6288399128',NULL,'2021-01-15 02:53:00','2021-01-21 08:23:32'),
	(208,210,11,'Nyoman Praba Setiawan','8629165186',NULL,'2021-01-15 02:53:00','2021-01-21 08:23:32'),
	(209,211,11,'Cinta Yuliarti','4108986714',NULL,'2021-01-15 02:53:00','2021-01-21 08:23:32'),
	(210,212,11,'Ajeng Mulyani','3559536634',NULL,'2021-01-15 02:53:00','2021-01-21 08:23:32'),
	(211,213,11,'Oman Pradana M.Kom.','5499531368',NULL,'2021-01-15 02:53:00','2021-01-21 08:23:32'),
	(212,214,11,'Suci Hartati','4861196129',NULL,'2021-01-15 02:53:01','2021-01-21 08:23:32'),
	(213,215,11,'Asman Gunarto','8665620593',NULL,'2021-01-15 02:53:01','2021-01-21 08:23:32'),
	(214,216,11,'Dariati Hardi Marbun','6194465530',NULL,'2021-01-15 02:53:01','2021-01-21 08:23:32'),
	(215,217,11,'Kamaria Pudjiastuti','9971616618',NULL,'2021-01-15 02:53:01','2021-01-21 08:23:32'),
	(216,218,11,'Widya Hartati','4050949378',NULL,'2021-01-15 02:53:01','2021-01-21 08:23:32'),
	(217,219,11,'Calista Cinthia Wijayanti M.Ak','6641765327',NULL,'2021-01-15 02:53:01','2021-01-21 08:23:32'),
	(218,220,11,'Caturangga Budiyanto','6117761824',NULL,'2021-01-15 02:53:01','2021-01-21 08:23:32'),
	(219,221,11,'Damar Maryadi','2178084782',NULL,'2021-01-15 02:53:01','2021-01-21 08:23:32'),
	(220,222,11,'Estiono Budiman M.Kom.','9570516775',NULL,'2021-01-15 02:53:01','2021-01-21 08:23:32'),
	(221,223,12,'Maya Lestari','3521403480',NULL,'2021-01-15 02:53:01','2021-01-21 08:23:32'),
	(222,224,12,'Garan Thamrin','1410452315',NULL,'2021-01-15 02:53:01','2021-01-21 08:23:32'),
	(223,225,12,'Adiarja Sitompul','4437651340',NULL,'2021-01-15 02:53:02','2021-01-21 08:23:32'),
	(224,226,12,'Kartika Hartati','2815252239',NULL,'2021-01-15 02:53:02','2021-01-21 08:23:32'),
	(225,227,12,'Muhammad Habibi','6490600804',NULL,'2021-01-15 02:53:02','2021-01-21 08:23:32'),
	(226,228,12,'Hani Oktaviani S.IP','3680341786',NULL,'2021-01-15 02:53:02','2021-01-21 08:23:32'),
	(227,229,12,'Cawuk Latupono','6930598470',NULL,'2021-01-15 02:53:02','2021-01-21 08:23:32'),
	(228,230,12,'Cemani Tasdik Sinaga S.Psi','4932514273',NULL,'2021-01-15 02:53:02','2021-01-21 08:23:32'),
	(229,231,12,'Gaman Lazuardi','3574258536',NULL,'2021-01-15 02:53:02','2021-01-21 08:23:32'),
	(230,232,12,'Natalia Cinthia Mandasari S.I.Kom','7340143522',NULL,'2021-01-15 02:53:02','2021-01-21 08:23:32'),
	(231,233,12,'Kasiyah Padmi Mayasari','1422321106',NULL,'2021-01-15 02:53:02','2021-01-21 08:23:32'),
	(232,234,12,'Gamblang Salahudin','6219143140',NULL,'2021-01-15 02:53:03','2021-01-21 08:23:32'),
	(233,235,12,'Lintang Prastuti M.M.','4350063532',NULL,'2021-01-15 02:53:03','2021-01-21 08:23:32'),
	(234,236,12,'Hasan Kamidin Marpaung M.Ak','0430897601',NULL,'2021-01-15 02:53:03','2021-01-21 08:23:32'),
	(235,237,12,'Eluh Winarno','4980172178',NULL,'2021-01-15 02:53:03','2021-01-21 08:23:32'),
	(236,238,12,'Lanang Uwais','6104161759',NULL,'2021-01-15 02:53:03','2021-01-21 08:23:32'),
	(237,239,12,'Shakila Wahyuni S.T.','0944341357',NULL,'2021-01-15 02:53:03','2021-01-21 08:23:32'),
	(238,240,12,'Calista Laksmiwati M.Farm','1165146245',NULL,'2021-01-15 02:53:03','2021-01-21 08:23:32'),
	(239,241,12,'Zahra Mayasari S.Farm','7136443548',NULL,'2021-01-15 02:53:03','2021-01-21 08:23:32'),
	(240,242,12,'Usman Prakasa M.Farm','7634425239',NULL,'2021-01-15 02:53:04','2021-01-21 08:23:32'),
	(241,243,13,'Bala Jaya Dongoran S.IP','1988037284',NULL,'2021-01-15 02:53:04','2021-01-21 08:23:32'),
	(242,244,13,'Daryani Habibi','0108160229',NULL,'2021-01-15 02:53:04','2021-01-21 08:23:32'),
	(243,245,13,'Zelda Rahmi Nasyidah','9306502635',NULL,'2021-01-15 02:53:04','2021-01-21 08:23:32'),
	(244,246,13,'Nilam Lestari S.Ked','7268268667',NULL,'2021-01-15 02:53:04','2021-01-21 08:23:32'),
	(245,247,13,'Hani Mulyani','0696954847',NULL,'2021-01-15 02:53:04','2021-01-21 08:23:32'),
	(246,248,13,'Kemal Maheswara M.Pd','3905366881',NULL,'2021-01-15 02:53:04','2021-01-21 08:23:32'),
	(247,249,13,'Najam Kurniawan','4437873475',NULL,'2021-01-15 02:53:04','2021-01-21 08:23:32'),
	(248,250,13,'Nilam Uyainah','2231384793',NULL,'2021-01-15 02:53:04','2021-01-21 08:23:32'),
	(249,251,13,'Akarsana Nainggolan','6942152231',NULL,'2021-01-15 02:53:04','2021-01-21 08:23:32'),
	(250,252,13,'Rafi Marpaung','1650648686',NULL,'2021-01-15 02:53:04','2021-01-21 08:23:32'),
	(251,253,13,'Raisa Namaga S.Pd','4623678875',NULL,'2021-01-15 02:53:05','2021-01-21 08:23:32'),
	(252,254,13,'Vega Saputra','7841207554',NULL,'2021-01-15 02:53:05','2021-01-21 08:23:32'),
	(253,255,13,'Juli Suartini','3517738552',NULL,'2021-01-15 02:53:05','2021-01-21 08:23:32'),
	(254,256,13,'Paiman Napitupulu','5280650369',NULL,'2021-01-15 02:53:05','2021-01-21 08:23:32'),
	(255,257,13,'Bancar Suryono S.IP','4015934569',NULL,'2021-01-15 02:53:05','2021-01-21 08:23:32'),
	(256,258,13,'Caket Samosir','8965799591',NULL,'2021-01-15 02:53:05','2021-01-21 08:23:32'),
	(257,259,13,'Samiah Zizi Lestari','9968707192',NULL,'2021-01-15 02:53:05','2021-01-21 08:23:32'),
	(258,260,13,'Cawuk Saputra','3094448381',NULL,'2021-01-15 02:53:05','2021-01-21 08:23:32'),
	(259,261,13,'Caturangga Tarihoran S.Gz','5208211373',NULL,'2021-01-15 02:53:05','2021-01-21 08:23:32'),
	(260,262,13,'Gambira Hutasoit','2987540102',NULL,'2021-01-15 02:53:05','2021-01-21 08:23:32'),
	(261,263,14,'Dian Melani S.Psi','9954633528',NULL,'2021-01-15 02:53:06','2021-01-21 08:23:32'),
	(262,264,14,'Candrakanta Lamar Dabukke','4377442534',NULL,'2021-01-15 02:53:06','2021-01-21 08:23:32'),
	(263,265,14,'Eka Pratama','6087975755',NULL,'2021-01-15 02:53:06','2021-01-21 08:23:32'),
	(264,266,14,'Putri Lestari S.E.','7632549567',NULL,'2021-01-15 02:53:06','2021-01-21 08:23:32'),
	(265,267,14,'Edi Sitorus','7716388708',NULL,'2021-01-15 02:53:06','2021-01-21 08:23:32'),
	(266,268,14,'Julia Rahimah','3976775051',NULL,'2021-01-15 02:53:06','2021-01-21 08:23:32'),
	(267,269,14,'Rika Septi Suartini','2908470273',NULL,'2021-01-15 02:53:06','2021-01-21 08:23:32'),
	(268,270,14,'Ismail Prasetya','2687801134',NULL,'2021-01-15 02:53:06','2021-01-21 08:23:32'),
	(269,271,14,'Gandi Tamba','7745203320',NULL,'2021-01-15 02:53:07','2021-01-21 08:23:32'),
	(270,272,14,'Jais Simbolon','5094835171',NULL,'2021-01-15 02:53:07','2021-01-21 08:23:32'),
	(271,273,14,'Darmanto Haryanto','2225215136',NULL,'2021-01-15 02:53:07','2021-01-21 08:23:32'),
	(272,274,14,'Diana Gawati Prastuti S.Psi','7203288776',NULL,'2021-01-15 02:53:07','2021-01-21 08:23:32'),
	(273,275,14,'Cayadi Lasmono Prasetyo M.M.','0658909723',NULL,'2021-01-15 02:53:07','2021-01-21 08:23:32'),
	(274,276,14,'Darsirah Mandala','3629296857',NULL,'2021-01-15 02:53:07','2021-01-21 08:23:32'),
	(275,277,14,'Ozy Tirta Habibi S.E.','0819358709',NULL,'2021-01-15 02:53:07','2021-01-21 08:23:32'),
	(276,278,14,'Yulia Utami','2066497927',NULL,'2021-01-15 02:53:07','2021-01-21 08:23:32'),
	(277,279,14,'Wakiman Anggriawan','5817322349',NULL,'2021-01-15 02:53:07','2021-01-21 08:23:32'),
	(278,280,14,'Lukman Maheswara','3591559371',NULL,'2021-01-15 02:53:08','2021-01-21 08:23:32'),
	(279,281,14,'Rendy Dwi Ardianto M.TI.','2090080349',NULL,'2021-01-15 02:53:08','2021-01-21 08:23:32'),
	(280,282,14,'Kezia Winarsih','8190291391',NULL,'2021-01-15 02:53:08','2021-01-21 08:23:32'),
	(281,283,15,'Jarwa Sihotang','6893209755',NULL,'2021-01-15 02:53:08','2021-01-21 08:23:32'),
	(282,284,15,'Pia Hastuti','0699243766',NULL,'2021-01-15 02:53:08','2021-01-21 08:23:32'),
	(283,285,15,'Jinawi Raharja Mustofa','7216413307',NULL,'2021-01-15 02:53:08','2021-01-21 08:23:32'),
	(284,286,15,'Lanang Salahudin S.Psi','9607544660',NULL,'2021-01-15 02:53:08','2021-01-21 08:23:32'),
	(285,287,15,'Gaiman Damar Samosir','0997708166',NULL,'2021-01-15 02:53:08','2021-01-21 08:23:32'),
	(286,288,15,'Kamal Habibi','8304204408',NULL,'2021-01-15 02:53:08','2021-01-21 08:23:32'),
	(287,289,15,'Timbul Mustofa S.Gz','1329210926',NULL,'2021-01-15 02:53:08','2021-01-21 08:23:32'),
	(288,290,15,'Bahuraksa Dongoran','8967192190',NULL,'2021-01-15 02:53:08','2021-01-21 08:23:32'),
	(289,291,15,'Ami Purnawati S.Pt','9803419567',NULL,'2021-01-15 02:53:09','2021-01-21 08:23:32'),
	(290,292,15,'Hani Mardhiyah','0602308038',NULL,'2021-01-15 02:53:09','2021-01-21 08:23:32'),
	(291,293,15,'Hasta Atmaja Sitorus S.T.','6587617725',NULL,'2021-01-15 02:53:09','2021-01-21 08:23:32'),
	(292,294,15,'Harja Waluyo','2890571510',NULL,'2021-01-15 02:53:09','2021-01-21 08:23:32'),
	(293,295,15,'Raden Jais Winarno','0338898777',NULL,'2021-01-15 02:53:09','2021-01-21 08:23:32'),
	(294,296,15,'Edi Heryanto Sinaga S.I.Kom','9582794936',NULL,'2021-01-15 02:53:09','2021-01-21 08:23:32'),
	(295,297,15,'Zaenab Zahra Yolanda S.Kom','2770248342',NULL,'2021-01-15 02:53:09','2021-01-21 08:23:32'),
	(296,298,15,'Zulfa Sakura Yuliarti','0165905579',NULL,'2021-01-15 02:53:09','2021-01-21 08:23:32'),
	(297,299,15,'Siska Kuswandari','1196372679',NULL,'2021-01-15 02:53:09','2021-01-21 08:23:32'),
	(298,300,15,'Sidiq Pangestu','6929358538',NULL,'2021-01-15 02:53:09','2021-01-21 08:23:32'),
	(299,301,15,'Jumadi Najmudin','7763108469',NULL,'2021-01-15 02:53:09','2021-01-21 08:23:32'),
	(300,302,15,'Ghaliyati Fujiati','7201113547',NULL,'2021-01-15 02:53:09','2021-01-21 08:23:32'),
	(301,312,16,'Adi Budiman','81927392',NULL,'2021-01-22 09:20:04','2021-01-22 09:20:04'),
	(302,313,16,'Adriyan Triana Firmansyah','2837823',NULL,'2021-01-22 09:21:54','2021-01-22 09:21:54'),
	(303,314,16,'Ahmad Irfan Maulana','8723827',NULL,'2021-01-22 09:22:09','2021-01-22 09:22:09');

/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table task_uploads
# ------------------------------------------------------------

DROP TABLE IF EXISTS `task_uploads`;

CREATE TABLE `task_uploads` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `task_id` bigint unsigned NOT NULL,
  `student_id` bigint unsigned NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `task_uploads_task_id_foreign` (`task_id`),
  KEY `task_uploads_student_id_foreign` (`student_id`),
  CONSTRAINT `task_uploads_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `task_uploads_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `task_uploads` WRITE;
/*!40000 ALTER TABLE `task_uploads` DISABLE KEYS */;

INSERT INTO `task_uploads` (`id`, `task_id`, `student_id`, `file`, `note`, `created_at`, `updated_at`)
VALUES
	(7,3,1,'default.jpg','Iseng pak :)','2021-01-21 20:04:01',NULL),
	(8,6,303,'taskuploads/ACr7IcMSvTVbn53DKxHjLbbzGvs2aYmSoWj2cHkP.png','Maaf ya pak jelek hehe :)','2021-01-22 09:47:51','2021-01-22 09:47:51');

/*!40000 ALTER TABLE `task_uploads` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tasks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tasks`;

CREATE TABLE `tasks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `classroom_id` bigint unsigned NOT NULL,
  `course_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `max_date_upload` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_classroom_id_foreign` (`classroom_id`),
  KEY `tasks_course_id_foreign` (`course_id`),
  CONSTRAINT `tasks_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tasks_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;

INSERT INTO `tasks` (`id`, `classroom_id`, `course_id`, `title`, `file`, `description`, `max_date_upload`, `created_at`, `updated_at`)
VALUES
	(1,1,2,'Test','tasks/1au5Wq07EtwgnvasjmfAa2DBvXG1tDKNF0vl6Pvc.xml',NULL,'2021-01-30','2021-01-15 03:04:39','2021-01-15 03:04:39'),
	(2,1,1,'Membuat Layout','tasks/2Nnr7BGqOqeA0q8EBxP5rqZLqpujL4qdrRvw8oP9.xml',NULL,'2021-01-18','2021-01-16 23:19:34','2021-01-16 23:19:34'),
	(3,1,2,'Membuat Layout','tasks/ojQCsv7y7VhBGGD9jSML6yvk7lsWInK8JOh9CdBP.mp3',NULL,'2021-01-29','2021-01-21 05:02:06','2021-01-21 05:02:06'),
	(4,1,2,'Medicine Services','tasks/hqFMtoAvq3qG6dI2Xaew6TxcCgpT5s4jcN8HwYpV.png',NULL,'2021-02-01','2021-01-21 13:09:21','2021-01-21 13:09:21'),
	(5,1,2,'Medicine Services','tasks/XHgX5pqzzf3MywsikjTpZ7rKgBde7boWyRoJ4NqD.png',NULL,'2021-01-31','2021-01-22 02:30:18','2021-01-22 02:30:18'),
	(6,16,3,'Medicine Services','tasks/WTl7AdVVToXmgiGOTW4onkAdh2nMJaZ6tuzG0wsw.png',NULL,'2021-01-23','2021-01-22 09:41:59','2021-01-22 09:41:59');

/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table teachers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teachers`;

CREATE TABLE `teachers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teachers_user_id_foreign` (`user_id`),
  CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;

INSERT INTO `teachers` (`id`, `user_id`, `name`, `nip`, `status_id`, `created_at`, `updated_at`)
VALUES
	(1,2,'Parman Prasasta','6736787283',NULL,'2021-01-15 02:52:43','2021-01-15 02:52:43'),
	(7,307,'Ahmad Irfan Maulana','008923289',NULL,'2021-01-22 08:16:50','2021-01-22 08:16:50'),
	(8,308,'Ujang','87878787',NULL,'2021-01-22 09:09:32','2021-01-22 09:09:32'),
	(9,309,'Aceng','8782372',NULL,'2021-01-22 09:10:05','2021-01-22 09:10:05'),
	(10,310,'Amin','86823728',NULL,'2021-01-22 09:10:15','2021-01-22 09:10:15');

/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','teacher','student') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=315 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'admin',NULL,'$2y$10$mv4hiOkC8dp47Zr9nnK/2eFfv9xQtS4gx06rmAe1lgNBTq2nsEqQK','admin',NULL,'2021-01-15 02:52:43','2021-01-15 02:52:43'),
	(2,'teacher',NULL,'$2y$10$PZ8oMIT85CxxWsMJcbKjz.gusXNKSVQ/bAIvhEjHSIQtevblTiw9u','teacher',NULL,'2021-01-15 02:52:43','2021-01-22 08:51:17'),
	(3,'student1',NULL,'$2y$10$.wull7cNzLfYPAC5MEvsy.w7bpx1VMrBJh0fICbMiUniuGGOBAywW','student',NULL,'2021-01-15 02:52:43','2021-01-15 02:52:43'),
	(4,'student2',NULL,'$2y$10$oyWs2JJa2tokfe.07x9cNuGNunNLRfPMBF5Lf7J3Y0pKO0x/yQAo.','student',NULL,'2021-01-15 02:52:43','2021-01-15 02:52:43'),
	(5,'student3',NULL,'$2y$10$TkEqe8OWvNOfIMtUibRuAOJaj91ormkF/RoEim9ZQagC69TWawhl.','student',NULL,'2021-01-15 02:52:43','2021-01-15 02:52:43'),
	(6,'student4',NULL,'$2y$10$RainaiaWTQpRYsHX7Yxs/OTW5q9du6s0y5Z0gjOvMAasBwXxyNvhu','student',NULL,'2021-01-15 02:52:44','2021-01-15 02:52:44'),
	(7,'student5',NULL,'$2y$10$VecBte/ux1u18fTiwbqrcO5cQYPdZsPyCFz4kLalRZyiep3Sk1AYi','student',NULL,'2021-01-15 02:52:44','2021-01-15 02:52:44'),
	(8,'student6',NULL,'$2y$10$dVEgE0kTQWl9BKo69tlJ7uXSP688kuCS7SzvyaPjzlwXhlarq5FyO','student',NULL,'2021-01-15 02:52:44','2021-01-15 02:52:44'),
	(9,'student7',NULL,'$2y$10$9ac15bjicJjpjhaj/Yjn2uOMfG64NXuop.eY8YFmFp8rMA5pkT3GG','student',NULL,'2021-01-15 02:52:44','2021-01-15 02:52:44'),
	(10,'student8',NULL,'$2y$10$ovUIo8skLFOj9xNbm3/50eZYKk1tUQZDDvuMpZ6LDo7FlwlCTYgOq','student',NULL,'2021-01-15 02:52:44','2021-01-15 02:52:44'),
	(11,'student9',NULL,'$2y$10$A7cmK3zvCvH7QDty2UPIGOOnyTqoUCqC1RcKDTNVSLbqCuLRXeuIm','student',NULL,'2021-01-15 02:52:44','2021-01-15 02:52:44'),
	(12,'student10',NULL,'$2y$10$IGU4jl3.wLMm1xGwuMxSv.eM2qV6IL2v3GEXvgXU/gRBJfClJxiyi','student',NULL,'2021-01-15 02:52:44','2021-01-15 02:52:44'),
	(13,'student11',NULL,'$2y$10$fwrpr3rk6JzX9cf/9SCzdO2l7BOg5cUeUIPGG/BnrY.k6s1jaT/8a','student',NULL,'2021-01-15 02:52:44','2021-01-15 02:52:44'),
	(14,'student12',NULL,'$2y$10$v1jIaIuyunUWsiOQJSZF9u7OZSRRLh.U0k9YxeADLItOebojtMTOi','student',NULL,'2021-01-15 02:52:44','2021-01-15 02:52:44'),
	(15,'student13',NULL,'$2y$10$nFM7DrP0FvnePTE0v0mYjO/EGfsJDNdusM9Pc9b1z4teCQfpOQYaS','student',NULL,'2021-01-15 02:52:44','2021-01-15 02:52:44'),
	(16,'student14',NULL,'$2y$10$o1tawTCnF3kkQ8K9giGWzes5x6VWksQMcspLMDIa2kUKRG6yfvxla','student',NULL,'2021-01-15 02:52:44','2021-01-15 02:52:44'),
	(17,'student15',NULL,'$2y$10$AbvteLg44v8q6/zeoeeFNevqwvZA04vfLHjsWtTnv1mPOrQNYfADW','student',NULL,'2021-01-15 02:52:44','2021-01-15 02:52:44'),
	(18,'student16',NULL,'$2y$10$ohQlXiyeCwPl7OzUugUyUuo8JvliopJik2qX9fAiTiyutF3Dx8G6a','student',NULL,'2021-01-15 02:52:45','2021-01-15 02:52:45'),
	(19,'student17',NULL,'$2y$10$lcRH9tyct90NLYC6Jx9tMe6I6qe/qNeG/aCMHLvDbn7NoYrslA3.a','student',NULL,'2021-01-15 02:52:45','2021-01-15 02:52:45'),
	(20,'student18',NULL,'$2y$10$G3Ih1KLQ/GMYkenACmDWoOpy7GOwKqqH.77hou8XJyM/cvPSkFgtm','student',NULL,'2021-01-15 02:52:45','2021-01-15 02:52:45'),
	(21,'student19',NULL,'$2y$10$hsZRUvMr5x0p/ANQkgEkcO7EClU1WURbc0FEwnuy54ZDxMIeAPKEm','student',NULL,'2021-01-15 02:52:45','2021-01-15 02:52:45'),
	(22,'student20',NULL,'$2y$10$HgTe.B3mNUBFs7ayAzCkpOTmG7iKh5W7ZThRMG5P8eiN6IylDbshm','student',NULL,'2021-01-15 02:52:45','2021-01-15 02:52:45'),
	(23,'student21',NULL,'$2y$10$CgVODcpACtimLq4EpGLDT.XDtpnkSxKM4tJf.1EQfowkfvBnYK3Ju','student',NULL,'2021-01-15 02:52:45','2021-01-15 02:52:45'),
	(24,'student22',NULL,'$2y$10$fJu6UXFRAeQReLQqtsQnUOaU/jTi5OJtydX1gZGPZMUPxkoIhsnHK','student',NULL,'2021-01-15 02:52:45','2021-01-15 02:52:45'),
	(25,'student23',NULL,'$2y$10$q3u.eep5f6VDnbMv/61fKet9T2NA0Ej69oNARcz4stjZInj5h4YGe','student',NULL,'2021-01-15 02:52:45','2021-01-15 02:52:45'),
	(26,'student24',NULL,'$2y$10$57C5zZy4Sn.oSKcxTy5gXOhN8/z5pN.NjLy6VAOY.T7KvANCs23GW','student',NULL,'2021-01-15 02:52:45','2021-01-15 02:52:45'),
	(27,'student25',NULL,'$2y$10$bizifOzVQWOQkBiE8iv30e/6YxnVhGpVcgQpVoMnWTehC4y5xiX6.','student',NULL,'2021-01-15 02:52:45','2021-01-15 02:52:45'),
	(28,'student26',NULL,'$2y$10$4sam9i/VKTrTdbGPaXGOZugS3sF3eBl4/PO2Ay99a8s.zaXL9vWia','student',NULL,'2021-01-15 02:52:45','2021-01-15 02:52:45'),
	(29,'student27',NULL,'$2y$10$EfwxpnuBsSgvfhMhy7AAlOR2IctD68WRLv5JfmdlR3Vxz6z6ur55C','student',NULL,'2021-01-15 02:52:45','2021-01-15 02:52:45'),
	(30,'student28',NULL,'$2y$10$b0jKM8lDbDC7Fpp8isVIIex2bfcN2.pZmpBqat0Xa1MV4FekDkheO','student',NULL,'2021-01-15 02:52:45','2021-01-15 02:52:45'),
	(31,'student29',NULL,'$2y$10$UiPkeRdgZMV675gqpFOotuesdVOHfvMw12G0DYJbqN/T.ncmNGR7G','student',NULL,'2021-01-15 02:52:46','2021-01-15 02:52:46'),
	(32,'student30',NULL,'$2y$10$osIohDVV.VNaxjSPD1eiwe2RXKEKa9znueP4fC4zui.0KIIGHY5nO','student',NULL,'2021-01-15 02:52:46','2021-01-15 02:52:46'),
	(33,'student31',NULL,'$2y$10$DE8bpZZJvvasHF1JhEnsnusW6PX99EzmMHQ3U5PfBgskh4u5aGHF6','student',NULL,'2021-01-15 02:52:46','2021-01-15 02:52:46'),
	(34,'student32',NULL,'$2y$10$.d/VOEICXWw7ErFhgUElr./K21E7ybY7bCkP0Za/A87yZpkgA87EW','student',NULL,'2021-01-15 02:52:46','2021-01-15 02:52:46'),
	(35,'student33',NULL,'$2y$10$oLa1CS5p7bqfuL1D/oUyXuhvreQbvhItpl5YF6YckhzxChAG2dlMu','student',NULL,'2021-01-15 02:52:46','2021-01-15 02:52:46'),
	(36,'student34',NULL,'$2y$10$OmQziAawaCWP5cLkcG9cTeMv1luLLQ0.iiYPC64yFnmOfHoyTOmCS','student',NULL,'2021-01-15 02:52:46','2021-01-15 02:52:46'),
	(37,'student35',NULL,'$2y$10$CwdGXbbROVouUK24ImmEROZsnfQB/OjGXostwSw25AKpznCsz8G2e','student',NULL,'2021-01-15 02:52:46','2021-01-15 02:52:46'),
	(38,'student36',NULL,'$2y$10$Uj73QFDoRGCpESKEtS06j.AHh5TLz9jEf.UKC3vfXjYeRwKTrBrPq','student',NULL,'2021-01-15 02:52:46','2021-01-15 02:52:46'),
	(39,'student37',NULL,'$2y$10$CIuadoDMHD8Lo4ijZwImU.N71zMjv4WnM45QAs0ncUmFm.xRGp2eK','student',NULL,'2021-01-15 02:52:46','2021-01-15 02:52:46'),
	(40,'student38',NULL,'$2y$10$V8RyzSzBln30P0abjgNZf.wtQulXNTMMC8h6zjjrjvEwFezHY.QXq','student',NULL,'2021-01-15 02:52:46','2021-01-15 02:52:46'),
	(41,'student39',NULL,'$2y$10$TxwTh9g0LZgETeBxJF53J.AdpLDlQFTcyBbhC2mW20.bIFA4KlCUq','student',NULL,'2021-01-15 02:52:46','2021-01-15 02:52:46'),
	(42,'student40',NULL,'$2y$10$1gN3t11FCe4MGXpGSlD5K.IQgp5m0diimDIGQ91uZivEkeVRfoZxy','student',NULL,'2021-01-15 02:52:46','2021-01-15 02:52:46'),
	(43,'student41',NULL,'$2y$10$crnmOp5AZRbmgl6LJO4PLegbf70.RW5ZA3029Pq3dvzS0g.wJNb5.','student',NULL,'2021-01-15 02:52:47','2021-01-15 02:52:47'),
	(44,'student42',NULL,'$2y$10$LI.LbmjC5yFoymdQeG/nkuUPHa2nrNBo6ZdojMJIsukUHuHCi7be6','student',NULL,'2021-01-15 02:52:47','2021-01-15 02:52:47'),
	(45,'student43',NULL,'$2y$10$uv7CN/BFX9U3X1Hep8Fpqu3ci3FuYX.4QMkEXTPc36fBYFVKmJx/6','student',NULL,'2021-01-15 02:52:47','2021-01-15 02:52:47'),
	(46,'student44',NULL,'$2y$10$cXx/gFnDsvLRml8UlBLPLeb3uZ1nQwplxrKgvBtKmS./DqLYPtshi','student',NULL,'2021-01-15 02:52:47','2021-01-15 02:52:47'),
	(47,'student45',NULL,'$2y$10$2LrTj9UiAc2IRATMMF1r.um7aZqJW3stPqTDRENMNiTg94FZfWuUO','student',NULL,'2021-01-15 02:52:47','2021-01-15 02:52:47'),
	(48,'student46',NULL,'$2y$10$dOPxOflfASN59rTNfixZB.uBy5C3Gv5riXsLHpy80htbY4e2RJTxm','student',NULL,'2021-01-15 02:52:47','2021-01-15 02:52:47'),
	(49,'student47',NULL,'$2y$10$G2zNIqZJH.GwN6unYrUVTOmh99hF0mL4tk9GDQqpUxCZWgp4L5t06','student',NULL,'2021-01-15 02:52:47','2021-01-15 02:52:47'),
	(50,'student48',NULL,'$2y$10$k8v2Li8QiTV0KEFGlkIVcOuKtAU.i0NLK2lHo0fUlGz9qquXGy4VK','student',NULL,'2021-01-15 02:52:47','2021-01-15 02:52:47'),
	(51,'student49',NULL,'$2y$10$xZxgLzwBS.ygtu.tiI8l1uj/AGUxhkVX501nXrqma.CVKmhaXd1m.','student',NULL,'2021-01-15 02:52:47','2021-01-15 02:52:47'),
	(52,'student50',NULL,'$2y$10$xCKwduURcr92CaAlCGAaGOSIdeLPwI/G2UGalYgfB9KgKV2O8VwFe','student',NULL,'2021-01-15 02:52:47','2021-01-15 02:52:47'),
	(53,'student51',NULL,'$2y$10$erZ2rSzQiBA0cmRdqVcfbuPZT6SMZxux7/TBotsvisXaFhTNo44DG','student',NULL,'2021-01-15 02:52:47','2021-01-15 02:52:47'),
	(54,'student52',NULL,'$2y$10$O3bEAwFgbn4hVENKirjJz.yoQktZzcZGZkRfh2iVOsRwewVdAooNe','student',NULL,'2021-01-15 02:52:47','2021-01-15 02:52:47'),
	(55,'student53',NULL,'$2y$10$Aq0mdFOAB5/K4feb86xOv.q5F0dHVpQ.VFV6VaDsRy6RHIin2Gg22','student',NULL,'2021-01-15 02:52:48','2021-01-15 02:52:48'),
	(56,'student54',NULL,'$2y$10$UvSNViYc6nId0LUFQc0Xg.tTXCrrDtU/pOqD6l9WeMZxI5GFriYCq','student',NULL,'2021-01-15 02:52:48','2021-01-15 02:52:48'),
	(57,'student55',NULL,'$2y$10$v8N8WtkPl39piH9MtoJtNO7vSGU2j7F7MdwTTc32phgkdzumSr7C6','student',NULL,'2021-01-15 02:52:48','2021-01-15 02:52:48'),
	(58,'student56',NULL,'$2y$10$sZ62TvnaegkGowzZO2YhjO0D3vyLIi.aQSSuhOY3egMuQ9hVXj8BC','student',NULL,'2021-01-15 02:52:48','2021-01-15 02:52:48'),
	(59,'student57',NULL,'$2y$10$rZBi0jLIA1T37uf4kBmMAuEdFwfjLURsQdkge5UUpMB3jqdcFUgJ.','student',NULL,'2021-01-15 02:52:48','2021-01-15 02:52:48'),
	(60,'student58',NULL,'$2y$10$d5TB3xa5u/kpD277ZOfZK.JEFo5j93zQgtXqKq4x7qnwwmVsazaTG','student',NULL,'2021-01-15 02:52:48','2021-01-15 02:52:48'),
	(61,'student59',NULL,'$2y$10$NTwdmzbQrXMv0sQp9m2wXucL69CWQt8L7jDY4et8nbdhM7DaITgde','student',NULL,'2021-01-15 02:52:48','2021-01-15 02:52:48'),
	(62,'student60',NULL,'$2y$10$3UdIRBbjFbyBNNOSq//Nk.DV2w/i69KTdNIpsj.fMG7MHIMN1MNE2','student',NULL,'2021-01-15 02:52:48','2021-01-15 02:52:48'),
	(63,'student61',NULL,'$2y$10$85gE5WDTl02rhEG7CeYYSe9BLribw6Qy3nVBXbG6XT5yDehPUQEOm','student',NULL,'2021-01-15 02:52:48','2021-01-15 02:52:48'),
	(64,'student62',NULL,'$2y$10$SxPmiGlc9zyx.MaIVr12p.xqs4F4VrIgZI81nEbjghViuSsNqQUnm','student',NULL,'2021-01-15 02:52:48','2021-01-15 02:52:48'),
	(65,'student63',NULL,'$2y$10$ZCfdQqSB7IaUojEhFomLF.RX7PV80lJwTNXyOz66/wmAUna1NRfja','student',NULL,'2021-01-15 02:52:48','2021-01-15 02:52:48'),
	(66,'student64',NULL,'$2y$10$cMQH.bNu8Y70gAhLiLV1keIoZ31KertbMUmAM70LhzbXRolubBTui','student',NULL,'2021-01-15 02:52:48','2021-01-15 02:52:48'),
	(67,'student65',NULL,'$2y$10$/1AMs9IOIWQt1Lk7OfTFGuz5bKkeIJ7FeSdjhdyC6KKKzHfP1KqNq','student',NULL,'2021-01-15 02:52:48','2021-01-15 02:52:48'),
	(68,'student66',NULL,'$2y$10$q9pK6sZ/1yAHIF62dVek6eiyOJUWlrrmrCRaAH3AGJoUcqglA/BIO','student',NULL,'2021-01-15 02:52:49','2021-01-15 02:52:49'),
	(69,'student67',NULL,'$2y$10$XDNPCPKIr5ztGJOVkYF3uedGIR0GZ6OnlYS2wUnr3j.EAB3FgdVtW','student',NULL,'2021-01-15 02:52:49','2021-01-15 02:52:49'),
	(70,'student68',NULL,'$2y$10$qD5lgmJa3mYIxYbFXoH5QuGxiUgEemHmy2uAvxcqyWxU/9NaMIIn6','student',NULL,'2021-01-15 02:52:49','2021-01-15 02:52:49'),
	(71,'student69',NULL,'$2y$10$oUVqRMTkAV5psv4ARTFUhucKlkOv1FvrNd3PVjlpBWCnFW6TBM6g6','student',NULL,'2021-01-15 02:52:49','2021-01-15 02:52:49'),
	(72,'student70',NULL,'$2y$10$7VGGPlU25mSMbrb0.s4fy.cs51.Nsmz8ol5mB7Cor1MXKc3XUl/iC','student',NULL,'2021-01-15 02:52:49','2021-01-15 02:52:49'),
	(73,'student71',NULL,'$2y$10$WdOEDVAJF28EHNbWsb96U.5aVi1Np/5HemQ9ZvcTpwyZK7bNfbW6e','student',NULL,'2021-01-15 02:52:49','2021-01-15 02:52:49'),
	(74,'student72',NULL,'$2y$10$a8ogL9HIhgBpjNNYIPXwuuPrV4yVKNLq8CF1smU9ozB4uUR1F0L/K','student',NULL,'2021-01-15 02:52:49','2021-01-15 02:52:49'),
	(75,'student73',NULL,'$2y$10$/gPbfMSRu8IPeNJpzxvnveZBp0vwHdRs5mEXCumBS6yiHYRpyh.2.','student',NULL,'2021-01-15 02:52:49','2021-01-15 02:52:49'),
	(76,'student74',NULL,'$2y$10$fN0qnEXE/ZRRZsWx2HskcOOa9Usm5BtbqhIIg7qaia/Tqc5Hbpt5i','student',NULL,'2021-01-15 02:52:49','2021-01-15 02:52:49'),
	(77,'student75',NULL,'$2y$10$/h/7mziQxNx1enckxrW5OumpQfe/skZBjZ.VpcRUt9ECIy.n9M8JG','student',NULL,'2021-01-15 02:52:49','2021-01-15 02:52:49'),
	(78,'student76',NULL,'$2y$10$UIjukUa8B.fTem7JJkLdUeiuGJ14SmJlbRxfR5/cD4VfBMhH/LFiS','student',NULL,'2021-01-15 02:52:49','2021-01-15 02:52:49'),
	(79,'student77',NULL,'$2y$10$zIItgaHs/X.RrDq1yx/d6OZbllqrzXBL5IrR7UHCuqwqFD7mzKXoi','student',NULL,'2021-01-15 02:52:49','2021-01-15 02:52:49'),
	(80,'student78',NULL,'$2y$10$ditM.ajxOwSnXuUbvFzgu.zCdKpk8N3ySZdQDUWtmA8Utf5Hv7aEW','student',NULL,'2021-01-15 02:52:50','2021-01-15 02:52:50'),
	(81,'student79',NULL,'$2y$10$kEKgX8GASUuXUvcPHqoqJOcxRS7Dh1zAt6kWqEFnviGHQHEBi.rDO','student',NULL,'2021-01-15 02:52:50','2021-01-15 02:52:50'),
	(82,'student80',NULL,'$2y$10$AnjrzbDOH5Wj1ninvce.S.pT8hUKfj60cy/x8ncyR7ASzlAsBIKze','student',NULL,'2021-01-15 02:52:50','2021-01-15 02:52:50'),
	(83,'student81',NULL,'$2y$10$vcbBitGg.Botak3eFceakuffjzvJEqyNBn4ljd/2WBPo50cAn3Dwe','student',NULL,'2021-01-15 02:52:50','2021-01-15 02:52:50'),
	(84,'student82',NULL,'$2y$10$472jNGqwQ3aiwHqdpOA7xuRAnIWE6k9IDD7lRsu8IRJU9GiOx/5Se','student',NULL,'2021-01-15 02:52:50','2021-01-15 02:52:50'),
	(85,'student83',NULL,'$2y$10$r6I1p052srHJhDJ1kYDZ7ugtsyx2gB6GeBZqtJucryWKI7m6onolu','student',NULL,'2021-01-15 02:52:50','2021-01-15 02:52:50'),
	(86,'student84',NULL,'$2y$10$Lhw5/DpANzoRzGEbSG0hU.2Y2EMXdQBVCyqVCqs5NBmokIXdYITFe','student',NULL,'2021-01-15 02:52:50','2021-01-15 02:52:50'),
	(87,'student85',NULL,'$2y$10$c7vcxoNbKfglOswqjKmLaumKyKUr88iTFmubg0jJDIfCjhNiGjstm','student',NULL,'2021-01-15 02:52:50','2021-01-15 02:52:50'),
	(88,'student86',NULL,'$2y$10$McxaaYS6D/R0GEPrnuy9EuSRphHBP.cJ.EDGvacCeR9WcvzyH7/Xy','student',NULL,'2021-01-15 02:52:50','2021-01-15 02:52:50'),
	(89,'student87',NULL,'$2y$10$3ymH4jE9yN0VgOo6sm0gQ.iCPYf.gOEK0VFMami4fPiBOd3tXFtF6','student',NULL,'2021-01-15 02:52:50','2021-01-15 02:52:50'),
	(90,'student88',NULL,'$2y$10$msolmYs.XKIKaoRzRHsAQeeh8ekaNln88piCRv7kgr7t9Djcc6CYC','student',NULL,'2021-01-15 02:52:50','2021-01-15 02:52:50'),
	(91,'student89',NULL,'$2y$10$Xxj4zLD1pOP1cJjcgRCN3.ZUMXLovhxYuA34vmyryjudUog5cQPK2','student',NULL,'2021-01-15 02:52:50','2021-01-15 02:52:50'),
	(92,'student90',NULL,'$2y$10$6jdJPh3o4NE6X53iYi0nReGCekdlvzGMtB1TS42OXEQLPhRNQkpDO','student',NULL,'2021-01-15 02:52:51','2021-01-15 02:52:51'),
	(93,'student91',NULL,'$2y$10$ymC71rLzp6DIOw6mxcvBEe5vT2obtgjegC2Jhw9fJ96lwy2dWQvQ2','student',NULL,'2021-01-15 02:52:51','2021-01-15 02:52:51'),
	(94,'student92',NULL,'$2y$10$b.frligtuvlfEtn0jmopR.d1eCZ1/UnlFo3ah8tH8kia4siM90eV2','student',NULL,'2021-01-15 02:52:51','2021-01-15 02:52:51'),
	(95,'student93',NULL,'$2y$10$gVEJ86eq.Q3Xx2YfZTQlo.ek6wbpvH/rANcB.WspgVTgy7Aquaqba','student',NULL,'2021-01-15 02:52:51','2021-01-15 02:52:51'),
	(96,'student94',NULL,'$2y$10$Zwxyz2DsWDDat5h44z8ZzuEf7WHgfh.uVqzWDncWjHi/HL.FHk1q6','student',NULL,'2021-01-15 02:52:51','2021-01-15 02:52:51'),
	(97,'student95',NULL,'$2y$10$lGQebCb6CMDgq4maI6JoUeM2CxFIhiJzPW8XSfE/haeUHr0ipkKxW','student',NULL,'2021-01-15 02:52:51','2021-01-15 02:52:51'),
	(98,'student96',NULL,'$2y$10$TEBtcHexdMPtyE9508E60uMwIBAYrGG8yKMuULMoVxCL6BxQvXAde','student',NULL,'2021-01-15 02:52:51','2021-01-15 02:52:51'),
	(99,'student97',NULL,'$2y$10$uGbBJm55.2uD38I.SdCi0ObsAYD.2RW0qJX8LcOT6EwrVbvVHYaIC','student',NULL,'2021-01-15 02:52:51','2021-01-15 02:52:51'),
	(100,'student98',NULL,'$2y$10$0tpfKmpqNstvO2KeJz84XOqZcjJeqidsXtiwgBmfSgxwqDyHI8/I6','student',NULL,'2021-01-15 02:52:51','2021-01-15 02:52:51'),
	(101,'student99',NULL,'$2y$10$cfhBMs2nvtd4tg4Mza9ZDOTCPyd.dYSSe9p0PwsWbhPy5yG.E9yOO','student',NULL,'2021-01-15 02:52:51','2021-01-15 02:52:51'),
	(102,'student100',NULL,'$2y$10$zLGFyASlYgSPt9GX0IWIKORkko9G21C69kYvje4a9X.sJ/z6fRZZ.','student',NULL,'2021-01-15 02:52:51','2021-01-15 02:52:51'),
	(103,'student101',NULL,'$2y$10$cG7IBiDgIqNVBu8nQ0hAj.prjD9h6dvUqJ1G2n6fnwTBWc7X6rT1e','student',NULL,'2021-01-15 02:52:51','2021-01-15 02:52:51'),
	(104,'student102',NULL,'$2y$10$khh4eI45iAJZIBFwNZFw8ueagjhmZKFMe2ToALTgkMknkgGS9wuzO','student',NULL,'2021-01-15 02:52:52','2021-01-15 02:52:52'),
	(105,'student103',NULL,'$2y$10$pgA4UifHDYwJeG0QmIIJAuendydVNcGmj6CLtJ/UuH0Ao/vBx/R96','student',NULL,'2021-01-15 02:52:52','2021-01-15 02:52:52'),
	(106,'student104',NULL,'$2y$10$4x8B57wLe3GewHQ4hR0Y5uE1Llkt75qWprNnuXO2Z2g.bljbYIuXC','student',NULL,'2021-01-15 02:52:52','2021-01-15 02:52:52'),
	(107,'student105',NULL,'$2y$10$OhNTobh5OtNIv2s/tuMy7OlNagdqUTZIEoKkgkE.fdK34zsZzSIhq','student',NULL,'2021-01-15 02:52:52','2021-01-15 02:52:52'),
	(108,'student106',NULL,'$2y$10$TqIZcQEGnRJBTF.Hynpub.sy/xJD7mCsQIXoJCbpg3eovLh1tce32','student',NULL,'2021-01-15 02:52:52','2021-01-15 02:52:52'),
	(109,'student107',NULL,'$2y$10$EkhAMcDt.2la9Bd8y/pn/uaLAfbhTjZEYtaEsG9BDJTUQP9I1fdoy','student',NULL,'2021-01-15 02:52:52','2021-01-15 02:52:52'),
	(110,'student108',NULL,'$2y$10$rTsDIxR5njrap2.lCxoLm.9oC4IYB9TcHCrbZ8Zfpd7.V5rdpyXa6','student',NULL,'2021-01-15 02:52:52','2021-01-15 02:52:52'),
	(111,'student109',NULL,'$2y$10$zbobVjNBoYwppBTqFJsSeuno35.3PDD9BLpHKsYDr9sBcpb0/xFmu','student',NULL,'2021-01-15 02:52:52','2021-01-15 02:52:52'),
	(112,'student110',NULL,'$2y$10$ZrNlwRVr0nXjgh9XCXt0COfKp67k9qgrBcUfnWccX7VvDVxGIBq4G','student',NULL,'2021-01-15 02:52:52','2021-01-15 02:52:52'),
	(113,'student111',NULL,'$2y$10$LoTeU9qig3d1HW3iB7t6ne562Uj9x1gR75B9dmuB/AJwqKlSj8xoS','student',NULL,'2021-01-15 02:52:52','2021-01-15 02:52:52'),
	(114,'student112',NULL,'$2y$10$pYFhQbbA02Ki3duWvtfIYeDDMIZi6.aFgXyoFsZSsxSj4i5Qqrmn6','student',NULL,'2021-01-15 02:52:52','2021-01-15 02:52:52'),
	(115,'student113',NULL,'$2y$10$8H1Ib6Ro7hlWHLix4BPbsu.ud.yQFIKW86.0YSwp4OXzAGIqmNGb2','student',NULL,'2021-01-15 02:52:52','2021-01-15 02:52:52'),
	(116,'student114',NULL,'$2y$10$hgXOP/.QgKkW2OPZgnuqQ.ZFA/6j9rQSWL2ELd.RJkwgqiYpar8N.','student',NULL,'2021-01-15 02:52:52','2021-01-15 02:52:52'),
	(117,'student115',NULL,'$2y$10$ujIhckl4UH2y9yI5hXZOkOdghhCrFEZLPggXWwuemkmPqlQKE3G/e','student',NULL,'2021-01-15 02:52:53','2021-01-15 02:52:53'),
	(118,'student116',NULL,'$2y$10$ykuodr7cxyxH6ksT.5w38eiT8E/l6HV7eZIjeP425A5V6tYrH1Uwe','student',NULL,'2021-01-15 02:52:53','2021-01-15 02:52:53'),
	(119,'student117',NULL,'$2y$10$niN0iFPi5J44oQB8qdLAD.icLn0m07AOGNGxsEwsthVE8GhjsQPGG','student',NULL,'2021-01-15 02:52:53','2021-01-15 02:52:53'),
	(120,'student118',NULL,'$2y$10$nYTXRFEi5gGxlpW0VUbO2eP4Puq6teNS.Rhqgm0MQpgofJWZ1Ljku','student',NULL,'2021-01-15 02:52:53','2021-01-15 02:52:53'),
	(121,'student119',NULL,'$2y$10$7cedi71PkCAGrmDUd0.c3OzofoEO9O2ZURV53G.RaOCOjsBwRnbiC','student',NULL,'2021-01-15 02:52:53','2021-01-15 02:52:53'),
	(122,'student120',NULL,'$2y$10$1/m6Xm9G3N/xuWjUMO3Ui.dO754n.aovCRGi68ewoBqdFknsN6Fhq','student',NULL,'2021-01-15 02:52:53','2021-01-15 02:52:53'),
	(123,'student121',NULL,'$2y$10$NOHoPMQqdfve/NIaELj.feUl4rDCALB1IuZC10ryKMDsfXg1/fBSO','student',NULL,'2021-01-15 02:52:53','2021-01-15 02:52:53'),
	(124,'student122',NULL,'$2y$10$p1A8M8RXNUOjTPLv.Wfdkuli5skWwbXZn7kaBbhNn.pkWUsQrQ1rG','student',NULL,'2021-01-15 02:52:53','2021-01-15 02:52:53'),
	(125,'student123',NULL,'$2y$10$U0itfJvHR468K8Ke6JzHvOEoEajrWZazWsFJeO/fHk.cZ1T4oJ6te','student',NULL,'2021-01-15 02:52:53','2021-01-15 02:52:53'),
	(126,'student124',NULL,'$2y$10$eHC6GHfO6GYLigG57UvCuOL4KyDi42tmj1tpNJqNGYw.TFTzMSMja','student',NULL,'2021-01-15 02:52:53','2021-01-15 02:52:53'),
	(127,'student125',NULL,'$2y$10$LbmLb9f8CMbwHTXiFKxKOetjHfchX.hwYHRR1QrdcL6HXPaUoX/oC','student',NULL,'2021-01-15 02:52:53','2021-01-15 02:52:53'),
	(128,'student126',NULL,'$2y$10$FBfIsBKH705GN383l3y1guwYqxqnWQdRyYJ39MihQHMyyE7FfU0zW','student',NULL,'2021-01-15 02:52:53','2021-01-15 02:52:53'),
	(129,'student127',NULL,'$2y$10$3n5oOEXvZMlmErVQZhrtX.O.zDff/MzlKXrCoRECMJhNreX0soId2','student',NULL,'2021-01-15 02:52:54','2021-01-15 02:52:54'),
	(130,'student128',NULL,'$2y$10$y5wQn0I7.xgUYU7kyeD2jeMthzGD3tLU73KWxd3g.PnItofhQXaT2','student',NULL,'2021-01-15 02:52:54','2021-01-15 02:52:54'),
	(131,'student129',NULL,'$2y$10$suNv6dpLsb9a6Cjq8xvLjOw.5q1039RRDjZZN2pyy/XzGrJZmCRVO','student',NULL,'2021-01-15 02:52:54','2021-01-15 02:52:54'),
	(132,'student130',NULL,'$2y$10$5VWyD5gZyUjlVZ6Dt1rwo.OTeFhXoHJ5goK.fxcK45SNewPw./Mki','student',NULL,'2021-01-15 02:52:54','2021-01-15 02:52:54'),
	(133,'student131',NULL,'$2y$10$50/aGnIuT2TtQdtn2iCl1OoSxT/u3Dnb0.7KUPQCtFLv/RR.0LAc2','student',NULL,'2021-01-15 02:52:54','2021-01-15 02:52:54'),
	(134,'student132',NULL,'$2y$10$Qh7gpuZAQxeHFtSo/1tabOQYVuRHxntqelDKutoCGydwvxc/8Tl2q','student',NULL,'2021-01-15 02:52:54','2021-01-15 02:52:54'),
	(135,'student133',NULL,'$2y$10$uSHI26ATN22EwYhh7Fo8zudn54TcahWVVIIC30j1M33tMZ1pLfRCG','student',NULL,'2021-01-15 02:52:54','2021-01-15 02:52:54'),
	(136,'student134',NULL,'$2y$10$GnK92/CnGxG2A9cFLjs2hePtwcHACENi0Ye2IsjynltFY5unYZuEG','student',NULL,'2021-01-15 02:52:54','2021-01-15 02:52:54'),
	(137,'student135',NULL,'$2y$10$wSY7ppKEkr1.dbM.5vU0k.XjsdYTSWNfHPqxNuFA/QOczQeSH6p16','student',NULL,'2021-01-15 02:52:54','2021-01-15 02:52:54'),
	(138,'student136',NULL,'$2y$10$mGuN.KKgm2GomvaFxlZx/ujfXJjeGGK8ELY1TUOcMgywv7lweJcfK','student',NULL,'2021-01-15 02:52:54','2021-01-15 02:52:54'),
	(139,'student137',NULL,'$2y$10$VmJt681k.6fibD3iTJLuzuFVzo6oYH9hdPGVjpGXmPkCqshIzNgtC','student',NULL,'2021-01-15 02:52:54','2021-01-15 02:52:54'),
	(140,'student138',NULL,'$2y$10$bVJA4pXlic1x7sAiJFHq1e7yKHT0p/VCM/6YvYsBcvp6EHqpRshFy','student',NULL,'2021-01-15 02:52:54','2021-01-15 02:52:54'),
	(141,'student139',NULL,'$2y$10$ipdQ75jCIn/hUhSHIXJTD.G7UnOHzBvmUKObNt.sJTE31TlEdVEUS','student',NULL,'2021-01-15 02:52:55','2021-01-15 02:52:55'),
	(142,'student140',NULL,'$2y$10$tYn6dajYsU1oO863PuAR4.fCi8ObOD/QYTV.R2Rujv0Ij7nHPQMTm','student',NULL,'2021-01-15 02:52:55','2021-01-15 02:52:55'),
	(143,'student141',NULL,'$2y$10$35JfqIq2Z/i.z5dUTMf60.mWpRhq.NQnyF3oX2Y3Lsmf8fBmUSHTy','student',NULL,'2021-01-15 02:52:55','2021-01-15 02:52:55'),
	(144,'student142',NULL,'$2y$10$Hley3GbbtTffmwF9RBw4LuGhJro5o/9omb0EK8qSQ2/4Dhw/EE4cS','student',NULL,'2021-01-15 02:52:55','2021-01-15 02:52:55'),
	(145,'student143',NULL,'$2y$10$WebOlrxaPfHn0/uID.nR9e2eM6416BeVNvOQHtfWCfWgP5z398X8u','student',NULL,'2021-01-15 02:52:55','2021-01-15 02:52:55'),
	(146,'student144',NULL,'$2y$10$Ew0KUtyseJH.mOAFg7Id8uZZ7c0eKjbfLyJllOuVXyryFfTWpAt4q','student',NULL,'2021-01-15 02:52:55','2021-01-15 02:52:55'),
	(147,'student145',NULL,'$2y$10$w6So10v4BdUZNMHKuPzyJ.zO5hO7z5b3rsZLJn5zcwbLOtHdq/SpC','student',NULL,'2021-01-15 02:52:55','2021-01-15 02:52:55'),
	(148,'student146',NULL,'$2y$10$TpSQOtJY4wcD/5DLkENYruXK3kL0idA1.CLiGMYjT2CgAhXhfbExi','student',NULL,'2021-01-15 02:52:55','2021-01-15 02:52:55'),
	(149,'student147',NULL,'$2y$10$z2lOCurnFFhbS/F9r1rkCOGJA/gQlD.6v36QZcOxI4Gjq7./lI2ma','student',NULL,'2021-01-15 02:52:55','2021-01-15 02:52:55'),
	(150,'student148',NULL,'$2y$10$10NQgOtR2KdDzLWzQYHT9u5ByaZY6gaQGeG.ddN.2ltTuPfHjzUUa','student',NULL,'2021-01-15 02:52:55','2021-01-15 02:52:55'),
	(151,'student149',NULL,'$2y$10$cWwK3L6BleBDUHqtrRVCaOnP3Cc1JvPZQJzUz.erSp5BZ5xS7qODK','student',NULL,'2021-01-15 02:52:55','2021-01-15 02:52:55'),
	(152,'student150',NULL,'$2y$10$a8mOSuXf1eCeXLoSoCTiGuWumFc6XpfpsXRE7fmXtroRJRyDkAVZG','student',NULL,'2021-01-15 02:52:55','2021-01-15 02:52:55'),
	(153,'student151',NULL,'$2y$10$9PaQrsuPTsdLOh8IonJ8A.sxEzVKp/p1ZzU4HyXKiBHsOCkox1.oa','student',NULL,'2021-01-15 02:52:55','2021-01-15 02:52:55'),
	(154,'student152',NULL,'$2y$10$/u4hVa8n0FNYmsRiERPPiOA9HLGn.w9xbygGvO0emlrNCOTS5tcAW','student',NULL,'2021-01-15 02:52:56','2021-01-15 02:52:56'),
	(155,'student153',NULL,'$2y$10$/EdmAJ7yLDMS1lmG0fm3oOXtNyCpvgYW2rM86y0T5MimM/7cqaQ8K','student',NULL,'2021-01-15 02:52:56','2021-01-15 02:52:56'),
	(156,'student154',NULL,'$2y$10$t4hP8A/3M3VjRpVI5axAneDkaLruTaId4uekhxMtCADYu0BpUYocG','student',NULL,'2021-01-15 02:52:56','2021-01-15 02:52:56'),
	(157,'student155',NULL,'$2y$10$rT9tuz1K8gkh131LFJUWyOX6iA1iLpeQFWcycXVgyNDN6vFsJAVd2','student',NULL,'2021-01-15 02:52:56','2021-01-15 02:52:56'),
	(158,'student156',NULL,'$2y$10$1/OIm0jWgu6xU72ilW0oTOd4bOFXlzgy7el9EUA4U6aDE55/kMKUa','student',NULL,'2021-01-15 02:52:56','2021-01-15 02:52:56'),
	(159,'student157',NULL,'$2y$10$9dgTbeoXbYy3fV7ytI4ivere9LbkDvJxaCVy6tMNeuDQOlWPsFm.u','student',NULL,'2021-01-15 02:52:56','2021-01-15 02:52:56'),
	(160,'student158',NULL,'$2y$10$ICNJGxAjfQc/olG5uDtmZOE70igMb/PwQHLLEfTME9AFXToi5S7PO','student',NULL,'2021-01-15 02:52:56','2021-01-15 02:52:56'),
	(161,'student159',NULL,'$2y$10$tzXgamuGvt5Q5U44KTRfH.FqorS0dK7B6fVtI0z.xcq1XoJYNmpv6','student',NULL,'2021-01-15 02:52:56','2021-01-15 02:52:56'),
	(162,'student160',NULL,'$2y$10$4QTboeD6OAFiEW3IqEXuj.V65nStm4hu0TmMybtsKC8RckA.Xt8cm','student',NULL,'2021-01-15 02:52:56','2021-01-15 02:52:56'),
	(163,'student161',NULL,'$2y$10$afE9XouPb8ykxony06wNg.50Gazug.nnkGJiRmxv/Dl42teCfgf2W','student',NULL,'2021-01-15 02:52:56','2021-01-15 02:52:56'),
	(164,'student162',NULL,'$2y$10$TxYg.3sYi7YwR8Bo6LcC6.WlOyHuOT/jCAtUzhva4YWlQVa7I93Sm','student',NULL,'2021-01-15 02:52:56','2021-01-15 02:52:56'),
	(165,'student163',NULL,'$2y$10$K9PnXBKz/KormbCt7jz6VeXwT/gy67q.M.Dn/vbdgLxckyCHeLVia','student',NULL,'2021-01-15 02:52:56','2021-01-15 02:52:56'),
	(166,'student164',NULL,'$2y$10$XUMc14tZDbg0VFfpnVvSLe6aikubgk.EklbgCItB5Mzm0gvOpn00a','student',NULL,'2021-01-15 02:52:57','2021-01-15 02:52:57'),
	(167,'student165',NULL,'$2y$10$F5q8zvKxECroWxuy5kbx3O4i1YBYd/tLNPVnMfoMfAp6ghoWjKCM2','student',NULL,'2021-01-15 02:52:57','2021-01-15 02:52:57'),
	(168,'student166',NULL,'$2y$10$oJxQsDEkyyAvEuPweArS0e1TgzHfLvmfaDL84sS6V5nk6C15V4.16','student',NULL,'2021-01-15 02:52:57','2021-01-15 02:52:57'),
	(169,'student167',NULL,'$2y$10$1KjZ5T//AYYXoMfllwdeJeFufo40DRL5DSBQkKNQz050kxuXh6z0e','student',NULL,'2021-01-15 02:52:57','2021-01-15 02:52:57'),
	(170,'student168',NULL,'$2y$10$7nbLAyXbXKQfLqJjl2BCQOOgJuH9PlxLo3yEsJBKvCieRpqPsysyW','student',NULL,'2021-01-15 02:52:57','2021-01-15 02:52:57'),
	(171,'student169',NULL,'$2y$10$FWGBtW9CNYzo0SWIfPrMa.1AzFhMaqxTNJAngTs3Ned5ZRP3ZhXgu','student',NULL,'2021-01-15 02:52:57','2021-01-15 02:52:57'),
	(172,'student170',NULL,'$2y$10$0iVtteXosPK0OM9h604hgeffvR8P27rYilQOwj.8GH5uam4JXhsO2','student',NULL,'2021-01-15 02:52:57','2021-01-15 02:52:57'),
	(173,'student171',NULL,'$2y$10$kxTlweR5Onl3JlXi/gbNeeZB05dgK9UN84XdzwNVLDomRL0pecuyy','student',NULL,'2021-01-15 02:52:57','2021-01-15 02:52:57'),
	(174,'student172',NULL,'$2y$10$HPs.JpkJTVdbQZ86Ki4BUOsQQ50W2m8ui8wU55T64.lqCudXpRkMK','student',NULL,'2021-01-15 02:52:57','2021-01-15 02:52:57'),
	(175,'student173',NULL,'$2y$10$pwucW.0JXY.G/MsjAXtYSeQOz.Fqfw1YX0NcxAR6Uzt9EcboUml9S','student',NULL,'2021-01-15 02:52:57','2021-01-15 02:52:57'),
	(176,'student174',NULL,'$2y$10$cAYQzF6oY6oY5cvFUZyTOOqGKl0wvXhKLttReYI/GWk4bUiKtFAe6','student',NULL,'2021-01-15 02:52:57','2021-01-15 02:52:57'),
	(177,'student175',NULL,'$2y$10$eBfGLpkxbl908YhOzN/3pufI7AlwE9wrhZ0sKQctDWDVdhW5hdjTq','student',NULL,'2021-01-15 02:52:57','2021-01-15 02:52:57'),
	(178,'student176',NULL,'$2y$10$orDs5dcGdFwqovP66plMteRkQ4hMorLQGNqIvKMkTpS77ZDgV2Mhi','student',NULL,'2021-01-15 02:52:58','2021-01-15 02:52:58'),
	(179,'student177',NULL,'$2y$10$.A72FnaB3J18Yo9UCNBeNe7ice5IkMetaw4vxC3KIaAf90QJuAGUa','student',NULL,'2021-01-15 02:52:58','2021-01-15 02:52:58'),
	(180,'student178',NULL,'$2y$10$g2ck7kPf8h3wtDg6G7xsmuvNUWXNIsvVcZ.NRTNMyrmuZKq81hMQG','student',NULL,'2021-01-15 02:52:58','2021-01-15 02:52:58'),
	(181,'student179',NULL,'$2y$10$qpeSqFAqTOV.B5MtPBVIbuRHqm6N0KNQLbMtAcI8EOFBmF0vZv7L6','student',NULL,'2021-01-15 02:52:58','2021-01-15 02:52:58'),
	(182,'student180',NULL,'$2y$10$026PtoElokOafvHos3FI.eVxnU88YAeZXB/aOSkTgj40Fz8TRMOkm','student',NULL,'2021-01-15 02:52:58','2021-01-15 02:52:58'),
	(183,'student181',NULL,'$2y$10$rFb7vmsD6hmMLO0Q7SciyeGA2OkFSmJpdt/pkug1StxAkinC0BXDy','student',NULL,'2021-01-15 02:52:58','2021-01-15 02:52:58'),
	(184,'student182',NULL,'$2y$10$1OiTTeuyGMZRSkMAyWHC9u8/KElXvNZp0qxPmNg6IUKHA/CLoHcCi','student',NULL,'2021-01-15 02:52:58','2021-01-15 02:52:58'),
	(185,'student183',NULL,'$2y$10$HW9KQmJunnXtL74amZ/9fuz7ATL1MIROCtsNPOqvfqsH4JfI32tyO','student',NULL,'2021-01-15 02:52:58','2021-01-15 02:52:58'),
	(186,'student184',NULL,'$2y$10$MZnMGI0nwO4HmAmaDyqOmeHupc54Mwp3YmXDu7NJZgxprFIysxyM.','student',NULL,'2021-01-15 02:52:58','2021-01-15 02:52:58'),
	(187,'student185',NULL,'$2y$10$KDlCYkHiUO0NpbIONenmpOIgcH0dsqZ1kEE3GIRDzXTXslE8jwPyO','student',NULL,'2021-01-15 02:52:58','2021-01-15 02:52:58'),
	(188,'student186',NULL,'$2y$10$TIby1ckV.KsUL59y48wXbOP/7Jfb9YmZ0/OBGxaAL0g/SBbIOQzLy','student',NULL,'2021-01-15 02:52:58','2021-01-15 02:52:58'),
	(189,'student187',NULL,'$2y$10$dPabSdUTmvM6lUK0FNt3beS0CBfa/d/Q1jbL2E48tQ7mrOY7SFbuq','student',NULL,'2021-01-15 02:52:58','2021-01-15 02:52:58'),
	(190,'student188',NULL,'$2y$10$64nTCLLYZGJbDUFjabth.O9H3n/eKeA1XWx79XhUdcgJBiAF6p2ae','student',NULL,'2021-01-15 02:52:59','2021-01-15 02:52:59'),
	(191,'student189',NULL,'$2y$10$nuTi6Yp/TDf6EIErYM/fMOl5nA6wfGLGYE7ykyg4NrF8pwR8TRRoG','student',NULL,'2021-01-15 02:52:59','2021-01-15 02:52:59'),
	(192,'student190',NULL,'$2y$10$ESgJb2BF4m3So8sEX8qFRe.yk4QJY.VAuZ7lxRDxBUe1e3cnprYOK','student',NULL,'2021-01-15 02:52:59','2021-01-15 02:52:59'),
	(193,'student191',NULL,'$2y$10$jkqkvZZ3lX3bR92pT.lwmeqBoQuMpYxHQmGZ5vaHvdyLtrHmNapBS','student',NULL,'2021-01-15 02:52:59','2021-01-15 02:52:59'),
	(194,'student192',NULL,'$2y$10$Nf4PYQolYaI9AatPMmATNujhCn5dxMpIdv4xOB3GXJ/ev33X8LLRG','student',NULL,'2021-01-15 02:52:59','2021-01-15 02:52:59'),
	(195,'student193',NULL,'$2y$10$N.pGKORKAr/Ll958ZPzEm.flI4XDWxgYylADLkMT1..PsSuqocO2G','student',NULL,'2021-01-15 02:52:59','2021-01-15 02:52:59'),
	(196,'student194',NULL,'$2y$10$oaM4dav//1cayf0D/v420O/KuLAS.pFSV/aNnEAP7ind7Z4uigmmm','student',NULL,'2021-01-15 02:52:59','2021-01-15 02:52:59'),
	(197,'student195',NULL,'$2y$10$7SCbXhTsNEsHT7dkXUO/IeAcgkI0spqCcbw.EyQmQ.GhYONnnAVz.','student',NULL,'2021-01-15 02:52:59','2021-01-15 02:52:59'),
	(198,'student196',NULL,'$2y$10$/bvn4VC6YeIGmQaAqnZzZetblmdaKMB1e9Wq1nQG5nC7KKeqF5Yay','student',NULL,'2021-01-15 02:52:59','2021-01-15 02:52:59'),
	(199,'student197',NULL,'$2y$10$auVgwkvdFoZe1Q8Qov6mzuBl4WmFISUq/Dma4IxAQQk2h/cWpwgbi','student',NULL,'2021-01-15 02:52:59','2021-01-15 02:52:59'),
	(200,'student198',NULL,'$2y$10$SBo1JJaWRgstrNrY5sLwM./DxH2F92HzPkJXH80B0NggA.qIZco6K','student',NULL,'2021-01-15 02:52:59','2021-01-15 02:52:59'),
	(201,'student199',NULL,'$2y$10$yqOGfPgXqW.LO.lg/czOn.qNUF7JqGC5fqQ6MpMvZqnZS.xCM2bVW','student',NULL,'2021-01-15 02:52:59','2021-01-15 02:52:59'),
	(202,'student200',NULL,'$2y$10$5qyG0n0WmlLBUG4VTMTUKuGKvDToj6AX5GbWrCDyh3U0wGnlDswIi','student',NULL,'2021-01-15 02:53:00','2021-01-15 02:53:00'),
	(203,'student201',NULL,'$2y$10$NPDyreSFf6f9BM2aYRqcWe46Ag9qU/4OX2o36rg4VFWvQRv0aSgzC','student',NULL,'2021-01-15 02:53:00','2021-01-15 02:53:00'),
	(204,'student202',NULL,'$2y$10$ZcWyL9QPguVSqV5RCUmZIuaeBM6YyscIGR1aIGVRDeV2gPIE/zc2G','student',NULL,'2021-01-15 02:53:00','2021-01-15 02:53:00'),
	(205,'student203',NULL,'$2y$10$VZOZc1aFPUvHOzxHnnCEDOSc33TfEJpmIt1kieSRpjkCNj6EUbnzC','student',NULL,'2021-01-15 02:53:00','2021-01-15 02:53:00'),
	(206,'student204',NULL,'$2y$10$Fu0BjQGXi8yjnzhMIlx3Xe.oZQbpwLBcZ5SAq7rQEUlW05vcY3Nye','student',NULL,'2021-01-15 02:53:00','2021-01-15 02:53:00'),
	(207,'student205',NULL,'$2y$10$uRtqoJRHis9T..dTZ7Y1DOQXpDtXqCID0mIDl.I7H8ilSF7gR78Nu','student',NULL,'2021-01-15 02:53:00','2021-01-15 02:53:00'),
	(208,'student206',NULL,'$2y$10$4ijyi1OcIpmXDYzkoprwR.vHwZOccCKKy3ppQgxlTheDckPIm2yyW','student',NULL,'2021-01-15 02:53:00','2021-01-15 02:53:00'),
	(209,'student207',NULL,'$2y$10$ujIzoNIFqvDyIAdAoyhh/eVJ2sc6VWWb7nec4Ug4hR4/rMNuOFFRu','student',NULL,'2021-01-15 02:53:00','2021-01-15 02:53:00'),
	(210,'student208',NULL,'$2y$10$aBntb1mfUNIDCrkYaWISIeMfin1AAhOntC8ZuDcu1HkL7K0elZgMW','student',NULL,'2021-01-15 02:53:00','2021-01-15 02:53:00'),
	(211,'student209',NULL,'$2y$10$dy/52HnmMMxyWrlr4hxMpOXggerAMSDT/t.YN123bnDa2IkoR46Ny','student',NULL,'2021-01-15 02:53:00','2021-01-15 02:53:00'),
	(212,'student210',NULL,'$2y$10$xCqAhk.v2m6ZS1UeF.AoUuFJDFXQv7SfSdZCIt9vH77WtcOlc6hSe','student',NULL,'2021-01-15 02:53:00','2021-01-15 02:53:00'),
	(213,'student211',NULL,'$2y$10$NdWY8c9p/lFO9rGHnF1u5eM4qQFZmUHxCzE1HX2OJxzUmgrhqEs6K','student',NULL,'2021-01-15 02:53:00','2021-01-15 02:53:00'),
	(214,'student212',NULL,'$2y$10$kp3.5UYMqIILy801nEuNLedMTIZ9O1LDVLk3LuLDxOF.XfYBzRVm.','student',NULL,'2021-01-15 02:53:01','2021-01-15 02:53:01'),
	(215,'student213',NULL,'$2y$10$R1qBOeBAv6xgREthKdRCXepSS7TIkgMIr0j5B3wYdndN6kKUqpnym','student',NULL,'2021-01-15 02:53:01','2021-01-15 02:53:01'),
	(216,'student214',NULL,'$2y$10$CanbF5b1CcRKG/shEJOxU.CaJVDMypcuLY9OeYR23zY83ZjvgDi/u','student',NULL,'2021-01-15 02:53:01','2021-01-15 02:53:01'),
	(217,'student215',NULL,'$2y$10$uwzA.S3khDzq4OrUC8WJ2u6lo2i8XEpcw3k49pW7NtmDBylrTqsfW','student',NULL,'2021-01-15 02:53:01','2021-01-15 02:53:01'),
	(218,'student216',NULL,'$2y$10$qCc/8TX0MZy0/FQAfVZDmODxUTM7bp0zsDpxvDBFKvWuw7h2V9jLK','student',NULL,'2021-01-15 02:53:01','2021-01-15 02:53:01'),
	(219,'student217',NULL,'$2y$10$iTIl2nThKe.f4mHjhVmPde63NBoJTgwBTUIawqdSBW8Tdwy3yHsfW','student',NULL,'2021-01-15 02:53:01','2021-01-15 02:53:01'),
	(220,'student218',NULL,'$2y$10$cXpolWrimEVKUEAOF/yiEuiiMdhlOfssOJbbVX5qHD08YHLEwX19C','student',NULL,'2021-01-15 02:53:01','2021-01-15 02:53:01'),
	(221,'student219',NULL,'$2y$10$Hjo/xEt.lDSSpzO5NraGkuanNLJUJ08RGlFEFWbuKwe25993eUwi2','student',NULL,'2021-01-15 02:53:01','2021-01-15 02:53:01'),
	(222,'student220',NULL,'$2y$10$pHV3afFGIa5cngb0Py2ih.XCHlkwPv6kliaU3AavYPk12QNjvR5bu','student',NULL,'2021-01-15 02:53:01','2021-01-15 02:53:01'),
	(223,'student221',NULL,'$2y$10$KmqRqGCoYkb66uN68Zs0FOXuzxP2.f8JbptcgISinqWsJZgFkGSKy','student',NULL,'2021-01-15 02:53:01','2021-01-15 02:53:01'),
	(224,'student222',NULL,'$2y$10$SLSW5RU0b7kJWKNLVgrM9O.Gc9yXkcauHT1gSCiKOP.R9LMqn8Is.','student',NULL,'2021-01-15 02:53:01','2021-01-15 02:53:01'),
	(225,'student223',NULL,'$2y$10$DdSaCWgMfEt.Y1YG1za95e5.QlHo8kSZy.85VDIrKBnMhmiFgyXFa','student',NULL,'2021-01-15 02:53:02','2021-01-15 02:53:02'),
	(226,'student224',NULL,'$2y$10$6gjzSMwYmOiLq9TtWOdFR.iriZU8eMy6zLfQTzFHcmPWHiU81W7by','student',NULL,'2021-01-15 02:53:02','2021-01-15 02:53:02'),
	(227,'student225',NULL,'$2y$10$98xwEK0zwJcSO3ALz2s5geAzoLJ0NHF2I7gjt4RZjOjO2Emer.BZO','student',NULL,'2021-01-15 02:53:02','2021-01-15 02:53:02'),
	(228,'student226',NULL,'$2y$10$J5raDW2eAhKLSO7TjRiH6OfDpoAEkMr4RwMvDCxoayj33wjbeDEbm','student',NULL,'2021-01-15 02:53:02','2021-01-15 02:53:02'),
	(229,'student227',NULL,'$2y$10$PYEy3xpL01vvUX7diGWzMuunjwpRcep4X0J4TlrJcI3Gu2WPcvjae','student',NULL,'2021-01-15 02:53:02','2021-01-15 02:53:02'),
	(230,'student228',NULL,'$2y$10$szTh8ilw/iKvhuzFlLpMdu196XDu/QR8fN.BNheOzVxhlhSXZ011C','student',NULL,'2021-01-15 02:53:02','2021-01-15 02:53:02'),
	(231,'student229',NULL,'$2y$10$67dS33ZUYD5pgD9QDem/hOQ9B.PjRSufJwJ7xRGKvv75.1oGp3a.m','student',NULL,'2021-01-15 02:53:02','2021-01-15 02:53:02'),
	(232,'student230',NULL,'$2y$10$WJKpDafHc6QAjoSKL/xroOtxgexX.z8lBwhjmnmlIyAfGhbZJ19ry','student',NULL,'2021-01-15 02:53:02','2021-01-15 02:53:02'),
	(233,'student231',NULL,'$2y$10$mi0C5/I0phpLLRlILyIubO/aw/EdW/MW2KOMm1reZc1LXk8xX0z/O','student',NULL,'2021-01-15 02:53:02','2021-01-15 02:53:02'),
	(234,'student232',NULL,'$2y$10$hTwyGGZ98Ejtq0g.xJzS1e3/H/yQh3iTga2LLyQfNz.PoiMHb8xRC','student',NULL,'2021-01-15 02:53:03','2021-01-15 02:53:03'),
	(235,'student233',NULL,'$2y$10$fM6/lHNJ0JosiuEVPo/13e20rLQZ53YSzY4pz/nOXstCUVWQmh9Dm','student',NULL,'2021-01-15 02:53:03','2021-01-15 02:53:03'),
	(236,'student234',NULL,'$2y$10$RcDsJs8d/.bxKTpE9aox3e/cdcaVQxrtrygrSET1jKGh39lbxFEf2','student',NULL,'2021-01-15 02:53:03','2021-01-15 02:53:03'),
	(237,'student235',NULL,'$2y$10$ehDxuUKvuu4A6.VhG8z83.eR..qj1iEYxOethbPmE9bZ84Wm/.bMK','student',NULL,'2021-01-15 02:53:03','2021-01-15 02:53:03'),
	(238,'student236',NULL,'$2y$10$1dVdqF.3lT/8y9ipPx62geEjccSLOgMUeMC2HKOtNTcVMlXsDeCd2','student',NULL,'2021-01-15 02:53:03','2021-01-15 02:53:03'),
	(239,'student237',NULL,'$2y$10$PzXNbVCBJjTsQKjm7jE9H.qHKP03soAXKpTPhfyX80yHsJGM.1W0C','student',NULL,'2021-01-15 02:53:03','2021-01-15 02:53:03'),
	(240,'student238',NULL,'$2y$10$X4uB3veAZiA8tMyFsSN0QeSdXIDkAstoyTpyi.BeVdKtV0fZ533Ge','student',NULL,'2021-01-15 02:53:03','2021-01-15 02:53:03'),
	(241,'student239',NULL,'$2y$10$d6QYiTE8e70yukFwU8F5luw9/gPYuQV3XuyitpjnZ.zC3rsz2XAva','student',NULL,'2021-01-15 02:53:03','2021-01-15 02:53:03'),
	(242,'student240',NULL,'$2y$10$CZNjvXgjf3JWaoEbZBuZIOBrI9Jkw2guCg5D8w/kFF98mgrTck5Xm','student',NULL,'2021-01-15 02:53:04','2021-01-15 02:53:04'),
	(243,'student241',NULL,'$2y$10$EoUVMKtkjt9GF9CzXn7BxOkAjgT8EgynaFgqy7fARvcmA04ci1ctS','student',NULL,'2021-01-15 02:53:04','2021-01-15 02:53:04'),
	(244,'student242',NULL,'$2y$10$eTnLhxK7qK4lPpSCenMJV.xY./RsNJG96oudWQtfQ20h5L3.1ScXS','student',NULL,'2021-01-15 02:53:04','2021-01-15 02:53:04'),
	(245,'student243',NULL,'$2y$10$lHNEPcSy.QnPnk1PcLgW5.qQgWF4L2sjVC/UWusGswPR5Z2.pUTqe','student',NULL,'2021-01-15 02:53:04','2021-01-15 02:53:04'),
	(246,'student244',NULL,'$2y$10$EeuCNRlkofsRw6tB2ITMluFYIvIITAQiiYlOd6qm9zihM658qaaY2','student',NULL,'2021-01-15 02:53:04','2021-01-15 02:53:04'),
	(247,'student245',NULL,'$2y$10$gyFNqy1XjkZYt4xUDJu76.dsINRSO8AtWY3KPJ.mgDHyYUHzUWFVC','student',NULL,'2021-01-15 02:53:04','2021-01-15 02:53:04'),
	(248,'student246',NULL,'$2y$10$AmTxdYBz3j8SF2vfq6tLNOhNdPUBdlqWJ84g6zIFEOTNNG/rtC3n6','student',NULL,'2021-01-15 02:53:04','2021-01-15 02:53:04'),
	(249,'student247',NULL,'$2y$10$fbncxIhx1IExooG.oWqm0Onyp7WrbqlTVO3tX4TAySNOTOAOLwixy','student',NULL,'2021-01-15 02:53:04','2021-01-15 02:53:04'),
	(250,'student248',NULL,'$2y$10$InKFfbi.NtfmuybEaWN3I.X2cIvpRt3O1Ew.tqvkVTq.197FX8DY6','student',NULL,'2021-01-15 02:53:04','2021-01-15 02:53:04'),
	(251,'student249',NULL,'$2y$10$qAsZh5Q5JRhlBcPnLIDPTO909fgxPkwrH1sUf2HarS8wOAX0a17VS','student',NULL,'2021-01-15 02:53:04','2021-01-15 02:53:04'),
	(252,'student250',NULL,'$2y$10$XNEYX4zURLViVmPmC2rBlOf5m7OnDTK0yDLctILRmTEj2C6dDore6','student',NULL,'2021-01-15 02:53:04','2021-01-15 02:53:04'),
	(253,'student251',NULL,'$2y$10$DNWphf8Pxq0LcU3wVbwS3OL4gAXfQmCllRO3vJV4g8L9GrednndFK','student',NULL,'2021-01-15 02:53:05','2021-01-15 02:53:05'),
	(254,'student252',NULL,'$2y$10$7l3tpJ2EASz6DSiwYX34P.d4LwXXmxLyvmzp5TSF/Rig/cqawGJ6O','student',NULL,'2021-01-15 02:53:05','2021-01-15 02:53:05'),
	(255,'student253',NULL,'$2y$10$2COSuCm8mWSWafEs7pG13.XtgkDvtwuIqzPMXBoJUQfXsVcnrApGS','student',NULL,'2021-01-15 02:53:05','2021-01-15 02:53:05'),
	(256,'student254',NULL,'$2y$10$N0H2qwdCyPowbDVR/8ObNuIOAkW86rzJh/DnIXN90EbDaWaTAqC1S','student',NULL,'2021-01-15 02:53:05','2021-01-15 02:53:05'),
	(257,'student255',NULL,'$2y$10$Gd8cnYKhPw8nOzlipONshO2P3wAp4rbEOc/6VUmSsiQHW/KwbIJ/6','student',NULL,'2021-01-15 02:53:05','2021-01-15 02:53:05'),
	(258,'student256',NULL,'$2y$10$Zj8aIi4jvrsLzihmiq24UukYACXEhnUXOAxF7TVXVpK4aETXMZ9vu','student',NULL,'2021-01-15 02:53:05','2021-01-15 02:53:05'),
	(259,'student257',NULL,'$2y$10$5NewVEcn/P5NKDYRTmRULu3VD18kSv06zarZaLEBjKhFzxaS186r.','student',NULL,'2021-01-15 02:53:05','2021-01-15 02:53:05'),
	(260,'student258',NULL,'$2y$10$Rgdoxde4Sa8fOeQtcis2x.4IyCGQb8W8qVC94Ua/RC0QETPd63EKy','student',NULL,'2021-01-15 02:53:05','2021-01-15 02:53:05'),
	(261,'student259',NULL,'$2y$10$FEvTs4nVxpOgQyw6ZvlwO.P1ksopXUkglsDtvX.plXqGr22keY7hO','student',NULL,'2021-01-15 02:53:05','2021-01-15 02:53:05'),
	(262,'student260',NULL,'$2y$10$F9Pclq.tSBX9zG7LyaY2BOYeQ4MtgZhoGxCxbsk.YV4DXMyR1uzou','student',NULL,'2021-01-15 02:53:05','2021-01-15 02:53:05'),
	(263,'student261',NULL,'$2y$10$qvZqhjW1Ngxof1UnXGclGOQNHZGnzrgg/aUBGQiRFVyve0vlahsti','student',NULL,'2021-01-15 02:53:06','2021-01-15 02:53:06'),
	(264,'student262',NULL,'$2y$10$sUqY9Gx8cI1.11JoW7OshuU2Izvlo/cwbQyWNcsNWce8KNO9LC3py','student',NULL,'2021-01-15 02:53:06','2021-01-15 02:53:06'),
	(265,'student263',NULL,'$2y$10$NyUPkWGDRSumU9sPQOInaO6xqxelA7/5tQBZeGW8.g/Rciok8230G','student',NULL,'2021-01-15 02:53:06','2021-01-15 02:53:06'),
	(266,'student264',NULL,'$2y$10$.L9VTIal8b/wFYsnkpxP/ui/QH3xxrOYBacer5GORTq.sW6XZx3hK','student',NULL,'2021-01-15 02:53:06','2021-01-15 02:53:06'),
	(267,'student265',NULL,'$2y$10$EYCSStWnnWJ0AlT0H95b5.vqBWAusRDjjkDjjjyaRLAfeGxCQx87C','student',NULL,'2021-01-15 02:53:06','2021-01-15 02:53:06'),
	(268,'student266',NULL,'$2y$10$CPiFupANGk.mC3jwVnYiPeACHbih7haxOjCA0pLNNeHiuyqWeLV1.','student',NULL,'2021-01-15 02:53:06','2021-01-15 02:53:06'),
	(269,'student267',NULL,'$2y$10$T6hJJa1W8f/KJx4KNs0UlOWpThCeJmQaSqnif5Gy3Zqm5v5HZAHtW','student',NULL,'2021-01-15 02:53:06','2021-01-15 02:53:06'),
	(270,'student268',NULL,'$2y$10$gSQ0dZL47NYkiz.y9T91/.UkuAEOTGQzM.g12nUsP.T54HhRUdwTy','student',NULL,'2021-01-15 02:53:06','2021-01-15 02:53:06'),
	(271,'student269',NULL,'$2y$10$Qp6DEFhck0eNNvbEeINQZO6cnaMxHWt817LCN4isTFrCt/XuoMt.y','student',NULL,'2021-01-15 02:53:07','2021-01-15 02:53:07'),
	(272,'student270',NULL,'$2y$10$kNP719vw.Kw5PhhtJMVGVuqDqImMokaVfFV7GKIPPDjbWSHlGROTu','student',NULL,'2021-01-15 02:53:07','2021-01-15 02:53:07'),
	(273,'student271',NULL,'$2y$10$r.yK.7ycHapbIhDo0iePbe9mutcFGZS.lcmsPffw4lQI4Up6aKV9S','student',NULL,'2021-01-15 02:53:07','2021-01-15 02:53:07'),
	(274,'student272',NULL,'$2y$10$sjFM3ENENJn9mF4nLuCjduY9taVei6VIqVXNN1liV8sU8k1imYVO6','student',NULL,'2021-01-15 02:53:07','2021-01-15 02:53:07'),
	(275,'student273',NULL,'$2y$10$EG4YdJc.NRy.xD8DYdJ5wO/NkSyzq8IdTiY1Oxh2JCDRQFH1/ZVPG','student',NULL,'2021-01-15 02:53:07','2021-01-15 02:53:07'),
	(276,'student274',NULL,'$2y$10$Poo4P.NauoMlaG3QkR5oduVuh7D6KdcJYwlHC/sS5F6hnODHzKhi.','student',NULL,'2021-01-15 02:53:07','2021-01-15 02:53:07'),
	(277,'student275',NULL,'$2y$10$5gqQx42BIzOTSM2t1wx79ODy492weRVEFzYlG8AHBjHcoYfP63z1.','student',NULL,'2021-01-15 02:53:07','2021-01-15 02:53:07'),
	(278,'student276',NULL,'$2y$10$9C8yMPjNn9fURDVPeyzz2uSiaHcAHbWsXT7Y784RDbouJvN/9T6Hi','student',NULL,'2021-01-15 02:53:07','2021-01-15 02:53:07'),
	(279,'student277',NULL,'$2y$10$mscy9PnbE.v8k.HNoegYQOARuTJZDn83Up3bvzXQ4Sw6tWA6RG4ci','student',NULL,'2021-01-15 02:53:07','2021-01-15 02:53:07'),
	(280,'student278',NULL,'$2y$10$79U6EE4FjGcIYt6E94cK9OSRMb0i71C18vpLsV6wj3Fz5qiYFEqCq','student',NULL,'2021-01-15 02:53:08','2021-01-15 02:53:08'),
	(281,'student279',NULL,'$2y$10$ufW8BlyeGAzO6WUwJWDzO.NQGV4T/hX.RfaqSCIB6RH4fd9pED9Ay','student',NULL,'2021-01-15 02:53:08','2021-01-15 02:53:08'),
	(282,'student280',NULL,'$2y$10$dNOXWmzLuGYbrzE3.aJIzOSo9XEcNk55UnRNmIiJDki5uQcUi4zuC','student',NULL,'2021-01-15 02:53:08','2021-01-15 02:53:08'),
	(283,'student281',NULL,'$2y$10$sasrr9q6itMBQyHKFziuwuJEGgj7eTVgnUQj0Ex.olj2EwgqIJHkC','student',NULL,'2021-01-15 02:53:08','2021-01-15 02:53:08'),
	(284,'student282',NULL,'$2y$10$gVDIRutnpmVQrgerYfSnlOicc8qeUHL4MUeR5jhwaUao6T4mm7jsW','student',NULL,'2021-01-15 02:53:08','2021-01-15 02:53:08'),
	(285,'student283',NULL,'$2y$10$QasvXINFuALk8fWKW.93EOyFwyOQ88GXB8GsmIWZQZk/N77M1ub2.','student',NULL,'2021-01-15 02:53:08','2021-01-15 02:53:08'),
	(286,'student284',NULL,'$2y$10$iflEeNGED5SfUgkQGqxrPehK1bTtM63kqBfg2QWjcru3hlzMQ0niW','student',NULL,'2021-01-15 02:53:08','2021-01-15 02:53:08'),
	(287,'student285',NULL,'$2y$10$Nbu5btPjYK9Yxs4hp6CcMOt3JsghNzOpxRyF/eSBlBSfgAhOqJuP6','student',NULL,'2021-01-15 02:53:08','2021-01-15 02:53:08'),
	(288,'student286',NULL,'$2y$10$zxXPRUevdZxjGr8v6EhVouJ01.m.YF40IPovziedMz/Uth3MtL8gy','student',NULL,'2021-01-15 02:53:08','2021-01-15 02:53:08'),
	(289,'student287',NULL,'$2y$10$DEaGN2Qcmvk/sx/f4Y5cIej9IEY7gOQW647TCTgDTB8pNfyImW7Ve','student',NULL,'2021-01-15 02:53:08','2021-01-15 02:53:08'),
	(290,'student288',NULL,'$2y$10$fhG8XCmlCWO32EuY4wXBlOBhDs.HTl2dQLUaeiXP/C1k/PiReRmDO','student',NULL,'2021-01-15 02:53:08','2021-01-15 02:53:08'),
	(291,'student289',NULL,'$2y$10$noc.VbCDZim9lHMXwXfb7uUabe8nmhWX4K09qydpReTS684mxU6CW','student',NULL,'2021-01-15 02:53:09','2021-01-15 02:53:09'),
	(292,'student290',NULL,'$2y$10$pYSyUhIs7GqbUxywBA1PP.53zqbvWiAQk29Q2Nc6JIZlNVUd9heJe','student',NULL,'2021-01-15 02:53:09','2021-01-15 02:53:09'),
	(293,'student291',NULL,'$2y$10$5RAEC55zFRU5Mk4aKP93qOTzpL91Nbum44LSaFJj6LtFUA5nwU3tS','student',NULL,'2021-01-15 02:53:09','2021-01-15 02:53:09'),
	(294,'student292',NULL,'$2y$10$DIYGfBK2LvxSbtESlwpNBeHYKYAfrEOxczN7dbLsKCWAPvFzfNF1.','student',NULL,'2021-01-15 02:53:09','2021-01-15 02:53:09'),
	(295,'student293',NULL,'$2y$10$XZc7bW/scse82foKjDZV6.m5.kZhJQqqtBRrrVp1DJh807LeQWkE6','student',NULL,'2021-01-15 02:53:09','2021-01-15 02:53:09'),
	(296,'student294',NULL,'$2y$10$7Wxdcck5vL5X1h1rj1tUY.c81dL40BYrDSdYrAMLo1gtNHGwPkqMO','student',NULL,'2021-01-15 02:53:09','2021-01-15 02:53:09'),
	(297,'student295',NULL,'$2y$10$tv/1PhNMhZs9Ul0arTnEkutzfscwc1DNdADtf9jEPa/hOmtHv0TzG','student',NULL,'2021-01-15 02:53:09','2021-01-15 02:53:09'),
	(298,'student296',NULL,'$2y$10$WDS8AYUx4pcUpG4dEBV8I.Uru66SPlTOZJ.fOBJWXDzOuCtO.Jd0.','student',NULL,'2021-01-15 02:53:09','2021-01-15 02:53:09'),
	(299,'student297',NULL,'$2y$10$9L/urFFz.3rccVgg25mjY.RIC2gcHQhPfqKb2N0u4vXgKcpPxzXhC','student',NULL,'2021-01-15 02:53:09','2021-01-15 02:53:09'),
	(300,'student298',NULL,'$2y$10$.H2HLIS6y1qztTbg0fTdDOikn0HXCR3/xZGn3RCKXnw5MX/ybX6Wi','student',NULL,'2021-01-15 02:53:09','2021-01-15 02:53:09'),
	(301,'student299',NULL,'$2y$10$3zvt4c8g5RL/pEjQZhf8rOtB4.FmJFW8RB3OD3j1vODRteUZRZ82S','student',NULL,'2021-01-15 02:53:09','2021-01-15 02:53:09'),
	(302,'student300',NULL,'$2y$10$f7dMEclVS0zPuRhjsJWSP.Blp5Y.GCtIx6Tt.kTspqKzL87yHwBRC','student',NULL,'2021-01-15 02:53:09','2021-01-15 02:53:09'),
	(307,'008923289',NULL,'$2y$10$8vn/8VBGfJmgPsU/XWsqRu66QSUpx72y7fspOqWvDUqSpia9coGpG','teacher',NULL,'2021-01-22 08:16:50','2021-01-22 09:40:54'),
	(308,'87878787',NULL,'$2y$10$/ewTLQU4rmDyOjNieG8YtuVvAltPe8vtJQ6itXADfDQ0/KM6OFd5C','teacher',NULL,'2021-01-22 09:09:32','2021-01-22 09:09:32'),
	(309,'8782372',NULL,'$2y$10$rN88I2C5M856kmAdxgYutexJx65yuhOkSy27igCQFYxSCsjSVsHiu','teacher',NULL,'2021-01-22 09:10:05','2021-01-23 01:35:52'),
	(310,'86823728',NULL,'$2y$10$pZnlItWA299TRIloWYLzFOopCCuLedP7Qt6Vp38nVRVkedow8YDUu','teacher',NULL,'2021-01-22 09:10:15','2021-01-22 09:10:15'),
	(312,'81927392',NULL,'$2y$10$Fji77/e.FpcP9AybSg0sjuXpBHuE1oD1iX15dEghDNUMCD8pNZmn6','student',NULL,'2021-01-22 09:20:04','2021-01-22 09:20:04'),
	(313,'2837823',NULL,'$2y$10$BQfRaYkEvWEhibE3HELANue06QifpmoyeQ8h7.zxwUJ3RPtDFG8zq','student',NULL,'2021-01-22 09:21:54','2021-01-22 09:21:54'),
	(314,'8723827',NULL,'$2y$10$fP2N1Qu.2QkVfu3G.9eSGuwBIFP.Cg.GQoDwHfDaJLNAlt8AXzsfG','student',NULL,'2021-01-22 09:22:09','2021-01-22 09:22:09');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
