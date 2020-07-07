<?php
    require_once('../functions.php');
    db_connect();
    $sql = "SELECT patientId,patientPassword FROM paitents WHERE patientEmail = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s',$_POST['patientemail']);
    $statement->execute();
    $statement->store_result();
    $statement->bind_result($patientId,$password);
    $statement->fetch();
    $password = substr( $password, 0, 60);
    if(password_verify($_POST['password'], $password)) 
    {
        $_SESSION['patientId'] = $patientId;
        redirect_to("../patient_portal.php");
    } 
    else 
    {
        redirect_to("../index.php?login_error=true");
    }
?>