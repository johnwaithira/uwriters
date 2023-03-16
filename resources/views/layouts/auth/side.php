<?php

use User\Uwriters\app\model\Dash;
?>

<div class="navs col-2 col-m-3" style="transition: 0.5s ease-in-out">
    <div class="panel m-b-20">
        <div class="side-bar">
            <div class="side-bar-ul box-shadow m-r-10 b-white p-l-20 p-b-40 p-t-20 b-r-15">
                <li class="p-10-0 b-r-5 f-w-800  m-2-0"><a href="/admin">Stats</a></li>
                <li class="p-10-0 b-r-5 f-w-800  m-2-0"><a href="/post">New Post</a></li>
                <li class="p-10-0 b-r-5 f-w-800  m-2-0"><a href="/view">View Post</a></li>
                <li class="p-10-0 b-r-5 f-w-800  m-2-0"><a href="/profile">Profile</a></li>
                <li class="p-10-0 b-r-5 f-w-800  m-2-0"><a href="/admin/portfolio">Portfolio</a></li>
                <!-- <li class="p-10-0 b-r-5 f-w-800  m-2-0"><a href="./comments.php">Comments
                    <span class="rounded float-right m-r-20 c-white p-0-4 b-r-35"></span></a>
                </li> -->
                <li class="p-10-0 b-r-5 f-w-800  m-2-0">
                    <a href="/message">Messages
                        <span class="rounded float-right m-r-20 c-white p-0-4 b-r-35" id="nnum">
                                <?php Dash::UnreadMessages();?>
                        </span>
                    </a>
                </li>
                <li class="p-10-0 b-r-5 f-w-800  m-2-0"><a href="/upload">Upload Imgs</a></li>
                <li class="p-10-0 b-r-5 f-w-800  m-2-0"><a href="/logout">Logout</a></li>
            </div>
            <p class="b-l f-s-13 color-update position-fixed" style="position: fixed;" >Admin  v1.0.0.22</p>
        </div>
    </div>
</div>
<script>
    setInterval(() => {
        count();
    }, 4000);

    function count(){
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/unreadmsg/get', true);
        xhr.onload =()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let res = xhr.response;
                    document.querySelector("#nnum").innerHTML = res;
                }
            }
        }
        xhr.send();
    }
</script>