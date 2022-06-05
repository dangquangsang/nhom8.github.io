-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2022 at 02:14 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_cv`
--
CREATE DATABASE IF NOT EXISTS `job_cv` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `job_cv`;

-- --------------------------------------------------------

--
-- Table structure for table `tblapplicants`
--

CREATE TABLE `tblapplicants` (
  `APPLICANTID` int(11) NOT NULL,
  `FNAME` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LNAME` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MNAME` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ADDRESS` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SEX` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CIVILSTATUS` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BIRTHDATE` date NOT NULL,
  `BIRTHPLACE` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AGE` int(2) NOT NULL,
  `USERNAME` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PASS` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EMAILADDRESS` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CONTACTNO` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DEGREE` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `APPLICANTPHOTO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NATIONALID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblapplicants`
--

INSERT INTO `tblapplicants` (`APPLICANTID`, `FNAME`, `LNAME`, `MNAME`, `ADDRESS`, `SEX`, `CIVILSTATUS`, `BIRTHDATE`, `BIRTHPLACE`, `AGE`, `USERNAME`, `PASS`, `EMAILADDRESS`, `CONTACTNO`, `DEGREE`, `APPLICANTPHOTO`, `NATIONALID`) VALUES
(2018015, 'Trần', 'Kiên', 'Trung', 'Hà Tĩnh', 'Nam', 'Single', '1992-01-30', 'Hà Tĩnh', 26, 'janry', '1dd4efc811372cd1efe855981a8863d10ddde1ca', 'jan@gmail.com', '0234234', 'BSIT', '', ''),
(2022017, 'Hà', 'Sơn', 'Huy', 'Thôn hưng thắng', 'Male', 'none', '2000-10-24', 'Hà Tĩnh', 21, 'huyson', '89f2ab56d83b1d9d58c0f463b7cc8cd1e70ac18d', 'sonchat2k@gmail.com', '0388580624', 'Đại học', 'photos/ảnh cv - Copy (2).jpg', ''),
(2022018, 'Trương', 'Mạnh', 'Huy', 'Hà Tĩnh', 'Male', 'none', '2000-11-20', 'Hà Tĩnh', 21, 'huymanh', '957fa492aae8fe204ac8cb29816173a7534447fc', 'huymanh@gmail.com', '0123456789', 'Đại Học', 'photos/IMG_20210822_163149_647.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblattachmentfile`
--

CREATE TABLE `tblattachmentfile` (
  `ID` int(11) NOT NULL,
  `FILEID` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `JOBID` int(11) NOT NULL,
  `FILE_NAME` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FILE_LOCATION` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `USERATTACHMENTID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblattachmentfile`
--

INSERT INTO `tblattachmentfile` (`ID`, `FILEID`, `JOBID`, `FILE_NAME`, `FILE_LOCATION`, `USERATTACHMENTID`) VALUES
(2, '2147483647', 2, 'Resume', 'photos/27052018124027PLATENO FE95483.docx', 2018013),
(3, '20226912530', 2, 'Resume', 'photos/02032022055531Hà Huy Sơn CV.pdf', 2022017),
(4, '20226912531', 3, 'Resume', 'photos/05032022015507Cv_NguyenThiHoa.pdf', 2022018);

-- --------------------------------------------------------

--
-- Table structure for table `tblautonumbers`
--

CREATE TABLE `tblautonumbers` (
  `AUTOID` int(11) NOT NULL,
  `AUTOSTART` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AUTOEND` int(11) NOT NULL,
  `AUTOINC` int(11) NOT NULL,
  `AUTOKEY` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblautonumbers`
--

INSERT INTO `tblautonumbers` (`AUTOID`, `AUTOSTART`, `AUTOEND`, `AUTOINC`, `AUTOKEY`) VALUES
(1, '02983', 9, 1, 'userid'),
(2, '000', 78, 1, 'employeeid'),
(3, '0', 19, 1, 'APPLICANT'),
(4, '69125', 32, 1, 'FILEID');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `CATEGORYID` int(11) NOT NULL,
  `CATEGORY` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`CATEGORYID`, `CATEGORY`) VALUES
(10, 'Kế toán'),
(11, 'Quản lý'),
(12, 'Kỹ sư'),
(14, 'Kỹ sư xây dựng'),
(23, 'Bán hàng'),
(24, 'Ngân hàng'),
(25, 'Tài chính'),
(26, 'IT'),
(27, 'Tiếp thị kỹ thuật số'),
(28, 'Shipper');

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany`
--

CREATE TABLE `tblcompany` (
  `COMPANYID` int(11) NOT NULL,
  `COMPANYNAME` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `COMPANYADDRESS` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `COMPANYCONTACTNO` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `COMPANYSTATUS` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `COMPANYMISSION` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblcompany`
--

INSERT INTO `tblcompany` (`COMPANYID`, `COMPANYNAME`, `COMPANYADDRESS`, `COMPANYCONTACTNO`, `COMPANYSTATUS`, `COMPANYMISSION`) VALUES
(2, 'Viettel', 'Hà Nội', '023654', '', 'weqwe'),
(3, 'Sudo', 'Tp Vinh, Nghệ An', '0120122', '', ''),
(4, 'CTY FPT', 'Đã Nẵng', '23165', '', ''),
(6, 'Công TY Điện', 'Thành Phố HCM', '0625656899', '', ''),
(7, 'IT Company', 'Hà Hội', '04564123', '', ''),
(8, 'Nhân Hòa', 'Tp Vinh, Nghệ An', '0123456789', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `INCID` int(11) NOT NULL,
  `EMPLOYEEID` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FNAME` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LNAME` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MNAME` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ADDRESS` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BIRTHDATE` date NOT NULL,
  `BIRTHPLACE` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AGE` int(11) NOT NULL,
  `SEX` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CIVILSTATUS` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TELNO` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EMP_EMAILADDRESS` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CELLNO` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `POSITION` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `WORKSTATS` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EMPPHOTO` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EMPUSERNAME` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EMPPASSWORD` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DATEHIRED` date NOT NULL,
  `COMPANYID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`INCID`, `EMPLOYEEID`, `FNAME`, `LNAME`, `MNAME`, `ADDRESS`, `BIRTHDATE`, `BIRTHPLACE`, `AGE`, `SEX`, `CIVILSTATUS`, `TELNO`, `EMP_EMAILADDRESS`, `CELLNO`, `POSITION`, `WORKSTATS`, `EMPPHOTO`, `EMPUSERNAME`, `EMPPASSWORD`, `DATEHIRED`, `COMPANYID`) VALUES
(76, '2018001', 'Trần', 'Kiên', 'Trung', 'Hà Tĩnh', '2000-01-23', 'Hà Tĩnh', 22, 'Male', 'none', '0388580624', 'trungkien@gmail.com', '', 'Nhân viên', '', '', '2018001', 'f3593fd40c55c33d1788309d4137e82f5eab0dea', '2022-01-14', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `FEEDBACKID` int(11) NOT NULL,
  `APPLICANTID` int(11) NOT NULL,
  `REGISTRATIONID` int(11) NOT NULL,
  `FEEDBACK` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblfeedback`
--

INSERT INTO `tblfeedback` (`FEEDBACKID`, `APPLICANTID`, `REGISTRATIONID`, `FEEDBACK`) VALUES
(2, 2018013, 1, 'Ive seen your work and its really interesting'),
(3, 2018015, 2, 'Người ứng viên nên xem lại mail'),
(4, 2022017, 3, 'Bạn vui lòng gọi cho nhà tuyển dụng'),
(5, 2022018, 4, 'Vui lòng kiểm tra Email để nhận được thông báo phỏng  vấn');

-- --------------------------------------------------------

--
-- Table structure for table `tbljob`
--

CREATE TABLE `tbljob` (
  `JOBID` int(11) NOT NULL,
  `COMPANYID` int(11) NOT NULL,
  `CATEGORY` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OCCUPATIONTITLE` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `REQ_NO_EMPLOYEES` int(11) NOT NULL,
  `SALARIES` int(11) NOT NULL,
  `DURATION_EMPLOYEMENT` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `QUALIFICATION_WORKEXPERIENCE` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `JOBDESCRIPTION` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `PREFEREDSEX` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SECTOR_VACANCY` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `JOBSTATUS` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DATEPOSTED` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbljob`
--

INSERT INTO `tbljob` (`JOBID`, `COMPANYID`, `CATEGORY`, `OCCUPATIONTITLE`, `REQ_NO_EMPLOYEES`, `SALARIES`, `DURATION_EMPLOYEMENT`, `QUALIFICATION_WORKEXPERIENCE`, `JOBDESCRIPTION`, `PREFEREDSEX`, `SECTOR_VACANCY`, `JOBSTATUS`, `DATEPOSTED`) VALUES
(1, 2, 'Kế toán', 'Quản lý lương', 6, 1500, '8 tiếng / ngày', '2 năm kinh nghiệm', 'Chúng tôi đang tìm kiếm cử nhân khoa học về Kế toán', 'None', 'Kế Toán', '', '2022-03-03 00:00:00'),
(2, 2, 'Kế toán', 'Kế toán trưởng', 1, 15000, '8 tiếng / ngày', '2 năm kinh nghiệm làm việc', 'Chúng tôi đang tìm kiếm cử nhân khoa học về Kế toán', 'Nam/Nữ', 'Kế toán', '', '2022-03-03 02:33:00'),
(3, 3, 'IT', 'Nhân viên văn phòng', 5, 1500, '8 tiếng  / ngày', 'Đại học, không cần kinh nghiệm', 'Tuyển nhân viên IT cho công ty lập trình PHP', 'Nam', 'Công nghệ thông tin', '', '2022-03-03 15:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbljobregistration`
--

CREATE TABLE `tbljobregistration` (
  `REGISTRATIONID` int(11) NOT NULL,
  `COMPANYID` int(11) NOT NULL,
  `JOBID` int(11) NOT NULL,
  `APPLICANTID` int(11) NOT NULL,
  `APPLICANT` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `REGISTRATIONDATE` date NOT NULL,
  `REMARKS` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `FILEID` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PENDINGAPPLICATION` tinyint(1) NOT NULL DEFAULT 1,
  `HVIEW` tinyint(1) NOT NULL DEFAULT 1,
  `DATETIMEAPPROVED` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbljobregistration`
--

INSERT INTO `tbljobregistration` (`REGISTRATIONID`, `COMPANYID`, `JOBID`, `APPLICANTID`, `APPLICANT`, `REGISTRATIONDATE`, `REMARKS`, `FILEID`, `PENDINGAPPLICATION`, `HVIEW`, `DATETIMEAPPROVED`) VALUES
(1, 2, 2, 2018013, 'Huy Mạnh', '2022-02-27', 'Ive seen your work and its really interesting', '2147483647', 0, 0, '2022-03-01 23:24:01'),
(2, 2, 2, 2018015, 'Trung Kiên', '2022-02-26', 'Người ứng viên nên xem lại mail', '2147483647', 0, 0, '2022-03-02 10:00:33'),
(3, 2, 2, 2022017, 'Hà Sơn', '2022-03-02', 'Bạn vui lòng gọi cho nhà tuyển dụng', '20226912530', 0, 1, '2022-03-02 16:10:21'),
(4, 3, 3, 2022018, 'Trương Mạnh', '2022-03-05', 'Vui lòng kiểm tra Email để nhận được thông báo phỏng  vấn', '20226912531', 0, 0, '2022-03-05 20:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `USERID` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FULLNAME` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `USERNAME` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PASS` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ROLE` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PICLOCATION` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`USERID`, `FULLNAME`, `USERNAME`, `PASS`, `ROLE`, `PICLOCATION`) VALUES
('00018', 'Huy Sơn', 'huyson', '89f2ab56d83b1d9d58c0f463b7cc8cd1e70ac18d', 'Admin', 'photos/IMG_20210623_095252_816.jpg'),
('029838', 'Thùy Xuân', 'thuyxuan', '7b86563c4dce81a8cf1c4b51c0c08eae72a58f5d', 'Người dùng', 'photos/5d511befdf04120cc46b2867.jfif'),
('2018001', 'Trần Kiên', 'Kiên', 'f3593fd40c55c33d1788309d4137e82f5eab0dea', 'Người dùng', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblapplicants`
--
ALTER TABLE `tblapplicants`
  ADD PRIMARY KEY (`APPLICANTID`);

--
-- Indexes for table `tblattachmentfile`
--
ALTER TABLE `tblattachmentfile`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblautonumbers`
--
ALTER TABLE `tblautonumbers`
  ADD PRIMARY KEY (`AUTOID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`CATEGORYID`);

--
-- Indexes for table `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`COMPANYID`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`INCID`),
  ADD UNIQUE KEY `EMPLOYEEID` (`EMPLOYEEID`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`FEEDBACKID`);

--
-- Indexes for table `tbljob`
--
ALTER TABLE `tbljob`
  ADD PRIMARY KEY (`JOBID`);

--
-- Indexes for table `tbljobregistration`
--
ALTER TABLE `tbljobregistration`
  ADD PRIMARY KEY (`REGISTRATIONID`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`USERID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblapplicants`
--
ALTER TABLE `tblapplicants`
  MODIFY `APPLICANTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2022019;

--
-- AUTO_INCREMENT for table `tblattachmentfile`
--
ALTER TABLE `tblattachmentfile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblautonumbers`
--
ALTER TABLE `tblautonumbers`
  MODIFY `AUTOID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `CATEGORYID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tblcompany`
--
ALTER TABLE `tblcompany`
  MODIFY `COMPANYID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `INCID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `FEEDBACKID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbljob`
--
ALTER TABLE `tbljob`
  MODIFY `JOBID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbljobregistration`
--
ALTER TABLE `tbljobregistration`
  MODIFY `REGISTRATIONID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
