CREATE DATABASE toby_test;

use toby_test;

CREATE TABLE assignments (
		id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		assname VARCHAR(30) NOT NULL,
		class VARCHAR(50) NOT NULL,
		duedate VARCHAR(30),
	asstype VARCHAR(30),
		date TIMESTAMP
);