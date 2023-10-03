CREATE TABLE `user_data` (
	`id` int NOT NULL AUTO_INCREMENT,
	`username` tinytext NOT NULL,
	`name` tinytext NOT NULL,
	`date_joined_epoch` int NOT NULL,
	`phone_number` int NOT NULL,
	`phone_carrier` int NOT NULL,
	`military_branch` char(8) NOT NULL,
	`military_base_name` varchar(30) NOT NULL,
	`home_location` tinytext,
	`last_login_epoch` int,
	`user_bio` varchar(400),
	`user_permissions` int NOT NULL,
	`user_reputation` int NOT NULL DEFAULT '0',
	`user_pay_grade` char(4) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `events` (
	`id` int NOT NULL AUTO_INCREMENT UNIQUE,
	`owner_username` tinytext NOT NULL,
	`start_date_epoch` INT NOT NULL,
	`event_duration` INT NOT NULL,
	`event_description` TEXT NOT NULL,
	`event_location` tinytext NOT NULL,
	`number_rsvpd` int NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `listing` (
    `id` int NOT NULL AUTO_INCREMENT,
    `owner_username` tinytext NOT NULL,
    `title` tinytext NOT NULL,
    `description` tinytext NOT NULL,
    `start_date_epoch` int NOT NULL,
    `listing_duration` int NOT NULL,
    `listing_price` FLOAT NOT NULL,
    `listing_location` tinytext NOT NULL,
    `listing_location_radius` int NOT NULL,
    `listing_status` tinytext NOT NULL,
    `payment_method` int,
    PRIMARY KEY (`id`)
);

CREATE TABLE `listing_messages` (
	`id` int NOT NULL AUTO_INCREMENT,
	`listing_id` int NOT NULL,
	`sender_id` int NOT NULL,
	`message_epoch` int NOT NULL,
	`message` tinytext NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `session_data` (
	`session_id` varbinary(192) NOT NULL,
	`created_epoch` int(11) NOT NULL DEFAULT '0',
	`session_data` longtext NOT NULL,
	PRIMARY KEY (`session_id`)
);

ALTER TABLE `events` ADD CONSTRAINT `events_fk0` FOREIGN KEY (`id`) REFERENCES `user_data`(`username`);

ALTER TABLE `listing` ADD CONSTRAINT `listing_fk0` FOREIGN KEY (`owner_username`) REFERENCES `user_data`(`username`);

ALTER TABLE `listing` ADD CONSTRAINT `listing_fk1` FOREIGN KEY (`listing_location`) REFERENCES `user_data`(`home_location`);

ALTER TABLE `listing_messages` ADD CONSTRAINT `listing_messages_fk0` FOREIGN KEY (`listing_id`) REFERENCES `listing`(`id`);

ALTER TABLE `listing_messages` ADD CONSTRAINT `listing_messages_fk1` FOREIGN KEY (`sender_id`) REFERENCES `user_data`(`id`);

-- From https://erd.dbdesigner.net/designer/schema/1695956275-bs-army



