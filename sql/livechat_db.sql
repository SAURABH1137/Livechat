-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 01:30 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livechat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(100) NOT NULL,
  `username` varchar(150) NOT NULL,
  `Admin_Name` varchar(100) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` enum('Active','Deactive') NOT NULL,
  `last_login_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `username`, `Admin_Name`, `password`, `status`, `last_login_time`) VALUES
(1, 'sonuaction03@gmail.com', 'Saurabh Sapkal', '123', 'Active', '2021-11-16 22:46:53');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `f_id` int(11) NOT NULL,
  `u_email` text NOT NULL,
  `f_email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`f_id`, `u_email`, `f_email`) VALUES
(73, 'ee@gmail.com', 'aa@gmail.com'),
(74, 'ee@gmail.com', 'jj@gmail.com'),
(75, 'bb@gmail.com', 'cc@gmail.com'),
(76, 'bb@gmail.com', 'aa@gmail.com'),
(77, 'bb@gmail.com', 'hh@gmail.com'),
(78, 'aa@gmail.com', 'cc@gmail.com'),
(79, 'cc@gmail.com', 'aa@gmail.com'),
(80, 'dd@gmail.com', 'aa@gmail.com'),
(81, 'dd@gmail.com', 'ii@gmail.com'),
(82, 'dd@gmail.com', 'ee@gmail.com'),
(83, 'ee@gmail.com', 'bb@gmail.com'),
(84, 'ee@gmail.com', 'dd@gmail.com'),
(85, 'ff@gmail.com', 'aa@gmail.com'),
(86, 'ff@gmail.com', 'bb@gmail.com'),
(87, 'ff@gmail.com', 'gg@gmail.com'),
(88, 'gg@gmail.com', 'hh@gmail.com'),
(89, 'gg@gmail.com', 'ii@gmail.com'),
(90, 'gg@gmail.com', 'ff@gmail.com'),
(91, 'gg@gmail.com', 'aa@gmail.com'),
(92, 'hh@gmail.com', 'aa@gmail.com'),
(93, 'hh@gmail.com', 'dd@gmail.com'),
(94, 'hh@gmail.com', 'cc@gmail.com'),
(95, 'ii@gmail.com', 'aa@gmail.com'),
(96, 'ii@gmail.com', 'bb@gmail.com'),
(97, 'ii@gmail.com', 'cc@gmail.com'),
(98, 'jj@gmail.com', 'aa@gmail.com'),
(99, 'jj@gmail.com', 'gg@gmail.com'),
(100, 'jj@gmail.com', 'ff@gmail.com'),
(101, 'aa@gmail.com', 'dd@gmail.com'),
(102, 'aa@gmail.com', 'bb@gmail.com'),
(103, 'aa@gmail.com', 'hh@gmail.com'),
(104, 'cc@gmail.com', 'dd@gmail.com'),
(105, 'cc@gmail.com', 'hh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `g_name` varchar(150) NOT NULL,
  `gc_email` text NOT NULL,
  `g_type` varchar(100) NOT NULL,
  `g_img` varchar(100) NOT NULL,
  `gc_name` varchar(100) NOT NULL,
  `group_members` text NOT NULL,
  `group_DaTi` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `g_name`, `gc_email`, `g_type`, `g_img`, `gc_name`, `group_members`, `group_DaTi`) VALUES
(77, 'FYBCA 2021-22', 'cc@gmail.com', 'BCA Student Group', '1.png', 'Sayali', 'cc@gmail.com,dd@gmail.com,hh@gmail.com', '2021-11-19 04:44:43'),
(78, 'SYBCA 2021-22', 'cc@gmail.com', 'BCA Student Group', '3.png', 'Sayali', 'cc@gmail.com,dd@gmail.com,hh@gmail.com', '2021-11-19 04:45:05'),
(79, 'FYBCA 2021-22', 'aa@gmail.com', 'BCA Student Group', '3.png', 'Saurabh', 'aa@gmail.com,ee@gmail.com,ff@gmail.com,gg@gmail.com,ii@gmail.com,jj@gmail.com,bb@gmail.com', '2021-11-21 02:36:56'),
(80, 'TYBCA 2021-22', 'cc@gmail.com', 'BCA Student Group', '4.png', 'Sayali', 'cc@gmail.com,dd@gmail.com,ee@gmail.com,ff@gmail.com,gg@gmail.com,hh@gmail.com,ii@gmail.com,jj@gmail.com,aa@gmail.com,bb@gmail.com', '2022-02-23 04:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `mid` int(11) NOT NULL,
  `uid` text NOT NULL,
  `to_id` text NOT NULL,
  `msg` text NOT NULL,
  `m_status` enum('seen','notseen') NOT NULL,
  `c_time` time NOT NULL DEFAULT current_timestamp(),
  `type` enum('Group','Individual') NOT NULL,
  `Date1` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`mid`, `uid`, `to_id`, `msg`, `m_status`, `c_time`, `type`, `Date1`) VALUES
(382, 'bb@gmail.com', 'cc@gmail.com', 'hi', 'seen', '04:37:50', 'Individual', '2021-12-02'),
(385, 'bb@gmail.com', 'cc@gmail.com', 'hi', 'seen', '04:37:50', 'Individual', '2021-12-03'),
(386, 'bb@gmail.com', 'cc@gmail.com', 'hi', 'seen', '04:37:50', 'Individual', '2021-12-03'),
(387, 'bb@gmail.com', 'cc@gmail.com', 'hi', 'seen', '04:37:50', 'Individual', '2021-12-03'),
(388, 'bb@gmail.com', 'cc@gmail.com', ' hi', 'seen', '04:38:05', 'Individual', '2021-12-03'),
(389, 'bb@gmail.com', 'cc@gmail.com', 'Good Morning', 'seen', '04:38:13', 'Individual', '2021-12-03'),
(390, 'bb@gmail.com', '79', 'hi', 'seen', '04:38:44', 'Group', '2021-12-03'),
(391, 'aa@gmail.com', 'cc@gmail.com', 'Hi', 'seen', '19:44:42', 'Individual', '2021-12-24'),
(392, 'aa@gmail.com', 'hh@gmail.com', 'hii', 'seen', '05:13:37', 'Individual', '2022-02-18'),
(393, 'aa@gmail.com', 'gg@gmail.com', 'Hii', 'seen', '06:23:57', 'Individual', '2022-02-18'),
(394, 'aa@gmail.com', 'cc@gmail.com', 'Hii', 'seen', '06:26:46', 'Individual', '2022-02-18'),
(395, 'aa@gmail.com', 'cc@gmail.com', 'Hii', 'seen', '06:26:50', 'Individual', '2022-02-18'),
(396, 'aa@gmail.com', '79', 'Hi', 'seen', '06:27:31', 'Group', '2022-02-18'),
(397, 'cc@gmail.com', 'dd@gmail.com', 'Hii', 'seen', '00:51:40', 'Individual', '2022-02-20'),
(398, 'dd@gmail.com', 'cc@gmail.com', 'Hii', 'seen', '00:52:40', 'Individual', '2022-02-20'),
(399, 'dd@gmail.com', 'cc@gmail.com', 'Good Morning', 'seen', '00:52:46', 'Individual', '2022-02-20'),
(400, 'cc@gmail.com', 'dd@gmail.com', 'Good Morning', 'seen', '00:52:53', 'Individual', '2022-02-20'),
(401, 'aa@gmail.com', 'dd@gmail.com', 'Hi', 'seen', '03:26:23', 'Individual', '2022-02-23'),
(402, 'cc@gmail.com', '77', 'J', 'seen', '04:21:43', 'Group', '2022-02-23'),
(403, 'cc@gmail.com', '77', 'Hi', 'seen', '04:21:45', 'Group', '2022-02-23'),
(404, 'cc@gmail.com', '80', 'Hi', 'seen', '04:27:00', 'Group', '2022-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `query_feedback`
--

CREATE TABLE `query_feedback` (
  `id` int(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `sender_email` text NOT NULL,
  `Query_Feedback` text NOT NULL,
  `Answer` text NOT NULL DEFAULT 'Request Accepted ',
  `date` date NOT NULL DEFAULT current_timestamp(),
  `type` set('feedback','Query') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query_feedback`
