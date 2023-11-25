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
</head>
<body>
    <style>
       /* style.css */

.tab-pane-3 {
    margin-top: 20px;
    padding: 10px;
    border: 1px solid #ddd;
}

.media {
    margin-bottom: 15px;
    padding: 10px; /* Đặt giá trị padding tùy ý */
    border: 1px solid #eee;
}

.media img {
    max-width: 100px;
    border-radius: 50%;
    margin-right: 15px;
}

.media-body {
    width: calc(100% - 115px);
    float: left;
}

form {
    margin-top: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-weight: bold;
}

.form-control {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    margin-bottom: 10px;
}

.form-group.mb-0 input {
    background-color: #007bff;
    color: #fff;
    padding: 10px;
    cursor: pointer;
    border: none;
}


    </style>

    <div class="tab-pane fade" id="tab-pane-3">
        <div class="row">
            <div class="col-md-6">
                <h4 class="mb-4">Bình luận</h4>
                <div class="media mb-4">
                   
                    <div class="media-body">
                        <?php 
                        foreach ($dsbl as $bl) {
                        extract($bl);
                        echo '<td>' .$noidung. '</td>'; 
                        echo '<td>' .$iduser. '</td>';
                        echo '<td>' .$ngaybinhluan. '</td>';
                        }
                        ?>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h4 class="mb-4"></h4>
                
                <form action="<? $_SERVER['PHP_SELF'] ?>" method="post">
                    <input type="hidden" name="idpro" value="<?php echo $idpro; ?>">
                    <div class="form-group">
                        <label for="message">Đánh giá của bạn</label>
                        <textarea id="message" name="noidung" cols="30" rows="5" class="form-control"></textarea>

                    </div>
                    <div class="form-group mb-0">
                        <input type="submit" name="guibinhluan" value="gửi bình luận">
                    </div>
                </form>
            </div>
        </div>
        <?php
        if (isset($_POST['guibinhluan']) && $_POST['guibinhluan']) {
            $noidung = $_POST['noidung'];
            $idpro = $_POST['idpro'];
            $iduser = $_SESSION['user']['id'];
            $ngaybinhluan = date('h:i:sa d/m/y');
            insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }

        ?>
    </div>
    </body>
</html>
