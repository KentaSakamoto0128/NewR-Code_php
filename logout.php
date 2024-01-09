<?php
session_start();
require_once 'UserLogic.php';

//ログイン判定
//セッションが切れていたらログインをうながす。
$result = UserLogic::checkLogin();

if (!$result) {
    exit('セッションが切れましたので、ログインし直してください。');
}

//ログアウト処理
UserLogic::logout();

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ログアウト</title>
    <link rel="stylesheet" href="css/account.css">
</head>

<body>
    <a href="home.html">
        <h1 class="header-logo">NewRCode</h1>
    </a>
    <h2>ログアウト</h2>
    <p>ログアウトしました。</p>

    <button onclick="location.href='login_form.php'">ログインする</button>
</body>

</html>