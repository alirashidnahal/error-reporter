<?php

// Form Validation
function validator($data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

// Declare constants
const ADMIN_MAIL = 'hi@alirashidnahal.com';
const MAIL_SUBJECT = 'Bug Reporter > PROJECT NAME!';

// Initialize variables and set to empty values
$user_ip = $user_browser = $user_http_code = $user_page_url = $user_protocol = $user_request_method = $user_message = $mail_message = "";

// Declare mail headers
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = 'To: Ali Rashidnahal <hi@alirashidnahal.com>';
$headers[] = 'From: Bug Reporter <admin@example.com>';
$headers[] = 'X-Mailer: PHP/' . phpversion();

// Get the user data and store in variables
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send-error'])) {
    $user_ip = validator($_POST["user-ip"]);
    $user_browser = validator($_POST["user-browser"]);
    $user_http_code = validator($_POST["user-http-code"]);
    $user_page_url = validator($_POST["user-page-url"]);
    $user_protocol = validator($_POST["user-protocol"]);
    $user_request_method = validator($_POST["user-request-method"]);
    $user_message = validator($_POST["user-message"]);
}

// Create mail body by user data
$mail_message = '
<html lang="fa" dir="rtl">
<head>
  <title>Bug Reporter</title>
</head>
<body>
  <h1 style="text-align: center">Report a bug</h1>
  <figure style="text-align: center">
    <table style="text-align: center;font-size:14pt">
        <thead>
        <tr>
            <th>ردیف</th>
            <th>اطلاعات خطا</th>
            <th>توضیحات</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>آدرس IP کاربر</td>
            <td>' . $user_ip . '</td>
        </tr>
        <tr>
            <td>2</td>
            <td>نسخه مرورگر کاربر</td>
            <td>' . $user_browser . '</td>
        </tr>
        <tr>
            <td>3</td>
            <td>کد HTTP</td>
            <td>' . $user_http_code . '</td>
        </tr>
        <tr>
            <td>4</td>
            <td>آدرس رخ دادن خطا</td>
            <td>' . $user_page_url . '</td>
        </tr>
        <tr>
            <td>5</td>
            <td>پروتکل HTTP</td>
            <td>' . $user_protocol . '</td>
        </tr>
        <tr>
            <td>6</td>
            <td>متد درخواست HTTP</td>
            <td>' . $user_request_method . '</td>
        </tr>
        <tr>
            <td>7</td>
            <td>پیام کاربر</td>
            <td>' . $user_message . '</td>
        </tr>
        </tbody>
    </table>
    <figcaption>این ایمیل بصورت خودکار و توسط سامانه گزارشگر خطا ایجاد شده است.</figcaption>
</figure>
</body>
</html>
';

// Send message by PHP mail function
try {
    $mail_sent = mail(ADMIN_MAIL, MAIL_SUBJECT, $mail_message, implode("\r\n", $headers));
} catch (Exception $e) {
    echo $e;
} finally {
    if ($mail_sent) {
        header('Location: index.php', true, 301);
        die();
    }
}