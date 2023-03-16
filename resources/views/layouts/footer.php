<div class="news" id="newsletter">
    <div class="newsletter bg_update_1 w-p-100">
        <div class="newsletterwrapper w-p-73 display-flex  p-50-0 m-a" >
            <div class="newsletter-info col-6 col-s-7">
                <h2 class="f-s-26 " style="color: #1c1c2498;">NewsLetter & Get Updates</h2>
                <p class="color_fade p-t-20 f-s-14">Sign up for our newsletter to get up-to-date from us</p>
            </div>
            <div class="newsletter-form col-6 col-s-7">
                <form  method="post" id="newsletterForm">
                    <div class="n-form display-flex" >
                        <input  class="outline-none b-r-5 p-12-25 b-one b-right " type="text" required style="flex: 1" id="newsletteremail" placeholder="Enter Your Mail Here ...">
                        <button id="newsletterbtn" type="submit" name="sub" class="input b-t-r-r-30 b-b-r-r-30 b-left overlap-left--10 c-p p-12-12 b-one bg-button-1 f-s-16 c-white f-w-700"  style="flex: 1">Subscribe</button>
                    </div>
                </form>
                <div class="subscribe-div f-s-15 f-w-500 text-right">
                    <div id="msgDiv" class="p-t-10">

                    </div>
                </div>

            </div>

            <style>
                .success-txt{
                    /* color: rgb(60,165,37); */
                    color: rgb(39,188,66);
                }

            </style>
        </div>
    </div>
</div>

<footer>
    <div class="footer-wrapper bg_update p-b-40 p-t-30">
        <hr class="m-t-20 w-p-90  m-a m-b-29">
        <div class="footer-inner-wrapper ">
            <div class="footer-content">
                <div class="upper-footer display-flex">
                    <div class="col-3 col-m-5 col-s-6">
                        <div class="footer-box">
                            <div class="inner-box">
                                <div class="footer-title">
                                    <h1>uwriters</h1>
                                </div>
                                <div class="footer-logo-desc">
                                    <p class="color_fade f-s-16">

                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut voluptatem iste minus corporis veniam consectetur officiis, sequi, voluptate expedita autem magnam illo minima.
                                    </p>

                                </div>
                                <div class="location">
                                    <div class="p-t-20 display-flex">
                                        <img class="w-60 h-60 b- m-b-10 dn" src="/storage/admin/<?php use User\Uwriters\app\model\Dash;

                                        echo Dash::profile()['img']; ?>" alt="">
                                        <p class=" f-s-16">author
                                            <strong>
                                                <?php echo Dash::profile()['firstname']." ". Dash::profile()['secondname']; ?> :
                                            </strong>
                                            <?php echo " " .Dash::profile()['bio']?></p>
                                    </div>
                                </div>
                                <div class="view_on_map">
                                    <div class="m-t-35">
                                        <a href="/contact"><button class="bg_red b-n p-17-32 b-r-4 f-s-13 c-white">Contact me</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-2 col-m-3 col-s-5">
                        <div class="footer-box">
                            <div class="inner-box">
                                <div class="footer-title">
                                    <h2  class="p-l-10 f-s-18 c_black_1">Quick links</h2>
                                </div>
                                <ul class="ul color_fade f-s-15">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="/#about">About</a></li>
                                    <li><a href="/blogs">Blog</a></li>
                                    <li><a href="/contact">Contact</a></li>
                                    <li><a href="/login">Login</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-2 col-m-3 col-s-5">
                        <div class="footer-box">
                            <div class="inner-box">
                                <div class=" footer-title">
                                    <h2  class="p-l-10 f-s-18">Recent blogs</h2>
                                </div>
                                <ul class="ul color_fade f-s-15">
                                    <?php
                                    Dash::lastFive();
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 p-t-10 box col-m-6 ">
                        <div class="footer-box">
                            <div class="p-1-20">
                                <div class="title">
                                    <h2 class="f-s-18">Subscribe</h2>
                                </div>
                                <div class="footer-logo-desc">
                                    <div class="p-t-10">
                                        <p class="f-s-16">Don’t miss to subscribe to our new feeds, kindly fill the form above.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lower-footer-div w-p-100 bg_update_1">
        <div class="lower-footer">
            <div class="lower-inner-wrapper  p-20-0 m-t-20">
                <div class="col-6 ">
                    <p class="color_fade f-s-14">&copy; &nbsp; <span id="currentYear"></span>&nbsp; Copyrights By uwriters - <?php echo  date('Y');?></p>
                </div>
                <div class="col-6">
                    <p class="p-l-30 f-s-16">Made with ❤️ by <a href="http://johnwaithira.unaux.com/" class="f-w-800" style="color: rgb(0, 133,221) !important;">John Waithira</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="/js/app.js"></script>
<script src="/js/jQuery.js"></script>
<script>
    $(document).ready(()=>{
        $("#newsletterForm").on("submit",(e)=>{
            e.preventDefault()
        })
        $("#newsletterbtn").click(()=>{
            if($("#newsletteremail").val() !="")
            {
                $.ajax({
                    url : "/sub/newsletter",
                    type : "post",
                    data : {
                        email : $("#newsletteremail").val()
                    },
                    success : ((res)=>{
                        $("#msgDiv").html(res)
                        setTimeout(()=>{
                            $("#msgDiv").html('')
                            $("#newsletteremail").val('')
                        }, 3000)
                    })
                })
            }
            else
            {
                $("#msgDiv").html("Field cannot be empty")
            }

        })
    })
</script>
</body>
</html>
