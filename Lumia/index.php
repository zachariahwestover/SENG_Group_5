<?php
session_start();

//if user submits a username and password
if (isset($_POST['userid']) && isset($_POST['password']))
{
  //asign username and password values. NOTE: this won't be done until the database is complete
  // if the user has just tried to log in
  $userid = 'Username';//$_POST['userid'];
  $password = 'Password';//$_POST['password'];

  //connects to the sql server
  $db_conn = new mysqli('68.178.217.43', 'paigeweber', 'Bison51#', 'paigeweber');

  //if database returns connection error, print to screen with the error and exit the system
  if (mysqli_connect_errno()) {
    echo 'Connection to database failed:'.mysqli_connect_error();
    exit();
  }

  //this is sent to the server to ask about the username and password
  $query = "select * from Login where
            Username='".$userid."' and
            Password=sha1('".$password."')";

  //sends the database server the above information about username and password store the response in result
  $result = $db_conn->query($query);

  //if the result returns valid user, start a session with a valid user
  if ($result->num_rows)
  {
    // if they are in the database register the user id
    $_SESSION['valid_user'] = $userid;
  }
  $db_conn->close();
}
?>
<!DOCTYPE html>
<html>
  <style>
    #loginform {
      width:80%;
      margin-left:auto;
      margin-right:auto;
    }
    #specialLoginForm{
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
              <a href="index.html"><img src="assets/img/lipscomb-logo.png" width=250 height=100 alt="" /></a>
            </div>
            <!-- end logo -->

            <!-- top menu -->
            <div class="navigation">
              <nav>
                <ul class="nav topnav">
                  <li class="active">
                    <a href="index.html"><i class="icon-home"></i> Home </a>
                  </li>
                  <li class="dropdown">
                    <a href="#"><i class="icon-calendar"></i> Events <i class="icon-angle-down"></i></a>
                    <ul class="dropdown-menu">
                      <li><a href="media.html">Media</a></li>
                      <li><a href="color-scheme.html">10 Theme colors</a></li>
                      <li><a href="buttons.html">Buttons</a></li>
                      <li><a href="components.html">Components</a></li>
                      <li><a href="animations.html">56 Animations</a></li>
                      <li><a href="icons.html">Icons</a></li>
                      <li><a href="icon-variations.html">Icon variations</a></li>
                      <li class="dropdown"><a href="#">3rd level <i class="icon-angle-right"></i></a>
                        <ul class="dropdown-menu sub-menu">
                          <li><a href="#">Example menu</a></li>
                          <li><a href="#">Example menu</a></li>
                          <li><a href="#">Example menu</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>

                  <li class="dropdown">
                    <a href="#"><i class="icon-money"></i> Sponsors <i class="icon-angle-down"></i></a>
                    <ul class="dropdown-menu">
                      <li><a href="portfolio-2cols.html">Portfolio 2 columns</a></li>
                      <li><a href="portfolio-3cols.html">Portfolio 3 columns</a></li>
                      <li><a href="portfolio-4cols.html">Portfolio 4 columns</a></li>
                      <li><a href="portfolio-detail.html">Portfolio detail</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="submissions.html"><i class="icon-envelope-alt"></i> Submissions</a>
                  </li>
                  <li>
                    <a href="contact.html"><i class="icon-envelope-alt"></i> Contact</a>
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

<?php

  //if the user gets the right username and password
  if (isset($_SESSION['valid_user']))
  {
    //echo '<p>You are logged in as: '.$_SESSION['valid_user'].' <br />';
    //echo '<a href="logout.php">Log out</a></p>';
      
      // push user to index page once logged in
      header("Location: index.php");
  }
  else
  {
    if (isset($userid))
    {
      // if they've tried and failed to log in
      echo '<p>Could not log you in.</p>';
    }
    else
    {
      // they have not tried to log in yet or have logged out
     // echo '<p>You are not logged in.</p>';
    }

    // provide form to log in
    //this is where the html goes to
    
    echo '<form action="login.php" method="post" id="loginform">';
    
    echo '<fieldset>';
    echo '<legend>Login</legend>';
    echo '<br><br><br><br><br><br><br>';
    echo '<p><label for="userid" id="specialLoginForm">UserID:</label>';
    echo '<input type="text" name="userid" id="specialLoginForm" size="30"/></p>';
    echo '<p><label for="password" id="specialLoginForm">Password:</label>';
    echo '<input type="password" name="password" id="specialLoginForm" size="30"/></p>';    
    echo '</fieldset>';
    echo '<button type="submit" id="specialLoginForm" name="login">Login</button>';
    echo '</form>';

  }
?>

<br><br><br><br><br><br><br><br><br><br><br>

</body>
<footer class="footer">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="widget">
              <h5>Interesting pages</h5>
              <ul class="regular">
                <li><a href="#">About our company</a></li>
                <li><a href="#">How we do all stuff</a></li>
                <li><a href="#">Our recent works</a></li>
                <li><a href="#">Press releases</a></li>
                <li><a href="#">Get in touch with us</a></li>
              </ul>
            </div>
          </div>

          <div class="span4">
            <div class="widget">
              <h5>How to find us</h5>
              <address>
								<i class="icon-home"></i> <strong>Lipscomb University</strong><br>
								X104 Awesome ville, Suite AB12<br>
								Jakarta 12420 Indonesia
								</address>
              <p>
                <i class="icon-phone"></i> (123) 456-7890 - (123) 555-8890<br>
                <i class="icon-envelope-alt"></i> email@domainname.com
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
