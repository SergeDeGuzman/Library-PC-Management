<?php

require 'databaseConnect.php';
session_start();

$sql = 'Update librarianlogs_table set logOut = CURRENT_TIMESTAMP where logOut IS NULL ';
$result = $conn->query($sql);
session_unset();

session_destroy();

header('Location: login.html');
exit;
