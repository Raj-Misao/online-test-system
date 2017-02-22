-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2017 at 06:36 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `misao_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `misao_student`
--

CREATE TABLE `misao_student` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `u_course` varchar(100) NOT NULL,
  `u_en_level` varchar(15) NOT NULL,
  `test_aproved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `misao_student`
--

INSERT INTO `misao_student` (`id`, `u_id`, `u_course`, `u_en_level`, `test_aproved`) VALUES
(1, 17, 'English and IT(Web deve and android)', 'inter', 1),
(2, 30, 'English', 'adv', 2),
(3, 31, 'IT(Web deve)', '', 1),
(4, 32, 'English', 'adv', 0),
(6, 35, 'english', 'elem', 2),
(13, 39, 'English', 'pre', 2),
(14, 40, 'English', 'upper', 0),
(15, 42, 'English', 'adv', 0),
(16, 43, 'English', 'pre', 0),
(17, 44, 'English', 'pre', 0),
(18, 45, 'English', 'elem', 2);

-- --------------------------------------------------------

--
-- Table structure for table `misao_teacher`
--

CREATE TABLE `misao_teacher` (
  `u_id` int(11) NOT NULL,
  `u_course` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `misao_teacher`
--

INSERT INTO `misao_teacher` (`u_id`, `u_course`) VALUES
(18, 'IT(Web deve and android)'),
(21, 'English'),
(27, 'IT(Web deve and android)'),
(41, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `misao_user`
--

CREATE TABLE `misao_user` (
  `u_id` int(11) NOT NULL,
  `u_fname` varchar(15) NOT NULL,
  `u_lname` varchar(15) NOT NULL,
  `u_gender` varchar(10) NOT NULL,
  `u_email` varchar(30) NOT NULL,
  `u_phone` varchar(15) NOT NULL,
  `u_pass` varchar(20) NOT NULL,
  `u_type` varchar(10) NOT NULL,
  `u_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `misao_user`
--

INSERT INTO `misao_user` (`u_id`, `u_fname`, `u_lname`, `u_gender`, `u_email`, `u_phone`, `u_pass`, `u_type`, `u_image`) VALUES
(16, 'EEE', 'FFF', 'female', 'eeefff@gmail.com', '3333333333', 'eeefff', 'staff', ''),
(17, 'Raj', 'Sharma', 'male', '1', '880', '1', 'student', ''),
(18, 'Raj', 'Sharma', 'male', 'raj@gmail.com', '1010101010', 'raj', 'teacher', 'rrr.jpg'),
(29, 'KUKU', 'HGHG', 'male', 'kuku@hghg', '29384756', 'kuku', 'staff', ''),
(35, 'Yuya', 'Nozaki', 'male', 'yuya.noza17@gmail.com', '22', '1', 'student', '35YuyaNozaki.jpg'),
(40, 'koki', 'sonoda', 'male', 'koki@gmail.com', '1111', '11', 'student', ''),
(42, 'HARUNA', 'AOKI', 'female', 'leaf.ha.621@gmail.com', '234', '123456', 'student', '42HARUNAAOKI.jpg'),
(43, 'kento', 'yamamoto', 'male', 'kento', '33', '3', 'student', '43kentoyamamoto.jpg'),
(45, 'ravinder', 'sharma', 'male', 'ravinder@gmail.com', '12345', '1', 'student', '45sssssaaaa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `misao_user_add`
--

CREATE TABLE `misao_user_add` (
  `u_id` int(11) NOT NULL,
  `u_doj` date NOT NULL,
  `u_doe` date NOT NULL,
  `u_authority` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `misao_user_add`
--

INSERT INTO `misao_user_add` (`u_id`, `u_doj`, `u_doe`, `u_authority`) VALUES
(16, '2016-07-24', '2017-01-24', 'admin'),
(17, '2016-01-18', '2016-09-30', 'admin'),
(18, '2016-04-01', '2017-04-01', 'admin'),
(21, '2016-07-23', '2017-05-31', 'admin'),
(27, '2013-02-19', '2016-07-20', 'normal'),
(29, '2016-07-24', '2016-11-30', 'admin'),
(30, '2016-07-01', '2016-08-27', 'normal'),
(31, '2016-09-01', '2016-09-20', 'normal'),
(32, '2016-10-01', '2016-10-31', 'normal'),
(35, '2016-12-01', '2016-12-15', 'normal'),
(39, '2016-12-01', '2016-12-28', 'normal'),
(40, '2017-01-16', '2017-04-21', 'normal'),
(41, '2017-02-01', '2017-02-28', 'admin'),
(42, '2017-02-01', '2017-02-28', 'normal'),
(43, '2017-02-01', '2017-02-22', 'normal'),
(44, '2017-02-01', '2017-02-28', 'normal'),
(45, '2017-02-01', '2017-02-28', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `test_info`
--

CREATE TABLE `test_info` (
  `tid` int(11) NOT NULL,
  `test_no` int(11) DEFAULT NULL,
  `test_data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_info`
--

INSERT INTO `test_info` (`tid`, `test_no`, `test_data`) VALUES
(27, 1, '{"1":{"1":"apple","2":"apple.jpg","3":"fruitssss.jpg","4":"orange.png","5":"A","qustion_no_type":"qno_1__1_imgt"},"2":{"1":"raj","2":"it","3":"english","4":"staff","5":"it","qustion_no_type":"qno_2__2_optt"},"3":{"1":"hello my name is 1..... i leave in 2...........","2":"raj","3":"asd","4":"fds","5":"qwe","6":"raj","7":"ggn","8":"ddd","9":"aaa","10":"sss","11":"ggn","qustion_no_type":"qno_3__3_clozt"},"4":{"1":"it is teacher name is @raj .misao is a @raj","2":"raj,school","qustion_no_type":"qno_4__4_blankqt"},"5":{"1":"fruts","2":"bike.jpg","3":"mixf.jpg","4":"index2.jpg","5":"B","qustion_no_type":"qno_5__1_imgt"}}'),
(31, 2, '{"1":{"1":"apple","2":"apple.jpg","3":"bike.jpg","4":"e.jpg","5":"A","qustion_no_type":"qno_1__1_imgt"},"2":{"1":"IT teacher name","2":"raj","3":"kento","4":"yuya","5":"raj","qustion_no_type":"qno_2__2_optt"},"3":{"1":"Misao is 1.... it is in 2....","2":"bar","3":"pub","4":"school","5":"song","6":"school","7":"mumbai","8":"india","9":"gurgaon","10":"uk","11":"gurgaon","qustion_no_type":"qno_3__3_clozt"},"4":{"1":"IT teacher  name is @raj .he leave in @raj he teach in @raj","2":"raj,gurgaon,misao","qustion_no_type":"qno_4__4_blankqt"}}');

-- --------------------------------------------------------

--
-- Table structure for table `test_record`
--

CREATE TABLE `test_record` (
  `tr_id` int(11) NOT NULL,
  `tr_uid` int(11) NOT NULL,
  `tr_no` int(11) NOT NULL,
  `tr_data` text NOT NULL,
  `tr_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_record`
--

INSERT INTO `test_record` (`tr_id`, `tr_uid`, `tr_no`, `tr_data`, `tr_date`) VALUES
(1, 35, 1, '	{"Que.  1":{"s_ans":"B","t_ans":"A","ans_states":"wrong"},"Que.  2":{"s_ans":"english","t_ans":"it","ans_states":"wrong"},"Cloz 1":{"s_ans":"raj","t_ans":"raj","ans_states":"correct"},"Cloz 2":{"s_ans":"ggn","t_ans":"ggn","ans_states":"correct"},"Que.  3":{"s_ans":"raj,school,","t_ans":"raj,school","ans_states":"correct"},"Que.  4":{"s_ans":"C","t_ans":"B","ans_states":"wrong"},"Final Result":{"total_qus_count;":"Total No Of Quetion = 6","total_correct":"Total Correct Answer = 3","r_date":"Date Of Test = 18-02-2017"}}\n\n', '2017-02-22 17:31:04'),
(2, 35, 2, '	{"Que.  1":{"s_ans":"A","t_ans":"A","ans_states":"correct"},"Que.  2":{"s_ans":"it","t_ans":"it","ans_states":"correct"},"Cloz 1":{"s_ans":"raj","t_ans":"raj","ans_states":"correct"},"Cloz 2":{"s_ans":"ggn","t_ans":"ggn","ans_states":"correct"},"Que.  3":{"s_ans":"Raj,School,","t_ans":"raj,school","ans_states":"correct"},"Que.  4":{"s_ans":"B","t_ans":"B","ans_states":"correct"},"Final Result":{"total_qus_count;":"Total No Of Quetion = 6","total_correct":"Total Correct Answer = 6","r_date":"Date Of Test = 06-02-2017"}}\n\n', '2017-02-22 17:31:14'),
(14, 45, 2, '{"Que.  1":{"s_ans":"B","t_ans":"A","ans_states":"wrong"},"Que.  2":{"s_ans":"kento","t_ans":"raj","ans_states":"wrong"},"Cloz 1":{"s_ans":"school","t_ans":"school","ans_states":"correct"},"Cloz 2":{"s_ans":"gurgaon","t_ans":"gurgaon","ans_states":"correct"},"Que.  3":{"s_ans":"Raj,gurgaon,misao","t_ans":"Raj,gurgaon,misao","ans_states":"correct"},"Final Result":{"total_qus_count;":"Total No Of Quetion = 5","total_correct":"Total Correct Answer = 3","r_date":"Date Of Test = 22-02-2017"}}\n\n', '2017-02-22 17:31:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `misao_student`
--
ALTER TABLE `misao_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `misao_user`
--
ALTER TABLE `misao_user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `misao_user_add`
--
ALTER TABLE `misao_user_add`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `test_info`
--
ALTER TABLE `test_info`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `test_record`
--
ALTER TABLE `test_record`
  ADD PRIMARY KEY (`tr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `misao_student`
--
ALTER TABLE `misao_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `misao_user`
--
ALTER TABLE `misao_user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `test_info`
--
ALTER TABLE `test_info`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `test_record`
--
ALTER TABLE `test_record`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
