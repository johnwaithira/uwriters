<?php

use User\Uwriters\app\core\Application;
use User\Uwriters\app\Http\Security\Hash;

    Application::$app->router->resource('views.layouts.head.php');
    Application::$app->router->resource('views.layouts.nav.php');
    
    
    ?>
<title>Benjamin Wanjohi | Login</title>

<style>
    @media (max-width:500px) {.dn{display: none;}}
</style>
<body class="bg_update">
<div class="container m-t-70 display-flex m-b-20">
    <div class=" col-5 col-m-10 p-b-40 b-r-10 m-5 b-white box-shadoww ">
        <div class="p-20">
            <div class="message-box">
                <div class="box-shadow1 b-r-10 p-l-10 p-r-10 p-b-20 ">
                    <style>
                        .align-center{align-items: center; }
                        .b-b{border-bottom: 1px solid rgba(14, 14, 14, 0.247);}
                        .m-w-700{ max-width: 700px;}
                    </style>
                    <div class="">
                        <div class="box-m p-5-21">
                            <div class="error" id="Error">
                            
                            </div>
                            <h1 class="p-t-20">Login</h1>
                        </div>
                        <form action="" class="b-n" id="form" method="post">
                            <div class="message p-20-0 b-b display-flex m-w-700 align-center w-p-100">
                                <div class="img col-2 ">
                                    <div class="m-r-20 dn">
                                        <img src="/storage/upload-11cdeb202203041615273833-uwriters-img.jpg"
                                             class="w-60 float-right r-20 h-60 b-r-50">
                                    </div>
                                </div>
                                <div class="details col-8">
                                    <div class="msg">
                                        <input type="text" id="email" name="email" class="input p-10-20 w-p-80 outline-none" placeholder="Email">
                                    </div>
                                    <div class="msg">
                                        <input type="password" id="password" name="password" class="input p-10-20 m-t-10 w-p-80 outline-none" placeholder="Password">
                                    </div>
                                    <div class="msg">
                                        <button class="m-t-10 p-10-20 bg_update outline-none" id="login">Login</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    
    form{cursor: pointer;align-items: center;justify-content: center;border: 2px dashed #278123;flex-direction: column;}
</style>
<script src="/js/jQuery.js"></script>
<script src="/js/app.js"></script>
<script>
 
    
    $(document).ready(()=>{
        
        $("#form").on("submit", (e)=>{
            e.preventDefault()
        })
        $("#login").click(()=>{
            if(validate())
            {
                $.ajax({
                    url : "/admin/login",
                    type : "post",
                    data : {
                        email : $("#email").val(),
                        password : $("#password").val()
                    },
                    success : ((res)=>{
                        console.log(res)
                        if(res === "ok")
                        {
                            window.location.assign("./admin")
                        }
                        else
                        {
                            $("#Error").html(res)
                            setTimeout(() => {
                                document.querySelector(".error").style.display = "none";
                            }, 5000);
                        }
                    })
                })
            }
        })
    })
</script>
