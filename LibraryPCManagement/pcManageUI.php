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
        top: 55px;
        
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
            top: 55px;
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
        #pc {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            overflow: auto;
            position: relative;
            top: 70px;
        }

        #pc td,
        #pc th {
            border: 1px solid #ddd;
            padding: 8px;
            font-weight: bold;
        }

        #pc tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #pc tr:nth-child(odd) {
            background-color: #fff;
        }

        #pc tr:hover {
            background-color: #fbeee0;
            box-shadow: 0 0 30px #2e94e3;
        }

        #pc th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
            
        }

        #slot {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            overflow: auto;
            position: relative;
            top: 25px;
        }

        #slot td,
        #slot th {
            border: 1px solid #ddd;
            padding: 8px;
            font-weight: bold;
        }

        #slot tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        #slot tr:nth-child(odd) {
            background-color: #fff;
        }

        #slot tr:hover {
            background-color: #fbeee0;
            box-shadow: 0 0 30px #2e94e3;
        }

        #slot th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
.lock {
  appearance: button;
  background-color: transparent;
  background-image: linear-gradient(to bottom, #fff, #FFE87C);
  border: 0 solid #e5e7eb;
  border-radius: .5rem;
  box-sizing: border-box;
  color: #482307;
  column-gap: 1rem;
  cursor: pointer;
  display: flex;
  font-family: ui-sans-serif,system-ui,-apple-system,system-ui,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
  font-size: 100%;
  justify-content: center;
  font-weight: 700;
  line-height: 0px;
  width: 50%;
  margin: 0;
  outline: 2px solid transparent;
  padding: 1rem 1.5rem;
  text-align: center;
  text-transform: none;
  transition: all .1s cubic-bezier(.4, 0, .2, 1);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  box-shadow: -6px 8px 10px rgba(81,41,10,0.1),0px 2px 2px rgba(81,41,10,0.2);
}

.lock:active {
  background-color: #FFE87C;
  box-shadow: -1px 2px 5px rgba(81,41,10,0.15),0px 1px 1px rgba(81,41,10,0.15);
  transform: translateY(0.125rem);
}

.lock:focus {
  box-shadow: rgba(72, 35, 7, .46) 0 0 0 4px, -6px 8px 10px rgba(81,41,10,0.1), 0px 2px 2px rgba(81,41,10,0.2);
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
    </style>

</head>
</script>
<body>


    <form action="pcManageUI.php" method="get">
        <input type="text" id="search" name="searchkeyword">
        <input type="submit" id="searchbtn" value="SEARCH KEYWORD"> 
        
        <?php

        // grab the searchkeyword
        if (isset($_GET['searchkeyword'])) {
            $ss = $_GET['searchkeyword'];
            if ($ss != '') {
                $sql = "Select * from pc_table where CONCAT(pcNumber,pcStatus) like '%".$ss."%'";
            } else {
                $sql = 'Select * from pc_table;';
            }
        } else {
            $sql = 'Select * from pc_table;';
        }

        $result = $conn->query($sql);
echo '<label class="title">PC SLOT TAB</label>';
if ($result !== false && $result->num_rows > 0) {
    echo '<table id="pc">';
    echo '<tr>';
    echo '<td>PC Number</td>';
    echo '<th>PC Status</th>';
    echo '<th>Action</th>';
    echo '</tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr class="clickable" pcNumber='.$row['pcNumber'].' ">';
        echo '<td>'.$row['pcNumber'].'</td>';
        echo '<td>'.$row['pcStatus'].'</td>';
        if ($row['pcStatus'] != 'AVAILABLE') {
            echo '<td> <button class="lock" name="lockbtn">LOCK</button>';
        }
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'No results found';
}

$sql = 'SELECT * from studentpcslot_table ORDER BY pcNumber';
$result = $conn->query($sql);

echo '<br>';
echo '<br>';

if ($result !== false && $result->num_rows > 0) {
    echo '<table id="slot">';
    echo '<tr>';
    echo '<th>Student ID</th>';
    echo '<th>Student Name</th>';
    echo '<th>Time In</th>';
    echo '<th>PC Number</th>';
    echo '</tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>'.$row['studentID'].'</td>';
        echo '<td>'.$row['studentName'].'</td>';
        echo '<td>'.$row['timeIn'].'</td>';
        echo '<td>'.$row['pcNumber'].'</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo '';
}

?>
        
        
    </form>
</body>
<script type="text/javascript">
    $(".lock").click(function() {
        var pc = $(this).parents("tr").attr("pcNumber");
        // alert(pc);
        if (confirm("Are you sure you want to lock this pc?")) {
            $.ajax({
                url: 'lockPC.php',
                type: 'GET',
                data: {
                    pc: pc
                },
                error: function(req,err) {
                    //alert('Something is wrong');
                    console.log("error" + JSON.stringify(req));
                },
                success: function(data) {
                    //$("#"+id).remove();
                    alert("PC locked successfully");
                    console.log("SUCCESS");
                }
            })
        }
    });
</script>
</html>