<?php include_once 'header.php'; ?>
<?php 
    if (!isset($_COOKIE['user_id'])){
        die('<h2 style="text-align: center;">'.'You must login first.'.'</h2>');
    }
?>
<?php
if (isset($_GET['id'])) {
    $comment_id = $_GET['id'];
    $current_user_id = $_COOKIE['user_id'];

    // Fetch the comment from the database
    $statement = $pdo->prepare("SELECT * FROM comment WHERE id = :comment_id");
    $statement->execute(['comment_id' => $comment_id]);
    $comment = $statement->fetch(PDO::FETCH_ASSOC);

    // Check if the comment exists and if the current user is the owner of the comment
    if ($comment && $comment['user_id'] == $current_user_id) {
        if (isset($_POST['update_comment'])) {
            // Update the comment content
            $content = $_POST['content'];

            $update_statement = $pdo->prepare("UPDATE comment SET content = :content WHERE id = :comment_id");
            $update_statement->execute(['content' => $content, 'comment_id' => $comment_id]);

            header("Location: view_comments.php"); // Redirect to the page where comments are displayed
            exit();
        }
    } else {
        echo "You don't have permission to edit this comment.";
    }
} else {
    echo "Comment ID not provided.";
}
?>

<!-- HTML form for editing the comment -->
<div class="container-fluid">
    <div class="row justify-content-center align-items-center" style="height: 500px;">
        <form action="" method="post">
            <textarea name="content" cols="30" rows="10"><?php echo $comment['content']; ?></textarea><br><br>
            <div class="row justify-content-center align-items-center"><button type="submit" name="update_comment">Update Comment</button></div>
        </form>
    </div>
</div>

<?php include_once 'footer.php'; ?>