<?php
require 'databaseConnect.php';

include 'HeaderPage.php';
include 'clock.php';

?>
<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        #searchbtn {
        background-color: #fbeee0;
        border: 1px solid #422800;
        border-radius: 30px;
        box-shadow: #422800 4px 4px 0 0;
        color: #422800;
        cursor: pointer;
        display: inline-block;
        font-weight: 600;
        font-size: 18px;
        padding: 0 18px;
        line-height: 30px;
        text-align: center;
        text-decoration: none;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        position: relative;
        left: 30px;
        top: 100px;
        
        }

        #searchbtn:hover {
        background-color: #fff;
        }

        #searchbtn:active {
        box-shadow: #422800 2px 2px 0 0;
        transform: translate(2px, 2px);
        }

        @media (min-width: 768px) {
            #searchbtn {
            min-width: 120px;
            padding: 0 25px;
        }
        }
        #search {
            position: relative;
            left: 30px;
            top: 100px;
            height: 30px;
            width:20%;
            border-radius: 4px;
            padding-left: 12px;
            font-size: 14px;
            font-weight: normal;
            border: 1px solid rgb(137, 151, 155);
            transition: border-color 150ms ease-in-out 0s;
            outline: none;
            color: rgb(33, 49, 60);
            background-color: rgb(255, 255, 255);
            padding-right: 12px;
        }
        #search:hover{
        box-shadow: rgb(231 238 236) 0px 0px 0px 3px;
        }
        #logs {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            overflow: auto;
            position: relative;
            top: 110px;
        }

        #logs td,
        #logs th {
            border: 1px solid #ddd;
            padding: 8px;
            font-weight: bold;
        }

        #logs tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #logs tr:nth-child(odd) {
            background-color: #fff;
        }
        #logs tr:hover {
            background-color: #fbeee0;
            box-shadow: 0 0 30px #2e94e3;
        }

        #logs th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
        .title {
            color:white;
    display:flex; 
    justify-content: center;
    position: absolute;
  top: 66%;
  left: 50%;
  transform: translate(-50%, -50%);
    font-weight: bold;
}
.sort_label{
  color:white;
  position: relative;
  left: 50px;
  top: 100px;
}
.form_select {
  position: relative;
  left: 50px;
  top: 100px;
  height: 30px;
  width:8%;
  border-radius: 4px;
  padding-left: 12px;
  font-size: 14px;
  font-weight: 900;
  border: 1px solid rgb(137, 151, 155);
  transition: border-color 150ms ease-in-out 0s;
  outline: none;
  color: rgb(33, 49, 60);
  background-color: rgb(255, 255, 255);
  padding-right: 12px;
}
#sort2 {
  width:10%;
}
.export{
  text-decoration: none;
  position: relative;
  left: 600px;
  top: 100px;
}
#word {
  width:8%;
  border-radius: 4px;
  padding-left: 12px;
  font-size: 22px;
  font-weight: 900;
  border: 3px solid rgb(137, 151, 155);
  transition: border-color 150ms ease-in-out 0s;
  outline: none;
  color: white;
  background-color: #1B5EBE;
  padding-right: 12px;
}
#word:hover {
  opacity: .7;
}
#excel{
  
  border-radius: 4px;
  padding-left: 12px;
  font-size: 22px;
  font-weight: 900;
  border: 3px solid rgb(137, 151, 155);
  transition: border-color 150ms ease-in-out 0s;
  outline: none;
  color: white;
  background-color: #21a366;
  padding-right: 12px;
}
#excel:hover {
  opacity: .7;
}
    </style>

