-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2019 at 08:37 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kcceris`
--

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `email_id` int(11) NOT NULL,
  `sender_email` varchar(50) NOT NULL,
  `receiver_email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `date_sent` varchar(50) NOT NULL,
  `time_sent` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL COMMENT 'Update YES OR NO if READ'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emails_reply`
--

CREATE TABLE `emails_reply` (
  `er_id` int(11) NOT NULL,
  `email_id` int(11) NOT NULL,
  `sender_email` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `date_sent` varchar(20) NOT NULL,
  `time_sent` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_logs`
--

CREATE TABLE `member_logs` (
  `log_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `login_time` varchar(30) NOT NULL,
  `logout_time` varchar(50) NOT NULL,
  `log_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(250) NOT NULL,
  `messageId` int(250) NOT NULL,
  `userId` int(250) NOT NULL,
  `fromId` int(250) NOT NULL,
  `toId` int(250) NOT NULL,
  `messageText` text NOT NULL,
  `dateSent` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_category`
--

CREATE TABLE `quiz_category` (
  `quizcat_id` int(11) NOT NULL,
  `quizcat_name` varchar(100) NOT NULL,
  `quizcat_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_category`
--

INSERT INTO `quiz_category` (`quizcat_id`, `quizcat_name`, `quizcat_code`) VALUES
(1, 'True or False', 'TF'),
(2, 'Idetification', 'ID'),
(3, 'Multiple Choice', 'MC');

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `course_ID` int(20) NOT NULL,
  `course_Name` varchar(50) NOT NULL,
  `course_desc` varchar(50) NOT NULL,
  `dept_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`course_ID`, `course_Name`, `course_desc`, `dept_ID`) VALUES
(1, 'BSIT', 'Bachelor of Sience in Information Technology', 1),
(2, 'BSBA', 'Bachelor of Sience in Business Administration', 1),
(3, 'BEED', 'Bachelor of Elementary Education', 2),
(4, 'BSED', 'Bachelor of Secondary Education', 2),
(5, 'AB', 'Bachelor of Arts', 2),
(6, 'BSAcct', 'Bachelor of Sience in Accountancy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `dept_ID` int(20) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `dept_desc` varchar(50) NOT NULL,
  `dept_dean` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`dept_ID`, `dept_name`, `dept_desc`, `dept_dean`) VALUES
(1, 'BITE', 'Business and ITE Department', 'Eric John B. Coñate'),
(2, 'TEA', 'Teachers Education and Arts Department', 'Imelda \r\nM. Gatoc Ph.D.');

-- --------------------------------------------------------

--
-- Table structure for table `tblquiz_answers`
--

