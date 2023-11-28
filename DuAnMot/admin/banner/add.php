<?php
            if (isset($thongbao) && ($thongbao != ""))
                echo $thongbao;


            ?>
        </form>
    </div>
</div>
</div> 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm Mới Banner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Banner</li>
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
                            <form action="index.php?act=addbn" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    
                                 
                                <div class="mb-3">
                                        <input type="text" class="form-control" name="text1" placeholder="Text 1">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="text2" placeholder="Text 2">
                                    </div>

                                    <div class="mb-3">
                                        <label for="topic-name" class="col-form-label">Banner</label>
                                        <input type="file" name="hinh" class="col-form-label">
                                    </div>

                                    
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <a href="index.php?act=listbn"> <input type="button" class="btn btn-primary" value="Danh sách"></input></a>

                                    <input type="submit" name="themmoi" class="btn btn-success" value="Thêm mới"></input></a>

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


<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm banner</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="index.php?act=addbn" method="POST">
                <div class="modal-body">
                  
                    <div class="mb-3">
                        <label for="topic-name" class="col-form-label">Banner</label>
                        <input type="file" name="img" class="col-form-label" id="">
                    </div>
                    
                   
                </div>
                <div class="modal-footer justify-content-between">
                    <a href="index.php?act=listbn"> <input type="button" class="btn btn-primary" value="Danh sách"></input></a>

                    <input type="submit" name="themmoi" class="btn btn-success" value="Thêm mới"></input></a>

                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>