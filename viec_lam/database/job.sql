-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 01, 2022 lúc 04:16 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `job_cv`
--
CREATE DATABASE IF NOT EXISTS `job` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `job`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblapplicants`
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
-- Đang đổ dữ liệu cho bảng `tblapplicants`
--

INSERT INTO `tblapplicants` (`APPLICANTID`, `FNAME`, `LNAME`, `MNAME`, `ADDRESS`, `SEX`, `CIVILSTATUS`, `BIRTHDATE`, `BIRTHPLACE`, `AGE`, `USERNAME`, `PASS`, `EMAILADDRESS`, `CONTACTNO`, `DEGREE`, `APPLICANTPHOTO`, `NATIONALID`) VALUES
(2018015, 'Trần', 'Kiên', 'Trung', 'Hà Tĩnh', 'Nam', 'Việt Nam', '1992-01-30', 'Hà Tĩnh', 26, 'trungkien', '1dd4efc811372cd1efe855981a8863d10ddde1ca', 'trungkien@gmail.com', '0234234', 'BSIT', '', ''),
(2022017, 'Hà', 'Sơn', 'Huy', 'Thôn hưng thắng', 'Nam', 'Việt Nam', '2000-10-24', 'Thôn hưng thắng', 21, 'huyson', '89f2ab56d83b1d9d58c0f463b7cc8cd1e70ac18d', 'sonchat2k@gmail.com', '0388580624', 'Đại học', 'photos/ảnh cv - Copy (2).jpg', ''),
(2022018, 'Trương', 'Mạnh', 'Huy', 'Hà Tĩnh', 'Nam', 'Việt Nam', '2000-11-20', 'Hà Tĩnh', 21, 'huymanh', '957fa492aae8fe204ac8cb29816173a7534447fc', 'huymanh@gmail.com', '0123456789', 'Đại Học', 'photos/IMG_20210822_163149_647.jpg', ''),
(2022019, 'Trương', 'Mạnh', 'Huy', 'Hà Tĩnh', 'Nam', 'Việt Nam', '2000-11-20', 'Hà Tĩnh', 21, 'manhtruong', '06d026bed902bd1cf5139cf49647b41d62a9c315', 'manhtruong20@gmail.com', '0388580624', 'Cao đẳng', 'photos/IMG_20210822_163149_647 (2).jpg', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblattachmentfile`
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
-- Đang đổ dữ liệu cho bảng `tblattachmentfile`
--

INSERT INTO `tblattachmentfile` (`ID`, `FILEID`, `JOBID`, `FILE_NAME`, `FILE_LOCATION`, `USERATTACHMENTID`) VALUES
(2, '2147483647', 2, 'Resume', 'photos/27052018124027PLATENO FE95483.docx', 2018013),
(3, '20226912530', 2, 'Resume', 'photos/02032022055531Hà Huy Sơn CV.pdf', 2022017),
(4, '20226912531', 3, 'Resume', 'photos/05032022015507Cv_NguyenThiHoa.pdf', 2022018),
(5, '20226912534', 2, 'Resume', 'photos/11052022094803Mau_Don_Xet_TN.pdf', 2022019),
(6, '20226912535', 6, 'Resume', 'photos/11052022095319FresherJava.pdf', 2022019);

-- --------------------------------------------------------



-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblcategory`
--

CREATE TABLE `tblcategory` (
  `CATEGORYID` int(11) NOT NULL,
  `CATEGORY` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblcategory`
--

