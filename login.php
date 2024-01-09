<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="css/account.css">
</head>

<body>
    <a href="home.html">
        <h1 class="header-logo">NewRCode</h1>
    </a>
    <h2>ログイン</h2>
    <div id="alert"></div>
    <form method="POST" action="welcome.html">
        <h3>ユーザーID</h3>
        <div class="input-detail">
            <label class="ef">
                <input type="email" placeholder="ユーザーID/メールアドレス" required="required"><br>
            </label>
        </div>
        <h3>パスワード</h3>
        <div class="input-detail">
            <label class="ef">
                <input type="password" id="pw1" placeholder="パスワード" minlength="8" maxlength="20" pattern="^[a-zA-Z0-9]+$" required="required"><br></label>
        </div>
        <button onclick="location.href='home.html'">ホームに戻る</button>
        <input type="submit" value="ログイン">
    </form>
    <p>はじめての方は<a href="createaccount.html">こちら</a></p>
</body>

</html>