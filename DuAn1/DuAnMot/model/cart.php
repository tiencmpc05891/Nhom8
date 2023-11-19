<?php

function viewcart($del)
{

    global $img_path;
    $tong = 0;
    $i = 0;
    if ($del == 1) {
        $xoasp_th = '<th>Thao tác</th>
        ';
        $xoasp_td2 = '<td></td>';
    } else {
        $xoasp_th = '';
        $xoasp_td2 = '';
    }
    echo '<tr>
    <th>Hình</th>
    <th>Sản Phẩm</th>
    <th>Đơn giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
    ' . $xoasp_th . '
    </tr>';

    foreach ($_SESSION['mycart'] as $cart) {
        // $img = $img_path . $cart[2];
        $img = $cart[2];


        $price = floatval($cart[3]);
        $soluong = intval($cart[4]); #floatval() hoặc intval() để chuyển chuỗi thành số nguyên hoặc số thực.
        $thanhtien = $price * $soluong;

        $tong += $thanhtien;
        if ($del == 1) {
            $xoasp_td = '<td><a href="index.php?act=delcart&idcart=' . $i . '"><input type="button" value="Xóa"></a></td>';
        } else {

            $xoasp_td = '';
        }

        echo '<tr>
        <td><img src="' . $img . '" alt="" height="80px"></td>
        <td>' . $cart[1] . '</td>
        <td>' . $cart[3] . '<sup>đ</sup></td>
        <td>' . $cart[4] . '</td>
        <td>' . $thanhtien . '<sup>đ</sup></td>
        ' . $xoasp_td . '
        </tr>';

        $i += 1;
    }
    echo ' <tr>
                <td colspan="4">Tổng đơn hàng</td>
                <td>' . $tong . '<sup>đ</sup></td>
             ' . $xoasp_td2 . '
        </tr>';
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
        $img =$cart['img']; // Sử dụng $cart['img'] để truy cập URL hình ảnh
        $tong += $cart['thanhtien'];

        echo '
            <tr>
            <td><img src="' . $img . '" alt="" height="80px"></td>
            <td>' . $cart['name'] . '</td>
            <td>' . $cart['price'] . '<sup>đ</sup></td>
            <td>' . $cart['soluong'] . '</td>
            <td>' . $cart['thanhtien'] . '</td>
            </tr>';
        $i += 1;
    }
    echo ' <tr>
                <td colspan="4">Tổng đơn hàng</td>
                <td>' . $tong . '<sup>đ</sup></td>
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

function insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang)
{
    $sql = "insert into  bill(iduser,bill_name,bill_email,bill_address,bill_tel,bill_pttt,ngaydathang,total) values('$iduser','$name','$email','$address','$tel','$pttt','$ngaydathang','$tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}

function insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill)
{
    $sql = "insert into  cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) values('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill')";
    return pdo_execute($sql);
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

    $sql = "select * from bill where 1";
    if ($iduser > 0) $sql .= " AND iduser=" . $iduser;
    $sql .= " order by id desc ";
    $listbill = pdo_query($sql);
    return $listbill;
}
function delete_donhang($id)
{
    $sql = "delete from bill where id=" . $id;
    pdo_execute($sql);
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
