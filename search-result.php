<?php include_once('header.php') ?>
<style>
    .highlight {
    background-color: deeppink;
    font-weight: bold;
    padding: 0 .4em;
    border-radius: 5em;
}
/* Style the selected text */
::selection {
    background-color: deeppink;
    color: #fff;
}


</style>
<?php

// Sanitize the search input
$search_text = strip_tags($_REQUEST['search'] ?? '');

// Prepare and execute the query
$statement = $pdo->prepare("SELECT page.id, title,description, category, views, comment, author,  image_path, date, category.name AS category_name 
                            FROM page 
                            INNER JOIN category ON page.category = category.id
                            WHERE title LIKE :title");
$statement->bindValue(':title', '%' . $search_text . '%');
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

// Process the result
$card_data = [];
foreach ($result as $row) {
    $id = $row['id'];
    $title = $row['title'];
    $date = $row['date'];
    $views = $row['views'];
    $comment = $row['comment'];
    $author = $row['author'];
    $description = $row['description'];
    $cat_id = $row['category'];
    $category = $row['category_name'];
    $image_path = $row['image_path'];

    $row_data = array(
        'id' => $id,
        'title' => $title,
        'date' => $date,
        'views' => $views,
        'comment' => $comment,
        'author' => $author,
        'description' => $description,
        'cat_id' => $cat_id,
        'category' => $category,
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
                                <?php $cat_link = "category.php?cat_id=".$data['cat_id']; ?>
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
                                <?php 
                                // echo $data['title'];
                                $title = $data['title'];
                                $highlighted_title = preg_replace('/(' . preg_quote($search_text, '/') . ')/i', '<span class="highlight">$1</span>', $title);
                                echo $highlighted_title; 
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
