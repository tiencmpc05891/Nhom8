<?php
if(isset($_POST['submit'])){
    // Nhận dữ liệu từ form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // Kiểm tra dữ liệu có hợp lệ không
    if(empty($name) || empty($email) || empty($message)){
        echo "Vui lòng điền đầy đủ thông tin.";
    } else {
        // Thiết lập địa chỉ email nhận thông tin liên hệ
        $toEmail = "your-email@example.com";
        $subject = "Liên hệ từ website";
        $body = "Tên: $name\n\nEmail: $email\n\nNội dung: $message";
        $headers = "From: $name <$email>\r\nReply-To: $email\r\n";
        
        // Gửi email
        if(mail($toEmail, $subject, $body, $headers)){
            echo "Cảm ơn bạn đã liên hệ. Chúng tôi sẽ phản hồi sớm nhất có thể.";
        } else {
            echo "Đã xảy ra lỗi trong quá trình gửi email. Vui lòng thử lại sau.";
        }
    }
}
?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="name">Họ tên:</label>
    <input type="text" name="name" required>
    
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    
    <label for="message">Nội dung:</label>
    <textarea name="message" required></textarea>
    
    <input type="submit" name="submit" value="Gửi">
</form>

