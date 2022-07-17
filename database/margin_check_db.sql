-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2022 at 09:51 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `margin_check_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `ID` int(100) NOT NULL,
  `customerid` int(100) NOT NULL,
  `customername` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `salesid` varchar(255) NOT NULL,
  `salesname` varchar(255) NOT NULL,
  `deptid` varchar(255) NOT NULL,
  `deptname` varchar(255) NOT NULL,
  `Area` varchar(255) NOT NULL,
  `titikkoordinat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`ID`, `customerid`, `customername`, `Alamat`, `salesid`, `salesname`, `deptid`, `deptname`, `Area`, `titikkoordinat`) VALUES
(1, 10022003, 'Sekolah Islam Terpadu Citra Az-Zahra              ', 'Grand serpong permai blok 0 no 6', 'SALES002       ', 'Ronald Erwin Alexander', 'REG3', 'Jawa Timur', 'Jabodetabek', '-6.727371, 102.23102'),
(2, 10022001, 'PT Kokoh Inti Arebama                             ', 'indra 123', 'SALES002       ', 'Ronald Erwin Alexander', 'SBP5', 'Hospitality', 'Jabodetabek', '-8.2391910, 102.300102030'),
(5, 10022001, 'PT Kokoh Inti Arebama                             ', 'adasd', 'SALES002       ', 'Ronald Erwin Alexander', 'REG5', 'Makassar', 'Jabodetabek', '123123123');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `areaid` int(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `Intercity` int(255) NOT NULL,
  `IX` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`areaid`, `area`, `Intercity`, `IX`) VALUES
