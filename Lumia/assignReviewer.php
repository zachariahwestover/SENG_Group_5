<?php
if($_POST['rID'] != 0){
  $reviewerID = $_POST['rID'];
  $paperID = $_POST['pID'];

  $db = new mysqli('68.178.217.43', 'paigeweber', 'Bison51#', 'paigeweber');
  if(mysqli_connect_errno())
    {
        echo 'Connection to database failed:'.mysqli_connect_error();
        exit();
    }

    $query = "UPDATE Papers SET ReviewerID ='" . $reviewerID . "'WHERE PaperID =".$paperID;
    if ($db->query($query) === TRUE) {
      header("Location: archive.php?success=true");
    } else {
      header("Location: archive.php?success=false");
      //echo "Error updating record: " . $db->error;
    }
  }else{
    header("Location: archive.php");
  }

 ?>
