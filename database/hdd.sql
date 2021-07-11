-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2021 at 10:28 PM
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
-- Database: `hdd`
--
CREATE DATABASE IF NOT EXISTS `hdd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hdd`;

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--
-- Creation: May 09, 2021 at 07:45 AM
--

DROP TABLE IF EXISTS `disease`;
CREATE TABLE IF NOT EXISTS `disease` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `disease_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `disease`:
--

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`d_id`, `disease_name`) VALUES
(1, '(vertigo) Paroymsal  Positional Vertigo'),
(2, 'Acne'),
(3, 'AIDS'),
(4, 'Alcoholic hepatitis'),
(5, 'Allergy'),
(6, 'Arthritis'),
(7, 'Bronchial Asthma'),
(8, 'Cervical spondylosis'),
(9, 'Chicken pox'),
(10, 'Chronic cholestasis'),
(11, 'Common Cold'),
(12, 'Dengue'),
(13, 'Diabetes '),
(14, 'Dimorphic hemmorhoids(piles)'),
(15, 'Drug Reaction'),
(16, 'Fungal infection'),
(17, 'Gastroenteritis'),
(18, 'GERD'),
(19, 'Heart attack'),
(20, 'hepatitis A'),
(21, 'Hepatitis B'),
(22, 'Hepatitis C'),
(23, 'Hepatitis D'),
(24, 'Hepatitis E'),
(25, 'Hypertension '),
(26, 'Hyperthyroidism'),
(27, 'Hypoglycemia'),
(28, 'Hypothyroidism'),
(29, 'Impetigo'),
(30, 'Jaundice'),
(31, 'Malaria'),
(32, 'Migraine'),
(33, 'Osteoarthristis'),
(34, 'Paralysis (brain hemorrhage)'),
(35, 'Peptic ulcer diseae'),
(36, 'Pneumonia'),
(37, 'Psoriasis'),
(38, 'Tuberculosis'),
(39, 'Typhoid'),
(40, 'Urinary tract infection'),
(41, 'Varicose veins');

-- --------------------------------------------------------

--
-- Table structure for table `hdduser`
--
-- Creation: May 05, 2021 at 10:02 AM
--

DROP TABLE IF EXISTS `hdduser`;
CREATE TABLE IF NOT EXISTS `hdduser` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `u_type` int(1) DEFAULT NULL,
  `f_name` varchar(40) DEFAULT NULL,
  `l_name` varchar(30) DEFAULT NULL,
  `gender` enum('M','F','O') DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(300) NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=21000012 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `hdduser`:
--

--
-- Dumping data for table `hdduser`
--

INSERT INTO `hdduser` (`uid`, `u_type`, `f_name`, `l_name`, `gender`, `dob`, `mobile`, `email`, `password`, `address`) VALUES
(21000001, 1, 'Narayan', 'Sahu', 'M', '1997-07-02', 8456890730, 'nsahu@gmail.com', 'rabin', 'AT/PO- BARAGAON'),
(21000003, 0, 'Ratan Kumar', 'Murmu', 'M', '1996-10-17', 9178999123, 'ratan@gmail.com', 'ratan', 'baripada'),
(21000007, 0, 'Satyajit', 'Rout', 'M', '1996-04-16', 8658250505, 'stjtrout@gmail.com', 'satya', 'chandikhol, Jajpur'),
(21000010, 0, 'Swarup kumar', 'Dey', 'M', '1998-03-19', 8658250051, 'swarup@gmal.com', 'swarup', 'bhogorai, balasore'),
(21000011, 0, 'Sourav', 'Parida', 'M', '1998-01-23', 8989126787, 'saurav@yahoo.com', 'saurav', 'Cuttack');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--
-- Creation: May 05, 2021 at 11:08 AM
-- Last update: May 23, 2021 at 08:03 PM
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `slno` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `u_type` int(11) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`slno`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `login`:
--

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`slno`, `uid`, `u_type`, `date`, `status`) VALUES
(2, 21000001, 1, '2021-05-05 16:27:24', 0),
(3, 21000001, 1, '2021-05-05 16:33:27', 0),
(4, 21000001, 1, '2021-05-06 12:28:53', 0),
(18, 21000001, 1, '2021-05-17 21:48:38', 0),
(19, 21000001, 1, '2021-05-17 21:53:58', 0),
(20, 21000001, 1, '2021-05-17 22:48:09', 0),
(21, 21000001, 1, '2021-05-17 23:12:09', 0),
(22, 21000001, 1, '2021-05-18 09:13:13', 0),
(23, 21000001, 1, '2021-05-18 09:19:39', 0),
(24, 21000001, 1, '2021-05-18 09:34:20', 0),
(25, 21000001, 1, '2021-05-18 09:38:08', 0),
(26, 21000001, 1, '2021-05-18 09:46:17', 0),
(27, 21000001, 1, '2021-05-18 10:01:25', 0),
(28, 21000001, 1, '2021-05-18 10:02:37', 0),
(29, 21000001, 1, '2021-05-18 10:14:33', 0),
(30, 21000001, 1, '2021-05-18 10:16:47', 0),
(31, 21000001, 1, '2021-05-18 10:48:52', 0),
(32, 21000001, 1, '2021-05-18 12:27:39', 0),
(33, 21000001, 1, '2021-05-18 14:12:14', 0),
(34, 21000001, 1, '2021-05-18 15:28:04', 1),
(35, 21000001, 1, '2021-05-19 16:00:15', 0),
(36, 21000001, 1, '2021-05-19 16:59:10', 0),
(37, 21000001, 1, '2021-05-19 19:06:25', 0),
(38, 21000001, 1, '2021-05-19 19:30:19', 1),
(39, 21000001, 1, '2021-05-20 11:45:18', 1),
(40, 21000001, 1, '2021-05-21 13:34:56', 1),
(41, 21000003, 0, '2021-05-21 20:20:50', 1),
(42, 21000003, 0, '2021-05-22 12:24:45', 0),
(43, 21000003, 0, '2021-05-23 10:28:23', 0),
(44, 111125, 2, '2021-05-23 16:27:41', 0),
(45, 21000003, 0, '2021-05-23 18:34:24', 0),
(46, 111125, 2, '2021-05-23 18:54:58', 0),
(47, 111125, 2, '2021-05-23 19:17:57', 0),
(48, 21000003, 0, '2021-05-23 19:21:46', 0),
(49, 111113, 2, '2021-05-23 19:25:24', 0),
(50, 111119, 2, '2021-05-23 19:26:43', 0),
(51, 21000001, 1, '2021-05-23 21:41:46', 0),
(52, 21000001, 1, '2021-05-24 01:12:38', 0),
(53, 21000003, 0, '2021-05-24 01:33:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--
-- Creation: May 21, 2021 at 06:25 PM
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `gender` enum('M','F','O') DEFAULT NULL,
  `mobile` bigint(10) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=111126 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `profile`:
--

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`pid`, `name`, `age`, `gender`, `mobile`, `city`, `uid`) VALUES
(111113, 'Rabin Sahu', 23, 'M', 8456890730, 'Ganjam', 21000003),
(111119, 'Satyajit Rout', 24, 'M', 1234567890, 'Jajpur', 21000003),
(111120, 'Demo', 1, 'O', 1234567890, 'demo', 21000003),
(111122, 'saurav', 21, 'M', 1234567890, 'ctc', 21000003),
(111123, 'rabin', 12, 'M', 1098765432, 'demo1', 21000007),
(111124, 'abcd', 13, 'M', 8765432189, 'xyz', 21000007),
(111125, 'abcd', 23, 'M', 9876545678, 'bls', 21000003);

-- --------------------------------------------------------

--
-- Table structure for table `symptom`
--
-- Creation: May 09, 2021 at 09:15 AM
--

DROP TABLE IF EXISTS `symptom`;
CREATE TABLE IF NOT EXISTS `symptom` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `symptom_name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=243 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `symptom`:
--

