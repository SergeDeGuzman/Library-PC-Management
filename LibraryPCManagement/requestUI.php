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
                
         /* #searchbtn {
            position: relative;
            left: 30px;
            top: 45px;
            height: 30px;
            width:20%;
            background: #B9DFFF;
            color: #000000;
            border: 1px solid #eee;
            border-radius: 20px;
            box-shadow: 5px 5px 5px #eee;
            text-shadow: none;
            
        } */
        /* #searchbtn:hover {
            background: #016ABC;
            color: #fff;
            border: 1px solid #eee;
            border-radius: 20px;
            box-shadow: 5px 5px 5px #eee;
            text-shadow: none;
            cursor: pointer;
        }  */
        #request {
            font-family: Arial, Helvetica, sans-serif;
            position: relative;
            top: 110px;
            border-collapse: collapse;
            width: 100%;
            overflow-y: scroll;
        }

        #request td,
        #request th {
            border: 1px solid #ddd;
            padding: 8px;
            font-weight: bold;
        }

        #request tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        #request tr:nth-child(odd) {
            background-color: #fff;
        }

        #request tr:hover {
            background-color: #fbeee0;
            box-shadow: 0 0 30px #2e94e3;
        }

        #request th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
            position: -webkit-sticky;
            position: sticky;
        }
.accept {
  align-items: center;
  appearance: none;
  background-clip: padding-box;
  background-color: initial;
  background-image: none;
  border-style: none;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  flex-direction: row;
  flex-shrink: 0;
  font-family: Eina01,sans-serif;
  font-size: 16px;
  font-weight: 800;
  justify-content: center;
  line-height: 1px;
  margin: 0;
  min-height: 30px;
  outline: none;
  overflow: visible;
  padding: 19px 26px;
  pointer-events: auto;
  position: relative;
  text-align: center;
  text-decoration: none;
  text-transform: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  width: auto;
  word-break: keep-all;
  z-index: 0;
}

@media (min-width: 768px) {
  .button-77 {
    padding: 19px 32px;
  }
}

.accept:before,
.accept:after {
  border-radius: 80px;
}

.accept:before {
  background-color: rgba(249, 58, 19, .32);
  content: "";
  display: block;
  height: 100%;
  left: 0;
  overflow: hidden;
  position: absolute;
  top: 0;
  width: 100%;
  z-index: -2;
}

