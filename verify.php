<?php include_once ('header.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['form1'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $code_id = strip_tags($_POST['code_id']);

    if (empty($email) || empty($code_id)) {
        echo '<span style="text-align: center; padding-top: 2em; display: flex; justify-content: center; align-item: center;">Email and/or Verification code cannot be empty</span><br>';
    } else {
        try {
            $statement = $pdo->prepare("SELECT * FROM n_user WHERE email = :email");
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $verify_code = $result['verify_code'];

                if ($verify_code === $code_id) {
                    $statement = $pdo->prepare("UPDATE n_user SET status = 'Active', verify_code = '' WHERE email = :email");
                    $statement->bindParam(':email', $email, PDO::PARAM_STR);
                    $statement->execute();

                    echo "<span style='text-align: center; padding-top: 2em; display: flex; justify-content: center; align-item: center;'>Verification successful</span>";

                    setcookie('status', '', time() - 3600, '/');

                    echo "<script>
                            setTimeout(function() {
                                window.location.href = 'index.php';
                            }, 5000);
                          </script>";
                    exit;
                } else {
                    if ($verify_code=='') {
                        echo "<span style='text-align: center; padding-top: 2em; display: flex; justify-content: center; align-item: center;'>You are already verified</span>";;  
                    }else{
                        echo "<span style='text-align: center; padding-top: 2em;'>Verification code does not match</span>";
                    }
                }
            } else {
                echo "<span style='text-align: center; padding-top: 2em; display: flex; justify-content: center; align-item: center;'>No user found with this email</span>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300);

        .login-page {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;
            height: 80vh;
        }

        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
        }

        .form input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form button {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #4CAF50;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
        }

        .form button:hover,
        .form button:active,
        .form button:focus {
            background: #43A047;
        }

        .form .message {
            margin: 15px 0 0;
            color: #b3b3b3;
            font-size: 12px;
        }

        .form .message a {
            color: #4CAF50;
            text-decoration: none;
        }

        .container {
            position: relative;
            z-index: 1;
            max-width: 300px;
            margin: 0 auto;
        }

        .container:before,
        .container:after {
            content: "";
            display: block;
            clear: both;
        }

        .container .info {
            margin: 50px auto;
            text-align: center;
        }

        .container .info h1 {
            margin: 0 0 15px;
            padding: 0;
            font-size: 36px;
            font-weight: 300;
            color: #1a1a1a;
        }

        .container .info span {
            color: #4d4d4d;
            font-size: 12px;
        }

        .container .info span a {
            color: #000000;
            text-decoration: none;
        }

        .container .info span .fa {
            color: #EF3B3A;
        }
    </style>
</head>

<body>
    <div class="login-page">
        <div class="form">
            <form class="login-form" method="post" action="">
                <input type="email" placeholder="Email" name="email" required value="<?php 
                if ($_GET['mail']) {
                    echo $_GET['mail'];
                }
                ?>"/>
                <input type="text" placeholder="Verification code" name="code_id" required />
                <button type="submit" name="form1">Verify</button>
            </form>
        </div>
    </div>
</body>

</html>