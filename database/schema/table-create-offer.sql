CREATE TABLE `offer` (
	`id`             INT          NOT NULL AUTO_INCREMENT,
	`flat_id`        INT          NOT NULL,
	`advisor_id`     INT          NOT NULL,
	`date`           DATE         NOT NULL,
	`email`          VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`flat_id`)    REFERENCES `flat`    (`id`),
	FOREIGN KEY (`advisor_id`) REFERENCES `advisor` (`id`)
) CHARACTER SET=utf8mb4;
