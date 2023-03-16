<?php
    use User\Uwriters\app\Http\Security\Auth\Session;
    use User\Uwriters\app\core\Application;
    use User\Uwriters\app\Http\Security\Hash;
    use User\Uwriters\app\model\Dash;
    
    Application::$app->router->resource('views.layouts.head.php');
    Application::$app->router->resource('views.layouts.auth.nav.php');

?>
    
    <div class="container display-flex m-b-20">
        <?php
            Application::$app->router->resource('views.layouts.auth.side.php');
        ?>
        
        <div class="w-p-75 col-9 col-m-10 p-b-40 b-r-10 b-white box-shadow">
            <div class="p-20 ">
                <?php echo Session::get('success')?>
                <div class="control-btns w-p-100 text-center">
                    <button class="p-10-20 b-n b-black c-white " id="btn" onclick="control(event, 'upload')">Upload</button>
                    <button class="p-10-20 b-n b-black c-white " id="btn1" onclick="control(event, 'viewupload')">View Uploaded Imgs</button>
                </div>


                <div id="upload" class="uploads d-n col-5 m-a">
                    <div class="upload-form">
                        <form action="#" id="form" class="" method="post" enctype="multipart/form-data">
                            <div class="myform myform_btn  b-r-10 display-flex m-30-0 h-170">
                                <input type="file" id="fileinput" name="upload" required>
                                <p>Browse image to upload</p>

                            </div>
                            <button type="submit" class="p-13-20 c-white f-w-900 bg-fade2 b-n" name="me">Upload</button>
                        </form>

                        <section class="progress-area"></section>
                        <section class="uploaded-area"></section>

                    </div>
                </div>

                <div class="d-n uploads" id="viewupload">
                    <div class="images-list m-t-20">
                        <?php
                            Dash::img();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .align-center{
                align-items: center;

            }
            .b-b{
                border-bottom: 1px solid rgba(205, 202, 202, 0.247);
            }
            .m-w-700{
                max-width: 700px;
            }
            .column{
                flex-direction: column;
            }
            .recieved-message{
                border: 1px solid rgb(152, 152, 152);
                width: calc(100% - 350px);
                border-radius: 0 30px 30px 30px;
                margin-bottom: 10px;

            }
            .reply-message{
                border: 1px solid rgb(152, 152, 152);
                width: calc(100% - 350px);
                margin-left: 340px;
                margin-bottom: 10px;
                border-radius: 30px 0px 30px 30px;
            }

            .type-message{
                bottom: 20px;
                position: fixed;
            }
            .type-message input{

            }
        </style>
    
    
    
    </div>
    <script>
        let text = document.querySelectorAll( "#imageurl");

        for(var x =0; x<text.length; x++){
            text[x].style.opacity = 0;
            text[x].style.maxWidth = 12 +"px";
        }
        let btn = document.querySelectorAll(".copyurl");
        for(let i =0; i < btn.length; i++){
            btn[i].addEventListener("click", function(){
                text[i].select();
                document.execCommand("copy");
                btn[i].style.background = "green";
                btn[i].innerHTML = "Copied!";

                setTimeout(() => {
                    btn[i].style.background = "#c2bdbd";
                    btn[i].innerHTML = "Copy";
                }, 3000);
            });

        }

        function control(evt, tabname){
            var i, tabbtn, tabcontent;
            tabcontent = document.getElementsByClassName("uploads");
            for(i =0; i< tabcontent.length; i++){
                tabcontent[i].style.display = "none";
            }
            tabbtn = document.getElementsByClassName("uploadBtns");

            for(i =0; i< tabbtn.length; i++){
                tabbtn[i].className = tabbtn[i].className.replace(" activeE", "");
            }
            document.getElementById(tabname).style.display = "block";
            evt.currentTarget.className += " activeE";
            localStorage.setItem("tab", JSON.stringify(tabname));

        }
        let GetTab = JSON.parse(localStorage.getItem("tab"));
        if(GetTab === "upload"){
            document.getElementById("btn").click();

        }else{
            document.getElementById("btn1").click();
        }

    </script>
<?php
    Application::$app->router->resource('views.layouts.auth.footer.php');
?>