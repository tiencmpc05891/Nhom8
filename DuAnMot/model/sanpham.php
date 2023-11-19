<?php
require_once "pdo.php";
function insert_sanpham($tensp, $giasp, $hinh, $mota, $thongtin,  $iddm)
{
    $sql = "insert into  sanpham(name,price,img,mota,thongtin,iddm) values('$tensp','$giasp','$hinh','$mota','$thongtin','$iddm')";
    pdo_execute($sql);
}

function delete_sanpham($id)
{
    $sql = "delete from sanpham where id=" . $id;
    pdo_execute($sql);
}
function loadall_sanpham_topsp()
{
    $sql = "select * from sanpham where 1 order by luotxem desc limit 0,12 ";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_home()
{
    $sql = "select * from sanpham where 1 order by id desc limit 0,8 ";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham($kyw = "", $iddm = 0)
{
    $sql = "select * from sanpham where 1 ";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and iddm ='" . $iddm . "'";
    }
    $sql .= " order by id asc";
    //nối chuỗi
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function load_ten_dm($iddm)
{
    if ($iddm > 0) {
        $sql = "select * from danhmuc where id=" . $iddm;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    } else {
        return "";
    }
}
function loadone_sanpham($id)
{
    $sql = "select * from sanpham where id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function load_sanpham_cungloai($id, $iddm)
{
    $sql = "select * from sanpham where iddm=" . $iddm . " AND id <> " . $id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function update_sanpham($id, $iddm, $tensp, $giasp, $mota, $thongtin, $hinh)
{
    if ($hinh != "")
        $sql = "update sanpham set iddm= '" . $iddm . "', name= '" . $tensp . "', price= '" . $giasp . "', mota= '" . $mota . "',img= '" . $hinh . "' , thongtin= '" . $thongtin . "' where id=" . $id;
    else
        $sql = "update sanpham set iddm= '" . $iddm . "', name= '" . $tensp . "', price= '" . $giasp . "', mota= '" . $mota . "', thongtin= '" . $thongtin  . "' where id=" . $id;
    pdo_execute($sql);
}


// function get_dssp_new($id)
// {
//     $sql = "SELECT * FROM sanpham ORDER BY id DESC limit " . $id;
//     return pdo_query($sql);
// }
// function get_dssp_best($limi)
// {
//     $sql = "SELECT * FROM sanpham WHERE bestseller=1 ORDER BY id DESC limit " . $limi;
//     return pdo_query($sql);
// }
// function get_dssp_view($limi)
// {
//     $sql = "SELECT * FROM sanpham ORDER BY view DESC limit " . $limi;
//     return pdo_query($sql);
// }
function dsspall($spnew)
{
    $html_dssp = '';
    include "global.php";

    // Giới hạn hiển thị tối đa 8 sản phẩm
    $count = 0;

    foreach ($spnew as $sp) {
        if ($count >= 8) {
            break; // Đã hiển thị đủ 8 sản phẩm, thoát khỏi vòng lặp
        }

        extract($sp);
        $linksp = "index.php?act=sanphamct&idsp=" . $id;
        // $hinh = $img_path . $img;
        $img = $img_path . $img;

        $html_dssp .= '<div class="box25 mr15">
            <div  
                class="row img">
                <a href="' . $linksp . '">
                    <img src="' . $img . '" alt="' . $name . '">
                </a>
            </div>
            <p><strong style="color:red;">' . number_format($price) . '<sup>đ</sup></strong></p>
            <a  href="' . $linksp . '">' . $name . '</a>
            <form action="index.php?act=addtocart" method="post">
                <input type="hidden" name="id" value="' . $id . '">
                <input type="hidden" name="name" value="' . $name . '">
                <input type="hidden" name="img" value="' . $img . '">
                <input type="hidden" name="price" value="' . $price . '"> <br>
                <input type="submit" name="addtocart" value="Thêm vào giỏ hàng">
                </br> </br>
            </form>
   
            <br>  <br>
        </div>';

        $count++;
    }

    return $html_dssp;
}


function showdsyt($dstopsp)
{

    $html_dssp = '';
    include "global.php";
    foreach ($dstopsp as $sp) {
        extract($sp);
        $linksp = "index.php?act=sanphamct&idsp=" . $id;
        $img = $img_path . $img;
        $html_dssp .= '<div class="box25 mr15">
            <div class="row img">
                <a href="' . $linksp . '">
                    <img src="' . $img . '" alt="' . $name . '">
                </a>
            </div>
            <p><strong style="color:red;">' . number_format($price) . '<sup>đ</sup></strong></p>
            <a style="text-decoration: none;" href="' . $linksp . '">' . $name . '</a>
            <form action="index.php?act=addtocart" method="post">
                <input type="hidden" name="id" value="' . $id . '">
                <input type="hidden" name="name" value="' . $name . '">
                <input type="hidden" name="img" value="' . $img . '">
                <input type="hidden" name="price" value="' . $price . '">
         
                <input type="submit" name="addtocart" value="Thêm vào giỏ hàng">
                </br> </br>
                </form>
              
                <br>  <br>
        </div>';
    }

    return $html_dssp;
}
