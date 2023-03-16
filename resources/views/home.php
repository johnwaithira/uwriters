<?php
use User\Uwriters\app\core\Application;
use User\Uwriters\app\Http\Security\Hash;
use User\Uwriters\app\model\Dash;

    Application::$app->router->resource('views.layouts.head.php');
    Application::$app->router->resource('views.layouts.nav.php');

?>
    <div class="h-538  landing">
        <div class="intro p-b-40 w-p-90 m-a h-p-100">
            <div class=" col-6 col-m-8 col-s-10">
                <h1 class="f-s-70 c-white" style="word-break: break-word">Hi, I'm John Waithira</h1>
                <div class="div p-t-20 w-p-70">
                    <p class="f-s-18 f-w-800 c3">I'm a content writer.  I write content that help Bussiness get more traffic and leads</p>
                </div>
                <a href="<?php echo "/services";?>" class="">
                    <button class="bg-inherit b-one f-s-18 p-10-25 m-t-10 c-white">Learn more ... </button>
                </a>
            </div>
        </div>
    </div>

    <div class="about-me p-b-30" id="about">
        <div class="h-80vh ha display-flex ">
            <div class="w-p-100 p-t-30 p-b-20 about">
                <h1 class="text-center color_fade">About Me</h1>
            </div>
            <div class="col-10  display-flex align-center m-a">
                <div class="col-6 ">
                    <div class="me ">
                        <div class="display-flex col-10 p-20 m-a">
                            <div class="h1 p-20-0">
                                <h1 style="word-break: break-word">Dedicate and Strive FOR EXCELENCE</h1>
                            </div>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum vel sint suscipit nostrum quam sequi harum eos possimus dolores doloribus! Aspernatur, esse sed vitae quis corporis enim quod ut omnis.</p>
                            <a href="/services" class="p-10">
                                <button class="bg-inherit b-one p-10-15 m-t-4 f-w-800 f-s-17">Services</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 m-a">
                    <div class="image align-center display-flex">
                        <div class="p-30-20">
                            <img style="max-height: 420px; width: auto;" src="/storage/about/<?php echo Dash::about()?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    Dash::blog();
    Application::$app->router->resource('views.layouts.footer.php');
?>