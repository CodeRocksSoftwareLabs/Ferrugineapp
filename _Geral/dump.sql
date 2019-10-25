-- MySQL dump 10.13  Distrib 5.7.27, for macos10.14 (x86_64)
--
-- Host: 127.0.0.1    Database: ferrugineapp
-- ------------------------------------------------------
-- Server version	5.7.26

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
-- Dumping data for table `agendamentos`
--

LOCK TABLES `agendamentos` WRITE;
/*!40000 ALTER TABLE `agendamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `agendamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Victor Frossard',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,'2019-10-13 16:35:53','2019-10-13 16:41:58','2019-10-13 16:41:58'),(2,'Victor Frossard','victor@coderocks.com.br','(27) 92393-4984',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,8,'2019-10-13 17:25:40','2019-10-24 22:44:05',NULL),(3,'Bruna Frossard','bruna@coderocks.com.br','(27) 99938-3232',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Prefere agendar no horário da manhã.',2,8,'2019-10-13 17:40:05','2019-10-24 22:44:24',NULL),(4,'Josmane Frossard','josmane@coderocks.com.br','(27) 92398-9222',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,8,'2019-10-13 17:40:05','2019-10-24 22:44:46',NULL),(5,'Douglas Ferrugine','douglas@ferrugine.com.br','(27) 93292-3882',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,8,'2019-10-13 17:40:05','2019-10-24 22:45:11',NULL),(6,'Gabriel Ferrugine','gabriel@ferrugine.com.br','(27) 92382-3873',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,8,'2019-10-13 17:40:05','2019-10-24 22:45:27',NULL),(7,'Diego Assis','diego@assis.com.br','(27) 99238-3662',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,8,'2019-10-13 17:40:05','2019-10-24 22:45:44',NULL),(8,'Ruth Siqueira','ruth@coderocks.com.br','(27) 3923-9078',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,8,'2019-10-13 17:42:05','2019-10-24 22:46:05',NULL),(9,'Jussara Siqueira da Silva','jussara@coderocks.com.br','(27) 3999-3888',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,8,'2019-10-13 17:42:05','2019-10-24 22:46:26',NULL),(10,'Daniel Danied','daniel@ferrugine.com.br','(27) 99238-8328',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,8,'2019-10-13 17:42:05','2019-10-24 22:46:49',NULL),(11,'José Roberto','jose@ferrugine.com.br','(27) 98883-8833',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,8,'2019-10-13 17:42:05','2019-10-24 22:47:09',NULL),(12,'Thiago Ortiz','thiago@picpay.com.br','(27) 99288-3888',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,8,'2019-10-13 17:42:05','2019-10-24 22:47:28',NULL),(14,'Reginaldo Godinho','reginaldo@gmail.com','(27) 99635-0479',NULL,'29090-590',NULL,NULL,NULL,NULL,NULL,NULL,1,8,'2019-10-20 18:22:44','2019-10-20 18:22:44',NULL),(15,'Victor Borsoi','borsoi@gmail.com','(27) 91111-1111','(27) 22222-2222','29090-590','Endereço','numeor','complemento','Bairro','Vitória','teste de obs',1,8,'2019-10-20 18:28:06','2019-10-20 18:53:22',NULL),(16,'Ateneu de Souza','ateneu@gmail.com','(27) 98888-8888','(28) 99827-2777',NULL,NULL,NULL,NULL,NULL,NULL,'Agendar preferencialmente pela manhã.',1,8,'2019-10-20 18:57:57','2019-10-20 18:58:21',NULL);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (1,'AC','Acre'),(2,'AL','Alagoas'),(3,'AP','Amapá'),(4,'AM','Amazonas'),(5,'BA','Bahia'),(6,'CE','Ceará'),(7,'DF','Distrito Federal'),(8,'ES','Espírito Santo'),(9,'GO','Goiás'),(10,'MA','Maranhão'),(11,'MT','Mato Grosso'),(12,'MS','Mato Grosso do Sul'),(13,'MG','Minas Gerais'),(14,'PA','Pará'),(15,'PB','Paraíba'),(16,'PR','Paraná'),(17,'PE','Pernambuco'),(18,'PI','Piauí'),(19,'RJ','Rio de Janeiro'),(20,'RN','Rio Grande do Norte'),(21,'RS','Rio Grande do Sul'),(22,'RO','Rondônia'),(23,'RR','Roraima'),(24,'SC','Santa Catarina'),(25,'SP','São Paulo'),(26,'SE','Sergipe'),(27,'TO','Tocantins');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `notificacoes`
--

LOCK TABLES `notificacoes` WRITE;
/*!40000 ALTER TABLE `notificacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Agendado'),(2,'Em visita'),(3,'Cancelado'),(4,'Concluído com venda'),(5,'Concluído sem venda');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Victor Frossard','victor@coderocks.com.br','(27) 9 9635-0479','victor','81dc9bdb52d04dc20036dbd8313ed055',NULL,'CodeRocks','ef117a4de795722be7ceaecf1a19463b',1,NULL,'2019-10-21 21:21:09',NULL),(2,'Bruna Frossard','brunarn@gmail.com','(27) 91293-0129','bruna','202cb962ac59075b964b07152d234b70',NULL,'CoreRocks',NULL,NULL,NULL,'2019-10-24 22:24:09',NULL),(3,'Victor Frossard','victorfrossard00@gmail.com','(27) 99635-0479','victorfrossard00',NULL,NULL,'CodeRocks','53969a3a68ee64d05a21a82fcb2a6a3c',1,'2019-10-22 20:12:46','2019-10-22 20:33:00','2019-10-22 20:33:00'),(5,'Victor de Mattos','victorfrossard00@gmail.com','(27) 99635-0479','victorfrossard00',NULL,NULL,'CodeRocks','66159207799897bf48a4ff8414ce74ed',1,'2019-10-22 20:38:00','2019-10-22 20:45:53','2019-10-22 20:45:53'),(6,'Victor de Mattos Frossard','victorfrossard00@gmail.com','(27) 99635-0479','victorfrossard00','202cb962ac59075b964b07152d234b70',NULL,'CodeRocks','560ba643fc2116746584174cfe0a3479',NULL,'2019-10-22 20:41:58','2019-10-24 22:24:33',NULL),(7,'Victor de Mattos','victorfrossard00@gmail.com','(27) 99635-0479','victorfrossard00',NULL,NULL,'CodeRocks','84091f1204dc0f99a0c0ddb7244d5f28',1,'2019-10-22 20:42:41','2019-10-22 20:45:50','2019-10-22 20:45:50'),(8,'Victor de Mattos','victorfrossard00@gmail.com','(27) 99635-0479','victorfrossard00',NULL,NULL,'CodeRocks','22bca5553045008b1558cc24bd6057b2',1,'2019-10-22 20:43:06','2019-10-22 20:44:23','2019-10-22 20:44:23');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-24 22:48:53
