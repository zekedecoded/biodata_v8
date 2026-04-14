-- Create temp_person table (same structure as person table)
-- Run this in phpMyAdmin on the 'persondb' database

CREATE TABLE IF NOT EXISTS `temp_person` (
  `personID` INT AUTO_INCREMENT PRIMARY KEY,
  `lastname` VARCHAR(255) NOT NULL,
  `firstname` VARCHAR(255) NOT NULL,
  `middlename` VARCHAR(255) DEFAULT NULL,
  `suffix` VARCHAR(50) DEFAULT NULL,
  `mobile` VARCHAR(20) DEFAULT NULL,
  `email` VARCHAR(255) DEFAULT NULL,
  `dob` DATE DEFAULT NULL,
  `gender` VARCHAR(10) DEFAULT NULL,
  `marital_status` VARCHAR(50) DEFAULT NULL,
  `father_lastName` VARCHAR(255) DEFAULT NULL,
  `father_firstName` VARCHAR(255) DEFAULT NULL,
  `father_middleName` VARCHAR(255) DEFAULT NULL,
  `father_suffix` VARCHAR(50) DEFAULT NULL,
  `religion` VARCHAR(100) DEFAULT NULL,
  `lang_known` VARCHAR(255) DEFAULT NULL,
  `hobbiesName` VARCHAR(255) DEFAULT NULL,
  `street` VARCHAR(255) DEFAULT NULL,
  `barangay` VARCHAR(255) DEFAULT NULL,
  `city` VARCHAR(255) DEFAULT NULL,
  `province` VARCHAR(255) DEFAULT NULL,
  `skills` VARCHAR(255) DEFAULT NULL,
  `pfp` VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
