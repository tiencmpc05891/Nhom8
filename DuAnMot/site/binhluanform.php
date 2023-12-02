<?php
session_start();

include "../model/pdo.php";
include "../model/binhluan.php";


$idpro = isset($_REQUEST['idpro']) ? $_REQUEST['idpro'] : null;
$dsbl = loadall_binhluan($idpro);

if (!isset($_SESSION['user'])) {
    // Hiển thị thông báo hoặc thực hiện các hành động khác tùy thuộc vào yêu cầu của bạn
    echo "Bạn cần đăng nhập để thực hiện hành động này.";
    exit(); // Dừng việc thực hiện tiếp theo
}

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $commentId = $_GET['id'];
    delete_comment($commentId);
    header("Location: " . $_SERVER['HTTP_REFERER']);

}
if (isset($_POST['saveEdit'])) {
    $editedMessage = $_POST['editedMessage'];
    $commentId = $_POST['commentId'];

    update_comment($commentId, $editedMessage);
    header("Location: " . $_SERVER['PHP_SELF']);

}
if (isset($_POST['guibinhluan']) && $_POST['guibinhluan']) {
    $noidung = $_POST['noidung'];
    $idpro = $_POST['idpro'];
    $iduser = $_SESSION['user']['id'];
    $ngaybinhluan = date('h:i:sa d/m/y');
    insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
    header("Location: " . $_SERVER['PHP_SELF'] . "?idpro=" . $idpro);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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
            background-color: #FFFF00;
        }

        .btn-save {
            background-color: #3366FF;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }

        .btn-save:hover {
            background-color: #003399;
        }


        .btn-cancel {
            background-color: #808080;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-cancel:hover {
            background-color: #1C1C1C;
        }

        .btn-edit {
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }

        .btn-edit:hover {
            background-color: #2980b9;
        }


        .btn-delete {
            background-color: #e74c3c;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }

        .btn-edit {
            background-color: #3498db;
            color: white;
            padding: 4px 6px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }

        .btn-edit:hover {
            background-color: #2980b9;
        }


        .btn-delete {
            background-color: #e74c3c;
            color: white;
            padding: 4px 6px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }
    </style>

    <div class="tab-pane fade" id="tab-pane-3">
    <div class="row">
        <div class="col-md-6">
            <?php
            // Kiểm tra xem người dùng đã đăng nhập hay chưa
            if (isset($_SESSION['user'])) {
                echo '
                <h4 class="mb-4"></h4>
                <form action="' . $_SERVER['PHP_SELF'] . '" method="post">
                    <input type="hidden" name="idpro" value="' . $idpro . '">
                    <div class="form-group">
                        <label for="message">Đánh giá của bạn</label>
                        <textarea id="message" name="noidung" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group mb-0">
                        <input type="submit" name="guibinhluan" value="Gửi bình luận" class="btn btn-primary">
                    </div>
                </form>';
            } else {
                echo '<p>Bạn cần đăng nhập để thêm bình luận.</p>';
            }
            ?>
        </div>
       
    
            <div class="col-md-6">
                <h4 class="mb-4">Bình luận</h4>
                <?php foreach ($dsbl as $bl): ?>
                    <div class="media mb-4">
                        <div class="media-body">
                            <h2>
                                <?php
                                // Truy xuất thông tin người dùng từ cơ sở dữ liệu
                                $user = get_user_by_id($bl['iduser']);
                                echo isset($user['user']) ? $user['user'] : 'Không có tên người dùng';
                                ?>
                            </h2>
                            <p>
                                <?php echo $bl['noidung']; ?>
                            </p>
                            <p>
                                <?php echo $bl['ngaybinhluan']; ?>
                            </p>

                            <?php
                            // Kiểm tra xem người đăng nhập có ID trùng khớp với người đăng bình luận hay không
                            $loggedInUserId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : null;

                            if ($loggedInUserId && $loggedInUserId == $bl['iduser']) {
                                ?>

                                <a href="<?php echo $_SERVER['PHP_SELF'] . '?action=delete&id=' . $bl['id']; ?>"
                                    class="btn btn-delete"><i class="fa fa-trash"></i></a>



                                <a href="#" onclick="editComment(<?php echo $bl['id']; ?>)" class="btn btn-edit"><i
                                        class="fa fa-edit"></i></a>
                            <?php } ?>
                            <div class="form-group mb-0">
                                <form id="editForm<?php echo $bl['id']; ?>" class="edit-comment-form" style="display: none;"
                                    action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                    <div class="form-group">
                                        <label for="editedMessage<?php echo $bl['id']; ?>">Nội dung sửa</label>
                                        <textarea id="editedMessage<?php echo $bl['id']; ?>" name="editedMessage" cols="30"
                                            rows="3" class="form-control"><?php echo $bl['noidung']; ?></textarea>
                                    </div>

                                    <input type="hidden" name="commentId" value="<?php echo $bl['id']; ?>">
                                    <button type="submit" class="btn btn-save" name="saveEdit">Lưu</button>
                                    <button type="button" class="btn btn-cancel"
                                        onclick="cancelEdit(<?php echo $bl['id']; ?>)">Hủy</button>

                                </form>
                            </div>
                            <br>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

    </div>


    <script>
        function editComment(commentId) {
            // Ẩn tất cả các form sửa trước khi hiển thị form sửa của bình luận cụ thể
            hideAllEditForms();

            // Hiển thị form sửa của bình luận được chọn
            var editForm = document.getElementById('editForm' + commentId);
            if (editForm) {
                editForm.style.display = 'block';
            }
        }

        function hideAllEditForms() {
            var editForms = document.getElementsByClassName('edit-comment-form');
            for (var i = 0; i < editForms.length; i++) {
                editForms[i].style.display = 'none';
            }
        }

        function saveEdit(commentId) {
            // Lấy nội dung đã sửa
            var editedMessage = document.getElementById('editedMessage' + commentId).value;

            // Gửi dữ liệu sửa bình luận lên server (cần implement)
            // Có thể sử dụng AJAX để gửi yêu cầu sửa bình luận lên server

            // Ẩn form sửa sau khi lưu
            hideAllEditForms();
        }

        function cancelEdit(commentId) {
            // Ẩn form sửa khi hủy
            hideAllEditForms();
        }
        
    </script>

</body>

</html>