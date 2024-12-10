<?php
require 'databaseConnect.php';

session_start();
?>

<html>
<title>Library PC Slot Management</title>
  <style>
    @import url(https://fonts.googleapis.com/css?family=Lato);
    html,
    body {
      position: sticky;
      padding: 0;
      margin: 0;
      height: 50%;
    }

    html {
      font: 1em/1.5 'Lato', sans-serif;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      text-rendering: optimizelegibility;
    }

    body {
      font-size: 1.3em;
    }

    header {
      display:flex;
      height: 40%;
      position: relative;
      overflow: hidden;
      background: url(https://unsplash.imgix.net/45/ZLSw0SXxThSrkXRIiCdT_DSC_0345.jpg?q=75&w=1080&h=1080&fit=max&fm=jpg&auto=format&s=857f07b76abac23a7fb7161cc7b12a46)
        center no-repeat;
      /* Image Credit: Unsplash.me */
      background-size: cover;
    }
    header .content {
      display:flex;
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      z-index: 1;
    }
    header h1,
    header h2 {
      margin: 0;
    }
    header h2 {
      text-transform: uppercase;
      margin-top: -0.5em;
    }
    header hgroup {
      -webkit-transform: translate(-50%, -50%);
      -moz-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      -o-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      display: inline-block;
      text-align: center;
      position: absolute;
      top: 50%;
      left: 20%;
      color: #fff;
      border-radius:10%;
      padding: 0.002em 1.5em;
      
      z-index: 2;
    
    }
    .logo {
      
      width:400px;
      height:100px;
      object-fit: contain;
    }
    header .overlay {
      position: absolute;
      top: 0;
      right: 0;
      left: 0;
      bottom: 0;
      background: #333 center no-repeat;
      background-size: cover;
      z-index: 0;
      opacity: 0;
      -webkit-filter: blur(4px);
    }
    header p{
      display:flex;
      text-align: right;
      color: #fff;
      position: absolute;
      left: 75%;
    }
    img {
      margin-right: 20px;
    }
    .site {
      text-align: center;
      background-color: #efefef;
      font-size: 0.8em;
      color: #444;
      position: relative;
    }
    .site a:not(#logout) {
      color: #666;
      text-decoration: none;
    }
    .site a:hover:not(#logout) {
      color: #222;
    }

    .site nav {
      position: absolute;
      top: 0;
      left: 0;
      background: #222;
      width: 100%;
    }
    .site nav a:not(#logout) {
      padding: 10px 30px;
      font-size: 1.3em;
      display: inline-block;
      margin-right:50px;
    }
    .site nav a:hover:not(#logout) {
      background: #333;
      color: #fff;
    }
    #logout {
      background: #fff;
      color: #FF0000;
      position: absolute;
      right: 10%;
      font-weight: 900;
    }
    #logout {
      background: #FF4742;
      border: 1px solid #FF4742;
      border-radius: 6px;
      box-shadow: rgba(0, 0, 0, 0.1) 1px 2px 4px;
      box-sizing: border-box;
      color: #FFFFFF;
      cursor: pointer;
      display: inline-block;
      font-family: nunito,roboto,proxima-nova,"proxima nova",sans-serif;
      font-size: 16px;
      font-weight: 800;
      line-height: 16px;
      min-height: 40px;
      outline: 0;
      padding: 12px 14px;
      text-align: center;
      text-rendering: geometricprecision;
      text-transform: none;
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;
      vertical-align: middle;
    }

    #logout:hover,
    #logout:active {
      background-color: initial;
      background-position: 0 0;
      color: #FF4742;
    }

    #logout:active {
      opacity: .5;
    }
  </style>
  <header>
    <div class="content">
    <?php
        if (isset($_SESSION['employeeName'])) {
        } else {
            header('Location:login.html');
        }
?> 
      <p>
        Welcome,<?php echo $_SESSION['employeeName']; ?> <br>
        You are logged in as <?php echo $_SESSION['userType']; ?>
      </p>
      
      <hgroup>
        <h1><img src="/LibraryPCManagement/Image/Logo.png" alt="Logo" class="logo"/></h1>
        
      </hgroup>
    </div>
    <div class="overlay"></div>
  </header>
  <section class="site">
    <nav class="site">
      <a href="requestUI.php">REQUEST</a>
      <a href="pcManageUI.php">PC</a>
      <a href="banPageUI.php">BAN</a>
      <a href="logsUI.php">LOGS</a>
      <a href="banLogsPageUI.php">BAN LOGS</a>
      <?php
      if ($_SESSION['userType'] == 'Admin') {
          echo '<a href ="librarianLogs.php">LIBRARIAN LOGS</a>';
      } else {
      }
?>
      <a href="Logout.php" id="logout" onclick="return confirm('Are you sure to logout?')">LOGOUT</a>
    </nav>
  </section>
</html>
