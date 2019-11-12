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
      echo '<p>You are not logged in.</p>';
    }

    // provide form to log in
    //this is where the html goes to
    echo '<form action="login.php" method="post">';
    echo '<fieldset>';
    echo '<legend>Login</legend>';
    echo '<p><label for="userid">UserID:</label>';
    echo '<input type="text" name="userid" id="userid" size="30"/></p>';
    echo '<p><label for="password">Password:</label>';
    echo '<input type="password" name="password" id="password" size="30"/></p>';    
    echo '</fieldset>';
    echo '<button type="submit" name="login">Login</button>';
    echo '</form>';

  }
?>



</body>
</html>
