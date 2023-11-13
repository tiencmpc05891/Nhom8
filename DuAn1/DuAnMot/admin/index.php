<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>Du An Mau</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link href="../admin/content/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../admin/content/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="../admin/content/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

</head>

<?php
if (isset($_SESSION['admin'])) {
    // Nếu đã đăng nhập, hiển thị trang quản lý (newhome.php)
    include "newnav.php";
    include "newhead.php";

    $acttion = isset($_GET['act']) ? $_GET['act'] : 'newhome';

    switch ($acttion) {
        case 'newhome':
            include "newhome.php";
            break;
        case 'listdm':
            include "./categories/list.php";
            break;
        case 'adddm':
            include "./categories/add.php";
            break;
        case 'listsp':
            include "./products/list.php";
            break;
        case 'addsp':
            include "./products/add.php";
            break;
        case 'dsuser':
            include "./users/list.php";
            break;

        default:

            break;
    }

    include "newfooter.php";
} else {
    // Nếu chưa đăng nhập, hiển thị trang đăng nhập (login.php)
    include "header.php";
    include "./includes/pdo.php";
    include "./users/user.php";

    $acttion = isset($_GET['act']) ? $_GET['act'] : 'login';

    switch ($acttion) {
        case 'home':
            include 'home.php';
            break;
        case 'login':
            include 'login.php';
            break;
            // Thêm các case khác tương ứng với các trang bạn muốn hiển thị khi chưa đăng nhập
        default:
            include 'login.php';
            break;
    }

    include 'footer.php';
}
?>