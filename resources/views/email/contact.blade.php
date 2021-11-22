<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thư liên hệ</title>
</head>

<body>
    <div style="background-color:#f5f5f5; color:#333;">
        <div style="padding:50px;line-height:25px;"><br />
            <strong style="color:#f00a77;">Họ tên:</strong> {{$data['contact-name']}} <br />
            <strong style="color:#f00a77;">Email:</strong> {{$data['contact-email']}} <br />
            <strong style="color:#f00a77;">Số điện thoại:</strong> {{$data['contact-phone']}} <br />
            <strong style="color:#f00a77;">Tin nhắn:</strong> {{$data['contact-message']}} <br /><br />
        </div>
    </div>
</body>

</html>