CREATE DATABASE IF NOT EXISTS `home_service`;
USE home_service;

CREATE TABLE IF NOT EXISTS `customer`(
  `uid` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100),
  `city` varchar(50),
  `state` varchar(50),
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (uid)
);

CREATE TABLE IF NOT EXISTS `orders`(
  `oid` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer` int UNSIGNED NOT NULL,
  `worker` int UNSIGNED NOT NULL DEFAULT 0,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `start` time,
  `end` time,
  `subject` varchar(100),
  `message` varchar(100),
  `comment` varchar(300),
  `rating` int,
  `price` int,
  `status` varchar(10) NOT NULL DEFAULT 'notpaid',
  PRIMARY KEY (oid)
);

CREATE TABLE IF NOT EXISTS `worker` (
  `uid` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `city` varchar(50),
  `state` varchar(50),
  `price` int UNSIGNED NOT NULL,
  `rating` decimal(3,2) NOT NULL DEFAULT 5.0,
  `healthy` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (uid)
);

CREATE TABLE IF NOT EXISTS `image` (
  `imageid` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `worker` int UNSIGNED NOT NULL,
  `image` varchar(32) NOT NULL,
  `type` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `result` tinyint(1),
  `reviewer` int UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (imageid)
);

CREATE TABLE IF NOT EXISTS `admin`(
  `uid` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (uid)
);