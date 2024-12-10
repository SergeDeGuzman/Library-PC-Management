<?php

require 'databaseConnect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Create connection
}
$sqlupdate = "Update studentstatus_table set reason='',status='PERMITTED' where studentID='$id' AND status ='BANNED'";
$sqlunban = "Update banunbanlogs_table set status='PERMITTED',dateOfUnban=curdate() where studentID='$id' AND status ='BANNED'";

$conn->query($sqlupdate);
$conn->query($sqlunban);

$conn->close();
