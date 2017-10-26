<?php

$hashes = ['6c64e411823e09ae7e1b0a79bda18a7e82b183bff0f763f8badad600d4ede554'];

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