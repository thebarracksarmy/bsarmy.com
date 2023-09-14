CREATE TABLE `admin_logs` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`epoch_time` INT NOT NULL,
	`admin_username` TINYTEXT,
	`description` TEXT NOT NULL,
	`category` TINYTEXT,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;