--

INSERT INTO `query_feedback` (`id`, `fname`, `sender_email`, `Query_Feedback`, `Answer`, `date`, `type`) VALUES
(1, 'Saurabh Sapkal', 'aa@gmail.com', 'What are the most important messaging apps for companies?', 'Live Messenger dominate the global messenger market. In addition, messaging apps such as WeChat, LINE and Viber dominate regional markets. Not to mention the pre-installed messengers like Apple’s iMessage (Apple Business Chat) for iOS devices and Android Messages (Google Chat) for Android devices.', '2021-12-24', 'Query'),
(2, 'Prasad', 'bb@gmail.com', 'Data privacy & messaging app: Is that even possible?', 'Yes, it is! Important: Customer communication via messaging app must be GDPR compliant. Companies must provide comprehensive information on how they process personal data and data from third parties and obtain the consent of their customers.', '2021-12-24', 'Query'),
(3, 'Saurabh ', 'aa@gmail.com', 'What are the business opportunities with WhatsApp for companies?', 'With the WhatsApp Business API, WhatsApp offers an option for scalable and professional customer communication for medium-sized and large enterprises  that can be implemented in a customer-centric and data protection-compliant manner.', '2021-12-24', 'Query'),
(4, 'Radhika', 'cc@gmail.com', 'What about the future of Messenger Marketing?', 'The future clearly lies in pull communication instead of push. Messenger Marketing started with sending newsletters. In recent years, however, Messenger Marketing has developed more and more towards a solution-oriented 1 to 1 customer communication. Conversational marketing now rings in the third phase of messenger communication.', '2021-12-24', 'Query'),
(5, 'Ramesh', 'dd@gmail.com', 'Why using Livechat for customer service?', 'Messaging apps master the everyday communication of people all over the world. In terms of customer service, too! All generations prefer a direct chat via WhatsApp, Facebook Messenger or other chat apps instead of calling up a hotline or contacting an e-mail service.', '2021-12-24', 'Query'),
(6, 'Saurabh', 'aa@gmail.com', 'Great app. If you value your privacy and don\'t care for Big Tech. Companies deciding what\'s private and what\'s not,. Then you should install and only use this app for communicating over the internet. Just think of how much information you have sent that is already out there that hasn\'t been encrypted!!! Can it come back to haunt you in the future?', '', '2021-12-24', 'feedback'),
(7, 'Prasad', 'bb@gmail.com', 'This is fantastic and privacy based! New features are being added all the time. I can make my chat pretty and unique. Notification profiles let\'s me make a profile and schedule and only allow certain things to notify me. Really helps when I need alone time, but only want to see important messages from family. There\'s no adds. I did decide to donate because I really believe in this project. Highly recommend. It\'s super easy to set up.', '', '2021-12-24', 'feedback'),
(8, 'Radha', 'cc@gmail.com', 'One of the best social media apps ever created. So good for developing countries, we cannot thank you enough. Diaspora are able to connect with friends and family with ease so long as there are no connectivity issues at the other end. While negative news is also carried around easily, the positive news is received readily to keep us abreast with what is going on!', '', '2021-12-24', 'feedback'),
(9, 'Saurabh', 'aa@gmail.com', 'The app is good for me. No complaints at the moment, though I do wish I could make it my text app connected to my phone. I\'d use it instead of the default app that connects your phone. Still 5 starts in my book.', '', '2021-12-24', 'feedback');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `status` enum('Online','Offline') NOT NULL,
  `photo` text NOT NULL,
  `about` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `city` varchar(40) NOT NULL DEFAULT 'Pune',
  `qualification` varchar(50) NOT NULL,
  `Hobbies` varchar(100) NOT NULL,
  `College` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `status`, `photo`, `about`, `username`, `city`, `qualification`, `Hobbies`, `College`) VALUES
