CREATE TABLE `b_ylab_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `NAME` varchar(255) COLLATE 'utf8_general_ci' NOT NULL,
  `CITY` varchar(255) COLLATE 'utf8_general_ci' NOT NULL,
  `DATEBIRTH` date NOT NULL,
  `PHONE` varchar(12) COLLATE 'utf8_general_ci' NOT NULL
);

CREATE TABLE `b_ylab_test` (
  `ID` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `NAME` varchar(255) COLLATE 'utf8_general_ci' NOT NULL
);