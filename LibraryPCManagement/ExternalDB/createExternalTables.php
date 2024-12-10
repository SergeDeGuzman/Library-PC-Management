<?php

$servername = 'localhost';
$username = 'LibraryPCSLOT';
$password = 'library_PCSLOT';

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    exit('Connection failed: '.$conn->connect_error);
}

// sql to create table
$sql = 'CREATE TABLE student_db.student_table (
studentID NVARCHAR(11) PRIMARY KEY,
studentName VARCHAR(255) NOT NULL
)';

$sql2 = 'CREATE TABLE employee_db.employee_table (
    employeeID NVARCHAR(11) PRIMARY KEY,
    userType VARCHAR(255) NOT NULL,
    employeeName VARCHAR(255) NOT NULL,
    employeeUsername NVARCHAR(255) NOT NULL,
    employeePassword NVARCHAR(255) NOT NULL
    )';

if ($conn->query($sql) === true) {
    echo 'Table student created successfully';
} else {
    echo 'Error creating table: '.$conn->error;
}

if ($conn->query($sql2) === true) {
    echo '<br>';
    echo 'Table employee created successfully';
} else {
    echo 'Error creating table: '.$conn->error;
}

$conn->close();
