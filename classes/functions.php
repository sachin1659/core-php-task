<?php
require_once('Admin.php');
include 'PHP101\classes\Users';
//var_dump($_POST); die(__FILE__);
try{
if (isset($_POST['action']) || $_POST['action'] == 'register') {
    $admin = new Admin();
    $admin->createEmployee($_POST['fname'], $_POST['lname'], $_POST['email'],$_POST['phone'],$_POST['auto-password']);
} else if(isset($_POST['action'])|| $_POST['action'] == 'siginin') {
    $user = new PHP101\classes\Users();
    $user->signIn($_POST['username'], $_POST['password']);
}
}catch(\Exception $e) {
    print_r($e->getMessage()." exception in line ". $e->geLine()." in file ".$e->getFile()); die();
} catch(\Error $e) {
    print_r($e->getMessage()." error in line ". $e->geLine()." in file ".$e->getFile()); die();
}