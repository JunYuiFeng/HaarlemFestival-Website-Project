-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 10, 2023 at 01:50 PM
-- Server version: 10.5.13-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u449982275_haarlemfest`
--

-- --------------------------------------------------------

--
-- Table structure for table `APIKeys`
--

CREATE TABLE `APIKeys` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `APIKeys`
--

INSERT INTO `APIKeys` (`id`, `token`) VALUES
(7, '1c175b9ef7dede7d6f297b3d36ac15c11ef7eea4817fdf408b6f90afb902194e'),
(8, 'c50eedf705d3047184224a283d43d718b71bcab4e1bbbdd252660b547e5b8b88');

-- --------------------------------------------------------

--
-- Table structure for table `Artists`
--

CREATE TABLE `Artists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `style` varchar(255) NOT NULL,
  `firstSong` varchar(255) NOT NULL,
  `secondSong` varchar(255) NOT NULL,
  `thirdSong` varchar(255) NOT NULL,
  `indexPicture` varchar(255) NOT NULL,
  `firstSongSourceCode` varchar(500) NOT NULL,
  `secondSongSourceCode` varchar(500) NOT NULL,
  `thirdSongSourceCode` varchar(500) NOT NULL,
  `detailedPicture` varchar(255) NOT NULL,
  `career` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Artists`
--

INSERT INTO `Artists` (`id`, `name`, `style`, `firstSong`, `secondSong`, `thirdSong`, `indexPicture`, `firstSongSourceCode`, `secondSongSourceCode`, `thirdSongSourceCode`, `detailedPicture`, `career`) VALUES
(1, 'Hardwell', 'Dance and House', 'Apollo', 'Bella Ciao', 'Spaceman', 'IndexPictureHardwell.jpg', '&lt;iframe style=&quot;border-radius:12px&quot; src=&quot;https://open.spotify.com/embed/track/7EdxI2Yro4AW2HH3akwqms?utm_source=generator&quot; width=&quot;100%&quot; height=&quot;352&quot; frameBorder=&quot;0&quot; allowfullscreen=&quot;&quot; allow=&quot;autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture&quot; loading=&quot;lazy&quot;&gt;&lt;/iframe&gt;', '&lt;iframe style=&quot;border-radius:12px&quot; src=&quot;https://open.spotify.com/embed/track/3lWzVNe1yFZlkeBBzUuZYu?utm_source=generator&quot; width=&quot;100%&quot; height=&quot;352&quot; frameBorder=&quot;0&quot; allowfullscreen=&quot;&quot; allow=&quot;autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture&quot; loading=&quot;lazy&quot;&gt;&lt;/iframe&gt;', '&lt;iframe style=&quot;border-radius:12px&quot; src=&quot;https://open.spotify.com/embed/track/3Ki1bFwSTFmZWI7TKu5DNF?utm_source=generator&quot; width=&quot;100%&quot; height=&quot;352&quot; frameBorder=&quot;0&quot; allowfullscreen=&quot;&quot; allow=&quot;autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture&quot; loading=&quot;lazy&quot;&gt;&lt;/iframe&gt;', 'hardwellDetailedPage.jpg', 'Hardwell, born Robbert van de Corput, is a Dutch DJ and producer who has made a significant impact on the electronic dance music (EDM) scene. He became the youngest DJ to ever win the '),
(2, 'Nicky Romero', 'electrohouse/ progressive house', 'Okay', 'Legacy', 'Like Home', 'IndexPictureNickyRomero.jpg', '<iframe style=\"border-radius:12px\" src=\"https://open.spotify.com/embed/track/71H8k9qe7DersxR6KyhUnI?utm_source=generator\" width=\"100%\" height=\"352\" frameBorder=\"0\" allowfullscreen=\"\" allow=\"autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture\" loading=\"lazy\"></iframe>', '<iframe style=\"border-radius:12px\" src=\"https://open.spotify.com/embed/track/2KCSGgx9ksCLgB96WtdB6R?utm_source=generator\" width=\"100%\" height=\"352\" frameBorder=\"0\" allowfullscreen=\"\" allow=\"autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture\" loading=\"lazy\"></iframe>', '<iframe style=\"border-radius:12px\" src=\"https://open.spotify.com/embed/track/5FV75TYvdP3UzXHzE2veFL?utm_source=generator\" width=\"100%\" height=\"352\" frameBorder=\"0\" allowfullscreen=\"\" allow=\"autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture\" loading=\"lazy\"></iframe>', 'NickyRomeroDetailedPageImage.jpg', 'Nicky Romero is a Dutch DJ, producer, and label owner who has made significant contributions to the electronic dance music (EDM) scene. His career highlights include:  Chart-Topping Hits: Romero has produced several chart-topping hits, including '),
(4, 'Afrojack', 'house', 'Ten Feet Tall', 'Give me Everything', 'Hey Mama', 'IndexPictureAfrojack.jpg', '<iframe style=\"border-radius:12px\" src=\"https://open.spotify.com/embed/track/2ldAdghnrO34HPcZ0IWfTu?utm_source=generator\" width=\"100%\" height=\"352\" frameBorder=\"0\" allowfullscreen=\"\" allow=\"autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture\" loading=\"lazy\"></iframe>', '<iframe style=\"border-radius:12px\" src=\"https://open.spotify.com/embed/track/4QNpBfC0zvjKqPJcyqBy9W?utm_source=generator\" width=\"100%\" height=\"352\" frameBorder=\"0\" allowfullscreen=\"\" allow=\"autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture\" loading=\"lazy\"></iframe>', '<iframe style=\"border-radius:12px\" src=\"https://open.spotify.com/embed/track/285HeuLxsngjFn4GGegGNm?utm_source=generator\" width=\"100%\" height=\"352\" frameBorder=\"0\" allowfullscreen=\"\" allow=\"autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture\" loading=\"lazy\"></iframe>', 'detailedPictureAfrojack.png', 'Afrojack, whose real name is Nick van de Wall, is a Dutch DJ, music producer, and entrepreneur. He was born on September 9, 1987, in Spijkenisse, Netherlands. He first started producing music in his bedroom at the age of 14 and gained fame in the electronic dance music (EDM) scene in the late 2000s.\r\n\r\nAfrojack\'s breakthrough came with his 2010 hit single \"Take Over Control\" featuring Dutch singer Eva Simons, which topped charts across Europe and in the United States. Since then, he has released several successful singles and albums, including \"The Spark,\" \"Ten Feet Tall,\" and \"Forget the World.\"\r\n\r\nAside from his own music career, Afrojack has also worked as a producer for many famous artists such as Beyoncé, Pitbull, and Madonna. He has won several awards throughout his career, including a Grammy Award for his remix of \"Revolver\" by Madonna.'),
(5, 'Tiësto', 'house and electro', 'BOOM', 'Hot In It', 'Don\'t Be Shy', 'IndexPictureTiësto.jpg', '<iframe style=\"border-radius:12px\" src=\"https://open.spotify.com/embed/track/4plfgItPqtA9KQCUm2etj9?utm_source=generator\" width=\"100%\" height=\"352\" frameBorder=\"0\" allowfullscreen=\"\" allow=\"autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture\" loading=\"lazy\"></iframe>', '<iframe style=\"border-radius:12px\" src=\"https://open.spotify.com/embed/track/3Z7CaxQkqbIs1rewKi6v4W?utm_source=generator\" width=\"100%\" height=\"352\" frameBorder=\"0\" allowfullscreen=\"\" allow=\"autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture\" loading=\"lazy\"></iframe>', '<iframe style=\"border-radius:12px\" src=\"https://open.spotify.com/embed/track/0bI7K9Becu2dtXK1Q3cZNB?utm_source=generator\" width=\"100%\" height=\"352\" frameBorder=\"0\" allowfullscreen=\"\" allow=\"autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture\" loading=\"lazy\"></iframe>', 'TiestoDanceDetailedPage.jpg', 'Tiesto, born Tijs Michiel Verwest, is a Dutch DJ, record producer, and musician who is widely considered one of the pioneers of electronic dance music. With a career spanning over three decades, he has been one of the most successful DJs in the world.  Tiesto started his career as a DJ in the early 1990s and gained popularity in the late 1990s with his trance music style. He has released numerous albums, singles, and remixes, and has won many awards, including a Grammy for his remix of John Legend\'s \"All of Me\" in 2015.  Tiesto has also been a successful entrepreneur, co-founding the Black Hole Recordings record label in 1997, and the Musical Freedom label in 2009. He has also been involved in various philanthropic initiatives, including his own charity, the Tiesto Foundation, which raises funds for education and disaster relief.  Overall, Tiesto\'s career highlights include his contribution to the electronic dance music genre, his numerous awards, his successful record labels, and his philanthropic work. He has continued to push the boundaries of EDM and remains one of the most influential figures in the industry.'),
(6, 'Armin van Buuren', 'trance and techno', 'Turn It Up', 'Great Spirit', 'Blah Blah Blah', 'IndexPictureArminvanBuuren.jpg', '<iframe style=\"border-radius:12px\" src=\"https://open.spotify.com/embed/track/0eDI4488gNLeA7pssOZHOD?utm_source=generator\" width=\"100%\" height=\"352\" frameBorder=\"0\" allowfullscreen=\"\" allow=\"autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture\" loading=\"lazy\"></iframe>', '<iframe style=\"border-radius:12px\" src=\"https://open.spotify.com/embed/track/3Nku6gLNqnwUuq8GLkqyhW?utm_source=generator\" width=\"100%\" height=\"352\" frameBorder=\"0\" allowfullscreen=\"\" allow=\"autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture\" loading=\"lazy\"></iframe>', '<iframe style=\"border-radius:12px\" src=\"https://open.spotify.com/embed/track/2xkrujtSjZz7EKAYGbIIzH?utm_source=generator\" width=\"100%\" height=\"352\" frameBorder=\"0\" allowfullscreen=\"\" allow=\"autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture\" loading=\"lazy\"></iframe>', 'ArminVanBuuren.jpg', 'Armin van Buuren is a Dutch DJ, producer, and record label owner, known for his contributions to the trance music genre. He has been one of the most successful DJs in the world, with a career spanning more than two decades.  Van Buuren started his career as a DJ in the late 1990s, and he rose to fame with his radio show A State of Trance, which has been on air since 2001. He has released numerous albums, singles, and remixes, and he has won many awards, including five DJ Mag Top 100 DJ awards.  In addition to his music career, van Buuren is also a successful entrepreneur. He is the co-founder of the Armada Music record label, which has become one of the biggest independent dance music labels in the world. He has also been involved in various philanthropic initiatives, including the World Wildlife Fund and the Dance4Life Foundation.  Overall, Armin van Buuren\'s career highlights include his contribution to the trance music genre, his successful radio show, his numerous awards, his record label, and his philanthropic work. He continues to be a prominent figure in the electronic dance music industry and an inspiration to many aspiring DJs and producers.'),
(7, 'Martin Garrix', 'dance / electronic', 'Animal', 'In the name of love', 'High on life', 'IndexPictureMartinGarrix.jpg', '<iframe style=\"border-radius:12px\" src=\"https://open.spotify.com/embed/track/0A9mHc7oYUoCECqByV8cQR?utm_source=generator\" width=\"100%\" height=\"352\" frameBorder=\"0\" allowfullscreen=\"\" allow=\"autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture\" loading=\"lazy\"></iframe>', '<iframe style=\"border-radius:12px\" src=\"https://open.spotify.com/embed/track/23L5CiUhw2jV1OIMwthR3S?utm_source=generator\" width=\"100%\" height=\"352\" frameBorder=\"0\" allowfullscreen=\"\" allow=\"autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture\" loading=\"lazy\"></iframe>', '<iframe style=\"border-radius:12px\" src=\"https://open.spotify.com/embed/track/4ut5G4rgB1ClpMTMfjoIuy?utm_source=generator\" width=\"100%\" height=\"352\" frameBorder=\"0\" allowfullscreen=\"\" allow=\"autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture\" loading=\"lazy\"></iframe>', 'MartinGarrixDetailedPageImage.jpg', 'Martin Garrix is a Dutch DJ and producer who skyrocketed to fame in 2013 with his hit single \"Animals,\" which became a global sensation. At just 17 years old, he became the youngest DJ to perform at the Ultra Music Festival in Miami, and has since become a regular performer at major music festivals worldwide. Garrix has released several hit singles, including \"Scared to be Lonely\" and \"There for You,\" and has won numerous awards, including the \"World\'s No. 1 DJ\" by DJ Magazine in 2017.  In addition to his successful career as a DJ and producer, Garrix has also founded his own record label, STMPD RCRDS. The label has become a platform for new and emerging artists in the electronic dance music (EDM) scene. Garrix is also known for his philanthropic efforts, including his work with the charity organization SOS Children\'s Villages, which helps provide homes and families to children in need around the world.  With his incredible talent, impressive achievements, and dedication to giving back, Martin Garrix has become one of the most influential figures in the EDM industry, and a role model for aspiring artists and music fans alike.');

-- --------------------------------------------------------

--
-- Table structure for table `CartItems`
--

CREATE TABLE `CartItems` (
  `id` int(11) NOT NULL,
  `cartId` varchar(255) NOT NULL,
  `itemId` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `CartItems`
--

INSERT INTO `CartItems` (`id`, `cartId`, `itemId`, `type`, `quantity`) VALUES
(277, '2b794b55-8d7d-40bb-b21f-320805ba2fd2', 46, 'ticket', 1),
(278, '2b794b55-8d7d-40bb-b21f-320805ba2fd2', 67, 'ticket', 1),
(279, '2b794b55-8d7d-40bb-b21f-320805ba2fd2', 47, 'ticket', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Carts`
--

