<?php
session_start();
require_once 'session.class.php';
?>

    <h1><a href="register.php">Register</a></h1>

<?php if (Session::has('user')) : ?>
    <h1><a href="logout.php">Logout (<?=Session::get('user'); ?>)</a></h1>
<?php else : ?>
    <h1><a href="login.php">Login</a></h1>
<?php endif; ?>

    <h1><a href="admin.php">Go to admin page</a></h1>
    <h1><a href="admin.php">Send message</a></h1>

    <br/>

<?=isset($_GET['msg']) ? $_GET['msg'] : '';?>