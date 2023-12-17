<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>200+</h3>
              <p>Đơn hàng mới</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="index.php?act=listbill" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>6+<sup style="font-size: 20px"></sup></h3>
              <p>Số lượng danh mục</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="index.php?act=listdm" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>40+</h3>
              <p>Danh sách người dùng</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="index.php?act=dskh" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>15+</h3>
              <p>Số lượng bình luận</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="index.php?act=dsbl" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>300+</h3>
              <p>Sản phẩm mới</p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-cart"></i> <!-- Customize the icon here -->
            </div>
            <a href="index.php?act=listsp" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>100<sup style="font-size: 20px">%</sup></h3>
              <p>Thống kê sản phẩm theo loại</p>
            </div>
            <div class="icon">
              <i class="fas fa-chart-line"></i> <!-- Customize the icon here -->
            </div>
            <a href="index.php?act=thongke" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3>100<sup style="font-size: 20px">%</sup></h3>
              <p>Biểu đồ tài khoản</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i> <!-- Customize the icon here -->
            </div>
            <a href="index.php?act=bieudotaikhoan" class="small-box-footer">Xem chi tiết<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>10+</h3>
              <p>Số lượng bài viết</p>
            </div>
            <div class="icon">
              <i class="fas fa-heart"></i> <!-- Customize the icon here -->
            </div>
            <a href="index.php?act=listbv" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <div class="row">
    <div id="piechart"></div>
    <div id="barchart"></div>

    <script type="text/javascript">
      google.charts.load('current', {
        'packages': ['corechart']
      });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        // Pie Chart Data
        var pieData = google.visualization.arrayToDataTable([
          ['Danh mục', 'Số lượng sản phẩm'],

          <?php
          $tongdm = count($listthongke);
          $i = 1;
          foreach ($listthongke as $thongke) {
            extract($thongke);
            if ($i == $tongdm) $dauphay = "";
            else $dauphay = ",";
            echo "['" . $thongke['tendm'] . "', " . $thongke['countsp'] . "]" . $dauphay;
            $i += 1;
          }
          ?>

        ]);

        // Bar Chart Data
        var barData = google.visualization.arrayToDataTable([
          ['Danh mục', 'Số lượng sản phẩm'],

          <?php
          foreach ($listthongke as $thongke) {
            extract($thongke);
            if ($i == $tongdm) $dauphay = "";
            else $dauphay = ",";
            echo "['" . $thongke['tendm'] . "', " . $thongke['countsp'] . "]" . $dauphay;
          }
          ?>
        ]);

        // Pie Chart Options
        var pieOptions = {
          'title': 'Thống kê sản phẩm theo danh mục',
          'width': 800,
          'height': 400,
        };

        // Bar Chart Options
        var barOptions = {
          'title': 'Thống kê sản phẩm theo danh mục',
          'width': 800,
          'height': 400,
          'chartArea': {
            'width': '50%'
          }, // Adjust the width of the chart area
          'hAxis': {
            'title': 'Số lượng sản phẩm'
          },
          'vAxis': {
            'title': 'Danh mục'
          }
        };

        var pieChart = new google.visualization.PieChart(document.getElementById('piechart'));
        pieChart.draw(pieData, pieOptions);

        var barChart = new google.visualization.BarChart(document.getElementById('barchart'));
        barChart.draw(barData, barOptions);
      }
    </script>
  </div>
  </section>
  <!-- /.content -->
 
</div>
