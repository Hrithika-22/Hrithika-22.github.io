<?php
$xml = new DOMDocument('1.0');
$xml->formatOutput=true;
$root=$xml->createElement("root");
$xml->appendChild($root);

$user=$xml->createElement("user");
//$user->setAttribute();
$root->appendChild($user);
$username =$xml-> createElement("username","AhmadBa");
$user->appendChild($username );
$fname=$xml->createElement("fname","Ahamd");
$user->appendChild($fname);
$lname=$xml->createElement("lname","Bashir");

$isAdmin=$xml->createElement("isAdmin","false");
$user->appendChild($isAdmin);
$postalcode=$xml->createElement("postalcode","J4k 4Z2");
$user->appendChild($postalcode);
$password=$xml->createElement("password","@RxkawRRsss");
$user->appendChild($password);
$email=$xml->createElement("email","ahmadbashir@gmail.com");
$user->appendChild($email);

$user=$xml->createElement("user");
//$user->setAttribute();
$root->appendChild($user);
$username =$xml-> createElement("username","Caro_carcar");
$user->appendChild($username );
$isAdmin=$xml->createElement("isAdmin","false");
$user->appendChild($isAdmin);
$fname=$xml->createElement("fname","Caroline");
$user->appendChild($fname);
$lname=$xml->createElement("lname","Dion");
$user->appendChild($lname);

$postalcode=$xml->createElement("postalcode","H5R 4G1");
$user->appendChild($postalcode);
$password=$xml->createElement("password","@#RRRsss");
$user->appendChild($password);
$email=$xml->createElement("email","carodion@hotmail.com");
$user->appendChild($email);

$user=$xml->createElement("user");
//$user->setAttribute();
$root->appendChild($user);
$username =$xml-> createElement("username","Rasha_bashir");
$user->appendChild($username );
$fname=$xml->createElement("fname","Rasha");
$user->appendChild($fname);
$lname=$xml->createElement("lname","Bashir");
$user->appendChild($lname);
$isAdmin=$xml->createElement("isAdmin","ture");
$user->appendChild($isAdmin);

$postalcode=$xml->createElement("postalcode","J7Y Z3A");
$user->appendChild($postalcode);
$password=$xml->createElement("password","@#AmjRRRsss");
$user->appendChild($password);
$email=$xml->createElement("email","rashabashir2@gmail.com");
$user->appendChild($email);

$user=$xml->createElement("user");
//$user->setAttribute();
$root->appendChild($user);
$username =$xml-> createElement("username","Nada12");
$user->appendChild($username );
$isAdmin=$xml->createElement("isAdmin","false");
$user->appendChild($isAdmin);
$fname=$xml->createElement("fname","Nada");
$user->appendChild($fname);
$lname=$xml->createElement("lname","Basha");
$user->appendChild($lname);

$postalcode=$xml->createElement("postalcode","H5R 4W1");
$user->appendChild($postalcode);
$password=$xml->createElement("password","@#AmjRRRsfs");
$user->appendChild($password);
$email=$xml->createElement("email","nadobasha@hotmail.com");
$user->appendChild($email);

$user=$xml->createElement("user");
//$user->setAttribute();
$root->appendChild($user);
$isAdmin=$xml->createElement("isAdmin","false");
$user->appendChild($isAdmin);
$username =$xml-> createElement("username","jacko");
$user->appendChild($username );
$fname=$xml->createElement("fname","Jack ");
$user->appendChild($fname);
$lname=$xml->createElement("lname","Sparrow");
$user->appendChild($lname);

$postalcode=$xml->createElement("postalcode","J4R 4T2");
$user->appendChild($postalcode);
$password=$xml->createElement("password","@oceanIsmyHome");
$user->appendChild($password);
$email=$xml->createElement("email","jacktheocean@gmail.com");
$user->appendChild($email);

echo  "<xmp>".$xml->saveXML().'</Xmp>';
$xml->save("../soen287/database.xml");

?>