-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2023 at 03:07 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watch_movies_online`
--
CREATE DATABASE IF NOT EXISTS `watch_movies_online` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci;
USE `watch_movies_online`;

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `yob` date DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`id`, `name`, `yob`, `avatar`, `description`) VALUES
(1, 'Leonardo DiCaprio', '1974-11-11', NULL, 'An acclaimed actor known for his roles in films like The Revenant and Titanic, and his exceptional acting skills.'),
(2, 'Margot Robbie', '1990-07-02', NULL, 'An acclaimed actress known for her roles in films like The Wolf of Wall Street and Birds of Prey, and her versatile performances.'),
(3, 'Mahershala Ali', '1974-02-16', NULL, 'An acclaimed actor known for his roles in films like Moonlight and Green Book, and his exceptional acting skills.'),
(4, 'Scarlett Johansson', '1984-11-22', NULL, 'A versatile actress known for her roles in films like The Avengers and Lost in Translation, and her successful career as a voice actress and activist.'),
(5, 'Chris Pratt', '1979-06-21', NULL, 'A talented actor known for his roles in films like Guardians of the Galaxy and Jurassic World, and his charismatic performances.'),
(6, 'Zoe Saldana', '1978-06-19', NULL, 'A versatile actress known for her roles in films like Avatar and Guardians of the Galaxy, and her exceptional acting skills.'),
(7, 'John Boyega', '1992-03-17', NULL, 'A rising star known for his roles in films like Star Wars: The Force Awakens and Detroit, and his advocacy for social issues and representation in the film industry.'),
(8, 'Brie Larson', '1989-10-01', NULL, 'An accomplished actress known for her roles in films like Room and Captain Marvel, and her powerful performances.'),
(9, 'Chris Evans', '1981-06-13', NULL, 'An iconic actor known for his portrayal of Captain America in the Marvel Cinematic Universe, and his versatile performances in various genres.'),
(10, 'Naomi Watts', '1968-09-28', NULL, 'An acclaimed actress known for her roles in films like Mulholland Drive and King Kong, and her exceptional acting skills.'),
(11, 'Oscar Isaac', '1979-03-09', NULL, 'A versatile actor known for his roles in films like Ex Machina and Inside Llewyn Davis, and his exceptional acting skills.'),
(12, 'Lupita Nyong\'o', '1983-03-01', NULL, 'An award-winning actress known for her roles in films like 12 Years a Slave and Black Panther, and her powerful performances.'),
(13, 'Michael B. Jordan', '1987-02-09', NULL, 'A talented actor known for his roles in films like Creed and Black Panther, and his charismatic performances.'),
(14, 'Jessica Chastain', '1977-03-24', NULL, 'An accomplished actress known for her roles in films like Zero Dark Thirty and Interstellar, and her exceptional acting skills.'),
(15, 'Tom Hardy', '1977-09-15', NULL, 'A versatile actor known for his roles in films like Mad Max: Fury Road and Inception, and his intense performances.'),
(16, 'Emma Stone', '1988-11-06', NULL, 'An acclaimed actress known for her roles in films like La La Land and The Help, and her exceptional acting skills.'),
(17, 'Ryan Reynolds', '1976-10-23', NULL, 'A popular actor known for his roles in films like Deadpool and The Proposal, and his charismatic performances.'),
(18, 'Tessa Thompson', '1983-10-03', NULL, 'An accomplished actress known for her roles in films like Thor: Ragnarok and Creed, and her exceptional acting skills.'),
(19, 'Gal Gadot', '1985-04-30', NULL, 'An iconic actress known for her portrayal of Wonder Woman in the DC Extended Universe films, and her versatile performances in various genres.'),
(20, 'Chadwick Boseman', '1976-11-29', NULL, 'A late and great actor known for his iconic roles in films like Black Panther and 42, and his legacy as an influential figure in the entertainment industry.');

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `movie_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`created_at`, `user_id`, `movie_id`) VALUES
('2023-04-22 14:36:48', 1, 2),
('2023-04-22 14:37:15', 1, 4),
('2023-04-22 14:37:30', 1, 35),
('2023-04-22 14:36:51', 1, 37),
('2023-04-22 14:37:42', 1, 41),
('2023-04-22 14:36:47', 1, 89);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `user_id` int NOT NULL,
  `movie_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`content`, `user_id`, `movie_id`, `created_at`, `comment_id`) VALUES
('Phim quá hay', 1, 111, '2023-04-22 14:39:06', 1),
('10 điểm\n', 1, 111, '2023-04-22 14:39:17', 2),
('wakanda forever', 1, 41, '2023-04-22 14:39:32', 3),
('marvel không bao giờ làm ta thất vọng', 1, 41, '2023-04-22 14:39:48', 4),
('nice', 1, 35, '2023-04-22 14:40:01', 5);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'United Arab Emirates'),
(2, 'Afghanistan'),
(3, 'Andorra'),
(4, 'Anguilla'),
(5, 'Antigua and Barbuda'),
(6, 'Albania'),
(7, 'Armenia'),
(8, 'Angola'),
(9, 'Netherlands Antilles'),
(10, 'Antarctica'),
(11, 'American Samoa'),
(12, 'Argentina'),
(13, 'Austria'),
(14, 'Aruba'),
(15, 'Azerbaijan'),
(16, 'Bosnia and Herzegovina'),
(17, 'Barbados'),
(18, 'Australia'),
(19, 'Bangladesh'),
(20, 'Belgium'),
(21, 'Burkina Faso'),
(22, 'Bulgaria'),
(23, 'Bahrain'),
(24, 'Burundi'),
(25, 'Brunei Darussalam'),
(26, 'Bolivia'),
(27, 'Bahamas'),
(28, 'Burma'),
(29, 'Bhutan'),
(30, 'Bouvet Island'),
(31, 'Botswana'),
(32, 'Belarus'),
(33, 'Belize'),
(34, 'Bermuda'),
(35, 'Benin'),
(36, 'Brazil'),
(37, 'Canada'),
(38, 'Cocos  Islands'),
(39, 'Congo'),
(40, 'Central African Republic'),
(41, 'Switzerland'),
(42, 'Cote D\'Ivoire'),
(43, 'Cook Islands'),
(44, 'Cameroon'),
(45, 'China'),
(46, 'Colombia'),
(47, 'Costa Rica'),
(48, 'Serbia and Montenegro'),
(49, 'Chile'),
(50, 'Congo'),
(51, 'Cape Verde'),
(52, 'Cyprus'),
(53, 'Czech Republic'),
(54, 'Germany'),
(55, 'Djibouti'),
(56, 'Christmas Island'),
(57, 'Cuba'),
(58, 'Denmark'),
(59, 'Dominica'),
(60, 'Dominican Republic'),
(61, 'Algeria'),
(62, 'Estonia'),
(63, 'Egypt'),
(64, 'Western Sahara'),
(65, 'Spain'),
(66, 'Ecuador'),
(67, 'Ethiopia'),
(68, 'Fiji'),
(69, 'Finland'),
(70, 'Micronesia'),
(71, 'Falkland Islands'),
(72, 'Faeroe Islands'),
(73, 'Eritrea'),
(74, 'France'),
(75, 'United Kingdom'),
(76, 'Georgia'),
(77, 'Grenada'),
(78, 'French Guiana'),
(79, 'Ghana'),
(80, 'Gibraltar'),
(81, 'Guinea'),
(82, 'Gambia'),
(83, 'Greenland'),
(84, 'Guadaloupe'),
(85, 'Gabon'),
(86, 'Equatorial Guinea'),
(87, 'Guatemala'),
(88, 'Guyana'),
(89, 'Hong Kong'),
(90, 'Greece'),
(91, 'South Georgia and the South Sandwich Islands'),
(92, 'Heard and McDonald Islands'),
(93, 'Honduras'),
(94, 'Croatia'),
(95, 'Haiti'),
(96, 'Hungary'),
(97, 'Indonesia'),
(98, 'Guam'),
(99, 'Guinea-Bissau'),
(100, 'Ireland'),
(101, 'India'),
(102, 'British Indian Ocean Territory'),
(103, 'Iraq'),
(104, 'Iran'),
(105, 'Iceland'),
(106, 'Jamaica'),
(107, 'Israel'),
(108, 'Kenya'),
(109, 'Japan'),
(110, 'Jordan'),
(111, 'Kyrgyz Republic'),
(112, 'Cambodia'),
(113, 'Comoros'),
(114, 'St. Kitts and Nevis'),
(115, 'Italy'),
(116, 'South Korea'),
(117, 'North Korea'),
(118, 'Cayman Islands'),
(119, 'Kazakhstan'),
(120, 'Lao People\'s Democratic Republic'),
(121, 'Lebanon'),
(122, 'Liechtenstein'),
(123, 'Kiribati'),
(124, 'Kuwait'),
(125, 'Sri Lanka'),
(126, 'Liberia'),
(127, 'Lesotho'),
(128, 'Lithuania'),
(129, 'Latvia'),
(130, 'Libyan Arab Jamahiriya'),
(131, 'Morocco'),
(132, 'Moldova'),
(133, 'St. Lucia'),
(134, 'Montenegro'),
(135, 'Madagascar'),
(136, 'Marshall Islands'),
(137, 'Macedonia'),
(138, 'Mali'),
(139, 'Myanmar'),
(140, 'Mongolia'),
(141, 'Monaco'),
(142, 'Macao'),
(143, 'Luxembourg'),
(144, 'Northern Mariana Islands'),
(145, 'Martinique'),
(146, 'Mauritania'),
(147, 'Montserrat'),
(148, 'Mauritius'),
(149, 'Malta'),
(150, 'Maldives'),
(151, 'Mexico'),
(152, 'Malaysia'),
(153, 'Mozambique'),
(154, 'Namibia'),
(155, 'New Caledonia'),
(156, 'Niger'),
(157, 'Norfolk Island'),
(158, 'Nigeria'),
(159, 'Nicaragua'),
(160, 'Netherlands'),
(161, 'Malawi'),
(162, 'Norway'),
(163, 'Nepal'),
(164, 'Niue'),
(165, 'New Zealand'),
(166, 'Panama'),
(167, 'Peru'),
(168, 'Nauru'),
(169, 'French Polynesia'),
(170, 'Papua New Guinea'),
(171, 'Pakistan'),
(172, 'Pitcairn Island'),
(173, 'St. Pierre and Miquelon'),
(174, 'Puerto Rico'),
(175, 'Philippines'),
(176, 'Oman'),
(177, 'Palestinian Territory'),
(178, 'Portugal'),
(179, 'Palau'),
(180, 'Qatar'),
(181, 'Reunion'),
(182, 'Romania'),
(183, 'Poland'),
(184, 'Paraguay'),
(185, 'Russia'),
(186, 'Serbia'),
(187, 'Solomon Islands'),
(188, 'Rwanda'),
(189, 'Saudi Arabia'),
(190, 'Seychelles'),
(191, 'Sudan'),
(192, 'St. Helena'),
(193, 'Sweden'),
(194, 'Singapore'),
(195, 'Svalbard & Jan Mayen Islands'),
(196, 'Slovenia'),
(197, 'Slovakia'),
(198, 'Sierra Leone'),
(199, 'Senegal'),
(200, 'Somalia'),
(201, 'Suriname'),
(202, 'San Marino'),
(203, 'Soviet Union'),
(204, 'El Salvador'),
(205, 'Syrian Arab Republic'),
(206, 'Turks and Caicos Islands'),
(207, 'Swaziland'),
(208, 'Chad'),
(209, 'French Southern Territories'),
(210, 'Sao Tome and Principe'),
(211, 'South Sudan'),
(212, 'Togo'),
(213, 'Tajikistan'),
(214, 'Turkmenistan'),
(215, 'Timor-Leste'),
(216, 'Tunisia'),
(217, 'Tonga'),
(218, 'East Timor'),
(219, 'Thailand'),
(220, 'Tokelau'),
(221, 'Turkey'),
(222, 'Tuvalu'),
(223, 'Taiwan'),
(224, 'Uganda'),
(225, 'United States Minor Outlying Islands'),
(226, 'United States of America'),
(227, 'Trinidad and Tobago'),
(228, 'Uruguay'),
(229, 'Uzbekistan'),
(230, 'Holy See'),
(231, 'Venezuela'),
(232, 'St. Vincent and the Grenadines'),
(233, 'British Virgin Islands'),
(234, 'US Virgin Islands'),
(235, 'Tanzania'),
(236, 'Ukraine'),
(237, 'Vietnam'),
(238, 'Vanuatu'),
(239, 'Wallis and Futuna Islands'),
(240, 'Czechoslovakia'),
(241, 'East Germany'),
(242, 'Northern Ireland'),
(243, 'Kosovo'),
(244, 'Yemen'),
(245, 'Mayotte'),
(246, 'South Africa'),
(247, 'Zambia'),
(248, 'Zaire'),
(249, 'Samoa'),
(250, 'Zimbabwe'),
(251, 'Yugoslavia');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `yob` date DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`id`, `name`, `yob`, `avatar`, `description`) VALUES
(1, 'Christopher Nolan', '1970-07-30', NULL, 'An acclaimed filmmaker known for his visually stunning and thought-provoking films like Inception and The Dark Knight trilogy.'),
(2, 'Quentin Tarantino', '1963-03-27', NULL, 'A renowned filmmaker known for his unique and stylized films like Pulp Fiction and Kill Bill, and his distinctive storytelling approach.'),
(3, 'Steven Spielberg', '1946-12-18', NULL, 'An iconic director known for his blockbuster films like Jurassic Park and E.T. the Extra-Terrestrial, and his influential contributions to the film industry.'),
(4, 'Martin Scorsese', '1942-11-17', NULL, 'An award-winning director known for his gritty and powerful films like Goodfellas and Taxi Driver, and his exceptional filmmaking skills.'),
(5, 'Greta Gerwig', '1983-08-04', NULL, 'A talented director known for her critically acclaimed films like Lady Bird and Little Women, and her poignant storytelling and character-driven narratives.'),
(6, 'Denis Villeneuve', '1967-10-03', NULL, 'A visionary director known for his visually stunning and thought-provoking films like Blade Runner 2049 and Arrival, and his exceptional craftsmanship.'),
(7, 'David Fincher', '1962-08-28', NULL, 'A renowned director known for his visually striking and psychologically complex films like Fight Club and The Social Network, and his meticulous attention to detail.'),
(8, 'Guillermo del Toro', '1964-10-09', NULL, 'A visionary director known for his imaginative and visually stunning films like Pan\'s Labyrinth and The Shape of Water, and his unique storytelling style.'),
(9, 'Spike Lee', '1957-03-20', NULL, 'A groundbreaking director known for his socially relevant and thought-provoking films like Do the Right Thing and Malcolm X, and his outspoken activism.'),
(10, 'Alfonso Cuaron', '1961-11-28', NULL, 'An acclaimed director known for his visually stunning and emotionally resonant films like Gravity and Roma, and his innovative approach to filmmaking.'),
(11, 'Ava DuVernay', '1972-08-24', NULL, 'A pioneering director known for her impactful and socially relevant films like Selma and 13th, and her advocacy for diversity and inclusion in the film industry.'),
(12, 'Ang Lee', '1954-10-23', NULL, 'A versatile director known for his visually breathtaking films like Life of Pi and Crouching Tiger, Hidden Dragon, and his mastery of various genres.'),
(13, 'Woody Allen', '1935-12-01', NULL, 'A prolific director known for his distinctive comedic style and unique storytelling in films like Annie Hall and Midnight in Paris, and his influential contributions to the art of filmmaking.'),
(14, 'Clint Eastwood', '1930-05-31', NULL, 'A legendary director known for his iconic films like Unforgiven and Million Dollar Baby, and his successful career as an actor, director, and producer.'),
(15, 'Ridley Scott', '1937-11-30', NULL, 'A visionary director known for his visually stunning and epic films like Alien and Gladiator, and his innovative storytelling and world-building.'),
(16, 'Peter Jackson', '1961-10-31', NULL, 'A visionary director known for his groundbreaking films like The Lord of the Rings trilogy and The Hobbit trilogy, and his exceptional visual effects and world-building.'),
(17, 'James Cameron', '1954-08-16', NULL, 'A pioneering director known forhis groundbreaking films like Titanic and Avatar, and his innovative use of technology and visual effects in filmmaking.'),
(18, 'Barry Jenkins', '1979-11-19', NULL, 'An acclaimed director known for his visually stunning and emotionally resonant films like Moonlight and If Beale Street Could Talk, and his poignant storytelling and representation of marginalized communities.'),
(19, 'Taika Waititi', '1975-08-16', NULL, 'A visionary director known for his unique and irreverent films like Thor: Ragnarok and Jojo Rabbit, and his distinctive comedic style and storytelling approach.'),
(20, 'Jordan Peele', '1979-02-21', NULL, 'A trailblazing director known for his socially relevant and thought-provoking films like Get Out and Us, and his innovative blend of horror and social commentary in storytelling.');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `token` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Comedy'),
(2, 'Crime'),
(3, 'Documentary'),
(4, 'Action'),
(5, 'Animation'),
(6, 'Adventure'),
(7, 'Drama'),
(8, 'Family'),
(9, 'History'),
(10, 'Fantasy'),
(11, 'Horror'),
(12, 'Music'),
(13, 'Mystery'),
(14, 'Romance'),
(15, 'Science Fiction'),
(16, 'TV Movie'),
(17, 'Thriller'),
(18, 'War'),
(19, 'Western');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `trailer` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `runtime` int DEFAULT NULL,
  `poster` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `country_id` int DEFAULT NULL,
  `imdb_id` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `popularity` float DEFAULT NULL,
  `src` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `name`, `trailer`, `runtime`, `poster`, `description`, `country_id`, `imdb_id`, `release_date`, `popularity`, `src`) VALUES
(1, 'At Midnight', 'https://www.youtube.com/watch?v=wBO66MTmJcg', 100, 'https://image.tmdb.org/t/p/original/k6E1f3XvTq0sa02nUykPCwFKsBx.jpg', 'Alejandro\'s life is disrupted when actress Sophie Wilder stays at his hotel. To their surprise, the two fall for one another, meeting at midnight.', NULL, 'tt14874302', '2023-02-10', 10.354, 'https://2embed.org/embed/movie?imdb=tt14874302'),
(2, 'Dear David', 'https://www.youtube.com/watch?v=RfwlJqZbaew', 118, 'https://image.tmdb.org/t/p/original/cLxylsx9Xj08733qVWzuZ1Ua7R8.jpg', 'A secret fantasy blog might jeopardize the promising future of Laras, a talented student, when the blog is revealed to her entire school.', NULL, 'tt21986198', '2023-02-09', 13.338, 'https://2embed.org/embed/movie?imdb=tt21986198'),
(3, 'Plane', 'https://www.youtube.com/watch?v=SIQD0pUpC_Q', 107, 'https://image.tmdb.org/t/p/original/qi9r5xBgcc9KTxlOLjssEbDgO0J.jpg', 'After a heroic job of successfully landing his storm-damaged aircraft in a war zone, a fearless pilot finds himself between the agendas of multiple militias planning to take the plane and its passengers hostage.', NULL, 'tt5884796', '2023-01-12', 735.056, 'https://2embed.org/embed/movie?imdb=tt5884796'),
(4, 'Somebody I Used to Know', 'https://www.youtube.com/watch?v=XzBWuPOK6x0', 106, 'https://image.tmdb.org/t/p/original/m7LufNqf6zrz9u112fNcn19Zr8W.jpg', 'On a trip to her hometown, workaholic Ally reminisces with her first love Sean, and starts to question everything about the person she\'s become. Things only get more confusing when she meets Sean\'s fiancé, Cassidy, who reminds her of the person she used to be.', NULL, 'tt15333984', '2023-02-10', 78.959, 'https://2embed.org/embed/movie?imdb=tt15333984'),
(5, 'Babylon', 'https://www.youtube.com/watch?v=fAnsyUqN26U', 189, 'https://image.tmdb.org/t/p/original/f34UGIUYFaPuQWJCzRUnnzcRkLW.jpg', 'A tale of outsized ambition and outrageous excess, tracing the rise and fall of multiple characters in an era of unbridled decadence and depravity during Hollywood\'s transition from silent films and to sound films in the late 1920s.', NULL, 'tt10640346', '2022-12-22', 224.517, 'https://2embed.org/embed/movie?imdb=tt10640346'),
(6, 'துணிவு', 'https://www.youtube.com/watch?v=nI9TBoMlmv4', 146, 'https://image.tmdb.org/t/p/original/qLQKCGNAl5b0DZihbyWhtLzESwR.jpg', 'A gang goes to rob a bank only to find that there\'s already a criminal mastermind holding it for ransom, but his identities and motives behind the heist remains mysterious. As they plan to collect the bounty and disappear without a trace, their crimes and their past slowly catches up with them.', NULL, 'tt15163652', '2023-01-11', 6.313, 'https://2embed.org/embed/movie?imdb=tt15163652'),
(7, 'Legion of Super-Heroes', 'https://www.youtube.com/watch?v=VQ9dsqHXT_E', 84, 'https://image.tmdb.org/t/p/original/8M6bA5t2q5u1nWDTEIXuGDwvboW.jpg', 'Kara, devastated by the loss of Krypton, struggles to adjust to her new life on Earth. Her cousin, Superman, mentors her and suggests she leave their space-time to attend the Legion Academy in the 31st century, where she makes new friends and a new enemy: Brainiac 5. Meanwhile, she must contend with a mysterious group called the Dark Circle as it searches for a powerful weapon held in the Academy’s vault.', NULL, 'tt22769820', '2023-02-07', 379.714, 'https://2embed.org/embed/movie?imdb=tt22769820'),
(8, 'Look Into the Fire', '', 105, 'https://image.tmdb.org/t/p/original/sqWzRtUJt60Oce4GA0yNroeAJIF.jpg', 'A group of neuropsychology graduate students work to unlock the potential of the brain. One student, Adam, takes his lab work too far. When his self-induced experiment goes wrong, he unwittingly unlocks repressed memories and begins to be haunted by disturbing visions. As Adam digs deeper, he finds that there is someone who doesn\'t want him to uncover the sinister truth. Adam and his friends must work together to help him confront his recollections and figure out what is truth and what are lies before it\'s too late.', NULL, 'tt7013708', '2022-12-01', 1.437, 'https://2embed.org/embed/movie?imdb=tt7013708'),
(9, 'Battle for Pandora', 'https://www.youtube.com/watch?v=RhLOSiN4FHQ', 84, 'https://image.tmdb.org/t/p/original/5AoLseh165m3phMhlSQbPGyKByb.jpg', 'After a help signal from a research vessel makes it back to Earth, the U.S. Space Force sends a rescue ship to Pandora, a moon of Saturn. But when they try to land, they discover Pandora is inhabited by a highly evolved humanoid species.', NULL, 'tt23924182', '2022-12-02', 3.176, 'https://2embed.org/embed/movie?imdb=tt23924182'),
(10, 'Whitney Houston: I Wanna Dance with Somebody', 'https://www.youtube.com/watch?v=4E3j_Rnrb6w', 144, 'https://image.tmdb.org/t/p/original/oodPJ3Op1pWBhnEFyw5fampRCWf.jpg', 'The joyous, emotional, heartbreaking celebration of the life and music of Whitney Houston, the greatest female R&B pop vocalist of all time. Tracking her journey from obscurity to musical superstardom.', NULL, 'tt12193804', '2022-12-20', 44.951, 'https://2embed.org/embed/movie?imdb=tt12193804'),
(11, 'Your Place or Mine', 'https://www.youtube.com/watch?v=5JyfgkPMXk0', 109, 'https://image.tmdb.org/t/p/original/ApkSeqfIPRCxOtfjXYYE6Ji7jVU.jpg', 'When best friends and total opposites Debbie and Peter swap homes for a week, they get a peek into each other\'s lives that could open the door to love.', NULL, 'tt12823454', '2023-02-10', 98.293, 'https://2embed.org/embed/movie?imdb=tt12823454'),
(12, 'Hoax: The Kidnapping of Sherri Papini', 'https://www.youtube.com/watch?v=YrTbd4e36Wg', 88, 'https://image.tmdb.org/t/p/original/vgNozMzSJMxAt5TJbN83lGf7dZf.jpg', 'Young mother Sherri Papini disappears while jogging and reappears three weeks later on Thanksgiving Day. She claims that two Hispanic women kidnapped and abused her. Four years later, new evidence reveals that her abduction was a hoax she perpetrated to spend time with an ex-boyfriend.', NULL, 'tt23697628', '2023-01-28', 4.073, 'https://2embed.org/embed/movie?imdb=tt23697628'),
(13, 'The Winter Witch', 'https://www.youtube.com/watch?v=GqDkAR_M0GA', 82, 'https://image.tmdb.org/t/p/original/qMT9xKQny3eCFrYpVE2oqM6GKMK.jpg', 'At the behest of her boss, journalist Ingrid returns to her ancestral home when several children are found slaughtered in nearby woodland. With the village suspecting the infamous Winter Witch, together with daughter Eleanor and estranged grandmother Omi, Ingrid must uncover the truth and stop the curse of Frau Perchta once and for all.', NULL, 'tt9383752', '2022-12-26', 4.088, 'https://2embed.org/embed/movie?imdb=tt9383752'),
(14, 'Prisoner of Love', '', 0, 'https://image.tmdb.org/t/p/original/v5rJFd1MCTmYKE3dut2t0lpZQiQ.jpg', 'Everyone knew Vicky White as a respected churchgoer, a loving daughter, and a trusted neighbor. But there was something missing in her life, and she thought she\'d found it when she met convicted murderer Casey White.', NULL, 'tt23330084', '2022-12-14', 3.283, 'https://2embed.org/embed/movie?imdb=tt23330084'),
(15, '#Float', 'https://www.youtube.com/watch?v=mMPFFzPG5OU', 76, 'https://image.tmdb.org/t/p/original/xNyqgBBkbII8qBejh5czNqrT70p.jpg', 'When a vlogger and her crew embark on their annual river float to commemorate the untimely loss of their friend, they are plunged into a life and death battle with a mysterious local, a sinister paranormal force, and their own fears.', NULL, 'tt15289312', '2022-12-09', 4.872, 'https://2embed.org/embed/movie?imdb=tt15289312'),
(16, 'Infamously in Love', '', 90, 'https://image.tmdb.org/t/p/original/ddcJlSNMjkJQ0IftRReiXHm1ZSm.jpg', 'A frustratingly micromanaged popstar who dreams of the “ordinary” that life has to offer finds herself torn between her celebrity ex, the machinations of her controlling manager, and a developing romance with a down-to-earth record store owner. Will she gain more autonomy over her life – especially her love life – and start making decisions for herself, or will the celebrity machine be too powerful for her to ever feel even remotely normal?', NULL, 'tt20899952', '2022-10-09', 3.399, 'https://2embed.org/embed/movie?imdb=tt20899952'),
(17, 'Find Her', 'https://www.youtube.com/watch?v=Ji8Y3gQqfOI', 87, 'https://image.tmdb.org/t/p/original/9YTeSeNQ7Y1P3cJmvRlUwOmrUxi.jpg', 'When an ex-cop arrives in a small town searching for answers to a murdered ranch owner and his missing daughter, it slowly becomes clear he has his own personal agenda to finding the truth.', NULL, 'tt7111864', '2022-10-01', 1.199, 'https://2embed.org/embed/movie?imdb=tt7111864'),
(18, '5G: The Reckoning', '', 81, 'https://image.tmdb.org/t/p/original/2Vo6gIzZ9Lbh7UshNYiRiCzhG3R.jpg', 'Eight students are in lockdown at their college dorm following a global pandemic, unable to connect to the outside world. They soon realize they are victims of a far more sinister and unexpected entity.', NULL, 'tt13457926', '2023-01-03', 3.496, 'https://2embed.org/embed/movie?imdb=tt13457926'),
(19, 'Blueback', 'https://www.youtube.com/watch?v=UfqUgn-VNRU', 102, 'https://image.tmdb.org/t/p/original/5cWXJJsPRuz85zAK7XXmu9Vfdu2.jpg', 'Based on the best-selling novel by Tim Winton, Blueback is a timely tale about the ocean, a beautiful marine creature, and a young girl’s power to change the world.', NULL, 'tt14201576', '2022-12-29', 115.209, 'https://2embed.org/embed/movie?imdb=tt14201576'),
(20, 'Little Dixie', 'https://www.youtube.com/watch?v=z2oJulkQ9Ok', 105, 'https://image.tmdb.org/t/p/original/cmWTZj9zzT9KFt3XyL0gssL7Ig8.jpg', 'Erstwhile Special Forces operative Doc Alexander is asked to broker a truce with the Mexican drug cartel in secrecy. When Oklahoma Governor Richard Jeffs celebrates the execution of a high-ranking cartel member on TV, his Chief of Staff and Doc inform him about the peace he just ended. But it’s too late, as Cuco, the cartel’s hatchet man, has set his vengeful sights on Doc’s daughter Dixie.', NULL, 'tt13614388', '2023-02-03', 436.246, 'https://2embed.org/embed/movie?imdb=tt13614388'),
(21, 'Vacation Home Nightmare', '', 88, 'https://image.tmdb.org/t/p/original/o7w9tDt8kRsI4QvCrjuMnrkRMgp.jpg', 'When a woman is attacked in her rental home, the company\'s shady clean-up team steps in to help her pick up the pieces. However, she soon learns that the head of the team might be cleaning up his own crimes and will go to any measures to silence her.', NULL, 'tt26458228', '2023-01-29', 3.657, 'https://2embed.org/embed/movie?imdb=tt26458228'),
(22, 'Message and the Messenger', 'https://www.youtube.com/watch?v=1k08RP7uPpc', 114, 'https://image.tmdb.org/t/p/original/ySMUjTj0WwEr9b9O7I2vvI6Otcb.jpg', 'Jessica Clark starts a business with no plan, no money, and no integrity. She is convinced that God will bless her business solely because she faithfully pays tithes and offerings to her church. Jessica, like other members of Abundant Life Cathedral, is experiencing hard times and have yet to receive the financial blessings so passionately promised by her pastor. After witnessing Jessica\'s dysfunction, delusion, and doctrinal detriment, successful businessman, Michael Juniors, offers to help. Although Jessica deems Michael to be a \"demon from hell,\" he ironically proves to be her blessing and ultimately helps Jessica see God, life, love, and business in the perfect light.', NULL, 'tt18924468', '2022-12-25', 1.787, 'https://2embed.org/embed/movie?imdb=tt18924468'),
(23, 'True Spirit', 'https://www.youtube.com/watch?v=UPYD9dw6jmA', 109, 'https://image.tmdb.org/t/p/original/rZOtMdetDR8ic3A5VGbPT4U4Jg0.jpg', 'When the tenacious young sailor Jessica Watson sets out to be the youngest person to sail solo, nonstop and unassisted around the world, many expect her to fail. With the support of her sailing coach and mentor Ben Bryant and her parents, Jessica is determined to accomplish what was thought to be impossible, navigating some of the world’s most challenging stretches of ocean over the course of 210 days.', NULL, 'tt2353868', '2023-01-26', 43.324, 'https://2embed.org/embed/movie?imdb=tt2353868'),
(24, 'Brotherhood', 'https://www.youtube.com/watch?v=cJaR6ScaKmM', 0, 'https://image.tmdb.org/t/p/original/t1tRYdnDvv8wWB9gsFUV8pRqRFf.jpg', 'After years of fighting to survive on the streets of Lagos, two brothers fall on opposite sides of the law. The bonds of brotherhood are put to the ultimate test as one joins a Taskforce that hunts down the other and his gang.', NULL, 'tt19704920', '2022-09-23', 3.332, 'https://2embed.org/embed/movie?imdb=tt19704920'),
(25, 'Empire of Light', 'https://www.youtube.com/watch?v=XhegqnslNrs', 115, 'https://image.tmdb.org/t/p/original/h84SnIQF91Gz2Fv1OpMJ3245t4i.jpg', 'The duty manager of a seaside cinema, who is struggling with her mental health, forms a relationship with a new employee on the south coast of England in the 1980s.', NULL, 'tt14402146', '2022-12-09', 41.867, 'https://2embed.org/embed/movie?imdb=tt14402146'),
(26, 'Night Hunt', 'https://www.youtube.com/watch?v=-q1tkpEvpIs', 91, 'https://image.tmdb.org/t/p/original/qZUsrV79bj3X8Y1AjFVdabux1lK.jpg', 'A fast-paced violent horror movie with a social twist, Night Hunt is more than the story of a brutal killer roaming the streets of Chicago. It\'s also the story of two restless warrioresses to save the city they love.', NULL, 'tt23030444', '2022-12-10', 1.341, 'https://2embed.org/embed/movie?imdb=tt23030444'),
(27, 'Waking Karma', 'https://www.youtube.com/watch?v=Wmk1ijGnakE', 86, 'https://image.tmdb.org/t/p/original/3UDnLH9NemIoX7DgGYwbyC1OJDS.jpg', 'When high school senior Karma\'s estranged cult leader father traps her and her mother in a remote forest compound, she must survive a series of psychological trials meant to prepare her for a strange and deadly reincarnation ritual.', NULL, 'tt15793076', '2023-01-26', 4.159, 'https://2embed.org/embed/movie?imdb=tt15793076'),
(28, 'Bring Out the Fear', 'https://www.youtube.com/watch?v=ys0n-i613XA', 87, 'https://image.tmdb.org/t/p/original/3g8AAw4IfUM2BuFe2nXCMlewSiE.jpg', 'A couple struggling to fix their doomed relationship get lost in a dangerous forest that refuses to let them escape.', NULL, 'tt11492524', '2021-08-28', 0.631, 'https://2embed.org/embed/movie?imdb=tt11492524'),
(29, 'Aurora Teagarden Mysteries: Haunted By Murder', 'https://www.youtube.com/watch?v=P4fqdqusRdk', 84, 'https://image.tmdb.org/t/p/original/76U8bHFPFXgfsdqLNOuNOzTk5tA.jpg', 'A murder investigation is reignited in a house that is considered haunted by the Lawrenceton locals and where years ago Aurora and Sally, as teenagers, discovered a body.', NULL, 'tt15829754', '2022-02-20', 8.527, 'https://2embed.org/embed/movie?imdb=tt15829754'),
(30, 'La Nuit du 12', 'https://www.youtube.com/watch?v=58s-pXvTQss', 114, 'https://image.tmdb.org/t/p/original/aDEi8ClyzBDtKSEIX3enIV4sSXW.jpg', 'Young and ambitious Captain Vivés has just been appointed group leader at the Grenoble Criminal Squad when Clara\'s murder case lands on his desk. Vivés and his team investigate Clara\'s complex life and relations, but what starts as a professional and methodical immersion into the victim\'s life soon turns into a haunting obsession.', NULL, 'tt16953666', '2022-07-13', 20.11, 'https://2embed.org/embed/movie?imdb=tt16953666'),
(31, 'Mysterious Circumstance: The Death of Meriwether Lewis', 'https://www.youtube.com/watch?v=QHVfyGSAOnY', 115, 'https://image.tmdb.org/t/p/original/x1gjcSO6ABuqGeV1PdSCB2AZunu.jpg', 'Versions of Meriwether Lewis\'s 1809 death at a remote wilderness inn are imagined by his friend Alexander Wilson during a tense encounter with the only witness to the famed explorer\'s final night alive.', NULL, 'tt13216846', '2022-09-09', 4.502, 'https://2embed.org/embed/movie?imdb=tt13216846'),
(32, 'Love in Glacier National: A National Park Romance', 'https://www.youtube.com/watch?v=t6_BfwznruA', 84, 'https://image.tmdb.org/t/p/original/zhi6FXSSBeJm0XPIbBckp5IENEX.jpg', 'Sparks fly when Hannah, an expert in avalanche forecasting, brings her new technology to Glacier National Park and faces pushback from the director of Mountain Rescue, who relies more on intuition and common sense. Their dual approach bring more than forecasting to the forefront of their hearts.', NULL, 'tt25049966', '2023-01-28', 5.833, 'https://2embed.org/embed/movie?imdb=tt25049966'),
(33, 'Alice, Darling', 'https://www.youtube.com/watch?v=5NbfChOf1TM', 90, 'https://image.tmdb.org/t/p/original/ybqS7I4tuMs1TIssvuLMk2lYlLe.jpg', 'A young woman trapped in an abusive relationship becomes an unwitting participant in an intervention staged by her two closest friends.', NULL, 'tt11687104', '2022-12-30', 44.998, 'https://2embed.org/embed/movie?imdb=tt11687104'),
(34, 'Baby Ruby', 'https://www.youtube.com/watch?v=OGDOksx7Ehk', 93, 'https://image.tmdb.org/t/p/original/qUizkrlKbT4nHXUElvnIrjcPsDd.jpg', 'After welcoming her baby, Ruby, home, the tightly scripted world of lifestyle influencer Jo starts to unravel. As increasingly sinister happenings mount, Jo is plunged into a waking fever dream where everyone is a threat and nothing is what it seems.', NULL, 'tt21448540', '2023-02-03', 10.453, 'https://2embed.org/embed/movie?imdb=tt21448540'),
(35, 'Meet Me In Paris', 'https://www.youtube.com/watch?v=OBtEjI9y_PI', 0, 'https://image.tmdb.org/t/p/original/jYmOnstMQgZjTss9SkMFlOWZF1g.jpg', 'Three single friends travel to Paris for two weeks for the journey of a lifetime and in search of true love. From \'meet cutes\' at the Luxembourg Gardens, to strolls down the tree-lined Champs-Élysées, will first dates lead to happily ever after or heartbreak?', NULL, 'tt26689543', '2023-02-10', 3.719, 'https://2embed.org/embed/movie?imdb=tt26689543'),
(36, 'For Love', 'https://www.youtube.com/watch?v=Lnjib-DAfW8', 88, 'https://image.tmdb.org/t/p/original/uGNS4DeuyHQcr4ltztDkj7Fsu0L.jpg', 'In this searing documentary, Indigenous people share heartbreaking stories that reveal the injustices inflicted by the Canadian child welfare system.', NULL, 'tt14187472', '2022-09-21', 1.292, 'https://2embed.org/embed/movie?imdb=tt14187472'),
(37, 'M3GAN', 'https://www.youtube.com/watch?v=gHFC14dTqdo', 102, 'https://image.tmdb.org/t/p/original/d9nBoowhjiiYc4FBNtQkPY7c11H.jpg', 'A brilliant toy company roboticist uses artificial intelligence to develop M3GAN, a life-like doll programmed to emotionally bond with her newly orphaned niece. But when the doll\'s programming works too well, she becomes overprotective of her new friend with terrifying results.', NULL, 'tt8760708', '2022-12-28', 703.084, 'https://2embed.org/embed/movie?imdb=tt8760708'),
(38, 'Sophie and the Serial Killers', 'https://www.youtube.com/watch?v=zJ40GvOYXaU', 158, 'https://image.tmdb.org/t/p/original/zZMmwL4N9ZmNuub83We9ktfO8iR.jpg', 'Sophie, a young psychology major, finds herself kidnapped and thrown in a crazy wild battle royale game filled with musical serial killers, each of who have their own reason for killing. Now Sophie must do her best to survive the game and avoid being killed.', NULL, 'tt13364008', '2022-02-20', 0.6, 'https://2embed.org/embed/movie?imdb=tt13364008'),
(39, 'Teen Wolf: The Movie', 'https://www.youtube.com/watch?v=ThbNU9oUdKY', 140, 'https://image.tmdb.org/t/p/original/wAkpPm3wcHRqZl8XjUI3Y2chYq2.jpg', 'The wolves are howling once again, as a terrifying ancient evil emerges in Beacon Hills. Scott McCall, no longer a teenager yet still an Alpha, must gather new allies and reunite trusted friends to fight back against this powerful and deadly enemy.', NULL, 'tt15486810', '2023-01-18', 192.077, 'https://2embed.org/embed/movie?imdb=tt15486810'),
(40, 'Night of the Bastard', 'https://www.youtube.com/watch?v=REeKkjq4KNU', 82, 'https://image.tmdb.org/t/p/original/1TWK15jLsA76HC9gJ8IVEr6bOsq.jpg', 'After an injured young woman takes refuge in his secluded home, a gruff recluse must fight off a bloodthirsty cult and an insatiable sorceress to save both of their lives. A battle to survive becomes a gripping race against the clock to escape a perverse ritual of blood and flesh.', NULL, 'tt16420502', '2022-08-26', 2.649, 'https://2embed.org/embed/movie?imdb=tt16420502'),
(41, 'Black Panther: Wakanda Forever', 'https://www.youtube.com/watch?v=gTPFVKfjFrU', 162, 'https://image.tmdb.org/t/p/original/nZ69WTv7n01womaNz3SHa4inA9x.jpg', 'Queen Ramonda, Shuri, M’Baku, Okoye and the Dora Milaje fight to protect their nation from intervening world powers in the wake of King T’Challa’s death.  As the Wakandans strive to embrace their next chapter, the heroes must band together with the help of War Dog Nakia and Everett Ross and forge a new path for the kingdom of Wakanda.', NULL, 'tt9114286', '2022-11-09', 1127.99, 'https://2embed.org/embed/movie?imdb=tt9114286'),
(42, 'The Wedding Veil Journey', 'https://www.youtube.com/watch?v=QmZZ5STh-eI', 84, 'https://image.tmdb.org/t/p/original/c5ckuP063ZgiV1A3WfuF5jtHHA0.jpg', 'Tracy and Nick agree to set aside work to make time for a long overdue honeymoon to Greece. However, they soon find themselves confronting life choices when they get stranded on a secluded island.', NULL, 'tt25134270', '2023-01-21', 6.538, 'https://2embed.org/embed/movie?imdb=tt25134270'),
(43, 'Play Dead', 'https://www.youtube.com/watch?v=M8VaM7pCtsM', 106, 'https://image.tmdb.org/t/p/original/h5bwT8fuE6VIaOslRezwDiL2DxK.jpg', 'Criminology student Chloe fakes her own death to break into a morgue, in order to retrieve a piece of evidence that ties her younger brother to a crime gone wrong. Once inside, she discovers that a sadistic coroner is using the corpses for his sick and twisted business, and when he realises that Chloe still has a pulse, a terrifying game of cat and mouse ensues.', NULL, 'tt20198774', '2022-12-09', 10.79, 'https://2embed.org/embed/movie?imdb=tt20198774'),
(44, 'Kampen om Narvik', 'https://www.youtube.com/watch?v=mr46Twz-BII', 108, 'https://image.tmdb.org/t/p/original/gU4mmINWUF294Wzi8mqRvi6peMe.jpg', 'April, 1940. The eyes of the world are on Narvik, a small town in northern Norway, a source of the iron ore needed for Hitler\'s war machine. Through two months of fierce winter warfare, the German leader is dealt with his first defeat.', NULL, 'tt9737876', '2022-12-25', 437.368, 'https://2embed.org/embed/movie?imdb=tt9737876'),
(45, 'Shark Waters', 'https://www.youtube.com/watch?v=l1KfvjO7Bwg', 85, 'https://image.tmdb.org/t/p/original/iSvT8vTAtZzgf3uc5QJchLYgtYF.jpg', 'Great white sharks attack a fishing charter, ramming a hole in the ship’s hull. With the shoreline miles away, those aboard are forced to fight for their lives before they are either drowned or eaten alive.', NULL, 'tt21816892', '2022-08-12', 5.655, 'https://2embed.org/embed/movie?imdb=tt21816892'),
(46, 'The Plot to Kill My Mother', '', 88, 'https://image.tmdb.org/t/p/original/nPZI3KkI3eK29L5FnTB1W0fEtLQ.jpg', 'A young woman who unknowingly grew up in federal witness protection reels after her mother’s murder, leading her to question everything that she thinks is true. She decides to leave the program and find the killer before he kills again, but reclaiming a life she never knew isn’t going to be easy.', NULL, 'tt26215632', '2023-01-22', 4.514, 'https://2embed.org/embed/movie?imdb=tt26215632'),
(47, 'The Hanging Sun', 'https://www.youtube.com/watch?v=KAhM85BOC6Y', 93, 'https://image.tmdb.org/t/p/original/q63lZP5sRE6uyfRPwk2ZJBTRz86.jpg', 'On the run from his former employer, a reluctant hitman seeks refuge in an isolated village where he is faced with events that test the true nature of his conscience.', NULL, 'tt6986990', '2022-09-12', 41.581, 'https://2embed.org/embed/movie?imdb=tt6986990'),
(48, 'Xanadu Hellfire', 'https://www.youtube.com/watch?v=Ty6p4W1OU3U', 105, 'https://image.tmdb.org/t/p/original/eUZffAVsjEMGCQQFafhKE5AdVdi.jpg', 'An eight-year-old girl finds a way to bring her warrior comic book heroine Xanadu Hellfire from the future to the present. Xanadu\'s evil sister follows, and stuff gets crazy. Inspired by everything from Conan to Thor, Mad Max, and Clerks.', NULL, 'tt19766334', '2022-10-22', 2.575, 'https://2embed.org/embed/movie?imdb=tt19766334'),
(49, 'Sorry About the Demon', 'https://www.youtube.com/watch?v=T0TwQ1QHAZ0', 105, 'https://image.tmdb.org/t/p/original/9NooPiMm8xK8NNIgQQQS89y1MlG.jpg', 'A young man struggling with a broken heart learns that his new place is full of restless spirits.', NULL, 'tt15262634', '2022-08-29', 3.57, 'https://2embed.org/embed/movie?imdb=tt15262634'),
(50, 'Transfusion', 'https://www.youtube.com/watch?v=pA6CGAwVq-Q', 105, 'https://image.tmdb.org/t/p/original/bxh5xCCW9Ynfg6EZJWUkc1zqTnr.jpg', 'Ryan Logan, a former Special Forces operative, is battling to cope with life after the loss of his wife.  He is thrusted into the criminal underworld to keep his only son from being taken from him.', NULL, 'tt14873054', '2023-01-05', 274.629, 'https://2embed.org/embed/movie?imdb=tt14873054'),
(51, 'Whina', 'https://www.youtube.com/watch?v=CraH2y0V9Us', 112, 'https://image.tmdb.org/t/p/original/9Yzv6P2r57ZK4QBLZHLaTLRZfji.jpg', 'Biopic about the life of Whina Cooper, an activist who worked tirelessly to improve the lives of fellow Māori women.', NULL, 'tt6826120', '2022-11-03', 2.514, 'https://2embed.org/embed/movie?imdb=tt6826120'),
(52, 'You People', 'https://www.youtube.com/watch?v=JbzBelznMoM', 117, 'https://image.tmdb.org/t/p/original/x5E4TndwASNkaK2hwgeYfsIVo2x.jpg', 'A new couple and their families reckon with modern love amid culture clashes, societal expectations and generational differences.', NULL, 'tt14826022', '2023-01-20', 61.139, 'https://2embed.org/embed/movie?imdb=tt14826022'),
(53, 'KSI: In Real Life', 'https://www.youtube.com/watch?v=D2jZCFFcva4', 93, 'https://image.tmdb.org/t/p/original/nUCiGWCcvcIVthb9cAW1PMz6vUR.jpg', 'An access-all-areas look at the life of global megastar KSI as he goes through the most momentous year of his life. At the height of his fame, spurred on by a break-up, the multi-millionaire YouTuber, boxer and rapper starts to re-evaluate his priorities. How did JJ Olatunji, a nerdy kid from Watford become so successful and at what cost?', NULL, 'tt15426740', '2023-01-25', 10.949, 'https://2embed.org/embed/movie?imdb=tt15426740'),
(54, 'The Hit', 'https://www.youtube.com/watch?v=cq5-Kg38q4A', 103, 'https://image.tmdb.org/t/p/original/gxy2T7pVHWqU9xa6lNivEzuGGXH.jpg', 'Features a bromance with a killer twist.', NULL, 'tt12372438', '2022-12-09', 3.588, 'https://2embed.org/embed/movie?imdb=tt12372438'),
(55, 'There\'s Something Wrong with the Children', 'https://www.youtube.com/watch?v=OtYQB4r8Jew', 92, 'https://image.tmdb.org/t/p/original/e49Sr3Lxfk2psYhv1SzQjs7MeGo.jpg', 'Margaret and Ben take a weekend trip with longtime friends Ellie and Thomas and their two young children. Eventually, Ben begins to suspect something supernatural is occurring when the kids behave strangely after disappearing into the woods overnight.', NULL, 'tt16127696', '2023-01-17', 140.242, 'https://2embed.org/embed/movie?imdb=tt16127696'),
(56, 'When You Finish Saving the World', 'https://www.youtube.com/watch?v=XbgJPKFxHXI', 88, 'https://image.tmdb.org/t/p/original/pZyeoBDQJFPGfd0Mu8XIElGBjZz.jpg', 'Evelyn and her oblivious son Ziggy seek out replacements for each other. As Evelyn tries to parent an unassuming teenager at her shelter, Ziggy fumbles through his pursuit of a brilliant young woman at school.', NULL, 'tt12121582', '2023-01-20', 10.695, 'https://2embed.org/embed/movie?imdb=tt12121582'),
(57, 'The Offering', 'https://www.youtube.com/watch?v=oMc-iybcRdc', 93, 'https://image.tmdb.org/t/p/original/tbaTFgGIaTL1Uhd0SMob6Dhi5cK.jpg', 'In the wake of a young Jewish girl’s disappearance, the son of a Hasidic funeral director returns home with his pregnant wife in hopes of reconciling with his father. Little do they know that directly beneath them in the family morgue, an ancient evil with sinister plans for the unborn child lurks inside a mysterious corpse.', NULL, 'tt13103732', '2022-09-23', 226.822, 'https://2embed.org/embed/movie?imdb=tt13103732'),
(58, 'The Return of Tanya Tucker Featuring Brandi Carlile', 'https://www.youtube.com/watch?v=zCmLlxamvms', 108, 'https://image.tmdb.org/t/p/original/623Pwg62oUAvKia3o4fRH2p02sn.jpg', 'Trailblazing, hell-raising country music legend Tanya Tucker defied the standards of how a woman in country music was supposed to behave. Decades after Tanya slipped from the spotlight, rising Americana music star Brandi Carlile takes it upon herself to write an entire album for her hero based on Tanya’s extraordinary life, spurring the greatest comeback in country music history. Taking stock of the past while remaining vitally alive in the present and keeping an eye on the future, The Return of Tanya Tucker is a rousing exploration of an unexpected friendship built on the joy of a perfectly timed creative collaboration.', NULL, 'tt17640752', '2022-10-21', 2.781, 'https://2embed.org/embed/movie?imdb=tt17640752'),
(59, 'Don\'t Look Deeper', 'https://www.youtube.com/watch?v=8YL0P-GlQxo', 119, 'https://image.tmdb.org/t/p/original/pPlBfssnI49kMKrHUY1qbVnHpnO.jpg', 'A high school student in central California sets off an unexpected series of events when she begins to doubt if she\'s human.', NULL, 'tt22811298', '2022-10-14', 5.016, 'https://2embed.org/embed/movie?imdb=tt22811298'),
(60, 'The Price We Pay', 'https://www.youtube.com/watch?v=aIPbV97Gn8Q', 85, 'https://image.tmdb.org/t/p/original/8fwJt0qZieQ7dKaiiqehObWpXYT.jpg', 'After a pawn shop robbery goes askew, two criminals take refuge at a remote farmhouse to try to let the heat die down, but find something much more menacing.', NULL, 'tt15441472', '2023-01-13', 187.788, 'https://2embed.org/embed/movie?imdb=tt15441472'),
(61, 'Scorched Earth', 'https://www.youtube.com/watch?v=4OzIWZLhDQM', 63, 'https://image.tmdb.org/t/p/original/yAeMuaDTYKDHR9j44hwvdqloBkY.jpg', 'After the apocalypse, all water is radioactive and deadly to drink. In this dystopian world, Gylian goes to extreme lengths to make sure her daughter gets the medication she needs to survive.', NULL, 'tt15015460', '2022-12-07', 2.816, 'https://2embed.org/embed/movie?imdb=tt15015460'),
(62, 'Haunted Valley', 'https://www.youtube.com/watch?v=FFoywmY6lYs', 93, 'https://image.tmdb.org/t/p/original/f4pO8xDSY4kjo241CtWulMzh6sN.jpg', 'A young man and his family encounter one of the many spirits that lurk throughout the Rio Grande Valley. He and his family must confront the evil head-on in effort to be freed from its grip.', NULL, 'tt23173132', '2022-10-26', 3.058, 'https://2embed.org/embed/movie?imdb=tt23173132'),
(63, '정이', 'https://www.youtube.com/watch?v=v_Jc1MYFv5g', 98, 'https://image.tmdb.org/t/p/original/qEkatvFb6hrebLBAanb25ea26yh.jpg', 'On an uninhabitable 22nd-century Earth, the outcome of a civil war hinges on cloning the brain of an elite soldier to create a robot mercenary.', NULL, 'tt22352848', '2023-01-20', 396.714, 'https://2embed.org/embed/movie?imdb=tt22352848'),
(64, 'Detective Knight: Independence', 'https://www.youtube.com/watch?v=zt-hyQE-sIA', 92, 'https://image.tmdb.org/t/p/original/jrPKVQGjc3YZXm07OYMriIB47HM.jpg', 'Detective James Knight \'s last-minute assignment to the Independence Day shift turns into a race to stop an unbalanced ambulance EMT from imperiling the city\'s festivities. The misguided vigilante, playing cop with a stolen gun and uniform, has a bank vault full of reasons to put on his own fireworks show... one that will strike dangerously close to Knight\'s home.', NULL, 'tt22394702', '2023-01-20', 249.683, 'https://2embed.org/embed/movie?imdb=tt22394702'),
(65, 'Jije', 'https://www.youtube.com/watch?v=-IomZHrSicI', 92, 'https://image.tmdb.org/t/p/original/6jbUef1gNZz7VAb56b7P20ePtl2.jpg', 'Paul is a teenager plagued by night terrors. After witnessing a horrible tragedy, his night terrors begin to dance their way into the real world, as something sleeping deep inside him tries to awaken. He must face this new reality or lose everything and everyone he loves.', NULL, 'tt11891068', '2022-03-03', 2.01, 'https://2embed.org/embed/movie?imdb=tt11891068'),
(66, 'Battlebox', 'https://www.youtube.com/watch?v=0KEm3qxvmcA', 77, 'https://image.tmdb.org/t/p/original/fDeqyKwEtms2IFtT8SDvURZWqAF.jpg', 'With a sudden attack by the Japanese, British Major-General Maltby and his top officers struggle with the decision to either fight to the death or offer a humiliating surrender of the British Colony of Hong Kong.', NULL, 'tt14085258', '2023-01-17', 4.384, 'https://2embed.org/embed/movie?imdb=tt14085258'),
(67, 'Seriously Red', 'https://www.youtube.com/watch?v=rq3xhTWW7Lo', 98, 'https://image.tmdb.org/t/p/original/pt4GDCqpa7w6zk9XBXnKOKyAkLV.jpg', 'Raylene \'Red\' Delaney trades her nine to five career in real estate for a life under the spotlight as a Dolly Parton impersonator. A romantic liaison with Kenny Rogers then occurs while her tumultuous journey continues full of fake hair and artificial boobs.', NULL, 'tt4586828', '2022-11-24', 4.841, 'https://2embed.org/embed/movie?imdb=tt4586828'),
(68, 'Beyond the Neon', 'https://www.youtube.com/watch?v=v9bl4nziPuU', 87, 'https://image.tmdb.org/t/p/original/hs5HYKPjTUsNk1zihIyJzgaA7r8.jpg', 'Based on true accounts, a Las Vegas escort is recognized by her sister in a viral social experiment video. Looking to reunite the sisters, and secretly motivated to capture the reunion on camera, Joey Salads and his apprehensive crew are thrown into the dangerous and corrupt world of escorting, documenting every step of their desperate effort to rescue the woman from human sex trafficking in Las Vegas.', NULL, 'tt10833378', '2022-10-14', 3.161, 'https://2embed.org/embed/movie?imdb=tt10833378'),
(69, 'Snow Falls', 'https://www.youtube.com/watch?v=7dzwm_9joSM', 80, 'https://image.tmdb.org/t/p/original/wfZklSVDJPpHT0Arq4A8GY8Q9S9.jpg', 'After a winter storm strands five friends in a remote cabin with no power and little food, disorientation slowly claims their sanity as each of them succumbs to a fear that the snow itself may be contaminated or somehow evil.', NULL, 'tt11569658', '2023-01-17', 9.704, 'https://2embed.org/embed/movie?imdb=tt11569658'),
(70, 'The Almond and the Seahorse', 'https://www.youtube.com/watch?v=r8YN0kgCgY8', 95, 'https://image.tmdb.org/t/p/original/AcGFeGeBcYmDgK8MOLj12yZqt8B.jpg', 'For Gwen, it\'s always 1999. The face in the mirror is unfamiliar and her partner isn\'t recognizable to her despite waking up together every day. Joe\'s past is coming undone and his partner, Sarah, fears she will be forgotten. A doctor refuses to give up on them, determined not to let them unravel.', NULL, 'tt7326608', '2022-12-16', 5.624, 'https://2embed.org/embed/movie?imdb=tt7326608'),
(71, 'The Pale Blue Eye', 'https://www.youtube.com/watch?v=J99jKu_Ov7g', 130, 'https://image.tmdb.org/t/p/original/9xkGlFRqrN8btTLU0KQvOfn2PHr.jpg', 'West Point, New York, 1830. When a cadet at the burgeoning military academy is found hanged with his heart cut out, the top brass summons former New York City constable Augustus Landor to investigate. While attempting to solve this grisly mystery, the reluctant detective engages the help of one of the cadets: a strange but brilliant young fellow by the name of Edgar Allan Poe', NULL, 'tt14138650', '2022-12-22', 123.761, 'https://2embed.org/embed/movie?imdb=tt14138650'),
(72, 'Platinum', 'https://www.youtube.com/watch?v=hQxs073v8Ms', 123, 'https://image.tmdb.org/t/p/original/iHKlOqKz8RIUgxcIUGkGcBi1Kcb.jpg', 'A mysterious man arrives in Houston, and gets the opportunity of a lifetime, when Ice, a pretty hooker with considerable business acumen, gives him the name Platinum and teaches him the pimp game. Platinum quickly becomes the coldest pimp in the city, until his disturbing past catches up to him, and he kills the niece of a very powerful drug dealer, The Word. The Word wastes no time aiming his revenge at Platinum, and everyone he knows.', NULL, 'tt15690636', '2022-12-06', 1.702, 'https://2embed.org/embed/movie?imdb=tt15690636'),
(73, 'The Menu', 'https://www.youtube.com/watch?v=job07ZmsVxA', 107, 'https://image.tmdb.org/t/p/original/fPtUgMcLIboqlTlPrq0bQpKK8eq.jpg', 'A young couple travels to a remote island to eat at an exclusive restaurant where the chef has prepared a lavish menu, with some shocking surprises.', NULL, 'tt9764362', '2022-11-17', 101.828, 'https://2embed.org/embed/movie?imdb=tt9764362'),
(74, 'The Dog Lover\'s Guide to Dating', 'https://www.youtube.com/watch?v=XNIJMdhpYgc', 84, 'https://image.tmdb.org/t/p/original/6A8VWRvG62zuCXc2jJBA2whU4QX.jpg', 'Simon believes Chloe is the girl of his dreams, but can’t seem to win over her beloved pup. He enlists dog trainer Alex and soon finds himself wondering where his real connection might be.', NULL, 'tt24806922', '2023-01-01', 4.823, 'https://2embed.org/embed/movie?imdb=tt24806922'),
(75, 'The Drop', 'https://www.youtube.com/watch?v=aUEZjwC84Ps', 92, 'https://image.tmdb.org/t/p/original/xLQ674ObzFnyxNb6vcofEEbLHZ4.jpg', 'In this clever cringe comedy, a seemingly happy married couple confronts a test of their marriage when one of them drops a baby while at a destination wedding at a tropical island.', NULL, 'tt19758112', '2022-06-11', 4.763, 'https://2embed.org/embed/movie?imdb=tt19758112'),
(76, 'Best of Stand-Up 2022', '', 76, 'https://image.tmdb.org/t/p/original/voxVt0OOD7OxLQApHhmc7IZ4co2.jpg', 'From Bill Burr to Ali Wong, Gabriel Iglesias to Trevor Noah, Taylor Tomlinson to Jo Koy, check out the best jokes from Netflix’s 2022 stand-up specials.', NULL, 'tt25396646', '2022-12-31', 2.965, 'https://2embed.org/embed/movie?imdb=tt25396646'),
(77, 'Christmas Bedtime Stories', 'https://www.youtube.com/watch?v=1pp-NAJ8eJM', 84, 'https://image.tmdb.org/t/p/original/zhW480dt2LCJH0PcoDeFkw4nFnh.jpg', 'When Danielle’s husband goes missing in action during his deployment, she is left to raise her daughter on her own. Three years later, as she acclimates to life without him, she begins to tell her daughter bedtime stories of her father.', NULL, 'tt22258178', '2022-11-19', 3.386, 'https://2embed.org/embed/movie?imdb=tt22258178'),
(78, 'Be Mine, Valentine', 'https://www.youtube.com/watch?v=0obU7FoSCY8', 90, 'https://image.tmdb.org/t/p/original/zrNnWwVZTt1nwlrJr7OvqokZYZG.jpg', 'Piper Davis is a dedicated proposal planner who orchestrates elaborate proposal events for her clients. With Valentine\'s Day around the corner, she is overloaded with requests, on top of dealing with mixed emotions aligned with the holiday, due to a past failed romance.', NULL, 'tt15205434', '2022-06-07', 3.818, 'https://2embed.org/embed/movie?imdb=tt15205434'),
(79, 'The Old Way', 'https://www.youtube.com/watch?v=cKih3NhmnPE', 95, 'https://image.tmdb.org/t/p/original/8HCCYAIocXxMKn7J9yQfDX1vBM5.jpg', 'An old gunslinger and his daughter must face the consequences of his past, when the son of a man he killed years ago arrives to take his revenge.', NULL, 'tt8593824', '2023-01-06', 47.082, 'https://2embed.org/embed/movie?imdb=tt8593824'),
(80, 'Reyes contra Santa', '', 106, 'https://image.tmdb.org/t/p/original/qvDJbZYs2p4eOdyJ8R2dfdJp2Qq.jpg', 'The Three Wise Men, fed up with Santa taking more and more prominence from them, have decided to confront each other without knowing that this war will awaken a much more dangerous common enemy, the Krampus, who had been inactive for centuries.', NULL, 'tt18953258', '2022-11-18', 10.389, 'https://2embed.org/embed/movie?imdb=tt18953258'),
(81, 'A Christmas Gift', '', 90, 'https://image.tmdb.org/t/p/original/qtAQ3Hcb15yApH5VcqB2AxXLIv.jpg', 'Follows single mother Roz McKenzie, who calls upon a miracle in order to survive Christmas with her daughter.', NULL, 'tt18260368', '2022-12-22', 1.142, 'https://2embed.org/embed/movie?imdb=tt18260368'),
(82, 'Devotion', 'https://www.youtube.com/watch?v=anJqJL4rz64', 139, 'https://image.tmdb.org/t/p/original/ns6XdKuzbLgdOaOhDTrATs4cpmK.jpg', 'The harrowing true story of two elite US Navy fighter pilots during the Korean War. Their heroic sacrifices would ultimately make them the Navy\'s most celebrated wingmen.', NULL, 'tt7693316', '2022-11-23', 294.179, 'https://2embed.org/embed/movie?imdb=tt7693316'),
(83, 'Lizzo: Live in Concert', 'https://www.youtube.com/watch?v=YFYmLjgrj1g', 91, 'https://image.tmdb.org/t/p/original/l4Lo8OFaDrRuTOVb0Zd0lWMEJli.jpg', 'Celebrate the new year with award-winning superstar Lizzo, her band The Lizzbians and The Little Bigs, The Big Grrrls with special guests Cardi B, SZA and Missy Elliott for a spectacular show filled with lots of love, positivity and incredible music.', NULL, 'tt25406946', '2022-12-31', 3.235, 'https://2embed.org/embed/movie?imdb=tt25406946'),
(84, 'Missile from the East', 'https://www.youtube.com/watch?v=VnbslSK32vE', 91, 'https://image.tmdb.org/t/p/original/8b2sDPU15vfa9xmKPli3uqZ2nuM.jpg', 'Against the backdrop of the 1961 Swedish Grand Prix, East German motorcycle racer Ernst Degner flees the Iron Curtain. Returning to the racetrack the following season with Suzuki, the driver wins the world championship and catapults the Japanese industrial giant into global domination of the motorcycle industry. Set where two worlds collide – the colour and freedom of the West contrasts the oppression and threat of Cold War East Germany.', NULL, 'tt12835186', '2022-06-03', 1.121, 'https://2embed.org/embed/movie?imdb=tt12835186'),
(85, 'This Place Rules', 'https://www.youtube.com/watch?v=mUTHeuByz2M', 82, 'https://image.tmdb.org/t/p/original/9Kml8c7L1IySs1g8Q9v8l1EPS1J.jpg', 'Acclaimed for his unfiltered reporting and deadpan humor, Andrew Callaghan brings his gonzo style reporting to the undercurrents that led to the January 6 Capitol Riot. As one of the best-known and hardest working journalists of his generation, the 25-year-old ventures on a wild RV journey through America to take the pulse of a divided nation.', NULL, 'tt23950956', '2022-12-30', 4.896, 'https://2embed.org/embed/movie?imdb=tt23950956'),
(86, 'House Party', 'https://www.youtube.com/watch?v=CxKRm8OYS5Y', 100, 'https://image.tmdb.org/t/p/original/KiyKR9m6h01eIvGObGmpt16U3F.jpg', 'Aspiring club promoters and best buds Damon and Kevin are barely keeping things together. Out of money, down on their luck and about to lose the roofs over their heads—and freshly fired from their low-lift jobs as house cleaners—the pair needs a huge windfall to make their problems go away. In a ‘what the hell?’ move, they decide to host the party of the year at an exclusive mansion, the site of their last cleaning job, which just happens to belong to none other than LeBron James. No permission? No problem. What could go wrong?', NULL, 'tt8005118', '2023-01-12', 58.71, 'https://2embed.org/embed/movie?imdb=tt8005118'),
(87, 'Calendar Girls', 'https://www.youtube.com/watch?v=kItQurWcJAw', 83, 'https://image.tmdb.org/t/p/original/vOsxJyFuEKaLzQgX1i26zYifKY9.jpg', 'Whether they’re performing at an animal rescue center benefit, a church fundraiser, or a shrimp parade, the Calendar Girls give it all they’ve got. And they have a lot to give — impressive makeup; handmade costumes; elaborate dance routines; and, most notably, their unparalleled enthusiasm and sparkling personalities. They are a group of hardworking senior volunteer dancers in Florida, determined to prove that age is just a number.', NULL, 'tt16377888', '2022-08-12', 2.654, 'https://2embed.org/embed/movie?imdb=tt16377888'),
(88, 'When I Think of Christmas', 'https://www.youtube.com/watch?v=D8hKzaqvMJk', 84, 'https://image.tmdb.org/t/p/original/iKWVMaaHZqaOOqzgdKdpfqJk37B.jpg', 'Sara Thompson returns to her hometown to help her mother move and is surprised to find her ex-boyfriend Josh Hartman is back home. The two had once planned a life in music together but Sara left to study law. The former flames slowly reconnect and try to heal wounds, both old and new. When Sara makes a surprising discovery, she and Josh forge a bold plan for the upcoming Christmas concert that will lead them all back to their musical roots and make this a holiday to remember.', NULL, 'tt22247502', '2022-11-19', 3.382, 'https://2embed.org/embed/movie?imdb=tt22247502'),
(89, 'Puss in Boots: The Last Wish', 'https://www.youtube.com/watch?v=z-E5pTQVW8w', 103, 'https://image.tmdb.org/t/p/original/kav9SgYBGE7ikJXO5ktlEILJYPI.jpg', 'Puss in Boots discovers that his passion for adventure has taken its toll: He has burned through eight of his nine lives, leaving him with only one life left. Puss sets out on an epic journey to find the mythical Last Wish and restore his nine lives.', NULL, 'tt3915174', '2022-12-07', 1816.47, 'https://2embed.org/embed/movie?imdb=tt3915174'),
(90, 'The Holiday Stocking', 'https://www.youtube.com/watch?v=GyRxf5KwhOA', 84, 'https://image.tmdb.org/t/p/original/msCmQYDVSOF91o5ZogkDrrgvhee.jpg', 'RJ is a new angel, who is given the chance to address his one regret, that he didn’t help his sisters reconcile while he was still alive. Returning to earth as a stranger, he gets each of them to revive The Holiday Stocking, their parent’s old tradition to encourage charity at Christmas.', NULL, 'tt22308008', '2022-12-03', 3.626, 'https://2embed.org/embed/movie?imdb=tt22308008'),
(91, 'Violent Night', 'https://www.youtube.com/watch?v=5VwDxVq13l0', 112, 'https://image.tmdb.org/t/p/original/m1vc0hyrOF115aSByluwy2LLZAX.jpg', 'When a team of mercenaries breaks into a wealthy family compound on Christmas Eve, taking everyone inside hostage, the team isn’t prepared for a surprise combatant: Santa Claus is on the grounds, and he’s about to show why this Nick is no saint.', NULL, 'tt12003946', '2022-11-30', 321.889, 'https://2embed.org/embed/movie?imdb=tt12003946'),
(92, 'Glass Onion: A Knives Out Mystery', 'https://www.youtube.com/watch?v=mMO-_954sDg', 140, 'https://image.tmdb.org/t/p/original/vDGr1YdrlfbU9wxTOdpf3zChmv9.jpg', 'World-famous detective Benoit Blanc heads to Greece to peel back the layers of a mystery surrounding a tech billionaire and his eclectic crew of friends.', NULL, 'tt11564570', '2022-11-23', 195.47, 'https://2embed.org/embed/movie?imdb=tt11564570'),
(93, 'Catfish Killer', '', 90, 'https://image.tmdb.org/t/p/original/wSXOGXHhMdOPTp0Bm9QfMI6OaKV.jpg', 'Hannah is thrilled with how her senior year in high school is going. Her best friends always by her side, her mom is so very supportive, and she just got a coveted scholarship to Stanford University. However, Hannah joins an online chatroom where she meets a guy she falls for quickly, and things quickly go from very good to awful.', NULL, 'tt18395072', '2022-07-01', 2.548, 'https://2embed.org/embed/movie?imdb=tt18395072'),
(94, 'Dog Gone', 'https://www.youtube.com/watch?v=q4rdxpc3wk0', 95, 'https://image.tmdb.org/t/p/original/eYWdLZCS9W1Xli9bynzFSddLx02.jpg', 'When his beloved dog goes missing, a young man embarks on an incredible search with his parents to find him and give him life-saving medication.', NULL, 'tt15334430', '2023-01-13', 37.544, 'https://2embed.org/embed/movie?imdb=tt15334430'),
(95, 'Strange World', 'https://www.youtube.com/watch?v=N7WbZNqSC2o', 102, 'https://image.tmdb.org/t/p/original/eRlWcJzXgC2FK3knVEPBe2xZNJ8.jpg', 'A journey deep into an uncharted and treacherous land, where fantastical creatures await the legendary Clades—a family of explorers whose differences threaten to topple their latest, and by far most crucial, mission.', NULL, 'tt10298840', '2022-11-23', 296.552, 'https://2embed.org/embed/movie?imdb=tt10298840'),
(96, 'Don\'t Fuck in the Woods 2', 'https://www.youtube.com/watch?v=lEXQXFSz6LQ', 81, 'https://image.tmdb.org/t/p/original/5lnEmN1XozTGHLLfz2Qhpgb6rOB.jpg', 'The counselors of Pine Hills Summer Camp are getting the grounds ready for the season. While they set up, a mysterious girl enters the camp after a night of bloodshed. And there are things following her as well.', NULL, 'tt7560830', '2022-10-24', 6.893, 'https://2embed.org/embed/movie?imdb=tt7560830'),
(97, 'White Noise', 'https://www.youtube.com/watch?v=wK0ni47AgRA', 136, 'https://image.tmdb.org/t/p/original/1a48bfLQm57ByADdw05uRMoFCZc.jpg', 'Jack Gladney, professor of Hitler studies at The-College-on-the-Hill, husband to Babette, and father to four children/stepchildren, is torn asunder by a chemical spill from a rail car that releases an \"Airborne Toxic Event\" forcing Jack to confront his biggest fear - his own mortality.', NULL, 'tt6160448', '2022-11-25', 25.474, 'https://2embed.org/embed/movie?imdb=tt6160448'),
(98, 'A Christmas to Treasure', 'https://www.youtube.com/watch?v=IaDk0E9oRd0', 90, 'https://image.tmdb.org/t/p/original/gOMtNaxw1vtkXN0iOz6pxS55tVg.jpg', 'The passing of a beloved old neighbor reunites six friends for a hometown holiday treasure hunt, where sparks fly once again between brand strategist Austin and his former best friend Everett.', NULL, 'tt21072238', '2022-12-16', 4.662, 'https://2embed.org/embed/movie?imdb=tt21072238'),
(99, 'The Nature of Romance', 'https://www.youtube.com/watch?v=fwrDYHwstBM', 90, 'https://image.tmdb.org/t/p/original/kZApkiBXieXndkwrRPcP8KXyJ0T.jpg', 'A busy travel writer goes glamping at a state park with her best friend and finds herself falling in love with one of the park rangers.', NULL, 'tt13098300', '2021-08-17', 4.936, 'https://2embed.org/embed/movie?imdb=tt13098300'),
(100, 'The Honeymoon', 'https://www.youtube.com/watch?v=Sfv7ox2HIsk', 97, 'https://image.tmdb.org/t/p/original/alNoekbBiVOSozHZd66zNoPvhL0.jpg', 'Englishman Adam and his American bride Sarah are about to embark on the romantic honeymoon of a lifetime in Venice, Italy. But when the newlyweds’ trip is gatecrashed by Adam’s excessively needy best friend, Ed, it inadvertently turns their perfect lovers’ holiday into a complete disaster.', NULL, 'tt14781026', '2022-12-16', 5.731, 'https://2embed.org/embed/movie?imdb=tt14781026');
INSERT INTO `movie` (`id`, `name`, `trailer`, `runtime`, `poster`, `description`, `country_id`, `imdb_id`, `release_date`, `popularity`, `src`) VALUES
(101, 'Roald Dahl\'s Matilda the Musical', 'https://www.youtube.com/watch?v=v81ojopkDc4', 117, 'https://image.tmdb.org/t/p/original/ga8R3OiOMMgSvZ4cOj8x7prUNYZ.jpg', 'An extraordinary young girl discovers her superpower and summons the remarkable courage, against all odds, to help others change their stories, whilst also taking charge of her own destiny. Standing up for what\'s right, she\'s met with miraculous results.', NULL, 'tt3447590', '2022-11-25', 430.407, 'https://2embed.org/embed/movie?imdb=tt3447590'),
(102, 'The Jangling Man: The Martin Newell Story', 'https://www.youtube.com/watch?v=yyLFvggq-84', 83, 'https://image.tmdb.org/t/p/original/xPdU8xkqhHtorPPWdxD16h8Lowc.jpg', 'Regarded by many as an influential figure in the history of cassette culture and DIY recording, Martin Newell has been an integral part of the British music scene since the 1970s, and his music career spans over six decades. He’s been produced by XTC’s Andy Partridge, and written for the likes of Captain Sensible of The Damned. Though it would be wrong to call him an \"unknown\", he has never been directly in the limelight. This film brings to light the amazing career and life work of the artist, who, on top of being the most published contemporary British poet as well as an established gardener, continues to record and release music today.', NULL, 'tt22334238', '2022-12-12', 0.6, 'https://2embed.org/embed/movie?imdb=tt22334238'),
(103, 'Disconnect: The Wedding Planner', 'https://www.youtube.com/watch?v=9eNSewvbaoo', 107, 'https://image.tmdb.org/t/p/original/co6doQ2d3f5ZaTTvORV76wrTFit.jpg', 'After falling victim to a scam, a desperate man races the clock as he attempts to plan a luxurious destination wedding for an important investor.', NULL, 'tt24640474', '2023-01-13', 8.578, 'https://2embed.org/embed/movie?imdb=tt24640474'),
(104, 'Renegades', 'https://www.youtube.com/watch?v=dU-r2eDokbI', 91, 'https://image.tmdb.org/t/p/original/7QvhJsoFbcWsrY0iXGhZTKQaQAr.jpg', 'When a retired Green Beret soldier is murdered by an Albanian drug gang in London, four of his veteran SAS comrades set out to avenge him, dispensing their own brand of justice on the streets of London.', NULL, 'tt11696276', '2022-12-02', 7.77, 'https://2embed.org/embed/movie?imdb=tt11696276'),
(105, 'Holiday Heritage', '', 84, 'https://image.tmdb.org/t/p/original/60qNGOQ3fmL615qcHpnCiFBLY0d.jpg', 'Ella returns to her hometown to mend fences with her fractured family. With the help of Griffin, her ex-boyfriend, she encourages her family to celebrate Christmas and Kwanzaa and to heal their past wounds before it’s too late.', NULL, 'tt22307204', '2022-12-16', 3.158, 'https://2embed.org/embed/movie?imdb=tt22307204'),
(106, 'Los Reyes Magos: La verdad', '', 77, 'https://image.tmdb.org/t/p/original/hDQGyMm7j7yhaSwoOOiuSm2BlaE.jpg', 'While they prepare for the Three Wise Men\'s Cavalcade, Melchior, Gaspar and Balthazar open the doors to their palace for the first time for the filming of a documentary about their daily lives.', NULL, 'tt23867800', '2022-12-16', 4.502, 'https://2embed.org/embed/movie?imdb=tt23867800'),
(107, 'The Simpsons Meet the Bocellis in Feliz Navidad', 'https://www.youtube.com/watch?v=8itcioHD6ow', 4, 'https://image.tmdb.org/t/p/original/wF6oobZdG73yQN9Scwjn5PTn4FP.jpg', 'This Christmas, Homer surprises Marge with the ultimate gift: an unforgettable performance from Italian opera superstar Andrea Bocelli and his children Matteo and Virginia.', NULL, 'tt24082346', '2022-12-15', 402.29, 'https://2embed.org/embed/movie?imdb=tt24082346'),
(108, 'Le pupille', 'https://www.youtube.com/watch?v=yxZ_xOx3-ow', 38, 'https://image.tmdb.org/t/p/original/5mxAnaVatajEs8wmJzYV9J9HdfO.jpg', 'A facetious coming-of-age fable that ends with a cheeky moral: what if allegedly \"bad girls\" were the best?', NULL, 'tt20215392', '2022-05-27', 8.943, 'https://2embed.org/embed/movie?imdb=tt20215392'),
(109, 'The Holiday Dating Guide', '', 85, 'https://image.tmdb.org/t/p/original/yakQX8MkLeEwTc0qDcCm3XrUoUO.jpg', 'Dating coach and aspiring book author Abigale Slater is tasked by her publisher Jack to prove that her dating advice really works. With that, she decides to make a man fall for her by Christmas Eve in 12 days. When she Michael Ryan, her single-minded mission takes an unexpected turn.', NULL, 'tt21663620', '2022-12-17', 3.248, 'https://2embed.org/embed/movie?imdb=tt21663620'),
(110, 'A Tiny Home Christmas', 'https://www.youtube.com/watch?v=rJ4R4scLycE', 85, 'https://image.tmdb.org/t/p/original/nOn7sHlP9m9SHvyhDm26npeLPlW.jpg', 'In order to save her family’s contracting business, Blair reluctantly teams up with her ex-boyfriend and former co-star of a hit home design reality show to build a tiny home for the unsheltered in the community, rekindling old sparks in the process… and just in time for Christmas.', NULL, 'tt18178194', '2022-11-12', 2.412, 'https://2embed.org/embed/movie?imdb=tt18178194'),
(111, 'Beauty and the Beast: A 30th Celebration', 'https://www.youtube.com/watch?v=f33TPz6eoWg', 88, 'https://image.tmdb.org/t/p/original/xWpahhg9ETkiPPsG10RtxecjK0v.jpg', 'This two-hour animated and live-action blended special pays tribute to the original Disney Animation’s “Beauty and the Beast” and its legacy by showcasing the fan-favorite movie, along with new memorable musical performances, taking viewers on a magical adventure through the eyes of Belle.', NULL, 'tt21220842', '2023-02-24', 9.111, 'https://2embed.org/embed/movie?imdb=tt21220842'),
(112, 'Savage Salvation', 'https://www.youtube.com/watch?v=M-sjJmIGClc', 101, 'https://image.tmdb.org/t/p/original/fJRt3mmZEvf8gQzoNLzjPtWpc9o.jpg', 'Newly engaged Shelby John and Ruby Red want a fresh start after their struggles with addiction, but when Shelby discovers his beloved Ruby dead on their porch, he embarks on a vengeful killing spree of the dealers who supplied her. Armed with nothing but adrenaline and a nail gun, Shelby begins to unleash chaos on the town’s criminal underbelly, as he hunt’s down crime lord Coyote. Sheriff Church must race against the clock to put an end to Shelby\'s vigilante justice before the entire town descends into a bloodbath.', NULL, 'tt13055982', '2022-12-02', 183.503, 'https://2embed.org/embed/movie?imdb=tt13055982'),
(113, 'Matrimillas', 'https://www.youtube.com/watch?v=pQL4OHfLhgY', 101, 'https://image.tmdb.org/t/p/original/b5M8xOeAMrKZLNFMdNThHAEcM9v.jpg', 'Tangled in a troubled marriage, a frustrated couple finds hope in a watch-based app that rewards good deeds — until unhealthy obsessiveness takes over.', NULL, 'tt18688184', '2022-12-07', 18.85, 'https://2embed.org/embed/movie?imdb=tt18688184'),
(114, 'Who Killed Santa? A Murderville Murder Mystery', 'https://www.youtube.com/watch?v=dW16FYgUreE', 53, 'https://image.tmdb.org/t/p/original/uO0EJVJmy2RC0YRgcvu8ETFBUZO.jpg', 'A holiday-hating detective is forced to solve a murder — and save Christmas — with help from famous trainees who must improv their way through the case.', NULL, 'tt23747062', '2022-12-15', 6.02, 'https://2embed.org/embed/movie?imdb=tt23747062'),
(115, 'A Christmas Wish in Hudson', 'https://www.youtube.com/watch?v=wMSoEVxJaUw', 90, 'https://image.tmdb.org/t/p/original/avfNRBUIlTnJ0cUIbuz12dyf7pl.jpg', 'Lori really needs a break for Christmas. When she sees Patrick Jacobs, a widowed firefighter from Hudson, Wisconsin on a reality cooking show, she feels a strong attraction and decides to take a shot at love, but she\'s not the only one.', NULL, 'tt13624384', '2021-10-29', 2.205, 'https://2embed.org/embed/movie?imdb=tt13624384'),
(116, 'The Apology', 'https://www.youtube.com/watch?v=Y7ki82vHj5U', 91, 'https://image.tmdb.org/t/p/original/gUFHThondPpmjqeh3XI1yXnCRDa.jpg', 'Twenty years after the disappearance of her daughter, a recovering alcoholic is preparing to host her family\'s Christmas celebration when her estranged ex-brother-in-law arrives unannounced, bearing nostalgic gifts and a heavy secret.', NULL, 'tt22494914', '2022-12-16', 8.227, 'https://2embed.org/embed/movie?imdb=tt22494914'),
(117, 'High Heat', 'https://www.youtube.com/watch?v=gYyAuyP6FAs', 84, 'https://image.tmdb.org/t/p/original/mmD0NVdhiRiCu64YKem5GK5PSfy.jpg', 'When the local mafia shows up to burn down her restaurant, Ana, a chef with a meticulous past, defends her turf and proves her knife skills both in and out of the kitchen.', NULL, 'tt15721088', '2022-12-16', 86.834, 'https://2embed.org/embed/movie?imdb=tt15721088'),
(118, 'Snow Day', 'https://www.youtube.com/watch?v=lp2nVrxRCdY', 77, 'https://image.tmdb.org/t/p/original/dnwf2DyI41EkWvJnOLfWV6DFRNW.jpg', 'A pair of siblings make the most of a school snow day, while trying to avoid their nemesis, the Snowplowman.', NULL, 'tt23622516', '2022-12-16', 51.084, 'https://2embed.org/embed/movie?imdb=tt23622516'),
(119, 'Avatar - The Way of Water', 'Avatar - The Way of Water - Official Trailer.mp4', 192, 'Avatar - The Way of Water.jpg', 'Jake Sully and Ney\'tiri have formed a family and are doing everything to stay together. However, they must leave their home and explore the regions of Pandora. When an ancient threat resurfaces, Jake must fight a difficult war against the humans.', NULL, NULL, '2022-12-16', NULL, 'Avatar - The Way of Water - Official Trailer.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `movie_actor`
--

CREATE TABLE `movie_actor` (
  `movie_id` int NOT NULL,
  `actor_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `movie_actor`
