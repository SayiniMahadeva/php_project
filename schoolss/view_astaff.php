<?php
//including the database connection file
include_once("classess/Staff.php");
 
$staff = new Staff();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM academic_staff ORDER BY astaff_id DESC";
$result = $staff->getData($query);
//echo '<pre>'; print_r($result); exit;
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="add_astaff.php">Add New Data</a><br/><br/>
 
    <table width='80%' border=0>
 
    <tr bgcolor='#CCCCCC'>
        <td>Name</td>
        <td>Address</td>
        <td>Gender</td>
         <td>Course_name</td>
        <td>Update</td>
    </tr>
    <?php 
    foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$res['name']."</td>";
        echo "<td>".$res['address']."</td>";
        echo "<td>".$res['gender']."</td>"; 
         echo "<td>".$res['course_name']."</td>"; 
        echo "<td><a href=\"edit_astaff.php?astaff_id=$res[astaff_id]\">Edit</a> | <a href=\"delete_astaff.php?astaff_id=$res[astaff_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
    }
    ?>
    </table>
</body>
</html>