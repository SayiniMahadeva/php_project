<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("classess/Crud.php");
include_once("classess/Validation.php");
 
$crud = new Crud();
$validation = new Validation();
 
if(isset($_POST['Submit'])) {    
    $name = $crud->escape_string($_POST['name']);
    $address = $crud->escape_string($_POST['address']);
    $gender = $crud->escape_string($_POST['gender']);
        
    $msg = $validation->check_empty($_POST, array('name', 'address', 'gender'));
  
    // checking empty fields
    if($msg != null) {
        echo $msg;        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    }

    else { 
        
        //insert data to database    
         $result = $crud->execute("INSERT INTO non_academic_staff(name,address,gender) VALUES('$name','$address','$gender')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
    
    <html>
<head>
    <title>Add Data</title>
</head>
 
<body>
    <a href="index_class.php">Home</a>
    <br/><br/>
 
    <form action="add_class.php" method="post" name="form1">
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
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
</body>
</html>
</body>
</html>