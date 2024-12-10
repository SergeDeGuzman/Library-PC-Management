<?php

require 'diffDatabasesConnect.php';

$studentID = $_POST['studentID'];
$pcNumber = $_POST['pcNumber'];
$studentName = '';
$requestStatus = '';
$pcStatus = '';
$inUse = '';
$isBan = '';
$condition = '';
// Create connection

$query = 'SELECT * FROM student_db.student_table WHERE studentID = "'.$studentID.'"';
$result = mysqli_query($conn, $query);

if (!$result) {
    exit('Could not found');
}

if (mysqli_num_rows($result) > 0) {
    while ($rowCatData = mysqli_fetch_array($result)) {
        // echo $rowCatData['studentID'].'<br>';
        // echo $rowCatData['studentNAME'].'<br>';
        $studentName = $rowCatData['studentName'];
    }
}
$query1 = 'SELECT * FROM librarypc_db.request_table WHERE studentID = "'.$studentID.'"';
$result1 = mysqli_query($conn, $query1);

if (mysqli_num_rows($result) > 0) {
    while ($rowCatData = mysqli_fetch_array($result1)) {
        // echo $rowCatData['studentID'].'<br>';
        // echo $rowCatData['studentNAME'].'<br>';
        $requestStatus = $rowCatData['requestStatus'];
    }
}
$query2 = 'SELECT * FROM librarypc_db.pc_table WHERE pcNumber = "'.$pcNumber.'"';
$result2 = mysqli_query($conn, $query2);

if (mysqli_num_rows($result) > 0) {
    while ($rowCatData = mysqli_fetch_array($result2)) {
        // echo $rowCatData['studentID'].'<br>';
        // echo $rowCatData['studentNAME'].'<br>';
        $pcStatus = $rowCatData['pcStatus'];
    }
}

$query3 = 'SELECT * FROM librarypc_db.studentpcslot_table WHERE studentID = "'.$studentID.'"';
$result3 = mysqli_query($conn, $query3);

if (mysqli_num_rows($result) > 0) {
    while ($rowCatData = mysqli_fetch_array($result3)) {
        // echo $rowCatData['studentID'].'<br>';
        // echo $rowCatData['studentNAME'].'<br>';
        $inUse = $rowCatData['studentID'];
    }
}

$query4 = 'SELECT * FROM librarypc_db.studentstatus_table WHERE studentID = "'.$studentID.'"';
$result3 = mysqli_query($conn, $query4);

if (mysqli_num_rows($result) > 0) {
    while ($rowCatData = mysqli_fetch_array($result3)) {
        // echo $rowCatData['studentID'].'<br>';
        // echo $rowCatData['studentNAME'].'<br>';
        $isBan = $rowCatData['status'];
    }
}

if ($studentName == '') {
    $condition = 'NOT DETECTED';
    include 'studentTimeInForm.html';
    exit;
} else {
    if ($requestStatus == 'PENDING') {
        $condition = 'STUDENT ALREADY REQUESTED';
        include 'studentTimeInForm.html';
        exit;
    } else {
        if ($pcStatus == 'OCCUPIED') {
            $condition = 'PC ALREADY OCCUPIED';
            include 'studentTimeInForm.html';
            exit;
        } else {
            if ($inUse == $studentID) {
                $condition = 'STUDENT ALREADY USING A PC';
                include 'studentTimeInForm.html';
                exit;
            } else {
                if ($isBan == 'BANNED') {
                    $condition = 'STUDENT IS CURRENTLY BANNED';
                    include 'studentTimeInForm.html';
                    exit;
                } else {
                    $condition = 'REQUEST SUBMITTED';
                    $sql = "INSERT INTO librarypc_db.request_table (studentID, studentName, pcNumber, requestStatus)
                VALUES ('$studentID','$studentName','$pcNumber','PENDING')";
                    include 'studentTimeInForm.html';

                    $result1 = mysqli_query($conn, $sql);
                }
            }
        }
    }
}

$conn->close();
