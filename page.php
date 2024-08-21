<?php include_once('header.php') ?>
<link rel="stylesheet" href="css/blog.css">
<link rel="stylesheet" href="css/prism.css">

<?php
try {
    if (isset($_GET['id'])) {
        $page_id = $_GET['id'];

        $stmt = $pdo->prepare("SELECT views FROM page WHERE id = :id");
        $stmt->bindParam(':id', $page_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if any rows were returned
        if ($row) {
            $views = $row['views'] + 1;
            $stmt = $pdo->prepare("UPDATE page SET views = :views WHERE id = :id");
            $stmt->bindParam(':views', $views);
            $stmt->bindParam(':id', $page_id);
            $stmt->execute();
        } else {
            $err = "<h2 style='text-align: center;'>" . "Page ID does not exist." . "</h2>";
            die($err);
        }

        // echo "Page views: " . $views;
    } else {
        $err = "<h2 style='text-align: center;'>" . "Page ID not provided." . "</h2>";
        die($err);
    }
} catch (PDOException $exception) {
    die("Connection error: " . $exception->getMessage());
}
?>



<br><br>
<!--head-title img-by content para-start -->
<?php
try {
    if (isset($_GET['id'])) {
        $page_id = $_GET['id'];

        $stmt = $pdo->prepare("SELECT title, date, content, category, image_path, image_copyright, description FROM page WHERE id = :id");
        $stmt->bindParam(':id', $page_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $title = $result['title'];
            $date = $result['date'];
            $content = $result['content'];
            $category = $result['category'];
            $image_path = $result['image_path'];
            $image_copyright = $result['image_copyright'];
            $description = $result['description'];

            // Now you can use $title, $date, and $category as needed
        } else {
            echo "No page found with the provided ID.";
        }
    } else {
        echo "Page ID not provided.";
    }

} catch (PDOException $exception) {
    die("Connection error: " . $exception->getMessage());
}
?>
<!-- meta tags -->
<meta name="theme-color" content="#e83e8c">
<meta name="msapplication-TileColor" content="#e83e8c">

<meta content="<?php echo $description; ?>" name="description" />
<meta property="og:title" content="<?php echo $title; ?>">
<meta property="og:description" content="<?php echo $description; ?>">
<meta property="og:image" content="<?php echo $image_path; ?>">
<meta property="og:url" content="<?php echo $_SERVER['PHP_SELF']; ?>">
<meta property="og:type" content="blog">

<meta name="twitter:card" content="<?php echo $title; ?>">
<meta name="twitter:title" content="<?php echo $title; ?>">
<meta name="twitter:description" content="<?php echo $description; ?>">
<meta name="twitter:image" content="<?php echo $image_path; ?>">

<meta name="msapplication-TileImage" content="<?php echo $image_path; ?>">


<!-- end meta tags -->

<h1 id="head-title">
    <?php echo $title; ?>
</h1>
<div class="image-box">
    <img src="<?php echo $image_path; ?>" alt="" loading="lazy">
</div>
<p class="img-by">
    <?php echo $image_copyright; ?>
</p>
<div class="content">
    <?php echo $content; ?>
</div>


<?php include_once('pages/comment.php') ?>


<?php include_once('pages/page-footer.php') ?>

<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="/lib/easing/easing.min.js"></script>
<script src="/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="/js/date.js"></script>

<!-- Template Javascript -->
<script src="/js/main.js"></script>
<script src="css/prism.js"></script>
</body>

</html>