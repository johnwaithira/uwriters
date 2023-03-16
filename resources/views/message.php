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
        <div class="w-p-75 col-9 col-m-10 p-b-40 b-r-10 b-white box-shadow " style="overflow: scroll; max-height: 76vh">
            <div class="p-20">
                <div class="message-box">
                    <div class="box-shadow1 b-r-10 p-l-10 p-r-10 p-b-20 ">
                        <style>
                            .align-center{
                                align-items: center;}
                            .m-x-60{
                                max-width: 60px;
                                max-height: 60px;
                            }
                            .b-b{
                                border-bottom: 1px solid rgba(14, 14, 14, 0.247);
                            }
                            .m-w-700{
                                max-width: 700px;
                            }
                            .green{
                                background: green;
                            }
                        </style>
                        <div class="">
                            <div class="box-m p-5-21">
                                <p><?php Dash::UnreadMessages()?> unread message(s)</p>
                            </div>
                            <?php
                                Dash::AllMessages();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    Application::$app->router->resource('views.layouts.auth.footer.php');
?>