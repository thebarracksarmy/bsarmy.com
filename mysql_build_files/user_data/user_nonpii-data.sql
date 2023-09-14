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
