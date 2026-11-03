CREATE DATABASE gym_management;

USE gym_management;

CREATE TABLE users(
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50),
email VARCHAR(100),
password VARCHAR(255)
);

CREATE TABLE members(
id INT AUTO_INCREMENT PRIMARY KEY,
full_name VARCHAR(100),
age INT,
gender VARCHAR(10),
membership_type VARCHAR(50),
joining_date DATE
);