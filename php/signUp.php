<?php
    require_once('../functions.php');
    db_connect();
    $sql = "INSERT INTO paitents(patientName,patientAge,patientSex,patientPassword,patientEmail) VALUES (?,?,?,?,?)";
    $statement = $conn->prepare($sql);
    $password= password_hash($_POST['patientpassword'], PASSWORD_DEFAULT);
    echo $conn->error;   
    $statement->bind_param('sssss',$_POST['patientname'],$_POST['patientage'],$_POST['patientSex'],$password,$_POST['patientemail']);
    if($statement->execute())
    {
        $sql = "SELECT patientId FROM paitents WHERE patientEmail = ?";
        $statement2= $conn->prepare($sql);
        $statement2->bind_param('s',$_POST['patientemail']);
        $statement2->execute();
        $statement2->store_result();
        $statement2->bind_result($patientId);
        $statement2->fetch();
        $_SESSION['patientId'] = $patientId;
        unset($patientId);
        if(isset($_FILES['patientImage'])){
            echo "here";
            $errors= array();
            $file_name = $_FILES['patientImage']['name'];
            $file_size =$_FILES['patientImage']['size'];
            $file_tmp =$_FILES['patientImage']['tmp_name'];
            $file_type=$_FILES['patientImage']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['patientImage']['name'])));
            
            $expensions= array("jpeg","jpg","png","svg");
            
            if(in_array($file_ext,$expensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }
            
            if($file_size > 2097152){
            $errors[]='File size must be excately 2 MB';
            }
            
            if(empty($errors)==true){
                echo "here";
                $newfilename=$_SESSION['patientId'].".".$file_ext;
                move_uploaded_file($file_tmp,"../uploads/".$newfilename);
                $imageurl="uploads/".$newfilename;
                $sql = "UPDATE paitents 
                SET patientPhotoUrl=?
                WHERE patientId=?";
                $statement = $conn->prepare($sql);
                echo $conn->error;
                $statement->bind_param('ss', $imageurl,$_SESSION['patientId']);
                $statement->execute();
                 redirect_to('../patient_portal.php');
            }else{
            print_r($errors);
            }
        }
       
    }
    else
    {
        echo "ERROR: ".$conn->error;
    }
?> 