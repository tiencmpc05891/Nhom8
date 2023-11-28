<main class="my-5">
    <div class="container">
      <!--Section: Content-->
      <section class="text-center">
        <h4 class="mb-5"><strong>Bài viết</strong></h4>

        <div class="row">
          <div class="col-lg-4 col-md-12 mb-4">
          <?php foreach ($listbaiviet as $baiviet): ?>
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="<?php echo $baiviet['hinh']; ?>" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $baiviet['tieude']; ?></h5>
                <p class="card-text">
                <?php echo $baiviet['noidung']; ?>
                </p>
                <a href="#!" class="btn btn-primary">Xem</a>
              </div>
            </div>
            <?php endforeach; ?>
        </div>

          
        </div>
      </section>
      <!--Section: Content-->

      <!-- Pagination -->
      <nav class="my-4" aria-label="...">
        <ul class="pagination pagination-circle justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </main>