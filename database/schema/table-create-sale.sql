CREATE TABLE `sale` (
	`id`             INT          NOT NULL AUTO_INCREMENT,
	`department_id`        INT          NOT NULL,
	`leader_id`     INT          NOT NULL,
	`date`           DATE         NOT NULL,
	`email`          VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`department_id`)    REFERENCES `department`    (`id`),
	FOREIGN KEY (`leader_id`) REFERENCES `leader` (`id`)
) CHARACTER SET=utf8mb4;
