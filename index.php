<?php

declare(strict_types=1);

$requestPath = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestPath === '/list') {
    $data = json_decode(file_get_contents('./data/ads.json'), true);
    $inner = './view/list.php';
} else if ($requestPath === '/registration') {
    if ($requestMethod === 'GET') {
        $inner = './view/registration.php';
    } else if ($requestMethod === 'POST') {

        if ($_POST['password'] !== $_POST['password_repeat']) {
            die('Nesutampa slaptazodziai');
        }
        $users = json_decode(file_get_contents('./data/user.json'), true);
        // todo: uztikrinti, kad naujai kuriamo vartotojo emailas neegzistuoja
        $newUser = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'phone_number' => $_POST['phone_number'],
            'created_at' => (new DateTime())->format('Y-m-d H:i:s'),
            'updated_at' => null,
        ];

        $users[] = $newUser;
        file_put_contents('./data/user.json', json_encode($users, JSON_PRETTY_PRINT | JSON_FORCE_OBJECT));

        /*
        issaugoti vartotojo suvestus duomenis i faila ./data/user.json
        - email
        - password
        - phone_number
        - created_at
        - updated_at
        */

        header('Location: /login');
    } else {
        die('Unknown request type');
    }
} else if ($requestPath === '/login') {
    if ($requestMethod === 'GET') {


        $inner = './view/login.php';

        echo 'Login form goes here' . PHP_EOL;

    } else if ($requestMethod === 'POST') {
        $users = json_decode(file_get_contents('./data/user.json'), true);

        /*if(!in_array($_POST['email'],$users[0])){
            die('User not exist');
        }else{
            if(!in_array($_POST['password'],$users[0])){
                die('Nesutampa slaptazodziai');
            }echo 'prisiloginimo veiksmas';
        }*/
        foreach ($users as $user) {
            if ($user['email'] === $_POST['email'] && $user['password'] === $_POST['password']) {

                session_start();

                if (isset($_SESSION['counter'])) {
                    $_SESSION['counter'] += 1;
                } else {
                    $_SESSION['counter'] = 1;
                }
//                $header = './view/logged_in.php';

                $msg = "You have visited this page " . $_SESSION['counter'];
                $msg .= "in this session.";

                echo 'prisiloginimo veiksmas';

                echo $msg;
            } else {
                die('Nesutampa slaptazodziai');
            }
        }
    }
}
require './view/page.php';