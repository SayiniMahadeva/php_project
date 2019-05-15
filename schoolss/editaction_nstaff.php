<?php
// including the database connection file
include_once("classess/Nstaff.php");
include_once("classess/Validation.php");
 
$nstaff = new Nstaff();
$validation = new Validation();
 
if(isset($_POST['update']))
{    
    $nstaff_id = $nstaff->escape_string($_POST['nstaff_id']);
    
    $name = $nstaff->escape_string($_POST['name']);
    $address = $nstaff->escape_string($_POST['address']);
    $gender = $nstaff->escape_string($_POST['gender']);
    
    $msg = $validation->check_empty($_POST, array('name', 'address', 'gender'));
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
        $result = $nstaff->execute("UPDATE non_academic_staff SET name='$name',address='$address',gender='$gender' WHERE nstaff_id='$nstaff_id'");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: view_nstaff.php");
    }
}
?>