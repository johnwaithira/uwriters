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

    <div class="w-p-75 col-9 col-m-10 p-b-40 b-r-10 b-white box-shadow ">
        <div class="stats display-flex p-20">

            <div class="profile">
                
                <form enctype="multipart/form-data" action="" method="post" class="b-n b-white box-shadow1 p-10-0 col-8 m-a display-flex">
                    <?php if (!empty($msg)) {
                        echo $msg."<br>";
                    } ?>
                    <div class="text-left w-p-90 p-10-0">
                        <h1 class="color_fade">Edit portfolio Here</h1>
                    </div>
                    <div class="p-4 w-p-90">
                        <input type="text" name="title" class="f-s-16 w-p-90 p-10-15" required placeholder="Title ..." id="autoresize1">
                    </div>
                    <div class="p-4  w-p-90">
                        <input type="text" name="link" class="f-s-16 w-p-90 p-10-15" required placeholder="Link ..." id="autoresize1">
                    </div>
                    <div class="p-4  w-p-90">
                        <input type="file" name="img" class="f-s-16 b-white b-one w-p-90 p-10-15" required placeholder=" ..." id="">
                    </div>

                    <div class="btn display-flex space-between w-p-90">
                        <button class="p-10-15 b-one b-r-5 btn-success" name="postbtn">Post</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
        if(window.history.replaceState)
        {
            window.history.replaceState(null, null, window.location.href);
        }
</script>


<?php
    Application::$app->router->resource('views.layouts.auth.footer.php');
?>