CREATE TABLE `Carts` (
  `Id` varchar(255) NOT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Carts`
--

INSERT INTO `Carts` (`Id`, `userId`) VALUES
('0236c3a8-ae48-463a-999d-74edf7e7a753', 18),
('043b84ef-71d4-4f43-8af6-b3c98c7a0ce6', NULL),
('0898c1e3-c867-4f02-aa41-ae6950ca3217', 19),
('1ea00920-0353-412c-9c26-b368677df598', NULL),
('2b794b55-8d7d-40bb-b21f-320805ba2fd2', NULL),
('35764146-bcef-4889-89aa-370740e0c340', 15),
('6fc48365-d08a-42fc-a876-b6193442905a', 20),
('78fb9e17-4a03-435f-b235-7ff4f9435185', 16);

-- --------------------------------------------------------

--
-- Table structure for table `ContentEditor`
--

CREATE TABLE `ContentEditor` (
  `id` int(11) NOT NULL,
  `pageName` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ContentEditor`
--

INSERT INTO `ContentEditor` (`id`, `pageName`, `content`) VALUES
(1, 'Home', '&lt;p&gt;&lt;a class=&quot;arrow-down&quot; href=&quot;#welcome&quot;&gt;&lt;svg class=&quot;bi bi-arrow-down-circle-fill&quot; fill=&quot;currentColor&quot; height=&quot;48&quot; viewbox=&quot;0 0 16 16&quot; width=&quot;48&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;&gt; &lt;path d=&quot;M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z&quot;&gt;&lt;/path&gt; &lt;/svg&gt; &lt;/a&gt;&lt;/p&gt;\r\n\r\n&lt;section class=&quot;welcomeSection container&quot; id=&quot;welcome&quot;&gt;\r\n&lt;article&gt;\r\n&lt;h1&gt;WELCOME TO HAARLEMM&lt;/h1&gt;\r\n\r\n&lt;p&gt;Haarlem has a charming historic center, renowned museums, stores, restaurants, and the beach is nearby. Welcome to the multifaceted city. On the one hand, hip concept stores and secret streets from a bygone period. The historic church and waterfront terraces are on the opposite side. French celebrity chefs to Dutch Masters. Pop concert to antique market. So, how about a memorable day of fun? Visit Haarlem and you will be pleasantly delighted by the sights, shops, and charming squares, by the old and modern artists, the jovial mood, and the fascinating history. You can find everything in Haarlem.&lt;/p&gt;\r\n&lt;/article&gt;\r\n&lt;img alt=&quot;3d moped illustration&quot; src=&quot;/img/VisitHaarlemImage.png&quot; /&gt;&lt;/section&gt;\r\n\r\n&lt;section class=&quot;interestingSection&quot;&gt;\r\n&lt;figure class=&quot;text-center&quot;&gt;\r\n&lt;p&gt;Interesting&lt;/p&gt;\r\n&lt;/figure&gt;\r\n\r\n&lt;figure class=&quot;festivalPromo&quot;&gt;&lt;img src=&quot;/img/VisitHaarlemFestivalPromo.png&quot; /&gt;\r\n&lt;div&gt;\r\n&lt;h4&gt;HAARLEM&lt;/h4&gt;\r\n\r\n&lt;p class=&quot;m-0&quot;&gt;FESTIVAL 2023&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;button class=&quot;btn btn-yellow-gradient&quot; onclick=&quot;document.location.href=&#039;/festival&#039;&quot; type=&quot;button&quot;&gt;READ MORE&lt;/button&gt;&lt;/figure&gt;\r\n\r\n&lt;figure class=&quot;visitHaarlemPromo&quot;&gt;\r\n&lt;figure&gt;&lt;img alt=&quot;&quot; src=&quot;/img/KidsPagePromo.png&quot; /&gt;\r\n&lt;h3&gt;Haarlem for Kids&lt;/h3&gt;\r\n\r\n&lt;p&gt;Have you ever seen 60,000 LEGO bricks in one space? That&amp;rsquo;s...&lt;/p&gt;\r\n&lt;button class=&quot;btn btn-red-gradient&quot; onclick=&quot;document.location.href=&#039;visithaarlem/kids&#039;&quot; type=&quot;button&quot;&gt;READ MORE&lt;/button&gt;&lt;/figure&gt;\r\n\r\n&lt;figure&gt;&lt;img alt=&quot;&quot; src=&quot;/img/FoodPagePromo.png&quot; /&gt;\r\n&lt;h3&gt;Top restaurants in Haarleem&lt;/h3&gt;\r\n\r\n&lt;p&gt;Discover the best restaurants you MUST visit in Haarlem.&lt;/p&gt;\r\n&lt;button class=&quot;btn btn-red-gradient&quot; onclick=&quot;document.location.href=&#039;visithaarlem/food&#039;&quot; type=&quot;button&quot;&gt;READ MORE&lt;/button&gt;&lt;/figure&gt;\r\n&lt;/figure&gt;\r\n&lt;/section&gt;\r\n\r\n&lt;section class=&quot;mobileAppPromoSection&quot;&gt;\r\n&lt;figure class=&quot;informationColumn&quot;&gt;\r\n&lt;div class=&quot;caption&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;/img/DoctorWho.png&quot; /&gt;\r\n&lt;p&gt;Haarlem mobile app&lt;/p&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;h1&gt;Interactive museum challenges&lt;/h1&gt;\r\n\r\n&lt;p&gt;Solve several interesting problems to find out the secret of Professor Tyler!&lt;/p&gt;\r\n\r\n&lt;h2&gt;Download the app&lt;/h2&gt;\r\n\r\n&lt;div class=&quot;downloadBtns&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;/img/AppStoreCTA.png&quot; /&gt; &lt;img alt=&quot;&quot; src=&quot;/img/GooglePlayCTA.png&quot; /&gt;&lt;/div&gt;\r\n\r\n&lt;p&gt;Point your camera at the QR code for easy download&lt;/p&gt;\r\n&lt;img alt=&quot;&quot; src=&quot;/img/QrCodeMobileApp.png&quot; /&gt;&lt;/figure&gt;\r\n\r\n&lt;figure class=&quot;mockupColumn&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;/img/MobileAppPromotion.png&quot; /&gt;&lt;/figure&gt;\r\n&lt;/section&gt;\r\n'),
(2, 'History', '&lt;header class=&quot;container mt-5 mb-5&quot;&gt;\r\n&lt;div class=&quot;row foodPageTitle&quot;&gt;\r\n&lt;h1&gt;Haarlemm&lt;/h1&gt;\r\n&amp;nbsp;\r\n\r\n&lt;h2&gt;for history&lt;/h2&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;carousel slide&quot; data-ride=&quot;carousel&quot; id=&quot;carouselExampleSlidesOnly&quot;&gt;\r\n&lt;div class=&quot;carousel-inner&quot;&gt;\r\n&lt;div class=&quot;carousel-item active&quot;&gt;&lt;img alt=&quot;First slide&quot; class=&quot;d-block w-100&quot; src=&quot;/img/History-Banner.png&quot; /&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/header&gt;\r\n\r\n&lt;section class=&quot;container mb-5&quot;&gt;\r\n&lt;h1 class=&quot;heading content-header&quot;&gt;Haarlem history&lt;/h1&gt;\r\n\r\n&lt;p&gt;Haarlem is a city and municipality at the same time located in the bank of river Spaarne. It is the capital of North Holland. It is a medium size city with 162,914 inhabitants. The neighboring cities of Haarlem are Bloemendaal, Hoofddorp, Zandvoort and Haarlemmermeer. This city was first mentioned in a document from the 10th century. In 1245 Haarlem received its recognition as a city from William II of Haarlem. This city has a rich history with old architectural buildings such as De Adriaan, Meat Hall, Taylers Hofje, The Dome etc. which attract tourists to visit the city.&lt;/p&gt;\r\n&lt;/section&gt;\r\n\r\n&lt;section class=&quot;container mb-5&quot;&gt;\r\n&lt;div class=&quot;row gy-3&quot;&gt;\r\n&lt;div class=&quot;card-bg-color col me-4 rounded p-3&quot; style=&quot;width: 18rem;&quot;&gt;&lt;img alt=&quot;Card image cap&quot; class=&quot;card-img-top p-3&quot; src=&quot;/img/History-Card1.png&quot; /&gt;\r\n&lt;div class=&quot;card-body p-3&quot;&gt;\r\n&lt;h5 class=&quot;card-text-color&quot;&gt;De Adriaan&lt;/h5&gt;\r\n\r\n&lt;p class=&quot;card-text-color&quot;&gt;De Adriaan a Wind Mill was built in 1778 by Adriaan de Boois (an Amsterdam enterpreneur). On may 19, 1779 , the mill started to use for grinding tuff into trass. Tras is added to masonry motor to make walls water light. In 1802, this mill was sold to a tobacconist, and he turn this mill into a tobacco factory.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;card-bg-color col rounded p-3&quot; style=&quot;width: 18rem;&quot;&gt;&lt;img alt=&quot;Card image cap&quot; class=&quot;card-img-top p-3&quot; src=&quot;/img/History-Card2.png&quot; /&gt;\r\n&lt;div class=&quot;card-body p-3&quot;&gt;\r\n&lt;h5 class=&quot;card-text-color&quot;&gt;St. Bavokerk&lt;/h5&gt;\r\n\r\n&lt;p class=&quot;card-text card-text-color&quot;&gt;The Grote or St.-Bavokerk (Historical Sint-Bavo Cathedral ) is a late medieval church building in the Dutch city of Haarlem, located on the Grote Markt. It was dedicated to Saint Bavo until the Reformation..&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;w-100&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n\r\n&lt;div class=&quot;card-bg-color col me-4 rounded p-3&quot; style=&quot;width: 18rem;&quot;&gt;&lt;img alt=&quot;Card image cap&quot; class=&quot;card-img-top p-3&quot; src=&quot;/img/History-Card3.png&quot; /&gt;\r\n&lt;div class=&quot;card-body p-3&quot;&gt;\r\n&lt;h5 class=&quot;card-text-color&quot;&gt;Dome Prison&lt;/h5&gt;\r\n\r\n&lt;p class=&quot;card-text card-text-color&quot;&gt;The dome prison is a former prison in Haarlem. It is one of three Panopticon-style buildings situated in the country. It was built in 1901 by Willem Metzelaar.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;card-bg-color col rounded p-3&quot; style=&quot;width: 18rem;&quot;&gt;&lt;img alt=&quot;Card image cap&quot; class=&quot;card-img-top p-3&quot; src=&quot;/img/History-Card4.png&quot; /&gt;\r\n&lt;div class=&quot;card-body p-3&quot;&gt;\r\n&lt;h5 class=&quot;card-text-color&quot;&gt;Teylers Museum&lt;/h5&gt;\r\n\r\n&lt;p class=&quot;card-text card-text-color&quot;&gt;Teylers Museum is an art, natural history, and science museum in Haarlem, Netherlands. Established in 1778, Teylers Museum was founded as a centre for contemporary art and science.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;w-100&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n\r\n&lt;div class=&quot;card-bg-color col me-4 rounded p-3&quot; style=&quot;width: 18rem;&quot;&gt;&lt;img alt=&quot;Card image cap&quot; class=&quot;card-img-top p-3&quot; src=&quot;/img/History-Card5.png&quot; /&gt;\r\n&lt;div class=&quot;card-body p-3&quot;&gt;\r\n&lt;h5 class=&quot;card-text-color&quot;&gt;Frans Hals Museum&lt;/h5&gt;\r\n\r\n&lt;p class=&quot;card-text card-text-color&quot;&gt;The Frans Hals Museum ( Frans Halsmuseum , formerly Stedelijk Museum van Haarlem ) is a museum in the North Holland city of Haarlem , founded in 1862, known as &amp;quot;museum of the Golden Age &amp;quot;. The collection is based on the rich collection of the city itself, which has been built up since the 16th century.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;card-bg-color col rounded p-3&quot; style=&quot;width: 18rem;&quot;&gt;&lt;img alt=&quot;Card image cap&quot; class=&quot;card-img-top p-3&quot; src=&quot;/img/History-Card6.png&quot; /&gt;\r\n&lt;div class=&quot;card-body p-3&quot;&gt;\r\n&lt;h5 class=&quot;card-text-color&quot;&gt;Hannie Schaft Memoria&lt;/h5&gt;\r\n\r\n&lt;p class=&quot;card-text card-text-color&quot;&gt;Jannetje Johanna (Jo) Schaft (16 September 1920 &amp;ndash; 17 April 1945) was a Dutch resistance fighter during World War II. She became known as &amp;quot;the girl with the red hair&amp;quot; (Dutch: het meisje met het rode haar, German: das M&amp;auml;dchen mit dem roten Haar). Her secret name in the resistance movement was &amp;quot;Hannie&amp;quot;.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/section&gt;\r\n'),
(3, 'Culture', '&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;row foodPageTitle&quot;&gt;\r\n&lt;h1&gt;Haarlem&lt;/h1&gt;\r\n&amp;nbsp;\r\n\r\n&lt;h2&gt;for culture&lt;/h2&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;VisitHaarlemCulture1&quot; id=&quot;VisitHaarlemCultureImg1&quot; src=&quot;/img/CulturepageImg.png&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;div&gt;\r\n&lt;h4 id=&quot;cultureText1&quot;&gt;What do you want to explore?&lt;/h4&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;!--change to cultureBox later--&gt;\r\n\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-md-4&quot;&gt;\r\n&lt;div class=&quot;MuseumBox&quot;&gt;&lt;img class=&quot;boxImg&quot; src=&quot;/img/MuseumBox.png&quot; /&gt; &lt;a class=&quot;text-reset&quot; href=&quot;/visithaarlem/museum&quot;&gt; &lt;img alt=&quot;museumBoxV2&quot; class=&quot;img-top&quot; src=&quot;/img/mesumBoxV2.png&quot; /&gt; &lt;/a&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;col-md-4&quot;&gt;\r\n&lt;div class=&quot;MuseumBox&quot;&gt;&lt;img class=&quot;boxImg&quot; src=&quot;/img/Theaterbox.png&quot; /&gt; &lt;a class=&quot;text-reset&quot; href=&quot;/visithaarlem/theatre&quot;&gt; &lt;img alt=&quot;museumBoxV2&quot; class=&quot;img-top&quot; src=&quot;/img/theaterboxV2.png&quot; /&gt; &lt;/a&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;col-md-4&quot;&gt;\r\n&lt;div class=&quot;MuseumBox&quot;&gt;&lt;img class=&quot;boxImg&quot; src=&quot;/img/Festivalbox.png&quot; /&gt; &lt;a class=&quot;text-reset&quot; href=&quot;/visithaarlem/festivalculture&quot;&gt; &lt;img alt=&quot;museumBoxV2&quot; class=&quot;img-top&quot; src=&quot;/img/festivalBoxV2.png&quot; /&gt; &lt;/a&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;container&quot;&gt;&amp;nbsp;\r\n&lt;h2 class=&quot;col-md-12&quot;&gt;Museum&lt;/h2&gt;\r\n\r\n&lt;div id=&quot;aaa&quot;&gt;\r\n&lt;div class=&quot;cardCulture1&quot;&gt;\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-md-6&quot;&gt;&lt;img alt=&quot;CultureMuseumImg1&quot; src=&quot;/img/CultureMuseumImg1.png&quot; /&gt;&lt;/div&gt;\r\n\r\n&lt;div class=&quot;col-md-6&quot;&gt;\r\n&lt;h1&gt;Verwey Museum Haarlem&lt;/h1&gt;\r\n\r\n&lt;p&gt;Haarlem&amp;rsquo;s most well known museum, Verwey showcases art and artifacts from Haarlem&amp;rsquo;s history.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;button class=&quot;buttonViewMore&quot; type=&quot;button&quot;&gt;View more museum&lt;/button&gt;\r\n\r\n&lt;div class=&quot;cardCulture2&quot;&gt;\r\n&lt;div class=&quot;row&quot; style=&quot;transform: matrix(-1, 0, 0, 1, 0, 0);&quot;&gt;\r\n&lt;div class=&quot;col-md-6&quot;&gt;\r\n&lt;h1&gt;Verwey Museum Haarlem&lt;/h1&gt;\r\n\r\n&lt;p&gt;This classical windmill was build 1773 and rebuild it in 2002 because it was eaten by fire.&lt;/p&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;col-md-6&quot;&gt;&lt;img alt=&quot;CultureMuseumImg2&quot; src=&quot;/img/CultureMuseumImg2.png&quot; /&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;container&quot;&gt;&amp;nbsp;\r\n&lt;h2 class=&quot;col-md-12&quot;&gt;Theatre&lt;/h2&gt;\r\n\r\n&lt;div class=&quot;cardCulture1&quot;&gt;\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-md-6&quot;&gt;&lt;img alt=&quot;CultureTheaterImg1&quot; src=&quot;/img/CultureTheaterImg1.png&quot; /&gt;&lt;/div&gt;\r\n\r\n&lt;div class=&quot;col-md-6&quot;&gt;\r\n&lt;h1&gt;Verwey Museum Haarlem&lt;/h1&gt;\r\n\r\n&lt;p&gt;Haarlem&amp;rsquo;s most well known museum, Verwey showcases art and artifacts from Haarlem&amp;rsquo;s history.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;b&gt;Address&lt;/b&gt;: Spaarne 96, 2011 CL Haarlem&lt;br /&gt;\r\n&lt;b&gt;Phone&lt;/b&gt;: 023 542 7270&lt;br /&gt;\r\n&lt;b&gt;Website&lt;/b&gt;: &lt;a href=&quot;https://ratatouillefoodandwine.nl&quot;&gt;https://ratatouillefoodandwine.nl&lt;/a&gt;&lt;br /&gt;\r\n&lt;b&gt;Price range&lt;/b&gt;: &amp;euro;&amp;lrm;&amp;euro;&amp;lrm;&amp;euro;&amp;lrm;&amp;euro;&amp;lrm;&lt;br /&gt;\r\n&lt;b&gt;Opening hours&lt;/b&gt;&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;button class=&quot;buttonViewMore&quot; type=&quot;button&quot;&gt;View more museum&lt;/button&gt;\r\n\r\n&lt;div class=&quot;cardCulture2&quot;&gt;\r\n&lt;div class=&quot;row&quot; style=&quot;transform: matrix(-1, 0, 0, 1, 0, 0);&quot;&gt;\r\n&lt;div class=&quot;col-md-6&quot;&gt;\r\n&lt;h1&gt;Verwey Museum Haarlem&lt;/h1&gt;\r\n\r\n&lt;p&gt;This classical windmill was build 1773 and rebuild it in 2002 because it was eaten by fire.&lt;/p&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;col-md-6&quot;&gt;&lt;img alt=&quot;CultureMuseumImg1&quot; src=&quot;/img/CultureTheaterImg2.png&quot; /&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;container mb-4&quot;&gt;&amp;nbsp;\r\n&lt;h2 class=&quot;col-md-12&quot;&gt;Festival&lt;/h2&gt;\r\n\r\n&lt;div class=&quot;cardCulture1&quot;&gt;\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-md-6&quot;&gt;&lt;img alt=&quot;CultureFestival1Img&quot; src=&quot;/img/CultureFestival1Img.png&quot; /&gt;&lt;/div&gt;\r\n\r\n&lt;div class=&quot;col-md-6&quot;&gt;\r\n&lt;h1&gt;Verwey Museum Haarlem&lt;/h1&gt;\r\n\r\n&lt;p&gt;Haarlem&amp;rsquo;s most well known museum, Verwey showcases art and artifacts from Haarlem&amp;rsquo;s history.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;button class=&quot;buttonViewMore&quot; type=&quot;button&quot;&gt;View more museum&lt;/button&gt;\r\n\r\n&lt;div class=&quot;cardCulture2&quot;&gt;\r\n&lt;div class=&quot;row&quot; style=&quot;transform: matrix(-1, 0, 0, 1, 0, 0);&quot;&gt;\r\n&lt;div class=&quot;col-md-6&quot;&gt;\r\n&lt;h1&gt;Verwey Museum Haarlem&lt;/h1&gt;\r\n\r\n&lt;p&gt;This classical windmill was build 1773 and rebuild it in 2002 because it was eaten by fire.&lt;/p&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;col-md-6&quot;&gt;&lt;img alt=&quot;CultureFestival1Img&quot; src=&quot;/img/CultureFestival2Img.png&quot; /&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n'),
(4, 'Food', '&lt;div class=&quot;container&quot;&gt;\r\n&lt;div class=&quot;row foodPageTitle&quot;&gt;\r\n&lt;h1&gt;Haarlem&lt;/h1&gt;\r\n&amp;nbsp;\r\n\r\n&lt;h2&gt;for food&lt;/h2&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;row foodpageWelcomeSection&quot;&gt;&lt;img alt=&quot;VisitHaarlemFood1&quot; src=&quot;/img/VisitHaarlemFood1.jpg&quot; /&gt;\r\n&lt;div class=&quot;container foodPageMsgBox&quot;&gt;\r\n&lt;p&gt;&lt;b&gt;In Haarlem food can be found anywhere: in the streets, in a corner, in a church or in a factory. You can decide if you want to eat something simple, delicious and cheap or something extraordinary in a very fancy restaurant. The food is so authentic that you can taste the flavour of the history and the culture make Haarlem so special and unique.&lt;/b&gt;&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-6&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n\r\n&lt;div class=&quot;col-3&quot;&gt;&lt;img alt=&quot;VisitHaarlemFood_Fries&quot; class=&quot;float-end&quot; id=&quot;FoodIntroSubImage&quot; src=&quot;/img/VisitHaarlemFood_Fries.jpg&quot; width=&quot;80%&quot; /&gt;&lt;/div&gt;\r\n\r\n&lt;div class=&quot;col-3&quot;&gt;&lt;img alt=&quot;VisitHaarlemFood_Haring&quot; class=&quot;float-end&quot; id=&quot;FoodIntroSubImage&quot; src=&quot;/img/VisitHaarlemFood_Haring.jpg&quot; width=&quot;80%&quot; /&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;row foodPageParagraph1&quot;&gt;\r\n&lt;div class=&quot;container&quot;&gt;\r\n&lt;p&gt;Haarlem is a Dutch city known for its rich history and vibrant culture. The city is home to a wide variety of restaurants and cafes, offering a range of cuisines, from traditional Dutch dishes to international favourites. One of the city&amp;#39;s most popular dining destinations is the Grote Markt, or Great Market, where visitors can sample fresh local produce and try delicious food from a variety of vendors. Haarlem is also home to several Michelin-starred restaurants, offering fine dining experiences for those looking for something truly special.&lt;br /&gt;\r\n&lt;br /&gt;\r\nWhether you&amp;#39;re a foodie looking for the latest culinary trends or a local looking for a cozy spot to enjoy a meal, Haarlem has something for everyone.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n'),
(5, 'Kids', '&lt;div class=&quot;container d-flex justify-content-between gap-5 kids-welcome-screen mt-4&quot;&gt;\r\n&lt;div class=&quot;col-6&quot;&gt;\r\n&lt;h1&gt;Haarlem&lt;/h1&gt;\r\n\r\n&lt;h2 class=&quot;mb-3&quot;&gt;for families and children&lt;/h2&gt;\r\n\r\n&lt;p&gt;Haarlem combines historic charm with a cultural edge and a food and drink scene to rival any big city. And, of course, its location on the edge of the coastal dunes means that the lure of the sea is never far away. With many families moving from Amsterdam to Haarlem for more space, it&amp;rsquo;s no wonder that the city has such a kid-friendly feel. Whether you&amp;rsquo;re visiting Haarlem with the kids or you&amp;rsquo;re a current resident looking for family days out in the city, here are a few suggestions to get you started.&lt;/p&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;col-4&quot;&gt;&lt;img alt=&quot;Kids Page Image&quot; class=&quot;img-fluid&quot; src=&quot;/img/KidsPageImage.png&quot; /&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;figure class=&quot;text-center kids-page&quot;&gt;\r\n&lt;h1&gt;The Secret of Professor Teyler&lt;/h1&gt;\r\n\r\n&lt;h4&gt;Kids program&lt;/h4&gt;\r\n&lt;/figure&gt;\r\n\r\n&lt;figure class=&quot;kids-event-banner&quot;&gt;\r\n&lt;div class=&quot;col1&quot;&gt;\r\n&lt;p&gt;The Secret of Professor Teyler is an interactive museum experience specially created for Kids. Through a series of science experiments and riddles clues are gathered to solve the secret of Professor Tyler.&lt;/p&gt;\r\n\r\n&lt;p class=&quot;dateInfo&quot;&gt;28 July - 31 July&lt;/p&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;col2&quot;&gt;\r\n&lt;p&gt;SEE MORE ABOUT MOBILE APP&lt;/p&gt;\r\n&lt;img alt=&quot;&quot; src=&quot;/img/ArrowDown.png&quot; /&gt;&lt;/div&gt;\r\n\r\n&lt;div class=&quot;col3&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;/img/BannerKid.png&quot; /&gt;&lt;/div&gt;\r\n&lt;/figure&gt;\r\n\r\n&lt;figure class=&quot;text-center shadow-text&quot;&gt;\r\n&lt;h1&gt;Why&lt;/h1&gt;\r\n\r\n&lt;p&gt;Haarlem is good for kids&lt;/p&gt;\r\n&lt;/figure&gt;\r\n\r\n&lt;section class=&quot;kids-benefits d-flex justify-content-center gap-5&quot;&gt;\r\n&lt;figure class=&quot;benefit&quot;&gt;\r\n&lt;div class=&quot;h-40 &quot;&gt;&lt;img alt=&quot;3d girl playing with dog&quot; class=&quot;img-fluid&quot; src=&quot;/img/KidsBenefit1.png&quot; /&gt;&lt;/div&gt;\r\n\r\n&lt;div class=&quot;h-40&quot;&gt;\r\n&lt;h1&gt;Zoos and Playgrounds&lt;/h1&gt;\r\n\r\n&lt;p&gt;Holland is home to about 550 petting zoos, locally known as Kinderboerderij, a Dutch word that means children&amp;rsquo;s farm. Most of these zoos were started in the 1950s...&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/figure&gt;\r\n\r\n&lt;figure class=&quot;benefit&quot;&gt;\r\n&lt;div class=&quot;h-40 mt-5&quot;&gt;&lt;img alt=&quot;3d girl playing with dog&quot; class=&quot;img-fluid&quot; src=&quot;/img/KidsBenefit2.png&quot; /&gt;&lt;/div&gt;\r\n\r\n&lt;div class=&quot;h-40&quot;&gt;\r\n&lt;h1&gt;Top Schools&lt;/h1&gt;\r\n\r\n&lt;p&gt;If you plan to settle here with your young family, there is a long list of international schools both in Haarlem and Amsterdam, but local Dutch...&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/figure&gt;\r\n\r\n&lt;figure class=&quot;benefit&quot;&gt;\r\n&lt;div class=&quot;h-40 &quot;&gt;&lt;img alt=&quot;3d girl playing with dog&quot; class=&quot;img-fluid&quot; src=&quot;/img/KidsBenefit3.png&quot; /&gt;&lt;/div&gt;\r\n\r\n&lt;div class=&quot;h-40&quot;&gt;\r\n&lt;h1&gt;Hospitals&lt;/h1&gt;\r\n\r\n&lt;p&gt;There are hospitals all around such that if your child gets injured while having fun, you do not have to worry about health care. These hospitals offer the best services to...&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/figure&gt;\r\n&lt;/section&gt;\r\n\r\n&lt;figure class=&quot;text-center shadow-text&quot;&gt;\r\n&lt;h1&gt;Where&lt;/h1&gt;\r\n\r\n&lt;p&gt;to go with kids&lt;/p&gt;\r\n&lt;/figure&gt;\r\n\r\n&lt;div class=&quot;container places-for-kids&quot;&gt;\r\n&lt;div class=&quot;row d-flex justify-content-between article&quot;&gt;\r\n&lt;div class=&quot;col-5 d-flex flex-column justify-content-between&quot;&gt;\r\n&lt;article&gt;\r\n&lt;h1&gt;ABC Architectuurcentrum&lt;/h1&gt;\r\n\r\n&lt;p&gt;Have you ever seen 60,000 LEGO bricks in one space? That&amp;rsquo;s what you&amp;#39;ll discover at Haarlem&amp;rsquo;s ABC Architectuurcentrum, a centre for architecture with its very own LEGO room. With so many bricks, kids can play and build to their heart&amp;rsquo;s content. But don&amp;rsquo;t forget the exhibitions about the architecture of Haarlem and surroundings: In the Haarlemzaal you&amp;#39;ll even find scale models, construction drawings and 3D-printed buildings.&lt;/p&gt;\r\n&lt;/article&gt;\r\n\r\n&lt;div class=&quot;findOnMap&quot;&gt;&lt;img alt=&quot;3d Map illustration&quot; src=&quot;/img/FindOnMapIcon.png&quot; /&gt; &lt;a href=&quot;&quot;&gt;Find on map&lt;/a&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;col-6&quot;&gt;&lt;img alt=&quot;ABC Architectuurcentrum&quot; class=&quot;img-fluid&quot; src=&quot;/img/KidsPlaces1.png&quot; /&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;row d-flex justify-content-between article&quot;&gt;\r\n&lt;div class=&quot;col-6&quot;&gt;&lt;img alt=&quot;Kindertheater De Toverknol&quot; class=&quot;img-fluid&quot; src=&quot;/img/KidsPlaces2.png&quot; /&gt;&lt;/div&gt;\r\n\r\n&lt;div class=&quot;col-5 d-flex flex-column justify-content-between&quot;&gt;\r\n&lt;article&gt;\r\n&lt;h1&gt;Kindertheater De Toverknol&lt;/h1&gt;\r\n\r\n&lt;p&gt;If you were to build a theatre out of the dreams of children, it would probably look something like the Kindertheater De Toverknol. As well as offering a magical new show each month, before each performance kids get to transform into princesses, pirates or whatever character they might like to become for the day from the theatre&amp;rsquo;s special racks of dressing up outfits. On top of that, Kindertheater de Toverknol hosts birthday parties, and offers acting workshops and dance and music lessons.&lt;/p&gt;\r\n&lt;/article&gt;\r\n\r\n&lt;div class=&quot;findOnMap&quot;&gt;&lt;img alt=&quot;3d Map illustration&quot; src=&quot;/img/FindOnMapIcon.png&quot; /&gt; &lt;a href=&quot;&quot;&gt;Find on map&lt;/a&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;row d-flex justify-content-between article&quot;&gt;\r\n&lt;div class=&quot;col-5&quot;&gt;&lt;img alt=&quot;Meneer Paprika&quot; class=&quot;img-fluid&quot; src=&quot;/img/KidsPlaces4.png&quot; /&gt;\r\n&lt;article class=&quot;mt-3&quot;&gt;\r\n&lt;h1&gt;Meneer Paprika&lt;/h1&gt;\r\n\r\n&lt;p&gt;If you&amp;rsquo;re in the city centre, take a pit stop at Meneer Paprika, a cafe and toy shop in one. Tables are arranged around a huge toddler-height train set so you can keep an eye on your little ones wherever you&amp;rsquo;re sat. Tante Steef (Aunty Steef) and Krokodil (crocodile) also offer a great selection of kids&amp;rsquo; toys big and small, with a see-saw outside Tante Steef and a fun slide inside Krokodil.&lt;/p&gt;\r\n&lt;/article&gt;\r\n\r\n&lt;div class=&quot;findOnMap mt-3&quot;&gt;&lt;img alt=&quot;3d Map illustration&quot; src=&quot;/img/FindOnMapIcon.png&quot; /&gt; &lt;a href=&quot;&quot;&gt;Find on map&lt;/a&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;div class=&quot;col-5&quot;&gt;&lt;img alt=&quot;Teylers Museum&quot; class=&quot;img-fluid&quot; src=&quot;/img/KidsPlaces3.png&quot; /&gt;\r\n&lt;article class=&quot;mt-3&quot;&gt;\r\n&lt;h1&gt;Teylers Museum&lt;/h1&gt;\r\n\r\n&lt;p&gt;Go fossil hunting in the oldest museum of the Netherlands! Slightly older kids will love the Teylers Museum of Wonder. Fantastic fossils, preserved beasts, sparkling minerals and impressive gadgets are just some of the weird and wonderful items on display at this beautiful museum, which combines art and science and is worth a visit just to admire the magnificent building.&lt;/p&gt;\r\n&lt;/article&gt;\r\n\r\n&lt;div class=&quot;findOnMap mt-3&quot;&gt;&lt;img alt=&quot;3d Map illustration&quot; src=&quot;/img/FindOnMapIcon.png&quot; /&gt; &lt;a href=&quot;&quot;&gt;Find on map&lt;/a&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;section class=&quot;mobileAppPromoSection&quot;&gt;\r\n&lt;figure class=&quot;informationColumn&quot;&gt;\r\n&lt;div class=&quot;caption&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;/img/DoctorWho.png&quot; /&gt;\r\n&lt;p&gt;Haarlem mobile app&lt;/p&gt;\r\n&lt;/div&gt;\r\n\r\n&lt;h1&gt;Interactive museum challenges&lt;/h1&gt;\r\n\r\n&lt;p&gt;Solve several interesting problems to find out the secret of Professor Tyler!&lt;/p&gt;\r\n\r\n&lt;h2&gt;Download the app&lt;/h2&gt;\r\n\r\n&lt;div class=&quot;downloadBtns&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;/img/AppStoreCTA.png&quot; /&gt; &lt;img alt=&quot;&quot; src=&quot;/img/GooglePlayCTA.png&quot; /&gt;&lt;/div&gt;\r\n\r\n&lt;p&gt;Point your camera at the QR code for easy download&lt;/p&gt;\r\n&lt;img alt=&quot;&quot; src=&quot;/img/QrCodeMobileApp.png&quot; /&gt;&lt;/figure&gt;\r\n\r\n&lt;figure class=&quot;mockupColumn&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;/img/MobileAppPromotion.png&quot; /&gt;&lt;/figure&gt;\r\n&lt;/section&gt;\r\n'),
(6, 'Museum', '<div class=\"container\">\n        <div class=\"foodPageTitle\">\n            <h1>Haarlem</h1>\n            <h2>For Culture</h2>\n            <h2>Museum</h2>\n        </div>\n        <img src=\"/img/MuseumImg1.png\" alt=\"VisitHaarlemCulture1\" id=\"VisitHaarlemMuseumImg1\">\n        <div class=\"row\">\n            <div class=\"col-md-12\">\n                <div class=\"MuseumBoxDetailedPage\">\n                    <img src=\"/img/MuseumBox.png\" alt=\"VisitHaarlemFood_Fries\" class=\"boxImgDetailedPage\">\n                    <a href=\"/visithaarlem/museum\" class=\"text-reset\">\n                        <img src=\"/img/mesumBoxV2.png\" class=\"img-topDetailPage\" alt=\"museumBoxV2\">\n                    </a>\n                </div>\n            </div>\n            <div class=\"col-md-12\">\n                <div class=\"MuseumBoxDetailedPage\" class=\"col-md-4\">\n                    <img src=\"/img/Theaterbox.png\" alt=\"VisitHaarlemFood_Fries\" class=\"boxImgDetailedPage\">\n                    <a href=\"/visithaarlem/theatre\" class=\"text-reset\">\n                        <img src=\"/img/theaterboxV2.png\" class=\"img-topDetailPage\" alt=\"museumBoxV2\">\n                    </a>\n                </div>\n            </div>\n            <div class=\"col-md-12\">\n                <div class=\"MuseumBoxDetailedPage\" class=\"col-md-4\">\n                    <img src=\"/img/Festivalbox.png\" alt=\"VisitHaarlemFood_Haring\" class=\"boxImgDetailedPage\">\n                    <a href=\"/visithaarlem/festivalculture\" class=\"text-reset\">\n                        <img src=\"/img/festivalBoxV2.png\" class=\"img-topDetailPage\" alt=\"museumBoxV2\">\n                    </a>\n                </div>\n            </div>\n        </div>\n    </div>\n    <div class=\"container mb-5\">\n        <h2>Museum</h2>\n        <div class=\"row\">\n            <div class=\"col-6\">\n                <div class=\"card\" id=\"museumCart\">\n                    <img src=\"/img/CultureMuseumImg1.png\" alt=\"CultureMuseumImg1\">\n                    <div class=\"card-body\">\n                        <h1>Verwey Museum Haarlem</h1>\n                        <p>Haarlem’s most well known museum, Verwey showcases art and artifacts from Haarlem’s history.\n                        <p><b>Address</b>: Groot Heiligland 47, 2011 EP Haarlem <br>\n                            <b>Phone</b>:023 542 2427 <br>\n                            <b>Website</b>: <a href=\"https://museumhaarlem.nl/\">https://ratatouillefoodandwine.nl</a><br>\n\n                        </p>\n                    </div>\n                </div>\n            </div>\n            <div class=\"col-6\">\n                <div class=\"card\" id=\"museumCart\">\n                    <img src=\"/img/CultureMuseumImg2.png\" alt=\"CultureMuseumImg1\">\n                    <div class=\"card-body\">\n                        <h1>Windmill De Adriaan</h1>\n                        <p>\n                            This classical windmill was build 1773 and rebuild it in 2002 because it was eaten by\n                            fire.\n                        </p>\n                        <p><b>Address</b>: Papentorenvest 1A, 2011 AV Haarlem <br>\n                            <b>Phone</b>:023 545 0259<br>\n                            <b>Website</b>: <a href=\"https://www.molenadriaan.nl/nl/\">https://www.molenadriaan.nl/nl/</a><br>\n\n                        </p>\n                    </div>\n                </div>\n            </div>\n        </div>\n    </div>'),
(7, 'Theatre', '<div class=\"container\">\r\n        <div class=\"foodPageTitle\">\r\n            <h1>Haarlem</h1>\r\n            <h2>For Culture</h2>\r\n            <h2>Theatre</h2>\r\n        </div>\r\n        <img src=\"/img/CultureTheatreImg3.png\" alt=\"VisitHaarlemCulture1\" id=\"VisitHaarlemMuseumImg1\">\r\n        <div class=\"row\">\r\n            <div class=\"col-md-12\">\r\n                <div class=\"MuseumBoxDetailedPage\">\r\n                    <img src=\"/img/MuseumBox.png\" alt=\"VisitHaarlemFood_Fries\" class=\"boxImgDetailedPage\">\r\n                    <a href=\"/visithaarlem/museum\" class=\"text-reset\">\r\n                        <img src=\"/img/mesumBoxV2.png\" class=\"img-topDetailPage\" alt=\"museumBoxV2\">\r\n                    </a>\r\n                </div>\r\n            </div>\r\n            <div class=\"col-md-12\">\r\n                <div class=\"MuseumBoxDetailedPage\" class=\"col-md-4\">\r\n                    <img src=\"/img/Theaterbox.png\" alt=\"VisitHaarlemFood_Fries\" class=\"boxImgDetailedPage\">\r\n                    <a href=\"/visithaarlem/theatre\" class=\"text-reset\">\r\n                        <img src=\"/img/theaterboxV2.png\" class=\"img-topDetailPage\" alt=\"museumBoxV2\">\r\n                    </a>\r\n                </div>\r\n            </div>\r\n            <div class=\"col-md-12\">\r\n                <div class=\"MuseumBoxDetailedPage\" class=\"col-md-4\">\r\n                    <img src=\"/img/Festivalbox.png\" alt=\"VisitHaarlemFood_Haring\" class=\"boxImgDetailedPage\">\r\n                    <a href=\"/visithaarlem/festivalculture\" class=\"text-reset\">\r\n                        <img src=\"/img/festivalBoxV2.png\" class=\"img-topDetailPage\" alt=\"museumBoxV2\">\r\n                    </a>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n    <div class=\"container mb-5\">\r\n        <h2>Theater</h2>\r\n        <div class=\"row\">\r\n            <div class=\"col-6\">\r\n                <div class=\"card\" id=\"museumCart\">\r\n                    <img src=\"/img/CultureTheaterImg1.png\" alt=\"CultureMuseumImg1\">\r\n                    <div class=\"card-body\">\r\n                        <h1>Verwey Museum Haarlem</h1>\r\n                        <p>Haarlem’s most well known museum, Verwey showcases art and artifacts from Haarlem’s history.\r\n                        <p><b>Address</b>: Groot Heiligland 47, 2011 EP Haarlem <br>\r\n                            <b>Phone</b>:023 542 2427 <br>\r\n                            <b>Website</b>:\r\n                            <a href=\"https://museumhaarlem.nl/\">https://ratatouillefoodandwine.nl\r\n                            </a><br>\r\n                        </p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n            <div class=\"col-6\">\r\n                <div class=\"card\" id=\"museumCart\">\r\n                    <img src=\"/img/CultureTheaterImg2.png\" alt=\"CultureMuseumImg1\">\r\n                    <div class=\"card-body\">\r\n                        <h1>Windmill De Adriaan</h1>\r\n                        <p>\r\n                            This classical windmill was build 1773 and rebuild it in 2002 because it was eaten by\r\n                            fire.\r\n                        </p>\r\n                        <p><b>Address</b>: Papentorenvest 1A, 2011 AV Haarlem <br>\r\n                            <b>Phone</b>:023 545 0259<br>\r\n                            <b>Website</b>: <a href=\"https://www.molenadriaan.nl/nl/\">https://www.molenadriaan.nl/nl/</a><br>\r\n\r\n                        </p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>'),
(8, 'CultureFestival', ' <div class=\"container\">\r\n        <div class=\"foodPageTitle\">\r\n            <h1>Haarlem</h1>\r\n            <h2>For Culture</h2>\r\n            <h2>Festival</h2>\r\n        </div>\r\n\r\n        <img src=\"/img/CultureFestivalImg3.png\" alt=\"VisitHaarlemCulture1\" id=\"VisitHaarlemMuseumImg1\">\r\n        <div class=\"row\">\r\n            <div class=\"col-md-12\">\r\n                <div class=\"MuseumBoxDetailedPage\">\r\n                    <img src=\"/img/MuseumBox.png\" alt=\"VisitHaarlemFood_Fries\" class=\"boxImgDetailedPage\">\r\n                    <a href=\"/visithaarlem/museum\" class=\"text-reset\">\r\n                        <img src=\"/img/mesumBoxV2.png\" class=\"img-topDetailPage\" alt=\"museumBoxV2\">\r\n                    </a>\r\n                </div>\r\n            </div>\r\n            <div class=\"col-md-12\">\r\n                <div class=\"MuseumBoxDetailedPage\" class=\"col-md-4\">\r\n                    <img src=\"/img/Theaterbox.png\" alt=\"VisitHaarlemFood_Fries\" class=\"boxImgDetailedPage\">\r\n                    <a href=\"/visithaarlem/theatre\" class=\"text-reset\">\r\n                        <img src=\"/img/theaterboxV2.png\" class=\"img-topDetailPage\" alt=\"museumBoxV2\">\r\n                    </a>\r\n                </div>\r\n            </div>\r\n            <div class=\"col-md-12\">\r\n                <div class=\"MuseumBoxDetailedPage\" class=\"col-md-4\">\r\n                    <img src=\"/img/Festivalbox.png\" alt=\"VisitHaarlemFood_Haring\" class=\"boxImgDetailedPage\">\r\n                    <a href=\"/visithaarlem/festivalculture\" class=\"text-reset\">\r\n                        <img src=\"/img/festivalBoxV2.png\" class=\"img-topDetailPage\" alt=\"museumBoxV2\">\r\n                    </a>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n    <div class=\"container mb-5\">\r\n        <h2>Festival</h2>\r\n        <div class=\"row\">\r\n            <div class=\"col-6\">\r\n                <div class=\"card\" id=\"museumCart\">\r\n                    <img src=\"/img/CultureFestival1Img.png\" alt=\"CultureMuseumImg1\">\r\n                    <div class=\"card-body\">\r\n                        <h1>Verwey Museum Haarlem</h1>\r\n                        <p>Haarlem’s most well known museum, Verwey showcases art and artifacts from Haarlem’s history.\r\n                        <p><b>Address</b>: Groot Heiligland 47, 2011 EP Haarlem <br>\r\n                            <b>Phone</b>:023 542 2427 <br>\r\n                            <b>Website</b>: <a href=\"https://museumhaarlem.nl/\">https://ratatouillefoodandwine.nl</a><br>\r\n\r\n                        </p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n            <div class=\"col-6\">\r\n                <div class=\"card\" id=\"museumCart\">\r\n                    <img src=\"/img/CultureFestival2Img.png\" alt=\"CultureMuseumImg1\">\r\n                    <div class=\"card-body\">\r\n                        <h1>Windmill De Adriaan</h1>\r\n                        <p>\r\n                            This classical windmill was build 1773 and rebuild it in 2002 because it was eaten by\r\n                            fire.\r\n                        </p>\r\n                        <p><b>Address</b>: Papentorenvest 1A, 2011 AV Haarlem <br>\r\n                            <b>Phone</b>:023 545 0259<br>\r\n                            <b>Website</b>: <a href=\"https://www.molenadriaan.nl/nl/\">https://www.molenadriaan.nl/nl/</a><br>\r\n\r\n                        </p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>');

-- --------------------------------------------------------

--
-- Table structure for table `Dance`
--

CREATE TABLE `Dance` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `session` varchar(255) NOT NULL,
  `duration` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Dance`
--

INSERT INTO `Dance` (`id`, `date`, `day`, `time`, `session`, `duration`) VALUES
(20, '27 Jul', 'Friday', '20:00:00', 'Back2Back', '06:00:00'),
(45, '27 Jul', 'Friday', '22:00:00', 'Club ', '01:30:00'),
(46, '27 Jul', 'Friday', '23:00:00', 'Club', '01:30:00'),
(47, '27 Jul', 'Friday', '22:00:00', 'Club', '01:30:00'),
(48, '27 Jul', 'Friday', '22:00:00', 'Club', '01:30:00'),
(57, '28 Jul', 'Saturday', '14:00:00', 'Back2Back', '09:00:00'),
(58, '28 Jul', 'Saturday', '22:00:00', 'Club', '01:30:00'),
(59, '28 Jul', 'Saturday', '21:00:00', 'TiëstoWorld', '04:00:00'),
(60, '28 Jul', 'Saturday', '23:00:00', 'Club', '01:30:00'),
(61, '29 Jul', 'Sunday', '14:00:00', 'Back2Back', '09:00:00'),
(62, '29 Jul', 'Sunday', '19:00:00', 'Club', '01:30:00'),
(63, '29 Jul', 'Sunday', '21:00:00', 'Club', '01:30:00'),
(64, '29 Jul', 'Sunday', '18:00:00', 'Club', '01:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `DanceArtists`
--

CREATE TABLE `DanceArtists` (
  `id` int(11) NOT NULL,
  `danceId` int(11) NOT NULL,
  `artistId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `DanceArtists`
--

INSERT INTO `DanceArtists` (`id`, `danceId`, `artistId`) VALUES
(3, 45, 5),
(5, 47, 6),
(6, 48, 7),
(7, 57, 1),
(8, 57, 7),
(9, 57, 6),
(10, 58, 4),
(11, 59, 5),
(12, 60, 2),
(14, 61, 5),
(15, 61, 4),
(16, 62, 6),
(23, 66, 6),
(31, 45, 1),
(34, 46, 2),
(35, 46, 4),
(46, 20, 1),
(47, 20, 2),
(48, 20, 7);

-- --------------------------------------------------------

--
-- Table structure for table `OrderItems`
--

CREATE TABLE `OrderItems` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `OrderItems`
--

INSERT INTO `OrderItems` (`id`, `orderId`, `itemId`, `type`, `quantity`) VALUES
(106, 51, 46, 'ticket', 3),
(107, 51, 57, 'reservation', 1),
(109, 52, 67, 'ticket', 1),
(110, 52, 58, 'ticket', 1),
(111, 52, 59, 'reservation', 1),
(112, 53, 45, 'ticket', 2),
(113, 53, 61, 'reservation', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL,
  `invoiceNr` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`id`, `userId`, `date`, `status`, `invoiceNr`) VALUES
(51, 19, '2023-04-10 00:00:00', 'paid', '28fbb061-95b2-4716-a7dc-0223bc5b9c47'),
(52, 19, '2023-04-10 00:00:00', 'paid', '2679396d-609d-434d-92c9-3546a5bba70b'),
(53, 19, '2023-04-10 00:00:00', 'paid', '38015deb-e03d-43d7-811f-898b55c1b3df');

-- --------------------------------------------------------

--
-- Table structure for table `Payments`
--

CREATE TABLE `Payments` (
  `Id` varchar(255) NOT NULL,
  `orderId` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Payments`
--

INSERT INTO `Payments` (`Id`, `orderId`, `amount`) VALUES
('tr_8ghMqk6hmX', 52, 324),
('tr_nWhsxxod7w', 53, 357),
('tr_VVEd8P6CzM', 51, 327);

-- --------------------------------------------------------

--
-- Table structure for table `Reservations`
--

CREATE TABLE `Reservations` (
  `id` int(11) NOT NULL,
  `restaurantId` int(11) NOT NULL,
  `sessionId` int(11) NOT NULL,
  `amountAbove12` int(11) NOT NULL,
  `amountUnderOr12` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `comments` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Reservations`
--

INSERT INTO `Reservations` (`id`, `restaurantId`, `sessionId`, `amountAbove12`, `amountUnderOr12`, `date`, `comments`, `status`) VALUES
(48, 12, 18, 1, 2, '2022-07-29', '3', 'active'),
(49, 13, 16, 1, 2, '2022-07-27', 'd', 'active'),
(57, 12, 18, 1, 2, '2022-07-28', 'dada', 'active'),
(59, 12, 14, 1, 1, '2022-07-28', '', 'active'),
(61, 12, 13, 2, 3, '2022-07-28', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `Restaurants`
--

CREATE TABLE `Restaurants` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cuisine` varchar(255) NOT NULL,
  `foodType` varchar(255) NOT NULL,
  `sessionDuration` float NOT NULL,
  `priceIndicator` int(11) NOT NULL,
  `priceAge12AndUnder` float DEFAULT NULL,
  `rating` float NOT NULL,
  `hasMichelin` tinyint(1) NOT NULL,
  `isFestival` tinyint(1) NOT NULL,
  `priceAboveAge12` float DEFAULT NULL,
  `phoneNumber` int(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `coverImg` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Restaurants`
--

INSERT INTO `Restaurants` (`id`, `name`, `cuisine`, `foodType`, `sessionDuration`, `priceIndicator`, `priceAge12AndUnder`, `rating`, `hasMichelin`, `isFestival`, `priceAboveAge12`, `phoneNumber`, `address`, `website`, `coverImg`, `description`) VALUES
(12, 'Ratatouille ', 'French and European', 'Fish and Seafood', 1.5, 4, 22.5, 4, 1, 1, 45, 235427270, 'Spaarne 96, 2011 CL Haarlem', 'ratatouillefoodandwine.nl ', 'RatatouilleCoverImg.jpg', 'This restaurant serves a mix of French and European cuisines.\r\n                                The dishes and signature dishes are perfectly and freshly preprepared by chef Jozua Jaring.\r\n                                It all started in 2013 and keep evolving until 2014 when they got awarded with a Michelin star.\r\n                                In 2015 they move to a new location which is today’s Ratatouille with a better environment,\r\n                                so the people can enjoy even more. Beside the amazing dishes, their wine makes it even better!'),
(13, 'Urban Frenchy Bistro Toujours', 'Dutch and European', 'Fish and seafood', 1.5, 2, 17.5, 3, 0, 1, 35, 235321699, 'Oude Groenmarkt 10-12,2011', 'restauranttoujours.nl', 'TroujoursCoverImg.jpg', 'A restauran that has an urban and bistro vibr. Beside food, there’s also a bar that serves amaing cocktailes, wines and beers. One of their signature dish is the juicy lobster and of course everything with a affordable price.'),
(14, 'Specktakel', 'European, International and Asian', 'Seafood and Fish', 1.5, 2, 17.5, 4, 0, 1, 35, 235323841, 'Spekstraat 4, 2011 HM Haarlem', 'specktakel.nl', 'SpecktakelCoverImg.jpg', 'Spectacle in a unique World Restaurant centrally located in the heart of Haarlem. With a special covered courtyard and a terrace with a view of the historic Vleeshal and the centuries-old Bavo church. In the world kitchen, true works of art are created where every sense is stimulated.'),
(15, 'Grand Cafe Brinkman', 'Dutch, European and Modern', 'Fish and Seafood', 1.5, 2, 17.5, 3, 0, 1, 35, 235323111, 'Grote Markt 13, 2011 RC Haarlem', 'grandcafebrinkmann.nl', 'GrandCafeBrinkmanCoverImg.jpg', 'Café Brinkmann has been a well-known establishment in Haarlem and its surrounding areas since 1879, offering great food, perfect coffee, and a friendly and efficient staff. The café is located in a historic building in the heart of the city, with a large terrace that captures every ray of sunshine. It is a hospitable place where you can enjoy breakfast, coffee with pastry, lunch, drinks, and dinner, as well as host meetings and parties. Whether you want to relax with a cup of coffee or have a full meal, Café Brinkmann is a must-visit in Haarlem.'),
(19, 'Claude Moneyy', 'French', 'Small plates', 1, 3, 4, 4.5, 0, 1, 12, 2147483647, '1031XT Amsterdam', 'haarlem.nl', 'gdf18.jpeg', 'Dont come here');

-- --------------------------------------------------------

--
-- Table structure for table `Sessions`
--

CREATE TABLE `Sessions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `startTime` time NOT NULL,
  `restaurantId` int(11) NOT NULL,
  `endTime` time NOT NULL,
  `seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Sessions`
--

INSERT INTO `Sessions` (`id`, `name`, `startTime`, `restaurantId`, `endTime`, `seats`) VALUES
(1, 'Session 1', '17:00:00', 12, '19:30:00', 47),
(13, 'Session 2', '19:15:00', 12, '21:15:00', 47),
(14, 'Session 3', '21:30:00', 12, '23:30:00', 50),
(15, 'Session 1', '17:30:00', 13, '18:45:00', 48),
(16, 'Session 2', '19:00:00', 13, '20:15:00', 48),
(17, 'Session 3', '21:00:00', 13, '22:15:00', 48),
(18, 'session 4', '12:00:00', 12, '14:00:00', 6),
(19, 'Session ', '19:00:00', 19, '21:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Tickets`
--

CREATE TABLE `Tickets` (
  `id` int(11) NOT NULL,
  `time` time DEFAULT NULL,
  `session` varchar(255) NOT NULL,
  `duration` time DEFAULT NULL,
  `venueId` int(11) DEFAULT NULL,
  `ticketAvailable` int(11) DEFAULT NULL,
  `price` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Tickets`
--

INSERT INTO `Tickets` (`id`, `time`, `session`, `duration`, `venueId`, `ticketAvailable`, `price`, `date`) VALUES
(20, '20:00:00', 'Back2Back', '06:00:00', 4, 1, 75, '2023-07-27'),
(45, '22:00:00', 'Club ', '01:30:00', 1, 196, 60, '2023-07-27'),
(46, '23:00:00', 'Club', '01:30:00', 3, 297, 60, '2023-07-27'),
(47, '22:00:00', 'Club', '01:30:00', 6, 200, 60, '2023-07-27'),
(48, '22:00:00', 'Club', '01:30:00', 5, 200, 60, '2023-07-27'),
(57, '14:00:00', 'Back2Back', '09:00:00', 2, 2000, 110, '2023-07-28'),
(58, '22:00:00', 'Club', '01:30:00', 3, 299, 60, '2023-07-28'),
(59, '21:00:00', 'TiëstoWorld', '04:00:00', 4, 1500, 75, '2023-07-28'),
(60, '23:00:00', 'Club', '01:30:00', 1, 200, 60, '2023-07-28'),
(61, '14:00:00', 'Back2Back', '09:00:00', 2, 2000, 110, '2023-07-29'),
(62, '19:00:00', 'Club', '01:30:00', 3, 300, 60, '2023-07-29'),
(63, '21:00:00', 'Club', '01:30:00', 6, 1500, 90, '2023-07-29'),
(64, '18:00:00', 'Club', '01:30:00', 1, 0, 60, '2023-07-29'),
(65, NULL, 'All Access Pass', NULL, NULL, NULL, 250, '2023-07-27'),
(66, NULL, 'Day Pass Thursday', NULL, NULL, NULL, 125, '2023-07-27'),
(67, NULL, 'Day Pass Friday', NULL, NULL, NULL, 150, '2023-07-28'),
(68, NULL, 'Day Pass Saturday', NULL, NULL, NULL, 150, '2023-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `TicketTokens`
--

CREATE TABLE `TicketTokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `orderItemId` int(11) NOT NULL,
  `isUsed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `TicketTokens`
--

INSERT INTO `TicketTokens` (`id`, `token`, `orderItemId`, `isUsed`) VALUES
(62, 'b42f178ee9ae106d9fa5d406a0f0e6333c07c2ff354c0df273387f52f7690c9f', 106, 0),
(63, '9fb539a5cfeb8ce2793bec6f974b27610250f3a2f4759b035e77e03156427735', 106, 0),
(64, '1bf2e7ed7277f55b75eed4a128cca098d979b04f8770f4eb6b1fbf60455725c3', 106, 0),
(65, '31d24f795f30d116003cf2d4ec00e1407f917155ed3b688a58e4c81675d43c63', 107, 0),
(66, '1205533a7977345651c52d1b89e8c2da7ec255939630504ed54cf608fc585e36', 110, 0),
(67, '0fc8ae0e25a7bc275f0e315ea39fd5bce45f010addd11a71e62a50e23ebc16c7', 109, 0),
(68, '93c45633120f0ea1c221b1342a6cd15be202a07d351cc9cc58a4144391e3d5bf', 111, 0),
(69, 'd44dceb02a70543d57d024ab9447a0ec0f1f783d82d00a9ef6bd522c70901cf8', 112, 1),
(70, '9299f3a3e45f07355293b94ff7b63e3b767777d85448bc6ec83889d888a8afad', 112, 1),
(71, '9c1d395d89d107e1102cfec5b0aa8515ed4628bd9b92a153d6fa2f3deaf706e2', 113, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(512) NOT NULL,
  `userType` int(11) NOT NULL,
  `resetLinkToken` varchar(255) DEFAULT NULL,
  `profilePicture` varchar(255) NOT NULL DEFAULT 'DefaultProfile.png',
  `registrationDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `username`, `email`, `password`, `userType`, `resetLinkToken`, `profilePicture`, `registrationDate`) VALUES
(19, 'root', 'pinthepenguin.nft@gmail.com', '$2y$10$3EFIDe2KX3OojCkQYIbrHOs0NPBhbhvRxOXTcBstkHw3gs27BLDqq', 2, NULL, 'DefaultProfile.png', '2023-04-10 12:38:42'),
(20, 'admin', 'admin@test.nl', '$2y$10$gBPwOVBp2jYBOrAEtsdrCOqVLvcj8/XiXClaVyDIUuyagLvAdXZea', 0, NULL, 'DefaultProfile.png', '2023-04-10 13:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `Venues`
--

CREATE TABLE `Venues` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Venues`
--

INSERT INTO `Venues` (`id`, `name`, `address`, `image`) VALUES
(1, 'New Venue', 'Kromme Elleboogsteeg 20, 2011 TS Haarlem', 'ClubStalkerImage.png'),
(2, 'Caprera Openluchttheater ', 'Hoge Duin en Daalseweg 2, 2061 AG Bloemendaal', 'CapreraOpenluchttheaterImage.png'),
(3, 'Jopenkerk', 'Gedempte Voldersgracht 2, 2011 WD Haarlem', 'JopenkerkImage.png'),
(4, 'Lichtfabriek', 'Minckelersweg 2, 2031 EM Haarlem', 'LichtfabriekImage.png'),
(5, 'Club Ruis', 'Smedestraat 31, 2011 RE Haarlem', 'ClubRuisImage.png'),
(6, 'XO the Club :)', 'Grote Markt 8, 2011 RD Haarlem', 'XOtheClub.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `APIKeys`
--
ALTER TABLE `APIKeys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `Artists`
--
ALTER TABLE `Artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CartItems`
--
ALTER TABLE `CartItems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CartItems_ibfk_1` (`itemId`),
  ADD KEY `cartId` (`cartId`);

--
-- Indexes for table `Carts`
--
ALTER TABLE `Carts`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ContentEditor`
--
ALTER TABLE `ContentEditor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Dance`
--
ALTER TABLE `Dance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `DanceArtists`
--
ALTER TABLE `DanceArtists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `DanceArtists_ibfk_1` (`artistId`),
  ADD KEY `DanceArtists_ibfk_2` (`danceId`);

--
-- Indexes for table `OrderItems`
--
ALTER TABLE `OrderItems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Payments`
--
ALTER TABLE `Payments`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Reservations`
--
ALTER TABLE `Reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Restaurants`
--
ALTER TABLE `Restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Sessions`
--
ALTER TABLE `Sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Tickets`
--
ALTER TABLE `Tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TicketTokens`
--
ALTER TABLE `TicketTokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Venues`
--
ALTER TABLE `Venues`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `APIKeys`
--
ALTER TABLE `APIKeys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Artists`
--
ALTER TABLE `Artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `CartItems`
--
ALTER TABLE `CartItems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=287;

--
-- AUTO_INCREMENT for table `ContentEditor`
--
ALTER TABLE `ContentEditor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Dance`
--
ALTER TABLE `Dance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `DanceArtists`
--
ALTER TABLE `DanceArtists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `OrderItems`
--
ALTER TABLE `OrderItems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `Reservations`
--
ALTER TABLE `Reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `Restaurants`
--
ALTER TABLE `Restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `Sessions`
--
ALTER TABLE `Sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `Tickets`
--
ALTER TABLE `Tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `TicketTokens`
--
ALTER TABLE `TicketTokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `Venues`
--
ALTER TABLE `Venues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CartItems`
--
ALTER TABLE `CartItems`
  ADD CONSTRAINT `CartItems_ibfk_1` FOREIGN KEY (`cartId`) REFERENCES `Carts` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `DanceArtists`
--
ALTER TABLE `DanceArtists`
  ADD CONSTRAINT `DanceArtists_ibfk_1` FOREIGN KEY (`artistId`) REFERENCES `Artists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `DanceArtists_ibfk_2` FOREIGN KEY (`danceId`) REFERENCES `Tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
