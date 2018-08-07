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


-- Dumping database structure for post-id
CREATE DATABASE IF NOT EXISTS `post-id` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `post-id`;

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
	(1, 'Degradation', 'ទ្រុឌទ្រោម', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(2, 'Medium', 'មធ្យម', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(3, 'New', 'ថ្មី', '2018-08-03 01:46:04', '2018-08-03 01:46:04');
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.debt_loan_link: 0 rows
/*!40000 ALTER TABLE `debt_loan_link` DISABLE KEYS */;
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
	(1, 'Grade 1', 'ថ្នាក់ទី ១', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(2, 'Grade 2', 'ថ្នាក់ទី ២', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(3, 'Grade 3', 'ថ្នាក់ទី ៣', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(4, 'Grade 4', 'ថ្នាក់ទី ៤', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(5, 'Grade 5', 'ថ្នាក់ទី ៥', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(6, 'Grade 6', 'ថ្នាក់ទី ៦', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(7, 'Grade 7', 'ថ្នាក់ទី ៧', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(8, 'Grade 8', 'ថ្នាក់ទី ៨', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(9, 'Grade 9', 'ថ្នាក់ទី ៩', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(10, 'Grade 10', 'ថ្នាក់ទី ១០', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(11, 'Grade​ 11', 'ថ្នាក់ទី ១១', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(12, 'Grade 12', 'ថ្នាក់ទី ១២', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(13, 'Bachelor Degree', 'បរិញ្ញាប័ត្រ', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(14, 'Did not learn', 'មិនបានរៀនសោះ', '2018-08-03 01:46:04', '2018-08-03 01:46:04');
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
	(1, 'Use the generator', 'ប្រើម៉ាស៊ីនភ្លើង', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(2, 'Use batteries', 'ប្រើអាគុយ', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(3, 'Use a cigarette lamp', 'ប្រើចង្កៀងប្រេងកាត', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(4, 'Solar power', 'ថាមពលព្រះអាទិត្យ', '2018-08-03 01:46:04', '2018-08-03 01:46:04');
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
	(1, 'Village chiefs', 'មេភូមិ', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(2, 'Near house', 'អ្នកជិតខាង', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(3, 'friends', 'មិត្តភ័ក្រ', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(4, 'Other', 'ផ្សេងៗ', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04');
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
	(1, 'Male', 'ប្រុស', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(2, 'Female', 'ស្រី', '2018-08-03 01:46:04', '2018-08-03 01:46:04');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;

-- Dumping structure for table post-id.general_information
DROP TABLE IF EXISTS `general_information`;
CREATE TABLE IF NOT EXISTS `general_information` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `od_code` int(11) DEFAULT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.general_information: 0 rows
/*!40000 ALTER TABLE `general_information` DISABLE KEYS */;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.general_situation_family: 0 rows
/*!40000 ALTER TABLE `general_situation_family` DISABLE KEYS */;
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
	(1, 'ចំនួន​សមាជិក​គ្រួសារ ​ដែលបាត់បង់លទ្ធភាពពលកម្មស្ទើរទាំងស្រុង ដោយសារមានជម្ងឺធ្ងន់ធ្ងរ/រ៉ាំរ៉ៃ ឬពិការធ្ងន់ធ្ងរ', 'ចំនួន​សមាជិក​គ្រួសារ ​ដែលបាត់បង់លទ្ធភាពពលកម្មស្ទើរទាំងស្រុង ដោយសារមានជម្ងឺធ្ងន់ធ្ងរ/រ៉ាំរ៉ៃ ឬពិការធ្ងន់ធ្ងរ', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(2, 'ចំនួន​សមាជិក​គ្រួសារ ​ដែលបាត់បង់លទ្ធភាពពលកម្មប្រហែល៥០ % ដោយសារមានជម្ងឺធ្ងន់ធ្ងរ/រ៉ាំរ៉ៃ ឬពិការធ្ងន់ធ្ងរ', 'ចំនួន​សមាជិក​គ្រួសារ ​ដែលបាត់បង់លទ្ធភាពពលកម្មប្រហែល៥០ % ដោយសារមានជម្ងឺធ្ងន់ធ្ងរ/រ៉ាំរ៉ៃ ឬពិការធ្ងន់ធ្ងរ', '2018-08-03 01:46:04', '2018-08-03 01:46:04');
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

-- Dumping data for table post-id.health_link: 0 rows
/*!40000 ALTER TABLE `health_link` DISABLE KEYS */;
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
	(1, 'No', 'មិនបាន', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(2, 'Yes', 'បាន នៅឆ្នាំ', '2018-08-03 01:46:04', '2018-08-03 01:46:04');
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.home_prepar_link: 0 rows
/*!40000 ALTER TABLE `home_prepar_link` DISABLE KEYS */;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.household_consumer: 0 rows
/*!40000 ALTER TABLE `household_consumer` DISABLE KEYS */;
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
	(1, 'Personal home', 'ផ្ទះផ្ទាល់ខ្លួន', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(2, 'Rent a house', 'ជួលផ្ទះ', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(3, 'Stay with them for free', 'ស្នាក់នៅជាមួយគេដោយអត់បង់ថ្លៃ', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(4, 'Homeless', 'គ្មានផ្ទះសម្បែង', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(5, 'Accommodation in institution', 'ស្នាក់នៅស្ថាប័ន', '2018-08-03 01:46:04', '2018-08-03 01:46:04');
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.household_root_link: 0 rows
/*!40000 ALTER TABLE `household_root_link` DISABLE KEYS */;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.household_vehicle: 0 rows
/*!40000 ALTER TABLE `household_vehicle` DISABLE KEYS */;
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
	(1, 'No rental', 'គ្មាន', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(2, 'Land for rent', 'ដីជួលគេ', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(3, 'Personal land', 'ដីផ្ទាល់ខ្លួន', '2018-08-03 01:46:04', '2018-08-03 01:46:04');
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
	(1, 'No debt => If you need about 40,0000 Riel, can you borrow?', 'មិនមាន​បំណុលទេ​ => បើអ្នកត្រូវការលុយប្រហែល៤០,០០០០រៀល តើអ្នកអាចខ្ចីគេបានទេ?', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(2, 'Debt => outstanding debt to date', 'មាន​បំណុល => ចំនួនបំណុលដែលមិនទាន់សងគិតមកដល់បច្ចុប្បន្ន', '2018-08-03 01:46:04', '2018-08-03 01:46:04');
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.member_family: 0 rows
/*!40000 ALTER TABLE `member_family` DISABLE KEYS */;
/*!40000 ALTER TABLE `member_family` ENABLE KEYS */;

-- Dumping structure for table post-id.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.migrations: ~44 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(45, '2014_10_12_000000_create_users_table', 1),
	(46, '2014_10_12_100000_create_password_resets_table', 1),
	(47, '2018_06_04_062651_create_general_information_table', 1),
	(48, '2018_06_04_070122_create_relationship_table', 1),
	(49, '2018_06_08_035949_create_gender_table', 1),
	(50, '2018_06_08_040720_create_member_family_table', 1),
	(51, '2018_06_08_042039_create_household_family_table', 1),
	(52, '2018_06_08_042921_create_general_situation_family_table', 1),
	(53, '2018_06_08_044005_create_household_family_link_table', 1),
	(54, '2018_06_11_040405_crate_area_family_house_table', 1),
	(55, '2018_06_11_062840_crate_home_prepar_table', 1),
	(56, '2018_06_11_065319_create_home_prepar_link_table', 1),
	(57, '2018_06_11_070142_create_condition_house_table', 1),
	(58, '2018_06_11_090657_create_household_consumer_table', 1),
	(59, '2018_06_11_095553_create_electric_grid_table', 1),
	(60, '2018_06_11_095717_create_question_table', 1),
	(61, '2018_06_11_105000_create_household_vehicle_table', 1),
	(62, '2018_06_11_110419_create_type_income_table', 1),
	(63, '2018_06_11_111203_create_land_agricultural_table', 1),
	(64, '2018_06_11_134822_create_loan_table', 1),
	(65, '2018_06_11_135644_create_other_income_not_agriculture_table', 1),
	(66, '2018_06_11_135644_create_other_income_table', 1),
	(67, '2018_06_11_143427_create_debt_loan_link_table', 1),
	(68, '2018_06_12_063811_family_relation', 1),
	(69, '2018_06_12_081120_create_occupation_table', 1),
	(70, '2018_06_12_082119_create_education_level_table', 1),
	(71, '2018_06_12_091359_roof_made', 1),
	(72, '2018_06_12_091410_wall_made', 1),
	(73, '2018_06_13_023420_create_question_electric_table', 1),
	(74, '2018_06_13_030952_create_type_meterial_table', 1),
	(75, '2018_06_13_091029_create_type_animals_table', 1),
	(76, '2018_06_14_082318_create_household_root_link_table', 1),
	(77, '2018_06_14_085348_create_household_rent_price_link_table', 1),
	(78, '2018_06_15_045140_create_yes_electric_link_table', 1),
	(79, '2018_06_15_045158_create_no_electric_link_table', 1),
	(80, '2018_06_15_050805_create_type_transportation_table', 1),
	(81, '2018_06_15_062345_create_land_agricultural_link_table', 1),
	(82, '2018_06_15_094213_create_question_totet_table', 1),
	(83, '2018_06_15_101104_create_type_toilet_link_table', 1),
	(84, '2018_06_19_071556_store_core', 1),
	(85, '2018_07_03_022146_entrust_setup_tables', 1),
	(86, '2018_07_04_063150_create_health_table', 1),
	(87, '2018_07_04_063735_create_health_link_table', 1),
	(88, '2018_07_18_025934_land_agricultural_link_other', 1);
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.no_electric_link: 0 rows
/*!40000 ALTER TABLE `no_electric_link` DISABLE KEYS */;
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
	(1, 'Farmers', 'កសិករ', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(2, 'Workers', 'កម្មករ', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(3, 'Civil servants', 'មន្រី្តរាជការ', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(4, 'Businessman', 'អ្នករកស៊ី', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(5, 'Student', 'សិស្ស', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(6, 'At home', 'នៅផ្ទះ', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(7, 'Other', 'ផ្សេង​ៗ', '2018-08-03 01:46:04', '2018-08-03 01:46:04');
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.other_income: 0 rows
/*!40000 ALTER TABLE `other_income` DISABLE KEYS */;
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
	(1, 1, 'role-list', 'Display Role Listing', 'See only Listing Of Role', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(2, 1, 'role-create', 'Create Role', 'Create New Role', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(3, 1, 'role-edit', 'Edit Role', 'Edit Role', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(4, 1, 'role-delete', 'Delete Role', 'Delete Role', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(5, 2, 'user-list', 'Display Users', 'See only Listing Of Users', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(6, 2, 'user-create', 'Create Users', 'Create New Usrs', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(7, 2, 'user-edit', 'Edit Users', 'Edit Users', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(8, 2, 'user-delete', 'Deleted Users', 'Deleted Users', '2018-08-03 01:46:04', '2018-08-03 01:46:04');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

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

-- Dumping structure for table post-id.phppos_additional_item_numbers
DROP TABLE IF EXISTS `phppos_additional_item_numbers`;
CREATE TABLE IF NOT EXISTS `phppos_additional_item_numbers` (
  `item_id` int(11) NOT NULL,
  `item_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`item_id`,`item_number`),
  UNIQUE KEY `item_number` (`item_number`),
  CONSTRAINT `phppos_additional_item_numbers_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `phppos_items` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_additional_item_numbers: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_additional_item_numbers` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_additional_item_numbers` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_app_config
DROP TABLE IF EXISTS `phppos_app_config`;
CREATE TABLE IF NOT EXISTS `phppos_app_config` (
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_app_config: ~165 rows (approximately)
/*!40000 ALTER TABLE `phppos_app_config` DISABLE KEYS */;
INSERT INTO `phppos_app_config` (`key`, `value`) VALUES
	('additional_payment_types', ''),
	('always_show_item_grid', '0'),
	('always_use_average_cost_method', '0'),
	('announcement_special', ''),
	('auto_focus_on_item_after_sale_and_receiving', '0'),
	('automatically_email_receipt', '0'),
	('automatically_print_duplicate_receipt_for_cc_transactions', '0'),
	('automatically_show_comments_on_receipt', '0'),
	('averaging_method', 'moving_average'),
	('barcode_price_include_tax', '0'),
	('calculate_average_cost_price_from_receivings', '0'),
	('calculate_profit_for_giftcard_when', ''),
	('capture_sig_for_all_payments', '0'),
	('change_sale_date_for_new_sale', '0'),
	('change_sale_date_when_completing_suspended_sale', '0'),
	('change_sale_date_when_suspending', '0'),
	('charge_tax_on_recv', '0'),
	('commission_default_rate', '0'),
	('commission_percent_type', 'selling_price'),
	('company', 'PHP Point Of Sale, LLC'),
	('confirm_error_adding_item', '0'),
	('crlf', '\r\n'),
	('currency_symbol', '$'),
	('currency_symbol_location', 'before'),
	('customers_store_accounts', '0'),
	('date_format', 'middle_endian'),
	('decimal_point', '.'),
	('default_new_items_to_service', '0'),
	('default_payment_type', 'Cash'),
	('default_sales_person', 'logged_in_employee'),
	('default_tax_1_name', 'Sales Tax'),
	('default_tax_1_rate', ''),
	('default_tax_2_cumulative', '0'),
	('default_tax_2_name', 'Sales Tax 2'),
	('default_tax_2_rate', ''),
	('default_tax_3_name', ''),
	('default_tax_3_rate', ''),
	('default_tax_4_name', ''),
	('default_tax_4_rate', ''),
	('default_tax_5_name', ''),
	('default_tax_5_rate', ''),
	('default_tax_rate', '8'),
	('default_tier_percent_type_for_excel_import', 'percent_off'),
	('default_type_for_grid', 'categories'),
	('deleted_payment_types', ''),
	('disable_confirmation_sale', '0'),
	('disable_giftcard_detection', '0'),
	('disable_quick_complete_sale', '0'),
	('disable_sale_notifications', '0'),
	('disable_store_account_when_over_credit_limit', '0'),
	('disable_test_mode', '0'),
	('discount_percent_earned', '0'),
	('do_not_allow_below_cost', '0'),
	('do_not_allow_out_of_stock_items_to_be_sold', '0'),
	('do_not_force_http', '0'),
	('do_not_group_same_items', '0'),
	('ecom_store_location', '1'),
	('ecommerce_cron_sync_operations', 'a:6:{i:0;s:24:"sync_phppos_item_changes";i:1;s:22:"sync_inventory_changes";i:2;s:34:"import_ecommerce_items_into_phppos";i:3;s:31:"export_phppos_tags_to_ecommerce";i:4;s:37:"export_phppos_categories_to_ecommerce";i:5;s:32:"export_phppos_items_to_ecommerce";}'),
	('ecommerce_platform', ''),
	('edit_item_price_if_zero_after_adding', '0'),
	('email_charset', ''),
	('email_provider', 'Use System Default'),
	('enable_customer_loyalty_system', '0'),
	('enable_ebt_payments', '0'),
	('enable_margin_calculator', '0'),
	('enable_quick_edit', '0'),
	('enable_scale', '0'),
	('enable_sounds', '0'),
	('fast_user_switching', '0'),
	('force_https', '0'),
	('group_all_taxes_on_receipt', '0'),
	('hide_barcode_on_sales_and_recv_receipt', '0'),
	('hide_customer_recent_sales', '0'),
	('hide_desc_on_receipt', '0'),
	('hide_layaways_sales_in_reports', '0'),
	('hide_out_of_stock_grid', '0'),
	('hide_points_on_receipt', '0'),
	('hide_price_on_barcodes', '0'),
	('hide_sales_to_discount_on_receipt', '0'),
	('hide_signature', '0'),
	('hide_store_account_balance_on_receipt', '0'),
	('hide_store_account_payments_from_report_totals', '0'),
	('hide_store_account_payments_in_reports', '0'),
	('hide_suspended_recv_in_reports', '0'),
	('hide_test_mode_home', '0'),
	('highlight_low_inventory_items_in_items_module', '0'),
	('id_to_show_on_barcode', 'id'),
	('id_to_show_on_sale_interface', 'number'),
	('include_child_categories_when_searching_or_reporting', '0'),
	('item_id_auto_increment', '1'),
	('item_kit_id_auto_increment', '1'),
	('language', 'english'),
	('legacy_detailed_report_export', '0'),
	('legacy_search_method', '1'),
	('lock_prices_suspended_sales', '0'),
	('logout_on_clock_out', '0'),
	('loyalty_option', 'simple'),
	('loyalty_points_without_tax', '0'),
	('mailing_labels_type', 'pdf'),
	('newline', '\r\n'),
	('number_of_decimals', ''),
	('number_of_items_in_grid', '14'),
	('number_of_items_per_page', '20'),
	('number_of_recent_sales', '10'),
	('number_of_sales_for_discount', ''),
	('online_price_tier', '0'),
	('override_receipt_title', ''),
	('override_tier_name', ''),
	('phppos_session_expiration', '0'),
	('point_value', ''),
	('prices_include_tax', '0'),
	('print_after_receiving', '0'),
	('print_after_sale', '0'),
	('prompt_for_ccv_swipe', '0'),
	('protocol', ''),
	('receipt_text_size', 'small'),
	('receiving_id_auto_increment', '1'),
	('redirect_to_sale_or_recv_screen_after_printing_receipt', '0'),
	('remove_commission_from_profit_in_reports', '0'),
	('remove_customer_contact_info_from_receipt', '0'),
	('remove_customer_name_from_receipt', '0'),
	('remove_points_from_profit', '0'),
	('report_sort_order', 'asc'),
	('require_customer_for_sale', '0'),
	('require_customer_for_suspended_sale', '0'),
	('require_employee_login_before_each_sale', '0'),
	('reset_location_when_switching_employee', '0'),
	('return_policy', 'Change return policy'),
	('round_cash_on_sales', '0'),
	('round_tier_prices_to_2_decimals', '0'),
	('sale_id_auto_increment', '1'),
	('sale_prefix', 'POS'),
	('scale_divide_by', '100'),
	('scale_format', 'scale_1'),
	('select_sales_person_during_sale', '0'),
	('show_clock_on_header', '0'),
	('show_item_id_on_receipt', '0'),
	('show_language_switcher', '0'),
	('show_orig_price_if_marked_down_on_receipt', '0'),
	('show_receipt_after_suspending_sale', '0'),
	('smtp_crypto', ''),
	('smtp_host', ''),
	('smtp_pass', ''),
	('smtp_port', ''),
	('smtp_timeout', ''),
	('smtp_user', ''),
	('speed_up_search_queries', '0'),
	('spend_to_point_ratio', ''),
	('spreadsheet_format', 'XLSX'),
	('store_account_statement_message', ''),
	('suppliers_store_accounts', '0'),
	('supports_full_text', '1'),
	('test_mode', '0'),
	('thousands_separator', ','),
	('time_format', '12_hour'),
	('timeclock', '0'),
	('track_cash', '0'),
	('user_configured_layaway_name', ''),
	('version', '15.1'),
	('virtual_keyboard', ''),
	('website', ''),
	('woo_api_key', ''),
	('woo_api_secret', ''),
	('woo_api_url', ''),
	('woo_version', '3.0.0');
/*!40000 ALTER TABLE `phppos_app_config` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_app_files
DROP TABLE IF EXISTS `phppos_app_files`;
CREATE TABLE IF NOT EXISTS `phppos_app_files` (
  `file_id` int(10) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_data` longblob NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expires` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_app_files: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_app_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_app_files` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_categories
DROP TABLE IF EXISTS `phppos_categories`;
CREATE TABLE IF NOT EXISTS `phppos_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `hide_from_grid` int(1) NOT NULL DEFAULT '0',
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_id` int(10) DEFAULT NULL,
  `color` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `deleted` (`deleted`),
  KEY `phppos_categories_ibfk_1` (`parent_id`),
  KEY `phppos_categories_ibfk_2` (`image_id`),
  KEY `name` (`name`),
  CONSTRAINT `phppos_categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `phppos_categories` (`id`),
  CONSTRAINT `phppos_categories_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `phppos_app_files` (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_categories: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_categories` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_customers
DROP TABLE IF EXISTS `phppos_customers`;
CREATE TABLE IF NOT EXISTS `phppos_customers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `person_id` int(10) NOT NULL,
  `account_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `override_default_tax` int(1) NOT NULL DEFAULT '0',
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `balance` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `credit_limit` decimal(23,10) DEFAULT NULL,
  `points` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `disable_loyalty` int(1) NOT NULL DEFAULT '0',
  `current_spend_for_points` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `current_sales_for_discount` int(10) NOT NULL DEFAULT '0',
  `taxable` int(1) NOT NULL DEFAULT '1',
  `tax_certificate` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `cc_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cc_ref_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cc_preview` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_issuer` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `tier_id` int(10) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_number` (`account_number`),
  KEY `person_id` (`person_id`),
  KEY `deleted` (`deleted`),
  KEY `cc_token` (`cc_token`),
  KEY `phppos_customers_ibfk_2` (`tier_id`),
  KEY `company_name` (`company_name`),
  CONSTRAINT `phppos_customers_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `phppos_people` (`person_id`),
  CONSTRAINT `phppos_customers_ibfk_2` FOREIGN KEY (`tier_id`) REFERENCES `phppos_price_tiers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_customers: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_customers` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_customers_taxes
DROP TABLE IF EXISTS `phppos_customers_taxes`;
CREATE TABLE IF NOT EXISTS `phppos_customers_taxes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `percent` decimal(15,3) NOT NULL,
  `cumulative` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_tax` (`customer_id`,`name`,`percent`),
  CONSTRAINT `phppos_customers_taxes_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `phppos_customers` (`person_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_customers_taxes: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_customers_taxes` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_customers_taxes` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_ecommerce_products
DROP TABLE IF EXISTS `phppos_ecommerce_products`;
CREATE TABLE IF NOT EXISTS `phppos_ecommerce_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_quantity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_ecommerce_products: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_ecommerce_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_ecommerce_products` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_employees
DROP TABLE IF EXISTS `phppos_employees`;
CREATE TABLE IF NOT EXISTS `phppos_employees` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `force_password_change` int(1) NOT NULL DEFAULT '0',
  `always_require_password` int(1) NOT NULL DEFAULT '0',
  `person_id` int(10) NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `commission_percent` decimal(23,10) DEFAULT '0.0000000000',
  `commission_percent_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `hourly_pay_rate` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `not_required_to_clock_in` int(1) NOT NULL DEFAULT '0',
  `inactive` int(1) NOT NULL DEFAULT '0',
  `reason_inactive` text COLLATE utf8_unicode_ci,
  `hire_date` date DEFAULT NULL,
  `employee_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `termination_date` date DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `employee_number` (`employee_number`),
  KEY `person_id` (`person_id`),
  KEY `deleted` (`deleted`),
  CONSTRAINT `phppos_employees_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `phppos_people` (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_employees: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_employees` DISABLE KEYS */;
INSERT INTO `phppos_employees` (`id`, `username`, `password`, `force_password_change`, `always_require_password`, `person_id`, `language`, `commission_percent`, `commission_percent_type`, `hourly_pay_rate`, `not_required_to_clock_in`, `inactive`, `reason_inactive`, `hire_date`, `employee_number`, `birthday`, `termination_date`, `deleted`) VALUES
	(1, 'admin', '439a6de57d475c1a0ba9bcb1c39f0af6', 0, 0, 1, NULL, 0.0000000000, '', 0.0000000000, 0, 0, NULL, NULL, NULL, NULL, NULL, 0);
/*!40000 ALTER TABLE `phppos_employees` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_employees_locations
DROP TABLE IF EXISTS `phppos_employees_locations`;
CREATE TABLE IF NOT EXISTS `phppos_employees_locations` (
  `employee_id` int(10) NOT NULL,
  `location_id` int(10) NOT NULL,
  PRIMARY KEY (`employee_id`,`location_id`),
  KEY `phppos_employees_locations_ibfk_2` (`location_id`),
  CONSTRAINT `phppos_employees_locations_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `phppos_employees` (`person_id`),
  CONSTRAINT `phppos_employees_locations_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `phppos_locations` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_employees_locations: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_employees_locations` DISABLE KEYS */;
INSERT INTO `phppos_employees_locations` (`employee_id`, `location_id`) VALUES
	(1, 1);
/*!40000 ALTER TABLE `phppos_employees_locations` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_employees_reset_password
DROP TABLE IF EXISTS `phppos_employees_reset_password`;
CREATE TABLE IF NOT EXISTS `phppos_employees_reset_password` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employee_id` int(11) NOT NULL,
  `expire` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `phppos_employees_reset_password_ibfk_1` (`employee_id`),
  CONSTRAINT `phppos_employees_reset_password_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `phppos_employees` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_employees_reset_password: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_employees_reset_password` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_employees_reset_password` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_employees_time_clock
DROP TABLE IF EXISTS `phppos_employees_time_clock`;
CREATE TABLE IF NOT EXISTS `phppos_employees_time_clock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `clock_in` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `clock_out` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `clock_in_comment` text COLLATE utf8_unicode_ci NOT NULL,
  `clock_out_comment` text COLLATE utf8_unicode_ci NOT NULL,
  `hourly_pay_rate` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `ip_address_clock_in` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address_clock_out` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `phppos_employees_time_clock_ibfk_1` (`employee_id`),
  KEY `phppos_employees_time_clock_ibfk_2` (`location_id`),
  CONSTRAINT `phppos_employees_time_clock_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `phppos_employees` (`person_id`),
  CONSTRAINT `phppos_employees_time_clock_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `phppos_locations` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_employees_time_clock: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_employees_time_clock` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_employees_time_clock` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_expenses
DROP TABLE IF EXISTS `phppos_expenses`;
CREATE TABLE IF NOT EXISTS `phppos_expenses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `location_id` int(10) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `expense_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expense_description` text COLLATE utf8_unicode_ci,
  `expense_reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expense_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expense_amount` decimal(23,10) NOT NULL,
  `expense_tax` decimal(23,10) NOT NULL,
  `expense_note` text COLLATE utf8_unicode_ci NOT NULL,
  `employee_id` int(10) NOT NULL,
  `approved_employee_id` int(10) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `location_id` (`location_id`),
  KEY `employee_id` (`employee_id`),
  KEY `approved_employee_id` (`approved_employee_id`),
  KEY `category_id` (`category_id`),
  KEY `deleted` (`deleted`),
  KEY `expense_type` (`expense_type`),
  KEY `expense_date` (`expense_date`),
  KEY `expense_amount` (`expense_amount`),
  KEY `expense_description` (`expense_description`(255)),
  KEY `expense_reason` (`expense_reason`),
  KEY `expense_note` (`expense_note`(255)),
  CONSTRAINT `phppos_expenses_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `phppos_locations` (`location_id`),
  CONSTRAINT `phppos_expenses_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `phppos_employees` (`person_id`),
  CONSTRAINT `phppos_expenses_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `phppos_categories` (`id`),
  CONSTRAINT `phppos_expenses_ibfk_4` FOREIGN KEY (`approved_employee_id`) REFERENCES `phppos_employees` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_expenses: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_expenses` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_expenses` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_giftcards
DROP TABLE IF EXISTS `phppos_giftcards`;
CREATE TABLE IF NOT EXISTS `phppos_giftcards` (
  `giftcard_id` int(11) NOT NULL AUTO_INCREMENT,
  `giftcard_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `value` decimal(23,10) NOT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `inactive` int(1) NOT NULL DEFAULT '0',
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`giftcard_id`),
  UNIQUE KEY `giftcard_number` (`giftcard_number`),
  KEY `deleted` (`deleted`),
  KEY `phppos_giftcards_ibfk_1` (`customer_id`),
  KEY `description` (`description`(255)),
  CONSTRAINT `phppos_giftcards_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `phppos_customers` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_giftcards: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_giftcards` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_giftcards` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_giftcards_log
DROP TABLE IF EXISTS `phppos_giftcards_log`;
CREATE TABLE IF NOT EXISTS `phppos_giftcards_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `log_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `giftcard_id` int(11) NOT NULL,
  `transaction_amount` decimal(23,10) NOT NULL,
  `log_message` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `phppos_giftcards_log_ibfk_1` (`giftcard_id`),
  CONSTRAINT `phppos_giftcards_log_ibfk_1` FOREIGN KEY (`giftcard_id`) REFERENCES `phppos_giftcards` (`giftcard_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_giftcards_log: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_giftcards_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_giftcards_log` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_inventory
DROP TABLE IF EXISTS `phppos_inventory`;
CREATE TABLE IF NOT EXISTS `phppos_inventory` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_items` int(11) NOT NULL DEFAULT '0',
  `trans_user` int(11) NOT NULL DEFAULT '0',
  `trans_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trans_comment` text COLLATE utf8_unicode_ci NOT NULL,
  `trans_inventory` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `location_id` int(11) NOT NULL,
  PRIMARY KEY (`trans_id`),
  KEY `phppos_inventory_ibfk_1` (`trans_items`),
  KEY `phppos_inventory_ibfk_2` (`trans_user`),
  KEY `location_id` (`location_id`),
  KEY `trans_date` (`trans_date`,`trans_inventory`,`location_id`),
  CONSTRAINT `phppos_inventory_ibfk_1` FOREIGN KEY (`trans_items`) REFERENCES `phppos_items` (`item_id`),
  CONSTRAINT `phppos_inventory_ibfk_2` FOREIGN KEY (`trans_user`) REFERENCES `phppos_employees` (`person_id`),
  CONSTRAINT `phppos_inventory_ibfk_3` FOREIGN KEY (`location_id`) REFERENCES `phppos_locations` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_inventory: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_inventory` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_inventory` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_inventory_counts
DROP TABLE IF EXISTS `phppos_inventory_counts`;
CREATE TABLE IF NOT EXISTS `phppos_inventory_counts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `count_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `employee_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `phppos_inventory_counts_ibfk_1` (`employee_id`),
  KEY `phppos_inventory_counts_ibfk_2` (`location_id`),
  CONSTRAINT `phppos_inventory_counts_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `phppos_employees` (`person_id`),
  CONSTRAINT `phppos_inventory_counts_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `phppos_locations` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_inventory_counts: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_inventory_counts` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_inventory_counts` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_inventory_counts_items
DROP TABLE IF EXISTS `phppos_inventory_counts_items`;
CREATE TABLE IF NOT EXISTS `phppos_inventory_counts_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_counts_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `count` decimal(23,10) DEFAULT '0.0000000000',
  `actual_quantity` decimal(23,10) DEFAULT '0.0000000000',
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `phppos_inventory_counts_items_ibfk_1` (`inventory_counts_id`),
  KEY `phppos_inventory_counts_items_ibfk_2` (`item_id`),
  CONSTRAINT `phppos_inventory_counts_items_ibfk_1` FOREIGN KEY (`inventory_counts_id`) REFERENCES `phppos_inventory_counts` (`id`),
  CONSTRAINT `phppos_inventory_counts_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `phppos_items` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_inventory_counts_items: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_inventory_counts_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_inventory_counts_items` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_items
DROP TABLE IF EXISTS `phppos_items`;
CREATE TABLE IF NOT EXISTS `phppos_items` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `item_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ecommerce_product_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tax_included` int(1) NOT NULL DEFAULT '0',
  `cost_price` decimal(23,10) NOT NULL,
  `unit_price` decimal(23,10) NOT NULL,
  `promo_price` decimal(23,10) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `reorder_level` decimal(23,10) DEFAULT NULL,
  `expire_days` int(10) DEFAULT NULL,
  `item_id` int(10) NOT NULL AUTO_INCREMENT,
  `allow_alt_description` tinyint(1) NOT NULL,
  `is_serialized` tinyint(1) NOT NULL,
  `override_default_tax` int(1) NOT NULL DEFAULT '0',
  `is_ecommerce` int(1) DEFAULT '1',
  `is_service` int(1) NOT NULL DEFAULT '0',
  `is_ebt_item` int(1) NOT NULL DEFAULT '0',
  `commission_percent` decimal(23,10) DEFAULT '0.0000000000',
  `commission_percent_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `commission_fixed` decimal(23,10) DEFAULT '0.0000000000',
  `change_cost_price` int(1) NOT NULL DEFAULT '0',
  `disable_loyalty` int(1) NOT NULL DEFAULT '0',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `aaatex_qb_item_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_id`),
  UNIQUE KEY `item_number` (`item_number`),
  UNIQUE KEY `product_id` (`product_id`),
  KEY `phppos_items_ibfk_1` (`supplier_id`),
  KEY `deleted` (`deleted`),
  KEY `phppos_items_ibfk_3` (`category_id`),
  KEY `phppos_items_ibfk_4` (`manufacturer_id`),
  KEY `phppos_items_ibfk_5` (`ecommerce_product_id`),
  KEY `description` (`description`(255)),
  KEY `size` (`size`),
  KEY `reorder_level` (`reorder_level`),
  KEY `cost_price` (`cost_price`),
  KEY `unit_price` (`unit_price`),
  KEY `promo_price` (`promo_price`),
  KEY `last_modified` (`last_modified`),
  KEY `name` (`name`),
  FULLTEXT KEY `full_search` (`name`,`item_number`,`product_id`,`description`),
  FULLTEXT KEY `name_search` (`name`),
  FULLTEXT KEY `item_number_search` (`item_number`),
  FULLTEXT KEY `product_id_search` (`product_id`),
  FULLTEXT KEY `description_search` (`description`),
  FULLTEXT KEY `size_search` (`size`),
  CONSTRAINT `phppos_items_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `phppos_suppliers` (`person_id`),
  CONSTRAINT `phppos_items_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `phppos_categories` (`id`),
  CONSTRAINT `phppos_items_ibfk_4` FOREIGN KEY (`manufacturer_id`) REFERENCES `phppos_manufacturers` (`id`),
  CONSTRAINT `phppos_items_ibfk_5` FOREIGN KEY (`ecommerce_product_id`) REFERENCES `phppos_ecommerce_products` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_items: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_items` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_items_serial_numbers
DROP TABLE IF EXISTS `phppos_items_serial_numbers`;
CREATE TABLE IF NOT EXISTS `phppos_items_serial_numbers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item_id` int(10) NOT NULL,
  `serial_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_price` decimal(23,10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `serial_number` (`serial_number`),
  KEY `phppos_items_serial_numbers_ibfk_1` (`item_id`),
  CONSTRAINT `phppos_items_serial_numbers_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `phppos_items` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_items_serial_numbers: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_items_serial_numbers` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_items_serial_numbers` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_items_tags
DROP TABLE IF EXISTS `phppos_items_tags`;
CREATE TABLE IF NOT EXISTS `phppos_items_tags` (
  `item_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`item_id`,`tag_id`),
  KEY `phppos_items_tags_ibfk_2` (`tag_id`),
  CONSTRAINT `phppos_items_tags_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `phppos_items` (`item_id`),
  CONSTRAINT `phppos_items_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `phppos_tags` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_items_tags: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_items_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_items_tags` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_items_taxes
DROP TABLE IF EXISTS `phppos_items_taxes`;
CREATE TABLE IF NOT EXISTS `phppos_items_taxes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item_id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `percent` decimal(15,3) NOT NULL,
  `cumulative` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_tax` (`item_id`,`name`,`percent`),
  CONSTRAINT `phppos_items_taxes_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `phppos_items` (`item_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_items_taxes: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_items_taxes` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_items_taxes` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_items_tier_prices
DROP TABLE IF EXISTS `phppos_items_tier_prices`;
CREATE TABLE IF NOT EXISTS `phppos_items_tier_prices` (
  `tier_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `unit_price` decimal(23,10) DEFAULT '0.0000000000',
  `percent_off` decimal(15,3) DEFAULT NULL,
  `cost_plus_percent` decimal(15,3) DEFAULT NULL,
  PRIMARY KEY (`tier_id`,`item_id`),
  KEY `phppos_items_tier_prices_ibfk_2` (`item_id`),
  CONSTRAINT `phppos_items_tier_prices_ibfk_1` FOREIGN KEY (`tier_id`) REFERENCES `phppos_price_tiers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `phppos_items_tier_prices_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `phppos_items` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_items_tier_prices: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_items_tier_prices` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_items_tier_prices` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_item_images
DROP TABLE IF EXISTS `phppos_item_images`;
CREATE TABLE IF NOT EXISTS `phppos_item_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `alt_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `item_id` int(11) DEFAULT NULL,
  `ecommerce_image_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `phppos_item_images_ibfk_1` (`item_id`),
  KEY `phppos_item_images_ibfk_2` (`image_id`),
  CONSTRAINT `phppos_item_images_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `phppos_items` (`item_id`),
  CONSTRAINT `phppos_item_images_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `phppos_app_files` (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_item_images: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_item_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_item_images` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_item_kits
DROP TABLE IF EXISTS `phppos_item_kits`;
CREATE TABLE IF NOT EXISTS `phppos_item_kits` (
  `item_kit_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_kit_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_included` int(1) NOT NULL DEFAULT '0',
  `unit_price` decimal(23,10) DEFAULT NULL,
  `cost_price` decimal(23,10) DEFAULT NULL,
  `override_default_tax` int(1) NOT NULL DEFAULT '0',
  `is_ebt_item` int(1) NOT NULL DEFAULT '0',
  `commission_percent` decimal(23,10) DEFAULT '0.0000000000',
  `commission_percent_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `commission_fixed` decimal(23,10) DEFAULT '0.0000000000',
  `change_cost_price` int(1) NOT NULL DEFAULT '0',
  `disable_loyalty` int(1) NOT NULL DEFAULT '0',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `aaatex_qb_item_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  PRIMARY KEY (`item_kit_id`),
  UNIQUE KEY `item_kit_number` (`item_kit_number`),
  UNIQUE KEY `product_id` (`product_id`),
  KEY `deleted` (`deleted`),
  KEY `phppos_item_kits_ibfk_1` (`category_id`),
  KEY `phppos_item_kits_ibfk_2` (`manufacturer_id`),
  KEY `name` (`name`),
  KEY `description` (`description`),
  KEY `cost_price` (`cost_price`),
  KEY `unit_price` (`unit_price`),
  CONSTRAINT `phppos_item_kits_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `phppos_categories` (`id`),
  CONSTRAINT `phppos_item_kits_ibfk_2` FOREIGN KEY (`manufacturer_id`) REFERENCES `phppos_manufacturers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_item_kits: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_item_kits` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_item_kits` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_item_kits_tags
DROP TABLE IF EXISTS `phppos_item_kits_tags`;
CREATE TABLE IF NOT EXISTS `phppos_item_kits_tags` (
  `item_kit_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`item_kit_id`,`tag_id`),
  KEY `phppos_item_kits_tags_ibfk_2` (`tag_id`),
  CONSTRAINT `phppos_item_kits_tags_ibfk_1` FOREIGN KEY (`item_kit_id`) REFERENCES `phppos_item_kits` (`item_kit_id`),
  CONSTRAINT `phppos_item_kits_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `phppos_tags` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_item_kits_tags: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_item_kits_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_item_kits_tags` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_item_kits_taxes
DROP TABLE IF EXISTS `phppos_item_kits_taxes`;
CREATE TABLE IF NOT EXISTS `phppos_item_kits_taxes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item_kit_id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `percent` decimal(15,3) NOT NULL,
  `cumulative` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_tax` (`item_kit_id`,`name`,`percent`),
  CONSTRAINT `phppos_item_kits_taxes_ibfk_1` FOREIGN KEY (`item_kit_id`) REFERENCES `phppos_item_kits` (`item_kit_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_item_kits_taxes: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_item_kits_taxes` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_item_kits_taxes` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_item_kits_tier_prices
DROP TABLE IF EXISTS `phppos_item_kits_tier_prices`;
CREATE TABLE IF NOT EXISTS `phppos_item_kits_tier_prices` (
  `tier_id` int(10) NOT NULL,
  `item_kit_id` int(10) NOT NULL,
  `unit_price` decimal(23,10) DEFAULT '0.0000000000',
  `percent_off` decimal(15,3) DEFAULT NULL,
  `cost_plus_percent` decimal(15,3) DEFAULT NULL,
  PRIMARY KEY (`tier_id`,`item_kit_id`),
  KEY `phppos_item_kits_tier_prices_ibfk_2` (`item_kit_id`),
  CONSTRAINT `phppos_item_kits_tier_prices_ibfk_1` FOREIGN KEY (`tier_id`) REFERENCES `phppos_price_tiers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `phppos_item_kits_tier_prices_ibfk_2` FOREIGN KEY (`item_kit_id`) REFERENCES `phppos_item_kits` (`item_kit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_item_kits_tier_prices: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_item_kits_tier_prices` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_item_kits_tier_prices` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_item_kit_items
DROP TABLE IF EXISTS `phppos_item_kit_items`;
CREATE TABLE IF NOT EXISTS `phppos_item_kit_items` (
  `item_kit_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` decimal(23,10) NOT NULL,
  PRIMARY KEY (`item_kit_id`,`item_id`,`quantity`),
  KEY `phppos_item_kit_items_ibfk_2` (`item_id`),
  CONSTRAINT `phppos_item_kit_items_ibfk_1` FOREIGN KEY (`item_kit_id`) REFERENCES `phppos_item_kits` (`item_kit_id`) ON DELETE CASCADE,
  CONSTRAINT `phppos_item_kit_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `phppos_items` (`item_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_item_kit_items: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_item_kit_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_item_kit_items` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_locations
DROP TABLE IF EXISTS `phppos_locations`;
CREATE TABLE IF NOT EXISTS `phppos_locations` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci,
  `company` text COLLATE utf8_unicode_ci,
  `website` text COLLATE utf8_unicode_ci,
  `company_logo` int(10) DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `phone` text COLLATE utf8_unicode_ci,
  `fax` text COLLATE utf8_unicode_ci,
  `email` text COLLATE utf8_unicode_ci,
  `color` text COLLATE utf8_unicode_ci,
  `return_policy` text COLLATE utf8_unicode_ci,
  `receive_stock_alert` text COLLATE utf8_unicode_ci,
  `stock_alert_email` text COLLATE utf8_unicode_ci,
  `timezone` text COLLATE utf8_unicode_ci,
  `mailchimp_api_key` text COLLATE utf8_unicode_ci,
  `enable_credit_card_processing` text COLLATE utf8_unicode_ci,
  `credit_card_processor` text COLLATE utf8_unicode_ci,
  `hosted_checkout_merchant_id` text COLLATE utf8_unicode_ci,
  `hosted_checkout_merchant_password` text COLLATE utf8_unicode_ci,
  `emv_merchant_id` text COLLATE utf8_unicode_ci,
  `net_e_pay_server` text COLLATE utf8_unicode_ci,
  `listener_port` text COLLATE utf8_unicode_ci,
  `com_port` text COLLATE utf8_unicode_ci,
  `stripe_public` text COLLATE utf8_unicode_ci,
  `stripe_private` text COLLATE utf8_unicode_ci,
  `stripe_currency_code` text COLLATE utf8_unicode_ci,
  `braintree_merchant_id` text COLLATE utf8_unicode_ci,
  `braintree_public_key` text COLLATE utf8_unicode_ci,
  `braintree_private_key` text COLLATE utf8_unicode_ci,
  `default_tax_1_rate` text COLLATE utf8_unicode_ci,
  `default_tax_1_name` text COLLATE utf8_unicode_ci,
  `default_tax_2_rate` text COLLATE utf8_unicode_ci,
  `default_tax_2_name` text COLLATE utf8_unicode_ci,
  `default_tax_2_cumulative` text COLLATE utf8_unicode_ci,
  `default_tax_3_rate` text COLLATE utf8_unicode_ci,
  `default_tax_3_name` text COLLATE utf8_unicode_ci,
  `default_tax_4_rate` text COLLATE utf8_unicode_ci,
  `default_tax_4_name` text COLLATE utf8_unicode_ci,
  `default_tax_5_rate` text COLLATE utf8_unicode_ci,
  `default_tax_5_name` text COLLATE utf8_unicode_ci,
  `deleted` int(1) DEFAULT '0',
  `secure_device_override_emv` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `secure_device_override_non_emv` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`location_id`),
  KEY `deleted` (`deleted`),
  KEY `phppos_locations_ibfk_1` (`company_logo`),
  KEY `name` (`name`(255)),
  KEY `address` (`address`(255)),
  KEY `phone` (`phone`(255)),
  KEY `email` (`email`(255)),
  CONSTRAINT `phppos_locations_ibfk_1` FOREIGN KEY (`company_logo`) REFERENCES `phppos_app_files` (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_locations: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_locations` DISABLE KEYS */;
INSERT INTO `phppos_locations` (`location_id`, `name`, `company`, `website`, `company_logo`, `address`, `phone`, `fax`, `email`, `color`, `return_policy`, `receive_stock_alert`, `stock_alert_email`, `timezone`, `mailchimp_api_key`, `enable_credit_card_processing`, `credit_card_processor`, `hosted_checkout_merchant_id`, `hosted_checkout_merchant_password`, `emv_merchant_id`, `net_e_pay_server`, `listener_port`, `com_port`, `stripe_public`, `stripe_private`, `stripe_currency_code`, `braintree_merchant_id`, `braintree_public_key`, `braintree_private_key`, `default_tax_1_rate`, `default_tax_1_name`, `default_tax_2_rate`, `default_tax_2_name`, `default_tax_2_cumulative`, `default_tax_3_rate`, `default_tax_3_name`, `default_tax_4_rate`, `default_tax_4_name`, `default_tax_5_rate`, `default_tax_5_name`, `deleted`, `secure_device_override_emv`, `secure_device_override_non_emv`) VALUES
	(1, 'Default', NULL, NULL, NULL, '123 Nowhere street', '555-555-5555', '', 'no-reply@phppointofsale.com', NULL, NULL, '0', '', 'America/New_York', '', '0', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '0', '', '', '', '', '', '', 0, '', '');
/*!40000 ALTER TABLE `phppos_locations` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_location_items
DROP TABLE IF EXISTS `phppos_location_items`;
CREATE TABLE IF NOT EXISTS `phppos_location_items` (
  `location_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `cost_price` decimal(23,10) DEFAULT NULL,
  `unit_price` decimal(23,10) DEFAULT NULL,
  `promo_price` decimal(23,10) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `quantity` decimal(23,10) DEFAULT '0.0000000000',
  `reorder_level` decimal(23,10) DEFAULT NULL,
  `override_default_tax` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`location_id`,`item_id`),
  KEY `phppos_location_items_ibfk_2` (`item_id`),
  KEY `quantity` (`quantity`),
  CONSTRAINT `phppos_location_items_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `phppos_locations` (`location_id`),
  CONSTRAINT `phppos_location_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `phppos_items` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_location_items: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_location_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_location_items` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_location_items_taxes
DROP TABLE IF EXISTS `phppos_location_items_taxes`;
CREATE TABLE IF NOT EXISTS `phppos_location_items_taxes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  `item_id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `percent` decimal(16,3) NOT NULL,
  `cumulative` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_tax` (`location_id`,`item_id`,`name`,`percent`),
  KEY `phppos_location_items_taxes_ibfk_2` (`item_id`),
  CONSTRAINT `phppos_location_items_taxes_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `phppos_locations` (`location_id`) ON DELETE CASCADE,
  CONSTRAINT `phppos_location_items_taxes_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `phppos_items` (`item_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_location_items_taxes: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_location_items_taxes` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_location_items_taxes` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_location_items_tier_prices
DROP TABLE IF EXISTS `phppos_location_items_tier_prices`;
CREATE TABLE IF NOT EXISTS `phppos_location_items_tier_prices` (
  `tier_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `location_id` int(10) NOT NULL,
  `unit_price` decimal(23,10) DEFAULT '0.0000000000',
  `percent_off` decimal(15,3) DEFAULT NULL,
  `cost_plus_percent` decimal(15,3) DEFAULT NULL,
  PRIMARY KEY (`tier_id`,`item_id`,`location_id`),
  KEY `phppos_location_items_tier_prices_ibfk_2` (`location_id`),
  KEY `phppos_location_items_tier_prices_ibfk_3` (`item_id`),
  CONSTRAINT `phppos_location_items_tier_prices_ibfk_1` FOREIGN KEY (`tier_id`) REFERENCES `phppos_price_tiers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `phppos_location_items_tier_prices_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `phppos_locations` (`location_id`),
  CONSTRAINT `phppos_location_items_tier_prices_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `phppos_items` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_location_items_tier_prices: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_location_items_tier_prices` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_location_items_tier_prices` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_location_item_kits
DROP TABLE IF EXISTS `phppos_location_item_kits`;
CREATE TABLE IF NOT EXISTS `phppos_location_item_kits` (
  `location_id` int(11) NOT NULL,
  `item_kit_id` int(11) NOT NULL,
  `unit_price` decimal(23,10) DEFAULT NULL,
  `cost_price` decimal(23,10) DEFAULT NULL,
  `override_default_tax` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`location_id`,`item_kit_id`),
  KEY `phppos_location_item_kits_ibfk_2` (`item_kit_id`),
  CONSTRAINT `phppos_location_item_kits_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `phppos_locations` (`location_id`),
  CONSTRAINT `phppos_location_item_kits_ibfk_2` FOREIGN KEY (`item_kit_id`) REFERENCES `phppos_item_kits` (`item_kit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_location_item_kits: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_location_item_kits` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_location_item_kits` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_location_item_kits_taxes
DROP TABLE IF EXISTS `phppos_location_item_kits_taxes`;
CREATE TABLE IF NOT EXISTS `phppos_location_item_kits_taxes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  `item_kit_id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `percent` decimal(16,3) NOT NULL,
  `cumulative` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_tax` (`location_id`,`item_kit_id`,`name`,`percent`),
  KEY `phppos_location_item_kits_taxes_ibfk_2` (`item_kit_id`),
  CONSTRAINT `phppos_location_item_kits_taxes_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `phppos_locations` (`location_id`) ON DELETE CASCADE,
  CONSTRAINT `phppos_location_item_kits_taxes_ibfk_2` FOREIGN KEY (`item_kit_id`) REFERENCES `phppos_item_kits` (`item_kit_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_location_item_kits_taxes: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_location_item_kits_taxes` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_location_item_kits_taxes` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_location_item_kits_tier_prices
DROP TABLE IF EXISTS `phppos_location_item_kits_tier_prices`;
CREATE TABLE IF NOT EXISTS `phppos_location_item_kits_tier_prices` (
  `tier_id` int(10) NOT NULL,
  `item_kit_id` int(10) NOT NULL,
  `location_id` int(10) NOT NULL,
  `unit_price` decimal(23,10) DEFAULT '0.0000000000',
  `percent_off` decimal(15,3) DEFAULT NULL,
  `cost_plus_percent` decimal(15,3) DEFAULT NULL,
  PRIMARY KEY (`tier_id`,`item_kit_id`,`location_id`),
  KEY `phppos_location_item_kits_tier_prices_ibfk_2` (`location_id`),
  KEY `phppos_location_item_kits_tier_prices_ibfk_3` (`item_kit_id`),
  CONSTRAINT `phppos_location_item_kits_tier_prices_ibfk_1` FOREIGN KEY (`tier_id`) REFERENCES `phppos_price_tiers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `phppos_location_item_kits_tier_prices_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `phppos_locations` (`location_id`),
  CONSTRAINT `phppos_location_item_kits_tier_prices_ibfk_3` FOREIGN KEY (`item_kit_id`) REFERENCES `phppos_item_kits` (`item_kit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_location_item_kits_tier_prices: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_location_item_kits_tier_prices` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_location_item_kits_tier_prices` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_manufacturers
DROP TABLE IF EXISTS `phppos_manufacturers`;
CREATE TABLE IF NOT EXISTS `phppos_manufacturers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deleted` (`deleted`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_manufacturers: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_manufacturers` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_manufacturers` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_messages
DROP TABLE IF EXISTS `phppos_messages`;
CREATE TABLE IF NOT EXISTS `phppos_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `sender_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `phppos_messages_ibfk_1` (`sender_id`),
  KEY `phppos_messages_key_1` (`deleted`,`created_at`,`id`),
  CONSTRAINT `phppos_messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `phppos_employees` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_messages: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_messages` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_message_receiver
DROP TABLE IF EXISTS `phppos_message_receiver`;
CREATE TABLE IF NOT EXISTS `phppos_message_receiver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message_read` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `phppos_message_receiver_ibfk_2` (`receiver_id`),
  KEY `phppos_message_receiver_key_1` (`message_id`,`receiver_id`),
  CONSTRAINT `phppos_message_receiver_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `phppos_messages` (`id`),
  CONSTRAINT `phppos_message_receiver_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `phppos_employees` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_message_receiver: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_message_receiver` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_message_receiver` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_migrations
DROP TABLE IF EXISTS `phppos_migrations`;
CREATE TABLE IF NOT EXISTS `phppos_migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_migrations: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_migrations` DISABLE KEYS */;
INSERT INTO `phppos_migrations` (`version`) VALUES
	(20170308112334);
/*!40000 ALTER TABLE `phppos_migrations` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_modules
DROP TABLE IF EXISTS `phppos_modules`;
CREATE TABLE IF NOT EXISTS `phppos_modules` (
  `name_lang_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc_lang_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(10) NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `module_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`module_id`),
  UNIQUE KEY `desc_lang_key` (`desc_lang_key`),
  UNIQUE KEY `name_lang_key` (`name_lang_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_modules: ~14 rows (approximately)
/*!40000 ALTER TABLE `phppos_modules` DISABLE KEYS */;
INSERT INTO `phppos_modules` (`name_lang_key`, `desc_lang_key`, `sort`, `icon`, `module_id`) VALUES
	('module_config', 'module_config_desc', 100, 'icon ti-settings', 'config'),
	('module_customers', 'module_customers_desc', 10, 'icon ti-user', 'customers'),
	('module_employees', 'module_employees_desc', 80, 'icon ti-id-badge', 'employees'),
	('module_expenses', 'module_expenses_desc', 75, 'icon ti-money', 'expenses'),
	('module_giftcards', 'module_giftcards_desc', 90, 'icon ti-credit-card', 'giftcards'),
	('module_item_kits', 'module_item_kits_desc', 30, 'icon ti-harddrives', 'item_kits'),
	('module_items', 'module_items_desc', 20, 'icon ti-harddrive', 'items'),
	('module_locations', 'module_locations_desc', 110, 'icon ti-home', 'locations'),
	('module_messages', 'module_messages_desc', 120, 'icon ti-email', 'messages'),
	('module_price_rules', 'module_item_price_rules_desc', 35, 'glyphicon glyphicon-tags', 'price_rules'),
	('module_receivings', 'module_receivings_desc', 60, 'icon ti-cloud-down', 'receivings'),
	('module_reports', 'module_reports_desc', 50, 'icon ti-bar-chart', 'reports'),
	('module_sales', 'module_sales_desc', 70, 'icon ti-shopping-cart', 'sales'),
	('module_suppliers', 'module_suppliers_desc', 40, 'icon ti-download', 'suppliers');
/*!40000 ALTER TABLE `phppos_modules` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_modules_actions
DROP TABLE IF EXISTS `phppos_modules_actions`;
CREATE TABLE IF NOT EXISTS `phppos_modules_actions` (
  `action_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `module_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `action_name_key` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`action_id`,`module_id`),
  KEY `phppos_modules_actions_ibfk_1` (`module_id`),
  CONSTRAINT `phppos_modules_actions_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `phppos_modules` (`module_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_modules_actions: ~83 rows (approximately)
/*!40000 ALTER TABLE `phppos_modules_actions` DISABLE KEYS */;
INSERT INTO `phppos_modules_actions` (`action_id`, `module_id`, `action_name_key`, `sort`) VALUES
	('add_update', 'customers', 'module_action_add_update', 1),
	('add_update', 'employees', 'module_action_add_update', 130),
	('add_update', 'expenses', 'module_expenses_add_update', 315),
	('add_update', 'giftcards', 'module_action_add_update', 200),
	('add_update', 'item_kits', 'module_action_add_update', 70),
	('add_update', 'items', 'module_action_add_update', 40),
	('add_update', 'locations', 'module_action_add_update', 240),
	('add_update', 'price_rules', 'module_action_add_update', 400),
	('add_update', 'suppliers', 'module_action_add_update', 100),
	('assign_all_locations', 'employees', 'module_action_assign_all_locations', 151),
	('count_inventory', 'items', 'items_count_inventory', 65),
	('delete', 'customers', 'module_action_delete', 20),
	('delete', 'employees', 'module_action_delete', 140),
	('delete', 'expenses', 'module_expenses_delete', 330),
	('delete', 'giftcards', 'module_action_delete', 210),
	('delete', 'item_kits', 'module_action_delete', 80),
	('delete', 'items', 'module_action_delete', 50),
	('delete', 'locations', 'module_action_delete', 250),
	('delete', 'price_rules', 'module_action_delete', 405),
	('delete', 'suppliers', 'module_action_delete', 110),
	('delete_receiving', 'receivings', 'module_action_delete_receiving', 306),
	('delete_sale', 'sales', 'module_action_delete_sale', 230),
	('delete_suspended_sale', 'sales', 'module_action_delete_suspended_sale', 181),
	('delete_taxes', 'receivings', 'module_action_delete_taxes', 300),
	('delete_taxes', 'sales', 'module_action_delete_taxes', 182),
	('edit_customer_points', 'customers', 'module_edit_customer_points', 35),
	('edit_giftcard_value', 'giftcards', 'module_edit_giftcard_value', 205),
	('edit_profile', 'employees', 'common_edit_profile', 155),
	('edit_quantity', 'items', 'items_edit_quantity', 62),
	('edit_receiving', 'receivings', 'module_action_edit_receiving', 303),
	('edit_sale', 'sales', 'module_edit_sale', 190),
	('edit_sale_cost_price', 'sales', 'module_edit_sale_cost_price', 175),
	('edit_sale_price', 'sales', 'module_edit_sale_price', 170),
	('edit_store_account_balance', 'customers', 'customers_edit_store_account_balance', 31),
	('edit_store_account_balance', 'suppliers', 'suppliers_edit_store_account_balance', 130),
	('give_discount', 'sales', 'module_give_discount', 180),
	('manage_categories', 'items', 'items_manage_categories', 70),
	('manage_manufacturers', 'items', 'items_manage_manufacturers', 76),
	('manage_tags', 'items', 'items_manage_tags', 75),
	('search', 'customers', 'module_action_search_customers', 30),
	('search', 'employees', 'module_action_search_employees', 150),
	('search', 'expenses', 'module_expenses_search', 310),
	('search', 'giftcards', 'module_action_search_giftcards', 220),
	('search', 'item_kits', 'module_action_search_item_kits', 90),
	('search', 'items', 'module_action_search_items', 60),
	('search', 'locations', 'module_action_search_locations', 260),
	('search', 'price_rules', 'module_action_search_price_rules', 415),
	('search', 'suppliers', 'module_action_search_suppliers', 120),
	('see_cost_price', 'item_kits', 'module_see_cost_price', 91),
	('see_cost_price', 'items', 'module_see_cost_price', 61),
	('send_message', 'messages', 'employees_send_message', 350),
	('show_cost_price', 'reports', 'reports_show_cost_price', 290),
	('show_profit', 'reports', 'reports_show_profit', 280),
	('view_all_employee_commissions', 'reports', 'reports_view_all_employee_commissions', 107),
	('view_categories', 'reports', 'reports_categories', 100),
	('view_closeout', 'reports', 'reports_closeout', 105),
	('view_commissions', 'reports', 'reports_commission', 106),
	('view_customers', 'reports', 'reports_customers', 120),
	('view_dashboard_stats', 'reports', 'reports_view_dashboard_stats', 300),
	('view_deleted_sales', 'reports', 'reports_deleted_sales', 130),
	('view_discounts', 'reports', 'reports_discounts', 140),
	('view_employees', 'reports', 'reports_employees', 150),
	('view_expenses', 'reports', 'module_expenses_report', 155),
	('view_giftcards', 'reports', 'reports_giftcards', 160),
	('view_inventory_at_all_locations', 'reports', 'reports_view_inventory_at_all_locations', 300),
	('view_inventory_reports', 'reports', 'reports_inventory_reports', 170),
	('view_item_kits', 'reports', 'module_item_kits', 180),
	('view_items', 'reports', 'reports_items', 190),
	('view_manufacturers', 'reports', 'reports_manufacturers', 195),
	('view_payments', 'reports', 'reports_payments', 200),
	('view_profit_and_loss', 'reports', 'reports_profit_and_loss', 210),
	('view_receivings', 'reports', 'reports_receivings', 220),
	('view_register_log', 'reports', 'reports_register_log_title', 230),
	('view_sales', 'reports', 'reports_sales', 240),
	('view_sales_generator', 'reports', 'reports_sales_generator', 110),
	('view_store_account', 'reports', 'reports_store_account', 250),
	('view_store_account_suppliers', 'reports', 'reports_store_account_suppliers', 255),
	('view_suppliers', 'reports', 'reports_suppliers', 260),
	('view_suspended_sales', 'reports', 'reports_suspended_sales', 261),
	('view_tags', 'reports', 'common_tags', 264),
	('view_taxes', 'reports', 'reports_taxes', 270),
	('view_tiers', 'reports', 'reports_tiers', 275),
	('view_timeclock', 'reports', 'employees_timeclock', 280);
/*!40000 ALTER TABLE `phppos_modules_actions` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_people
DROP TABLE IF EXISTS `phppos_people`;
CREATE TABLE IF NOT EXISTS `phppos_people` (
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `image_id` int(10) DEFAULT NULL,
  `person_id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`person_id`),
  KEY `phppos_people_ibfk_1` (`image_id`),
  KEY `first_name` (`first_name`),
  KEY `last_name` (`last_name`),
  KEY `email` (`email`),
  KEY `phone_number` (`phone_number`),
  KEY `full_name` (`full_name`(255)),
  CONSTRAINT `phppos_people_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `phppos_app_files` (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_people: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_people` DISABLE KEYS */;
INSERT INTO `phppos_people` (`first_name`, `last_name`, `full_name`, `phone_number`, `email`, `address_1`, `address_2`, `city`, `state`, `zip`, `country`, `comments`, `image_id`, `person_id`) VALUES
	('John', 'Doe', 'John Doe', '555-555-5555', 'no-reply@phppointofsale.com', 'Address 1', '', '', '', '', '', '', NULL, 1);
/*!40000 ALTER TABLE `phppos_people` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_permissions
DROP TABLE IF EXISTS `phppos_permissions`;
CREATE TABLE IF NOT EXISTS `phppos_permissions` (
  `module_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `person_id` int(10) NOT NULL,
  PRIMARY KEY (`module_id`,`person_id`),
  KEY `person_id` (`person_id`),
  CONSTRAINT `phppos_permissions_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `phppos_employees` (`person_id`),
  CONSTRAINT `phppos_permissions_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `phppos_modules` (`module_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_permissions: ~14 rows (approximately)
/*!40000 ALTER TABLE `phppos_permissions` DISABLE KEYS */;
INSERT INTO `phppos_permissions` (`module_id`, `person_id`) VALUES
	('config', 1),
	('customers', 1),
	('employees', 1),
	('expenses', 1),
	('giftcards', 1),
	('item_kits', 1),
	('items', 1),
	('locations', 1),
	('messages', 1),
	('price_rules', 1),
	('receivings', 1),
	('reports', 1),
	('sales', 1),
	('suppliers', 1);
/*!40000 ALTER TABLE `phppos_permissions` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_permissions_actions
DROP TABLE IF EXISTS `phppos_permissions_actions`;
CREATE TABLE IF NOT EXISTS `phppos_permissions_actions` (
  `module_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `person_id` int(11) NOT NULL,
  `action_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`module_id`,`person_id`,`action_id`),
  KEY `phppos_permissions_actions_ibfk_2` (`person_id`),
  KEY `phppos_permissions_actions_ibfk_3` (`action_id`),
  CONSTRAINT `phppos_permissions_actions_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `phppos_modules` (`module_id`),
  CONSTRAINT `phppos_permissions_actions_ibfk_2` FOREIGN KEY (`person_id`) REFERENCES `phppos_employees` (`person_id`),
  CONSTRAINT `phppos_permissions_actions_ibfk_3` FOREIGN KEY (`action_id`) REFERENCES `phppos_modules_actions` (`action_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_permissions_actions: ~83 rows (approximately)
/*!40000 ALTER TABLE `phppos_permissions_actions` DISABLE KEYS */;
INSERT INTO `phppos_permissions_actions` (`module_id`, `person_id`, `action_id`) VALUES
	('customers', 1, 'add_update'),
	('customers', 1, 'delete'),
	('customers', 1, 'edit_customer_points'),
	('customers', 1, 'edit_store_account_balance'),
	('customers', 1, 'search'),
	('employees', 1, 'add_update'),
	('employees', 1, 'assign_all_locations'),
	('employees', 1, 'delete'),
	('employees', 1, 'edit_profile'),
	('employees', 1, 'search'),
	('expenses', 1, 'add_update'),
	('expenses', 1, 'delete'),
	('expenses', 1, 'search'),
	('giftcards', 1, 'add_update'),
	('giftcards', 1, 'delete'),
	('giftcards', 1, 'edit_giftcard_value'),
	('giftcards', 1, 'search'),
	('item_kits', 1, 'add_update'),
	('item_kits', 1, 'delete'),
	('item_kits', 1, 'search'),
	('item_kits', 1, 'see_cost_price'),
	('items', 1, 'add_update'),
	('items', 1, 'count_inventory'),
	('items', 1, 'delete'),
	('items', 1, 'edit_quantity'),
	('items', 1, 'manage_categories'),
	('items', 1, 'manage_manufacturers'),
	('items', 1, 'manage_tags'),
	('items', 1, 'search'),
	('items', 1, 'see_cost_price'),
	('locations', 1, 'add_update'),
	('locations', 1, 'delete'),
	('locations', 1, 'search'),
	('messages', 1, 'send_message'),
	('price_rules', 1, 'add_update'),
	('price_rules', 1, 'delete'),
	('price_rules', 1, 'search'),
	('receivings', 1, 'delete_receiving'),
	('receivings', 1, 'delete_taxes'),
	('receivings', 1, 'edit_receiving'),
	('reports', 1, 'show_cost_price'),
	('reports', 1, 'show_profit'),
	('reports', 1, 'view_all_employee_commissions'),
	('reports', 1, 'view_categories'),
	('reports', 1, 'view_closeout'),
	('reports', 1, 'view_commissions'),
	('reports', 1, 'view_customers'),
	('reports', 1, 'view_dashboard_stats'),
	('reports', 1, 'view_deleted_sales'),
	('reports', 1, 'view_discounts'),
	('reports', 1, 'view_employees'),
	('reports', 1, 'view_expenses'),
	('reports', 1, 'view_giftcards'),
	('reports', 1, 'view_inventory_at_all_locations'),
	('reports', 1, 'view_inventory_reports'),
	('reports', 1, 'view_item_kits'),
	('reports', 1, 'view_items'),
	('reports', 1, 'view_manufacturers'),
	('reports', 1, 'view_payments'),
	('reports', 1, 'view_profit_and_loss'),
	('reports', 1, 'view_receivings'),
	('reports', 1, 'view_register_log'),
	('reports', 1, 'view_sales'),
	('reports', 1, 'view_sales_generator'),
	('reports', 1, 'view_store_account'),
	('reports', 1, 'view_store_account_suppliers'),
	('reports', 1, 'view_suppliers'),
	('reports', 1, 'view_suspended_sales'),
	('reports', 1, 'view_tags'),
	('reports', 1, 'view_taxes'),
	('reports', 1, 'view_tiers'),
	('reports', 1, 'view_timeclock'),
	('sales', 1, 'delete_sale'),
	('sales', 1, 'delete_suspended_sale'),
	('sales', 1, 'delete_taxes'),
	('sales', 1, 'edit_sale'),
	('sales', 1, 'edit_sale_cost_price'),
	('sales', 1, 'edit_sale_price'),
	('sales', 1, 'give_discount'),
	('suppliers', 1, 'add_update'),
	('suppliers', 1, 'delete'),
	('suppliers', 1, 'edit_store_account_balance'),
	('suppliers', 1, 'search');
/*!40000 ALTER TABLE `phppos_permissions_actions` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_price_rules
DROP TABLE IF EXISTS `phppos_price_rules`;
CREATE TABLE IF NOT EXISTS `phppos_price_rules` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `added_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(1) NOT NULL DEFAULT '1',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `items_to_buy` decimal(23,10) DEFAULT NULL,
  `items_to_get` decimal(23,10) DEFAULT NULL,
  `percent_off` decimal(23,10) DEFAULT NULL,
  `fixed_off` decimal(23,10) DEFAULT NULL,
  `spend_amount` decimal(23,10) DEFAULT NULL,
  `num_times_to_apply` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `start_date` (`start_date`),
  KEY `end_date` (`end_date`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_price_rules: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_price_rules` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_price_rules` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_price_rules_categories
DROP TABLE IF EXISTS `phppos_price_rules_categories`;
CREATE TABLE IF NOT EXISTS `phppos_price_rules_categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rule_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `phppos_price_rules_categories_ibfk_1` (`rule_id`),
  KEY `phppos_price_rules_categories_ibfk_2` (`category_id`),
  CONSTRAINT `phppos_price_rules_categories_ibfk_1` FOREIGN KEY (`rule_id`) REFERENCES `phppos_price_rules` (`id`),
  CONSTRAINT `phppos_price_rules_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `phppos_categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_price_rules_categories: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_price_rules_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_price_rules_categories` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_price_rules_items
DROP TABLE IF EXISTS `phppos_price_rules_items`;
CREATE TABLE IF NOT EXISTS `phppos_price_rules_items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rule_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `phppos_price_rules_items_ibfk_1` (`rule_id`),
  KEY `phppos_price_rules_items_ibfk_2` (`item_id`),
  CONSTRAINT `phppos_price_rules_items_ibfk_1` FOREIGN KEY (`rule_id`) REFERENCES `phppos_price_rules` (`id`),
  CONSTRAINT `phppos_price_rules_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `phppos_items` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_price_rules_items: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_price_rules_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_price_rules_items` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_price_rules_item_kits
DROP TABLE IF EXISTS `phppos_price_rules_item_kits`;
CREATE TABLE IF NOT EXISTS `phppos_price_rules_item_kits` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rule_id` int(10) NOT NULL,
  `item_kit_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `phppos_price_rules_item_kits_ibfk_1` (`rule_id`),
  KEY `phppos_price_rules_item_kits_ibfk_2` (`item_kit_id`),
  CONSTRAINT `phppos_price_rules_item_kits_ibfk_1` FOREIGN KEY (`rule_id`) REFERENCES `phppos_price_rules` (`id`),
  CONSTRAINT `phppos_price_rules_item_kits_ibfk_2` FOREIGN KEY (`item_kit_id`) REFERENCES `phppos_item_kits` (`item_kit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_price_rules_item_kits: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_price_rules_item_kits` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_price_rules_item_kits` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_price_rules_price_breaks
DROP TABLE IF EXISTS `phppos_price_rules_price_breaks`;
CREATE TABLE IF NOT EXISTS `phppos_price_rules_price_breaks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rule_id` int(10) NOT NULL,
  `item_qty_to_buy` decimal(23,10) DEFAULT NULL,
  `discount_per_unit_fixed` decimal(23,10) DEFAULT NULL,
  `discount_per_unit_percent` decimal(23,10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `phppos_price_rules_custom_ibfk_1` (`rule_id`),
  CONSTRAINT `phppos_price_rules_price_breaks_ibfk_1` FOREIGN KEY (`rule_id`) REFERENCES `phppos_price_rules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_price_rules_price_breaks: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_price_rules_price_breaks` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_price_rules_price_breaks` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_price_rules_tags
DROP TABLE IF EXISTS `phppos_price_rules_tags`;
CREATE TABLE IF NOT EXISTS `phppos_price_rules_tags` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rule_id` int(10) NOT NULL,
  `tag_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `phppos_price_rules_tags_ibfk_1` (`rule_id`),
  KEY `phppos_price_rules_tags_ibfk_2` (`tag_id`),
  CONSTRAINT `phppos_price_rules_tags_ibfk_1` FOREIGN KEY (`rule_id`) REFERENCES `phppos_price_rules` (`id`),
  CONSTRAINT `phppos_price_rules_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `phppos_tags` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_price_rules_tags: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_price_rules_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_price_rules_tags` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_price_tiers
DROP TABLE IF EXISTS `phppos_price_tiers`;
CREATE TABLE IF NOT EXISTS `phppos_price_tiers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order` int(10) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `default_percent_off` decimal(15,3) DEFAULT NULL,
  `default_cost_plus_percent` decimal(15,3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_price_tiers: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_price_tiers` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_price_tiers` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_receivings
DROP TABLE IF EXISTS `phppos_receivings`;
CREATE TABLE IF NOT EXISTS `phppos_receivings` (
  `receiving_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `supplier_id` int(10) DEFAULT NULL,
  `employee_id` int(10) NOT NULL DEFAULT '0',
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `receiving_id` int(10) NOT NULL AUTO_INCREMENT,
  `payment_type` text COLLATE utf8_unicode_ci,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `deleted_by` int(10) DEFAULT NULL,
  `suspended` int(1) NOT NULL DEFAULT '0',
  `location_id` int(11) NOT NULL,
  `transfer_to_location_id` int(11) DEFAULT NULL,
  `deleted_taxes` text COLLATE utf8_unicode_ci,
  `is_po` int(1) NOT NULL DEFAULT '0',
  `store_account_payment` int(1) NOT NULL DEFAULT '0',
  `total_quantity_purchased` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `total_quantity_received` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `subtotal` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `tax` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `total` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `profit` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  PRIMARY KEY (`receiving_id`),
  KEY `supplier_id` (`supplier_id`),
  KEY `employee_id` (`employee_id`),
  KEY `deleted` (`deleted`),
  KEY `location_id` (`location_id`),
  KEY `transfer_to_location_id` (`transfer_to_location_id`),
  KEY `recv_search` (`location_id`,`deleted`,`receiving_time`,`suspended`,`store_account_payment`,`total_quantity_purchased`),
  CONSTRAINT `phppos_receivings_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `phppos_employees` (`person_id`),
  CONSTRAINT `phppos_receivings_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `phppos_suppliers` (`person_id`),
  CONSTRAINT `phppos_receivings_ibfk_3` FOREIGN KEY (`location_id`) REFERENCES `phppos_locations` (`location_id`),
  CONSTRAINT `phppos_receivings_ibfk_4` FOREIGN KEY (`transfer_to_location_id`) REFERENCES `phppos_locations` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_receivings: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_receivings` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_receivings` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_receivings_items
DROP TABLE IF EXISTS `phppos_receivings_items`;
CREATE TABLE IF NOT EXISTS `phppos_receivings_items` (
  `receiving_id` int(10) NOT NULL DEFAULT '0',
  `item_id` int(10) NOT NULL DEFAULT '0',
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serialnumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `line` int(11) NOT NULL DEFAULT '0',
  `quantity_purchased` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `quantity_received` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `item_cost_price` decimal(23,10) NOT NULL,
  `item_unit_price` decimal(23,10) NOT NULL,
  `discount_percent` decimal(15,3) NOT NULL DEFAULT '0.000',
  `expire_date` date DEFAULT NULL,
  `subtotal` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `tax` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `total` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `profit` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  PRIMARY KEY (`receiving_id`,`item_id`,`line`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `phppos_receivings_items_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `phppos_items` (`item_id`),
  CONSTRAINT `phppos_receivings_items_ibfk_2` FOREIGN KEY (`receiving_id`) REFERENCES `phppos_receivings` (`receiving_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_receivings_items: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_receivings_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_receivings_items` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_receivings_items_taxes
DROP TABLE IF EXISTS `phppos_receivings_items_taxes`;
CREATE TABLE IF NOT EXISTS `phppos_receivings_items_taxes` (
  `receiving_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `line` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `percent` decimal(15,3) NOT NULL,
  `cumulative` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`receiving_id`,`item_id`,`line`,`name`,`percent`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `phppos_receivings_items_taxes_ibfk_1` FOREIGN KEY (`receiving_id`) REFERENCES `phppos_receivings` (`receiving_id`),
  CONSTRAINT `phppos_receivings_items_taxes_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `phppos_items` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_receivings_items_taxes: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_receivings_items_taxes` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_receivings_items_taxes` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_receivings_payments
DROP TABLE IF EXISTS `phppos_receivings_payments`;
CREATE TABLE IF NOT EXISTS `phppos_receivings_payments` (
  `payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `receiving_id` int(10) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_amount` decimal(23,10) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_id`),
  KEY `receiving_id` (`receiving_id`),
  KEY `payment_date` (`payment_date`),
  CONSTRAINT `phppos_receivings_payments_ibfk_1` FOREIGN KEY (`receiving_id`) REFERENCES `phppos_receivings` (`receiving_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_receivings_payments: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_receivings_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_receivings_payments` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_registers
DROP TABLE IF EXISTS `phppos_registers`;
CREATE TABLE IF NOT EXISTS `phppos_registers` (
  `register_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iptran_device_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emv_terminal_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`register_id`),
  KEY `deleted` (`deleted`),
  KEY `phppos_registers_ibfk_1` (`location_id`),
  CONSTRAINT `phppos_registers_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `phppos_locations` (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_registers: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_registers` DISABLE KEYS */;
INSERT INTO `phppos_registers` (`register_id`, `location_id`, `name`, `iptran_device_id`, `emv_terminal_id`, `deleted`) VALUES
	(1, 1, 'Default', NULL, NULL, 0);
/*!40000 ALTER TABLE `phppos_registers` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_registers_cart
DROP TABLE IF EXISTS `phppos_registers_cart`;
CREATE TABLE IF NOT EXISTS `phppos_registers_cart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `register_id` int(11) NOT NULL,
  `data` longblob NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `register_id` (`register_id`),
  CONSTRAINT `phppos_registers_cart_ibfk_1` FOREIGN KEY (`register_id`) REFERENCES `phppos_registers` (`register_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_registers_cart: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_registers_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_registers_cart` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_register_currency_denominations
DROP TABLE IF EXISTS `phppos_register_currency_denominations`;
CREATE TABLE IF NOT EXISTS `phppos_register_currency_denominations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` decimal(23,10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_register_currency_denominations: ~12 rows (approximately)
/*!40000 ALTER TABLE `phppos_register_currency_denominations` DISABLE KEYS */;
INSERT INTO `phppos_register_currency_denominations` (`id`, `name`, `value`) VALUES
	(1, '100\'s', 100.0000000000),
	(2, '50\'s', 50.0000000000),
	(3, '20\'s', 20.0000000000),
	(4, '10\'s', 10.0000000000),
	(5, '5\'s', 5.0000000000),
	(6, '2\'s', 2.0000000000),
	(7, '1\'s', 1.0000000000),
	(8, 'Half Dollars', 0.5000000000),
	(9, 'Quarters', 0.2500000000),
	(10, 'Dimes', 0.1000000000),
	(11, 'Nickels', 0.0500000000),
	(12, 'Pennies', 0.0100000000);
/*!40000 ALTER TABLE `phppos_register_currency_denominations` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_register_log
DROP TABLE IF EXISTS `phppos_register_log`;
CREATE TABLE IF NOT EXISTS `phppos_register_log` (
  `register_log_id` int(10) NOT NULL AUTO_INCREMENT,
  `employee_id_open` int(10) NOT NULL,
  `employee_id_close` int(11) DEFAULT NULL,
  `register_id` int(11) DEFAULT NULL,
  `shift_start` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `shift_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `open_amount` decimal(23,10) NOT NULL,
  `close_amount` decimal(23,10) NOT NULL,
  `cash_sales_amount` decimal(23,10) NOT NULL,
  `total_cash_additions` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `total_cash_subtractions` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`register_log_id`),
  KEY `phppos_register_log_ibfk_1` (`employee_id_open`),
  KEY `phppos_register_log_ibfk_2` (`register_id`),
  KEY `phppos_register_log_ibfk_3` (`employee_id_close`),
  CONSTRAINT `phppos_register_log_ibfk_1` FOREIGN KEY (`employee_id_open`) REFERENCES `phppos_employees` (`person_id`),
  CONSTRAINT `phppos_register_log_ibfk_2` FOREIGN KEY (`register_id`) REFERENCES `phppos_registers` (`register_id`),
  CONSTRAINT `phppos_register_log_ibfk_3` FOREIGN KEY (`employee_id_close`) REFERENCES `phppos_employees` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_register_log: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_register_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_register_log` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_register_log_audit
DROP TABLE IF EXISTS `phppos_register_log_audit`;
CREATE TABLE IF NOT EXISTS `phppos_register_log_audit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `register_log_id` int(10) NOT NULL,
  `employee_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `register_log_audit_ibfk_1` (`register_log_id`),
  KEY `register_log_audit_ibfk_2` (`employee_id`),
  CONSTRAINT `register_log_audit_ibfk_1` FOREIGN KEY (`register_log_id`) REFERENCES `phppos_register_log` (`register_log_id`),
  CONSTRAINT `register_log_audit_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `phppos_employees` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_register_log_audit: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_register_log_audit` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_register_log_audit` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_sales
DROP TABLE IF EXISTS `phppos_sales`;
CREATE TABLE IF NOT EXISTS `phppos_sales` (
  `sale_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_id` int(10) DEFAULT NULL,
  `employee_id` int(10) NOT NULL DEFAULT '0',
  `sold_by_employee_id` int(10) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `discount_reason` text COLLATE utf8_unicode_ci NOT NULL,
  `show_comment_on_receipt` int(1) NOT NULL DEFAULT '0',
  `sale_id` int(10) NOT NULL AUTO_INCREMENT,
  `rule_id` int(10) DEFAULT NULL,
  `rule_discount` decimal(23,10) DEFAULT NULL,
  `payment_type` text COLLATE utf8_unicode_ci,
  `cc_ref_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `deleted_by` int(10) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `suspended` int(1) NOT NULL DEFAULT '0',
  `store_account_payment` int(1) NOT NULL DEFAULT '0',
  `was_layaway` int(1) NOT NULL DEFAULT '0',
  `was_estimate` int(1) NOT NULL DEFAULT '0',
  `location_id` int(11) NOT NULL,
  `register_id` int(11) DEFAULT NULL,
  `tier_id` int(10) DEFAULT NULL,
  `points_used` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `points_gained` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `did_redeem_discount` int(1) NOT NULL DEFAULT '0',
  `signature_image_id` int(10) DEFAULT NULL,
  `deleted_taxes` text COLLATE utf8_unicode_ci,
  `total_quantity_purchased` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `subtotal` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `tax` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `total` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `profit` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `aaatex_qb_imported` int(1) DEFAULT '0',
  PRIMARY KEY (`sale_id`),
  KEY `customer_id` (`customer_id`),
  KEY `employee_id` (`employee_id`),
  KEY `deleted` (`deleted`),
  KEY `location_id` (`location_id`),
  KEY `phppos_sales_ibfk_4` (`deleted_by`),
  KEY `phppos_sales_ibfk_5` (`tier_id`),
  KEY `phppos_sales_ibfk_7` (`register_id`),
  KEY `phppos_sales_ibfk_6` (`sold_by_employee_id`),
  KEY `phppos_sales_ibfk_8` (`signature_image_id`),
  KEY `was_layaway` (`was_layaway`),
  KEY `was_estimate` (`was_estimate`),
  KEY `phppos_sales_ibfk_9` (`rule_id`),
  KEY `sales_search` (`location_id`,`deleted`,`sale_time`,`suspended`,`store_account_payment`,`total_quantity_purchased`),
  CONSTRAINT `phppos_sales_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `phppos_employees` (`person_id`),
  CONSTRAINT `phppos_sales_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `phppos_customers` (`person_id`),
  CONSTRAINT `phppos_sales_ibfk_3` FOREIGN KEY (`location_id`) REFERENCES `phppos_locations` (`location_id`),
  CONSTRAINT `phppos_sales_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `phppos_employees` (`person_id`),
  CONSTRAINT `phppos_sales_ibfk_5` FOREIGN KEY (`tier_id`) REFERENCES `phppos_price_tiers` (`id`),
  CONSTRAINT `phppos_sales_ibfk_6` FOREIGN KEY (`sold_by_employee_id`) REFERENCES `phppos_employees` (`person_id`),
  CONSTRAINT `phppos_sales_ibfk_7` FOREIGN KEY (`register_id`) REFERENCES `phppos_registers` (`register_id`),
  CONSTRAINT `phppos_sales_ibfk_8` FOREIGN KEY (`signature_image_id`) REFERENCES `phppos_app_files` (`file_id`),
  CONSTRAINT `phppos_sales_ibfk_9` FOREIGN KEY (`rule_id`) REFERENCES `phppos_price_rules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_sales: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_sales` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_sales_items
DROP TABLE IF EXISTS `phppos_sales_items`;
CREATE TABLE IF NOT EXISTS `phppos_sales_items` (
  `sale_id` int(10) NOT NULL DEFAULT '0',
  `item_id` int(10) NOT NULL DEFAULT '0',
  `rule_id` int(10) DEFAULT NULL,
  `rule_discount` decimal(23,10) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `serialnumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `line` int(11) NOT NULL DEFAULT '0',
  `quantity_purchased` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `item_cost_price` decimal(23,10) NOT NULL,
  `item_unit_price` decimal(23,10) NOT NULL,
  `regular_item_unit_price_at_time_of_sale` decimal(23,10) DEFAULT NULL,
  `discount_percent` decimal(15,3) NOT NULL DEFAULT '0.000',
  `commission` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `is_bogo` tinyint(1) NOT NULL DEFAULT '0',
  `subtotal` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `tax` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `total` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `profit` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  PRIMARY KEY (`sale_id`,`item_id`,`line`),
  KEY `item_id` (`item_id`),
  KEY `phppos_sales_items_ibfk_3` (`rule_id`),
  CONSTRAINT `phppos_sales_items_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `phppos_items` (`item_id`),
  CONSTRAINT `phppos_sales_items_ibfk_2` FOREIGN KEY (`sale_id`) REFERENCES `phppos_sales` (`sale_id`),
  CONSTRAINT `phppos_sales_items_ibfk_3` FOREIGN KEY (`rule_id`) REFERENCES `phppos_price_rules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_sales_items: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_sales_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_sales_items` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_sales_items_taxes
DROP TABLE IF EXISTS `phppos_sales_items_taxes`;
CREATE TABLE IF NOT EXISTS `phppos_sales_items_taxes` (
  `sale_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `line` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `percent` decimal(15,3) NOT NULL,
  `cumulative` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sale_id`,`item_id`,`line`,`name`,`percent`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `phppos_sales_items_taxes_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `phppos_sales_items` (`sale_id`),
  CONSTRAINT `phppos_sales_items_taxes_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `phppos_items` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_sales_items_taxes: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_sales_items_taxes` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_sales_items_taxes` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_sales_item_kits
DROP TABLE IF EXISTS `phppos_sales_item_kits`;
CREATE TABLE IF NOT EXISTS `phppos_sales_item_kits` (
  `sale_id` int(10) NOT NULL DEFAULT '0',
  `item_kit_id` int(10) NOT NULL DEFAULT '0',
  `rule_id` int(10) DEFAULT NULL,
  `rule_discount` decimal(23,10) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `line` int(11) NOT NULL DEFAULT '0',
  `quantity_purchased` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `item_kit_cost_price` decimal(23,10) NOT NULL,
  `item_kit_unit_price` decimal(23,10) NOT NULL,
  `regular_item_kit_unit_price_at_time_of_sale` decimal(23,10) DEFAULT NULL,
  `discount_percent` decimal(15,3) NOT NULL DEFAULT '0.000',
  `commission` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `is_bogo` tinyint(1) NOT NULL DEFAULT '0',
  `subtotal` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `tax` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `total` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `profit` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  PRIMARY KEY (`sale_id`,`item_kit_id`,`line`),
  KEY `item_kit_id` (`item_kit_id`),
  KEY `phppos_sales_item_kits_ibfk_3` (`rule_id`),
  CONSTRAINT `phppos_sales_item_kits_ibfk_1` FOREIGN KEY (`item_kit_id`) REFERENCES `phppos_item_kits` (`item_kit_id`),
  CONSTRAINT `phppos_sales_item_kits_ibfk_2` FOREIGN KEY (`sale_id`) REFERENCES `phppos_sales` (`sale_id`),
  CONSTRAINT `phppos_sales_item_kits_ibfk_3` FOREIGN KEY (`rule_id`) REFERENCES `phppos_price_rules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_sales_item_kits: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_sales_item_kits` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_sales_item_kits` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_sales_item_kits_taxes
DROP TABLE IF EXISTS `phppos_sales_item_kits_taxes`;
CREATE TABLE IF NOT EXISTS `phppos_sales_item_kits_taxes` (
  `sale_id` int(10) NOT NULL,
  `item_kit_id` int(10) NOT NULL,
  `line` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `percent` decimal(15,3) NOT NULL,
  `cumulative` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sale_id`,`item_kit_id`,`line`,`name`,`percent`),
  KEY `item_id` (`item_kit_id`),
  CONSTRAINT `phppos_sales_item_kits_taxes_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `phppos_sales_item_kits` (`sale_id`),
  CONSTRAINT `phppos_sales_item_kits_taxes_ibfk_2` FOREIGN KEY (`item_kit_id`) REFERENCES `phppos_item_kits` (`item_kit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_sales_item_kits_taxes: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_sales_item_kits_taxes` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_sales_item_kits_taxes` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_sales_payments
DROP TABLE IF EXISTS `phppos_sales_payments`;
CREATE TABLE IF NOT EXISTS `phppos_sales_payments` (
  `payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `sale_id` int(10) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_amount` decimal(23,10) NOT NULL,
  `auth_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `ref_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `cc_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `acq_ref_data` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `process_data` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `entry_method` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `aid` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `tvr` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `iad` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `tsi` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `arc` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `cvm` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `tran_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `application_label` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `truncated_card` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `card_issuer` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ebt_auth_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `ebt_voucher_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  PRIMARY KEY (`payment_id`),
  KEY `sale_id` (`sale_id`),
  KEY `payment_date` (`payment_date`),
  CONSTRAINT `phppos_sales_payments_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `phppos_sales` (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_sales_payments: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_sales_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_sales_payments` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_sessions
DROP TABLE IF EXISTS `phppos_sessions`;
CREATE TABLE IF NOT EXISTS `phppos_sessions` (
  `id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` longblob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `phppos_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_sessions: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_sessions` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_store_accounts
DROP TABLE IF EXISTS `phppos_store_accounts`;
CREATE TABLE IF NOT EXISTS `phppos_store_accounts` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `transaction_amount` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `balance` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sno`),
  KEY `phppos_store_accounts_ibfk_1` (`sale_id`),
  KEY `phppos_store_accounts_ibfk_2` (`customer_id`),
  CONSTRAINT `phppos_store_accounts_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `phppos_sales` (`sale_id`),
  CONSTRAINT `phppos_store_accounts_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `phppos_customers` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_store_accounts: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_store_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_store_accounts` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_store_accounts_paid_sales
DROP TABLE IF EXISTS `phppos_store_accounts_paid_sales`;
CREATE TABLE IF NOT EXISTS `phppos_store_accounts_paid_sales` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `store_account_payment_sale_id` int(10) DEFAULT NULL,
  `sale_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `phppos_store_accounts_sales_ibfk_1` (`sale_id`),
  KEY `phppos_store_accounts_sales_ibfk_2` (`store_account_payment_sale_id`),
  CONSTRAINT `phppos_store_accounts_sales_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `phppos_sales` (`sale_id`),
  CONSTRAINT `phppos_store_accounts_sales_ibfk_2` FOREIGN KEY (`store_account_payment_sale_id`) REFERENCES `phppos_sales` (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_store_accounts_paid_sales: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_store_accounts_paid_sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_store_accounts_paid_sales` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_suppliers
DROP TABLE IF EXISTS `phppos_suppliers`;
CREATE TABLE IF NOT EXISTS `phppos_suppliers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `person_id` int(10) NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `override_default_tax` int(1) NOT NULL DEFAULT '0',
  `balance` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_number` (`account_number`),
  KEY `person_id` (`person_id`),
  KEY `deleted` (`deleted`),
  CONSTRAINT `phppos_suppliers_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `phppos_people` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_suppliers: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_suppliers` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_suppliers` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_suppliers_taxes
DROP TABLE IF EXISTS `phppos_suppliers_taxes`;
CREATE TABLE IF NOT EXISTS `phppos_suppliers_taxes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `percent` decimal(15,3) NOT NULL,
  `cumulative` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_tax` (`supplier_id`,`name`,`percent`),
  CONSTRAINT `phppos_suppliers_taxes_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `phppos_suppliers` (`person_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_suppliers_taxes: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_suppliers_taxes` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_suppliers_taxes` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_supplier_store_accounts
DROP TABLE IF EXISTS `phppos_supplier_store_accounts`;
CREATE TABLE IF NOT EXISTS `phppos_supplier_store_accounts` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `receiving_id` int(11) DEFAULT NULL,
  `transaction_amount` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `balance` decimal(23,10) NOT NULL DEFAULT '0.0000000000',
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sno`),
  KEY `phppos_supplier_store_accounts_ibfk_1` (`receiving_id`),
  KEY `phppos_supplier_store_accounts_ibfk_2` (`supplier_id`),
  CONSTRAINT `phppos_supplier_store_accounts_ibfk_1` FOREIGN KEY (`receiving_id`) REFERENCES `phppos_receivings` (`receiving_id`),
  CONSTRAINT `phppos_supplier_store_accounts_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `phppos_suppliers` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_supplier_store_accounts: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_supplier_store_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_supplier_store_accounts` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_supplier_store_accounts_paid_receivings
DROP TABLE IF EXISTS `phppos_supplier_store_accounts_paid_receivings`;
CREATE TABLE IF NOT EXISTS `phppos_supplier_store_accounts_paid_receivings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `store_account_payment_receiving_id` int(10) DEFAULT NULL,
  `receiving_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `phppos_supplier_store_accounts_paid_receivings_ibfk_1` (`receiving_id`),
  KEY `phppos_supplier_store_accounts_paid_receivings_ibfk_2` (`store_account_payment_receiving_id`),
  CONSTRAINT `phppos_supplier_store_accounts_paid_receivings_ibfk_1` FOREIGN KEY (`receiving_id`) REFERENCES `phppos_receivings` (`receiving_id`),
  CONSTRAINT `phppos_supplier_store_accounts_paid_receivings_ibfk_2` FOREIGN KEY (`store_account_payment_receiving_id`) REFERENCES `phppos_receivings` (`receiving_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_supplier_store_accounts_paid_receivings: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_supplier_store_accounts_paid_receivings` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_supplier_store_accounts_paid_receivings` ENABLE KEYS */;

-- Dumping structure for table post-id.phppos_tags
DROP TABLE IF EXISTS `phppos_tags`;
CREATE TABLE IF NOT EXISTS `phppos_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag_name` (`name`),
  KEY `deleted` (`deleted`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table post-id.phppos_tags: ~0 rows (approximately)
/*!40000 ALTER TABLE `phppos_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `phppos_tags` ENABLE KEYS */;

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
	(1, 'Yes', 'បាន', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(2, 'No', 'មិនបាន', '2018-08-03 01:46:04', '2018-08-03 01:46:04');
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
	(1, 'Yes', 'បានត', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(2, 'No', 'មិនបានត', '2018-08-03 01:46:04', '2018-08-03 01:46:04');
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
	(1, 'Yes', 'មាន', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(2, 'No', 'គ្មាន', '2018-08-03 01:46:04', '2018-08-03 01:46:04');
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
	(1, 'Husband', 'ប្តី', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(2, 'Wife', 'ប្រពន្ធ', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(3, 'Children', 'កូន', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(4, 'Grandmonther', 'ក្មួយ', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(5, 'Grandmonther', 'អ៊ុំ', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(6, 'Grandmonther', 'បង/ប្អូន ', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(7, 'Grandmother / Grandfather', 'ជីដូន/ជីតា', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(8, 'Other', 'ផ្សេងៗ', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04');
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
	(1, 'Wood', 'ឈើ', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(2, 'parm_spring', 'ស្លឹកត្នោត', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(3, 'grass', 'ស្បូវ', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(4, 'cu', 'ស័ង្ហសី', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(5, 'tile', 'ក្បឿង', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(6, 'plastic', 'កៅស៊ូពណ៌/ប្លាស្ទិក', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(7, 'filippo_cement', 'ហ្វីប្រូស៊ីម៉ងត៍', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(8, 'concrete', 'បេតុង', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(9, 'Other', 'ផ្សេងៗ', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04');
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.store_score: 0 rows
/*!40000 ALTER TABLE `store_score` DISABLE KEYS */;
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
	(1, 'Cow - buffalo', 'គោ-ក្របី', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(2, 'Pigs - Goats - sheep', 'ជ្រូក-ពពែ-ចៀម', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(3, 'Chicken - duck', 'មាន់-ទា', '2018-08-03 01:46:04', '2018-08-03 01:46:04');
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.type_income: 0 rows
/*!40000 ALTER TABLE `type_income` DISABLE KEYS */;
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
	(1, 'Mobile phones', 'ទូរស័ព្ទដៃ', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(2, 'Electric fans', 'កង្ហារ​អគ្គិសនី', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(3, 'Radios', 'វិទ្យុ ម៉ាញ៉េ', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(4, 'TV', 'ទូរទស្សន៍', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(5, 'Pump or pumping pump', 'ម៉ាស៊ីនបូមទឹក ឬម៉ូទ័របូមទឹក', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(6, 'Other', 'ឧបករណ៍ផ្សេងៗ(ទូទឹកកក………)', '2018-08-03 01:46:04', '2018-08-03 01:46:04');
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.type_toilet_link: 0 rows
/*!40000 ALTER TABLE `type_toilet_link` DISABLE KEYS */;
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
	(1, 'Bikes', 'កង់', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(2, 'Motorbike or motorbike', 'ម៉ូតូ ឬ ម៉ូតូ​រ៉ឺម៉ក', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(3, 'Small class boat', 'ទូកថ្នាក់តូច', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(4, 'Boat machines', 'ទូកម៉ាស៊ីន', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(5, 'Ox cart (wooden or tire wheel)', 'រទេះគោ (កង់ឈើ ឬកង់ឡាន)', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(6, 'Tractor', 'គោយន្ត', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(7, 'Other', 'ផ្សេងៗ', '2018-08-03 01:46:04', '2018-08-03 01:46:04');
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
	(1, 'admin', 'BTB', 'admin@admin.com', '$2y$10$GYLX3/kuwhvhIWjuVhV5kOppR9Ee5ifrM1skSHHQtdpLkJ7fu6E..', NULL, '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(2, 'user', 'PHP', 'user@user.com', '$2y$10$5fnY9vihxOFIwAti9c.V3./1oX7vx5oxMiCJl.ae4DN/z73OUmQce', NULL, '2018-08-03 01:46:04', '2018-08-03 01:46:04');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

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
	(1, 'parm_spring', 'ស្លឹកត្នោត', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(2, 'grass', 'ស្បូវ', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(3, 'bamboo', 'ឬស្សី', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(4, 'cu', 'ស័ង្ហសី', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(5, 'board', 'ឈើ', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(6, 'cement', 'ឥដ្ឋ/ស៊ីម៉ង់ ', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(7, 'no_wall', 'គ្មានជញ្ជាំង', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04'),
	(8, 'Other', 'ផ្សេងៗ', '1', '2018-08-03 01:46:04', '2018-08-03 01:46:04');
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table post-id.yes_electric_link: 0 rows
/*!40000 ALTER TABLE `yes_electric_link` DISABLE KEYS */;
/*!40000 ALTER TABLE `yes_electric_link` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
