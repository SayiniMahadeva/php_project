<?php
//including the database connection file
include_once("classess/Nstaff.php");
 
$nstaff = new Nstaff();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM non_academic_staff ORDER BY nstaff_id DESC";
$result = $nstaff->getData($query);
//echo '<pre>'; print_r($result); exit;
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="add_nstaff.php">Add New Data</a><br/><br/>
 
    <table width='80%' border=0>
 
    <tr bgcolor='#CCCCCC'>
        <td>Name</td>
        <td>Address</td>
        <td>Gender</td>
        <td>Update</td>
    </tr>
    <?php 
    foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$res['name']."</td>";
        echo "<td>".$res['address']."</td>";
        echo "<td>".$res['gender']."</td>";    
        echo "<td><a href=\"edit_nstaff.php?nstaff_id=$res[nstaff_id]\">Edit</a> | <a href=\"delete_nstaff.php?nstaff_id=$res[nstaff_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
    }
    ?>
    </table>
</body>
</html>