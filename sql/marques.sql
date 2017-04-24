-- MySQL dump 10.13  Distrib 5.5.54, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: marques
-- ------------------------------------------------------
-- Server version	5.5.54-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accidents`
--

DROP TABLE IF EXISTS `accidents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accidents` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `SysDate` varchar(50) DEFAULT NULL,
  `Date` varchar(50) DEFAULT NULL,
  `Fleet` varchar(50) DEFAULT NULL,
  `Vehicle` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Details` varchar(50) DEFAULT NULL,
  `Driver` varchar(50) DEFAULT NULL,
  `Injured` varchar(50) DEFAULT NULL,
  `Images` varchar(350) DEFAULT NULL,
  `EnteredBy` varchar(50) DEFAULT NULL,
  `DamageToVehicle` varchar(50) DEFAULT NULL,
  `ThirdPartyDamages` varchar(50) DEFAULT NULL,
  `Time` varchar(50) DEFAULT NULL,
  `Deaths` varchar(50) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `StatusInjured` varchar(50) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accidents`
--

LOCK TABLES `accidents` WRITE;
/*!40000 ALTER TABLE `accidents` DISABLE KEYS */;
INSERT INTO `accidents` VALUES (4,'2016-08-25 08:45:59','2016-08-10 00:00:00','Container Carriers','KR6584','Machine','Face to face accident with van','Keith Nurega','2','screen-shot-2015-08-23-at-4-47-09-pm-e1440373742135.jpg','Mark Antony','Buffer damaged','Windscreen damaged','08:30:00','0','K8 Highway','Minor bruises. Hospitalized',NULL),(5,'2017-03-30 12:34:08','2016-08-17 00:00:00','Container Carriers','KR6584','Trailers','Face to face hit with another vehicle','MARK MATTHEW','1','Truck-Accident-Lawyer-Columbia-South-Carolina.jpg','Mark Antony','Front dents','Front section fully destroyed. Light post fallen','09:00:00','1','Manning Town','Hand broken. Legs wounded','Hand broken. Legs wounded');
/*!40000 ALTER TABLE `accidents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrier_uggroups`
--

DROP TABLE IF EXISTS `carrier_uggroups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrier_uggroups` (
  `GroupID` int(11) NOT NULL AUTO_INCREMENT,
  `Label` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`GroupID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrier_uggroups`
--

LOCK TABLES `carrier_uggroups` WRITE;
/*!40000 ALTER TABLE `carrier_uggroups` DISABLE KEYS */;
INSERT INTO `carrier_uggroups` VALUES (1,'manager'),(2,'user'),(3,'viewer');
/*!40000 ALTER TABLE `carrier_uggroups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrier_ugmembers`
--

DROP TABLE IF EXISTS `carrier_ugmembers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrier_ugmembers` (
  `UserName` varchar(300) NOT NULL,
  `GroupID` int(11) NOT NULL,
  PRIMARY KEY (`UserName`(50),`GroupID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrier_ugmembers`
--

LOCK TABLES `carrier_ugmembers` WRITE;
/*!40000 ALTER TABLE `carrier_ugmembers` DISABLE KEYS */;
INSERT INTO `carrier_ugmembers` VALUES ('Admin',-1),('Admin',1),('Admin',2),('Admin',3),('Manager',1),('Manager',2),('Manager',3),('User',2),('Vishan',-1),('Vishan',1),('Vishan',2),('Vishan',3);
/*!40000 ALTER TABLE `carrier_ugmembers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrier_ugrights`
--

DROP TABLE IF EXISTS `carrier_ugrights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrier_ugrights` (
  `TableName` varchar(300) NOT NULL,
  `GroupID` int(11) NOT NULL,
  `AccessMask` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`TableName`(50),`GroupID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrier_ugrights`
--

LOCK TABLES `carrier_ugrights` WRITE;
/*!40000 ALTER TABLE `carrier_ugrights` DISABLE KEYS */;
INSERT INTO `carrier_ugrights` VALUES ('accidents',-1,'AEDSPI'),('accidents',1,'AEDSP'),('accidents',2,'AESP'),('accidents',3,'SP'),('accidents Chart',-1,'S'),('accidents-report',-1,'AEDSPI'),('accidents-report',1,'SP'),('accidents-report',2,'SP'),('accidents-report',3,'SP'),('admin_members',-1,'ADESPIM'),('admin_rights',-1,'ADESPIM'),('admin_users',-1,'ADESPIM'),('availability',-1,'ASPI'),('carrierusers',-1,'ADESPIM'),('creategrn',-2,'ASP'),('creategrn',-1,'ADESPIM'),('creategrn',1,'AEDSP'),('creategrn',2,'ASP'),('creategrn',3,'SP'),('creategrn-addnew',-1,'AEDSPI'),('creategrn-disposal',-1,'AEDSPI'),('creategrn-disposal',1,'AEDSP'),('creategrn-disposal',2,'AESP'),('creategrn-disposal',3,'SP'),('creategrn-disposal-rebuild',-1,'AEDSPI'),('creategrn-disposal-rebuild',1,'AEDSP'),('creategrn-disposal-rebuild',2,'AESP'),('creategrn-disposal-rebuild',3,'SP'),('creategrn-issue',-1,'AEDSPI'),('creategrn-issue',1,'AEDSP'),('creategrn-issue',2,'AESP'),('creategrn-issue',3,'SP'),('creategrn-issue-price',-1,'AEDSPI'),('creategrn-issue-price',1,'AEDSP'),('creategrn-issue-price',2,'ASP'),('creategrn-issue-rebuilt',-1,'AEDSPI'),('creategrn-issue-rebuilt',1,'AEDSP'),('creategrn-issue-rebuilt',2,'AESP'),('creategrn-issue-rebuilt',3,'SP'),('creategrn-issue-rebuilt-use',-1,'AEDSPI'),('creategrn-issueofrebuild',-1,'AEDSPI'),('creategrn-issueofrebuiltyres',-1,'AEDSPI'),('creategrn-issuetorebuild',-1,'AEDSPI'),('creategrn-issuetorebuild',1,'AEDSP'),('creategrn-issuetorebuild',2,'AESP'),('creategrn-issuetorebuild',3,'SP'),('creategrn-new',-1,'AEDSPI'),('creategrn-new',1,'AEDSP'),('creategrn-new',2,'ASP'),('creategrn-purchase',-1,'AEDSPI'),('creategrn-quick',-1,'ASPI'),('creategrn-rebuilt-issue',-1,'AEDSPI'),('creategrn-receipt',-1,'ASPI'),('creategrn-receive',-1,'AEDSPI'),('creategrn-receive',1,'AEDSP'),('creategrn-receive',2,'AESP'),('creategrn-receive',3,'SP'),('creategrn-receive-rebuilt',-1,'AEDSPI'),('creategrn-receiveafterrebuild',-1,'AEDSPI'),('creategrn-receiveafterrebuild',1,'AEDSP'),('creategrn-receiveafterrebuild',2,'AESP'),('creategrn-receiveafterrebuild',3,'SP'),('creategrn-removal',-1,'AEDSPI'),('creategrn-remove',-1,'AEDSPI'),('creategrn-remove',1,'AEDSP'),('creategrn-remove',2,'AESP'),('creategrn-remove',3,'SP'),('creategrn-remove-other',-1,'AEDSPI'),('creategrn-remove-other',1,'AEDSP'),('creategrn-remove-other',2,'AESP'),('creategrn-remove-other',3,'SP'),('creategrn-stock-balance',-1,'SP'),('creategrn-stock-balance',1,'SP'),('creategrn-stock-balance',2,'SP'),('creategrn-stock-balance',3,'SP'),('creategrn-used',-1,'AEDSPI'),('creategrn-used',1,'AEDSP'),('creategrn-used',2,'ASP'),('creategrn1',-1,'ASPI'),('creategrn11',-1,'ASPI'),('Dashboard',-1,'S'),('fleettype',-1,'AEDSPI'),('fleettype',1,'ADESP'),('fleettype',2,'AESP'),('fleettype',3,'SP'),('fuelmaster',-1,'AEDSPI'),('fuelmaster',1,'AEDSP'),('fuelmaster',2,'AESP'),('fuelmaster',3,'SP'),('fuelmaster Chart',-1,'S'),('fuelmaster Chart',1,'S'),('fuelmaster Chart',2,'S'),('fuelmaster Chart',3,'S'),('fuelmaster-avg',-1,'AEDSPI'),('fuelmaster-report',-1,'SP'),('fuelmaster-reporting',-1,'SP'),('fuelmaster-reports',-1,'SP'),('fuelmaster-reports',1,'SP'),('fuelmaster-reports',2,'SP'),('fuelmaster-reports',3,'SP'),('fuelmaster-view',-1,'AEDSPI'),('fuelmaster1',-1,'AEDSPI'),('fuelprices',-1,'AEDSPI'),('fuelprices',1,'ADESP'),('fuelprices',2,'AESP'),('fuelprices',3,'SP'),('fuelstationmaster',-1,'AEDSPI'),('fuelstationmaster',1,'ADESP'),('fuelstationmaster',2,'AESP'),('fuelstationmaster',3,'SP'),('generalmaster',-1,'AEDSPI'),('home',-1,'AEDSPI'),('insurance-payments',-1,'AEDSPI'),('insurance-payments',1,'AEDSP'),('insurance-payments',2,'AESP'),('insurance-payments',3,'SP'),('insurance-payments-report',-1,'SP'),('insuranceclaims',-1,'AEDSPI'),('insuranceclaims',1,'AEDSP'),('insuranceclaims',2,'AESP'),('insuranceclaims',3,'SP'),('insuranceclaims-report',-1,'SP'),('insurancecompany',-1,'AEDSPI'),('insurancecompany',1,'ADESP'),('insurancecompany',2,'AESP'),('insurancecompany',3,'SP'),('inventorymaster',-2,'ASP'),('inventorymaster',-1,'ADESPIM'),('inventorymaster',1,'ADESP'),('inventorymaster',2,'AESP'),('inventorymaster',3,'SP'),('inventorymaster Chart',-1,'S'),('inventorymaster Report',-1,'SP'),('inventorymaster-max',-1,'AEDSPI'),('inventorymaster-pricing',-1,'M'),('inventorymaster-qty',-1,'M'),('maintenenace',-1,'SP'),('maintenenace',1,'ADESP'),('maintenenace',2,'AESP'),('maintenenace',3,'SP'),('maintenenace Chart',-1,'S'),('maintenenace Chart',1,'S'),('maintenenace Chart',2,'S'),('maintenenace Chart',3,'S'),('maintenenace Comp',-1,'S'),('maintenenace-accident-repair',-1,'AEDSPI'),('maintenenace-accident-repair',1,'AEDSP'),('maintenenace-accident-repair',2,'AESP'),('maintenenace-accident-repair',3,'SP'),('maintenenace-accidentrepair',-1,'AEDSPI'),('maintenenace-general-repair',-1,'AEDSPI'),('maintenenace-general-repair',1,'AEDSP'),('maintenenace-general-repair',2,'AESP'),('maintenenace-general-repair',3,'SP'),('maintenenace-generalrepair',-1,'AEDSPI'),('maintenenace-other-maintain',-1,'AEDSPI'),('maintenenace-other-maintain',1,'AEDSP'),('maintenenace-other-maintain',2,'AESP'),('maintenenace-regularservice',-1,'AEDSPI'),('maintenenace-regularservice',1,'AEDSP'),('maintenenace-regularservice',2,'AESP'),('maintenenace-regularservice',3,'SP'),('maintenenace-report',-1,'SPI'),('maintenenace-report',1,'SP'),('maintenenace-report',2,'SP'),('maxprice',-1,'AEDSPI'),('otherrenewal',-1,'AEDSP'),('otherrenewal',1,'AEDSP'),('otherrenewal',2,'AESP'),('otherrenewal',3,'SP'),('OtherRenewals',-1,'AEDSPI'),('RenewalsMaster',-1,'AEDSPI'),('rnewalmastertable',-1,'AEDSP'),('rnewalmastertable',1,'AEDSP'),('rnewalmastertable',2,'AESP'),('rnewalmastertable',3,'SP'),('servicetypemaster',-1,'AEDSPI'),('servicetypemaster',1,'ADESP'),('servicetypemaster',2,'AESP'),('servicetypemaster',3,'SP'),('stockissues',-1,'AEDSPI'),('stockissues',1,'AEDSP'),('stockissues',2,'ASP'),('suppliermaster',-1,'AEDSPI'),('suppliermaster',1,'ADESP'),('suppliermaster',2,'AESP'),('suppliermaster',3,'SP'),('usedornew',-1,'AEDSPI'),('vehiclemaster',-1,'AEDSPI'),('vehiclemaster',1,'ADESP'),('vehiclemaster',2,'AESP'),('vehiclemaster',3,'SP'),('vehiclemaster-fullcost',-1,'SP'),('vehiclemaster-insu',-1,'AEDSPI'),('vehiclemaster-new',-1,'AEDSPI'),('vehiclemaster-report',-1,'AEDSPI'),('vehiclemaster-report',1,'SP'),('vehiclemaster-report',2,'SP'),('vehiclemaster-report',3,'SP'),('vehicletype',-1,'AEDSPI'),('vehicletype',1,'ADESP'),('vehicletype',2,'AESP'),('vehicletype',3,'SP');
/*!40000 ALTER TABLE `carrier_ugrights` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrierusers`
--

