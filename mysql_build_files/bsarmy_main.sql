-- Create database to contain all the data
CREATE DATABASE `bsarmy_main` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Switch to the database
USE `bsarmy_main`;


-- Create table to contain non sensitive user data
CREATE TABLE `user_nonpii-data` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`last_login_epoch` INT NOT NULL,
	`username` TINYTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
	`name` TINYTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	`bio` VARCHAR(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '',
	`permissions` VARCHAR(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT '(superadmin)(forum)(na)(na)(na)(na)(# strikes)(bans)',
	`reputation` INT DEFAULT '0' COMMENT 'max is 10 million',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- Create table to contain sensitive user data

CREATE TABLE `user_sensitive-data` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`date_joined_epoch` INT NOT NULL,
	`email` TINYTEXT NOT NULL,
	`password_hash` VARCHAR(60) NOT NULL DEFAULT '0',
	`phone_number` INT,
	`pay_grade` CHAR(4),
	`military_branch` CHAR(8),
	`military_base_name` VARCHAR(30),
	`address_or_latlong` TINYTEXT,
	`random_string` VARCHAR(60) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;


-- Create table to contain admin data

CREATE TABLE `admin_logs` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`epoch_time` INT NOT NULL,
	`admin_username` TINYTEXT,
	`ip` TINYTEXT NOT NULL,
	`description` TEXT NOT NULL,
	`category` TINYTEXT,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;


CREATE USER 'username'@'localhost' identified by 'password';

GRANT SELECT, ALTER, INSERT, DELETE, UPDATE, CREATE ON bsarmy_main.* TO 'username'@'hostname';