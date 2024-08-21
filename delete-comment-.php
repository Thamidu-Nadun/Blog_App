<?php
// Connect to your database
include_once 'header.php'; // You need to replace 'db_connect.php' with your database connection script.

if (isset($_GET['id'])) {
    $comment_id = $_GET['id'];
    $current_user_id = $_COOKIE['user_id'];
    
    // Fetch the comment from the database
    $statement = $pdo->prepare("SELECT * FROM comment WHERE id = :comment_id");
    $statement->execute(['comment_id' => $comment_id]);
    $comment = $statement->fetch(PDO::FETCH_ASSOC);

    // Check if the comment exists and if the current user is the owner of the comment
    if ($comment && $comment['user_id'] == $current_user_id) {
        // Delete the comment
        $delete_statement = $pdo->prepare("DELETE FROM comment WHERE id = :comment_id");
        $delete_statement->execute(['comment_id' => $comment_id]);

        header("Location: view_comments.php"); // Redirect to the page where comments are displayed
        exit();
    } else {
        echo "You don't have permission to delete this comment.";
    }
} else {
    echo "Comment ID not provided.";
}
?>
