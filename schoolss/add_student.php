
<?php
//including the database connection file
include_once("classess/Student.php");
include_once("classess/Validation.php");
 
$student = new Student();
$validation = new Validation();
 
if(isset($_POST['Submit'])) {    
    $name = $student->escape_string($_POST['name']);
    $address = $student->escape_string($_POST['address']);
    $grade = $student->escape_string($_POST['grade']);
     $phone_no = $student->escape_string($_POST['phone_no']);
      $class_id = $student->escape_string($_POST['class_id']);
        
    $msg = $validation->check_empty($_POST, array('name', 'address', 'grade','phone_no', 'class_id'));
  
    
    // checking empty fields
    if($msg != null) {
        echo $msg;        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    }

    else { 
        
        //insert data to database    
 
        $result = $student->execute("INSERT INTO student(name,address,grade,phone_no,class_id) VALUES('$name','$address','$grade','$phone_no','$class_id')");
        if($result){
            echo "success";
        }
        else{
            echo "error";
        }
        //display success message
       // echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='view_student.php'>View Result</a>";
    }
}
?>
    
    <html>
<head>
    <title>Add Data</title>
</head>
 
<body>
    <a href="view_student.php">Home</a>
    <br/><br/>
 
    <form action="add_student.php" method="post" name="form1">
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
                <td>Grade</td>
                <td><input type="text" name="grade"></td>
            </tr>
            <tr> 
                <td>phone_no</td>
                <td><input type="text" name="phone_no"></td>
            </tr>
            <tr> 
                <td>Class_id</td>
                <td><input type="text" name="class_id"></td>
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