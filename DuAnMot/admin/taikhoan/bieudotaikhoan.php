<!-- Thêm thư viện Chart.js và thư viện Bootstrap (để sử dụng font chữ) -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container mt-5">
    <div class="row mt-4">
        <div class="col-md-12">
            <canvas id="accountChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>

<script>
    // Dữ liệu từ PHP
    var roleCounts = <?php echo json_encode($roleCounts); ?>;

    // Tạo biểu đồ cột
    var ctxAccount = document.getElementById('accountChart').getContext('2d');
    var accountChart = new Chart(ctxAccount, {
        type: 'bar',
        data: {
            labels: ['Người dùng', 'Quản trị'],
            datasets: [{
                label: 'Số lượng tài khoản',
                data: [roleCounts['role0'], roleCounts['role1']],
                backgroundColor: ['rgba(75, 192, 192, 0.8)', 'rgba(255, 99, 132, 0.8)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
