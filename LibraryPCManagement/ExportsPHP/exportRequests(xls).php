

<?php

// Create Connection of Database
require 'C:\xampp\htdocs\LibraryPCManagement\databaseConnect.php';
// Fetch data from Users table
$result = mysqli_query($conn, 'SELECT * FROM request_table');

date_default_timezone_set('Asia/Manila');
$myDate = date('d-m-y h:i:s');

// Create header of excel
$content = '<p>Date and time: <span>'.$myDate.'</span>.</p>
<table><tr>
<th>Request ID</th>
<th>Student ID</th>
<th>Student Name</th>
<th>PC Number</th>
<th>Time Of Request</th>
<th>Request Status</th>
</tr>

';

// fetch all data with the help of mysqli_fetch_array
while ($row = mysqli_fetch_array($result)) {
    $content .= '<tr>';
    $content .= '<td>'.$row['requestID'].'</td>';
    $content .= '<td>'.$row['studentID'].'</td>';
    $content .= '<td>'.$row['studentName'].'</td>';
    $content .= '<td>'.$row['pcNumber'].'</td>';
    $content .= '<td>'.$row['timeOfRequest'].'</td>';
    $content .= '<td>'.$row['requestStatus'].'</td>';
    $content .= '<tr>';
}
$content .= '</table>';

// This code is use to create excel format
$file = 'Requests.xls';
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename='.$file);
echo $content;
exit;
?>
