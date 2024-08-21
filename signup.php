<?php
include ("admin/inc/config.php");
?>
<?php
// Handle signup form
if (isset($_POST['form1'])) {
    $user_name = strip_tags($_POST['user_name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $status = 'Pending';
    $verify_code = md5($password . $user_name . time());

    if (empty($user_name) || empty($email) || empty($password)) {
        $error_message = 'User Name, Email and/or Password cannot be empty<br>';
    } else {
        $hashed_password = md5($password);

        // Ensure column names and values match the table structure
        $statement = $pdo->prepare("INSERT INTO n_user (name, email, password, status, verify_code) VALUES (?, ?, ?, ?, ?)");
        if ($statement->execute([$user_name, $email, $hashed_password, $status, $verify_code])) {
            $expire = time() + 60 * 60 * 24 * 7; // 7 days
            setcookie('user_name', $user_name, $expire, '/', '', true, true);
            setcookie('email', $email, $expire, '/', '', true, true);
            setcookie('status', $status, $expire, '/', '', true, true);
            $message = 'successfully Registered!';
            echo "<script>pushToast('$message', 'success');</script>";
            echo "<script>setTimeout(function() { window.location.href = 'index.php'; }, 1000);</script>";
            exit;
        } else {
            $message = 'Error occurred during signup<br>';
            echo "<script>pushToast('$message', 'error');</script>";
            echo "<script>setTimeout(function() { window.location.href = 'index.php'; }, 5000);</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign-Up</title>
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
                <label for="user_name">Name</label>
                <input required name="user_name" type="text" autocapitalize="off" autocorrect="off"
                    placeholder="John Smith" />

                <label for="email">Email</label>
                <input required name="email" type="email" autocapitalize="off" autocorrect="off"
                    placeholder="john@mail.com" />

                <label for="password">Password</label>
                <input id="password" class="password" required name="password" type="password" placeholder="* * * *" />
                <div class="hide-show">
                    <span>Show</span>
                </div>
                <button type="submit" name="form1">Register</button>
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