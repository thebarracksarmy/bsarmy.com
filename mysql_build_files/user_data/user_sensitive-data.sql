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
