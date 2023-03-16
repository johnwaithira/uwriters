<?php
    use User\Uwriters\app\Http\Security\Auth\Session;
    use User\Uwriters\app\core\Application;
    use User\Uwriters\app\model\Dash;
    
    Application::$app->router->resource('views.layouts.head.php');
    Application::$app->router->resource('views.layouts.auth.nav.php');

?>
    <div class="container display-flex m-b-20">
    <?php
        Application::$app->router->resource('views.layouts.auth.side.php');
    ?>
    <div class="w-p-75 col-9  col-9 col-m-10 p-b-40 b-r-10 p-10 b-white box-shadow ">
    <div class="btns text-center p-t-10">
        <button class="p-10-20 b-one m-t-10 btns" id="btn5" onclick="switchTabs(event, 'about')">About </button>
        <button class="p-10-20 b-one m-t-10 btns" id="btn7" onclick="switchTabs(event, 'landing')">Landing Background</button>
    </div>
    <div class="tab" id="password">
        <div class="form col-6 m-a">
            <form action="" method="post" class="display-flex m-10" style="flex-direction: column; flex-wrap: wrap ">
                <h3>Change Password</h3>
                <div class="p-t-20">
                    <div class="display-flex" style="flex-direction: column;">
                        <label for="old">Old Password</label>
                        <input required type="password" name="old" id="" class="w-p-84 p-10-5" placeholder="Old password">
                        <label for="old" class="p-t-20">New Password</label>
                        <input required type="password" name="new" id="" class="w-p-84 p-10-5" placeholder="New password">
                        <div class="btn p-t-10">
                            <button class="p-10-25" name="change">Change</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="tab" id="about">
        <div class="m-10">
            <div class="col-6 col-m-8 m-a">
                <h1 class="color_fade">About </h1>
                <p>Change about picture</p>
                <div class="upload-form">
                    <form action="/abt" id="form" class="" method="post" enctype="multipart/form-data">
                        <?php echo Session::get('success');
                            Session::clean("success");
                        ?>
                        <div class="myform myform_btn  b-r-10 display-flex m-30-0 h-170">
                            <input type="file" id="fileinput" name="uploadabout" required>
                            <p>Browse image to upload</p>
                        </div>
                        <button type="submit" class="p-13-20 c-white f-w-900 bg-fade2 b-n" name="about">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        .tab{
            display: none;
        }
        .activeclass{
            background: rgb(51, 56, 51);
            color: azure;
            font-size: 17px;
        }
    </style>
    <div class="tab" id="landing">
        <div class="m-10">
            <div class="col-6 col-m-8 m-a">
                <h1 class="color_fade">Landing </h1>
                <?php echo Session::get('success');
                Session::clean("success");
                ?>
                <p>Change landing background</p>
                <div class="upload-form">
                    <form action="/landing" id="form" class="" method="post" enctype="multipart/form-data">
                        <div class="myform myform_btn  b-r-10 display-flex m-30-0 h-170">
                            <input type="file" id="fileinput" name="uploadlanding" required>
                            <p>Browse image to upload</p>
                        </div>
                        <button type="submit" class="p-13-20 c-white f-w-900 bg-fade2 b-n" name="landing">Change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
<script>
    function switchTabs(evt, tabname){
        var i, tabbtn, tabcontent;
        tabcontent = document.getElementsByClassName("tab");
        for(i =0; i< tabcontent.length; i++){
            tabcontent[i].style.display = "none";
        }
        tabbtn = document.getElementsByClassName("btns");

        for(i =0; i< tabbtn.length; i++){
            tabbtn[i].className = tabbtn[i].className.replace(" activeclass", "");
        }
        document.getElementById(tabname).style.display = "block";
        evt.currentTarget.className += "  activeclass";
        localStorage.setItem("tab1", JSON.stringify(tabname));

    }
    let GetTab = JSON.parse(localStorage.getItem("tab1"));
    if(GetTab === "about"){
        document.getElementById("btn5").click();

    }else if(GetTab === "password")
    {
        document.getElementById("btn6").click();
    }
    else{
        document.getElementById("btn7").click();
    }
</script>
<?php
    Application::$app->router->resource('views.layouts.auth.footer.php');
?>