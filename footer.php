<!-- Footer Start -->
<div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
  <div class="row py-4">
    <div class="col-lg-3 col-md-6 mb-5">
      <h5 class="mb-4 text-white text-uppercase font-weight-bold">
        Get In Touch
      </h5>
      <p class="font-weight-medium">
        <i class="fa fa-map-marker-alt mr-2"></i><a href="https://www.google.com/maps/place/Nad+Tech/">Nad Soft</a>
      </p>
      <p class="font-weight-medium">
        <i class="fa fa-phone-alt mr-2"></i><a href="callto:+94123456789">+94123456789</a>
      </p>
      <p class="font-weight-medium">
        <i class="fa fa-envelope mr-2"></i><a href="mailto:nadsoft.lifting476@passfwd.com">nadsoft@info.com</a>
      </p>
      <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">
        Follow Us
      </h6>
      <?php
      $statement = $pdo->prepare("SELECT name, link From social");
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
      foreach ($result as $row) {
        $name = $row['name'];
        $link = $row['link'];

        $rowData = array(
          'name' => $name,
          'link' => $link
        );
        $social_links[] = $rowData;
      }
      ?>
      <div class="d-flex justify-content-start">
        <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="<?php echo $social_links[0]['link'] ?>"><i
            class="fab fa-twitter"></i></a>
        <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="<?php echo $social_links[2]['link'] ?>"><i
            class="fab fa-linkedin-in"></i></a>
        <a class="btn btn-lg btn-secondary btn-lg-square" href="<?php echo $social_links[5]['link'] ?>"><i
            class="fab fa-youtube"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-5">
      <h5 class="mb-4 text-white text-uppercase font-weight-bold">
        Popular News
      </h5>
      <?php
      $statement = $pdo->prepare("SELECT page.id, title, date, category, views, category.name FROM page, category WHERE page.category=category.id ORDER BY page.views DESC LIMIT 3");
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
      foreach ($result as $row) {
        $id = $row['id'];
        $page_link = "page.php?id=".$row['id'];
        $title = $row['title'];
        $date = $row['date'];
        $category = $row['name'];
        $cat_link = "category.php?cat_id=".$row['category'];
        ?>
        <div class="mb-3">
          <div class="mb-2">
            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="<?php echo $cat_link; ?>">
              <?php echo $category; ?>
            </a>
            <a class="text-body" href=""><small>
                <?php echo $date; ?>
              </small></a>
          </div>
          <a class="small text-body text-uppercase font-weight-medium" href="<?php echo $page_link; ?>">
            <?php echo $title; ?>
          </a>
          >
        </div>
      <?php } ?>

    </div>
    <div class="col-lg-3 col-md-6 mb-5">
      <h5 class="mb-4 text-white text-uppercase font-weight-bold">
        Categories
      </h5>
      <div class="m-n1">
        <?php
        $statement = $pdo->prepare("SELECT * FROM category");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
          $id = $row['id'];
          $name = $row['name'];
          ?>
          <?php $cat_link = "category.php?cat_id=" . $id; ?>
          <a href="<?php echo $cat_link; ?>" class="btn btn-sm btn-secondary m-1">
            <?php echo $name; ?>
          </a>
        <?php } ?>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-5">
      <h5 class="mb-4 text-white text-uppercase font-weight-bold" style="text-align: center">
        &lt;🔥🔥/&gt;
      </h5>
      <div class="row">
        <div class="col-4 mb-3">
          <a href=""><img class="w-100" src="https://avatar.cdnpk.net/23.jpg" alt="" /></a>
        </div>
        <div class="col-4 mb-3">
          <a href=""><img class="w-100" src="https://qph.cf2.quoracdn.net/main-qimg-199b6a3ad419b1b7faffa5b8ad122097-lq"
              alt="" /></a>
        </div>
        <div class="col-4 mb-3">
          <a href=""><img class="w-100" src="https://www.web-hosting.net.my/skins/serverfreak/img/iconf/git.png"
              alt="" /></a>
        </div>
        <div class="col-4 mb-3">
          <a href=""><img class="w-100"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG4AAABuCAMAAADxhdbJAAAAkFBMVEW4AAD////KU1PrxMT79vW5AAD//v/gmZm1EhLUiorNZGTv1dW5CQn49vbx0NHGR0XKYGDltLO7ExPVfHzAKir57Ou0AALz3NzhmZnpvr+9ICDYion05ubbkZHDNDXimZngoaDjrK3tx8fSennTdHPZhoLTbGngpKPANTbEQUC+JCTHTU7OW1vjsK/16Oi3KSniHtBaAAADkUlEQVRoge2X25aiOhBAKxiCLZE7oQW1vbUjYjv//3dTFVoass6ZNUKveZnsB1cskG2SSiUAWCwWi8VisVgsFovFYvlDto5BCaAyM5jhnaUZ3I7QvXGDCIOVGawwGJnBzdMyF16ZwQLDL2bwBYMLM+i5z/fOm6B73tbq4qqqNgcx1MXVy8smXpq6tZemu/UUnYhAKVDH5UCHDYxGfKATrxLDEIlJuqRgRZn4Yqg7sPtVHQa6D5Uc1/nKm6zjWVkMdWQKhzruqNPkuRORPL07ciOMwTy/R5Au+7qinB++QQcyURCuDZ2UCrZFTyf8pPS/QYeDKRZQDXU0jj/g1O/d+iL3OmMm61gFZ1MnWKCiQaqcoaZUzaelilycFomKjcGMTosrbAY6P4PyFtUOn7LMjxkS7ofLPKVgvRuuO1acsvK69SbpeI60ReVL1w/2i1heFHxkqvz1Ev02Qfe8DU4zgwaDZzN4xmBjBk8jdCbqz6+pEYNp8g2PsPwl5Hwu29Z8Plf68xMJCX7qS58TqubtzbK+3cLyd0n1P7hu6vtxqdt7378A+B0OVL4/I18ZRTd8uNvg9y3I8yHnS17E9YjevXbrNcC9G2DZW+83rGR4oHXPQnDS4gYVSOnRLVN2hPzW0wl2iDUhZFgbqQu7z2KzZ2yvN6BVeqw+8tEl2k/6ugbH2KXpol3wiFOFV3CfBVjTfpfi/9GznYTjdJy21i+daLqLH4y9AdQ5bTyYKTgONe5/YjYiS750eEjl217vnISgHuDkBQlETPxgTIJDU6cPE/uLHK9LI/2crndtpuzwYsZFnuHUFegN3UoP6TXXm+GHM8pIOrmj4Tw8etcmHukkHrtCeWDenG5YMRbhlF5n7f9Zj3nhIh1cOWZ8N5h7j6AXL8rJtL6zCArmqzu7X1xa89tUnwaLEVOodXDEdPO7zNSJqStJiL1cMK7gnbGf/Ry54u/EiNRsdbI9rD4WQkeZM3+Gpz+F3liI3gtk4tOqGKmDS/6luyVdaqoV45xVLsglzaeDoeZG1VI197YEPMlrq2tP0K0uWGk2NHJHClPRWVGDKlkqfO899dbj5u7tU0eDg8ne1kydnSt6GtWxPHPbg1FAke4NKG9+/+T/JA2ChW40QeDXLgQdO3q4jINgQ8OaBfpGF5MkyDnPi/2YGoZvOVI9Wkn7/cHjetd4/KR2nLAcI7NYLBaLxWKxWCwWi+Wf5RcCET6K0TMIGwAAAABJRU5ErkJggg=="
              alt="" /></a>
        </div>
        <div class="col-4 mb-3">
          <a href=""><img class="w-100"
              src="data:image/jpeg;base64,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"
              alt="" /></a>
        </div>
        <div class="col-4 mb-3">
          <a href=""><img class="w-100"
              src="data:image/jpeg;base64,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"
              alt="" /></a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111">
  <p class="m-0 text-center">
    &copy; <a href="#">nad-soft</a>. All Rights Reserved. Design by
    <a href="#">@slnadyc</a>
  </p>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="js/date.js"></script>
<script src="js/news.js"></script>
<script src="js/slideAd.js"></script>
<script src="js/smallad.js"></script>
<!--script src="js/search.js"></!--script-->

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>