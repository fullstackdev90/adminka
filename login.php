<?php
session_start();

require_once 'form/login.form.class.php';
require_once 'db.class.php';
require_once 'password.class.php';
require_once 'session.class.php';


$db_host = 'localhost';
$db_user = 'admin';
$db_password = 'adminadmin';
$db_name = 'test';

$msg = '';

$db = new DB($db_host, $db_user, $db_password, $db_name);
$form = new LoginForm($_POST);

if ($_POST) {
    if ($form->validate()) {
        $username = $db->escape($form->getUsername());
        $password = new Password( $db->escape($form->getPassword()) );

        $res = $db->query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' LIMIT 1");
        if (!$res) {
            $msg = 'No such user found';
        } else {
            $user = $res[0]['username'];
            Session::set('user', $user);
            header('location: index.php?msg=You have been logged in');
        }

    } else {
        $msg = 'Please fill in fields';
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h1>Login</h1>

<b><?=$msg; ?></b>

<br/>
<form method="post">
    Username: <input type="text" name="username" value="<?=$form->getUsername(); ?>"/> <br/><br/>
    Password: <input type="password" name="password"/> <br/><br/>
    <input type="submit"/>
</form>

</body>
</html>