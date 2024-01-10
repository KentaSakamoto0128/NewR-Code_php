<?php
session_start();
require_once 'UserLogic.php';

//ログイン判定
$result = UserLogic::checkLogin();
if ($result) {
    header('Location: mypage.php');
    return;
}

$err = $_SESSION;

$_SESSION = array();
session_destroy();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="css/account.css">
</head>

<body>
    <a href="home.php">
        <h1 class="header-logo">NewRCode</h1>
    </a>
    <h2>ログイン</h2>
    <div id="alert">
        <?php if (isset($err['email'])) : ?>
            <p><?php echo $err['email']; ?></p>
        <?php endif; ?>
        <?php if (isset($err['password'])) : ?>
            <p><?php echo $err['password']; ?></p>
        <?php endif; ?>
        <?php if (isset($err['msg'])) : ?>
            <p><?php echo $err['msg']; ?></p>
        <?php endif; ?>
    </div>
    <form method="POST" action="login.php">
        <h3>ユーザーID</h3>
        <div class="input-detail">
            <label class="ef">
                <input type="email" name="email" placeholder="ユーザーID/メールアドレス"><br>
            </label>
        </div>
        <h3>パスワード</h3>
        <div class="input-detail">
            <label class="ef">
                <input type="password" id="pw1" name="password" placeholder="パスワード" minlength="8" maxlength="20" pattern="^[a-zA-Z0-9]+$"><br></label>
        </div>
        <input type="submit" value="ログイン">
    </form>
    <button onclick="location.href='home.php'">ホームに戻る</button>

    <p id="login">はじめての方は<a href="signup_form.php">こちら</a></p>
</body>

</html>