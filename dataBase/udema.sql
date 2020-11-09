-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 01:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `udema`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `added_on` datetime NOT NULL,
  `mobile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `email`, `password`, `added_on`, `mobile`) VALUES
(1, 'super2', 'nasim', 'mdsaqlain@gmail.com', 'saqlain', '2020-10-13 11:56:42', '97897987'),
(2, 'super', 'nasim', 'msn@gmail.com', 'msn', '2020-10-13 11:57:44', '6486487');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `tuitor` int(11) NOT NULL,
  `categories` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `tuitor`, `categories`, `status`) VALUES
(1, 1, 'cat1', 1),
(2, 2, 'cat2', 1),
(3, 2, 'cat5', 1),
(4, 1, 'cat6', 1),
(5, 1, 'cat8', 1),
(6, 1, 'cat3', 1),
(7, 3, 'cat9', 1),
(12, 3, 'cat4', 1),
(13, 2, 'Web Development', 1),
(14, 2, 'react js', 1),
(15, 3, 'user', 1),
(16, 3, 'user3', 1),
(17, 3, 'user35', 1),
(18, 4, 'android App', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `tuitor` int(11) NOT NULL,
  `cour_status` int(11) NOT NULL,
  `title` text NOT NULL,
  `qty` text NOT NULL,
  `price` int(11) NOT NULL,
  `mrp` int(11) NOT NULL,
  `duration` text NOT NULL,
  `categories_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `short_desc` text NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `tuitor`, `cour_status`, `title`, `qty`, `price`, `mrp`, `duration`, `categories_id`, `image`, `short_desc`, `description`, `status`) VALUES
