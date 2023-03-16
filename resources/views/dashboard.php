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
    <title>Uwriters | Admin panel</title>
    <div class="w-p-75 col-9 col-m-10 p-b-40 b-r-10 b-white  ">
        <div class="stats display-flex p-20">
            <div class="col-3">
                <div class="stat-box text-center m-2-4 p-20-10 b-r-10 box-shadow1">
                    <div class="box-title p-b-10">
                        <h2>Site Visits</h2>
                    </div>
                    <div class="stats-sub-heading">
                        <p>lifetime</p>
                    </div>
                    <div class="count p-t-10">
                        <h1 class="f-s-50 color-update"><?php echo  Dash::AllVisit();?></h1></h1>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="stat-box text-center m-2-4 p-20-10 b-r-10 box-shadow1">
                    <div class="box-title p-b-10">
                        <h2>Comments</h2>
                    </div>
                    <div class="stats-sub-heading">
                        <p>New feeds</p>
                    </div>
                    <div class="count p-t-10">
                        <h1 class="f-s-50 color-update">--</h1>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <a href="./message">
                    <div class="stat-box text-center m-2-4 p-20-10 b-r-10 box-shadow1">
                        <div class="box-title p-b-10">
                            <h2>Messages</h2>
                        </div>
                        <div class="stats-sub-heading">
                            <p>Unread</p>
                        </div>
                        <div class="count p-t-10">
                            <h1 class="f-s-50 color-update">
                                <?php Dash::UnreadMessages();?>
                            </h1>
                        </div>

                    </div>
                </a>
            </div>

            <div class="col-3">
                <div class="stat-box text-center m-2-4 p-20-10 b-r-10 box-shadow1">
                    <div class="box-title p-b-10">
                        <h2>Site Visits</h2>
                    </div>
                    <div class="stats-sub-heading">
                        <p>Today</p>
                    </div>
                    <div class="count p-t-10">
                        <h1 class="f-s-50 color-update">
                            <?php echo  Dash::Visit();?></h1>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
    Application::$app->router->resource('views.layouts.auth.footer.php');
?>