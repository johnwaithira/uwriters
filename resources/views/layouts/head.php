<?php
use User\Uwriters\app\core\Application;
use User\Uwriters\app\Http\Security\Auth\Session;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    <link rel="stylesheet" href="http://127.0.0.1/passwift/public/css/popup.css">-->
    <!--    <link rel="stylesheet" href="http://127.0.0.1/passwift/public/css/style.css">-->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/icons/css/all.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/footer.css">
</head>
<body>
<div class="scroll-div">
    <button class="scroll-btn" style="display: none" id="scroll-btn">
        <p>Back Top</p>
    </button>
</div>
<script>
    window.onscroll = ()=>{
        var sb, sbd, dbs, i, cY, a, b, c, d, e;
        sb = document.querySelector("#scroll-btn");
        sbd = sb.style;
        sbd.display = "none";
        dbs = document.body.scrollTop;
        sb.onclick = () =>{dbs = 0;document.documentElement.scrollTop = 0;}
        if( dbs > 50 || document.documentElement.scrollTop > 50)
        {sbd.display = "block";}
        else {sbd.display = "none";}
    }
</script>
<div style="position: fixed;  top: 10px;right: 20px; z-index:10000;" class="zoom display-flex" id="toast"></div>