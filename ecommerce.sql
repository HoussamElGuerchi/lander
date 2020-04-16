-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2020 at 03:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `idClient` int(11) NOT NULL,
  `login` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nom` varchar(128) NOT NULL,
  `prenom` varchar(128) NOT NULL,
  `num_tel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`idClient`, `login`, `password`, `nom`, `prenom`, `num_tel`) VALUES
(1, 'user1@mail.com', '24c9e15e52afc47c225b757e7bee1f9d', 'Toto', 'Tata', 635784101),
(2, 'user2@mail.com', '7e58d63b60197ceb55a1c487989a3720', 'James', 'McGill', 645913654),
(4, 'user3@mail.com', '92877af70a45fd6a2ed7fe81e1236b78', 'Barney', 'Stinson', 654123698);

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `refCommande` int(11) NOT NULL,
  `refPanier` int(11) NOT NULL,
  `numProduit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`refCommande`, `refPanier`, `numProduit`, `quantite`) VALUES
(4, 3, 3, 1),
(7, 3, 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `refPanier` int(11) NOT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`refPanier`, `idClient`) VALUES
(1, 1),
(2, 2),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `numProduit` int(11) NOT NULL,
  `libele` varchar(128) NOT NULL,
  `prix` float NOT NULL,
  `marque` varchar(128) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`numProduit`, `libele`, `prix`, `marque`, `image`) VALUES
(1, 'Rolex Datejust Mechanical (Automatic) ', 52400, 'Rolex', 'https://m.media-amazon.com/images/I/81aQcZRj8YL._AC_UL640_FMwebp_QL65_.jpg'),
(2, 'Rolex Airking Blue Arabic', 45490, 'Rolex', 'https://m.media-amazon.com/images/I/61UONCx3U1L._AC_UL640_FMwebp_QL65_.jpg'),
(3, 'Rolex Oyster Perpetual Cosmograph Daytona', 818880, 'Rolex', 'https://m.media-amazon.com/images/I/61ssVHShxmL._AC_UL640_FMwebp_QL65_.jpg'),
(4, 'Rolex Sky-Dweller Men\'s Watch 326933', 171000, 'Rolex', 'https://m.media-amazon.com/images/I/71kJ98XwMyL._AC_UL640_FMwebp_QL65_.jpg'),
(5, 'Rolex New Submariner Steel Black Ceramic', 348820, 'Rolex', 'https://m.media-amazon.com/images/I/711LjkDxOGL._AC_UL640_FMwebp_QL65_.jpg'),
(6, 'Chopard Alpine Eagle 41mm Mens Watch', 125000, 'Chopard', 'https://m.media-amazon.com/images/I/71tqyk2NQQL._AC_UL640_FMwebp_QL65_.jpg'),
(7, 'Chopard L.U.C Quattro 43mm Mechanical', 52000, 'Chopard', 'https://m.media-amazon.com/images/I/71UA8dELHbL._AC_UL640_FMwebp_QL65_.jpg'),
(8, 'Chopard Superfast 168542-3001', 165600, 'Chopard', 'https://m.media-amazon.com/images/I/61LnqtQ2aTL._AC_UL640_FMwebp_QL65_.jpg'),
(9, 'Chopard Grand Prix de Monaco Historique ', 58000, 'Chopard', 'https://m.media-amazon.com/images/I/71Lk3ySO7DL._AC_UL640_FMwebp_QL65_.jpg'),
(10, 'Chopard L.U.C. Time Traveler One Watch', 180000, 'Chopard', 'https://m.media-amazon.com/images/I/71q-LME3MFL._AC_UL640_FMwebp_QL65_.jpg'),
(11, 'Audemars Piguet Royal Oak Offshore', 229500, 'Audemars Piguet', 'https://m.media-amazon.com/images/I/81jrnyeLr8L._AC_UL640_FMwebp_QL65_.jpg'),
(12, 'Audemars Piguet Royal Oak Offshore', 359000, 'Audemars Piguet', 'https://m.media-amazon.com/images/I/81D+gtqAspL._AC_UL640_FMwebp_QL65_.jpg'),
(13, 'Audemars Piguet Royal Oak Mechanical', 1545000, 'Audemars Piguet', 'https://m.media-amazon.com/images/I/81rgPEBvXyL._AC_UL640_FMwebp_QL65_.jpg'),
(14, 'Audemars Piguet Code 11.59 Mechanical', 379500, 'Audemars Piguet', 'https://m.media-amazon.com/images/I/81HRPCy6h+L._AC_UL640_FMwebp_QL65_.jpg'),
(15, 'Audemars Piguet Royal Oak 41MM Brown', 364970, 'Audemars Piguet', 'https://m.media-amazon.com/images/I/610JmfWpsOL._AC_UL640_FMwebp_QL65_.jpg'),
(16, 'Patek Philippe Pocket Watch 18 Karat Gold', 289900, 'Patek Philippe', 'https://m.media-amazon.com/images/I/61Tc5xw-x8L._AC_UL640_FMwebp_QL65_.jpg'),
(17, 'Patek Philippe Calatrava Automatic', 192450, 'Patek Philippe', 'https://m.media-amazon.com/images/I/71+cHm2TWUL._AC_UL640_FMwebp_QL65_.jpg'),
(18, 'Patek Philippe Calatrava Travel Time', 490000, 'Patek Philippe', 'https://m.media-amazon.com/images/I/61TkGtuEobL._AC_UL640_FMwebp_QL65_.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`refCommande`),
  ADD KEY `refPanier` (`refPanier`),
  ADD KEY `numProduit` (`numProduit`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`refPanier`),
  ADD KEY `idClient` (`idClient`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`numProduit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `refCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `refPanier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `numProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`refPanier`) REFERENCES `panier` (`refPanier`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`numProduit`) REFERENCES `produit` (`numProduit`);

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
