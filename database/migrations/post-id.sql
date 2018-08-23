-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;




-- Dumping structure for table post-id.area_family_house
DROP TABLE IF EXISTS `area_family_house`;
CREATE TABLE IF NOT EXISTS `area_family_house` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `g_information_id` int(11) NOT NULL,
  `ground_floor_length` int(11) DEFAULT NULL,
  `ground_floor_width` int(11) DEFAULT NULL,
  `ground_floor_area` int(11) DEFAULT NULL,
  `upper_floor_length` int(11) DEFAULT NULL,
  `upper_floor_width` int(11) DEFAULT NULL,
  `upper_floor_area` int(11) DEFAULT NULL,
  `further_floor_length` int(11) DEFAULT NULL,
  `further_floor_width` int(11) DEFAULT NULL,
  `further_floor_area` int(11) DEFAULT NULL,
  `total_area` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.area_family_house: 0 rows
/*!40000 ALTER TABLE `area_family_house` DISABLE KEYS */;
/*!40000 ALTER TABLE `area_family_house` ENABLE KEYS */;

-- Dumping structure for table post-id.condition_house
DROP TABLE IF EXISTS `condition_house`;
CREATE TABLE IF NOT EXISTS `condition_house` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.condition_house: 3 rows
/*!40000 ALTER TABLE `condition_house` DISABLE KEYS */;
INSERT INTO `condition_house` (`id`, `name_en`, `name_kh`, `created_at`, `updated_at`) VALUES
	(1, 'Degradation', 'ទ្រុឌទ្រោម', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(2, 'Medium', 'មធ្យម', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(3, 'New', 'ថ្មី', '2018-08-23 07:07:40', '2018-08-23 07:07:40');
/*!40000 ALTER TABLE `condition_house` ENABLE KEYS */;

-- Dumping structure for table post-id.debt_loan_link
DROP TABLE IF EXISTS `debt_loan_link`;
CREATE TABLE IF NOT EXISTS `debt_loan_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `g_information_id` tinyint(4) DEFAULT NULL,
  `loan_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `total_debt` int(11) DEFAULT NULL,
  `debt_duration` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.debt_loan_link: 3 rows
/*!40000 ALTER TABLE `debt_loan_link` DISABLE KEYS */;
INSERT INTO `debt_loan_link` (`id`, `g_information_id`, `loan_id`, `question_id`, `total_debt`, `debt_duration`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 2, NULL, NULL, '2018-08-23 07:09:32', '2018-08-23 07:09:32'),
	(2, 2, 1, 2, NULL, NULL, '2018-08-23 07:12:16', '2018-08-23 07:12:16'),
	(3, 3, 1, 2, NULL, NULL, '2018-08-23 15:35:09', '2018-08-23 15:35:09');
/*!40000 ALTER TABLE `debt_loan_link` ENABLE KEYS */;

-- Dumping structure for table post-id.education_level
DROP TABLE IF EXISTS `education_level`;
CREATE TABLE IF NOT EXISTS `education_level` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.education_level: 14 rows
/*!40000 ALTER TABLE `education_level` DISABLE KEYS */;
INSERT INTO `education_level` (`id`, `name_en`, `name_kh`, `created_at`, `updated_at`) VALUES
	(1, 'Grade 1', 'ថ្នាក់ទី ១', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(2, 'Grade 2', 'ថ្នាក់ទី ២', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(3, 'Grade 3', 'ថ្នាក់ទី ៣', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(4, 'Grade 4', 'ថ្នាក់ទី ៤', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(5, 'Grade 5', 'ថ្នាក់ទី ៥', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(6, 'Grade 6', 'ថ្នាក់ទី ៦', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(7, 'Grade 7', 'ថ្នាក់ទី ៧', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(8, 'Grade 8', 'ថ្នាក់ទី ៨', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(9, 'Grade 9', 'ថ្នាក់ទី ៩', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(10, 'Grade 10', 'ថ្នាក់ទី ១០', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(11, 'Grade​ 11', 'ថ្នាក់ទី ១១', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(12, 'Grade 12', 'ថ្នាក់ទី ១២', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(13, 'Bachelor Degree', 'បរិញ្ញាប័ត្រ', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(14, 'Did not learn', 'មិនបានរៀនសោះ', '2018-08-23 07:07:40', '2018-08-23 07:07:40');
/*!40000 ALTER TABLE `education_level` ENABLE KEYS */;

-- Dumping structure for table post-id.electric_grid
DROP TABLE IF EXISTS `electric_grid`;
CREATE TABLE IF NOT EXISTS `electric_grid` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.electric_grid: 4 rows
/*!40000 ALTER TABLE `electric_grid` DISABLE KEYS */;
INSERT INTO `electric_grid` (`id`, `name_en`, `name_kh`, `created_at`, `updated_at`) VALUES
	(1, 'Use the generator', 'ប្រើម៉ាស៊ីនភ្លើង', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(2, 'Use batteries', 'ប្រើអាគុយ', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(3, 'Use a cigarette lamp', 'ប្រើចង្កៀងប្រេងកាត', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(4, 'Solar power', 'ថាមពលព្រះអាទិត្យ', '2018-08-23 07:07:40', '2018-08-23 07:07:40');
/*!40000 ALTER TABLE `electric_grid` ENABLE KEYS */;

-- Dumping structure for table post-id.family_relation
DROP TABLE IF EXISTS `family_relation`;
CREATE TABLE IF NOT EXISTS `family_relation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `record_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.family_relation: 4 rows
/*!40000 ALTER TABLE `family_relation` DISABLE KEYS */;
INSERT INTO `family_relation` (`id`, `name_en`, `name_kh`, `record_status`, `created_at`, `updated_at`) VALUES
	(1, 'Village chiefs', 'មេភូមិ', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(2, 'Near house', 'អ្នកជិតខាង', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(3, 'friends', 'មិត្តភ័ក្រ', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(4, 'Other', 'ផ្សេងៗ', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40');
/*!40000 ALTER TABLE `family_relation` ENABLE KEYS */;

-- Dumping structure for table post-id.gender
DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.gender: 2 rows
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` (`id`, `name_en`, `name_kh`, `created_at`, `updated_at`) VALUES
	(1, 'Male', 'ប្រុស', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(2, 'Female', 'ស្រី', '2018-08-23 07:07:40', '2018-08-23 07:07:40');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;

-- Dumping structure for table post-id.general_information
DROP TABLE IF EXISTS `general_information`;
CREATE TABLE IF NOT EXISTS `general_information` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `od_code` int(11) DEFAULT NULL,
  `hf_code` int(11) DEFAULT NULL,
  `interview_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_patient` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_sex` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_province_id` int(11) DEFAULT NULL,
  `g_district_id` int(11) DEFAULT NULL,
  `g_commune_id` int(11) DEFAULT NULL,
  `g_village_id` int(11) DEFAULT NULL,
  `g_local_village` text COLLATE utf8mb4_unicode_ci,
  `inter_patient` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inter_age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inter_sex` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inter_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inter_relationship_id` int(11) DEFAULT NULL,
  `fa_patient` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fa_age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fa_sex` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fa_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fa_relationship_id` int(11) DEFAULT NULL,
  `record_status` int(11) NOT NULL DEFAULT '1',
  `interview_date` date DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.general_information: 3 rows
/*!40000 ALTER TABLE `general_information` DISABLE KEYS */;
INSERT INTO `general_information` (`id`, `user_id`, `od_code`, `hf_code`, `interview_code`, `g_patient`, `g_age`, `g_sex`, `g_phone`, `g_province_id`, `g_district_id`, `g_commune_id`, `g_village_id`, `g_local_village`, `inter_patient`, `inter_age`, `inter_sex`, `inter_phone`, `inter_relationship_id`, `fa_patient`, `fa_age`, `fa_sex`, `fa_phone`, `fa_relationship_id`, `record_status`, `interview_date`, `expire_date`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 6, 'MKB/180823/01', '324', '34', '2', '34', 4, 42, 353, 3373, '23432', '343', '33', '2', '343', 4, NULL, NULL, NULL, NULL, NULL, 1, '2018-08-23', '2018-09-30', '2018-08-23 07:09:32', '2018-08-23 07:09:32'),
	(2, 1, 6, 107, 'MGR\r\n/180823/01', 'sad', '123', '2', '23', 4, 44, 362, 3425, '232', '23', '23', '2', '23', 3, '232', '23', '1', '93322910', 2, 1, '2018-09-01', '2018-09-30', '2018-08-23 07:12:16', '2018-08-23 07:12:16'),
	(3, 1, 1, 5, 'MKB/180823/02', '23', '23', '2', '232', 1, 3, 21, 241, '232', '23', '23', '2', '23232', 1, '23', '23', '2', '23232', 1, 1, '2018-08-23', '2018-09-08', '2018-08-23 15:35:09', '2018-08-23 15:35:09');
/*!40000 ALTER TABLE `general_information` ENABLE KEYS */;

-- Dumping structure for table post-id.general_situation_family
DROP TABLE IF EXISTS `general_situation_family`;
CREATE TABLE IF NOT EXISTS `general_situation_family` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `g_information_id` int(11) DEFAULT NULL,
  `household_family_id` int(11) DEFAULT NULL,
  `total_people` int(11) DEFAULT NULL,
  `toilet_id` tinyint(4) DEFAULT NULL,
  `q_electric_id` int(11) DEFAULT NULL,
  `transport_id` tinyint(4) DEFAULT NULL,
  `land_agricultural_id` tinyint(4) DEFAULT NULL,
  `debt_family_id` tinyint(4) DEFAULT NULL,
  `command` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.general_situation_family: 3 rows
/*!40000 ALTER TABLE `general_situation_family` DISABLE KEYS */;
INSERT INTO `general_situation_family` (`id`, `g_information_id`, `household_family_id`, `total_people`, `toilet_id`, `q_electric_id`, `transport_id`, `land_agricultural_id`, `debt_family_id`, `command`, `created_at`, `updated_at`) VALUES
	(1, 1, 4, 1, 2, 2, 4, 1, 1, '344', '2018-08-23 07:09:32', '2018-08-23 07:09:32'),
	(2, 2, 4, 1, 2, 2, 4, 1, 1, '2323', '2018-08-23 07:12:16', '2018-08-23 07:12:16'),
	(3, 3, 1, 2, 1, 1, 2, 1, 1, '2332', '2018-08-23 15:35:09', '2018-08-23 15:35:09');
/*!40000 ALTER TABLE `general_situation_family` ENABLE KEYS */;

-- Dumping structure for table post-id.health
DROP TABLE IF EXISTS `health`;
CREATE TABLE IF NOT EXISTS `health` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.health: 2 rows
/*!40000 ALTER TABLE `health` DISABLE KEYS */;
INSERT INTO `health` (`id`, `name_en`, `name_kh`, `created_at`, `updated_at`) VALUES
	(1, 'ចំនួន​សមាជិក​គ្រួសារ ​ដែលបាត់បង់លទ្ធភាពពលកម្មស្ទើរទាំងស្រុង ដោយសារមានជម្ងឺធ្ងន់ធ្ងរ/រ៉ាំរ៉ៃ ឬពិការធ្ងន់ធ្ងរ', 'ចំនួន​សមាជិក​គ្រួសារ ​ដែលបាត់បង់លទ្ធភាពពលកម្មស្ទើរទាំងស្រុង ដោយសារមានជម្ងឺធ្ងន់ធ្ងរ/រ៉ាំរ៉ៃ ឬពិការធ្ងន់ធ្ងរ', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(2, 'ចំនួន​សមាជិក​គ្រួសារ ​ដែលបាត់បង់លទ្ធភាពពលកម្មប្រហែល៥០ % ដោយសារមានជម្ងឺធ្ងន់ធ្ងរ/រ៉ាំរ៉ៃ ឬពិការធ្ងន់ធ្ងរ', 'ចំនួន​សមាជិក​គ្រួសារ ​ដែលបាត់បង់លទ្ធភាពពលកម្មប្រហែល៥០ % ដោយសារមានជម្ងឺធ្ងន់ធ្ងរ/រ៉ាំរ៉ៃ ឬពិការធ្ងន់ធ្ងរ', '2018-08-23 07:07:40', '2018-08-23 07:07:40');
/*!40000 ALTER TABLE `health` ENABLE KEYS */;

-- Dumping structure for table post-id.health_link
DROP TABLE IF EXISTS `health_link`;
CREATE TABLE IF NOT EXISTS `health_link` (
  `g_information_id` int(11) DEFAULT NULL,
  `health_id` tinyint(4) DEFAULT NULL,
  `kids_then65` int(11) DEFAULT NULL,
  `old_bigger65` int(11) DEFAULT NULL,
  `kids_50_then65` int(11) DEFAULT NULL,
  `old_50_bigger65` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.health_link: 3 rows
/*!40000 ALTER TABLE `health_link` DISABLE KEYS */;
INSERT INTO `health_link` (`g_information_id`, `health_id`, `kids_then65`, `old_bigger65`, `kids_50_then65`, `old_50_bigger65`, `created_at`, `updated_at`) VALUES
	(1, 1, 34, 43, NULL, NULL, '2018-08-23 07:09:32', '2018-08-23 07:09:32'),
	(2, 1, 23, 32, NULL, NULL, '2018-08-23 07:12:16', '2018-08-23 07:12:16'),
	(3, 1, 23, 2323, NULL, NULL, '2018-08-23 15:35:09', '2018-08-23 15:35:09');
/*!40000 ALTER TABLE `health_link` ENABLE KEYS */;

-- Dumping structure for table post-id.home_prepar
DROP TABLE IF EXISTS `home_prepar`;
CREATE TABLE IF NOT EXISTS `home_prepar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.home_prepar: 2 rows
/*!40000 ALTER TABLE `home_prepar` DISABLE KEYS */;
INSERT INTO `home_prepar` (`id`, `name_en`, `name_kh`, `created_at`, `updated_at`) VALUES
	(1, 'No', 'មិនបាន', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(2, 'Yes', 'បាន នៅឆ្នាំ', '2018-08-23 07:07:40', '2018-08-23 07:07:40');
/*!40000 ALTER TABLE `home_prepar` ENABLE KEYS */;

-- Dumping structure for table post-id.home_prepar_link
DROP TABLE IF EXISTS `home_prepar_link`;
CREATE TABLE IF NOT EXISTS `home_prepar_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `g_information_id` int(11) NOT NULL,
  `home_prepar_id` int(11) DEFAULT NULL,
  `home_year` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.home_prepar_link: 1 rows
/*!40000 ALTER TABLE `home_prepar_link` DISABLE KEYS */;
INSERT INTO `home_prepar_link` (`id`, `g_information_id`, `home_prepar_id`, `home_year`, `created_at`, `updated_at`) VALUES
	(1, 3, 2, 2016, NULL, NULL);
/*!40000 ALTER TABLE `home_prepar_link` ENABLE KEYS */;

-- Dumping structure for table post-id.household_consumer
DROP TABLE IF EXISTS `household_consumer`;
CREATE TABLE IF NOT EXISTS `household_consumer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `g_information_id` tinyint(4) DEFAULT NULL,
  `type_meterial_id` tinyint(4) DEFAULT NULL,
  `number_meterial` int(11) DEFAULT NULL,
  `market_value_meterial` int(11) DEFAULT NULL,
  `total_rail` int(11) DEFAULT NULL,
  `total_meterial_costs` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.household_consumer: 3 rows
/*!40000 ALTER TABLE `household_consumer` DISABLE KEYS */;
INSERT INTO `household_consumer` (`id`, `g_information_id`, `type_meterial_id`, `number_meterial`, `market_value_meterial`, `total_rail`, `total_meterial_costs`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 34, 3, 102, 102.00, '2018-08-23 07:09:32', '2018-08-23 07:09:32'),
	(2, 2, 2, 2, 323, 646, 646.00, '2018-08-23 07:12:16', '2018-08-23 07:12:16'),
	(3, 3, 3, 23, 23, 529, 529.00, '2018-08-23 15:35:09', '2018-08-23 15:35:09');
/*!40000 ALTER TABLE `household_consumer` ENABLE KEYS */;

-- Dumping structure for table post-id.household_family
DROP TABLE IF EXISTS `household_family`;
CREATE TABLE IF NOT EXISTS `household_family` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.household_family: 5 rows
/*!40000 ALTER TABLE `household_family` DISABLE KEYS */;
INSERT INTO `household_family` (`id`, `name_en`, `name_kh`, `created_at`, `updated_at`) VALUES
	(1, 'Personal home', 'ផ្ទះផ្ទាល់ខ្លួន', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(2, 'Rent a house', 'ជួលផ្ទះ', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(3, 'Stay with them for free', 'ស្នាក់នៅជាមួយគេដោយអត់បង់ថ្លៃ', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(4, 'Homeless', 'គ្មានផ្ទះសម្បែង', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(5, 'Accommodation in institution', 'ស្នាក់នៅស្ថាប័ន', '2018-08-23 07:07:40', '2018-08-23 07:07:40');
/*!40000 ALTER TABLE `household_family` ENABLE KEYS */;

-- Dumping structure for table post-id.household_family_link
DROP TABLE IF EXISTS `household_family_link`;
CREATE TABLE IF NOT EXISTS `household_family_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `household_family_id` tinyint(4) DEFAULT NULL,
  `g_information_id` tinyint(4) DEFAULT NULL,
  `institutions_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instatutions_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.household_family_link: 0 rows
/*!40000 ALTER TABLE `household_family_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `household_family_link` ENABLE KEYS */;

-- Dumping structure for table post-id.household_rent_price_link
DROP TABLE IF EXISTS `household_rent_price_link`;
CREATE TABLE IF NOT EXISTS `household_rent_price_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `household_family_id` tinyint(4) DEFAULT NULL,
  `g_information_id` tinyint(4) DEFAULT NULL,
  `house_rent_price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.household_rent_price_link: 0 rows
/*!40000 ALTER TABLE `household_rent_price_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `household_rent_price_link` ENABLE KEYS */;

-- Dumping structure for table post-id.household_root_link
DROP TABLE IF EXISTS `household_root_link`;
CREATE TABLE IF NOT EXISTS `household_root_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `household_family_id` tinyint(4) DEFAULT NULL,
  `g_information_id` tinyint(4) DEFAULT NULL,
  `ground_floor_length` int(11) DEFAULT NULL,
  `ground_floor_width` int(11) DEFAULT NULL,
  `ground_floor_area` int(11) DEFAULT NULL,
  `upper_floor_length` int(11) DEFAULT NULL,
  `upper_floor_width` int(11) DEFAULT NULL,
  `upper_floor_area` int(11) DEFAULT NULL,
  `further_floor_length` int(11) DEFAULT NULL,
  `further_floor_width` int(11) DEFAULT NULL,
  `further_floor_area` int(11) DEFAULT NULL,
  `total_area` int(11) DEFAULT NULL,
  `h_build_year` int(11) DEFAULT NULL,
  `home_prepare_id` tinyint(4) DEFAULT NULL,
  `roof_made_id` tinyint(4) DEFAULT NULL,
  `roof_status_id` tinyint(4) DEFAULT NULL,
  `walls_made_id` tinyint(4) DEFAULT NULL,
  `walls_status_id` tinyint(4) DEFAULT NULL,
  `condition_house_id` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `household_root_link_household_family_id_index` (`household_family_id`),
  KEY `household_root_link_g_information_id_index` (`g_information_id`),
  KEY `household_root_link_home_prepare_id_index` (`home_prepare_id`),
  KEY `household_root_link_roof_made_id_index` (`roof_made_id`),
  KEY `household_root_link_roof_status_id_index` (`roof_status_id`),
  KEY `household_root_link_walls_made_id_index` (`walls_made_id`),
  KEY `household_root_link_walls_status_id_index` (`walls_status_id`),
  KEY `household_root_link_condition_house_id_index` (`condition_house_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.household_root_link: 1 rows
/*!40000 ALTER TABLE `household_root_link` DISABLE KEYS */;
INSERT INTO `household_root_link` (`id`, `household_family_id`, `g_information_id`, `ground_floor_length`, `ground_floor_width`, `ground_floor_area`, `upper_floor_length`, `upper_floor_width`, `upper_floor_area`, `further_floor_length`, `further_floor_width`, `further_floor_area`, `total_area`, `h_build_year`, `home_prepare_id`, `roof_made_id`, `roof_status_id`, `walls_made_id`, `walls_status_id`, `condition_house_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 3, 2, 23, 46, 23, 232, 5336, NULL, NULL, NULL, 5382, 1951, 2, 3, 1, 4, 3, 1, '2018-08-23 15:35:09', '2018-08-23 15:35:09');
/*!40000 ALTER TABLE `household_root_link` ENABLE KEYS */;

-- Dumping structure for table post-id.household_vehicle
DROP TABLE IF EXISTS `household_vehicle`;
CREATE TABLE IF NOT EXISTS `household_vehicle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `g_information_id` tinyint(4) DEFAULT NULL,
  `type_vehicle_id` tinyint(4) DEFAULT NULL,
  `number_vehicle` int(11) DEFAULT NULL,
  `market_value_vehicle` int(11) DEFAULT NULL,
  `total_rail_vehicle` int(11) DEFAULT NULL,
  `total_vehicle_costs` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.household_vehicle: 3 rows
/*!40000 ALTER TABLE `household_vehicle` DISABLE KEYS */;
INSERT INTO `household_vehicle` (`id`, `g_information_id`, `type_vehicle_id`, `number_vehicle`, `market_value_vehicle`, `total_rail_vehicle`, `total_vehicle_costs`, `created_at`, `updated_at`) VALUES
	(1, 1, 3, 34, 34, 1156, 1156.00, '2018-08-23 07:09:32', '2018-08-23 07:09:32'),
	(2, 2, 1, 23, 32, 736, 736.00, '2018-08-23 07:12:16', '2018-08-23 07:12:16'),
	(3, 3, 2, 23, 23, 529, 529.00, '2018-08-23 15:35:09', '2018-08-23 15:35:09');
/*!40000 ALTER TABLE `household_vehicle` ENABLE KEYS */;

-- Dumping structure for table post-id.land_agricultural
DROP TABLE IF EXISTS `land_agricultural`;
CREATE TABLE IF NOT EXISTS `land_agricultural` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.land_agricultural: 3 rows
/*!40000 ALTER TABLE `land_agricultural` DISABLE KEYS */;
INSERT INTO `land_agricultural` (`id`, `name_en`, `name_kh`, `created_at`, `updated_at`) VALUES
	(1, 'No rental', 'គ្មាន', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(2, 'Land for rent', 'ដីជួលគេ', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(3, 'Personal land', 'ដីផ្ទាល់ខ្លួន', '2018-08-23 07:07:40', '2018-08-23 07:07:40');
/*!40000 ALTER TABLE `land_agricultural` ENABLE KEYS */;

-- Dumping structure for table post-id.land_agricultural_link
DROP TABLE IF EXISTS `land_agricultural_link`;
CREATE TABLE IF NOT EXISTS `land_agricultural_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `land_agricultural_id` tinyint(4) DEFAULT NULL,
  `g_information_id` tinyint(4) DEFAULT NULL,
  `p_land_name` int(11) DEFAULT NULL,
  `p_total_land` int(11) DEFAULT NULL,
  `p_land_farm` int(11) DEFAULT NULL,
  `p_total_land_farm` int(11) DEFAULT NULL,
  `p_sum_land_farm` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.land_agricultural_link: 0 rows
/*!40000 ALTER TABLE `land_agricultural_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `land_agricultural_link` ENABLE KEYS */;

-- Dumping structure for table post-id.land_agricultural_link_other
DROP TABLE IF EXISTS `land_agricultural_link_other`;
CREATE TABLE IF NOT EXISTS `land_agricultural_link_other` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `land_agricultural_id` tinyint(4) DEFAULT NULL,
  `g_information_id` tinyint(4) DEFAULT NULL,
  `land_name` int(11) DEFAULT NULL,
  `total_land` int(11) DEFAULT NULL,
  `land_farm` int(11) DEFAULT NULL,
  `total_land_farm` int(11) DEFAULT NULL,
  `sum_land_farm` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.land_agricultural_link_other: 0 rows
/*!40000 ALTER TABLE `land_agricultural_link_other` DISABLE KEYS */;
/*!40000 ALTER TABLE `land_agricultural_link_other` ENABLE KEYS */;

-- Dumping structure for table post-id.loan
DROP TABLE IF EXISTS `loan`;
CREATE TABLE IF NOT EXISTS `loan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.loan: 2 rows
/*!40000 ALTER TABLE `loan` DISABLE KEYS */;
INSERT INTO `loan` (`id`, `name_en`, `name_kh`, `created_at`, `updated_at`) VALUES
	(1, 'No debt => If you need about 40,0000 Riel, can you borrow?', 'មិនមាន​បំណុលទេ​ => បើអ្នកត្រូវការលុយប្រហែល៤០,០០០០រៀល តើអ្នកអាចខ្ចីគេបានទេ?', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(2, 'Debt => outstanding debt to date', 'មាន​បំណុល => ចំនួនបំណុលដែលមិនទាន់សងគិតមកដល់បច្ចុប្បន្ន', '2018-08-23 07:07:40', '2018-08-23 07:07:40');
/*!40000 ALTER TABLE `loan` ENABLE KEYS */;

-- Dumping structure for table post-id.member_family
DROP TABLE IF EXISTS `member_family`;
CREATE TABLE IF NOT EXISTS `member_family` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `g_information_id` int(11) DEFAULT NULL,
  `nick_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender_id` tinyint(4) DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_relationship_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_level_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.member_family: 4 rows
/*!40000 ALTER TABLE `member_family` DISABLE KEYS */;
INSERT INTO `member_family` (`id`, `g_information_id`, `nick_name`, `gender_id`, `dob`, `age`, `family_relationship_id`, `occupation_id`, `education_level_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '34', 1, '1984', '34', '2', '1', '2', '2018-08-23 07:09:32', '2018-08-23 07:09:32'),
	(2, 2, '23', 1, '2016', '2', '2', '1', '3', '2018-08-23 07:12:16', '2018-08-23 07:12:16'),
	(3, 3, '23', 2, '1995', '23', '2', '1', '3', '2018-08-23 15:35:09', '2018-08-23 15:35:09'),
	(4, 3, '23', 1, '1995', '23', '4', '3', '3', '2018-08-23 15:35:09', '2018-08-23 15:35:09');
/*!40000 ALTER TABLE `member_family` ENABLE KEYS */;

-- Dumping structure for table post-id.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.migrations: ~44 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(177, '2014_10_12_000000_create_users_table', 1),
	(178, '2014_10_12_100000_create_password_resets_table', 1),
	(179, '2018_06_04_062651_create_general_information_table', 1),
	(180, '2018_06_04_070122_create_relationship_table', 1),
	(181, '2018_06_08_035949_create_gender_table', 1),
	(182, '2018_06_08_040720_create_member_family_table', 1),
	(183, '2018_06_08_042039_create_household_family_table', 1),
	(184, '2018_06_08_042921_create_general_situation_family_table', 1),
	(185, '2018_06_08_044005_create_household_family_link_table', 1),
	(186, '2018_06_11_040405_crate_area_family_house_table', 1),
	(187, '2018_06_11_062840_crate_home_prepar_table', 1),
	(188, '2018_06_11_065319_create_home_prepar_link_table', 1),
	(189, '2018_06_11_070142_create_condition_house_table', 1),
	(190, '2018_06_11_090657_create_household_consumer_table', 1),
	(191, '2018_06_11_095553_create_electric_grid_table', 1),
	(192, '2018_06_11_095717_create_question_table', 1),
	(193, '2018_06_11_105000_create_household_vehicle_table', 1),
	(194, '2018_06_11_110419_create_type_income_table', 1),
	(195, '2018_06_11_111203_create_land_agricultural_table', 1),
	(196, '2018_06_11_134822_create_loan_table', 1),
	(197, '2018_06_11_135644_create_other_income_not_agriculture_table', 1),
	(198, '2018_06_11_135644_create_other_income_table', 1),
	(199, '2018_06_11_143427_create_debt_loan_link_table', 1),
	(200, '2018_06_12_063811_family_relation', 1),
	(201, '2018_06_12_081120_create_occupation_table', 1),
	(202, '2018_06_12_082119_create_education_level_table', 1),
	(203, '2018_06_12_091359_roof_made', 1),
	(204, '2018_06_12_091410_wall_made', 1),
	(205, '2018_06_13_023420_create_question_electric_table', 1),
	(206, '2018_06_13_030952_create_type_meterial_table', 1),
	(207, '2018_06_13_091029_create_type_animals_table', 1),
	(208, '2018_06_14_082318_create_household_root_link_table', 1),
	(209, '2018_06_14_085348_create_household_rent_price_link_table', 1),
	(210, '2018_06_15_045140_create_yes_electric_link_table', 1),
	(211, '2018_06_15_045158_create_no_electric_link_table', 1),
	(212, '2018_06_15_050805_create_type_transportation_table', 1),
	(213, '2018_06_15_062345_create_land_agricultural_link_table', 1),
	(214, '2018_06_15_094213_create_question_totet_table', 1),
	(215, '2018_06_15_101104_create_type_toilet_link_table', 1),
	(216, '2018_06_19_071556_store_core', 1),
	(217, '2018_07_03_022146_entrust_setup_tables', 1),
	(218, '2018_07_04_063150_create_health_table', 1),
	(219, '2018_07_04_063735_create_health_link_table', 1),
	(220, '2018_07_18_025934_land_agricultural_link_other', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table post-id.no_electric_link
DROP TABLE IF EXISTS `no_electric_link`;
CREATE TABLE IF NOT EXISTS `no_electric_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `q_electric_id` tinyint(4) DEFAULT NULL,
  `g_information_id` tinyint(4) DEFAULT NULL,
  `electric_grid_id` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.no_electric_link: 2 rows
/*!40000 ALTER TABLE `no_electric_link` DISABLE KEYS */;
INSERT INTO `no_electric_link` (`id`, `q_electric_id`, `g_information_id`, `electric_grid_id`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, 1, '2018-08-23 07:09:32', '2018-08-23 07:09:32'),
	(2, 2, 2, 2, '2018-08-23 07:12:16', '2018-08-23 07:12:16');
/*!40000 ALTER TABLE `no_electric_link` ENABLE KEYS */;

-- Dumping structure for table post-id.occupation
DROP TABLE IF EXISTS `occupation`;
CREATE TABLE IF NOT EXISTS `occupation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.occupation: 7 rows
/*!40000 ALTER TABLE `occupation` DISABLE KEYS */;
INSERT INTO `occupation` (`id`, `name_en`, `name_kh`, `created_at`, `updated_at`) VALUES
	(1, 'Farmers', 'កសិករ', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(2, 'Workers', 'កម្មករ', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(3, 'Civil servants', 'មន្រី្តរាជការ', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(4, 'Businessman', 'អ្នករកស៊ី', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(5, 'Student', 'សិស្ស', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(6, 'At home', 'នៅផ្ទះ', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(7, 'Other', 'ផ្សេង​ៗ', '2018-08-23 07:07:40', '2018-08-23 07:07:40');
/*!40000 ALTER TABLE `occupation` ENABLE KEYS */;

-- Dumping structure for table post-id.other_income
DROP TABLE IF EXISTS `other_income`;
CREATE TABLE IF NOT EXISTS `other_income` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `g_information_id` tinyint(4) DEFAULT NULL,
  `income_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_age` int(11) DEFAULT NULL,
  `income_occupation` int(11) DEFAULT NULL,
  `income_unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_in_month` int(11) DEFAULT NULL,
  `average_amount` int(11) DEFAULT NULL,
  `monthly_income` int(11) DEFAULT NULL,
  `total_mon_income` int(11) DEFAULT NULL,
  `total_inc_person` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.other_income: 4 rows
/*!40000 ALTER TABLE `other_income` DISABLE KEYS */;
INSERT INTO `other_income` (`id`, `g_information_id`, `income_name`, `income_age`, `income_occupation`, `income_unit`, `unit_in_month`, `average_amount`, `monthly_income`, `total_mon_income`, `total_inc_person`, `created_at`, `updated_at`) VALUES
	(1, 1, '34', 34, 1, 'day', 3, 3333, 9999, 9999, 9999, '2018-08-23 07:09:32', '2018-08-23 07:09:32'),
	(2, 2, '23', 2, 2, 'day', 23, 23, 529, 529, 529, '2018-08-23 07:12:16', '2018-08-23 07:12:16'),
	(3, 3, '23', 23, 3, 'day', 23, 23, 529, 575, 288, '2018-08-23 15:35:09', '2018-08-23 15:35:09'),
	(4, 3, '23', 23, 2, 'day', 2, 23, 46, 575, 288, '2018-08-23 15:35:09', '2018-08-23 15:35:09');
/*!40000 ALTER TABLE `other_income` ENABLE KEYS */;

-- Dumping structure for table post-id.other_income_not_agriculture
DROP TABLE IF EXISTS `other_income_not_agriculture`;
CREATE TABLE IF NOT EXISTS `other_income_not_agriculture` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `g_information_id` tinyint(4) DEFAULT NULL,
  `income_name_not` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_age_not` int(11) DEFAULT NULL,
  `income_occupation_not` int(11) DEFAULT NULL,
  `income_unit_not` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_in_month_not` int(11) DEFAULT NULL,
  `average_amount_not` int(11) DEFAULT NULL,
  `monthly_income_not` int(11) DEFAULT NULL,
  `total_mon_income_not` int(11) DEFAULT NULL,
  `total_inc_person_not` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.other_income_not_agriculture: 0 rows
/*!40000 ALTER TABLE `other_income_not_agriculture` DISABLE KEYS */;
/*!40000 ALTER TABLE `other_income_not_agriculture` ENABLE KEYS */;

-- Dumping structure for table post-id.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.password_resets: 0 rows
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table post-id.permissions
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` tinyint(4) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.permissions: 8 rows
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `parent_id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 1, 'role-list', 'Display Role Listing', 'See only Listing Of Role', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(2, 1, 'role-create', 'Create Role', 'Create New Role', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(3, 1, 'role-edit', 'Edit Role', 'Edit Role', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(4, 1, 'role-delete', 'Delete Role', 'Delete Role', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(5, 2, 'user-list', 'Display Users', 'See only Listing Of Users', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(6, 2, 'user-create', 'Create Users', 'Create New Usrs', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(7, 2, 'user-edit', 'Edit Users', 'Edit Users', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(8, 2, 'user-delete', 'Deleted Users', 'Deleted Users', '2018-08-23 07:07:40', '2018-08-23 07:07:40');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table post-id.permission_group
DROP TABLE IF EXISTS `permission_group`;
CREATE TABLE IF NOT EXISTS `permission_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table post-id.permission_group: ~2 rows (approximately)
/*!40000 ALTER TABLE `permission_group` DISABLE KEYS */;
INSERT INTO `permission_group` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'TO', '2018-08-08 09:59:02', '2018-08-08 09:59:03'),
	(2, 'HIQA', '2018-08-08 09:59:14', '2018-08-08 09:59:15');
/*!40000 ALTER TABLE `permission_group` ENABLE KEYS */;

-- Dumping structure for table post-id.permission_role
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.permission_role: 0 rows
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

-- Dumping structure for table post-id.question
DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.question: 2 rows
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` (`id`, `name_en`, `name_kh`, `created_at`, `updated_at`) VALUES
	(1, 'Yes', 'បាន', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(2, 'No', 'មិនបាន', '2018-08-23 07:07:40', '2018-08-23 07:07:40');
/*!40000 ALTER TABLE `question` ENABLE KEYS */;

-- Dumping structure for table post-id.question_electric
DROP TABLE IF EXISTS `question_electric`;
CREATE TABLE IF NOT EXISTS `question_electric` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.question_electric: 2 rows
/*!40000 ALTER TABLE `question_electric` DISABLE KEYS */;
INSERT INTO `question_electric` (`id`, `name_en`, `name_kh`, `created_at`, `updated_at`) VALUES
	(1, 'Yes', 'បានត', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(2, 'No', 'មិនបានត', '2018-08-23 07:07:40', '2018-08-23 07:07:40');
/*!40000 ALTER TABLE `question_electric` ENABLE KEYS */;

-- Dumping structure for table post-id.question_totel
DROP TABLE IF EXISTS `question_totel`;
CREATE TABLE IF NOT EXISTS `question_totel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_kh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.question_totel: 2 rows
/*!40000 ALTER TABLE `question_totel` DISABLE KEYS */;
INSERT INTO `question_totel` (`id`, `name_en`, `name_kh`, `created_at`, `updated_at`) VALUES
	(1, 'Yes', 'មាន', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(2, 'No', 'គ្មាន', '2018-08-23 07:07:40', '2018-08-23 07:07:40');
/*!40000 ALTER TABLE `question_totel` ENABLE KEYS */;

-- Dumping structure for table post-id.relationship
DROP TABLE IF EXISTS `relationship`;
CREATE TABLE IF NOT EXISTS `relationship` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `record_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.relationship: 8 rows
/*!40000 ALTER TABLE `relationship` DISABLE KEYS */;
INSERT INTO `relationship` (`id`, `name_en`, `name_kh`, `record_status`, `created_at`, `updated_at`) VALUES
	(1, 'Husband', 'ប្តី', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(2, 'Wife', 'ប្រពន្ធ', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(3, 'Children', 'កូន', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(4, 'Grandmonther', 'ក្មួយ', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(5, 'Grandmonther', 'អ៊ុំ', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(6, 'Grandmonther', 'បង/ប្អូន ', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(7, 'Grandmother / Grandfather', 'ជីដូន/ជីតា', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(8, 'Other', 'ផ្សេងៗ', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40');
/*!40000 ALTER TABLE `relationship` ENABLE KEYS */;

-- Dumping structure for table post-id.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.roles: 0 rows
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table post-id.role_user
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.role_user: 0 rows
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

-- Dumping structure for table post-id.roof_made
DROP TABLE IF EXISTS `roof_made`;
CREATE TABLE IF NOT EXISTS `roof_made` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `record_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.roof_made: 9 rows
/*!40000 ALTER TABLE `roof_made` DISABLE KEYS */;
INSERT INTO `roof_made` (`id`, `name_en`, `name_kh`, `record_status`, `created_at`, `updated_at`) VALUES
	(1, 'Wood', 'ឈើ', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(2, 'parm_spring', 'ស្លឹកត្នោត', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(3, 'grass', 'ស្បូវ', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(4, 'cu', 'ស័ង្ហសី', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(5, 'tile', 'ក្បឿង', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(6, 'plastic', 'កៅស៊ូពណ៌/ប្លាស្ទិក', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(7, 'filippo_cement', 'ហ្វីប្រូស៊ីម៉ងត៍', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(8, 'concrete', 'បេតុង', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(9, 'Other', 'ផ្សេងៗ', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40');
/*!40000 ALTER TABLE `roof_made` ENABLE KEYS */;

-- Dumping structure for table post-id.store_score
DROP TABLE IF EXISTS `store_score`;
CREATE TABLE IF NOT EXISTS `store_score` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `patient` int(11) NOT NULL,
  `size_member` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `toilet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roof` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wall` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_rent_house` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_electronic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `use_energy_elect` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_energy_elect` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `animal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_farm` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_farm` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_out_farmer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_out_not_farmer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_child` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disease` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age_action` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `record_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.store_score: 3 rows
/*!40000 ALTER TABLE `store_score` DISABLE KEYS */;
INSERT INTO `store_score` (`id`, `patient`, `size_member`, `toilet`, `roof`, `wall`, `house_status`, `price_rent_house`, `price_electronic`, `use_energy_elect`, `no_energy_elect`, `vehicle`, `animal`, `personal_farm`, `other_farm`, `income_out_farmer`, `income_out_not_farmer`, `income_child`, `disease`, `debt`, `edu`, `age_action`, `record_status`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, '4', NULL, NULL, NULL, NULL, '6', NULL, '0', '6', '0', NULL, NULL, NULL, NULL, NULL, '10', NULL, '4', NULL, '1', '2018-08-23 07:09:32', '2018-08-23 07:09:32'),
	(2, 2, NULL, '4', NULL, NULL, NULL, NULL, '6', NULL, '5', '6', '0', NULL, NULL, NULL, NULL, NULL, '10', NULL, '0', NULL, '1', '2018-08-23 07:12:16', '2018-08-23 07:12:16'),
	(3, 3, '0', '0', '6', '0', '4', NULL, '6', '8', NULL, '6', '0', NULL, NULL, NULL, NULL, NULL, '10', NULL, '4', NULL, '1', '2018-08-23 15:35:09', '2018-08-23 15:35:09');
/*!40000 ALTER TABLE `store_score` ENABLE KEYS */;

-- Dumping structure for table post-id.type_animals
DROP TABLE IF EXISTS `type_animals`;
CREATE TABLE IF NOT EXISTS `type_animals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.type_animals: 3 rows
/*!40000 ALTER TABLE `type_animals` DISABLE KEYS */;
INSERT INTO `type_animals` (`id`, `name_en`, `name_kh`, `created_at`, `updated_at`) VALUES
	(1, 'Cow - buffalo', 'គោ-ក្របី', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(2, 'Pigs - Goats - sheep', 'ជ្រូក-ពពែ-ចៀម', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(3, 'Chicken - duck', 'មាន់-ទា', '2018-08-23 07:07:40', '2018-08-23 07:07:40');
/*!40000 ALTER TABLE `type_animals` ENABLE KEYS */;

-- Dumping structure for table post-id.type_income
DROP TABLE IF EXISTS `type_income`;
CREATE TABLE IF NOT EXISTS `type_income` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `g_information_id` tinyint(4) DEFAULT NULL,
  `type_animals_id` tinyint(4) DEFAULT NULL,
  `num_animals` int(11) DEFAULT NULL,
  `num_animals_big` int(11) DEFAULT NULL,
  `num_animals_small` int(11) DEFAULT NULL,
  `note_animals` int(11) DEFAULT NULL,
  `total_animals_costs` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.type_income: 3 rows
/*!40000 ALTER TABLE `type_income` DISABLE KEYS */;
INSERT INTO `type_income` (`id`, `g_information_id`, `type_animals_id`, `num_animals`, `num_animals_big`, `num_animals_small`, `note_animals`, `total_animals_costs`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, NULL, 34, 34, 0, NULL, '2018-08-23 07:09:32', '2018-08-23 07:09:32'),
	(2, 2, 2, 23, NULL, NULL, 23, NULL, '2018-08-23 07:12:16', '2018-08-23 07:12:16'),
	(3, 3, 1, NULL, 23, 23, 0, NULL, '2018-08-23 15:35:09', '2018-08-23 15:35:09');
/*!40000 ALTER TABLE `type_income` ENABLE KEYS */;

-- Dumping structure for table post-id.type_meterial
DROP TABLE IF EXISTS `type_meterial`;
CREATE TABLE IF NOT EXISTS `type_meterial` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.type_meterial: 6 rows
/*!40000 ALTER TABLE `type_meterial` DISABLE KEYS */;
INSERT INTO `type_meterial` (`id`, `name_en`, `name_kh`, `created_at`, `updated_at`) VALUES
	(1, 'Mobile phones', 'ទូរស័ព្ទដៃ', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(2, 'Electric fans', 'កង្ហារ​អគ្គិសនី', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(3, 'Radios', 'វិទ្យុ ម៉ាញ៉េ', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(4, 'TV', 'ទូរទស្សន៍', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(5, 'Pump or pumping pump', 'ម៉ាស៊ីនបូមទឹក ឬម៉ូទ័របូមទឹក', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(6, 'Other', 'ឧបករណ៍ផ្សេងៗ(ទូទឹកកក………)', '2018-08-23 07:07:40', '2018-08-23 07:07:40');
/*!40000 ALTER TABLE `type_meterial` ENABLE KEYS */;

-- Dumping structure for table post-id.type_toilet_link
DROP TABLE IF EXISTS `type_toilet_link`;
CREATE TABLE IF NOT EXISTS `type_toilet_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `g_information_id` tinyint(4) DEFAULT NULL,
  `toilet_id` tinyint(4) DEFAULT NULL,
  `toilet_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `toilet_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.type_toilet_link: 1 rows
/*!40000 ALTER TABLE `type_toilet_link` DISABLE KEYS */;
INSERT INTO `type_toilet_link` (`id`, `g_information_id`, `toilet_id`, `toilet_1`, `toilet_2`, `created_at`, `updated_at`) VALUES
	(1, 3, 1, 'បង្គន់ចាក់ទឹក', 'ជាបង្គន់របស់គ្រួសារអ្នកផ្ទាល់', '2018-08-23 15:35:09', '2018-08-23 15:35:09');
/*!40000 ALTER TABLE `type_toilet_link` ENABLE KEYS */;

-- Dumping structure for table post-id.type_transportation
DROP TABLE IF EXISTS `type_transportation`;
CREATE TABLE IF NOT EXISTS `type_transportation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.type_transportation: 7 rows
/*!40000 ALTER TABLE `type_transportation` DISABLE KEYS */;
INSERT INTO `type_transportation` (`id`, `name_en`, `name_kh`, `created_at`, `updated_at`) VALUES
	(1, 'Bikes', 'កង់', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(2, 'Motorbike or motorbike', 'ម៉ូតូ ឬ ម៉ូតូ​រ៉ឺម៉ក', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(3, 'Small class boat', 'ទូកថ្នាក់តូច', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(4, 'Boat machines', 'ទូកម៉ាស៊ីន', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(5, 'Ox cart (wooden or tire wheel)', 'រទេះគោ (កង់ឈើ ឬកង់ឡាន)', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(6, 'Tractor', 'គោយន្ត', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(7, 'Other', 'ផ្សេងៗ', '2018-08-23 07:07:40', '2018-08-23 07:07:40');
/*!40000 ALTER TABLE `type_transportation` ENABLE KEYS */;

-- Dumping structure for table post-id.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.users: 2 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `province`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'BTB', 'admin@admin.com', '$2y$10$ZjAjrgj5TPSPaQiXjO/HOeGwNKzeKqvHgN60s3o9TeIyjRY8YVVaC', NULL, '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(2, 'user', 'PHP', 'user@user.com', '$2y$10$o2QQmGGT3cT9SjpqBEh9LOmZ/1fXTGYXx54qklYbhIkLjGYjaFgr2', NULL, '2018-08-23 07:07:40', '2018-08-23 07:07:40');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table post-id.user_group
DROP TABLE IF EXISTS `user_group`;
CREATE TABLE IF NOT EXISTS `user_group` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `group_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table post-id.user_group: ~7 rows (approximately)
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
INSERT INTO `user_group` (`user_id`, `group_id`) VALUES
	(1, 1),
	(1, 2),
	(2, 2),
	(3, 1),
	(5, 2),
	(6, 1),
	(6, 2);
/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;

-- Dumping structure for table post-id.wall_made
DROP TABLE IF EXISTS `wall_made`;
CREATE TABLE IF NOT EXISTS `wall_made` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_kh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `record_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.wall_made: 8 rows
/*!40000 ALTER TABLE `wall_made` DISABLE KEYS */;
INSERT INTO `wall_made` (`id`, `name_en`, `name_kh`, `record_status`, `created_at`, `updated_at`) VALUES
	(1, 'parm_spring', 'ស្លឹកត្នោត', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(2, 'grass', 'ស្បូវ', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(3, 'bamboo', 'ឬស្សី', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(4, 'cu', 'ស័ង្ហសី', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(5, 'board', 'ឈើ', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(6, 'cement', 'ឥដ្ឋ/ស៊ីម៉ង់ ', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(7, 'no_wall', 'គ្មានជញ្ជាំង', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40'),
	(8, 'Other', 'ផ្សេងៗ', '1', '2018-08-23 07:07:40', '2018-08-23 07:07:40');
/*!40000 ALTER TABLE `wall_made` ENABLE KEYS */;

-- Dumping structure for table post-id.yes_electric_link
DROP TABLE IF EXISTS `yes_electric_link`;
CREATE TABLE IF NOT EXISTS `yes_electric_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `q_electric_id` tinyint(4) DEFAULT NULL,
  `g_information_id` tinyint(4) DEFAULT NULL,
  `costs_in_hour` int(11) DEFAULT NULL,
  `number_in_month` int(11) DEFAULT NULL,
  `costs_per_month` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.yes_electric_link: 1 rows
/*!40000 ALTER TABLE `yes_electric_link` DISABLE KEYS */;
INSERT INTO `yes_electric_link` (`id`, `q_electric_id`, `g_information_id`, `costs_in_hour`, `number_in_month`, `costs_per_month`, `created_at`, `updated_at`) VALUES
	(1, 1, 3, 23, 23, 529.00, '2018-08-23 15:35:09', '2018-08-23 15:35:09');
/*!40000 ALTER TABLE `yes_electric_link` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
