-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 01, 2019 at 05:26 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `block2_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `title` varchar(100) NOT NULL,
  `logo_fk` varchar(110) NOT NULL,
  `owner_fk` varchar(50) NOT NULL,
  `webmaster_fk` varchar(100) NOT NULL,
  `smallcontact` varchar(500) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`title`, `logo_fk`, `owner_fk`, `webmaster_fk`, `smallcontact`, `id`) VALUES
('P.Lemelin Construction', '1', '1', '2', '<form action="core.php" method="POST"><label>INFORMATION</label><br><input type="text" name="name" placeholder="Name"><br><input type="email" name="email" placeholder="Email"><br><input type="tel" name="telephone" placeholder="Telephone"><br><textarea rows="3" cols="18" name="comment" placeholder="Votre Question"></textarea><br><input type="submit" name="FormSubmit" value="Envoyer"></form>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `subtitle` varchar(64) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `subtitle`, `content`) VALUES
(1, 'Home', 'Home', '<img src="uploads/579e0bdba816c7426e2e1d8d06f1727a.jpg" alt=" 5 : Divers 1 - Divers1 "><p>Experience the magic of a balloon ride while floating over beautiful Cappadocia. We fly throughout Cappadocia and our personal touch and professional experience will make your flight a memorable event. We schedule flights once a day, every day, all year round.\n\nOur goal is to premium Hot Air Balloon Rides for all to enjoy. We strive to make your Hot Air Balloon Ride over scenic Cappadocia a wonderful experience that you will cherish for years to come.\n\nTo be an establishment offering hot air ballooning flights in out region, all over Turkey and abroad taking our customer\'s and employee\'s contentment into consideration with our modern and forward-looking understanding of high quality service and to provide service at top level.</p><hr /><h3>Experience Talks</h3><img src="uploads/e1fb853f48a91147128233712419f9bd.jpg" alt=" 6 : Condo 1 - Condo 1 "><p>Warm Welcome\nWe make your transfer with luxury mini buses from your hotel to our indoor restaurant one hour prior to sunrise. Simply, you are free of winds, dust and cold.</p><a href=\'http://127.0.0.1/GIT/team2wcms/admin.php\' target=\'_blank\' >Some Link</a><h3>Unforgettable Experience</h3><p>To offer a best possible flight and experience, we choose the most suitable take-off site for the day\'s flight, depending on the direction and the strength of winds.</p><h3>Personalised Service</h3><p>Enchantment, romance, and excitement fill every colorful moment of this graceful adventure. The flight will last an hour but the memories will last a lifetime.</p><hr /><h3>Top 10 Of What Makes Us Unique</h3><p>We are proud to maintain the best safety record in 18 years of flying over Cappadocia.\nWe fly the newest, spacious, and well-maintained balloon equipment in the area.\nWe carry the fewest passengers per balloon, ensuring a comfortable flight experience.\nMajority of our flights follow a more scenic flight plan and our flight time is longer than any other operators in the area.\nBefore your flight, you have an open buffet\'s fully catered breakfast in our restaurant. We have a proper indoor place to enjoy early breakfast.\nOur ground transportation vehicles are in current and full compliance with the Public Utilities Commission, Department of Motor Vehicles. Our balloons are also in full compliance with Turkish Civil Aviation requirements for safe operation.\nA personalized flight certificate is presented to each passenger.\nHonest and professional service.\nNo false statements; hidden costs; extra fees, taxes or charges.\nIf flight is cancelled due to weather, no  cost for you of any kind.</p>'),
(2, 'About', 'Page', '<p>Atmosphere Balloon; is one of the first companies that come to mind when it comes to hot air ballooning in Cappadocia with its management team, ground crew and pilots who are experienced in professional ballooning sector for many years.\n</p><p>Atmospheric Balloon (ISO 9001-2008 Certified) Hot Air Balloons produced by the Spanish company Ultra Magic, which is one of the world\'s leading hot air balloon manufacturers, are used. All our balloons and passengers are covered by insurance.</p><p>Floating between Cappadocia\'s deep valleys and fascinating rock formations, you will experience an unforgettable experience with the unique landscape of the region. In order to make the experience unforgettable, Atmosfer Balon serves with a professional understanding as office team, ground crew and pilots.</p>'),
(3, 'Flights', 'Page', '<h3>Deluxe Program</h3><p>We transfer our guests from their respective hotels to our office.\nWhile our pilots pick the best take-off spots with regard to weather conditions, our guests finish the check-in formalities and enjoy their hot drinks and cookies.</p><p>We transfer our guests to the selected take-off place. Our team encourages guests to take part in all steps of the flight preparation in order to maximise their sense of adventure. The pilots deliver detailed information on technical details of the flight, conditions and safety measures before take-off.</p><p>The balloons rise between 5-1000 meters above the ground depending on flight conditions. Guests will fly gracefully above beautiful valleys and spectacular fairy chimneys. No flights are identical as balloons follow the course of the wind.\n</p><p>The flight takes approximately 1.5 hours. In order to maximise flight pleasure, smaller baskets are used which carry 10-14 passengers.</p><p>Guests will enjoy a traditional ceremony after landing. They can drink a champagne cocktail or fresh juice, eat cake, chat with pilots or take pictures next to the basket, which is decorated with fresh flowers. We also provide each guest a flight certificate that is issued in their name as a reminder of this unmatched adventure.</p><h3>Services included are</h3><p>Full passenger insurance\n</p><p>Transfers\n</p><p>Snacks and beverage service before the flight\n</p><p>Minimum flight time of 1.5 hours.\n</p><p>Champagne party after the flight\n</p><p>Flight certificate\n</p><hr /><h3>Standard Program</h3><p>We transfer our guests from their respective hotels to our office.\nWhile our pilots pick the best take-off spots with regard to weather conditions, our guests finish the check-in formalities and enjoy their hot drinks and cookies.</p><p>We transfer our guests to the selected take-off place. The pilots deliver detailed information on technical details of the flight, conditions and safety measures before take-off.</p><p>The balloons rise between 5-1000 meters above the ground depending on flight conditions. Guests will fly gracefully above beautiful valleys and spectacular fairy chimneys. No flights are identical as balloons follow the course of the wind.</p><p>The flight takes between 45-65 minutes. Larger baskets are used which carry 16-20 passengers.</p><p>Guests will enjoy a traditional ceremony after landing. They can drink a champagne cocktail or fresh juice, eat cake, chat with pilots or take pictures next to the basket, which is decorated with fresh flowers. We also provide each guest a flight certificate that is issued in their name as a reminder of this unmatched adventure.</p><h3>Services included are</h3><p>Full passenger insurance\n</p><p>Transfers\n</p><p>Snacks and beverage service before the flight\n</p><p>Minimum flight time of 45 to 65 minutes\n</p><p>Champagne party after the flight\n</p><p>Flight certificate\n</p><hr /><h3>Special Ocassions</h3><p>You can turn your special occasion, such as a birthday, anniversary, marriage proposal or ceremony, into a truly unforgettable experience with a flight over the beautiful valleys of Cappadocia.</p><p>Our guests can have their breakfast in the flight area or in a special lodge according to their preference.</p><p>In case you like a hands-on experience, you can take part in the preparation process.</p><p>During the flight, you can enjoy the unmatched beauty of Cappadocia, while indulging yourselves with a champagne and fruit basket service, (up to a maximum of 10 people).</p><p>Guests will enjoy a traditional ceremony after landing. You can drink a champagne cocktail or fresh juice, and eat cake, take pictures next to the basket that is decorated according to the occasion. We also provide each guest with a flight certificate issued in their name as a reminder of this unmatched adventure.</p><p>Please contact us to make your dreams come true!\n</p><hr /><h3>Reservation & Cancellation:</h3><p>Our prices include VAT.\n</p><p>Payments with Visa/MasterCard/Amex and cash in foreign currency are accepted.\n</p><p>As the availability of flights are totally dependent on weather conditions, your credit card information is recorded to reserve your place, but the due amount is not charged to your card.</p><p>In case flights are cancelled, guests will receive a full refund.\nIf you would like to cancel your flight you will need to inform us 48 hours before the flight. Otherwise, the full flight cost will be charged.</p>'),
(4, 'Realisations', 'Page', '<p>Realisation: We are behind schedule.</p>'),
(5, 'Certifications', 'Page', '<p>Certification one: certification one</p>'),
(6, 'Contact', 'Contact', '<form action="core.php" method="POST"><label>INFORMATION</label><br><input type="text" name="name" placeholder="Name"><br><input type="email" name="email" placeholder="Email"><br><input type="tel" name="telephone" placeholder="Telephone"><br><textarea cols="60" rows="3" name="comment" placeholder="How Can we help ?"></textarea><br><input type="submit" name="FormSubmit" placeholder="Question" value="Envoyer"></form>');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `alt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `file`, `title`, `alt`) VALUES
(1, 'logo.png', 'Logo', 'logo'),
(2, '9e65055b8ca174b6961e3112e6961d80.png', 'Picture one', '1'),
(4, 'b67b15e2421995b05bee3632a4fd3092.jpg', 'Picture Two', '2'),
(5, '579e0bdba816c7426e2e1d8d06f1727a.jpg', 'Divers 1', 'Divers1'),
(6, 'e1fb853f48a91147128233712419f9bd.jpg', 'Condo 1', 'Condo 1'),
(7, 'bd084abd6e1c240ada60cfdc2b1aace1.jpg', 'Condo 2 - 4', 'Condo 2 - 4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `fk_upload` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `firstname`, `lastname`, `phone`, `fk_upload`, `status`) VALUES
(1, 'admin', 'info@plemelinrenovation.ca', 'admin', 'Pierre', 'Lemelin', '514-323-0416', 1, 1),
(2, 'Frank', '', '123123', 'Frank', 'Franken', '0', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
