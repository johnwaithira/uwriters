<script src="https://cdn.ckeditor.com/4.17.1/full-all/ckeditor.js"></script>
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
<div class="w-p-75 col-9 col-m-10 p-b-40 b-r-10">
    <div class="p-20 ">
        
        <div class="post box-shadow1  m-a col-11">
            <div class="p-10-0" id="error">
                <?= Session::get("success");
                Session::clean("success");
                ?>
            </div>
            <div class="post-title-box">
                <form action="" id="form" method="post" class="b-n w-p-100" enctype="multipart/form-data">
                    <div class="p-4">
                        <input type="text" required  name="blogTitle" class="input f-s-16 w-p-96 p-10-15" placeholder="Blog title goes here ..." id="autoresize1">
                    </div>
                    <div class="p-4">
                        <input type="file" required  name="blogImage" class="input f-s-16 b-white b-one w-p-96 p-10-15" placeholder="Blog title goes here ..." id="">
                    </div>
                    <div class="p-4">
                        <textarea name="blogDescription" required  id="autoresize2" placeholder="Blog desc / intro ..." class=" input f-s-16 w-p-96 p-10-15"></textarea>
                    </div>
                    <div class="p-4">
                        <textarea name="postbody"  required class="f-s-16 input h-200 w-p-90 p-10-15" id="autoresize3"></textarea>
                    </div>
                    <div class="btn display-flex space-between w-p-90">
                        <button class="p-10-25 b-one b-r-5 m-10-2 bg-inherit" id="post" type="submit" name="post">Post</button>
                        <!-- <button class="p-10-15 b-one b-r-5 btn-success" type="submit" name="">Preview</button> -->
                    </div>
                </form>
            </div>
        
        </div>
    </div>
</div>
<script src="/js/jQuery.js"></script>
<script>
    CKEDITOR.replace("postbody");
</script>
<script>
    $(document).ready(()=>{
        setTimeout(()=>{
            $("#error").html("")
        },4000)

        

    })
    $("#autoresize1").on('input', function(){
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight)+ 'px';
    });
    $("#autoresize2").on('input', function(){
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight)+ 'px';
    });
    $("#autoresize3").on('input', function(){
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight)+ 'px';
    });
    let $data = [
        "autoresize3",
        "autoresize2",
        "autoresize1"
    ];
    auto($data);
</script>
</div>
<?php
    Application::$app->router->resource('views.layouts.auth.footer.php');
?>