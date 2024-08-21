<?php
include ("admin/inc/config.php");

$error_message = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['form1'])) {
        $user_mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $user_password = $_POST['password'];

        $statement = $pdo->prepare("SELECT * FROM n_user WHERE email = :email");
        $statement->bindParam(':email', $user_mail, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $real_password = $result['password'];

            if (md5($user_password) === $real_password) {
                $expire = time() + 60 * 60 * 24 * 7; // 7 days
                $cookie_options = [
                    'expires' => $expire,
                    'path' => '/',
                    'secure' => isset($_SERVER['HTTPS']),
                    'httponly' => true,
                    'samesite' => 'Lax'
                ];
                setcookie('user_id', $result['id'], $cookie_options);
                setcookie('user_name', $result['name'], $cookie_options);
                setcookie('user_mail', $result['email'], $cookie_options);
                setcookie('user_status', $result['status'], $cookie_options);
                setcookie('verify_code', $result['verify_code'], $cookie_options);

                $message = 'Login successful';
                echo "<script>pushToast('$message','success');</script>";
                // header('location: index.php');
                echo "<script>setTimeout(function() { window.location.href = 'index.php'; }, 3000);</script>";
            } else {
                $message = 'Invalid password.';
                echo "<script>pushToast('$message', 'error');</script>";

            }
        } else {
            $message = 'Invalid email.';
            echo "<script>pushToast('$message','error');</script>";

        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <style>
        *,
        *:before,
        *:after {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body,
        html,
        .login_form {
            height: 100%;
        }

        body {
            background: #262626;
        }

        .login_form {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-wrapper {
            max-width: 500px;
            width: 100%;
        }

        .logo {
            text-align: center;
        }

        .logo img {
            max-width: 200px;
            width: 100%;
            margin: 1em auto 2em;
        }

        form {
            background: #000;
            padding: 2em 1em;
            font-family: helvetica, sans-serif;
            border-radius: 25px;
        }

        form label {
            color: #fff;
            margin: 0 3% 0.25em;
            display: block;
            font-family: helvetica, sans-serif;
        }

        form input {
            width: 94%;
            padding: 0.5em 0.25em;
            margin: 0 3% 1em;
            font-size: 1.2em;
            border: 2px solid #000;
            outline: none;
            transition: all 0.25s;
            border-radius: 15px;
        }

        form input.password {
            padding-right: 4rem;
        }

        form input:focus {
            border: 2px solid #FFCC00;
        }

        form button {
            width: 94%;
            margin: 2em 3% 0;
            border: none;
            background: #FFCC00;
            padding: 1em 0;
            font-size: 1.25em;
            color: #000;
            border-radius: 5px;
            outline: none;
            transition: all 0.25s;
            cursor: pointer;
        }

        form button:focus,
        form button:hover {
            background: #262626;
        }

        .hide-show {
            width: 94%;
            margin: -3.62em 3% 0 1.5%;
            position: relative;
            z-index: 5;
            display: none;
        }

        .hide-show span {
            background: #FFCC00;
            font-size: 1em;
            padding: 0.5em;
            float: right;
            border-radius: 5px;
            cursor: pointer;
        }

        a {
            text-decoration: none;
            font-size: 2em;
            padding-bottom: 2em;
            color: #FFCC00;
            font-style: bold;
        }

        .bottom-bar {
            display: flex;
            justify-content: space-between;
            margin: .5em 1em;
        }

        @media screen and (max-width: 800px) {
            .bottom-bar {
                flex-direction: column;
                margin: 1em auto;
                align-items: center;
                justify-content: center;
            }
        }
    </style>
    <link rel="stylesheet" href="css/toast.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.css">
</head>

<body>
    <div class="login_form">
        <section class="login-wrapper">
            <div class="logo">
                <a href="index.php">
                    <i class="fa fa-user"></i><br />NADSOFT <br /><br />
                </a>
            </div>

            <form id="login" method="post" action="">
                <label for="email">Email</label>
                <input required name="email" type="email" autocapitalize="off" autocorrect="off" />

                <label for="password">Password</label>
                <input id="password" class="password" required name="password" type="password" />
                <div class="hide-show">
                    <span>Show</span>
                </div>
                <button type="submit" name="form1">Log In</button><br /><br /><br />
                <div class="bottom-bar">
                    <a href="signup.php" style="font-size: 1em;">Create a new account ?</a>
                    <a href="forgot_password.php" style="font-size: 1em;">Forgot your password ?</a>
                </div>
            </form>
        </section>
        <div id="snackbar"></div>
    </div>

    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/toast.js"></script>
    <script>
        $(function () {
            $('.hide-show').show();
            $('.hide-show span').addClass('show');

            $('.hide-show span').click(function () {
                if ($(this).hasClass('show')) {
                    $(this).text('Hide');
                    $('#password').attr('type', 'text');
                    $(this).removeClass('show');
                } else {
                    $(this).text('Show');
                    $('#password').attr('type', 'password');
                    $(this).addClass('show');
                }
            });

            $('form button[type="submit"]').on('click', function () {
                $('.hide-show span').text('Show').addClass('show');
                $('#password').attr('type', 'password');
            });
        });


        // Call pushToast if there's a message from PHP
        <?php if (!empty($message)): ?>
            pushToast('<?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>');
        <?php endif; ?>
    </script>
</body>

</html>