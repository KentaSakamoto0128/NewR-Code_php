<?php
session_start();
require_once 'UserLogic.php';

$err = [];
if (!$email = filter_input(INPUT_POST, 'email')) {
    $err['email'] = 'メールアドレスを記入してください。';
}

if (!$password = filter_input(INPUT_POST, 'password')) {
    $err['password'] = 'パスワードを記入してください。';
}

if (count($err) > 0) {
    //エラーがあった戻す
    $_SESSION = $err;
    header('Location: login_form.php');
    return;
}

//ログイン成功処理
$result = UserLogic::login($email, $password);
if (!$result) {
    header('Location: login_form.php');
    return;
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ログイン完了</title>
    <link rel="stylesheet" href="css/account.css">
</head>

<body>
    <a href="home.php">
        <h1 class="header-logo">NewRCode</h1>
    </a>
    <h2>ログイン</h2>
    <h3>ログインしました。</h3>
    <button onclick="location.href='mypage.php'">マイページへ</button><br>
    <button onclick="location.href='home.php'">ホームに戻る</button>
</body>

</html>