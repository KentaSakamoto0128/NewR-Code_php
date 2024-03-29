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
    <a href="home.php">
        <h1 class="header-logo">NewRCode</h1>
    </a>
    <h2>ログアウト</h2>
    <p id="login">ログアウトしました。</p>

    <button onclick="location.href='home.php'">ホームに戻る</button>
</body>

</html>