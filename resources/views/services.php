<?php
    use User\Uwriters\app\core\Application;
    Application::$app->router->resource('views.layouts.head.php');
    Application::$app->router->resource('views.layouts.nav.php');
?>
    <style>
        @media (max-width: 370px) {
            .w-250{
                width: 90% !important;
                height: auto;
            }
            .w-250 img{
                height: 170px;
            }
        }
        @media (max-width: 210px) {
            .w-250{
                width: 95% !important;
            }
        }
    </style>
    <div class="service-section">
        <div class="col-9 m-a">
            <div class="p-40-30">
                <h1 class="f-s-40 color_fade">Services</h1>
            </div>
            <div class="stats display-flex p-20">
                <div class="col-3">
                    <div class="stat-box text-center m-2-4 p-20-10 b-r-10 box-shadow1">
                        <div class="box-title p-b-10">
                            <img class="w-60 h-60" src="/3709755_always_hours_service_support_time_icon.svg" alt="">
                        </div>
                        <div class="stats-sub-heading">
                            <p>Website Content Creation</p>
                        </div>
                        <div class="count p-t-10">
                            <a href="/contact"><button class="bg_update b-n p-10-42 f-s-13 c-black">Enquire</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="stat-box text-center m-2-4 p-20-10 b-r-10 box-shadow1">
                        <div class="box-title p-b-10">
                            <img class="w-60 h-60" src="/3709755_always_hours_service_support_time_icon.svg" alt="">
                        </div>
                        <div class="stats-sub-heading">
                            <p> Guest blooging</p>
                        </div>
                        <div class="count p-t-10">
                            <a href="/contact"><button class="bg_update b-n p-10-42 f-s-13 c-black">Enquire</button></a>

                        </div>
                    </div>
                </div>
                
                <div class="col-3">
                    <a href="./message.php">
                        <div class="stat-box text-center m-2-4 p-20-10 b-r-10 box-shadow1">
                            <div class="box-title p-b-10">
                                <img class="w-60 h-60" src="/3709755_always_hours_service_support_time_icon.svg" alt="">
                            </div>
                            <div class="stats-sub-heading">
                                <p>Copy editing</p>
                            </div>
                            <div class="count p-t-10">
                                <a href="/contact"><button class="bg_update b-n p-10-42 f-s-13 c-black">Enquire</button></a>

                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-3">
                    <div class="stat-box text-center m-2-4 p-20-10 b-r-10 box-shadow1">
                        <div class="box-title p-b-10">
                            <img class="w-60 h-60" src="/3709755_always_hours_service_support_time_icon.svg" alt="">
                        </div>
                        <div class="stats-sub-heading">
                            <p> proofreading</p>
                        </div>
                        <div class="count p-t-10">
                            <a href="/contact"><button class="bg_update b-n p-10-42 f-s-13 c-black">Enquire</button></a>

                        </div>
                    </div>
                </div>
            
            </div>
            <div class="why-hire-me h-500 " style="display: grid; place-items: center;">
                <div class="display-flex">
                    <div class="col-6  " style="display: grid; place-items: center;">
                        <div class="quiz-box" >
                            <h1 class="color_fade text-center p-10-0" >
                                Why hire me?
                            </h1>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="box-one col-10">
                            <div class="p-10">
                                <h1>Competence</h1>
                                <p class="p-10-0 f-s-17">
                                    Your articles will be well crafted, deeply-researched and well thought out. Everything you nee to scale your website to greater heights
                                </p>
                            </div>
                        </div>
                        <div class="box-one col-10">
                            <div class="p-10">
                                <h1>Professionalism</h1>
                                <p class="p-10-0 f-s-17">
                                    I treat my clients with utmost respect and in accordance toprofessional standards. Expext discretion, timeliness, reliability, prompt communication and efficieny
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    Application::$app->router->resource('views.layouts.footer.php');
?>