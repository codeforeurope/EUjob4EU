-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: Mar 10, 2013 alle 15:26
-- Versione del server: 5.5.24
-- Versione PHP: 5.3.10-1ubuntu3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yfej_civiccommons`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `yfej_admin`
--

CREATE TABLE IF NOT EXISTS `yfej_admin` (
  `a_id` int(6) NOT NULL AUTO_INCREMENT,
  `a_firstname` varchar(24) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `a_lastname` varchar(24) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `a_user` varchar(16) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `a_email` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `a_tel1` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `a_tel2` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `a_tel3` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `a_tel4` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `a_tel5` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `a_address` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `a_password` varchar(70) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `a_manager` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `a_level` enum('0','1','2','3','4','5','6','7','8','9') CHARACTER SET utf8 NOT NULL DEFAULT '1',
  `a_status` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '1',
  `a_failed_login` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`a_id`),
  UNIQUE KEY `a_user` (`a_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `yfej_admin_level`
--

CREATE TABLE IF NOT EXISTS `yfej_admin_level` (
  `level` char(1) NOT NULL DEFAULT '',
  `description` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`level`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `yfej_admin_level`
--

INSERT INTO `yfej_admin_level` (`level`, `description`) VALUES
('0', ''),
('1', 'CPI'),
('2', ''),
('3', 'HUSCIE'),
('4', ''),
('5', 'PF'),
('6', ''),
('7', 'PUPE'),
('8', ''),
('9', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `yfej_cv`
--

CREATE TABLE IF NOT EXISTS `yfej_cv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bdate` date NOT NULL DEFAULT '0000-00-00',
  `lastname` varchar(64) NOT NULL DEFAULT '',
  `firstname` varchar(64) NOT NULL DEFAULT '',
  `referred_by` varchar(250) NOT NULL DEFAULT '',
  `address` varchar(64) NOT NULL DEFAULT '',
  `city` varchar(64) NOT NULL DEFAULT '',
  `postalcode` varchar(12) NOT NULL DEFAULT '',
  `country` char(2) NOT NULL DEFAULT '',
  `telephone` varchar(128) NOT NULL DEFAULT '',
  `mobile` varchar(64) NOT NULL DEFAULT '',
  `fax` varchar(64) NOT NULL DEFAULT '',
  `email` varchar(128) NOT NULL DEFAULT '',
  `skype` varchar(100) NOT NULL DEFAULT '',
  `other_messaging` varchar(100) NOT NULL DEFAULT '',
  `nationality` varchar(128) NOT NULL DEFAULT '',
  `gender` char(1) NOT NULL DEFAULT '',
  `langtraining` enum('0','1') DEFAULT '0',
  `areas` varchar(250) NOT NULL DEFAULT '',
  `socialskills` text NOT NULL,
  `organisationalskills` text NOT NULL,
  `technicalskills` text NOT NULL,
  `computerskills` text NOT NULL,
  `artisticskills` text NOT NULL,
  `otherskills` text NOT NULL,
  `drivinglicences` varchar(255) NOT NULL DEFAULT '',
  `additionalinfo` text NOT NULL,
  `highesteducation` tinyint(4) NOT NULL DEFAULT '0',
  `workexperience` tinyint(4) NOT NULL DEFAULT '0',
  `retrievalcode` varchar(20) NOT NULL DEFAULT '',
  `img_dir` tinyint(4) NOT NULL DEFAULT '0',
  `img_ext` varchar(4) NOT NULL DEFAULT '',
  `status` enum('-1','0','1','2','3','4','5','6') NOT NULL DEFAULT '1',
  `manager_id` int(11) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_editable` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `time_extensions` tinyint(4) NOT NULL DEFAULT '0',
  `match_status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `yfej_cv_dossier`
--

CREATE TABLE IF NOT EXISTS `yfej_cv_dossier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `author_id` int(11) NOT NULL DEFAULT '0',
  `cv_id` int(11) NOT NULL DEFAULT '0',
  `log` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `yfej_cv_edu`
--

CREATE TABLE IF NOT EXISTS `yfej_cv_edu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cv_id` int(11) NOT NULL DEFAULT '0',
  `edufrom` date NOT NULL DEFAULT '0000-00-00',
  `eduto` date NOT NULL DEFAULT '0000-00-00',
  `title` varchar(255) NOT NULL DEFAULT '',
  `skills` text NOT NULL,
  `organisation` varchar(255) NOT NULL DEFAULT '',
  `level` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `yfej_cv_isco`
--

CREATE TABLE IF NOT EXISTS `yfej_cv_isco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cv_id` int(11) NOT NULL DEFAULT '0',
  `cv_isco_1` char(2) NOT NULL DEFAULT '',
  `cv_isco_2` char(3) NOT NULL DEFAULT '',
  `cv_isco_3` varchar(4) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `yfej_cv_lang`
--

CREATE TABLE IF NOT EXISTS `yfej_cv_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cv_id` int(11) NOT NULL DEFAULT '0',
  `foreignlanguage` varchar(64) NOT NULL DEFAULT '',
  `listeninglevel` char(2) NOT NULL DEFAULT '',
  `readinglevel` char(2) NOT NULL DEFAULT '',
  `spokeninteractionlevel` char(2) NOT NULL DEFAULT '',
  `spokenproductionlevel` char(2) NOT NULL DEFAULT '',
  `writinglevel` char(2) NOT NULL DEFAULT '',
  `mothertongue` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `yfej_cv_questionnaire`
--

CREATE TABLE IF NOT EXISTS `yfej_cv_questionnaire` (
  `cv_id` int(11) NOT NULL DEFAULT '0',
  `i` enum('0','1','2','3') DEFAULT NULL,
  `o` enum('0','1','2','3') DEFAULT NULL,
  `c` enum('0','1','2','3') DEFAULT NULL,
  `n` enum('0','1','2','3') DEFAULT NULL,
  `f` enum('0','1','2','3') DEFAULT NULL,
  `i_o` tinyint(4) DEFAULT '0',
  `o_o` tinyint(4) DEFAULT '0',
  `c_o` tinyint(4) DEFAULT '0',
  `n_o` tinyint(4) DEFAULT '0',
  `f_o` tinyint(4) DEFAULT '0',
  KEY `cv_id` (`cv_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `yfej_cv_wrkexp`
--

CREATE TABLE IF NOT EXISTS `yfej_cv_wrkexp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cv_id` int(11) NOT NULL DEFAULT '0',
  `wrkfrom` date NOT NULL DEFAULT '0000-00-00',
  `wrkto` date NOT NULL DEFAULT '0000-00-00',
  `position` varchar(255) NOT NULL DEFAULT '',
  `activities` text NOT NULL,
  `employer` varchar(255) NOT NULL DEFAULT '',
  `sector` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `yfej_employer`
--

CREATE TABLE IF NOT EXISTS `yfej_employer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyname` varchar(100) NOT NULL DEFAULT '',
  `referent` varchar(150) NOT NULL DEFAULT '',
  `position` varchar(150) NOT NULL DEFAULT '',
  `pivacf` varchar(20) NOT NULL DEFAULT '',
  `legal_representative` varchar(150) NOT NULL DEFAULT '',
  `legal_address` varchar(150) NOT NULL DEFAULT '',
  `address` varchar(200) NOT NULL DEFAULT '',
  `country` char(2) NOT NULL DEFAULT '',
  `city` varchar(150) NOT NULL DEFAULT '',
  `postalcode` varchar(12) NOT NULL DEFAULT '',
  `businessarea` text NOT NULL,
  `workforce` enum('0','1') NOT NULL DEFAULT '0',
  `phone1` varchar(20) NOT NULL DEFAULT '',
  `phone2` varchar(20) NOT NULL DEFAULT '',
  `fax` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `email_r` varchar(150) NOT NULL DEFAULT '',
  `skype` varchar(50) NOT NULL DEFAULT '',
  `linkedin` varchar(50) NOT NULL DEFAULT '',
  `facebook` varchar(50) NOT NULL DEFAULT '',
  `website` varchar(50) NOT NULL DEFAULT '',
  `twitter` varchar(50) NOT NULL DEFAULT '',
  `other_contact` varchar(250) NOT NULL DEFAULT '',
  `infoproject` varchar(250) NOT NULL DEFAULT '',
  `password` varchar(250) NOT NULL DEFAULT '',
  `status` enum('0','1','2') NOT NULL DEFAULT '0',
  `failed_login` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `yfej_employer_dossier`
--

CREATE TABLE IF NOT EXISTS `yfej_employer_dossier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `author_id` int(11) NOT NULL DEFAULT '0',
  `employer_id` int(11) NOT NULL DEFAULT '0',
  `log` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `yfej_eu_member`
--

CREATE TABLE IF NOT EXISTS `yfej_eu_member` (
  `code` char(2) NOT NULL DEFAULT '',
  `name` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `yfej_eu_member`
--

INSERT INTO `yfej_eu_member` (`code`, `name`) VALUES
('AT', 'Austria'),
('BE', 'Belgium'),
('BG', 'Bulgaria'),
('CY', 'Cyprus'),
('CZ', 'Czech Republic'),
('DE', 'Germany'),
('DK', 'Denmark'),
('EE', 'Estonia'),
('EL', 'Greece'),
('ES', 'Spain'),
('FI', 'Finland'),
('FR', 'France'),
('HU', 'Hungary'),
('IE', 'Ireland'),
('IT', 'Italy'),
('LT', 'Lithuania'),
('LU', 'Luxembourg'),
('LV', 'Latvia'),
('MT', 'Malta'),
('NL', 'Netherlands'),
('PL', 'Poland'),
('PT', 'Portugal'),
('RO', 'Romania'),
('SE', 'Sweden'),
('SI', 'Slovenia'),
('SK', 'Slovakia'),
('UK', 'United Kingdom');

-- --------------------------------------------------------

--
-- Struttura della tabella `yfej_img_dir`
--

CREATE TABLE IF NOT EXISTS `yfej_img_dir` (
  `dir` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `yfej_img_dir`
--

INSERT INTO `yfej_img_dir` (`dir`) VALUES
(1);

-- --------------------------------------------------------

--
-- Struttura della tabella `yfej_isco`
--

CREATE TABLE IF NOT EXISTS `yfej_isco` (
  `code1` varchar(20) NOT NULL DEFAULT '',
  `code` varchar(20) NOT NULL DEFAULT '0',
  `description` varchar(250) NOT NULL DEFAULT '',
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=530 ;

--
-- Dump dei dati per la tabella `yfej_isco`
--

INSERT INTO `yfej_isco` (`code1`, `code`, `description`, `id`) VALUES
('isco[0]', '11', 'Legislators and senior officials\r\n	', 1),
('isco[1]', '111', 'Legislators\r\n	', 2),
('isco[2]', '1120', 'Senior government officials\r\n	', 3),
('isco[3]', '113', 'Traditional chiefs and heads of villages\r\n	', 4),
('isco[4]', '1130', 'Traditional chiefs and heads of villages\r\n	', 5),
('isco[5]', '114', 'Senior officials of special-interest organisations\r\n	', 6),
('isco[6]', '1141', 'Senior officials of political-party organisations\r\n	', 7),
('isco[7]', '1142', 'Senior officials of employers,workers and other economic-interest organisations\r\n	', 8),
('isco[8]', '1143', 'Senior officials of humanitarian and other special-interest organisations\r\n	', 9),
('isco[9]', '12', 'Senior managers\r\n	', 10),
('isco[10]', '121', 'Directors and chief executives\r\n	', 11),
('isco[11]', '1210', 'Directors and chief executives\r\n	', 12),
('isco[12]', '122', 'Production and operations department managers\r\n	', 13),
('isco[13]', '1221', 'Production and operations department managers in agriculture,hunting forestry and fishing\r\n	', 14),
('isco[14]', '1222', 'Production and operations department managers in manufacturing\r\n	', 15),
('isco[15]', '1223', 'Production and operations department managers in construction\r\n	', 16),
('isco[16]', '1224', 'Production and operations department managers in wholesale and retail trade\r\n	', 17),
('isco[17]', '1225', 'Production and operations department managers in restaurants and hotels\r\n	', 18),
('isco[18]', '1226', 'Production and operations department managers in transport,storage and communications\r\n	', 19),
('isco[19]', '1227', 'Production and operations department managers in business services\r\n	', 20),
('isco[20]', '1228', 'Production and operations department managers in personal care,cleaning and related services\r\n	', 21),
('isco[21]', '1229', 'Production and operations department managers not elsewhere classified\r\n	', 22),
('isco[22]', '123', 'Other department managers\r\n	', 23),
('isco[23]', '1231', 'Finance and administration department managers\r\n	', 24),
('isco[24]', '1232', 'Personnel and industrial relations department managers\r\n	', 25),
('isco[25]', '1233', 'Sales and marketing department managers\r\n	', 26),
('isco[26]', '1234', 'Advertising and public relations department managers\r\n	', 27),
('isco[27]', '1235', 'Supply and distribution department managers\r\n	', 28),
('isco[28]', '1236', 'Computing services department managers\r\n	', 29),
('isco[29]', '1237', 'Research and development department managers\r\n	', 30),
('isco[30]', '1239', 'Other department managers not elsewhere classified\r\n	', 31),
('isco[31]', '13', 'General managers\r\n	', 32),
('isco[32]', '131', 'General managers\r\n	', 33),
('isco[33]', '1311', 'General managers in agriculture. hunting forestry and fishing\r\n	', 34),
('isco[34]', '1312', 'General managers in manufacturing\r\n	', 35),
('isco[35]', '1313', 'General managers in construction\r\n	', 36),
('isco[36]', '1314', 'General managers in wholesale and retail trade\r\n	', 37),
('isco[37]', '1315', 'General managers of restaurants and hotels\r\n	', 38),
('isco[38]', '1316', 'General managers in transport storage and communications\r\n	', 39),
('isco[39]', '1317', 'General managers of business services\r\n	', 40),
('isco[40]', '1318', 'General managers in personal care,cleaning and related services\r\n	', 41),
('isco[41]', '1319', 'General managers not elsewhere classified\r\n	', 42),
('isco[42]', '21', 'Computing,engineering and science professionals\r\n	', 43),
('isco[43]', '211', 'Physicists,chemists and related professionals\r\n	', 44),
('isco[44]', '2111', 'Physicists and astronomers\r\n	', 45),
('isco[45]', '2112', 'Meteorologists\r\n	', 46),
('isco[46]', '2113', 'Chemists\r\n	', 47),
('isco[47]', '2114', 'Geologists and geophysicists\r\n	', 48),
('isco[48]', '212', 'Mathematicians,statisticians and related professionals\r\n	', 49),
('isco[49]', '2121', 'Mathematicians and related professionals\r\n	', 50),
('isco[50]', '2122', 'Statisticians\r\n	', 51),
('isco[51]', '213', 'Computing professionals\r\n	', 52),
('isco[52]', '2131', 'Computer systems designers and analysts\r\n	', 53),
('isco[53]', '2132', 'Computer programmers\r\n	', 54),
('isco[54]', '2139', 'Computing professionals not elsewhere classified\r\n	', 55),
('isco[55]', '214', 'Architects,engineers and related professionals\r\n	', 56),
('isco[56]', '2141', 'Architects. town and traffic planners\r\n	', 57),
('isco[57]', '2142', 'Civil engineers\r\n	', 58),
('isco[58]', '2143', 'Electrical engineers\r\n	', 59),
('isco[59]', '2144', 'Electronics and telecommunications engineers\r\n	', 60),
('isco[60]', '2145', 'Mechanical engineers\r\n	', 61),
('isco[61]', '2146', 'Chemical engineers\r\n	', 62),
('isco[62]', '2147', 'Mining engineers. metallurgists and related professionals\r\n	', 63),
('isco[63]', '2148', 'Cartographers and surveyors\r\n	', 64),
('isco[64]', '2149', 'Architects. engineers and related professionals not elsewhere classified\r\n	', 65),
('isco[65]', '22', 'Healthcare and life science professionals\r\n	', 66),
('isco[66]', '221', 'Life science professionals\r\n	', 67),
('isco[67]', '2211', 'Biologists,botanists,zoologists and related professionals\r\n	', 68),
('isco[68]', '2212', 'Pharmacologists. pathologists and related professionals\r\n	', 69),
('isco[69]', '2213', 'Agronomists and related professionals\r\n	', 70),
('isco[70]', '222', 'Health professionals (except nursing)\r\n	', 71),
('isco[71]', '2221', 'Medical doctors\r\n	', 72),
('isco[72]', '2222', 'Dentists\r\n	', 73),
('isco[73]', '2223', 'Veterinarians\r\n	', 74),
('isco[74]', '2224', 'Pharmacists\r\n	', 75),
('isco[75]', '2229', 'Health professionals (except nursing) not elsewhere classified\r\n	', 76),
('isco[76]', '223', 'Nursing and midwifery professionals\r\n	', 77),
('isco[77]', '2230', 'Nursing and midwifery professionals\r\n	', 78),
('isco[78]', '23', 'Teaching professionals\r\n	', 79),
('isco[79]', '231', 'College,university and higher education teaching professionals\r\n	', 80),
('isco[80]', '2310', 'College,university and higher education teaching professionals\r\n	', 81),
('isco[81]', '232', 'Secondary education teaching professionals\r\n	', 82),
('isco[82]', '2320', 'Secondary education teaching professionals\r\n	', 83),
('isco[83]', '233', 'Primary and pre-primary education teaching professionals\r\n	', 84),
('isco[84]', '2331', 'Primary education teaching professionals\r\n	', 85),
('isco[85]', '2332', 'Pre-primary education teaching professional\r\n	', 86),
('isco[86]', '234', 'Special education teaching professionals\r\n	', 87),
('isco[87]', '2340', 'Special education teaching professionals\r\n	', 88),
('isco[88]', '235', 'Other teaching professionals\r\n	', 89),
('isco[89]', '2351', 'Education methods specialists\r\n	', 90),
('isco[90]', '2352', 'School inspectors\r\n	', 91),
('isco[91]', '2359', 'Other teaching professionals not elsewhere classified\r\n	', 92),
('isco[92]', '24', 'Accounting,legal,social science and artistic professionals\r\n	', 93),
('isco[93]', '241', 'Business professionals\r\n	', 94),
('isco[94]', '2411', 'Accountants\r\n	', 95),
('isco[95]', '2412', 'Personnel and careers professionals\r\n	', 96),
('isco[96]', '2419', 'Business professionals not elsewhere classified\r\n	', 97),
('isco[97]', '242', 'Legal professionals\r\n	', 98),
('isco[98]', '2421', 'Lawyers\r\n	', 99),
('isco[99]', '2422', 'Judges\r\n	', 100),
('isco[100]', '2429', 'Legal professionals not elsewhere classified\r\n	', 101),
('isco[101]', '243', 'Archivists,librarians and related information professionals\r\n	', 102),
('isco[102]', '2431', 'Archivists and curators\r\n	', 103),
('isco[103]', '2432', 'Librarians and related information professionals\r\n	', 104),
('isco[104]', '244', 'Social science and related professionals\r\n	', 105),
('isco[105]', '2441', 'Economists\r\n	', 106),
('isco[106]', '2442', 'Sociologists. anthropologists and related professionals\r\n	', 107),
('isco[107]', '2443', 'Philosophers,historians and political scientists\r\n	', 108),
('isco[108]', '2444', 'Philologists translators and interpreters\r\n	', 109),
('isco[109]', '2445', 'Psychologists\r\n	', 110),
('isco[110]', '2446', 'Social work professionals\r\n	', 111),
('isco[111]', '245', 'Writers and creative or performing artists\r\n	', 112),
('isco[112]', '2451', 'Authors,journalists and other writers\r\n	', 113),
('isco[113]', '2452', 'Sculptors. painters and related artists\r\n	', 114),
('isco[114]', '2453', 'Composers. musicians and singers\r\n	', 115),
('isco[115]', '2454', 'Choreographers and dancers\r\n	', 116),
('isco[116]', '2455', 'Film,stage and related actors and directors\r\n	', 117),
('isco[117]', '246', 'Religious professionals\r\n	', 118),
('isco[118]', '2460', 'Religious professionals\r\n	', 119),
('isco[119]', '31', 'Computing,engineering and science associate professionals\r\n	', 120),
('isco[120]', '311', 'Physical and engineering science technicians\r\n	', 121),
('isco[121]', '3111', 'Chemical and physical science technicians\r\n	', 122),
('isco[122]', '3112', 'Civil engineering technicians\r\n	', 123),
('isco[123]', '3113', 'Electrical engineering technicians\r\n	', 124),
('isco[124]', '3114', 'Electronics and telecommunications engineering technicians\r\n	', 125),
('isco[125]', '3115', 'Mechanical engineering technicians\r\n	', 126),
('isco[126]', '3116', 'Chemical engineering technicians\r\n	', 127),
('isco[127]', '3117', 'Mining and metallurgical technicians\r\n	', 128),
('isco[128]', '3118', 'Draughts persons\r\n	', 129),
('isco[129]', '3119', 'Physical and engineering science technicians not elsewhere classified\r\n	', 130),
('isco[130]', '312', 'Computer associate professionals\r\n	', 131),
('isco[131]', '3121', 'Computer assistants\r\n	', 132),
('isco[132]', '3122', 'Computer equipment operators\r\n	', 133),
('isco[133]', '3123', 'Industrial robot controllers.\r\n	', 134),
('isco[134]', '313', 'Optical and electronic equipment operators\r\n	', 135),
('isco[135]', '3131', 'Photographers and image and sound recording equipment operators\r\n	', 136),
('isco[136]', '3132', 'Broadcasting and telecommunications equipment operators\r\n	', 137),
('isco[137]', '3133', 'Medical equipment operators\r\n	', 138),
('isco[138]', '3139', 'Optical and electronic equipment operators not elsewhere classified\r\n	', 139),
('isco[139]', '314', 'Ship and aircraft controllers and technicians\r\n	', 140),
('isco[140]', '3141', 'Ships engineers\r\n	', 141),
('isco[141]', '3142', 'Ships deck officers and pilots\r\n	', 142),
('isco[142]', '3143', 'Aircraft pilots and related associate professionals\r\n	', 143),
('isco[143]', '3144', 'Air traffic controllers\r\n	', 144),
('isco[144]', '3145', 'Air traffic safety technicians\r\n	', 145),
('isco[145]', '315', 'Safety and quality inspectors\r\n	', 146),
('isco[146]', '3151', 'Building and fire inspectors\r\n	', 147),
('isco[147]', '3152', 'Quality control\r\n	', 148),
('isco[148]', '32', 'Healthcare and life science associate professionals\r\n	', 149),
('isco[149]', '321', 'Life science technicians and related associate professionals\r\n	', 150),
('isco[150]', '3211', 'Life science technicians\r\n	', 151),
('isco[151]', '3212', 'Agronomy and forestry technicians\r\n	', 152),
('isco[152]', '3213', 'Farming and forestry advisers\r\n	', 153),
('isco[153]', '322', 'Modern health associate professionals (except nursing)\r\n	', 154),
('isco[154]', '3221', 'Medical assistants\r\n	', 155),
('isco[155]', '3222', 'Sanitarians\r\n	', 156),
('isco[156]', '3223', 'Dieticians and nutritionists\r\n	', 157),
('isco[157]', '3224', 'Optometrists and opticians\r\n	', 158),
('isco[158]', '3225', 'Dental assistants\r\n	', 159),
('isco[159]', '3226', 'Physiotherapists and related associate professionals\r\n	', 160),
('isco[160]', '3227', 'Veterinary assistants\r\n	', 161),
('isco[161]', '3228', 'Pharmaceutical assistants\r\n	', 162),
('isco[162]', '3229', 'Modern health associate professionals (except nursing) not elsewhere classified\r\n	', 163),
('isco[163]', '323', 'Nursing and midwifery associate professionals\r\n	', 164),
('isco[164]', '3231', 'Nursing associate professionals\r\n	', 165),
('isco[165]', '3232', 'Midwifery associate professionals\r\n	', 166),
('isco[166]', '324', 'Traditional medicine practitioners and faith healers\r\n	', 167),
('isco[167]', '3241', 'Traditional medicine practitioners\r\n	', 168),
('isco[168]', '3242', 'Faith healers\r\n	', 169),
('isco[169]', '33', 'Teaching associate professionals\r\n	', 170),
('isco[170]', '331', 'Primary education teaching associate professionals\r\n	', 171),
('isco[171]', '3310', 'Primary education teaching associate professionals\r\n	', 172),
('isco[172]', '332', 'Pre-primary education teaching associate professionals\r\n	', 173),
('isco[173]', '3320', 'Pre-primary education teaching associate professionals\r\n	', 174),
('isco[174]', '333', 'Special education teaching associate professionals\r\n	', 175),
('isco[175]', '3330', 'Special education teaching associate professionals\r\n	', 176),
('isco[176]', '334', 'Other teaching associate professionals\r\n	', 177),
('isco[177]', '3340', 'Other teaching associate professionals\r\n	', 178),
('isco[178]', '34', 'Finance,sales and administrative associate professionals\r\n	', 179),
('isco[179]', '341', 'Finance and sales associate professionals\r\n	', 180),
('isco[180]', '3411', 'Securities and finance dealers and brokers\r\n	', 181),
('isco[181]', '3412', 'Insurance representatives\r\n	', 182),
('isco[182]', '3413', 'Estate agents\r\n	', 183),
('isco[183]', '3414', 'Travel consultants and organisers\r\n	', 184),
('isco[184]', '3415', 'Technical and commercial sales representatives\r\n	', 185),
('isco[185]', '3416', 'Buyers\r\n	', 186),
('isco[186]', '3417', 'Appraisers valuers and auctioneers\r\n	', 187),
('isco[187]', '3419', 'Finance and sales associate professionals not elsewhere classified\r\n	', 188),
('isco[188]', '342', 'Business services agents and trade brokers\r\n	', 189),
('isco[189]', '3421', 'Trade brokers\r\n	', 190),
('isco[190]', '3422', 'Clearing and forwarding agents\r\n	', 191),
('isco[191]', '3423', 'Employment agents and labour contractors\r\n	', 192),
('isco[192]', '3429', 'Business services agents and trade broke not elsewhere classified\r\n	', 193),
('isco[193]', '343', 'Administrative associate professionals\r\n	', 194),
('isco[194]', '3431', 'Administrative secretaries and related associate professionals\r\n	', 195),
('isco[195]', '3432', 'Legal and related business associate professionals\r\n	', 196),
('isco[196]', '3433', 'Bookkeepers\r\n	', 197),
('isco[197]', '3434', 'Statistical. mathematical and related associate professionals\r\n	', 198),
('isco[198]', '3439', 'Administrative associate professionals not elsewhere classified\r\n	', 199),
('isco[199]', '344', 'Customs,tax and related government associate professionals\r\n	', 200),
('isco[200]', '3441', 'Customs and border inspectors\r\n	', 201),
('isco[201]', '3442', 'Government tax and excise officials\r\n	', 202),
('isco[202]', '3443', 'Government social benefits officials\r\n	', 203),
('isco[203]', '3444', 'Government licensing officials\r\n	', 204),
('isco[204]', '3449', 'Customs,tax and related government associate professionals not elsewhere classified\r\n	', 205),
('isco[205]', '345', 'Police inspectors and detective\r\n	', 206),
('isco[206]', '3450', 'Police inspectors and detectives\r\n	', 207),
('isco[207]', '346', 'Social work associate professionals\r\n	', 208),
('isco[208]', '3460', 'Social work associate professionals\r\n	', 209),
('isco[209]', '347', 'Artistic,entertainment and sport associate professionals\r\n	', 210),
('isco[210]', '3471', 'Decorators and commercial designers\r\n	', 211),
('isco[211]', '3472', 'Radio,television and other announcers\r\n	', 212),
('isco[212]', '3473', 'Street, night-club and related musicians,singers and dancers\r\n	', 213),
('isco[213]', '3474', 'Clowns, magicians,acrobats and related associate professionals\r\n	', 214),
('isco[214]', '3475', 'Athletes, sports persons and related associate professionals\r\n	', 215),
('isco[215]', '348', 'Religious associate professionals\r\n	', 216),
('isco[216]', '3480', 'Religious associate professionals\r\n	', 217),
('isco[217]', '41', 'Office staff\r\n	', 218),
('isco[218]', '411', 'Secretaries and keyboard-operating clerks\r\n	', 219),
('isco[219]', '4111', 'Stenographers and typists\r\n	', 220),
('isco[220]', '4112', 'Word-processor and related operators\r\n	', 221),
('isco[221]', '4113', 'Data entry operators\r\n	', 222),
('isco[222]', '4114', 'Calculating-machine operators\r\n	', 223),
('isco[223]', '4115', 'Secretaries\r\n	', 224),
('isco[224]', '412', 'Numerical clerks\r\n	', 225),
('isco[225]', '4121', 'Accounting and bookkeeping clerks\r\n	', 226),
('isco[226]', '4122', 'Statistical and finance clerks\r\n	', 227),
('isco[227]', '413', 'Material-recording and transport clerks\r\n	', 228),
('isco[228]', '4131', 'Stock clerks\r\n	', 229),
('isco[229]', '4132', 'Production clerks\r\n	', 230),
('isco[230]', '4133', 'Transport clerks\r\n	', 231),
('isco[231]', '414', 'Library,mail and related clerks\r\n	', 232),
('isco[232]', '4141', 'Library and filing clerks\r\n	', 233),
('isco[233]', '4142', 'Mail carriers and sorting clerks\r\n	', 234),
('isco[234]', '4143', 'Coding,proof-reading and related clerks\r\n	', 235),
('isco[235]', '4144', 'Scribes and related workers\r\n	', 236),
('isco[236]', '419', 'Other office clerks\r\n	', 237),
('isco[237]', '4190', 'Other office clerks\r\n	', 238),
('isco[238]', '42', 'Customer service staff\r\n	', 239),
('isco[239]', '421', 'Cashiers,tellers and related clerks\r\n	', 240),
('isco[240]', '4211', 'Cashiers and ticket clerks\r\n	', 241),
('isco[241]', '4212', 'Tellers and other counter clerks\r\n	', 242),
('isco[242]', '4213', 'Bookmakers and croupiers\r\n	', 243),
('isco[243]', '4214', 'Pawnbrokers and money-lenders\r\n	', 244),
('isco[244]', '4215', 'Debt-collectors and related workers\r\n	', 245),
('isco[245]', '422', 'Client information clerks\r\n	', 246),
('isco[246]', '4221', 'Travel agency and related clerks\r\n	', 247),
('isco[247]', '4222', 'Receptionists and information clerks\r\n	', 248),
('isco[248]', '4223', 'Telephone switchboard operators\r\n	', 249),
('isco[249]', '51', 'Hotel,catering and personal services staff\r\n	', 250),
('isco[250]', '511', 'Travel attendants and related workers\r\n	', 251),
('isco[251]', '5111', 'Travel attendants and travel stewards\r\n	', 252),
('isco[252]', '5112', 'Transport conductors\r\n	', 253),
('isco[253]', '5113', 'Travel guides\r\n	', 254),
('isco[254]', '512', 'Housekeeping and restaurant services workers\r\n	', 255),
('isco[255]', '5121', 'Housekeepers and related workers\r\n	', 256),
('isco[256]', '5122', 'Cooks\r\n	', 257),
('isco[257]', '5123', 'Waiters,waitresses and bartenders\r\n	', 258),
('isco[258]', '513', 'Personal care and related workers\r\n	', 259),
('isco[259]', '5131', 'Child-care workers\r\n	', 260),
('isco[260]', '5132', 'Institution-based personal care workers\r\n	', 261),
('isco[261]', '5133', 'Home-based personal care workers\r\n	', 262),
('isco[262]', '5139', 'Personal care and related workers not elsewhere classified\r\n	', 263),
('isco[263]', '514', 'Other personal services workers\r\n	', 264),
('isco[264]', '5141', 'Hairdressers barbers,beauticians and related workers\r\n	', 265),
('isco[265]', '5142', 'Companions and valets\r\n	', 266),
('isco[266]', '5143', 'Undertakers and embalmers\r\n	', 267),
('isco[267]', '5149', 'Other personal services workers not elsewhere classified\r\n	', 268),
('isco[268]', '515', 'Astrologers,fortune-tellers and related workers\r\n	', 269),
('isco[269]', '5151', 'Astrologers and related workers\r\n	', 270),
('isco[270]', '5152', 'Fortune-tellers palmists and related workers\r\n	', 271),
('isco[271]', '516', 'Protective services workers\r\n	', 272),
('isco[272]', '5161', 'Fire-fighters\r\n	', 273),
('isco[273]', '5162', 'Police officers\r\n	', 274),
('isco[274]', '5163', 'Prison guards\r\n	', 275),
('isco[275]', '5169', 'Protective services workers not elsewhere classified\r\n	', 276),
('isco[276]', '52', 'Sales staff and fashion work\r\n	', 277),
('isco[277]', '521', 'Fashion and other models\r\n	', 278),
('isco[278]', '5210', 'Fashion and other models\r\n	', 279),
('isco[279]', '522', 'Shop sales persons and demonstrators\r\n	', 280),
('isco[280]', '5220', 'Shop sales persons and demonstrators\r\n	', 281),
('isco[281]', '523', 'Stall and market sales persons\r\n	', 282),
('isco[282]', '5230', 'Stall and market sales persons\r\n	', 283),
('isco[283]', '61', 'Skilled agricultural,fishery and forestry workers\r\n	', 284),
('isco[284]', '611', 'Market gardeners and crop growers\r\n	', 285),
('isco[285]', '6111', 'Field crop and vegetable growers\r\n	', 286),
('isco[286]', '6112', 'Tree and shrub crop growers\r\n	', 287),
('isco[287]', '6113', 'Gardeners horticultural and nursery growers\r\n	', 288),
('isco[288]', '6114', 'Mixed-crop growers\r\n	', 289),
('isco[289]', '612', 'Market-oriented animal producers and related workers\r\n	', 290),
('isco[290]', '6121', 'Dairy and livestock producers\r\n	', 291),
('isco[291]', '6122', 'Poultry producers\r\n	', 292),
('isco[292]', '6123', 'Apiarists and sericulturists\r\n	', 293),
('isco[293]', '6124', 'Mixed-animal producers\r\n	', 294),
('isco[294]', '6129', 'Market-oriented animal producers and related workers not elsewhere classified\r\n	', 295),
('isco[295]', '613', 'Market-oriented crop and animal producers\r\n	', 296),
('isco[296]', '6130', 'Market-oriented crop and animal producers\r\n	', 297),
('isco[297]', '614', 'Forestry and related workers\r\n	', 298),
('isco[298]', '6141', 'Forestry workers and loggers\r\n	', 299),
('isco[299]', '6142', 'Charcoal burners and related workers\r\n	', 300),
('isco[300]', '615', 'Fishery workers,hunters and trappers\r\n	', 301),
('isco[301]', '6151', 'Aquatic-life cultivation workers\r\n	', 302),
('isco[302]', '6152', 'Inland and coastal waters fishery workers\r\n	', 303),
('isco[303]', '6153', 'Deep-sea fishery workers\r\n	', 304),
('isco[304]', '6154', 'Hunters and trappers\r\n	', 305),
('isco[305]', '62', 'Subsistence agricultural and fishery workers\r\n	', 306),
('isco[306]', '621', 'Subsistence agricultural and fishery workers\r\n	', 307),
('isco[307]', '6210', 'Subsistence agricultural and fishery workers\r\n	', 308),
('isco[308]', '71', 'Construction,mining and quarrying workers\r\n	', 309),
('isco[309]', '711', 'Miners,shotfirers,stone cutters and carvers\r\n	', 310),
('isco[310]', '7111', 'Miners and quarry workers\r\n	', 311),
('isco[311]', '7112', 'Shotfirers and blasters\r\n	', 312),
('isco[312]', '7113', 'Stone splitters, cutters and carvers\r\n	', 313),
('isco[313]', '712', 'Building frame and related trades workers\r\n	', 314),
('isco[314]', '7121', 'Builders, traditional materials\r\n	', 315),
('isco[315]', '7122', 'Bricklayers and stonemasons\r\n	', 316),
('isco[316]', '7123', 'Concrete placers, concrete finishers and related workers\r\n	', 317),
('isco[317]', '7124', 'Carpenters and joiners\r\n	', 318),
('isco[318]', '7129', 'Building frame and related trades workers not elsewhere classified\r\n	', 319),
('isco[319]', '713', 'Building finishers and related trades workers\r\n	', 320),
('isco[320]', '7131', 'Roofers\r\n	', 321),
('isco[321]', '7132', 'Floor layers and tile setters\r\n	', 322),
('isco[322]', '7133', 'Plasterers\r\n	', 323),
('isco[323]', '7134', 'Insulation workers\r\n	', 324),
('isco[324]', '7135', 'Glaziers\r\n	', 325),
('isco[325]', '7136', 'Plumbers and pipe fitters\r\n	', 326),
('isco[326]', '7137', 'Building and related electricians\r\n	', 327),
('isco[327]', '714', 'Painters,building structure cleaners and related trades workers\r\n	', 328),
('isco[328]', '7141', 'Painters and related workers\r\n	', 329),
('isco[329]', '7142', 'Varnishers and related painters\r\n	', 330),
('isco[330]', '7143', 'Building structure cleaners\r\n	', 331),
('isco[331]', '72', 'Metal,machinery and electronic equipment workers\r\n	', 332),
('isco[332]', '721', 'Metal moulders,welders,sheet-metal workers,structural-metal preparers,and related trades worker...\r\n	', 333),
('isco[333]', '7211', 'Metal moulders and coremakers\r\n	', 334),
('isco[334]', '7212', 'Welders and flamecutters\r\n	', 335),
('isco[335]', '7213', 'Sheet-metal workers\r\n	', 336),
('isco[336]', '7214', 'Structural-metal preparers and erectors\r\n	', 337),
('isco[337]', '7215', 'Riggers and cable splicers\r\n	', 338),
('isco[338]', '7216', 'Underwater workers\r\n	', 339),
('isco[339]', '722', 'Blacksmiths,tool-makers and related trades workers\r\n	', 340),
('isco[340]', '7221', 'Blacksmiths, hammer-smiths and forging-press workers\r\n	', 341),
('isco[341]', '7222', 'Tool-makers and related workers\r\n	', 342),
('isco[342]', '7223', 'Machine-tool setters and setter-operators\r\n	', 343),
('isco[343]', '7224', 'Metal wheel-grinders,polishers and tool sharpeners\r\n	', 344),
('isco[344]', '723', 'Machinery mechanics and fitters\r\n	', 345),
('isco[345]', '7231', 'Motor vehicle mechanics and fitters\r\n	', 346),
('isco[346]', '7232', 'Aircraft engine mechanics and fitters\r\n	', 347),
('isco[347]', '7233', 'Agricultural- or industrial-machinery mechanics and fitters\r\n	', 348),
('isco[348]', '724', 'Electrical and electronic equipment mechanics and fitters\r\n	', 349),
('isco[349]', '7241', 'Electrical mechanics and fitters\r\n	', 350),
('isco[350]', '7242', 'Electronics fitters\r\n	', 351),
('isco[351]', '7243', 'Electronics mechanics and servicers\r\n	', 352),
('isco[352]', '7244', 'Telegraph and telephone installers and servicers\r\n	', 353),
('isco[353]', '7245', 'Electrical line installers,repairers and cable jointers\r\n	', 354),
('isco[354]', '73', 'Precision,handicraft,printing and related trades workers\r\n	', 355),
('isco[355]', '731', 'Precision workers in metal and related materials\r\n	', 356),
('isco[356]', '7311', 'Precision-instrument makers and repairers\r\n	', 357),
('isco[357]', '7312', 'Musical-instrument makers and tuners\r\n	', 358),
('isco[358]', '7313', 'Jewellery and precious-metal workers\r\n	', 359),
('isco[359]', '732', 'Potters,glass-makers and related trades workers\r\n	', 360),
('isco[360]', '7321', 'Abrasive wheel formers, potters and related workers\r\n	', 361),
('isco[361]', '7322', 'Glass-makers, cutters, grinders and finishers\r\n	', 362),
('isco[362]', '7323', 'Glass engravers and etchers\r\n	', 363),
('isco[363]', '7324', 'Glass, ceramics and related decorative painters\r\n	', 364),
('isco[364]', '733', 'Handicraftworkers in wood,textile,leather and related materials\r\n	', 365),
('isco[365]', '7331', 'Handicraftworkers in wood and related materials\r\n	', 366),
('isco[366]', '7332', 'Handicraft workers in textile,leather and related materials\r\n	', 367),
('isco[367]', '734', 'Printing and related trades workers\r\n	', 368),
('isco[368]', '7341', 'Compositors, typesetters and related workers\r\n	', 369),
('isco[369]', '7342', 'Stereotypers and electrotypers\r\n	', 370),
('isco[370]', '7343', 'Printing engravers and etchers\r\n	', 371),
('isco[371]', '7344', 'Photographic and related workers\r\n	', 372),
('isco[372]', '7345', 'Bookbinders and related workers\r\n	', 373),
('isco[373]', '7346', 'Silk-screen. block and textile printers\r\n	', 374),
('isco[374]', '74', 'Other craft and related trades workers\r\n	', 375),
('isco[375]', '741', 'Food processing and related trades workers\r\n	', 376),
('isco[376]', '7411', 'Butchers,fishmongers and related food preparers\r\n	', 377),
('isco[377]', '7412', 'Bakers, pastry-cooks and confectionery makers\r\n	', 378),
('isco[378]', '7413', 'Dairy-products makers\r\n	', 379),
('isco[379]', '7414', 'Fruit,vegetable and related preservers\r\n	', 380),
('isco[380]', '7415', 'Food and beverage tasters and graders\r\n	', 381),
('isco[381]', '7416', 'Tobacco preparers and tobacco products makers\r\n	', 382),
('isco[382]', '742', 'Wood treaters,cabinet-makers and related trades workers\r\n	', 383),
('isco[383]', '7421', 'Woodtreaters\r\n	', 384),
('isco[384]', '7422', 'Cabinet-makers and related workers\r\n	', 385),
('isco[385]', '7423', 'Woodworking-machine setters and setter-operators\r\n	', 386),
('isco[386]', '7424', 'Basketry weavers,brush makers and related workers\r\n	', 387),
('isco[387]', '743', 'Textile,garment and related trades workers\r\n	', 388),
('isco[388]', '7431', 'Fibre preparers\r\n	', 389),
('isco[389]', '7432', 'Weavers,knitters and related workers\r\n	', 390),
('isco[390]', '7433', 'Tailors,dressmakers and hatters\r\n	', 391),
('isco[391]', '7434', 'Furriers and related workers\r\n	', 392),
('isco[392]', '7435', 'Textile,leather and related pattern-makers and cutters\r\n	', 393),
('isco[393]', '7436', 'Sewers,embroiderers and related workers\r\n	', 394),
('isco[394]', '7437', 'Upholsterers and related workers\r\n	', 395),
('isco[395]', '744', 'Pelt,leather and shoemaking trades workers\r\n	', 396),
('isco[396]', '7441', 'Pelt dressers,tanners and fell mongers\r\n	', 397),
('isco[397]', '7442', 'Shoe-makers and related workers\r\n	', 398),
('isco[398]', '81', 'Stationary-plant and related operators\r\n	', 399),
('isco[399]', '811', 'Mining- and mineral-processing-plant operators\r\n	', 400),
('isco[400]', '8111', 'Mining-plant operators\r\n	', 401),
('isco[401]', '8112', 'Mineral-ore- and stone-processing-plant operators\r\n	', 402),
('isco[402]', '8113', 'Well drillers and borers and related workers\r\n	', 403),
('isco[403]', '812', 'Metal-processing-plant operators\r\n	', 404),
('isco[404]', '8121', 'Ore and metal furnace operators\r\n	', 405),
('isco[405]', '8122', 'Metal melters,casters and rolling-mill operators\r\n	', 406),
('isco[406]', '8123', 'Metal-heat-treating-plant operators\r\n	', 407),
('isco[407]', '8124', 'Metal drawers and extruders\r\n	', 408),
('isco[408]', '813', 'Glass,ceramics and related plant operators\r\n	', 409),
('isco[409]', '8131', 'Glass and ceramics kiln and related machine operators\r\n	', 410),
('isco[410]', '8139', 'Glass, ceramics and related plant operators not elsewhere classified\r\n	', 411),
('isco[411]', '814', 'Wood-processing- and papermaking-plant operators\r\n	', 412),
('isco[412]', '8141', 'Wood-processing-plant operators\r\n	', 413),
('isco[413]', '8142', 'Paper-pulp plant operators\r\n	', 414),
('isco[414]', '8143', 'Papermaking-plant operators\r\n	', 415),
('isco[415]', '815', 'Chemical-processing-plant operators\r\n	', 416),
('isco[416]', '8151', 'Crushing-. grinding- and chemical-mixing machinery operators\r\n	', 417),
('isco[417]', '8152', 'Chemical-heat-treating-plant operators\r\n	', 418),
('isco[418]', '8153', 'Chemical-filtering- and separating-equipment operators\r\n	', 419),
('isco[419]', '8154', 'Chemical-still and reactor operators (except petroleum and natural gas)\r\n	', 420),
('isco[420]', '8155', 'Petroleum- and natural-gas-refining-plant operators\r\n	', 421),
('isco[421]', '8159', 'Chemical-processing-plant operators n elsewhere classified\r\n	', 422),
('isco[422]', '816', 'Power-production and related plant operators\r\n	', 423),
('isco[423]', '8161', 'Power-production plant operators\r\n	', 424),
('isco[424]', '8162', 'Steam-engine and boiler operators\r\n	', 425),
('isco[425]', '8163', 'Incinerator,water-treatment and related plant operators\r\n	', 426),
('isco[426]', '817', 'Automated-assembly-line and industrial-robot operators\r\n	', 427),
('isco[427]', '8171', 'Automated-assembly-line operators\r\n	', 428),
('isco[428]', '8172', 'Industrial-robot operators\r\n	', 429),
('isco[429]', '82', 'Machine operators and assemblers\r\n	', 430),
('isco[430]', '821', 'Metal- and mineral-products machine operators\r\n	', 431),
('isco[431]', '8211', 'Machine-tool operators\r\n	', 432),
('isco[432]', '8212', 'Cement and other mineral products machine operators\r\n	', 433),
('isco[433]', '822', 'Chemical-products machine operators\r\n	', 434),
('isco[434]', '8221', 'Pharmaceutical- and toiletry-products machine operators\r\n	', 435),
('isco[435]', '8222', 'Ammunition- and explosive-products machine operators\r\n	', 436),
('isco[436]', '8223', 'Metal finishing-,plating- and coating-machine operators\r\n	', 437),
('isco[437]', '8224', 'Photographic-products machine operators\r\n	', 438),
('isco[438]', '8229', 'Chemical-products machine operators not elsewhere classified\r\n	', 439),
('isco[439]', '823', 'Rubber- and plastic-products machine operators\r\n	', 440),
('isco[440]', '8231', 'Rubber-products machine operators\r\n	', 441),
('isco[441]', '8232', 'Plastic-products machine operators\r\n	', 442),
('isco[442]', '824', 'Wood-products machine operators\r\n	', 443),
('isco[443]', '8240', 'Wood-products machine operators\r\n	', 444),
('isco[444]', '825', 'Printing-,binding- and paper-products machine operators\r\n	', 445),
('isco[445]', '8251', 'Printing-machine operators\r\n	', 446),
('isco[446]', '8252', 'Bookbinding-machine operators\r\n	', 447),
('isco[447]', '8253', 'Paper-products machine operators\r\n	', 448),
('isco[448]', '826', 'Textile-,fur- and leather-products machine operators\r\n	', 449),
('isco[449]', '8261', 'Fibre-preparing-,spinning- and winding-machine operators\r\n	', 450),
('isco[450]', '8262', 'Weaving- and knitting-machine operators\r\n	', 451),
('isco[451]', '8263', 'Sewing-machine operators\r\n	', 452),
('isco[452]', '8264', 'Bleaching-,dyeing- and cleaning-machine operators\r\n	', 453),
('isco[453]', '8265', 'Fur- and leather-preparing-machine operators\r\n	', 454),
('isco[454]', '8266', 'Shoemaking- and related machine operators\r\n	', 455),
('isco[455]', '8269', 'Textile-,fur- and leather-products machine operators not elsewhere classified\r\n	', 456),
('isco[456]', '827', 'Food and related products machine operators\r\n	', 457),
('isco[457]', '8271', 'Meat- and fish-processing-machine operators\r\n	', 458),
('isco[458]', '8272', 'Dairy-products machine operators\r\n	', 459),
('isco[459]', '8273', 'Grain- and spice-milling-machine operators\r\n	', 460),
('isco[460]', '8274', 'Baked-goods,cereal and chocolate-products machine operators\r\n	', 461),
('isco[461]', '8275', 'Fruit-,vegetable- and nut-processing-machine operators\r\n	', 462),
('isco[462]', '8276', 'Sugar production machine operators\r\n	', 463),
('isco[463]', '8277', 'Tea-,coffee-,and cocoa-processing-machine operators\r\n	', 464),
('isco[464]', '8278', 'Brewers-,wine and other beverage machine operators\r\n	', 465),
('isco[465]', '8279', 'Tobacco production machine operators\r\n	', 466),
('isco[466]', '828', 'Assemblers\r\n	', 467),
('isco[467]', '8281', 'Mechanical-machinery assemblers\r\n	', 468),
('isco[468]', '8282', 'Electrical-equipment assemblers\r\n	', 469),
('isco[469]', '8283', 'Electronic-equipment assemblers\r\n	', 470),
('isco[470]', '8284', 'Metal-,rubber- and plastic-products assemblers\r\n	', 471),
('isco[471]', '8285', 'Wood and related products assemblers\r\n	', 472),
('isco[472]', '8286', 'Paperboard. textile and related products assemblers\r\n	', 473),
('isco[473]', '829', 'Other machine operators and assemblers\r\n	', 474),
('isco[474]', '8290', 'Other machine operators and assemblers\r\n	', 475),
('isco[475]', '83', 'Drivers and mobile-plant operators\r\n	', 476),
('isco[476]', '831', 'Locomotive-engine drivers and related workers\r\n	', 477),
('isco[477]', '8311', 'Locomotive-engine drivers\r\n	', 478),
('isco[478]', '8312', 'Railway brakers, signallers and shunters\r\n	', 479),
('isco[479]', '832', 'Motor-vehicle drivers\r\n	', 480),
('isco[480]', '8321', 'Motor-cycle drivers\r\n	', 481),
('isco[481]', '8322', 'Car,taxi and van drivers\r\n	', 482),
('isco[482]', '8323', 'Bus and tram drivers\r\n	', 483),
('isco[483]', '8324', 'Heavy truck and lorry drivers\r\n	', 484),
('isco[484]', '833', 'Agricultural and other mobile-plant operators\r\n	', 485),
('isco[485]', '8331', 'Motorised farm and forestry plant operators\r\n	', 486),
('isco[486]', '8332', 'Earth-moving- and related plant operators\r\n	', 487),
('isco[487]', '8333', 'Crane. hoist and related plant operators\r\n	', 488),
('isco[488]', '8334', 'Lifting-truck operators\r\n	', 489),
('isco[489]', '834', 'Ships deck crews and related workers\r\n	', 490),
('isco[490]', '8340', 'Ships deck crews and related workers\r\n	', 491),
('isco[491]', '91', 'Sales,services and cleaning elementary occupations\r\n	', 492),
('isco[492]', '911', 'Street vendors and related workers\r\n	', 493),
('isco[493]', '9111', 'Street food vendors\r\n	', 494),
('isco[494]', '9112', 'Street vendors, non-food products\r\n	', 495),
('isco[495]', '9113', 'Door-to-door and telephone salespersons\r\n	', 496),
('isco[496]', '912', 'Shoe cleaning and other street services elementary occupations\r\n	', 497),
('isco[497]', '9120', 'Shoe cleaning and other street services elementary occupations\r\n	', 498),
('isco[498]', '913', 'Domestic and related helpers,cleaners and launderers\r\n	', 499),
('isco[499]', '9131', 'Domestic helpers and cleaners\r\n	', 500),
('isco[500]', '9132', 'Helpers and cleaners in offices, hotels and other establishments\r\n	', 501),
('isco[501]', '9133', 'Hand-launderers and pressers\r\n	', 502),
('isco[502]', '914', 'Building caretakers,window and related cleaners\r\n	', 503),
('isco[503]', '9141', 'Building caretakers\r\n	', 504),
('isco[504]', '9142', 'Vehicle,window and related cleaners\r\n	', 505),
('isco[505]', '915', 'Messengers,porters,doorkeepers and related workers\r\n	', 506),
('isco[506]', '9151', 'Messengers,package and luggage porters and deliverers\r\n	', 507),
('isco[507]', '9152', 'Doorkeepers, watchpersons and related workers\r\n	', 508),
('isco[508]', '9153', 'Vending-machine money collectors, meter readers and related workers\r\n	', 509),
('isco[509]', '916', 'Garbage collectors and related labourers\r\n	', 510),
('isco[510]', '9161', 'Garbage collectors\r\n	', 511),
('isco[511]', '9162', 'Sweepers and related labourers\r\n	', 512),
('isco[512]', '92', 'Agricultural,fishery and related labourers\r\n	', 513),
('isco[513]', '921', 'Agricultural,fishery and related labourers\r\n	', 514),
('isco[514]', '9211', 'Farm-hands and labourers\r\n	', 515),
('isco[515]', '9212', 'Forestry labourers\r\n	', 516),
('isco[516]', '9213', 'Fishery,hunting and trapping labourers\r\n	', 517),
('isco[517]', '93', 'Labourers in mining,construction,manufacturing and transport\r\n	', 518),
('isco[518]', '931', 'Mining and construction labourers\r\n	', 519),
('isco[519]', '9311', 'Mining and quarrying labourers\r\n	', 520),
('isco[520]', '9312', 'Construction and maintenance labourers roads,dams and similar constructions\r\n	', 521),
('isco[521]', '9313', 'Building construction labourers\r\n	', 522),
('isco[522]', '932', 'Manufacturing labourers\r\n	', 523),
('isco[523]', '9321', 'Assembling labourers\r\n	', 524),
('isco[524]', '9322', 'Hand packers and other manufacturing labourers\r\n	', 525),
('isco[525]', '933', 'Transport labourers and freight handlers\r\n	', 526),
('isco[526]', '9331', 'Hand or pedal vehicle drivers\r\n	', 527),
('isco[527]', '9332', 'Drivers of animal-drawn vehicles and machinery\r\n	', 528),
('isco[528]', '9333', 'Freight handlers', 529);

-- --------------------------------------------------------

--
-- Struttura della tabella `yfej_logging`
--

CREATE TABLE IF NOT EXISTS `yfej_logging` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_date` datetime NOT NULL,
  `severity` int(1) NOT NULL,
  `is_relevant` enum('0','1') NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '-1',
  `username` varchar(20) NOT NULL,
  `request_ip` varchar(15) NOT NULL,
  `success` enum('0','1') NOT NULL,
  `event_description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `yfej_match`
--

CREATE TABLE IF NOT EXISTS `yfej_match` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cv_id` int(11) NOT NULL DEFAULT '0',
  `employer_id` int(11) NOT NULL DEFAULT '0',
  `vacancy_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL DEFAULT '0',
  `interview` char(4) NOT NULL DEFAULT '0000',
  `status` enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '0',
  `post_contract_type` enum('','0','1') NOT NULL,
  `post_employment_form` enum('','0','1') NOT NULL,
  `post_duration` tinyint(4) NOT NULL DEFAULT '0',
  `post_wage` smallint(6) NOT NULL DEFAULT '0',
  `log` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `yfej_match_status`
--

CREATE TABLE IF NOT EXISTS `yfej_match_status` (
  `id` char(1) NOT NULL DEFAULT '',
  `description` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `yfej_match_status`
--

INSERT INTO `yfej_match_status` (`id`, `description`) VALUES
('0', 'Not yet validated'),
('1', 'Validated but not available'),
('2', 'Validated and available'),
('3', 'CV sent to employer'),
('4', 'Sent for interview'),
('5', 'Not employed'),
('6', 'Employed');

-- --------------------------------------------------------

--
-- Struttura della tabella `yfej_questionnaire`
--

CREATE TABLE IF NOT EXISTS `yfej_questionnaire` (
  `code` char(2) NOT NULL DEFAULT '',
  `desc_it` varchar(250) NOT NULL DEFAULT '',
  `desc_en` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `yfej_questionnaire`
--

INSERT INTO `yfej_questionnaire` (`code`, `desc_it`, `desc_en`) VALUES
('c', 'Creatività', 'Creativity'),
('c1', 'Sono aperta/o a nuove prospettive', 'I am open to new approaches'),
('c2', 'Cerco modi nuovi per affrontare le situazioni', 'I look for new ways to face the situations'),
('c3', 'Realizzo modelli alternativi che aiutano anche gli altri ad analizzare le situazioni', 'I create alternative models which help others to analyse the situations'),
('f', 'Flessibilit? e gestione del cambiamento', 'Flexibility and change management'),
('f1', 'Accetto altre proposte e mi adatto ai cambiamenti', 'I accept different proposals and adapt to changes'),
('f2', 'Reagisco in maniera flessibile a cambiamenti improvvisi', 'I react to sudden changes with flexibility'),
('f3', 'Modifico gli obiettivi in funzione delle esigenze che mi circondano', 'I modify the goals according to the needs which surround me'),
('i', 'Iniziativa', 'Initiative'),
('i1', 'Riconosco le opportunit? e agisco per coglierle', 'I identify the opportunities and act to catch them'),
('i2', 'Prendo rapidamente decisioni anche in situazioni di emergenza', 'I take decisions quickly even in emergency situations'),
('i3', 'Metto in atto azioni che anticipano la crisi e creano nuove opportunit', 'I take measures that anticipate the crisis and create new opportunities'),
('n', 'Networking', 'Networking'),
('n1', 'Collaboro in maniera positiva all''interno di un gruppo', 'I collaborate in a positive way within a group'),
('n2', 'Condivido le informazioni con gli altri per raggiungere un obiettivo', 'I share information with others to accomplish a goal'),
('n3', 'Promuovo iniziative che migliorano la collaborazione', 'I promote initiatives which improve collaboration'),
('o', 'Orientamento al cliente', 'Customer orientation'),
('o1', 'Mantengo una comunicazione efficace e soddisfacente', 'I keep effective and satisfactory communication'),
('o2', 'Comprendo le reali esigenze del cliente', 'I understand the real needs of a customer'),
('o3', 'Propongo soluzioni diverse e intervengo nel momento della scelta', 'I propose several solutions and act at the time of che choice');

-- --------------------------------------------------------

--
-- Struttura della tabella `yfej_vacancy`
--

CREATE TABLE IF NOT EXISTS `yfej_vacancy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employer_id` int(11) NOT NULL DEFAULT '0',
  `isco_1` char(2) NOT NULL DEFAULT '',
  `isco_2` char(3) NOT NULL DEFAULT '',
  `isco_3` varchar(4) NOT NULL DEFAULT '',
  `job_title` varchar(150) NOT NULL,
  `job_description` text NOT NULL,
  `induction_training` enum('0','1') DEFAULT NULL,
  `language_training` enum('0','1') DEFAULT NULL,
  `technical_training` enum('0','1') DEFAULT NULL,
  `business_visits` enum('0','1') DEFAULT NULL,
  `mentoring_support` enum('0','1') DEFAULT NULL,
  `other_1` text NOT NULL,
  `other_2` text NOT NULL,
  `activities` text NOT NULL,
  `n_vacancies` tinyint(4) NOT NULL DEFAULT '0',
  `n_vacancies_left` tinyint(4) NOT NULL DEFAULT '0',
  `start_date` date NOT NULL DEFAULT '0000-00-00',
  `sixmonths` enum('0','1') NOT NULL DEFAULT '0',
  `monthly_wage` smallint(6) NOT NULL DEFAULT '0',
  `employment_form` enum('0','1') DEFAULT NULL,
  `employment_contract` enum('0','1') DEFAULT NULL,
  `training_location` varchar(250) NOT NULL DEFAULT '',
  `papers` enum('0','1','2','3','4') NOT NULL DEFAULT '0',
  `notified` enum('0','1') NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
