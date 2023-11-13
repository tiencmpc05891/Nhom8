<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../view/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- Sử dụng Font Awesome -->
 


<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->
        <style>
            /* Đổi màu cho menu */
            .menu ul li a {
                color: #333;
                font-weight: bold;
            }


            /* Hiệu ứng hover cho menu */


            /* Đổi màu cho header */
            .headeradmin {
                background-color: #333;
                color: white;
            }

            .menu {
                background-color: aquamarine;
                color: white;
                border-radius: 5px;

            }

            /* Hiệu ứng hover cho header */
        </style>
        </head>

        <body>
            <!-- cái này không xài, phần này code theo thầy Hộ mô hình Xshop -->
            <div class="boxcenter">
                <div class="row mb headeradmin">
                    <h1>Admin</h1>
                </div>
                <div class="row mb menu">
                    <ul>
                        <li><a href="index.php"><i class="fas fa-home"></i> Trang chủ</a></li>
                        <li><a href="index.php?act=adddm"><i class="fas fa-th-list"></i> Danh mục</a></li>
                        <li><a href="index.php?act=addsp"><i class="fas fa-cubes"></i> Hàng hóa</a></li>
                        <li><a href="index.php?act=dskh"><i class="fas fa-users"></i> Khách hàng</a></li>
                        <li><a href="index.php?act=dsbl"><i class="fas fa-comments"></i> Bình luận</a></li>
                        <li><a href="index.php?act=listbill"><i class="fas fa-list"></i> Đanh sách đơn hàng</a></li>
                        <li><a href="index.php?act=thongke"><i class="fas fa-chart-bar"></i> Thống kê</a></li>
                    </ul>
                </div>
            </div>


        </body>

</html>