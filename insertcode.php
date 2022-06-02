<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'phpcrud');


function input_data($data)
{  
    $data = trim($data);  
    $data = stripslashes($data);  
    $data = htmlspecialchars($data);  
    return $data;  
}  

$empErr = $fnameErr = $lnameErr = $deptErr = $contactErr = $photoErr = $desgErr = $salaryErr = $file_size = "";
$valid_file_size = 3*1024*1024 ;
$error_status= 0;

    if (empty($_POST["emp"])) {  
       $empErr='Employee no is required'; 
       $error_status= 1;
    } else {  
    $emp = input_data($_POST["emp"]);  
        // check if mobile no is well-formed  
    if (!preg_match ("/^[0-9]+$/", $emp) ) {  
        $empErr='Only numeric value is allowed'; 
        $error_status= 1;
    }  
    }


    if (empty($_POST["fname"]))
    {  
    $fnameErr = "First Name is required";  
    $error_status= 1;
    } else {  
    $fname = input_data($_POST["fname"]);  
        
        if (!preg_match("/^[a-zA-Z]+$/",$fname)) {  
            $fnameErr = "Only alphabets and white space are allowed";  
            $error_status= 1;
        }  
    }  

    if (empty($_POST["lname"]))
    {  
         $lnameErr = "Last Name is required";  
         $error_status= 1;
    } else {  
    $lname = input_data($_POST["lname"]);  
        // check if name only contains letters and whitespace  
        if (!preg_match("/^[a-zA-Z]+$/",$lname)) {  
             $lnameErr = "Only alphabets and white space are allowed"; 
             $error_status= 1;
        }  
    }  

    if (empty($_POST["dept"]))
    {  
         $deptErr = "Department is required"; 
         $error_status= 1;
    } else {  
    $dept = input_data($_POST["dept"]);  
        // check if name only contains letters and whitespace  
        if (!preg_match("/^[a-zA-Z]+$/",$dept)) {  
             $deptErr = "Only alphabets and white space are allowed"; 
             $error_status= 1;
        }  
    }  

        if (empty($_POST["contact"]))
        {  
            $contactErr = "Mobile no is required"; 
            $error_status= 1;
    } else {  
       $contact = input_data($_POST["contact"]);  
            // check if mobile no is well-formed  
        if (!preg_match ("/^[0-9]+$/", $contact) ) {  
        $contactErr = "Only numeric value is allowed."; 
        $error_status= 1;
        }  
        //check mobile no length should not be less and greator than 10  
        if (strlen ($contact) != 10) {  
             $contactErr = "Mobile no must contain 10 digits."; 
             $error_status= 1;
            }  
    }  

    if (empty($_POST["desg"])) {  
        $desgErr = "Designation is required"; 
        $error_status= 1;
    } else {  
    $desg = input_data($_POST["desg"]);  
        // check if name only contains letters and whitespace  
        if (!preg_match("/^[a-zA-Z]+$/",$desg)) {  
            $desgErr = "Only alphabets and white space are allowed"; 
            $error_status= 1;
        }  
    }  

    if (empty($_POST["salary"])) {  
            $salaryErr = "Salary is required"; 
            $error_status= 1;
    } else {  
        $salary = input_data($_POST["salary"]);  
            // check if mobile no is well-formed  
        if (!preg_match ("/^[0-9]+$/", $salary) ) {  
            $salaryErr = "Only numeric value is allowed."; 
            $error_status= 1;
        }  
    }
    
  
    if(empty($_FILES['photo']['name']))
    {
        $photoErr =" Please upload a image"; 
    }else{
        $photo = $_FILES['photo']['name'];
        
        $file_size = $_FILES['photo']['size'];

        $imageFileType = strtolower(pathinfo($photo,PATHINFO_EXTENSION));
        
        $extensions_arr = array("jpg","jpeg","png","gif");
           
        if($file_size > $valid_file_size)
        {
            $photoErr ="* File size must not be more that 3Mb.</br>";
            $error_status= 1;
        }

        if( in_array($imageFileType,$extensions_arr) )
        {
            
            move_uploaded_file($_FILES["photo"]["tmp_name"],'upload/'.$photo);
        }
        else{
            $photoErr =" File extension is incorrect"; 
            $error_status= 1;
        }
    }

   
    if($error_status== 1){
        $result_array = ['error'=>"True", 'empErr'=>$empErr, 'fnameErr'=>$fnameErr, 'lnameErr'=>$lnameErr, 'deptErr'=>$deptErr, 'contactErr'=>$contactErr, 'photoErr'=>$photoErr, 'desgErr'=>$desgErr, 'salaryErr'=>$salaryErr];
        echo json_encode($result_array); exit;
    }
    else {


    $query = "INSERT INTO records (emp,fname,lname,dept,contact,photo,desg,salary) VALUES ('$emp','$fname','$lname','$dept','$contact','$photo','$desg','$salary')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo json_encode(array('error'=>"false",'msg'=>'Updated Succesfilly')); exit;
        // header('Location: index.php');
    }
    else
    {
        echo json_encode(array('error'=>"True",'msg'=>'Not Updated')); exit;
    }
}
?>