-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2023 at 02:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uwriters`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `imagename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `imagename`) VALUES
(1, 'uwriters-1ee0f2a693-post.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'waithirajon@gmail.com', 'c7Gm5w==');

-- --------------------------------------------------------

--
-- Table structure for table `landing`
--

CREATE TABLE `landing` (
  `id` int(11) NOT NULL,
  `imagename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `landing`
--

INSERT INTO `landing` (`id`, `imagename`) VALUES
(1, 'uwriters-223064983d-post.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `msgid` varchar(45) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `msgid`, `name`, `email`, `message`, `status`) VALUES
(1, '486e1519e9ca4502af8e', 'KOz9vQ==', 'NeL8p23RytyAWPmwCzCEJmLOcLS8', 'Jg==', 1),
(2, '9fc34b442e53b4189a06', 'KOz9vQ==', 'NeL8p23RytyAWPmwCzCEJmLOcLS8', 'J/Hsu2M=', 1);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `title` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `uniqueid` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `uniqueid`, `title`, `img`, `description`, `body`) VALUES
(1, 'b377929e1276ba5c35d39e5d', 'We are united in purpose and unique in calling.', 'uwriters-c47b6f8220d62f500e4a4522-post.jpg', 'There is unity in our singular purpose to glorify God and enjoy him forever (shoutout to the credible Westminster Catechism). We are teammates, working together to enact God’s plan of redemption in the world. et, we are unique in our calling. Our calling is the unique way in which God has wired us, equipped us, and as', '&#60;h3&#62;We are&#38;nbsp;&#60;em&#62;united&#60;/em&#62;&#38;nbsp;in purpose and&#38;nbsp;&#60;em&#62;unique&#60;/em&#62;&#38;nbsp;in calling.&#60;/h3&#62;&#13;&#10;&#13;&#10;&#60;p&#62;There is&#38;nbsp;&#60;em&#62;unity&#60;/em&#62;&#38;nbsp;in our singular purpose to glorify God and enjoy him forever (shoutout to the credible&#38;nbsp;&#60;em&#62;Westminster Catechism&#60;/em&#62;). We are teammates, working together to enact God&#38;rsquo;s plan of redemption in the world. Yet, we are&#38;nbsp;&#60;em&#62;unique&#60;/em&#62;&#38;nbsp;in our calling. Our calling is the unique way in which God has wired us, equipped us, and assigned us to contribute to and advance his kingdom. This is not limited to our spiritual gifts, but it certainly includes them! And even in 1 Corinthians 12, Paul is not exhausting all the spiritual gifts, but using a few as an example to serve his point about how the body of Christ (you, me,&#38;nbsp;&#60;em&#62;we&#60;/em&#62;) works together.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;blockquote&#62;&#13;&#10;&#60;p&#62;&#60;em&#62;&#38;ldquo;For those who lead and have a tendency toward pride and self-sufficiency, it may be humbling to know that God wants them to depend on and be built up by others with different gifts. For others, though, this will mean accepting what God has given them and then living and working in the community for the benefit of the body, knowing that this is their God-given and Spirit-enabled duty to the body. Just as there is no place for pride, so there is no place for false humility.&#38;rdquo;&#60;/em&#62;&#38;nbsp;(Paul Gardner,&#38;nbsp;&#60;em&#62;1 Corinthians&#60;/em&#62;, Zondervan Exegetical Commentary on the New Testament, 554.)&#60;/p&#62;&#13;&#10;&#60;/blockquote&#62;&#13;&#10;&#13;&#10;&#60;p&#62;Our spiritual gifts are an essential part of our contribution to the kingdom of God. They are one of the primary ways the gospel works itself in our lives as we serve others. But how can we walk in them if we are not aware of them?&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;h3&#62;We need to know our Holy Spirit-given gifts if we want to walk in our full purpose and potential.&#60;/h3&#62;&#13;&#10;&#13;&#10;&#60;p&#62;Here are four action steps to take from here.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;ul&#62;&#13;&#10;&#9;&#60;li&#62;&#60;strong&#62;First&#60;/strong&#62;, take our&#38;nbsp;&#60;a href=&#34;https://newbreak.church/spiritual-gifts/&#34;&#62;&#60;strong&#62;spiritual gifts test by clicking HERE&#60;/strong&#62;&#60;/a&#62;. It is not infallible, but it is a good tool to help you consider how God&#38;rsquo;s empowering presence (Holy Spirit) wants to work in and through you.&#60;/li&#62;&#13;&#10;&#9;&#60;li&#62;&#60;strong&#62;Second&#60;/strong&#62;, talk to some other Christians who you respect and who know you well. Ask them what spiritual gifts they see in you. Do not underestimate how someone else can see in you what you might not see in yourself!&#60;/li&#62;&#13;&#10;&#9;&#60;li&#62;&#60;strong&#62;Third&#60;/strong&#62;, study biblical passages on these things. You may have noticed we did not unpack the spiritual gifts in this blog post. It would take quite some time to do so! Plus, let&#38;rsquo;s give you some homework and ownership here. Pick up some commentaries on 1 Corinthians and read how scholars shed light on what Paul is saying about spiritual gifts (especially 1 Corinthians 12-14). The&#38;nbsp;&#60;a href=&#34;https://www.christianbook.com/corinthians-zondervan-exegetical-commentary-new-testament/paul-gardner/9780310243694/pd/243690&#34;&#62;Zondervan Exegetical Commentary on 1 Corinthians&#60;/a&#62;&#38;nbsp;is phenomenal, though at times it can be geared toward an academic audience. If you need a more lay-level commentary try the&#38;nbsp;&#60;a href=&#34;https://www.amazon.com/1-Corinthians-NIV-Application-Commentary/dp/0310484901/ref=sr_1_1?crid=2TZI7QH1CO4S0&#38;amp;keywords=1+corinthians+niv+application+commentary&#38;amp;qid=1675800424&#38;amp;sprefix=1+corinthians+niv+application+commentary%2Caps%2C134&#38;amp;sr=8-1&#34;&#62;NIV Application Commentary on 1 Corinthians&#60;/a&#62;&#38;nbsp;or&#38;nbsp;&#60;a href=&#34;https://www.amazon.com/Corinthians-You-Gods-Word/dp/1784986232/ref=sr_1_17_sspa?crid=DWALOLXQUY5&#38;amp;keywords=zent+1+corinthians&#38;amp;qid=1675800244&#38;amp;sprefix=zecnt+1+corinthians%2Caps%2C448&#38;amp;sr=8-17-spons&#38;amp;psc=1&#38;amp;spLa=ZW5jcnlwdGVkUXVhbGlmaWVyPUExRk5MVThIMlNQNkdWJmVuY3J5cHRlZElkPUEwNTc1MTgwMkhDTFRRWFMwVVhLOCZlbmNyeXB0ZWRBZElkPUEwNTk1OTc2MjFaMUwxUVJHNTlQMyZ3aWRnZXROYW1lPXNwX210ZiZhY3Rpb249Y2xpY2tSZWRpcmVjdCZkb05vdExvZ0NsaWNrPXRydWU=&#34;&#62;1 Corinthians For You&#60;/a&#62;.&#60;/li&#62;&#13;&#10;&#9;&#60;li&#62;&#60;strong&#62;Fourth&#60;/strong&#62;, but not least, put your spiritual gifts into practice!&#60;/li&#62;&#13;&#10;&#60;/ul&#62;&#13;&#10;&#13;&#10;&#60;h3&#62;The Holy Spirit does not give you these gifts for them to be like a trophy on a shelf. They are meant to be used for the sake of others!&#60;/h3&#62;&#13;&#10;'),
(2, 'd13d3bd92fea33ce0ba7e7dd', 'You Were Loved Into Existence', 'uwriters-6ae8b71d83f81c45644d29ce-post.jpg', 'I&#39;m a content writer. I write content that help Bussiness get more traffic and leads', '&#60;p&#62;The beginning of the year is often a time of deep reflection. Our hope is that your thoughts are&#38;nbsp;&#60;em&#62;not&#60;/em&#62;&#38;nbsp;only directed toward your resolutions but also about more profound existential questions. We will help you get there: our first two months of sermons are entirely directed toward the subject of purpose!&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;I&#38;rsquo;ve been part of many dialogues between Christians and Atheists, which often circle around whether everything (including humanity) was intelligently created. In essence, does humanity have a God-given purpose? Or are we merely an accident of the universe&#38;rsquo;s own chaotic doing? The question, however, has far-reaching implications, especially when it comes to love.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;h3&#62;&#60;strong&#62;If God created us&#38;nbsp;&#60;em&#62;(and he surely did!)&#60;/em&#62;&#38;nbsp;then we are loved into existence!&#60;/strong&#62;&#60;/h3&#62;&#13;&#10;&#13;&#10;&#60;p&#62;We will unpack that. First, though, it is important to note how this is not just some novel philosophical idea. Rather, this observation is embedded in Scripture itself. We see this clearly in Paul&#38;rsquo;s letter to the Ephesians.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;blockquote&#62;&#13;&#10;&#60;p&#62;&#60;em&#62;But&#38;nbsp;&#60;strong&#62;because of his great love for us&#60;/strong&#62;, God, who is rich in mercy, made us alive with Christ even when we were dead in transgressions&#38;mdash;it is&#38;nbsp;&#60;strong&#62;by grace&#60;/strong&#62;&#60;/em&#62;&#60;em&#62;&#38;nbsp;you have been saved.&#60;/em&#62;&#38;nbsp;(&#60;a href=&#34;https://biblia.com/bible/niv/Eph%202.4-5&#34;&#62;Ephesians 2:4-5 NIV&#60;/a&#62;)&#60;/p&#62;&#13;&#10;&#60;/blockquote&#62;&#13;&#10;'),
(3, 'f52b7675c0a6e7eec39397db', 'We are united in purpose and unique in calling.', 'uwriters-939579ac587722a8facb463e-post.jpg', 'The beginning of the year is often a time of deep reflection. Our hope is that your thoughts are not only directed toward your resolutions but also about more profound existential questions. We will help you get there: our first two months of sermons are entirely directed toward the subject of purpose!&#13;&#10;&#13;&#10;', '&#60;p&#62;I&#38;rsquo;ve been part of many dialogues between Christians and Atheists, which often circle around whether everything (including humanity) was intelligently created. In essence, does humanity have a God-given purpose? Or are we merely an accident of the universe&#38;rsquo;s own chaotic doing? The question, however, has far-reaching implications, especially when it comes to love.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;If God created us (and he surely did!) then we are loved into existence!&#60;br /&#62;&#13;&#10;We will unpack that. First, though, it is important to note how this is not just some novel philosophical idea. Rather, this observation is embedded in Scripture itself. We see this clearly in Paul&#38;rsquo;s letter to the Ephesians.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;But because of his great love for us, God, who is rich in mercy, made us alive with Christ even when we were dead in transgressions&#38;mdash;it is by grace you have been saved. (Ephesians 2:4-5 NIV)&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;I&#38;rsquo;ve been part of many dialogues between Christians and Atheists, which often circle around whether everything (including humanity) was intelligently created. In essence, does humanity have a God-given purpose? Or are we merely an accident of the universe&#38;rsquo;s own chaotic doing? The question, however, has far-reaching implications, especially when it comes to love.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;If God created us (and he surely did!) then we are loved into existence!&#60;br /&#62;&#13;&#10;We will unpack that. First, though, it is important to note how this is not just some novel philosophical idea. Rather, this observation is embedded in Scripture itself. We see this clearly in Paul&#38;rsquo;s letter to the Ephesians.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;But because of his great love for us, God, who is rich in mercy, made us alive with Christ even when we were dead in transgressions&#38;mdash;it is by grace you have been saved. (Ephesians 2:4-5 NIV)&#60;/p&#62;&#13;&#10;'),
(4, '00bd47614fb259542005a06a', 'You Were Loved Into Existence', 'uwriters-425bc099c5904daaf517f5b3-post.jpg', 'I’ve been part of many dialogues between Christians and Atheists, which often circle around whether everything (including humanity) was intelligently created. In essence, does humanity have a God-given purpose? Or are we merely an accident of the universe’s own chaotic doing? The question, however, has far-reaching implications, especially when it comes to love.&#13;&#10;', '&#60;p&#62;&#60;br /&#62;&#13;&#10;If God created us (and he surely did!) then we are loved into existence!&#60;br /&#62;&#13;&#10;We will unpack that. First, though, it is important to note how this is not just some novel philosophical idea. Rather, this observation is embedded in Scripture itself. We see this clearly in Paul&#38;rsquo;s letter to the Ephesians.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;But because of his great love for us, God, who is rich in mercy, made us alive with Christ even when we were dead in transgressions&#38;mdash;it is by grace you have been saved. (Ephesians 2:4-5 NIV)&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#60;br /&#62;&#13;&#10;If God created us (and he surely did!) then we are loved into existence!&#60;br /&#62;&#13;&#10;We will unpack that. First, though, it is important to note how this is not just some novel philosophical idea. Rather, this observation is embedded in Scripture itself. We see this clearly in Paul&#38;rsquo;s letter to the Ephesians.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;But because of his great love for us, God, who is rich in mercy, made us alive with Christ even when we were dead in transgressions&#38;mdash;it is by grace you have been saved. (Ephesians 2:4-5 NIV)&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#60;br /&#62;&#13;&#10;If God created us (and he surely did!) then we are loved into existence!&#60;br /&#62;&#13;&#10;We will unpack that. First, though, it is important to note how this is not just some novel philosophical idea. Rather, this observation is embedded in Scripture itself. We see this clearly in Paul&#38;rsquo;s letter to the Ephesians.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;But because of his great love for us, God, who is rich in mercy, made us alive with Christ even when we were dead in transgressions&#38;mdash;it is by grace you have been saved. (Ephesians 2:4-5 NIV)&#60;/p&#62;&#13;&#10;'),
(5, '0a69b0b6566206297f11af7b', 'We are united in purpose and unique in calling.', 'uwriters-d2e3dfeb649acb9376137d89-post.jpg', 'We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.', '&#60;p&#62;We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.We are united in purpose and unique in calling.&#60;/p&#62;&#13;&#10;');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `secondname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `firstname`, `secondname`, `email`, `bio`, `img`) VALUES
(1, 'jon', 'waithira', 'waithirajon@gmail.com', 'this is my bio', 'uwriters-ae21adfda6-post.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `imagename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `imagename`) VALUES
(1, 'uwriters-efb01ab1d0-post.jpg'),
(2, 'uwriters-975c864830-post.jpg'),
(3, 'uwriters-43893d82d8-post.avif');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` int(11) NOT NULL,
  `num_of_visits` varchar(45) NOT NULL,
  `time_of_visit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `num_of_visits`, `time_of_visit`) VALUES
(1, '5', '0000-00-00'),
(2, '5', '2023-03-15'),
(3, '1', '0000-00-00'),
(4, '1', '0000-00-00'),
(5, '1', '0000-00-00'),
(6, '1', '0000-00-00'),
(7, '1', '0000-00-00'),
(8, '1', '0000-00-00'),
(9, '1', '0000-00-00'),
(10, '1', '0000-00-00'),
(11, '1', '0000-00-00'),
(12, '1', '0000-00-00'),
(13, '1', '0000-00-00'),
(14, '1', '0000-00-00'),
(15, '1', '0000-00-00'),
(16, '1', '0000-00-00'),
(17, '1', '0000-00-00'),
(18, '1', '0000-00-00'),
(19, '1', '0000-00-00'),
(20, '1', '0000-00-00'),
(21, '1', '0000-00-00'),
(22, '1', '0000-00-00'),
(23, '1', '0000-00-00'),
(24, '1', '0000-00-00'),
(25, '1', '0000-00-00'),
(26, '1', '0000-00-00'),
(27, '1', '0000-00-00'),
(28, '1', '0000-00-00'),
(29, '1', '0000-00-00'),
(30, '1', '0000-00-00'),
(31, '1', '0000-00-00'),
(32, '1', '0000-00-00'),
(33, '1', '0000-00-00'),
(34, '1', '0000-00-00'),
(35, '1', '0000-00-00'),
(36, '1', '0000-00-00'),
(37, '1', '0000-00-00'),
(38, '1', '0000-00-00'),
(39, '1', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landing`
--
ALTER TABLE `landing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `landing`
--
ALTER TABLE `landing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
