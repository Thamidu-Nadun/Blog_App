<?php require_once('header.php'); ?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check if the product id is valid or not
	$statement = $pdo->prepare("SELECT * FROM page WHERE id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>

<?php
	// Getting image path to unlink from folder
	$statement = $pdo->prepare("SELECT * FROM page WHERE id=?");
	$statement->execute(array($_REQUEST['id']));
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	foreach ($result as $row) {
		$image_path = $row['image_path'];
		unlink('../assets/uploads/'.$image_path);
	}

	// Delete from page table
	$statement = $pdo->prepare("DELETE FROM page WHERE id=?");
	$statement->execute(array($_REQUEST['id']));

	// Delete from category table (assuming there is no constraint between page and category)
	// If there's a constraint, you may need to handle it appropriately
	// $statement = $pdo->prepare("DELETE FROM category WHERE id=?");
	// $statement->execute(array($row['category']));

	// Delete from users table (assuming no direct relation with page deletion)
	// $statement = $pdo->prepare("DELETE FROM users WHERE id=?");
	// $statement->execute(array($row['author']));

	// Redirect to product page
	header('location: page.php');
?>
