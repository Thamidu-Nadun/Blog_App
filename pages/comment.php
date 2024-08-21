<link rel="stylesheet" href="../css/toast.css">
<script src="../js/toast.js"></script>
<?php
$u_id = 1;
$send_message = false;
$error_message = '';
?>
<?php
if (isset($_POST['form1'])) {
    $valid = 1;

    if (empty($_POST['content'])) {
        $valid = 0;
        $error_message .= "Content cannot be empty.<br>";
    }

    // Add other validations as needed

    if ($valid == 1) {

        $statement = $pdo->prepare("INSERT INTO comment (content, user_id, date, page_id)
                                     VALUES (?, ?, ?, ?)");

        try{
        $user_name_Statement = $pdo->prepare("SELECT id FROM n_user WHERE id =:id");
        $user_name_Statement->bindValue(':id', $_COOKIE['user_id']);
        $user_name_Statement->execute();
        $result = $user_name_Statement->fetch(PDO::FETCH_ASSOC);
        $u_id = $result['id'];
    } catch(Exception $e){
        echo "<script>pushToast('$e');</script>";
    }

        $statement->execute(
            array(
                $_POST['content'],
                $u_id,
                date('Y-m-d'),
                $page_id
            )
        );

        $success_message = 'Comment added successfully.';
    }
}

// Fetch comments
$comments_statement = $pdo->prepare("SELECT id, content, user_id, page_id, date FROM comment WHERE page_id =:page_id");
$comments_statement->bindValue(':page_id', $page_id);
$comments_statement->execute();
$comments = $comments_statement->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="mb-3 mt-5 bg-black">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">
            Comments
        </h4>
    </div>
    <div class="bg-black border border-top-0 p-3">
        <?php
        if (empty($comments)) {
            echo "No comments found";
        }
        foreach ($comments as $comment) {
            $comment_id = $comment['id'];
            $comment_user_id = $comment['user_id'];
            $content = $comment['content'];
            $date = $comment['date'];

            // Fetch user name
            try{
            $user_name_statement = $pdo->prepare("SELECT name FROM n_user WHERE id=:comment_user");
            $user_name_statement->bindValue(':comment_user', $comment_user_id);
            $user_name_statement->execute();
            $user_name_result = $user_name_statement->fetch(PDO::FETCH_ASSOC);
            if ($user_name_result) {
                $user_name = $user_name_result['name'];
            }
            }catch(Exception $e){
                echo "Can not Display";
            }

            // Check if the current user is the owner of the comment
            $is_owner = $u_id == $comment_user_id;
            ?>
            <div class="d-flex align-items-center bg-black mb-3" style="height: 110px">
                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border">
                    <div class="mb-2">
                        <a class="badge badge-primary p-1 mr-2 font-weight-semi-bold text-uppercase" href="">
                            <?php echo $user_name; ?>
                        </a>
                        <a class="text-body" href=""><small>
                                <?php echo $date; ?>
                            </small></a>
                    </div>
                    <p>
                        <?php echo $content; ?>
                    </p>
                    <?php if ($is_owner) { ?>
                        <!-- Options for comment owner -->
                        <div>
                            <a href="edit-comment.php?id=<?php echo $comment_id; ?>"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="delete-comment.php?id=<?php echo $comment_id; ?>"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

        <?php
        if (isset($_COOKIE['user_mail'])) {
            $send_message = true;
        }
        ?>
        <div class="comment mt-5">
            <form action="" method="post">
                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center">
                    <style>
                        textarea{
                            background: #000;
                        }
                    </style>
                    <textarea name="content" cols="30" rows="10" placeholder="Add a comment" class="mb-2"></textarea>
                    <?php if ($send_message) {
                        echo '<button type="submit" name="form1">Send</button>';
                    }else{
                        echo "<button type='submit' name='form1' disabled><a href='login.php' style='text-decoration:none;'>Send</a></button>";
                    }?>
                </div>
            </form>
        </div>
    </div>
</div>
