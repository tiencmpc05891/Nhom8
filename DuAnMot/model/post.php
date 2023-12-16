<?php
require_once "pdo.php";

function loadall_baiviet()
{
    $sql = "select * from post order by id desc";
    $listbaiviet = pdo_query($sql);
    return $listbaiviet;
}
function insert_baiviet($tieude, $noidung, $img, $iduser, $ngayviet)
{
    $sql = "INSERT INTO post (tieude, noidung, img, iduser, ngayviet) VALUES (?, ?, ?, ?, ?)";

    pdo_execute($sql, array($tieude, $noidung, $img, $iduser, $ngayviet));
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
function load_baiviet_cungloai($id)
{
    $sql = "select * from post where id <> " . $id;
    $listbaiviet = pdo_query($sql);
    return $listbaiviet;
}
function loadone_baiviet($id)
{
    $sql = "select * from post where id=" . $id;
    $baiviet = pdo_query_one($sql);
    return $baiviet;
}
function getuserbyid($id)
{
    $sql = "SELECT * FROM taikhoan WHERE id = :id";
    $params = array(':id' => $id);

    try {
        // Thêm tham số $params vào hàm pdo_execute
        $user = pdo_query_one($sql, $params);

        return $user;
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
        throw $e;
    }
}
?>