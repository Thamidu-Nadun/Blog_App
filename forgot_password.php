<?php
include("admin/inc/config.php");
?>
<?php
$send = false;
if (isset($_POST['form1'])) {
    //something do
    $send = true;
}
if ($send) {
    echo "<script>
    let form_1 = document.getElementById('form1');
    let form_2 = document.getElementById('form2');
    let form_3 = document.getElementById('form3');

    form_1.classList.add('hide');
    form_2.classList.remove('hide');
    form_2.classList.add('appear');

</script>";
}
?>
<!-- <script>
    let form_1 = document.getElementById('form1');
    let form_2 = document.getElementById('form2');
    let form_3 = document.getElementById('form3');

    form_1.classList.add('hide');
    form_2.classList.remove('hide');
    form_2.classList.add('appear');

</script> -->
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
            width: 50%;
            margin: 1em 25% 0;
            border: none;
            background: #FFCC00;
            padding: 1em 0;
            font-size: 1em;
            color: #000;
            border-radius: 25px;
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

        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
            opacity: 0;
        }
        a{
            text-decoration: none;
            font-size: 2em;
            padding-bottom: 2em;
            color: #FFCC00;
            font-style: bold;
        }
        .hide{
            display: none;
            transition: 0.5s;
        }
        .appear{
            display: flex;
            transform: translateX(0);
            animation: appear 1s linear forwards;
        }
        @keyframes appear {
            100%{
                transform: translateX(100%);
            }
        }
    </style>
    <link rel="stylesheet" href="css/toast.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.css">
</head>

<body>
    <div class="login_form">
        <section class="login-wrapper" id="form1">
            <div class="logo">
                <a href="index.php">
                    <i class="fa fa-user"></i><br/>NADSOFT <br/><br/>
                </a>
            </div>

            <form id="login" method="post" action="">
                <label for="email">Email</label>
                <input required name="email" type="email" autocapitalize="off" autocorrect="off" placeholder="john@mail.com" />

                <button type="submit" name="form1">Submit</button>
            </form>
        </section>
        <section class="login-wrapper hide">
            <div class="logo">
                <a href="index.php">
                    <i class="fa fa-user"></i><br/>NADSOFT <br/><br/>
                </a>
            </div>

            <form id="login" method="post" action="">
                <label for="email">verification Code</label>
                <input required name="verify_code" type="text" autocapitalize="off" autocorrect="off" />

                <button type="submit" name="form2">Submit</button>
            </form>
        </section>
        <section class="login-wrapper hide">
            <div class="logo">
                <a href="index.php">
                    <i class="fa fa-user"></i><br/>NADSOFT <br/><br/>
                </a>
            </div>

            <form id="login" method="post" action="">
                <label for="email">New Password</label>
                <input required name="new_password" type="text" autocapitalize="off" autocorrect="off" />
                <label for="email">Confirm Password</label>
                <input required name="confirm_password" type="text" autocapitalize="off" autocorrect="off" />

                <button type="submit" name="form3">Change</button>
            </form>
        </section>
        <div id="snackbar"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></div>
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
