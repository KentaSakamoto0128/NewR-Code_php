<?php

session_start();
require_once 'functions.php';
require_once 'UserLogic.php';

//ログイン判定
$result = UserLogic::checkLogin();
if ($result) {
    header('Location: mypage.php');
    return;
}

$login_err = isset($_SESSION['login_err']) ? $_SESSION['login_err'] : null;
unset($_SESSION['login_err']);
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>新規登録</title>
    <link rel="stylesheet" href="css/account.css">
    <script type="text/javascript">
        function check() {
            var check1 = document.form2.username.value;
            var check2 = document.form2.userid.value;
            var check3 = document.form2.pw1.value;
            var check4 = document.form2.pw2.value;
            check5 = document.form2.confirm.checked;

            if (check1 == "" || check2 == "" || check3 == "" || check4 == "") {
                document.getElementById('alert').innerHTML = "<p>全項目入力必須です。入力してください。</p>";
                return false;
            } else if (check3 != check4) {
                document.getElementById('alert').innerHTML = "<p>確認用パスワードが異なります。</p>";
                return false;
            } else if (check5 == false) {
                document.getElementById('alert').innerHTML = "<p>入力内容を確認してチェックを入れてください。</p>";
                return false;
            } else {
                return true;
            }
        }
    </script>
</head>

<body>
    <a href="home.html">
        <h1 class="header-logo">NewRCode</h1>
    </a>
    <h2>新規登録</h2>
    <div id="alert">
        <?php if (isset($login_err)) : ?>
            <p><?php echo $login_err; ?></p>
        <?php endif; ?>
    </div>
    <form method="POST" name="form2" action="register.php">
        <h3 id="subtitle1">お名前</h3>
        <p>※20文字以内で入力してください。</p>
        <div class="input-detail">
            <label class="ef">
                <input type="text" id="username" name="username" maxlength="20" placeholder="お名前" required="required"><br>
            </label>
        </div>
        <h3 id="subtitle2">メールアドレス</h3>
        <p>※登録したメールアドレスがユーザーIDになります。</p>
        <div class="input-detail">
            <label class="ef">
                <input type="email" id="userid" name="email" placeholder="ユーザーID/メールアドレス" required="required"><br>
            </label>
        </div>
        <h3 id="subtitle3">パスワード</h3>
        <p>※パスワードは8文字以上(半角英数字のみ使用可能)</p>
        <div class="input-detail">
            <label class="ef">
                <input type="password" id="pw1" name="password" placeholder="パスワード" minlength="8" maxlength="20" pattern="^[a-zA-Z0-9]+$" required="required"><br></label>
        </div>
        <h3 id="subtitle4">確認用パスワード</h3>
        <p>※もう一度同じパスワードを入力してください。</p>
        <div class="input-detail">
            <label class="ef">
                <input type="password" id="pw2" placeholder="パスワード" minlength="8" maxlength="20" pattern="^[a-zA-Z0-9]+$" required="required"><br></label>
        </div>
        <fieldset class="confirmcb">
            <label>
                <input type="checkbox" id="confirm" required="required">入力内容を確認しました。
            </label>
        </fieldset>
        <p><input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>"></p>
        <input value="新規登録" type="submit" onclick="return check()">
    </form>
    <button onclick="location.href='home.html'">ホームに戻る</button>
    <p id="login">アカウントをお持ちの方は<a href="login_form.php">こちら</a></p>
</body>

</html>