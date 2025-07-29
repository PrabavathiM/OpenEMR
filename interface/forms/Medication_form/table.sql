CREATE TABLE IF NOT EXISTS `form_medication` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pid` INT NOT NULL,
  `encounter` INT NOT NULL,
  `user` VARCHAR(255),
  `date` DATETIME,
  `drug_name` VARCHAR(255),
  `dosage` VARCHAR(255),
  `route` VARCHAR(100),
  `frequency` VARCHAR(100),
  `start_date` DATE,
  `stop_date` DATE,
  `refills` INT,
  `status` VARCHAR(100),
  `discontinuation_reason` VARCHAR(255),
  `instructions` TEXT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
