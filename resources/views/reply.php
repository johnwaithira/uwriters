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
                
                <?php
                    Dash::replymsg($_GET['id']);

                ?>
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
<?php
    Application::$app->router->resource('views.layouts.auth.footer.php');
?>