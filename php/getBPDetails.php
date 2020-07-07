<?php
    require_once('../functions.php');
    db_connect();
    $i=0;
    $id = $_POST['data'];
    $data = array();
    $sql = "SELECT dateOfEntry,timeOfEntry,systole,diastole,pulse FROM bloodPressure WHERE patientId = ".$id." ORDER BY bpId DESC";
    $result = $conn->query($sql);
    if($result)
    {
        while($row = $result->fetch_assoc())
        {
            $i++;
            array_push($data,$row['dateOfEntry']);
            array_push($data,$row['timeOfEntry']);
            array_push($data,$row['systole']);
            array_push($data,$row['diastole']);
            array_push($data,$row['pulse']);
        }
    }
    echo $i."#";
    foreach($data as $entry)
    {
        echo $entry."#";
    }
?>