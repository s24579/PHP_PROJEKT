-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 13 Cze 2022, 14:03
-- Wersja serwera: 5.7.33-36
-- Wersja PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `36128270_debuschan`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author_com` varchar(30) DEFAULT NULL,
  `content_com` varchar(250) DEFAULT NULL,
  `id_posts` int(11) DEFAULT NULL,
  `time_com` datetime DEFAULT NULL,
  `vote_com` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`id`, `author_com`, `content_com`, `id_posts`, `time_com`, `vote_com`) VALUES
(32, 'Trump', 'Election was forged ', 148, '2022-06-13 13:51:16', 0),
(33, 'Barca_boy', 'Ronaldo got owned hahaha ', 136, '2022-06-13 13:51:39', 0),
(34, 'Sarah', 'thanks for the routine ', 150, '2022-06-13 13:51:55', 0),
(35, 'cr7_the_best', 'Same ', 146, '2022-06-13 13:52:20', 0),
(36, 'ineosnadikaj', 'the guy was like: got your nose. hahaha ', 154, '2022-06-13 13:53:01', 0),
(37, 'car_fanatic1', 'Nice man ', 152, '2022-06-13 13:53:26', 0),
(38, 'car_fanatic2', 'WOW!!! ', 152, '2022-06-13 13:53:38', 0),
(39, 'car_fanatic3', ' Lucky', 152, '2022-06-13 13:53:46', 0),
(40, 'bot', 'This is an automated comment, do not respond ', 153, '2022-06-13 13:54:13', 0),
(41, 'cr7god', 'the grass was so wet that roandlo fell messi so lucky >:(', 136, '2022-06-13 13:54:22', 0),
(42, 'cowboy bebop', 'in my opinion red dead redemption 2 is a better game because I can shoot a gun and ride a horse  ', 137, '2022-06-13 13:55:56', 0),
(43, 'gamerPL', 'when is it coming out? ', 139, '2022-06-13 13:56:43', 0),
(44, 'brainuser123', 'Morbius is one of the movies ever made', 149, '2022-06-13 13:57:34', 0),
(45, 'dudeguyman', ' is this a thanos car????', 151, '2022-06-13 13:58:05', 0),
(46, 'missqueen', 'omg my face is so dry, thanks for the tips!!! ', 150, '2022-06-13 13:59:21', 0),
(47, 'morbiliontickets', 'i bet that morbius is a better movie than this ', 147, '2022-06-13 13:59:51', 0),
(48, 'angryperson2077', 'OMG ARE YOU DUMB? IS IT ABOUT POLITICS NOT FOOD!! ', 144, '2022-06-13 14:02:49', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author` varchar(30) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `section` varchar(10) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `vote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `content`, `image`, `section`, `time`, `vote`) VALUES
(135, 'nickname', 'something', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', NULL, 'disc', '2022-06-13 13:37:24', 0),
(136, 'soccerplayer', 'football', 'messi & ronaldo ', '136.jpg', 'sport', '2022-06-13 13:38:00', 0),
(137, 'playstationuser', 'My favourite game', 'God of war is my favourite game ', '137.jpg', 'gaming', '2022-06-13 13:38:34', 0),
(138, 'Politician', 'Europe', 'Something europe ', '138.jpeg', 'politics', '2022-06-13 13:39:04', 0),
(139, 'Cod_fan', 'New game', 'New call of duty coming out soon ', '139.jpg', 'gaming', '2022-06-13 13:40:02', 0),
(140, 'Memer2007', 'haha', ' ', '140.jpg', 'memes', '2022-06-13 13:41:03', 0),
(141, 'guy123', ' Daniel Suarez claims first career NASCAR Cup win ', 'After having come close many times, Daniel Suarez finally has his first career win in the NASCAR Cup Series.', NULL, 'sport', '2022-06-13 13:41:06', 0),
(142, 'blahblahblah', 'What are your biggest secrets?', ' ', NULL, 'disc', '2022-06-13 13:41:50', 0),
(143, 'cat_lover', 'My cute cat', ' ', '143.jpg', 'animals', '2022-06-13 13:42:26', 0),
(144, 'politicallycorrect', 'which wing', 'people in the US often ask me which wing am I, left or right, but I always tell them that I prefer bufallo wings  ', NULL, 'politics', '2022-06-13 13:42:40', 0),
(145, 'Mamma_mia', 'Pizza recipe', ' Pizza Dough: Makes enough dough for two 10-12 inch pizzas\r\n\r\n1 1/2 cups (355 ml) warm water (105°F-115°F)\r\n1 package (2 1/4 teaspoons) active dry yeast\r\n3 3/4 cups (490g) bread flour\r\n2 tablespoons extra virgin olive oil (omit if cooking pizza in a wood-fired pizza oven)\r\n2 teaspoons kosher salt\r\n1 teaspoon sugar', '145.jpg', 'cooking', '2022-06-13 13:43:37', 0),
(146, 'cr7<3', 'My favorite football character Leonardo Ronaldo', ' ', '146.jpg', 'sport', '2022-06-13 13:43:45', 0),
(147, 'Hollywood', 'Titanic', ' Seventeen-year-old Rose hails from an aristocratic family and is set to be married. When she boards the Titanic, she meets Jack Dawson, an artist, and falls in love with him.', '147.png', 'movies', '2022-06-13 13:45:22', 0),
(148, 'BBCNews', 'US President elected!', 'Joe Biden will be the next United States president. Look at that handsome devil, I bet that Donald J. Trump is crying somewhere in the corner.', '148.jpg', 'news', '2022-06-13 13:47:14', 0),
(149, 'MORBIUSTHEBEST', 'Morbius', ' Best movie I have ever seen', '149.jpg', 'movies', '2022-06-13 13:47:19', 0),
(150, 'Amy_cats', 'New skincare routine', ' Cleansing — Washing your face. \r\nToning — Balancing the skin.\r\nMoisturizing — Hydrating and softening the skin.', '150.jpg', 'beauty', '2022-06-13 13:48:46', 0),
(151, 'v8lover12345', 'R8 my ride', 'Hello guys this is my new car please rate it in the comments ', '151.jpg', 'cars', '2022-06-13 13:49:03', 0),
(152, 'Joe_mama', 'I got a car for my birthday', ' ', '152.jpg', 'cars', '2022-06-13 13:49:24', 0),
(153, 'travel_enjoyer', ' beautiful sunset in africa', ' beautiful sunset in africa', '153.jpg', 'travel', '2022-06-13 13:50:49', 0),
(154, 'lonetraveller1923', 'Best place to stay in Egypt', ' Hi everyone I am planning a trip to Egypt and I wonder what place would be the best for me to stay in? Please share your experiences in the comments bellow. ', '154.jpg', 'travel', '2022-06-13 13:52:21', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_ibfk_1` (`id_posts`);

--
-- Indeksy dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT dla tabeli `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
