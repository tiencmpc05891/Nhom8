<head>
  <!-- Các thẻ khác ... -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<main class="my-5">
  <div class="container">
    <!--Section: Content-->
    <section class="text-center">
      <h4 class="mb-5"><strong>Bài viết</strong></h4>

      <div class="row">
        <div class="row">
          <div class="row">
            <div class="row">

              <?php
              foreach ($listbaiviet as $baiviet) {
                extract($baiviet);

                // Lấy thông tin người dùng từ ID
                $user_info = getuserbyid($iduser);


                if ($user_info) {
                  $tennguoidung = $user_info['user'];
                } else {
                  $tennguoidung = 'Người dùng không tồn tại';
                }

                $img = $img_path . $img;
                ?>
                <div class="col-lg-4 col-md-12 mb-4">
                  <div class="card">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                      <img src="<?= $img ?>" class="img-fluid"  />
                      <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                      </a>
                    </div>
                    <div class="card-body">

                      <h5 class="card-title">
                        <?= $tieude ?>
                      </h5>
                      <p class="card-text">
                        <?= $noidung ?>
                      </p>
                      <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                          <i class="fas fa-user"></i>
                          <?= $tennguoidung ?>
                        </p>
                        <p class="mb-0">
                          <i class="far fa-calendar"></i>
                          <?= $ngayviet ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

              <?php } ?>




            </div>







          </div>
    </section>
    <!--Section: Content-->

    <!-- Pagination -->

  </div>
</main>