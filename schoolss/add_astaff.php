<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("classess/Staff.php");
include_once("classess/Validation.php");
 
$staff = new Staff();
$validation = new Validation();
 
if(isset($_POST['Submit'])) {    
    $name = $staff->escape_string($_POST['name']);
    $address = $staff->escape_string($_POST['address']);
    $gender = $staff->escape_string($_POST['gender']);
    $course_name = $staff->escape_string($_POST['course_name']);
        
    $msg = $validation->check_empty($_POST, array('name', 'address', 'gender','course_name'));
  
    
    // checking empty fields
    if($msg != null) {
        echo $msg;        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    }

    else { 
        
        //insert data to database    
        $result = $staff->execute("INSERT INTO academic_staff(name,address,gender,course_name) VALUES('$name','$address','$gender','$course_name')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='view_astaff.php'>View Result</a>";
    }
}
?>
    
    <html>
<head>
    <title>Add Data</title>
</head>
 
<body>
    <a href="view_astaff.php">Home</a>
    <br/><br/>
 
    <form action="add_astaff.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr> 
                <td>Address</td>
                <td><input type="text" name="address"></td>
            </tr>
            <tr> 
                <td>Gender</td>
                <td><input type="text" name="gender"></td>
            </tr>
            <tr> 
                <td>Course_name</td>
                <td><input type="text" name="course_name"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
</body>
</html>
</body>
</html>