--
-- Dumping data for table `symptom`
--

INSERT INTO `symptom` (`s_id`, `symptom_name`) VALUES
(111, 'abdominal_pain'),
(112, 'abnormal_menstruation'),
(113, 'acidity'),
(114, 'acute_liver_failure'),
(115, 'altered_sensorium'),
(116, 'anxiety'),
(117, 'back_pain'),
(118, 'belly_pain'),
(119, 'blackheads'),
(120, 'bladder_discomfort'),
(121, 'blister'),
(122, 'blood_in_sputum'),
(123, 'bloody_stool'),
(124, 'blurred_and_distorted_vision'),
(125, 'breathlessness'),
(126, 'brittle_nails'),
(127, 'bruising'),
(128, 'burning_micturition'),
(129, 'chest_pain'),
(130, 'chills'),
(131, 'cold_hands_and_feets'),
(132, 'coma'),
(133, 'congestion'),
(134, 'constipation'),
(135, 'continuous_feel_of_urine'),
(136, 'continuous_sneezing'),
(137, 'cough'),
(138, 'cramps'),
(139, 'dark_urine'),
(140, 'dehydration'),
(141, 'depression'),
(142, 'diarrhoea'),
(143, 'dischromic _patches'),
(144, 'distention_of_abdomen'),
(145, 'dizziness'),
(146, 'drying_and_tingling_lips'),
(147, 'enlarged_thyroid'),
(148, 'excessive_hunger'),
(149, 'extra_marital_contacts'),
(150, 'family_history'),
(151, 'fast_heart_rate'),
(152, 'fatigue'),
(153, 'fluid_overload'),
(154, 'fluid_overload'),
(155, 'foul_smell_of urine'),
(156, 'headache'),
(157, 'high_fever'),
(158, 'hip_joint_pain'),
(159, 'history_of_alcohol_consumption'),
(160, 'increased_appetite'),
(161, 'indigestion'),
(162, 'inflammatory_nails'),
(163, 'internal_itching'),
(164, 'irregular_sugar_level'),
(165, 'irritability'),
(166, 'irritation_in_anus'),
(167, 'itching'),
(168, 'joint_pain'),
(169, 'knee_pain'),
(170, 'lack_of_concentration'),
(171, 'lethargy'),
(172, 'loss_of_appetite'),
(173, 'loss_of_balance'),
(174, 'loss_of_smell'),
(175, 'malaise'),
(176, 'mild_fever'),
(177, 'mood_swings'),
(178, 'movement_stiffness'),
(179, 'mucoid_sputum'),
(180, 'muscle_pain'),
(181, 'muscle_wasting'),
(182, 'muscle_weakness'),
(183, 'nausea'),
(184, 'neck_pain'),
(185, 'nodal_skin_eruptions'),
(186, 'obesity'),
(187, 'pain_behind_the_eyes'),
(188, 'pain_during_bowel_movements'),
(189, 'pain_in_anal_region'),
(190, 'painful_walking'),
(191, 'palpitations'),
(192, 'passage_of_gases'),
(193, 'patches_in_throat'),
(194, 'phlegm'),
(195, 'polyuria'),
(196, 'prominent_veins_on_calf'),
(197, 'puffy_face_and_eyes'),
(198, 'pus_filled_pimples'),
(199, 'receiving_blood_transfusion'),
(200, 'receiving_unsterile_injections'),
(201, 'red_sore_around_nose'),
(202, 'red_spots_over_body'),
(203, 'redness_of_eyes'),
(204, 'restlessness'),
(205, 'runny_nose'),
(206, 'rusty_sputum'),
(207, 'scurring'),
(208, 'shivering'),
(209, 'silver_like_dusting'),
(210, 'sinus_pressure'),
(211, 'skin_peeling'),
(212, 'skin_rash'),
(213, 'slurred_speech'),
(214, 'small_dents_in_nails'),
(215, 'spinning_movements'),
(216, 'spotting_ urination'),
(217, 'stiff_neck'),
(218, 'stomach_bleeding'),
(219, 'stomach_pain'),
(220, 'sunken_eyes'),
(221, 'sweating'),
(222, 'swelled_lymph_nodes'),
(223, 'swelling_joints'),
(224, 'swelling_of_stomach'),
(225, 'swollen_blood_vessels'),
(226, 'swollen_extremeties'),
(227, 'swollen_legs'),
(228, 'throat_irritation'),
(229, 'toxic_look_(typhos)'),
(230, 'ulcers_on_tongue'),
(231, 'unsteadiness'),
(232, 'visual_disturbances'),
(233, 'vomiting'),
(234, 'watering_from_eyes'),
(235, 'weakness_in_limbs'),
(236, 'weakness_of_one_body_side'),
(237, 'weight_gain'),
(238, 'weight_loss'),
(239, 'yellow_crust_ooze'),
(240, 'yellow_urine'),
(241, 'yellowing_of_eyes'),
(242, 'yellowish_skin');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--
-- Creation: Apr 29, 2021 at 01:32 PM
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_name` varchar(30) DEFAULT NULL,
  `No_tests` int(11) NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=606 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `test`:
--

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `test_name`, `No_tests`) VALUES
(601, 'Blood Sugar', 3),
(602, 'Liver Function', 5),
(603, 'Lipid Profile', 7),
(604, 'Serum Electrolytes', 2),
(605, 'sample', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test_reference`
--
-- Creation: Apr 25, 2021 at 05:30 AM
--

