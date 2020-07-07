<?php
    require_once('../functions.php');
    db_connect();
    $sql = "DELETE FROM bloodsugar WHERE entryId=?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s',$_GET['entryId']);
    if($statement->execute())
    {
       // redirect_to('../patient_portal.php');
    }
    else
    {
        echo $conn->error;
    }
