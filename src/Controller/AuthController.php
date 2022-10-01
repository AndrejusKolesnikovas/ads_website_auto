<?php

declare(strict_types=1);

namespace Andrejus\AdsWebsiteAuto\Controller;

class AuthController
{
    public function showRegistration():void
    {
        $inner = './view/registration.php';

        require './view/page.php';
    }
    public function handleRegistration():void
    { $users = json_decode(file_get_contents('./data/user.json'), true);

        /*
        todo: uztikrinti, kad naujai kuriamo vartotojo emailas neegzistuoja;
        issaugoti vartotojo suvestus duomenis i faila ./data/user.json
        */

        $newUser = [
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'phone_number' => $_POST['phone_number'],
            'created_at' => (new DateTime())->format('Y-m-d H:i:s'),
            'updated_at' => null,
        ];

        $emails = array_column($users, 'email');
        if (in_array($newUser['email'], $emails, true)) {
            die('Provided email address is already taken.');
        }
        if ($_POST['password'] !== $_POST['password_repeat']) {
            die('Passwords do not match');
        }

        $users[] = $newUser;
        file_put_contents('./data/user.json', json_encode($users, JSON_PRETTY_PRINT | JSON_FORCE_OBJECT));

        header('Location: /login');
        
    }

}