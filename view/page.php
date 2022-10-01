<?php
$email=null;
$userId=$_SESSION['user_id'] ?? null;

if (isset($userId)){
    $users = json_decode(file_get_contents('./data/user.json'), true);
    if(isset($users[$userId])){
        $user=$users[$userId];
        $email=$user['email'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ads website auto</title>
    <link rel="stylesheet" href="./view/style.css">
</head>
<body>
<header>
    <nav class="H-nav">

        <a href="#"> Ads_website_auto</a>

        <div>
            <a href="/list" >List ads </a>
            <a href="/login" >Login </a>
            <a href="/registration" >Register </a>
            <p>
                <?php
                echo $email;
                ?>
            </p>
        </div>
    </nav>

</header>
<main>
    <?php if (isset($inner)): ?>
        <?php /** @var string $inner */
        require $inner; ?>
    <?php endif; ?>
</main>
</body>
</html>