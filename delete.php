<?php
session_start();
$username = $_GET['username'];

$database= simplexml_load_file('../soen287/database.xml');

//we're are going to create iterator to assign to each user
$index = 0;
$i = 0;

foreach($database->user as $user){
    if($user->username == $username){
        $index = $i;
        break;
    }
    $i++;
}

unset($database->user[$index]);
file_put_contents('../soen287/database.xml', $root->asXML());

$_SESSION['message'] = 'User deleted successfully';
//header('location: userlist.php');

?>