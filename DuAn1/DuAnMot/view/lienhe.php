<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ</title>
    <link rel="stylesheet" href="../view/css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .boxtieude {
            text-align: center;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        iframe {
            width: 100%;
            height: 450px;
            border: 0;
        }

        .contact-form-wrap {
            padding: 20px;
            background-color: #fff;
            border: 1px solid #e0e0e0;
            text-align: center;
            margin-top: 20px;
        }

        .contact-title {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .contact-form-style {
            margin-bottom: 20px;
        }

        .contact-form-style input,
        .contact-form-style textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            outline: none;
        }

        .contact-form-style .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-messege {
            font-size: 16px;
            font-weight: 600;
            text-align: center;
        }

        /* CSS tùy chỉnh cho biểu tượng */
        .icon i {
            font-size: 20px; /* Điều chỉnh kích thước biểu tượng */
            color: #007bff; /* Điều chỉnh màu sắc biểu tượng */
        }

        /* CSS tùy chỉnh cho vùng thông tin liên hệ */
        .boxlienhe {
            text-align: center;
            border: 1px solid black;
            margin-bottom: 10px;
            padding: 20px 450px;
        }

        .boxlienhe ul {
            list-style-type: none;
            padding: 0;
        }

        .boxlienhe li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .boxlienhe .icon i {
            font-size: 20px;
            color: black;
            margin-right: 10px;
        }

        .boxlienhe .text {
            font-size: 18px;
        }
    </style>
</head>

<body>
<div class="containerfull"><img  style="text-align: center; width:100%; height:250px; margin-bottom:20px;"  src="../view/img/headergalaxy.jpg" alt=""></div>

    <div class="container">
        
        <div class="boxtieude">LIÊN HỆ VỚI CHÚNG TÔI</div>
        <div class="boxlienhe">
            <ul>
                <li>
                    <span class="icon"><i class="fas fa-map"></i></span>
                    <span class="text"><a href="#"> Nguyễn Văn Kiệt - Cần Thơ </a></span>
                </li>
                <li>
                    <span class="icon"><i class="fas fa-phone"></i></span>
                    <span class="text"><a href="#">0987097962</a></span>
                </li>
                <li>
                    <span class="icon"><i class="far fa-envelope-open"></i></span>
                    <span class="text"><a href="mailto:tiencmpc05891@fpt.edu.vn">tiencmpc05891@fpt.edu.vn</a></span>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62860.622877822345!2d105.716370455472!3d10.034268928723716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0629f6de3edb7%3A0x527f09dbfb20b659!2zQ-G6p24gVGjGoSwgTmluaCaeG7gXUsIEPhuqduIFRoxqEsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1697692554759!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6">
                <div class="contact-form-wrap">
                    <h3 class="contact-title">Gửi phản hồi</h3>

                    <form id="contact-form" action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="contact-form-style mb-20">
                                    <input name="con_name" placeholder="Họ*" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class ="contact-form-style mb-20">
                                    <input name="lastname" placeholder="Tên*" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-form-style mb-20">
                                    <input name="con_email" placeholder="Email*" type="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-form-style mb-20">
                                    <input name="subject" placeholder="Chủ đề*" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contact-form-style">
                                    <textarea name="con_message" placeholder="Nhập tin nhắn của bạn ở đây..."></textarea>
                                    <button class="btn" type="submit"><span>Gửi tin nhắn</span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
