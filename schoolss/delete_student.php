<?php
//including the database connection file
include_once("classess/Student.php");
 
$student = new Student();
 
//getting id of the data from url
$student_id = $student->escape_string($_GET['student_id']);
 
//deleting the row from table
//$result = $crud->execute("DELETE FROM users WHERE id=$id");
$result = $student->delete($student_id, 'student');
 
if ($result) {
    //redirecting to the display page (index.php in our case)
    header("Location:view_student.php");
}
?>