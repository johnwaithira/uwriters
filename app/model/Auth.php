<?php

namespace User\Uwriters\app\model;

use User\Uwriters\app\Http\Format\Generator\Rand;
use User\Uwriters\app\Http\Security\Auth\Session;
use User\Uwriters\app\Http\Security\Hash;
use User\Uwriters\database\Database;

class Auth
{
    public Database $database;
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function login($params)
    {
        $db = $this->database->pdo;
        $qry = $db->prepare("SELECT * FROM admin where email =?");
        $qry->execute([$params['email']]);

        if($qry->rowCount() < 1)
        {
            return false;
        }
        else
        {
            $data = $qry->fetch();
            if ($data['password'] == Hash::make($params['password']))
            {
                Session::set('loggedin', $params['email']);
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function contact($inputs = [])
    {
        $db = $this->database->pdo;
        $contact = $db->prepare("INSERT INTO messages (msgid, name, email, message) VALUES (?,?,?,?)");
        if($contact->execute([
            Rand::make(10),
            Hash::make($inputs['name']),
            Hash::make($inputs['email']),
            Hash::make($inputs['message'])
        ]))
        {
            return "<p class='f-s-17' style='color: green'>Message sent successfully</p>";
        }
        else
        {
            return "<p class='f-s-17 f-w-700' style='color:red'>Message failedto be sent!</p>";
        }
        var_dump($inputs);
    }
}