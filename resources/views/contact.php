<?php
    use User\Uwriters\app\core\Application;
    Application::$app->router->resource('views.layouts.head.php');
    Application::$app->router->resource('views.layouts.nav.php');
?>
    <style>
        .form{display:flex; flex-direction:column;}
        .form-group{display:flex; padding:2px 0;}
        input{}
        textarea{font-weight:800;color:var(--seven);padding:5px 15px;margin: 3px; width: 100%; outline:none;border-radius: 3px; border: 2px solid rgba(0, 0, 0, 0.171);}
        .span{
            display: flex;
            width: 81%;
            flex-direction: column;
        }
        .span input{
            width: 90%;
            font-weight:800;color:var(--seven);padding:12px 15px;margin: 3px; outline:none;border-radius: 3px; border: 2px solid rgba(0, 0, 0, 0.171);
        }
        .span p{
            color: rgb(64, 77, 77);
            /* padding: 10px 8px; */
            font-weight: 800;
        }
    </style>
    
    <div class="container">
        <div class="w-p-100  ">
            <div class="bg_update c-black text-center p-12-20">
                <h1 class="b-i f-s-p-299 f-s-m-30 cfff p-t-30">Get in touch</h1>
                <h2 class="p-t-10 p-b-30 f-s-p-m-99 b-i c-ff">Please contact us in case of any query. We are happy to help.</h2>
            </div>
        </div>
        <div class="w-p-94 m-a p-40-0 display-flex">
            <div class="col-4">
                <div class="panel">
                    <div class="panel-body p-l-80 p-l-m-20">
                        <h2 class="p-b-28">Contact Us</h2>
                        <p>
                            Leave your query and we’ll reach out to you.
                            For project related query, our expert learning consultant will help you carve a career path for you.</p>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="p-t-30  p-l-10">
                    <div class="form w-p-100">
                        <p id="error" class="p-l-49"> </p>
                        <form action="" id="form" method="post" class="w-p-90 m-a">
                            <div class="form-group ">
                                <div class="span col-6">
                                    <p class="p-10-8 ">Name</p>
                                    <input type="text" id="name" class="input" name="name" placeholder="Your Name">
                                </div>
                                <div class="span ">
                                    <p class="p-10-8 ">Email</p>
                                    <input type="text" name="email" class="input" id="email" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="w-p-96 p-10 m-a input"  name="message" placeholder="Enter your message here" id="textarea" ></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn c-fff bg-blue m-10-5 p-15-25" id="send" name="send">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/jQuery.js"></script>
    <script src="/js/app.js"></script>
    <script>
        $('#textarea').on('input', function(){
            this.style.height = "auto";
            this.style.height = (this.scrollHeight)+"px";
        });
        
        $(document).ready(()=>{
            $("#form").on("submit", (e)=>{
                e.preventDefault()
            })
            $("#send").click(()=>{
                if(validate())
                {
                    $.ajax({
                        url : "/client/contact",
                        type : "post",
                        data : {
                            name : $("#name").val(),
                            email : $("#email").val(),
                            message : $("#textarea").val()
                        },
                        success : ((res)=>{
                            $("#error").html(res)
                            setTimeout(()=>{
                                $("#error").html("")
                            }, 5000)
                        })
                    })
                }
            })
        })
    </script>

<?php
    Application::$app->router->resource('views.layouts.footer.php');
?>