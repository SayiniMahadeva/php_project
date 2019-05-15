<?php
// including the database connection file
include_once("classess/Student.php");
include_once("classess/Validation.php");
 
$student = new Student();
$validation = new Validation();
 
if(isset($_POST['update']))
{    
    $student_id = $student->escape_string($_POST['student_id']);
    
    $name = $student->escape_string($_POST['name']);
    $address = $student->escape_string($_POST['address']);
    $grade = $student->escape_string($_POST['grade']);
    $phone_no = $student->escape_string($_POST['phone_no']);
    $class_id = $student->escape_string($_POST['class_id']);
    
    $msg = $validation->check_empty($_POST, array('name', 'address', 'grade', 'phone_no', 'class_id'));
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
        $result = $student->execute("UPDATE student SET name='$name',address='$address',grade='$grader',phone_no='$phone_no',class_id='$class_id' WHERE student_id='$student_id'");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: view_student.php");
    }
}
?>