<?php

namespace User\Uwriters\app\model;

use User\Uwriters\app\core\Application;
use User\Uwriters\app\Http\Format\Time;

class Dash
{
    /**
     * @return void
     */
    public static function UnreadMessages()
    {
        $admin = new Admin(Application::$app->db);
        echo $admin->GetUnreadMessages();
    }

    public static function AllMessages()
    {
        $msg = new Admin(Application::$app->db);
        echo $msg->AllMessages();
    }

    public static function replymsg($id)
    {
        $msg = new Admin(Application::$app->db);
        echo $msg->message($id);
    }

    public static function view()
    {
        $admin = new Admin(Application::$app->db);
        echo $admin->ViewPosts();
    }
    public static function profile()
    {
        $admin = new Admin(Application::$app->db);
        return $admin->Profile();

    }

    public static function post($id)
    {
        $admin = new Admin(Application::$app->db);
        return $admin->GetPost($id);
    }

    public static function blogs()
    {
        $admin = new Admin(Application::$app->db);
        return $admin->Blog();
    }

    public static function lastFive()
    {
        $admin = new Admin(Application::$app->db);
        return $admin->FiveBlog();
    }

    public static function blog()
    {
        $admin = new Admin(Application::$app->db);
        return $admin->EightBlog();
    }

    public static function pot()
    {
        $admin = new Admin(Application::$app->db);
        return $admin->Portfolio();
    }

    public static function bg()
    {
        $admin = new Admin(Application::$app->db);
        return $admin->bg();
    }

    public static function about()
    {
        $admin = new Admin(Application::$app->db);
        return $admin->about();
    }

    public static function img()
    {
        $admin = new Admin(Application::$app->db);
        return $admin->imgs();
    }

    public static function Visit()
    {
        $db = Application::$app->db;
        $qry = $db->pdo->prepare("SELECT * FROM visits where time_of_visit = ?");
        $qry->execute([Time::dateToday()]);
        if($qry->rowCount()<1)
        {
            return 0;
        }
        else{
            return $qry->fetch()['num_of_visits'];
        }
    }

    public static function AllVisit()
    {
        $db = Application::$app->db;
        $qry = $db->pdo->prepare("SELECT * FROM visits");
        $qry->execute([]);
        $sum  = 0;
        $all = $qry->fetchAll() ;
        foreach ( $all as $k => $val)
        {
            $sum += $all[$k]['num_of_visits'];
        }
        return $sum;
    }

    public static function checkV()
    {
        $db = Application::$app->db;
        $qry = $db->pdo->prepare("SELECT * FROM visits where time_of_visit = ?");
        $qry->execute([Time::dateToday()]);

        if($qry->rowCount()<1)
        {
            $insert = $db->pdo->prepare("INSERT INTO visits(num_of_visits) VALUES (?)");
            $insert->execute([1]);

        }
        else
        {
            $num = ((int)$qry->fetch()['num_of_visits']) + 1;

            $upd = $db->pdo->prepare("UPDATE visits visits set num_of_visits = ? where time_of_visit = ?");
            $upd->execute([$num, Time::dateToday()]);
        }
    }
}