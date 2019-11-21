<?php
session_start();

//if user submits a username and password
if (isset($_POST['username']) && isset($_POST['password']))
{
  //asign username and password values. NOTE: this won't be done until the database is complete
  // if the user has just tried to log in
  $username = $_POST['username'];
  $password = sha1($_POST['password']);

  //connects to the sql server
  $db_conn = new mysqli('68.178.217.43', 'paigeweber', 'Bison51#', 'paigeweber');

  //if database returns connection error, print to screen with the error and exit the system
  if (mysqli_connect_errno()) {
    echo 'Connection to database failed:'.mysqli_connect_error();
    exit();
  }

  //this is sent to the server to ask about the username and password
    //echo $username;
    //echo $password;
    
    //e605dbe386d539f6d1ac1efc8ea48437cac0d178
    
    
    
  $query = "select * from User where Username = '".$username."' and Password = '".$password."';";

  //sends the database server the above information about username and password store the response in result
  $result = $db_conn->query($query);
    //echo mysqli_result($result, 2);
    //echo "nummmmmmmsbruh";
    //echo $result -> num_rows;
    
       // if($result -> num_rows > 0)
     //{
       //  while ($row = $result->fetch_assoc()) {
         //    $field1name = $row["Username"];
           //  $field2name = $row["Password"];
             //echo '<tr>
             //<td>'.$field1name.'</td>
             //<td>'.$field2name.'</td>
             //</tr>';
         //}
     //}

  //if the result returns valid user, start a session with a valid user
  if ($result->num_rows)
  {
    // if they are in the database register the user id
    $_SESSION['valid_user'] = $username;
      
      //pull from database usertype
      $query2 = "select UserID from User where Username = '".$username."' and Password = '".$password."';";
      $query3 = "select Type from User where Username = '".$username."' and Password = '".$password."';";
      
      $result2 = $db_conn->query($query2);
      $result3 = $db_conn->query($query3);
      
      if($result2 -> num_rows > 0)
      {
          while ($row = $result2->fetch_assoc()) {
              $_SESSION['USERID'] = $row["UserID"];
              //echo $_SESSION['TYPE'];
          }
      }
      
    
      if($result3 -> num_rows > 0)
          {
              while ($row = $result3->fetch_assoc()) {
                  $_SESSION['TYPE'] = $row["Type"];
                  //echo $_SESSION['TYPE'];
              }
          }
      
      
      
      
    
      header("Location: main.php");
      //echo "Session created";
  }
    
    
    //if the user gets the right username and password
      //echo "Session val: ";
      //echo $_SESSION['valid_user'];

    
      if (isset($userid))
      {
        // if they've tried and failed to log in
        echo '<p>Could not log you in.</p>';
      }
  $db_conn->close();
}
?>
<!DOCTYPE html>
<html>
  <style>
    .loginform {
      width:80%;
      margin-left:auto;
      margin-right:auto;
    }
    .specialLoginForm{
      width:30%;
      margin-left:35%;
    }
  </style>
<head>
   <title>Home Page</title>
      
      <link href="assets/css/bootstrap.css" rel="stylesheet">
      <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
      <link href="assets/css/prettyPhoto.css" rel="stylesheet">
      <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
      <link href="assets/css/flexslider.css" rel="stylesheet">
      <link href="assets/css/style.css" rel="stylesheet">
      <link href="assets/color/default.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,600,400italic|Open+Sans:400,600,700" rel="stylesheet">

      <div class="navbar navbar-static-top">
        <div class="navbar-inner">
          <div class="container">
            <!-- logo -->
            <div class="logo">
              <a href="main.php"><img src="assets/img/lipscomb-logo.png" width=250 height=100 alt="" /></a>
            </div>
            <!-- end logo -->

            <!-- top menu -->
            <div class="navigation">
              <nav>
                <ul class="nav topnav">
                  <li>
                    <a href="main.php"><i class="icon-home"></i> Home </a>
                  </li>
                  <li><!-- TODO: Make a Events Paige -->
                    <a href="#"><i class="icon-calendar"></i> Events</a>
                  </li>
                  <li><!-- TODO: Make a Sponsors Paige -->
                    <a href="#"><i class="icon-money"></i> Sponsors</a>
                  </li>
                  <li>
                    <a href="submit.php"><i class="icon-pencil"></i> Submissions</a>
                  </li>
				  <li>
                    <a href="contact.php"><i class="icon-envelope-alt"></i> Contact</a>
                  </li>
                </ul>
              </nav>
            </div>
            <!-- end menu -->
          </div>
        </div>
      </div>

</head>
<body>
<form action="index.php" method="post" class="loginform">
   
<fieldset>
   <legend>Login</legend>
   <br><br><br><br><br><br><br>
   <p><label for="username" class="specialLoginForm">Username:</label>
   <input type="text" name="username" class="specialLoginForm" size="30"/></p>
   <p><label for="password" class="specialLoginForm">Password:</label>
   <input type="password" name="password" class="specialLoginForm" size="30"/></p>
   </fieldset>
     
<button type="submit" class="specialLoginForm" name="login">Login</button>
<br><br><br>

</form>

<form action="register.html" class="loginform" >
<input type="submit" class="specialLoginForm" value="Register for an Account">
</form>



<br><br><br><br><br><br><br><br><br><br><br>

</body>
<footer class="footer">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="widget">
              <h5>How to find us</h5>
              <address>
				<i class="icon-home"></i> <strong>Lipscomb University</strong><br>
				One University Park Drive<br>
				Nashville, TN 37204
				</address>
              <p>
                <i class="icon-phone"></i> (615) 966-5082 ext. 5082<br>
                <i class="icon-envelope-alt"></i> chris.simmons@mail.lipscomb.edu
              </p>
            </div>
            <div class="widget">
              <ul class="social">
                <li><a href="#" data-placement="bottom" title="Twitter"><i class="icon-twitter icon-square icon-32"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Facebook"><i class="icon-facebook icon-square icon-32"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Linkedin"><i class="icon-linkedin icon-square icon-32"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Pinterest"><i class="icon-pinterest icon-square icon-32"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Google plus"><i class="icon-google-plus icon-square icon-32"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="verybottom">
        <div class="container">
          <div class="row">
            <div class="span6">
              <p>
                &copy; Lipscomb - All right reserved
              </p>
            </div>
            <div class="span6">
              <div class="pull-right">
                <div class="credits">
                  <!--
                    All the links in the footer should remain intact.
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Lumia
                  -->
                  Created by the best group in SENG
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
</html>

