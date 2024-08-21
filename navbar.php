<!-- Navbar Start -->
<div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="index.php" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-uppercase text-primary">
                    Nad<span class="text-white font-weight-normal">Soft</span>
                </h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="single.html" class="nav-item nav-link">Single News</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <?php
                            $statement = $pdo->prepare("SELECT * FROM category");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row) {
                                ?>
                                <?php $cat_link = "category.php?cat_id=".$row['id']; ?>
                                <a href="<?php echo $cat_link; ?>" class="dropdown-item">
                                    <?php echo $row['name']; ?>
                                </a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                    <?php
// if (isset($_COOKIE['status']) && $_COOKIE['status'] === 'Pending') {
//     echo '<a href="verify.php" class="nav-link"><small>Please verify your email</small></a>';
// }

?>

                </div>
                <form action="search-result.php" method="post">
                    <div class="input-group ml-auto mt-3 d-lg-flex mb-sm-5" style="width: 100%; max-width: 300px">
                        <input type="text" class="form-control border-0" placeholder="Keyword" id="searchInput"
                            name="search" />
                        <div class="input-group-append">
                            <button class="input-group-text bg-primary text-dark border-0 px-3" id="search-btn">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                </form>
                <ul id="blogList"></ul>
            </div>
    </div>
    </nav>
    </div>
    <!-- Navbar End -->