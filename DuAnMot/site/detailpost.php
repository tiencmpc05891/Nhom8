<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="/css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="content/pst/css/style.css" />
</head>
<body>
     
  <header>
   
    <style>
      #intro {
       
        margin-top: 58px;
      }

      @media (max-width: 991px) {
        #intro {
         
          margin-top: 45px;
        }
      }
    </style>

   
    <div id="intro" class="p-5 text-center bg-light">
      <h3 class="mb-0 h4"><strong><?= $tieude ?></strong></h>
    </div>
  
  </header>
 
  <!--Main layout-->
  <main class="mt-4 mb-5">
  <?php

extract($onepost);
$img = $img_path . $img;
$user_info = getuserbyid($iduser);


                if ($user_info) {
                  $tennguoidung = $user_info['user'];
                } else {
                  $tennguoidung = 'Người dùng không tồn tại';
                }

?>
    <div class="container">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-md-8 mb-4">
          <!--Section: Post data-mdb-->
          <section class="border-bottom mb-4">
            <img src="<?= $img ?>"
              class="img-fluid shadow-2-strong rounded mb-4" alt="" />

            <div class="row align-items-center mb-4">
              <div class="col-lg-6 text-center text-lg-start mb-3 m-lg-0">
                <img src="https://mdbootstrap.com/img/Photos/Avatars/img (23).jpg" class="rounded shadow-1-strong me-2"
                  height="35" alt="" loading="lazy" />
                <span> Đăng tải vào: <?= $ngayviet ?> bởi</span>
                <a href="" class="text-dark"><?= $tennguoidung ?></a>
              </div>

              <div class="col-lg-6 text-center text-lg-end">
                
              </div>
            </div>
          </section>
          <!--Section: Post data-mdb-->

          <!--Section: Text-->
          <section>
            

            <p><strong><?= $tieude ?></strong></p>

            <p>
            <?= $noidung ?>
            </p>

            
            

            
          </section>
          <!--Section: Text-->

          <!--Section: Share buttons-->
          
           
          
          <!--Section: Share buttons-->

          <!--Section: Author-->
          
          
          <!--Section: Author-->

          <!--Section: Comments-->
          
            <p class="text-center"><strong></strong></p>

            <!-- Comment -->
            <div class="row mb-4">
              <div class="col-2">
                <img src=""
                  class="img-fluid shadow-1-strong rounded" alt="" />
              </div>

              <div class="col-10">
                <p class="mb-2"><strong></strong></p>
                <p>
                 
                </p>
              </div>
            </div>

            <!-- Comment -->
            <div class="row mb-4">
              <div class="col-2">
                <img src=""
                  class="img-fluid shadow-1-strong rounded" alt="" />
              </div>

              <div class="col-10">
                <p class="mb-2"><strong></strong></p>
                <p>
                 
                </p>
              </div>
            </div>

            <!-- Comment -->
            <div class="row mb-4">
              <div class="col-2">
                <img src=""
                  class="img-fluid shadow-1-strong rounded" alt="" />
              </div>

              <div class="col-10">
                <p class="mb-2"><strong></strong></p>
                <p>
                 
                </p>
              </div>
            </div>
          </section>
          <!--Section: Comments-->

          <!--Section: Reply-->
         
            

            
         
          <!--Section: Reply-->
        </div>
        
        <div class="col-md-4 mb-4">
  <!--Section: Sidebar-->
 
    <!--Section: Related Posts-->
    
      <h5><strong>bài viết khác</strong></h5>
      <br><?php

        foreach ($baiviet_cung_loai as $bvcl) {
            extract($bvcl);
            $user_info = getuserbyid($iduser);


                if ($user_info) {
                  $tennguoidung = $user_info['user'];
                } else {
                  $tennguoidung = 'Người dùng không tồn tại';
                }

            $linkbaiviet = "index.php?act=detailpost&idpost=" . $id;
            $img = $img_path . $img;
            ?><section class="border-bottom pb-4 mb-4">
      <ul class="list-unstyled">
        <!-- Related Post 1 -->
        <li class="media mb-3">
          <img src="<?= $img ?>" class="mr-3 rounded" alt="Related Post 1" width="200px;">
          <div class="media-body">
            <h6 class="mt-0 mb-1"><a href="<?= $linkbaiviet ?>"><?= $tieude ?></a></h6>
            
            <p class="small text-muted">Đăng tải vào: <?= $ngayviet ?> bởi <a href="" class="text-dark"><?= $tennguoidung ?></a></p>
          </div>
        </li>
        
        <!-- Related Post 2 -->
        

        <!-- Related Post 3 -->

      </ul>
    </section>
    <?php } ?>

            <!--Section: Video-->
           
            <!--Section: Video-->
          </section>
          <!--Section: Sidebar-->
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="bg-light text-lg-start">
    

    <hr class="m-0" />

    

    <!-- Copyright -->
    
    <!-- Copyright -->
  </footer>
  <!--Footer-->
    <!-- MDB -->
    <script type="text/javascript" src="content/pst/js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="content/pst/js/script.js"></script>
</body>
</html>