(3, 2, 1, 'Title 2', '1', 90, 100, '1h 45m', 5, '513420352_Leftthumb1.jpg', 'This is seond sd', 'Per consequat adolescens ex, cu nibh commune temporibus vim, ad sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.  What will you learn Suas summo id sed erat erant oporteat Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.  Illud singulis indoctum ad sed Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.  Alterum bonorum mentitum an mel Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.  Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.  Dolorem mediocritatem Mea appareat Prima causae Singulis indoctum Timeam inimicus Oportere democritum Cetero inermis Pertinacia eum', 1),
(4, 2, 1, 'Title3', '1', 4999, 5999, '2h 55m', 7, '816313656_Hand written.jpg', 'Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.', 'Per consequat adolescens ex, cu nibh commune temporibus vim, ad sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.  What will you learn Suas summo id sed erat erant oporteat Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.  Illud singulis indoctum ad sed Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.  Alterum bonorum mentitum an mel Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.  Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.  Dolorem mediocritatem Mea appareat Prima causae Singulis indoctum Timeam inimicus Oportere democritum Cetero inermis Pertinacia eum', 1),
(6, 5, 1, 'title4', '1', 7000, 7999, '1h 45min', 3, '697931513_logo.jpg', 'my short discription', 'Per consequat adolescens ex, cu nibh commune temporibus vim, ad sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.  What will you learn Suas summo id sed erat erant oporteat Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.  Illud singulis indoctum ad sed Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.  Alterum bonorum mentitum an mel Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.  Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.  Dolorem mediocritatem Mea appareat Prima causae Singulis indoctum Timeam inimicus Oportere democritum Cetero inermis Pertinacia eum', 1),
(7, 4, 1, 'Title7', '1', 600, 700, '5h', 6, '831024931_LF-page.jpg', 'cat3 short Desc', 'desc', 1),
(8, 5, 1, 'TItle 8', '5', 500, 799, '4h 55m', 7, '306876839_PRODUCT_011_square_1024x1024.jpg', 'short DESC', 'DESCRIPTIOn', 1),
(11, 3, 1, 'HTML', '', 499, 600, '2h 45m', 13, '832006858_htmll.png', 'This Course is all about HTML', 'This Course is all about HTML This Course is all about HTML This Course is all about HTML This Course is all about HTML This Course is all about HTML This Course is all about HTMLThis Course is all about HTMLThis Course is all about HTMLThis Course is all about HTMLThis Course is all about HTMLThis Course is all about HTMLThis Course is all about HTMLThis Course is all about HTMLThis Course is all about HTMLThis Course is all about HTMLThis Course is all about HTML', 1),
(12, 3, 1, 'CSS3', '', 500, 600, '5h', 13, '830977847_htmll.png', 'THis cousr is css', 'THis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is cssTHis cousr is css', 1),
(14, 1, 1, 'tuitor1Test', '', 789, 455, '2h', 14, '304139203_9c6bcf82442452eeedc0cb784326b3ef.jpg', 'slkadfjh', 'jkhhhhhhhhhhhhhhhhhhhhhkasdfhkajsdhfkjsadhfkjsdhhhhhhhhhhhhhhhhhhhhh', 1),
(15, 1, 1, 'sdj', '', 564, 564, 'dfs', 7, '155470041_1-reusable-large-wall-stencil-painting-tool-pvc-120-inch-x-90-original-imafgzzmvghmpwzd.jpeg', 'fkkkkkk', 'jdsafffffffffffffffff', 1),
(19, 3, 1, 'user', '', 1, 1, '1h', 15, '659313232_Blog-Post_1024x1024.jpg', 'sd', 'd', 1),
(20, 1, 1, 'Add Test Procuct', '', 100, 25, '5h', 5, '617763840_Square_3_1024x1024.jpg', 'sffadskfjkldsafjklsadjflkasjflkasdjfklsdajdkl', 'lkjskldjflkasdjfklsjdfkldskkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 1),
(22, 2, 1, 'saqlian nasim', '', 999, 999, '999', 13, '937583985_abstract-colorful-blur-background-vector-4915825.jpg', '9999999999999999999', '9999999999999999999999999999999999999999', 1),
(23, 3, 1, 'user3', '', 22, 22, '2', 16, '466774871_Screenshot (118).png', 'jkhgfdfqjjjjjj', 'jjjjjjjjjjjjjjjjjjjjjj', 1),
(24, 3, 1, 'user32', '', 54, 545, '5', 17, '980732286_Screenshot (4).png', 'lkh', 'g\\', 1),
(25, 4, 1, 'jav', '', 4000, 3222, '5', 18, '574082916_Screenshot (93).png', 'niamh beauty', 'ksadfjjkasdhfjkshafkjsdlkfjsdklfjsdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tuitor_admin`
--

CREATE TABLE `tuitor_admin` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `mobile` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuitor_admin`
--

INSERT INTO `tuitor_admin` (`id`, `email`, `password`, `fname`, `lname`, `mobile`, `added_on`) VALUES
(1, 'tuitor1@gmail.com', 'tuitor1', 'tuitor1', 'nasim', '564656', '0000-00-00 00:00:00'),
(2, 'tuitor2@gmail.com', 'tuitor2', 'tuitor2', 'oara', '65684', '0000-00-00 00:00:00'),
(3, 'tuitor3@gmail.com', 'tuitor3', 'tuitor3', 'tuitor3', '564', '2020-10-13 02:39:43'),
(4, 'tuitor4@gmail.com', 'tuitor4', 'Rashid', 'bhau', '7894561230', '2020-10-28 04:46:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `added_on` datetime NOT NULL,
  `mobile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `added_on`, `mobile`) VALUES
(1, 'MD SAQLAN', 'NASIMA', 'saqlian@gmail.com', 'saqlain123', '2020-09-24 09:07:43', '2147483647'),
(2, 'saqlain', 'nasim', 'saqlian1@gmail.com', 'saqlian1233', '2020-09-24 09:08:54', '2147483647'),
(4, 'mmns', 'ksdjfk', 'saqlain@gmail.com', 'hsdfh', '2020-09-24 09:48:35', '644564'),
(5, 'my name', 'md', 's@g.c', '789', '2020-09-24 09:50:57', '87984'),
(6, 'msn', 'msn', 'msn@gmail.com', 'ms', '0000-00-00 00:00:00', '2147483647'),
(7, 'msn', 'msn', 'msn@msn.com', '789', '2020-09-24 12:09:39', '87984'),
(8, 'SHAHZADI', 'PARVEEN', 'shahzadi@gmail.com', '123', '2020-09-24 02:13:06', '8013672569'),
(9, 'Mohammad', 'Saqlain Nasim', 'ms@gmail.com', 'saqlain', '2020-09-26 10:59:40', '875454422'),
(10, 'rashid', 'bhai', 'rashid@gmail.com', 'rashid', '2020-10-14 12:52:12', '65454');

-- --------------------------------------------------------

--
-- Table structure for table `vidcategories`
--

CREATE TABLE `vidcategories` (
  `id` int(11) NOT NULL,
  `vidcategories` text NOT NULL,
  `status` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vidcategories`
--

INSERT INTO `vidcategories` (`id`, `vidcategories`, `status`, `admin_id`, `product_id`) VALUES
(1, 'Introduction', 1, 2, 3),
(2, 'Generative Modeling Review', 1, 2, 4),
(3, 'Variational Autoencoders', 1, 1, 0),
(4, 'Gaussian Mixture Model Review saqlain', 1, 2, 3),
(5, 'Others', 1, 3, 11),
(6, 'saqlain', 1, 3, 11),
(7, 'saqlin', 1, 3, 11),
(8, 'kg', 1, 3, 11),
(9, 'suerjkafd', 1, 3, 11),
(10, 'k', 1, 3, 11),
(11, 'user32', 1, 3, 24),
(12, 'rashid', 1, 4, 25);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `videoUrl` text NOT NULL,
  `videoTitle` text NOT NULL,
  `vidCategories` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `videoUrl`, `videoTitle`, `vidCategories`, `admin_id`, `product_id`) VALUES
(1, 'https://www.youtube.com/watch?v=LDgd_gUcqCw', 'one', 1, 1, 23),
(2, 'https://www.youtube.com/watch?v=LDgd_gUcqCw', 'two', 1, 2, 20),
(3, 'https://www.youtube.com/watch?v=LDgd_gUcqCw', 'three', 1, 3, 6),
(5, 'https://www.youtube.com/watch?v=LDgd_gUcqCw', 'four', 2, 1, 4),
(6, '52', 'dsj', 1, 2, 3),
(7, 'sdf', 'title example', 1, 2, 22),
(8, '5555', 'asdhf', 4, 2, 4),
(9, 'https://www.youtube.com/watch?v=nR8kV8aTD_0&list=PLB97yPrFwo5jmtx3ClYFHvMLUMyx9qfnV&index=7https://www.youtube.com/watch?v=m8k68eXMSRwhttps://www.youtube.com/watch?v=LDgd_gUcqCw', 'saqlain Nasim nafdkjas', 5, 3, 11),
(10, 'https://www.youtube.com/watch?v=nR8kV8aTD_0&list=PLB97yPrFwo5jmtx3ClYFHvMLUMyx9qfnV&index=7', 'saqlain Nasim nafdkjas sd', 5, 3, 12),
(11, 'https://youtu.be/qlvMiFmvdTc', 'user3', 1, 3, 23),
(12, 'https://www.youtube.com/watch?v=nR8kV8aTD_0&list=P...', 'user32', 11, 3, 24),
(13, 'jkljfsajfklsdjfkkjfsak', 'rashidf java', 12, 4, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuitor_admin`
--
ALTER TABLE `tuitor_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vidcategories`
--
ALTER TABLE `vidcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tuitor_admin`
--
ALTER TABLE `tuitor_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vidcategories`
--
ALTER TABLE `vidcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
