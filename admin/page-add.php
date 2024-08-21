<?php require_once('header.php'); ?>

<?php
if (isset($_POST['form1'])) {
	$valid = 1;

	if (empty($_POST['category'])) {
		$valid = 0;
		$error_message .= "You must select a category.<br>";
	}

	if (empty($_POST['title'])) {
		$valid = 0;
		$error_message .= "Title cannot be empty.<br>";
	}

	if (empty($_POST['content'])) {
		$valid = 0;
		$error_message .= "Content cannot be empty.<br>";
	}

	// Add other validations as needed

	if ($valid == 1) {
		// Handle file upload for image
		// if ($_FILES['image']['name'] != '') {
		// 	$image_path = $_FILES['image']['name'];
		// 	$image_tmp = $_FILES['image']['tmp_name'];
		// 	move_uploaded_file($image_tmp, "../assets/uploads/" . $image_path);
		// } else {
		// 	$image_path = ''; // Handle if no image uploaded
		// }

		// Insert data into 'page' table
		$statement = $pdo->prepare("INSERT INTO page (title, content, date, category, description, image_path, author, image_copyright)
                                     VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
		$statement->execute(
			array(
				$_POST['title'],
				$_POST['content'],
				$_POST['date'],
				$_POST['category'],
				$_POST['description'],
				$_POST['image_path'],
				$_POST['author'],
				$_POST['image_copyright']
			)
		);

		$success_message = 'Page added successfully.';
	}
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Page</h1>
	</div>
	<div class="content-header-right">
		<a href="page.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<?php if ($error_message): ?>
				<div class="callout callout-danger">
					<p>
						<?php echo $error_message; ?>
					</p>
				</div>
			<?php endif; ?>
			<?php if ($success_message): ?>
				<div class="callout callout-success">
					<p>
						<?php echo $success_message; ?>
					</p>
				</div>
			<?php endif; ?>
			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Category <span>*</span></label>
							<div class="col-sm-4">
								<select name="category" class="form-control select2">
									<option value="">Select Category</option>
									<?php
									$statement = $pdo->prepare("SELECT * FROM category ORDER BY name ASC");
									$statement->execute();
									$result = $statement->fetchAll(PDO::FETCH_ASSOC);
									foreach ($result as $row) {
										?>
										<option value="<?php echo $row['id']; ?>">
											<?php echo $row['name']; ?>
										</option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Title <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="title" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Description</label>
							<div class="col-sm-8">
								<textarea name="description" class="form-control" cols="30" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Content <span>*</span></label>
							<div class="col-sm-8">
								<textarea name="content" class="form-control" cols="30" rows="10"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Author</label>
							<div class="col-sm-4">
								<input type="text" name="author" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Date <span>*</span></label>
							<div class="col-sm-4">
								<input type="date" name="date" class="form-control">
							</div>
						</div>
						<!-- <div class="form-group">
							<label for="" class="col-sm-3 control-label">Image</label>
							<div class="col-sm-4">
								<input type="file" name="image">
							</div>
						</div> -->
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Image Path</label>
							<div class="col-sm-4">
								<input type="text" name="image_path" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Image Copyright</label>
							<div class="col-sm-4">
								<input type="text" name="image_copyright" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Add Page</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

<?php require_once('footer.php'); ?>