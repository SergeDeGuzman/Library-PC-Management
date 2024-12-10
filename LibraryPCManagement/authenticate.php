<?php

require 'diffDatabasesConnect.php';
session_start();
$incorrect = '';
$container = '';
if (isset($_POST['uname']) && isset($_POST['psw'])) {
    $u = $_POST['uname'];
    $p = $_POST['psw'];
    $sql = "SELECT * FROM employee_db.employee_table where employeeUsername ='".$u."' and employeePassword ='".$p."' and (userType ='Librarian' or userType = 'Admin');";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $_SESSION['employeeName'] = $row['employeeName'];
        $_SESSION['userType'] = $row['userType'];
        $_SESSION['employeeID'] = $row['employeeID'];
        $id = $row['employeeID'];
        $name = $row['employeeName'];
        $user = $row['userType'];
        $sql = "INSERT INTO librarypc_db.librarianlogs_table (employeeID, employeeName,userType)
                VALUES ('$id','$name','$user')";
        $insert = $conn->query($sql);
        header('Location: requestUI.php');
    } else {
        $sql = "SELECT * FROM employee_db.employee_table where employeeUsername ='".$u."' and employeePassword ='".$p."';";
        $result = mysqli_query($conn, $sql);
        while ($rowCatData = mysqli_fetch_array($result)) {
            $container = $rowCatData['userType'];
        }

        if ($container != '' && ($u != '' && $p != '')) {
            $incorrect = 'Must be a specific employee';
            include 'login.html';
            exit;
        } else {
            $incorrect = 'Incorrect username or password';
            include 'login.html';
            exit;
        }

        exit;
    }
}
