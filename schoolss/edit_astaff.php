<?php
// including the database connection file
include_once("classess/Staff.php");
 
$staff = new Staff();
 
//getting id from url
$astaff_id = $staff->escape_string($_GET['astaff_id']);
 
//selecting data associated with this particular id
$result = $staff->getData("SELECT * FROM academic_staff WHERE astaff_id=$astaff_id");
 
foreach ($result as $res) {
    $name = $res['name'];
    $address = $res['address'];
    $gender = $res['gender'];
    $course_name = $res['course_name'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="view_astaff.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="editaction_astaff.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>Address</td>
                <td><input type="text" name="address" value="<?php echo $address;?>"></td>
            </tr>
            <tr> 
                <td>Gender</td>
                <td><input type="text" name="gender" value="<?php echo $gender;?>"></td>
            </tr>
             <tr> 
                <td>Course_name</td>
                <td><input type="text" name="course_name" value="<?php echo $course_name;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="astaff_id" value=<?php echo $_GET['astaff_id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>