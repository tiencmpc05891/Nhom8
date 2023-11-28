<?php
if (is_array($dm))
    extract($dm);
  
    // Hiển thị thông báo lỗi nếu có
    if (isset($thongbao) && !empty($thongbao)) {
        echo '<div class="error-message">' . $thongbao . '</div>';
    }
 
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa Danh mục</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Danh mục</li>
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
                        <!-- <div class="card-header">
                            <h3 class="card-title ">Danh sách chủ đề</h3>
                        </div> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="index.php?act=updatedm" method="POST">
                                <div class="modal-body">
                                    <label for="topic-name" class="col-form-label">Mã sản phẩm:</label>
                            

                                    <input type="text" class="form-control"  name="masp" disabled>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="topic-name" class="col-form-label">Tên danh mục:</label>
                                        <input type="text"  class="form-control" name="tenloai" value="<?php if (isset($name) && ($name != "")) echo $name; ?>">
                            
                                    </div>


                                </div>
                                <div class="modal-footer justify-content-between">
                                <input type="hidden" name="id" value="<?php if (isset($id) && ($id != "")) echo $id; ?> ">
                                <a href="index.php?act=listdm"> <input type="button" class="btn btn-primary" value="Danh sách"></input></a>
                                 
                                    <input type="submit" name="capnhat" class="btn btn-success" value="Cập nhật"></input></a>
                         
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