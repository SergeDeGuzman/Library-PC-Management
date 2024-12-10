<?php

require 'databaseConnect.php';

$isPending = false;
if (isset($_GET['id'],$_GET['pc'],$_GET['stud'])) {
    $ID = $_GET['id'];
    $PC = $_GET['pc'];
    $STUD = $_GET['stud'];
}
$sqlacceptstatus = "Update request_table set requestStatus='ACCEPTED' where requestID=$ID AND requestStatus='PENDING'";
$sqlpc = "UPDATE pc_table set pcStatus ='OCCUPIED' where pcNumber=$PC";
$sqlsamepc = "Update request_table set requestStatus='REJECTED' where requestID!=$ID AND pcNumber =$PC AND requestStatus='PENDING'";
$sqlinsert = "INSERT INTO studentpcslot_table (studentID,studentName,pcNumber) SELECT studentID, studentName,pcNumber FROM request_table WHERE requestID=$ID";
// $sqltime = "UPDATE studentpcslot_table set timeIn =  where studentID = $STUD";
$conn->query($sqlacceptstatus);
$conn->query($sqlpc);
$conn->query($sqlsamepc);
$conn->query($sqlinsert);
// $conn->query($sqltime);
$conn->close();
