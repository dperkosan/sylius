<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200314131304 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Skeleton DB (with basic data)';
    }

    public function up(Schema $schema) : void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql("
        CREATE DATABASE  IF NOT EXISTS `sylius` /*!40100 DEFAULT CHARACTER SET latin1 */;
        USE `sylius`;

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
        -- Table structure for table `bitbag_cms_block`
        --

        DROP TABLE IF EXISTS `bitbag_cms_block`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `bitbag_cms_block` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `code` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
        `enabled` tinyint(1) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_321C84CF77153098` (`code`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `bitbag_cms_block`
        --

        LOCK TABLES `bitbag_cms_block` WRITE;
        /*!40000 ALTER TABLE `bitbag_cms_block` DISABLE KEYS */;
        /*!40000 ALTER TABLE `bitbag_cms_block` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `bitbag_cms_block_channels`
        --

        DROP TABLE IF EXISTS `bitbag_cms_block_channels`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `bitbag_cms_block_channels` (
        `block_id` int(11) NOT NULL,
        `channel_id` int(11) NOT NULL,
        PRIMARY KEY (`block_id`,`channel_id`),
        KEY `IDX_8417B073E9ED820C` (`block_id`),
        KEY `IDX_8417B07372F5A1AA` (`channel_id`),
        CONSTRAINT `FK_8417B07372F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_8417B073E9ED820C` FOREIGN KEY (`block_id`) REFERENCES `bitbag_cms_block` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `bitbag_cms_block_channels`
        --

        LOCK TABLES `bitbag_cms_block_channels` WRITE;
        /*!40000 ALTER TABLE `bitbag_cms_block_channels` DISABLE KEYS */;
        /*!40000 ALTER TABLE `bitbag_cms_block_channels` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `bitbag_cms_block_products`
        --

        DROP TABLE IF EXISTS `bitbag_cms_block_products`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `bitbag_cms_block_products` (
        `block_id` int(11) NOT NULL,
        `product_id` int(11) NOT NULL,
        PRIMARY KEY (`block_id`,`product_id`),
        KEY `IDX_C4B9089FE9ED820C` (`block_id`),
        KEY `IDX_C4B9089F4584665A` (`product_id`),
        CONSTRAINT `FK_C4B9089F4584665A` FOREIGN KEY (`product_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_C4B9089FE9ED820C` FOREIGN KEY (`block_id`) REFERENCES `bitbag_cms_block` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `bitbag_cms_block_products`
        --

        LOCK TABLES `bitbag_cms_block_products` WRITE;
        /*!40000 ALTER TABLE `bitbag_cms_block_products` DISABLE KEYS */;
        /*!40000 ALTER TABLE `bitbag_cms_block_products` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `bitbag_cms_block_sections`
        --

        DROP TABLE IF EXISTS `bitbag_cms_block_sections`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `bitbag_cms_block_sections` (
        `block_id` int(11) NOT NULL,
        `section_id` int(11) NOT NULL,
        PRIMARY KEY (`block_id`,`section_id`),
        KEY `IDX_5C95115DE9ED820C` (`block_id`),
        KEY `IDX_5C95115DD823E37A` (`section_id`),
        CONSTRAINT `FK_5C95115DD823E37A` FOREIGN KEY (`section_id`) REFERENCES `bitbag_cms_section` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_5C95115DE9ED820C` FOREIGN KEY (`block_id`) REFERENCES `bitbag_cms_block` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `bitbag_cms_block_sections`
        --

        LOCK TABLES `bitbag_cms_block_sections` WRITE;
        /*!40000 ALTER TABLE `bitbag_cms_block_sections` DISABLE KEYS */;
        /*!40000 ALTER TABLE `bitbag_cms_block_sections` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `bitbag_cms_block_taxonomies`
        --

        DROP TABLE IF EXISTS `bitbag_cms_block_taxonomies`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `bitbag_cms_block_taxonomies` (
        `block_id` int(11) NOT NULL,
        `taxon_id` int(11) NOT NULL,
        PRIMARY KEY (`block_id`,`taxon_id`),
        KEY `IDX_10C3E429E9ED820C` (`block_id`),
        KEY `IDX_10C3E429DE13F470` (`taxon_id`),
        CONSTRAINT `FK_10C3E429DE13F470` FOREIGN KEY (`taxon_id`) REFERENCES `sylius_taxon` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_10C3E429E9ED820C` FOREIGN KEY (`block_id`) REFERENCES `bitbag_cms_block` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `bitbag_cms_block_taxonomies`
        --

        LOCK TABLES `bitbag_cms_block_taxonomies` WRITE;
        /*!40000 ALTER TABLE `bitbag_cms_block_taxonomies` DISABLE KEYS */;
        /*!40000 ALTER TABLE `bitbag_cms_block_taxonomies` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `bitbag_cms_block_translation`
        --

        DROP TABLE IF EXISTS `bitbag_cms_block_translation`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `bitbag_cms_block_translation` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `translatable_id` int(11) NOT NULL,
        `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `content` longtext COLLATE utf8_unicode_ci,
        `link` longtext COLLATE utf8_unicode_ci,
        `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `bitbag_cms_block_translation_uniq_trans` (`translatable_id`,`locale`),
        KEY `IDX_32897FDF2C2AC5D3` (`translatable_id`),
        CONSTRAINT `FK_32897FDF2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `bitbag_cms_block` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `bitbag_cms_block_translation`
        --

        LOCK TABLES `bitbag_cms_block_translation` WRITE;
        /*!40000 ALTER TABLE `bitbag_cms_block_translation` DISABLE KEYS */;
        /*!40000 ALTER TABLE `bitbag_cms_block_translation` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `bitbag_cms_faq`
        --

        DROP TABLE IF EXISTS `bitbag_cms_faq`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `bitbag_cms_faq` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `position` int(11) NOT NULL,
        `enabled` tinyint(1) NOT NULL,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `bitbag_cms_faq`
        --

        LOCK TABLES `bitbag_cms_faq` WRITE;
        /*!40000 ALTER TABLE `bitbag_cms_faq` DISABLE KEYS */;
        /*!40000 ALTER TABLE `bitbag_cms_faq` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `bitbag_cms_faq_channels`
        --

        DROP TABLE IF EXISTS `bitbag_cms_faq_channels`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `bitbag_cms_faq_channels` (
        `faq_id` int(11) NOT NULL,
        `channel_id` int(11) NOT NULL,
        PRIMARY KEY (`faq_id`,`channel_id`),
        KEY `IDX_FF6D59AC81BEC8C2` (`faq_id`),
        KEY `IDX_FF6D59AC72F5A1AA` (`channel_id`),
        CONSTRAINT `FK_FF6D59AC72F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_FF6D59AC81BEC8C2` FOREIGN KEY (`faq_id`) REFERENCES `bitbag_cms_faq` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `bitbag_cms_faq_channels`
        --

        LOCK TABLES `bitbag_cms_faq_channels` WRITE;
        /*!40000 ALTER TABLE `bitbag_cms_faq_channels` DISABLE KEYS */;
        /*!40000 ALTER TABLE `bitbag_cms_faq_channels` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `bitbag_cms_faq_translation`
        --

        DROP TABLE IF EXISTS `bitbag_cms_faq_translation`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `bitbag_cms_faq_translation` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `translatable_id` int(11) NOT NULL,
        `question` longtext COLLATE utf8_unicode_ci NOT NULL,
        `answer` longtext COLLATE utf8_unicode_ci NOT NULL,
        `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `bitbag_cms_faq_translation_uniq_trans` (`translatable_id`,`locale`),
        KEY `IDX_8B30DD2E2C2AC5D3` (`translatable_id`),
        CONSTRAINT `FK_8B30DD2E2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `bitbag_cms_faq` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `bitbag_cms_faq_translation`
        --

        LOCK TABLES `bitbag_cms_faq_translation` WRITE;
        /*!40000 ALTER TABLE `bitbag_cms_faq_translation` DISABLE KEYS */;
        /*!40000 ALTER TABLE `bitbag_cms_faq_translation` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `bitbag_cms_media`
        --

        DROP TABLE IF EXISTS `bitbag_cms_media`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `bitbag_cms_media` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `code` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
        `type` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
        `path` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
        `mime_type` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
        `enabled` tinyint(1) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_DB2BB2E177153098` (`code`),
        UNIQUE KEY `UNIQ_DB2BB2E1B548B0F` (`path`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `bitbag_cms_media`
        --

        LOCK TABLES `bitbag_cms_media` WRITE;
        /*!40000 ALTER TABLE `bitbag_cms_media` DISABLE KEYS */;
        /*!40000 ALTER TABLE `bitbag_cms_media` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `bitbag_cms_media_channels`
        --

        DROP TABLE IF EXISTS `bitbag_cms_media_channels`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `bitbag_cms_media_channels` (
        `block_id` int(11) NOT NULL,
        `channel_id` int(11) NOT NULL,
        PRIMARY KEY (`block_id`,`channel_id`),
        KEY `IDX_D109622EE9ED820C` (`block_id`),
        KEY `IDX_D109622E72F5A1AA` (`channel_id`),
        CONSTRAINT `FK_D109622E72F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_D109622EE9ED820C` FOREIGN KEY (`block_id`) REFERENCES `bitbag_cms_media` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `bitbag_cms_media_channels`
        --

        LOCK TABLES `bitbag_cms_media_channels` WRITE;
        /*!40000 ALTER TABLE `bitbag_cms_media_channels` DISABLE KEYS */;
        /*!40000 ALTER TABLE `bitbag_cms_media_channels` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `bitbag_cms_media_products`
        --

        DROP TABLE IF EXISTS `bitbag_cms_media_products`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `bitbag_cms_media_products` (
        `media_id` int(11) NOT NULL,
        `product_id` int(11) NOT NULL,
        PRIMARY KEY (`media_id`,`product_id`),
        KEY `IDX_91A7DAC2EA9FDD75` (`media_id`),
        KEY `IDX_91A7DAC24584665A` (`product_id`),
        CONSTRAINT `FK_91A7DAC24584665A` FOREIGN KEY (`product_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_91A7DAC2EA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `bitbag_cms_media` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `bitbag_cms_media_products`
        --

        LOCK TABLES `bitbag_cms_media_products` WRITE;
        /*!40000 ALTER TABLE `bitbag_cms_media_products` DISABLE KEYS */;
        /*!40000 ALTER TABLE `bitbag_cms_media_products` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `bitbag_cms_media_sections`
        --

        DROP TABLE IF EXISTS `bitbag_cms_media_sections`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `bitbag_cms_media_sections` (
        `media_id` int(11) NOT NULL,
        `section_id` int(11) NOT NULL,
        PRIMARY KEY (`media_id`,`section_id`),
        KEY `IDX_98BC300EA9FDD75` (`media_id`),
        KEY `IDX_98BC300D823E37A` (`section_id`),
        CONSTRAINT `FK_98BC300D823E37A` FOREIGN KEY (`section_id`) REFERENCES `bitbag_cms_section` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_98BC300EA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `bitbag_cms_media` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `bitbag_cms_media_sections`
        --

        LOCK TABLES `bitbag_cms_media_sections` WRITE;
        /*!40000 ALTER TABLE `bitbag_cms_media_sections` DISABLE KEYS */;
        /*!40000 ALTER TABLE `bitbag_cms_media_sections` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `bitbag_cms_media_translation`
        --

        DROP TABLE IF EXISTS `bitbag_cms_media_translation`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `bitbag_cms_media_translation` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `translatable_id` int(11) NOT NULL,
        `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `content` longtext COLLATE utf8_unicode_ci,
        `alt` longtext COLLATE utf8_unicode_ci,
        `link` longtext COLLATE utf8_unicode_ci,
        `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `bitbag_cms_media_translation_uniq_trans` (`translatable_id`,`locale`),
        KEY `IDX_1FEC58972C2AC5D3` (`translatable_id`),
        CONSTRAINT `FK_1FEC58972C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `bitbag_cms_media` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `bitbag_cms_media_translation`
        --

        LOCK TABLES `bitbag_cms_media_translation` WRITE;
        /*!40000 ALTER TABLE `bitbag_cms_media_translation` DISABLE KEYS */;
        /*!40000 ALTER TABLE `bitbag_cms_media_translation` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `bitbag_cms_page`
        --

        DROP TABLE IF EXISTS `bitbag_cms_page`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `bitbag_cms_page` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `code` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
        `enabled` tinyint(1) NOT NULL,
        `created_at` datetime DEFAULT NULL,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_18F07F1B77153098` (`code`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `bitbag_cms_page`
        --

        LOCK TABLES `bitbag_cms_page` WRITE;
        /*!40000 ALTER TABLE `bitbag_cms_page` DISABLE KEYS */;
        /*!40000 ALTER TABLE `bitbag_cms_page` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `bitbag_cms_page_channels`
        --

        DROP TABLE IF EXISTS `bitbag_cms_page_channels`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `bitbag_cms_page_channels` (
        `page_id` int(11) NOT NULL,
        `channel_id` int(11) NOT NULL,
        PRIMARY KEY (`page_id`,`channel_id`),
        KEY `IDX_DCA4269C4663E4` (`page_id`),
        KEY `IDX_DCA426972F5A1AA` (`channel_id`),
        CONSTRAINT `FK_DCA426972F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_DCA4269C4663E4` FOREIGN KEY (`page_id`) REFERENCES `bitbag_cms_page` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `bitbag_cms_page_channels`
        --

        LOCK TABLES `bitbag_cms_page_channels` WRITE;
        /*!40000 ALTER TABLE `bitbag_cms_page_channels` DISABLE KEYS */;
        /*!40000 ALTER TABLE `bitbag_cms_page_channels` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `bitbag_cms_page_image`
        --

        DROP TABLE IF EXISTS `bitbag_cms_page_image`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `bitbag_cms_page_image` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `owner_id` int(11) DEFAULT NULL,
        `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_C9C589EA7E3C61F9` (`owner_id`),
        CONSTRAINT `FK_C9C589EA7E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `bitbag_cms_page_translation` (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `bitbag_cms_page_image`
        --

        LOCK TABLES `bitbag_cms_page_image` WRITE;
        /*!40000 ALTER TABLE `bitbag_cms_page_image` DISABLE KEYS */;
        /*!40000 ALTER TABLE `bitbag_cms_page_image` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `bitbag_cms_page_products`
        --

        DROP TABLE IF EXISTS `bitbag_cms_page_products`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `bitbag_cms_page_products` (
        `page_id` int(11) NOT NULL,
        `product_id` int(11) NOT NULL,
        PRIMARY KEY (`page_id`,`product_id`),
        KEY `IDX_4D64FA85C4663E4` (`page_id`),
        KEY `IDX_4D64FA854584665A` (`product_id`),
        CONSTRAINT `FK_4D64FA854584665A` FOREIGN KEY (`product_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_4D64FA85C4663E4` FOREIGN KEY (`page_id`) REFERENCES `bitbag_cms_page` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `bitbag_cms_page_products`
        --

        LOCK TABLES `bitbag_cms_page_products` WRITE;
        /*!40000 ALTER TABLE `bitbag_cms_page_products` DISABLE KEYS */;
        /*!40000 ALTER TABLE `bitbag_cms_page_products` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `bitbag_cms_page_sections`
        --

        DROP TABLE IF EXISTS `bitbag_cms_page_sections`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `bitbag_cms_page_sections` (
        `block_id` int(11) NOT NULL,
        `section_id` int(11) NOT NULL,
        PRIMARY KEY (`block_id`,`section_id`),
        KEY `IDX_D548E347E9ED820C` (`block_id`),
        KEY `IDX_D548E347D823E37A` (`section_id`),
        CONSTRAINT `FK_D548E347D823E37A` FOREIGN KEY (`section_id`) REFERENCES `bitbag_cms_section` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_D548E347E9ED820C` FOREIGN KEY (`block_id`) REFERENCES `bitbag_cms_page` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `bitbag_cms_page_sections`
        --

        LOCK TABLES `bitbag_cms_page_sections` WRITE;
        /*!40000 ALTER TABLE `bitbag_cms_page_sections` DISABLE KEYS */;
        /*!40000 ALTER TABLE `bitbag_cms_page_sections` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `bitbag_cms_page_translation`
        --

        DROP TABLE IF EXISTS `bitbag_cms_page_translation`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `bitbag_cms_page_translation` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `translatable_id` int(11) NOT NULL,
        `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `breadcrumb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `name_when_linked` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `description_when_linked` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
        `meta_keywords` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
        `meta_description` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
        `content` longtext COLLATE utf8_unicode_ci,
        `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `bitbag_cms_page_translation_uniq_trans` (`translatable_id`,`locale`),
        KEY `IDX_FDD074A62C2AC5D3` (`translatable_id`),
        CONSTRAINT `FK_FDD074A62C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `bitbag_cms_page` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `bitbag_cms_page_translation`
        --

        LOCK TABLES `bitbag_cms_page_translation` WRITE;
        /*!40000 ALTER TABLE `bitbag_cms_page_translation` DISABLE KEYS */;
        /*!40000 ALTER TABLE `bitbag_cms_page_translation` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `bitbag_cms_section`
        --

        DROP TABLE IF EXISTS `bitbag_cms_section`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `bitbag_cms_section` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `code` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_421D079777153098` (`code`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `bitbag_cms_section`
        --

        LOCK TABLES `bitbag_cms_section` WRITE;
        /*!40000 ALTER TABLE `bitbag_cms_section` DISABLE KEYS */;
        /*!40000 ALTER TABLE `bitbag_cms_section` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `bitbag_cms_section_translation`
        --

        DROP TABLE IF EXISTS `bitbag_cms_section_translation`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `bitbag_cms_section_translation` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `translatable_id` int(11) NOT NULL,
        `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `bitbag_cms_section_translation_uniq_trans` (`translatable_id`,`locale`),
        KEY `IDX_F99CA8582C2AC5D3` (`translatable_id`),
        CONSTRAINT `FK_F99CA8582C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `bitbag_cms_section` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `bitbag_cms_section_translation`
        --

        LOCK TABLES `bitbag_cms_section_translation` WRITE;
        /*!40000 ALTER TABLE `bitbag_cms_section_translation` DISABLE KEYS */;
        /*!40000 ALTER TABLE `bitbag_cms_section_translation` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `brille24_channel_special_pricing`
        --

        DROP TABLE IF EXISTS `brille24_channel_special_pricing`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `brille24_channel_special_pricing` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `product_variant_id` int(11) NOT NULL,
        `price` int(11) NOT NULL,
        `channelCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `startsAt` datetime DEFAULT NULL,
        `endsAt` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        KEY `IDX_1FF2651CA80EF684` (`product_variant_id`),
        CONSTRAINT `FK_1FF2651CA80EF684` FOREIGN KEY (`product_variant_id`) REFERENCES `sylius_product_variant` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `brille24_channel_special_pricing`
        --

        LOCK TABLES `brille24_channel_special_pricing` WRITE;
        /*!40000 ALTER TABLE `brille24_channel_special_pricing` DISABLE KEYS */;
        /*!40000 ALTER TABLE `brille24_channel_special_pricing` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `migration_versions`
        --

        DROP TABLE IF EXISTS `migration_versions`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `migration_versions` (
        `version` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
        `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
        PRIMARY KEY (`version`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `migration_versions`
        --

        LOCK TABLES `migration_versions` WRITE;
        /*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
        /*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_address`
        --

        DROP TABLE IF EXISTS `sylius_address`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_address` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `customer_id` int(11) DEFAULT NULL,
        `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `postcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        `country_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `province_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `province_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        PRIMARY KEY (`id`),
        KEY `IDX_B97FF0589395C3F3` (`customer_id`),
        CONSTRAINT `FK_B97FF0589395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `sylius_customer` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_address`
        --

        LOCK TABLES `sylius_address` WRITE;
        /*!40000 ALTER TABLE `sylius_address` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_address` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_address_log_entries`
        --

        DROP TABLE IF EXISTS `sylius_address_log_entries`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_address_log_entries` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `logged_at` datetime NOT NULL,
        `object_id` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
        `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `version` int(11) NOT NULL,
        `data` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
        `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_address_log_entries`
        --

        LOCK TABLES `sylius_address_log_entries` WRITE;
        /*!40000 ALTER TABLE `sylius_address_log_entries` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_address_log_entries` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_adjustment`
        --

        DROP TABLE IF EXISTS `sylius_adjustment`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_adjustment` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `order_id` int(11) DEFAULT NULL,
        `order_item_id` int(11) DEFAULT NULL,
        `order_item_unit_id` int(11) DEFAULT NULL,
        `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `amount` int(11) NOT NULL,
        `is_neutral` tinyint(1) NOT NULL,
        `is_locked` tinyint(1) NOT NULL,
        `origin_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        KEY `IDX_ACA6E0F28D9F6D38` (`order_id`),
        KEY `IDX_ACA6E0F2E415FB15` (`order_item_id`),
        KEY `IDX_ACA6E0F2F720C233` (`order_item_unit_id`),
        CONSTRAINT `FK_ACA6E0F28D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `sylius_order` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_ACA6E0F2E415FB15` FOREIGN KEY (`order_item_id`) REFERENCES `sylius_order_item` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_ACA6E0F2F720C233` FOREIGN KEY (`order_item_unit_id`) REFERENCES `sylius_order_item_unit` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_adjustment`
        --

        LOCK TABLES `sylius_adjustment` WRITE;
        /*!40000 ALTER TABLE `sylius_adjustment` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_adjustment` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_admin_api_access_token`
        --

        DROP TABLE IF EXISTS `sylius_admin_api_access_token`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_admin_api_access_token` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `client_id` int(11) DEFAULT NULL,
        `user_id` int(11) DEFAULT NULL,
        `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `expires_at` int(11) DEFAULT NULL,
        `scope` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_2AA4915D5F37A13B` (`token`),
        KEY `IDX_2AA4915D19EB6921` (`client_id`),
        KEY `IDX_2AA4915DA76ED395` (`user_id`),
        CONSTRAINT `FK_2AA4915D19EB6921` FOREIGN KEY (`client_id`) REFERENCES `sylius_admin_api_client` (`id`),
        CONSTRAINT `FK_2AA4915DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `sylius_admin_user` (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_admin_api_access_token`
        --

        LOCK TABLES `sylius_admin_api_access_token` WRITE;
        /*!40000 ALTER TABLE `sylius_admin_api_access_token` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_admin_api_access_token` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_admin_api_auth_code`
        --

        DROP TABLE IF EXISTS `sylius_admin_api_auth_code`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_admin_api_auth_code` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `client_id` int(11) DEFAULT NULL,
        `user_id` int(11) DEFAULT NULL,
        `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `redirect_uri` longtext COLLATE utf8_unicode_ci NOT NULL,
        `expires_at` int(11) DEFAULT NULL,
        `scope` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_E366D8485F37A13B` (`token`),
        KEY `IDX_E366D84819EB6921` (`client_id`),
        KEY `IDX_E366D848A76ED395` (`user_id`),
        CONSTRAINT `FK_E366D84819EB6921` FOREIGN KEY (`client_id`) REFERENCES `sylius_admin_api_client` (`id`),
        CONSTRAINT `FK_E366D848A76ED395` FOREIGN KEY (`user_id`) REFERENCES `sylius_admin_user` (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_admin_api_auth_code`
        --

        LOCK TABLES `sylius_admin_api_auth_code` WRITE;
        /*!40000 ALTER TABLE `sylius_admin_api_auth_code` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_admin_api_auth_code` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_admin_api_client`
        --

        DROP TABLE IF EXISTS `sylius_admin_api_client`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_admin_api_client` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `random_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `redirect_uris` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
        `secret` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `allowed_grant_types` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_admin_api_client`
        --

        LOCK TABLES `sylius_admin_api_client` WRITE;
        /*!40000 ALTER TABLE `sylius_admin_api_client` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_admin_api_client` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_admin_api_refresh_token`
        --

        DROP TABLE IF EXISTS `sylius_admin_api_refresh_token`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_admin_api_refresh_token` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `client_id` int(11) DEFAULT NULL,
        `user_id` int(11) DEFAULT NULL,
        `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `expires_at` int(11) DEFAULT NULL,
        `scope` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_9160E3FA5F37A13B` (`token`),
        KEY `IDX_9160E3FA19EB6921` (`client_id`),
        KEY `IDX_9160E3FAA76ED395` (`user_id`),
        CONSTRAINT `FK_9160E3FA19EB6921` FOREIGN KEY (`client_id`) REFERENCES `sylius_admin_api_client` (`id`),
        CONSTRAINT `FK_9160E3FAA76ED395` FOREIGN KEY (`user_id`) REFERENCES `sylius_admin_user` (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_admin_api_refresh_token`
        --

        LOCK TABLES `sylius_admin_api_refresh_token` WRITE;
        /*!40000 ALTER TABLE `sylius_admin_api_refresh_token` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_admin_api_refresh_token` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_admin_user`
        --

        DROP TABLE IF EXISTS `sylius_admin_user`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_admin_user` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `username_canonical` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `enabled` tinyint(1) NOT NULL,
        `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `encoder_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `last_login` datetime DEFAULT NULL,
        `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `password_requested_at` datetime DEFAULT NULL,
        `email_verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `verified_at` datetime DEFAULT NULL,
        `locked` tinyint(1) NOT NULL,
        `expires_at` datetime DEFAULT NULL,
        `credentials_expire_at` datetime DEFAULT NULL,
        `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
        `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `email_canonical` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `locale_code` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_admin_user`
        --

        LOCK TABLES `sylius_admin_user` WRITE;
        /*!40000 ALTER TABLE `sylius_admin_user` DISABLE KEYS */;
        INSERT INTO `sylius_admin_user` VALUES (1,'sylius','sylius',1,'6b6av1ow4hwk80o0ww80cgc08ckcsos','\$argon2i\$v=19\$m=65536,t=4,p=1\$QS9FcThzSHdJckFaUFR5NQ\$M+r1/yMYWH+aUbHwUY8m2BhMRFbbmr6jZF+8o7M/bZU','argon2i','2020-03-15 09:27:41',NULL,NULL,NULL,NULL,0,NULL,NULL,'a:1:{i:0;s:26:\"ROLE_ADMINISTRATION_ACCESS\";}','sylius@example.com','sylius@example.com','2020-03-10 01:13:41','2020-03-15 09:27:41','John','Doe','en'),(2,'api','api',1,'96utapx7z5csko0occ8gwwg840o4sw0','\$argon2i\$v=19\$m=65536,t=4,p=1\$UDRsWExjTm1jTksubHc1Sw\$em6YVlZRECViKMK9yHU5REI7lpUmYqIk0PksI+GPfZU','argon2i',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,'a:2:{i:0;s:26:\"ROLE_ADMINISTRATION_ACCESS\";i:1;s:15:\"ROLE_API_ACCESS\";}','api@example.com','api@example.com','2020-03-10 01:13:42','2020-03-10 01:13:42','Luke','Brushwood','en');
        /*!40000 ALTER TABLE `sylius_admin_user` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_avatar_image`
        --

        DROP TABLE IF EXISTS `sylius_avatar_image`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_avatar_image` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `owner_id` int(11) NOT NULL,
        `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_1068A3A97E3C61F9` (`owner_id`),
        CONSTRAINT `FK_1068A3A97E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `sylius_admin_user` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_avatar_image`
        --

        LOCK TABLES `sylius_avatar_image` WRITE;
        /*!40000 ALTER TABLE `sylius_avatar_image` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_avatar_image` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_channel`
        --

        DROP TABLE IF EXISTS `sylius_channel`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_channel` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `default_locale_id` int(11) NOT NULL,
        `base_currency_id` int(11) NOT NULL,
        `default_tax_zone_id` int(11) DEFAULT NULL,
        `menu_taxon_id` int(11) DEFAULT NULL,
        `shop_billing_data_id` int(11) DEFAULT NULL,
        `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `description` longtext COLLATE utf8_unicode_ci,
        `enabled` tinyint(1) NOT NULL,
        `hostname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        `theme_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `tax_calculation_strategy` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `contact_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `skipping_shipping_step_allowed` tinyint(1) NOT NULL,
        `skipping_payment_step_allowed` tinyint(1) NOT NULL,
        `account_verification_required` tinyint(1) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_16C8119E77153098` (`code`),
        UNIQUE KEY `UNIQ_16C8119EB5282EDF` (`shop_billing_data_id`),
        KEY `IDX_16C8119E743BF776` (`default_locale_id`),
        KEY `IDX_16C8119E3101778E` (`base_currency_id`),
        KEY `IDX_16C8119EA978C17` (`default_tax_zone_id`),
        KEY `IDX_16C8119EF242B1E6` (`menu_taxon_id`),
        KEY `IDX_16C8119EE551C011` (`hostname`),
        CONSTRAINT `FK_16C8119E3101778E` FOREIGN KEY (`base_currency_id`) REFERENCES `sylius_currency` (`id`),
        CONSTRAINT `FK_16C8119E743BF776` FOREIGN KEY (`default_locale_id`) REFERENCES `sylius_locale` (`id`),
        CONSTRAINT `FK_16C8119EA978C17` FOREIGN KEY (`default_tax_zone_id`) REFERENCES `sylius_zone` (`id`) ON DELETE SET NULL,
        CONSTRAINT `FK_16C8119EB5282EDF` FOREIGN KEY (`shop_billing_data_id`) REFERENCES `sylius_shop_billing_data` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_16C8119EF242B1E6` FOREIGN KEY (`menu_taxon_id`) REFERENCES `sylius_taxon` (`id`) ON DELETE SET NULL
        ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_channel`
        --

        LOCK TABLES `sylius_channel` WRITE;
        /*!40000 ALTER TABLE `sylius_channel` DISABLE KEYS */;
        INSERT INTO `sylius_channel` VALUES (1,1,1,6,NULL,1,'channel_plab_fr','PLAB FR','#10f10d',NULL,1,'localhost','2020-03-14 10:51:27','2020-03-15 09:15:26',NULL,'order_items_based','contact@plabbeauty.fr',0,0,0),(2,2,1,7,NULL,2,'channel_plab_gb','PLAB GB','#000000',NULL,1,'127.0.0.1','2020-03-14 11:04:14','2020-03-15 09:15:52',NULL,'order_items_based','contact@plabbeauty.com',0,0,0);
        /*!40000 ALTER TABLE `sylius_channel` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_channel_countries`
        --

        DROP TABLE IF EXISTS `sylius_channel_countries`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_channel_countries` (
        `channel_id` int(11) NOT NULL,
        `country_id` int(11) NOT NULL,
        PRIMARY KEY (`channel_id`,`country_id`),
        KEY `IDX_D96E51AE72F5A1AA` (`channel_id`),
        KEY `IDX_D96E51AEF92F3E70` (`country_id`),
        CONSTRAINT `FK_D96E51AE72F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_D96E51AEF92F3E70` FOREIGN KEY (`country_id`) REFERENCES `sylius_country` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_channel_countries`
        --

        LOCK TABLES `sylius_channel_countries` WRITE;
        /*!40000 ALTER TABLE `sylius_channel_countries` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_channel_countries` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_channel_currencies`
        --

        DROP TABLE IF EXISTS `sylius_channel_currencies`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_channel_currencies` (
        `channel_id` int(11) NOT NULL,
        `currency_id` int(11) NOT NULL,
        PRIMARY KEY (`channel_id`,`currency_id`),
        KEY `IDX_AE491F9372F5A1AA` (`channel_id`),
        KEY `IDX_AE491F9338248176` (`currency_id`),
        CONSTRAINT `FK_AE491F9338248176` FOREIGN KEY (`currency_id`) REFERENCES `sylius_currency` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_AE491F9372F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_channel_currencies`
        --

        LOCK TABLES `sylius_channel_currencies` WRITE;
        /*!40000 ALTER TABLE `sylius_channel_currencies` DISABLE KEYS */;
        INSERT INTO `sylius_channel_currencies` VALUES (1,1),(2,1);
        /*!40000 ALTER TABLE `sylius_channel_currencies` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_channel_locales`
        --

        DROP TABLE IF EXISTS `sylius_channel_locales`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_channel_locales` (
        `channel_id` int(11) NOT NULL,
        `locale_id` int(11) NOT NULL,
        PRIMARY KEY (`channel_id`,`locale_id`),
        KEY `IDX_786B7A8472F5A1AA` (`channel_id`),
        KEY `IDX_786B7A84E559DFD1` (`locale_id`),
        CONSTRAINT `FK_786B7A8472F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_786B7A84E559DFD1` FOREIGN KEY (`locale_id`) REFERENCES `sylius_locale` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_channel_locales`
        --

        LOCK TABLES `sylius_channel_locales` WRITE;
        /*!40000 ALTER TABLE `sylius_channel_locales` DISABLE KEYS */;
        INSERT INTO `sylius_channel_locales` VALUES (1,1),(2,2);
        /*!40000 ALTER TABLE `sylius_channel_locales` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_channel_pricing`
        --

        DROP TABLE IF EXISTS `sylius_channel_pricing`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_channel_pricing` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `product_variant_id` int(11) NOT NULL,
        `price` int(11) NOT NULL,
        `original_price` int(11) DEFAULT NULL,
        `channel_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `product_variant_channel_idx` (`product_variant_id`,`channel_code`),
        KEY `IDX_7801820CA80EF684` (`product_variant_id`),
        CONSTRAINT `FK_7801820CA80EF684` FOREIGN KEY (`product_variant_id`) REFERENCES `sylius_product_variant` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_channel_pricing`
        --

        LOCK TABLES `sylius_channel_pricing` WRITE;
        /*!40000 ALTER TABLE `sylius_channel_pricing` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_channel_pricing` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_country`
        --

        DROP TABLE IF EXISTS `sylius_country`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_country` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
        `enabled` tinyint(1) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_E74256BF77153098` (`code`),
        KEY `IDX_E74256BF77153098` (`code`)
        ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_country`
        --

        LOCK TABLES `sylius_country` WRITE;
        /*!40000 ALTER TABLE `sylius_country` DISABLE KEYS */;
        INSERT INTO `sylius_country` VALUES (1,'FR',1),(2,'BE',1),(3,'GB',1),(4,'MC',1);
        /*!40000 ALTER TABLE `sylius_country` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_currency`
        --

        DROP TABLE IF EXISTS `sylius_currency`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_currency` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_96EDD3D077153098` (`code`)
        ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_currency`
        --

        LOCK TABLES `sylius_currency` WRITE;
        /*!40000 ALTER TABLE `sylius_currency` DISABLE KEYS */;
        INSERT INTO `sylius_currency` VALUES (1,'EUR','2020-02-28 13:12:47','2020-02-28 13:12:47');
        /*!40000 ALTER TABLE `sylius_currency` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_customer`
        --

        DROP TABLE IF EXISTS `sylius_customer`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_customer` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `customer_group_id` int(11) DEFAULT NULL,
        `default_address_id` int(11) DEFAULT NULL,
        `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `birthday` datetime DEFAULT NULL,
        `gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'u',
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `subscribed_to_newsletter` tinyint(1) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_7E82D5E6E7927C74` (`email`),
        UNIQUE KEY `UNIQ_7E82D5E6A0D96FBF` (`email_canonical`),
        UNIQUE KEY `UNIQ_7E82D5E6BD94FB16` (`default_address_id`),
        KEY `IDX_7E82D5E6D2919A68` (`customer_group_id`),
        CONSTRAINT `FK_7E82D5E6BD94FB16` FOREIGN KEY (`default_address_id`) REFERENCES `sylius_address` (`id`) ON DELETE SET NULL,
        CONSTRAINT `FK_7E82D5E6D2919A68` FOREIGN KEY (`customer_group_id`) REFERENCES `sylius_customer_group` (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_customer`
        --

        LOCK TABLES `sylius_customer` WRITE;
        /*!40000 ALTER TABLE `sylius_customer` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_customer` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_customer_group`
        --

        DROP TABLE IF EXISTS `sylius_customer_group`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_customer_group` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_7FCF9B0577153098` (`code`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_customer_group`
        --

        LOCK TABLES `sylius_customer_group` WRITE;
        /*!40000 ALTER TABLE `sylius_customer_group` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_customer_group` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_exchange_rate`
        --

        DROP TABLE IF EXISTS `sylius_exchange_rate`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_exchange_rate` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `source_currency` int(11) NOT NULL,
        `target_currency` int(11) NOT NULL,
        `ratio` decimal(10,5) NOT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_5F52B852A76BEEDB3FD5856` (`source_currency`,`target_currency`),
        KEY `IDX_5F52B852A76BEED` (`source_currency`),
        KEY `IDX_5F52B85B3FD5856` (`target_currency`),
        CONSTRAINT `FK_5F52B852A76BEED` FOREIGN KEY (`source_currency`) REFERENCES `sylius_currency` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_5F52B85B3FD5856` FOREIGN KEY (`target_currency`) REFERENCES `sylius_currency` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_exchange_rate`
        --

        LOCK TABLES `sylius_exchange_rate` WRITE;
        /*!40000 ALTER TABLE `sylius_exchange_rate` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_exchange_rate` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_gateway_config`
        --

        DROP TABLE IF EXISTS `sylius_gateway_config`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_gateway_config` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `gateway_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `factory_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `config` json NOT NULL COMMENT '(DC2Type:json_array)',
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_gateway_config`
        --

        LOCK TABLES `sylius_gateway_config` WRITE;
        /*!40000 ALTER TABLE `sylius_gateway_config` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_gateway_config` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_locale`
        --

        DROP TABLE IF EXISTS `sylius_locale`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_locale` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `code` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_7BA1286477153098` (`code`)
        ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_locale`
        --

        LOCK TABLES `sylius_locale` WRITE;
        /*!40000 ALTER TABLE `sylius_locale` DISABLE KEYS */;
        INSERT INTO `sylius_locale` VALUES (1,'fr','2020-03-14 09:38:48','2020-03-14 09:38:49'),(2,'en','2020-03-14 09:38:58','2020-03-14 09:38:58');
        /*!40000 ALTER TABLE `sylius_locale` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_order`
        --

        DROP TABLE IF EXISTS `sylius_order`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_order` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `channel_id` int(11) DEFAULT NULL,
        `promotion_coupon_id` int(11) DEFAULT NULL,
        `customer_id` int(11) DEFAULT NULL,
        `shipping_address_id` int(11) DEFAULT NULL,
        `billing_address_id` int(11) DEFAULT NULL,
        `number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `notes` longtext COLLATE utf8_unicode_ci,
        `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `checkout_completed_at` datetime DEFAULT NULL,
        `items_total` int(11) NOT NULL,
        `adjustments_total` int(11) NOT NULL,
        `total` int(11) NOT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        `currency_code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
        `locale_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `checkout_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `payment_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `shipping_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `token_value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `customer_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_6196A1F996901F54` (`number`),
        UNIQUE KEY `UNIQ_6196A1F94D4CFF2B` (`shipping_address_id`),
        UNIQUE KEY `UNIQ_6196A1F979D0C0E4` (`billing_address_id`),
        KEY `IDX_6196A1F972F5A1AA` (`channel_id`),
        KEY `IDX_6196A1F917B24436` (`promotion_coupon_id`),
        KEY `IDX_6196A1F99395C3F3` (`customer_id`),
        KEY `IDX_6196A1F9A393D2FB43625D9F` (`state`,`updated_at`),
        CONSTRAINT `FK_6196A1F917B24436` FOREIGN KEY (`promotion_coupon_id`) REFERENCES `sylius_promotion_coupon` (`id`),
        CONSTRAINT `FK_6196A1F94D4CFF2B` FOREIGN KEY (`shipping_address_id`) REFERENCES `sylius_address` (`id`),
        CONSTRAINT `FK_6196A1F972F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`),
        CONSTRAINT `FK_6196A1F979D0C0E4` FOREIGN KEY (`billing_address_id`) REFERENCES `sylius_address` (`id`),
        CONSTRAINT `FK_6196A1F99395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `sylius_customer` (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_order`
        --

        LOCK TABLES `sylius_order` WRITE;
        /*!40000 ALTER TABLE `sylius_order` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_order` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_order_item`
        --

        DROP TABLE IF EXISTS `sylius_order_item`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_order_item` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `order_id` int(11) NOT NULL,
        `variant_id` int(11) NOT NULL,
        `quantity` int(11) NOT NULL,
        `unit_price` int(11) NOT NULL,
        `units_total` int(11) NOT NULL,
        `adjustments_total` int(11) NOT NULL,
        `total` int(11) NOT NULL,
        `is_immutable` tinyint(1) NOT NULL,
        `product_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `variant_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        PRIMARY KEY (`id`),
        KEY `IDX_77B587ED8D9F6D38` (`order_id`),
        KEY `IDX_77B587ED3B69A9AF` (`variant_id`),
        CONSTRAINT `FK_77B587ED3B69A9AF` FOREIGN KEY (`variant_id`) REFERENCES `sylius_product_variant` (`id`),
        CONSTRAINT `FK_77B587ED8D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `sylius_order` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_order_item`
        --

        LOCK TABLES `sylius_order_item` WRITE;
        /*!40000 ALTER TABLE `sylius_order_item` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_order_item` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_order_item_unit`
        --

        DROP TABLE IF EXISTS `sylius_order_item_unit`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_order_item_unit` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `order_item_id` int(11) NOT NULL,
        `shipment_id` int(11) DEFAULT NULL,
        `adjustments_total` int(11) NOT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        KEY `IDX_82BF226EE415FB15` (`order_item_id`),
        KEY `IDX_82BF226E7BE036FC` (`shipment_id`),
        CONSTRAINT `FK_82BF226E7BE036FC` FOREIGN KEY (`shipment_id`) REFERENCES `sylius_shipment` (`id`) ON DELETE SET NULL,
        CONSTRAINT `FK_82BF226EE415FB15` FOREIGN KEY (`order_item_id`) REFERENCES `sylius_order_item` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_order_item_unit`
        --

        LOCK TABLES `sylius_order_item_unit` WRITE;
        /*!40000 ALTER TABLE `sylius_order_item_unit` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_order_item_unit` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_order_sequence`
        --

        DROP TABLE IF EXISTS `sylius_order_sequence`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_order_sequence` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `idx` int(11) NOT NULL,
        `version` int(11) NOT NULL DEFAULT '1',
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_order_sequence`
        --

        LOCK TABLES `sylius_order_sequence` WRITE;
        /*!40000 ALTER TABLE `sylius_order_sequence` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_order_sequence` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_payment`
        --

        DROP TABLE IF EXISTS `sylius_payment`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_payment` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `method_id` int(11) DEFAULT NULL,
        `order_id` int(11) NOT NULL,
        `currency_code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
        `amount` int(11) NOT NULL,
        `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `details` json NOT NULL COMMENT '(DC2Type:json_array)',
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        KEY `IDX_D9191BD419883967` (`method_id`),
        KEY `IDX_D9191BD48D9F6D38` (`order_id`),
        CONSTRAINT `FK_D9191BD419883967` FOREIGN KEY (`method_id`) REFERENCES `sylius_payment_method` (`id`),
        CONSTRAINT `FK_D9191BD48D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `sylius_order` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_payment`
        --

        LOCK TABLES `sylius_payment` WRITE;
        /*!40000 ALTER TABLE `sylius_payment` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_payment` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_payment_method`
        --

        DROP TABLE IF EXISTS `sylius_payment_method`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_payment_method` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `gateway_config_id` int(11) DEFAULT NULL,
        `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `environment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `is_enabled` tinyint(1) NOT NULL,
        `position` int(11) NOT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_A75B0B0D77153098` (`code`),
        KEY `IDX_A75B0B0DF23D6140` (`gateway_config_id`),
        CONSTRAINT `FK_A75B0B0DF23D6140` FOREIGN KEY (`gateway_config_id`) REFERENCES `sylius_gateway_config` (`id`) ON DELETE SET NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_payment_method`
        --

        LOCK TABLES `sylius_payment_method` WRITE;
        /*!40000 ALTER TABLE `sylius_payment_method` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_payment_method` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_payment_method_channels`
        --

        DROP TABLE IF EXISTS `sylius_payment_method_channels`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_payment_method_channels` (
        `payment_method_id` int(11) NOT NULL,
        `channel_id` int(11) NOT NULL,
        PRIMARY KEY (`payment_method_id`,`channel_id`),
        KEY `IDX_543AC0CC5AA1164F` (`payment_method_id`),
        KEY `IDX_543AC0CC72F5A1AA` (`channel_id`),
        CONSTRAINT `FK_543AC0CC5AA1164F` FOREIGN KEY (`payment_method_id`) REFERENCES `sylius_payment_method` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_543AC0CC72F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_payment_method_channels`
        --

        LOCK TABLES `sylius_payment_method_channels` WRITE;
        /*!40000 ALTER TABLE `sylius_payment_method_channels` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_payment_method_channels` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_payment_method_translation`
        --

        DROP TABLE IF EXISTS `sylius_payment_method_translation`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_payment_method_translation` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `translatable_id` int(11) NOT NULL,
        `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `description` longtext COLLATE utf8_unicode_ci,
        `instructions` longtext COLLATE utf8_unicode_ci,
        `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `sylius_payment_method_translation_uniq_trans` (`translatable_id`,`locale`),
        KEY `IDX_966BE3A12C2AC5D3` (`translatable_id`),
        CONSTRAINT `FK_966BE3A12C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `sylius_payment_method` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_payment_method_translation`
        --

        LOCK TABLES `sylius_payment_method_translation` WRITE;
        /*!40000 ALTER TABLE `sylius_payment_method_translation` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_payment_method_translation` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_payment_security_token`
        --

        DROP TABLE IF EXISTS `sylius_payment_security_token`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_payment_security_token` (
        `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `details` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:object)',
        `after_url` longtext COLLATE utf8_unicode_ci,
        `target_url` longtext COLLATE utf8_unicode_ci NOT NULL,
        `gateway_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`hash`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_payment_security_token`
        --

        LOCK TABLES `sylius_payment_security_token` WRITE;
        /*!40000 ALTER TABLE `sylius_payment_security_token` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_payment_security_token` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_product`
        --

        DROP TABLE IF EXISTS `sylius_product`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_product` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `main_taxon_id` int(11) DEFAULT NULL,
        `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        `enabled` tinyint(1) NOT NULL,
        `variant_selection_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `average_rating` double NOT NULL DEFAULT '0',
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_677B9B7477153098` (`code`),
        KEY `IDX_677B9B74731E505` (`main_taxon_id`),
        CONSTRAINT `FK_677B9B74731E505` FOREIGN KEY (`main_taxon_id`) REFERENCES `sylius_taxon` (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_product`
        --

        LOCK TABLES `sylius_product` WRITE;
        /*!40000 ALTER TABLE `sylius_product` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_product` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_product_association`
        --

        DROP TABLE IF EXISTS `sylius_product_association`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_product_association` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `association_type_id` int(11) NOT NULL,
        `product_id` int(11) NOT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `product_association_idx` (`product_id`,`association_type_id`),
        KEY `IDX_48E9CDABB1E1C39` (`association_type_id`),
        KEY `IDX_48E9CDAB4584665A` (`product_id`),
        CONSTRAINT `FK_48E9CDAB4584665A` FOREIGN KEY (`product_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_48E9CDABB1E1C39` FOREIGN KEY (`association_type_id`) REFERENCES `sylius_product_association_type` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_product_association`
        --

        LOCK TABLES `sylius_product_association` WRITE;
        /*!40000 ALTER TABLE `sylius_product_association` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_product_association` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_product_association_product`
        --

        DROP TABLE IF EXISTS `sylius_product_association_product`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_product_association_product` (
        `association_id` int(11) NOT NULL,
        `product_id` int(11) NOT NULL,
        PRIMARY KEY (`association_id`,`product_id`),
        KEY `IDX_A427B983EFB9C8A5` (`association_id`),
        KEY `IDX_A427B9834584665A` (`product_id`),
        CONSTRAINT `FK_A427B9834584665A` FOREIGN KEY (`product_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_A427B983EFB9C8A5` FOREIGN KEY (`association_id`) REFERENCES `sylius_product_association` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_product_association_product`
        --

        LOCK TABLES `sylius_product_association_product` WRITE;
        /*!40000 ALTER TABLE `sylius_product_association_product` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_product_association_product` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_product_association_type`
        --

        DROP TABLE IF EXISTS `sylius_product_association_type`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_product_association_type` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_CCB8914C77153098` (`code`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_product_association_type`
        --

        LOCK TABLES `sylius_product_association_type` WRITE;
        /*!40000 ALTER TABLE `sylius_product_association_type` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_product_association_type` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_product_association_type_translation`
        --

        DROP TABLE IF EXISTS `sylius_product_association_type_translation`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_product_association_type_translation` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `translatable_id` int(11) NOT NULL,
        `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `sylius_product_association_type_translation_uniq_trans` (`translatable_id`,`locale`),
        KEY `IDX_4F618E52C2AC5D3` (`translatable_id`),
        CONSTRAINT `FK_4F618E52C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `sylius_product_association_type` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_product_association_type_translation`
        --

        LOCK TABLES `sylius_product_association_type_translation` WRITE;
        /*!40000 ALTER TABLE `sylius_product_association_type_translation` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_product_association_type_translation` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_product_attribute`
        --

        DROP TABLE IF EXISTS `sylius_product_attribute`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_product_attribute` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `storage_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `configuration` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        `position` int(11) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_BFAF484A77153098` (`code`)
        ) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_product_attribute`
        --

        LOCK TABLES `sylius_product_attribute` WRITE;
        /*!40000 ALTER TABLE `sylius_product_attribute` DISABLE KEYS */;
        INSERT INTO `sylius_product_attribute` VALUES (1,'capacity','text','text','a:2:{s:3:\"min\";N;s:3:\"max\";N;}','2020-03-14 13:28:29','2020-03-14 13:28:29',0),(2,'naturalness','percent','float','a:0:{}','2020-03-14 13:35:19','2020-03-14 13:35:19',1),(3,'benefits','select','json','a:4:{s:7:\"choices\";a:0:{}s:8:\"multiple\";b:1;s:3:\"min\";N;s:3:\"max\";d:3;}','2020-03-14 13:42:08','2020-03-14 13:42:08',2),(4,'tags','select','json','a:4:{s:7:\"choices\";a:0:{}s:8:\"multiple\";b:1;s:3:\"min\";N;s:3:\"max\";N;}','2020-03-14 13:46:57','2020-03-14 13:46:57',3),(5,'manual','textarea','text','a:0:{}','2020-03-14 13:51:46','2020-03-14 13:51:46',4),(6,'yuka_rating','integer','integer','a:0:{}','2020-03-14 13:53:39','2020-03-14 13:53:39',5),(7,'inci','textarea','text','a:0:{}','2020-03-14 13:54:31','2020-03-14 13:54:31',6),(8,'concerns','select','json','a:4:{s:7:\"choices\";a:29:{s:36:\"4d64cfa8-65fc-11ea-bcd7-0242ac120004\";a:1:{s:2:\"fr\";s:5:\"Acné\";}s:36:\"4d64f226-65fc-11ea-a051-0242ac120004\";a:1:{s:2:\"fr\";s:16:\"Anti - pollution\";}s:36:\"4d64f91a-65fc-11ea-8aa7-0242ac120004\";a:1:{s:2:\"fr\";s:23:\"Apaiser le cuir chevelu\";}s:36:\"4d64ffc8-65fc-11ea-98bd-0242ac120004\";a:1:{s:2:\"fr\";s:26:\"Brillance & Pores dilatés\";}s:36:\"4d65064e-65fc-11ea-b6ad-0242ac120004\";a:1:{s:2:\"fr\";s:22:\"Cellulite & vergetures\";}s:36:\"4d650cde-65fc-11ea-8377-0242ac120004\";a:1:{s:2:\"fr\";s:15:\"Cernes & Poches\";}s:36:\"4d651364-65fc-11ea-9522-0242ac120004\";a:1:{s:2:\"fr\";s:22:\"Donner de la brillance\";}s:36:\"4d651a12-65fc-11ea-baef-0242ac120004\";a:1:{s:2:\"fr\";s:16:\"Donner du volume\";}s:36:\"4d652070-65fc-11ea-b514-0242ac120004\";a:1:{s:2:\"fr\";s:15:\"Déshydratation\";}s:36:\"4d6526e2-65fc-11ea-9cbc-0242ac120004\";a:1:{s:2:\"fr\";s:29:\"Déshydratation & Sécheresse\";}s:36:\"4d652d40-65fc-11ea-86f7-0242ac120004\";a:1:{s:2:\"fr\";s:28:\"Imperfections & Points noirs\";}s:36:\"4d65339e-65fc-11ea-9dcd-0242ac120004\";a:1:{s:2:\"fr\";s:27:\"Peaux réactives & Rougeurs\";}s:36:\"4d6539e8-65fc-11ea-bdfc-0242ac120004\";a:1:{s:2:\"fr\";s:18:\"Protection Solaire\";}s:36:\"4d654046-65fc-11ea-a4c0-0242ac120004\";a:1:{s:2:\"fr\";s:8:\"Purifier\";}s:36:\"4d65469a-65fc-11ea-9204-0242ac120004\";a:1:{s:2:\"fr\";s:5:\"Rides\";}s:36:\"4d654cee-65fc-11ea-b85f-0242ac120004\";a:1:{s:2:\"fr\";s:18:\"Réparer & Nourrir\";}s:36:\"4d655342-65fc-11ea-8b4a-0242ac120004\";a:1:{s:2:\"fr\";s:11:\"Sécheresse\";}s:36:\"4d655996-65fc-11ea-8e9f-0242ac120004\";a:1:{s:2:\"fr\";s:31:\"Teint terne & Manque d’éclat\";}s:36:\"4d655fe0-65fc-11ea-aaa5-0242ac120004\";a:1:{s:2:\"fr\";s:20:\"Tâches pigmentaires\";}s:36:\"4d656634-65fc-11ea-bb4b-0242ac120004\";a:1:{s:2:\"fr\";s:16:\"Cernes et poches\";}s:36:\"4d656ce2-65fc-11ea-b2c8-0242ac120004\";a:1:{s:2:\"fr\";s:5:\"Eclat\";}s:36:\"4d657340-65fc-11ea-a3c6-0242ac120004\";a:1:{s:2:\"fr\";s:26:\"Brillance et imperfections\";}s:36:\"4d657a2a-65fc-11ea-b884-0242ac120004\";a:1:{s:2:\"fr\";s:16:\"Unifier le teint\";}s:36:\"4d65845c-65fc-11ea-80da-0242ac120004\";a:1:{s:2:\"fr\";s:16:\"Matifier la peau\";}s:36:\"4d658bfa-65fc-11ea-8865-0242ac120004\";a:1:{s:2:\"fr\";s:18:\"Illuminer le teint\";}s:36:\"4d6592b2-65fc-11ea-a188-0242ac120004\";a:1:{s:2:\"fr\";s:20:\"Embellir les lèvres\";}s:36:\"4d65991a-65fc-11ea-9441-0242ac120004\";a:1:{s:2:\"fr\";s:19:\"Magnifier le regard\";}s:36:\"4d659f78-65fc-11ea-a03f-0242ac120004\";a:1:{s:2:\"fr\";s:20:\"Intensifier les cils\";}s:36:\"4d65a5cc-65fc-11ea-890a-0242ac120004\";a:1:{s:2:\"fr\";s:23:\"Redessiner les sourcils\";}}s:8:\"multiple\";b:1;s:3:\"min\";N;s:3:\"max\";N;}','2020-03-14 14:01:29','2020-03-14 14:01:29',7),(9,'skin_type','select','json','a:4:{s:7:\"choices\";a:4:{s:36:\"dd62be62-65fc-11ea-ab0b-0242ac120004\";a:1:{s:2:\"fr\";s:10:\"Peau mixte\";}s:36:\"dd62c786-65fc-11ea-9ac0-0242ac120004\";a:1:{s:2:\"fr\";s:12:\"Peau normale\";}s:36:\"dd62d19a-65fc-11ea-aac1-0242ac120004\";a:1:{s:2:\"fr\";s:11:\"Peau sèche\";}s:36:\"dd62d884-65fc-11ea-bc76-0242ac120004\";a:1:{s:2:\"fr\";s:12:\"Peaux grasse\";}}s:8:\"multiple\";b:1;s:3:\"min\";N;s:3:\"max\";N;}','2020-03-14 14:05:30','2020-03-14 14:05:30',8),(10,'skin_color','select','json','a:4:{s:7:\"choices\";a:5:{s:36:\"9d9ba554-65fd-11ea-9dc1-0242ac120004\";a:1:{s:2:\"fr\";s:11:\"Très clair\";}s:36:\"9d9bae00-65fd-11ea-8079-0242ac120004\";a:1:{s:2:\"fr\";s:5:\"Clair\";}s:36:\"9d9bb4d6-65fd-11ea-b365-0242ac120004\";a:1:{s:2:\"fr\";s:6:\"Medium\";}s:36:\"9d9bbb7a-65fd-11ea-9ed0-0242ac120004\";a:1:{s:2:\"fr\";s:4:\"Mate\";}s:36:\"9d9bc200-65fd-11ea-a43d-0242ac120004\";a:1:{s:2:\"fr\";s:7:\"Foncée\";}}s:8:\"multiple\";b:1;s:3:\"min\";N;s:3:\"max\";N;}','2020-03-14 14:10:53','2020-03-14 14:10:53',9),(11,'texture','select','json','a:4:{s:7:\"choices\";a:7:{s:36:\"0e4467e6-65fe-11ea-a5c6-0242ac120004\";a:1:{s:2:\"fr\";s:5:\"Baume\";}s:36:\"0e447146-65fe-11ea-82be-0242ac120004\";a:1:{s:2:\"fr\";s:17:\"Crème & Emulsion\";}s:36:\"0e44789e-65fe-11ea-b170-0242ac120004\";a:1:{s:2:\"fr\";s:3:\"Gel\";}s:36:\"0e447f74-65fe-11ea-ae06-0242ac120004\";a:1:{s:2:\"fr\";s:5:\"Huile\";}s:36:\"0e448622-65fe-11ea-8f54-0242ac120004\";a:1:{s:2:\"fr\";s:6:\"Lotion\";}s:36:\"0e448cb2-65fe-11ea-b0d4-0242ac120004\";a:1:{s:2:\"fr\";s:6:\"Mousse\";}s:36:\"0e449388-65fe-11ea-b2e9-0242ac120004\";a:1:{s:2:\"fr\";s:5:\"Spray\";}}s:8:\"multiple\";b:1;s:3:\"min\";N;s:3:\"max\";N;}','2020-03-14 14:14:02','2020-03-14 14:14:02',10),(12,'hair_type','select','json','a:4:{s:7:\"choices\";a:4:{s:36:\"4a6473ba-65fe-11ea-b83a-0242ac120004\";a:1:{s:2:\"fr\";s:7:\"Bouclé\";}s:36:\"4a647c70-65fe-11ea-b7ca-0242ac120004\";a:1:{s:2:\"fr\";s:6:\"Crépu\";}s:36:\"4a648378-65fe-11ea-8f5e-0242ac120004\";a:1:{s:2:\"fr\";s:5:\"Lisse\";}s:36:\"4a648a3a-65fe-11ea-9f42-0242ac120004\";a:1:{s:2:\"fr\";s:7:\"Ondulé\";}}s:8:\"multiple\";b:1;s:3:\"min\";N;s:3:\"max\";N;}','2020-03-14 14:15:43','2020-03-14 14:15:43',11),(13,'ingredients','select','json','a:4:{s:7:\"choices\";a:151:{s:36:\"3b9e5a3e-65ff-11ea-81bb-0242ac120004\";a:1:{s:2:\"fr\";s:8:\"ALGO 4®\";}s:36:\"3b9e633a-65ff-11ea-9b4a-0242ac120004\";a:1:{s:2:\"fr\";s:24:\"Acides alpha-hydroxylés\";}s:36:\"3b9e6a42-65ff-11ea-ae27-0242ac120004\";a:1:{s:2:\"fr\";s:17:\"Acide boswellique\";}s:36:\"3b9e7118-65ff-11ea-b648-0242ac120004\";a:1:{s:2:\"fr\";s:15:\"Acide de fruits\";}s:36:\"3b9e77d0-65ff-11ea-ad91-0242ac120004\";a:1:{s:2:\"fr\";s:16:\"Acide glycolique\";}s:36:\"3b9e7ece-65ff-11ea-8579-0242ac120004\";a:1:{s:2:\"fr\";s:18:\"Acide hyaluronique\";}s:36:\"3b9e85e0-65ff-11ea-b9ab-0242ac120004\";a:1:{s:2:\"fr\";s:9:\"Agar-agar\";}s:36:\"3b9e8c98-65ff-11ea-812c-0242ac120004\";a:1:{s:2:\"fr\";s:5:\"Ajonc\";}s:36:\"3b9e9328-65ff-11ea-b8c0-0242ac120004\";a:1:{s:2:\"fr\";s:17:\"Akènes de fraise\";}s:36:\"3b9e99cc-65ff-11ea-9a7c-0242ac120004\";a:1:{s:2:\"fr\";s:13:\"Algues brunes\";}s:36:\"3b9ea052-65ff-11ea-8e3b-0242ac120004\";a:1:{s:2:\"fr\";s:14:\"Algues marines\";}s:36:\"3b9ea6e2-65ff-11ea-a675-0242ac120004\";a:1:{s:2:\"fr\";s:11:\"Allantoïne\";}s:36:\"3b9ead68-65ff-11ea-acd2-0242ac120004\";a:1:{s:2:\"fr\";s:10:\"Aloé Vera\";}s:36:\"3b9eb3ee-65ff-11ea-ba1a-0242ac120004\";a:1:{s:2:\"fr\";s:5:\"Ambre\";}s:36:\"3b9eba6a-65ff-11ea-8739-0242ac120004\";a:1:{s:2:\"fr\";s:14:\"Argile blanche\";}s:36:\"3b9ec0f0-65ff-11ea-b90e-0242ac120004\";a:1:{s:2:\"fr\";s:6:\"Arnica\";}s:36:\"3b9ec776-65ff-11ea-bea0-0242ac120004\";a:1:{s:2:\"fr\";s:13:\"Baie d\'açaï\";}s:36:\"3b9ecdf2-65ff-11ea-ac2d-0242ac120004\";a:1:{s:2:\"fr\";s:9:\"Bergamote\";}s:36:\"3b9ed4b4-65ff-11ea-8ce0-0242ac120004\";a:1:{s:2:\"fr\";s:17:\"Beurre de Babassu\";}s:36:\"3b9edb3a-65ff-11ea-a46a-0242ac120004\";a:1:{s:2:\"fr\";s:18:\"Beurre de Cupuaçu\";}s:36:\"3b9ee1ac-65ff-11ea-861f-0242ac120004\";a:1:{s:2:\"fr\";s:17:\"Beurre de karité\";}s:36:\"3b9ee832-65ff-11ea-b20d-0242ac120004\";a:1:{s:2:\"fr\";s:9:\"Bisabolol\";}s:36:\"3b9ef070-65ff-11ea-b214-0242ac120004\";a:1:{s:2:\"fr\";s:5:\"Café\";}s:36:\"3b9ef6ec-65ff-11ea-8f01-0242ac120004\";a:1:{s:2:\"fr\";s:9:\"Calendula\";}s:36:\"3b9efe12-65ff-11ea-8c15-0242ac120004\";a:1:{s:2:\"fr\";s:9:\"Camomille\";}s:36:\"3b9f04ac-65ff-11ea-85bc-0242ac120004\";a:1:{s:2:\"fr\";s:8:\"Camélia\";}s:36:\"3b9f0b32-65ff-11ea-a095-0242ac120004\";a:1:{s:2:\"fr\";s:7:\"Charbon\";}s:36:\"3b9f11b8-65ff-11ea-9e30-0242ac120004\";a:1:{s:2:\"fr\";s:7:\"Chardon\";}s:36:\"3b9f1848-65ff-11ea-b740-0242ac120004\";a:1:{s:2:\"fr\";s:22:\"Chardon bleu des dunes\";}s:36:\"3b9f1ece-65ff-11ea-ba4b-0242ac120004\";a:1:{s:2:\"fr\";s:14:\"Cire d\'abeille\";}s:36:\"3b9f2554-65ff-11ea-a957-0242ac120004\";a:1:{s:2:\"fr\";s:6:\"Citron\";}s:36:\"3b9f2bd0-65ff-11ea-8682-0242ac120004\";a:1:{s:2:\"fr\";s:8:\"Copaïba\";}s:36:\"3b9f324c-65ff-11ea-948d-0242ac120004\";a:1:{s:2:\"fr\";s:13:\"Criste marine\";}s:36:\"a84d4b9a-65ff-11ea-8623-0242ac120004\";a:1:{s:2:\"fr\";s:3:\"DHA\";}s:36:\"a84d54dc-65ff-11ea-88e6-0242ac120004\";a:1:{s:2:\"fr\";s:29:\"Des cires et huiles légères\";}s:36:\"a84d5c0c-65ff-11ea-93a5-0242ac120004\";a:1:{s:2:\"fr\";s:13:\"Eau de Cactus\";}s:36:\"a84d631e-65ff-11ea-a41a-0242ac120004\";a:1:{s:2:\"fr\";s:13:\"Eau de bambou\";}s:36:\"a84d6a08-65ff-11ea-be02-0242ac120004\";a:1:{s:2:\"fr\";s:13:\"Eau de citron\";}s:36:\"a84d70e8-65ff-11ea-b916-0242ac120004\";a:1:{s:2:\"fr\";s:11:\"Eau de coco\";}s:36:\"a84d77be-65ff-11ea-b117-0242ac120004\";a:1:{s:2:\"fr\";s:13:\"Eau de litchi\";}s:36:\"a84d7e8a-65ff-11ea-bc19-0242ac120004\";a:1:{s:2:\"fr\";s:25:\"Eau de mer du gulf stream\";}s:36:\"a84d854c-65ff-11ea-b5a0-0242ac120004\";a:1:{s:2:\"fr\";s:13:\"Eau de raisin\";}s:36:\"a84d8c18-65ff-11ea-a27a-0242ac120004\";a:1:{s:2:\"fr\";s:25:\"Eau enrichie en minéraux\";}s:36:\"a84d92da-65ff-11ea-981c-0242ac120004\";a:1:{s:2:\"fr\";s:21:\"Eau florale de bleuet\";}s:36:\"a84d99a6-65ff-11ea-b9c2-0242ac120004\";a:1:{s:2:\"fr\";s:22:\"Eau florale à la rose\";}s:36:\"a84da068-65ff-11ea-a88a-0242ac120004\";a:1:{s:2:\"fr\";s:19:\"Enzymes de  Grenade\";}s:36:\"a84da720-65ff-11ea-9183-0242ac120004\";a:1:{s:2:\"fr\";s:23:\"Extrait d\'algues rouges\";}s:36:\"28ec8662-6600-11ea-b8bc-0242ac120004\";a:1:{s:2:\"fr\";s:9:\"Filtre UV\";}s:36:\"28ec8fb8-6600-11ea-a290-0242ac120004\";a:1:{s:2:\"fr\";s:18:\"Fleur d\'immortelle\";}s:36:\"28ec96fc-6600-11ea-849c-0242ac120004\";a:1:{s:2:\"fr\";s:15:\"Fleur d\'oranger\";}s:36:\"28ec9dfa-6600-11ea-a576-0242ac120004\";a:1:{s:2:\"fr\";s:15:\"Fleur de bleuet\";}s:36:\"28eca4e4-6600-11ea-b9c6-0242ac120004\";a:1:{s:2:\"fr\";s:7:\"Freesia\";}s:36:\"28ecabce-6600-11ea-848f-0242ac120004\";a:1:{s:2:\"fr\";s:10:\"Fucocert®\";}s:36:\"28ecb2a4-6600-11ea-8bde-0242ac120004\";a:1:{s:2:\"fr\";s:13:\"Gelée royale\";}s:36:\"28ecb970-6600-11ea-946a-0242ac120004\";a:1:{s:2:\"fr\";s:6:\"Ginkgo\";}s:36:\"28ecc03c-6600-11ea-856a-0242ac120004\";a:1:{s:2:\"fr\";s:7:\"Ginseng\";}s:36:\"28ecc708-6600-11ea-90db-0242ac120004\";a:1:{s:2:\"fr\";s:19:\"Graine de soja vert\";}s:36:\"28eccdc0-6600-11ea-b9e2-0242ac120004\";a:1:{s:2:\"fr\";s:23:\"Graines de pin maritime\";}s:36:\"28ecd482-6600-11ea-b732-0242ac120004\";a:1:{s:2:\"fr\";s:22:\"Graines de rosa canina\";}s:36:\"28ecdb3a-6600-11ea-8838-0242ac120004\";a:1:{s:2:\"fr\";s:9:\"Géranium\";}s:36:\"28ece206-6600-11ea-9463-0242ac120004\";a:1:{s:2:\"fr\";s:10:\"Hamamélis\";}s:36:\"28ece8be-6600-11ea-a0df-0242ac120004\";a:1:{s:2:\"fr\";s:8:\"Hibiscus\";}s:36:\"28ecef80-6600-11ea-b48a-0242ac120004\";a:1:{s:2:\"fr\";s:25:\"Hibiscus et Mûrier blanc\";}s:36:\"28ecf62e-6600-11ea-8560-0242ac120004\";a:1:{s:2:\"fr\";s:13:\"Huile d\'Argan\";}s:36:\"28ecfcdc-6600-11ea-a0ee-0242ac120004\";a:1:{s:2:\"fr\";s:17:\"Huile d\'Argousier\";}s:36:\"28ed039e-6600-11ea-95c9-0242ac120004\";a:1:{s:2:\"fr\";s:14:\"Huile d\'Avoine\";}s:36:\"28ed0bbe-6600-11ea-af70-0242ac120004\";a:1:{s:2:\"fr\";s:20:\"Huile d\'amande douce\";}s:36:\"28ed12f8-6600-11ea-87d3-0242ac120004\";a:1:{s:2:\"fr\";s:14:\"Huile d\'avocat\";}s:36:\"78e1fcf6-6600-11ea-bdf5-0242ac120004\";a:1:{s:2:\"fr\";s:13:\"Huile d\'olive\";}s:36:\"78e2067e-6600-11ea-9a1e-0242ac120004\";a:1:{s:2:\"fr\";s:14:\"Huile d\'onagre\";}s:36:\"78e20de0-6600-11ea-9d35-0242ac120004\";a:1:{s:2:\"fr\";s:15:\"Huile de Buriti\";}s:36:\"78e214f2-6600-11ea-a5f7-0242ac120004\";a:1:{s:2:\"fr\";s:16:\"Huile de Chanvre\";}s:36:\"78e21c0e-6600-11ea-b83c-0242ac120004\";a:1:{s:2:\"fr\";s:14:\"Huile de Coton\";}s:36:\"78e22370-6600-11ea-8967-0242ac120004\";a:1:{s:2:\"fr\";s:18:\"Huile de Cranberry\";}s:36:\"78e22a5a-6600-11ea-a525-0242ac120004\";a:1:{s:2:\"fr\";s:15:\"Huile de Jojoba\";}s:36:\"78e23130-6600-11ea-b7df-0242ac120004\";a:1:{s:2:\"fr\";s:18:\"Huile de Macadamia\";}s:36:\"78e237f2-6600-11ea-accf-0242ac120004\";a:1:{s:2:\"fr\";s:15:\"Huile de Tamanu\";}s:36:\"2f3e3bea-6601-11ea-b56f-0242ac120004\";a:1:{s:2:\"fr\";s:19:\"Huile de baobab bio\";}s:36:\"2f3e4536-6601-11ea-a093-0242ac120004\";a:1:{s:2:\"fr\";s:18:\"Huile de bourrache\";}s:36:\"2f3e4c7a-6601-11ea-b95a-0242ac120004\";a:1:{s:2:\"fr\";s:17:\"Huile de carthame\";}s:36:\"2f3e5378-6601-11ea-8cc2-0242ac120004\";a:1:{s:2:\"fr\";s:13:\"Huile de coco\";}s:36:\"2f3e5a80-6601-11ea-99bc-0242ac120004\";a:1:{s:2:\"fr\";s:26:\"Huile de figue de barbarie\";}s:36:\"2f3e6318-6601-11ea-a342-0242ac120004\";a:1:{s:2:\"fr\";s:26:\"Huile de graine de Babassu\";}s:36:\"2f3e6a8e-6601-11ea-a25d-0242ac120004\";a:1:{s:2:\"fr\";s:38:\"Huile de graine de fruit de la passion\";}s:36:\"2f3e720e-6601-11ea-8320-0242ac120004\";a:1:{s:2:\"fr\";s:16:\"Huile de grenade\";}s:36:\"2f3e790c-6601-11ea-9c9e-0242ac120004\";a:1:{s:2:\"fr\";s:24:\"Huile de géranium rosat\";}s:36:\"2f3e7fe2-6601-11ea-a6ec-0242ac120004\";a:1:{s:2:\"fr\";s:12:\"Huile de lin\";}s:36:\"2f3e873a-6601-11ea-82cc-0242ac120004\";a:1:{s:2:\"fr\";s:29:\"Huile de melon vierge Kalahar\";}s:36:\"2f3e8e06-6601-11ea-a7f1-0242ac120004\";a:1:{s:2:\"fr\";s:15:\"Huile de mimosa\";}s:36:\"2f3e94b4-6601-11ea-8720-0242ac120004\";a:1:{s:2:\"fr\";s:16:\"Huile de moringa\";}s:36:\"2f3e9b6c-6601-11ea-9035-0242ac120004\";a:1:{s:2:\"fr\";s:17:\"Huile de noisette\";}s:36:\"2f3ea21a-6601-11ea-867f-0242ac120004\";a:1:{s:2:\"fr\";s:23:\"Huile de noix de Santal\";}s:36:\"2f3ea8be-6601-11ea-afbd-0242ac120004\";a:1:{s:2:\"fr\";s:39:\"Huile de pépin de de figue de barbarie\";}s:36:\"2f3eaf76-6601-11ea-8a3f-0242ac120004\";a:1:{s:2:\"fr\";s:36:\"Huile de pépin de figue de barbarie\";}s:36:\"2f3eb61a-6601-11ea-a937-0242ac120004\";a:1:{s:2:\"fr\";s:28:\"Huile de pépins de barbarie\";}s:36:\"2f3ebcc8-6601-11ea-bd8b-0242ac120004\";a:1:{s:2:\"fr\";s:37:\"Huile de pépins de figue de barbarie\";}s:36:\"2f3ec380-6601-11ea-aeab-0242ac120004\";a:1:{s:2:\"fr\";s:14:\"Huile de ricin\";}s:36:\"2f3eca2e-6601-11ea-bbef-0242ac120004\";a:1:{s:2:\"fr\";s:16:\"Huile de romarin\";}s:36:\"2f3ed0d2-6601-11ea-b044-0242ac120004\";a:1:{s:2:\"fr\";s:13:\"Huile de rose\";}s:36:\"2f3ed776-6601-11ea-9dfa-0242ac120004\";a:1:{s:2:\"fr\";s:15:\"Huile de roucou\";}s:36:\"2f3ede1a-6601-11ea-853b-0242ac120004\";a:1:{s:2:\"fr\";s:13:\"Huile de soja\";}s:36:\"2f3ee4d2-6601-11ea-83ff-0242ac120004\";a:1:{s:2:\"fr\";s:16:\"Huile de sésame\";}s:36:\"2f3eeb8a-6601-11ea-a77e-0242ac120004\";a:1:{s:2:\"fr\";s:18:\"Huile de tournesol\";}s:36:\"2f3ef238-6601-11ea-8200-0242ac120004\";a:1:{s:2:\"fr\";s:27:\"Huile essentielle de menthe\";}s:36:\"2f3efb02-6601-11ea-8d60-0242ac120004\";a:1:{s:2:\"fr\";s:33:\"Huile précieuse de Rose du Maroc\";}s:36:\"7f8499fe-6602-11ea-82cc-0242ac120004\";a:1:{s:2:\"fr\";s:10:\"Inca inchi\";}s:36:\"7f84a3cc-6602-11ea-a7f3-0242ac120004\";a:1:{s:2:\"fr\";s:19:\"Keratine végétale\";}s:36:\"7f84ab38-6602-11ea-8d88-0242ac120004\";a:1:{s:2:\"fr\";s:12:\"L\'effrontée\";}s:36:\"7f84b268-6602-11ea-9de4-0242ac120004\";a:1:{s:2:\"fr\";s:12:\"La délicate\";}s:36:\"7f84b984-6602-11ea-bd79-0242ac120004\";a:1:{s:2:\"fr\";s:13:\"Lait d\'avoine\";}s:36:\"7f84c082-6602-11ea-9855-0242ac120004\";a:1:{s:2:\"fr\";s:6:\"Mimosa\";}s:36:\"7f84c7c6-6602-11ea-9d3b-0242ac120004\";a:1:{s:2:\"fr\";s:10:\"Magnésium\";}s:36:\"7f84cece-6602-11ea-a897-0242ac120004\";a:1:{s:2:\"fr\";s:6:\"Matcha\";}s:36:\"7f84d5cc-6602-11ea-8842-0242ac120004\";a:1:{s:2:\"fr\";s:6:\"Menthe\";}s:36:\"7f84dcb6-6602-11ea-b981-0242ac120004\";a:1:{s:2:\"fr\";s:4:\"Miel\";}s:36:\"7f84e3a0-6602-11ea-9cd1-0242ac120004\";a:1:{s:2:\"fr\";s:13:\"Mûrier Blanc\";}s:36:\"7f84ea8a-6602-11ea-995e-0242ac120004\";a:1:{s:2:\"fr\";s:6:\"Nacres\";}s:36:\"7f84f214-6602-11ea-b828-0242ac120004\";a:1:{s:2:\"fr\";s:16:\"Noix de bancoule\";}s:36:\"7f84f8f4-6602-11ea-970a-0242ac120004\";a:1:{s:2:\"fr\";s:16:\"Noyaux de cerise\";}s:36:\"7f84ffde-6602-11ea-808b-0242ac120004\";a:1:{s:2:\"fr\";s:18:\"Noyaux d’abricot\";}s:36:\"7f8506be-6602-11ea-8961-0242ac120004\";a:1:{s:2:\"fr\";s:21:\"Ocean Silk Technology\";}s:36:\"7f850d9e-6602-11ea-ad63-0242ac120004\";a:1:{s:2:\"fr\";s:14:\"Omégas 3 et 7\";}s:36:\"7f851488-6602-11ea-a506-0242ac120004\";a:1:{s:2:\"fr\";s:5:\"Ougon\";}s:36:\"7f851b68-6602-11ea-9997-0242ac120004\";a:1:{s:2:\"fr\";s:4:\"Oyat\";}s:36:\"7f85223e-6602-11ea-964e-0242ac120004\";a:1:{s:2:\"fr\";s:6:\"Parfum\";}s:36:\"7f85290a-6602-11ea-9cce-0242ac120004\";a:1:{s:2:\"fr\";s:8:\"Peptides\";}s:36:\"7f852ff4-6602-11ea-9e77-0242ac120004\";a:1:{s:2:\"fr\";s:6:\"Perles\";}s:36:\"7f853756-6602-11ea-a494-0242ac120004\";a:1:{s:2:\"fr\";s:16:\"Perles de jojoba\";}s:36:\"7f853eae-6602-11ea-b6fe-0242ac120004\";a:1:{s:2:\"fr\";s:14:\"Pierre de Jade\";}s:36:\"7f854570-6602-11ea-9f3d-0242ac120004\";a:1:{s:2:\"fr\";s:14:\"Pierre de lune\";}s:36:\"7f854c1e-6602-11ea-b658-0242ac120004\";a:1:{s:2:\"fr\";s:17:\"Piroctone olamine\";}s:36:\"7f8552cc-6602-11ea-8e24-0242ac120004\";a:1:{s:2:\"fr\";s:6:\"Pollen\";}s:36:\"7f85597a-6602-11ea-9f38-0242ac120004\";a:1:{s:2:\"fr\";s:12:\"Polyphénols\";}s:36:\"7f856032-6602-11ea-bf8b-0242ac120004\";a:1:{s:2:\"fr\";s:24:\"Pousse de trèfle violet\";}s:36:\"7f8568ca-6602-11ea-ae3f-0242ac120004\";a:1:{s:2:\"fr\";s:18:\"Protéines de blé\";}s:36:\"7f856f82-6602-11ea-b44b-0242ac120004\";a:1:{s:2:\"fr\";s:13:\"Prébiotiques\";}s:36:\"7f857630-6602-11ea-9cf8-0242ac120004\";a:1:{s:2:\"fr\";s:12:\"Rose sauvage\";}s:36:\"7f857ce8-6602-11ea-80a1-0242ac120004\";a:1:{s:2:\"fr\";s:20:\"Sel de l\'ïle de Ré\";}s:36:\"7f8583a0-6602-11ea-90f7-0242ac120004\";a:1:{s:2:\"fr\";s:9:\"Sel marin\";}s:36:\"7f858a44-6602-11ea-b90a-0242ac120004\";a:1:{s:2:\"fr\";s:18:\"Squalane végétal\";}s:36:\"7f859106-6602-11ea-9f81-0242ac120004\";a:1:{s:2:\"fr\";s:5:\"Sucre\";}s:36:\"7f8597be-6602-11ea-af60-0242ac120004\";a:1:{s:2:\"fr\";s:4:\"Talc\";}s:36:\"7f859e6c-6602-11ea-b062-0242ac120004\";a:1:{s:2:\"fr\";s:12:\"Tepezcohuite\";}s:36:\"7f85a524-6602-11ea-ab1f-0242ac120004\";a:1:{s:2:\"fr\";s:9:\"Thé vert\";}s:36:\"7f85abd2-6602-11ea-a454-0242ac120004\";a:1:{s:2:\"fr\";s:9:\"Vipérine\";}s:36:\"7f85b276-6602-11ea-987f-0242ac120004\";a:1:{s:2:\"fr\";s:10:\"Vitamine A\";}s:36:\"7f85b92e-6602-11ea-be8b-0242ac120004\";a:1:{s:2:\"fr\";s:10:\"Vitamine C\";}s:36:\"7f85bfdc-6602-11ea-86ad-0242ac120004\";a:1:{s:2:\"fr\";s:10:\"Vitamine E\";}s:36:\"7f85c68a-6602-11ea-bb91-0242ac120004\";a:1:{s:2:\"fr\";s:10:\"Vitamine F\";}s:36:\"7f85cd38-6602-11ea-8abc-0242ac120004\";a:1:{s:2:\"fr\";s:4:\"Yuzu\";}s:36:\"7f85d3e6-6602-11ea-9983-0242ac120004\";a:1:{s:2:\"fr\";s:4:\"Zinc\";}}s:8:\"multiple\";b:1;s:3:\"min\";N;s:3:\"max\";N;}','2020-03-14 14:22:27','2020-03-14 14:45:50',12);
        /*!40000 ALTER TABLE `sylius_product_attribute` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_product_attribute_translation`
        --

        DROP TABLE IF EXISTS `sylius_product_attribute_translation`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_product_attribute_translation` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `translatable_id` int(11) NOT NULL,
        `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `sylius_product_attribute_translation_uniq_trans` (`translatable_id`,`locale`),
        KEY `IDX_93850EBA2C2AC5D3` (`translatable_id`),
        CONSTRAINT `FK_93850EBA2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `sylius_product_attribute` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_product_attribute_translation`
        --

        LOCK TABLES `sylius_product_attribute_translation` WRITE;
        /*!40000 ALTER TABLE `sylius_product_attribute_translation` DISABLE KEYS */;
        INSERT INTO `sylius_product_attribute_translation` VALUES (1,1,'Contenance','fr'),(2,1,'Capacity','en'),(3,2,'Naturalité','fr'),(4,2,'Naturalness','en'),(5,3,'Bienfaits','fr'),(6,3,'Benefits','en'),(7,4,'Tags','fr'),(8,4,'Tags','en'),(9,5,'Manual','fr'),(10,5,'Manual','en'),(11,6,'Yuka rating','fr'),(12,6,'Yuka rating','en'),(13,7,'INCI','fr'),(14,7,'INCI','en'),(15,8,'Concerns','fr'),(16,8,'Concerns','en'),(17,9,'Skin type','fr'),(18,9,'Skin type','en'),(19,10,'Skin color','fr'),(20,10,'Skin color','en'),(21,11,'Texture','fr'),(22,11,'Texture','en'),(23,12,'Hair type','fr'),(24,12,'Hair type','en'),(25,13,'Ingredients','fr'),(26,13,'Ingredients','en');
        /*!40000 ALTER TABLE `sylius_product_attribute_translation` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_product_attribute_value`
        --

        DROP TABLE IF EXISTS `sylius_product_attribute_value`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_product_attribute_value` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `product_id` int(11) NOT NULL,
        `attribute_id` int(11) NOT NULL,
        `locale_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `text_value` longtext COLLATE utf8_unicode_ci,
        `boolean_value` tinyint(1) DEFAULT NULL,
        `integer_value` int(11) DEFAULT NULL,
        `float_value` double DEFAULT NULL,
        `datetime_value` datetime DEFAULT NULL,
        `date_value` date DEFAULT NULL,
        `json_value` json DEFAULT NULL COMMENT '(DC2Type:json_array)',
        PRIMARY KEY (`id`),
        KEY `IDX_8A053E544584665A` (`product_id`),
        KEY `IDX_8A053E54B6E62EFA` (`attribute_id`),
        CONSTRAINT `FK_8A053E544584665A` FOREIGN KEY (`product_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_8A053E54B6E62EFA` FOREIGN KEY (`attribute_id`) REFERENCES `sylius_product_attribute` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_product_attribute_value`
        --

        LOCK TABLES `sylius_product_attribute_value` WRITE;
        /*!40000 ALTER TABLE `sylius_product_attribute_value` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_product_attribute_value` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_product_channels`
        --

        DROP TABLE IF EXISTS `sylius_product_channels`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_product_channels` (
        `product_id` int(11) NOT NULL,
        `channel_id` int(11) NOT NULL,
        PRIMARY KEY (`product_id`,`channel_id`),
        KEY `IDX_F9EF269B4584665A` (`product_id`),
        KEY `IDX_F9EF269B72F5A1AA` (`channel_id`),
        CONSTRAINT `FK_F9EF269B4584665A` FOREIGN KEY (`product_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_F9EF269B72F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_product_channels`
        --

        LOCK TABLES `sylius_product_channels` WRITE;
        /*!40000 ALTER TABLE `sylius_product_channels` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_product_channels` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_product_image`
        --

        DROP TABLE IF EXISTS `sylius_product_image`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_product_image` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `owner_id` int(11) NOT NULL,
        `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        KEY `IDX_88C64B2D7E3C61F9` (`owner_id`),
        CONSTRAINT `FK_88C64B2D7E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_product_image`
        --

        LOCK TABLES `sylius_product_image` WRITE;
        /*!40000 ALTER TABLE `sylius_product_image` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_product_image` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_product_image_product_variants`
        --

        DROP TABLE IF EXISTS `sylius_product_image_product_variants`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_product_image_product_variants` (
        `image_id` int(11) NOT NULL,
        `variant_id` int(11) NOT NULL,
        PRIMARY KEY (`image_id`,`variant_id`),
        KEY `IDX_8FFDAE8D3DA5256D` (`image_id`),
        KEY `IDX_8FFDAE8D3B69A9AF` (`variant_id`),
        CONSTRAINT `FK_8FFDAE8D3B69A9AF` FOREIGN KEY (`variant_id`) REFERENCES `sylius_product_variant` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_8FFDAE8D3DA5256D` FOREIGN KEY (`image_id`) REFERENCES `sylius_product_image` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_product_image_product_variants`
        --

        LOCK TABLES `sylius_product_image_product_variants` WRITE;
        /*!40000 ALTER TABLE `sylius_product_image_product_variants` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_product_image_product_variants` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_product_option`
        --

        DROP TABLE IF EXISTS `sylius_product_option`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_product_option` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `position` int(11) NOT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_E4C0EBEF77153098` (`code`)
        ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_product_option`
        --

        LOCK TABLES `sylius_product_option` WRITE;
        /*!40000 ALTER TABLE `sylius_product_option` DISABLE KEYS */;
        INSERT INTO `sylius_product_option` VALUES (1,'capacity',0,'2020-03-14 13:19:55','2020-03-14 13:19:55'),(2,'color',1,'2020-03-14 13:22:37','2020-03-14 13:22:37');
        /*!40000 ALTER TABLE `sylius_product_option` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_product_option_translation`
        --

        DROP TABLE IF EXISTS `sylius_product_option_translation`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_product_option_translation` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `translatable_id` int(11) NOT NULL,
        `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `sylius_product_option_translation_uniq_trans` (`translatable_id`,`locale`),
        KEY `IDX_CBA491AD2C2AC5D3` (`translatable_id`),
        CONSTRAINT `FK_CBA491AD2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `sylius_product_option` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_product_option_translation`
        --

        LOCK TABLES `sylius_product_option_translation` WRITE;
        /*!40000 ALTER TABLE `sylius_product_option_translation` DISABLE KEYS */;
        INSERT INTO `sylius_product_option_translation` VALUES (1,1,'Contenance','fr'),(2,1,'Capacity','en'),(3,2,'Couleur','fr'),(4,2,'Color','en');
        /*!40000 ALTER TABLE `sylius_product_option_translation` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_product_option_value`
        --

        DROP TABLE IF EXISTS `sylius_product_option_value`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_product_option_value` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `option_id` int(11) NOT NULL,
        `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_F7FF7D4B77153098` (`code`),
        KEY `IDX_F7FF7D4BA7C41D6F` (`option_id`),
        CONSTRAINT `FK_F7FF7D4BA7C41D6F` FOREIGN KEY (`option_id`) REFERENCES `sylius_product_option` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_product_option_value`
        --

        LOCK TABLES `sylius_product_option_value` WRITE;
        /*!40000 ALTER TABLE `sylius_product_option_value` DISABLE KEYS */;
        INSERT INTO `sylius_product_option_value` VALUES (1,1,'capacity_15ml'),(2,1,'capacity_50ml'),(3,2,'color_a1224e'),(4,2,'color_c63663');
        /*!40000 ALTER TABLE `sylius_product_option_value` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_product_option_value_translation`
        --

        DROP TABLE IF EXISTS `sylius_product_option_value_translation`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_product_option_value_translation` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `translatable_id` int(11) NOT NULL,
        `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `sylius_product_option_value_translation_uniq_trans` (`translatable_id`,`locale`),
        KEY `IDX_8D4382DC2C2AC5D3` (`translatable_id`),
        CONSTRAINT `FK_8D4382DC2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `sylius_product_option_value` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_product_option_value_translation`
        --

        LOCK TABLES `sylius_product_option_value_translation` WRITE;
        /*!40000 ALTER TABLE `sylius_product_option_value_translation` DISABLE KEYS */;
        INSERT INTO `sylius_product_option_value_translation` VALUES (1,1,'15ml','fr'),(2,2,'50ml','fr'),(3,3,'Framboise','fr'),(4,4,'Coquelicot','fr');
        /*!40000 ALTER TABLE `sylius_product_option_value_translation` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_product_options`
        --

        DROP TABLE IF EXISTS `sylius_product_options`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_product_options` (
        `product_id` int(11) NOT NULL,
        `option_id` int(11) NOT NULL,
        PRIMARY KEY (`product_id`,`option_id`),
        KEY `IDX_2B5FF0094584665A` (`product_id`),
        KEY `IDX_2B5FF009A7C41D6F` (`option_id`),
        CONSTRAINT `FK_2B5FF0094584665A` FOREIGN KEY (`product_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_2B5FF009A7C41D6F` FOREIGN KEY (`option_id`) REFERENCES `sylius_product_option` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_product_options`
        --

        LOCK TABLES `sylius_product_options` WRITE;
        /*!40000 ALTER TABLE `sylius_product_options` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_product_options` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_product_review`
        --

        DROP TABLE IF EXISTS `sylius_product_review`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_product_review` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `product_id` int(11) NOT NULL,
        `author_id` int(11) NOT NULL,
        `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `rating` int(11) NOT NULL,
        `comment` longtext COLLATE utf8_unicode_ci,
        `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        KEY `IDX_C7056A994584665A` (`product_id`),
        KEY `IDX_C7056A99F675F31B` (`author_id`),
        CONSTRAINT `FK_C7056A994584665A` FOREIGN KEY (`product_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_C7056A99F675F31B` FOREIGN KEY (`author_id`) REFERENCES `sylius_customer` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_product_review`
        --

        LOCK TABLES `sylius_product_review` WRITE;
        /*!40000 ALTER TABLE `sylius_product_review` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_product_review` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_product_taxon`
        --

        DROP TABLE IF EXISTS `sylius_product_taxon`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_product_taxon` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `product_id` int(11) NOT NULL,
        `taxon_id` int(11) NOT NULL,
        `position` int(11) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `product_taxon_idx` (`product_id`,`taxon_id`),
        KEY `IDX_169C6CD94584665A` (`product_id`),
        KEY `IDX_169C6CD9DE13F470` (`taxon_id`),
        CONSTRAINT `FK_169C6CD94584665A` FOREIGN KEY (`product_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_169C6CD9DE13F470` FOREIGN KEY (`taxon_id`) REFERENCES `sylius_taxon` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_product_taxon`
        --

        LOCK TABLES `sylius_product_taxon` WRITE;
        /*!40000 ALTER TABLE `sylius_product_taxon` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_product_taxon` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_product_translation`
        --

        DROP TABLE IF EXISTS `sylius_product_translation`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_product_translation` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `translatable_id` int(11) NOT NULL,
        `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `description` longtext COLLATE utf8_unicode_ci,
        `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `short_description` longtext COLLATE utf8_unicode_ci,
        `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_105A9084180C698989D9B62` (`locale`,`slug`),
        UNIQUE KEY `sylius_product_translation_uniq_trans` (`translatable_id`,`locale`),
        KEY `IDX_105A9082C2AC5D3` (`translatable_id`),
        CONSTRAINT `FK_105A9082C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_product_translation`
        --

        LOCK TABLES `sylius_product_translation` WRITE;
        /*!40000 ALTER TABLE `sylius_product_translation` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_product_translation` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_product_variant`
        --

        DROP TABLE IF EXISTS `sylius_product_variant`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_product_variant` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `product_id` int(11) NOT NULL,
        `tax_category_id` int(11) DEFAULT NULL,
        `shipping_category_id` int(11) DEFAULT NULL,
        `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        `position` int(11) NOT NULL,
        `version` int(11) NOT NULL DEFAULT '1',
        `on_hold` int(11) NOT NULL,
        `on_hand` int(11) NOT NULL,
        `tracked` tinyint(1) NOT NULL,
        `width` double DEFAULT NULL,
        `height` double DEFAULT NULL,
        `depth` double DEFAULT NULL,
        `weight` double DEFAULT NULL,
        `shipping_required` tinyint(1) NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_A29B52377153098` (`code`),
        KEY `IDX_A29B5234584665A` (`product_id`),
        KEY `IDX_A29B5239DF894ED` (`tax_category_id`),
        KEY `IDX_A29B5239E2D1A41` (`shipping_category_id`),
        CONSTRAINT `FK_A29B5234584665A` FOREIGN KEY (`product_id`) REFERENCES `sylius_product` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_A29B5239DF894ED` FOREIGN KEY (`tax_category_id`) REFERENCES `sylius_tax_category` (`id`) ON DELETE SET NULL,
        CONSTRAINT `FK_A29B5239E2D1A41` FOREIGN KEY (`shipping_category_id`) REFERENCES `sylius_shipping_category` (`id`) ON DELETE SET NULL
        ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_product_variant`
        --

        LOCK TABLES `sylius_product_variant` WRITE;
        /*!40000 ALTER TABLE `sylius_product_variant` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_product_variant` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_product_variant_option_value`
        --

        DROP TABLE IF EXISTS `sylius_product_variant_option_value`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_product_variant_option_value` (
        `variant_id` int(11) NOT NULL,
        `option_value_id` int(11) NOT NULL,
        PRIMARY KEY (`variant_id`,`option_value_id`),
        KEY `IDX_76CDAFA13B69A9AF` (`variant_id`),
        KEY `IDX_76CDAFA1D957CA06` (`option_value_id`),
        CONSTRAINT `FK_76CDAFA13B69A9AF` FOREIGN KEY (`variant_id`) REFERENCES `sylius_product_variant` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_76CDAFA1D957CA06` FOREIGN KEY (`option_value_id`) REFERENCES `sylius_product_option_value` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_product_variant_option_value`
        --

        LOCK TABLES `sylius_product_variant_option_value` WRITE;
        /*!40000 ALTER TABLE `sylius_product_variant_option_value` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_product_variant_option_value` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_product_variant_translation`
        --

        DROP TABLE IF EXISTS `sylius_product_variant_translation`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_product_variant_translation` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `translatable_id` int(11) NOT NULL,
        `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `sylius_product_variant_translation_uniq_trans` (`translatable_id`,`locale`),
        KEY `IDX_8DC18EDC2C2AC5D3` (`translatable_id`),
        CONSTRAINT `FK_8DC18EDC2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `sylius_product_variant` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_product_variant_translation`
        --

        LOCK TABLES `sylius_product_variant_translation` WRITE;
        /*!40000 ALTER TABLE `sylius_product_variant_translation` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_product_variant_translation` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_promotion`
        --

        DROP TABLE IF EXISTS `sylius_promotion`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_promotion` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `priority` int(11) NOT NULL,
        `exclusive` tinyint(1) NOT NULL,
        `usage_limit` int(11) DEFAULT NULL,
        `used` int(11) NOT NULL,
        `coupon_based` tinyint(1) NOT NULL,
        `starts_at` datetime DEFAULT NULL,
        `ends_at` datetime DEFAULT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_F157396377153098` (`code`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_promotion`
        --

        LOCK TABLES `sylius_promotion` WRITE;
        /*!40000 ALTER TABLE `sylius_promotion` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_promotion` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_promotion_action`
        --

        DROP TABLE IF EXISTS `sylius_promotion_action`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_promotion_action` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `promotion_id` int(11) DEFAULT NULL,
        `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `configuration` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
        PRIMARY KEY (`id`),
        KEY `IDX_933D0915139DF194` (`promotion_id`),
        CONSTRAINT `FK_933D0915139DF194` FOREIGN KEY (`promotion_id`) REFERENCES `sylius_promotion` (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_promotion_action`
        --

        LOCK TABLES `sylius_promotion_action` WRITE;
        /*!40000 ALTER TABLE `sylius_promotion_action` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_promotion_action` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_promotion_channels`
        --

        DROP TABLE IF EXISTS `sylius_promotion_channels`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_promotion_channels` (
        `promotion_id` int(11) NOT NULL,
        `channel_id` int(11) NOT NULL,
        PRIMARY KEY (`promotion_id`,`channel_id`),
        KEY `IDX_1A044F64139DF194` (`promotion_id`),
        KEY `IDX_1A044F6472F5A1AA` (`channel_id`),
        CONSTRAINT `FK_1A044F64139DF194` FOREIGN KEY (`promotion_id`) REFERENCES `sylius_promotion` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_1A044F6472F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_promotion_channels`
        --

        LOCK TABLES `sylius_promotion_channels` WRITE;
        /*!40000 ALTER TABLE `sylius_promotion_channels` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_promotion_channels` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_promotion_coupon`
        --

        DROP TABLE IF EXISTS `sylius_promotion_coupon`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_promotion_coupon` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `promotion_id` int(11) DEFAULT NULL,
        `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `usage_limit` int(11) DEFAULT NULL,
        `used` int(11) NOT NULL,
        `expires_at` datetime DEFAULT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        `per_customer_usage_limit` int(11) DEFAULT NULL,
        `reusable_from_cancelled_orders` tinyint(1) NOT NULL DEFAULT '1',
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_B04EBA8577153098` (`code`),
        KEY `IDX_B04EBA85139DF194` (`promotion_id`),
        CONSTRAINT `FK_B04EBA85139DF194` FOREIGN KEY (`promotion_id`) REFERENCES `sylius_promotion` (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_promotion_coupon`
        --

        LOCK TABLES `sylius_promotion_coupon` WRITE;
        /*!40000 ALTER TABLE `sylius_promotion_coupon` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_promotion_coupon` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_promotion_order`
        --

        DROP TABLE IF EXISTS `sylius_promotion_order`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_promotion_order` (
        `order_id` int(11) NOT NULL,
        `promotion_id` int(11) NOT NULL,
        PRIMARY KEY (`order_id`,`promotion_id`),
        KEY `IDX_BF9CF6FB8D9F6D38` (`order_id`),
        KEY `IDX_BF9CF6FB139DF194` (`promotion_id`),
        CONSTRAINT `FK_BF9CF6FB139DF194` FOREIGN KEY (`promotion_id`) REFERENCES `sylius_promotion` (`id`),
        CONSTRAINT `FK_BF9CF6FB8D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `sylius_order` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_promotion_order`
        --

        LOCK TABLES `sylius_promotion_order` WRITE;
        /*!40000 ALTER TABLE `sylius_promotion_order` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_promotion_order` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_promotion_rule`
        --

        DROP TABLE IF EXISTS `sylius_promotion_rule`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_promotion_rule` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `promotion_id` int(11) DEFAULT NULL,
        `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `configuration` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
        PRIMARY KEY (`id`),
        KEY `IDX_2C188EA8139DF194` (`promotion_id`),
        CONSTRAINT `FK_2C188EA8139DF194` FOREIGN KEY (`promotion_id`) REFERENCES `sylius_promotion` (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_promotion_rule`
        --

        LOCK TABLES `sylius_promotion_rule` WRITE;
        /*!40000 ALTER TABLE `sylius_promotion_rule` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_promotion_rule` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_province`
        --

        DROP TABLE IF EXISTS `sylius_province`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_province` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `country_id` int(11) NOT NULL,
        `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `abbreviation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_B5618FE477153098` (`code`),
        UNIQUE KEY `UNIQ_B5618FE4F92F3E705E237E06` (`country_id`,`name`),
        KEY `IDX_B5618FE4F92F3E70` (`country_id`),
        CONSTRAINT `FK_B5618FE4F92F3E70` FOREIGN KEY (`country_id`) REFERENCES `sylius_country` (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_province`
        --

        LOCK TABLES `sylius_province` WRITE;
        /*!40000 ALTER TABLE `sylius_province` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_province` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_shipment`
        --

        DROP TABLE IF EXISTS `sylius_shipment`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_shipment` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `method_id` int(11) NOT NULL,
        `order_id` int(11) NOT NULL,
        `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `tracking` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        `shipped_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        KEY `IDX_FD707B3319883967` (`method_id`),
        KEY `IDX_FD707B338D9F6D38` (`order_id`),
        CONSTRAINT `FK_FD707B3319883967` FOREIGN KEY (`method_id`) REFERENCES `sylius_shipping_method` (`id`),
        CONSTRAINT `FK_FD707B338D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `sylius_order` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_shipment`
        --

        LOCK TABLES `sylius_shipment` WRITE;
        /*!40000 ALTER TABLE `sylius_shipment` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_shipment` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_shipping_category`
        --

        DROP TABLE IF EXISTS `sylius_shipping_category`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_shipping_category` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `description` longtext COLLATE utf8_unicode_ci,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_B1D6465277153098` (`code`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_shipping_category`
        --

        LOCK TABLES `sylius_shipping_category` WRITE;
        /*!40000 ALTER TABLE `sylius_shipping_category` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_shipping_category` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_shipping_method`
        --

        DROP TABLE IF EXISTS `sylius_shipping_method`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_shipping_method` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `category_id` int(11) DEFAULT NULL,
        `zone_id` int(11) NOT NULL,
        `tax_category_id` int(11) DEFAULT NULL,
        `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `configuration` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
        `category_requirement` int(11) NOT NULL,
        `calculator` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `is_enabled` tinyint(1) NOT NULL,
        `position` int(11) NOT NULL,
        `archived_at` datetime DEFAULT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_5FB0EE1177153098` (`code`),
        KEY `IDX_5FB0EE1112469DE2` (`category_id`),
        KEY `IDX_5FB0EE119F2C3FAB` (`zone_id`),
        KEY `IDX_5FB0EE119DF894ED` (`tax_category_id`),
        CONSTRAINT `FK_5FB0EE1112469DE2` FOREIGN KEY (`category_id`) REFERENCES `sylius_shipping_category` (`id`),
        CONSTRAINT `FK_5FB0EE119DF894ED` FOREIGN KEY (`tax_category_id`) REFERENCES `sylius_tax_category` (`id`) ON DELETE SET NULL,
        CONSTRAINT `FK_5FB0EE119F2C3FAB` FOREIGN KEY (`zone_id`) REFERENCES `sylius_zone` (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_shipping_method`
        --

        LOCK TABLES `sylius_shipping_method` WRITE;
        /*!40000 ALTER TABLE `sylius_shipping_method` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_shipping_method` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_shipping_method_channels`
        --

        DROP TABLE IF EXISTS `sylius_shipping_method_channels`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_shipping_method_channels` (
        `shipping_method_id` int(11) NOT NULL,
        `channel_id` int(11) NOT NULL,
        PRIMARY KEY (`shipping_method_id`,`channel_id`),
        KEY `IDX_2D9833355F7D6850` (`shipping_method_id`),
        KEY `IDX_2D98333572F5A1AA` (`channel_id`),
        CONSTRAINT `FK_2D9833355F7D6850` FOREIGN KEY (`shipping_method_id`) REFERENCES `sylius_shipping_method` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_2D98333572F5A1AA` FOREIGN KEY (`channel_id`) REFERENCES `sylius_channel` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_shipping_method_channels`
        --

        LOCK TABLES `sylius_shipping_method_channels` WRITE;
        /*!40000 ALTER TABLE `sylius_shipping_method_channels` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_shipping_method_channels` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_shipping_method_translation`
        --

        DROP TABLE IF EXISTS `sylius_shipping_method_translation`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_shipping_method_translation` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `translatable_id` int(11) NOT NULL,
        `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `sylius_shipping_method_translation_uniq_trans` (`translatable_id`,`locale`),
        KEY `IDX_2B37DB3D2C2AC5D3` (`translatable_id`),
        CONSTRAINT `FK_2B37DB3D2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `sylius_shipping_method` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_shipping_method_translation`
        --

        LOCK TABLES `sylius_shipping_method_translation` WRITE;
        /*!40000 ALTER TABLE `sylius_shipping_method_translation` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_shipping_method_translation` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_shop_billing_data`
        --

        DROP TABLE IF EXISTS `sylius_shop_billing_data`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_shop_billing_data` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `tax_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `country_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_shop_billing_data`
        --

        LOCK TABLES `sylius_shop_billing_data` WRITE;
        /*!40000 ALTER TABLE `sylius_shop_billing_data` DISABLE KEYS */;
        INSERT INTO `sylius_shop_billing_data` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL),(2,NULL,NULL,NULL,NULL,NULL,NULL);
        /*!40000 ALTER TABLE `sylius_shop_billing_data` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_shop_user`
        --

        DROP TABLE IF EXISTS `sylius_shop_user`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_shop_user` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `customer_id` int(11) NOT NULL,
        `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `username_canonical` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `enabled` tinyint(1) NOT NULL,
        `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `encoder_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `last_login` datetime DEFAULT NULL,
        `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `password_requested_at` datetime DEFAULT NULL,
        `email_verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `verified_at` datetime DEFAULT NULL,
        `locked` tinyint(1) NOT NULL,
        `expires_at` datetime DEFAULT NULL,
        `credentials_expire_at` datetime DEFAULT NULL,
        `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
        `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `email_canonical` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_7C2B74809395C3F3` (`customer_id`),
        CONSTRAINT `FK_7C2B74809395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `sylius_customer` (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_shop_user`
        --

        LOCK TABLES `sylius_shop_user` WRITE;
        /*!40000 ALTER TABLE `sylius_shop_user` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_shop_user` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_tax_category`
        --

        DROP TABLE IF EXISTS `sylius_tax_category`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_tax_category` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `description` longtext COLLATE utf8_unicode_ci,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_221EB0BE77153098` (`code`)
        ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_tax_category`
        --

        LOCK TABLES `sylius_tax_category` WRITE;
        /*!40000 ALTER TABLE `sylius_tax_category` DISABLE KEYS */;
        INSERT INTO `sylius_tax_category` VALUES (1,'tax_normal','Normal','default category','2020-03-14 10:40:07','2020-03-14 10:40:07');
        /*!40000 ALTER TABLE `sylius_tax_category` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_tax_rate`
        --

        DROP TABLE IF EXISTS `sylius_tax_rate`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_tax_rate` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `category_id` int(11) NOT NULL,
        `zone_id` int(11) NOT NULL,
        `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `amount` decimal(10,5) NOT NULL,
        `included_in_price` tinyint(1) NOT NULL,
        `calculator` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_3CD86B2E77153098` (`code`),
        KEY `IDX_3CD86B2E12469DE2` (`category_id`),
        KEY `IDX_3CD86B2E9F2C3FAB` (`zone_id`),
        CONSTRAINT `FK_3CD86B2E12469DE2` FOREIGN KEY (`category_id`) REFERENCES `sylius_tax_category` (`id`),
        CONSTRAINT `FK_3CD86B2E9F2C3FAB` FOREIGN KEY (`zone_id`) REFERENCES `sylius_zone` (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_tax_rate`
        --

        LOCK TABLES `sylius_tax_rate` WRITE;
        /*!40000 ALTER TABLE `sylius_tax_rate` DISABLE KEYS */;
        INSERT INTO `sylius_tax_rate` VALUES (1,1,1,'tax_normal_20','Tax 20%',0.20000,1,'default','2020-02-28 13:12:54','2020-02-28 13:12:54'),(2,1,2,'tax_normal_21','Tax 21%',0.21000,1,'default','2020-02-28 13:12:54','2020-02-28 13:12:54');
        /*!40000 ALTER TABLE `sylius_tax_rate` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_taxon`
        --

        DROP TABLE IF EXISTS `sylius_taxon`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_taxon` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `tree_root` int(11) DEFAULT NULL,
        `parent_id` int(11) DEFAULT NULL,
        `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `tree_left` int(11) NOT NULL,
        `tree_right` int(11) NOT NULL,
        `tree_level` int(11) NOT NULL,
        `position` int(11) NOT NULL,
        `created_at` datetime NOT NULL,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_CFD811CA77153098` (`code`),
        KEY `IDX_CFD811CAA977936C` (`tree_root`),
        KEY `IDX_CFD811CA727ACA70` (`parent_id`),
        CONSTRAINT `FK_CFD811CA727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `sylius_taxon` (`id`) ON DELETE CASCADE,
        CONSTRAINT `FK_CFD811CAA977936C` FOREIGN KEY (`tree_root`) REFERENCES `sylius_taxon` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_taxon`
        --

        LOCK TABLES `sylius_taxon` WRITE;
        /*!40000 ALTER TABLE `sylius_taxon` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_taxon` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_taxon_image`
        --

        DROP TABLE IF EXISTS `sylius_taxon_image`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_taxon_image` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `owner_id` int(11) NOT NULL,
        `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        KEY `IDX_DBE52B287E3C61F9` (`owner_id`),
        CONSTRAINT `FK_DBE52B287E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `sylius_taxon` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_taxon_image`
        --

        LOCK TABLES `sylius_taxon_image` WRITE;
        /*!40000 ALTER TABLE `sylius_taxon_image` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_taxon_image` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_taxon_translation`
        --

        DROP TABLE IF EXISTS `sylius_taxon_translation`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_taxon_translation` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `translatable_id` int(11) NOT NULL,
        `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `description` longtext COLLATE utf8_unicode_ci,
        `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `slug_uidx` (`locale`,`slug`),
        UNIQUE KEY `sylius_taxon_translation_uniq_trans` (`translatable_id`,`locale`),
        KEY `IDX_1487DFCF2C2AC5D3` (`translatable_id`),
        CONSTRAINT `FK_1487DFCF2C2AC5D3` FOREIGN KEY (`translatable_id`) REFERENCES `sylius_taxon` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_taxon_translation`
        --

        LOCK TABLES `sylius_taxon_translation` WRITE;
        /*!40000 ALTER TABLE `sylius_taxon_translation` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_taxon_translation` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_user_oauth`
        --

        DROP TABLE IF EXISTS `sylius_user_oauth`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_user_oauth` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `user_id` int(11) DEFAULT NULL,
        `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        `refresh_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `user_provider` (`user_id`,`provider`),
        KEY `IDX_C3471B78A76ED395` (`user_id`),
        CONSTRAINT `FK_C3471B78A76ED395` FOREIGN KEY (`user_id`) REFERENCES `sylius_shop_user` (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_user_oauth`
        --

        LOCK TABLES `sylius_user_oauth` WRITE;
        /*!40000 ALTER TABLE `sylius_user_oauth` DISABLE KEYS */;
        /*!40000 ALTER TABLE `sylius_user_oauth` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_zone`
        --

        DROP TABLE IF EXISTS `sylius_zone`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_zone` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `type` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
        `scope` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_7BE2258E77153098` (`code`)
        ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_zone`
        --

        LOCK TABLES `sylius_zone` WRITE;
        /*!40000 ALTER TABLE `sylius_zone` DISABLE KEYS */;
        INSERT INTO `sylius_zone` VALUES (1,'z_tax_normal_20','Normal 20%','country','tax'),(2,'z_tax_normal_21','Normal 21%','country','tax'),(3,'z_shipping_zone_fr','Zone Shipping FR','country','shipping'),(4,'z_shipping_zone_be','Zone Shipping BE','country','shipping'),(5,'z_shipping_zone_gb','Zone Shipping GB','country','shipping'),(6,'z_meta_zone_fr','Meta Zone FR','zone','all'),(7,'z_meta_zone_gb','Meta Zone GB','zone','all');
        /*!40000 ALTER TABLE `sylius_zone` ENABLE KEYS */;
        UNLOCK TABLES;

        --
        -- Table structure for table `sylius_zone_member`
        --

        DROP TABLE IF EXISTS `sylius_zone_member`;
        /*!40101 SET @saved_cs_client     = @@character_set_client */;
        /*!40101 SET character_set_client = utf8 */;
        CREATE TABLE `sylius_zone_member` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `belongs_to` int(11) DEFAULT NULL,
        `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `UNIQ_E8B5ABF34B0E929B77153098` (`belongs_to`,`code`),
        KEY `IDX_E8B5ABF34B0E929B` (`belongs_to`),
        CONSTRAINT `FK_E8B5ABF34B0E929B` FOREIGN KEY (`belongs_to`) REFERENCES `sylius_zone` (`id`)
        ) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
        /*!40101 SET character_set_client = @saved_cs_client */;

        --
        -- Dumping data for table `sylius_zone_member`
        --

        LOCK TABLES `sylius_zone_member` WRITE;
        /*!40000 ALTER TABLE `sylius_zone_member` DISABLE KEYS */;
        INSERT INTO `sylius_zone_member` VALUES (1,1,'FR'),(3,1,'GB'),(2,1,'MC'),(4,2,'BE'),(5,3,'FR'),(6,3,'MC'),(7,4,'BE'),(8,5,'GB'),(9,6,'z_shipping_zone_be'),(10,6,'z_shipping_zone_fr'),(11,6,'z_tax_normal_20'),(12,6,'z_tax_normal_21'),(13,7,'z_shipping_zone_gb'),(14,7,'z_tax_normal_20'),(15,7,'z_tax_normal_21');
        /*!40000 ALTER TABLE `sylius_zone_member` ENABLE KEYS */;
        UNLOCK TABLES;
        /*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

        /*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
        /*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
        /*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
        /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
        /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
        /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
        /*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
        ");


    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
