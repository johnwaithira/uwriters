<?php
    use User\Uwriters\app\core\Application;
    use User\Uwriters\app\model\Dash;
    
    Application::$app->router->resource('views.layouts.head.php');
    Application::$app->router->resource('views.layouts.nav.php');
    
    
    if(!isset($_GET['id']))
    {
        Application::$app->router->redirect("blogs");
    }
    
    Dash::post($_GET['id']);
?>
