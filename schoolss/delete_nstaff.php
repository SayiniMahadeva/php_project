<?php
//including the database connection file
include_once("classess/Nstaff.php");
 
$nstaff = new Nstaff();
 
//getting id of the data from url
$nstaff_id = $nstaff->escape_string($_GET['nstaff_id']);
 
//deleting the row from table
//$result = $crud->execute("DELETE FROM users WHERE id=$id");
$result = $nstaff->delete($nstaff_id, 'non_academic_staff');
 
if ($result) {
    //redirecting to the display page (index.php in our case)
    header("Location:view_nstaff.php");
}
?>