CREATE DATABASE IF NOT EXISTS `home_service`;
USE home_service;

CREATE TABLE IF NOT EXISTS `customer`(
  `uid` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (uid)
);

CREATE TABLE IF NOT EXISTS `orders`(
  `oid` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer` int UNSIGNED NOT NULL,
  `worker` int UNSIGNED,
  `address` varchar(100) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `job` varchar(300) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `rating` int NOT NULL DEFAULT 5,
  `price` int NOT NULL,
  PRIMARY KEY (oid)
);

CREATE TABLE IF NOT EXISTS `worker` (
  `uid` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `healthy` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (uid)
);