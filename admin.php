<?php
session_start();
require_once 'session.class.php';

if (session::has('user')) {
    echo 'Hello, ' . session::get('user');
} else {
    echo 'Restricted area! Get out!';
    header('Location: index.php');
}