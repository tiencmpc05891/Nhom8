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

function loadall_sanpham_noibat() {
    $sql = "SELECT * FROM sanpham WHERE iddm = 9 ORDER BY id DESC LIMIT 0,8";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_hot() {
    $sql = "SELECT * FROM sanpham WHERE iddm = 8 ORDER BY id DESC LIMIT 0,8";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
// Sửa đổi hàm Loadall_sanpham để không lấy sản phẩm thuộc danh mục nổi bật
?>