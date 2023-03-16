<?php

use User\Uwriters\app\model\Dash;

Dash::checkV();
?>
<header>
    <nav>
        <div class="wrapper">
            <input  type="checkbox" name="checkNavBar"  id="checkNavBar">
            <a href="/"><h1 class="f-s-36 color_fade">
                    Uwriters
                </h1>  </a>
            <div class="nav-items">
                <div class="links">
                    <li class="nav-links"><a id="a" href="/">Home</a></li>
                    <li class="nav-links"><a id="a" href="/services">Services</a></li>
                    <li class="nav-links"><a id="a" href="/portfolio">Portfolio</a></li>
                    <li class="nav-links"><a id="a" href="/blogs">Blogs</a></li>
                </div>
                <div class="link-btns">
                    <a href="#newsletter" ><button class="bg-inherit">NewsLetter</button></a>
                    <a href="/contact"><button class="bg-inherit">Contact Us</button></a>
                </div>
            </div>
            <label id="humberger" for="checkNavBar">
                <div class="menu"></div>
                <div class="menu mid"></div>
                <div class="menu"></div>
            </label>
        </div>
    </nav>
    <hr style="border: 1px solid #f8f8f8">
</header>

<style>
    @media (max-width:880px) {
        .f-s-70{
            font-size: 40px;
        }
        .ha{
            height: auto;
        }

    }
    @media (min-width:992px){

        .page:hover .pages-dropdown{
            display: block  !important;
        }
        .pages-dropdown{
            position: absolute !important;

            padding-top: 10px;
            margin-top: 2px;
            /* display: inline; */
            margin-left: -10px;
            display: none;
            width: 200px;
            background: #fff;

        }

    }

    .landing{
        background-size: cover;
        background-image: linear-gradient(rgba(56, 53, 53, 0.39), rgba(73, 70, 70, 0.7)), url(storage/landing/<?php echo Dash::bg()['imagename'];?>);
        background-position: center;
    }
    .intro{
        display: flex;
        height: 100%;
        align-items: center;
    }
    .b-two{
        border: 3px solid #777777;
    }
    .c3{
        color: #fefefe98;
    }
    .h-100vh{
        min-height: 100vh;
    }
    .h-50vh{
        min-height: 50vh;
    }
    .h-80vh{
        min-height: 80vh;
    }
    .h-90vh{
        min-height: 90vh;
    }
    img{
        height: inherit;
    }
    .b-cover{
        background-position: center;
    }
    .me{
        display: flex;
        align-items: center;
        height: 100%;
    }
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
    @media (max-width: 990px) {
        .ha{
            height: auto;
        }
    }
</style>