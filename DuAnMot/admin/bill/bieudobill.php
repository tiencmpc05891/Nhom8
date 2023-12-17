<?php

$listtk_donhang = thongke_donhang_theo_trangthai();
?>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php

            echo '<canvas id="statusChart" width="400" height="200"></canvas>';
            ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <canvas id="statusChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>

<script>
    var ctxStatus = document.getElementById('statusChart').getContext('2d');
    var statusChart = new Chart(ctxStatus, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_column($listtk_donhang, 'bill_status')); ?>,
            datasets: [{
                data: <?php echo json_encode(array_column($listtk_donhang, 'countsp')); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    // Thêm màu cho các trạng thái khác nếu cần
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    // Thêm màu cho các trạng thái khác nếu cần
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    grid: {
                        display: false
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        precision: 0
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>

