<?php
session_start();

include "../model/pdo.php";
include "../model/binhluan.php";
include "../model/taikhoan.php";
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
      .row {
        display: flex;
        justify-content: space-between;
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
    }

    .col-md-6 {
        flex: 0 0 48%;
    }

    .media {
        border: 1px solid #ddd;
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 8px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    form {
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 8px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    label {
        font-weight: bold;
        color: #333;
    }

    textarea {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: #FFD333;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #788025;
    }

    </style>

<div class="tab-pane fade" id="tab-pane-3">
<div class="row">
    <div class="col-md-6">
        <h4 class="mb-4">Bình luận</h4>
        <?php foreach ($dsbl as $bl) : ?>
            <div class="media mb-4">
                <div class="media-body">
                    <h2><?php echo $bl['iduser']; ?></h2>
                    <p><?php echo $bl['noidung']; ?></p>
                    <p><?php echo $bl['ngaybinhluan']; ?></p>
                    <br>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="col-md-6">
        <h4 class="mb-4"></h4>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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
    ?></div>
</div>

    </body>
</html>