--

INSERT INTO `movie_actor` (`movie_id`, `actor_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(41, 4),
(41, 5),
(41, 6),
(41, 7),
(4, 8),
(4, 9),
(4, 10),
(20, 11),
(20, 12),
(20, 13),
(20, 14),
(20, 15),
(44, 16),
(44, 17),
(44, 18),
(44, 19),
(44, 20);

-- --------------------------------------------------------

--
-- Table structure for table `movie_director`
--

CREATE TABLE `movie_director` (
  `movie_id` int NOT NULL,
  `director_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `movie_director`
--

INSERT INTO `movie_director` (`movie_id`, `director_id`) VALUES
(1, 1),
(1, 2),
(41, 3),
(41, 4),
(41, 5);

-- --------------------------------------------------------

--
-- Table structure for table `movie_genre`
--

CREATE TABLE `movie_genre` (
  `genre_id` int NOT NULL,
  `movie_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `movie_genre`
--

INSERT INTO `movie_genre` (`genre_id`, `movie_id`) VALUES
(2, 1),
(11, 1),
(2, 2),
(5, 2),
(11, 2),
(14, 3),
(15, 3),
(19, 3),
(2, 4),
(5, 4),
(11, 4),
(2, 5),
(5, 5),
(2, 6),
(3, 6),
(10, 6),
(15, 6),
(19, 6),
(4, 7),
(12, 7),
(15, 7),
(19, 8),
(12, 9),
(15, 9),
(16, 9),
(5, 10),
(8, 10),
(9, 10),
(2, 11),
(11, 11),
(3, 12),
(5, 12),
(13, 12),
(16, 13),
(5, 14),
(13, 14),
(16, 15),
(2, 16),
(11, 16),
(13, 16),
(5, 17),
(10, 17),
(16, 18),
(5, 19),
(7, 19),
(14, 19),
(3, 20),
(5, 20),
(15, 20),
(19, 20),
(5, 21),
(13, 21),
(19, 21),
(5, 22),
(5, 23),
(7, 23),
(14, 23),
(3, 24),
(19, 24),
(5, 25),
(11, 25),
(16, 26),
(16, 27),
(19, 27),
(16, 28),
(10, 29),
(13, 29),
(3, 30),
(10, 30),
(19, 30),
(10, 31),
(18, 31),
(19, 31),
(2, 32),
(11, 32),
(13, 32),
(5, 33),
(10, 33),
(19, 33),
(5, 34),
(19, 34),
(2, 35),
(11, 35),
(1, 36),
(2, 37),
(12, 37),
(16, 37),
(2, 38),
(9, 38),
(16, 38),
(6, 39),
(13, 39),
(15, 39),
(16, 40),
(19, 40),
(12, 41),
(14, 41),
(15, 41),
(2, 42),
(11, 42),
(13, 42),
(16, 43),
(19, 43),
(5, 44),
(8, 44),
(15, 44),
(17, 44),
(15, 45),
(16, 45),
(19, 45),
(13, 46),
(19, 46),
(3, 47),
(10, 47),
(19, 47),
(6, 48),
(2, 49),
(16, 49),
(3, 50),
(5, 50),
(19, 50),
(5, 51),
(2, 52),
(11, 52),
(1, 53),
(2, 54),
(14, 54),
(15, 54),
(10, 55),
(16, 55),
(19, 55),
(2, 56),
(5, 56),
(16, 57),
(1, 58),
(9, 58),
(5, 59),
(12, 59),
(3, 60),
(10, 60),
(15, 60),
(16, 60),
(19, 60),
(5, 61),
(12, 61),
(15, 61),
(19, 61),
(16, 62),
(12, 63),
(14, 63),
(15, 63),
(3, 64),
(15, 64),
(19, 64),
(16, 65),
(5, 66),
(8, 66),
(17, 66),
(2, 67),
(5, 67),
(9, 67),
(3, 68),
(19, 68),
(16, 69),
(5, 70),
(10, 71),
(19, 71),
(3, 72),
(5, 72),
(2, 73),
(16, 73),
(19, 73),
(2, 74),
(11, 74),
(13, 74),
(2, 75),
(2, 76),
(2, 77),
(5, 77),
(11, 77),
(13, 77),
(2, 78),
(11, 78),
(13, 78),
(15, 79),
(18, 79),
(2, 80),
(6, 80),
(7, 81),
(5, 82),
(8, 82),
(17, 82),
(9, 83),
(1, 84),
(13, 84),
(1, 85),
(2, 86),
(1, 87),
(2, 88),
(5, 88),
(11, 88),
(13, 88),
(2, 89),
(4, 89),
(6, 89),
(7, 89),
(14, 89),
(2, 90),
(5, 90),
(11, 90),
(13, 90),
(2, 91),
(3, 91),
(15, 91),
(19, 91),
(2, 92),
(3, 92),
(10, 92),
(19, 93),
(5, 94),
(7, 94),
(14, 94),
(4, 95),
(7, 95),
(12, 95),
(14, 95),
(16, 96),
(2, 97),
(5, 97),
(12, 97),
(2, 98),
(11, 98),
(13, 98),
(11, 99),
(13, 99),
(2, 100),
(2, 101),
(6, 101),
(7, 101),
(1, 102),
(9, 102),
(2, 103),
(11, 103),
(3, 104),
(15, 104),
(19, 104),
(2, 105),
(5, 105),
(7, 105),
(11, 105),
(13, 105),
(2, 106),
(2, 107),
(4, 107),
(7, 107),
(2, 108),
(7, 108),
(2, 109),
(5, 109),
(11, 109),
(13, 109),
(2, 110),
(5, 110),
(11, 110),
(13, 110),
(4, 111),
(6, 111),
(7, 111),
(9, 111),
(11, 111),
(19, 112),
(2, 113),
(11, 113),
(2, 114),
(3, 114),
(2, 115),
(11, 115),
(13, 115),
(16, 116),
(19, 116),
(2, 117),
(3, 117),
(15, 117),
(2, 118),
(7, 118),
(9, 118),
(13, 118),
(4, 119),
(6, 119);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `score` int DEFAULT NULL,
  `user_id` int NOT NULL,
  `movie_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`score`, `user_id`, `movie_id`, `created_at`) VALUES
(5, 1, 2, '2023-04-22 14:38:04'),
(4, 1, 20, '2023-04-22 14:38:37'),
(2, 1, 35, '2023-04-22 14:38:16'),
(5, 1, 41, '2023-04-22 14:38:23'),
(3, 1, 63, '2023-04-22 14:38:10'),
(5, 1, 111, '2023-04-22 14:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `reply_comment_id` int NOT NULL,
  `root_comment_id` int NOT NULL,
  `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `token` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'sample.jpg',
  `status` int DEFAULT NULL,
  `role` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `token`, `avatar`, `status`, `role`, `created_at`) VALUES
(1, 'admin@gmail.com', '123456', 'Admin', 'user_643a1e9acff02', 'admin.jpg', 0, 1, '2023-04-11 02:50:26'),
(2, 'customer@gmail.com', '123456', 'Customer', NULL, 'sample.jpg', 0, 0, '2023-04-11 02:50:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`user_id`,`movie_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `movie_actor`
--
ALTER TABLE `movie_actor`
  ADD PRIMARY KEY (`movie_id`,`actor_id`),
  ADD KEY `actor_id` (`actor_id`);

--
-- Indexes for table `movie_director`
--
ALTER TABLE `movie_director`
  ADD PRIMARY KEY (`movie_id`,`director_id`),
  ADD KEY `director_id` (`director_id`);

--
-- Indexes for table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`genre_id`,`movie_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`user_id`,`movie_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_comment_id`),
  ADD KEY `root_comment_id` (`root_comment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actor`
--
ALTER TABLE `actor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_comment_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD CONSTRAINT `bookmark_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `bookmark_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD CONSTRAINT `forgot_password_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `movie_actor`
--
ALTER TABLE `movie_actor`
  ADD CONSTRAINT `movie_actor_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `movie_actor_ibfk_2` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `movie_director`
--
ALTER TABLE `movie_director`
  ADD CONSTRAINT `movie_director_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `movie_director_ibfk_2` FOREIGN KEY (`director_id`) REFERENCES `director` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD CONSTRAINT `movie_genre_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `movie_genre_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `rate_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`root_comment_id`) REFERENCES `comment` (`comment_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
