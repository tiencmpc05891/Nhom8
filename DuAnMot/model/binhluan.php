<?php
function insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan)
{
    $sql = "insert into  binhluan(noidung,iduser,idpro,ngaybinhluan) values('$noidung','$iduser','$idpro','$ngaybinhluan')";
    pdo_execute($sql);
}
//gốc
function loadall_binhluan($idpro)
{
    $sql = "select * from binhluan where 1";
    if ($idpro > 0)
        $sql .= " AND idpro='" . $idpro . "'";
    $sql .= " order by id desc";
    $listbl = pdo_query($sql);
    return $listbl;
}

function delete_binhluan($id)
{
    $sql = "delete from binhluan where id=" . $id;
    pdo_execute($sql);
}
function delete_comment($id)
{
    // Thực hiện xóa bình luận từ cơ sở dữ liệu dựa trên ID
    $sql = "DELETE FROM binhluan WHERE id = :id";
    $params = array(':id' => $id);
    pdo_execute($sql, $params);
}

function get_user_by_id($id)
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


function update_comment($commentId, $editedMessage)
{
    // Thực hiện cập nhật bình luận trong cơ sở dữ liệu
    $sql = "UPDATE binhluan SET noidung = :editedMessage WHERE id = :commentId";
    $params = array(':editedMessage' => $editedMessage, ':commentId' => $commentId);

    try {
        pdo_execute($sql, $params);
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
        throw $e;
    }
}

?>