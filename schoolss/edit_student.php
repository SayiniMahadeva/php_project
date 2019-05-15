<?php
// including the database connection file
include_once("classess/Student.php");
 
$student = new Student();
 
//getting id from url
$student_id = $student->escape_string($_GET['student_id']);
 
//selecting data associated with this particular id
$result = $student->getData("SELECT * FROM student WHERE student_id=$student_id");
 
foreach ($result as $res) {
    $name = $res['name'];
    $address = $res['address'];
    $grade = $res['grade'];
     $phone_no = $res['phone_no'];
      $class_id = $res['class_id'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="view_student.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="editaction_student.php">
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
                <td>Grade</td>
                <td><input type="text" name="grade" value="<?php echo $grade;?>"></td>
            </tr>
            <tr> 
                <td>Phone_no</td>
                <td><input type="text" name="phone_no" value="<?php echo $phone_no;?>"></td>
            </tr>
            <tr> 
                <td>Class_id</td>
                <td><input type="text" name="class_id" value="<?php echo $class_id;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="student_id" value=<?php echo $_GET['student_id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>