(16, 'cc@gmail.com', '123', 'Offline', '1.png', 'Yes, I am smiling and you are not the reason any more. ...', 'Sayali', '', '', '', ''),
(18, 'dd@gmail.com', '123', 'Offline', '4.png', 'I will be rising from the Ground Like a Skyscraper.', 'Radha', '', '', '', ''),
(31, 'ee@gmail.com', '123', 'Offline', '9.png', 'My every status is a silent message to someone.', 'Sahil', '', '', '', ''),
(32, 'ff@gmail.com', '123', 'Offline', '10.png', 'Cherish your own emotions and never undervalue them.', 'Ramesh', '', '', '', ''),
(33, 'gg@gmail.com', '123', 'Offline', '8.png', 'SUCCESS is the by-product of your attitude', 'suresh', '', '', '', ''),
(34, 'hh@gmail.com', '123', 'Offline', '6.png', 'You’re not too old and it is not too late.', 'radhika', '', '', '', ''),
(35, 'ii@gmail.com', '123', 'Offline', '11.png', 'Treat me the way you expect to be treated.', 'rohi', '', '', '', ''),
(36, 'jj@gmail.com', '123', 'Offline', '2.png', 'If you want light to come into your life, you need to stand where it is shinning.', 'ram', '', '', '', ''),
(39, 'aa@gmail.com', '123', 'Offline', '7.png', 'Life', 'Saurabh', '', '', '', ''),
(40, 'bb@gmail.com', '123', 'Offline', '12.png', 'The smarter you get, the less you speak.', 'Prasad', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `username` (`username`,`password`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `query_feedback`
--
ALTER TABLE `query_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- AUTO_INCREMENT for table `query_feedback`
--
ALTER TABLE `query_feedback`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
