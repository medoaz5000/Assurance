-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 08, 2026 at 07:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assurance_3`
--

-- --------------------------------------------------------

--
-- Table structure for table `assurance`
--

CREATE TABLE `assurance` (
  `id_assurance` int(11) NOT NULL,
  `N°_permis` varchar(20) NOT NULL,
  `marque` varchar(20) NOT NULL,
  `immatriculation` varchar(20) NOT NULL,
  `puissance_energie` varchar(20) NOT NULL,
  `N°_places` varchar(20) NOT NULL,
  `Date_mise` date NOT NULL,
  `CINa` varchar(20) NOT NULL,
  `num_contrat1` int(11) NOT NULL,
  `status1` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assurance`
--

INSERT INTO `assurance` (`id_assurance`, `N°_permis`, `marque`, `immatriculation`, `puissance_energie`, `N°_places`, `Date_mise`, `CINa`, `num_contrat1`, `status1`) VALUES
(25, '33/1245', 'MERCEDES', '2014-A-38', 'Gasoil', '7', '2020-02-22', 'C0000001', 3, 'Accept'),
(27, '33/13347', 'FORD', '2020-A-38', 'Essence', '6', '2018-05-05', 'C0000002', 8, 'pending'),
(28, '37/12245', 'DACIA', '2047-A-38', 'Gasoil', '6', '2010-07-07', 'C0000003', 3, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `contrat`
--

CREATE TABLE `contrat` (
  `N°_contrat` int(11) NOT NULL,
  `Puissence_fiscal` varchar(11) NOT NULL,
  `Puissence_energie` varchar(11) NOT NULL,
  `Type_assurance` varchar(20) NOT NULL,
  `Durée` varchar(11) NOT NULL,
  `Garanties` varchar(50) NOT NULL,
  `Prix` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contrat`
--

INSERT INTO `contrat` (`N°_contrat`, `Puissence_fiscal`, `Puissence_energie`, `Type_assurance`, `Durée`, `Garanties`, `Prix`) VALUES
(1, '6-7CV', 'Diesel', 'A-Tourisme', '3Mois', 'RC - Incidence', '1000,00 DH'),
(2, '6-7CV', 'Diesel', 'A-Toursime', 'Année', 'RC - Vol', '5300,00 DH'),
(3, '6-7CV', 'Diesel', 'A-Tourisme', '6Mois', 'RC - Vol - Incidence', '2900,00 DH'),
(4, '6-7CV', 'Diesel', 'A-Toursime', 'Année', 'RC - Incidence', '5000,00 DH'),
(5, '6-7CV', 'Diesel', 'A-Tourisme', '6Mois', 'RC - Vol - Glasse', '3000,00 DH'),
(6, '6-7CV', 'Diesel', 'A-Tourisme', '3Mois', 'RC - Vol - Incidence', '2500,00 DH'),
(7, '6-7CV', 'Essence', 'A-Tourisme', '3Mois', 'RC - Incidence', '950,00 DH'),
(8, '6-7CV', 'Essence', 'A-Toursime', 'Année', 'RC - Vol', '4800,00 DH'),
(9, '6-7CV', 'Essence', 'A-Tourisme', '6Mois', 'RC - Vol - Incidence', '2300,00 DH'),
(10, '6-7CV', 'Essence', 'A-Toursime', 'Année', 'RC - Incidence', '4000,00 DH'),
(11, '6-7CV', 'Essence', 'A-Tourisme', '6Mois', 'RC - Vol - Glasse', '1600,00 DH'),
(12, '6-7CV', 'Essence', 'A-Toursime', '3Mois', 'RC - Vol - Incidence', '1900,00 DH'),
(13, '8-9-10-11 C', 'Diesel', 'C - Commerce', '6Mois', 'RC - Vol - Incidence', '3210,00 DH');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `CINd` varchar(20) NOT NULL,
  `matricule1` varchar(20) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `image`, `CINd`, `matricule1`, `date_creation`) VALUES
(47, 'pexels-photo-220453.webp', 'C0000002', '2020-A-38', '2023-05-23 21:26:31'),
(48, 'Dr. Adrien Pasquet.png', 'C0000003', '2047-A-38', '2023-05-23 21:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `inscription_admin`
--

CREATE TABLE `inscription_admin` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `CIN` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inscription_admin`
--

INSERT INTO `inscription_admin` (`id`, `FirstName`, `LastName`, `CIN`, `Email`, `Password`) VALUES
(1, 'admin', 'admin', 'P1515', 'admin@gmail.com', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id` int(11) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_expiration` datetime NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `N°_contrat1` varchar(20) NOT NULL,
  `CINp` varchar(20) NOT NULL,
  `matricule` varchar(20) NOT NULL,
  `status2` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id`, `date_creation`, `date_expiration`, `date`, `N°_contrat1`, `CINp`, `matricule`, `status2`) VALUES
(22, '2023-02-07 00:00:00', '2023-05-09 00:00:00', '2023-05-10 10:53:15', '3', 'C0000001', '2014-A-38', 'Accept'),
(25, '2023-05-23 00:00:00', '2023-11-21 00:00:00', '2023-05-10 15:45:25', '3', 'C0000001', '2014-A-38', 'Accept');

-- --------------------------------------------------------

--
-- Table structure for table `personnel_details`
--

CREATE TABLE `personnel_details` (
  `id_personnel` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `CIN` varchar(20) NOT NULL,
  `Ville` varchar(20) NOT NULL DEFAULT 'OUARZAZATE',
  `address` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personnel_details`
--

INSERT INTO `personnel_details` (`id_personnel`, `email`, `password`, `firstname`, `lastname`, `CIN`, `Ville`, `address`, `phone`, `status`) VALUES
(17, 'client_1@gmail.com', '0000', 'CLIENT_1', 'CLIENT_1', 'C0000001', 'OUARZAZATE', 'HAY EL MUHAMADY', '0600000000', 'Accept'),
(18, 'client_2@gmail.com', '0000', 'CLIENT_2', 'CLIENT_2', 'C0000002', 'OUARZAZATE', 'TABOUNT', '06123456987', 'pending'),
(19, 'client_3@gmail.com', '0000', 'CLIENT_3', 'CLIENT_3', 'C0000003', 'OUARZAZATE', 'TAMASSINTE', '06147852369', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assurance`
--
ALTER TABLE `assurance`
  ADD PRIMARY KEY (`id_assurance`),
  ADD KEY `clients` (`CINa`),
  ADD KEY `contrat` (`num_contrat1`),
  ADD KEY `immatriculation` (`immatriculation`);

--
-- Indexes for table `contrat`
--
ALTER TABLE `contrat`
  ADD PRIMARY KEY (`N°_contrat`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CINd` (`CINd`,`matricule1`);

--
-- Indexes for table `inscription_admin`
--
ALTER TABLE `inscription_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assurance` (`matricule`),
  ADD KEY `client` (`CINp`);

--
-- Indexes for table `personnel_details`
--
ALTER TABLE `personnel_details`
  ADD PRIMARY KEY (`CIN`),
  ADD UNIQUE KEY `id_personnel` (`id_personnel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assurance`
--
ALTER TABLE `assurance`
  MODIFY `id_assurance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `N°_contrat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `inscription_admin`
--
ALTER TABLE `inscription_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personnel_details`
--
ALTER TABLE `personnel_details`
  MODIFY `id_personnel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assurance`
--
ALTER TABLE `assurance`
  ADD CONSTRAINT `clients` FOREIGN KEY (`CINa`) REFERENCES `personnel_details` (`CIN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contrat` FOREIGN KEY (`num_contrat1`) REFERENCES `contrat` (`N°_contrat`);

--
-- Constraints for table `periode`
--
ALTER TABLE `periode`
  ADD CONSTRAINT `assurance` FOREIGN KEY (`matricule`) REFERENCES `assurance` (`immatriculation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `client` FOREIGN KEY (`CINp`) REFERENCES `personnel_details` (`CIN`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
