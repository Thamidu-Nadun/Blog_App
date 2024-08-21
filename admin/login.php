<?php
ob_start();
session_start();
include("inc/config.php");

$error_message='';

if(isset($_POST['form1'])) {
        
    if(empty($_POST['email']) || empty($_POST['password'])) {
        $error_message = 'Email and/or Password can not be empty<br>';
    } else {
		
		$email = strip_tags($_POST['email']);
		$password = strip_tags($_POST['password']);

    	$statement = $pdo->prepare("SELECT * FROM users WHERE email=? AND status=?");
    	$statement->execute(array($email,'Active'));
    	$total = $statement->rowCount();    
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);    
        if($total==0) {
            $error_message .= 'Email Address does not match<br>';
        } else {       
            foreach($result as $row) { 
                $row_password = $row['password'];
            }
        
            if( $row_password != md5($password) ) {
                $error_message .= 'Password does not match<br>';
            } else {       
            
				$_SESSION['user'] = $row;
                header("location: index.php");
                exit;
            }
        }
    }

    
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Login</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="css/login.css">
</head>

<body class="hold-transition login-page sidebar-mini">

<div class="login-box">
    <div class="login-logo">
    </div>
    <div class="login-box-body">
        
        <?php 
        if( (isset($error_message)) && ($error_message!='') ):
            echo '<div class="error">'.$error_message.'</div>';
        endif;
        ?>

        <form action="" method="post">
            <div class="login-box">
                <h2>Admin Login Portal</h2>
                <p class="login-box-msg">Log in to start your session</p><br>
                <div class="user-box">
                    <input placeholder="Email address" name="email" type="email" autocomplete="off" autofocus>
                    <label>Username</label>
                </div>
                <div class="user-box">
                    <input placeholder="Password" name="password" type="password" autocomplete="off" value="">
                    <label>Password</label>
                </div>
                <input type="submit" name="form1" class="submit" value="Log In">
            </div>
        </form>
    </div>
</div>


<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/select2.full.min.js"></script>
<script src="js/jquery.inputmask.js"></script>
<script src="js/jquery.inputmask.date.extensions.js"></script>
<script src="js/jquery.inputmask.extensions.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/icheck.min.js"></script>
<script src="js/fastclick.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<script src="js/app.min.js"></script>
<script src="js/demo.js"></script>

</body>
</html>