.accept:after {
  background-color: initial;
  background-image: linear-gradient(92.83deg, #008000 0, #008000 100%);
  bottom: 4px;
  content: "";
  display: block;
  left: 4px;
  overflow: hidden;
  position: absolute;
  right: 4px;
  top: 4px;
  transition: all 100ms ease-out;
  z-index: -1;
}

.accept:hover:not(:disabled):after {
  bottom: 0;
  left: 0;
  right: 0;
  top: 0;
  transition-timing-function: ease-in;
}

.accept:active:not(:disabled) {
  color: #ccc;
}

.accept:active:not(:disabled):after {
  background-image: linear-gradient(0deg, rgba(0, 0, 0, .2), rgba(0, 0, 0, .2)), linear-gradient(92.83deg, #32CD32 0, #32CD32 100%);
  bottom: 4px;
  left: 4px;
  right: 4px;
  top: 4px;
}

.accept:disabled {
  cursor: default;
  opacity: .24;
}

.reject {
  align-items: center;
  appearance: none;
  background-clip: padding-box;
  background-color: initial;
  background-image: none;
  border-style: none;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  flex-direction: row;
  flex-shrink: 0;
  font-family: Eina01,sans-serif;
  font-size: 16px;
  font-weight: 800;
  justify-content: center;
  line-height: 1px;
  margin: 0;
  min-height: 30px;
  outline: none;
  overflow: visible;
  pointer-events: auto;
  position: relative;
  text-align: center;
  text-decoration: none;
  text-transform: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  width: auto;
  word-break: keep-all;
  z-index: 0;
}

@media (min-width: 768px) {
  .reject {
    padding: 19px 32px;
  }
}

.reject:before,
.reject:after {
  border-radius: 80px;
}

.reject:before {
  background-image: linear-gradient(92.83deg, #ff7426 0, #f93a13 100%);
  content: "";
  display: block;
  height: 100%;
  left: 0;
  overflow: hidden;
  position: absolute;
  top: 0;
  width: 100%;
  z-index: -2;
}

.reject:after {
  background-color: initial;
  background-image: linear-gradient(#541a0f 0, #0c0d0d 100%);
  bottom: 4px;
  content: "";
  display: block;
  left: 4px;
  overflow: hidden;
  position: absolute;
  right: 4px;
  top: 4px;
  transition: all 100ms ease-out;
  z-index: -1;
}

.reject:hover:not(:disabled):before {
  background: linear-gradient(92.83deg, rgb(255, 116, 38) 0%, rgb(249, 58, 19) 100%);
}

.reject:hover:not(:disabled):after {
  bottom: 0;
  left: 0;
  right: 0;
  top: 0;
  transition-timing-function: ease-in;
  opacity: 0;
}

.reject:active:not(:disabled) {
  color: #ccc;
}

.reject:active:not(:disabled):before {
  background-image: linear-gradient(0deg, rgba(0, 0, 0, .2), rgba(0, 0, 0, .2)), linear-gradient(92.83deg, #ff7426 0, #f93a13 100%);
}

.reject:active:not(:disabled):after {
  background-image: linear-gradient(#541a0f 0, #0c0d0d 100%);
  bottom: 4px;
  left: 4px;
  right: 4px;
  top: 4px;
}

.reject:disabled {
  cursor: default;
  opacity: .24;
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
  display: relative;
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
    
    <form action="requestUI.php" method="get">
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
        <option value="reqid">REQUEST ID</option>
          <option value="id">STUDENT ID</option>
          <option value="name">STUDENT NAME</option>
          <option value="time">TIME OF REQUEST</option>
          <option value="pc">PC NUMBER</option>
        </select>
        <a href="ExportsPHP/exportRequests(doc).php" class="export" id ="word" onclick="return confirm('Are you sure to export?')">WORD</a>
        <a href="ExportsPHP/exportRequests(xls).php" class="export" id ="excel" onclick="return confirm('Are you sure to export?')">EXCEL</a>
        
        <?php

// grab the searchkeyword
if (isset($_GET['searchkeyword'],$_GET['sort'],$_GET['sort2'])) {
    $ss = $_GET['searchkeyword'];
    $sort = $_GET['sort'];
    $sort2 = $_GET['sort2'];
    if ($ss != '' && $sort == 'empty' && $sort2 == 'empty') {
        $sql = "Select * from request_table where CONCAT(studentID,studentName,requestStatus) like '%".$ss."%'";
    } elseif (($ss != '' || $ss == '') && $sort == 'asc' && $sort2 == 'reqid') {
        $sql = "Select * from request_table where CONCAT(studentID,studentName,requestStatus) like '%".$ss."%' ORDER BY requestID";
    } elseif (($ss != '' || $ss == '') && $sort == 'asc' && $sort2 == 'id') {
        $sql = "Select * from request_table where CONCAT(studentID,studentName,requestStatus) like '%".$ss."%' ORDER BY studentID";
    } elseif (($ss != '' || $ss == '') && $sort == 'asc' && $sort2 == 'name') {
        $sql = "Select * from request_table where CONCAT(studentID,studentName,requestStatus) like '%".$ss."%' ORDER BY studentName";
    } elseif (($ss != '' || $ss == '') && $sort == 'asc' && $sort2 == 'time') {
        $sql = "Select * from request_table where CONCAT(studentID,studentName,requestStatus) like '%".$ss."%' ORDER BY timeOfRequest";
    } elseif (($ss != '' || $ss == '') && $sort == 'asc' && $sort2 == 'pc') {
        $sql = "Select * from request_table where CONCAT(studentID,studentName,requestStatus) like '%".$ss."%' ORDER BY pcNumber";
    } elseif (($ss != '' || $ss == '') && $sort == 'des' && $sort2 == 'reqid') {
        $sql = "Select * from request_table where CONCAT(studentID,studentName,requestStatus) like '%".$ss."%' ORDER BY requestID DESC";
    } elseif (($ss != '' || $ss == '') && $sort == 'des' && $sort2 == 'id') {
        $sql = "Select * from request_table where CONCAT(studentID,studentName,requestStatus) like '%".$ss."%' ORDER BY studentID DESC";
    } elseif (($ss != '' || $ss == '') && $sort == 'des' && $sort2 == 'name') {
        $sql = "Select * from request_table where CONCAT(studentID,studentName,requestStatus) like '%".$ss."%' ORDER BY studentName DESC";
    } elseif (($ss != '' || $ss == '') && $sort == 'des' && $sort2 == 'time') {
        $sql = "Select * from request_table where CONCAT(studentID,studentName,requestStatus) like '%".$ss."%' ORDER BY timeOfRequest DESC";
    } elseif (($ss != '' || $ss == '') && $sort == 'des' && $sort2 == 'pc') {
        $sql = "Select * from request_table where CONCAT(studentID,studentName,requestStatus) like '%".$ss."%' ORDER BY pcNumber DESC";
    } else {
        $sql = 'Select * from request_table WHERE requestStatus = "PENDING";';
    }
} else {
    $sql = 'Select * from request_table WHERE requestStatus = "PENDING";';
}

echo '<label class="title">REQUEST TAB</label>';
$result = $conn->query($sql);

if ($result !== false && $result->num_rows > 0) {
    echo '<table id="request">';
    echo '<tr>';
    echo '<th>RequestID</th>';
    echo '<th>StudentID</th>';
    echo '<th>Name</th>';
    echo '<th>Time Of Request</th>';
    echo '<th>pcNumber</th>';
    echo '<th>Status</th>';
    echo '<th>Action</th>';
    echo '</tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr requestID='.$row['requestID'].' pcNumber='.$row['pcNumber'].' studentID='.$row['studentID'].'>';
        echo '<td>'.$row['requestID'].'</td>';
        echo '<td>'.$row['studentID'].'</td>';
        echo '<td>'.$row['studentName'].'</td>';
        echo '<td>'.$row['timeOfRequest'].'</td>';
        echo '<td>'.$row['pcNumber'].'</td>';
        echo '<td>'.$row['requestStatus'].'</td>';
        if ($row['requestStatus'] == 'PENDING') {
            echo '<td style="width:17%"> <button class="accept" name="acceptbtn">ACCEPT</button>
                 | <button class="reject" name="rejectbtn">REJECT</button>';
        }
        echo '</tr>';
    }
    echo '</table>';
} else {
}

// $conn->close();
?>
    </form>
</body>
<script type="text/javascript">
    $(".accept").click(function() {
        var id = $(this).parents("tr").attr("requestID");
        var pc = $(this).parents("tr").attr("pcNumber");
        var stud = $(this).parents("tr").attr("studentID");
        
        // alert(id);
        // alert(pc);
        // alert(stud);
        
        if (confirm("Are you sure you want to accept this request?")) {
            $.ajax({
                url: 'acceptRequest.php',
                type: 'GET',
                data: {
                    id: id,
                    pc: pc,
                    stud: stud
                    
                },
                error: function(req,err) {
                    //alert('Something is wrong');
                    console.log("error" + JSON.stringify(req));
                },
                success: function(data) {
                    //$("#"+id).remove();
                    alert("Request accepted successfully");
                    console.log("SUCCESS");
                }
            })
        }
    });
</script>
<script type="text/javascript">
    $(".reject").click(function() {
        var id = $(this).parents("tr").attr("requestID");
        // alert(id);
        if (confirm("Are you sure you want to reject this request?")) {
            $.ajax({
                url: 'rejectRequest.php',
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
                    alert("Request rejected successfully");
                    console.log("SUCCESS");
                }
            })
        }
    });
</script>

</html>