<?php

require 'databaseConnect.php';

if (isset($_GET['id'])) {
    $ID = $_GET['id'];
    // Create connection
}

$sqlupdate = "Update request_table set requestStatus='REJECTED' where requestID=$ID";

$conn->query($sqlupdate);

$conn->close();
