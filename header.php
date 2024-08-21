<?php
include("admin/inc/config.php");
?>
<?php
$statement = $pdo->prepare("SELECT * FROM setting WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $title = $row['title'];
    $favicon = $row['favicon'];
    $meta_keyword = $row['meta_keyword_home'];
    $meta_description = $row['meta_description_home'];
}
?>
<!-- html header -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>
        <?php echo $title ?>
    </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="theme-color" content="#e83e8c" />
    <meta content="<?php echo $meta_keyword ?>" name="keywords" />
    <meta content="<?php echo $meta_description ?>" />

    <!-- Favicon -->
    <link href="<?php echo "img/" . $favicon ?>" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="#" id="nowDate"> </a>
                        </li>
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="#">Advertise</a>
                        </li>
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body small" href="login.php">Login</a>
                        </li>
                    </ul>
                    <span id="time" style="color: #fff; position: relative; left: 20vw"></span>
                </nav>
            </div>
            <div class="col-lg-3 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <li style="list-style: none;"><?php
                    $icon = '<i class="fa fa-user" style="padding-right: 1em;"></i>';
                    if (isset($_COOKIE['user_name'])) {
                        echo $icon;
                        echo $_COOKIE['user_name'];
                    }
                    ?></li>
                    <ul class="navbar-nav ml-auto mr-n2">
                        <?php
                        $statement = $pdo->prepare("SELECT * FROM social");
                        $statement->execute();
                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $row) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link text-body" href="<?php echo $row['link']; ?>">
                                    <small class="<?php echo $row['icon']; ?>"></small>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row align-items-center bg-white py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="index.php" class="navbar-brand p-0 d-none d-lg-block">
                    <h1 class="m-0 display-4 text-uppercase text-primary">
                        NAD<span class="text-secondary font-weight-normal">Soft</span>
                    </h1>
                </a>
            </div>
        </div>
        <?php
        $user_status='';
        if (isset($_COOKIE['user_status'])) {
            $user_status = $_COOKIE['user_status'];
        }
        if ($user_status=='Pending') {
            $email = $_COOKIE['user_mail'];
            echo '<div class="bg-dark text-center"><a href="verify.php?mail='.$email.'">Please verify your email address!</a></div>';
        }
        ?>
    </div>
    <!-- Topbar End -->

    <?php include_once('navbar.php'); ?>