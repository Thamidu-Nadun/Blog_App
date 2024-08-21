<?php
$statement = $pdo->prepare("SELECT * FROM admin WHERE nickname='nadun';");
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);

if ($result) {
    // Assuming 'id', 'name', 'image', 'description', 'nickname' are columns in your 'admin' table
    $id = $result['id'];
    $name = $result['name'];
    $image = $result['image'];
    $description = $result['description'];
    $nickname = $result['nickname'];
} else {
    // Handle case where no rows are found or other error handling
    echo "No records found.";
}
?>

<div class="container-fluid">
    <div class="row justify-content-center align-items-center" style="height: 500px;">
        <div class="col-6 box" style="text-align: center;">
            <div class="main-img-box">
                <img src="<?php echo $image;?>" alt="" class="img pb-2"
                    style="border-radius:50%; width: 180px;height: auto;" />
            </div>
            <div class="text pb-2"><?php echo $name; ?></div>
            <div class="description"><?php echo $description; ?></div>
        </div>
    </div>
</div>