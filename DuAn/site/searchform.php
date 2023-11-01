
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <style>
        body{

background: #d1d5db;
}

.height{

height: 100vh;
}

.form{

position: relative;
}

.form .fa-search{

position: absolute;
top:20px;
left: 20px;
color: #9ca3af;

}

.form span{

    position: absolute;
right: 17px;
top: 13px;
padding: 2px;
border-left: 1px solid #d1d5db;

}

.left-pan{
padding-left: 7px;
}

.left-pan i{

padding-left: 10px;
}

.form-input{

height: 55px;
text-indent: 33px;
border-radius: 10px;
}

.form-input:focus{

box-shadow: none;
border:none;
}
    </style>
      <form action="search.php" method="GET">
        <div class="container">
            <div class="row height d-flex justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="form">
                        <i class="fa fa-search"></i>
                        <input type="text" class="form-control form-input" name="search_query" placeholder="Search anything...">
                        <span class="left-pan"><i class="fa fa-microphone"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</body>
</html>
