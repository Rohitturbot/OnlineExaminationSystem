<?php

error_reporting(0);
/********************* Step 1 *****************************/
session_start();
if (!isset($_SESSION['admname']))
{
    $_GLOBALS['message'] = "Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
}
else if (isset($_REQUEST['logout']))
{
    unset($_SESSION['admname']);
    $_GLOBALS['message'] = "You are Loggged Out Successfully.";
    header('Location: index.php');
}
?>

<html>
    <head>
        <title>OES-DashBoard</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="../oes.css"/>
    </head>
    <body>
        <?php
/********************* Step 2 *****************************/
if (isset($_GLOBALS['message']))
{
    echo "<div class=\"message\">" . $_GLOBALS['message'] . "</div>";
}
?>
        <div id="container">
            <div class="header">
                <img style="margin:10px 2px 2px 10px;float:left;" height="80" width="200" src="../images/logo.gif" alt="OES"/><h3 class="headtext"> &nbsp;Online Examination System </h3><h4 style="color:#151515;text-align:center;margin:0 0 5px 5px;"><i>...because Examination Matters</i></h4>
            </div>
            <div class="menubar">

                <form name="admwelcome" action="admwelcome.php" method="post">
                    <ul id="menu">
                        <?php if (isset($_SESSION['admname']))
{ ?>
                        <li><input type="submit" value="LogOut" name="logout" class="subbtn" title="Log Out"/></li>
                        <?php
} ?>
                    </ul>
                </form>
            </div>
            <!-- <div class="admpage">
                <?php if (isset($_SESSION['admname']))
{ ?>


                <img height="600" width="100%" alt="back" class="btmimg" src="../images/trans.png"/>
                <div class="topimg">
                    <p><img height="500" width="600" style="border:none;"  src="../images/admwelcome.jpg" alt="image"  usemap="#oesnav" /></p>

                    <map name="oesnav">
                        <area shape="circle" coords="150,120,70" href="usermng.php" alt="Manage Users" title="This takes you to User Management Section" />
                        <area shape="circle" coords="450,120,70" href="submng.php" alt="Manage Subjects" title="This takes you to Subjects Management Section" />
                        <area shape="circle" coords="300,250,60" href="rsltmng.php" alt="Manage Test Results" title="Click this to view Test Results." />
                        <area shape="circle" coords="150,375,70" href="testmng.php?forpq=true" alt="Prepare Questions" title="Click this to prepare Questions for the Test" />
                        <area shape="circle" coords="450,375,70" href="testmng.php" alt="Manage Tests" title="This takes you to Tests Management Section" />
                    </map>
                </div>
                <?php
} ?>

            </div> -->
<div class="cardContainer">
            <?php if (isset($_SESSION['admname']))
            { ?>

<div class="card" onclick="location.href='usermng.php';" >
  <img src="https://image.freepik.com/free-vector/tiny-woman-sitting-huge-book-flat-vector-illustration_74855-5946.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>Student Management</b></h4>
    <!-- <p>Architect & Engineer</p> -->
  </div>
</div>

<div class="card" onclick="location.href='submng.php';" >
  <img src="https://image.freepik.com/free-vector/cute-unicorn-reading-book-cartoon-vector-illustration-animal-education-concept-isolated-vector-flat-cartoon-style_138676-1945.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>Subject Management</b></h4>
    <!-- <p>Architect & Engineer</p> -->
  </div>
</div>

<div class="card" onclick="location.href='rsltmng.php';" >
  <img src="https://image.freepik.com/free-vector/man-getting-award-writing_74855-5891.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>Result Management</b></h4>
    <!-- <p>Architect & Engineer</p> -->
  </div>
</div>

<div class="card" onclick="location.href='testmng.php?forpq=true';" >
  <img src="https://image.freepik.com/free-vector/questions-concept-illustration_114360-1523.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>Questions Management</b> </h4>
    <!-- <p>Architect & Engineer</p> -->
  </div>
</div>


<div class="card" onclick="location.href='testmng.php';" >
  <img src="https://image.freepik.com/free-vector/online-education-concept-with-lessons-exams-symbols-isometric-illustration_1284-31386.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>Test Management</b></h4>
    <!-- <p>Architect & Engineer</p> -->
  </div>
</div>



<?php
} ?>
</div>


        </div>
              <div id="footer">
              <p > Developed By-<b>Mohit Yadav, Ayushi Singh, Harshit Omar, Mandakini Singh</b><br/> </p>
          </div>
  </body>
</html>
