<?php

session_start();
if (isset($_POST['edit'])) {
    $root = simplexml_load_file('../soen287/database.xml');
    foreach ($root->user as $user) {
        if ($user->username == $_POST['username']) {
            $user->password = $_POST['password'];
            $user->isAdmin = $_POST['isAdmin'];
            $user->fName = $_POST['fName'];
            $user->lName = $_POST['lName'];
            $user->postalcode = $_POST['postalcode'];
            $user->email = $_POST['email'];;
            break;
        }
    }

    file_put_contents('..soen287/database.xml', $root->asXML());
    $_SESSION['message'] = 'User edit successfully';
   // header('location: userlist.php');
} else {
    $_SESSION['message'] = 'Select a User to edit';
   // header('location: userlist.php');
}

