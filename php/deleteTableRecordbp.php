<?php
    require_once('../functions.php');
    db_connect();
    $sql = "DELETE FROM bloodpressure WHERE bpId=?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s',$_GET['bpId']);
    if($statement->execute())
    {
        //redirect_to('../patient_portal.php');
    }
    else
    {
        echo $conn->error;
    }
