

<?php


error_reporting(0);
session_start();
include_once 'oesdb.php';

if(isset($_REQUEST['stdsubmit']))
{
 /***************************** Step 1 : Case 1 ****************************/
 //Add the new user information in the database
     $result=executeQuery("select max(stdid) as std from student");
     $r=mysql_fetch_array($result);
     if(is_null($r['std']))
     $newstd=1;
     else
     $newstd=$r['std']+1;

     $result=executeQuery("select stdname as std from student where stdname='".htmlspecialchars($_REQUEST['cname'],ENT_QUOTES)."';");

    // $_GLOBALS['message']=$newstd;
    if(empty($_REQUEST['cname'])||empty ($_REQUEST['password'])||empty ($_REQUEST['email']))
    {
         $_GLOBALS['message']="Some of the required Fields are Empty";
    }else if(mysql_num_rows($result)>0)
    {
        $_GLOBALS['message']="Sorry the User Name is Not Available Try with Some Other name.";
    }
    else
    {
     $query="insert into student values($newstd,'".htmlspecialchars($_REQUEST['cname'],ENT_QUOTES)."',ENCODE('".htmlspecialchars($_REQUEST['password'],ENT_QUOTES)."','oespass'),'".htmlspecialchars($_REQUEST['email'],ENT_QUOTES)."','".htmlspecialchars($_REQUEST['contactno'],ENT_QUOTES)."','".htmlspecialchars($_REQUEST['address'],ENT_QUOTES)."','".htmlspecialchars($_REQUEST['city'],ENT_QUOTES)."','".htmlspecialchars($_REQUEST['pin'],ENT_QUOTES)."')";
     if(!@executeQuery($query))
                $_GLOBALS['message']=mysql_error();
     else
     {
        $success=true;
        $_GLOBALS['message']="Successfully Your Account is Created.Click <a href=\"index.php\">Here</a> to LogIn";
       // header('Location: index.php');
     }
    }
    closedb();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <head>
    <title>OES-Registration</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="oes.css"/>
    <script type="text/javascript" src="validate.js" ></script>
    </head>
  <body >
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
              <?php if(!$success): ?>

              <h2 style="text-align:center;color:#ffffff;">New User Registration</h2>
              <?php endif; ?>

          </div>
      <div class="page">
          <?php
          if($success)
          {
                echo "<h2 style=\"text-align:center;color:#0000ff;\">Thank You For Registering with Online Examination System.<br/><a href=\"index.php\">Login Now</a></h2>";
          }
          else
          {
           /***************************** Step 2 ****************************/
          ?>
          <form id="admloginform"  action="register.php" method="post" onsubmit="return validateform('admloginform');">
          <table cellpadding="20" cellspacing="20" style="text-align:left" >
                        <tr>

                            <td><input type="text" name="cname" value="" size="16" onkeyup="isalphanum(this)" placeholder="Enter username"/></td>

                        </tr>

                        <tr>

                            <td><input type="password" name="password" value="" size="16" onkeyup="isalphanum(this)" placeholder="Enter password"/></td>

                        </tr>
                        <tr>

                            <td><input type="password" name="repass" value="" size="16" onkeyup="isalphanum(this)"  placeholder="Re-Enter password" /></td>

                        </tr>
                        <tr>

                            <td><input type="text" name="email" value="" size="16" placeholder="Enter email id" /></td>
                        </tr>
                        <tr>

                            <td><input type="text" name="contactno" value="" size="16" onkeyup="isnum(this)" placeholder="Contact number"/></td>
                        </tr>

                        <tr>

                            <td><textarea name="address" cols="20" rows="3" placeholder="Enter Your Address "></textarea></td>
                        </tr>
                        <tr>

                            <td><input type="text" name="city" value="" size="16" onkeyup="isalpha(this)" placeholder="Enter Your City "/></td>
                        </tr>
                        <tr>

                            <td><input type="text" name="pin" value="" size="16" onkeyup="isnum(this)" placeholder="Enter Pin Code" /></td>
                        </tr>



                       <tr>
                           <td style="text-align:right;"><input type="submit" name="stdsubmit" value="Register" class="subbtn" /></td>
                  <td><input type="reset" name="reset" value="Reset" class="subbtn"/></td>
              </tr>
            </table>
        </form>
       <?php } ?>
      </div>

    </div>
    <div id="footer">
              <p > Developed By-<b>Mohit Yadav, Ayushi Singh, Harshit Omar, Mandakini Singh</b><br/> </p>
          </div>
  </body>
</html>

