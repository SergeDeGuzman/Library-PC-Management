

<?php

// Create Connection of Database
require 'C:\xampp\htdocs\LibraryPCManagement\databaseConnect.php';
// Fetch data from Users table
$result = mysqli_query($conn, 'SELECT * FROM librarianlogs_table');

date_default_timezone_set('Asia/Manila');
$myDate = date('d-m-y h:i:s');

// Create header of excel
$content = '<p>Date and time: <span>'.$myDate.'</span>.</p>
<table><tr>
<th>Logs ID</th>
<th>Employee ID</th>
<th>Employee Name</th>
<th>User Type</th>
<th>Log In</th>
<th>Log Out</th>
</tr>

';

// fetch all data with the help of mysqli_fetch_array
while ($row = mysqli_fetch_array($result)) {
    $content .= '<tr>';
    $content .= '<td>'.$row['logsID'].'</td>';
    $content .= '<td>'.$row['employeeID'].'</td>';
    $content .= '<td>'.$row['employeeName'].'</td>';
    $content .= '<td>'.$row['userType'].'</td>';
    $content .= '<td>'.$row['logIn'].'</td>';
    $content .= '<td>'.$row['logOut'].'</td>';
    $content .= '<tr>';
}
$content .= '</table>';

// This code is use to create excel format
$file = 'Librarian_Logs.doc';
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename='.$file);
echo $content;
exit;
?>
