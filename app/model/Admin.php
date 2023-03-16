<?php

namespace User\Uwriters\app\model;


use Dotenv\Parser\Parser;
use User\Uwriters\app\core\Application;
use User\Uwriters\app\Http\Format\Generator\Rand;
use User\Uwriters\app\Http\Format\Str\Ellipsis;
use User\Uwriters\app\Http\Format\Str\Slug;
use User\Uwriters\app\Http\Format\Time;
use User\Uwriters\app\Http\Security\Hash;
use User\Uwriters\database\Database;
class Admin
{
    public Database $database;
    public function __construct(Database $database)
    {
        $this->database = $database;

    }

    public function db_backup()
    {
  $tables = array();

        $db =$this->database->pdo;
        $tablesqry =$db->prepare('SHOW TABLES');
        $tablesqry->execute([]);

        foreach ($tablesqry->fetchAll() as $t)
        {
            foreach ($t as $key=>$value)
            {
                $qry = $db->prepare("SHOW CREATE TABLE $value");
                $result = $qry->execute([]);

                var_dump($result);

                $q = $db->prepare("SELECT * FROM ?");
                $q->execute(['about']);

                var_dump($q->fetchAll());

            }
        }


}


    /**
     * @return int
     */
    public function GetUnreadMessages()
    {
        $db = $this->database->pdo;
        $qry = $db->prepare(
            "SELECT * FROM messages where status = 0"
        );
        $qry->execute([]);
        return $qry->rowCount();
    }

    public function Profile()
    {
        $db = $this->database->pdo;
        $qry = $db->prepare(
            "SELECT * FROM profile where id = ?"
        );

        $qry->execute([1]);

        return $qry->fetch();

    }
    public function AllMessages()
    {
        $data = $this->database->pdo->prepare("SELECT * FROM messages order by id desc");
        $data->execute([]);
        date_default_timezone_set("Africa/Nairobi");

        if($data->rowCount() < 1)
        {
            return '<p class="f-s-20 f-w-900 p-b-10">No message in the inbox</p>';
        }
        else
        {
            $msg = $data->fetchAll();

            foreach($msg as $key => $value)
            {
                echo sprintf('
                    <a href="/reply?id=%s">
                        <div class="message p-20-0 b-b m-w-700 display-flex align-center w-p-100">
                            <div class="img col-2 ">
                                <div class="m-r-20">
                                    <img src="/storage/upload-c83687202203041202543574-uwriters-img.jpg" class="m-x-60 w-60 float-right r-20 h-60 b-r-50">
                                </div>
                            </div>
                            <div class="details col-8">
                                <div class="msg">
                                    <p class="f-s-20 f-w-900 p-b-10">%s<span class="%s" style="float: right; background: red"></span></p>
                                    <p class="color-update">%s</p>
                    
                                </div>
                            </div>
                            <div class="date col-2">
                                <p class="color-update">%s</p>
                            </div>
                        </div>
                    </a>
                    ', $msg[$key]['msgid'],
                    Hash::decrypt($msg[$key]['name']),
                    ($msg[$key]['status'] == 0) ? ' m-l-10 b-r-50 h-10 w-10 green' : '' ,
                    Ellipsis::trim(Hash::decrypt($msg[$key]['message']),55),
                    Time::timeDifference($msg[$key]['timestamp'])
                );
            }

        }
    }

