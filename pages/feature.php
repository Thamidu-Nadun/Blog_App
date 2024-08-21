<!-- Featured News Slider Start -->
<div class="container-fluid pt-5 mb-3">
  <div class="container">
    <div class="section-title">
      <h4 class="m-0 text-uppercase font-weight-bold">Featured News</h4>
    </div>
    <div class="owl-carousel news-carousel carousel-item-4 position-relative">
      <?php
      $statement = $pdo->prepare("SELECT page.id, title, category, image_path, date, category.name AS category_name 
      FROM page 
      INNER JOIN category ON page.category = category.id;");
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
      foreach ($result as $row) {
        $id = $row['id'];
        $title = $row['title'];
        $date = $row['date'];
        $category_id = $row['category'];
        $image_path = $row['image_path'];
        $category = $row['category_name'];
      ?>
      <div class="position-relative overflow-hidden" style="height: 300px">
        <img class="img-fluid h-100"
          src="<?php echo $image_path; ?>"
          style="object-fit: cover" />
        <div class="overlay">
          <div class="mb-2">
            <?php $cat_link = "category.php?cat_id=".$category_id; ?>
            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="<?php echo $cat_link; ?>"><?php echo $category; ?></a>
            <a class="text-white" href=""><small>
                <?php echo $date; ?>
              </small></a>
          </div>
          <?php $page_link = "page.php?id=".$id; ?>
          <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="<?php echo $page_link; ?>">
            <?php echo $title; ?>
          </a>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</div>
</div>
<!-- Featured News Slider End -->