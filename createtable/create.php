<?php 
include('../connection/database_connection.php');

//include('../connection/function.php');

$query = 'CREATE TABLE IF NOT EXISTS patient (
patient_id INTEGER NOT NULL AUTO_INCREMENT,
PRIMARY KEY(patient_id),
patient_name VARCHAR(55) NOT NULL,
phone_number VARCHAR(15) NOT NULL,
email VARCHAR(55) NOT NULL,
county VARCHAR(15) NOT NULL,
location VARCHAR(55) NOT NULL,
latitude decimal(6,4) NOT NULL,
longitude decimal(6,4) NOT NULL,
password VARCHAR(50) NOT NULL,
doctor_id INTEGER,
FOREIGN KEY(doctor_id) REFERENCES doctor(doctor_id),
date_registered timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)
ENGINE=MyISAM';

$statement = $connect->prepare($query);

$statement->execute();

$query = 'CREATE TABLE IF NOT EXISTS hospital (
hospital_id INTEGER NOT NULL AUTO_INCREMENT,
PRIMARY KEY(hospital_id),
hospital_name VARCHAR(55) NOT NULL,
hospital_category VARCHAR(20) NOT NULL,
county VARCHAR(15) NOT NULL,
tel_number VARCHAR(55) NOT NULL,
location VARCHAR(55) NOT NULL,
latitude decimal(6,4) NOT NULL,
longitude decimal(6,4) NOT NULL,
date_registered timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)
ENGINE=MyISAM';

$statement = $connect->prepare($query);

$statement->execute();

$query = 'CREATE TABLE IF NOT EXISTS doctor (
doctor_id INTEGER NOT NULL AUTO_INCREMENT,
PRIMARY KEY(doctor_id ),
doctor_name VARCHAR(55) NOT NULL,
phone_number VARCHAR(15) NOT NULL,
email VARCHAR(55) NOT NULL,
password VARCHAR(50) NOT NULL,
hospital_id INTEGER,
date_registered timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
FOREIGN KEY(hospital_id) REFERENCES hospital(hospital_id)
)
ENGINE=MyISAM';

$statement = $connect->prepare($query);

$statement->execute();

$query = 'CREATE TABLE IF NOT EXISTS patient_data (
data_id INTEGER NOT NULL AUTO_INCREMENT,
PRIMARY KEY(data_id ),
temperature FLOAT NOT NULL,
description TINYTEXT NOT NULL,
symptoms VARCHAR(100) NOT NULL,
patient_id INTEGER,
date_updated DATE NOT NULL,
time_updated TIME NOT NULL,
FOREIGN KEY(patient_id) REFERENCES patient(patient_id)
)
ENGINE=MyISAM';

$statement = $connect->prepare($query);

$statement->execute();



$query = 'CREATE TABLE IF NOT EXISTS chat(
chat_id INTEGER NOT NULL AUTO_INCREMENT,
PRIMARY KEY(chat_id),
message VARCHAR(255) NOT NULL,
msg_status INTEGER NOT NULL,
sent_by VARCHAR(10) NOT NULL,
date_sent timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
patient_id INTEGER,
FOREIGN KEY(patient_id) REFERENCES patient(patient_id),
doctor_id INTEGER,
FOREIGN KEY(doctor_id) REFERENCES doctor(doctor_id)
)
ENGINE=MyISAM';

$statement = $connect->prepare($query);

$statement->execute();


$query = 'CREATE TABLE IF NOT EXISTS admin (
admin_id INTEGER NOT NULL AUTO_INCREMENT,
PRIMARY KEY(admin_id ),
admin_name VARCHAR(55) NOT NULL,
phone_number VARCHAR(15) NOT NULL,
email VARCHAR(55) NOT NULL,
password VARCHAR(50) NOT NULL,
date_registered timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)
ENGINE=MyISAM';

$statement = $connect->prepare($query);

$statement->execute();
?>