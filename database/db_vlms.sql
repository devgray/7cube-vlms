-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2018 at 05:30 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vlms`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addfav` (IN `video_id` INT, IN `user_id` INT)  BEGIN
	INSERT into tbl_favorites values(video_id,user_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `closeReport` (IN `cd` TEXT)  BEGIN
	DECLARE vidid INT;
    SELECT id from tbl_video where `code`=cd into vidid;
	DELETE from tbl_reportedvideos where video_id=vidid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteVideo` (IN `path` TEXT)  BEGIN
	DECLARE delId INT;
    SELECT id from tbl_video where filepath=path INTO delId;
	DELETE FROM tbl_favorites where video_id=delId;
    DELETE FROM tbl_reportedvideos where video_id=delId;
    DELETE FROM tbl_comments where video_id=delId;
    DELETE FROM tbl_video where id=delId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registerUser` (IN `user` TEXT, IN `email` TEXT, IN `pw` TEXT, IN `fname` TEXT, IN `utype` INT)  BEGIN
	INSERT INTO tbl_user VALUES(null, user, email,AES_ENCRYPT('text',UNHEX(SHA2(pw,512))), fname, utype);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reportVideo` (IN `cd` TEXT, IN `head` TEXT, IN `info` TEXT, IN `logid` INT)  BEGIN
    DECLARE vidid INT;
    SELECT id from tbl_video where `code`=cd into vidid;
    
    INSERT INTO tbl_reportedvideos values(vidid,logid,head,info);
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sub` (IN `user_id` INT, IN `sub_id` INT)  BEGIN
	INSERT into tbl_subscribers values(user_id,sub_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `unfav` (IN `vid` INT, IN `uid` INT)  BEGIN
	DELETE from tbl_favorites where video_id=vid and user_id=uid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `unsub` (IN `uid` INT, IN `sub_id` INT)  BEGIN
	DELETE FROM tbl_subscribers where user_id=uid and subscriber_id=sub_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `upload` (IN `cd` TEXT, IN `title` TEXT, IN `filepath` TEXT, IN `info` TEXT, IN `tags` TEXT, IN `userid` INT, IN `categoryid` INT)  BEGIN
	INSERT INTO tbl_video VALUES(null,cd,title,filepath,info,tags,CURDATE(),0,userid,categoryid);
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `checkFav` (`vid` INT, `loguser` INT) RETURNS TINYINT(1) BEGIN
    DECLARE c INT;
    SELECT COUNT(video_id) from tbl_favorites where user_id=loguser and video_id=vid into c;
    if c > 0 then
    return true;
    else return false;
    end if;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `checkLogin` (`user` TEXT, `pw` TEXT) RETURNS TINYINT(1) BEGIN
    DECLARE count INT;
    SELECT COUNT(id) FROM tbl_user where username=user and pass=AES_ENCRYPT('text',UNHEX(SHA2(pw,512))) INTO count;
    IF count > 0 THEN
    return TRUE;
    ELSE return FALSE;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `checkSub` (`userid` INT, `loguser` INT) RETURNS TINYINT(1) BEGIN
    DECLARE c INT;
    SELECT COUNT(user_id) from tbl_subscribers where user_id=userid and subscriber_id=loguser into c;
    if c > 0 then
    return true;
    else return false;
    end if;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `fav`
-- (See below for the actual view)
--
CREATE TABLE `fav` (
`filepath` text
,`title` varchar(50)
,`code` text
,`user_id` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `reportedvideos`
-- (See below for the actual view)
--
CREATE TABLE `reportedvideos` (
`header` text
,`description` text
,`filepath` text
,`code` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `subusers`
-- (See below for the actual view)
--
CREATE TABLE `subusers` (
`id` int(11)
,`username` varchar(20)
,`usertype` varchar(20)
,`subid` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(1, 'Computer Science/Information Technology'),
(2, 'Multimedia Arts'),
(3, 'Game Development'),
(4, 'Film and Animation');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favorites`
--

CREATE TABLE `tbl_favorites` (
  `video_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifications`
--

CREATE TABLE `tbl_notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_replies`
--

CREATE TABLE `tbl_replies` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reportedcomments`
--

CREATE TABLE `tbl_reportedcomments` (
  `comment_id` int(11) NOT NULL,
  `reportedby_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reportedvideos`
--

CREATE TABLE `tbl_reportedvideos` (
  `video_id` int(11) NOT NULL,
  `reportedby_id` int(11) NOT NULL,
  `header` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribers`
--

CREATE TABLE `tbl_subscribers` (
  `user_id` int(11) NOT NULL,
  `subscriber_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subscribers`
--

INSERT INTO `tbl_subscribers` (`user_id`, `subscriber_id`) VALUES
(8, 9),
(8, 10),
(9, 10),
(10, 8),
(10, 9),
(11, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags`
--

CREATE TABLE `tbl_tags` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `pass` blob NOT NULL,
  `displayname` varchar(50) NOT NULL,
  `usertype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `email`, `pass`, `displayname`, `usertype_id`) VALUES
(8, 'graybriel', 'gray@greifx.com', 0x372e77594738f287317b992b8acca865, 'Gray Aremlap', 1),
(9, 'mod', 'mod@mod.com', 0x372e77594738f287317b992b8acca865, 'Cube Mod', 3),
(10, 'shin-aska', 'shin@gmail.com', 0x372e77594738f287317b992b8acca865, 'Richard Orilla', 2),
(11, 'prim', 'prim@p.com', 0x372e77594738f287317b992b8acca865, 'Primae Quinlog', 1),
(12, 'bevs', 'bevramos111@gmail.com', 0xbbcd094b529a558b3f422f2591f8acb1, 'Beverly Ramos', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usertype`
--

CREATE TABLE `tbl_usertype` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usertype`
--

INSERT INTO `tbl_usertype` (`id`, `type`) VALUES
(1, 'Student'),
(2, 'Professor'),
(3, 'Moderator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `id` int(11) NOT NULL,
  `code` text NOT NULL,
  `title` varchar(50) NOT NULL,
  `filepath` text NOT NULL,
  `info` text NOT NULL,
  `tags` text NOT NULL,
  `uploaddate` date NOT NULL,
  `views` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`id`, `code`, `title`, `filepath`, `info`, `tags`, `uploaddate`, `views`, `user_id`, `category_id`) VALUES
(30, '5afef0c8bf969', 'Sample Video', 'videos/9-5afef0c8bf969.mp4', 'Sample', 'animation', '2018-05-19', 1, 9, 4),
(31, '5afef105b570f', 'How to make 3D Text in Photoshop', 'videos/9-5afef105b570f.mp4', 'How to make 3D Text in Photoshop', 'photoshop', '2018-05-19', 3, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_videotags`
--

CREATE TABLE `tbl_videotags` (
  `video_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_watchlater`
--

CREATE TABLE `tbl_watchlater` (
  `video_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `userinfo`
-- (See below for the actual view)
--
CREATE TABLE `userinfo` (
`id` int(11)
,`username` varchar(20)
,`email` text
,`fname` varchar(50)
,`usertype` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `videoinfo`
-- (See below for the actual view)
--
CREATE TABLE `videoinfo` (
`id` int(11)
,`code` text
,`title` varchar(50)
,`filepath` text
,`info` text
,`tags` text
,`date` varchar(73)
,`views` int(11)
,`username` varchar(20)
,`userid` int(11)
,`usertype` varchar(20)
,`category` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `fav`
--
DROP TABLE IF EXISTS `fav`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fav`  AS  select `v`.`filepath` AS `filepath`,`v`.`title` AS `title`,`v`.`code` AS `code`,`u`.`username` AS `user_id` from ((`tbl_video` `v` join `tbl_favorites` `f` on((`f`.`video_id` = `v`.`id`))) join `userinfo` `u` on((`u`.`id` = `f`.`user_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `reportedvideos`
--
DROP TABLE IF EXISTS `reportedvideos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reportedvideos`  AS  select `r`.`header` AS `header`,`r`.`description` AS `description`,`v`.`filepath` AS `filepath`,`v`.`code` AS `code` from (`tbl_reportedvideos` `r` join `tbl_video` `v` on((`r`.`video_id` = `v`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `subusers`
--
DROP TABLE IF EXISTS `subusers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `subusers`  AS  select `u`.`id` AS `id`,`u`.`username` AS `username`,`u`.`usertype` AS `usertype`,`ux`.`username` AS `subid` from ((`userinfo` `u` join `tbl_subscribers` `s` on((`u`.`id` = `s`.`user_id`))) join `userinfo` `ux` on((`ux`.`id` = `s`.`subscriber_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `userinfo`
--
DROP TABLE IF EXISTS `userinfo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `userinfo`  AS  select `u`.`id` AS `id`,`u`.`username` AS `username`,`u`.`email` AS `email`,`u`.`displayname` AS `fname`,`ut`.`type` AS `usertype` from (`tbl_user` `u` join `tbl_usertype` `ut`) where (`u`.`usertype_id` = `ut`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `videoinfo`
--
DROP TABLE IF EXISTS `videoinfo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `videoinfo`  AS  select `v`.`id` AS `id`,`v`.`code` AS `code`,`v`.`title` AS `title`,`v`.`filepath` AS `filepath`,`v`.`info` AS `info`,`v`.`tags` AS `tags`,date_format(`v`.`uploaddate`,'%M %d, %Y') AS `date`,`v`.`views` AS `views`,`u`.`username` AS `username`,`u`.`id` AS `userid`,`ut`.`type` AS `usertype`,`c`.`name` AS `category` from (((`tbl_video` `v` join `tbl_user` `u` on((`u`.`id` = `v`.`user_id`))) join `tbl_category` `c` on((`c`.`id` = `v`.`category_id`))) join `tbl_usertype` `ut` on((`ut`.`id` = `u`.`usertype_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `video_id` (`video_id`);

--
-- Indexes for table `tbl_favorites`
--
ALTER TABLE `tbl_favorites`
  ADD PRIMARY KEY (`video_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `video_id` (`video_id`);

--
-- Indexes for table `tbl_replies`
--
ALTER TABLE `tbl_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_reportedcomments`
--
ALTER TABLE `tbl_reportedcomments`
  ADD PRIMARY KEY (`comment_id`,`reportedby_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `reportedby_id` (`reportedby_id`);

--
-- Indexes for table `tbl_reportedvideos`
--
ALTER TABLE `tbl_reportedvideos`
  ADD PRIMARY KEY (`video_id`,`reportedby_id`),
  ADD KEY `video_id` (`video_id`),
  ADD KEY `reportedby_id` (`reportedby_id`);

--
-- Indexes for table `tbl_subscribers`
--
ALTER TABLE `tbl_subscribers`
  ADD PRIMARY KEY (`user_id`,`subscriber_id`);

--
-- Indexes for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `usertype_id` (`usertype_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_videotags`
--
ALTER TABLE `tbl_videotags`
  ADD PRIMARY KEY (`video_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `tbl_watchlater`
--
ALTER TABLE `tbl_watchlater`
  ADD PRIMARY KEY (`video_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_replies`
--
ALTER TABLE `tbl_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_usertype`
--
ALTER TABLE `tbl_usertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD CONSTRAINT `tbl_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `tbl_comments_ibfk_2` FOREIGN KEY (`video_id`) REFERENCES `tbl_video` (`id`);

--
-- Constraints for table `tbl_favorites`
--
ALTER TABLE `tbl_favorites`
  ADD CONSTRAINT `tbl_favorites_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `tbl_video` (`id`),
  ADD CONSTRAINT `tbl_favorites_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  ADD CONSTRAINT `tbl_notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `tbl_notifications_ibfk_2` FOREIGN KEY (`video_id`) REFERENCES `tbl_video` (`id`);

--
-- Constraints for table `tbl_replies`
--
ALTER TABLE `tbl_replies`
  ADD CONSTRAINT `tbl_replies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `tbl_replies_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `tbl_comments` (`id`);

--
-- Constraints for table `tbl_reportedcomments`
--
ALTER TABLE `tbl_reportedcomments`
  ADD CONSTRAINT `tbl_reportedcomments_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `tbl_comments` (`id`),
  ADD CONSTRAINT `tbl_reportedcomments_ibfk_2` FOREIGN KEY (`reportedby_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_reportedvideos`
--
ALTER TABLE `tbl_reportedvideos`
  ADD CONSTRAINT `tbl_reportedvideos_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `tbl_video` (`id`),
  ADD CONSTRAINT `tbl_reportedvideos_ibfk_2` FOREIGN KEY (`reportedby_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`usertype_id`) REFERENCES `tbl_usertype` (`id`);

--
-- Constraints for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD CONSTRAINT `tbl_video_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`),
  ADD CONSTRAINT `tbl_video_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_videotags`
--
ALTER TABLE `tbl_videotags`
  ADD CONSTRAINT `tbl_videotags_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tbl_tags` (`id`),
  ADD CONSTRAINT `tbl_videotags_ibfk_2` FOREIGN KEY (`video_id`) REFERENCES `tbl_video` (`id`);

--
-- Constraints for table `tbl_watchlater`
--
ALTER TABLE `tbl_watchlater`
  ADD CONSTRAINT `tbl_watchlater_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `tbl_video` (`id`),
  ADD CONSTRAINT `tbl_watchlater_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
