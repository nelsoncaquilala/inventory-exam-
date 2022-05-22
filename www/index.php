<?php 
error_reporting(0);
session_start();
    require_once('connection/data.php');

    

    $msg=0;
    if(isset($_POST['submit']))
    {
		$username=$_POST['username'];
		$password=$_POST['password'];
		// $password=md5($password);

        $check_user=mysqli_query($con,"SELECT * FROM users 
		where username='$username' and password='$password'");
        $rows=mysqli_num_rows($check_user);
      
        if($rows)
        {
            while($fetch=mysqli_fetch_array($check_user))
            {
                $_SESSION['username']=$username;

                // $isCashier=$fetch['isCashier'];

                    // header("Location:home.php");
                    echo "<script> window.open('home.php', ''); window.parent.close();</script>";   
            }
        }
        else 
        {
            $msg=2;
            // die(mysqli_error($con));
        }


        // if($username1==$username2 && $password1==$password2)
        // {
        //     $_SESSION['username']=$username2;
        //     header("Location:home.php");
        // }
       
    }
    if(isset($_SESSION['username']))
    {
        header("Location:home.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>LOGIN</title>
  <link rel="stylesheet" href="css/reset.css">
 <link rel="stylesheet" href="css/login.css" media="screen" type="text/css" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<style type="text/css">
    .wrap button {
      width: 100%;
      border-radius: 7px;
      background: #b6ee65;
      text-decoration: center;
      border: none;
      color: #51771a;
      margin-top:-5px;
      padding-top: 14px;
      padding-bottom: 14px;
      outline: none;
      font-size: 13px;  
      border-bottom: 3px solid #307d63;
      cursor: pointer;
      font-weight: 900;
  }
  .wrap h5
  {
	  color:white;
	  margin-top:30px;
  }
</style>
</head>
<body>
<form action="" method="POST">
            <div class="wrap">
               
                   <h5>LOGIN</h5>
               
                <input type="text" placeholder="Username" name='username' required autofocus >
                <div class="bar">
                    <i></i>
                </div>
                <input type="password" placeholder="Password" name='password' required>
                <br>
                <button type="submit" name="submit">LOGIN</button>

                <!-- <br><br><br>  <a href="" class="">Forgot Password ?</a> -->
            </div>
    </form>
    <script src="js/sweetalert.min.js"></script>
</body>
</html>
<?php
if($msg==2)
{ 
    echo '<script>swal("Please check username/password, Try Again !", {})</script>';
}
?>