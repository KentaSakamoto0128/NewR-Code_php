<?php


function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function setToken()
{
    //トークン作成
    //フォームからそのトークンを送信
    //送信後の画面でそのトークンを照会
    //トークンを削除
    session_start();
    $csrf_token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrf_token;

    return $csrf_token;
}
