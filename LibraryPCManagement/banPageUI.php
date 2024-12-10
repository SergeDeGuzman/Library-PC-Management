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
        #ban {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            height: 2px;
            width: 100%;
            overflow: scroll;
            position: relative;
            top: 110px;
        }

        #ban td,
        #ban th {
            border: 1px solid #ddd;
            padding: 8px;
            font-weight: bold;
        }

        #ban tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        #ban tr:nth-child(odd) {
            background-color: #fff;
        }

        #ban tr:hover {
            background-color: #fbeee0;
            box-shadow: 0 0 30px #2e94e3;
        }

        #ban th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
.ban {
  align-items: center;
  background-clip: padding-box;
  background-color: #fa6400;
  border: 1px solid transparent;
  border-radius: .50rem;
  box-shadow: rgba(0, 0, 0, 0.02) 0 1px 3px 0;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-flex;
  font-family: system-ui,-apple-system,system-ui,"Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 16px;
  font-weight: 600;
  justify-content: center;
  line-height: 0px;
  min-height: 30px;
  padding: calc(.875rem - 1px) calc(1.5rem - 1px);
  position: relative;
  text-decoration: none;
  transition: all 250ms;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: baseline;
  width: auto;
}

.ban:hover,
.ban:focus {
  background-color: #fb8332;
  box-shadow: rgba(0, 0, 0, 0.1) 0 4px 12px;
}

.ban:hover {
  transform: translateY(-1px);
}

.ban:active {
  background-color: #c85000;
  box-shadow: rgba(0, 0, 0, .06) 0 2px 4px;
  transform: translateY(0);
}
.unban {
  align-items: center;
  background-clip: padding-box;
  background-color:#64E986;
  border: 1px solid transparent;
  border-radius: .50rem;
  box-shadow: rgba(0, 0, 0, 0.02) 0 1px 3px 0;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-flex;
  font-family: system-ui,-apple-system,system-ui,"Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 16px;
  font-weight: 600;
  justify-content: center;
  line-height: 0px;
  margin: 0;
  min-height: 30px;
  padding: calc(.875rem - 1px) calc(1.5rem - 1px);
  position: relative;
  text-decoration: none;
  transition: all 250ms;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: baseline;
  width: auto;
}

.unban:hover,
.unban:focus {
  background-color: #64E986;
  box-shadow: rgba(0, 0, 0, 0.1) 0 4px 12px;
}

.unban:hover {
  transform: translateY(-1px);
}

.unban:active {
  background-color: #64E986;
  box-shadow: rgba(0, 0, 0, .06) 0 2px 4px;
  transform: translateY(0);
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
    </style>

</head>
</script>
<body>
    <form action="banPageUI.php" method="get">
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
          <option value="id">STUDENT ID</option>
          <option value="name">STUDENT NAME</option>
        </select>
        
        <?php

        // grab the searchkeyword
        if (isset($_GET['searchkeyword'],$_GET['sort'],$_GET['sort2'])) {
            $ss = $_GET['searchkeyword'];
            $sort = $_GET['sort'];
            $sort2 = $_GET['sort2'];
            if ($ss != '' && $sort == 'empty' && $sort2 == 'empty') {
                $sql = "Select * from studentstatus_table where CONCAT(studentID,studentName,status) like '%".$ss."%'";
            } elseif (($ss != '' || $ss == '') && $sort == 'asc' && $sort2 == 'id') {
                $sql = "Select * from studentstatus_table where CONCAT(studentID,studentName,status) like '%".$ss."%' ORDER BY studentID";
            } elseif (($ss != '' || $ss == '') && $sort == 'asc' && $sort2 == 'name') {
                $sql = "Select * from studentstatus_table where CONCAT(studentID,studentName,status) like '%".$ss."%' ORDER BY studentName";
            } elseif (($ss != '' || $ss == '') && $sort == 'des' && $sort2 == 'id') {
                $sql = "Select * from studentstatus_table where CONCAT(studentID,studentName,status) like '%".$ss."%' ORDER BY studentID DESC";
            } elseif (($ss != '' || $ss == '') && $sort == 'des' && $sort2 == 'name') {
                $sql = "Select * from studentstatus_table where CONCAT(studentID,studentName,status) like '%".$ss."%' ORDER BY studentName DESC";
            } else {
                $sql = 'Select * from studentstatus_table;';
            }
        } else {
            $sql = 'Select * from studentstatus_table;';
        }

        $result = $conn->query($sql);
echo '<label class="title">BAN TAB</label>';
if ($result !== false && $result->num_rows > 0) {
    echo '<table id="ban">';
    echo '<tr>';
    echo '<th>Student ID</th>';
    echo '<th>Student Name</th>';
    echo '<th>Status</th>';
    echo '<th>Reason</th>';
    echo '<th>Action</th>';
    echo '</tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr studentID='.$row['studentID'].' name='.$row['studentName'].' status='.$row['status'].' >';
        echo '<td style="width:10%">'.$row['studentID'].'</td>';
        echo '<td style="width:15%">'.$row['studentName'].'</td>';
        echo '<td style="width:5%">'.$row['status'].'</td>';
        echo '<td >'.$row['reason'].'</td>';
        echo '<td style="width:17%"> <button class="ban" name="banbtn" >BAN</button>
                 | <button class="unban" name="unbanbtn">UNBAN</button>';
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
<script type="text/javascript">
    $(".ban").click(function() {
        var reason = prompt("Please enter the reason for the ban");
        var id = $(this).parents("tr").attr("studentID");
        var status = $(this).parents("tr").attr("status");
        var name = $(this).parents("tr").attr("name");
        if (reason != null && reason !="") {
            $.ajax({
                url: 'banStudent.php',
                type: 'GET',
                data: {
                    reason: reason,
                    id: id,
                    status: status,
                    name: name
                },
                error: function(req,err) {
                    //alert('Something is wrong');
                    console.log("error" + JSON.stringify(req));
                },
                success: function(data) {
                    //$("#"+id).remove();
                    alert("Student banned successfully");
                    console.log("SUCCESS");
                }
            })
        }
    });
</script>
<script type="text/javascript">
    $(".unban").click(function() {
        var id = $(this).parents("tr").attr("studentID");
        // alert(id);
        if (confirm("Are you sure you want to unban this student?")) {
            $.ajax({
                url: 'unbanStudent.php',
                type: 'GET',
                data: {
                    id: id
                },
                error: function(req,err) {
                    //alert('Something is wrong');
                    console.log("error" + JSON.stringify(req));
                },
                success: function(data) {
                    //$("#"+id).remove();
                    alert("Student unbanned successfully");
                    console.log("SUCCESS");
                }
            })
        }
    });
</script>

</html>