<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Cột sản phẩm -->
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <?php showcart(0); ?>
            </table>
        </div>

        <!-- Cột giá tiền -->

    </div>
</div>


<!-- Cart End -->
<script>
    function updateQuantity(index, change) {
        var quantityElement = document.getElementById('quantity-' + index);
        var currentQuantity = parseInt(quantityElement.textContent);
        var newQuantity = currentQuantity + change;

        if (newQuantity >= 1) {
            quantityElement.textContent = newQuantity;
            updateTotal();
        }
    }
</script>
<style>
    body {
    margin: 0;
    font-family: Arial, sans-serif;
}

.popup-container {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.popup-content {
    background-color: #4CAF50;
    color: #fff;
    text-align: center;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.success-icon {
    font-size: 50px;
    margin-bottom: 10px;
}

</style>
<body>
    <div class="popup-container" id="popupContainer">
        <div class="popup-content animate__animated animate__fadeIn">
            <div class="success-icon">&#10004;</div>
            <p>Cảm ơn bạn đã thanh toán</p>
            <p>Đơn hàng #123456 với số tiền 10.000 VND đã được thanh toán thành công.</p>
        </div>
    </div>

  
</body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Hiển thị popup khi trang được load
    document.getElementById('popupContainer').style.display = 'flex';

    // Ẩn popup sau 3 giây
    setTimeout(function () {
        document.getElementById('popupContainer').style.display = 'none';
    }, 3000);
});

</script>