DROP TABLE IF EXISTS `carrierusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrierusers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `fullname` varchar(300) DEFAULT NULL,
  `groupid` varchar(300) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrierusers`
--

LOCK TABLES `carrierusers` WRITE;
/*!40000 ALTER TABLE `carrierusers` DISABLE KEYS */;
INSERT INTO `carrierusers` VALUES (5,'Manager','c963aaa9c595d42374231143aaf804e3','manager@gmail.com','Brian Thomas','manager',1),(6,'Admin','21232f297a57a5a743894a0e4a801fc3','adminfleetco@gmails.com','Mark Croos','Admin',1);
/*!40000 ALTER TABLE `carrierusers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `creategrn`
--

DROP TABLE IF EXISTS `creategrn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creategrn` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ItemCode` varchar(50) DEFAULT NULL,
  `Brand` varchar(50) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Supplier` varchar(50) DEFAULT NULL,
  `Quantity` varchar(50) DEFAULT NULL,
  `RemovedFrom` varchar(50) DEFAULT NULL,
  `SystemDate` varchar(50) DEFAULT NULL,
  `GRNDate` varchar(50) DEFAULT NULL,
  `EnteredBy` varchar(50) DEFAULT NULL,
  `ApprovedBy` varchar(50) DEFAULT NULL,
  `UnitPrice` varchar(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `RefNumber` varchar(50) DEFAULT NULL,
  `CurrentStock` varchar(50) DEFAULT NULL,
  `Fleet` varchar(50) DEFAULT NULL,
  `PriceLink` varchar(50) DEFAULT NULL,
  `Cost` varchar(50) DEFAULT NULL,
  `Remarks` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creategrn`
--

LOCK TABLES `creategrn` WRITE;
/*!40000 ALTER TABLE `creategrn` DISABLE KEYS */;
INSERT INTO `creategrn` VALUES (212,'2666TW','Ceat','Tyres','Kushi Tyres','23',NULL,'2016-08-25 07:26:18','2016-08-02 00:00:00','Mark Antony',NULL,'25','Purchase','538',NULL,'Cargo Carriers',NULL,'575',NULL),(213,'5116519X','Toyota','Oil Filter','Meiken Traders','11',NULL,'2016-08-25 07:26:56','2016-08-04 00:00:00','Mark Antony',NULL,'360','Purchase','8767',NULL,'Cargo Carriers',NULL,'3960',NULL),(214,'2666TW','Ceat','Tyres','Kushi Tyres','231',NULL,'2016-08-25 07:27:20','2016-08-26 00:00:00','Mark Antony',NULL,'12.50','Purchase','7788',NULL,'Cement Carriers',NULL,'2887.5',NULL),(215,'54646G','Honda','Air Filter','Antony\'s Hardwares','8',NULL,'2016-08-25 07:27:53','2016-08-16 00:00:00','Mark Antony',NULL,'125','Purchase','768',NULL,'Container Carriers',NULL,'1000',NULL),(216,'5116519X','Toyota','Oil Filter','Meiken Traders','25',NULL,'2016-08-25 07:28:11','2016-08-11 00:00:00','Mark Antony',NULL,'35','Purchase','587',NULL,'Container Carriers',NULL,'875',NULL),(217,'SQ234','Caltex','Motor Oil','NKS Motor Spares','5',NULL,'2016-08-25 07:28:45','2016-08-09 00:00:00','Mark Antony',NULL,'235','Purchase','28776',NULL,'Cement Carriers',NULL,'1175',NULL),(218,'54646G','Honda','Air Filter','Antony\'s Hardwares','12',NULL,'2016-08-25 07:29:27','2016-08-10 00:00:00','Mark Antony',NULL,'75','Purchase','868',NULL,'Cargo Carriers',NULL,'900',NULL),(219,'5116519X','Toyota','Oil Filter','Meiken Traders','-10','BF1470','2016-08-25 08:04:03','2016-08-09 00:00:00','Mark Antony',NULL,'35','Issue',NULL,'27','Cargo Carriers','5116519X',NULL,''),(220,'SQ234','Caltex','Motor Oil','NKS Motor Spares','-2','WK5874','2016-08-25 08:04:43','2016-08-09 00:00:00','Mark Antony',NULL,'235','Issue',NULL,'4','Cargo Carriers','SQ234',NULL,''),(221,'5116519X','Toyota','Oil Filter','Meiken Traders','-18','KR6584','2016-08-25 08:09:01','2016-08-09 00:00:00','Mark Antony',NULL,'35','Issue',NULL,'26','Container Carriers','5116519X',NULL,''),(222,'2666TW','Ceat','Tyres','Kushi Tyres','-112','EF4771','2016-08-25 08:09:39','2016-08-03 00:00:00','Mark Antony',NULL,'12.50','Issue',NULL,'254','Cement Carriers','2666TW',NULL,''),(223,'54646G','Honda','Air Filter','Antony\'s Hardwares','-2','KI5455','2016-08-25 08:10:08','2016-08-02 00:00:00','Mark Antony',NULL,'75','Issue',NULL,'20','Container Carriers','54646G',NULL,''),(224,'2666TW','Ceat','Tyres','Kushi Tyres','1','WK5874','2016-08-25 08:12:54','2016-08-10 00:00:00','Mark Antony',NULL,'0','Removal',NULL,NULL,'Cargo Carriers',NULL,'0',NULL);
/*!40000 ALTER TABLE `creategrn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `driverassignments`
--

DROP TABLE IF EXISTS `driverassignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `driverassignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driverid` int(11) DEFAULT NULL,
  `fleetid` int(11) DEFAULT NULL,
  `assignedon` date DEFAULT NULL,
  `assignmentdate` date DEFAULT NULL,
  `remarks` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `driverassignments`
--

LOCK TABLES `driverassignments` WRITE;
/*!40000 ALTER TABLE `driverassignments` DISABLE KEYS */;
INSERT INTO `driverassignments` VALUES (2,1,3,'0000-00-00','0000-00-00','sssssdsds');
/*!40000 ALTER TABLE `driverassignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `driveroffs`
--

DROP TABLE IF EXISTS `driveroffs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `driveroffs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driverid` int(11) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `returnedon` date DEFAULT NULL,
  `status` enum('open','closed','overdue') DEFAULT NULL,
  `remarks` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `driveroffs`
--

LOCK TABLES `driveroffs` WRITE;
/*!40000 ALTER TABLE `driveroffs` DISABLE KEYS */;
INSERT INTO `driveroffs` VALUES (2,2,'0000-00-00','0000-00-00','0000-00-00','open','s');
/*!40000 ALTER TABLE `driveroffs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drivers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drivers`
--

LOCK TABLES `drivers` WRITE;
/*!40000 ALTER TABLE `drivers` DISABLE KEYS */;
INSERT INTO `drivers` VALUES (1,'MARK MATTHEW','0717481820','768900987tr53','0000-00-00'),(2,'KIMANI','343333','ssssss','0000-00-00');
/*!40000 ALTER TABLE `drivers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fleetschedules`
--

DROP TABLE IF EXISTS `fleetschedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fleetschedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fleetid` int(11) DEFAULT NULL,
  `routeid` int(11) DEFAULT NULL,
  `departuretime` datetime DEFAULT NULL,
  `expectedarrivaltime` datetime DEFAULT NULL,
  `actualarrivaltime` datetime DEFAULT NULL,
  `remarks` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fleetschedules`
--

LOCK TABLES `fleetschedules` WRITE;
/*!40000 ALTER TABLE `fleetschedules` DISABLE KEYS */;
INSERT INTO `fleetschedules` VALUES (2,3,1,'2017-04-21 14:50:00','2017-04-21 23:50:00','2017-04-21 23:30:00','ssssssss');
/*!40000 ALTER TABLE `fleetschedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fleettype`
--

DROP TABLE IF EXISTS `fleettype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fleettype` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FleetType` varchar(50) DEFAULT NULL,
  `In-Charge` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fleettype`
--

LOCK TABLES `fleettype` WRITE;
/*!40000 ALTER TABLE `fleettype` DISABLE KEYS */;
INSERT INTO `fleettype` VALUES (1,'Container Carriers','Daniel Thomas'),(2,'Cement Carriers','David Brian'),(7,'Cargo Carriers','Frank Anderson');
/*!40000 ALTER TABLE `fleettype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuelmaster`
--

DROP TABLE IF EXISTS `fuelmaster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fuelmaster` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `fuel_date` date DEFAULT NULL,
  `vehicle` varchar(50) DEFAULT NULL,
  `meter_read` varchar(50) DEFAULT NULL,
  `litre_pump` varchar(50) DEFAULT NULL,
  `litre_price` varchar(50) DEFAULT NULL,
  `fuel_station` varchar(50) DEFAULT NULL,
  `fill_type` varchar(50) DEFAULT NULL,
  `last_mileage` varchar(50) DEFAULT NULL,
  `driver` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuelmaster`
--

LOCK TABLES `fuelmaster` WRITE;
/*!40000 ALTER TABLE `fuelmaster` DISABLE KEYS */;
INSERT INTO `fuelmaster` VALUES (59,'2016-08-17','KI5455','26752','36','45','Kiaco Fuel Station','Container Carriers','26250','Kumar Sedhi'),(60,'2016-08-22','KI5455','27124','41','45','SK Fuel Station','Container Carriers','26752','Kumar Sedhi'),(61,'2017-02-01','BF1470','234567','134556','24','Maua Shell',NULL,'134444','MARK MATTHEW');
/*!40000 ALTER TABLE `fuelmaster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuelprices`
--

DROP TABLE IF EXISTS `fuelprices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fuelprices` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FuelType` varchar(50) DEFAULT NULL,
  `PricePerLiter` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuelprices`
--

LOCK TABLES `fuelprices` WRITE;
/*!40000 ALTER TABLE `fuelprices` DISABLE KEYS */;
INSERT INTO `fuelprices` VALUES (1,'Diesel','30'),(2,'Petrol','45');
/*!40000 ALTER TABLE `fuelprices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuelstationmaster`
--

DROP TABLE IF EXISTS `fuelstationmaster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fuelstationmaster` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FuelStation` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `ContactNumber` varchar(50) DEFAULT NULL,
  `Deposit` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuelstationmaster`
--

LOCK TABLES `fuelstationmaster` WRITE;
/*!40000 ALTER TABLE `fuelstationmaster` DISABLE KEYS */;
INSERT INTO `fuelstationmaster` VALUES (1,'Kiaco Fuel Station','25E Main Street','+516546416','500000'),(3,'Maua Shell','MAUA SHELL PETROL STATION','254717481820','8000'),(4,'KENOL MURANG\'A','EASTWOOD APARTMENTS\r\nUPPERHILL ROAD','254567890123','4000');
/*!40000 ALTER TABLE `fuelstationmaster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'admin','Administrator'),(2,'members','General User');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance-payments`
--

DROP TABLE IF EXISTS `insurance-payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insurance-payments` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `SysDate` varchar(50) DEFAULT NULL,
  `Fleet` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `VehicleNo` varchar(50) DEFAULT NULL,
  `RenewalDueDate` varchar(50) DEFAULT NULL,
  `Premium` varchar(50) DEFAULT NULL,
  `Cost` varchar(50) DEFAULT NULL,
  `PaymentVoucher` varchar(50) DEFAULT NULL,
  `EnteredBy` varchar(50) DEFAULT NULL,
  `DateofPayment` varchar(50) DEFAULT NULL,
  `Insurer` varchar(50) DEFAULT NULL,
  `Date` varchar(50) DEFAULT NULL,
  `From` varchar(50) DEFAULT NULL,
  `To` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance-payments`
--

LOCK TABLES `insurance-payments` WRITE;
/*!40000 ALTER TABLE `insurance-payments` DISABLE KEYS */;
INSERT INTO `insurance-payments` VALUES (5,'2016-08-25 08:58:29','Cement Carriers','Machine','SK3266','22 June','3650',NULL,'2578','Mark Antony','2016-08-23 00:00:00','Allianz Insurance',NULL,'2016-08-09 00:00:00','2017-08-23 00:00:00');
/*!40000 ALTER TABLE `insurance-payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insuranceclaims`
--

DROP TABLE IF EXISTS `insuranceclaims`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insuranceclaims` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `SysDate` varchar(50) DEFAULT NULL,
  `Fleet` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `VehicleNo` varchar(50) DEFAULT NULL,
  `AccidentDate` varchar(50) DEFAULT NULL,
  `Claim` varchar(50) DEFAULT NULL,
  `EnteredBy` varchar(50) DEFAULT NULL,
  `ReceiptNo` varchar(50) DEFAULT NULL,
  `Remarks` varchar(50) DEFAULT NULL,
  `insurer` varchar(50) DEFAULT NULL,
  `Date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insuranceclaims`
--

LOCK TABLES `insuranceclaims` WRITE;
/*!40000 ALTER TABLE `insuranceclaims` DISABLE KEYS */;
INSERT INTO `insuranceclaims` VALUES (6,'2016-08-25 09:18:17','Cement Carriers','Machine','SK3266','4','2500','Mark Antony','558','','AIA Insurance Plc','2016-08-18 00:00:00');
/*!40000 ALTER TABLE `insuranceclaims` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurancecompany`
--

DROP TABLE IF EXISTS `insurancecompany`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insurancecompany` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `ContactName` varchar(50) DEFAULT NULL,
  `ContactNo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurancecompany`
--

LOCK TABLES `insurancecompany` WRITE;
/*!40000 ALTER TABLE `insurancecompany` DISABLE KEYS */;
INSERT INTO `insurancecompany` VALUES (1,'Allianz Insurance','Ajmal Nsheed','+289124656'),(2,'AIA Insurance Plc','Arundhi Roy','+54665699');
/*!40000 ALTER TABLE `insurancecompany` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventorymaster`
--

DROP TABLE IF EXISTS `inventorymaster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventorymaster` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ItemID` varchar(50) DEFAULT NULL,
  `Brand` varchar(50) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Supplier` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventorymaster`
--

LOCK TABLES `inventorymaster` WRITE;
/*!40000 ALTER TABLE `inventorymaster` DISABLE KEYS */;
INSERT INTO `inventorymaster` VALUES (1,'SQ234','Caltex','Motor Oil','NKS Motor Spares'),(2,'54646G','Honda','Air Filter','Antony\'s Hardwares'),(5,'5116519X','Toyota','Oil Filter','Meiken Traders'),(6,'2666TW','Ceat','Tyres','Kushi Tyres');
/*!40000 ALTER TABLE `inventorymaster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'TYRES','HANCOOK',234500,'KAMUKUNJI','BLAH BLAH SITAKI KUSIKIA, what do you.....');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maintenenace`
--

DROP TABLE IF EXISTS `maintenenace`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maintenenace` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Fleet` varchar(50) DEFAULT NULL,
  `Vehicle` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Supplier` varchar(50) DEFAULT NULL,
  `Cost` varchar(50) DEFAULT NULL,
  `Remarks` varchar(50) DEFAULT NULL,
  `RefNo` varchar(50) DEFAULT NULL,
  `SysDate` varchar(50) DEFAULT NULL,
  `Date` varchar(50) DEFAULT NULL,
  `EnteredBy` varchar(50) DEFAULT NULL,
  `Approval` varchar(50) DEFAULT NULL,
  `MeterReading` varchar(50) DEFAULT NULL,
  `AccidentRef` varchar(50) DEFAULT NULL,
  `PaymentVoucher` varchar(50) DEFAULT NULL,
  `MaintType` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maintenenace`
--

LOCK TABLES `maintenenace` WRITE;
/*!40000 ALTER TABLE `maintenenace` DISABLE KEYS */;
INSERT INTO `maintenenace` VALUES (23,'Cargo Carriers','BF1470','Lorry','Kushi Tyres','2500',NULL,'Ref:OqMyW','2017-03-30 14:42:16','2016-11-22 00:00:00','Brian Thomas','','25402','','5455','Full Service'),(24,'Container Carriers','KR6584','Machine','Meiken Traders','2540','','6554','2016-11-22 12:37:32','2016-11-08 00:00:00','Brian Thomas',NULL,'25466',NULL,'545','Lub Service');
/*!40000 ALTER TABLE `maintenenace` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_no` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `destination` text NOT NULL,
  `recipient` varchar(32) DEFAULT NULL,
  `recipienttel` varchar(32) DEFAULT NULL,
  `source` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,'909000','box','4',200,800,'ken','9090','Maua','henry','909090','Nairobi'),(2,'909000','carton','2',400,800,'ken','9090','Maua','henry','909090','Nairobi'),(3,'677767','box','2',200,400,'k','9999','Maua','878788','9000000','Nairobi');
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `ref_no` varchar(255) NOT NULL,
  `driver` varchar(255) NOT NULL,
  `fleet` varchar(255) NOT NULL,
  `warehouse` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `total` double NOT NULL,
  `status` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'0000-00-00','909000','','3','Nairobi','ken',1600,'On-Transit','paid','1',''),(2,'0000-00-00','677767','ken','3','Nairobi','note',400,'On-Transit','Not-paid','1','');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `otherrenewal`
--

DROP TABLE IF EXISTS `otherrenewal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `otherrenewal` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Fleet` varchar(50) DEFAULT NULL,
  `VehicleNo` varchar(50) DEFAULT NULL,
  `VehicleType` varchar(50) DEFAULT NULL,
  `PaymentType` varchar(50) DEFAULT NULL,
  `PaymentDate` varchar(50) DEFAULT NULL,
  `Cost` varchar(50) DEFAULT NULL,
  `SystemDate` varchar(50) DEFAULT NULL,
  `EnteredBy` varchar(50) DEFAULT NULL,
  `PeriodFrom` varchar(50) DEFAULT NULL,
  `PeriodTo` varchar(50) DEFAULT NULL,
  `PaymentRef` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `otherrenewal`
--

LOCK TABLES `otherrenewal` WRITE;
/*!40000 ALTER TABLE `otherrenewal` DISABLE KEYS */;
INSERT INTO `otherrenewal` VALUES (2,'Cement Carriers','SK3266','Machine','Emission Test','2016-08-17 00:00:00','2500','2016-08-25 09:11:44','Mark Antony','2016-08-16 00:00:00','2017-08-16 00:00:00','6336');
/*!40000 ALTER TABLE `otherrenewal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` int(11) DEFAULT NULL,
  `refno` varchar(32) DEFAULT NULL,
  `paidon` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `paidby` varchar(32) DEFAULT NULL,
  `paymentmode` varchar(32) DEFAULT NULL,
  `bank` varchar(32) DEFAULT NULL,
  `receiptno` varchar(32) DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,1,'909000','0000-00-00',1600,'ben','Bank','Equity','2322222',1);
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repair`
--

DROP TABLE IF EXISTS `repair`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `repair` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle` varchar(255) NOT NULL,
  `part` varchar(255) NOT NULL,
  `cost` int(245) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `enteredBy` varchar(255) NOT NULL,
  `Details` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repair`
--

LOCK TABLES `repair` WRITE;
/*!40000 ALTER TABLE `repair` DISABLE KEYS */;
/*!40000 ALTER TABLE `repair` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rnewalmastertable`
--

DROP TABLE IF EXISTS `rnewalmastertable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rnewalmastertable` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Renewal` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rnewalmastertable`
--

LOCK TABLES `rnewalmastertable` WRITE;
/*!40000 ALTER TABLE `rnewalmastertable` DISABLE KEYS */;
INSERT INTO `rnewalmastertable` VALUES (1,'Fitness Certificate'),(2,'Port Permit'),(3,'Emission Test');
/*!40000 ALTER TABLE `rnewalmastertable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `routedetails`
--

DROP TABLE IF EXISTS `routedetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `routedetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `routeid` int(11) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `latitude` varchar(32) DEFAULT NULL,
  `longititude` varchar(32) DEFAULT NULL,
  `type` enum('source','destination','sub-terminals') DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `routedetails`
--

LOCK TABLES `routedetails` WRITE;
/*!40000 ALTER TABLE `routedetails` DISABLE KEYS */;
INSERT INTO `routedetails` VALUES (2,1,'Nanyuki','233','2343','sub-terminals',1),(3,1,'Nyeri','555','2343','sub-terminals',1),(4,1,'Nairobi','25533','e43','source',1),(5,1,'MAUA','333','3333','destination',1),(6,1,'Nyahururu','90','98','sub-terminals',1);
/*!40000 ALTER TABLE `routedetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `routes`
--

DROP TABLE IF EXISTS `routes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(32) DEFAULT NULL,
  `destination` varchar(32) DEFAULT NULL,
  `remarks` text,
  `createdby` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `routes`
--

LOCK TABLES `routes` WRITE;
/*!40000 ALTER TABLE `routes` DISABLE KEYS */;
INSERT INTO `routes` VALUES (1,'Nairobi','Maua','Nairobi-k-Maua',1);
/*!40000 ALTER TABLE `routes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicetypemaster`
--

DROP TABLE IF EXISTS `servicetypemaster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicetypemaster` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicetypemaster`
--

LOCK TABLES `servicetypemaster` WRITE;
/*!40000 ALTER TABLE `servicetypemaster` DISABLE KEYS */;
INSERT INTO `servicetypemaster` VALUES (1,'Full Service'),(2,'Lub Service'),(3,'Mechanical Service'),(7,'Other Maintenance');
/*!40000 ALTER TABLE `servicetypemaster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliermaster`
--

DROP TABLE IF EXISTS `suppliermaster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suppliermaster` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `SupplierName` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `ContactPerson` varchar(50) DEFAULT NULL,
  `Telephone` varchar(50) DEFAULT NULL,
  `Remarks` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliermaster`
--

LOCK TABLES `suppliermaster` WRITE;
/*!40000 ALTER TABLE `suppliermaster` DISABLE KEYS */;
INSERT INTO `suppliermaster` VALUES (1,'NKS Motor Spares','546 Maek Aveneue','Davis Khan','+3296656565',''),(2,'Kushi Tyres','Jumaira Terras','Melani Hans','+6521799196',''),(3,'Meiken Traders','245E Meinx Road','Anil Gupta','+5665786786',''),(5,'Alois','algomi-tech',NULL,'254567890123','test datas');
/*!40000 ALTER TABLE `suppliermaster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'127.0.0.1','administrator','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','admin@admin.com','',NULL,NULL,NULL,1268889823,1493013067,1,'Admin','istrator','ADMIN','0'),(2,'::1','janedoe@jane.com','$2y$08$cqNG.KsQgiKo6Z3VMJTyKOn9aC/QhyeoCsq9aS5aDYc/io8HvcVz.',NULL,'janedoe@jane.com',NULL,NULL,NULL,NULL,1486899556,NULL,1,'Jane','Doe','ICT','25472408567');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,1,1),(2,1,2),(3,2,2);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiclemaster`
--

DROP TABLE IF EXISTS `vehiclemaster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiclemaster` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `RegNo` varchar(50) DEFAULT NULL,
  `Fleet` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `RegDate` varchar(50) DEFAULT NULL,
  `Cost` varchar(50) DEFAULT NULL,
  `DriverAsigned` varchar(50) DEFAULT NULL,
  `Make` varchar(50) DEFAULT NULL,
  `Model` varchar(50) DEFAULT NULL,
  `InsuranceDue` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiclemaster`
--

LOCK TABLES `vehiclemaster` WRITE;
/*!40000 ALTER TABLE `vehiclemaster` DISABLE KEYS */;
INSERT INTO `vehiclemaster` VALUES (3,'BF1470','Cargo Carriers','Lorry','2011-04-04 00:00:00','658000','Antony Croos','Nissan','KMX4018E','15 Jan'),(5,'KR6584','Container Carriers','Machine','2014-04-09 00:00:00','685000','Keith Nurega','Isuzu','UPS40185','30 April'),(7,'KI5455','Container Carriers','Machine','2015-04-04 00:00:00','485000','Kumar Sedhi','Tata','NERS4018','01 Jan'),(9,'KCH218P',NULL,'LORRY','02/01/2017','3000000','KALULU MWIRICHIA','ISUZU','FHR','10 SEP'),(10,'KCH218P',NULL,'GH3254','01/29/2017','1200000','KALULU MWIRICHIA','ISUZU','FHR','02/10/2017');
/*!40000 ALTER TABLE `vehiclemaster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicletype`
--

DROP TABLE IF EXISTS `vehicletype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicletype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `VehicleType` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicletype`
--

LOCK TABLES `vehicletype` WRITE;
/*!40000 ALTER TABLE `vehicletype` DISABLE KEYS */;
INSERT INTO `vehicletype` VALUES (1,'Machine'),(2,'Trailers'),(3,'Lorry'),(4,'Tankers'),(6,'SUV');
/*!40000 ALTER TABLE `vehicletype` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-24  9:18:38
