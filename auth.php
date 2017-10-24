<?php

$hashes = ['203b8ade4aaee21728c5ecc2b53aadbe0cd25c7337c205da91f0686542ad3478'];

for ($i = 0; $i < count($hashes); $i++) {
    if ( hash("sha256", $_POST['login']) == $hashes[$i] )
    {
        setcookie("session","admin",time()+3600);
    }
}

if ( $_GET['action'] == 'logout' )
{
    setcookie("session","admin",time()-1);
}

header('location: /');

?>