<?php
// session_start();
// ob_start();
include "global.php";
include "site/header.php";
include "site/navmenu.php";


if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'home':
            include "site/home.php";
            break;
        case 'shop':
            include "site/shop.php";
            break;
        case 'detail':
            include "site/detail.php";
            break;
        case 'cart':
            include "site/cart.php";
            break;
        case 'checkout':
            include "site/checkout.php";
            break;
        case 'login':
            include "site/login.php";
            break;
        case 'register':
            include "site/register.php";
            break;
        case 'post':
            include "site/post.php";
            break;
        case 'like':
            include "site/like.php";
            break;
        case 'contact':
            include "site/contact.php";
            break;

        default:
            break;
    }
} else {
    include "site/home.php";
}
include "site/footer.php";
