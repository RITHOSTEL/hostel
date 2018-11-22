-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2018 at 12:28 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rithostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `hostel_stud_reg`
--

CREATE TABLE `hostel_stud_reg` (
  `ADMNO` varchar(50) NOT NULL,
  `parent_address` varchar(100) NOT NULL,
  `parent_mob` varchar(13) NOT NULL,
  `present_res_adress` varchar(100) DEFAULT NULL,
  `priority1` tinyint(1) DEFAULT NULL,
  `priority2a` tinyint(1) DEFAULT NULL,
  `priority2d` tinyint(1) DEFAULT NULL,
  `priority2e` tinyint(1) DEFAULT NULL,
  `income` float DEFAULT NULL,
  `distance` float DEFAULT NULL,
  `sgpa` float DEFAULT NULL,
  `disci_action` varchar(55) DEFAULT NULL,
  `admn_status` varchar(15) DEFAULT NULL,
  `hos_rank` float DEFAULT NULL,
  `distance_metric` float DEFAULT '50',
  `rank_metric` float DEFAULT NULL,
  `Entrance_rank` int(5) DEFAULT NULL,
  `SC` int(1) NOT NULL,
  `ST` int(1) NOT NULL,
  `PH` int(1) NOT NULL,
  `BPL` int(1) NOT NULL,
  `other_state` int(1) NOT NULL,
  `CENTRAL` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostel_stud_reg`
--

INSERT INTO `hostel_stud_reg` (`ADMNO`, `parent_address`, `parent_mob`, `present_res_adress`, `priority1`, `priority2a`, `priority2d`, `priority2e`, `income`, `distance`, `sgpa`, `disci_action`, `admn_status`, `hos_rank`, `distance_metric`, `rank_metric`, `Entrance_rank`, `SC`, `ST`, `PH`, `BPL`, `other_state`, `CENTRAL`) VALUES
('16MP645', 'Tharayam kandam(h),Arimbra(po),Malappuram,pin:673638 ', '7667567687', NULL, 1, 1, 0, 1, 12000, 282, NULL, NULL, 'submitted', 15.1367, 14.1367, 1, 9000, 0, 0, 0, 0, 0, 0),
('16MP646', 'VARANAT HOUSE PALAYOOR,CHAVAKKAD(PO),THRISSUR ', '8567567687', NULL, NULL, NULL, NULL, 0, 100000, 249, NULL, NULL, 'submitted', 13.4884, 12.4884, 1, 9000, 0, 0, 0, 0, 0, 0),
('16MP647', 'KURUVANGAT PUTHENVEETTIL(H),KAPPUR(P.O),PALAKKAD(DIST),679552 ', '76675674538', NULL, 1, 1, 1, 0, 12000, 129, NULL, NULL, 'submitted', 56.4944, 6.49445, 50, 1, 0, 0, 0, 0, 0, 0),
('16MP649', 'AYINIKKALAYIL HOUSE KOTTAPADI-PILLAKKAD ROAD ', '856756353', NULL, 1, 0, 1, 1, 30000, 149, NULL, NULL, 'submitted', 8.49344, 7.49344, 1, 9000, 0, 0, 0, 0, 0, 0),
('16MP651', 'THUMPARAMBIL(H),KARIKKAD(P.O),THRISSUR(DIST),680519(PIN) ', '8567567753', NULL, 1, 1, 1, 0, 30000, 19, NULL, NULL, 'submitted', 2, 1, 1, 9000, 0, 0, 0, 0, 0, 0),
('16MP652', 'KUNDUKULAM HOUSE,NAGATHANKAVU(VIA),P.O PARAPPUR,THRISSUR,PIN:680 552 ', '856756754', NULL, 1, 0, 1, 0, 35000, 71.9, NULL, NULL, 'submitted', 4.64233, 3.64233, 1, 9000, 0, 0, 0, 0, 0, 0),
('16MP653', 'KINARULLA PARAMBATH (HOUSE) KODIYURA (PO) KALLACHI (VIA) ', '3343234354', NULL, 1, 0, 0, 1, 35000, 458.8, NULL, NULL, 'submitted', 71.6174, 22.9678, 48.6496, 249, 1, 0, 0, 0, 0, 1),
('16MP660', 'SABARYPOIKAYIL(H),VAIPUR PO VAIPUR,PATHANAMTHITTA,689588 ', '8567567687', NULL, 1, 0, 1, 1, 100000, 377.97, NULL, NULL, 'submitted', 19.9304, 18.9304, 1, 9000, 0, 0, 0, 0, 0, 0),
('16MP668', 'PODIPARA, ATHIRAMPUZHA P.O, KOTTAYAM-686562 ', '8989678657', NULL, 1, 0, 1, 0, 35000, 767.09, NULL, NULL, 'submitted', 88.3613, 38.3668, 49.9946, 2, 0, 0, 0, 0, 0, 0),
('16MP669', 'SIVARAJAN.K,KANHIRASSERI(H),CHETTIPPADI(PO),MALAPPURAM(DT),676319(PIN) ', '9886756447', NULL, 0, 0, 0, 1, 30000, 47.8, NULL, NULL, 'submitted', 3.43855, 2.43855, 1, 9000, 0, 0, 0, 0, 0, 0),
('16MP676', 'JOBIN BHAVAN,VELICHIKKALA PO,ADICHANALLOOR,KOLLAM.691573 ', '9875478543', NULL, 1, 0, 1, 0, 80000, 876.54, NULL, NULL, 'submitted', 44.8337, 43.8337, 1, 9000, 0, 0, 0, 0, 0, 0),
('16MP677', 'MURALIBHAVANAM , SREEBHADRA NAGAR-212,ULIYAKOVIL P.O.,KOLLAM,691019 ', '8798654565', NULL, 1, 0, 1, 0, 49000, 98.98, NULL, NULL, 'submitted', 5.99496, 4.99496, 1, 9000, 0, 0, 0, 0, 0, 0),
('16MP681', 'PALLIKKUNNEL (H),KANDANAD P.O,THIRUVANKULAM VIA,PIN-682305 ', '723564332', NULL, 1, 0, 1, 1, 35000, 673.98, NULL, NULL, 'submitted', 83.7105, 33.716, 49.9946, 2, 0, 0, 0, 0, 0, 0),
('16MP684', 'ALACKAL HOUSE KARIKKATTOOR (P.O)  586544 KOTTAYAM ', '7667567687', NULL, 1, 0, 1, 1, 100000, 639.98, NULL, NULL, 'submitted', 81.985, 32.0177, 49.9673, 7, 0, 0, 0, 0, 0, 0),
('16MP685', 'LEKSHMI BHAVANAM, ANGADICAL NORTH PO, PATHANAMTHITTA,PIN 689648 ', '8956790087', NULL, 0, 1, 0, 1, 60000, 794.09, NULL, NULL, 'submitted', 40.7154, 39.7154, 1, 9000, 0, 0, 0, 0, 0, 0),
('16MP686', 'KALLAYIL(H),KAIPAMANGALAM(PO),680681 ', '7689766', NULL, 1, 1, 0, 1, 100000, 875.09, NULL, NULL, 'submitted', 93.7504, 43.7613, 49.9891, 3, 0, 0, 0, 0, 0, 0),
('16MP687', 'PYNADATH HOUSE, KARUKUTTY P.O,ANGAMALY,ERNAKULAM DISTRICT ', '895640876', NULL, 1, 0, 1, 0, 75000, 769.09, NULL, NULL, 'submitted', 39.4667, 38.4667, 1, 9000, 0, 0, 0, 0, 0, 0),
('16MP688', 'VIJETHA(H) ,ERATTAKULANGARA,NEELESWARAM P.O,OMASSERY,KOZHIKODE,KERALA 673582 ', '90956674', NULL, 1, 1, 0, 0, 97000, 690.05, NULL, NULL, 'submitted', 35.5186, 34.5186, 1, 9000, 0, 0, 0, 0, 0, 0),
('16MP692', 'ELAYIDATHUKUNNEL (H),KADANAD P.O,KADANAD,KOTTAYAM(DIST),PIN-686653 ', '856756778', NULL, 1, 0, 1, 1, 10000, 658.98, NULL, NULL, 'submitted', 82.9667, 32.9667, 50, 1, 0, 0, 0, 0, 0, 0),
('16MP696', 'Thottasseriveedu,puthancode,manamboor P .O,PIN:695611 ', '7690987776', NULL, 1, 0, 1, 0, 35000, 765.09, NULL, NULL, 'submitted', 88.2505, 38.2669, 49.9837, 4, 0, 0, 0, 0, 0, 0),
('16MP786', 'Sooraj Bhavan, ValiyaVila, Kurumkutty, Parassala-695502 ', '9876532345', NULL, 1, 0, 1, 0, 25000, 128.98, NULL, NULL, 'submitted', 56.4717, 6.49345, 49.9782, 5, 0, 0, 0, 0, 0, 0),
('17MP1020', 'CHITHAN BHAVAN(H) ;CHINNAR P.O;ELAPPARA;IDUKKI-685501 ', '864007547', NULL, 1, 1, 0, 0, 57000, 987.65, NULL, NULL, 'submitted', 99.3564, 49.3836, 49.9728, 6, 0, 0, 0, 0, 0, 0),
('17MP1095', 'LEKSHMI BHAVAN(H);MURUNTHAL;PANAMOOD;PERINAD P.O;KOLLAM-691601 ', '8567567687', NULL, 1, 0, 1, 0, 30000, 999.99, NULL, NULL, 'submitted', 51, 50, 1, 9000, 0, 0, 0, 0, 0, 0),
('17MP971', 'ANIYARA(H),NEDUMANNI P.O,KOTTAYAM-686542 ', '8567567687', NULL, 1, 0, 1, 1, 10000, 876.9, NULL, NULL, 'submitted', 44.8517, 43.8517, 1, 9000, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hostel_stud_reg`
--
ALTER TABLE `hostel_stud_reg`
  ADD PRIMARY KEY (`ADMNO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
