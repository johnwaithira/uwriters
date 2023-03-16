<?php

namespace User\Uwriters\app\controller;

use User\Uwriters\app\core\Application;
use User\Uwriters\app\core\Controller;
use User\Uwriters\app\core\Request;
use User\Uwriters\app\Http\Security\Auth\Session;
use User\Uwriters\app\model\Admin;
use User\Uwriters\app\model\Auth;
use User\Uwriters\app\model\Dash;
use User\Uwriters\app\model\FileUpload;
use User\Uwriters\app\model\PostUpload;
use User\Uwriters\app\core\Response;
use User\Uwriters\database\Database;


class Dashboard extends Controller
{
    public function admin()
    {
        if(!Session::get('loggedin'))
        {
            return $this->redirect('login');
        }
        return $this->view('dashboard');
    }

    public function db()
    {
        $db = new Admin(Application::$app->db);
        $db->db_backup();
    }
    public function port()
    {
        if(!Session::get('loggedin'))
        {
            return $this->redirect('login');
        }


        return $this->view('portfolio');
    }
    public function profile()
    {
        if(!Session::get('loggedin'))
        {
            return $this->redirect('login');
        }
        //$admin = new Admin(Application::$app->db);

        return $this->view('profile');
    }

    public function message()
    {
        if(!Session::get('loggedin'))
        {
            return $this->redirect('login');
        }
        return $this->view('message');
    }

    public function reply()
    {
        if(!Session::get('loggedin'))
        {
            return $this->redirect('login');
        }
        return $this->view('reply');
    }

    public function new()
    {
        if(!Session::get('loggedin'))
        {
            return $this->redirect('login');
        }
        return $this->view('post');
    }

    public function post(Request $request)
    {
        $message = "";
        $admin = new Admin(Application::$app->db);
        if($admin->post($request->inputs(), $request->files()))
        {
            $message = "Posted successfully";
        }
        else
        {
            $message = "<p style='color: red'>Failed to post the blog. Please try again</p>";
        }
        Session::set("success", $message);
        return $this->redirect("post");
    }

    public function viewpost()
    {
        if(!Session::get('loggedin'))
        {
            return $this->redirect('login');
        }
        return $this->view('view');
    }

    public function upd_profile(Request $request)
    {
        $admin = new Admin(Application::$app->db);
        $msg = $admin->updt($request->inputs(), $request->files());
        return $this->view("profile", ['msg'=>$msg]);

    }
    public function pot(Request $request)
    {
        $admin = new Admin(Application::$app->db);
        $msg = $admin->pot($request->inputs(), $request->files());
        return $this->view('portfolio',['msg'=>$msg]);


    }
    public function upload(Request $request)
    {
        if(!Session::get('loggedin'))
        {
            return $this->redirect('login');
        }
        return $this->view('upload');


    }

    public function landing(Request $request)
    {
        $admin = new Admin(Application::$app->db);
        $msg = $admin->landing( $request->files());
        Session::set('success', $msg);
        return $this->redirect('settings');
    }

    public function img(Request $request)
    {
        $admin = new Admin(Application::$app->db);
        $msg = $admin->img( $request->files());
        Session::set('success', $msg);
        return $this->redirect('upload');
    }
    public function abt(Request $request)
    {
        $admin = new Admin(Application::$app->db);
        $msg = $admin->abt( $request->files());
        Session::set('success', $msg);
        return $this->redirect('settings');
    }
    public function settings()
    {
        if(!Session::get('loggedin'))
        {
            return $this->redirect('login');
        }
        return $this->view('settings');

    }

    public function login(Request $request)
    {
        $user = new Auth(Application::$app->db);
        if($user->login($request->inputs()))
        {
            echo  "ok";
        }
        else
        {
            echo "<p style='color: red' class='f-s-17'>Wrong credentials</p>";
        }
    }

    public function unreadmsg()
    {
        if(Session::get('loggedin'))
        {
            echo Dash::UnreadMessages();
        }
        else{
            //$response->setResposeCode(403);
            echo "Forbiden request";
        }
    }

    public function contact(Request $request)
    {
        $contact = new Auth(Application::$app->db);
        echo $contact->contact($request->inputs());
    }
    public function optout()
    {
        Session::flush();
        return $this->redirect('login');
    }
}