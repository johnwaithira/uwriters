<?php
use User\Uwriters\app\Http\Format\Str\Asterisk;
use User\Uwriters\app\Http\Security\Auth\Session;
use User\Uwriters\app\model\Dash;

?>
<div class="nav w-p-100 ">
    <div class="header  m-b-0  p-20-0">
        <div class="logo ">
            <h2 class="">U-Writers</h2>
        </div>
        <div class="nav-link">
            <li class="p-0-10"><a target="_blank" href="/">View Website</a></li>
            <li class="p-0-10 color-update">
                <a href="/settings" title="<?php
                echo Session::get('loggedin')?>">
                    <?php

                    echo Asterisk::make(Session::get('loggedin'), 4)?>
                </a>
            </li>
            <li class="p-0-10"><a href="/logout">Logout</a></li>
        </div>
        <div class="profile">
            <img class="w-40 b-r-50 h-40" src="/storage/admin/<?php echo Dash::profile()['img']?>" alt="">
        </div>

        <div class="nav-hum d-n">
            <div class="p-l-0">
                <div class="menu"></div>
                <div class="menu mid"></div>
                <div class="menu"></div>
            </div>
        </div>
    </div>
</div>

<label for="checkMe" class="d-n" id="checkMeLabel">
    <div class="p-l-20">
        <div class="menu"></div>
        <div class="menu mid"></div>
        <div class="menu"></div>
    </div>
</label>