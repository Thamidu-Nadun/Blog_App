<?php require_once('header.php'); ?>

<section class="content-header">
	<h1>Dashboard</h1>
</section>

<?php
$statement = $pdo->prepare("SELECT * FROM page");
$statement->execute();
$total_pages = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM category");
$statement->execute();
$total_categories = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM users");
$statement->execute();
$total_users = $statement->rowCount();

$total_subscribers = 0;


?>
<style>
	.small-box{
		border-radius: 10px;
		box-shadow: 1px 1px 5px 0px #000;
	}
</style>
<section class="content">
<div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3><?php echo $total_pages; ?></h3>

                  <p>Pages</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-android-cart"></i>
                </div>
                
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-maroon">
                <div class="inner">
                  <h3><?php echo $total_categories; ?></h3>

                  <p>Categories</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-clipboard"></i>
                </div>
                
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $total_users; ?></h3>

                  <p>Users</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-android-checkbox-outline"></i>
                </div>
               
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $total_subscribers; ?></h3>

                  <p>Subscribers</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-checkmark-circled"></i>
                </div>
                
              </div>
            </div>
			<!-- ./col -->
		  </div>
		  
</section>

<?php require_once('footer.php'); ?>