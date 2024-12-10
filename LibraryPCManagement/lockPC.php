<?php

require 'databaseConnect.php';

if (isset($_GET['pc'])) {
    $PC = $_GET['pc'];
}
$sqllog = "INSERT INTO logs_table (studentID, studentName,timeIn,pcNumber) SELECT studentID, studentName,timeIn, pcNumber FROM studentpcslot_table WHERE pcNumber=$PC";
$sqlupdate = "Update pc_table set pcStatus='AVAILABLE' where pcNumber=$PC";
$sqldelete = "DELETE FROM studentpcslot_table WHERE pcNumber=$PC";
$conn->query($sqllog);
$conn->query($sqlupdate);
$conn->query($sqldelete);

$conn->close();
