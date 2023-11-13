<?php
session_start();
include "../model/pdo.php";
include "../model/binhluan.php";
$idpro = $_REQUEST['idpro'];
$dsbl = loadall_binhluan($idpro);






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style1.css">


    <style>
        body {
            margin: 0;
        }

        * {
            font-size: 0.8vw;
            color: #333;
        }

        .binhluan table {
            width: 80%;
            margin-left: 12%;
        }

        .binhluan table td:nth-child(1) {
            width: 50%;
        }

        .binhluan table td:nth-child(2) {
            width: 20%;
        }

        .binhluan table td:nth-child(3) {
            width: 30%;
        }

        .tenbinhluan {
            color: red;
            font-family: Arial;
            text-align: center;
            font-size: 40px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="tenbinhluan">Bình luận</div><br>
    <div class="row mb">

        <div class="boxcontent2 binhluan">
            <table>


                <?php
                foreach ($dsbl as $bl) {
                    extract($bl);
                    echo '<tr><td>' . $noidung . '</td>';
                    echo '<td>' . $iduser . '</td>';
                    echo '<td>' . $ngaybinhluan . '</td></tr>';
                }

                ?>
            </table>
        </div>

        <div class="containerfull mr30">
            <div class="col6 imgchitiet">
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="idpro" value="<?= $idpro ?>">
                    <input type="text" name="noidung" id="">
                    <input type="submit" name="guibinhluan" value="Gửi bình luận">
                </form>
            </div>
        </div>

        <?php

if(isset($_POST['guibinhluan'])&&($_POST['guibinhluan'])){
    $noidung=$_POST['noidung'];
    $idpro=$_POST['idpro'];
    $iduser=$_SESSION['user']['id'];
    $ngaybinhluan=date('h:i:sa d/m/Y');
    insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
    header("location: ".$_SERVER['HTTP_REFERER']);
 }
        ?>

    </div>


</body>

</html>