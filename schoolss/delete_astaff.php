<?php
//including the database connection file
include_once("classess/Staff.php");
 
$staff = new Staff();
 
//getting id of the data from url
$astaff_id = $staff->escape_string($_GET['astaff_id']);
 
//deleting the row from table
//$result = $crud->execute("DELETE FROM users WHERE id=$id");
$result = $staff->delete($astaff_id, 'academic_staff');
 
if ($result) {
    //redirecting to the display page (index.php in our case)
    header("Location:view_astaff.php");
}
?>