-- 1. Create Database if it doesn't exist
CREATE DATABASE IF NOT EXISTS customers;
USE customers;

-- 2. Create Donors Table (Optimized for performance)
CREATE TABLE IF NOT EXISTS donors (
    id int AUTO_INCREMENT PRIMARY KEY, 
    fname varchar(255) NOT NULL, 
    lname varchar(255) NOT NULL, 
    mobileno BIGINT UNIQUE, -- Mobileno UNIQUE ga undali
    city varchar(255) NOT NULL, 
    bfrom date, 
    bto date, 
    dob date, 
    bloodgroup varchar(255) NOT NULL
);

-- 3. Sample Data for Donors
-- INSERT IGNORE vadatam valla duplicates unte error rakunda skip avtayi
INSERT IGNORE INTO donors (fname, lname, mobileno, city, bfrom, bto, dob, bloodgroup) VALUES 
('Srikanth', 'Koraveni', '9000736060', 'Pune', '2022-09-28', '2022-12-28', '1998-05-22', 'O_Positive'), 
('Prashanth', 'Katkam', '7989919097', 'Mumbai', '2022-09-17', '2022-11-18', '1998-09-30', 'O_Positive'), 
('Kranthi', 'Khaitha', '9876789871', 'Bangalore', '2022-09-16', '2022-11-08', '1996-07-02', 'B_Positive'), 
('Srinivas', 'Thota', '9812789411', 'Mumbai', '2022-09-18', '2022-10-31', '1992-07-22', 'O_Positive'), 
('Pandya', 'Loka', '9877787887', 'Mumbai', '2022-09-18', '2022-10-09', '1992-07-22', 'B_Positive'), 
('Prajodh', 'Shreya', '9812444411', 'Mumbai', '2022-08-23', '2022-10-31', '1992-07-22', 'B_Positive'), 
('Srinivas', 'Thota', '9812723411', 'Mumbai', '2022-04-19', '2022-10-07', '1992-07-22', 'B_Positive'), 
('Zaheer', 'Khan', '7788678987', 'Chennai', '2022-09-11', '2022-12-19', '1998-11-11', 'A_Positive');

-- 4. Create Users Table with UNIQUE username constraint (Main Fix)
CREATE TABLE IF NOT EXISTS users ( 
    id int AUTO_INCREMENT PRIMARY KEY,
    username varchar(80) NOT NULL UNIQUE, -- Ikkada UNIQUE add chesam, duplicates raavu
    name varchar(80) NOT NULL, 
    password varchar(80) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 5. Sample Data for Users
INSERT IGNORE INTO `users` (`username`, `name`, `password`) VALUES
('yssyogesh', 'Yogesh Singh', '12345'),
('bsonarika', 'Sonarika Bhadoria', '12345'),
('vishal', 'Vishal Sahu', '12345'),
('prashanth', 'Prashanth Katkam', '12345'),
('vijay', 'Vijay mourya', '12345');

-- 6. Set Privileges
-- Root user ki external access and permissions grant chestunnam
GRANT ALL PRIVILEGES ON customers.* TO 'root'@'%';
FLUSH PRIVILEGES;
