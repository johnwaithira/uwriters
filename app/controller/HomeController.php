<?php

namespace User\Uwriters\app\controller;

use User\Uwriters\app\core\Application;
use User\Uwriters\app\core\Controller;
use User\Uwriters\app\core\Request;
use User\Uwriters\app\model\Admin;

class HomeController extends Controller
{
    public function landing()
    {
        return $this->view('home');
    }
    public function contact()
    {
        return $this->view('contact');
    }

    public function portfolio()
    {
        return $this->view('portfolio_client');

    }
    public function services()
    {
        return $this->view('services');
    }
    public function blogs()
    {
        return $this->view('blogs');
    }
    public function blog()
    {
        return $this->view('blog');
    }
    public function login()
    {
        return $this->view('admin_login');
    }

    public function newsletter_sub(Request $request)
    {
        $admin = new Admin(Application::$app->db);
        $admin->sub($request->inputs());
    }
}