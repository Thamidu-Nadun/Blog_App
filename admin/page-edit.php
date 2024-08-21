<?php 
require_once('header.php'); 

// Check if the ID is provided in the URL
if (!isset($_REQUEST['id'])) {
    // header('location: logout.php');
    exit;
} else {
    // Check if the ID is valid
    $page_id = $_REQUEST['id'];
    // Fetch the page details from the database
    $statement = $pdo->prepare("SELECT * FROM page WHERE id=?");
    $statement->execute(array($page_id));
    $page = $statement->fetch(PDO::FETCH_ASSOC);
    
}

// Fetch categories
$categories = [];
$statement = $pdo->prepare("SELECT * FROM category");
$statement->execute();
$categories = $statement->fetchAll(PDO::FETCH_ASSOC);

// Check if the form is submitted
if(isset($_POST['update_page'])) {
    // Retrieve data from form submission
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $image_path = $_POST['image_path'];
    $image_copyright = $_POST['image_copyright'];
    $author = $_POST['author'];
    $date = $_POST['date'];

    // Update the page data in the database
    $statement = $pdo->prepare("UPDATE page SET title=?, content=?, category=?, description=?, image_path=?, image_copyright=?, author=?, date=? WHERE id=?");
    $success = $statement->execute(array($title, $content, $category, $description, $image_path, $image_copyright, $author, $date, $page_id));

    if ($success) {
        // Redirect user after successful update
		$error_message = 'Successfully Updated page';
        header('location: page.php');
        exit;
    } else {
        // Handle database error
        $error_message = 'Failed to update page. Please try again.';
    }
}
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Edit Page</h1>
    </div>
    <div class="content-header-right">
        <a href="page.php" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php if(isset($error_message)): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
            <?php endif; ?>
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <!-- Page ID -->
                <input type="hidden" name="page_id" value="<?php echo $page['id']; ?>">

                <!-- Title -->
                <div class="form-group">
                    <label class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-6">
                        <input type="text" name="title" class="form-control" value="<?php echo $page['title']; ?>">
                    </div>
                </div>

                <!-- Content -->
                <div class="form-group">
                    <label class="col-sm-2 control-label">Content</label>
                    <div class="col-sm-6">
                        <textarea name="content" class="form-control"><?php echo $page['content']; ?></textarea>
                    </div>
                </div>

                <!-- Category -->
                <div class="form-group">
                    <label class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-6">
                        <select name="category" class="form-control">
                            <option value="">Select Category</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $page['category']) echo 'selected'; ?>>
                                    <?php echo $category['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-6">
                        <textarea name="description" class="form-control"><?php echo $page['description']; ?></textarea>
                    </div>
                </div>

                <!-- Image Path -->
                <div class="form-group">
                    <label class="col-sm-2 control-label">Image Path</label>
                    <div class="col-sm-6">
                        <input type="text" name="image_path" class="form-control" value="<?php echo $page['image_path']; ?>">
                    </div>
                </div>

                <!-- Image Copyright -->
                <div class="form-group">
                    <label class="col-sm-2 control-label">Image Copyright</label>
                    <div class="col-sm-6">
                        <input type="text" name="image_copyright" class="form-control" value="<?php echo $page['image_copyright']; ?>">
                    </div>
                </div>

                <!-- Author -->
                <div class="form-group">
                    <label class="col-sm-2 control-label">Author</label>
                    <div class="col-sm-6">
                        <input type="text" name="author" class="form-control" value="<?php echo $page['author']; ?>">
                    </div>
                </div>

                <!-- Date -->
                <div class="form-group">
                    <label class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-6">
                        <input type="text" name="date" class="form-control datepicker" value="<?php echo $page['date']; ?>">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-6">
                        <button type="submit" class="btn btn-success" name="update_page">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require_once('footer.php'); ?>
