<?php
// including the database connection file
include_once("classess/Nstaff.php");
 
$nstaff = new Nstaff();
 
//getting id from url
$nstaff_id = $nstaff->escape_string($_GET['nstaff_id']);
 
//selecting data associated with this particular id
$result = $nstaff->getData("SELECT * FROM non_academic_staff WHERE nstaff_id=$nstaff_id");
 
foreach ($result as $res) {
    $name = $res['name'];
    $address = $res['address'];
    $gender = $res['gender'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="view_nstaff.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="editaction_nstaff.php">
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
                <td><input type="hidden" name="nstaff_id" value=<?php echo $_GET['nstaff_id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>