DROP TABLE IF EXISTS `test_reference`;
CREATE TABLE IF NOT EXISTS `test_reference` (
  `ref_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `minimum_range` float DEFAULT NULL,
  `maximum_range` float DEFAULT NULL,
  `unit` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ref_id`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `test_reference`:
--   `test_id`
--       `test` -> `test_id`
--

--
-- Dumping data for table `test_reference`
--

INSERT INTO `test_reference` (`ref_id`, `test_id`, `name`, `minimum_range`, `maximum_range`, `unit`) VALUES
(101, 601, 'RESULTS', 70, 160, 'MG%'),
(102, 601, 'Serum UREA', 15, 45, 'mg/dl'),
(105, 604, 'Serum Sodium', 136, 149, 'm.eq/l'),
(107, 604, 'Serum Potassium', 3.8, 5.2, 'm.eq/l'),
(108, 601, 'Serum CREATININE', 0.6, 1.4, 'mg/dl'),
(109, 602, 'Bilirubin-Total', 0, 1, 'mg%'),
(110, 602, 'Bilirubin-Direct', 0, 1, 'mg%'),
(111, 602, 'Bilirubin-Indirect', 0.1, 1, 'mg%'),
(112, 602, 'SGPT', 5, 40, 'IU/L'),
(113, 602, 'SGOT', 8, 37, 'IU/L'),
(114, 603, 'S. Cholesterol', 125, 225, 'mg/dl'),
(115, 603, 'S. Triglycerides', 25, 160, 'mg/dl'),
(116, 603, 'HDL Cholesterol', 30, 70, 'mg/dl'),
(117, 603, 'VLDL Cholesterol', 7, 35, 'mg/dl'),
(118, 603, 'LDLC/HDLC RATIO', 2.5, 3.5, 'mg/dl'),
(119, 603, 'TC/HDLC RATIO', 3, 5, 'mg/dl'),
(120, 603, 'LDL Cholesterol', 85, 150, 'mg/dl'),
(129, 605, 'samplesubtest', 13, 67, 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `test_result`
--
-- Creation: May 03, 2021 at 02:07 PM
-- Last update: May 23, 2021 at 08:04 PM
--

DROP TABLE IF EXISTS `test_result`;
CREATE TABLE IF NOT EXISTS `test_result` (
  `tr_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `sub_test_id` int(11) NOT NULL,
  `sub_test_name` varchar(100) DEFAULT NULL,
  `value` float DEFAULT 0,
  `status` int(11) DEFAULT 0,
  PRIMARY KEY (`tr_id`,`test_id`,`sub_test_id`),
  KEY `sub_test_id` (`sub_test_id`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `test_result`:
--   `sub_test_id`
--       `test_reference` -> `ref_id`
--   `test_id`
--       `test` -> `test_id`
--

--
-- Dumping data for table `test_result`
--

INSERT INTO `test_result` (`tr_id`, `test_id`, `sub_test_id`, `sub_test_name`, `value`, `status`) VALUES
(1025, 601, 101, 'RESULTS', 5, 1),
(1025, 601, 102, 'Serum UREA', 6, 1),
(1025, 601, 108, 'Serum CREATININE', 9, 1),
(1026, 603, 114, 'S. Cholesterol', 4, 1),
(1026, 603, 115, 'S. Triglycerides', 4, 1),
(1026, 603, 116, 'HDL Cholesterol', 2, 1),
(1026, 603, 117, 'VLDL Cholesterol', 1, 1),
(1026, 603, 118, 'LDLC/HDLC RATIO', 3, 1),
(1026, 603, 119, 'TC/HDLC RATIO', 7, 1),
(1026, 603, 120, 'LDL Cholesterol', 1, 1),
(1027, 601, 101, 'RESULTS', 9, 1),
(1027, 601, 102, 'Serum UREA', 5, 1),
(1027, 601, 108, 'Serum CREATININE', 1, 1),
(1028, 603, 114, 'S. Cholesterol', 0, 1),
(1028, 603, 115, 'S. Triglycerides', 0, 1),
(1028, 603, 116, 'HDL Cholesterol', 0, 1),
(1028, 603, 117, 'VLDL Cholesterol', 0, 1),
(1028, 603, 118, 'LDLC/HDLC RATIO', 0, 1),
(1028, 603, 119, 'TC/HDLC RATIO', 0, 1),
(1028, 603, 120, 'LDL Cholesterol', 0, 1),
(1029, 604, 105, 'Serum Sodium', 10, 1),
(1029, 604, 107, 'Serum Potassium', 20, 1),
(1030, 604, 105, 'Serum Sodium', 30, 1),
(1030, 604, 107, 'Serum Potassium', 35, 1),
(1031, 602, 109, 'Bilirubin-Total', 8, 1),
(1031, 602, 110, 'Bilirubin-Direct', 100, 1),
(1031, 602, 111, 'Bilirubin-Indirect', 111, 1),
(1031, 602, 112, 'SGPT', 278, 1),
(1031, 602, 113, 'SGOT', 100, 1),
(1032, 604, 105, 'Serum Sodium', 3, 1),
(1032, 604, 107, 'Serum Potassium', 5, 1),
(1033, 603, 114, 'S. Cholesterol', 0, 0),
(1033, 603, 115, 'S. Triglycerides', 0, 0),
(1033, 603, 116, 'HDL Cholesterol', 0, 0),
(1033, 603, 117, 'VLDL Cholesterol', 0, 0),
(1033, 603, 118, 'LDLC/HDLC RATIO', 0, 0),
(1033, 603, 119, 'TC/HDLC RATIO', 0, 0),
(1033, 603, 120, 'LDL Cholesterol', 0, 0),
(1034, 604, 105, 'Serum Sodium', 0, 0),
(1034, 604, 107, 'Serum Potassium', 0, 0),
(1035, 601, 101, 'RESULTS', 0, 0),
(1035, 601, 102, 'Serum UREA', 0, 0),
(1035, 601, 108, 'Serum CREATININE', 0, 0),
(1036, 604, 105, 'Serum Sodium', 0, 0),
(1036, 604, 107, 'Serum Potassium', 0, 0),
(1037, 605, 129, 'samplesubtest', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--
-- Creation: May 03, 2021 at 09:44 AM
-- Last update: May 23, 2021 at 08:04 PM
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `pid` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `tr_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`tr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1038 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `transaction`:
--

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`pid`, `test_id`, `date`, `tr_id`, `status`) VALUES
(111123, 601, '2021-05-16', 1025, 1),
(111123, 603, '2021-05-16', 1026, 1),
(111124, 601, '2021-05-16', 1027, 1),
(111124, 603, '2021-05-16', 1028, 1),
(111124, 604, '2021-05-16', 1029, 1),
(111119, 604, '2021-05-18', 1030, 1),
(111119, 602, '2021-05-18', 1031, 1),
(111119, 604, '2021-05-18', 1032, 1),
(111125, 603, '2021-05-22', 1033, 0),
(111125, 604, '2021-05-22', 1034, 0),
(111122, 601, '2021-05-24', 1035, 0),
(111122, 604, '2021-05-24', 1036, 0),
(111122, 605, '2021-05-24', 1037, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `test_reference`
--
ALTER TABLE `test_reference`
  ADD CONSTRAINT `test_reference_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`);

--
-- Constraints for table `test_result`
--
ALTER TABLE `test_result`
  ADD CONSTRAINT `test_result_ibfk_1` FOREIGN KEY (`sub_test_id`) REFERENCES `test_reference` (`ref_id`),
  ADD CONSTRAINT `test_result_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