(1, 'Jabodetabek', 0, 10000),
(2, 'Jawa', 5000, 10000),
(3, 'Bali Nusra', 5000, 10000),
(4, 'Sumatera', 5000, 10000),
(5, 'Kalimantan', 5000, 10000),
(6, 'Sulawesi', 40000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `databast`
--

CREATE TABLE `databast` (
  `id` int(11) NOT NULL,
  `wonumber` varchar(255) NOT NULL,
  `ponumber` varchar(255) NOT NULL,
  `vendorid` varchar(255) NOT NULL,
  `bastdate` datetime NOT NULL,
  `bastupload` varchar(255) NOT NULL,
  `uploadpertgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `databast`
--

INSERT INTO `databast` (`id`, `wonumber`, `ponumber`, `vendorid`, `bastdate`, `bastupload`, `uploadpertgl`) VALUES
(15, 'HYPwo220123232d', 'HYPwo220123232d', ' V1452323sd', '2022-07-02 00:00:00', 'JKTSPO21030006_-_upgrade_intercity_smg_3Gb.pdf', '2022-07-17 12:57:03'),
(16, 'HYPwo220123232', 'HYPwo220123232', ' V1452323sd', '2022-07-02 00:00:00', 'HYPSPO21100159_-_upgrade_IPTX_Medan_200M.pdf', '2022-07-17 13:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `datacustomer`
--

CREATE TABLE `datacustomer` (
  `customerid` int(9) NOT NULL,
  `customername` varchar(50) DEFAULT NULL,
  `salesid` varchar(50) DEFAULT NULL,
  `deptid` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `datacustomer`
--

INSERT INTO `datacustomer` (`customerid`, `customername`, `salesid`, `deptid`) VALUES
(10022001, 'PT Kokoh Inti Arebama                             ', 'SALES123       ', 'SBP2           '),
(10022003, 'Sekolah Islam Terpadu Citra Az-Zahra              ', 'SALES140       ', 'SBP6           '),
(12121212, 'sadas', 'SALES003       ', 'MARCOM'),
(12222222, 'asd', 'SALE147        ', 'asd'),
(32345456, 'hanhru', 'SALES002       ', 'REG3'),
(100200001, 'YAS.PESANTREN ISLAM AL AZHAR                      ', 'SALES078       ', 'SBP6           '),
(1002983434, 'sadas', 'SALES019       ', 'REG6'),
(2147483647, 'Indra Kurniadi', 'SALES005       ', 'SBP2');

-- --------------------------------------------------------

--
-- Table structure for table `datadept`
--

CREATE TABLE `datadept` (
  `deptid` varchar(50) NOT NULL,
  `deptname` varchar(50) NOT NULL,
  `idheadsales` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `datadept`
--

INSERT INTO `datadept` (`deptid`, `deptname`, `idheadsales`) VALUES
('CP', 'CP', 'SALES032'),
('CSA', 'CSA', ''),
('LSO', 'LSO', ''),
('MARCOM', 'MARCOM', ''),
('REG1', 'Jawa Barat', 'SALES037'),
('REG2', 'Jawa Tengah', 'SALES044'),
('REG3', 'Jawa Timur', 'SALES049'),
('REG4', 'Bali', 'SALES095'),
('REG5', 'Makassar', 'SALES069'),
('REG6', 'Balikpapan', 'SALES019'),
('SBP1', 'Healthcare', 'SALES001'),
('SBP2', 'Retail', 'SALES005'),
('SBP3', 'Manufaktur', 'SALES008'),
('SBP4', 'Public Sector', 'SALES078'),
('SBP5', 'Hospitality', 'SALES077'),
('SBP6', 'Education', 'SALES078'),
('SBP7', 'Broadband', 'SALES134'),
('SBP8', 'Finance', 'SALES174');

-- --------------------------------------------------------

--
-- Table structure for table `datanode`
--

CREATE TABLE `datanode` (
  `nodeid` int(255) NOT NULL,
  `node` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datanode`
--

INSERT INTO `datanode` (`nodeid`, `node`) VALUES
(1, 'IDC 3D'),
(2, 'CSF'),
(3, 'Cyber APJII'),
(4, 'office bandung'),
(5, 'Neucentrix Semarang'),
(6, 'office semarang'),
(7, 'office surabaya'),
(8, 'neucentrix surabaya'),
(9, 'office bali'),
(10, 'neucentrix bali'),
(11, 'neucentrix medan'),
(12, 'neucentrix palembang'),
(13, 'neucentrix kalimantan'),
(14, 'IDC Bosoa');

-- --------------------------------------------------------

--
-- Table structure for table `datasales`
--

CREATE TABLE `datasales` (
  `salesid` varchar(50) NOT NULL,
  `employeeid` varchar(50) NOT NULL,
  `salesname` varchar(100) NOT NULL,
  `deptid` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `id_lvl_user` int(11) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `datasales`
--

INSERT INTO `datasales` (`salesid`, `employeeid`, `salesname`, `deptid`, `email`, `id_lvl_user`, `password`) VALUES
('SALE147        ', '892092021', 'Rizki Reza Ririaza', 'REG4', 'rizki.reza@hypernet.co.id', 3, '123456'),
('SALES001       ', '637022018', 'Rizki Perdana', 'SBP1', 'rizki.perdana@hypernet.co.id', 2, '123456'),
('SALES002       ', '62042011', 'Ronald Erwin Alexander', 'SBP1', 'ronald.erwin@hypernet.co.id', 3, '123456'),
('SALES003       ', '742102019', 'Parulian Silitonga', 'SBP1', 'parulian.silitonga@hypernet.co.id', 3, '123456'),
('SALES005       ', '779022020', 'Antonius Maria Claret Hermawan Harry Nugroho', 'SBP2', 'harry.nugroho@hypernet.co.id', 3, '123456'),
('SALES006       ', '681112018', 'Dwi Permadi', 'SBP2', 'dwi.permadi@hypernet.co.id', 3, '123456'),
('SALES007       ', '196012013', 'Rahmat Kurniawan', 'SBP2', 'rahmat.kurniawan@hypernet.co.id', 3, '123456'),
('SALES008       ', '519082016', 'Pedy Yoherman', 'SBP3', 'pedy.yoherman@hypernet.co.id', 2, '123456'),
('SALES009       ', '657062018', 'Achmad Saifudin', 'SBP3', 'a.saifudin@hypernet.co.id', 3, '123456'),
('SALES011       ', '593032017', 'Happi Salimah Widaningrum', 'SBP3', 'Happi@hypernet.co.id', 3, '123456'),
('SALES012       ', '692012019', 'Vina Rondang Magdalena', 'SBP3', 'vina.magdalena@hypernet.co.id', 3, '123456'),
('SALES019       ', '659072018', 'Nalendra Alim', 'REG6', 'nalendra.alim@hypernet.co.id', 2, '123456'),
('SALES023       ', '6032008', 'Soeganda Prawira', 'CM', 'william@hypernet.co.id', 2, '123456'),
('SALES024       ', '728082019', 'Reza Thamzel', 'MARCOM', 'reza.thamzel@hypernet.co.id', 3, '123456'),
('SALES025       ', '614072017', 'Ferdy Zulkarnain', 'MARCOM', 'ferdy@hypernet.co.id', 3, '123456'),
('SALES032       ', '428052015', 'Robert Mulatua Simatupang', 'CP', 'robert@hypernet.co.id', 2, '123456'),
('SALES035       ', '528082016', 'Haris Skuarino', 'CP', 'haris.skuarino@hypernet.co.id', 3, '123456'),
('SALES036       ', '633012018', 'Alvin Adrianus Kasim', 'REG', 'alvin.kasim@hypernet.co.id', 2, '123456'),
('SALES037       ', '712052019', 'Nur?aida Hasya', 'REG1', 'nuraida.hasya@hypernet.co.id', 2, '123456'),
('SALES038       ', '721072019', 'Dio Kharisma Pratiwi', 'REG1', 'dio.pratiwi@hypernet.co.id', 3, '123456'),
('SALES039       ', '720072019', 'Nopriyadi', 'REG1', 'nopriyadi@hypernet.co.id', 3, '123456'),
('SALES041       ', '570012017', 'Naufal Arqom', 'REG1', 'naufal.arqom@hypernet.co.id', 3, '123456'),
('SALES042       ', '567012017', 'Slamet Riyadi', 'REG1', 'Slamet.riyadi@hypernet.co.id', 3, '123456'),
('SALES044       ', '104122011', 'Alip Mardiyanto', 'REG2', 'alip.mardiyanto@hypernet.co.id', 2, '123456'),
('SALES047       ', '774022020', 'Kumoro Darumoyo', 'REG2', 'kumoro.d@hypernet.co.id', 3, '123456'),
('SALES049       ', '523082016', 'Ilham Barori', 'REG3', 'ilham.barori@hypernet.co.id', 2, '123456'),
('SALES051       ', '934122021', 'Toni Robiyanto', 'REG3', 'toni.robiyanto@hypernet.co.id', 3, '123456'),
('SALES059       ', '776022020', 'Verawaty', 'REG5', 'verawati@hypernet.co.id', 3, '123456'),
('SALES061       ', '782032020', 'Ananda Vidya Puspita', 'SBP2', 'ananda.vidya@hypernet.co.id', 3, '123456'),
('SALES069       ', '795062020', 'Dwi Andri Hermawan', 'REG5', 'dwi.hermawan@hypernet.co.id', 2, '123456'),
('SALES077       ', '809082020', 'Zenitha Ivone', 'SBP5', 'zenitha.ivone@hypernet.co.id', 2, '123456'),
('SALES078       ', '810082020', 'Vina Lestari', 'SBP6', 'vina.lestari@hypernet.co.id', 2, '123456'),
('SALES080       ', '813082020', 'Chyntia Dara', 'SBP2', 'chyntia.dara@hypernet.co.id', 3, '123456'),
('SALES082       ', '817082020', 'Bahrul Munir', 'REG4', 'bahrul.munir@hypernet.co.id', 3, '123456'),
('SALES084       ', '801072020', 'Ivan Eka Prayuda', 'SBP3', 'ivan.eka@hypernet.co.id', 3, '123456'),
('SALES085       ', '804072020', 'Bramana Putra', 'REG2', 'bramana.putra@hypernet.co.id', 3, '123456'),
('SALES086       ', '800072020', 'Shandy Kurniawan', 'SBP5', 'shandy.kurniawan@hypernet.co.id', 3, '123456'),
('SALES087       ', '822092020', 'Putri Annisa', 'SBP2', 'putri.anisa@hypernet.co.id, ', 3, '123456'),
('SALES088       ', '818092020', 'Tsorayya', 'CP', 'tsorayya@hypernet.co.id, ', 3, '123456'),
('SALES090       ', '820092020', 'Putri Utami Harefa', 'SBP5', 'putri.utami@hypernet.co.id, ', 3, '123456'),
('SALES093       ', '824092020', 'Alma Zaraswati', 'CSA', 'alma.zaraswati@hypernet.co.id', 3, '123456'),
('SALES094       ', '202010086', 'Reza Pahlepi', 'SBP7', 'reza.pahlepi@whooz.id', 3, '123456'),
('SALES095       ', '826092020', 'Roma Al Irsyad', 'REG2', 'roma.irsyad@hypernet.co.id', 2, '123456'),
('SALES096       ', '805072020', 'Elizabeth Temmy Mustika Udina, S.Pd', 'REG3', 'elizabeth.temmy@hypernet.co.id', 3, '123456'),
('SALES100       ', '830102020', 'Prita Andhini Winarso', 'SBP5', 'prita.andhini@hypernet.co.id', 3, '123456'),
('SALES104       ', '842022021', 'Neni Oktaviani', 'SBP6', 'neni.oktaviani@hypernet.co.id', 3, '123456'),
('SALES111       ', '855042021', 'Previna Clara Surjahadi', 'SBP6', 'previna.clara@hypernet.co.id', 3, '123456'),
('SALES113       ', '854042021', 'Veragust Rosita Perdana', 'REG1', 'veragust.r@hypernet.co.id', 3, '123456'),
('SALES114       ', '869062021', 'Erythrina Putri Arafanny', 'CP', 'erythrina.p@hypernet.co.id ', 3, '123456'),
('SALES119       ', '898092021', 'Rio Agus Setiawan', 'SBP1', 'rio.agus@hypernet.co.id', 3, '123456'),
('SALES120       ', '857042021', 'Ade Nurul Rezki', 'SBP1', 'ade.nurul@hypernet.co.id', 3, '123456'),
('SALES121       ', '850032021', 'Irfany Saidi', 'SBP1', 'irfany.saidi@hypernet.co.id', 3, '123456'),
('SALES122       ', '887092021', 'Sethiono Teguh', 'SBP3', 'sethiono.t@hypernet.co.id', 3, '123456'),
('SALES125       ', '868062021', 'Dwi Octa Auliani', 'SBP2', 'dwi.octa@hypernet.co.id', 3, '123456'),
('SALES126       ', '903092021', 'Renita Patma', 'SBP2', 'renita.patma@hypernet.co.id', 3, '123456'),
('SALES127       ', '902092021', 'M. Rofianto Ramadhon', 'SBP2', 'rofianto.r@hypernet.co.id', 3, '123456'),
('SALES129       ', '881072021', 'Fitri Dwi Handini', 'SBP6', 'fitri.dwi@hypernet.co.id', 3, '123456'),
('SALES130       ', '871062021', 'Ryan Bima Putra', 'REG1', 'ryan.bima@hypernet.co.id', 3, '123456'),
('SALES131       ', '860042021', 'Tazqy Hidayat', 'REG2', 'tazqy.h@hypernet.co.id', 3, '123456'),
('SALES132       ', '900092021', 'Tri Apriliyanti', 'SBP4', 't.apriliyanti@hypernet.co.id', 2, '123456'),
('SALES134       ', '879072021', 'Mukti Ali', 'SBP7', 'mukti.ali@whooz.id', 2, '123456'),
('SALES135       ', '202010086', 'Reza Pahlepi', 'SBP7', 'reza.pahlepi@whooz.id', 3, '123456'),
('SALES136       ', '913102021', 'Permata Ayu Sarly Prihatini', 'SBP6', 'permata.ayu@hypernet.co.id', 3, '123456'),
('SALES137       ', '923112021', 'Vinsa Aprilyani Arifin', 'SBP3', 'vinsa.april@hypernet.co.id', 3, '123456'),
('SALES138       ', '924112021', 'Frizky Bestian Damayana', 'SBP3', 'frizky.bestian@hypernet.co.id', 3, '123456'),
('SALES139       ', '925112021', 'Nur Rudhini', 'SBP4', 'nur.rudhini@hypernet.co.id', 3, '123456'),
('SALES140       ', '926112021', 'ApriL Liany', 'SBP6', 'april.liany@hypernet.co.id', 3, '123456'),
('SALES142       ', '930112021', 'Afrilian Taufik Ramadhan', 'SBP4', 'afrilian.t@hypernet.co.id', 3, '123456'),
('SALES143       ', '920102021', 'Ridwan Yasin', 'SBP5', 'ridwan.yasin@hypernet.co.id', 3, '123456'),
('SALES145       ', '910102021', 'Wellem Alexander Pupella', 'SBP5', 'wellem.a@hypernet.co.id', 3, '123456'),
('SALES146       ', '888092021', 'Irwanda ', 'SBP8', 'irwanda@hypernet.co.id', 3, '123456'),
('SALES147       ', '892092021', 'Rizki Reza Ririaza', 'REG4', 'rizki.reza@hypernet.co.id', 3, '123456'),
('SALES148       ', '908092021', 'Ida Ayu Gita Ginanti', 'REG4', 'gita.ginanti@hypernet.co.id', 3, '123456'),
('SALES149       ', '893092021', 'Pandilo Tua Gultom', 'REG4', 'pandilo.tua@hypernet.co.id', 3, '123456'),
('SALES151       ', '895092021', 'Winda Ayu Septiani', 'REG2', 'winda.ayu@hypernet.co.id', 3, '123456'),
('SALES152       ', '870062021', 'Laode Mohammad Syafa\'at', 'REG5', 'laode.m@hypernet.co.id', 3, '123456'),
('SALES153       ', '915102021', 'Evan Janitra', 'REG3', 'evan.janitra@hypernet.co.id', 3, '123456'),
('SALES154       ', '933122021', 'Habibi Masa', 'SBP3', 'habibi.masa@hypernet.co.id', 3, '123456'),
('SALES155       ', '901092021', 'Agung Putra Mataram', 'SBP4', 'agung.putra@hypernet.co.id', 3, '123456'),
('SALES157       ', '925112021', 'Nur Rudhini', 'SBP4', 'nur.rudhini@hypernet.co.id', 3, '123456'),
('SALES158       ', '930112021', 'Afrilian Taufik Ramadhan', 'SBP4', 'afrilian.t@hypernet.co.id', 3, '123456'),
('SALES160       ', '937012022', 'Sulifah', 'SBP3', 'sulifah@hypernet.co.id', 3, '123456'),
('SALES161       ', '938012022', 'Pahrul Kurniaji', 'SBP5', 'pahrul.kurniaji@hypernet.co.id', 3, '123456'),
('SALES162       ', '202110130', 'Edwin Setyawan', 'SBP7', 'edwin.s@whooz.id', 3, '123456'),
('SALES163       ', '942012022', 'Virgiasri Puspitasari', 'REG3', 'virgiasri.p@hypernet.co.id', 3, '123456'),
('SALES164       ', '202201140', 'Annisa Maulidina', 'SBP7', 'annisa.maulidina@whooz.id', 3, '123456'),
('SALES165       ', '202110130', 'Edwin Setyawan', 'SBP7', 'edwin.s@whooz.id', 3, '123456'),
('SALES166       ', '864062021', 'Mahendar Dwi Nugroho', 'CP', 'mahendar.d@hypernet.co.id', 3, '123456'),
('SALES167       ', '946022022', 'Anita Wulandari', 'REG2', 'anita.w@hypernet.co.id', 3, '123456'),
('SALES168       ', '953032022', 'Pratiwi Julia Andini', 'SBP6', 'pratiwi.julia@hypernet.co.id', 3, '123456'),
('SALES169       ', '897092021', 'Alkiya Taftazani', 'SBP8', 'alkiya.t@hypernet.co.id', 3, '123456'),
('SALES170       ', '963032022', 'Jerico Liberty', 'SBP5', 'jerico.liberty@hypernet.co.id', 3, '123456'),
('SALES171       ', '962032022', 'Andriyansyah', 'SBP4', 'andriyansyah@hypernet.co.id', 3, '123456'),
('SALES172       ', '952032022', 'Bakti Prasetya Hutama', 'SBP3', 'bakti.prasetya@hypernet.co.id', 3, '123456'),
('SALES173       ', '202202153', 'Mardianto', 'SBP7', 'mardianto@whooz.id', 3, '123456'),
('SALES174       ', '951032022', 'Ibnu Malik', 'SBP8', 'ibnu.malik@hypernet.co.id', 2, '123456'),
('VNP01', '575012017', 'Indra Kurniadi', 'VNP', 'indra.kurniadi@hypernet.co.id', 1, '123456'),
('VNP02', '687012019', 'Sarifah Lestari', 'VNP', 'sarifah@hypernet.co.id', 1, '123456'),
('VNP03', '945022022', 'nabilah oktaviani', 'VNP', 'nabilah@hypernet.co.id', 1, '123456'),
('VNP04', '837012021', 'Henny Narulita', 'VNP', 'henny.narulita@hypernet.co.id', 1, '123456'),
('VNP05', '203022013', 'Iman Irmansyah', 'VNP', 'iman.irmansyah@hypernet.co.id', 1, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `datawo`
--

CREATE TABLE `datawo` (
  `wodate` date NOT NULL,
  `wonumber` char(255) NOT NULL,
  `ponumber` varchar(255) NOT NULL,
  `customerid` bigint(9) NOT NULL,
  `customername` varchar(255) NOT NULL,
  `vendorid` varchar(255) NOT NULL,
  `vendorname` varchar(255) NOT NULL,
  `mrc` int(255) NOT NULL,
  `otc` int(255) NOT NULL,
  `deptid` varchar(255) NOT NULL,
  `deptname` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `salesid` varchar(255) NOT NULL,
  `salesname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `titikkoordinat` varchar(255) NOT NULL,
  `nodea` varchar(255) NOT NULL,
  `nodeb` longtext NOT NULL,
  `statuspo` varchar(255) NOT NULL,
  `vendorawal` varchar(255) NOT NULL,
  `kapasitasvendor` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datawo`
--

INSERT INTO `datawo` (`wodate`, `wonumber`, `ponumber`, `customerid`, `customername`, `vendorid`, `vendorname`, `mrc`, `otc`, `deptid`, `deptname`, `area`, `salesid`, `salesname`, `email`, `titikkoordinat`, `nodea`, `nodeb`, `statuspo`, `vendorawal`, `kapasitasvendor`) VALUES
('2022-06-05', 'HYPWO0239123', 'HYPSPO0239120', 12222222, 'asd', 'V1452323sd', 'PT Indra Kurniadi', 1, 2500000, 'REG2', 'Jawa Tengah', 'Jabodetabek', 'SALES037       ', 'Nur?aida Hasya', 'nuraida.hasya@hypernet.co.id', '-6.2351,102.2624', 'IDC 3D', 'jl. angksa', 'New Customer', '-- pilih --', 4000),
('2022-06-05', 'HYPWO0239126', 'HYPSPO0239120', 12222222, 'asd', 'V1452323sd', 'PT Indra Kurniadi', 1, 2500000, 'REG2', 'Jawa Tengah', 'Jabodetabek', 'SALES037       ', 'Nur?aida Hasya', 'nuraida.hasya@hypernet.co.id', '-6.2351,102.2624', 'IDC 3D', 'jl. angksa', 'New Customer', '-- pilih --', 4000),
('2022-06-05', 'HYPWO0239130', 'HYPSPO0239120', 12222222, 'asd', 'V1452323sd', 'PT Indra Kurniadi', 1, 2500000, 'REG2', 'Jawa Tengah', 'Jabodetabek', 'SALES037       ', 'Nur?aida Hasya', 'nuraida.hasya@hypernet.co.id', '-6.2351,102.2624', 'IDC 3D', 'jl. angksa', 'New Customer', '-- pilih --', 4000),
('2022-06-05', 'HYPWO0239131', 'HYPSPO0239120', 12222222, 'asd', 'V1452323sd', 'PT Indra Kurniadi', 1, 2500000, 'REG2', 'Jawa Tengah', 'Jabodetabek', 'SALES037       ', 'Nur?aida Hasya', 'nuraida.hasya@hypernet.co.id', '-6.2351,102.2624', 'IDC 3D', 'jl. angksa', 'New Customer', '-- pilih --', 4000),
('2022-06-05', 'HYPwo220123232', 'HYPSPO0239120', 12222222, 'asd', 'V1452323sd', 'PT Indra Kurniadi', 1, 2500000, 'REG2', 'Jawa Tengah', 'Jabodetabek', 'SALES037       ', 'Nur?aida Hasya', 'nuraida.hasya@hypernet.co.id', '-6.2351,102.2624', 'IDC 3D', 'jl. angksa', 'New Customer', '-- pilih --', 4000),
('2022-05-14', 'HYPwo220123232d', 'HYPSPO20120230s', 12121212, 'sadas', 'V1452323sd', 'PT Indra Kurniadi', 1251000, 2500000, 'CSA', 'CSA', 'Jawa', 'SALES002       ', 'Ronald Erwin Alexander', 'ronald.erwin@hypernet.co.id', '-6.52012, 102.35621', 'IDC 3D', 'asdasd', 'service Change', '-- pilih --', 1500),
('2022-05-26', 'HYPwo220123232dasds', 'HYPSPO20120230asd', 12222222, 'asd', 'V1452323sd', 'PT Indra Kurniadi', 0, 0, 'MARCOM', 'MARCOM', 'Bali Nusra', 'SALES023       ', 'Soeganda Prawira', 'william@hypernet.co.id', '', 'IDC 3D', 'asdasd', 'New Customer', '-- pilih --', 1000),
('2022-06-11', 'HYPwo220123232sddsdsdsd', 'HYPSPO20120230sdsdsdsdsd', 1002983434, 'sadas', 'V1452323sd', 'PT Indra Kurniadi', 123, 123, 'REG4', 'Bali', 'Jawa', 'SALES005       ', 'Antonius Maria Claret Hermawan Harry Nugroho', 'harry.nugroho@hypernet.co.id', '123', 'IDC 3D', 'jl. angksa', 'New Customer', '-- pilih --', 123);

-- --------------------------------------------------------

--
-- Table structure for table `data_vendor`
--

CREATE TABLE `data_vendor` (
  `vendorid` varchar(50) NOT NULL,
  `vendorname` varchar(500) NOT NULL,
  `emailvendor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_vendor`
--

INSERT INTO `data_vendor` (`vendorid`, `vendorname`, `emailvendor`) VALUES
('V1243565', 'PT 123 bersih maju', 'indra14kurniadi@gmail.com\r\n'),
('V1452323sd', 'PT Indra Kurniadi', 'indra_kurniadi25@hotmail.com\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `table 11`
--

CREATE TABLE `table 11` (
  `id_level_user` int(1) NOT NULL,
  `nama_level` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table 11`
--

INSERT INTO `table 11` (`id_level_user`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Walikelas'),
(3, 'Guru'),
(4, 'Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `tblupdate`
--

CREATE TABLE `tblupdate` (
  `id` int(255) NOT NULL,
  `wonumber` char(255) NOT NULL,
  `update` longtext NOT NULL,
  `createdate` datetime NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblupdate`
--

INSERT INTO `tblupdate` (`id`, `wonumber`, `update`, `createdate`, `Status`) VALUES
(17, 'HYPwo220123232', 'test2', '2022-05-14 00:00:00', ''),
(18, 'HYPwo220123232', 'test 2', '2022-05-14 00:00:00', ''),
(19, 'HYPwo220123232', 'test 3', '2022-05-14 00:00:00', ''),
(20, 'HYPwo220123232d', 'test1', '2022-05-14 00:00:00', ''),
(21, 'HYPwo220123232', 'apa aja', '2022-05-16 00:00:00', ''),
(22, 'HYPwo220123232', 'bentar lagi kelar', '2022-05-16 00:00:00', ''),
(23, 'HYPwo220123232', 'test', '2022-05-16 00:00:00', ''),
(24, 'HYPwo220123232', 'test', '2022-05-16 00:00:00', ''),
(26, 'HYPwo220123232', 'DONE', '2022-05-16 00:00:00', ''),
(27, 'HYPwo220123232', 'VLAN 2012', '2022-05-22 00:00:00', 'DONE'),
(28, 'HYPwo220123232d', '', '2022-05-30 00:00:00', 'ON PROGRESS'),
(34, 'HYPwo220123232d', 'beres', '2022-05-30 15:00:00', 'DONE'),
(36, 'HYPwo220123232dasds', 'test', '2022-05-30 00:00:00', 'CANCELLED'),
(37, 'HYPwo220123232dasds', 'test2', '2022-05-30 00:00:00', 'CANCELLED'),
(38, 'HYPwo220123232dasds', '', '2022-05-30 00:00:00', 'ON PROGRESS'),
(39, 'HYPwo220123232dasds', 'test3', '2022-05-30 00:00:00', 'ON PROGRESS'),
(40, 'HYPwo220123232dasds', 'test4', '2022-05-30 20:31:47', 'ON PROGRESS'),
(41, 'HYPwo220123232dasds', 'test5', '2022-05-30 20:32:28', 'CANCELLED'),
(42, 'HYPWO0239123', '', '2022-06-05 14:58:40', 'ON PROGRESS'),
(43, 'HYPWO0239126', '', '2022-06-05 15:00:04', 'ON PROGRESS'),
(44, 'HYPWO0239130', '', '2022-06-05 15:00:10', 'ON PROGRESS'),
(45, 'HYPWO0239131', '', '2022-06-05 15:00:18', 'ON PROGRESS'),
(46, 'HYPwo220123232sddsdsdsd', 'admin', '2022-06-22 23:55:29', 'ON PROGRESS'),
(47, 'HYPWO0239123', 'aaaaa', '2022-06-25 23:55:09', 'ON PROGRESS'),
(48, 'HYPwo220123232sddsdsdsd', 'vlan 23123', '2022-07-17 09:59:28', 'DONE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_check`
--

CREATE TABLE `tbl_check` (
  `tglreq` date NOT NULL,
  `alamatid` int(255) NOT NULL,
  `serviceid` int(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `iix` int(255) NOT NULL,
  `ix` int(255) NOT NULL,
  `mrcjual` int(255) NOT NULL,
  `otcjual` int(255) NOT NULL,
  `durasikontrak` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_check`
--

INSERT INTO `tbl_check` (`tglreq`, `alamatid`, `serviceid`, `service`, `kategori`, `iix`, `ix`, `mrcjual`, `otcjual`, `durasikontrak`) VALUES
('2022-06-27', 2, 1, 'Fion', 'Internet', 100, 100, 8000000, 3500000, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lvl_user`
--

CREATE TABLE `tbl_lvl_user` (
  `id_level_user` int(11) NOT NULL,
  `Nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lvl_user`
--

INSERT INTO `tbl_lvl_user` (`id_level_user`, `Nama_level`) VALUES
(1, 'admin'),
(2, 'sales head'),
(3, 'sales member'),
(4, 'admin sales');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `ID` int(100) NOT NULL,
  `Kategori` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`ID`, `Kategori`, `service`) VALUES
(1, 'Internet', 'Airin'),
(2, 'Internet', 'Airin Backup'),
(3, 'Internet', 'Fion'),
(4, 'Internet', 'Fion Backup'),
(5, 'Internet', 'BOQ'),
(6, 'Internet', 'tower'),
(7, 'Internet', '4G VPN'),
(8, 'Internet', '4G Personal'),
(9, 'Cloud', 'Alicloud local egress out 100GB package 1'),
(10, 'Cloud', 'Alicloud local egress out 100GB package 2'),
(11, 'Cloud', 'Alicloud local egress out 100GB package 3'),
(12, 'Cloud', 'AWS Public 100GB egress out package 1'),
(13, 'Cloud', 'AWS Public 100GB egress out package 2'),
(14, 'Cloud', 'AWS Public 100GB egress out package 3'),
(15, 'Cloud', 'Azure Public 100GB egress out package 1'),
(16, 'Cloud', 'Azure Public 100GB egress out package 2'),
(17, 'Cloud', 'Azure Public 100GB egress out package 3'),
(18, 'Cloud', 'Domain (.co.id)'),
(19, 'Cloud', 'Domain (.id)'),
(20, 'Cloud', 'Exchange Online (Plan 1)'),
(21, 'Cloud', 'Exchange Online (Plan 2)'),
(22, 'Cloud', 'Exchange Online Kiosk'),
(23, 'Cloud', 'Fortinet 60E'),
(24, 'Digital Communication', 'IP PBX channel'),
(25, 'Digital Communication', 'IP PBX extension'),
(26, 'Internet', 'IP/24 Atau AS Number'),
(27, 'Internet', 'IP/28'),
(28, 'Internet', 'IP/29'),
(29, 'Internet', 'IP/30'),
(30, 'Internet', 'IP/31'),
(31, 'Internet', 'IP/32'),
(32, 'Cloud', 'Microsoft 365 Business'),
(33, 'Cloud', 'Microsoft 365 E3'),
(34, 'Cloud', 'Microsoft 365 E5'),
(35, 'Cloud', 'Microsoft 365 F1'),
(36, 'Cloud', 'Office 365 Business'),
(37, 'Cloud', 'Office 365 Business Essentials'),
(38, 'Cloud', 'Office 365 Business Premium'),
(39, 'Cloud', 'Office 365 E1'),
(40, 'Cloud', 'Office 365 E3'),
(41, 'Cloud', 'Office 365 E5'),
(42, 'Cloud', 'Office 365 F1'),
(43, 'Cloud', 'Office 365 ProPlus'),
(44, 'Cloud', 'OneDrive for Business (Plan 1)'),
(45, 'Cloud', 'OneDrive for Business (Plan 2)'),
(46, 'Cloud', 'open wifi basic'),
(47, 'Cloud', 'Open wifi plus'),
(48, 'Cloud', 'Open wifi pro'),
(49, 'Cloud', 'Power BI Pro'),
(50, 'Wifi', 'VPNC Medium'),
(51, 'Wifi', 'VPNC Small'),
(52, 'Cloud', 'Web Hosting 10 Gb'),
(53, 'Cloud', 'Web Hosting 25 Gb'),
(54, 'Professional Service', 'EOS 30 Point'),
(55, 'Professional Service', 'EOS 50 Point'),
(56, 'Professional Service', 'EOS 100 Point'),
(57, 'Wifi', 'Micro 3 year'),
(58, 'Wifi', 'Micro 2 year'),
(59, 'Wifi', 'Micro 1 year'),
(60, 'Wifi', 'Lite security 3yr'),
(61, 'Wifi', 'lite security 2yr'),
(62, 'Wifi', 'lite security 1 yr'),
(63, 'Wifi', 'Branch Security 3yr'),
(64, 'Wifi', 'Branch Security 2 yr'),
(65, 'Wifi', 'branch security 1 yr'),
(66, 'Wifi', 'DC 250 3 yr'),
(67, 'Wifi', 'DC 250 2 yr'),
(68, 'Wifi', 'DC 250 1 yr'),
(69, 'Wifi', 'DC 1000 3 yr'),
(70, 'Wifi', 'DC 1000 2 yr'),
(71, 'Wifi', 'DC 1000 1 yr'),
(72, 'Security', 'Central Intercept X Essentials (license +MS)'),
(73, 'Security', 'Central Intercept X Endpoint Advanced (license + MS)'),
(74, 'Security', 'Central Intercept X Essentials for Server (license +MS)'),
(75, 'Security', 'Central Intercept X Endpoint Advanced for Server (license + MS)'),
(76, 'Security', 'bitdefender business suite'),
(77, 'Security', 'bitdefender advace business suite'),
(78, 'Security', 'bit defender elite suite'),
(79, 'Security', 'bitdefender ultra suite'),
(80, 'Security', 'Central Intercept X Essentials (license only)'),
(81, 'Security', 'Central Intercept X Endpoint Advanced (license only)'),
(82, 'Security', 'Central Intercept X Essentials for Server (license only)'),
(83, 'Security', 'Central Intercept X Endpoint Advanced for Server (license only)'),
(84, 'Wifi', 'Aruba Low AP 1 yr'),
(85, 'Wifi', 'Aruba Low AP 2 yr'),
(86, 'Wifi', 'aruba low AP 3 yr'),
(87, 'Wifi', 'Aruba High AP 1yr'),
(88, 'Wifi', 'Aruba High AP 2 yr'),
(89, 'Wifi', 'Aruba High AP 3 yr'),
(90, 'Wifi', 'Aruba Outdoor AP 1 yr'),
(91, 'Wifi', 'Aruba Outdoor AP 2 yr'),
(92, 'Wifi', 'Aruba Outdoor AP 3 yr'),
(93, 'Wifi', 'ACM Low AP 1 yr'),
(94, 'Wifi', 'ACM Low AP 2 yr'),
(95, 'Wifi', 'ACM Low AP 3 yr'),
(96, 'Wifi', 'ACM High AP 1yr'),
(97, 'Wifi', 'ACM High AP 2 yr'),
(98, 'Wifi', 'ACM High AP 3 yr'),
(99, 'Wifi', 'ACM Outdoor AP 1 yr'),
(100, 'Wifi', 'ACM Outdoor AP 2 yr'),
(101, 'Wifi', 'ACM Outdoor AP 3 yr'),
(102, 'Wifi', 'OPEN WIFI HOSPI >50AP 1yr'),
(103, 'Wifi', 'OPEN WIFI HOSPI >50AP 2yr'),
(104, 'Wifi', 'OPEN WIFI HOSPI >50AP 3yr'),
(105, 'Wifi', 'OPEN WIFI HOSPI <=100AP 1yr'),
(106, 'Wifi', 'OPEN WIFI HOSPI <=100AP 2yr'),
(107, 'Wifi', 'OPEN WIFI HOSPI <=100AP 3yr'),
(108, 'Wifi', 'OPEN WIFI HOSPI >100 AP 1yr'),
(109, 'Wifi', 'OPEN WIFI HOSPI >100 AP 2yr'),
(110, 'Wifi', 'OPEN WIFI HOSPI >100 AP 3yr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`areaid`);

--
-- Indexes for table `databast`
--
ALTER TABLE `databast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datacustomer`
--
ALTER TABLE `datacustomer`
  ADD PRIMARY KEY (`customerid`),
  ADD KEY `salesid` (`salesid`);

--
-- Indexes for table `datadept`
--
ALTER TABLE `datadept`
  ADD PRIMARY KEY (`deptid`);

--
-- Indexes for table `datanode`
--
ALTER TABLE `datanode`
  ADD PRIMARY KEY (`nodeid`);

--
-- Indexes for table `datasales`
--
ALTER TABLE `datasales`
  ADD PRIMARY KEY (`salesid`);

--
-- Indexes for table `datawo`
--
ALTER TABLE `datawo`
  ADD PRIMARY KEY (`wonumber`);

--
-- Indexes for table `data_vendor`
--
ALTER TABLE `data_vendor`
  ADD PRIMARY KEY (`vendorid`);

--
-- Indexes for table `table 11`
--
ALTER TABLE `table 11`
  ADD PRIMARY KEY (`id_level_user`);

--
-- Indexes for table `tblupdate`
--
ALTER TABLE `tblupdate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_check`
--
ALTER TABLE `tbl_check`
  ADD PRIMARY KEY (`serviceid`);

--
-- Indexes for table `tbl_lvl_user`
--
ALTER TABLE `tbl_lvl_user`
  ADD PRIMARY KEY (`id_level_user`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `databast`
--
ALTER TABLE `databast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `datanode`
--
ALTER TABLE `datanode`
  MODIFY `nodeid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `table 11`
--
ALTER TABLE `table 11`
  MODIFY `id_level_user` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblupdate`
--
ALTER TABLE `tblupdate`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `tbl_check`
--
ALTER TABLE `tbl_check`
  MODIFY `serviceid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_lvl_user`
--
ALTER TABLE `tbl_lvl_user`
  MODIFY `id_level_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
