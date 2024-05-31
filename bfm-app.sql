-- -------------------------------------------------------------
-- TablePlus 5.9.6(546)
--
-- https://tableplus.com/
--
-- Database: bfm-app
-- Generation Time: 2024-05-27 09:29:11.7580
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'add direction', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(2, 'update direction', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(3, 'delete direction', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(4, 'view direction', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(5, 'edit direction', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(6, 'add service', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(7, 'update service', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(8, 'delete service', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(9, 'view service', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(10, 'edit service', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(11, 'add user', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(12, 'update user', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(13, 'delete user', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(14, 'view user', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(15, 'edit user', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(16, 'update profile', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(17, 'add projet', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(18, 'update projet', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(19, 'delete projet', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(20, 'view projet', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(21, 'edit projet', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(22, 'update projet state', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(23, 'add tache', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(24, 'update tache', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(25, 'delete tache', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(26, 'view tache', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(27, 'edit tache', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38'),
(28, 'update tache state', 'web', '2024-05-27 04:52:38', '2024-05-27 04:52:38');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;