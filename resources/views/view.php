<?php
    use User\Uwriters\app\Http\Security\Auth\Session;
    use User\Uwriters\app\core\Application;
    use User\Uwriters\app\model\Dash;
    
    Application::$app->router->resource('views.layouts.head.php');
    Application::$app->router->resource('views.layouts.auth.nav.php');

?>
    <style>
        *::-webkit-scrollbar{
            width: 0!important;
        }
    </style>
    
    <div class="container display-flex m-b-20">
        <?php
            Application::$app->router->resource('views.layouts.auth.side.php');
        ?>
        <div class="w-p-75 col-9 col-m-10 p-b-40 b-r-10 b-white box-shadow " style="overflow: scroll; max-height: 76vh">
           <?php Dash::view();?>
        </div>
    </div>
<?php
    Application::$app->router->resource('views.layouts.auth.footer.php');
?>