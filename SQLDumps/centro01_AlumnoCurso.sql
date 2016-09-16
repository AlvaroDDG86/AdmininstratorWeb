CREATE DATABASE  IF NOT EXISTS `centro01` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `centro01`;
-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: centro01
-- ------------------------------------------------------
-- Server version	5.5.43-0+deb8u1

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
-- Table structure for table `AlumnoCurso`
--

DROP TABLE IF EXISTS `AlumnoCurso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AlumnoCurso` (
  `idAlumnoCurso` int(11) NOT NULL AUTO_INCREMENT,
  `codigoAlumno` int(11) NOT NULL,
  `codigoCurso` int(11) NOT NULL,
  `calificacionAlumnoCurso` decimal(3,2) DEFAULT NULL,
  `faltasAlumnoCurso` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAlumnoCurso`),
  KEY `fk_AlumnoCurso_1_idx` (`codigoCurso`),
  KEY `fk_AlumnoCurso_2_idx` (`codigoAlumno`),
  CONSTRAINT `fk_AlumnoCurso_1` FOREIGN KEY (`codigoCurso`) REFERENCES `Curso` (`idCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_AlumnoCurso_2` FOREIGN KEY (`codigoAlumno`) REFERENCES `Alumno` (`idAlumno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AlumnoCurso`
--

LOCK TABLES `AlumnoCurso` WRITE;
/*!40000 ALTER TABLE `AlumnoCurso` DISABLE KEYS */;
INSERT INTO `AlumnoCurso` VALUES (1,1,1,0.00,0),(2,2,1,0.00,0),(5,3,1,NULL,NULL),(6,4,4,NULL,NULL),(7,5,4,NULL,NULL),(12,6,4,NULL,NULL),(13,6,3,NULL,NULL),(14,7,4,NULL,NULL),(15,7,3,NULL,NULL),(16,7,1,NULL,NULL);
/*!40000 ALTER TABLE `AlumnoCurso` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-21 16:54:35
