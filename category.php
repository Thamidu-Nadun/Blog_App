<?php require_once('header.php') ?>

<?php

// Sanitize the search input
try {
    if (isset($_GET['cat_id'])) {
        $cat_id = $_GET['cat_id'];
    } else {
        $err = "<h2 style='text-align: center;'>"."No Category Found!"."</h2>";
        die($err);
    }
} catch (PDOException $exception) {
    die("Connection error: " . $exception->getMessage());
}

// Prepare and execute the query
$statement = $pdo->prepare("SELECT page.id, title,description, category, image_path, views, comment, author, date, category.name AS category_name 
                            FROM page 
                            INNER JOIN category ON page.category = category.id
                            WHERE category.id=:cat_id");
$statement->bindValue(':cat_id', $cat_id);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

// Process the result
$card_data = [];
foreach ($result as $row) {
    $id = $row['id'];
    $title = $row['title'];
    $views = $row['views'];
    $comment = $row['comment'];
    $author = $row['author'];
    $date = $row['date'];
    $description = $row['description'];
    $category = $row['category_name'];
    $category_id = $row['category'];
    $image_path = $row['image_path'];

    $row_data = array(
        'id' => $id,
        'title' => $title,
        'views' => $views,
        'comment' => $comment,
        'author' => $author,
        'date' => $date,
        'description' => $description,
        'category' => $category,
        'category_id' => $category_id,
        'image_path' => $image_path
    );
    $card_data[] = $row_data;
}
?>

<!-- Display the results -->
<?php if (!empty($card_data)): ?>
    <?php foreach ($card_data as $data): ?>



        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" src="<?php echo $data['image_path']; ?>" style="object-fit: cover" loading="lazy" />
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-2">
                                <?php $cat_link = "category.php?cat_id=".$data['category_id']; ?>
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="<?php echo $cat_link; ?>">
                                    <?php echo $data['category']; ?>
                                </a>
                                <a class="text-body" href=""><small>
                                        <?php echo $data['date']; ?>
                                    </small></a>
                            </div>
                            <?php $page_link = "page.php?id=".$data['id']; ?>
                            <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                href="<?php echo $page_link; ?>">
                                <?php echo $data['title']; ?>
                                ?>
                            </a>
                            <p class="m-0">
                                <?php echo $data['description']; ?><br />.<br />
                            </p>
                        </div>
                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="" />
                                <small>
                                    <?php echo $data['author']; ?>
                                </small>
                            </div>
                            <div class="d-flex align-items-center">
                                <small class="ml-3"><i class="far fa-eye mr-2"></i>
                                    <?php echo $data['views']; ?>
                                </small>
                                <small class="ml-3"><i class="far fa-comment mr-2"></i>
                                    <?php echo $data['comment']; ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    <?php endforeach; ?>
<?php else: ?>
    <p>No results found.</p>
<?php endif; ?>

<?php include_once('footer.php'); ?>