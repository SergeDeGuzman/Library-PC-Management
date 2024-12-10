<?php

require 'databaseConnect.php';

// sql to create table
$sql = 'CREATE TABLE PC_Table (
    pcNumber INT(2) NOT NULL PRIMARY KEY,
    pcStatus VARCHAR(40) NOT NULL
    );';

$sql .= 'CREATE TABLE StudentStatus_Table (
    studentID NVARCHAR(11) NOT NULL,
    studentName VARCHAR(355) NOT NULL,
    status VARCHAR(40) NOT NULL,
    reason VARCHAR(355) NOT NULL
    );';

$sql .= 'CREATE TABLE Request_Table (
requestID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
studentID NVARCHAR(11) NOT NULL,
studentName VARCHAR(355) NOT NULL,
timeOfRequest TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
pcNumber INT(2),
requestStatus VARCHAR(355) NOT NULL
);';

$sql .= 'CREATE TABLE librarianLogs_Table (
    logsID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    employeeID NVARCHAR(11) NOT NULL,
    employeeName VARCHAR(255) NOT NULL,
    userType VARCHAR(255) NOT NULL,
    logIn TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    logOut TIMESTAMP NULL
    );';

$sql .= 'CREATE TABLE StudentPCSlot_Table (
    studentID NVARCHAR(11) NOT NULL,
    studentName VARCHAR(355) NOT NULL,
    timeIn TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    pcNumber INT(2) NOT NULL
    );';

$sql .= 'CREATE TABLE Logs_Table (
    logID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    studentID NVARCHAR(11) NOT NULL,
    studentName VARCHAR(355) NOT NULL,
    timeIn TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    pcNumber INT(2) NOT NULL,
    timeOut TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );';

$sql .= 'CREATE TABLE BanUnbanLogs_Table (
    banID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    studentID NVARCHAR(11) NOT NULL,
    studentName VARCHAR(355) NOT NULL,
    status VARCHAR(40) NOT NULL,
    reason VARCHAR(355) NOT NULL,
    dateOfBan date,
    dateOfUnban date
    );';

$conn->multi_query($sql);

$conn->close();

$conn1 = new mysqli($servername, $username, $password, $dbname);

$sqlinsert = 'INSERT INTO pc_table (pcNumber, pcStatus) VALUES (1,"AVAILABLE"),
(2,"AVAILABLE"),
(3,"AVAILABLE"),
(4,"AVAILABLE"),
(5,"AVAILABLE"),
(6,"AVAILABLE"),
(7,"AVAILABLE"),
(8,"AVAILABLE"),
(9,"AVAILABLE"),
(10,"AVAILABLE");';

$sqlinsert2 = 'INSERT INTO studentstatus_table (studentID,studentName)
SELECT * FROM student_db.student_table;';

$sqlupdate = "UPDATE studentstatus_table set status ='PERMITTED';";

$conn1->query($sqlinsert);
$conn1->query($sqlinsert2);
$conn1->query($sqlupdate);
$conn1->close();
