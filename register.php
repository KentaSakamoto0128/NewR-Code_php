<?php
session_start();
require_once 'UserLogic.php';

$token = filter_input(INPUT_POST, 'csrf_token');

if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
    exit('不正なリクエスト');
}

unset($_SESSION['csrf_token']);

//ユーザー登録処理
$hasCreated = UserLogic::createUser($_POST);

if (!$hasCreated) {
    $err[] = '登録に失敗しました';
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>新規登録</title>
    <link rel="stylesheet" href="css/account.css">
</head>

<body>
    <a href="home.php">
        <h1 class="header-logo">NewRCode</h1>
    </a>
    <h2>新規登録</h2>
    <h3>新規登録が完了しました。</h3>
    <button onclick="location.href='home.php'">ホームに戻る</button>
    <button onclick="location.href='login.php'">ログインする</button>
</body>

</html>