CREATE TABLE `tblquiz_answers` (
  `ans_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `questions` int(100) NOT NULL,
  `answer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblquiz_questions`
--

CREATE TABLE `tblquiz_questions` (
  `quest_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `questions` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblsemester`
--

CREATE TABLE `tblsemester` (
  `sem_ID` int(20) NOT NULL,
  `sem_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsemester`
--

INSERT INTO `tblsemester` (`sem_ID`, `sem_name`) VALUES
(1, '1st Semester'),
(2, '2nd Semester');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `userID` int(11) NOT NULL,
  `userFname` varchar(100) NOT NULL,
  `userLname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userpass` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`userID`, `userFname`, `userLname`, `username`, `userpass`, `usertype`) VALUES
(1, 'admin', 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tblyearlevel`
--

CREATE TABLE `tblyearlevel` (
  `yrlvl_ID` int(20) NOT NULL,
  `yrlvl_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblyearlevel`
--

INSERT INTO `tblyearlevel` (`yrlvl_ID`, `yrlvl_name`) VALUES
(1, 'First Year'),
(2, 'Second Year'),
(3, 'Third Year'),
(4, 'Fourth Year');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignments`
--

CREATE TABLE `tbl_assignments` (
  `ass_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `ass_title` varchar(191) NOT NULL,
  `ass_instruction` varchar(255) NOT NULL,
  `ass_date` datetime NOT NULL,
  `ass_deadline` varchar(20) NOT NULL,
  `ass_filename` varchar(50) NOT NULL,
  `ass_file_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignment_ans`
--

CREATE TABLE `tbl_assignment_ans` (
  `ans_id` int(11) NOT NULL,
  `ans_file` varchar(100) NOT NULL,
  `ans_file_path` text NOT NULL,
  `ans_date` datetime NOT NULL,
  `ass_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ay`
--

CREATE TABLE `tbl_ay` (
  `ay_ID` int(20) NOT NULL,
  `ay_Year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ay`
--

INSERT INTO `tbl_ay` (`ay_ID`, `ay_Year`) VALUES
(1, '2016-2017'),
(2, '2017-2018'),
(3, '2018-2019'),
(4, '2019-2020');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `class_id` float NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `class_days` varchar(20) NOT NULL,
  `class_start` varchar(20) NOT NULL,
  `class_end` varchar(20) NOT NULL,
  `class_room` varchar(20) NOT NULL,
  `class_tags` varchar(100) NOT NULL,
  `class_description` text NOT NULL,
  `class_adviser` int(11) NOT NULL,
  `class_dateCreate` varchar(20) NOT NULL,
  `class_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classfiles`
--

CREATE TABLE `tbl_classfiles` (
  `file_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `filetype` varchar(20) NOT NULL,
  `filesize` text NOT NULL,
  `date_uploaded` varchar(20) NOT NULL,
  `file_dir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classmembers`
--

CREATE TABLE `tbl_classmembers` (
  `classmember_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `verification` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classpost`
--

CREATE TABLE `tbl_classpost` (
  `post_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_attachment` varchar(100) NOT NULL,
  `post_date` varchar(20) NOT NULL,
  `post_time` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classpost_reply`
--

CREATE TABLE `tbl_classpost_reply` (
  `postreply_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply_content` longtext NOT NULL,
  `reply_attachment` varchar(100) NOT NULL,
  `reply_date` varchar(20) NOT NULL,
  `reply_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classroom`
--

CREATE TABLE `tbl_classroom` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_classroom`
--

INSERT INTO `tbl_classroom` (`room_id`, `room_name`) VALUES
(1, 'Room 1'),
(2, 'Room 2'),
(3, 'Room 3'),
(4, 'Room 4'),
(5, 'Room 5'),
(6, 'Room 6'),
(7, 'Room 7'),
(8, 'Room 8'),
(9, 'Room 9'),
(10, 'Room 10'),
(11, 'Room 11'),
(12, 'Room 12'),
(13, 'Room 13'),
(14, 'Room 14'),
(15, 'Room 15'),
(16, 'Room 16'),
(17, 'Room 17'),
(18, 'Room 18'),
(19, 'Lab 1'),
(20, 'Lab 2'),
(21, 'Lab 3'),
(22, 'Training Room');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_conversation`
--

CREATE TABLE `tbl_conversation` (
  `c_id` int(11) NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  `ip` varchar(30) DEFAULT NULL,
  `date_create` varchar(50) NOT NULL,
  `time_create` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_conversation_reply`
--

CREATE TABLE `tbl_conversation_reply` (
  `cr_id` int(11) NOT NULL,
  `reply` text,
  `member_id_fk` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `date_sent` varchar(50) NOT NULL,
  `time_sent` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `c_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_forum_category`
--

CREATE TABLE `tbl_forum_category` (
  `forum_cat_id` int(11) NOT NULL,
  `forum_cat_name` varchar(100) NOT NULL,
  `forum_cat_desc` text NOT NULL,
  `date_added` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_forum_category`
--

INSERT INTO `tbl_forum_category` (`forum_cat_id`, `forum_cat_name`, `forum_cat_desc`, `date_added`) VALUES
(1, 'Information Technology', 'all about technology, innovations', '2018-01-16 22:41:36.000000'),
(2, 'Arts', 'Arts', '2018-01-16 22:41:36.000000'),
(3, 'Education', 'Education', '2018-01-16 22:41:36.000000'),
(4, 'School', 'School', '2018-01-16 22:41:36.000000'),
(5, 'General', 'General Questions', '2018-01-16 22:41:36.000000'),
(6, 'Multimedia', 'Multimedia', '2018-01-16 22:41:36.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_forum_comment`
--

CREATE TABLE `tbl_forum_comment` (
  `comment_id` int(11) NOT NULL,
  `comment_content` varchar(100) NOT NULL,
  `comment_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `reply_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_forum_replies`
--

CREATE TABLE `tbl_forum_replies` (
  `reply_id` int(11) NOT NULL,
  `reply_content` longtext NOT NULL,
  `reply_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_forum_topic`
--

CREATE TABLE `tbl_forum_topic` (
  `topic_id` int(11) NOT NULL,
  `topic_title` varchar(100) NOT NULL,
  `topic_subject` varchar(50) NOT NULL,
  `topic_content` blob NOT NULL,
  `topic_attachment` varchar(50) NOT NULL,
  `topic_date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_view` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `member_id` int(11) NOT NULL,
  `member_fullname` varchar(100) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `member_username` varchar(50) NOT NULL,
  `member_password` varchar(50) NOT NULL,
  `member_type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`member_id`, `member_fullname`, `member_email`, `member_username`, `member_password`, `member_type`, `status`) VALUES
(53, 'John Canete', 'john.canete1991@gmail.com', 'superbyte', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Teacher', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz`
--

CREATE TABLE `tbl_quiz` (
  `quiz_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `quiz_name` varchar(50) NOT NULL,
  `quiz_instruction` varchar(200) NOT NULL,
  `quiz_cat` int(11) NOT NULL,
  `quiz_time_limit` float NOT NULL,
  `quiz_author` int(11) NOT NULL,
  `quiz_created` varchar(20) NOT NULL,
  `quiz_deadline` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz_identification`
--

CREATE TABLE `tbl_quiz_identification` (
  `quest_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `questions` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz_identification_answer`
--

CREATE TABLE `tbl_quiz_identification_answer` (
  `ans_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `questions` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz_mc`
--

CREATE TABLE `tbl_quiz_mc` (
  `quest_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `mc_A` varchar(100) NOT NULL,
  `mc_B` varchar(100) NOT NULL,
  `mc_C` varchar(100) NOT NULL,
  `mc_D` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz_mc_answer`
--

CREATE TABLE `tbl_quiz_mc_answer` (
  `ans_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `questions` int(100) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `user_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_course` int(11) NOT NULL,
  `user_year` int(11) NOT NULL,
  `user_profile` varchar(100) NOT NULL,
  `user_age` varchar(100) NOT NULL,
  `user_bday` varchar(20) NOT NULL,
  `user_gender` varchar(20) NOT NULL,
  `user_contact` varchar(20) NOT NULL,
  `user_civilstatus` varchar(20) NOT NULL,
  `user_citizenship` varchar(20) NOT NULL,
  `user_religion` varchar(20) NOT NULL,
  `user_father` varchar(100) NOT NULL,
  `user_mother` varchar(100) NOT NULL,
  `user_guardian` varchar(100) NOT NULL,
  `user_contact_person` varchar(100) NOT NULL,
  `contact_person_num` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subj_id` int(11) NOT NULL,
  `subj_code` varchar(30) NOT NULL,
  `subj_desc` varchar(255) NOT NULL,
  `unit` int(2) NOT NULL,
  `AY` varchar(30) NOT NULL,
  `semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `user_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_age` varchar(100) NOT NULL,
  `user_bday` varchar(20) NOT NULL,
  `user_gender` varchar(20) NOT NULL,
  `user_contact` varchar(20) NOT NULL,
  `user_civilstatus` varchar(20) NOT NULL,
  `user_citizenship` varchar(20) NOT NULL,
  `user_religion` varchar(20) NOT NULL,
  `user_contact_person` varchar(100) NOT NULL,
  `contact_person_num` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`user_id`, `member_id`, `user_address`, `user_age`, `user_bday`, `user_gender`, `user_contact`, `user_civilstatus`, `user_citizenship`, `user_religion`, `user_contact_person`, `contact_person_num`) VALUES
(1, 53, 'New Jersey', '27', '1991-12-10', 'Male', '1234567890', 'Single', 'American', 'Catholic', 'None', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usersettings`
--

CREATE TABLE `tbl_usersettings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_theme` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_photos`
--

CREATE TABLE `user_photos` (
  `id` int(11) NOT NULL,
  `filename` longtext NOT NULL COMMENT 'name',
  `format` varchar(100) NOT NULL COMMENT 'file format',
  `size` int(11) NOT NULL COMMENT 'file size',
  `member_id` int(11) NOT NULL COMMENT 'student id or teacher id',
  `pri` varchar(11) NOT NULL COMMENT 'primary photo for  profile',
  `user_type` varchar(30) NOT NULL COMMENT 'student/teacher'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `emails_reply`
--
ALTER TABLE `emails_reply`
  ADD PRIMARY KEY (`er_id`);

--
-- Indexes for table `member_logs`
--
ALTER TABLE `member_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_category`
--
ALTER TABLE `quiz_category`
  ADD PRIMARY KEY (`quizcat_id`);

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`course_ID`);

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`dept_ID`);

--
-- Indexes for table `tblquiz_answers`
--
ALTER TABLE `tblquiz_answers`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `tblquiz_questions`
--
ALTER TABLE `tblquiz_questions`
  ADD PRIMARY KEY (`quest_id`);

--
-- Indexes for table `tblsemester`
--
ALTER TABLE `tblsemester`
  ADD PRIMARY KEY (`sem_ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `tbl_assignments`
--
ALTER TABLE `tbl_assignments`
  ADD PRIMARY KEY (`ass_id`);

--
-- Indexes for table `tbl_assignment_ans`
--
ALTER TABLE `tbl_assignment_ans`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `tbl_ay`
--
ALTER TABLE `tbl_ay`
  ADD PRIMARY KEY (`ay_ID`);

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `tbl_classfiles`
--
ALTER TABLE `tbl_classfiles`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `tbl_classmembers`
--
ALTER TABLE `tbl_classmembers`
  ADD PRIMARY KEY (`classmember_id`);

--
-- Indexes for table `tbl_classpost`
--
ALTER TABLE `tbl_classpost`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbl_classpost_reply`
--
ALTER TABLE `tbl_classpost_reply`
  ADD PRIMARY KEY (`postreply_id`);

--
-- Indexes for table `tbl_classroom`
--
ALTER TABLE `tbl_classroom`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `tbl_conversation`
--
ALTER TABLE `tbl_conversation`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `user_one` (`user_one`),
  ADD KEY `user_two` (`user_two`);

--
-- Indexes for table `tbl_conversation_reply`
--
ALTER TABLE `tbl_conversation_reply`
  ADD PRIMARY KEY (`cr_id`),
  ADD KEY `member_id_fk` (`member_id_fk`),
  ADD KEY `c_id_fk` (`c_id_fk`);

--
-- Indexes for table `tbl_forum_category`
--
ALTER TABLE `tbl_forum_category`
  ADD PRIMARY KEY (`forum_cat_id`);

--
-- Indexes for table `tbl_forum_comment`
--
ALTER TABLE `tbl_forum_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_forum_replies`
--
ALTER TABLE `tbl_forum_replies`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `tbl_forum_topic`
--
ALTER TABLE `tbl_forum_topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tbl_quiz`
--
ALTER TABLE `tbl_quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `tbl_quiz_identification`
--
ALTER TABLE `tbl_quiz_identification`
  ADD PRIMARY KEY (`quest_id`);

--
-- Indexes for table `tbl_quiz_identification_answer`
--
ALTER TABLE `tbl_quiz_identification_answer`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `tbl_quiz_mc`
--
ALTER TABLE `tbl_quiz_mc`
  ADD PRIMARY KEY (`quest_id`);

--
-- Indexes for table `tbl_quiz_mc_answer`
--
ALTER TABLE `tbl_quiz_mc_answer`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subj_id`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_usersettings`
--
ALTER TABLE `tbl_usersettings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_photos`
--
ALTER TABLE `user_photos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emails_reply`
--
ALTER TABLE `emails_reply`
  MODIFY `er_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_logs`
--
ALTER TABLE `member_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_category`
--
ALTER TABLE `quiz_category`
  MODIFY `quizcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblquiz_answers`
--
ALTER TABLE `tblquiz_answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblquiz_questions`
--
ALTER TABLE `tblquiz_questions`
  MODIFY `quest_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsemester`
--
ALTER TABLE `tblsemester`
  MODIFY `sem_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_assignments`
--
ALTER TABLE `tbl_assignments`
  MODIFY `ass_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_assignment_ans`
--
ALTER TABLE `tbl_assignment_ans`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ay`
--
ALTER TABLE `tbl_ay`
  MODIFY `ay_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_classfiles`
--
ALTER TABLE `tbl_classfiles`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_classmembers`
--
ALTER TABLE `tbl_classmembers`
  MODIFY `classmember_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_classpost`
--
ALTER TABLE `tbl_classpost`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_classpost_reply`
--
ALTER TABLE `tbl_classpost_reply`
  MODIFY `postreply_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_classroom`
--
ALTER TABLE `tbl_classroom`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_conversation`
--
ALTER TABLE `tbl_conversation`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_conversation_reply`
--
ALTER TABLE `tbl_conversation_reply`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_forum_category`
--
ALTER TABLE `tbl_forum_category`
  MODIFY `forum_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_forum_comment`
--
ALTER TABLE `tbl_forum_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_forum_replies`
--
ALTER TABLE `tbl_forum_replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_forum_topic`
--
ALTER TABLE `tbl_forum_topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_quiz`
--
ALTER TABLE `tbl_quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_quiz_identification`
--
ALTER TABLE `tbl_quiz_identification`
  MODIFY `quest_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_quiz_identification_answer`
--
ALTER TABLE `tbl_quiz_identification_answer`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_quiz_mc`
--
ALTER TABLE `tbl_quiz_mc`
  MODIFY `quest_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_quiz_mc_answer`
--
ALTER TABLE `tbl_quiz_mc_answer`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subj_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_usersettings`
--
ALTER TABLE `tbl_usersettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_photos`
--
ALTER TABLE `user_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_conversation`
--
ALTER TABLE `tbl_conversation`
  ADD CONSTRAINT `tbl_conversation_ibfk_1` FOREIGN KEY (`user_one`) REFERENCES `tbl_members` (`member_id`),
  ADD CONSTRAINT `tbl_conversation_ibfk_2` FOREIGN KEY (`user_two`) REFERENCES `tbl_members` (`member_id`);

--
-- Constraints for table `tbl_conversation_reply`
--
ALTER TABLE `tbl_conversation_reply`
  ADD CONSTRAINT `tbl_conversation_reply_ibfk_1` FOREIGN KEY (`member_id_fk`) REFERENCES `tbl_members` (`member_id`),
  ADD CONSTRAINT `tbl_conversation_reply_ibfk_2` FOREIGN KEY (`c_id_fk`) REFERENCES `tbl_conversation` (`c_id`);

--
-- Constraints for table `tbl_usersettings`
--
ALTER TABLE `tbl_usersettings`
  ADD CONSTRAINT `tbl_usersettings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_members` (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
