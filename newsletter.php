<?php require_once('header.php'); ?>

<?php
if (isset($_POST['newsletter_mail'])) {
	$mail = $_POST['newsletter_mail'];
	$valid = 1;

	if (empty($_POST['newsletter_mail'])) {
		$valid = 0;
		$message .= "Fill Email Address.<br>";
		die();
	}

	if ($valid == 1) {
		$statement = $pdo->prepare("INSERT INTO subscribers (email)
                                     VALUES (:mail)");
		$statement->bindValue(':mail', $mail);
		$statement->execute();

		$message = 'Subscribed successfully.';
	}
}
?>
<h2 style="text-align:center;">
	<?php echo $message; ?>
</h2>