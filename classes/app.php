<?php
require_once('Admin.php');
require_once('Users.php');

if (isset($_POST['action']) && $_POST['action'] == 'register') {
    $admin = new Admin();
    $admin->createEmployee($_POST['fname'], $_POST['lname'], $_POST['email'],$_POST['phone'],$_POST['auto-password']);
} else if(isset($_POST['action'])&& $_POST['action'] == 'submit') {
    // die('abcdef');
    $user = new Users();
    $user->signin($_POST['username'], $_POST['password']);   
}