-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 08, 2019 at 06:18 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id10765695_db_sji`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clients`
--

CREATE TABLE `tbl_clients` (
  `client_id` int(11) NOT NULL,
  `client_firstname` varchar(50) NOT NULL,
  `client_middlename` varchar(25) NOT NULL,
  `client_lastname` varchar(50) NOT NULL,
  `client_address` text NOT NULL,
  `client_contactnumber` varchar(11) NOT NULL DEFAULT '09000000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_clients`
--

INSERT INTO `tbl_clients` (`client_id`, `client_firstname`, `client_middlename`, `client_lastname`, `client_address`, `client_contactnumber`) VALUES
(1, 'sdf', 'sd', 's', 'a', 'ds'),
(2, 'sdf', 'sd', 's', 'a', 'ds'),
(3, 'sdf', 'sd', 's', 'a', 'ds'),
(4, 'sdf', 'sd', 's', 'a', 'ds'),
(5, 'sdf', 'sd', 's', 'a', 'ds'),
(6, 'sa', 'asda', 'asda', 'sasd', 'sadasd'),
(7, 'sa', 'asda', 'asda', 'sasd', 'sadasd'),
(8, 'asd', 's', 'asdasd', 'asdas', 'dasas'),
(9, 'asda', 'ada', 'ad', 'asd', 'asda'),
(10, 'asda', 'ada', 'ad', 'asd', 'asda'),
(11, 'asda', 'ada', 'ad', 'asd', 'asda'),
(12, 'asda', 'ada', 'ad', 'asd', 'asda'),
(13, 'ad', 'asda', 'asasd', 'asda', 'asdas'),
(14, 'asda', 'asd', 'a', 'asda', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_consultation`
--

CREATE TABLE `tbl_consultation` (
  `consultation_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `consultation_attitude` varchar(3) NOT NULL DEFAULT 'NA',
  `consultation_drinking` varchar(3) NOT NULL DEFAULT 'NA',
  `consultation_bowels` varchar(3) NOT NULL DEFAULT 'NA',
  `consultation_coughing` varchar(3) NOT NULL DEFAULT 'NA',
  `consultation_urination` varchar(3) NOT NULL DEFAULT 'NA',
  `consultation_appetite` varchar(3) NOT NULL DEFAULT 'NA',
  `consultation_vomiting` varchar(3) NOT NULL DEFAULT 'NA',
  `consultation_sneezing` varchar(3) NOT NULL DEFAULT 'NA',
  `consultation_notes` text DEFAULT NULL,
  `diagnosis_blood_exam` varchar(50) DEFAULT NULL,
  `diagnosis_urine_exam` varchar(50) DEFAULT NULL,
  `diagnosis_distemper_test` varchar(50) DEFAULT NULL,
  `diagnosis_parvo_test` varchar(50) DEFAULT NULL,
  `diagnosis_fecalysis` varchar(50) DEFAULT NULL,
  `diagnosis_skin_scraping` varchar(50) DEFAULT NULL,
  `diagnosis_ehrlichia_test` varchar(50) DEFAULT NULL,
  `diagnosis_hw_test` varchar(50) DEFAULT NULL,
  `diagnosis_ear_swabbing` varchar(50) DEFAULT NULL,
  `diagnosis_vaginal_smear` varchar(50) DEFAULT NULL,
  `diagnosis_ultrasound` varchar(50) DEFAULT NULL,
  `diagnosis_xray` varchar(50) DEFAULT NULL,
  `diagnosis_others` varchar(100) DEFAULT NULL,
  `prognosis` varchar(100) DEFAULT NULL,
  `treatment` varchar(100) DEFAULT NULL,
  `prescribed_med` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_consultation`
--

INSERT INTO `tbl_consultation` (`consultation_id`, `service_id`, `consultation_attitude`, `consultation_drinking`, `consultation_bowels`, `consultation_coughing`, `consultation_urination`, `consultation_appetite`, `consultation_vomiting`, `consultation_sneezing`, `consultation_notes`, `diagnosis_blood_exam`, `diagnosis_urine_exam`, `diagnosis_distemper_test`, `diagnosis_parvo_test`, `diagnosis_fecalysis`, `diagnosis_skin_scraping`, `diagnosis_ehrlichia_test`, `diagnosis_hw_test`, `diagnosis_ear_swabbing`, `diagnosis_vaginal_smear`, `diagnosis_ultrasound`, `diagnosis_xray`, `diagnosis_others`, `prognosis`, `treatment`, `prescribed_med`) VALUES
(1, 1, 'nrm', 'nrm', 'nrm', 'nrm', 'nrm', 'nrm', 'yes', 'yes', 'asasasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'nrm', 'nrm', 'nrm', 'nrm', 'nrm', 'nrm', 'yes', 'yes', 'asasasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, 'nrm', 'nrm', 'nrm', 'nrm', 'nrm', 'nrm', 'yes', 'yes', 'asasasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 4, 'nrm', 'nrm', 'nrm', 'nrm', 'nrm', 'nrm', 'yes', 'yes', 'asasasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grooming`
--

CREATE TABLE `tbl_grooming` (
  `grooming_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `grooming_cut` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pets`
--

CREATE TABLE `tbl_pets` (
  `pet_id` int(11) NOT NULL,
  `pet_name` varchar(25) NOT NULL,
  `pet_birthdate` date NOT NULL,
  `pet_sex` varchar(25) NOT NULL,
  `pet_species` varchar(25) NOT NULL,
  `pet_breed` varchar(25) NOT NULL,
  `pet_color_markings` text DEFAULT NULL,
  `pet_previous_vet` varchar(80) DEFAULT NULL,
  `pet_owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pets`
--

INSERT INTO `tbl_pets` (`pet_id`, `pet_name`, `pet_birthdate`, `pet_sex`, `pet_species`, `pet_breed`, `pet_color_markings`, `pet_previous_vet`, `pet_owner_id`) VALUES
(1, 'sd', '2019-12-01', 'fs', 'sda', 'sda', 'sd', 's', 2),
(2, 'sd', '2019-12-01', 'fs', 'sda', 'sda', 'sd', 's', 3),
(3, 'sd', '2019-12-01', 'fs', 'sda', 'sda', 'sd', 's', 4),
(4, 'sd', '2019-12-01', 'fs', 'sda', 'sda', 'sd', 's', 5),
(5, 'asdas', '2019-09-01', 'fs', 'sda', 'asda', 'asd', 'asda', 6),
(6, 'asdas', '2019-09-01', 'fs', 'sda', 'asda', 'asd', 'asda', 7),
(7, 'asdas', '2019-09-01', 'mi', 'd', 'asda', 'asda', 's', 8),
(8, 'sad', '2019-09-01', 'fs', 'sd', 'asda', 'adsa', 'asda', 9),
(9, 'sad', '2019-09-01', 'fs', 'sd', 'asda', 'adsa', 'asda', 10),
(10, 'sad', '2019-09-01', 'fs', 'sd', 'asda', 'adsa', 'asda', 11),
(11, 'sad', '2019-09-01', 'fs', 'sd', 'asda', 'adsa', 'asda', 12),
(12, 'd', '2019-05-01', 'fs', 'asda', 'asda', 'asda', 'asda', 13),
(13, 'sda', '2019-09-01', 'mc', 'sda', 'asd', 'asda', 'asad', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `service_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `service_type` varchar(12) NOT NULL,
  `service_amt` int(11) DEFAULT NULL,
  `service_del` int(11) NOT NULL DEFAULT 0,
  `service_apt_date` varchar(50) NOT NULL,
  `service_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`service_id`, `patient_id`, `service_type`, `service_amt`, `service_del`, `service_apt_date`, `service_date`) VALUES
(1, 1, 'consultation', NULL, 0, '19', NULL),
(2, 2, 'consultation', NULL, 0, '2019-09-05 16:19:45', NULL),
(3, 3, 'consultation', NULL, 0, '2019-09-05 16:22:58', NULL),
(4, 4, 'consultation', NULL, 0, '2019-09-05 16:23:18', NULL),
(5, 5, 'surgery', NULL, 0, '2019-09-06 16:16:09', NULL),
(6, 6, 'surgery', NULL, 0, '2019-09-06 16:18:40', NULL),
(7, 7, 'surgery', NULL, 0, '2019-09-06 16:21:10', NULL),
(8, 8, 'surgery', NULL, 0, '2019-09-06 16:23:23', NULL),
(9, 9, 'surgery', NULL, 0, '2019-09-06 16:23:52', NULL),
(10, 10, 'surgery', NULL, 0, '2019-09-06 16:24:19', NULL),
(11, 11, 'surgery', NULL, 0, '2019-09-06 16:24:37', NULL),
(12, 12, 'surgery', NULL, 0, '2019-09-06 16:24:58', NULL),
(13, 13, 'vaccine', NULL, 0, '2019-09-06 16:42:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surgery`
--

CREATE TABLE `tbl_surgery` (
  `surgery_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `consent_deworming` varchar(1) DEFAULT 'N',
  `consent_vaccination` varchar(1) DEFAULT 'N',
  `consent_dhlp_cpv` varchar(1) DEFAULT 'N',
  `consent_rabies` varchar(1) DEFAULT 'N',
  `consent_kennel_cough` varchar(1) DEFAULT 'N',
  `consent_microsporum` varchar(1) DEFAULT 'N',
  `consent_confinement` varchar(1) DEFAULT 'N',
  `consent_treatment` varchar(1) DEFAULT 'N',
  `consent_labtest` varchar(1) DEFAULT 'N',
  `consent_anesthesia` varchar(1) DEFAULT 'N',
  `consent_grooming` varchar(1) DEFAULT 'N',
  `consent_bath` varchar(1) DEFAULT 'N',
  `consent_dentistry` varchar(1) DEFAULT 'N',
  `consent_boarding` varchar(1) DEFAULT 'N',
  `consent_boarding_days` int(11) DEFAULT 0,
  `consent_others` text DEFAULT NULL,
  `consent_agreement` varchar(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_surgery`
--

INSERT INTO `tbl_surgery` (`surgery_id`, `service_id`, `consent_deworming`, `consent_vaccination`, `consent_dhlp_cpv`, `consent_rabies`, `consent_kennel_cough`, `consent_microsporum`, `consent_confinement`, `consent_treatment`, `consent_labtest`, `consent_anesthesia`, `consent_grooming`, `consent_bath`, `consent_dentistry`, `consent_boarding`, `consent_boarding_days`, `consent_others`, `consent_agreement`) VALUES
(1, 12, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 1, 'dsad', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_pwd` varchar(25) NOT NULL,
  `user_firstname` varchar(50) DEFAULT NULL,
  `user_lastname` varchar(50) DEFAULT NULL,
  `session_id` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `user_pwd`, `user_firstname`, `user_lastname`, `session_id`) VALUES
(1, 'admin', 'YXltbWJNNnlMbXM9', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vaccine`
--

CREATE TABLE `tbl_vaccine` (
  `vaccine_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `vaccine_complaint` varchar(200) NOT NULL,
  `vaccine_freq` varchar(100) NOT NULL,
  `vaccine_prev_treat` varchar(200) DEFAULT NULL,
  `vaccine_response_treat` varchar(200) DEFAULT NULL,
  `vaccine_temp` varchar(4) DEFAULT NULL,
  `vaccine_ht` varchar(4) DEFAULT NULL,
  `vaccine_given` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vaccine`
--

INSERT INTO `tbl_vaccine` (`vaccine_id`, `service_id`, `vaccine_complaint`, `vaccine_freq`, `vaccine_prev_treat`, `vaccine_response_treat`, `vaccine_temp`, `vaccine_ht`, `vaccine_given`) VALUES
(1, 13, 'sada', 'dada', 'sasd', 'sdas', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `tbl_consultation`
--
ALTER TABLE `tbl_consultation`
  ADD PRIMARY KEY (`consultation_id`),
  ADD UNIQUE KEY `foreign_service_id` (`service_id`);

--
-- Indexes for table `tbl_grooming`
--
ALTER TABLE `tbl_grooming`
  ADD PRIMARY KEY (`grooming_id`),
  ADD UNIQUE KEY `foreign_service_id` (`service_id`);

--
-- Indexes for table `tbl_pets`
--
ALTER TABLE `tbl_pets`
  ADD PRIMARY KEY (`pet_id`),
  ADD UNIQUE KEY `foreign_client_id` (`pet_owner_id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`service_id`),
  ADD UNIQUE KEY `foreign_pet_id` (`patient_id`);

--
-- Indexes for table `tbl_surgery`
--
ALTER TABLE `tbl_surgery`
  ADD PRIMARY KEY (`surgery_id`),
  ADD UNIQUE KEY `foreign_service_id` (`service_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_vaccine`
--
ALTER TABLE `tbl_vaccine`
  ADD PRIMARY KEY (`vaccine_id`),
  ADD UNIQUE KEY `foreign_service_id` (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_consultation`
--
ALTER TABLE `tbl_consultation`
  MODIFY `consultation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pets`
--
ALTER TABLE `tbl_pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_surgery`
--
ALTER TABLE `tbl_surgery`
  MODIFY `surgery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_vaccine`
--
ALTER TABLE `tbl_vaccine`
  MODIFY `vaccine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_consultation`
--
ALTER TABLE `tbl_consultation`
  ADD CONSTRAINT `tbl_consultation_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `tbl_service` (`service_id`);

--
-- Constraints for table `tbl_grooming`
--
ALTER TABLE `tbl_grooming`
  ADD CONSTRAINT `tbl_grooming_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `tbl_service` (`service_id`);

--
-- Constraints for table `tbl_pets`
--
ALTER TABLE `tbl_pets`
  ADD CONSTRAINT `tbl_pets_ibfk_1` FOREIGN KEY (`pet_owner_id`) REFERENCES `tbl_clients` (`client_id`);

--
-- Constraints for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD CONSTRAINT `tbl_service_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `tbl_pets` (`pet_id`);

--
-- Constraints for table `tbl_surgery`
--
ALTER TABLE `tbl_surgery`
  ADD CONSTRAINT `tbl_surgery_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `tbl_service` (`service_id`);

--
-- Constraints for table `tbl_vaccine`
--
ALTER TABLE `tbl_vaccine`
  ADD CONSTRAINT `tbl_vaccine_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `tbl_service` (`service_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
