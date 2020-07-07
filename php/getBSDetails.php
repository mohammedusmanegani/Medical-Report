<?php
    require_once('../functions.php');
    db_connect();
    $i=0;
    $id = $_POST['data'];
    $data = array();
    $sql = "SELECT dateOfEntry,timeOfEntry,beforeFasting,afterFasting FROM bloodSugar WHERE patientId = ".$id." ORDER BY entryId DESC";
    $result = $conn->query($sql);
    if($result)
    {
        while($row = $result->fetch_assoc())
        {
            $i++;
            array_push($data,$row['dateOfEntry']);
            array_push($data,$row['timeOfEntry']);
            array_push($data,$row['beforeFasting']);
            array_push($data,$row['afterFasting']);
        }
    }
    echo $i."#";
    foreach($data as $entry)
    {
        echo $entry."#";
    }
?>