</head>
</script>
<body>
    <form action="librarianLogs.php" method="get">
        <input type="text" id="search" name="searchkeyword">
        <input type="submit" id="searchbtn" value="SEARCH KEYWORD">
        <label class="sort_label">Sort by:</label>  
        <select class="form_select" name="sort">
        <option value="empty" > </option>
          <option value="asc">ASCENDING</option>
          <option value="des">DESCENDING</option>
        </select>
        <select class="form_select" name="sort2" id="sort2">
        <option value="empty" > </option>
        <option value="logid">LOG ID</option>
          <option value="id">EMPLOYEE ID</option>
          <option value="name">EMPLOYEE NAME</option>
          <option value="in">LOG IN</option>
          <option value="out">LOG OUT</option>
        </select>
        <a href="ExportsPHP/exportLibrarianLogs(doc).php" class="export" id ="word" onclick="return confirm('Are you sure to export?')">WORD</a>
        <a href="ExportsPHP/exportLibrarianLogs(xls).php" class="export" id ="excel" onclick="return confirm('Are you sure to export?')">EXCEL</a>
        <?php

        // grab the searchkeyword
        if (isset($_GET['searchkeyword'],$_GET['sort'],$_GET['sort2'])) {
            $ss = $_GET['searchkeyword'];
            $sort = $_GET['sort'];
            $sort2 = $_GET['sort2'];
            if ($ss != '' && $sort == 'empty' && $sort2 == 'empty') {
                $sql = "Select * from librarianlogs_table where CONCAT(employeeID,employeeName,userType) like '%".$ss."%'";
            } elseif (($ss != '' || $ss == '') && $sort == 'asc' && $sort2 == 'logid') {
                $sql = "Select * from librarianlogs_table where CONCAT(employeeID,employeeName,userType) like '%".$ss."%' ORDER BY logID";
            } elseif (($ss != '' || $ss == '') && $sort == 'asc' && $sort2 == 'id') {
                $sql = "Select * from librarianlogs_table where CONCAT(employeeID,employeeName,userType) like '%".$ss."%' ORDER BY employeeID";
            } elseif (($ss != '' || $ss == '') && $sort == 'asc' && $sort2 == 'name') {
                $sql = "Select * from librarianlogs_table where CONCAT(employeeID,employeeName,userType) like '%".$ss."%' ORDER BY employeeName";
            } elseif (($ss != '' || $ss == '') && $sort == 'asc' && $sort2 == 'in') {
                $sql = "Select * from librarianlogs_table where CONCAT(employeeID,employeeName,userType) like '%".$ss."%' ORDER BY logIn";
            } elseif (($ss != '' || $ss == '') && $sort == 'asc' && $sort2 == 'out') {
                $sql = "Select * from librarianlogs_table where CONCAT(employeeID,employeeName,userType) like '%".$ss."%' ORDER BY logOut";
            } elseif (($ss != '' || $ss == '') && $sort == 'des' && $sort2 == 'logid') {
                $sql = "Select * from librarianlogs_table where CONCAT(employeeID,employeeName,userType) like '%".$ss."%' ORDER BY logID DESC";
            } elseif (($ss != '' || $ss == '') && $sort == 'des' && $sort2 == 'id') {
                $sql = "Select * from librarianlogs_table where CONCAT(employeeID,employeeName,userType) like '%".$ss."%' ORDER BY employeeID DESC";
            } elseif (($ss != '' || $ss == '') && $sort == 'des' && $sort2 == 'name') {
                $sql = "Select * from librarianlogs_table where CONCAT(employeeID,employeeName,userType) like '%".$ss."%' ORDER BY employeeName DESC";
            } elseif (($ss != '' || $ss == '') && $sort == 'des' && $sort2 == 'in') {
                $sql = "Select * from librarianlogs_table where CONCAT(employeeID,employeeName,userType) like '%".$ss."%' ORDER BY logIn DESC";
            } elseif (($ss != '' || $ss == '') && $sort == 'des' && $sort2 == 'out') {
                $sql = "Select * from librarianlogs_table where CONCAT(employeeID,employeeName,userType) like '%".$ss."%' ORDER BY logOut DESC";
            } else {
                $sql = 'Select * from librarianlogs_table;';
            }
        } else {
            $sql = 'Select * from librarianlogs_table;';
        }

        $result = $conn->query($sql);
echo '<label class="title">LIBRARIAN LOGS TAB</label>';
if ($result !== false && $result->num_rows > 0) {
    echo '<table id="logs">';
    echo '<tr>';
    echo '<th>Log ID</th>';
    echo '<th>Employee ID</th>';
    echo '<th>Employee Name</th>';
    echo '<th>User Type</th>';
    echo '<th>Log In</th>';
    echo '<th>Log Out</th>';
    echo '</tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<td>'.$row['logsID'].'</td>';
        echo '<td>'.$row['employeeID'].'</td>';
        echo '<td>'.$row['employeeName'].'</td>';
        echo '<td>'.$row['userType'].'</td>';
        echo '<td>'.$row['logIn'].'</td>';
        echo '<td>'.$row['logOut'].'</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'No results found';
}

// $conn->close();
?>
    </form>
</body>

</html>