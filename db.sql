
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `tasks` (
  `id` int(11) UNSIGNED NOT NULL,
  `task` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



INSERT INTO `tasks` (`id`, `task`) VALUES
(1, 'Купить молоко'),
(3, 'Купить машину');


ALTER TABLE `tasks`
  ADD UNIQUE KEY `id` (`id`);


ALTER TABLE `tasks`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
