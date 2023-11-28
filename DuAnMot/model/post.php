<?php 
require_once "pdo.php";

function loadall_baiviet()
{
    $sql = "select * from post order by id desc";
    $listbaiviet = pdo_query($sql);
    return $listbaiviet;
}
function insert_baiviet($tieude, $noidung, $img)
{
    $sql = "insert into  post(tieude,noidung,img) values('$tieude','$noidung','$img')";
    pdo_execute($sql);
}
function delete_baiviet($id)
{
    $sql = "delete from post where id=" . $id;
    pdo_execute($sql);
}
function update_baiviet($id, $tieude, $noidung, $img)
{
    // Sử dụng Prepared Statements để bảo vệ khỏi SQL Injection
    $sql = "UPDATE post SET tieude = ?, noidung = ?, img = ? WHERE id = ?";
    
    // Chuẩn bị và thực thi truy vấn
    pdo_execute($sql, array($tieude, $noidung, $img, $id));
}

function loadone_baiviet($id)
{
    $sql = "select * from post where id=" . $id;
    $baiviet = pdo_query_one($sql);
    return $baiviet;
}
?>
