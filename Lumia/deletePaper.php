<?php

$PaperID = $_GET['PaperID'];

   $checkQuery = "select * from Papers where PaperID = '".$PaperID.";";

    $checkResult = $db->query($checkQuery);

    if ($checkResult)

    {

        if ($db->affected_rows > 0)

        {

            $query = "delete from Papers where PaperID = '".$PaperID.";";

            //run the query and store in $result

            $result = $db->query($query);

            

            //lets you know how many rows were inserted into the database or an error if there was an error

            if ($result)

            {

                echo  $db->affected_rows." paper(s) deleted.";

            }

        }

        

    }

    else

    {

        echo "An error has occurred. No changes were made.";

    }
    
?>