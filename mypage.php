<?php
session_start();
require_once 'UserLogic.php';
require_once 'functions.php';
//ログイン判定
$result = UserLogic::checkLogin();

if (!$result) {
    $_SESSION['login_err'] = 'ユーザー登録してログインしてください';
    header('Location: signup_form.php');
    return;
}

$login_user = $_SESSION['login_user'];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>マイページ</title>
    <link rel="stylesheet" href="css/account.css">
</head>

<body>
    <a href="home.php">
        <h1 class="header-logo">NewRCode</h1>
    </a>
    <h2>マイページ</h2>
    <p id="login"><?php echo h($login_user['name']) ?>さんでログインしています
    </p>
    <p id="login">メールアドレス:<?php echo h($login_user['email']) ?>
    </p>
    <form action="logout.php" method="POST">
        <input type="submit" name="logout" value="ログアウト" name="logout">
    </form>
    <button onclick="location.href='home.php'">ホームに戻る</button>

</body>

</html>