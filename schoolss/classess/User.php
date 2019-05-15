<?php
include 'DbConfig.php';

	class User extends Dbconfig{

		 public function __construct()
    {
        parent::__construct();
    }
    

		/*** for registration process ***/
		public function reg_user($username,$password,$email){

			$password = md5($password);
			$sql="SELECT * FROM admin WHERE username='$username' OR email='$email'";

			//checking if the username or email is available in db
			$check =  $this->connection->query($sql) ;
			$count_row = $check->num_rows;

			//if the username is not in db then insert to the table
			if ($count_row == 0){
				$sql1="INSERT INTO admin SET username='$username', password='$password',  email='$email'";
				$result = mysqli_query($this->connection,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;
			}
			else { return false;}
		}

		/*** for login process ***/
		public function check_login($username, $password){

        	$password = md5($password);
			$sql2="SELECT Admin_id from admin WHERE  username='$username' and password='$password'";

			//checking if the username is available in the table
        	$result = mysqli_query($this->connection,$sql2);
        	$user_data = mysqli_fetch_array($result);
        	$count_row = $result->num_rows;

	        if ($count_row == 1) {
	            // this login var will use for the session thing
	            $_SESSION['login'] = true;
	            $_SESSION['uid'] = $user_data['uid'];
	            return true;
	        }
	        else{
			    return false;
			}
    	}

    	/*** for showing the username or fullname ***/
//    	public function get_fullname($uid){
//    		$sql3="SELECT fullname FROM users WHERE uid = $uid";
//	        $result = mysqli_query($this->db,$sql3);
//	        $user_data = mysqli_fetch_array($result);
//	        echo $user_data['fullname'];
//    	}

    	/*** starting the session ***/
	    public function get_session(){
	        return $_SESSION['login'];
	    }

	    public function user_logout() {
	        $_SESSION['login'] = FALSE;
	        session_destroy();
	    }

	}
?>