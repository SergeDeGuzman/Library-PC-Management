<?php

require 'C:\xampp\htdocs\LibraryPCManagement\diffDatabasesConnect.php';

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    exit('Connection failed: '.$conn->connect_error);
}

$sql = "INSERT INTO student_db.student_table (studentID,studentName)
VALUES ('2021-120048','Serge Trever B. De Guzman'),
('2022-135645','Christian Sydney Earl Gomez'),
('2023-122365','Ezekiel Ian Labradores'),
('2024-152341','Mark Anthony Galicia'),
('2018-123234', 'Aeuz Caranto'),
('2020-120323', 'Lhenard Trinidad'),
('2021-121467', 'Andrei Esquejo'),
('2015-115355', 'Benexisto Escobin'),
('2017-117001', 'Marielle Pamulaklakin'),
('2016-116594', 'Maricell Soriano')";
// $sql = 'INSERT INTO librarypc_db.studentstatus_table (studentID,status)
// SELECT (studentID,studentName) FROM student_db.student_table;';

$sql2 = "INSERT INTO employee_db.employee_table (employeeID,userType,employeeName,employeeUsername,employeePassword)
VALUES ('2014-231','Librarian','John Doe','johndoe19','johndoe19'),
('2017-251','Teacher','Joseph Santiago','josesan06','12345'),
('2018-353','Janitor','Helen Delos Reyes','hdr1991','hello_22'),
('2020-402','Admin','Sammuel Rodriguez','samrodri@gmail.com','samrodri-52')";

if ($conn->query($sql) === true) {
    echo 'Multiple student records successfully';
    echo '<br>';
} else {
    echo 'Error: '.$sql.'<br>'.$conn->error;
}

if ($conn->query($sql2) === true) {
    echo 'Multiple employee records created successfully';
} else {
    echo 'Error: '.$sql.'<br>'.$conn->error;
}
$conn->close();
