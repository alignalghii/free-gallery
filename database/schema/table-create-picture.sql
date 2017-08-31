CREATE TABLE `picture` (
	`id`             INT          NOT NULL AUTO_INCREMENT,
	`flat_id`        INT          NOT NULL,
	`src`            VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`flat_id`) REFERENCES `flat` (`id`)
) CHARACTER SET=utf8mb4;
