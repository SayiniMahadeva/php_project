<?php
session_start();
	include_once 'classess/User.php';
	$user = new User();

	if (isset($_REQUEST['submit'])) {
		extract($_REQUEST);
	    $login = $user->check_login($username, $password);
	    if ($login) {
	        // Registration Success
	       header("location:home.php");
	    } else {
	        // Registration Failed
	        echo 'Wrong username or password';
	    }
	}
?>
<html>
    <body>
        
    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
//OOP Login Module
<style><!--
            #container{width:400px; margin: 0 auto;}

--></style>

<script type="text/javascript" language="javascript">

            function submitlogin() {
                var form = document.login;
				if(form.username.value == ""){
					alert( "Enter email or username." );
					return false;
				}
				else if(form.password.value == ""){
					alert( "Enter password." );
					return false;
				}
			}

</script>

<span style="font-family: 'Courier 10 Pitch', Courier, monospace; font-size: 13px; font-style: normal; line-height: 1.5;"><div id="container"></span>
<h1>Login Here</h1>
<form action="" method="post" name="login">
<table>
<tbody>
<tr>
<th>UserName or Email:</th>
<td><input type="text" name="username" required="" /></td>
</tr>
<tr>
<th>Password:</th>
<td><input type="password" name="password" required="" /></td>
</tr>
<tr>
<td></td>
<td><input onclick="return(submitlogin());" type="submit" name="submit" value="Login" /></td>
</tr>
<tr>
<td></td>
<td><a href="registration.php">Register new user</a></td>
</tr>
</tbody>
</table>
</form></div>
</body>
</html>