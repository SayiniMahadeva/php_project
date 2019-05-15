<?php
// including the database connection file
include_once("classess/Staff.php");
include_once("classess/Validation.php");
 
$staff = new Staff();
$validation = new Validation();
 
if(isset($_POST['update']))
{    
    $astaff_id = $staff->escape_string($_POST['astaff_id']);
    
    $name = $staff->escape_string($_POST['name']);
    $address = $staff->escape_string($_POST['address']);
    $gender = $staff->escape_string($_POST['gender']);
    $course_name = $staff->escape_string($_POST['course_name']);
    
    $msg = $validation->check_empty($_POST, array('name', 'address', 'gender','course_name'));
    //$check_age = $validation->is_age_valid($_POST['age']);
   // $check_email = $validation->is_email_valid($_POST['email']);
    
    // checking empty fields
    if($msg) {
        echo $msg;        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    }
//    elseif (!$check_age) {
//        echo 'Please provide proper age.';
//    }
//    elseif (!$check_email) {
//        echo 'Please provide proper email.';    
//    }
    else {    
        //updating the table
        $result = $staff->execute("UPDATE academic_staff SET name='$name',address='$address',gender='$gender',course_name='$course_name' WHERE astaff_id='$astaff_id'");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: view_astaff.php");
    }
}
?>