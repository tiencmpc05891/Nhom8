<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Cột sản phẩm -->
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <?php showcart(1); ?>
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
        updateTotal(index, newQuantity);
        updateGrandTotal();
    }
}

</script>