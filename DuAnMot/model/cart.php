<?php

function showcart($del, $isCheckout = false)
{
    global $img_path;
    $tong = 0;
    $i = 0;
    if ($del == 1) {
        $xoasp_th = '<th>Thao tác</th>';
        $xoasp_td2 = '<td></td>';
    } else {
        $xoasp_th = '';
        $xoasp_td2 = '';
    }

    echo '<div class="container-fluid">
            <div class="row px-xl-5">';

    if ($isCheckout) {
        echo '<div class="col-lg-12">
                        <table class="table table-light table-borderless text-center mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Sản Phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">';

        foreach ($_SESSION['mycart'] as $cart) {
            $price = floatval($cart[3]);
            $thanhtien = $price * $cart[4];
            $tong += $thanhtien;
            //tên của sản phẩm  $cart[1] 
            echo '<tr>';
            echo '    <td class="align-middle">' . $cart[1] . '</td>';
            echo '    <td class="align-middle">' . $cart[3] . '<sup>đ</sup></td>';
            echo '    <td class="align-middle">' . $cart[4] . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';

        echo '    </table>';
        echo '    </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Tổng cộng: ' . number_format($tong, 0, '.', '.') . '<sup>đ</sup></h5>
                        <h5></h5>
                    </div>';
    } else {
        echo '<div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Hình</th>
                            <th>Sản Phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            ' . $xoasp_th . '
                        </tr>
                    </thead>
                    <tbody class="align-middle">';

        foreach ($_SESSION['mycart'] as $cart) {
            $price = floatval($cart[3]);
            $soluong = intval($cart[4]);
            $thanhtien = $price * $soluong;
            $tong += $thanhtien;

            if ($del == 1) {
                $xoasp_td = '<td><a href="index.php?act=delcart&idcart=' . $i . '"><input type="button"  class="btn btn-danger" value="Xóa"></a></td>';
            } else {
                $xoasp_td = '';
            }

            echo '<tr>';
            echo '    <td class="align-middle"><img src="' . $cart[2] . '" alt="" height="80px"></td>';
            echo '    <td class="align-middle">' . $cart[1] . '</td>';
            echo '    <td class="align-middle">' . $cart[3] . '<sup>đ</sup></td>';
            echo '    <td class="align-middle">
                        <button class="btn btn-primary btn-minus" onclick="updateQuantity(' . $i . ', -1)">-</button>
                        <span id="quantity-' . $i . '">' . $cart[4] . '</span>
                        <button class="btn btn-primary btn-plus" onclick="updateQuantity(' . $i . ', 1)">+</button>
                    </td>';
            echo '    <td class="align-middle">' . number_format($thanhtien, 0, '.', '.') . '<sup>đ</sup></td>';
            echo '    ' . $xoasp_td;
            echo '</tr>';

            $i += 1;
        }

        echo '</tbody>';

        echo '            <tfoot>
                            <tr>
                                <td colspan="4">Tổng đơn hàng</td>
                                <td>' . number_format($tong, 0, '.', '.') . '<sup>đ</sup></td>
                                ' . $xoasp_td2 . '
                            </tr>
                            
                        </tfoot>';

        echo '        </table>

        <a href="index.php?act=shop"><input class="btn btn-success" type="button" value="Tiếp tục đặt hàng"></a>     <a href="index.php?act=delcart"><input class="btn btn-danger" type="button" value="Xóa tất cả giỏ hàng"></a>
       </div>';
    }

    echo '<div class="col-lg-4">';

    if (!$isCheckout) {
        echo '<form class="mb-3" action="">
                <div class="input-group">
                  
                
                </div>
            </form>';
    }
    echo '<div class="bg-light p-3 mb-3">
            <div class="border-bottom pb-2">
                <div class="d-flex justify-content-between mb-3">
                </div>';
    if (!$isCheckout) {
        echo '        <div class="d-flex justify-content-between">
            
                                <h6 class="font-weight-medium">Tổng đơn hàng : </h6>
                                <h6 class="font-weight-medium">' . number_format($tong, 0, '.', '.') . '<sup>đ</sup></h6>
            
                            </div>';
    }
    if (!$isCheckout) {
        echo '        <div class="d-flex justify-content-between">

                    <h6 class="font-weight-medium">Phí ship</h6>
                    <h6 class="font-weight-medium">0đ</h6>

                </div>';
    }


    if (!$isCheckout) {
        echo '    </div>
        <div class="pt-2">
            <div class="d-flex justify-content-between mt-2">
                <h5>Thành tiền:</h5>
                <h5>' . number_format($tong, 0, '.', '.') . '<sup>đ</sup></h5>
            </div>';
    }

    //: Đây là một điều kiện kiểm tra nếu biến $isCheckout không đúng, tức là đang ở chế độ xem giỏ hàng (không phải chế độ thanh toán).
    if (!$isCheckout) { // kiểm tra nếu không phải ở chế độ thanh toán 
        echo '    <a href="index.php?act=checkout">
                    <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Tiếp tục thanh toán</button>

                </a>';
    }
    echo '        </div>
        </div>
    </div>
</div>
</div>
</div>';
}




function bill_chi_tiet($listbill)
{
    global $img_path;
    $tong = 0;
    $i = 0;

    echo '<tr>
    <th>Hình</th>
    <th>Sản Phẩm</th>
    <th>Đơn giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
    </tr>';

    foreach ($listbill as $cart) {
        $img = $cart['img']; // Sử dụng $cart['img'] để truy cập URL hình ảnh
        $tong += $cart['thanhtien'];

        echo '
            <tr>
            <td><img src="' . $img . '" alt="" height="80px"></td>
            <td>' . $cart['name'] . '</td>
            <td>' . number_format($cart['price'], 0, '.', '.') . '<sup>đ</sup></td>
            <td>' . $cart['soluong'] . '</td>
            <td>' . number_format($cart['thanhtien'], 0, '.', '.') . '<sup>đ</sup></td>
            </tr>';
        $i += 1;
    }
    echo ' <tr>
                <td colspan="4">Tổng đơn hàng</td>
                <td>' . number_format($tong, 0, '.', '.') . ' <sup>đ</sup></td>
        </tr>';
}

function tongdonhang()
{
    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $thanhtien = $cart[3] * $cart[4];
        $tong += $thanhtien;
    }
    return $tong;
}
function insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill)
{
    $sql = "insert into  cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) values('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill')";
    return pdo_execute($sql);
}

function insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang)
{
    $sql = "insert into  bill(iduser,bill_name,bill_email,bill_address,bill_tel,bill_pttt,ngaydathang,total) values('$iduser','$name','$email','$address','$tel','$pttt','$ngaydathang','$tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}


function loadone_bill($id)
{
    $sql = "select * from bill where id=" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}

function loadall_cart($idbill)
{
    $sql = "select * from cart where idbill=" . $idbill;
    $bill = pdo_query($sql);
    return $bill;
}
function loadall_cart_count($idbill)
{
    $sql = "select * from cart where idbill=" . $idbill;
    $bill = pdo_query($sql);
    return sizeof($bill);
}
function loadall_bill($iduser = 0)
{

    // $sql = "select * from bill where 1";
    // if ($iduser > 0)
    //     $sql .= " AND iduser=" . $iduser;
    // $sql .= " order by id desc ";
    // $listbill = pdo_query($sql);
    // return $listbill;
    $sql = "SELECT * FROM bill WHERE 1";
    if ($iduser > 0) {
        $sql .= " AND iduser=" . $iduser;
    }
    $sql .= " ORDER BY CASE 
                WHEN bill_status = '2' THEN 0  -- Sắp xếp đơn hàng đang giao lên đầu
                WHEN bill_status = '0' THEN 1  -- Sắp xếp đơn hàng mới sau đơn hàng đang giao
                ELSE 2 END,
                ngaydathang DESC";

    $listbill = pdo_query($sql);
    return $listbill;
}
// function delete_donhang($id)
// {
//     $sql = "delete from bill where id=" . $id;
//     pdo_execute($sql);
// }
//gốc ở trên
// Trước khi xóa đơn hàng, xóa tất cả chi tiết đơn hàng từ bảng cart
function delete_donhang($id)
{
    // Trước hết, load chi tiết đơn hàng từ bảng cart
    $list_cart = loadall_cart($id);

    // Sau đó, xóa từng chi tiết đơn hàng
    foreach ($list_cart as $cart_item) {
        $cart_id = $cart_item['id']; // Hoặc có thể là $cart_item['idcart'] tùy thuộc vào cấu trúc bảng của bạn
        delete_cart_item($cart_id);
    }

    // Cuối cùng, xóa đơn hàng
    $sql = "delete from bill where id=" . $id;
    pdo_execute($sql);
}

// Hàm xóa một chi tiết đơn hàng từ bảng cart
function delete_cart_item($cart_id)
{
    $sql = "delete from cart where id=" . $cart_id;
    pdo_execute($sql);
}
function update_trangthai_donhang($id_donhang, $trangthai_moi)
{
    $sql = "UPDATE bill SET bill_status = :trangthai WHERE id = :id";
    $params = array(':trangthai' => $trangthai_moi, ':id' => $id_donhang);

    // Thực hiện truy vấn cập nhật trạng thái trong cơ sở dữ liệu
    pdo_execute($sql, $params);
}
function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $tt = "Đơn hàng mới";
            break;
        case '1':
            $tt = "Đang xử lý";
            break;
        case '2':
            $tt = "Đang giao hàng";
            break;
        case '3':
            $tt = "Hoàn tất";
            break;

        default:
            $tt = "Đơn hàng mới";
            break;
    }
    return $tt;
}
function loadall_thongke()
{
    $sql = "SELECT danhmuc.id AS madm, danhmuc.name AS tendm, COUNT(sanpham.id) AS countsp, MIN(sanpham.price) AS minprice, MAX(sanpham.price) AS maxprice, AVG(sanpham.price) AS avgprice ";
    $sql .= "FROM sanpham LEFT JOIN danhmuc ON danhmuc.id = sanpham.iddm ";
    $sql .= "GROUP BY danhmuc.id ORDER BY danhmuc.id ASC";
    $listtk = pdo_query($sql);
    return $listtk;
}

function thongke_donhang_theo_trangthai()
{
    $sql = "SELECT bill_status, COUNT(*) AS countsp FROM bill GROUP BY bill_status";
    $listtk = pdo_query($sql);

    // Chuyển đổi số thành chuỗi trạng thái
    foreach ($listtk as &$item) {
        switch ($item['bill_status']) {
            case '0':
                $item['bill_status'] = 'Đơn hàng mới';
                break;
            case '2':
                $item['bill_status'] = 'Đang giao hàng';
                break;
        }
    }

    return $listtk;
}
