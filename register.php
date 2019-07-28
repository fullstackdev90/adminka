<?php

require_once('form/registration.form.class.php');
require_once('db.class.php');
require_once('password.class.php');

$db_host = 'localhost';
$db_user = 'admin';
$db_password = 'adminadmin';
$db_name = 'test';

$msg = '';

$db = new DB($db_host, $db_user, $db_password, $db_name);
$form = new RegistrationForm($_POST);

if ($_POST) {
    if ($form->validate()) {
        $email = $db->escape($form->getEmail());
        $username = $db->escape($form->getUsername());
        $password = new Password( $db->escape($form->getPassword()) );

        $res = $db->query("SELECT * FROM users WHERE username = '{$username}'");
        if ($res) {
            $msg = 'Such user already exists!';
        } else {
            $db->query("INSERT INTO users (email, username, password) VALUES ('{$email}','{$username}','{$password}')");
            header('location: index.php?msg=You have been registered');
        }

    } else {
        $msg = $form->passwordsMatch() ? 'Please fill in fields' : 'Passwords don\'t match';
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
<h1>Register new user</h1>

<b><?=$msg; ?></b>

<br/>
<form method="post">
    Email: <input type="email" name="email" value="<?=$form->getEmail(); ?>"/> <br/><br/>
    Username: <input type="text" name="username" value="<?=$form->getUsername(); ?>"/> <br/><br/>
    Password: <input type="password" name="password"/> <br/><br/>
    Confirm password: <input type="password" name="passwordConfirm"/> <br/><br/>
    <input type="submit"/>
</form>

</body>
</html>