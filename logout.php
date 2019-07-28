<?php
session_start();
require_once 'session.class.php';

session::destroy();

header('Location: index.php?msg=You have been logged out');
exit;
?>