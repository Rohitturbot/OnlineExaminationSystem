

<?php



error_reporting(0);
session_start();
        if(!isset($_SESSION['stdname'])){
            $_GLOBALS['message']="Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
        }
        else if(isset($_REQUEST['logout'])){
                unset($_SESSION['stdname']);
            $_GLOBALS['message']="You are Loggged Out Successfully.";
            header('Location: index.php');
        }
?>
<html>
    <head>
        <title>OES-DashBoard</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="oes.css"/>
    </head>
    <body>
        <?php

        if($_GLOBALS['message']) {
            echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }
        ?>
        <div id="container">
           <div class="header">
                            <a href="/oes">
                <img style="margin:10px 2px 2px 10px;float:left;" height="80" width="200" src="images/logo.gif" alt="OES"/><h3 class="headtext"> &nbsp;Online Examination System </h3><h4 style="text-align:center;margin:0 0 5px 5px;"><i>...because Examination Matters</i></h4>
                </a>
            </div>
            <div class="menubar">

                <form name="stdwelcome" action="stdwelcome.php" method="post">
                    <ul id="menu">
                        <?php if(isset($_SESSION['stdname'])){ ?>
                        <li><input type="submit" value="LogOut" name="logout" class="subbtn" title="Log Out"/></li>
                        <?php } ?>
                    </ul>
                </form>
            </div>
            <div class="stdpage">
                <?php if(isset($_SESSION['stdname'])){ ?>
                <div class="cardContainer" >
                <div class="card" onclick="location.href='viewresult.php';" >
  <img src="https://image.freepik.com/free-vector/man-getting-award-writing_74855-5891.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>View Result</b></h4>
    <!-- <p>Architect & Engineer</p> -->
  </div>
</div>

<div class="card" onclick="location.href='stdtest.php';" >
  <img src="https://image.freepik.com/free-vector/online-education-concept-with-lessons-exams-symbols-isometric-illustration_1284-31386.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>Take Test</b></h4>
    <!-- <p>Architect & Engineer</p> -->
  </div>
</div>

<div class="card" onclick="location.href='editprofile.php?edit=edit';" >
  <img src="https://image.freepik.com/free-vector/content-editor-editing-feed-vector_53876-77882.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>Edit Profile</b></h4>
    <!-- <p>Architect & Engineer</p> -->
  </div>
</div>

<div class="card" onclick="location.href='practicetest.php';" >
  <img src="https://image.freepik.com/free-vector/exams-concept-illustration_114360-2754.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>Practice Test</b> </h4>
    <!-- <p>Architect & Engineer</p> -->
  </div>
</div>


<div class="card" onclick="location.href='resumetest.php';" >
  <img src="https://image.freepik.com/free-vector/launching-concept-illustration_114360-2884.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>Resume Test</b></h4>
    <!-- <p>Architect & Engineer</p> -->
  </div>
</div>
</div>
                <?php }?>

            </div>

      </div>
           <div id="footer">
          <p > Developed By-<b>Mohit Yadav, Ayushi Singh, Harshit Omar, Mandakini Singh</b></p>
      </div>
  </body>
</html>
