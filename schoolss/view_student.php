<?php
//including the database connection file
include_once("classess/Student.php");
 
$student = new Student();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM student ORDER BY student_id DESC";
$result = $student->getData($query);
//echo '<pre>'; print_r($result); exit;
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="add_student.php">Add New Data</a><br/><br/>
 
    <table width='80%' border=0>
 
    <tr bgcolor='#CCCCCC'>
        <td>Name</td>
        <td>Address</td>
        <td>Grade</td>
          <td>Phone_no</td>
            <td>Class_id</td>
        <td>Update</td>
    </tr>
    <?php 
    foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$res['name']."</td>";
        echo "<td>".$res['address']."</td>";
        echo "<td>".$res['grade']."</td>";  
        echo "<td>".$res['phone_no']."</td>";  
        echo "<td>".$res['class_id']."</td>";  
        echo "<td><a href=\"edit_student.php?student_id=$res[student_id]\">Edit</a> | <a href=\"delete_student.php?student_id=$res[student_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
    }
    ?>
    </table>
</body>
</html>