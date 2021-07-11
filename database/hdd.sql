-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 09:21 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

DROP TABLE IF EXISTS `disease`;
CREATE TABLE `disease` (
  `d_id` int(11) NOT NULL,
  `disease_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `symptom`
--

DROP TABLE IF EXISTS `symptom`;
CREATE TABLE `symptom` (
  `s_id` int(11) NOT NULL,
  `symptom_name` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `web_track`
--

DROP TABLE IF EXISTS `web_track`;
CREATE TABLE `web_track` (
  `snlo` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `isp` varchar(150) NOT NULL,
  `country_code` varchar(150) NOT NULL,
  `country` varchar(150) NOT NULL,
  `region` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `zip` varchar(150) NOT NULL,
  `timezone` varchar(150) NOT NULL,
  `org` varchar(150) NOT NULL,
  `as_` varchar(200) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_track`
--

INSERT INTO `web_track` (`snlo`, `ip`, `isp`, `country_code`, `country`, `region`, `city`, `zip`, `timezone`, `org`, `as_`, `date_time`) VALUES
(2, '157.41.51.113', 'Reliance Jio Infocomm Limited', 'IN', 'India', 'Odisha', 'Bhubaneswar', '752101', 'Asia/Kolkata', 'Reliance Jio Infocomm Limited', 'AS55836 Reliance Jio Infocomm Limited', '2021-07-01 03:59:21'),
(3, '157.41.5.81', 'Reliance Jio Infocomm Limited', 'IN', 'India', 'Odisha', 'Bhubaneswar', '751030', 'Asia/Kolkata', 'Reliance Jio Infocomm Limited', 'AS55836 Reliance Jio Infocomm Limited', '2021-07-01 04:03:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `symptom`
--
ALTER TABLE `symptom`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `web_track`
--
ALTER TABLE `web_track`
  ADD PRIMARY KEY (`snlo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `symptom`
--
ALTER TABLE `symptom`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `web_track`
--
ALTER TABLE `web_track`
  MODIFY `snlo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
