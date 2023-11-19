<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa Tài Khoản</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Tài khoản</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="index.php?act=updatetk" method="POST">
                                <div class="mb-3">
                                    <label for="username" class="col-form-label">Tên đăng nhập:</label>
                                    <input type="text" class="form-control" id="username" name="user" value="<?php echo isset($user) ? $user : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="col-form-label">Mật khẩu:</label>
                                    <input type="password" class="form-control" id="password" name="pass" value="<?php echo isset($pass) ? $pass : '';?>">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="col-form-label">Email:</label>
                                    <input type="text" class="form-control" name="email" value="<?= isset($email) ? $email : ''; ?>" id="email">
                                </div>
                                <div class="mb-3">
                                    <label for="diachi" class="col-form-label">Địa chỉ:</label>
                                    <input type="text" class="form-control" id="diachi" value="<?= isset($address) ? $address : ''; ?>" name="address">
                                </div>
                                <div class="mb-3">
                                    <label for="tel" class="col-form-label">Điện thoại:</label>
                                    <input type="text" class="form-control" name="tel" value="<?= isset($tel) ? $tel : ''; ?>" id="dienthoai">
                                </div>

                                <div class="modal-footer justify-content-between">
                                    <input type="hidden" name="id" value="<?= isset($id) ? $id : ''; ?>">
                                    <a href="index.php?act=dskh"><input type="button" class="btn btn-primary" value="Danh sách"></input></a>
                                    <input type="submit" name="capnhat" class="btn btn-success" value="Cập nhật"></input>
                                </div>

                                <?php
                                if (isset($thongbao) && ($thongbao != ""))
                                    echo $thongbao;
                                ?>
                            </form>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>