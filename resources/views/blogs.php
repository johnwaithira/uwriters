<?php
    use User\Uwriters\app\core\Application;
    use User\Uwriters\app\model\Dash;
    
    Application::$app->router->resource('views.layouts.head.php');
    Application::$app->router->resource('views.layouts.nav.php');
    Dash::blogs();
?>
    
    <?php
    Application::$app->router->resource('views.layouts.footer.php');
?>