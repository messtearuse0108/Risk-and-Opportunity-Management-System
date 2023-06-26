-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 01:25 AM
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
-- Database: `risk`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_plan`
--

CREATE TABLE `action_plan` (
  `id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `aIndex` int(11) NOT NULL,
  `action_plan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `action_plan2`
--

CREATE TABLE `action_plan2` (
  `id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `aIndex` int(11) NOT NULL,
  `action_plan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_table`
--

CREATE TABLE `assessment_table` (
  `id` int(11) NOT NULL,
  `risk_id` int(11) NOT NULL,
  `r_num` varchar(255) NOT NULL,
  `riskOccur` varchar(20) NOT NULL,
  `effective` varchar(20) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `likelihood` varchar(20) NOT NULL,
  `severity` varchar(20) NOT NULL,
  `rpn` int(20) NOT NULL,
  `eval_res` varchar(255) NOT NULL,
  `treatment` varchar(255) NOT NULL,
  `action_plan` varchar(255) NOT NULL,
  `dateAs` date NOT NULL,
  `encoder` varchar(255) NOT NULL,
  `dateEncoded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(11) NOT NULL DEFAULT 0,
  `activity` varchar(255) NOT NULL DEFAULT 'Risk Assessment'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dateass`
--

CREATE TABLE `dateass` (
  `id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `dIndex` int(11) NOT NULL,
  `dateAs` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `division_cat`
--

CREATE TABLE `division_cat` (
  `div_cat_id` int(10) NOT NULL,
  `div_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `division_cat`
--

INSERT INTO `division_cat` (`div_cat_id`, `div_desc`) VALUES
(1, 'PPSMD'),
(2, 'WCPRD'),
(3, 'IPAD'),
(4, 'FINANCE'),
(5, 'BOARD SEC'),
(6, 'ADMIN'),
(7, 'APPEALS');

-- --------------------------------------------------------

--
-- Table structure for table `div_program`
--

CREATE TABLE `div_program` (
  `div_program_id` int(10) NOT NULL,
  `division_cat_id` int(10) NOT NULL,
  `div_cat_desc` varchar(255) NOT NULL,
  `div_program_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `div_program`
--

INSERT INTO `div_program` (`div_program_id`, `division_cat_id`, `div_cat_desc`, `div_program_desc`) VALUES
(1, 1, 'PPSMD', 'Corporate Planning'),
(2, 1, 'PPSMD', 'Formulation of EC Policy'),
(3, 1, 'PPSMD', 'Provision of ICT Support'),
(4, 1, 'PPSMD', 'ICT Preventive Maintenance'),
(5, 2, 'WCPRD', 'Rehabilitation of Persons with work-related disabilities'),
(6, 2, 'WCPRD', 'Quick Response Program'),
(7, 2, 'WCPRD', 'Cash Assistance'),
(8, 3, 'IPAD', 'Public Assistance - 8888 Referrals'),
(9, 3, 'IPAD', 'Public Assistance - Walk In'),
(10, 3, 'IPAD', 'Conduct of On-site ECP Seminar'),
(11, 3, 'IPAD', 'Advocacy and Information Dissemination Virtual and Face to Face'),
(12, 4, 'FINANCE', 'Budget Preparation, approval and implementation'),
(13, 4, 'FINANCE', 'Budget Realignment'),
(14, 4, 'FINANCE', 'Disbursement'),
(15, 5, 'BOARD SEC', 'Preparation and conduct of EC Board Meetings'),
(16, 5, 'BOARD SEC', 'Processing of requested documents'),
(17, 6, 'ADMIN', 'Recruitment,Selection and Placement'),
(18, 6, 'ADMIN', 'Learning and Development'),
(19, 6, 'ADMIN', 'Procurement of Goods and Services(Alternative Modes)'),
(20, 6, 'ADMIN', 'Procurement through Public Bidding'),
(21, 6, 'ADMIN', 'Office Infrastructure Preventive Maintenance(Non-ICT)'),
(22, 6, 'ADMIN', 'Office Infrastructure Corrective Maintenance(Non-ICT)'),
(23, 6, 'ADMIN', 'Supervision of Janitorial and Security Guards Services'),
(24, 6, 'ADMIN', 'Control of Documents'),
(25, 6, 'ADMIN', 'Control of Records'),
(26, 6, 'ADMIN', 'Incoming Documents'),
(27, 6, 'ADMIN', 'Outgoing Documents'),
(28, 6, 'ADMIN', 'Disposal of Valueless'),
(29, 7, 'APPEALS', 'Filing of EC Appealed Case'),
(30, 7, 'APPEALS', 'Disposition of EC Appealed Case'),
(31, 7, 'APPEALS', 'Release of Commission Decision on Appealed Case'),
(32, 7, 'APPEALS', 'Processing of Legal Services');

-- --------------------------------------------------------

--
-- Table structure for table `end_of`
--

CREATE TABLE `end_of` (
  `id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `eIndex` int(11) NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `end_of`
--

INSERT INTO `end_of` (`id`, `r_id`, `eIndex`, `end`) VALUES
(1, 235, 0, '2023-05-30'),
(2, 235, 0, '2023-05-30'),
(3, 236, 0, '2023-05-15'),
(4, 236, 0, '2023-05-30'),
(5, 236, 0, '2023-05-30'),
(6, 237, 0, '2023-05-16'),
(7, 237, 0, '2023-06-09'),
(8, 237, 0, '2023-05-31'),
(9, 237, 0, '2023-05-19'),
(10, 237, 0, '2023-05-21'),
(11, 238, 0, '2023-05-30'),
(12, 238, 0, '2023-05-30'),
(13, 239, 0, '2023-05-30'),
(14, 239, 0, '2023-05-30'),
(15, 240, 0, '2023-05-08'),
(16, 240, 0, '2023-05-30'),
(17, 240, 0, '2023-05-30'),
(18, 241, 0, '2023-05-08'),
(19, 241, 0, '2023-05-30'),
(20, 241, 0, '2023-05-30'),
(21, 242, 0, '2023-05-08'),
(22, 242, 0, '2023-05-30'),
(23, 242, 0, '2023-05-30'),
(24, 243, 0, '2023-05-16'),
(25, 243, 0, '2023-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `factor`
--

CREATE TABLE `factor` (
  `COL 1` varchar(88) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `factor`
--

INSERT INTO `factor` (`COL 1`) VALUES
('INTERNAL'),
('Clients'),
('Environmental'),
('EXTERNAL'),
('External, interested parties'),
('External, interested parties'),
('External, interested parties'),
('External, internal, interested parties'),
('External: Environmental'),
('External: Technological'),
('External: Technological/Internal: Infrastructure'),
('Interested Parties'),
('Interested parties (Commissioners, TRC Chair and Vice Chair, TRC Secretariat)'),
('Interested parties (Commissioners, TRC Secretariat, and Board Secretary)'),
('Interested parties (Committee Members, Chairman, Vice Chair, TRC Secretariat)'),
('Interested parties: Clients'),
('INTERNAL'),
('Internal and interested parties'),
('Internal Factors; People'),
('political, legal, priorities, governing board, head of agency, gcg'),
('Sociological, Environmental, Priorities, Regulatory Agencies, Service Providers, Clients'),
('Technological');

-- --------------------------------------------------------

--
-- Table structure for table `factor_name`
--

CREATE TABLE `factor_name` (
  `id` int(11) NOT NULL,
  `factor_name` varchar(255) NOT NULL,
  `r_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `factor_name1`
--

CREATE TABLE `factor_name1` (
  `id` int(11) NOT NULL,
  `factor_name1` varchar(255) NOT NULL,
  `r_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `factor_name2`
--

CREATE TABLE `factor_name2` (
  `id` int(11) NOT NULL,
  `factor_name2` varchar(255) NOT NULL,
  `r_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `hist_id` int(11) NOT NULL,
  `id` int(10) NOT NULL,
  `encoder` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `timest` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `actDesc` varchar(255) NOT NULL DEFAULT 'Risk'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lookup_table`
--

CREATE TABLE `lookup_table` (
  `lookup_ID` int(11) NOT NULL,
  `lookupcat_ID` int(11) NOT NULL,
  `lookupcat_DESC` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lookup_table`
--

INSERT INTO `lookup_table` (`lookup_ID`, `lookupcat_ID`, `lookupcat_DESC`) VALUES
(1, 1, 'Advocacy'),
(2, 1, 'Press Conference'),
(3, 1, 'IEC Distribution'),
(4, 1, 'In House'),
(5, 1, 'PAC'),
(6, 1, 'Cash Assistance'),
(7, 2, 'Economic'),
(8, 2, 'Priorities'),
(9, 2, 'Internal'),
(10, 2, 'Environmental'),
(11, 2, 'Technological'),
(12, 2, 'Infrastructure'),
(13, 2, 'Interested Parties'),
(14, 2, 'Technological'),
(15, 2, 'Organizational Culture'),
(16, 3, 'Daily'),
(17, 3, 'Twice to Thrice a Week'),
(19, 3, 'Weekly'),
(20, 3, 'Monthly'),
(21, 3, 'Quarterly'),
(22, 3, 'Yearly'),
(23, 4, 'Entrepreneurship'),
(24, 4, 'PAC'),
(25, 4, 'Return to Work'),
(26, 4, 'Internal Audit Structure'),
(27, 4, 'Final Disposition of EC Appealed Cases'),
(28, 4, 'Handling of Client Concerns/Queries'),
(29, 4, 'IPAD'),
(30, 4, 'WCPRD'),
(31, 4, 'QRP-Cash'),
(32, 4, 'IT'),
(33, 4, 'KAGABAY/RTW'),
(34, 4, 'TMA'),
(35, 4, 'PT/OT/Livelihood'),
(36, 4, 'In House/Onsite Webinar'),
(37, 5, 'Sociological/Cultural'),
(38, 5, 'Technological'),
(39, 5, 'Economic'),
(40, 5, 'Environmental'),
(41, 5, 'Economic'),
(42, 5, 'Environmental'),
(43, 5, 'Political'),
(44, 5, 'Legal'),
(45, 6, 'Nature of Business'),
(46, 6, 'Priorities'),
(47, 6, 'Organizational Culture'),
(48, 6, 'Values'),
(49, 6, 'Knowledge'),
(50, 6, 'People'),
(51, 6, 'Infrastructure'),
(53, 7, 'Suppliers/Service Providers'),
(54, 7, 'Regulatory Agencies'),
(56, 7, 'Employees'),
(57, 7, 'Clients');

-- --------------------------------------------------------

--
-- Table structure for table `measure`
--

CREATE TABLE `measure` (
  `id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `mIndex` int(11) NOT NULL,
  `measure` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oppassessment_table`
--

CREATE TABLE `oppassessment_table` (
  `id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `o_num` varchar(255) NOT NULL,
  `oppOccur` varchar(20) NOT NULL,
  `effective` varchar(20) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `likelihood` varchar(20) NOT NULL,
  `severity` varchar(20) NOT NULL,
  `rpn` int(20) NOT NULL,
  `eval_res` varchar(255) NOT NULL,
  `treatment` varchar(255) NOT NULL,
  `action_plan` varchar(255) NOT NULL,
  `dateAs` date NOT NULL,
  `encoder` varchar(255) NOT NULL,
  `dateEncoded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(11) NOT NULL DEFAULT 0,
  `activity` varchar(255) NOT NULL DEFAULT 'Opportunity Assessment'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opportunity_table`
--

CREATE TABLE `opportunity_table` (
  `o_id` int(10) NOT NULL,
  `year_id` varchar(255) NOT NULL,
  `opp_num` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `process` varchar(255) NOT NULL,
  `frequency` varchar(255) NOT NULL,
  `factor` varchar(255) NOT NULL,
  `opp` varchar(255) NOT NULL,
  `impact` varchar(255) NOT NULL,
  `likelihood` int(11) NOT NULL,
  `benefit` int(11) NOT NULL,
  `rpn` int(11) NOT NULL,
  `eval_res` varchar(255) NOT NULL,
  `treatment` varchar(255) NOT NULL,
  `action_plan` varchar(255) NOT NULL,
  `responsible` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `measure` varchar(255) NOT NULL,
  `monitoring` varchar(255) NOT NULL,
  `dataRe` varchar(255) NOT NULL,
  `datareAct` date NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `dateEncoded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `encoder` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL DEFAULT 'Opportunity Management'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `responsible`
--

CREATE TABLE `responsible` (
  `id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `rIndex` int(11) NOT NULL,
  `responsible` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `risk_table`
--

CREATE TABLE `risk_table` (
  `r_id` int(10) NOT NULL,
  `year_id` varchar(255) NOT NULL,
  `risk_num` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `process` varchar(255) NOT NULL,
  `frequency` varchar(255) NOT NULL,
  `factor_name` varchar(255) NOT NULL,
  `risks` varchar(255) NOT NULL,
  `impact` varchar(255) NOT NULL,
  `likelihood` int(11) NOT NULL,
  `severity` int(11) NOT NULL,
  `rpn` int(11) NOT NULL,
  `eval_res` varchar(255) NOT NULL,
  `treatment` varchar(255) NOT NULL,
  `action_plan` varchar(255) NOT NULL,
  `responsible` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `measure` varchar(255) NOT NULL,
  `monitoring` varchar(255) NOT NULL,
  `dataAs` date NOT NULL,
  `dataRe` date NOT NULL,
  `encoder` varchar(255) NOT NULL,
  `dateEncoded` timestamp(5) NOT NULL DEFAULT current_timestamp(5) ON UPDATE current_timestamp(5),
  `deleted` int(11) NOT NULL DEFAULT 0,
  `activity` varchar(255) NOT NULL DEFAULT 'Risk Management'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `start_act`
--

CREATE TABLE `start_act` (
  `id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `sIndex` int(11) NOT NULL,
  `start` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `tIndex` int(11) NOT NULL,
  `treatment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `treatment2`
--

CREATE TABLE `treatment2` (
  `id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `tIndex` int(11) NOT NULL,
  `treatment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `updatehistory`
--

CREATE TABLE `updatehistory` (
  `id` int(22) NOT NULL,
  `risk_id` int(22) NOT NULL,
  `r_num` varchar(255) NOT NULL,
  `riskOccur` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_plan`
--
ALTER TABLE `action_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `action_plan2`
--
ALTER TABLE `action_plan2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_table`
--
ALTER TABLE `assessment_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dateass`
--
ALTER TABLE `dateass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division_cat`
--
ALTER TABLE `division_cat`
  ADD PRIMARY KEY (`div_cat_id`);

--
-- Indexes for table `div_program`
--
ALTER TABLE `div_program`
  ADD PRIMARY KEY (`div_program_id`);

--
-- Indexes for table `end_of`
--
ALTER TABLE `end_of`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factor_name`
--
ALTER TABLE `factor_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factor_name1`
--
ALTER TABLE `factor_name1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factor_name2`
--
ALTER TABLE `factor_name2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`hist_id`) USING BTREE;

--
-- Indexes for table `lookup_table`
--
ALTER TABLE `lookup_table`
  ADD PRIMARY KEY (`lookup_ID`);

--
-- Indexes for table `measure`
--
ALTER TABLE `measure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oppassessment_table`
--
ALTER TABLE `oppassessment_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opportunity_table`
--
ALTER TABLE `opportunity_table`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responsible`
--
ALTER TABLE `responsible`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `risk_table`
--
ALTER TABLE `risk_table`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `start_act`
--
ALTER TABLE `start_act`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatment2`
--
ALTER TABLE `treatment2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updatehistory`
--
ALTER TABLE `updatehistory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_plan`
--
ALTER TABLE `action_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `action_plan2`
--
ALTER TABLE `action_plan2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assessment_table`
--
ALTER TABLE `assessment_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `dateass`
--
ALTER TABLE `dateass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `div_program`
--
ALTER TABLE `div_program`
  MODIFY `div_program_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `end_of`
--
ALTER TABLE `end_of`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `factor_name`
--
ALTER TABLE `factor_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=530;

--
-- AUTO_INCREMENT for table `factor_name1`
--
ALTER TABLE `factor_name1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `factor_name2`
--
ALTER TABLE `factor_name2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `hist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;

--
-- AUTO_INCREMENT for table `lookup_table`
--
ALTER TABLE `lookup_table`
  MODIFY `lookup_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `measure`
--
ALTER TABLE `measure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `oppassessment_table`
--
ALTER TABLE `oppassessment_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `opportunity_table`
--
ALTER TABLE `opportunity_table`
  MODIFY `o_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `responsible`
--
ALTER TABLE `responsible`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `risk_table`
--
ALTER TABLE `risk_table`
  MODIFY `r_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `start_act`
--
ALTER TABLE `start_act`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `treatment2`
--
ALTER TABLE `treatment2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `updatehistory`
--
ALTER TABLE `updatehistory`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
