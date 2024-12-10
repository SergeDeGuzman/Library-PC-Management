

<?php

// Create Connection of Database
require 'C:\xampp\htdocs\LibraryPCManagement\databaseConnect.php';
// Fetch data from Users table
$result = mysqli_query($conn, 'SELECT * FROM banunbanlogs_table');

date_default_timezone_set('Asia/Manila');
$myDate = date('d-m-y h:i:s');

// Create header of excel
$content = '<p>Date and time: <span>'.$myDate.'</span>.</p>
<table><tr>
<th>Ban ID</th>
<th>Student ID</th>
<th>Student Name</th>
<th>Status</th>
<th>Reason</th>
<th>Date Of Ban</th>
<th>Date Of Unban</th>
</tr>

';

// fetch all data with the help of mysqli_fetch_array
while ($row = mysqli_fetch_array($result)) {
    $content .= '<tr>';
    $content .= '<td>'.$row['banID'].'</td>';
    $content .= '<td>'.$row['studentID'].'</td>';
    $content .= '<td>'.$row['studentName'].'</td>';
    $content .= '<td>'.$row['status'].'</td>';
    $content .= '<td>'.$row['reason'].'</td>';
    $content .= '<td>'.$row['dateOfBan'].'</td>';
    $content .= '<td>'.$row['dateOfUnban'].'</td>';
    $content .= '<tr>';
}
$content .= '</table>';

// This code is use to create excel format
$file = 'Ban_Logs.doc';
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename='.$file);
echo $content;
exit;
?>
