CREATE TABLE `picture` (
	`id`             INT          NOT NULL AUTO_INCREMENT,
	`department_id`        INT          NOT NULL,
	`src`            VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`department_id`) REFERENCES `department` (`id`)
) CHARACTER SET=utf8mb4;
