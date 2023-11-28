<?php
require_once "pdo.php";

function loadall_banner()
{
    $sql = "select * from banner order by id desc";
    $listbanner = pdo_query($sql);
    return $listbanner;
}
function insert_banner($img, $text1, $text2)
{
    $sql = "insert into banner(img, text1, text2) values('$img', '$text1', '$text2')";
    pdo_execute($sql);
}
function delete_banner($id)
{
    $sql = "delete from banner where id=" . $id;
    pdo_execute($sql);
}
function update_banner($id, $img, $text1, $text2)
{
    // Sử dụng Prepared Statements để bảo vệ khỏi SQL Injection
    $sql = "UPDATE banner SET img = ?, text1 = ?, text2 = ? WHERE id = ?";

    // Chuẩn bị và thực thi truy vấn
    pdo_execute($sql, array($img, $text1, $text2, $id));
}


function loadone_banner($id)
{
    $sql = "select * from banner where id=" . $id;
    $banner = pdo_query_one($sql);
    return $banner;
}
?>