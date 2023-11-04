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
    if ($idpro > 0) $sql .= " AND idpro='" . $idpro . "'";
    $sql .= " order by id desc";
    $listbl = pdo_query($sql);
    return $listbl;
}

//test
// function loadall_binhluan($idpro)
// {
//     if ($idpro <= 0) {
//         // Nếu $idpro không hợp lệ, bạn có thể xử lý hoặc trả về một giá trị mặc định ở đây.
//         return array();
//     }

//     $sql = "SELECT * FROM binhluan WHERE idpro = :idpro ORDER BY id DESC";
//     $params = array(':idpro' => $idpro);

//     $listbl = pdo_query($sql, $params);
//     return $listbl;
// }


// function loadall_binhluan($idpro)
// {
//     $sql = "SELECT * FROM binhluan WHERE idpro = :idpro ORDER BY id DESC";
//     $params = array(':idpro' => $idpro);
//     $listbl = pdo_query($sql, $params);
//     return $listbl;
// }

// function loadall_binhluan($idpro)
// {
//     $sql = "SELECT * FROM binhluan WHERE idpro = :idpro ORDER BY id DESC";
//     $params = array(':idpro' => $idpro);
//     $listbl = pdo_query($sql, $params);
//     return $listbl;
// }

// function loadall_binhluan($idpro)
// {
//     if ($idpro <= 0) {
//         // Nếu $idpro không hợp lệ, bạn có thể xử lý hoặc trả về một giá trị mặc định ở đây.
//         return array();
//     }

//     $sql = "SELECT * FROM binhluan WHERE idpro = :idpro ORDER BY id DESC";
//     $params = array(':idpro' => $idpro);

//     $listbl = pdo_query($sql, $params);
//     return $listbl;
// }

function delete_binhluan($id)
{
    $sql = "delete from binhluan where id=" . $id;
    pdo_execute($sql);
}






?>
