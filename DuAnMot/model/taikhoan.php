<?php
function loadall_taikhoan()
{
    $sql = "select * from taikhoan order by id desc";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}function insert_taikhoan($email, $user, $pass)
{
    $sql = "INSERT INTO taikhoan (email, user, pass) VALUES (?, ?, ?)";
    pdo_execute($sql, array($email, $user, $pass));
}


function email_exists($email)
{
    $sql = "SELECT COUNT(*) FROM taikhoan WHERE email = ?";
    return pdo_query_value($sql, array($email)) > 0;
}

function username_exists($username)
{
    $sql = "SELECT COUNT(*) FROM taikhoan WHERE user = ?";
    return pdo_query_value($sql, array($username)) > 0;
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
function forget_pass($pass, $email){
    $sql = "UPDATE taikhoan SET pass = '$pass' WHERE email = '$email'";


    // Chuẩn bị và thực thi truy vấn
    pdo_execute($sql, array($pass, $email));
}
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
function count_by_role($listtaikhoan)
{
    $counts = array('role0' => 0, 'role1' => 0);

    foreach ($listtaikhoan as $taikhoan) {
        $role = 'role' . $taikhoan['role'];
        $counts[$role]++;
    }

    return $counts;
}