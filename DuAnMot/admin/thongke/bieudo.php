<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="row">
    <div id="piechart"></div>

    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Danh mục', 'Số lượng sản phẩm'],

                <?php
                $tongdm = count($listthongke);
                $i = 1;
                foreach ($listthongke as $thongke) {
                    extract($thongke);
                    if ($i == $tongdm) $dauphay = ""; else $dauphay = ",";
                    echo "['" . $thongke['tendm'] . "', " . $thongke['countsp'] . "]" . $dauphay;
                    $i += 1;
                }
                ?>

            ]);

            var options = {
                'title': 'Thống kê sản phẩm theo danh mục',
                'width': 2000,
                'height': 700,
                
                // is3D: true
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>
</div>