INSERT INTO `tblcategory` (`CATEGORYID`, `CATEGORY`) VALUES
(10, 'Kế toán'),
(11, 'Quản lý'),
(12, 'Kỹ sư'),
(14, 'Kỹ sư xây dựng'),
(23, 'Bán hàng'),
(24, 'Ngân hàng'),
(25, 'Tài chính'),
(26, 'IT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblcompany`
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
-- Đang đổ dữ liệu cho bảng `tblcompany`
--

INSERT INTO `tblcompany` (`COMPANYID`, `COMPANYNAME`, `COMPANYADDRESS`, `COMPANYCONTACTNO`, `COMPANYSTATUS`, `COMPANYMISSION`) VALUES
(2, 'Viettel', 'Hà Nội', '0399652146', '', 'weqwe'),
(3, 'Sudo', 'Tp Vinh, Nghệ An', '0365892136', '', ''),
(4, ' FPT', 'Đã Nẵng', '0372651426', '', ''),
(7, 'IT Company', 'Hà Hội', '0909549000', '', ''),
(8, 'Nhân Hòa', 'Tp Vinh, Nghệ An', '0365460128', '', ''),
(10, ' Ecrom', 'TP Vinh', '0385695877', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblemployees`
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
-- Đang đổ dữ liệu cho bảng `tblemployees`
--

INSERT INTO `tblemployees` (`INCID`, `EMPLOYEEID`, `FNAME`, `LNAME`, `MNAME`, `ADDRESS`, `BIRTHDATE`, `BIRTHPLACE`, `AGE`, `SEX`, `CIVILSTATUS`, `TELNO`, `EMP_EMAILADDRESS`, `CELLNO`, `POSITION`, `WORKSTATS`, `EMPPHOTO`, `EMPUSERNAME`, `EMPPASSWORD`, `DATEHIRED`, `COMPANYID`) VALUES
(76, '2018001', 'Trần', 'Kiên', 'Trung', 'Hà Tĩnh', '2000-01-23', 'Hà Tĩnh', 22, 'Nam', 'Việt Nam', '0388580624', 'trungkien@gmail.com', '', 'Nhân viên', '', '', '2018001', 'f3593fd40c55c33d1788309d4137e82f5eab0dea', '2022-01-14', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `FEEDBACKID` int(11) NOT NULL,
  `APPLICANTID` int(11) NOT NULL,
  `REGISTRATIONID` int(11) NOT NULL,
  `FEEDBACK` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblfeedback`
--

INSERT INTO `tblfeedback` (`FEEDBACKID`, `APPLICANTID`, `REGISTRATIONID`, `FEEDBACK`) VALUES
(3, 2018015, 2, 'Người ứng viên nên xem lại mail'),
(4, 2022017, 3, 'Bạn vui lòng gọi cho nhà tuyển dụng'),
(5, 2022018, 4, 'Vui lòng kiểm tra Email để nhận được thông báo phỏng  vấn'),
(6, 2022019, 6, 'Ứng viên bị loại'),
(7, 2022019, 5, 'Bạn vui lòng gọi cho nhà tuyển dụng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbljob`
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
-- Đang đổ dữ liệu cho bảng `tbljob`
--

INSERT INTO `tbljob` (`JOBID`, `COMPANYID`, `CATEGORY`, `OCCUPATIONTITLE`, `REQ_NO_EMPLOYEES`, `SALARIES`, `DURATION_EMPLOYEMENT`, `QUALIFICATION_WORKEXPERIENCE`, `JOBDESCRIPTION`, `PREFEREDSEX`, `SECTOR_VACANCY`, `JOBSTATUS`, `DATEPOSTED`) VALUES
(1, 2, 'Kế toán', 'Quản lý lương', 6, 15, '8 tiếng / ngày', '2 năm kinh nghiệm', 'Chúng tôi đang tìm kiếm cử nhân khoa học về Kế toán', 'Nam', 'Kế Toán', 'Đang cần nhân viên', '2022-03-03 00:00:00'),
(2, 2, 'Kế toán', 'Kế toán trưởng', 1, 15, '8 tiếng / ngày', '2 năm kinh nghiệm làm việc', 'Chúng tôi đang tìm kiếm cử nhân khoa học về Kế toán', 'Nam', 'Kế toán', 'Đang cần nhân viên', '2022-03-03 02:33:00'),
(6, 4, 'IT', 'Lập trình PHP', 3, 15, '8 tiếng  / ngày', 'Đại học', 'Coder', 'Nam', 'Công nghệ thông tin', '', '2022-05-10 17:51:00'),
(7, 7, 'IT', 'Lập trình  Asp.Net', 4, 14, '8 tiếng  / ngày', 'Cao đẳng', 'Webdeveloper', 'Nam', 'Công nghệ thông tin', '', '2022-05-10 17:52:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbljobregistration`
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
-- Đang đổ dữ liệu cho bảng `tbljobregistration`
--

INSERT INTO `tbljobregistration` (`REGISTRATIONID`, `COMPANYID`, `JOBID`, `APPLICANTID`, `APPLICANT`, `REGISTRATIONDATE`, `REMARKS`, `FILEID`, `PENDINGAPPLICATION`, `HVIEW`, `DATETIMEAPPROVED`) VALUES
(2, 2, 2, 2018015, 'Trung Kiên', '2022-02-26', 'Người ứng viên nên xem lại mail', '2147483647', 0, 0, '2022-03-02 10:00:33'),
(3, 2, 2, 2022017, 'Huy Sơn', '2022-03-02', 'Bạn vui lòng gọi cho nhà tuyển dụng', '20226912530', 0, 1, '2022-04-19 17:07:28'),
(4, 3, 3, 2022018, 'Trương Mạnh', '2022-03-05', 'Vui lòng kiểm tra Email để nhận được thông báo phỏng  vấn', '20226912531', 0, 0, '2022-03-05 20:28:26'),
(5, 2, 2, 2022019, 'Trương Mạnh', '2022-05-11', 'Bạn vui lòng gọi cho nhà tuyển dụng', '20226912534', 0, 0, '2022-05-18 14:15:44'),
(6, 4, 6, 2022019, 'Trương Mạnh', '2022-05-11', 'Ứng viên bị loại', '20226912535', 0, 0, '2022-05-11 17:23:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblusers`
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
-- Đang đổ dữ liệu cho bảng `tblusers`
--

INSERT INTO `tblusers` (`USERID`, `FULLNAME`, `USERNAME`, `PASS`, `ROLE`, `PICLOCATION`) VALUES
('00018', 'Huy Sơn', 'huyson', '89f2ab56d83b1d9d58c0f463b7cc8cd1e70ac18d', 'Quản trị viên', 'photos/IMG_20210623_095252_816.jpg'),
('029838', 'Thùy Xuân', 'thuyxuan', '7b86563c4dce81a8cf1c4b51c0c08eae72a58f5d', 'Người dùng', 'photos/5d511befdf04120cc46b2867.jfif'),
('2018001', 'Trần Kiên', 'Kiên', 'f3593fd40c55c33d1788309d4137e82f5eab0dea', 'Người dùng', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tblapplicants`
--
ALTER TABLE `tblapplicants`
  ADD PRIMARY KEY (`APPLICANTID`);

--
-- Chỉ mục cho bảng `tblattachmentfile`
--
ALTER TABLE `tblattachmentfile`
  ADD PRIMARY KEY (`ID`);


-- Chỉ mục cho bảng `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`CATEGORYID`);

--
-- Chỉ mục cho bảng `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`COMPANYID`);

--
-- Chỉ mục cho bảng `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`INCID`),
  ADD UNIQUE KEY `EMPLOYEEID` (`EMPLOYEEID`);

--
-- Chỉ mục cho bảng `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`FEEDBACKID`);

--
-- Chỉ mục cho bảng `tbljob`
--
ALTER TABLE `tbljob`
  ADD PRIMARY KEY (`JOBID`);

--
-- Chỉ mục cho bảng `tbljobregistration`
--
ALTER TABLE `tbljobregistration`
  ADD PRIMARY KEY (`REGISTRATIONID`);

--
-- Chỉ mục cho bảng `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`USERID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tblapplicants`
--
ALTER TABLE `tblapplicants`
  MODIFY `APPLICANTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2022020;

--
-- AUTO_INCREMENT cho bảng `tblattachmentfile`
--
ALTER TABLE `tblattachmentfile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


--
-- AUTO_INCREMENT cho bảng `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `CATEGORYID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `tblcompany`
--
ALTER TABLE `tblcompany`
  MODIFY `COMPANYID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `INCID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `FEEDBACKID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbljob`
--
ALTER TABLE `tbljob`
  MODIFY `JOBID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbljobregistration`
--
ALTER TABLE `tbljobregistration`
  MODIFY `REGISTRATIONID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