    public function message($id)
    {
        $msg = $this->database->pdo->prepare("SELECT * FROM messages where msgid = ?");
        $msg->execute([$id]);
        if($msg->rowCount() > 0)
        {
            $update_status = $this->database->pdo->prepare("UPDATE messages set status = ? where msgid = ?");
            $update_status->execute([1, $id]);
            $reply = $msg->fetch();

            echo sprintf('
                <div>
                    <a href="/message"><button class="p-10-20 b-one bg-inherit m-b-10">Back</button></a>
                    <div>
                        <div class="box-shadow2 p-20-10">
                            <div style="display: flex; justify-content: space-between;flex-wrap:wrap ">
                                <div class="col-6">
                                    <div class="p-l-10">
                                        <h2>Message : <span class="f-s-14 f-w-200">%s</span></h2>
                                         <p>%s</p>
                                    </div>
                                </div>
                                <div class="col-6" style="text-align: right">
                                    <div class="p-t-10">
                                        <h5>Reply to : </h5>
                                        <p>%s</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ',$reply['timestamp']
                ,Hash::decrypt($reply['message']),
                Hash::decrypt($reply['email'])
            );
        }
        else{
            echo "<h1>Error (^ ^)!</h1>";
        }
    }

    public function post(array $inputs, array $files)
    {
        $db =  $this->database->pdo;
        $img = new PostUpload();
        $img->filename("blogImage");
        $image = $img->make($files);
        $qry = $db->prepare("INSERT INTO posts(uniqueid, title, img, description, body) VALUES (?,?,?,?,?)");

        if($qry->execute([
            Rand::make(12),
            $inputs['blogTitle'],
            $image,
            $inputs['blogDescription'],
            $inputs['postbody']

        ]))
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function ViewPosts()
    {
        $msg = $this->database->pdo->prepare("SELECT * FROM posts order by id desc");
        $msg->execute([]);
        if($msg->rowCount() > 0)
        {

            $post = $msg->fetchAll();

            foreach ($post as $key => $value)
            {
                echo sprintf('
                        <div class="p-20-10   b-left b-right display-flex hover-grey">
                           <div class="col-4 col-m-4 ">
                               <img class="" style="max-height: 180px" src="/posts/%s" alt="%s">
                           </div>
                           <div class="col-8 col-m-8  align-center">
                               <div class="p-10-10">
                                   <h3>%s</h3>
                                   <p class="p-10-0 color-update">%s</p>
                               </div>
                               <div class="buttons p-0-10">
                                   <a target="_blank" href="/blog/post?id=%s"><button class="f-s-16 p-10-20 b-one bg-inherit ">View</button></a>
                                   <!-- <button class="f-s-16 p-2-20 bg-inherit b-r-15 m-l-20">Edit</button> -->
                               </div>
                               <span class="float-right f-s-16 f-w-200 p-r-10">posted</span>
                   
                           </div>
                       </div>
                    
                    ',$post[$key]['img'],
                    $post[$key]['title'],
                    $post[$key]['title'],
                    Ellipsis::trim($post[$key]['description'],70),
                    $post[$key]['uniqueid']

                );
            }
        }
        else{
            echo '<p class="p-10-20">Empty. no blog is published yet<br></p><a class="p-10 b-one m-25-20" href="/post">Create a post now</a>';
        }
    }

    public function MyRandomNumber($data)
    {
        $c = [];
        do
        {
            $rand = array_rand($data);
            if(!in_array($rand,$c))
            {
                array_push($c, $rand);
            }
            else
            {
                $rand = array_rand($data);
                if(!in_array($rand,$c))
                {
                    array_push($c, $rand);
                }
            }
        }while(sizeof($c) < 4);

        return $c;
    }
    public function GetPost($id)
    {
        $post = $this->database->pdo->prepare("SELECT * FROM posts where uniqueid = ?");
        $post->execute([$id]);
        if($post->rowCount() > 0)
        {

            $post = $post->fetch();
            $c = '';
            foreach (
                $this
                    ->MyRandomNumber(
                        $this
                            ->GetRandPost(
                                $id
                            )
                    ) as $key)
            {

                $c.=sprintf(
                    '
                                    <a href="/blog/post?id=%s">
                                        <div class="col-3 hover col-sm-4">
                                           <div class="blog-wrapper p-31">
                                              <div class="related-blog-picture">
                                                 <img style="box-shadow: none;" class="p-0 h-156 custom" src="/posts/%s" >
                                              </div>
                                              <div style="padding: 18px 5px 0 7px;" class="related-blog-title ">
                                                  <p style="color: #6f4bff">%s</p></a>
                                              </div>
                                           </div>
                                        </div>
                                    </a>
                    ',
                    $this->GetRandPost($id)[$key]['uniqueid'],
                    $this->GetRandPost($id)[$key]['img'],
                    Ellipsis::trim($this->GetRandPost($id)[$key]['title'], 40)
                );
            }
            echo sprintf('
                        <title>%s</title>
                        <div class="myblog" >
                            <div class="col-11 m-a ">
                                <div class=" p-20-15 blog-div">
                                    <div class="article display-flex">
                                        <div class="col-6 m-a col-sm-9">
                                            <div class="article-wrapper">
                                                <h1>%s</h1>
                                                <p class="p-t-20">%s</p>
                                            </div>
                                        </div>
                                        <div class="col-6 m-a col-sm-9">
                                            <div class="article-wrapper ">
                                                <img class="d-f a-i-c" src="/posts/%s" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div class="col-8 m-a col-sm-10 col-m-10">
                                    %s
                                </div>
                            </div>
                        </div>
                        <div class="blog-footer  ">
                            <div class="d-f">
                                <div class="upper-blog-footer col-6 m-a">
                                    <div class="author">
                                        <div class="m-10-15 col-9">
                                            <div class="box-shadow1 m-10-15 p-10-0" style="display: flex; flex-wrap: wrap">
                                                <div class="auth display-flex a-i-c col-3">
                                                    <img style="box-shadow:none; width: 80px!important;" class=" p-10 b-r-50 w-80 h-80" src="/storage/admin/%s" alt="Author">
                                                </div>
                                                <div class="about-auth  col-9">
                                                    <h3 class="p-10-3 p-10">%s %s</h2>
                                                    <p class="f-s-17 p-10">%s</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-a">
                                    <div class="p-15">
                                        <div>
                                            <p class="f-w-200 f-s-20">Share this article : </p>
                                            <div>
                                                <a href="https://facebook.com/share/">
                                                    <img class="w-40 m-10" style="max-width: 40px !important; height: 40px !important;" src="/storage/fb.png">
                                                </a>
                                                  <a href="https://facebook.com/share/">
                                                    <img class="w-40 m-10" style="max-width: 40px !important; height: 40px !important;" src="/storage/unnamed.png">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="related-posts">
                                <h2 class="text-center">Interesting articles</h2>
                                <div class="wrapper">
                                    <div class="inner-wrapper p-t-20 w-p-87 d-f m-a">
                                        %s
                                    </div>
                                </div>
                            </div>
                         </div>
                 ',
                $post['title'],
                $post['title'],
                $post['description'],
                $post['img'],
                html_entity_decode($post['body']),
                $this->Profile()['img'],
                $this->Profile()['firstname'],
                $this->Profile()['secondname'],
                $this->Profile()['bio'],
                $c

            );
        }
        else{
            echo '<p class="p-10-20">Error in loading the blog.. Please contact us to resolve the problem!</a>';
        }

    }

    public function GetRandPost($id)
    {
        $post = $this->database->pdo->prepare("SELECT * FROM posts where uniqueid != ?");
        $post->execute([$id]);
        return $post->fetchAll();
    }
    public function GetIdPost($id)
    {
        $post = $this->database->pdo->prepare("SELECT * FROM posts where id != ?");
        $post->execute([$id]);
        return $post->fetchAll();
    }

    public function Blog()
    {
        $post = $this->database->pdo->prepare("SELECT * FROM posts WHERE id = (SELECT max(id) FROM posts)");
        $post->execute([]);
//
        $data = $post->fetch();
        $c = "";

        foreach ($this->GetIdPost($data['id']) as $key => $value)
        {

            $c.=sprintf('
                                    <a href="/blog/post?id=%s">
                                        <a href="/blog/post?id=%s">
                                            <div class="col-3 hover-grey col-sm-4">
                                               <div class="blog-wrapper p-31">
                                                  <div class="related-blog-picture">
                                                     <img style="box-shadow: none;" class="p-0 h-156 custom" src="/posts/%s" >
                                                  </div>
                                                  <div style="padding: 18px 5px 0 7px;" class="related-blog-title ">
                                                      <h2 class="f-s-18 f-w-200" style="color: #6f4bff">%s</h2></a>
                                                  </div>
                                                  <div>
                                                    <div>
                                                        <div class="p-10">
                                                            <p>%s</p>
                                                        </div>
                                                    </div>
                                                  </div>
                                               </div>
                                            </div>
                                        </a>
                                    </a>

                ',
                $this->GetIdPost($data['id'])[$key]['uniqueid'],
                $this->GetIdPost($data['id'])[$key]['uniqueid'],
                $this->GetIdPost($data['id'])[$key]['img'],
                Ellipsis::trim($this->GetIdPost($data['id'])[$key]['title'], 50)
                ,Ellipsis::trim($this->GetIdPost($data['id'])[$key]['description'], 50)
            );
        }
        echo sprintf('
                <div class="">
                    <div class="col-12 box-shadow2" style="border-bottom: none;">
                        <div class="col-11 m-a ">
                            <div class="display-flex reverse-column bg-fae2">
                                <div class="col-7 col-m-5">
                                    <div class="myIMGblog p-30 pm-30">
                                        <div stl class="p-a" style="top:0; z-index:-1;">
                                            <small class="box-shadow p-5-20 f-w-100" style="color:var(--sixteen); background: var(--ten)">Recent</small>
                                        </div>
                                        <img  class="mwblog ha h-350" src="/posts/%s" alt="%s">
                                    </div>
                                </div>
                                <div class="col-5 col-m-6 d-f a-i-c display-flex">
                                   <div class="m-20 p-20-10">
                                    <div class="date p-20-0 pm-20-0">
                                        <p>%s</p>
                                    </div>
                                    <div class="p-20-0 pm-20-0">
                                        <a href="/blog/post?id=%s&&title=%s">
                                            <h1 class="myT titleOfBlog " style="color: var(--four);">
                                              %s               </h1>
                                        </a>
                                    </div>
                                    <div class="description">
                                        <p class="f-s-17">%s<p>
                                    </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                     <div class="related-post">
                         <div class="wraper">
                             <div class="inner-wrapper p-t-20 w-p-87 d-f m-a">
                                      %s
                             </div>
                         </div>
                    </div>
            ',
            $data['img'],
            $data['title'],
            $data['timestamp'],

            $data['uniqueid'],
            Slug::make($data['title']),
            $data['title'],
            Ellipsis::trim($data['description'], 200),
            $c
        );
    }

    public function sub($inputs)
    {
        $db = $this->database->pdo;
        $qry = $db->prepare("SELECT * FROM newsletters where email = ?");
        $qry->execute([$inputs['email']]);
        if($qry->rowCount()>0)
        {
            echo  "<p style='color: red'>Email is already subscribed</p>";
        }
        else
        {
            $news = $db->prepare("INSERT INTO newsletters(email) VALUES (?)");
            if($news->execute([$inputs['email']]))
            {
                echo "<p style='color: green'>Subscribed successfully</p>";
            }
            else
            {
                echo  "<p style='color: red'>Failed to subscribed</p>";
            }
        }
    }

    public function FiveBlog()
    {
        $db = $this->database->pdo;
        $qry = $db->prepare('SELECT * FROM posts order by id desc limit 5');
        $qry->execute([]);
        if($qry->rowCount() < 1)
        {
            echo "Zero blogs ";
        }
        else
        {
            $blog = $qry->fetchAll();
            //var_dump($blog);
            foreach ($blog as $key => $val)
            {
                echo sprintf('
                    <li><a href="/blog/post?id=%s">%s</a></li>
                    ',$blog[$key]['uniqueid'],
                    Ellipsis::trim( $blog[$key]['title'], 50)
                );
            }
        }
    }

    public function EightBlog()
    {
        $db = $this->database->pdo;
        $qry = $db->prepare('SELECT * FROM posts order by id desc limit 8');
        $qry->execute([]);
        if($qry->rowCount() < 1)
        {
            echo "No blog is posted";
        }
        else
        {
            $blog = $qry->fetchAll();
            //var_dump($blog);
            echo "
                    <div class='related-posts'>
                        <div class='w-p-90 m-a'>
                            <h1 style='color: grey' class='p-10-35 f-w-100'>BLogs</h1>
                            <div class='display-flex'>
                    ";
            foreach ($blog as $key => $val)
            {
                echo sprintf('
                                    <a href="/blog/post?id=%s">
                                        <a href="/blog/post?id=%s">
                                            <div class="col-3 hover col-sm-4">
                                               <div class="blog-wrapper p-31">
                                                  <div class="related-blog-picture">
                                                     <img style="box-shadow: none;" class="p-0 h-156 custom" src="/posts/%s" >
                                                  </div>
                                                  <div style="padding: 18px 5px 0 7px;" class="related-blog-title ">
                                                      <h2 class="f-s-18 f-w-200" style="color: #6f4bff">%s</h2></a>
                                                  </div>
                                                  <div>
                                                    <div>
                                                        <div class="p-10">
                                                            <p>%s</p>
                                                        </div>
                                                    </div>
                                                  </div>
                                               </div>
                                            </div>
                                        </a>
                                    </a>
                    ',$blog[$key]['uniqueid'],
                    $blog[$key]['uniqueid'],
                    $blog[$key]['img'],
                    Ellipsis::trim($blog[$key]['title'], 40),
                    Ellipsis::trim($blog[$key]['description'], 70)

                );
            }
            echo "    </div>
                            <div class='text-center p-10-0'>
                                 <a href='/blogs' class=' p-b-10'>
                                 <button class='text-center b-one p-10-20 bg-inherit'>Load more ...</button></a>
                            </div>
                        </div>
                    </div>";

        }
    }

    public function updt(array $inputs, array $files)
    {
        $db = $this->database->pdo;
        $upload = new FileUpload();
        $upload->filename("profileimg");
        $upload->path("public/storage/admin");

        if(!empty($files['profileimg']['name'])) {
            $img = $upload->make($files);

            $qry = $db->prepare("UPDATE profile set firstname = ?, secondname=? , email = ?, bio = ?, img = ?");
            if($qry->execute([$inputs['name'], $inputs['sname'], $inputs['email'], $inputs['bio'], $img]))
            {
                return "Updated";
            }
            else
            {
                return  "Failed";
            }
        }
        else{
            if($this->data($inputs))
            {
                return "Updated";
            }
        }

    }

    public function data($params)
    {
        $db = $this->database->pdo;
        $qry = $db->prepare("UPDATE profile set firstname = ?, secondname=? , email = ?, bio = ?");
        if($qry->execute([$params['name'], $params['sname'], $params['email'], $params['bio']]))
        {
            return true;
        }
        else
        {
            return  false;
        }
    }

    public function pot(array $inputs, array $files)
    {
        $db = $this->database->pdo;
        $upload = new FileUpload();
        $upload->filename("img");
        $upload->path("public/posts");

        $img = $upload->make($files);
        $qry = $db->prepare("INSERT INTO portfolio(	img,title,link) VALUES (?,?,?)");
        if($qry->execute([$img, $inputs['title'], $inputs['link']]))
        {
            return "Success";
        }
        else
        {
            return "Failed";
        }
    }

    public function Portfolio()
    {
        $db = $this->database->pdo;
        $qry = $db->prepare("SELECT * FROM portfolio order by id desc");
        $qry->execute([]);
        if($qry->rowCount() < 1)
        {
            echo  "Not posted yet";
        }
        else
        {
            $data = $qry->fetchAll();
            echo sprintf('
                    <div class="service-section p-b-60">
                       <div class="w-p-80 m-a">
                            <div class="p-t-40 p-l-30">
                                <h1 class="f-s-40 color_fade">My portfolio</h1>
                            </div>
                ');
            foreach ($data as $key => $val)
            {
                echo sprintf('
                        <div class="stats display-flex p-20">
                            <div class="p-20-10   b-left b-right display-flex">
                                <div class="col-4 col-m-4 ">
                                    <img class="" src="/posts/%s" alt="">
                                </div>
                                <div class="col-8 col-m-8  align-center">
                                    <div class="p-10-10">
                                        <h3 class="f-w-100">%s</h3>
                                    </div>
                                    <div class="buttons p-0-10">
                                        <a href="%s" target="_blank"><button class="f-s-16 p-2-20 bg-inherit b-r-15">View</button></a>
                                    </div>
                        
                                </div>
                            </div>
                        </div>
                    
                    ',
                    $data[$key]['img'],
                    $data[$key]['title'],
                    $data[$key]['link']);
            }
            echo '</div></div>';
        }
    }

    public function bg()
    {
        $db = $this->database->pdo;
        $arg = $db->prepare("SELECT * FROM landing");
        $arg->execute([]);
        return $arg->fetch();
    }
    public function landing(array $files)
    {
        $db = $this->database->pdo;
        $upd = new FileUpload();
        $upd->filename("uploadlanding");
        $upd->path("public/storage/landing");
        $img = $upd->make($files);

        $qry = $db->prepare("UPDATE landing set imagename = ? where id = ?");
        if($qry->execute([$img, 1]))
        {
            return "Updated";
        }
        else{
            return "Failed";
        }
    }

    public function abt(array $files)
    {
        $db = $this->database->pdo;
        $upd = new FileUpload();
        $upd->filename("uploadabout");
        $upd->path("public/storage/about");
        $img = $upd->make($files);

        $qry = $db->prepare("UPDATE about set imagename = ? where id = ?");
        if($qry->execute([$img, 1]))
        {
            return "Updated";
        }
        else{
            return "Failed";
        }
    }

    public function about()
    {
        $db = $this->database->pdo;
        $arg = $db->prepare("SELECT * FROM about");
        $arg->execute([]);
        return $arg->fetch()['imagename'];
    }

    public function img(array $files)
    {
        $db = $this->database->pdo;
        $upd = new FileUpload();
        $upd->filename("upload");
        $upd->path("public/storage/");
        $img = $upd->make($files);

        $qry = $db->prepare("INSERT INTO uploads(imagename) VALUES (?)");
        if($qry->execute([$img]))
        {
            return "Updated";
        }
        else{
            return "Failed";
        }
    }

    public function imgs()
    {
        $db = $this->database->pdo;
        $qry =$db->prepare("SElECT * FROM uploads order by id desc ");
        $qry->execute([]);
        if($qry->rowCount() < 1)
        {
            echo "Zero images uploaded";
        }
        else
        {
            $imgs = $qry->fetchAll();
            foreach ($imgs as $k => $v)
            {
                echo sprintf('
                                <div class="w-p-90 display-flex m-a">
                                    <div class="thumbnail col-8">
                                        <img class="max-h-500 box-shadow" src="/storage/%s" alt="">
                                    </div>
                                    <div class="copybtn m-t-10 align-center">
                                        <input type="text " name="" id="imageurl" value="%s/storage/%s">
                                        <button class="copyurl p-10-20 b-one m-t-5 m-b-19">Copy</button>
                                    </div>
                                </div>
                    ', $imgs[$k]['imagename'],
                    $_ENV['APP_URL'],$imgs[$k]['imagename']
                );
            }
        }
    }
}