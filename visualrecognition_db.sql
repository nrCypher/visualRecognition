-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping data for table visualrecognition.scenarios: ~3 rows (approximately)
DELETE FROM `scenarios`;
/*!40000 ALTER TABLE `scenarios` DISABLE KEYS */;
INSERT INTO `scenarios` (`id`, `order`, `validation`, `is_valid`, `status`, `created_at`, `updated_at`) VALUES
	(446, 'R,B,R,R', '1,1,1,1', 1, NULL, '2019-11-19 15:51:41', '2019-11-19 16:16:09'),
	(447, 'R,G,B,R', '1,1,1,1', 1, NULL, '2019-11-19 16:17:07', '2019-11-19 16:18:26'),
	(448, 'G,R,R,R', NULL, NULL, NULL, '2019-11-19 16:19:45', '2019-11-19 16:19:45');
/*!40000 ALTER TABLE `scenarios` ENABLE KEYS */;

-- Dumping data for table visualrecognition.sequences: ~23 rows (approximately)
DELETE FROM `sequences`;
/*!40000 ALTER TABLE `sequences` DISABLE KEYS */;
INSERT INTO `sequences` (`id`, `sequence`, `step`, `image`) VALUES
	(1, 1, 1, 'storage/Scenarios/s1/1_1.JPG'),
	(2, 1, 2, 'storage/Scenarios/s1/1_2.JPG'),
	(3, 1, 3, 'storage/Scenarios/s1/1_3.JPG'),
	(5, 1, 5, 'storage/Scenarios/s1/1_5.JPG'),
	(6, 1, 4, 'storage/Scenarios/s1/1_4.JPG'),
	(8, 2, 1, 'storage/Scenarios/s2/2_1.JPG'),
	(9, 2, 2, 'storage/Scenarios/s2/2_2.JPG'),
	(10, 2, 3, 'storage/Scenarios/s2/2_3.JPG'),
	(11, 2, 4, 'storage/Scenarios/s2/2_4.JPG'),
	(12, 2, 5, 'storage/Scenarios/s2/2_5.JPG'),
	(18, 1, 0, 'storage/Scenarios/s1/1_final.JPG'),
	(19, 2, 0, 'storage/Scenarios/s2/2_final.JPG'),
	(20, 3, 1, 'storage/Scenarios/s3/3_1.JPG'),
	(21, 3, 2, 'storage/Scenarios/s3/3_2.JPG'),
	(22, 3, 3, 'storage/Scenarios/s3/3_3.JPG'),
	(23, 3, 4, 'storage/Scenarios/s3/3_4.JPG'),
	(24, 4, 0, 'storage/Scenarios/s4/4_final.JPG'),
	(33, 4, 1, 'storage/Scenarios/s4/4_1.JPG'),
	(34, 4, 2, 'storage/Scenarios/s4/4_2.JPG'),
	(35, 4, 3, 'storage/Scenarios/s4/4_3.JPG'),
	(36, 4, 4, 'storage/Scenarios/s4/4_4.JPG'),
	(37, 4, 5, 'storage/Scenarios/s4/4_5.JPG'),
	(38, 3, 0, 'storage/Scenarios/s3/3_final.jpg');
/*!40000 ALTER TABLE `sequences` ENABLE KEYS */;

-- Dumping data for table visualrecognition.sequence_history: ~1 rows (approximately)
DELETE FROM `sequence_history`;
/*!40000 ALTER TABLE `sequence_history` DISABLE KEYS */;
INSERT INTO `sequence_history` (`id`, `sequence`, `status`) VALUES
	(1, '1', 0);
/*!40000 ALTER TABLE `sequence_history` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
