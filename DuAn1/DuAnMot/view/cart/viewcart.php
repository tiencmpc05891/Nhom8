


<style>
    /* CSS cho bảng giỏ hàng */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #f2f2f2;
    }

    /* CSS cho nút Xóa trong giỏ hàng */
    input[type="button"] {
        background-color: #ff0000;
        color: #fff;
        padding: 5px 10px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
        /* Hiệu ứng hover */
    }

    input[type="button"]:hover {
        background-color: #cc0000;
        /* Màu nền thay đổi khi hover */
    }

    /* CSS cho nút Đồng ý đặt hàng và Xóa tất cả giỏ hàng */
    .bill input[type="submit"],
    .bill a input[type="button"] {
        background-color: #635b5b;
        color: #fff;
        padding: 10px 20px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
        /* Hiệu ứng hover */
    }

    .bill input[type="submit"]:hover,
    .bill a input[type="button"]:hover {
        background-color: red;
        /* Màu nền thay đổi khi hover */
    }
    .tengiohang{
    color: red;
    font-family: Arial;
    text-align: center;
    font-size: 40px;
    margin-bottom: 10px;
   
    }
</style>
<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="tengiohang"> Giỏ hàng </div>

            <div class="row boxtieude cart">
                <table>


                    <?php
                    viewcart(1);



                    ?>

                </table>
            </div>
        </div>


        <div class="row mb bill">
            <a href="index.php?act=bill"><input type="button" value="Tiếp tục đặt hàng"></a> <a href="index.php?act=delcart"><input type="button" value="Xóa tất cả giỏ hàng"></a>

        </div>


    </div>
  
</div>
