<?php
function loadall_taikhoan()
{
    $sql = "select * from taikhoan order by id desc";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}
function insert_taikhoan($email, $user, $pass)
{
    $sql = "insert into  taikhoan(email,user,pass) values('$email','$user','$pass')";
    pdo_execute($sql);
}
// function insert_taikhoan($email, $user, $pass)
// {
//     // Kiểm tra xem tài khoản hoặc email đã tồn tại chưa
//     $existingUser = pdo_query_one("SELECT * FROM taikhoan WHERE user = ? OR email = ?", $user, $email);

//     if ($existingUser) {
//         // Nếu tài khoản hoặc email đã tồn tại, hiển thị thông báo lỗi hoặc thực hiện xử lý phù hợp
//         echo "Tài khoản hoặc email đã tồn tại. Vui lòng chọn tài khoản hoặc email khác.";
//         return; // Dừng việc thêm tài khoản vào cơ sở dữ liệu
//     }

//     // Nếu không có tài khoản hoặc email trùng, thêm tài khoản mới
//     $sql = "INSERT INTO taikhoan (email, user, pass) VALUES (?, ?, ?)";
//     pdo_execute($sql, $email, $user, $pass);
// }
function email_exists($email)
{
    $sql = "SELECT COUNT(*) FROM taikhoan WHERE email = ?";
    return pdo_query_value($sql, $email) > 0;
}

function username_exists($username)
{
    $sql = "SELECT COUNT(*) FROM taikhoan WHERE user = ?";
    return pdo_query_value($sql, $username) > 0;
}
function checkuser($user, $pass)
{
    $sql = "select * from taikhoan where user='" . $user . "' AND pass='" . $pass . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function checkemail($email)
{
    $sql = "select * from taikhoan where email='" . $email . "' ";
    $sp = pdo_query_one($sql);
    return $sp;
}
function delete_taikhoan($id)
{
    $sql = "delete from taikhoan where id=" . $id;
    pdo_execute($sql);
}
// function update_taikhoan($id, $user, $pass, $email, $address, $tel)
// {
//     $sql = "update taikhoan set user= '" . $user . "', pass= '" . $pass . "', email= '" . $email . "', address= '" . $address . "', tel= '" . $tel . "' where id=" . $id;
//     pdo_execute($sql);
// }


function update_taikhoan($id, $user, $pass, $email, $address, $tel)
{
    $sql = "UPDATE taikhoan SET user=:user, pass=:pass, email=:email, address=:address, tel=:tel WHERE id=:id";

    $params = array(
        ':user' => $user,
        ':pass' => $pass,
        ':email' => $email,
        ':address' => $address,
        ':tel' => $tel,
        ':id' => $id
    );

    pdo_execute($sql, $params);
}


function loadone_taikhoan($id)
{
    $id = intval($id); // Đảm bảo rằng $id là một số nguyên
    if ($id <= 0) {
        // Nếu id không hợp lệ, có thể xử lý theo cách phù hợp, ví dụ: trả về null hoặc một giá trị mặc định
        return null;
    }

    $sql = "SELECT * FROM taikhoan WHERE id = ?";
    $tk = pdo_query_one($sql, $id);

    return $tk;
}
