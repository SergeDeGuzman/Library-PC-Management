<?php

require 'databaseConnect.php';

if (isset($_GET['reason'],$_GET['id'],$_GET['status'],$_GET['name'])) {
    $reason = $_GET['reason'];
    $id = $_GET['id'];
    $status = $_GET['status'];
    $name = $_GET['name'];
    // Create connection
}
$sqlupdate = "Update studentstatus_table set reason='$reason',status='BANNED' where studentID='$id'";

if ($status == 'PERMITTED') {
    $sqlinsert = "INSERT INTO banunbanlogs_table (studentID,studentName,status,reason,dateOfBan) 
VALUES ('$id','$name','BANNED','$reason',curdate())";
    $conn->query($sqlinsert);
}
if ($status == 'BANNED') {
    $sqlreason = "UPDATE banunbanlogs_table SET reason='$reason' where studentID='$id' AND status='BANNED'";
    $conn->query($sqlreason);
}
$conn->query($sqlupdate);

$conn->close();
